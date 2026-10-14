<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PoliController extends Controller
{
    public function index()
    {
        $poli = Poli::latest()->get();

        return view('poli.index', compact('poli'));
    }

    public function create()
    {
        return view('poli.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'poli_code' => 'required|string|max:20|unique:polis,poli_code',
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        Poli::create($validated);

        return redirect()
            ->route('poli.index')
            ->with('success', 'Data poli berhasil ditambahkan.');
    }

    public function edit(Poli $poli)
    {
        return view('poli.edit', compact('poli'));
    }

    public function update(Request $request, Poli $poli)
    {
        $validated = $request->validate([
            'poli_code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('polis', 'poli_code')->ignore($poli->id),
            ],
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $poli->update($validated);

        return redirect()
            ->route('poli.index')
            ->with('success', 'Data poli berhasil diperbarui.');
    }

    public function destroy(Poli $poli)
    {
        $poli->delete();

        return redirect()
            ->route('poli.index')
            ->with('success', 'Data poli berhasil dihapus.');
    }
}
