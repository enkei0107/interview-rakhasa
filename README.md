## Getting Started
- requirement
```json
    php :8.2
    database: postgresSql atau mysql
```
- installation
```bash
    # clone this repository
    $ git clone ...

    # copy .env.example ke .env dan setting database

    # install composer
    $ composer install

    # migrate database
    $ php artisan migrate

    # generate jwt secret
    $ php artisan jwt:secret

    # running app 
    $ php artisan serve
```
## Interview test
- Descriptions
```json
Aplikasi REST API untuk manajemen sekolah yang mengatur presensi siswa dan guru menggunakan Laravel adalah sebuah sistem yang memungkinkan pengelolaan data absensi secara efisien dan terintegrasi. Berikut adalah deskripsi dari aplikasi tersebut:
Feature :
# Authentication
    Login : Siswa dan guru authentication login
    Register : Register akun siswa dan guru dilakukan oleh admin sekolah
# Manajemen Presensi
    Presensi Siswa: Mencatat kehadiran siswa setiap hari, termasuk status (hadir, sakit, izin, alfa, terlambat) dan update presensi upload surat izin.
    Presensi Guru: Mencatat kehadiran guru setiap hari status(hadir,alfa)
    Scheduler daily: create presensi untuk guru dan siswa dengan status kehadiran default (alfa)
# Setting
    Presensi: Pengaturan jam hadir untuk presensi (jam awal untuk bisa presensi,jam selesai presensi, max minutes terlambat) dinamis
```
- Test
1. 