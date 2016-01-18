
<?php //print_r($this->session->userdata('logged_in'));
$this->load->model('reg_model');
$info = $this->reg_model->get_site_info();
?>
<div class="container">  <!-- main div -->
    <div class="col-md-2 col-xs-12"></div>
    <div class ="col-md-8 container col-xs-12" style="text-align:center"> <!---LEFT SIDE --->
        <legend><h2>Contact</h2></legend>
        <?php
            for($i = 0; $i < count($stores); $i++){
                echo "<h3>" . $stores[$i]['name'] . "</h3>";
                echo "<label>Address:&nbsp;</label>" . $stores[$i]['address'] . "</br>";
                echo "<label>Phone:&nbsp;</label>" . $stores[$i]['phone'] . "</br>";
                echo "<label>Email:&nbsp;</label>" . $stores[$i]['email'] . "</br></br>";
            }

        ?>
    </div>		<!---- end left side -->
    <div class="col-md-2 col-xs-12"></div>
</div>   <!-- end main div -->
