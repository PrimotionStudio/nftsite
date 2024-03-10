<!DOCTYPE html>
<html lang="en">
<?php
require_once("../required/session.php");
require_once("../required/sql.php");
require_once("func/auth.php");
require_once("func/time_ago.php");
const PAGE_TITLE = "My NFTs";
// include_once("func/create_collection.php");
include_once("includes/head.php");
include_once("../includes/alert.php");

$select_coll = "SELECT * FROM collections WHERE user_id='" . $get_user["id"] . "'";
$query_coll = mysqli_query($con, $select_coll);
?>

<body class="g-sidenav-show bg-gray-200">
	<?php
	include_once("includes/sidebar.php");
	?>

	<!-- <div class="main-content position-relative max-height-vh-100 h-100"> -->
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
		<!-- Navbar -->
		<?php
		include_once("includes/navbar.php");
		?>
		<!-- End Navbar -->

		<div class="container-fluid px-2 px-md-4">
			<div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
				<span class="mask  bg-gradient-primary  opacity-6"></span>
			</div>
			<div class="card card-body mx-3 mx-md-4 mt-n6">
				<div class="row">
					<?php
					while ($get_coll = mysqli_fetch_assoc($query_coll)) :
						$select_nft = "SELECT * FROM nfts WHERE user_id='" . $get_user["id"] . "' && collection_id='" . $get_coll["id"] . "'";
						$query_nft = mysqli_query($con, $select_nft);
					?>
						<div class="col-12 mt-4 border-bottom">
							<div class="mb-5 ps-3 border-bottom">
								<h6 class="mb-1"><?= $get_coll["name"] ?></h6>
								<p class="text-sm">Created <?= time_ago(strtotime($get_coll["datetime"])) . " - " . date("d F Y, h:ia", strtotime($get_coll["datetime"])) ?></p>
								<p class="text-sm">
									<?php
									if (mysqli_num_rows($query_nft) == 0) :
										echo "You have no NFTs under this collection";
									endif;
									?>
								</p>
							</div>
							<div class="row">
								<?php
								while ($get_nft = mysqli_fetch_assoc($query_nft)) :
								?>
									<div class="col-xl-3 col-md-6 mb-4">
										<div class="card card-blog card-plain">
											<div class="card-header p-0 mt-n4 mx-3">
												<a class="d-block shadow-xl border-radius-xl">
													<img src="<?= $get_nft["file"] ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
												</a>
											</div>
											<div class="card-body p-3">
												<a href="javascript:;">
													<h5>&gt; <?= $get_nft["name"] ?></h5>
												</a>
												<p class="mb-0 text-sm">Created <?= time_ago(strtotime($get_nft["datetime"])) . " - " . date("d F Y, h:ia", strtotime($get_nft["datetime"])) ?></p>
												<p class="mb-4 text-sm">
													As Uber works through a huge amount of internal management turmoil.
												</p>
												<div class="d-flex align-items-center justify-content-between">
													<button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
													<div class="avatar-group mt-2">
														<a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
															<img alt="Image placeholder" src="assets/img/team-1.jpg">
														</a>
														<a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
															<img alt="Image placeholder" src="assets/img/team-2.jpg">
														</a>
														<a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
															<img alt="Image placeholder" src="assets/img/team-3.jpg">
														</a>
														<a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
															<img alt="Image placeholder" src="assets/img/team-4.jpg">
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php
								endwhile;
								?>
							</div>
						</div>
					<?php
					endwhile;
					?>
				</div>
			</div>
		</div>
	</main>
	<!-- </div> -->
	<?php
	include_once("includes/scripts.php");
	?>
</body>

</html>