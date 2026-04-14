<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::where('is_active', true)->orderBy('code')->get();
        $kriterias   = Kriteria::orderBy('code')->get();

        $results = $this->calculateSmartScores($alternatifs, $kriterias);

        // breakdown per criteria for each alternatif
        $detail = [];
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
            $ranges[$kri->id] = ['min' => min($vals), 'max' => max($vals)];
        }

        foreach ($kriterias as $kri) {
            $row = [];
            $weight = floatval($kri->weight) / 100;
            $min = $ranges[$kri->id]['min'];
            $max = $ranges[$kri->id]['max'];
            foreach ($alternatifs as $alt) {
                $val = $values[$alt->id][$kri->id];
                $norm = 1;
                if ($max !== $min) {
                    if ($kri->type === 'cost') {
                        $norm = ($max - $val) / ($max - $min);
                    } else {
                        $norm = ($val - $min) / ($max - $min);
                    }
                }
                $row[] = round($norm * $weight * 100, 2);
            }
            $detail[$kri->name] = $row;
        }

        return view('penilaian', compact('alternatifs', 'kriterias', 'results', 'detail'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'values' => 'required|array',
        ]);
        foreach ($data['values'] as $altId => $rows) {
            foreach ($rows as $kriId => $val) {
                Penilaian::updateOrCreate(
                    ['alternatif_id' => $altId, 'kriteria_id' => $kriId],
                    ['value' => $val]
                );
            }
        }
        return back()->with('success', 'Penilaian tersimpan.');
    }
}
