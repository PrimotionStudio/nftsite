<!DOCTYPE html>
<html lang="en">
<?php
require_once("../required/session.php");
require_once("../required/sql.php");
require_once("func/auth.php");
const PAGE_TITLE = "Create NFTs";
include_once("includes/head.php");
include_once("../includes/alert.php");
?>

<body class="g-sidenav-show bg-gray-200">
	<?php
	include_once("includes/sidebar.php");
	?>

	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
		<!-- Navbar -->
		<?php
		include_once("includes/navbar.php");
		?>
		<!-- End Navbar -->

		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-lg-8 mb-lg-0 mb-4">
					<div class="card">
						<div class="card-header pb-0 p-3">
							<div class="row">
								<div class="col-6 d-flex align-items-center">
									<h6 class="mb-0">Create NFTs / Collections</h6>
								</div>
								<div class="col-6 text-end">
									<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Save</a>
								</div>
							</div>
						</div>
						<div class="card-body p-3">
							<div class="row">
								<div class="col-md-12 mb-md-0 mb-4">
									<div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row mb-3">
										<input type="text" name="nft_name" class="form-control p-3 border" placeholder="Enter NFT Name">
									</div>
								</div>
								<div class="col-md-12 mb-md-0 mb-4">
									<div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row mb-3">
										<select name="collection" class="form-select p-3 border" id="">
											<option value="Option1">Option1</option>
											<option value="Option2">Option2</option>
											<option value="Option3">Option3</option>
										</select>
									</div>
								</div>
								<div class="col-md-12 mb-md-0 mb-4">
									<div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-column">
										<!-- <img class="w-50 me-3 mb-0" id="imagePreview" src="assets/img/logos/nft_placeholder.png" alt="logo"> -->
										<img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 300px; margin: 10px;">
										<input type="file" name="nft_image" id="nft_image" accept="image/*" onchange="previewImage()">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card h-30">
						<form role="form" action="" method="post">
							<div class="card-header pb-0 p-3">
								<div class="row">
									<div class="col-6 d-flex align-items-center">
										<h6 class="mb-0">Create Collections</h6>
									</div>
									<div class="col-6 text-end">
										<button type="submit" class="btn btn-outline-primary btn-sm mb-0">Save</button>
									</div>
								</div>
							</div>
							<div class="card card-body card-plain border-radius-lg d-flex align-items-center">
								<div class="input-group input-group-outline mb-3">
									<label class="form-label">Name</label>
									<input type="text" class="form-control">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php
	include_once("includes/scripts.php");
	?>
</body>

</html>