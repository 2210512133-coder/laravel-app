<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;

class HasilController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::where('is_active', true)->orderBy('code')->get();
        $kriterias = Kriteria::orderBy('code')->get();
        $results = $this->calculateSmartScores($alternatifs, $kriterias);

        return view('hasil', compact('results', 'kriterias', 'alternatifs'));
    }
}
