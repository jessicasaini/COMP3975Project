
	<div class="container">  <!-- main div -->
		<div class="col-md-4 col-xs-12"></div>
		<div class ="col-md-4 container col-xs-12"> <!---LEFT SIDE --->
				<div style="font-size:25px" class="form-group">
					<?php
						echo validation_errors();
						echo form_open("Order_Options");
						
					?>
							<fieldset>
								<legend><h2>Order Options</h2></legend>
								<input type="radio" name="order_type" value="1" id="delivery"><label for="delivery">Delivery</label>
								</br>
								<input type="radio" name="order_type" value="2" id="pickup"><label for="pickup">Pick Up</label>
								</br>
								</br>
								<input class="form-control btn btn-default"type="submit" name="options_submit" value= "Next">
							</fieldset>
						</form>
				</div>
		</div>		<!---- end left side -->
		<div class="col-md-4 col-xs-12"></div>
	 </div>   <!-- end main div -->    
