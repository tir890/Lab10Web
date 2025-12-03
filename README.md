# Praktikum 10: PHP OOP (Object Oriented Programming)

**Nama:** Tiara HAyatul Khoir
**NIM:** 312410474
**Kelas:** TI.24.A5

-----

## 📂 Struktur Folder Proyek

Berikut adalah struktur folder untuk **Lab10Web** setelah menerapkan konsep OOP dan Modularisasi (referensi dari Lab 9):

```text
lab10_php_oop/
├── .git/
├── README.md
├── config/
│   └── database.php      <-- Class Database (Koneksi & Query OOP)
├── template/
│   ├── header.php
│   └── footer.php
├── modules/
│   ├── user/
│   │   ├── list.php      <-- Read Data (menggunakan Class Database)
│   │   ├── add.php       <-- Create Data (menggunakan Class Database)
│   │   ├── edit.php      <-- Update Data
│   │   └── delete.php    <-- Delete Data
│   └── auth/
│       ├── login.php
│       └── logout.php
├── index.php             <-- Main Controller
├── mobil.php             <-- Latihan Dasar OOP (Class Mobil)
├── form.php              <-- Latihan Class Library (Class Form)
└── form_input.php        <-- Implementasi Class Form
```

-----

## 📝 Langkah-Langkah Praktikum

### 1\. Dasar OOP (Class & Object)

Pada tahap ini, dibuat sebuah file `mobil.php` untuk memahami cara mendefinisikan *Class*, *Property*, *Method*, dan cara membuat *Object*.

**Kode Program (`mobil.php`):**

```php
<?php
/**
 * Program sederhana pendefinisian class dan pemanggilan class.
 **/
class Mobil
{
    private $warna;
    private $merk;
    private $harga;

    public function __construct()
    {
        $this->warna = "Biru";
        $this->merk = "BMW";
        $this->harga = "10000000";
    }

    public function gantiWarna($warnaBaru)
    {
        $this->warna = $warnaBaru;
    }

    public function tampilWarna()
    {
        echo "Warna mobilnya: " . $this->warna;
    }
}

// Membuat objek mobil
$a = new Mobil();
$b = new Mobil();

// Memanggil objek
echo "<b>Mobil pertama</b><br>";
$a->tampilWarna();
echo "<br>Mobil pertama ganti warna<br>";
$a->gantiWarna("Merah");
$a->tampilWarna();

echo "<br><b>Mobil kedua</b><br>";
$b->gantiWarna("Hijau");
$b->tampilWarna();
?>
```

**Hasil Output:**

> [Masukkan Screenshot hasil browser mobil.php di sini]

-----

### 2\. Membuat Class Library (Form)

Membuat class `Form` pada file `form.php` untuk menangani pembuatan elemen form HTML secara dinamis.

**Kode Program (`form.php`):**

```php
<?php
class Form
{
    private $fields = array();
    private $action;
    private $submit = "Submit Form";
    private $jumField = 0;

    public function __construct($action, $submit)
    {
        $this->action = $action;
        $this->submit = $submit;
    }

    public function displayForm()
    {
        echo "<form action='" . $this->action . "' method='POST'>";
        echo "<table width='100%'>";
        for ($j = 0; $j < count($this->fields); $j++) {
            echo "<tr><td align='right'>" . $this->fields[$j]['label'] . "</td>";
            echo "<td><input type='text' name='" . $this->fields[$j]['name'] . "'></td></tr>";
        }
        echo "<tr><td colspan='2'>";
        echo "<input type='submit' value='" . $this->submit . "'></td></tr>";
        echo "</table>";
    }

    public function addField($name, $label)
    {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->jumField++;
    }
}
?>
```

**Implementasi (`form_input.php`):**

```php
<?php
include "form.php";

echo "<html><head><title>Mahasiswa</title></head><body>";
$form = new Form("", "Input Form");
$form->addField("txtnim", "Nim");
$form->addField("txtnama", "Nama");
$form->addField("txtalamat", "Alamat");

echo "<h3>Silahkan isi form berikut ini:</h3>";
$form->displayForm();
echo "</body></html>";
?>
```

