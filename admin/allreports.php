<?php
include 'includes/conf.php';

$limit = 10;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  

$sql = "SELECT * FROM submission ORDER BY report_id DESC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($dbc, $sql); 

$sQ="SELECT report_id FROM submission";
$sQr=mysqli_query($dbc,$sQ);
$sQrF=mysqli_fetch_array($sQr);
$sQrFRows=mysqli_num_rows($sQr);
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All Reports</title>
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
    <script type="text/javascript" charset="utf8" src="../js/jquery-2.0.3.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <link rel="stylesheet" href="../dist/simplePagination.css" />
    <!--<link rel="stylesheet" type="text/css" href="css/application-25.css">-->
    <script src="../dist/jquery.simplePagination.js"></script>
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
        var report="<?php echo $sQrF['report_id']; ?>";
      function remove(report_id)
      {
        if(confirm(' Sure to Remove  Report no.#'+report_id+' ?'))
        {
          window.location='deletereport.php?remove_id='+report_id;
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
                    <li><a href="newInspectors.php"><i class="fa fa-circle-o"></i>Add New Inspectors</a></li>
                    <li><a href="allInspectors.php"><i class="fa fa-circle-o"></i>All Inspectors<span class="label label-primary pull-right"><?php ?></span></a></li>
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
            Reports
            <small>[Total #<?php echo $sQrFRows; ?> Reports Found]</small>

<!-- <button type="button" class="btn btn-info">Right</button>--> 
           <!-- <div class="row no-print">
              <div class="col-xs-12">
                               
                <div class="pull-right">
                  <div class="btn-group">
                          <a href="createLC.php"><button type="button" class="btn btn-primary"></button></a>
                         
                  </div>
                </div>
              </div>
            </div>-->

          </h1>
       
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
                  <h3 class="box-title">List of Reports </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <!--<table id="example1" class="table table-bordered table-striped">-->
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Report ID.</th>
                        <th>Ward No.</th>
                        <th>Submission Date</th>
                        <th>Latest Report Status</th>
                        <!--reprt status table-->
                        <th>Latest Status Change</th>
                        <th>Assigned Inspector</th>
                        <!--reprt status table-->
                        <?php 
if($_SESSION['username']=='admin'||$_SESSION['username']=='mayor'){
?>
<th>Manage/Delete</th>
<?php 
} 
?>
                      </tr>
                    </thead>

                    <tbody>
                    <?php
                    $sql1="SELECT * FROM submission ORDER BY report_id DESC";
                    $sql1res=mysqli_query($dbc,$sql1);

            
                    while ($sql1resfetch=mysqli_fetch_array($sql1res)) {
                           $sqlST="SELECT * FROM report_status 
                                  WHERE report_id_fk='".$sql1resfetch['report_id']."' ORDER BY stat_id DESC LIMIT 1";
                          $sqlSTr=mysqli_query($dbc,$sqlST);
                          $rs=mysqli_fetch_array($sqlSTr,MYSQLI_ASSOC);
                    	# code...
                    
                    ?>
                    
                      <tr>
                        
                        <td><a href="reportpage.php?id=<?php echo $sql1resfetch['report_id']; ?>"><?php echo $sql1resfetch['report_id']; ?></a></td>
                        <td><?php echo $sql1resfetch['ward_no']; ?></td>
                        <td><?php echo $sql1resfetch['submit_time']; ?></td>
                        <td>
                        <?php 
                        if($rs['status']){
                          echo $rs['status'];
                        } else{ echo $sql1resfetch['initial_status'];}
                        ?>  
                        </td>
                        <td>
                        <?php 
                        if($rs['stat_change_time']){
                          echo $rs['stat_change_time'];
                        } else{ echo $sql1resfetch['submit_time'];}
                        ?> 
                        </td>
                        <td>
                        <?php 
                        if($rs['assigned_ins_id']){
                          $ins=$rs['assigned_ins_id'];
                          $insname=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM inspectors WHERE ins_id='".$ins."'"));
                          echo $insname['ins_name'];
                        }
                        else{ 
                          echo "Not Assigned Yet";
                        }
                        ?> 
                          
                        </td>
       
                        
 <?php 
if($_SESSION['username']=='admin'||$_SESSION['username']=='mayor'){
?>
<td>
       <a href="editreport.php?id=<?php echo $sql1resfetch['report_id'] ; ?>" style="color:white;">
                            <button class="btn btn-info">
                            Manage
                            </button>
                        </a>
                        <a href="javascript:remove(<?php echo $sql1resfetch['report_id'] ?>)">
                            <button class="btn btn-danger">
                            Delete
                            </button>
                        </a>
</td>
<?php 
} 
?>
                 
                        
                      </tr>
                    
                    <?php
                   
                	}
                    ##end while
                    ?>

                    </tbody>
                  </table>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
<?php  
    $sql = "SELECT COUNT(report_id) FROM submission";  
    $rs_result = mysqli_query($dbc, $sql);  
    $row = mysqli_fetch_row($rs_result);  
    $total_records = $row[0];  
    $total_pages = ceil($total_records / $limit);  
    $pagLink = "<nav><ul class='pagination'>";  
    for ($i=1; $i<=$total_pages; $i++) {  
                 $pagLink .= "<li><a href='allreports.php?page=".$i."'>".$i."</a></li>";  
    };  
    echo $pagLink . "</ul></nav>";  
?>
              </div> <!--class="col-xs-12"-->

          </div><!-- /.row (main row) -->

        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->


      <footer class="main-footer">
        <div class="pull-right hidden-xs">

        </div>
        <strong>  <a href="">DNCCCS</a></strong>
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
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
    currentPage : <?php echo $page;?>,
    hrefTextPrefix : 'allreports.php?page='
    });
  });
</script>
