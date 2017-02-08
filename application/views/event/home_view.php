<?php
/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 11/21/2016
 * Time: 5:53 PM
 */?>
<!DOCTYPE HTML>
<html>
<head>
    <title>N ~ E ~ P | Event</title>
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
    <script src="<?php echo base_url('assets/js/amcharts.js')?>"></script>
    <script src="<?php echo base_url('assets/js/serial.js')?>"></script>
    <script src="<?php echo base_url('assets/js/light.js')?>"></script>
    <script src="<?php echo base_url('assets/js/radar.js')?>"></script>
    <link href="<?php echo base_url('assets/css/barChart.css')?>" rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url('assets/css/fabochart.css')?>" rel='stylesheet' type='text/css' />
    <!--clock init-->
    <script src="<?php echo base_url('assets/js/css3clock.js')?>"></script>
    <!--Easy Pie Chart-->
    <!--skycons-icons-->
    <script src="<?php echo base_url('assets/js/skycons.js')?>"></script>

    <script src="<?php echo base_url('assets/js/jquery.easydropdown.js')?>"></script>

    <!--//skycons-icons-->
</head>
<body>
<div class="page-container">
    <!--/content-inner-->
    <div class="left-content">
        <div class="inner-content">
            <!-- header-starts -->
            <div class="header-section">
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
            <div class="outter-wp">
                <div class="profile-widget">
                    <?php foreach($event_details as $ed){ ?>
                        <h2><?php echo $ed->event_name?></h2>
                        <h5>Event Date: <?php echo date_format(date_create($ed->event_date), 'l, jS F Y') ?></h5>
                    <?php } ?>
                </div>
                <hr/>
                <!--custom-widgets-->
                <div class="custom-widgets">
                    <div class="row-one">
                        <div class="col-md-3 widget">
                            <div class="stats-left ">
                                <h5>Cash collected</h5>
                                <h5>
                                    <?php
                                    if(isset($cash_sum)){
                                        echo $english_format_number = number_format($cash_sum, 0, '.', ',')." Tsh.";
                                    }else {
                                        echo "0 Tsh.";
                                    } ?>
                                </h5>
                            </div>
                            <div class="stats-right">
                                <h5>
                                    <?php
                                    if(isset($cash_sum) && isset($budget_sum)){
                                        $cp = ($cash_sum / $budget_sum)*100;
                                        echo $english_format_number = number_format($cp, 1, '.', '')."%";
                                    }else {
                                        echo "0%";
                                    } ?>
                                </h5>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-3 widget states-mdl">
                            <div class="stats-left">
                                <h5>Balance</h5>
                                <h5>
                                    <?php
                                    if(isset($cash_sum) || isset($advance_sum)){
                                        $ba = $cash_sum - $advance_sum;
                                        echo $english_format_number = number_format($ba, 0, '.', ',')." Tsh.";
                                    }else {
                                        echo "0 Tsh.";
                                    } ?>
                                </h5>
                            </div>
                            <div class="stats-right">
                                <h5>
                                    <?php
                                    if(isset($cash_sum) && isset($budget_sum)){
                                        $bp = (($cash_sum - $advance_sum) / $budget_sum)*100;
                                        echo $english_format_number = number_format($bp, 1, '.', '')."%";
                                    }else {
                                        echo "0%";
                                    } ?>
                                </h5>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-3 widget states-thrd">
                            <div class="stats-left">
                                <h5>Pledge</h5>
                                <h5>
                                    <?php
                                    if(isset($pledge_sum)){
                                        echo $english_format_number = number_format($pledge_sum, 0, '.', ',')." Tsh.";
                                    }else {
                                        echo "0 Tsh.";
                                    } ?>
                                </h5>
                            </div>
                            <div class="stats-right">
                                <h5>
                                    <?php
                                    if(isset($budget_sum) && isset($pledge_sum)){
                                        $pp = ($pledge_sum / $budget_sum )*100;
                                        echo $english_format_number = number_format($pp, 1, '.', '')."%";
                                    }else {
                                        echo "0%";
                                    } ?>
                                </h5>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-3 widget states-last">
                            <div class="stats-left">
                                <h5>Budget</h5>
                                <h5>
                                    <?php
                                    if(isset($budget_sum)){
                                        echo $english_format_number = number_format($budget_sum, 0, '.', ',')." Tsh.";
                                    }else {
                                        echo "0 Tsh.";
                                    } ?>
                                </h5>
                            </div>
                            <div class="stats-right">
                                <h5>
                                    <?php
                                    if(isset($advance_sum) && isset($budget_sum)){
                                        $bup = ($advance_sum / $budget_sum)*100;
                                        echo $english_format_number = number_format($bup, 1, '.', '')."%";
                                    }else {
                                        echo "0%";
                                    } ?>
                                </h5>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <!--//custom-widgets-->

                <!--/charts-->
                <div class="charts">
                    <div class="chrt-inner">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if (isset($member_details['error']) && $member_details['error'] == "0" && isset($this->session->admin_id)) {?>
                                    <div class="graph-form">
                                        <div class="form-body">
                                            <a class="btn btn-default blue" href="<?php echo site_url('event/template/member')?>" >Download Member Template</a>
                                            <?php echo form_open_multipart('event/upload_members/'.$event_id); ?>
                                                <div class="form-group">
                                                    <input type="file" name="members">
                                                    <p class="help-block">Upload .xls or .xlsx file</p>
                                                </div>
                                                <button type="submit" name="submit" class="btn btn-default">Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="stats-grid">
                                    <div class="stats-head">
                                        <h4 class="title3">
                                            <div class="col-xs-5 col-sm-9 col-md-9">Members</div>
                                            <?php if(isset($this->session->admin_id)){ ?>
                                            <div class="new_event"><a href="<?php echo site_url('event/new_member/'.$event_id)?>">New Member</a> </div>
                                            <?php } else { ?>
                                                <div class="new_event">Details</div>
                                            <?php } ?>
                                        </h4>
                                    </div>
                                    <div class="stats-info graph">
                                        <?php if (isset($member_details['error']) && $member_details['error'] == "0") {?>
                                            No members found create new member or upload your members file.
                                        <?php } else { ?>
                                            <div class="tables">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Member Name</th>
                                                        <th>Pledge</th>
                                                        <th>Cash</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($member_details as $md){ ?>
                                                    <tr>
                                                        <?php if(isset($this->session->admin_id)){ ?>
                                                        <td><a href="<?php echo site_url('event/edit_member/'.$md->member_id) ?>"><?php echo $md->member_name?></a></td>
                                                        <?php } else { ?>
                                                        <td><?php echo $md->member_name?></td>
                                                        <?php } ?>
                                                        <td><?php echo $english_format_number = number_format($md->member_pledge, 0, '.', ',')." Tsh.";?></td>
                                                        <td><?php echo $english_format_number = number_format($md->member_cash, 0, '.', ',')." Tsh."; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?php if (isset($budget_details['error']) && $budget_details['error'] == "0" && isset($this->session->admin_id)) {?>
                                    <div class="graph-form">
                                        <div class="form-body">
                                            <a class="btn btn-default blue" href="<?php echo site_url('event/template/budget')?>" >Download Budget Template</a>
                                            <?php echo form_open_multipart('event/upload_budget/'.$event_id); ?>
                                            <div class="form-group">
                                                <input type="file" name="budget">
                                                <p class="help-block">Upload .xls or .xlsx file</p>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-default">Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="stats-grid">
                                    <div class="stats-head">
                                        <h4 class="title3">
                                            <div class="col-xs-5 col-sm-9 col-md-9">Budget</div>
                                            <?php if(isset($this->session->admin_id)) { ?>
                                            <div class="new_event"><a href="<?php echo site_url('event/new_item/'.$event_id)?>">New Item</a> </div>
                                            <?php } else { ?>
                                            <div class="new_event">Details</div>
                                            <?php } ?>
                                        </h4>
                                    </div>
                                    <div class="stats-info graph">
                                        <?php if (isset($budget_details['error']) && $budget_details['error'] == "0") {?>
                                            No budget items found create new item or upload your budget file.
                                        <?php } else { ?>
                                            <div class="tables">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th>Cost</th>
                                                    <th>Paid</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($budget_details as $bd){ ?>
                                                <tr>
                                                    <?php if(isset($this->session->admin_id)){ ?>
                                                    <td><a href="<?php echo site_url('event/edit_budget/'.$bd->item_id) ?>"><?php echo $bd->item_name?></a></td>
                                                    <?php } else { ?>
                                                        <td><?php echo $bd->item_name?></td>
                                                    <?php } ?>
                                                    <td><?php echo $english_format_number = number_format($bd->item_cost, 0, '.', ',')." Tsh.";?></td>
                                                    <td><?php echo $english_format_number = number_format($bd->item_paid, 0, '.', ',')." Tsh."; ?></td>
                                                </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//charts-->
                    </div>
                    <!--/charts-inner-->
                </div>
                <!--//outer-wp-->
            </div>
            <!--footer section start-->
            <footer>
                <p>&copy 2016. All Rights Reserved | Design by <a href="<?php echo base_url()?>" target="_blank">N ~ E ~ P</a></p>
            </footer>
            <!--footer section end-->
        </div>
    </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
    <?php if(!empty($this->session->admin_id)) {?>
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
    <?php } elseif(!empty($this->session->event_id)) {?>
        <div class="sidebar-menu">
            <header class="logo">
                <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="<?php echo site_url('event')?>"> <span id="logo"> <h1>N ~ E ~ P</h1></span></a>
            </header>
            <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
            <!--/down-->
            <!--//down-->
            <div class="menu">
                <ul id="menu" >
                    <li><a href="<?php echo site_url('event/logout')?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
                </ul>
            </div>
        </div>

    <?php } ?>
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
<link rel="stylesheet" href="css/vroom.css">
<script type="text/javascript" src="<?php echo base_url('assets/js/vroom.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/TweenLite.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/CSSPlugin.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js')?>"></script>
<script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>