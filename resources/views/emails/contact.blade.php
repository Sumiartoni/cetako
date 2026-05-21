<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #17335F; color: white; padding: 20px; border-radius: 8px 8px 0 0; }
        .header h1 { margin: 0; font-size: 1.3rem; }
        .body { background: #f8f9fa; padding: 24px; border: 1px solid #e2e8f0; }
        .field { margin-bottom: 16px; }
        .field-label { font-weight: bold; color: #17335F; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; }
        .field-value { margin-top: 4px; padding: 10px; background: white; border-radius: 6px; border: 1px solid #e2e8f0; }
        .footer { padding: 16px; text-align: center; font-size: 0.8rem; color: #94a3b8; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📩 Pesan Baru dari Form Kontak</h1>
        </div>
        <div class="body">
            <div class="field">
                <div class="field-label">Nama</div>
                <div class="field-value">{{ $data['name'] }}</div>
            </div>
            <div class="field">
                <div class="field-label">No. WhatsApp</div>
                <div class="field-value">{{ $data['phone'] }}</div>
            </div>
            <div class="field">
                <div class="field-label">Email</div>
                <div class="field-value">{{ $data['email'] }}</div>
            </div>
            <div class="field">
                <div class="field-label">Layanan</div>
                <div class="field-value">{{ $data['service'] }}</div>
            </div>
            <div class="field">
                <div class="field-label">Pesan</div>
                <div class="field-value">{!! nl2br(e($data['message'])) !!}</div>
            </div>
        </div>
        <div class="footer">
            Email ini dikirim otomatis dari form kontak website cetako.id
        </div>
    </div>
</body>
</html>
