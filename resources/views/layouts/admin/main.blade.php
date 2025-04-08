{{-- resources/views/layouts/admin/main.blade.php --}}
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .main-wrapper {
            flex: 1;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            min-height: 100%;
            padding: 1rem;
        }
        .content {
            flex: 1;
            padding: 1.5rem;
        }
        .footer {
            background-color: #f1f1f1;
            padding: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    @include('layouts.admin.comparts.navbar')

    {{-- Sidebar + Main content --}}

        @include('layouts.admin.comparts.slidebar')
        {{-- Main Content --}}
        <div class="content">
            @yield('content')
        </div>
    </div>

    {{-- Footer --}}
   @include('layouts.admin.comparts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
