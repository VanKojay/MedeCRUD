<?php
session_start();
require '../../config.php';
$query1 = "SELECT * FROM komoditas";
$result1 = mysqli_query($con, $query1);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Komoditas Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('../../message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Produksi Edit 
                            <a href="../../index.php" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['date']))
                        {
                            $produksi_date = mysqli_real_escape_string($con, $_GET['date']);
                            $query = "SELECT * FROM produksi WHERE date='$produksi_date' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $produksi = mysqli_fetch_array($query_run);
                                ?>
                                <form action="../../code.php" method="POST">
                                    <input type="hidden" name="produksi_date" value="<?= $produksi['date']; ?>">

                                    <div class="mb-3">
                                        <label>Tanggal</label>
                                        <input type="date" name="date" value="<?=$produksi['date'];?>" class="form-control" readOnly>
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
                                        <input type="text" name="produksi" value="<?=$produksi['produksi'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <button type="submit" name="update_produksi" class="btn btn-primary">
                                            Update Produksi
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>Tidak Ada Tanggal</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>