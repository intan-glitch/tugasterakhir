<?php $page = "BLOG"; ?>

<?php include('inc/header.php'); ?>

<!-- BAGIAN ISI -->
<section>
    <section id="main-content" class="clearfix">
    <div class="container">
        <hr>
        
        <h2>Blog</h2>
        
        <hr>

        <aside id="categories-menu">
    <h3>Blog Terbaru</h3>
    <ul>
        <?php
            $query = mysqli_query($connect,"SELECT * FROM blog ORDER BY id_blog DESC LIMIT 0,5");
            
            while($data = mysqli_fetch_array($query)) {
                echo "<li><a href='blog_detail.php?id=$data[id_blog]'>$data[judul]</a></li>";
            }
        ?>
    </ul>
</aside>


        <div id="listings">
    <?php
        $start = 0;
        $limit = 6;

        if(isset($_GET['page'])) {
            $page=$_GET['page'];
            $start=($page-1)*$limit;
        }
        
        $query = mysqli_query($connect,"SELECT * FROM blog ORDER BY id_blog DESC LIMIT $start, $limit");
        
        while($data = mysqli_fetch_array($query)) {                      
            echo "
                <div class='product'>
                    <a href='blog_detail.php?id=$data[id_blog]'><img src='admin/uploads/blog/$data[gambar]' alt='$data[judul]' class='feature'></a>

                    <h3><a href='blog_detail.php?id=$data[id_blog]'>$data[judul]</a></h3>

                    <p>$data[deskripsi]</p>

                    <p>
                        <a href='blog_detail.php?id=$data[id_blog]' class='blog-btn'>Selengkapnya</a>
                    </p>
                </div>
            ";
        }               
    ?>
</div>

            
            
    </div>
</section>
<section id="pagination">
    <p>
        <?php
            $query = mysqli_query($connect,"SELECT * FROM blog");
        
            $rows=mysqli_num_rows($query);
            $total=ceil($rows/$limit);
            
            echo "Halaman: ";
            
            for($i=1;$i<=$total;$i++) {
                if($i == $page OR (!isset($_GET['page']) AND $i == 1)) {
                    echo "<span class='current'>$i</span>";
                } else {
                    echo "<a href='blog.php?page=$i'>$i</a>";
                }
                
                if($i != $total) {
                    echo " / ";
                }
            }
        ?>
    </p>
</section>




</section>
<!-- BAGIAN ISI -->

<?php include('inc/footer.php'); ?>
