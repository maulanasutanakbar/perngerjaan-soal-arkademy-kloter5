

<?php
// File json yang akan dibaca (full path file)
$file = "data.json";

// Mendapatkan file json
$anggota = file_get_contents($file);

// Mendecode anggota.json
$data = json_decode($anggota, true);

// Membaca data array menggunakan foreach
foreach ($data as $d) {
    echo $d['nama_lengkap']. "<br>";
    echo $d['alamat']. "<br>";
    echo $d['hobi']. "<br>";
    echo $d['status_menikah']. "<br>";
    echo $d['sekolah']. "<br>";
    echo $d['skill']. "<br>";
}

