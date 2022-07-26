# Setda Proper APPS

Aplikasi ini dibuat menggunakan laravel dan di gunakan untuk mengintegrasikan service pada google calendar

## how to install

Copy code dibawah ini kemudian jalankan pada terminal

```
git clone https://github.com/ForYouTeam/SetdaProper.git
```

Lakukan configurasi pada env. Kemudian jalankan seluruh perintah dibawah ini satu persatu

```bash
composer install
php artisan ket:generate
php artisan migrate --seed | php artisan migrate:fresh --seed
```
