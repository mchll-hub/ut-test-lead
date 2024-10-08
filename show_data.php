<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Leads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-light p-3 mb-4">
        <h1 class="text-center">Data Leads</h1>
    </header>
    <section class="container">
        <article>
            <form action="GET" class="mb-4">
                <fieldset class="mb-3">
                    <legend>Filter Pencarian</legend>
                    <label for="bulan">Pilih Bulan</label>
                    <input type="month" id="bulan" name="bulan" class="form-control mb-3">

                    <label for="id_produk">Produk</label>
                    <select class="form-control mb-3" name="id_produk" id="id_produk" required>
                        <option value="">--Pilih Produk--</option>
                        <?php
                        include 'connect_db.php';
                        $result = $conn->query("SELECT * FROM produk");
                        while ($row = $result->fetch_assoc()) {
                            echo"<option value='".$row['id_produk']."'>".$row['nama_produk']."</option>";
                        }
                        ?>
                    </select>

                    <button type="submit" class="btn btn-primary">Cari</button>
                </fieldset>
            </form>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Input</th>
                        <th>Tanggal</th>
                        <th>Sales</th>
                        <th>Produk</th>
                        <th>Nama Lead</th>
                        <th>No. WA</th>
                        <th>Kota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['bulan']) || isset($_GET['id_produk'])) {
                        $bulan = $_GET['bulan'];
                        $id_produk = $_GET['id_produk'];

                        $sql = "SELECT leads.id, leads.tanggal, sales.nama_sales, produk.nama_produk, leads.nama_lead, leads.no_wa, leads.kota
                        FROM leads 
                        JOIN sales ON leads.id_sales = sales.id_sales
                        JOIN produk ON leads.id_produk = produk.id_produk
                        WHERE 1 = 1";

                        if (!empty($bulan)) {
                            $sql .= " AND DATE_FORMAT(leads.tanggal, '%Y-%m') = '$bulan'";
                        }

                        if (!empty($id_produk)) {
                            $sql .= " AND leads.id_produk = 'id_produk'";
                        }
                        
                        $result = $conn->query($sql);
                        $no = 1;

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>".$no++."</td>
                                    <td>".$row['id']."</td>
                                    <td>".$row['tanggal']."</td>
                                    <td>".$row['nama_sales']."</td>
                                    <td>".$row['nama_produk']."</td>
                                    <td>".$row['nama_lead']."</td>
                                    <td>".$row['no_wa']."</td>
                                    <td>".$row['kota']."</td>
                                 </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </article>
    </section>
</body>
</html>