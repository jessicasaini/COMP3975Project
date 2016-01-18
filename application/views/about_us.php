
<?php //print_r($this->session->userdata('logged_in'));
$this->load->model('reg_model');
$info = $this->reg_model->get_site_info();
?>
<div class="container">  <!-- main div -->
    <div class="col-md-2 col-xs-12"></div>
    <div class ="col-md-8 container col-xs-12" style="text-align:center"> <!---LEFT SIDE --->
        <legend><h2>About Us</h2></legend>
        <h3><?php echo $info[0]['about_us'];?></h3>
    </div>		<!---- end left side -->
    <div class="col-md-2 col-xs-12"></div>
</div>   <!-- end main div -->
