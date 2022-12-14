<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="css/icons.min.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="shortcut icon" href="images/logo.png">

    <title>Welcome : TDW Online Shop</title>
</head>

<body>
    <!--========== Header ==========-->
    <?php include('includes/header.php'); ?>

    <!--========== NAV ==========-->
    <?php include('includes/nav_bar.php'); ?>

    <!--========== CONTENTS ==========-->
    <main>
        <section>
            <div class="container">
                <?php
                $ret = mysqli_query($con, "select * from products order by rand() Limit 15");
                $cats = mysqli_query($con, "select * from category");
                // $cats = mysqli_free_result($cats);

                while ($row = mysqli_fetch_array($ret)) {
                    # code...
                ?>
                    <div class="container_card">
                        <div class="card">
                            <div class="product">
                                <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                    <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="">
                                </a>
                            </div>
                            <div class="bottom_img">
                                <img src="images/ss.png">
                            </div>
                            <div class="text">
                                <div class="title">

                                    <h3>
                                        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo        htmlentities($row['productName']); ?>
                                        </a>
                                    </h3>

                                    <?php
                                    $pid = $row['id'];
                                    $foundCat = null;
                                    $test = $cats;

                                    while ($cat = $test->fetch_array()) {
                                        if ($cat['id'] == $row['category']) {
                                            $foundCat = $cat;
                                        } ?>
                                        <a class="category_title" href="category.php?cid=<?php echo $rw['cid'] ?>"><?php echo 'cat========: ' . $foundCat[1] ?></a>

                                    <?php }

                                    ?>




                                    <?php

                                    $retC = mysqli_query($con, "select 
                                        category.id as cid,
                                        category.categoryName as catname,
                                        products.productName as pname
                                        from products
                                        join category on category.id=products.category
                                        where products.id='$pid'");
                                    //<a href="category.php?cid="><?php echo htmlentities($rw['catname']);
                                    while ($rw = mysqli_fetch_array($retC)) {

                                    ?>


                                    <?php } ?>

                                    <p><?php
                                        $price = htmlentities($row['productPrice']);
                                        include('includes/convertPrice.php');
                                        echo $covertedPrice ?>$
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>

        </section>
    </main>
    <?php include('includes/footter.php'); ?>
    <script src="assets/js/main.js"></script>
</body>

</html>