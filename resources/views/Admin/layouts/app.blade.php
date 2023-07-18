<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="http://localhost:8000/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://localhost:8000/dist/css/adminlte.min.css">


    <style>
      table{}
      table tbody tr td:last-child form{ display:inline-block;}
    </style>

</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        @include('Admin.layouts.header')
        @include('Admin.layouts.sidebar')
       @yield('content')
        @include('Admin.layouts.footer')
    </div>
</body>

</html>
