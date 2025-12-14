# Lab10Web - Pemrograman Web 2 (PHP OOP)

**Nama** : Tiara Hayatul Khoir

**NIM** : 312410474

**Kelas** : TI.24.A5

## 📝 Deskripsi
Repository ini berisi hasil **Praktikum 10** mengenai dasar-dasar **Object Oriented Programming (OOP)** pada PHP. Proyek ini mencakup pembuatan Class, Object, penggunaan Class Library, serta implementasi sistem **CRUD (Create, Read, Update, Delete)** sederhana dengan koneksi database MySQLi berbasis OOP.

Pada proyek ini, tampilan antarmuka (UI) dikembangkan menggunakan **Bootstrap 5** dengan tema **Modern Blue/Professional** untuk memberikan kesan yang bersih dan responsif.

---

## 📂 Struktur Folder
Berikut adalah struktur file dalam proyek ini:

```text
lab10_php_oop/
├── config.php            # Konfigurasi koneksi database
├── database.php          # Class Database (Koneksi & Method CRUD)
├── mobil.php             # Latihan Dasar OOP (Class Mobil)
├── form.php              # Latihan Class Library (Class Form)
├── form_input.php        # Implementasi penggunaan Class Form
├── layout.php            # Template Layout (Sidebar & Header)
├── dashboard.php         # Halaman Utama (Dashboard)
├── list_mahasiswa.php    # Read Data (Menampilkan Tabel Mahasiswa)
├── proses_input.php      # Proses Insert Data
├── edit_mahasiswa.php    # Form Update Data
├── proses_edit.php       # Proses Update Data
└── delete_mahasiswa.php  # Proses Delete Data
````

-----

## 🚀 Langkah-Langkah Praktikum

### 1\. Dasar OOP (Class & Object)

File: `mobil.php`  
Membuat class `Mobil` dengan properti warna, merk, harga, serta method untuk mengganti warna dan menampilkan informasi.

**Kode:**

```php
class Mobil {
    private $warna;
    private $merk;
    private $harga;
    // ... method construct, gantiWarna, tampilInfo
}
$mobil1 = new Mobil();
$mobil1->gantiWarna("Putih");
```

**Output:**

> ![mobil](https://github.com/tir890/Lab10Web/blob/eb87e5ed77cbc5b87fb691633d281199839fceec/image.png)

-----

### 2\. Class Library (Modularisasi Form)

File: `form.php` & `form_input.php`  
Membuat class `Form` untuk men-generate elemen form HTML secara dinamis, sehingga penulisan form menjadi lebih efisien.

**Output:** 

> ![html](https://github.com/tir890/Lab10Web/blob/aea0f7c5c3e9f7e35beced1d9ede07133b7ca6fc/html-form-web10.jpeg)
-----

### 3\. Implementasi CRUD dengan OOP

#### A. Class Database

File: `database.php`  
Class ini menangani koneksi ke database dan operasi CRUD.

  - `__construct()`: Koneksi ke database.
  - `query()`: Menjalankan query SQL manual.
  - `get()`: Mengambil data (SELECT).
  - `insert()`: Menambah data (INSERT).
  - `update()`: Mengubah data (UPDATE).
  - `delete()`: Menghapus data (DELETE).

#### B. Tampilan Dashboard

File: `dashboard.php`  
Menampilkan ringkasan jumlah data mahasiswa dengan tampilan Card Bootstrap.

**Output:**

> ![dashboard](https://github.com/tir890/Lab10Web/blob/4e4544007dcc3f3cfbd1bcb35eadd34e49b77d6a/dashboard-web10.jpeg)

#### C. Read Data (Menampilkan Data)

File: `list_mahasiswa.php`  
Menampilkan data mahasiswa dalam bentuk tabel yang terintegrasi dengan `layout.php`.

**Output:** \> 

> ![read data](https://github.com/tir890/Lab10Web/blob/2bf6f4d5646e31fcde8517c326b0bb624870a710/data-web10.jpeg)

#### D. Create Data (Input Data)

File: `form_input.php` (Dimodifikasi untuk insert) & `proses_input.php`  
Form input data mahasiswa baru.

**Output:** \> 

> ![form input](https://github.com/tir890/Lab10Web/blob/13b52f4de2a930bfb765007556b1da38b2523a92/input-web10.jpeg)

#### E. Update Data (Edit Data)

File: `edit_mahasiswa.php` & `proses_edit.php`  
Form untuk mengedit data mahasiswa berdasarkan NIM yang dipilih.

**Output:** \> 

> *(Screenshot form edit)*

-----

## 🎨 Tampilan UI (Layout)

Menggunakan **Bootstrap 5** dengan kustomisasi CSS pada `layout.php`.

  - **Sidebar**: Navigasi tetap di sebelah kiri dengan warna gelap (`#2c3e50`).
  - **Content**: Area konten dinamis di sebelah kanan dengan background bersih.
  - **Responsif**: Tampilan menyesuaikan ukuran layar.

-----

## ✅ Kesimpulan

Praktikum ini berhasil mengimplementasikan konsep OOP pada PHP untuk membangun aplikasi CRUD sederhana yang modular, mudah dikelola, dan memiliki tampilan antarmuka yang modern.

```
