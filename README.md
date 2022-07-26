### Instalasi

- Clone repository

```
git clone git@gitlab.com:yuda-dev/evoting.git
```

- Copy .env.example

Pastikan .env.example ada dalam folder aplikasi. Kemudian rename file tersebut menjadi .env. Untuk pengguna macOS
ataupun GNU/Linux, jalankan perintah dibawah pada console terminal

```
cp .env.example .env
```

Untuk Windows OS jalankan perintah pada cmd

```
copy .env.example .env
```

- Composer

Pastikan composer telah terpasang pada lokal development Anda. Laravel membutuhkan composer untuk instalasi dependensi
atau library yang dibutuhkan. Pastikan jalankan perintah di bawah sebelum memulai development.

```
composer install
```

- Generate Key

Jalankan perintah dibawah untuk menggenerate key pada file .env. Key dibutuhkan untuk proses enkripsi data sensitif pada
laravel seperti Cookies atau Session.

```
php artisan key:generate
```

- Konfigurasi Database

Buka .env lalu arahkan database ke lokal masing-masing.

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=<NAMA DATABASE>
DB_USERNAME=<USERNAME>
DB_PASSWORD=<PASSWORD>
```

- Run migrations and seeder

```
php artisan migrate
```

```
php artisan db:seed
```

Pastikan jalankan composer dump autoload untuk mengupdate class cache.

```
composer dump-autoload
```

- Jalankan mesin MySQL dan start server.

```
sudo service mysql start
php artisan serve
```

- Jika Error Laravel PackageManifest.php: Undefined index: name

Try this, it is worked for me, in following file:

vendor/laravel/framework/src/Illuminate/Foundation/PackageManifest.php
Find this line and comment it

$packages = json_decode($this->files->get($path), true);
Add two new lines after above commented line

```
$installed = json_decode($this->files->get($path), true);
$packages = $installed['packages'] ?? $installed;
```

- ScreenShot dan video


![Screenshot](/public/frontend/kominfo--pp.png)

[![Watch the video](https://i.imgur.com/vKb2F1B.png)](https://www.youtube.com/watch?v=xEIDp8w644g&feature=youtu.be)



