# Code Mali Müşavirlik — Kurumsal Site (Laravel)

Mali müşavirlik firması için kurumsal tanıtım sitesi ve müşteri (mükellef)
şirket kayıt yapısı. Staj kapsamında geliştirilen Laravel projesinin yeniden
oluşturulmuş sürümüdür.

## Teknolojiler

- **PHP 8.2** · **Laravel 12**
- **Vite** + **laravel-vite-plugin** (HMR, `refresh: true`, `chunkSizeWarningLimit`)
- **TailwindCSS 4**
- Veritabanı: geliştirmede **SQLite** (sıfır kurulum), üretimde **MySQL**
- Test: **PHPUnit** (`php artisan test`)

## Özellikler

- Kurumsal ana sayfa: hero, şirket türü karşılaştırması (Şahıs / Limited /
  Anonim), hizmetler, ekip, blog, iletişim.
- Müşteri şirket kaydı:
  - `companies` tablosu — `tax_number` **benzersiz**.
  - `employees` tablosu — `company_id` yabancı anahtar, **cascadeOnDelete**,
    `status` enum (`active` / `passive` / `on_leave`).
  - `POST /api/sirketler` ucu: doğrulama hatasında **422**, başarılı kayıtta
    **201** döner.

## Kurulum

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build   # veya geliştirme için: npm run dev
php artisan serve
```

Site: http://127.0.0.1:8000 · Kayıt formu: http://127.0.0.1:8000/kayit

## Test

```bash
php artisan test
```

`CompanyEndpointTest` şunları doğrular:
- Geçersiz veride 422 ve doğrulama hataları.
- Geçerli veride 201 ve veritabanına kayıt.
- `tax_number` benzersizlik kuralı.
