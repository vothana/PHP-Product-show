<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid = intval($_GET['cid']);
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
	<link rel="shortcut icon" href="images/logo.png">

	<?php $sql = mysqli_query($con, "select categoryName  from category where id='$cid'");
	while ($row = mysqli_fetch_array($sql)) {
	?>

		<title>TDWSO : Category | <?php echo htmlentities($row['categoryName']); ?></title>

	<?php } ?>
</head>

<body>
	<!--========== Header ==========-->
	<?php include('includes/header.php'); ?>

	<!--========== NAV ==========-->
	<?php include('includes/nav_bar.php'); ?>

	<!--========== CONTENTS ==========-->
	<main>
		<?php $sql = mysqli_query($con, "select categoryName  from category where id='$cid'");
		while ($row = mysqli_fetch_array($sql)) {
		?>

			<div class="Explorcategory">
				<p>Category</p>
				<h3>| <?php echo htmlentities($row['categoryName']); ?></h3>

			</div>
		<?php } ?>
		<section>
			<div class="container">
				<?php
				$ret = mysqli_query($con, "select * from products where category='$cid'");
				$num = mysqli_num_rows($ret);
				if ($num > 0) {
					while ($row = mysqli_fetch_array($ret)) {
				?>
						<div class="container_card">
							<div class="card">
								<div class="product">
									<a href="product-details.php?pid=
										<?php echo htmlentities($row['id']); ?>">
										<img src="admin/productimages/
										<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="">
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
										$retC = mysqli_query($con, "select 
                                        category.id as cid,
                                        subcategory.id as sid,
                                        category.categoryName as catname,
                                        subCategory.subcategory as subcatname,
                                        products.productName as pname
                                        from products join category 
                                            on category.id=products.category join subcategory 
                                            on subcategory.id=products.subCategory where products.id='$pid'");
										//<a href="category.php?cid="><?php echo htmlentities($rw['catname']);
										while ($rw = mysqli_fetch_array($retC)) {

										?>
											<a class="category_title" href="sub-category.php?scid=<?php echo $rw['sid'] ?>"><?php echo $rw['subcatname'] ?></a>

										<?php } ?>
										<p><?php
											$price = htmlentities($row['productPrice']);
											include('includes/convertPrice.php');
											echo $covertedPrice ?>$</p>
									</div>
								</div>

							</div>
						</div>
					<?php }
				} else { ?>

					<?php include('includes/notFound.php'); ?>

				<?php } ?>
			</div>

		</section>
	</main>
	<?php include('includes/footter.php'); ?>
	<script src="assets/js/main.js"></script>
</body>

</html>