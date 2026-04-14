<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Kriteria - SPK SMART Pemilihan Kurir</title>
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

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
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

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
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

        .badge-info {
            background: #d1ecf1;
            color: #0c5460;
        }

        .badge-benefit {
            background: #d4edda;
            color: #155724;
        }

        .badge-cost {
            background: #e9ecef;
            color: #343a40;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-edit, .btn-delete {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: #0066cc;
            color: white;
        }

        .btn-edit:hover {
            background: #0052a3;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
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
                <a href="/kriteria" class="nav-link active">
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
                <h1>Input Kriteria Penilaian</h1>
                <p>Kelola kriteria yang digunakan untuk menilai alternatif jasa kurir</p>
            </div>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <i class="fas fa-info-circle"></i>
            <strong>Catatan:</strong> Tipe kriteria dibagi menjadi 2:
            <ul style="margin-left: 20px; margin-top: 8px;">
                <li><strong>Benefit (Keuntungan)</strong> - Semakin besar nilai semakin baik</li>
                <li><strong>Cost (Biaya)</strong> - Semakin kecil nilai semakin baik</li>
            </ul>
        </div>

        <!-- Form Input -->
        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-plus-circle"></i>
                Tambah Kriteria Baru
            </div>

            @if(session('success'))
                <div class="info-box" style="background:#d4edda;color:#155724;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/kriteria" method="POST">
                @csrf
                <div class="grid-2">
                    <div class="form-group">
                        <label>Nama Kriteria</label>
                        <input type="text" name="name" placeholder="Contoh: Kecepatan Pengiriman" required>
                    </div>
                    <div class="form-group">
                        <label>Kode Kriteria</label>
                        <input type="text" name="code" placeholder="Contoh: C1, C2, C3, dst" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tipe Kriteria</label>
                    <select name="type" required>
                        <option value="">Pilih Tipe Kriteria</option>
                        <option value="benefit">Benefit (Semakin Besar Semakin Baik)</option>
                        <option value="cost">Cost (Semakin Kecil Semakin Baik)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" placeholder="Deskripsi singkat tentang kriteria ini"></textarea>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan Kriteria
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-redo"></i>
                        Reset Form
                    </button>
                </div>
            </form>
        </div>

        <!-- Daftar Kriteria -->
        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-list"></i>
                Daftar Kriteria Penilaian
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Kriteria</th>
                            <th>Tipe</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kriterias as $kri)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge badge-info">{{ $kri->code }}</span></td>
                            <td><strong>{{ $kri->name }}</strong></td>
                            <td><span class="badge {{ $kri->type == 'benefit' ? 'badge-benefit' : 'badge-cost' }}">
                                {!! $kri->type == 'benefit' ? '✓ Benefit' : '✗ Cost' !!}
                            </span></td>
                            <td>{{ $kri->description }}</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-edit"><i class="fas fa-edit"></i> Edit</button>
                                    <form method="POST" action="/kriteria/{{ $kri->id }}/delete" onsubmit="return confirm('Yakin ingin menghapus kriteria ini?');" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn-delete"><i class="fas fa-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align:center;">Belum ada kriteria.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
