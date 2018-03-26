<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('partials.head')

<body class="menubar-hoverable header-fixed ">

@include('partials.header')
	
@yield('content')

@include('partials.footer')

</body>

</html>