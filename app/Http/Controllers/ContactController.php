<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'service' => 'required|string|max:50',
            'message' => 'required|string|max:2000',
        ]);

        // Get SMTP settings from database
        $smtp = SiteSetting::getGroup('smtp');

        if (empty($smtp['smtp_host']) || empty($smtp['smtp_to_email'])) {
            return back()->with('error', 'Konfigurasi email belum diatur. Silakan hubungi kami via WhatsApp.');
        }

        // Configure mailer dynamically from database settings
        Config::set('mail.mailers.smtp.host', $smtp['smtp_host']);
        Config::set('mail.mailers.smtp.port', (int) ($smtp['smtp_port'] ?? 465));
        Config::set('mail.mailers.smtp.username', $smtp['smtp_username'] ?? '');
        Config::set('mail.mailers.smtp.password', $smtp['smtp_password'] ?? '');
        Config::set('mail.mailers.smtp.encryption', $smtp['smtp_encryption'] ?? 'ssl');
        Config::set('mail.from.address', $smtp['smtp_from_email'] ?? $smtp['smtp_username']);
        Config::set('mail.from.name', 'Cetako Website');

        try {
            Mail::to($smtp['smtp_to_email'])
                ->send(new ContactFormMail($request->only(['name', 'phone', 'email', 'service', 'message'])));

            return back()->with('success', 'Pesan Anda berhasil terkirim! Kami akan menghubungi Anda segera.');
        } catch (\Throwable $e) {
            \Log::error('Contact form email failed: ' . $e->getMessage());
            return back()->with('error', 'Gagal mengirim pesan. Silakan coba lagi atau hubungi kami via WhatsApp.');
        }
    }
}
