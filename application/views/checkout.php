<?php

//print_r($_SESSION);
//print_r($summary);
//print_r($items);
$this->session->set_userdata('url', 'Checkout');
?>

    <div class="container" style="margin-bottom: 100px; ">
    <div class="col-md-12 col-xs-12 text-center">

    </div>
<?php
if(isset($summary[0])) {

    ?>
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
            if ($this->session->userdata('order_type') == 1) {
                echo "<label>Delivery to:&nbsp;</label>";
                echo $summary[0]['delivery_info'];
                echo "</br>";
                echo "</br>";
                echo "<label>Delivery time&nbsp;</label>";
                echo $readytime->format('D M d Y - g:iA');
                echo "</br></br><button class='btn btn-default' style='width: 50%; height:55px'><a href='index.php/Order_Options'>Update Delivery<br> Details</a></button>";
            } else if ($this->session->userdata('order_type') == 2) {
                echo "<label>Pick up at:&nbsp;</label>";
                echo $summary[0]['pickup_info'];
                echo "</br>";
                echo "</br>";
                echo "<label>Pick up time:&nbsp;</label>";
                echo $readytime->format('D M d Y - g:iA');
                echo "</br></br><button class='btn btn-default' style='width: 50%; height: 55px'><a href='index.php/Order_Options'>Update Pick Up</br>Details</a></button>";
            }
            echo "<button class='btn btn-default' style='width: 50%; height: 55px'><a href='index.php/Order'>Change Order</br>Type</a></button>";

            ?>

    </div>

    <div class="col-md-4 col-xs-12" style="font-size: 20px">
    <?php

        echo validation_errors();
        echo $this->session->flashdata('errors');
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
                echo "<form method='post' action='index.php/Submit'>";
                    echo "<label>Payment-Type: &nbsp;</label></br>";
                    echo "<input type='checkbox' name='payment[]' value='cash'> Cash </br>";
                    echo "<input type='checkbox' name='payment[]' value='debit'> Debit </br>";
                    echo "<input type='checkbox' name='payment[]' value='credit'> Credit </br></br>";
                    echo "<input type='submit' class='btn btn-md btn-default form-control' style='' value='Submit Order'>";
                echo "</form>";
            echo "</div>";

    ?>

    </div>
        <div class="col-md-4 col-xs-12">
            <?php
                echo "<div class='form-inline'>";
                    echo "<div class='form-group'>";
                        echo"<legend><h3>Your cart</h3></legend>";
                        for ($i = 0; $i < count($items); $i++) {
                            echo "<form method='post' action='index.php/Delete_item'>";
                            echo "<input  style='height: 20px' class='form-control btn-danger btn-xs' name='remove' type='submit'  value='x'>";
                            echo "<input class='form-control' type='hidden' name='order_item_id' value='" . $items[$i]['id'] . "'>";
                            echo "<label for='remove'>" . $items[$i]['description'] . "</label>";
                            echo "</form>";
                        }
                        echo "</br></br><button class='btn btn-default' style='width: 100%; font-size:15px; height:35px'><a href='index.php/Menu'>Add more items</a></button>";
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
