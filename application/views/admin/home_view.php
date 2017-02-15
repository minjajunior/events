<?php
/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 11/21/2016
 * Time: 12:34 PM
 */

$this->load->view('shared/header');
?>

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
            <?php $this->load->view('shared/footer') ?>
            <!--footer section end-->
        </div>
    </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
    <?php $this->load->view('shared/sidebar') ?>