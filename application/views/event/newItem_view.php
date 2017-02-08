<?php
/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 11/27/2016
 * Time: 5:39 PM
 */?>
<!DOCTYPE HTML>
<html>
<head>
    <title>N ~ E ~ P | New Item</title>
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
    <!--skycons-icons-->
    <script src="<?php echo base_url('assets/js/skycons.js')?>"></script>
    <!--//skycons-icons-->
</head>
<body>
<div class="page-container">
    <!--/content-inner-->
    <div class="left-content">
        <div class="inner-content">
            <!-- header-starts -->
            <div class="header-section">
                <!--menu-right-->
                <div class="top_menu">
                    <!--/profile_details-->
                    <div class="profile_details_left">
                        <h4>N ~ E ~ P</h4>
                    </div>
                    <div class="clearfix"></div>
                    <!--//profile_details-->
                </div>
                <!--//menu-right-->
                <div class="clearfix"></div>
            </div>

            <!-- //header-ends -->
            <!--//outer-wp-->
            <div class="outter-wp">
                <!--/sub-heard-part-->
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">
                        <li><a href="<?php echo site_url('event/create')?>">Item</a></li>
                        <li class="active">Create</li>
                    </ol>
                </div>
                <!--/sub-heard-part-->
                <!--/forms-->
                <div class="forms-main">
                    <!--/forms-inner-->
                    <div class="forms-inner">
                        <!--/set-2-->
                        <div class="set-1">
                            <div class="graph-2 general">
                                <h3 class="inner-tittle two">New Item</h3>
                                <div class="grid-1">
                                    <div class="form-body">
                                        <?php
                                        $attributes = array('class' => 'form-horizontal');
                                        echo form_open('event/new_item/'.$event_id, $attributes);
                                        ?>
                                        <div class="form-group">
                                            <label for="focusedinput" class="col-sm-2 control-label">Item Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="itemname" value="<?php echo set_value('itemname'); ?>" class="form-control1" id="focusedinput" placeholder="Item Name">
                                                <?php echo form_error('itemname'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="focusedinput" class="col-sm-2 control-label">Item Cost</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="itemcost" value="<?php echo set_value('itemcost'); ?>" class="form-control1" id="focusedinput" placeholder="Item Cost">
                                                <?php echo form_error('itemcost'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="focusedinput" class="col-sm-2 control-label">Item Paid</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="itempaid" value="<?php echo set_value('itempaid'); ?>" class="form-control1" id="focusedinput" placeholder="Item Paid">
                                                <?php echo form_error('itempaid'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-8 col-md-offset-2">
                                                <button type="submit" class="btn btn-default">Create</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//set-2-->
                    </div>
                    <!--//forms-inner-->
                </div>
                <!--//forms-->
            </div>
            <!--//outer-wp-->
            <!--footer section start-->
            <footer>
                <p>&copy 2016. All Rights Reserved | Design by <a href="<?php echo base_url()?>" target="_blank">N ~ E ~ P</a></p>
            </footer>
            <!--footer section end-->
        </div>
    </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
    <div class="sidebar-menu">
        <header class="logo">
            <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="<?php echo site_url('admin/home')?>"> <span id="logo"> <h1>N ~ E ~ P</h1></span></a>
        </header>
        <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
        <!--/down-->
        <div class="down">
            <a href="<?php echo site_url('admin/home')?>"><span class=" name-caret"><?php echo $this->session->admin_name; ?></span></a>
            <ul>
                <li><a class="tooltips" href="<?php echo site_url('admin/home')?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
                <!--li><a class="tooltips" href="index.html"><span>Settings</span><i class="lnr lnr-cog"></i></a></li-->
                <li><a class="tooltips" href="<?php echo site_url('admin/logout')?>"><span>Logout</span><i class="lnr lnr-power-switch"></i></a></li>
            </ul>
        </div>
        <!--//down-->
        <div class="menu">
            <ul id="menu" >
                <li><a href="<?php echo site_url('admin/home')?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
                <li><a href="<?php echo site_url('admin/logout')?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<script>
    var toggle = true;
    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        } else {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }
        toggle = !toggle;
    });
</script>
<!--js -->
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js')?>"></script>
<script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>