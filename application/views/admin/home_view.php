<?php
/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 11/21/2016
 * Time: 12:34 PM
 */?>
<!DOCTYPE HTML>
<html>
<head>
    <title>N ~ E ~ P | <?php echo $this->session->admin_name ?> Events</title>
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
                        <li><a href="<?php site_url('admin/home')?>">Admin</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
                <!--/sub-heard-part-->
                <!--/chat-->
                <div class="chat-inner">
                    <!--/chat-inner-->
                    <div class="stats-grid">
                        <div class="stats-head">
                            <h4 class="title3"><div class="col-xs-5 col-sm-9 col-md-10">Events</div><div class="new_event"><a href="<?php echo site_url('event/create')?>">New Event</a> </div></h4>
                        </div>
                        <div class="stats-info graph">
                            <div class="tables">
                                <?php if(!isset($event['error'])) { ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Event Name</th>
                                            <th>Event Date</th>
                                            <th>Event Fee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($event as $eve){ ?>
                                        <tr>
                                            <td><a href="<?php echo site_url('event/home/'.$eve->event_id) ?>"><?php echo $eve->event_name ?></a></td>
                                            <td><?php echo date_format(date_create($eve->event_date), 'l, jS F Y') ?></td>
                                            <?php if($eve->event_paid == 0) { ?>
                                                <td>Not Paid</td>
                                            <?php } else { ?>
                                            <td>Paid</td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <?php } else { ?>
                                <p>You did not create any event yet.</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!--/chat-inner-->
                </div>
                <!--//chat-->
                <!--//Widgets-->
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
        }
        else
        {
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