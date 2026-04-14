<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;

abstract class Controller
{
    protected function calculateSmartScores($alternatifs, $kriterias)
    {
        $values = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriterias as $kri) {
                $pen = Penilaian::where('alternatif_id', $alt->id)
                    ->where('kriteria_id', $kri->id)
                    ->first();
                $values[$alt->id][$kri->id] = $pen ? floatval($pen->value) : 0;
            }
        }

        $ranges = [];
        foreach ($kriterias as $kri) {
            $vals = [];
            foreach ($alternatifs as $alt) {
                $vals[] = $values[$alt->id][$kri->id];
            }
            $ranges[$kri->id] = [
                'min' => min($vals),
                'max' => max($vals),
            ];
        }

        $results = [];
        foreach ($alternatifs as $alt) {
            $score = 0;
            foreach ($kriterias as $kri) {
                $val = $values[$alt->id][$kri->id];
                $min = $ranges[$kri->id]['min'];
                $max = $ranges[$kri->id]['max'];
                $norm = 1;

                if ($max !== $min) {
                    if ($kri->type === 'cost') {
                        $norm = ($max - $val) / ($max - $min);
                    } else {
                        $norm = ($val - $min) / ($max - $min);
                    }
                }

                $weight = floatval($kri->weight) / 100;
                $score += $norm * $weight;
            }

            $results[] = [
                'alternatif' => $alt,
                'score' => round($score * 100, 4),
            ];
        }

        usort($results, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        return $results;
    }
}
