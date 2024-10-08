<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Leads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
    <header class="bg-light p-3 mb-4">
        <h1>Selamat Datang di Tambah Leads</h1>
    </header>
    <section class="container">
        <article>
            <form action="process_data.php" method="post">
                <fieldset class="mb-3">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control mb-3" id="tanggal" name="tanggal" required>
                        </div>

                        <div class="col-md-4">
                            <label for="id_sales">Sales</label>
                            <select class="form-control mb-3" id="id_sales" name="id_sales" required>
                                <option value="">--Pilih Sales--</option>
                                <?php
                                include 'connect_db.php';
                                $result = $conn->query("SELECT * FROM sales");
                                while ($row = $result->fetch_assoc()) {
                                    echo"<option value='".$row['id_sales']."'>".$row['nama_sales']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="nama_lead">Nama Lead</label><br>
                            <input type="text" class="form-group mb-3" id="nama_lead" name="nama_lead" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="id_produk">Produk</label>
                            <select class="form-control mb-3" id="id_produk" name="id_produk" required>
                                <option value="">--Pilih Produk--</option>
                                <?php
                                $result = $conn->query("SELECT * FROM produk");
                                while ($row = $result->fetch_assoc()) {
                                    echo"<option value='".$row['id_produk']."'>".$row['nama_produk']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-4">                        
                            <label for="no_wa">No. WhatsApp</label><br>
                            <input type="text" class="form-group mb-3" id="no_wa" name="no_wa" required>
                        </div>

                        <div class="col-md-4">                        
                            <label for="kota">Kota</label><br>
                            <input type="text" class="form-group mb-3" id="kota" name="kota" required>
                        </div>
                    </div>
                </fieldset>

                <div class="d-flex justify-content-center mt-4">
                    <button style="margin-center" type="submit" class="btn btn-primary">Simpan</button>
                    <button type="cancel" class="btn btn-secondary">Cancel</button>
                </div>
              
            </form>
        </article>
    </section>
</body>
</html>