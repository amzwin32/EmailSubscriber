<body class="bg">

<?php require_once('include/header.php'); ?>	
	<section class="container-fluid">
		<!-- Page Content -->
		<div class="container">

			<!-- Main Row -->
			<div class="main-class row text-center">
				
				<img class="img-adjust" src="images/image-1.png">
				
				
			</div>
			<!-- /.row -->
			
			<!-- Mid Row -->
			<div class="middle-class row text-center">
				<form id="sendemail" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form" enctype="multipart/form-data" data-validate="parsley" novalidate>
					<div class="col-lg-7 col-xs-12 col-lg-offset-3 col-xs-offset-0 ">
						<div class="input-group define-size newsletter">
							<input id="txt-field" type="email" class="form-control define-height txt-input" name="email" placeholder="Enter your email address..." required>
							<span class="input-group-btn btn-adjust">
								<input value="Subscribe" class="btn btn-secondary define-height btn-newsletter" type="submit" name="submit">
							</span>
						</div>
					</div>
				</form>
				
			</div><!-- /.row -->
			
			<!-- Footer Row -->
			<div class="bottom-class row text-center">
				<img class="img-adjust" src="images/image-2.png">
			</div><!-- /.row -->

		</div>
		<!-- /.container -->
	</section>
<?php require_once('include/footer.php'); ?>