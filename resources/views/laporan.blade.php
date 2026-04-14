<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - SPK SMART Pemilihan Kurir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        /* Report Grid */
        .report-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .report-card {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(30, 60, 114, 0.15);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .report-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(30, 60, 114, 0.25);
        }

        .report-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .report-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .report-desc {
            font-size: 12px;
            opacity: 0.9;
        }

        /* Laporan Tabel */
        .report-content {
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

            .report-grid {
                grid-template-columns: 1fr;
            }
        }

        @media print {
            .sidebar, .top-header, .section-title, .btn {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding: 0;
            }

            .content-section {
                box-shadow: none;
                page-break-inside: avoid;
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
                <a href="/hasil" class="nav-link">
                    <i class="fas fa-chart-bar"></i>
                    <span>Hasil Analisis</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/laporan" class="nav-link active">
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
                <h1>Laporan SPK SMART</h1>
                <p>Unduh dan lihat laporan lengkap hasil analisis pemilihan jasa kurir</p>
            </div>
        </div>

        <!-- Laporan Options -->
        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-file-alt"></i>
                Pilihan Laporan
            </div>

            <div class="report-grid">
                <!-- Laporan PDF -->
                <div class="report-card" onclick="window.print()">
                    <div class="report-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <div class="report-title">Laporan PDF</div>
                    <div class="report-desc">Unduh laporan lengkap dalam format PDF</div>
                </div>

                <!-- Laporan Excel -->
                <div class="report-card" onclick="exportToExcel()">
                    <div class="report-icon">
                        <i class="fas fa-file-excel"></i>
                    </div>
                    <div class="report-title">Laporan Excel</div>
                    <div class="report-desc">Ekspor data ke format Excel untuk analisis lebih lanjut</div>
                </div>

                <!-- Ringkasan Eksekutif -->
                <div class="report-card">
                    <div class="report-icon">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="report-title">Ringkasan Eksekutif</div>
                    <div class="report-desc">Ringkasan singkat hasil analisis dan rekomendasi</div>
                </div>
            </div>
        </div>

        <!-- Laporan Detail -->
        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-book"></i>
                Laporan Lengkap Analisis SMART
            </div>

            <div style="padding: 20px; background: #f9f9f9; border-radius: 6px; margin-bottom: 20px;">
                <h3 style="color: #1e3c72; margin-bottom: 10px;">📊 SISTEM PENDUKUNG KEPUTUSAN (SPK)</h3>
                <p style="margin-bottom: 8px;"><strong>Metode:</strong> Simple Multi-Attribute Rating Technique (SMART)</p>
                <p style="margin-bottom: 8px;"><strong>Tujuan:</strong> Pemilihan Jasa Kurir Terbaik</p>
                <p style="margin-bottom: 8px;"><strong>Tanggal Analisis:</strong> <span id="tanggalAnalisis"></span></p>
                <p><strong>Status:</strong> <span class="badge badge-success">✓ Selesai</span></p>
            </div>

            <!-- 1. Alternatif -->
            <h4 style="color: #1e3c72; margin: 20px 0 10px 0;">1. Data Alternatif</h4>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Alternatif</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatifs as $alt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $alt->code }}</td>
                            <td>{{ $alt->name }}</td>
                            <td>{{ $alt->description ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- 2. Kriteria -->
            <h4 style="color: #1e3c72; margin: 30px 0 10px 0;">2. Data Kriteria</h4>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Tipe</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kriterias as $kri)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kri->code }}</td>
                            <td>{{ $kri->name }}</td>
                            <td>{{ ucfirst($kri->type) }}</td>
                            <td>{{ $kri->description ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- 3. Bobot -->
            <h4 style="color: #1e3c72; margin: 30px 0 10px 0;">3. Bobot Kriteria</h4>
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalWeight = 0; @endphp
                    @foreach($kriterias as $kri)
                        @php $totalWeight += floatval($kri->weight); @endphp
                        <tr>
                            <td>{{ $kri->code }}</td>
                            <td>{{ $kri->name }}</td>
                            <td>{{ floatval($kri->weight) }}%</td>
                        </tr>
                    @endforeach
                    <tr style="background: #f5f5f5; font-weight: 600;">
                        <td colspan="2">TOTAL</td>
                        <td>{{ $totalWeight }}%</td>
                    </tr>
                </tbody>
            </table>

            <!-- 4. Hasil Ranking -->
            <h4 style="color: #1e3c72; margin: 30px 0 10px 0;">4. Hasil Ranking Alternatif</h4>
            <table>
                <thead>
                    <tr>
                        <th>Peringkat</th>
                        <th>Alternatif</th>
                        <th>Skor SMART</th>
                        <th>Persentase</th>
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
                            <td><strong>{{ $rank }}</strong></td>
                            <td>{{ $alt->name }}</td>
                            <td><strong>{{ $score }}</strong></td>
                            <td>{{ $percent }}%</td>
                            <td><span class="badge" style="background: {{ $statusClass }}; color: #333;">{{ $statusText }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- 5. Rekomendasi -->
            <h4 style="color: #1e3c72; margin: 30px 0 10px 0;">5. Rekomendasi</h4>
            <div style="padding: 15px; background: #e7f3ff; border-left: 4px solid #1e3c72; border-radius: 6px;">
                <p style="margin-bottom: 10px;">
                    Berdasarkan hasil analisis menggunakan metode SMART, berikut adalah rekomendasi pilihan jasa kurir:
                </p>
                <ol style="margin-left: 20px;">
                    @foreach($results as $index => $res)
                        @if($index < 3)
                            <li style="margin-bottom: 8px;">
                                <strong>{{ $res['alternatif']->name }}</strong> - Pilihan {{ $index === 0 ? 'terbaik' : ($index === 1 ? 'kedua' : 'ketiga') }} dengan skor {{ number_format($res['score'],2) }}.
                            </li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>

        <!-- Action Buttons -->
        <div style="display: flex; gap: 10px; margin-top: 30px;">
            <button onclick="window.print()" class="btn btn-primary">
                <i class="fas fa-print"></i>
                Cetak Laporan
            </button>
            <button onclick="downloadPDF()" class="btn btn-primary" style="background: #dc3545;">
                <i class="fas fa-download"></i>
                Download PDF
            </button>
            <button onclick="exportToExcel()" class="btn btn-primary" style="background: #28a745;">
                <i class="fas fa-download"></i>
                Export Excel
            </button>
        </div>
    </div>
</div>

<script>
    // Set tanggal analisis
    const today = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('tanggalAnalisis').textContent = today.toLocaleDateString('id-ID', options);

    // Download PDF
    function downloadPDF() {
        const element = document.querySelector('.main-content');
        const opt = {
            margin: 10,
            filename: 'Laporan-SPK-SMART-Pemilihan-Kurir.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { orientation: 'portrait', unit: 'mm', format: 'a4' }
        };
        html2pdf().set(opt).from(element).save();
    }

    // Export to Excel
    function exportToExcel() {
        const table = document.querySelector('table');
        let html = '<table border="1">';
        
        // Get all tables
        const tables = document.querySelectorAll('table');
        let excelContent = '';
        
        tables.forEach((table, index) => {
            excelContent += table.outerHTML;
        });

        const link = document.createElement('a');
        link.href = 'data:application/vnd.ms-excel,' + encodeURIComponent(excelContent);
        link.download = 'Laporan-SPK-SMART-Pemilihan-Kurir.xls';
        link.click();
    }
</script>

</body>
</html>
