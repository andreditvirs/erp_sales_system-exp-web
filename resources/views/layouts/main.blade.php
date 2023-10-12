<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.components.style');  
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('afterStyle', '');
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('layouts.components.navbar')
      @include('layouts.components.sidebar')
      

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      @include('layouts.components.footer')
    </div>
  </div>
</body>
@include('layouts.components.script');
@yield('afterScript', '');
</html>