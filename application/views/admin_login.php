
<div class="container">  <!-- main div -->
    <div class = "col-md-4 col-xs-12"></div>
   	<!---- end left side -->
    <div class="col-md-4 container col-xs-12 form-group">  <!---RIGHT SIDE SIDE --->

        <div> <!-- login div -->
            <?php
            echo form_open("Admin_login");
            ?>
            <fieldset>
                <legend>Login</legend>
                <label>User:</label>
                <input class="form-control" type="text" id="login_user" name="login_user"  />
                <label>Password:</label>
                <input class="form-control" type="password" id="login_password" name="login_password" value="" />
                </br>
                <input class="form-control btn btn-lg btn-default" type="submit"  value="Login" />
            </fieldset>
            </form>
            </br>
            <?php echo $this->session->flashdata('flash_login');
            //print_r($_SESSION);?>

        </div>
    </div> <!----- end right side -->
    <div class="col-md-4 col-xs-12"> </div>
</div>   <!-- end main div -->
