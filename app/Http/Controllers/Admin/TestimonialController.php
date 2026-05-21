<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::ordered()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.form', ['testimonial' => new Testimonial()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->input('sort_order', 0);

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil ditambahkan!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->input('sort_order', 0);

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil diperbarui!');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil dihapus!');
    }
}
