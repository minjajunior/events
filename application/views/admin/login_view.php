<?php
/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 11/21/2016
 * Time: 10:19 AM
 */
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>N ~ E ~ P | Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/style.css')?>" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="<?php echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet">
    <!-- jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/icon-font.min.css')?>" type='text/css' />
    <!-- //lined-icons -->
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js')?>"></script>
    <!--clock init-->
</head>
<body>
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
<!--footer section start-->
<div class="footer">
    <div class="error-btn">
        <a class="read fourth" href="<?php echo base_url() ?>">Event Login</a>
    </div>
    <p>&copy 2016. All Rights Reserved | Design by <a href="<?php base_url()?>" target="_blank">N ~ E ~ P</a></p>
</div>
<!--footer section end-->
<!--/404-->
<!--js -->
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js')?>"></script>
<script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>