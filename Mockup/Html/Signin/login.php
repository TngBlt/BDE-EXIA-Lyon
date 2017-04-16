<?php $customTitle = "Log in !";

$customHead = "<link rel='stylesheet' href='css/signin.css'/>";

include "../includes/header.php"; ?>
	
	<div class="container">
			<div class="row">
				<div class="col-md-12 registration-area">
					<div class="row registration-form">
						<form action = "signin.php" method="post">
							<div class="col-md-12">
								<label for="namail">Your name or your email : </label><input type="text" name="namail" value=""/>
								<label for="password">Your password : </label><input type="text" name="password" value=""/>
							</div>
					</div>
				</div>
			</div>
		</div>

<?php include "../includes/footer.php"; ?>