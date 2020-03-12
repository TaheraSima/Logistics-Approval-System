<?php include 'data/config/conn.php' ?>
<?php echo include 'include/header.php' ?>
<?php echo include 'include/sidebar.php' ?>
<div class="content-wrapper">
  	<div class="content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle"
								src="../../dist/img/user4-128x128.jpg"
								alt="User profile picture">
							</div>
							<h3 class="profile-username text-center">Nina Mcintire</h3>
							<p class="text-muted text-center">Software Engineer</p>
							<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
									<b>Followers</b> <a class="float-right">1,322</a>
								</li>
								<li class="list-group-item">
									<b>Following</b> <a class="float-right">543</a>
								</li>
								<li class="list-group-item">
									<b>Friends</b> <a class="float-right">13,287</a>
								</li>
							</ul>
							<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
						</div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</div>
</div>
<?php echo include 'include/footer.php' ?>