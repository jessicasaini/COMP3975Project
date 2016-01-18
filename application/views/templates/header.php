<!DOCTYPE html>
<?php
//print_r($this->session->userdata('logged_in'));

$this->load->model('reg_model');
$info = $this->reg_model->get_site_info();
?>
<base href="<?php echo $this->config->base_url(); ?>" />
<html>
<head>
	<title><?php echo $info[0]['site_name'];?></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="public_html/assets/css/styles.css">
</head>

<div style="background-color:#00CCFF ;">
	<div class = "container" style="margin-bottom:25px;">
		<div class="col-md-2 col-xs-12">
			<a href="http://foodnowonline.xyz/index.php"><img class='' src="public_html/assets/images/<?php echo $info[0]['logo'];?>" alt="Logo" height="100" width="150"></a>
		</div>
		<div class="col-md-8">
			<div>
				<ul class="nav nav-tabs" >
					<li style="width:20%; text-align:center;" ><a href="http://foodnowonline.xyz/index.php"><h4>Home</h4></a></li>
					<li style="width:20%; text-align:center;" ><a href="http://foodnowonline.xyz/index.php/Order"><h4>Order</h4></a></li>
					<li style="width:20%; text-align:center;"><a href="http://foodnowonline.xyz/index.php/Contact"><h4>Contact</h4></a></li>
					<li style="width:20%; text-align:center;"><a href="http://foodnowonline.xyz/index.php/About_us"><h4>About Us</h4></a></li>
				</ul>
			</div>
			<div class="text-center" >
				<ul class="nav nav-tabs text-center" >
					<?php
					if($this->session->userdata('summary')){
						?>
						<li class="text-center" style="width:25%;text-align:center;" ><a href="http://foodnowonline.xyz/index.php/Checkout"><h4>Cart/Checkout</h4></a></li>
						<?php
					}
					if($this->session->userdata('order_id')){
						?>
						<li class="text-center" style="width:25%;text-align:center;" ><a href="http://foodnowonline.xyz/index.php/Menu"><h4>Menu/Add Food</h4></a></li>
						<?php
					}
					if($this->session->userdata('logged_in')){
						?>
						<li class="text-center" style="width:25%;text-align:center;" ><a href="http://foodnowonline.xyz/index.php/Logout"><h4>Logout</h4></a></li>
						<?php
					}

					?>
				</ul>
			</div>
		</div>
		<div class="col-md-2 col-xs-12">
		</div>
	</div>
</div>

<body>