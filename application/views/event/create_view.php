<?php
/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 11/21/2016
 * Time: 3:31 PM
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
                        <h4>N ~ E ~ O</h4>
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
                        <li><a href="<?php echo site_url('event/create')?>">Event</a></li>
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
                                <h3 class="inner-tittle two">Create Event</h3>
                                <div class="grid-1">
                                    <div class="form-body">
                                        <?php
                                        $attributes = array('class' => 'form-horizontal');
                                        echo form_open('event/create', $attributes);
                                        ?>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Event Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="eventname" value="<?php echo set_value('eventname'); ?>" class="form-control1" id="focusedinput" placeholder="Event Name">
                                                    <?php echo form_error('eventname'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Event Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="eventcode" value="<?php echo set_value('eventcode'); ?>" class="form-control1" id="focusedinput" placeholder="Event Code">
                                                    <?php echo form_error('eventname'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Event Date</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="eventdate" value="<?php echo set_value('eventdate'); ?>" class="form-control1" id="focusedinput" placeholder="YYYY-MM-DD">
                                                    <?php echo form_error('eventdate'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">Event Location</label>
                                                <div class="col-sm-8">
                                                    <select name="location" id="selector1" class="form-control1">
                                                        <option value="">Select Region</option>
                                                        <?php foreach($location as $loc){ ?>
                                                            <option value="<?php echo set_value(print $loc->location_id); ?>"><?php echo set_value(print $loc->location_name); ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <?php echo form_error('location'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control1" id="inputPassword" placeholder="Password">
                                                    <?php echo form_error('password'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-2 control-label">Re-Enter Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="password2" value="<?php echo set_value('password2'); ?>" class="form-control1" id="inputPassword" placeholder="Re-Enter Password">
                                                    <?php echo form_error('password2'); ?>
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
            <?php $this->load->view('shared/footer') ?>
            <!--footer section end-->
        </div>
    </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
    <?php $this->load->view('shared/sidebar') ?>
