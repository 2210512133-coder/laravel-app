<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Alternatif - SPK SMART Pemilihan Kurir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
        }

        .logo h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .logo p {
            font-size: 11px;
            opacity: 0.8;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin: 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: #fff;
            padding-left: 22px;
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            border-left-color: #ffd700;
        }

        .nav-link i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 20px;
        }

        /* Header Top */
        .top-header {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .header-title h1 {
            font-size: 28px;
            color: #1e3c72;
            margin-bottom: 5px;
        }

        .header-title p {
            color: #666;
            font-size: 14px;
        }

        /* Content Section */
        .content-section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-size: 20px;
            color: #1e3c72;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Table Styles */
        .table-responsive {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f5f5f5;
            padding: 12px;
            text-align: center;
            font-weight: 600;
            color: #666;
            border-bottom: 2px solid #e0e0e0;
        }

        th:first-child {
            text-align: left;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #f0f0f0;
        }

        td:first-child {
            text-align: left;
            font-weight: 600;
        }

        tr:hover {
            background: #fafafa;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 13px;
        }

        .chart-container {
            position: relative; 
            height: 450px; /* increased height for bigger bars */
            margin-top: 30px;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: #1e3c72;
            box-shadow: 0 0 5px rgba(30, 60, 114, 0.2);
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: #1e3c72;
            color: white;
        }

        .btn-primary:hover {
            background: #152a52;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 60, 114, 0.3);
        }

        .info-box {
            background: #e7f3ff;
            border-left: 4px solid #1e3c72;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .info-box strong {
            color: #1e3c72;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-benefit {
            background: #d4edda;
            color: #155724;
        }

        .badge-cost {
            background: #e9ecef;
            color: #343a40;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 0;
            }

            .main-content {
                margin-left: 70px;
                padding: 10px;
            }

            .logo h3, .logo p, .nav-link span {
                display: none;
            }

            .nav-link {
                justify-content: center;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h3>SPK SMART</h3>
            <p>Pemilihan Kurir</p>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/alternatif" class="nav-link">
                    <i class="fas fa-tasks"></i>
                    <span>Alternatif</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/kriteria" class="nav-link">
                    <i class="fas fa-list"></i>
                    <span>Kriteria</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/bobot" class="nav-link">
                    <i class="fas fa-balance-scale"></i>
                    <span>Bobot Kriteria</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/penilaian" class="nav-link active">
                    <i class="fas fa-star"></i>
                    <span>Penilaian</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/hasil" class="nav-link">
                    <i class="fas fa-chart-bar"></i>
                    <span>Hasil Analisis</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/laporan" class="nav-link">
                    <i class="fas fa-file-pdf"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/logout" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Header -->
        <div class="top-header">
            <div class="header-title">
                <h1>Penilaian Alternatif</h1>
                <p>Berikan nilai untuk setiap alternatif pada setiap kriteria</p>
            </div>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <i class="fas fa-lightbulb"></i>
            <strong>Panduan:</strong> Masukkan nilai untuk setiap alternatif kurir berdasarkan kriteria yang telah ditentukan. Gunakan skala 1-10 (1 = Sangat Buruk, 10 = Sangat Baik).
        </div>

        <!-- Penilaian Table -->
        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-table"></i>
                Matriks Penilaian Alternatif
            </div>

            <div class="table-responsive">
                @if(session('success'))
                    <div class="info-box" style="background:#d4edda;color:#155724;">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="/penilaian">
                    @csrf
                    <table>
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach($kriterias as $kri)
                                    <th>
                                        {{ $kri->code }}<br><span style="font-size: 11px; font-weight: 400;">{{ $kri->name }}</span><br>
                                        <span class="badge {{ $kri->type == 'benefit' ? 'badge-benefit' : 'badge-cost' }}">
                                            {{ ucfirst($kri->type) }}
                                        </span>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alternatifs as $alt)
                                <tr>
                                    <td>{{ $alt->code }} - {{ $alt->name }}</td>
                                    @foreach($kriterias as $kri)
                                        @php
                                            $existing = $alt->penilaians->firstWhere('kriteria_id', $kri->id);
                                            $val = $existing ? $existing->value : '';
                                        @endphp
                                        <td>
                                            <input type="number" name="values[{{ $alt->id }}][{{ $kri->id }}]" value="{{ $val }}" min="1" max="10" step="0.1">
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div style="margin-top: 30px; display: flex; gap: 10px;">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan Penilaian
                        </button>
                    </div>
                </form>

                {{-- chart section --}}
                <div class="content-section">
                    <div class="section-title">
                        <i class="fas fa-chart-line"></i>
                        Visualisasi Skor SMART
                    </div>
                    <div class="chart-container">
                        <canvas id="penilaianChart"></canvas>
                    </div>
                </div>

                {{-- per-kriteria breakdown chart --}}
                <div class="content-section">
                    <div class="section-title">
                        <i class="fas fa-chart-bar"></i>
                        Nilai per Kriteria (kontribusi skor)
                    </div>
                    <div class="chart-container">
                        <canvas id="detailChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // build chart using results passed from controller
    const penLabels = @json(array_map(function($r){return $r['alternatif']->name;}, $results));
    const penScores = @json(array_map(function($r){return round($r['score'],2);}, $results));
    const ctxPen = document.getElementById('penilaianChart').getContext('2d');
    new Chart(ctxPen, {
        type: 'bar',
        data: {
            labels: penLabels,
            datasets: [{
                label: 'Skor SMART',
                data: penScores,
                backgroundColor: '#1e3c72',
                borderColor: '#1e3c72',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { beginAtZero: true, max: 100 }
            },
            plugins: { legend: { display: false } }
        }
    });

    // detail per criteria chart
    const detailLabels = penLabels; // alternatives
    const criteriaNames = @json(array_keys($detail));
    const detailData = @json(array_values($detail));
    // choose a set of high‑contrast colors for each criteria
    const colors = ['#1e3c72','#e74c3c','#27ae60','#f1c40f','#8e44ad','#3498db','#e67e22'];
    const detailDatasets = criteriaNames.map((name,i) => ({
        label: name,
        data: detailData[i],
        backgroundColor: colors[i % colors.length],
        borderColor: '#fff',
        borderWidth: 1
    }));

    // determine a sensible upper bound for the x axis based on data
    const flat = detailData.flat();
    const maxVal = flat.length ? Math.ceil(Math.max(...flat) / 10) * 10 : 100;

    const ctxDet = document.getElementById('detailChart').getContext('2d');
    new Chart(ctxDet, {
        type: 'bar',
        data: {
            labels: detailLabels,
            datasets: detailDatasets
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { beginAtZero: true, max: maxVal }
            },
            plugins: { title: { display: true, text: 'Kontribusi skor tiap kriteria' } }
        }
    });
</script>

</body>
</html>
