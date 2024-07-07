## AirdropKu

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

## Screenshot
![Screenshot 2024-07-07 135104](https://github.com/naufaljct48/AirdropKu/assets/30202760/9b7ff3df-2538-427d-8260-b8b0c738bc2f)
![Screenshot 2024-07-07 135116](https://github.com/naufaljct48/AirdropKu/assets/30202760/6e5999d3-adff-4465-b078-0b329b024938)
![Screenshot 2024-07-07 135130](https://github.com/naufaljct48/AirdropKu/assets/30202760/bfb6288a-6046-46c4-a43e-8c2edbe1ca85)
![Screenshot 2024-07-07 135139](https://github.com/naufaljct48/AirdropKu/assets/30202760/b2f17f56-8aa1-4f5d-8359-5cd4e060c652)
![Screenshot 2024-07-07 135148](https://github.com/naufaljct48/AirdropKu/assets/30202760/68cadd84-d0cb-4919-8693-36f3e6cf548b)
![Screenshot 2024-07-07 135204](https://github.com/naufaljct48/AirdropKu/assets/30202760/39461c7c-2eab-4c30-9894-15fd27bab0c0)
![Screenshot 2024-07-07 135213](https://github.com/naufaljct48/AirdropKu/assets/30202760/5138ef18-6593-4c62-8929-f537bb7138a0)
![Screenshot 2024-07-07 135226](https://github.com/naufaljct48/AirdropKu/assets/30202760/63b049cb-921c-4598-881f-c5f53ee88e77)

## Lisensi

Diprogram di bawah [MIT License](https://opensource.org/licenses/MIT).
