<body>
	<div class="limiter">
		<div class="container-login100" style="background-image:  url('assets/login/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?= base_url('Auth'); ?>">
					<div class="login100-form-avatar">
						<img src="<?= base_url('assets/login/images/stit.jpeg')?>"> 
					</div>
					<span class="login100-form-title p-t-20 p-b-25">
						 <legend class="mt-3"><strong>STIT FATAHILLAH</strong></legend>
					</span>
					<div class="wrap-input100 validate-input m-b-5">
					<?= $this->session->flashdata('message') ?>	
					</div>
					<div class="wrap-input100 validate-input m-b-5" data-validate = "Username is required">
						<input class="input100" type="text"  id="username" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-5" data-validate = "Password is required">
						<input class="input100" type="password" id="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>