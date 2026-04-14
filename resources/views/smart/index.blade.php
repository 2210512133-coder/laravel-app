<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SPK SMART — Input Data</title>
    <style>
        body{font-family:Inter,system-ui,Arial,Helvetica,sans-serif;background:#f5f7fb;color:#102a43;padding:24px}
        .card{background:#fff;border-radius:10px;box-shadow:0 6px 18px rgba(16,42,67,0.08);padding:20px;max-width:980px;margin:18px auto}
        h1{margin:0 0 8px;color:#0b3b61}
        textarea{width:100%;height:200px;padding:12px;border:1px solid #e6eef8;border-radius:8px;font-family:monospace}
        .row{display:flex;gap:16px}
        .col{flex:1}
        .btn{display:inline-block;background:#0b74de;color:#fff;padding:10px 16px;border-radius:8px;text-decoration:none;border:none;cursor:pointer}
        .muted{color:#5b6b77;font-size:14px}
        .sample{background:#f1f6ff;padding:10px;border-radius:8px;margin-bottom:12px;border:1px solid #e6f0ff}
    </style>
</head>
<body>
    <div class="card">
        <h1>SPK SMART — Demo</h1>
        <p class="muted">Masukkan kriteria dan alternatif dalam format JSON. Contoh sudah disediakan; ubah sesuai kebutuhan lalu klik <strong>Hitung</strong>.</p>

        <form method="post" action="/smart/calculate">
            @csrf
            <div class="row">
                <div class="col">
                    <label><strong>Daftar Kriteria (JSON)</strong></label>
                    <div class="sample">Format: [{"code":"C1","name":"Biaya","weight":40,"type":"cost"}, ...]</div>
                    <textarea name="criteria_json">{{ $criteria_json }}</textarea>
                </div>
                <div class="col">
                    <label><strong>Daftar Alternatif (JSON)</strong></label>
                    <div class="sample">Format: [{"code":"A1","name":"Alternatif A","scores":{"C1":700000,"C2":7}}, ...]</div>
                    <textarea name="alternatives_json">{{ $alternatives_json }}</textarea>
                </div>
            </div>

            <div style="margin-top:14px;display:flex;gap:10px;align-items:center">
                <button class="btn" type="submit">Hitung SMART</button>
                <a href="/" style="color:#0b74de;text-decoration:none">Kembali ke beranda</a>
            </div>
        </form>
    </div>
</body>
</html>
