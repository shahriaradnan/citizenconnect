<?php
include 'includes/conf.php';

if (isset($_SESSION['username'])!='admin') 
{
   # code..
  echo "Access Restricted !<a href='master.php'>Home Page</a>";
}else{
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADD New Inspectors</title>
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
  </head>

  <body class="hold-transition skin-blue sidebar-mini">

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
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="style/images/defaultavatar.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="style/images/defaultavatar.png" class="img-circle" alt="User Image">
                    <p>
                      Site Admin
                      <small> </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
   
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="master.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
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
              <img src="style/images/defaultavatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
             
            </div>
          </div>
          <!-- search form -->

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN PANEL</li>

<!--            <li class="active treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Companies</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="#"><i class="fa fa-circle-o"></i>Misha Enterprise</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Shahriar Enterprise</a></li>
              </ul>
            </li>
-->
         

            <li class="active treeview">
              <a href="#">
                <i class="fa fa-group (alias)"></i> <span>Personnel</span>
                <!--<span class="label label-primary pull-right">2</span>-->
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>Inspectors<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="newinspectors.php"><i class="fa fa-circle-o text-yellow"></i>Add New Inspectors</a></li>
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
            Add New Conservancy Inspectors
            <small>adding new Inspectors to Database</small>
          </h1>
       
        </section>

        <!-- Main content -->
        <section class="content">
         <!-- Main row -->
          <div class="row">
             <div class="box box-primary" style="position:center;width: 60%;margin:0 auto;">
                <div class="box-header with-border">
                  <h3 class="box-title" style="text-align:center;">New Inspector Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="newinspectorsprocess.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" class="form-control" name="ins_name" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                      <label>Assigned Ward No.</label>
                      <input type="text" class="form-control" name="as_ward" placeholder="Assigned Ward" required>
                    </div>
                   
                   <div class="form-group">
                      <label>NID</label>
                      <input type="number" class="form-control" name="ins_nid" placeholder="National ID Number" required>
                    </div>

                    <div class="form-group">
                      <label>Phone</label>
                      <input type="number" class="form-control" name="ins_phone" placeholder="Phone" required>
                    </div>
               
    
             
                   <!-- <div class="form-group">
                      <label for="exampleInputFile">Photo</label>
                      <input type="file" id="exampleInputFile">
                      <p class="help-block">Example block-level help text here.</p>
                    </div>-->
            
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">ADD</button>
                  </div>
                </form>
              </div><!-- /.box -->
        
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">

        </div>
        <strong>  <a href="">Al-Habib Industries</a></strong>
      </footer>

      <!-- Control Sidebar -->
    
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
  
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
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
<?php
     }
?>