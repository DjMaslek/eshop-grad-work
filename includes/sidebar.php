<?php 
    $cats = mysqli_query($connection, "SELECT * FROM `products_category`");
?>
<nav class="nav col-md-2 flex-column bg-light sidebar">
    <div class="sidebar-sticky">
        <?php
        while (($cat = mysqli_fetch_assoc($cats))) {
            ?>
            <li class="nav-item"> <a class="nav-link text-dark" href="/products.php?category=<?php
             echo $cat['id']; ?>"> <?php echo $cat['product_category']; ?>
            </a></li>
            <?php
        }
        ?>
    </div>
</nav>