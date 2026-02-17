<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
    <meta name="theme-color" content="#7BBEFD">

    <title>{{ $title ?? 'Adelitas Way' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap">
    </noscript>

    @vite(['resources/css/app.css'])

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WBDKL43Q');
    </script>
    <!-- End Google Tag Manager -->
</head>
<body class="antialiased">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBDKL43Q"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <nav x-data="{ open: false, scrolled: false }"
         @scroll.window="scrolled = window.scrollY > 60"
         :class="scrolled ? 'bg-black/95 backdrop-blur-md border-b border-white/10 shadow-lg' : 'bg-gradient-to-b from-black/80 to-transparent'"
         class="fixed w-full top-0 z-50 transition-all duration-500">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-[70px]">
            <a href="{{ route('home') }}" class="shrink-0">
                <img src="{{ asset('images/adelitas_way_icon.png') }}" alt="Adelitas Way" width="52" height="52" class="opacity-90 hover:opacity-100 transition-opacity">
            </a>
            <button @click="open = !open"
                    class="lg:hidden text-white/70 hover:text-white p-1.5 transition-colors focus:outline-none"
                    aria-label="Toggle navigation">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="hidden lg:flex items-center gap-8">
                <a href="#about" class="nav-link">ABOUT</a>
                <a href="#tour" class="nav-link">TOUR</a>
                <a href="https://merch.adelitaswaymusic.com/" target="_blank" class="nav-link">VIP EXCLUSIVES</a>
                <a href="https://adelitaswaymerch.bigcartel.com/" class="nav-link">MERCH</a>
                <a href="#connect" class="nav-link">CONNECT</a>
            </div>
        </div>
        <div x-show="open"
             @click.away="open = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden bg-black/97 backdrop-blur-md px-6 pb-6 border-t border-white/10">
            <a href="#about" @click="open = false" class="mobile-nav-link">ABOUT</a>
            <a href="#tour" @click="open = false" class="mobile-nav-link">TOUR</a>
            <a href="https://merch.adelitaswaymusic.com/" target="_blank" class="mobile-nav-link">VIP EXCLUSIVES</a>
            <a href="https://adelitaswaymerch.bigcartel.com/" class="mobile-nav-link">MERCH</a>
            <a href="#connect" @click="open = false" class="mobile-nav-link">CONNECT</a>
        </div>
    </nav>

    <main>
        @yield('content')

        <footer class="py-10 bg-black border-t border-white/10">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <img src="{{ asset('images/adelitas_way_icon.png') }}" alt="Adelitas Way" width="36" height="36" class="mx-auto mb-5 opacity-30">
                <p class="text-white/50 text-xs tracking-[0.25em] uppercase mb-1">&copy; {{ date('Y') }} Adelitas Way. All rights reserved.</p>
                <p class="text-white/35 text-xs tracking-[0.2em] uppercase">Designed &amp; Developed by <a href="https://gnarhard.com" target="_blank" class="hover:text-white/60 transition-colors">gnarhard</a></p>
            </div>
        </footer>
    </main>

    <script src="https://kit.fontawesome.com/fbd2e4f78f.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('scripts')
</body>
</html>
