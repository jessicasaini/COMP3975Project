

<div class="container">  <!-- main div -->
    <div class = "col-md-2 col-xs-12"></div>
    <!---- end left side -->
    <div class="col-md-8 container col-xs-12 form-group">  <!---RIGHT SIDE SIDE --->

        <div>
            <?php //print_r($orders);
            for($i = 0; $i < count($orders); $i++){
                echo "<h3>". $orders[$i]['name'] . "</h3>";
                for($j = 0; $j < count($orders[$i]['orders']); $j++){
                    echo "<h4>" . $orders[$i]['orders'][$j]['id'] . " - Name: " .
                        $orders[$i]['orders'][$j]['name']. " - Phone: " .
                        $orders[$i]['orders'][$j]['phone'];
                        echo "</h4>";
                        if($orders[$i]['orders'][$j]['pickup_info']){
                            echo "<label>PICK UP</label>";
                        }
                        else if($orders[$i]['orders'][$j]['delivery_info']){
                            echo "<label>DELIVERY:&nbsp;</label>" . $orders[$i]['orders'][$j]['delivery_info'];
                        }
                        $d = new DateTime($orders[$i]['orders'][$j]['ready_time']);
                        echo "</br><label>Time:&nbsp;</label>" . $d->format('D M d Y - g:iA') . "</br>";
                        for($k = 0; $k < count($orders[$i]['orders'][$j]['items']); $k++){
                            echo $orders[$i]['orders'][$j]['items'][$k]['description']. "</br>";
                        }
                        echo "<label>Total:&nbsp;$</label>" . $orders[$i]['orders'][$j]['total'];
                        echo "<form method='post' action='index.php/Completed'>";
                        echo "<input  style='' class='btn-danger btn-xs' name='completed' type='submit'  value='Completed'>";
                        echo "<input class='form-control' type='hidden' name='order_id' value='" . $orders[$i]['orders'][$j]['id'] . "'>";
                        echo "</form>";
                        echo "</br></br>";

                }
            }

            ?>


        </div>
    </div> <!----- end right side -->
    <div class="col-md-2 col-xs-12">
        <button class="btn btn-default"><a href="index.php/Admin_logout">Logout</a></button>
    </div>
</div>   <!-- end main div -->











