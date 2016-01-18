

<script type="text/javascript">

function yesnoCheck() {
    if ((document.getElementById('del_later').checked)) {
        document.getElementById('ifyes').style.display = 'block';
    }
    else document.getElementById('ifyes').style.display = 'none';

}

function yesnoCheckPick() {
    if ((document.getElementById('pickup_later').checked)) {
        document.getElementById('ifyes').style.display = 'block';
    }
    else document.getElementById('ifyes').style.display = 'none';

}
</script>
	<div class= "container">
		<div>
			<?php
				//print_r($this->session->userdata('order_type'));
				if($this->session->userdata('order_type')){
					if($this->session->userdata('order_type') == 1){
			?>
						<div class="col-md-1 col-xs-12"></div>
						<div class="col-md-6 form-group col-xs-12" style="font-size:15px">
							<?php
								echo validation_errors();
								echo form_open("delivery");
							?>
									<fieldset>
										<legend><h2>Delivery Options</h2></legend>
										<fieldset>
										<legend><h4>Select an Address</h4></legend>	
										<?php
											if(count($addresses)==0){
												echo "Add an address first.</br>";
											}
											for($i = 0; $i < count($addresses); $i++){
												echo "<input type='radio' name='cust_address' id='" 
												. $addresses[$i]['id'] . "' value='" 
												. $addresses[$i]['id'] . "'><label for='" . $addresses[$i]['id'] . "'>" . $addresses[$i]['address'] . 
											 "</label><br>";
											}						
										?>
										<br>
										</fieldset>
										<fieldset>
											<legend><h4>Select a delivery time</h4></legend>
											<input type='radio'  name='delivery_time_option' onclick="javascript:yesnoCheck();"  id="del_now" value="1">
											<label for= "del_now">Now</label><br> 
											<input type='radio'  name='delivery_time_option' onclick="javascript:yesnoCheck();" id="del_later" value="2">
											<label for="del_later">Later</label><br>
											<br>
											<div id="ifyes" style="display:none">
												<label for="del_time">Select a time</label>
												<input class='form-control' type="time" id="del_time" name="del_time">
											</div>
										</fieldset>
										</br>
										<input class='form-control btn btn-default '  type="submit" name="delivery_submit" value= "Next">
									</fieldset>
								</form>
						</div>
						<div class="col-md-4 form-group col-xs-12" style="font-size:15px">
							<?php 
								//form_open("address");
							?>
								<form method="post" action="index.php/address">
									<fieldset>
										<legend>Add an address</legend>
										<label for="address_name">Name</label>
										<input class='form-control' type="text" name="address_name" id="address_name" size="15">
										<label for="apt_number">Unit #:</label>
										<input class='form-control' type="text" name="apt_number" id="apt_number" size="5">
										<label for="house_number">House #:</label>
										<input class='form-control' type="text" name="house_number" id="house_number" size="8">
										<label for="street">Street:</label>
										<input class='form-control' type="text" name="street" id="street" size="15">
										<label for="city">City:</label>
										<input class='form-control' type="text" name="city" id="city" size="15">
										<label for="delivery_notes">Delivery Notes</label>
										<textarea class='form-control' name="delivery_notes" id="delivery_notes" rows="2" cols="50"></textarea></br>
										<input class='form-control btn btn-default' type="submit" name="address_submit" value= "add"></br>
									</fieldset>
								</form>	
						</div>
						<div class="col-md-1 col-xs-12"></div>
							<?php
					}
					else if($this->session->userdata('order_type') == 2) {
					?>
						
						<div class="container col-md-3 col-xs-12"></div>
						<div style="font-size:20px" class="container form-group col-md-6 col-xs-12">
						<?php
							echo validation_errors();
							echo form_open("pickup");
						?>
								<fieldset>
									<legend><h2>Pick Up Options</h2></legend>
									<fieldset>
										<legend><h3>Select a store</h3></legend>	
										<?php
											for($i = 0; $i < count($stores); $i++){
												echo "<input type='radio' name='pickup_location' id='" 
												. $stores[$i]['id'] . "' value='" 
												. $stores[$i]['id'] . "'><label for='" . $stores[$i]['id'] . "'>" . $stores[$i]['name'] . 
												" - " . $stores[$i]['address']. "</label></br>";
											}
										?>
									</fieldset>
									</br>
									<fieldset>
											<legend><h4>Select a pick up time</h4></legend>
											<input type='radio' name='pickup_time_option' onclick="javascript:yesnoCheckPick();"  id="pickup_now" value="1">
											<label for="pickup_now">Now</label><br>
											<input type='radio' name='pickup_time_option' onclick="javascript:yesnoCheckPick();" id="pickup_later" value="2">
											<label for="pickup_later">Later</label><br>
											<br>
											<div id="ifyes" style="display:none">
												<label for="pickup_time">Select a time</label>
												<input class='form-control' type="time" id="pickup_time" name="pickup_time">
											</div>
										</fieldset>
									</br>
									<input class="form-control btn btn-default"type="submit" name="pickup_submit" value= "Next">
								</fieldset>
							</form>
						</div>		
						<div class="container col-md-3 col-xs-12"></div>
			<?php	
					}			
				}
			?>
		</div>
	</div>
