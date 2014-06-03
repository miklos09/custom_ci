<div class="login">
	<h1>Login <font>System name</font></h1>
	<form method="POST" action="<?php echo base_url(); ?>login">
		<div class="lo-field">
			<!--<label>email:</label>-->
			<input type="text" name="email" placeholder="email" />
			<!--<label>password:</label>-->
			<input type="password" name="password" placeholder="password"/>
		</div>
		<input class="btn-blue" type="submit" name="sign-in" value="Sign-in with System Name"/>
		<input class="btn-gray register-btn" type="button" name="sign-in" value="Register"/>
	</form>
	<div class="notification">
			<?php if($error){ ?>
				<p class="error"><?php echo $error; ?></p>
			<?php } ?>
			<?php if($success){ ?>
				<p class="success"><?php echo $success; ?></p>
			<?php } ?>
	</div>
</div>
<script src="<?php echo base_url(); ?>files/default/js/login.js"></script>

