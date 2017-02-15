<?php
/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 11/20/2016
 * Time: 3:02 PM
 */

$this->load->view('shared/login_header');
?>

<!--/login-->

<div class="error_page">
    <!--/login-top-->

    <div class="error-top">
        <h2 class="inner-tittle page">N ~ E ~ P</h2>
        <div class="login">
            <h3 class="inner-tittle t-inner">Event Login</h3>
            <div class="form-body">
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('event', $attributes);
                ?>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="eventcode" class="form-control1" value="<?php echo set_value('eventcode'); ?>" id="focusedinput" placeholder="Event Code">
                            <?php echo form_error('eventcode')?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control1" value="<?php echo set_value('password'); ?>" id="inputPassword" placeholder="Password">
                            <?php echo form_error('password')?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 submit">
                            <input type="submit" value="Login">
                        </div>
                    </div>
                    <div class="new">
                        <p class="sign">Do not have an event? <a href="<?php echo site_url('admin')?>">Login</a></p>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--//login-top-->
</div>

<!--//login-->
<?php $this->load->view('shared/login_footer') ?>