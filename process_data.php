<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect_db.php';

    $tanggal = $_POST['tanggal'];
    $id_sales = $_POST['id_sales'];
    $id_produk = $_POST['id_produk'];
    $no_wa = $_POST['no_wa']; 
    $nama_lead = $_POST['nama_lead'];
    $kota = $_POST['kota'];

    $sql = "INSERT INTO leads (tanggal, id_sales, id_produk, no_wa, nama_lead, kota, id_user) VALUES ('$tanggal', '$id_sales', '$id_produk', '$no_wa', '$nama_lead', '$kota', 1)";

    if($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " .sql. "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Form tidak di sumbit dengan benar.";
}
?>

