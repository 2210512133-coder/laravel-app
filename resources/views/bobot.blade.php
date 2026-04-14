<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bobot Kriteria - SPK SMART Pemilihan Kurir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
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

        /* Bobot Table */
        .bobot-table {
            margin-top: 20px;
        }

        .bobot-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 6px;
            align-items: center;
        }

        .bobot-label {
            font-weight: 600;
            color: #333;
        }

        .bobot-input {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .bobot-input input {
            width: 100%;
        }

        .bobot-percentage {
            text-align: center;
            font-weight: 600;
            color: #1e3c72;
            padding: 8px 12px;
            background: white;
            border-radius: 4px;
        }

        /* Progress Bar */
        .progress-section {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
        }

        .progress-bar-container {
            background: #f0f0f0;
            border-radius: 10px;
            height: 30px;
            overflow: hidden;
            margin: 10px 0;
        }

        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        .total-bobot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: #e7f3ff;
            border-left: 4px solid #1e3c72;
            border-radius: 6px;
            margin-top: 15px;
        }

        .total-bobot strong {
            font-size: 16px;
            color: #1e3c72;
        }

        .total-value {
            font-size: 20px;
            font-weight: 700;
            color: #1e3c72;
        }

        .info-box {
            background: #fff3cd;
            border-left: 4px solid #ff9800;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .info-box strong {
            color: #ff9800;
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

            .bobot-row {
                grid-template-columns: 1fr;
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
                <a href="/bobot" class="nav-link active">
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
                <h1>Penentuan Bobot Kriteria</h1>
                <p>Tentukan bobot/prioritas untuk setiap kriteria penilaian</p>
            </div>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <i class="fas fa-lightbulb"></i>
            <strong>Panduan:</strong> Masukkan nilai bobot untuk setiap kriteria. Total semua bobot harus sama dengan 100%.
        </div>

        <!-- Bobot Form -->
        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-sliders-h"></i>
                Pengaturan Bobot Kriteria
            </div>

            @if(session('success'))
                <div class="info-box" style="background:#d4edda;color:#155724;">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="info-box" style="background:#f8d7da;color:#721c24;">
                    {{ session('error') }}
                </div>
            @endif

            <form action="/bobot" method="POST">
                @csrf
                <div class="bobot-table">
                    @foreach($kriterias as $kri)
                    <div class="bobot-row">
                        <div class="bobot-label">
                            <strong>{{ $kri->code }} - {{ $kri->name }}</strong>
                        </div>
                        <div class="bobot-input">
                            <input type="number" name="weight[{{ $kri->id }}]" value="{{ old('weight.'.$kri->id, $kri->weight) }}" min="0" max="100" step="0.01">
                            <span>%</span>
                        </div>
                        <div class="bobot-percentage" id="pct{{ $kri->id }}">{{ old('weight.'.$kri->id, $kri->weight) }}%</div>
                    </div>
                    @endforeach
                </div>

                <!-- Progress Section -->
                <div class="progress-section">
                    <label style="margin-bottom: 10px;">Total Bobot</label>
                    <div class="progress-bar-container">
                        <div class="progress-bar-fill" id="progressBar" style="width: 100%;">
                            100%
                        </div>
                    </div>

                    <div class="total-bobot">
                        <strong>Total Bobot Kriteria:</strong>
                        <span class="total-value" id="totalBobot">100%</span>
                    </div>

                    <div style="margin-top: 15px; padding: 12px; background: #d4edda; border-left: 4px solid #155724; border-radius: 6px; color: #155724;">
                        <i class="fas fa-check-circle"></i> <strong>Status:</strong> <span id="statusBobot">Valid (100%)</span>
                    </div>
                </div>

                <div style="margin-top: 30px; display: flex; gap: 10px;">
                    <button type="submit" class="btn btn-primary" id="saveBobotButton">
                        <i class="fas fa-save"></i>
                        Simpan Bobot Kriteria
                    </button>
                </div>
            </form>
        </div>

        <!-- Info Tambahan -->
        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-info-circle"></i>
                Deskripsi Kriteria
            </div>
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f5f5f5;">
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e0e0e0;">Kode</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e0e0e0;">Nama Kriteria</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e0e0e0;">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>C1</strong></td>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">Kecepatan Pengiriman</td>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">Kecepatan dalam mengirimkan paket ke tujuan</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>C2</strong></td>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">Keamanan</td>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">Tingkat keamanan paket dari kerusakan dan kehilangan</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>C3</strong></td>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">Biaya Pengiriman</td>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">Tarif/harga pengiriman paket</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>C4</strong></td>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">Jangkauan Area</td>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">Cakupan wilayah pengiriman nasional dan regional</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;"><strong>C5</strong></td>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">Pelayanan Pelanggan</td>
                        <td style="padding: 12px; border-bottom: 1px solid #f0f0f0;">Kualitas layanan customer service dan track and trace</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Update bobot percentage
    const inputs = document.querySelectorAll('.bobot-input input[type="number"]');
    const saveButton = document.getElementById('saveBobotButton');

    inputs.forEach((input) => {
        input.addEventListener('change', updateBobot);
    });

    function updateBobot() {
        let total = 0;
        inputs.forEach((input) => {
            let value = parseFloat(input.value) || 0;
            total += value;
            const id = input.name.match(/weight\[(\d+)\]/);
            if (id) {
                const pct = document.getElementById('pct' + id[1]);
                if (pct) {
                    pct.textContent = value.toFixed(2) + '%';
                }
            }
        });

        document.getElementById('totalBobot').textContent = total.toFixed(2) + '%';
        
        let progressBar = document.getElementById('progressBar');
        progressBar.style.width = Math.min(Math.max(total, 0), 100) + '%';
        progressBar.textContent = total.toFixed(2) + '%';

        let statusBobot = document.getElementById('statusBobot');
        const valid = Math.abs(total - 100) < 0.01;
        if (valid) {
            statusBobot.textContent = 'Valid (100%)';
            statusBobot.parentElement.style.background = '#d4edda';
            statusBobot.parentElement.style.color = '#155724';
            statusBobot.parentElement.style.borderLeftColor = '#155724';
        } else {
            statusBobot.textContent = 'Tidak Valid (' + total.toFixed(2) + '%)';
            statusBobot.parentElement.style.background = '#f8d7da';
            statusBobot.parentElement.style.color = '#721c24';
            statusBobot.parentElement.style.borderLeftColor = '#721c24';
        }

        if (saveButton) {
            saveButton.disabled = !valid;
        }
    }

    updateBobot();
</script>

</body>
</html>
