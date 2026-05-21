<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | Cetako</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Space+Grotesk:wght@700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favico.png') }}">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Plus Jakarta Sans',sans-serif; background:#F5F2EC; min-height:100vh; display:flex; align-items:center; justify-content:center; }
        .error-page { text-align:center; padding:40px 20px; }
        .error-code { font-family:'Space Grotesk',sans-serif; font-size:8rem; font-weight:700; color:#17335F; line-height:1; margin-bottom:16px; }
        .error-code span { color:#F2383D; }
        .error-title { font-size:1.5rem; font-weight:700; color:#17335F; margin-bottom:12px; }
        .error-desc { color:#555; font-size:1rem; margin-bottom:32px; max-width:400px; margin-left:auto; margin-right:auto; line-height:1.6; }
        .error-btn { display:inline-flex; align-items:center; gap:8px; padding:14px 32px; background:#F2383D; color:white; font-weight:600; font-size:0.92rem; border-radius:9999px; text-decoration:none; transition:all .3s ease; }
        .error-btn:hover { background:#d42a2f; transform:translateY(-2px); box-shadow:0 8px 24px rgba(242,56,61,0.3); }
    </style>
</head>
<body>
    <div class="error-page">
        <div class="error-code">4<span>0</span>4</div>
        <h1 class="error-title">Halaman Tidak Ditemukan</h1>
        <p class="error-desc">Maaf, halaman yang Anda cari tidak ada atau telah dipindahkan. Silakan kembali ke beranda.</p>
        <a href="/" class="error-btn">← Kembali ke Beranda</a>
    </div>
</body>
</html>
