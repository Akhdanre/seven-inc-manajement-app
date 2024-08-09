# Dokumentasi Proyek Manajemen Mahasiswa

## Deskripsi Proyek

Proyek ini adalah aplikasi manajemen mahasiswa yang dirancang untuk memudahkan pengelolaan data mahasiswa di sebuah institusi pendidikan. Aplikasi ini mencakup fitur-fitur seperti pendaftaran mahasiswa, manajemen data mahasiswa, dan laporan.

## Panduan Penggunaan Database

Database dapat diakses dengan menggunakan file SQL yang terdapat di folder `database/si_manajemen.sql`.  
atau menggunakan perintah di bawah dengan catatan harus membuat kelas dengan id 0 secara manual untuk menampung dosen dan mahaiswa yang belum memilki kelas 

```bash
php artisan migrate --seed
