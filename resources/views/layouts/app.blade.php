<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>物件担当者割り当て管理アプリ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])  {{-- Vite を使っている場合 --}}
</head>
<body>
    <div class="container">
        @yield('content') {{-- 各ビューのコンテンツがここに挿入される --}}
    </div>
</body>
</html>
