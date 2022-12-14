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

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="css/icons.min.css">
    <link rel="stylesheet" href="css/app.css">

    <title>TDWSO : 404 Error</title>
    <style>
        .page_404 {
            width: 800px;
            padding: 40px 0;
            background: #fff;
            font-family: 'Poppins';
            margin: 0 auto;
            border-radius: 10px;
            padding: 10px;
        }

        @media screen and (max-width: 500px) {
            .page_404 {
                width: 95%;
            }
        }

        .page_404 img {
            width: 100%;
        }

        .four_zero_four_bg {
            background: url('404-page/bg.gif');
            height: 400px;
            background-position: center;
        }

        .four_zero_four_bg h1 {
            text-align: center;
            font-size: 80px;
            margin-bottom: 50px;
        }

        .content_box_404 h3 {
            font-size: 80px;
        }

        .content_box_404 a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            background: #39ac31;
            display: inline-block;
        }

        .content_box_404 {
            margin-top: -50px;
        }

        .content_box_404 a:hover {
            text-decoration: none;
            color: #fff;
        }
    </style>
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
                <div class="page_404">
                    <div class="four_zero_four_bg">
                        <h1 class="text-center">404</h1>
                    </div>
                    <div class="content_box_404">
                        <a href="index.php">Go to Home</a>
                    </div>
                </div>


            </div>

        </section>
    </main>
    <script src="assets/js/main.js"></script>
</body>

</html>