<?php
include 'includes/conf.php';

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All Inspectors</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
      .example-modal .modal {
        background: transparent !important;
      }
    </style>

    <script type="text/javascript">
      function remove(ins_id)
      {
        if(confirm(' Sure to Remove Entry ? '))
        {
          window.location='deleteinspectors.php?ins_id='+ins_id;
        }
      }
    </script>

  </head>

  <body class="hold-transition skin-blue sidebar-mini">

<?php
if (isset($_SESSION['username'])=='admin')
{
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
                      <a href="index.php" class="btn btn-default btn-flat">Sign out</a>
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
                    <li><a href="newinspectors.php"><i class="fa fa-circle-o"></i>Add New Inspectors</a></li>
                    <li><a href="allinspectors.php"><i class="fa fa-circle-o text-yellow"></i>All Inspectors<span class="label label-primary pull-right"><?php ?></span></a></li>
                  </ul>
                </li>
              </ul>
            </li>  
            

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List of Inspectors
            <small>[ALL]</small>
            <div class="row no-print">
              <div class="col-xs-12">
                 <!-- <button type="button" class="btn btn-info">Right</button>-->               
                <div class="pull-right">
                  <div class="btn-group">
                          <a href="newinspectors.php"><button type="button" class="btn btn-primary">Add New Inspectors</button></a>
                         
                  </div>
                </div>
              </div>
            </div>
          </h1>
        <!--<div class="row no-print">
            <div class="col-xs-12">
              <a href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>-->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">

          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
        <!-- #########  L/C TABLE ############  -->
        <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">ALL Inspector</h3>
                </div><!-- /.box-header -->
                <div class="box-body" style="">
                  <!--<table id="example1" class="table table-bordered table-striped">-->
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#No.</th>
                        <th>Name</th>
                        <th>Assigned Ward No.</th>
                        <th>Phone</th>
                        <th>NID.</th>
                        <th>Delete</th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php
                    $sql2="SELECT * FROM inspectors";
                    $sql2res=mysqli_query($dbc,$sql2);
                    $z=1;
                    while ($sql2resfetch=mysqli_fetch_array($sql2res)) {
                    	# code...
                    
                    ?>
                    
                      <tr>
                        <td><?php echo $z;?></td>
                        <td><?php echo $sql2resfetch['ins_name'];?></td>
                        <td><?php echo $sql2resfetch['ins_ward'];?></td>
                        <td><?php echo $sql2resfetch['ins_phone'];?></td>
                        <td><?php echo $sql2resfetch['ins_nid'];?></td>
                        <td>
                        <div class="btn-group">
                        <a href="editinspectors.php?id=<?php echo $sql2resfetch['ins_id'] ; ?>" style="color:white;">
                           <!-- <button class="btn btn-info">
                            Edit
                            </button>-->
                        </a>
                        <a href="javascript:remove(<?php echo $sql2resfetch['ins_id'] ?>)">
                            <button class="btn btn-danger">
                            Delete
                            </button>
                        </a>
                        </div>
                        </td>
                      </tr>
                    
                    <?php
                    $z++;

                	}
                    ##end while
                    ?>

                    </tbody>

                

                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div> <!--class="col-xs-12"-->
        
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

<?php
}
else{
	echo'<div class="example-modal">
            <div class="modal modal-warning">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    
                    <h4 class="modal-title">Warning ! <i class="fa  fa-warning (alias)"></i></h4>
                  </div>
                  <div class="modal-body">
                    <p>Access Denied&hellip;</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline"><a href="index.php" style="color:white;">Go Home!</a></button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->';
}
?>
     <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
     /* $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });*/
    </script>
  </body>
</html>