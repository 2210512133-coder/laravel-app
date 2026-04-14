<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::orderBy('code')->get();
        return view('alternatif', compact('alternatifs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|unique:alternatifs,code',
            'name' => 'required',
            'description' => 'nullable',
            'is_active' => 'boolean',
        ]);
        $data['is_active'] = $request->has('is_active') ? (bool)$request->input('is_active') : true;
        Alternatif::create($data);
        return back()->with('success', 'Alternatif berhasil ditambahkan.');
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $data = $request->validate([
            'code' => 'required|unique:alternatifs,code,' . $alternatif->id,
            'name' => 'required',
            'description' => 'nullable',
            'is_active' => 'boolean',
        ]);
        $data['is_active'] = $request->has('is_active') ? (bool)$request->input('is_active') : true;
        $alternatif->update($data);
        return back()->with('success', 'Alternatif diperbarui.');
    }

    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();
        return back()->with('success', 'Alternatif dihapus.');
    }
}
