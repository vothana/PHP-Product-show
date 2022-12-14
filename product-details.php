<?php
session_start();
error_reporting(0);
include('includes/config.php');

$pid = intval($_GET['pid']);
if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
	if (strlen($_SESSION['login']) == 0) {
		header('location:login.php');
	} else {
		mysqli_query($con, "insert into wishlist(userId,productId) values('" . $_SESSION['id'] . "','$pid')");
		echo "<script>alert('Product aaded in wishlist');</script>";
		header('location:my-wishlist.php');
	}
}

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
	<link rel="stylesheet" href="css/product-detail.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="shortcut icon" href="images/logo.png">

	<title>TDWSO : Product Detail</title>
</head>

<body>
	<!--========== Header ==========-->
	<?php include('includes/header.php'); ?>

	<!--========== NAV ==========-->
	<?php include('includes/nav_bar.php'); ?>

	<!--========== CONTENTS ==========-->
	<main>
		<?php
		$ret = mysqli_query($con, "select 
			category.id as cid,
			subcategory.id as sid,
			category.categoryName as catname,
			subCategory.subcategory as subcatname,
			products.productName as pname
			from products join category 
				on category.id=products.category join subcategory 
				on subcategory.id=products.subCategory where products.id='$pid'");
		//<a href="category.php?cid="><?php echo htmlentities($rw['catname']);
		while ($rw = mysqli_fetch_array($ret)) {

		?>
			<div class="path">
				<ul>
					<li><img src="images/ss.png" alt=""></li>
					<li><a href="index.php">Home</a></li>/
					<li>
						<a href="category.php?cid=<?php echo htmlentities($rw['cid']); ?>"><?php echo htmlentities($rw['catname']); ?>
						</a>
					</li>/
					<li>
						<a href="sub-category.php?scid=<?php echo htmlentities($rw['sid']); ?>"><?php echo htmlentities($rw['subcatname']); ?>
						</a>
					</li>/
					<li class='active'><?php echo htmlentities($rw['pname']); ?></li>
				</ul>
			</div>

		<?php } ?>
		<section>
			<?php
			$ret = mysqli_query($con, "select * from products where id='$pid'");
			while ($row = mysqli_fetch_array($ret)) {

			?>
				<div class="main-wrapper">
					<div class="container">
						<div class="product-div">
							<div class="product-div-left">
								<div class="img-container">
									<img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>">
								</div>
								<div class="hover-container">
									<div><img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" /></div>
									<div><img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>" /></div>
									<div><img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>" /></div>
								</div>
							</div>
							<div class="product-div-right">
								<?php
								$name = "select 
								products.productName as pname 
								from products join category 
									on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'";
								$ret = mysqli_query($con, $name);
								while ($rw = mysqli_fetch_array($ret)) {
								?>
									<div class="product-name">
										<span>
											<?php echo htmlentities($rw['pname']); ?>
										</span>
									</div>
								<?php } ?>

								<div class="product-info ">
									<span>
										INSTOCK :
										<span style="color: green;">
											<?php echo htmlentities($row['productAvailability']); ?>
										</span>
									</span>
								</div>
								<div class="product-info ">
									<span>
										COMPANY :
										<span style="color: rgb(7, 52, 70);">
											<?php echo htmlentities($row['productCompany']); ?>
										</span>
									</span>
								</div>
								<div class="product-info ">
									<span>
										SHIPPING CHARGE :
										<span style="color: rgb(7, 52, 70);">
											<?php if ($row['shippingCharge'] == 0) {
												echo "Free";
											} else {
												echo htmlentities($row['shippingCharge']);
											}

											?>
										</span>
									</span>
								</div>
								<div class="product-info ">
									<span>
										PRICE :
										<span style="color: rgb(7, 52, 70);">
											$ <?php
												$price = htmlentities($row['productPrice']);
												include('includes/convertPrice.php');
												echo $covertedPrice   ?>
										</span>
									</span>
								</div>
							</div>
						</div>
						<div class="popup-image">
							<span>&times;</span>
							<img src=" admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="">
						</div>
					</div>

					<div class="description">
						<h3 style="padding: 20px 0 0 0;">Description</h3>
						<p style="text-align: center;" class="product-description"><?php echo $row['productDescription']; ?></p>
					</div>
				</div>
				<h3 style="text-align: center; margin-top: 50px">Related Products</h3>

				<div class="container-related-products" style="margin-top: 30px;">
					<?php
					$cid = $row['category'];  //ចាប់បានដោយសារ Join 

					$subcid = $row['subCategory'];
					$ret = mysqli_query($con, "select * from products where category='$cid' order by rand()");
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
												<a class="category_title" href="category.php?cid=<?php echo $rw['cid'] ?>"><?php echo $rw['catname'] ?></a>

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
						<div>
							<h3>No Product Found</h3>
						</div>
					<?php } ?>
				</div>

			<?php
			} ?>
		</section>
	</main>
	<?php include('includes/footter.php'); ?>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/script.js"></script>
	<script>
		document.querySelectorAll('.img-container img').forEach(image => {
			image.onclick = () => {
				document.querySelector('.popup-image').style.display = 'block';
				document.querySelector('.popup-image img').src = image.getAttribute('src');
			}
		});
		document.querySelector('.popup-image span').onclick = () => {
			document.querySelector('.popup-image').style.display = 'none';
		}
		document.querySelector('.popup-image').onclick = () => {
			document.querySelector('.popup-image').style.display = 'none';
		}
	</script>
</body>

</html>