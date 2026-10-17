@extends('layouts.app')

@section('title', 'Şirket Kaydı | Code Mali Müşavirlik')

@section('content')
    <section class="mx-auto max-w-2xl px-4 py-16">
        <h1 class="text-3xl font-bold text-slate-900">Şirket (Mükellef) Kaydı</h1>
        <p class="mt-2 text-slate-600">
            Bilgilerinizi bırakın, mali müşavirlerimiz sizinle iletişime geçsin.
            Form <code class="rounded bg-slate-100 px-1">POST /api/sirketler</code> ucuna gönderilir.
        </p>

        <div id="sonuc" class="mt-6 hidden rounded-lg border p-4 text-sm"></div>

        <form id="sirket-form" class="mt-8 space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700">Şirket Adı *</label>
                <input name="name" type="text" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500">
                <p class="mt-1 hidden text-xs text-red-600" data-error="name"></p>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700">Vergi Numarası * (10–11 hane)</label>
                <input name="tax_number" type="text" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500">
                <p class="mt-1 hidden text-xs text-red-600" data-error="tax_number"></p>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700">Şirket Türü *</label>
                <select name="company_type" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Seçiniz</option>
                    <option value="sahis">Şahıs Şirketi</option>
                    <option value="limited">Limited Şirket</option>
                    <option value="anonim">Anonim Şirket</option>
                </select>
                <p class="mt-1 hidden text-xs text-red-600" data-error="company_type"></p>
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700">E-posta</label>
                    <input name="email" type="email" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500">
                    <p class="mt-1 hidden text-xs text-red-600" data-error="email"></p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Telefon</label>
                    <input name="phone" type="text" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500">
                    <p class="mt-1 hidden text-xs text-red-600" data-error="phone"></p>
                </div>
            </div>
            <button type="submit" class="rounded-lg bg-indigo-600 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-indigo-700">
                Kaydı Gönder
            </button>
        </form>
    </section>

    <script>
        const form = document.getElementById('sirket-form');
        const sonuc = document.getElementById('sonuc');
        const token = form.querySelector('input[name="_token"]').value;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            document.querySelectorAll('[data-error]').forEach(el => el.classList.add('hidden'));
            sonuc.classList.add('hidden');

            const payload = Object.fromEntries(new FormData(form).entries());
            delete payload._token;

            const res = await fetch('{{ route('sirketler.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': token,
                },
                body: JSON.stringify(payload),
            });

            if (res.status === 201) {
                const data = await res.json();
                sonuc.className = 'mt-6 rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-800';
                sonuc.textContent = '✓ ' + data.message + ' (ID: ' + data.data.id + ')';
                form.reset();
            } else if (res.status === 422) {
                const { errors } = await res.json();
                Object.entries(errors).forEach(([alan, mesajlar]) => {
                    const el = document.querySelector(`[data-error="${alan}"]`);
                    if (el) { el.textContent = mesajlar[0]; el.classList.remove('hidden'); }
                });
                sonuc.className = 'mt-6 rounded-lg border border-red-300 bg-red-50 p-4 text-sm text-red-800';
                sonuc.textContent = 'Lütfen formdaki hataları düzeltin.';
            }
        });
    </script>
@endsection
