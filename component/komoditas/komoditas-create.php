<?php
session_start();
require '../../config.php';

$result = mysqli_query($con, "SELECT code from komoditas order by code desc limit 1");
$data = mysqli_fetch_assoc($result);
$row =  $data['code'];
$count = substr($row, 1);
$pk = "K".substr("000".($count+1),-3);
?>


<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Komoditas Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('../../message.php'); ?>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Komoditas 
                            <a href="../../index.php" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="../../code.php" method="POST">

                            <div class="mb-3">
                                <label>Kode</label>
                                <input type="text" value="<?php echo $pk; ?>" name="code" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Nama Komoditas</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="save_komoditas" class="btn btn-primary">Tambah Komoditas</button>
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