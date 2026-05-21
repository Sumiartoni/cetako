<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'company' => SiteSetting::getGroup('company'),
            'contact' => SiteSetting::getGroup('contact'),
            'social' => SiteSetting::getGroup('social'),
            'seo' => SiteSetting::getGroup('seo'),
            'hero' => SiteSetting::getGroup('hero'),
            'about' => SiteSetting::getGroup('about'),
            'services' => SiteSetting::getGroup('services'),
            'workflow' => SiteSetting::getGroup('workflow'),
        ];
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $fields = [
            'company' => ['company_name', 'company_tagline', 'company_description', 'company_year'],
            'contact' => ['contact_phone', 'contact_whatsapp', 'contact_email', 'contact_address', 'contact_hours'],
            'social' => ['social_instagram', 'social_facebook', 'social_youtube', 'social_linkedin', 'social_tiktok'],
            'seo' => ['seo_title', 'seo_description', 'seo_keywords'],
            'hero' => ['hero_badge', 'hero_title', 'hero_desc', 'hero_button_1_text', 'hero_button_1_url', 'hero_button_2_text', 'hero_button_2_url', 'hero_trust_text', 'hero_float_1_title', 'hero_float_1_desc', 'hero_float_2_stat', 'hero_float_2_desc'],
            'about' => ['about_experience_years', 'about_badge', 'about_title', 'about_text_1', 'about_text_2', 'about_feat_1_title', 'about_feat_1_desc', 'about_feat_2_title', 'about_feat_2_desc'],
            'services' => [
                'service_1_title', 'service_1_desc', 'service_1_icon',
                'service_2_title', 'service_2_desc', 'service_2_icon',
                'service_3_title', 'service_3_desc', 'service_3_icon',
                'service_4_title', 'service_4_desc', 'service_4_icon',
                'service_5_title', 'service_5_desc', 'service_5_icon',
                'service_6_title', 'service_6_desc', 'service_6_icon'
            ],
            'workflow' => [
                'workflow_subtitle',
                'workflow_1_title', 'workflow_1_desc',
                'workflow_2_title', 'workflow_2_desc',
                'workflow_3_title', 'workflow_3_desc',
                'workflow_4_title', 'workflow_4_desc'
            ]
        ];

        foreach ($fields as $group => $keys) {
            foreach ($keys as $key) {
                if ($request->has($key)) {
                    SiteSetting::set($key, $request->input($key), $group);
                }
            }
        }

        return back()->with('success', 'Pengaturan berhasil disimpan!');
    }
}
