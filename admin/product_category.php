<?php $page = "KATEGORI PRODUK"; ?>

<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<section class="main">
    <h1>Manajemen Kategori Produk</h1>
    
    <hr>  
    <?php 
    if(isset($_GET['act']) AND $_GET['act']=='tambah') {

        echo "
            <h3>Tambah Data</h3>
            
            
            <form name='tambah' action='?act=proses_tambah' method='post'>
                <p><input type='text' name='kategori' placeholder='Kategori'></p>
                <p><input type='submit' name='proses' value='Simpan' class='btn biru'></p>
            </form>
            
            <hr>
        ";
    }
elseif(isset($_GET['act']) AND $_GET['act']=='proses_tambah') {
    $tambah = mysqli_query($connect,"INSERT INTO kategori (kategori)
                            VALUES ('$_POST[kategori]')");
                            
    if($tambah) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Data gagal ditambahkan!";
    }
    
    echo "<hr>";
}
elseif(isset($_GET['act']) AND $_GET['act']=='edit') {
    $isi = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM kategori WHERE id_kategori = '$_GET[id]'"));
    
    echo "
        <h3>Edit Data</h3>
        
        <form name='edit' action='?act=proses_edit' method='post'>
            <input type='hidden' name='id' value='$isi[id_kategori]'>
            <p><input type='text' name='kategori' value='$isi[kategori]' placeholder='Kategori'></p>
            <p><input type='submit' name='proses' value='Simpan' class='btn biru'></p>
        </form>
        
        <hr>
    ";
}
elseif(isset($_GET['act']) AND $_GET['act']=='proses_edit') {
    $edit = mysqli_query($connect,"UPDATE kategori SET kategori = '$_POST[kategori]'
                        WHERE id_kategori = '$_POST[id]'");
                            
    if($edit) {
        echo "Data berhasil diperbaharui!";
    } else {
        echo "Data gagal diperbaharui!";
    }
    
    echo "<hr>";
}

 elseif(isset($_GET['act']) AND $_GET['act']=='hapus') {
    $hapus = mysqli_query($connect,"DELETE FROM kategori
                        WHERE id_kategori = '$_GET[id]'");
                            
    if($hapus) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Data gagal dihapus!";
    }
    
    echo "<hr>";
}


    ?>
    <a href="?act=tambah">
        <button type="button" class="btn hijau">Tambah</button>
    </a>    
    <table class="tabel">
        <thead>
            <tr><th>ID</th><th>Kategori</th><th>Aksi</th>
        </thead>
        <tbody>
            <?php
                // record dari tabel kategori
            $query = mysqli_query($connect,"SELECT * FROM kategori");    
            if(mysqli_num_rows($query) > 0) {
        // ada record
                $no=1;
            	        while($data = mysqli_fetch_array($query)) {
            echo "
                <tr>
                    <td>".$no++."</td>
                    <td>$data[kategori]</td>
                    <td>
                        <a href='?act=edit&id=$data[id_kategori]'>
                            <button type='button' class='btn kuning'>Edit</button>
                        </a>
                        <a href='?act=hapus&id=$data[id_kategori]' OnClick=\"return confirm('Anda yakin menghapus data?');\")>
                            <button type='button' class='btn merah'>Hapus</button>
                        </a>
                    </td>
                </tr>
            ";
        }
    } else {

        // tidak ada record
                echo "
            <tr>
                <td colspan='3'>Tidak ada data.</td>
            </tr>
        ";
    }

    


            ?>
        </tbody>
    </table>

</section>

<?php include('inc/footer.php'); ?>
