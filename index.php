<?php
    session_start();
    require 'config.php';
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Dashboard</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <!-- Daftar Komoditas -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Komoditas
                            <a href="./component/komoditas/komoditas-create.php" class="btn btn-primary float-end">Tambah Komoditas</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM komoditas";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $komoditas)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $komoditas['code']; ?></td>
                                                <td><?= $komoditas['name']; ?></td>
                                                <td>
                                                    <a href="./component/komoditas/komoditas-view.php?code=<?= $komoditas['code']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="./component/komoditas/komoditas-edit.php?code=<?= $komoditas['code']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button 
                                                        type="submit" 
                                                        name="delete_komoditas" 
                                                        value="<?=$komoditas['code'];?>" 
                                                        class="btn btn-danger btn-sm">
                                                        Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                       

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">

<?php include('message.php'); ?>

<!-- Daftar Produksi -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Produksi
                    <a href="./component/produksi/produksi-create.php" class="btn btn-primary float-end">Tambah Produksi</a>
                </h4>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Komoditas</th>
                            <th>Produksi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM produksi";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $produksi)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $produksi['date']; ?></td>
                                        <td><?= $produksi['komoditas']; ?></td>
                                        <td><?= $produksi['produksi']; ?></td>

                                        <td>
                                            <a href="./component/produksi/produksi-view.php?date=<?= $produksi['date']; ?>" class="btn btn-info btn-sm">View</a>
                                            <a href="./component/produksi/produksi-edit.php?date=<?= $produksi['date']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_produksi" value="<?=$produksi['date'];?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }
                        ?>
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>

<div class="container mt-4">

<?php include('message.php'); ?>

<!-- Daftar Laporan -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Laporan Produksi Komoditas
                    <a href="./component/laporan/index-laporan.php" class="btn btn-warning float-end">Lihat Laporan</a>
                </h4>
            </div>
            
        </div>
    </div>
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>