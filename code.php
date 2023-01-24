<?php
session_start();
require 'config.php';

if(isset($_POST['delete_komoditas']))
{
    $komoditas_code = mysqli_real_escape_string($con, $_POST['delete_komoditas']);

    $query = "DELETE FROM komoditas WHERE code='$komoditas_code' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Komoditas Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Komoditas Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}





if(isset($_POST['update_komoditas']))
{
    $komoditas_code = mysqli_real_escape_string($con, $_POST['komoditas_code']);

    $code = mysqli_real_escape_string($con, $_POST['code']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    

    $query = "UPDATE komoditas SET  name='$name' WHERE code='$komoditas_code'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Komoditas Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Komoditas Not Updated";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['update_produksi']))
{
    $produksi_date = mysqli_real_escape_string($con, $_POST['produksi_date']);

    $date = mysqli_real_escape_string($con, $_POST['date']);
    $komoditas = mysqli_real_escape_string($con, $_POST['komoditas']);
    $produksi = mysqli_real_escape_string($con, $_POST['produksi']);
    

    $query = "UPDATE produksi SET  komoditas='$komoditas', produksi='$produksi' WHERE date='$produksi_date'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Produksi Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Produksi Not Updated";
        header("Location: index.php");
        exit(0);
    }

}




if(isset($_POST['delete_produksi']))
{
    $produksi_date = mysqli_real_escape_string($con, $_POST['delete_produksi']);

    $query = "DELETE FROM produksi WHERE date='$produksi_date' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Produksi Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Produksi Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save_komoditas']))
{
    $code = mysqli_real_escape_string($con, $_POST['code']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
   

    $query = "INSERT INTO komoditas (code,name) VALUES ('$code','$name')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Komoditas Created Successfully";
        header("Location: ./component/komoditas/komoditas-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Komoditas Not Created";
        header("Location: ./component/komoditas/komoditas-create.php");
        exit(0);
    }
}


if(isset($_POST['save_produksi']))
{

    $date = date('Y-m-d', strtotime($_POST['date']));

        
        $komoditas = $_POST['komoditas'];
        $produksi = $_POST['produksi'];
       
    
        $query = "INSERT INTO produksi (date,komoditas,produksi) VALUES ('$date','$komoditas','$produksi')";
        //$cekdate = mysql_num_rows (mysql_query($conn, "SELECT `date` FROM produksi WHERE `date`='$date'"));
        //$cek = "SELECT FROM produksi WHERE date='$date' or komoditas='$komoditas'";
    
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['message'] = "Produksi Created Successfully";
                header("Location: ./component/produksi/produksi-create.php");
                exit(0);
        }
        else
        {
            $_SESSION['message'] = "Produksi Not Created";
            header("Location: ./component/produksi/produksi-create.php");
            exit(0);
        }
    


    
    
}

?>