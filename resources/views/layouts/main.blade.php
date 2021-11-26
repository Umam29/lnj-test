<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.components.header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('layouts.components.navbar')

  @include('layouts.components.sidebar')

  @yield('content')

  @include('layouts.components.footer')
</body>
</html>
