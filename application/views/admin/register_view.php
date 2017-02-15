<?php
/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 11/20/2016
 * Time: 3:30 PM
 */

$this->load->view('shared/login_header');
?>

<!--/login-->
<div class="error_page">
    <!--/login-top-->

    <div class="error-top">
        <h2 class="inner-tittle page">N ~ E ~ O</h2>
        <div class="login">
            <h3 class="inner-tittle t-inner">Admin Registration</h3>
            <div class="form-body">
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('admin/register', $attributes);
                ?>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="fullname" class="form-control1" value="<?php echo set_value('fullname'); ?>" id="focusedinput" placeholder="Full Name">
                            <?php echo form_error('fullname')?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="email" class="form-control1" value="<?php echo set_value('email'); ?>" id="focusedinput" placeholder="Email Address">
                            <?php echo form_error('email')?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="phone" class="form-control1" value="<?php echo set_value('phone'); ?>" id="focusedinput" placeholder="Phone Number">
                            <?php echo form_error('phone')?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control1" value="<?php echo set_value('password'); ?>" id="inputPassword" placeholder="Password">
                            <?php echo form_error('password')?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" name="password2" class="form-control1" value="<?php echo set_value('password2'); ?>" id="inputPassword" placeholder="Re-Enter Password">
                            <?php echo form_error('password2')?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 submit">
                            <input type="submit" value="Register">
                        </div>
                    </div>
                    <div class="new">
                        <p class="sign">Have an account already ? <a href="<?php echo base_url('admin')?>">Login</a></p>
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