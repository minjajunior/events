<?php
/**
 * Created by PhpStorm.
 * User: Minja Junior
 * Date: 2/15/2017
 * Time: 9:50 AM
 */
?>
<?php if(!empty($this->session->admin_id)) {?>
    <div class="sidebar-menu">
        <header class="logo">
            <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="<?php echo site_url('admin/home')?>"> <span id="logo"> <h1>Events</h1></span></a>
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
                <li><a href="javascript:void(0)" class="menu_item" rel="<?php echo $event_id; ?>" id="budget_view"><i class=" fa fa-home"></i> <span>Budget</span></a></li>
                <li><a href="javascript:void(0)" class="menu_item" rel="<?php echo $event_id; ?>" id="members_view"><i class=" fa fa-home"></i> <span>Members </span></a></li>
                <li><a href="javascript:void(0)" class="menu_item" rel="<?php echo $event_id; ?>" id="reports_view"><i class="fa fa-home"></i> <span>Reports</span></a></li>
                <li><a href="<?php echo site_url('admin/logout')?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
            </ul>
        </div>
    </div>
<?php } elseif(!empty($this->session->event_id)) {?>
    <div class="sidebar-menu">
        <header class="logo">
            <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="<?php echo site_url('event')?>"> <span id="logo"> <h1>Events</h1></span></a>
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

    $(document).ready(function() {

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



        var getContentView = function(postData) {
        //alert(postData['event_id']);
            $.ajax(
                {
                    type:"POST",
                    url: "<?php echo base_url('Event/load_views')?>",
                    //data:"id="+view_name,
                    data:postData,
                    dataType: "html",
                    success: function(data) {
                        $('#load_navigation_menu_view').html(data);
                    },
                    error: function(data) {

                        alert('An error has occured trying to get the album details');
                    }
                });
        }


        $('#menu').on("click", ".menu_item", function() {
            var view_name = $(this).attr("id");
            var event_id = $(this).attr("rel");
            var postData = {
                'view_name': view_name,
                'event_id': event_id,
            };

            getContentView(postData);


        });


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
