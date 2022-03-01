<p align="center">PT DOT Internship Backend(Laravel) Challenge</p>

## Penjelasan Project

Project ini adalah aplikasi berbasis website dinamis menggunakan framework laravel. Aplikasi ini menyediakan data daerah lokal Indonesia, aplikasi ini mempunyai fitur CRUD seecara front-end maupun menggunakan REST API.

## Desain Database

Ini adalah desain database dari aplikasi ini.

<img src="https://i.ibb.co/ZdzhXRh/download-1.png" width="900" height="650">

Penjelasan relasi :
- Tabel countries mempunyai relasi hasMany terhadap tabel provinces.
- Tabel provinces mempunyai relasi belongsTo terhadap tabel countries.
- Tabel provinces mempunyai relasi hasMany terhadap tabel regencies.
- Tabel regencies mempunyai relasi belongsTo terhadap tabel provinces

## Screnshoot Aplikasi

Berikut adalah screnshoot page aplikasi saya

- Register <img src="https://i.ibb.co/KFVG3qB/register.png" width="1100" height="480">
- Login <img src="https://i.ibb.co/vdBsPyg/login.png" width="1100" height="480">
- Dashboard <img src="https://i.ibb.co/vDxvKtF/dashboard.png" width="1100" height="480">
- Negara <img src="https://i.ibb.co/tYTggQb/negara.png" width="1100" height="480">
- Provinsi <img src="https://i.ibb.co/hc1vVQ9/provinsi.png" width="1100" height="480">
- Tambah data provinsi <img src="https://i.ibb.co/nzCLWwZ/add-provinsi.png" width="1100" height="480">
- Introduction dokumentasi <img src="https://i.ibb.co/gPt4zDY/intro-docs.png" width="1100" height="480">
- Dokumentasi API negara <img src="https://i.ibb.co/qdXJGPK/negara-docs.png" width="1100" height="480">
- Dokumentasi API provinsi <img src="https://i.ibb.co/09tnf5h/provinsi-docs.png" width="1100" height="480">

## Dependensi

Dependensi yang saya gunakan adalah
- laravel/ui yang saya gunakan untuk membuat tampilan dan routes untuk fitur auth

## Informasi Lain

Untuk database saya menggunakan seeder dari package github azishapidin/indoregion. Cara penginstallan package tersebut sebagai berikut
- Buka command line dan ketikkan "composer require azishapidin/indoregion"
- Lalu ketik "php artisan indoregion:publish" untuk menyalin file migration, model dan seeder ke aplikasi laravel
- Kemudian ketik "composer dump-autoload" untuk mencari semua class dan file yang perlu di include lagi
- Ketik "php artisan db:seed --class=IndoRegionProvinceSeeder" untuk seeder tabel provinces
- Ketik "php artisan db:seed --class=IndoRegionRegencySeeder" untuk seeder tabel regencies
