<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmartController extends Controller
{
    public function index()
    {
        $sampleCriteria = [
            ['code' => 'C1', 'name' => 'Biaya', 'weight' => 40, 'type' => 'cost'],
            ['code' => 'C2', 'name' => 'Kualitas', 'weight' => 35, 'type' => 'benefit'],
            ['code' => 'C3', 'name' => 'Layanan', 'weight' => 25, 'type' => 'benefit'],
        ];

        $sampleAlternatives = [
            ['code' => 'A1', 'name' => 'Alternatif A', 'scores' => ['C1' => 700000, 'C2' => 7, 'C3' => 8]],
            ['code' => 'A2', 'name' => 'Alternatif B', 'scores' => ['C1' => 850000, 'C2' => 8, 'C3' => 7]],
            ['code' => 'A3', 'name' => 'Alternatif C', 'scores' => ['C1' => 650000, 'C2' => 6, 'C3' => 9]],
        ];

        return view('smart.index', [
            'criteria_json' => json_encode($sampleCriteria, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            'alternatives_json' => json_encode($sampleAlternatives, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
        ]);
    }

    public function calculate(Request $request)
    {
        $criteria = json_decode($request->input('criteria_json', '[]'), true);
        $alternatives = json_decode($request->input('alternatives_json', '[]'), true);

        if (!is_array($criteria) || !is_array($alternatives) || empty($criteria) || empty($alternatives)) {
            return back()->with('error', 'Data tidak valid. Pastikan JSON untuk kriteria dan alternatif terisi dengan benar.');
        }

        // normalize weights
        $totalWeight = 0;
        foreach ($criteria as $c) {
            $totalWeight += floatval($c['weight'] ?? 0);
        }
        if ($totalWeight <= 0) {
            return back()->with('error', 'Jumlah bobot kriteria harus lebih dari 0.');
        }

        $weights = [];
        $types = [];
        $criteriaCodes = [];
        foreach ($criteria as $c) {
            $code = $c['code'] ?? $c['name'];
            $criteriaCodes[] = $code;
            $weights[$code] = (floatval($c['weight'] ?? 0)) / $totalWeight; // normalized weight
            $types[$code] = strtolower($c['type'] ?? 'benefit');
        }

        // collect score ranges per criterion
        $ranges = [];
        foreach ($criteriaCodes as $code) {
            $vals = [];
            foreach ($alternatives as $a) {
                $vals[] = floatval($a['scores'][$code] ?? 0);
            }
            $ranges[$code] = ['min' => min($vals), 'max' => max($vals)];
        }

        // compute normalized utilities and weighted sums
        $results = [];
        foreach ($alternatives as $a) {
            $row = [];
            $row['code'] = $a['code'] ?? ($a['name'] ?? '');
            $row['name'] = $a['name'] ?? '';
            $row['scores'] = [];
            $row['normalized'] = [];
            $row['weighted'] = [];
            $total = 0;
            foreach ($criteriaCodes as $code) {
                $val = floatval($a['scores'][$code] ?? 0);
                $min = $ranges[$code]['min'];
                $max = $ranges[$code]['max'];
                $norm = 0;
                if ($max == $min) {
                    $norm = 1; // all same values -> neutral
                } else {
                    if ($types[$code] === 'cost') {
                        $norm = ($max - $val) / ($max - $min);
                    } else {
                        $norm = ($val - $min) / ($max - $min);
                    }
                }
                $weighted = $norm * $weights[$code];
                $row['scores'][$code] = $val;
                $row['normalized'][$code] = round($norm, 4);
                $row['weighted'][$code] = round($weighted, 4);
                $total += $weighted;
            }
            $row['score'] = round($total, 4);
            $results[] = $row;
        }

        // rank results
        usort($results, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        return view('smart.results', [
            'criteria' => $criteria,
            'criteriaCodes' => $criteriaCodes,
            'weights' => $weights,
            'types' => $types,
            'ranges' => $ranges,
            'results' => $results,
        ]);
    }
}
