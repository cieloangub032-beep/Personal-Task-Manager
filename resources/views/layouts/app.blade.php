<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vellum | Personal Task Manager</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts: Plus Jakarta Sans & Newsreader -->
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,600;1,6..72,400&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #0f1c16 0%, #172a21 50%, #0d1712 100%);
            color: #e2ece9;
            min-height: 100vh;
            background-attachment: fixed;
        }
        .editorial-title {
            font-family: 'Newsreader', serif;
            letter-spacing: -1.5px;
        }
        .glass-panel {
            background: rgba(23, 42, 33, 0.65);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(110, 163, 133, 0.15);
            border-radius: 1.25rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .form-control, .form-select {
            background-color: rgba(13, 23, 18, 0.6) !important;
            border: 1px solid rgba(110, 163, 133, 0.2) !important;
            color: #e2ece9 !important;
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #79ac90 !important;
            box-shadow: 0 0 0 3px rgba(121, 172, 144, 0.2) !important;
        }
        .form-control::placeholder {
            color: rgba(226, 236, 233, 0.4);
        }
        .btn-editorial {
            background-color: #8fb9a8;
            color: #0f1c16;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.2s ease;
        }
        .btn-editorial:hover {
            background-color: #a3cbb8;
            color: #0f1c16;
        }
    </style>
</head>
<body class="py-5 px-3 px-md-5">

    <div class="container-fluid" style="max-width: 1300px;">
        @yield('content')
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>