<?php
/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 11/21/2016
 * Time: 10:19 AM
 */

$this->load->view('shared/login_header');
?>
<!--/login-->

<div class="error_page">
    <!--/login-top-->

    <div class="error-top">
        <h2 class="inner-tittle page">N ~ E ~ P</h2>
        <div class="login">
            <h3 class="inner-tittle t-inner">Admin Login</h3>
            <div class="buttons login">
                <ul>
                    <li><a href="#" class="hvr-sweep-to-right">Facebook</a></li>
                    <li class="lost"><a href="#" class="hvr-sweep-to-left">Twitter</a> </li>
                    <div class="clearfix"></div>
                </ul>
            </div>
            <div class="form-body">
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('admin', $attributes);
                ?>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" name="email" class="form-control1" value="<?php echo set_value('email'); ?>" id="focusedinput" placeholder="Email Address">
                        <?php echo form_error('email')?>
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
                    <p class="sign">Do not have an account ? <a href="<?php echo base_url('admin/register')?>">Register</a></p>
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