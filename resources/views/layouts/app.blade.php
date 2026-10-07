<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Perpustakaan Digital Kampus')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            margin: 0;
            color: #1f2937;
        }

        /* =========================
        NAVBAR
        ========================== */

        nav {
            position: relative;
            background: #1e3a8a;
            padding: 14px 40px;
            display: flex;
            align-items: center;
            min-height: 56px;
        }

        nav .brand {
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            white-space: nowrap;
        }

        /* Menu utama selalu berada di tengah navbar */
        nav .nav-menu {
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

        nav .nav-menu li {
            margin: 0;
            padding: 0;
        }

        nav .nav-menu li a {
            color: #cbd5e1;
            text-decoration: none;
            padding: 6px 4px;
            white-space: nowrap;
        }

        nav .nav-menu li a:hover {
            color: #ffffff;
        }

        nav .nav-menu li a.active {
            color: #fff;
            font-weight: bold;
            border-bottom: 2px solid #fff;
        }

        /* Area akun di kanan */
        nav .navbar-user {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #cbd5e1;
            font-size: 14px;
            white-space: nowrap;
        }

        nav .profile-link {
            color: #e2e8f0;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 6px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        nav .profile-link:hover {
            background-color: rgba(255, 255, 255, 0.12);
            color: #ffffff;
        }

        nav .profile-link.active {
            background-color: rgba(255, 255, 255, 0.16);
            color: #ffffff;
        }

        nav .btn-logout {
            background: transparent;
            border: 1px solid #cbd5e1;
            color: #e2e8f0;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        nav .btn-logout:hover {
            background-color: rgba(255, 255, 255, 0.12);
            color: #ffffff;
        }

        /* =========================
        MAIN CONTENT
        ========================== */

        main {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px 40px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 16px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }

        /* =========================
        ALERT
        ========================== */

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            padding: 10px 14px;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        /* =========================
        BUTTON
        ========================== */

        .btn {
            display: inline-block;
            padding: 6px 14px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        form.inline {
            display: inline;
        }

        /* =========================
        FORM
        ========================== */

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            box-sizing: border-box;
        }

        .error {
            color: #b91c1c;
            font-size: 14px;
            margin-top: 4px;
        }

        /* =========================
        PAGINATION
        ========================== */

        .pagination-wrapper {
            margin-top: 20px;
            background: #1e3a8a;
            padding: 16px;
            border-radius: 4px;
            color: #ffffff;
        }

        .pagination-wrapper nav {
            position: static;
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 0;
            min-height: auto;
        }

        .pagination-wrapper nav > div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .pagination-wrapper svg {
            width: 18px;
            height: 18px;
            vertical-align: middle;
        }

        .pagination-wrapper a {
            color: #ffffff;
            font-size: 14px;
            text-decoration: none;
        }

        .pagination-wrapper span {
            color: #e5e7eb;
            font-size: 14px;
        }

        .pagination-wrapper a:hover {
            color: #bfdbfe;
        }

        /* =========================
        BADGE STATUS PEMINJAMAN
        ========================== */

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.4;
        }

        .status-dikembalikan {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-dipinjam {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-terlambat {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* =========================
        FOOTER
        ========================== */

        footer {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-size: 14px;
            border-top: 1px solid #e5e7eb;
            margin-top: 40px;
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