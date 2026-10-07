# To Do — Kursus Gambar Anak

Website kursus menggambar anak dengan model offline, online, dan hybrid. Cabang: Jakarta Pusat dan Jakarta Selatan. Hybrid berarti sesi offline dan online bergantian, bukan pilihan cara hadir pada sesi yang sama.

## Pembagian tim

| Peran | Tanggung jawab |
| --- | --- |
| Leader | Kebutuhan, fondasi data, kontrak antarfitur, hak akses, review, integrasi, dan deployment |
| Tim 1 | Halaman publik, komponen tampilan, katalog kelas, detail jadwal, dan tampilan pendaftaran |
| Tim 2 | Login admin, pengelolaan program/kelas/sesi, proses pendaftaran, dan kuota |

File dan class fitur menggunakan bahasa Indonesia. Sufiks teknis Laravel seperti `Controller`, `Factory`, `Seeder`, dan `Test` tetap digunakan. Nama tabel dan migrasi yang telah dijalankan dipertahankan.

## 1. Fondasi — Leader

- [x] Verifikasi PHP, Composer, Laravel, dan Laravel Boost.
- [x] Siapkan model, relasi, migration, dan factory untuk cabang, program, kelas, sesi, dan pendaftaran.
- [x] Buat database lokal dan jalankan migration.
- [x] Isi cabang Jakarta Pusat dan Jakarta Selatan tanpa alamat atau kontak rekaan.
- [x] Terapkan validasi jadwal offline, online, dan hybrid yang bergantian.
- [x] Tolak jadwal bertumpuk, waktu selesai yang tidak valid, dan pembuatan ulang jadwal yang sudah tersedia.
- [x] Simpan waktu sesi dalam UTC dengan masukan jadwal Asia/Jakarta.
- [x] Sembunyikan data pribadi pendaftar dan tautan pertemuan dari serialisasi model.
- [x] Gunakan penamaan file dan class fitur dalam bahasa Indonesia.
- [x] Jalankan formatter dan pengujian: 17 tes, 45 assertion lulus pada verifikasi terakhir.
- [x] Inisialisasi Git dan siapkan repositori bersama: https://github.com/inifauzan-maker/website.
- [ ] Tetapkan aturan branch fitur, pull request, review, dan penggabungan ke `main`.
- [ ] Bagikan `.env.example` yang sesuai tanpa kredensial; setiap anggota memakai database lokal sendiri.
- [ ] Selesaikan masalah runtime/sandbox Codex; pemeriksaan sebelumnya menggunakan izin eksekusi tambahan.

## 2. Data bisnis dan kontrak fitur — Leader

Selesaikan sebelum Tim 1 dan Tim 2 menghubungkan fitur ke data nyata.

- [ ] Konfirmasi nama merek final, logo, warna, dan gaya tampilan.
- [ ] Kumpulkan alamat, kontak, dan tautan peta kedua cabang.
- [ ] Tentukan nama program, kelompok usia, tingkat kemampuan, dan deskripsi.
- [ ] Tentukan pengajar, biaya per kelas, jumlah sesi, jadwal, dan kuota.
- [ ] Tentukan apakah sesi pertama hybrid selalu offline atau boleh online; fondasi saat ini menerima keduanya.
- [ ] Tentukan platform pertemuan online dan cara membagikan tautan kepada peserta terkonfirmasi.
- [ ] Tentukan aturan pembatalan, penjadwalan ulang, dan pembayaran manual.
- [ ] Sepakati route bernama, field formulir, pesan validasi, dan hasil proses pendaftaran.
- [ ] Sepakati status pendaftaran: `pending`, `confirmed`, dan `cancelled`, beserta perpindahan status yang diizinkan.
- [ ] Tentukan bahwa pendaftaran berlaku untuk seluruh sesi dan kuota dihitung per kelas.
- [ ] Tetapkan hak akses admin pusat dan admin cabang; akun orang tua belum termasuk MVP.
- [ ] Sepakati komponen bersama dan pemilik file yang digunakan kedua tim.

## 3. Website publik — Tim 1

Dapat dikerjakan setelah desain dan kontrak fitur disepakati. Gunakan Blade dan Tailwind yang tersedia di proyek.

- [ ] Buat layout bersama, navigasi, footer, tombol, kartu kelas, dan komponen formulir.
- [x] Buat tampilan awal beranda: pengenalan kursus, model belajar, dan cabang. Ajakan saat ini mengarah ke informasi belajar; pendaftaran menunggu kelas dibuka.
- [ ] Buat halaman program dan detail program sesuai kelompok usia.
- [ ] Buat halaman kedua cabang dengan alamat, kontak, dan peta yang sudah dikonfirmasi.
- [ ] Buat katalog kelas dengan filter cabang dan model belajar.
- [ ] Tampilkan hanya kelas yang dipublikasikan.
- [ ] Buat detail kelas: program, cabang, pengajar, biaya, kuota, dan seluruh sesi.
- [ ] Tampilkan label offline/online serta lokasi dan waktu WIB untuk setiap sesi hybrid.
- [ ] Pastikan tautan pertemuan tidak tampil pada halaman publik.
- [ ] Buat formulir nama anak, usia anak, nama orang tua, WhatsApp, email opsional, dan kelas pilihan.
- [ ] Tampilkan kesalahan formulir, pertahankan masukan, dan tampilkan hasil pendaftaran.
- [ ] Buat halaman kontak dan galeri menggunakan materi yang sudah diizinkan untuk dipublikasikan.
- [ ] Lengkapi tampilan kosong saat belum ada kelas dan tampilan kelas penuh.
- [ ] Periksa tampilan ponsel, akses keyboard, label input, kontras, dan judul halaman.

