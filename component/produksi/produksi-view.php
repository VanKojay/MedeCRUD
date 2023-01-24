<?php
require '../../config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Produksi View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Produksi View Details 
                            <a href="../../index.php" class="btn btn-danger float-end">BACK</a>
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
                                
                                    <div class="mb-3">
                                        <label>Tanggal Produksi</label>
                                        <p class="form-control">
                                            <?=$produksi['date'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Kode Komoditas</label>
                                        <p class="form-control">
                                            <?=$produksi['komoditas'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Jumlah Produksi</label>
                                        <p class="form-control">
                                            <?=$produksi['produksi'];?>
                                        </p>
                                    </div>
                                    

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
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