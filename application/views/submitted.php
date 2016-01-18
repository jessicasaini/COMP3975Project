
<?php

//print_r($_SESSION);
//print_r($summary);
//print_r($items);
//$this->session->set_userdata('url', 'Checkout');
?>

<div class="container" style="margin-bottom: 100px; ">

    <?php
    if(isset($summary[0])) {

        ?>
        <div class="col-md-12 col-xs-12 text-center">
            <h2>Your order has been successfully submitted</h2>
            <h2>Confirmation #: <?php echo $summary[0]['id']; ?></h2>
        </div>
        <div class="col-md-4 col-xs-12" style="font-size: 20px">

            <?php
            echo "<legend><h3>Details</h3></legend>";
            echo "<label>Name:&nbsp;</label>";
            echo $summary[0]['name'];
            echo "</br>";
            echo "</br>";
            echo "<label>Phone:&nbsp;</label>";
            echo $summary[0]['phone'];
            echo "</br>";
            echo "</br>";
            $readytime = new DateTime($summary[0]['ready_time']);
            if ($summary[0]['delivery_info']) {
                echo "<label>Delivery to:&nbsp;</label>";
                echo $summary[0]['delivery_info'];
                echo "</br>";
                echo "</br>";
                echo "<label>Delivery time&nbsp;</label>";
                echo $readytime->format('D M d Y - g:iA');

            } else if ($summary[0]['pickup_info']) {
                echo "<label>Pick up at:&nbsp;</label>";
                echo $summary[0]['pickup_info'];
                echo "</br>";
                echo "</br>";
                echo "<label>Pick up time:&nbsp;</label>";
                echo $readytime->format('D M d Y - g:iA');
            }

            ?>

        </div>

        <div class="col-md-4 col-xs-12" style="font-size: 20px">
            <?php



            echo "<legend><h3>Payment</h3></legend>";
            echo "<label>Subtotal:&nbsp;</label>$" . $summary[0]['subtotal'];
            echo "</br>";
            echo "</br>";
            echo "<label>Taxes:&nbsp;</label>$" . $summary[0]['tax'];
            echo "</br>";
            echo "</br>";
            echo "<label>Total:&nbsp;</label>$" . $summary[0]['total'];
            echo "</br>";
            echo "</br>";

            echo "<div class='form-group'>";

            echo "<label>Payment-Type: &nbsp;</label></br>";
            if($summary[0]['cash']){
                echo "cash</br>";
            }
            if($summary[0]['debit']){
                echo "debit</br>";
            }
            if($summary[0]['credit']){
                echo "credit</br>";
            }
            echo "</div>";

            ?>

        </div>
        <div class="col-md-4 col-xs-12">
            <?php
            echo "<div class='form-inline'>";
            echo "<div class='form-group'>";
            echo"<legend><h3>Your items</h3></legend>";
            for ($i = 0; $i < count($items); $i++) {
                echo "<form method='post' action='index.php/Delete_item'>";
                echo "<label for='remove'>" . $items[$i]['description'] . "</label>";
                echo "</form>";
            }

            echo "</div>";




            echo "</div>";
            ?>
        </div>
        <?php
    }
    else {
        echo"you must add items to your order!";

    }
    ?>
</div>