## 4. Pendaftaran dan panel admin — Tim 2

Fondasi saat ini belum menyediakan endpoint pendaftaran, login admin, panel admin, atau penegakan kuota.

- [ ] Buat login, logout, dan pengelolaan akun admin tanpa akun contoh atau password bawaan.
- [ ] Buat peran admin pusat dan admin cabang beserta pembatasan akses data di server.
- [ ] Buat pengelolaan cabang, program, dan kelas.
- [ ] Validasi usia minimum/maksimum program, harga, dan kuota sebelum menyimpan data.
- [ ] Buat pengelolaan sesi dengan aturan jadwal yang sudah tersedia pada `JadwalKelas`.
- [ ] Buat alur perubahan jadwal secara eksplisit; fondasi saat ini hanya membuat jadwal awal.
- [ ] Cegah publikasi kelas yang belum memiliki data dan jadwal lengkap.
- [ ] Buat Form Request dan endpoint untuk menyimpan pendaftaran berstatus `pending`.
- [ ] Validasi usia anak terhadap program dan tolak kelas yang belum dipublikasikan.
- [ ] Terapkan CSRF dan pembatasan frekuensi pengiriman formulir.
- [ ] Buat daftar, filter, dan detail pendaftar sesuai cabang admin.
- [ ] Buat proses konfirmasi dan pembatalan pendaftaran.
- [ ] Terapkan transaksi dan penguncian saat konfirmasi agar peserta terkonfirmasi tidak melebihi kuota.
- [ ] Pastikan status dan kelas tidak bisa diubah melalui masukan formulir publik.
- [ ] Siapkan tindak lanjut WhatsApp manual dan pencatatan konfirmasi pembayaran manual.
- [ ] Batasi akses tautan pertemuan pada admin yang berwenang dan peserta terkonfirmasi.
- [ ] Hindari data pribadi anak dalam halaman publik, log, dan respons yang tidak memerlukannya.

## 5. Integrasi dan pengujian — Leader + kedua tim

- [ ] Hubungkan katalog dan detail kelas Tim 1 ke data yang dikelola Tim 2.
- [ ] Hubungkan formulir publik ke endpoint pendaftaran.
- [ ] Uji alur lengkap: pilih kelas → daftar → data terlihat oleh admin → konfirmasi.
- [ ] Uji semua model belajar dan kedua cabang.
- [ ] Uji admin cabang tidak dapat membaca atau mengubah data cabang lain, termasuk melalui URL langsung.
- [ ] Uji kelas belum dipublikasikan, kelas penuh, masukan tidak valid, serta pengiriman berulang.
- [ ] Uji konfirmasi bersamaan tidak melebihi kuota dan pembatalan mengembalikan kursi.
- [ ] Uji perubahan jadwal tidak merusak data pendaftaran dan tetap mengikuti aturan hybrid.
- [ ] Uji tautan pertemuan dan data pribadi tidak bocor ke halaman publik.
- [ ] Periksa query berulang, gunakan eager loading, dan tambahkan pagination pada daftar admin.
- [ ] Jalankan pengujian, formatter, dan build frontend sebelum integrasi.
- [ ] Review pull request oleh anggota lain; leader menggabungkan setelah pemeriksaan lulus.

## 6. Staging dan rilis — Leader

- [ ] Pilih hosting, domain, dan lingkungan staging.
- [ ] Siapkan konfigurasi produksi, HTTPS, database, serta pengelolaan kredensial.
- [ ] Matikan debug produksi dan pastikan `.env` tidak dapat diakses publik.
- [ ] Siapkan backup database, pemulihan, pencatatan error, dan prosedur rollback aplikasi.
- [ ] Jalankan migration dan build melalui proses deployment yang disepakati.
- [ ] Masukkan data program, kelas, jadwal, dan konten asli; hindari data contoh di produksi.
- [ ] Lakukan uji penerimaan bersama admin kedua cabang melalui ponsel dan desktop.
- [ ] Leader menyetujui rilis setelah kriteria MVP terpenuhi.

## Kriteria MVP selesai

- [ ] Orang tua dapat menemukan kelas yang dipublikasikan, memahami seluruh jadwalnya, dan mendaftar dari ponsel.
- [ ] Pendaftaran tersimpan untuk satu kelas beserta seluruh sesinya.
- [ ] Admin dapat menindaklanjuti pendaftar dan mengubah status sesuai kewenangan cabangnya.
- [ ] Konfirmasi peserta tidak melebihi kuota kelas.
- [ ] Jadwal hybrid bergantian offline–online dan lokasi setiap sesi jelas.
- [ ] Data pribadi dan tautan pertemuan hanya tersedia bagi pihak yang berwenang.
- [ ] Pengujian, build, dan uji penerimaan staging selesai.

## Setelah MVP

- [ ] Akun orang tua dan riwayat pendaftaran.
- [ ] Pembayaran online otomatis.
- [ ] Absensi dan laporan perkembangan anak.
- [ ] Pengingat jadwal dan notifikasi otomatis.
- [ ] Unggah karya anak dengan izin orang tua dan pengaturan akses.
- [ ] Laporan operasional per cabang.
