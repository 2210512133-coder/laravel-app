<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SPK SMART Pemilihan Jasa Kurir</title>
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
            font-size: 12px;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-title h1 {
            font-size: 34px;
            color: #1e3c72;
            margin-bottom: 5px;
        }

        .header-title p {
            color: #666;
            font-size: 14px;
        }

        .header-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #1e3c72;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            cursor: pointer;
        }

        /* Profile dropdown */
        .profile-wrapper {
            position: relative;
        }

        .profile-dropdown {
            position: absolute;
            right: 0;
            top: calc(100% + 10px);
            background: white;
            border: 1px solid #e6e6e6;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            width: 220px;
            display: none;
            z-index: 50;
        }

        .profile-dropdown.active {
            display: block;
        }

        .profile-dropdown .profile-card {
            padding: 12px 14px;
            border-bottom: 1px solid #f5f5f5;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .profile-dropdown .profile-card .info {
            font-size: 13px;
        }

        .profile-dropdown .dropdown-list {
            list-style: none;
            margin: 0;
            padding: 8px 0;
        }

        .profile-dropdown .dropdown-list li a {
            display: block;
            padding: 10px 14px;
            color: #333;
            text-decoration: none;
            font-size: 13px;
        }

        .profile-dropdown .dropdown-list li a:hover {
            background: #f7f7f7;
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-left: 4px solid #1e3c72;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .card.blue {
            border-left-color: #0066cc;
        }

        .card.orange {
            border-left-color: #ff9800;
        }

        .card.purple {
            border-left-color: #9c27b0;
        }

        .card-icon {
            font-size: 32px;
            margin-bottom: 15px;
            opacity: 0.8;
        }

        .card-icon.blue {
            color: #0066cc;
        }

        .card-icon.orange {
            color: #ff9800;
        }

        .card-icon.purple {
            color: #9c27b0;
        }

        .card-title {
            font-size: 14px;
            color: #999;
            text-transform: uppercase;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .card-value {
            font-size: 32px;
            font-weight: bold;
            color: #1e3c72;
        }

        .card-footer {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
            font-size: 12px;
            color: #999;
        }

        /* Content Sections */
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

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 15px;
        }

        .menu-item {
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            background: #f9f9f9;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: #333;
            border: 2px solid transparent;
        }

        .menu-item:hover {
            background: #f0f0f0;
            border-color: #006400;
            transform: translateY(-2px);
        }

        .menu-icon {
            font-size: 28px;
            color: #006400;
            margin-bottom: 10px;
        }

        .menu-label {
            font-size: 13px;
            font-weight: 600;
            color: #333;
        }

        /* Table */
        .table-responsive {
            overflow-x: auto;
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

        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }

        .badge-danger {
            background: #f8d7da;
            color: #721c24;
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

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .menu-grid {
                grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
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
                <a href="/dashboard" class="nav-link active">
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
                <h1>Dashboard SPK SMART</h1>
                <p>Sistem Pendukung Keputusan - Pemilihan Jasa Kurir Terbaik</p>
            </div>

            <div class="header-user">
                <div class="profile-wrapper">
                    <div class="user-profile">
                        <div class="user-avatar" id="profileBtn">A</div>
                    </div>

                    <div class="profile-dropdown" id="profileDropdown" aria-hidden="true">
                        <div class="profile-card">
                            <div class="user-avatar" style="width:48px;height:48px;">{{ strtoupper(substr(session('user_name', 'A'),0,1)) }}</div>
                            <div class="info">
                                <div style="font-weight:700;">{{ session('user_name', 'Administrator') }}</div>
                                <div style="font-size:12px;color:#666;">{{ session('user_email', 'admin@example.com') }}</div>
                            </div>
                        </div>
                        <ul class="dropdown-list">
                            <li><a href="#">Profil Saya</a></li>
                            <li><a href="#">Edit Profil</a></li>
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="dashboard-grid">
            <div class="card">
                <div class="card-icon">📋</div>
                <div class="card-title">Total Alternatif</div>
                <div class="card-value">{{ count($alternatifs) }}</div>
                <div class="card-footer">Jasa kurir yang dinilai</div>
            </div>

            <div class="card blue">
                <div class="card-icon blue">📊</div>
                <div class="card-title">Total Kriteria</div>
                <div class="card-value" style="color: #0066cc;">{{ count($kriterias) }}</div>
                <div class="card-footer">Parameter penilaian</div>
            </div>

            <div class="card orange">
                <div class="card-icon orange">⚖️</div>
                <div class="card-title">Bobot Diatur</div>
                <div class="card-value" style="color: #ff9800;">{{ $kriterias->sum('weight') }}%</div>
                <div class="card-footer">Semua kriteria</div>
            </div>

            <div class="card purple">
                <div class="card-icon purple">🏆</div>
                <div class="card-title">Hasil Terbaik</div>
                @php $best = $results[0] ?? null; @endphp
                <div class="card-value" style="color: #9c27b0;">{{ $best ? $best['alternatif']->name : '-' }}</div>
                <div class="card-footer">Skor: {{ $best ? number_format($best['score'],2) : '0.00' }}</div>
            </div>
        </div>

        <!-- Menu Utama -->
        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-bars"></i>
                Menu Utama SPK SMART
            </div>
            <div class="menu-grid">
                <a href="/alternatif" class="menu-item">
                    <div class="menu-icon">📋</div>
                    <div class="menu-label">Input Alternatif</div>
                </a>
                <a href="/kriteria" class="menu-item">
                    <div class="menu-icon">📝</div>
                    <div class="menu-label">Input Kriteria</div>
                </a>
                <a href="/bobot" class="menu-item">
                    <div class="menu-icon">⚖️</div>
                    <div class="menu-label">Penentuan Bobot</div>
                </a>
                <a href="/penilaian" class="menu-item">
                    <div class="menu-icon">⭐</div>
                    <div class="menu-label">Penilaian Alternatif</div>
                </a>
                <a href="/hasil" class="menu-item">
                    <div class="menu-icon">📊</div>
                    <div class="menu-label">Hasil Analisis</div>
                </a>
                <a href="/laporan" class="menu-item">
                    <div class="menu-icon">📄</div>
                    <div class="menu-label">Lihat Laporan</div>
                </a>
            </div>
        </div>

        <!-- Ranking Hasil SMART -->
        <!-- Grafik Top 5 -->
        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-chart-bar"></i>
                Grafik 5 Kurir Terbaik
            </div>
            <div class="chart-container" style="position: relative; height: 320px; width: 100%;">
                <canvas id="top5Chart"></canvas>
            </div>
        </div>

        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-trophy"></i>
                Top 5 Hasil Rangking SMART
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Rangking</th>
                            <th>Alternatif</th>
                            <th>Skor SMART</th>
                            <th>Persentase</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(array_slice($results,0,5) as $index => $res)
                            @php
                                $rank = $index + 1;
                                $alt = $res['alternatif'];
                                $score = number_format($res['score'],2);
                                $percent = $score;
                                $statusClass = $rank === 1 ? 'badge-success' : 'badge-success';
                                $statusText = $rank === 1 ? '✓ Terbaik' : '✓ Layak';
                            @endphp
                            <tr>
                                <td><strong>{{ $rank }}</strong></td>
                                <td>{{ $alt->name }}</td>
                                <td><strong>{{ $score }}</strong></td>
                                <td>{{ $percent }}%</td>
                                <td><span class="badge {{ $statusClass }}">{{ $statusText }}</span></td>
                            </tr>
                        @endforeach
                        {{--
                        <tr>
                            <td><strong>1</strong></td>
                            <td>PAXEL</td>
                            <td><strong>85.50</strong></td>
                            <td>85.5%</td>
                            <td><span class="badge badge-success">✓ Terbaik</span></td>
                        </tr>
                        <tr>
                            <td><strong>2</strong></td>
                            <td>JNE</td>
                            <td><strong>78.25</strong></td>
                            <td>78.25%</td>
                            <td><span class="badge badge-success">✓ Layak</span></td>
                        </tr>
                        <tr>
                            <td><strong>3</strong></td>
                            <td>JNT</td>
                            <td><strong>72.10</strong></td>
                            <td>72.10%</td>
                            <td><span class="badge badge-success">✓ Layak</span></td>
                        </tr>
                        <tr>
                            <td><strong>4</strong></td>
                            <td>SICEPAT</td>
                            <td><strong>65.80</strong></td>
                            <td>65.80%</td>
                            <td><span class="badge badge-warning">⚠ Cukup</span></td>
                        </tr>
                        <tr>
                            <td><strong>5</strong></td>
                            <td>NINJA EXPRES</td>
                            <td><strong>58.40</strong></td>
                            <td>58.40%</td>
                            <td><span class="badge badge-warning">⚠ Cukup</span></td>
                        </tr>
--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Profile dropdown toggle
    (function(){
        const btn = document.getElementById('profileBtn');
        const dropdown = document.getElementById('profileDropdown');

        if (!btn || !dropdown) return;

        function openDropdown() {
            dropdown.classList.add('active');
            dropdown.setAttribute('aria-hidden','false');
        }

        function closeDropdown() {
            dropdown.classList.remove('active');
            dropdown.setAttribute('aria-hidden','true');
        }

        btn.addEventListener('click', function(e){
            e.stopPropagation();
            if (dropdown.classList.contains('active')) {
                closeDropdown();
            } else {
                openDropdown();
            }
        });

        // Close when clicking outside
        document.addEventListener('click', function(e){
            if (!dropdown.contains(e.target) && !btn.contains(e.target)) {
                closeDropdown();
            }
        });

        // Close with Escape
        document.addEventListener('keydown', function(e){
            if (e.key === 'Escape') closeDropdown();
        });
    })();

    // Initialize Chart.js for Top 5
    document.addEventListener("DOMContentLoaded", function() {
        const top5Results = @json(array_slice($results, 0, 5));
        const labels = top5Results.map(r => r.alternatif.name);
        const scores = top5Results.map(r => parseFloat(r.score).toFixed(2));
        
        const ctx = document.getElementById('top5Chart').getContext('2d');
        
        // Gradient for bars
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, '#1e3c72');
        gradient.addColorStop(1, '#2a5298');

        new Chart(ctx, {
            type: 'bar', // diagram batang vertikal
            data: {
                labels: labels,
                datasets: [{
                    label: 'Skor SMART',
                    data: scores,
                    backgroundColor: gradient,
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
    });
</script>

</body>
</html>
