<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Hasil SPK SMART</title>
    <style>
        body{font-family:Inter,system-ui,Arial,Helvetica,sans-serif;background:#f5f7fb;color:#102a43;padding:24px}
        .card{background:#fff;border-radius:10px;box-shadow:0 6px 18px rgba(16,42,67,0.08);padding:20px;max-width:1100px;margin:18px auto}
        table{width:100%;border-collapse:collapse;margin-top:12px}
        th,td{padding:10px;border-bottom:1px solid #eef4fb;text-align:left}
        th{background:#f6fbff;color:#0b3b61}
        .rank{font-weight:700;color:#0b74de}
        .btn{display:inline-block;background:#0b74de;color:#fff;padding:8px 12px;border-radius:8px;text-decoration:none}
    </style>
</head>
<body>
    <div class="card">
        <h1>Hasil Perhitungan — SMART</h1>
        <p class="muted">Berikut hasil perhitungan utilitas ter-normalisasi dan skor akhir setiap alternatif.</p>

        <div style="overflow:auto">
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Kode</th>
                        <th>Alternatif</th>
                        @foreach($criteria as $c)
                            <th>{{ $c['code'] ?? $c['name'] }}<br><small>{{ $c['name'] }}</small></th>
                        @endforeach
                        <th>Skor Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $i => $r)
                        <tr>
                            <td class="rank">{{ $i + 1 }}</td>
                            <td>{{ $r['code'] }}</td>
                            <td>{{ $r['name'] }}</td>
                            @foreach($criteriaCodes as $code)
                                <td>
                                    <div style="font-size:12px;color:#334e68">Nilai: {{ $r['scores'][$code] }}</div>
                                    <div style="font-size:12px;color:#1b7ad9">N: {{ $r['normalized'][$code] }} &nbsp; W: {{ $weights[$code] }}</div>
                                </td>
                            @endforeach
                            <td style="font-weight:700">{{ $r['score'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px;display:flex;gap:10px">
            <a class="btn" href="/smart">Hitung Ulang</a>
            <a style="align-self:center;color:#0b74de;text-decoration:none" href="/">Kembali</a>
        </div>
    </div>
</body>
</html>
