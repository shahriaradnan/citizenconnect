<?php
include 'includes/conf.php'; 
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="refresh" content="10"> -->
    <title>Citizen Connect|DNCCCS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8YUPTo99oths5C0CJeEBl99pfghiZjDI"
            type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[

    var customIcons = {
      Closed: {
        icon: 'style/images/icon/mm_20_blue.png'
      },
      Open: {
        icon: 'style/images/icon/mm_20_red.png'
      }
    };
    // ICON
    // https://github.com/Concept211/Google-Maps-Markers
// https://sites.google.com/site/gmapsdevelopment/
    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(23.783731, 90.416912),
        zoom: 12,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("mapallreport.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var title = markers[i].getAttribute("specificprob");
          var address = markers[i].getAttribute("address");
          var rid = markers[i].getAttribute("rid");
          var ward = markers[i].getAttribute("ward");
          var status = markers[i].getAttribute("status");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<div class=''><a style='text-decoration: none;' href='reportpage.php?id="+rid+"' target='blank'>"+"<b>ID#"+rid+":"+title+"</b></a><br/>" +address+"</div>";
          var icon = customIcons[status] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>

  </script>
  <script type="text/javascript" src="dist/js/clock.js"></script>

  </head>

  <body class="hold-transition skin-blue sidebar-mini" onload="load()">
<?php
if (isset($_SESSION['username'])!='admin') 
{
   # code..
  echo "Access Restricted !<a href='index.php'>Home Page</a>";
}else{
              ##No. of Reports
              $rp="SELECT * FROM submission";
              $RPres=mysqli_query($dbc,$rp);
              $nofRp=mysqli_num_rows($RPres);

              $rpStO="SELECT DISTINCT report_id_fk FROM report_status WHERE status='Open' OR status='open'";
              $RPSTresO=mysqli_query($dbc,$rpStO);
              $rpSTO=mysqli_num_rows($RPSTresO);
              ##No. of LC for Shahriar Enterprise
              
              $rpStP="SELECT DISTINCT report_id_fk FROM report_status WHERE status='Working' OR status='working'";
              $RPSTresP=mysqli_query($dbc,$rpStP);
              $rpSTP=mysqli_num_rows($RPSTresP);

              $rpStD="SELECT DISTINCT report_id_fk FROM report_status WHERE status='Dismissed' OR status='dismissed'";
              $RPSTresD=mysqli_query($dbc,$rpStD);
              $rpSTD=mysqli_num_rows($RPSTresD);

              $rpStC="SELECT DISTINCT report_id_fk FROM report_status WHERE status='Closed' OR status='closed'";
              $RPSTresC=mysqli_query($dbc,$rpStC);
              $rpSTC=mysqli_num_rows($RPSTresC);

              $rpStIns="SELECT * FROM inspectors";
              $RPSTresIns=mysqli_query($dbc,$rpStIns);
              $rpSTIns=mysqli_num_rows($RPSTresIns);
      
              ?>

    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="masterdashboard.php" class="logo">
        <span>DNCCCS</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
    <div class="col-md-2 col-md-offset-4"><h5 id="clockbox" style="color:white;"></h5></div>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="style/images/blank_profile.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li>
                   <a href="userprofile.php" style="text-decoration:none;background:#eeeeee;">[Profile]</a>
                  </li>
                  <!-- Menu Body -->
   
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="index.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
                <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
           
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
         <div class="user-panel">
           <div class="pull-left image">
           <?php
           if ($_SESSION['username']=='admin') {
             echo '<img src="style/images/adm1.png" class="img-square" alt="User Image">';
           }elseif ($_SESSION['username']=='mayor') {
             echo '<img src="style/images/mayor1.png" class="img-square" alt="User Image">';
           }else{
            echo '<img src="style/images/defaultavatar.png" class="img-square" alt="User Image">';
           }
           ?>
             
            </div>
            <br>
            <div class="pull-left info">
              <p>
              <?php echo $_SESSION['username']; ?>
              </p>
<br>
            </div>
          </div>
          <!-- search form -->

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN PANEL</li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
                
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i>Open<span class="label label-primary pull-right"><?php // echo $rpSTO;?></span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i>Closed<span class="label label-primary pull-right"><?php //echo $rpSTC;?></span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i>Dismissed<span class="label label-primary pull-right"><?php //echo $rpSTD;?></span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i>In Progress<span class="label label-primary pull-right"><?php //echo $rpSTP;?></span></a></li>
                
                
                
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-group (alias)"></i> <span>Personnel</span>
                <!--<span class="label label-primary pull-right">2</span>-->
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i>Inspectors<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="newinspectors.php"><i class="fa fa-circle-o"></i>Add New Inspectors</a></li>
                    <li><a href="allinspectors.php"><i class="fa fa-circle-o"></i>All Inspectors<span class="label label-primary pull-right"><?php ?></span></a></li>
                  </ul>
                </li>
            
              </ul>
            </li>  
        </ul> <!--<ul class="sidebar-menu">-->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control Panel</small>
          </h1>
       
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          
          <div class="row">

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
             
             <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $nofRp; ?></h3>
                  <p>Total Reports</p>
                </div>
                <div class="icon">
                  <!--<i class="ion ion-bag"></i>-->
                </div>
                <a href="allreports.php" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

           <!-- <div class="col-lg-3 col-xs-6">
             
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php// echo $rpSTO; ?></h3>
                  <p>Open</p>
                </div>
                <div class="icon">
               
                </div>
               <a href="#" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>-->

         <!-- ./col   <div class="col-lg-3 col-xs-6">
            
              
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $rpSTP; ?></h3>
                  <p>In Progress</p>
                </div>
                <div class="icon">
         
                </div>
                <a href="#" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
              </div>

            </div>-->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $rpSTIns; ?></h3>
                  <p>Inspector</p>
                </div>
               <div class="icon" style="width:contain;height:contain;">
                  
              </div>
              <a href="allinspectors.php" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
               <!-- Left col -->
            <div class="col-md-12">
     <!-- MAP & BOX PANE -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">All Reports on Map</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                   <!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="row">

                    <div class="col-md-12 col-sm-12">
                      <div class="pad">
                        <!-- Map will be created here
                        <div id="world-map-markers" style="height: 325px;"></div>-->
                        <div id="map"  style="height: 450px;"></div>
                      </div>
                    </div><!-- /.col -->
                  <?php
                  // echo '  <div class="col-md-3 col-sm-4">
                  //     <div class="pad box-pane-right bg-green" style="min-height: 280px">
                  //       <div class="description-block margin-bottom">
                  //         <!--<div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>-->
                  //         <div></div>
                  //         <h5 class="description-header">2</h5>
                  //         <span class="description-text">Closed</span>
                  //         <hr>
                  //       </div><!-- /.description-block -->
                  //       <div class="description-block margin-bottom">
                  //         <!--<div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>-->
                  //         <h5 class="description-header">230</h5>
                  //         <span class="description-text">Open</span>
                  //         <hr>
                  //       </div><!-- /.description-block -->
                  //       <div class="description-block">
                  //        <!-- <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>-->
                  //         <h5 class="description-header">234</h5>
                  //         <span class="description-text">Total</span>
                  //       </div><!-- /.description-block -->
                  //     </div>
                  //   </div><!-- /.col -->';
                  ?>
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">

        </div>
        <strong>  <a href="#">DNCC</a></strong>
      </footer>

     
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            


            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">


            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->

          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
  
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <script src="dist/js/pages/dashboard.js"></script>
    
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
             
  </body>
</html>
<?php
     }
?>