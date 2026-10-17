@extends('layouts.app')

@section('content')
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-white">
        <div class="mx-auto max-w-6xl px-4 py-20 md:py-28">
            <p class="mb-4 inline-flex rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">
                2001'den bu yana · binlerce kuruluş · İstanbul
            </p>
            <h1 class="max-w-3xl text-4xl font-black leading-tight tracking-tight text-slate-900 md:text-6xl">
                Şirketinizi Kuruyoruz.<br>
                <span class="text-indigo-600">Büyürken Yanınızda Oluyoruz.</span>
            </h1>
            <p class="mt-6 max-w-2xl text-lg text-slate-600">
                Hangi şirket türünün size uygun olduğunu bilmiyorsanız, birlikte karar verelim.
                Limited'den şahısa, teknopark'tan startup'a — baştan sona yanınızdayız.
            </p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('sirket.kayit') }}" class="rounded-lg bg-indigo-600 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-indigo-700">
                    Kuruluş Danışmanlığı Alın
                </a>
                <a href="#hizmetler" class="rounded-lg border border-slate-300 px-6 py-3 font-semibold text-slate-700 transition hover:bg-slate-50">
                    Hizmetlerimizi İncele
                </a>
            </div>
            <div class="mt-8 flex flex-wrap gap-x-8 gap-y-2 text-sm text-slate-500">
                <span>✓ 3 iş gününde kurulum</span>
                <span>✓ Gizli maliyet yok</span>
                <span>✓ Uzaktan hizmet</span>
            </div>
        </div>
    </section>

    {{-- İstatistikler --}}
    <section class="border-y border-slate-200 bg-slate-50">
        <div class="mx-auto grid max-w-6xl grid-cols-2 gap-6 px-4 py-12 md:grid-cols-3">
            @foreach ([['4', 'Mali Müşavir'], ['25 Yıl', 'Sektör Deneyimi'], ['550+', 'Aktif Mükellef']] as [$value, $label])
                <div class="text-center">
                    <div class="text-3xl font-black text-indigo-600 md:text-4xl">{{ $value }}</div>
                    <div class="mt-1 text-sm text-slate-500">{{ $label }}</div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Şirket türleri --}}
    <section id="sirket-turleri" class="mx-auto max-w-6xl px-4 py-20">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold text-slate-900">Hangi Şirket Türü Size Uygun?</h2>
            <p class="mt-3 text-slate-600">Biz şirketinizi kuralım, siz işinize odaklanın. Üç şirket türünü karşılaştırın.</p>
        </div>
        <div class="mt-12 grid gap-6 md:grid-cols-3">
            @php
                $turler = [
                    ['Şahıs Şirketi', 'Freelancer & Bireysel', '1 iş günü', 'Sermaye gerekmez', '~1.500 TL', false],
                    ['Limited Şirket', 'Startup & Teknoloji', '2–3 iş günü', 'Min. 50.000 TL', '~17.500 TL', true],
                    ['Anonim Şirket', 'Yatırım & Büyüme', '2–3 iş günü', 'Min. 250.000 TL', '~19.500 TL', false],
                ];
            @endphp
            @foreach ($turler as [$ad, $kime, $sure, $sermaye, $maliyet, $populer])
                <div class="relative rounded-2xl border bg-white p-6 shadow-sm {{ $populer ? 'border-indigo-500 ring-2 ring-indigo-200' : 'border-slate-200' }}">
                    @if ($populer)
                        <span class="absolute -top-3 left-6 rounded-full bg-indigo-600 px-3 py-1 text-xs font-semibold text-white">En Popüler</span>
                    @endif
                    <h3 class="text-xl font-bold text-slate-900">{{ $ad }}</h3>
                    <p class="mt-1 text-sm text-slate-500">{{ $kime }}</p>
                    <dl class="mt-6 space-y-3 text-sm">
                        <div class="flex justify-between"><dt class="text-slate-500">Kuruluş süresi</dt><dd class="font-semibold text-slate-800">{{ $sure }}</dd></div>
                        <div class="flex justify-between"><dt class="text-slate-500">Min. sermaye</dt><dd class="font-semibold text-slate-800">{{ $sermaye }}</dd></div>
                        <div class="flex justify-between"><dt class="text-slate-500">Tahmini maliyet</dt><dd class="font-semibold text-slate-800">{{ $maliyet }}</dd></div>
                    </dl>
                    <a href="{{ route('sirket.kayit') }}" class="mt-6 block rounded-lg px-4 py-2.5 text-center text-sm font-semibold transition {{ $populer ? 'bg-indigo-600 text-white hover:bg-indigo-700' : 'border border-slate-300 text-slate-700 hover:bg-slate-50' }}">
                        {{ $ad }} Kur
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Hizmetler --}}
    <section id="hizmetler" class="bg-slate-50 py-20">
        <div class="mx-auto max-w-6xl px-4">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold text-slate-900">Tek Çatı Altında Tüm Mali Hizmetler</h2>
                <p class="mt-3 text-slate-600">Kuruluştan muhasebeye, e-faturadan bordro yönetimine kadar yanınızdayız.</p>
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @php
                    $hizmetler = [
                        ['Şirket Kuruluşu', 'Şahıs, Limited veya Anonim kurulum. 3 iş gününde tamamlanır.'],
                        ['Mali Müşavirlik', 'Tam kapsamlı muhasebe, aylık beyanname ve vergi danışmanlığı.'],
                        ['e-Fatura & e-Defter', 'Elektronik fatura sistemi ve bulut muhasebe entegrasyonu.'],
                        ['Bordro & SGK', 'Personel sözleşmeleri, maaş bordrosu ve SGK bildirimleri.'],
                        ['Vergi Danışmanlığı', 'Kurumlar vergisi, KDV optimizasyonu ve vergi iadesi.'],
                        ['Teknopark & Ar-Ge', 'Teknokent girişi, Ar-Ge teşvikleri ve tekno-girişim belgesi.'],
                        ['Startup & Yatırım', 'Yatırım süreçleri, due diligence ve şirketleşme danışmanlığı.'],
                        ['Dijital Dönüşüm', 'Bulut muhasebe kurulumu ve dijital süreç optimizasyonu.'],
                    ];
                @endphp
                @foreach ($hizmetler as [$baslik, $aciklama])
                    <div class="rounded-xl border border-slate-200 bg-white p-5 transition hover:-translate-y-1 hover:shadow-md">
                        <div class="mb-3 grid h-10 w-10 place-items-center rounded-lg bg-indigo-50 font-bold text-indigo-600">★</div>
                        <h3 class="font-semibold text-slate-900">{{ $baslik }}</h3>
                        <p class="mt-2 text-sm text-slate-500">{{ $aciklama }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Ekip --}}
    <section id="ekip" class="mx-auto max-w-6xl px-4 py-20">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold text-slate-900">Kurucularımız</h2>
            <p class="mt-3 text-slate-600">Her biri kendi alanında uzman 3 kurucu ortak.</p>
        </div>
        <div class="mt-12 grid gap-6 md:grid-cols-3">
            @php
                $ekip = [
                    ['Ali ARICI', 'Kurucu Ortak', 'Mali Müşavir & Bağımsız Denetçi'],
                    ['Cenk BATUR', 'Kurucu Ortak & CEO', 'Mali Müşavir · Teknopark'],
                    ['Furkan Şevki ARICI', 'Kurucu Ortak', 'Mali Müşavir & Yazılım Geliştirici'],
                ];
            @endphp
            @foreach ($ekip as [$isim, $unvan, $alan])
                <div class="rounded-2xl border border-slate-200 bg-white p-6 text-center shadow-sm">
                    <div class="mx-auto grid h-16 w-16 place-items-center rounded-full bg-indigo-100 text-xl font-bold text-indigo-700">
                        {{ mb_substr($isim, 0, 1) }}
                    </div>
                    <h3 class="mt-4 font-bold text-slate-900">{{ $isim }}</h3>
                    <p class="text-sm font-medium text-indigo-600">{{ $unvan }}</p>
                    <p class="mt-1 text-sm text-slate-500">{{ $alan }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Blog --}}
    <section id="blog" class="bg-slate-50 py-20">
        <div class="mx-auto max-w-6xl px-4">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold text-slate-900">Güncel Mali Bilgiler</h2>
                <p class="mt-3 text-slate-600">Uzman kadromuzdan vergi, muhasebe ve şirket kuruluşu içerikleri.</p>
            </div>
            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @php
                    $yazilar = [
                        ['Mali Müşavirlik', 'Borçlandırmaya Dayalı Kitle Fonlama', 'Vekâlet, mülkiyet, fatura akışı ve KDV başlıklarını açıklıyoruz.'],
                        ['Dijital Dönüşüm', 'Mali Müşavirin 2027 Gelir Modeli', 'Beyanname yerine karar desteği satan mali müşavir modeli.'],
                        ['Vergi Mevzuatı', 'Influencer Vergi İstisnası 2026', 'GVK mükerrer 20/B şartları, hasılat sınırı ve tevkifat.'],
                    ];
                @endphp
                @foreach ($yazilar as [$kategori, $baslik, $ozet])
                    <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">
                        <div class="h-32 bg-gradient-to-br from-indigo-500 to-indigo-700"></div>
                        <div class="p-5">
                            <span class="rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-semibold text-indigo-700">{{ $kategori }}</span>
                            <h3 class="mt-3 font-bold text-slate-900">{{ $baslik }}</h3>
                            <p class="mt-2 text-sm text-slate-500">{{ $ozet }}</p>
                            <span class="mt-4 inline-block text-sm font-semibold text-indigo-600">Devamını Oku →</span>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-indigo-600">
        <div class="mx-auto max-w-4xl px-4 py-16 text-center">
            <h2 class="text-3xl font-bold text-white">Şirket Kurmaya Hazır Mısınız?</h2>
            <p class="mt-3 text-indigo-100">İlk adımı birlikte atalım. Formu doldurun, 1 iş günü içinde dönelim.</p>
            <a href="{{ route('sirket.kayit') }}" class="mt-8 inline-block rounded-lg bg-white px-6 py-3 font-semibold text-indigo-700 shadow-sm transition hover:bg-indigo-50">
                Danışmanlık Al
            </a>
        </div>
    </section>
@endsection
