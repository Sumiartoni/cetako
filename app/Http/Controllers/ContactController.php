<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mailer\Mailer as SymfonyMailer;

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

        // Force fresh SMTP config
        $host = $smtp['smtp_host'];
        $port = (int) ($smtp['smtp_port'] ?? 465);
        $username = $smtp['smtp_username'] ?? '';
        $password = $smtp['smtp_password'] ?? '';
        $encryption = $smtp['smtp_encryption'] ?? 'ssl';
        $fromEmail = $smtp['smtp_from_email'] ?? $username;
        $toEmail = $smtp['smtp_to_email'];

        // Override Laravel mail config completely
        config([
            'mail.default' => 'smtp',
            'mail.mailers.smtp.transport' => 'smtp',
            'mail.mailers.smtp.host' => $host,
            'mail.mailers.smtp.port' => $port,
            'mail.mailers.smtp.encryption' => $encryption,
            'mail.mailers.smtp.username' => $username,
            'mail.mailers.smtp.password' => $password,
            'mail.from.address' => $fromEmail,
            'mail.from.name' => 'Cetako Website',
        ]);

        // Purge cached mailer so it picks up new config
        Mail::purge('smtp');

        try {
            Mail::mailer('smtp')
                ->to($toEmail)
                ->send(new ContactFormMail($request->only(['name', 'phone', 'email', 'service', 'message'])));

            return back()->with('success', 'Pesan Anda berhasil terkirim! Kami akan menghubungi Anda segera.');
        } catch (\Throwable $e) {
            \Log::error('Contact form email failed: ' . $e->getMessage());
            return back()->with('error', 'Gagal mengirim pesan: ' . $e->getMessage());
        }
    }
}
