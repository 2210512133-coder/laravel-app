<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Analisis SMART - SPK Pemilihan Kurir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
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

        /* Grid */
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        /* Card */
        .card {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(30, 60, 114, 0.15);
        }

        .card-title {
            font-size: 13px;
            opacity: 0.9;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .card-value {
            font-size: 28px;
            font-weight: 700;
        }

        .card-subtitle {
            font-size: 12px;
            opacity: 0.8;
            margin-top: 10px;
        }

        /* Table */
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
            text-align: left;
            font-weight: 600;
            color: #666;
            border-bottom: 2px solid #e0e0e0;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #f0f0f0;
        }

        tr:hover {
            background: #fafafa;
        }

        .ranking-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #1e3c72;
            color: white;
            font-weight: 700;
            font-size: 14px;
        }

        .ranking-badge.first {
            background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
            color: #333;
        }

        .ranking-badge.second {
            background: linear-gradient(135deg, #c0c0c0 0%, #e8e8e8 100%);
            color: #333;
        }

        .ranking-badge.third {
            background: linear-gradient(135deg, #cd7f32 0%, #e89957 100%);
            color: white;
        }

        .score-bar {
            background: #f0f0f0;
            border-radius: 4px;
            height: 24px;
            overflow: hidden;
            position: relative;
        }

        .score-bar-fill {
            background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 8px;
            color: white;
            font-size: 12px;
            font-weight: 600;
        }

        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-info {
            background: #d1ecf1;
            color: #0c5460;
        }

        .chart-container {
            position: relative;
            height: 300px;
            margin-top: 20px;
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

            .grid-2 {
                grid-template-columns: 1fr;
            }

            th {
                font-size: 12px;
                padding: 8px;
            }

            td {
                font-size: 13px;
                padding: 8px;
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
                <a href="/penilaian" class="nav-link">
                    <i class="fas fa-star"></i>
                    <span>Penilaian</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/hasil" class="nav-link active">
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
                <h1>Hasil Analisis SMART</h1>
                <p>Hasil perhitungan dan ranking alternatif jasa kurir menggunakan metode SMART</p>
            </div>
        </div>

        <!-- Summary Cards -->
        @php
            $best = $results[0] ?? null;
        @endphp
        <div class="grid-2">
            <div class="card">
                <div class="card-title">🏆 Alternatif Terbaik</div>
                <div class="card-value">{{ $best ? $best['alternatif']->name : '-' }}</div>
                <div class="card-subtitle">Skor: {{ $best ? number_format($best['score'],2) : '0.00' }}</div>
            </div>
            <div class="card">
                <div class="card-title">📊 Total Alternatif</div>
                <div class="card-value">{{ count($results) }}</div>
                <div class="card-subtitle">Kurir yang dievaluasi</div>
            </div>
        </div>

        <!-- Ranking Results -->
        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-trophy"></i>
                Ranking Alternatif Berdasarkan Metode SMART
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Peringkat</th>
                            <th>Kode</th>
                            <th>Alternatif (Kurir)</th>
                            <th>Skor SMART</th>
                            <th>Visualisasi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $index => $res)
                            @php
                                $rank = $index + 1;
                                $alt = $res['alternatif'];
                                $score = number_format($res['score'],2);
                                $percent = $score;
                                $statusClass = $rank === 1 ? '#ffd700' : '#d4edda';
                                $statusText = $rank === 1 ? '✓ Terbaik' : '✓ Layak';
                            @endphp
                            <tr>
                                <td><span class="ranking-badge {{ $rank === 1 ? 'first' : '' }}">{{ $rank }}</span></td>
                                <td><span class="badge badge-info">{{ $alt->code }}</span></td>
                                <td><strong>{{ $alt->name }}</strong></td>
                                <td><strong>{{ $score }}</strong></td>
                                <td>
                                    <div class="score-bar">
                                        <div class="score-bar-fill" style="width: {{ $percent }}%;">{{ $percent }}%</div>
                                    </div>
                                </td>
                                <td><span style="display: inline-block; padding: 5px 12px; border-radius:20px; font-size:12px; font-weight:600; background: {{ $statusClass }}; color:#333;">{{ $statusText }}</span></td>
                            </tr>
                        @endforeach
                        {{-- 
                        <tr>
                            <td><span class="ranking-badge first">1</span></td>
                            <td><span class="badge badge-info">A3</span></td>
                            <td><strong>PAXEL</strong></td>
                            <td><strong>84.35</strong></td>
                            <td>
                                <div class="score-bar">
                                    <div class="score-bar-fill" style="width: 100%;">84.35%</div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">✓ Terbaik</span></td>
                        </tr>
                        <tr>
                            <td><span class="ranking-badge second">2</span></td>
                            <td><span class="badge badge-info">A1</span></td>
                            <td><strong>JNE</strong></td>
                            <td><strong>82.60</strong></td>
                            <td>
                                <div class="score-bar">
                                    <div class="score-bar-fill" style="width: 97.94%;">82.60%</div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">✓ Layak</span></td>
                        </tr>
                        <tr>
                            <td><span class="ranking-badge third">3</span></td>
                            <td><span class="badge badge-info">A4</span></td>
                            <td><strong>SICEPAT</strong></td>
                            <td><strong>80.45</strong></td>
                            <td>
                                <div class="score-bar">
                                    <div class="score-bar-fill" style="width: 95.39%;">80.45%</div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">✓ Layak</span></td>
                        </tr>
                        <tr>
                            <td><span class="ranking-badge">4</span></td>
                            <td><span class="badge badge-info">A9</span></td>
                            <td><strong>NINJA EXPRES</strong></td>
                            <td><strong>79.80</strong></td>
                            <td>
                                <div class="score-bar">
                                    <div class="score-bar-fill" style="width: 94.64%;">79.80%</div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">✓ Layak</span></td>
                        </tr>
                        <tr>
                            <td><span class="ranking-badge">5</span></td>
                            <td><span class="badge badge-info">A5</span></td>
                            <td><strong>ANTERAJA</strong></td>
                            <td><strong>79.25</strong></td>
                            <td>
                                <div class="score-bar">
                                    <div class="score-bar-fill" style="width: 94.04%;">79.25%</div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">✓ Layak</span></td>
                        </tr>
                        <tr>
                            <td><span class="ranking-badge">6</span></td>
                            <td><span class="badge badge-info">A2</span></td>
                            <td><strong>JNT</strong></td>
                            <td><strong>76.30</strong></td>
                            <td>
                                <div class="score-bar">
                                    <div class="score-bar-fill" style="width: 90.45%;">76.30%</div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">✓ Cukup</span></td>
                        </tr>
                        <tr>
                            <td><span class="ranking-badge">7</span></td>
                            <td><span class="badge badge-info">A6</span></td>
                            <td><strong>TIKI</strong></td>
                            <td><strong>74.90</strong></td>
                            <td>
                                <div class="score-bar">
                                    <div class="score-bar-fill" style="width: 88.87%;">74.90%</div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">✓ Cukup</span></td>
                        </tr>
                        <tr>
                            <td><span class="ranking-badge">8</span></td>
                            <td><span class="badge badge-info">A8</span></td>
                            <td><strong>LION PARCEL</strong></td>
                            <td><strong>70.00</strong></td>
                            <td>
                                <div class="score-bar">
                                    <div class="score-bar-fill" style="width: 83.00%;">70.00%</div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">✓ Cukup</span></td>
                        </tr>
                        <tr>
                            <td><span class="ranking-badge">9</span></td>
                            <td><span class="badge badge-info">A7</span></td>
                            <td><strong>POS INDONESIA</strong></td>
                            <td><strong>68.50</strong></td>
                            <td>
                                <div class="score-bar">
                                    <div class="score-bar-fill" style="width: 81.26%;">68.50%</div>
                                </div>
                            </td>
                            <td><span class="badge" style="background: #fff3cd; color: #ff9800;">⚠ Kurang</span></td>
                        </tr>
--}}
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Chart -->
        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-chart-line"></i>
                Visualisasi Perbandingan Skor Top 5 Kurir
            </div>
            <div class="chart-container">
                <canvas id="rankingChart"></canvas>
            </div>
        </div>

        <!-- Rekomendasi -->
        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-lightbulb"></i>
                Rekomendasi
            </div>
            <div style="padding: 15px; background: #e7f3ff; border-left: 4px solid #1e3c72; border-radius: 6px;">
                <p style="margin-bottom: 10px;">
                    <strong style="color: #1e3c72;">Berdasarkan analisis metode SMART, rekomendasi pilihan jasa kurir adalah:</strong>
                </p>
                <ol style="margin-left: 20px; color: #333;">
                    @foreach(array_slice($results,0,3) as $res)
                        @php
                            $alt = $res['alternatif'];
                            $score = number_format($res['score'],2);
                        @endphp
                        <li style="margin-bottom: 8px;"><strong>{{ $alt->name }} (Skor: {{ $score }})</strong> - Alternatif peringkat {{ $loop->iteration }} dengan skor {{ $score }}.</li>
                    @endforeach
                </ol>
            </div>
        </div>

        <!-- Action Buttons -->
        <div style="display: flex; gap: 10px; margin-top: 20px;">
            <button onclick="downloadPDF()" class="btn btn-primary">
                <i class="fas fa-file-pdf"></i>
                Cetak Laporan PDF
            </button>
            <button onclick="exportToExcel()" class="btn btn-primary" style="background: #6c757d;">
                <i class="fas fa-download"></i>
                Export Excel
            </button>
        </div>
    </div>

    <!-- PDF Content (Hidden) -->
    <div id="pdf-content" style="position: absolute; left: -9999px; width: 800px; padding: 20px;">
        <div style="padding: 20px; background: #f9f9f9; border-radius: 6px; margin-bottom: 20px;">
            <h3 style="color: #1e3c72; margin-bottom: 10px;">📊 SISTEM PENDUKUNG KEPUTUSAN (SPK)</h3>
            <p style="margin-bottom: 8px;"><strong>Metode:</strong> Simple Multi-Attribute Rating Technique (SMART)</p>
            <p style="margin-bottom: 8px;"><strong>Tujuan:</strong> Pemilihan Jasa Kurir Terbaik</p>
            <p style="margin-bottom: 8px;"><strong>Tanggal Analisis:</strong> <span id="tanggalAnalisisPDF"></span></p>
            <p><strong>Status:</strong> <span style="display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #d4edda; color: #155724;">✓ Selesai</span></p>
        </div>

        <!-- 1. Alternatif -->
        <h4 style="color: #1e3c72; margin: 20px 0 10px 0; font-size: 16px; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;">1. Data Alternatif</h4>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">No</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Kode</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Nama Alternatif</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alternatifs as $i => $alt)
                    <tr><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $i+1 }}</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $alt->code }}</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $alt->name }}</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $alt->description }}</td></tr>
                @endforeach
            </tbody>
        </table>

        <!-- 2. Kriteria -->
        <h4 style="color: #1e3c72; margin: 30px 0 10px 0; font-size: 16px; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;">2. Data Kriteria</h4>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">No</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Kode</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Nama Kriteria</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Tipe</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kriterias as $i => $kri)
                    <tr><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $i+1 }}</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $kri->code }}</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $kri->name }}</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ ucfirst($kri->type) }}</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $kri->description }}</td></tr>
                @endforeach
            </tbody>
        </table>

        <!-- 3. Bobot -->
        <h4 style="color: #1e3c72; margin: 30px 0 10px 0; font-size: 16px; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;">3. Bobot Kriteria</h4>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Kode</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Nama Kriteria</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Bobot (%)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kriterias as $kri)
                    <tr><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $kri->code }}</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $kri->name }}</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $kri->weight }}%</td></tr>
                @endforeach
            </tbody>
        </table>

        <!-- 4. Ranking Hasil Analisis -->
        <h4 style="color: #1e3c72; margin: 30px 0 10px 0; font-size: 16px; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;">4. Ranking Hasil Analisis SMART</h4>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Peringkat</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Kode</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Alternatif</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Skor SMART</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Persentase</th>
                    <th style="background: #f5f5f5; padding: 12px; text-align: left; font-weight: 600; color: #666; border-bottom: 2px solid #e0e0e0;">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $index => $res)
                    @php
                        $rank = $index + 1;
                        $alt = $res['alternatif'];
                        $score = number_format($res['score'],2);
                        $percent = $score;
                        $statusClass = $rank === 1 ? '#ffd700' : '#d4edda';
                        $statusText = $rank === 1 ? '✓ Terbaik' : '✓ Layak';
                    @endphp
                    <tr><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>{{ $rank }}</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $alt->code }}</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $alt->name }}</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>{{ $score }}</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">{{ $percent }}%</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><span style="display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: {{ $statusClass }}; color: #333;">{{ $statusText }}</span></td></tr>
                @endforeach
                {{--
                <tr><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>1</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">A3</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">PAXEL</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>84.35</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">84.35%</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><span style="display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #ffd700; color: #333;">✓ Terbaik</span></td></tr>
                <tr><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>2</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">A1</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">JNE</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>82.60</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">82.60%</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><span style="display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #d4edda; color: #155724;">✓ Layak</span></td></tr>
                <tr style="background: #fff8f3;"><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>3</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">A4</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">SICEPAT</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>80.45</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">80.45%</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><span style="display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #d4edda; color: #155724;">✓ Layak</span></td></tr>
                <tr><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>4</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">A9</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">NINJA EXPRES</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>79.80</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">79.80%</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><span style="display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #d4edda; color: #155724;">✓ Layak</span></td></tr>
                <tr><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>5</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">A5</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">ANTERAJA</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>79.25</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">79.25%</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><span style="display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #d4edda; color: #155724;">✓ Layak</span></td></tr>
                <tr><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>6</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">A2</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">JNT</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>76.30</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">76.30%</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><span style="display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #d4edda; color: #155724;">✓ Cukup</span></td></tr>
                <tr><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>7</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">A6</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">TIKI</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>74.90</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">74.90%</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><span style="display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #d4edda; color: #155724;">✓ Cukup</span></td></tr>
                <tr><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>8</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">A8</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">LION PARCEL</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>70.00</strong></td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">70.00%</td><td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><span style="display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #d4edda; color: #155724;">✓ Cukup</span></td></tr>
                --}}
            </tbody>
        </table>

        <!-- 5. Rekomendasi -->
        <h4 style="color: #1e3c72; margin: 30px 0 10px 0; font-size: 16px; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;">5. Rekomendasi</h4>
        <div style="padding: 15px; background: #e7f3ff; border-left: 4px solid #1e3c72; border-radius: 6px;">
            <p style="margin-bottom: 10px;">
                Berdasarkan hasil analisis menggunakan metode SMART, berikut adalah rekomendasi pilihan jasa kurir:
            </p>
            <ol style="margin-left: 20px;">
                @foreach(array_slice($results,0,3) as $res)
                    @php
                        $alt = $res['alternatif'];
                        $score = number_format($res['score'],2);
                    @endphp
                    <li style="margin-bottom: 8px;"><strong>{{ $alt->name }}</strong> - Pilihan peringkat {{ $loop->iteration }} dengan skor {{ $score }}.</li>
                @endforeach
            </ol>
        </div>
    </div>