**Hasil Output:**

> [Masukkan Screenshot hasil browser form\_input.php di sini]

-----

## 🚀 Tugas: Implementasi OOP pada Proyek CRUD

Tugas ini mengubah kode prosedural pada Praktikum 9 menjadi kode berbasis OOP menggunakan class `Database` untuk koneksi dan manipulasi data.

### 1\. Class Database (`config/database.php`)

Class ini membungkus fungsi koneksi MySQLi dan query dasar (SELECT, INSERT, UPDATE, DELETE).

**Kode Program:**

```php
<?php
class Database {
    protected $host = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $db_name = "latihan1";
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function get($table, $where=null) {
        $sql = "SELECT * FROM " . $table;
        if ($where) {
            $sql .= " WHERE " . $where;
        }
        $result = $this->conn->query($sql);
        // Mengambil semua data ke dalam array
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function insert($table, $data) {
        if (is_array($data)) {
            $columns = implode(",", array_keys($data));
            $values = implode("','", array_values($data)); // Menambahkan petik satu di sekitar value
            $sql = "INSERT INTO " . $table . " (" . $columns . ") VALUES ('" . $values . "')";
            return $this->conn->query($sql);
        }
        return false;
    }

    // ... method update() dan delete() sesuai modul ...
}
?>
```

### 2\. Penyesuaian `index.php`

Menginisialisasi objek database dan mengirimkannya ke modul yang membutuhkan.

```php
<?php
session_start();
include("config/database.php");

$db = new Database(); // Membuat objek database
$page = isset($_GET['page']) ? $_GET['page'] : 'user/list';

include("template/header.php");
// Mekanisme routing modul (sama seperti Lab 9)
// ...
include("template/footer.php");
?>
```

### 3\. Tampilan Data Barang (`modules/user/list.php`)

Menggunakan method `$db->get()` untuk mengambil data.

```php
<?php
// Mengambil data dari tabel 'data_barang'
$data_barang = $db->get('data_barang');
?>

<h2>Data Barang</h2>
<a href="index.php?page=user/add" class="btn-tambah">+ Tambah Barang</a>

<table>
    <?php if($data_barang): ?>
        <?php foreach($data_barang as $row): ?>
        <tr>
            <td><img src="assets/img/<?= $row['gambar'];?>" width="50"></td>
            <td><?= $row['nama'];?></td>
            <td><?= $row['kategori'];?></td>
            <td><?= $row['harga_jual'];?></td>
            <td><?= $row['harga_beli'];?></td>
            <td><?= $row['stok'];?></td>
            <td>
                <a href="index.php?page=user/edit&id=<?= $row['id_barang'];?>">Ubah</a>
                <a href="index.php?page=user/delete&id=<?= $row['id_barang'];?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="7">Belum ada data</td></tr>
    <?php endif; ?>
</table>
```

**Hasil Output List Barang:**

> [Masukkan Screenshot Halaman List Data Barang di sini]

### 4\. Tambah Data Barang (`modules/user/add.php`)

Menggunakan method `$db->insert()` untuk menyimpan data.

```php
<?php
if (isset($_POST['submit'])) {
    // Menampung data input
    $data = [
        'nama' => $_POST['nama'],
        'kategori' => $_POST['kategori'],
        'harga_jual' => $_POST['harga_jual'],
        'harga_beli' => $_POST['harga_beli'],
        'stok' => $_POST['stok'],
        'gambar' => 'default.jpg' // Simplifikasi upload gambar
    ];
    
    // Simpan data
    $simpan = $db->insert('data_barang', $data);
    
    if($simpan){
        header('location: index.php?page=user/list');
    } else {
        echo "Gagal menyimpan data.";
    }
}
?>
```

**Hasil Output Tambah Barang:**

> [Masukkan Screenshot Halaman Tambah Barang di sini]

-----
