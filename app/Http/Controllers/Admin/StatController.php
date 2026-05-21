<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::ordered()->get();
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.form', ['stat' => new Stat()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|integer|min:0',
            'suffix' => 'nullable|string|max:50',
            'icon' => 'required|string|max:100',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->input('sort_order', 0);

        Stat::create($validated);

        return redirect()->route('admin.stats.index')
            ->with('success', 'Statistik berhasil ditambahkan!');
    }

    public function edit(Stat $stat)
    {
        return view('admin.stats.form', compact('stat'));
    }

    public function update(Request $request, Stat $stat)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|integer|min:0',
            'suffix' => 'nullable|string|max:50',
            'icon' => 'required|string|max:100',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->input('sort_order', 0);

        $stat->update($validated);

        return redirect()->route('admin.stats.index')
            ->with('success', 'Statistik berhasil diperbarui!');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return redirect()->route('admin.stats.index')
            ->with('success', 'Statistik berhasil dihapus!');
    }
}
