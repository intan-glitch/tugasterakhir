<?php $page = "PESANAN"; ?>

<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<section class="main">
    <h1>Manajemen Pesanan</h1>
    
    <hr>
    <?php
    if(isset($_GET['act']) AND $_GET['act']=='finalized') {
        $status = mysqli_query($connect,"UPDATE pesanan SET status = 1
                            WHERE id_pesanan = '$_GET[id]'");
                                
        if($status) {
            echo "Data berhasil disimpan!";
        } else {
            echo "Data gagal disimpan!";
        }
        
        echo "<hr>";
    } elseif(isset($_GET['act']) AND $_GET['act']=='pending') {
        $status = mysqli_query($connect,"UPDATE pesanan SET status = 2
                            WHERE id_pesanan = '$_GET[id]'");
                                
        if($status) {
            echo "Data berhasil disimpan!";
        } else {
            echo "Data gagal disimpan!";
        }
        
        echo "<hr>";
    } elseif(isset($_GET['act']) AND $_GET['act']=='aborted') {
        $status = mysqli_query($connect,"UPDATE pesanan SET status = 3
                            WHERE id_pesanan = '$_GET[id]'");
                                
        if($status) {
            echo "Data berhasil disimpan!";
        } else {
            echo "Data gagal disimpan!";
        }
        
        echo "<hr>";
    }
?>

<table class="tabel">
    <thead>
        <tr><th>ID</th><th>Pemesan</th><th>Alamat</th><th>Tanggal</th> <th>Harga</th><th>Status</th><th>Aksi</th>
    </thead>
    <tbody>
        <?php
            $query = mysqli_query($connect,"SELECT * FROM pesanan ORDER BY id_pesanan DESC");
            
            if(mysqli_num_rows($query) > 0) {
                while($data = mysqli_fetch_array($query)) {
                    $member = mysqli_fetch_array(mysqli_query($connect,"SELECT nama_depan, nama_belakang, alamat FROM member WHERE id_member = '$data[id_member]'"));
                    
                    if($data['status'] == 1) {
                        $status = "<span style='color:green'>Finalized</span>";
                    } elseif($data['status'] == 2) {
                        $status = "<span style='color:orange'>Pending</span>";
                    } else {
                        $status = "<span style='color:red'>Aborted</span>";
                    }
                    
                    echo "
                        <tr>
                            <td>$data[id_pesanan]</td>
                            <td>$member[nama_depan] $member[nama_belakang]</td>
                            <td>$member[alamat]</td>
                            <td>$data[tanggal]</td>
                            <td>$data[harga]</td>
                            <td>$status</td>
                            <td>
                                <a href='?act=finalized&id=$data[id_pesanan]'>
                                    <button type='button' class='btn hijau'>F</button>
                                </a>
                                <a href='?act=pending&id=$data[id_pesanan]'>
                                    <button type='button' class='btn kuning'>P</button>
                                </a>
                                <a href='?act=aborted&id=$data[id_pesanan]'>
                                    <button type='button' class='btn merah'>A</button>
                                </a>
                            </td>
                        </tr>
                    ";
                }
            } else {
                echo "
                    <tr>
                        <td colspan='7'>Tidak ada data.</td>
                    </tr>
                ";
            }

        ?>
    </tbody>
</table>

    
</section>

<?php include('inc/footer.php'); ?>
