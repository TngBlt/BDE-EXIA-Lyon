<?php $customTitle = "Sign in !";

$customHead = "<link rel='stylesheet' href='css/connection.css'/>";

include "../includes/header.php"; ?>
	
	<div class="container">
			<div class="row">
				<div class="col-md-12 registration-area">
					<div class="row registration-form signin">
						<form action = "signin.php" method="post">
							<div class="col-md-12">
								<label for="username">Name : </label><input type="text" name="username" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>"/>
								<label for="firstname">First Name : </label><input type="text" name="firstname" value="<?php if(isset($_POST['firstname'])){echo htmlentities($_POST['firstname'], ENT_QUOTES, 'UTF-8');} ?>"/>
							</div>
							<div class="col-md-12">
            					<label for="password">Password <span class="small">(6 characters min. !) : </span></label><input type="password" name="password"/>
            				</div>
            				<div class="col-md-12">
            					<label>Verification <span class="small">(just to be sure !) : </span></label><input type="password" name="passverif" /><label for="passverif"></label><br/>
            				</div>
            				<div class="col-md-12">
            					<label for="email">Email : </label><input type="text" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" /><br/>
            				</div>
            				 <div class="col-md-12">
            					<label for="Social Networks">Your Social Networks  <span class="small">(optional) : </span><br/>
            					<label for="Facebook">Facebook : </label><input type="text" name="facebook" value="<?php if(isset($_POST['facebook'])){echo htmlentities($_POST['facebook'], ENT_QUOTES, 'UTF-8');} ?>" /><br/>
            					<label for="Twitter">Twitter : </label><input type="text" name="twitter" value="<?php if(isset($_POST['twitter'])){echo htmlentities($_POST['twitter'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
            					<label for="Instagram">Instagram : </label><input type="text" name="instagram" value="<?php if(isset($_POST['instagram'])){echo htmlentities($_POST['instagram'], ENT_QUOTES, 'UTF-8');} ?>"/><br/>
            					</label>
            				</div>
            				<div class="col-md-12">
            					<label for="avatar">Avatar : </label><input type="text" name="avatar" value="<?php if(isset($_POST['avatar'])){echo htmlentities($_POST['avatar'], ENT_QUOTES, 'UTF-8');} ?>" /><br/>
            				</div>
            				<div class="col-md-2 submit"><input type="submit" value="Submit"/></div>
						</form>
					</div>
					
				</div>
			</div>
		</div>

<?php include "../includes/footer.php"; ?>