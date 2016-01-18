


	<div class="container" style="margin-bottom: 100px ">
		<div class="col-md-8 col-xs-12">
		<div>
		<?php 
			//print_r($menu);
			echo validation_errors();
			$this->session->set_userdata('url', 'menu');
			for($i = 0 ; $i < count($menu) ; $i++){
				echo"<div class=col-md-12 container'>";
					echo"<div class='col-md-3'>";
						echo "<img class='img-rounded' src='public_html/assets/images/" . $menu[$i]['image'] . "' alt='Pizza' height='150' width='150'>";
					echo"</div>";
					echo"<div class='col-md-9'>";
						$prices = $menu[$i]['prices'];
						echo"<div class='form-inline'>";
							echo "<div class='form-group'>";
								$hidden = array('item_id' => $menu[$i]['id']);
								echo "<form method='post' action='index.php/Add_item' id='add_item" . $menu[$i]['id'] . "'>";
									echo "<input type='hidden' name='item_id' value='". $menu[$i]['id'] . "'>";
									echo "<fieldset>";	
										echo "<legend><h3>" . $menu[$i]['name']. "</h3></legend>";
										echo "<div style='padding-bottom: 10px;'>" . $menu[$i]['description'] . "</div>";
										echo "<select class='form-control' name='item_size' form='add_item" . $menu[$i]['id'] . "' style='width: 250px;'>";
											for($x = 0; $x < count($prices) ; $x++){
												echo"<option value='" . $prices[$x]['id'] ."'>" . $prices[$x]['size'] . " - $" . $prices[$x]['price'] .  "</option>"; 
											}
										echo "</select>";
										echo "<input class='form-control' placeholder='quantity' type='number' name='quantity' min='1' max='100'>";
										echo "<input type='submit' class='form-control btn btn-md btn-default' style='width: 100px;'  value='Add'>";
									echo "</fieldset>";	
								echo "</form>";
							echo" </div>";
						echo"</div>";
					echo"</div>";
				echo"</div>";
			
			}
		?>
		</div>
		</div> 
		<div class="col-md-4 col-xs-12">
			<h3>Order Summary</h3>
			<?php
			echo "<div class='form-inline'>";
				echo "<div class='form-group'>";
					//print_r($items);
					for($i = 0 ; $i < count($items) ; $i++){
						echo "<form method='post' action='index.php/Delete_item'>";
							echo "<input  style='height: 20px' class='btn-danger btn-xs' name='remove' type='submit'  value='x'>";
							echo "<input class='form-control' type='hidden' name='order_item_id' value='" . $items[$i]['id'] . "'>";
							echo "<label for='remove'>" . $items[$i]['description'] . "</label>";
						echo "</form>";

					}
				echo "</div>";
			echo "</div>";
				if(isset($summary[0])) {
					echo "<div class='form-group'>";
					echo "<h4>Subtotal: $" . $summary[0]['subtotal'] . "</h4>";
					echo "<form method='post' action='index.php/Checkout'>";
					echo "<input type='submit' class='form-control btn btn-default'  value='Checkout'>";
					echo "</form>";
					echo "</div>";
				}
			?>
		</div>
	</div>
