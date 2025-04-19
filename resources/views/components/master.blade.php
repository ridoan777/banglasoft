<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Prescription</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
	<script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC.
		if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
			document.documentElement.classList.add('dark');
		} else {
			document.documentElement.classList.remove('dark')
		}
	</script>

	<!-- Styles -->
	@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/flowbite.js'])

</head>

<body class="antialiased bg-gray-500">
	@yield('content')
	<!-- header -->
	 <x-partials.navbar />
	<!-- header -->
	
	<!-- Container  -->
	 {{ $slot }}
	<!-- Container  -->

	<!-- test bench-->
	<!-- test bench-->


	<!-- <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> -->

</body>

</html>