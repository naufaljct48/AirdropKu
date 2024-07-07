# AirdropKu

AirdropKu adalah aplikasi untuk mengelola reminder airdrop. Dibangun dengan CodeIgniter 3 dan menggunakan Circl Admin Bootstrap 5 untuk antarmuka pengguna.

## Fitur

- **Login**: Pengguna dapat masuk ke akun mereka dengan keamanan yang ditingkatkan menggunakan enkripsi/hashing untuk kata sandi.
- **Register**: Pengguna baru dapat membuat akun untuk mengakses aplikasi.
- **Add Airdrop**: Menambahkan detail airdrop baru ke dalam sistem.
- **List Airdrop**: Melihat daftar airdrop yang telah ditambahkan.
- **Settings**: Mengelola pengaturan aplikasi.

## Penggunaan Database

Aplikasi ini tidak menggunakan database SQL tradisional. Data airdrop dan akun pengguna disimpan dalam format JSON. Password pengguna dienkripsi atau dihash sebelum disimpan untuk keamanan tambahan.

## Teknologi Utama

- **CodeIgniter 3**: Framework PHP untuk pengembangan aplikasi web.
- **Circl Admin Bootstrap 5**: Template admin responsif yang dibangun di atas Bootstrap 5.

## Instalasi

Untuk menjalankan aplikasi ini, pastikan telah mengatur lingkungan pengembangan PHP (seperti XAMPP, WAMP, atau server sejenis) dan mengikuti langkah-langkah berikut:

1. Clone repositori ini.
2. Sesuaikan konfigurasi aplikasi seperti base URL di `application/config/config.php`.
3. Pastikan PHP dapat menulis ke folder `application/data/` untuk menyimpan file JSON.
4. Buka aplikasi di browser Anda.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan buat pull request dengan perubahan yang diusulkan.

## Lisensi

Diprogram di bawah [MIT License](https://opensource.org/licenses/MIT).
