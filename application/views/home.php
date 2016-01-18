
	<?php //print_r($this->session->userdata('logged_in'));
	$this->load->model('reg_model');
	$info = $this->reg_model->get_site_info();
	?>
	<div class="container">  <!-- main div -->
		<div class="col-md-2 col-xs-12"></div>
		<div class ="col-md-8 container col-xs-12" style="text-align:center"> <!---LEFT SIDE --->
			
			
			<img class='img-rounded' src="public_html/assets/images/<?php echo $info[0]['home_image'];?>" alt="Pizza" height="400" width="600">
			</br></br>
			<button type="button" class="btn btn-default btn-lg"><a href="http://foodnowonline.xyz/index.php/Order" >ORDER NOW</a></button>
		</div>		<!---- end left side -->
		<div class="col-md-2 col-xs-12"></div>
	 </div>   <!-- end main div -->    
