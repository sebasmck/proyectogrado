<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('partials.head')

<body class="menubar-hoverable header-fixed ">

@include('partials.header')
<br>
<br>
<br>
<br>
<br>
@yield('content')

@include('partials.footer')

</body>

</html>