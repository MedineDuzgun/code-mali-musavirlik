<!DOCTYPE html>
<html lang="tr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Code Mali Müşavirlik | Teknoloji Girişimcilerinin Mali Müşaviri')</title>
    <meta name="description" content="@yield('description', '2001\'den bu yana yazılım şirketleri, startuplar ve teknokent firmalarına özel mali müşavirlik. Şirket kuruluşu, muhasebe, e-fatura ve vergi danışmanlığı.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-800 antialiased">
    <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-lg font-bold text-slate-900">
                <span class="grid h-9 w-9 place-items-center rounded-lg bg-indigo-600 text-sm font-black text-white">C</span>
                Code<span class="font-normal text-slate-500">Mali Müşavirlik</span>
            </a>
            <nav class="hidden items-center gap-6 text-sm font-medium text-slate-600 md:flex">
                <a href="#hizmetler" class="hover:text-indigo-600">Hizmetler</a>
                <a href="#sirket-turleri" class="hover:text-indigo-600">Şirket Türleri</a>
                <a href="#ekip" class="hover:text-indigo-600">Ekibimiz</a>
                <a href="#blog" class="hover:text-indigo-600">Blog</a>
            </nav>
            <a href="{{ route('sirket.kayit') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">
                Şirket Kur
            </a>
        </div>
    </header>

    @yield('content')

    <footer class="border-t border-slate-800 bg-slate-900 text-slate-300">
        <div class="mx-auto grid max-w-6xl gap-8 px-4 py-12 md:grid-cols-4">
            <div class="md:col-span-2">
                <div class="text-lg font-bold text-white">Code Mali Müşavirlik</div>
                <p class="mt-3 max-w-md text-sm text-slate-400">
                    2001'den bu yana yazılım şirketleri, startuplar ve teknokent firmalarına özel
                    mali müşavirlik. İstanbul'da iki ofis, ülke genelinde uzaktan hizmet.
                </p>
            </div>
            <div>
                <div class="text-sm font-semibold text-white">Hızlı Erişim</div>
                <ul class="mt-3 space-y-2 text-sm text-slate-400">
                    <li><a href="#hizmetler" class="hover:text-white">Şirket Kuruluşu</a></li>
                    <li><a href="#hizmetler" class="hover:text-white">Mali Müşavirlik</a></li>
                    <li><a href="#ekip" class="hover:text-white">Ekibimiz</a></li>
                    <li><a href="#blog" class="hover:text-white">Blog</a></li>
                </ul>
            </div>
            <div>
                <div class="text-sm font-semibold text-white">İletişim</div>
                <ul class="mt-3 space-y-2 text-sm text-slate-400">
                    <li>0 216 599 00 10</li>
                    <li>Ataşehir / Şişli, İstanbul</li>
                    <li>Uzaktan hizmet: tüm Türkiye</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-slate-800 py-5 text-center text-xs text-slate-500">
            © {{ date('Y') }} Code Mali Müşavirlik. Tüm hakları saklıdır. · Staj projesi kopyası.
        </div>
    </footer>
</body>
</html>
