<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::orderBy('code')->get();
        return view('bobot', compact('kriterias'));
    }

    public function update(Request $request)
    {
        $weights = $request->input('weight', []);
        $total = array_sum(array_map(fn($value) => floatval($value), $weights));

        if (abs($total - 100) > 0.01) {
            return back()->withInput()->with('error', 'Total bobot harus 100% sebelum disimpan. Saat ini '.number_format($total, 2).'%');
        }

        foreach ($weights as $id => $w) {
            Kriteria::where('id', $id)->update(['weight' => floatval($w)]);
        }

        return back()->with('success', 'Bobot kriteria diperbarui.');
    }
}
