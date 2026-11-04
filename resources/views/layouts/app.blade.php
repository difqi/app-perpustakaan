<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Digital Kampus')</title>

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            color: #1f2937;
            background: #ffffff;
        }

        /* =========================
           NAVBAR
        ========================= */

        .main-navbar {
            position: relative;
            background: #1e3a8a;
            padding: 14px 40px;
            display: flex;
            align-items: center;
            min-height: 56px;
            gap: 16px;
        }

        .main-navbar .brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 18px;
            white-space: nowrap;
        }

        .main-navbar .nav-menu {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            list-style: none;
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        .main-navbar .nav-menu li {
            margin: 0;
            padding: 0;
        }

        .main-navbar .nav-menu li a {
            color: #cbd5e1;
            text-decoration: none;
            padding: 6px 4px;
            white-space: nowrap;
        }

        .main-navbar .nav-menu li a:hover {
            color: #ffffff;
        }

        .main-navbar .nav-menu li a.active {
            color: #ffffff;
            font-weight: bold;
            border-bottom: 2px solid #ffffff;
        }

        .main-navbar .navbar-user {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #cbd5e1;
            font-size: 14px;
            white-space: nowrap;
        }

        .main-navbar .profile-link {
            color: #e2e8f0;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 6px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .main-navbar .profile-link:hover {
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff;
        }

        .main-navbar .profile-link.active {
            background: rgba(255, 255, 255, 0.16);
            color: #ffffff;
        }

        .main-navbar .btn-logout {
            background: transparent;
            border: 1px solid #cbd5e1;
            color: #e2e8f0;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .main-navbar .btn-logout:hover {
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 40px;
            min-height: 60vh;
        }

        h1 {
            color: #1f2937;
        }

        /* =========================
           TABLE
        ========================= */

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 16px;
        }

        th, td {
            border: 1px solid #e5e7eb;
            padding: 10px 12px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #f8fafc;
            font-weight: 600;
            color: #374151;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        /* =========================
           ALERT
        ========================= */

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 16px;
        }

        /* =========================
           DASHBOARD
        ========================= */

        .stats-grid {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .stat-card {
            flex: 1;
            min-width: 160px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }

        .stat-card .value {
            font-size: 32px;
            font-weight: bold;
            color: #1e3a8a;
        }

        .stat-card .label {
            margin-top: 6px;
            color: #6b7280;
            font-size: 14px;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn {
            display: inline-block;
            padding: 8px 14px;
            background: #2563eb;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        form.inline {
            display: inline;
        }

        /* =========================
           FORM
        ========================= */

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
        }

        .error {
            color: #b91c1c;
            font-size: 14px;
            margin-top: 4px;
        }

        /* =========================
           CUSTOM PAGINATION
        ========================= */

        .pagination-wrapper {
            margin-top: 24px;
            padding: 0;
            background: transparent;
            border: none;
            box-shadow: none;
        }

        .custom-pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 8px;
            margin: 0;
            padding: 0;
            background: transparent;
        }

        .custom-pagination .page-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 38px;
            padding: 0 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: #ffffff;
            color: #1e40af;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }

        .custom-pagination a.page-btn:hover {
            background: #eff6ff;
            border-color: #2563eb;
            color: #1d4ed8;
        }

        .custom-pagination .page-btn.current {
            background: #1e40af;
            border-color: #1e40af;
            color: #ffffff;
            font-weight: 600;
        }

        .custom-pagination .page-btn.disabled {
            background: #f9fafb;
            border-color: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
        }

        /* =========================
           BADGE STATUS PEMINJAMAN
        ========================= */

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.4;
        }

        .status-dikembalikan {
            background: #dcfce7;
            color: #166534;
        }

        .status-dipinjam {
            background: #fef3c7;
            color: #92400e;
        }

        .status-terlambat {
            background: #fee2e2;
            color: #991b1b;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-size: 14px;
            border-top: 1px solid #e5e7eb;
            margin-top: 40px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {
            .main-navbar {
                flex-wrap: wrap;
                justify-content: center;
                padding: 14px 20px;
            }

            .main-navbar .nav-menu {
                position: static;
                transform: none;
                order: 3;
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 14px;
            }

            .main-navbar .navbar-user {
                margin-left: auto;
            }

            main {
                padding: 24px 20px;
            }
        }

        @media (max-width: 600px) {
            .main-navbar .navbar-user {
                margin-left: 0;
            }

            main {
                padding: 20px 12px;
            }

            th, td {
                padding: 8px 6px;
                font-size: 13px;
            }

            .custom-pagination .page-btn {
                min-width: 34px;
                height: 34px;
                padding: 0 8px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    @include('partials.navbar')

    <main>
        @include('partials.alert')
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Sistem Perpustakaan Digital Kampus
    </footer>
</body>
</html>
