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
Aplikasi REST API untuk manajemen sekolah yang mengatur presensi siswa dan guru menggunakan Laravel adalah sebuah sistem yang memungkinkan pengelolaan data absensi secara efisien dan terintegrasi. Berikut adalah deskripsi dari aplikasi tersebut:
Feature :
#### Authentication
    Login : Siswa dan guru authentication login
    Register : Register akun siswa dan guru dilakukan oleh admin sekolah
#### Manajemen Presensi
    Presensi Siswa: Mencatat kehadiran siswa setiap hari, termasuk status (hadir, sakit, izin, alfa, terlambat) dan update presensi upload surat izin.
    Presensi Guru: Mencatat kehadiran guru setiap hari status(hadir,alfa)
    Scheduler daily: create presensi untuk guru dan siswa dengan status kehadiran default (alfa)
#### Setting
    Presensi: Pengaturan jam hadir untuk presensi (jam awal untuk bisa presensi,jam selesai presensi, max minutes terlambat) dinamis
- Test

    1. Fixing Modules/BackOffice/Http/Controllers/SettingController.php method Store untuk create setting. tabel setting digunakan sebagai config
    2. Fixing Modules/BackOffice/Http/Controllers/SettingController.php method index . menampilkan semua data ditabel setting mengguanakan pagination dan filter by key
    3. Fixing app/Providers/SettingProvider.php load semua setting ke dalam config , set config dari kolom key dan set value config dari kolom setting.
    4. Buatlah scheduler perhari untuk membuat default data presensi siswa dan guru dengan status awal tidak hadir pada tabel attendance.
    [note jangan sampai ad duplikasi perhari ada data presensi siswa yang sama]
    5. Fixing Modules/FrontOffice/Http/Controllers/AttendanceController.php buatlah API untuk mengatur presensi guru dan siswa dengan ketentuan dibawah ini:
    - jam presensi hanya bisa dilakukan dari dan 05:30 AM - 07:00 AM
    - keterlambatan presensi 30 menit dari jam 07:00 AM selebihnya siswa dan guru tidak bisa melakukan presensi
    - jika data default presensi peruser hari ini tidak ada return data presensi belum ada mohon konfirmasi ke admin
    - jika presensi sudah dilakukan return kamu sudah melakukan presensi
    - untuk guru status presensi tidak ada terlambat
    - semua setting jam menggunakan config yang di load dari table setting example(config('jam mulai belajar'))
 