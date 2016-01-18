
	<div class="container">  <!-- main div -->
		<div class = "col-md-2 col-xs-12"></div>
		<div class ="col-md-4 container col-xs-12 form-group"> <!---LEFT SIDE --->
			<div> <!--- sign up ---->

				<?php
					echo validation_errors(); 
					echo form_open("Register"); 
				?>
						<fieldset>
							<legend>Register</legend>
							<label>Your Email:</label>
							<input class="form-control" type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" />
							<label>First Name:</label>
							<input class="form-control" type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" />
							<label>Last Name:</label>
							<input class="form-control" type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>" />
							<label>Phone: </label>
							<input class="form-control" type="text" id="phone" name="phone" value="<?php echo set_value('phone'); ?>" />
							<label>Password:</label>
							<input class="form-control" type="password" id="password" name="password" value="" />
							<label>Confirm Password:</label>
							<input class="form-control" type="password" id="confirm_password" name="confirm_password" value="" /></br>
							<input class="form-control btn btn-lg btn-default" type="submit"  value="Register" />
						</fieldset>
					</form>
					</br>
					<?php echo $this->session->flashdata('flash_register'); ?>
			</div> <!--- end sign up -->
		</div>		<!---- end left side -->
		<div class="col-md-4 container col-xs-12 form-group">  <!---RIGHT SIDE SIDE --->
					
			<div> <!-- login div -->
				<?php
					echo form_open("Login"); 
				?>
						<fieldset>
							<legend>Login</legend>
							<label>Your Email:</label>
							<input class="form-control" type="text" id="login_email_address" name="login_email_address" value="<?php echo set_value('login_email_address'); ?>" />
							<label>Password:</label>
							<input class="form-control" type="password" id="login_password" name="login_password" value="" />
							</br>
							<input class="form-control btn btn-lg btn-default" type="submit"  value="Login" />
						</fieldset>
					</form>
					</br>
					<?php echo $this->session->flashdata('flash_login'); ?>
				
			</div>
		</div> <!----- end right side -->
		<div class="col-md-2 col-xs-12"> </div>
	 </div>   <!-- end main div -->    