</div>

<script>
    // Set tanggal analisis
    function initializePage() {
        const today = new Date();
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        const tanggalText = today.toLocaleDateString('id-ID', options);
        const tanggalElement = document.getElementById('tanggalAnalisisPDF');
        if (tanggalElement) {
            tanggalElement.textContent = tanggalText;
        }
    }

    // Download PDF Function
    function downloadPDF() {
        initializePage();
        const element = document.getElementById('pdf-content');
        
        if (!element) {
            alert('Konten PDF tidak ditemukan!');
            return;
        }

        const opt = {
            margin: 10,
            filename: 'Hasil-Analisis-SPK-SMART-Pemilihan-Kurir.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { orientation: 'portrait', unit: 'mm', format: 'a4' }
        };
        
        html2pdf().set(opt).from(element).save();
    }

    // Export to Excel Function
    function exportToExcel() {
        const tables = document.querySelectorAll('table');
        let excelContent = '<table border="1">';
        
        tables.forEach((table) => {
            excelContent += table.outerHTML;
        });
        
        excelContent += '</table>';

        const link = document.createElement('a');
        link.href = 'data:application/vnd.ms-excel,' + encodeURIComponent(excelContent);
        link.download = 'Hasil-Analisis-SPK-SMART-Pemilihan-Kurir.xls';
        link.click();
    }

    // Chart
    const top5Results = @json(array_slice($results, 0, 5));
    const labels = top5Results.map(r => r.alternatif.name);
    const scores = top5Results.map(r => parseFloat(r.score).toFixed(2));
    const baseColors = ['#ffd700','#c0c0c0','#cd7f32','#1e3c72','#2a5298'];
    const ctx = document.getElementById('rankingChart').getContext('2d');
    
    new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: labels,
            datasets: [{
                label: 'Skor SMART',
                data: scores,
                backgroundColor: baseColors,
                borderRadius: 6,
                borderWidth: 0,
                barPercentage: 0.6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(30, 60, 114, 0.9)',
                    titleFont: { size: 14 },
                    bodyFont: { size: 14 },
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return 'Skor: ' + context.parsed.y + '%';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    grid: {
                        color: '#f0f0f0',
                        drawBorder: false
                    },
                    ticks: {
                        font: { size: 12 },
                        color: '#666'
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        font: { size: 13, weight: 'bold' },
                        color: '#333'
                    }
                }
            },
            animation: {
                duration: 1500,
                easing: 'easeOutQuart'
            }
        }
    });
</script>

</body>
</html>
