<?php
session_start();
require '../../config.php';
$query = "SELECT * FROM komoditas";
$result1 = mysqli_query($con, $query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Tambah Produksi</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('../../message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Produksi
                            <a href="../../index.php" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    
                    <div class="card-body">
                        <form action="../../code.php" method="POST">
                            <div class="mb-3 col-md-2">
                                <label>Tanggal Produksi</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Komoditas</label>
                                <select class="form-select" aria-label="Default select example" name="komoditas">
                                    <?php while($row1 = mysqli_fetch_array($result1)):;?>
                                    <option value=<?php echo $row1[0];?> >
                                        <?php echo $row1[1];?>
                                    </option>
                                    <?php endwhile;?>                                    
                                </select>                                    
                            </div>
                            <div class="mb-3">
                                <label>Jumlah Produksi</label>
                                <input type="number" name="produksi" class="form-control" placeholder="Masukan Angka">
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="save_produksi" class="btn btn-primary">Tambah Produksi</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>