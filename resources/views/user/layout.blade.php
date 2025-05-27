<!DOCTYPE html>
<html lang="zxx">
<head>
    @include('user.head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body>

    @include('user.header')

    @yield('content') 

    @include('user.footer')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    @yield('scripts')
</body>
</html>
