<?php

    include('inc/config.php');
    
    $nama       = $_POST['nama'];
    $password   = $_POST['password'];
    
    //$nama       = mysqli_real_escape_string($nama);
    //$password   = mysqli_real_escape_string($password);

    $query = mysqli_query($connect, "SELECT * FROM user WHERE nama = '$nama' AND password = '$password'");
var_dump("aaaaaaaaaaaaaaaaa");
    if(mysqli_num_rows($query) == 1) {
session_start();
    
    $_SESSION['nama'] = $nama;
    $_SESSION['password'] = $password;

    header('location:index.php');
    echo "Anda berhasil login";
} else {
    echo "Anda gagal login";
    header('location:login.php');
}


    
?>
