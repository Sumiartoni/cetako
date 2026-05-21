<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function tentang()
    {
        $data = SiteSetting::getGroup('about');
        return view('admin.pages.tentang', compact('data'));
    }

    public function updateTentang(Request $request)
    {
        $fields = [
            'about_badge', 'about_title', 'about_text_1', 'about_text_2',
            'about_experience_years',
            'about_feat_1_title', 'about_feat_1_desc',
            'about_feat_2_title', 'about_feat_2_desc',
            'about_visi', 'about_misi',
            'about_team_1_name', 'about_team_1_role',
            'about_team_2_name', 'about_team_2_role',
            'about_team_3_name', 'about_team_3_role',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                SiteSetting::set($field, $request->input($field), 'about');
            }
        }

        // Handle photo uploads
        for ($i = 1; $i <= 3; $i++) {
            $photoField = "about_team_{$i}_photo";
            if ($request->hasFile($photoField)) {
                $file = $request->file($photoField);
                $path = $file->store('team', 'public');
                SiteSetting::set($photoField, $path, 'about');
            }
        }

        return back()->with('success', 'Halaman Tentang berhasil diperbarui.');
    }

    public function layanan()
    {
        $data = SiteSetting::getGroup('services');
        return view('admin.pages.layanan', compact('data'));
    }

    public function updateLayanan(Request $request)
    {
        for ($i = 1; $i <= 6; $i++) {
            $fields = ['title', 'icon', 'desc', 'features'];
            foreach ($fields as $field) {
                $key = "service_{$i}_{$field}";
                if ($request->has($key)) {
                    SiteSetting::set($key, $request->input($key), 'services');
                }
            }
        }

        // Pricing
        $pricingFields = [
            'pricing_starter_price', 'pricing_business_price', 'pricing_enterprise_price',
        ];
        foreach ($pricingFields as $field) {
            if ($request->has($field)) {
                SiteSetting::set($field, $request->input($field), 'services');
            }
        }

        return back()->with('success', 'Halaman Layanan berhasil diperbarui.');
    }
}
