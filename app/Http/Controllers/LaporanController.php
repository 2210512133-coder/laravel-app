<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;

class LaporanController extends Controller
{
    public function index()
    {
        // only include active alternatives, keeping same filter as other reports
        $alternatifs = Alternatif::where('is_active', true)->orderBy('code')->get();
        $kriterias = Kriteria::orderBy('code')->get();

        // build raw evaluation matrix (unused in view for now but kept for future)
        $matrix = [];
        foreach ($alternatifs as $alt) {
            $row = ['alternatif' => $alt, 'values' => []];
            foreach ($kriterias as $kri) {
                $pen = Penilaian::where('alternatif_id', $alt->id)->where('kriteria_id', $kri->id)->first();
                $row['values'][$kri->id] = $pen ? $pen->value : null;
            }
            $matrix[] = $row;
        }

        // compute SMART scores exactly like other controllers so the report reflects current analysis
        $results = $this->calculateSmartScores($alternatifs, $kriterias);

        return view('laporan', compact('alternatifs', 'kriterias', 'matrix', 'results'));
    }
}
