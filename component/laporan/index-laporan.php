<?php
    session_start();
    require '../../config.php';
?>
<!doctype html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Daftar Komoditas</title>
</head>
<body>
    
    
    <div class="container mt-4">

        <?php include('../../message.php'); ?>

        <div class="row">
            
            <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Type To Filter..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Filter</button>
                </form>
            </div>
            </nav>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan
                            <a href="../../index.php" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tahun</th>
                                    <th>Komoditas</th>
                                    <th>Januari</th>
                                    <th>Februari</th>
                                    <th>Maret</th>
                                    <th>April</th>
                                    <th>Mei</th>
                                    <th>Juni</th>
                                    <th>Juli</th>
                                    <th>Agustus</th>
                                    <th>September</th>
                                    <th>Oktober</th>
                                    <th>November</th>
                                    <th>Desember</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT YEAR(p.date) date, k.name, 
                                    SUM(k1.produksi) januari, 
                                    SUM(k2.produksi) februari,
                                    SUM(k3.produksi) maret, 
                                    SUM(k4.produksi) april,
                                    SUM(k5.produksi) mei,
                                    SUM(k6.produksi) juni,
                                    SUM(k7.produksi) juli,
                                    SUM(k8.produksi) agustus,
                                    SUM(k9.produksi) september,
                                    SUM(k10.produksi) oktober,
                                    SUM(k11.produksi) november,
                                    SUM(k12.produksi) desember
                                    

                                    FROM komoditas k
                                    INNER JOIN produksi p ON k.code=p.komoditas
                                    LEFT JOIN produksi k1 ON p.komoditas = k1.komoditas AND p.date = k1.date AND MONTH(k1.date)=1
                                    LEFT JOIN produksi k2 ON p.komoditas = k2.komoditas AND p.date = k2.date AND MONTH(k2.date)=2
                                    LEFT JOIN produksi k3 ON p.komoditas = k3.komoditas AND p.date = k3.date AND MONTH(k3.date)=3
                                    LEFT JOIN produksi k4 ON p.komoditas = k4.komoditas AND p.date = k4.date AND MONTH(k4.date)=4
                                    LEFT JOIN produksi k5 ON p.komoditas = k5.komoditas AND p.date = k5.date AND MONTH(k5.date)=5
                                    LEFT JOIN produksi k6 ON p.komoditas = k6.komoditas AND p.date = k6.date AND MONTH(k6.date)=6
                                    LEFT JOIN produksi k7 ON p.komoditas = k7.komoditas AND p.date = k7.date AND MONTH(k7.date)=7
                                    LEFT JOIN produksi k8 ON p.komoditas = k8.komoditas AND p.date = k8.date AND MONTH(k8.date)=8
                                    LEFT JOIN produksi k9 ON p.komoditas = k9.komoditas AND p.date = k9.date AND MONTH(k9.date)=9
                                    LEFT JOIN produksi k10 ON p.komoditas = k10.komoditas AND p.date = k10.date AND MONTH(k10.date)=10
                                    LEFT JOIN produksi k11 ON p.komoditas = k11.komoditas AND p.date = k11.date AND MONTH(k11.date)=11
                                    LEFT JOIN produksi k12 ON p.komoditas = k12.komoditas AND p.date = k12.date AND MONTH(k12.date)=12

                                    GROUP BY p.komoditas";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $komoditas)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $komoditas['date']; ?></td>
                                                <td><?= $komoditas['name']; ?></td>
                                                <td><?= $komoditas['januari']; ?></td>
                                                <td><?= $komoditas['februari']; ?></td>
                                                <td><?= $komoditas['maret']; ?></td>
                                                <td><?= $komoditas['april']; ?></td>
                                                <td><?= $komoditas['mei']; ?></td>
                                                <td><?= $komoditas['juni']; ?></td>
                                                <td><?= $komoditas['juli']; ?></td>
                                                <td><?= $komoditas['agustus']; ?></td>
                                                <td><?= $komoditas['september']; ?></td>
                                                <td><?= $komoditas['oktober']; ?></td>
                                                <td><?= $komoditas['november']; ?></td>
                                                <td><?= $komoditas['desember']; ?></td>

                                                
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

    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>