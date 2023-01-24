<?php
session_start();
require '../../config.php';
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
                        <h4>Komoditas Edit 
                            <a href="../../index.php" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['code']))
                        {
                            $komoditas_code = mysqli_real_escape_string($con, $_GET['code']);
                            $query = "SELECT * FROM komoditas WHERE code='$komoditas_code' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $komoditas = mysqli_fetch_array($query_run);
                                ?>
                                <form action="../../code.php" method="POST">
                                    <input type="hidden" name="komoditas_code" value="<?= $komoditas['code']; ?>">

                                    <div class="mb-3">
                                        <label>Kode Komoditas</label>
                                        <input type="text" name="name" value="<?=$komoditas['code'];?>" class="form-control" readOnly>
                                    </div>
                                    <div class="mb-3">
                                        <label>Nama Komoditas</label>
                                        <input type="text" name="name" value="<?=$komoditas['name'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <button type="submit" name="update_komoditas" class="btn btn-primary">
                                            Update Komoditas
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>Tidak Ada Code</h4>";
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