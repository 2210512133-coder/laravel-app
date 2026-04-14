<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::orderBy('code')->get();
        return view('kriteria', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|unique:kriterias,code',
            'name' => 'required',
            'type' => 'required|in:benefit,cost',
            'description' => 'nullable',
            'weight' => 'numeric|min:0',
        ]);
        Kriteria::create($data);
        return back()->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $data = $request->validate([
            'code' => 'required|unique:kriterias,code,' . $kriteria->id,
            'name' => 'required',
            'type' => 'required|in:benefit,cost',
            'description' => 'nullable',
            'weight' => 'numeric|min:0',
        ]);
        $kriteria->update($data);
        return back()->with('success', 'Kriteria diperbarui.');
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return back()->with('success', 'Kriteria dihapus.');
    }
}
