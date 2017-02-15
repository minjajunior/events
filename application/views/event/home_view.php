<?php
/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 11/21/2016
 * Time: 5:53 PM
 */

$this->load->view('shared/header');
?>

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
            <?php $this->load->view('shared/footer') ?>
            <!--footer section end-->
        </div>
    </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
    <?php $this->load->view('shared/sidebar')?>