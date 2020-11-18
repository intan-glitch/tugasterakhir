<?php $page = "AKUN"; ?>

<?php include('inc/header.php'); ?>
<?php
    if(!isset($_SESSION['email']) AND !isset($_SESSION['password'])){
        header('location:sign_in.php');
    }
?>


<!-- BAGIAN ISI -->
<section>
<section id="main-content">
    <div class="container">
        <hr>
        
        <h2>Akun</h2>

        <hr>

        <aside id="categories-menu">
            <h3>KATEGORI</h3>
            <ul>
                <li><a href="product.php">Laptop</a></li>
                <li><a href="product.php">Desktop PC</a></li>
                <li><a href="product.php">Smartphone</a></li>
                <li><a href="product.php">Tablet</a></li>
            </ul>
        </aside>

        <div id="personal-details">
        <h1>Data Pribadi</h1>

        <form action="account.php" method="post">
            <p>
                <label for="firstname">
                    <span class="required-field">*</span> NAMA DEPAN:
                </label>
                <input type="text" id="firstname" name="firstname" required>
            </p>
            <p>
                <label for="lastname">
                    <span class="required-field">*</span> NAMA BELAKANG:
                </label>
                <input type="text" id="lastname" name="lastname" required>
            </p>
            <p>
                <label for="address">
                    <span class="required-field">*</span> ALAMAT:
                </label>
                <input type="text" id="address" name="alamat" required>
            </p>
            <p>
                <label for="email">
                    <span class="required-field">*</span> EMAIL:
                </label>
                <input type="email" id="email" name="email" required>
            </p>
            <p>
                <label for="telephone">
                    <span class="required-field">*</span> TELEPON:
                </label>
                <input type="text" id="telephone" name="telepon" required>
            </p>

            <p><span class="required-field">*</span> wajib diisi.</p>

            <hr>

            <input type="submit" value="SIMPAN" class="secondary-cart-btn">
        </form>
        </div>
    </div>
</section>

</section>
<!-- BAGIAN ISI -->
