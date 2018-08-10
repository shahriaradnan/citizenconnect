<?php
include 'includes/conf.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>|Report Page|</title>
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
   <!--  <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8YUPTo99oths5C0CJeEBl99pfghiZjDI"
            type="text/javascript"></script>
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

<!--
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js" > </script> 
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=600,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>


<script>
function myFunction() {
    window.print();
}
</script>-->


<!---->
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

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
<!-- Content Wrapper. Contains page content -->


      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
             <?php
              
        $lcquery="SELECT * FROM submission WHERE report_id='".$_GET['id']."'";
        $lcqueryres=mysqli_query($dbc,$lcquery);
        if(isset($_GET['id'])){
        	while ($lcqueryresFet=mysqli_fetch_array($lcqueryres)) {
        		# code...
        ?>
         <h1 style="text-align:center;">
            Complain No.#<em><?php echo $lcqueryresFet['report_id'] ;?></em>
            <small> Overview</small>

          </h1>
          <!-- <ol class="breadcrumb">
            <a href="allreports.php" style="font-size:2.0em;"><i class="fa fa-arrow-left"></i> All Reports</a>
          </ol>-->

          

                 <div class="row no-print">

              <div class="col-xs-12">
              <div class="btn-group">
              <a href="allreports.php"><button  class="btn btn-block btn-block"><i class="fa fa-arrow-left"></i>All Reports</button></a> 

             
                 </div>
                 <div class="pull-right"><a href="editreport.php?rp=<?php echo $lcqueryresFet['report_id'];?>&amp;id=<?php echo $_GET['id'];?>"><button  class="btn btn-success btn-block">Manage Task Assignment</button></a> </div>
<div class="pull-right"><a href="smstoins.php?id=<?php echo $lcqueryresFet['report_id'];?>"><button  class="btn btn-block btn-info">SMS to Inpector</button></a></div>
                 <!-- class="btn btn-info"
                   normai>   class="btn btn-default btn-block"
                    flat>  class="btn btn-default btn-block btn-flat"
                     small>  class="btn btn-default btn-block btn-sm">
                     large > class="btn btn-block btn-default btn-lg"
                 -->
              </div>

            </div>
       
        </section>
      <!--  <div class="pad margin no-print">
          <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            Write Notice
          </div>
        </div>-->

   <!-- Main content -->
  <!-- <button onclick="myFunction()">Print this page</button><br>
   <input type="button" value="Print Div" onclick="PrintElem('#mydiv')" />
   <div id="mydiv"></div>-->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-list-alt"></i> Complain no. #<em><?php echo $lcqueryresFet['report_id'] ;?></em>

                <small class="pull-right">
                <b>Date Reported: <em><?php echo $lcqueryresFet['submit_time'];?></em> </b><br>
              	
                </small>
              </h2>
            </div><!-- /.col -->
          </div>
          
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-6 invoice-col">
            <?php 
             $sqlST="SELECT * FROM report_status 
                    WHERE report_id_fk='".$_GET['id']."' ORDER BY stat_id DESC LIMIT 1";
            $sqlSTr=mysqli_query($dbc,$sqlST);
            while($rs=mysqli_fetch_array($sqlSTr,MYSQLI_ASSOC)){
            ?>
            <p>Status: <strong>
            <?php
            $inspector=$rs['assigned_ins_id'];
            if($rs['status']){
              if($rs['status']=="closed"){
                echo "<span class='label label-primary'>CLOSED</span>";}
              else if($rs['status']=="open"){
                echo "<span class='label label-success'>Open</span>";}
              else if($rs['status']=="working") {
              echo "<span class='label label-warning'>In Progress</span>";}
              else{
                echo "<span class='label label-success'>Open</span>";
              }
            }else{
                echo "<span class='label label-success'>Open</span>";
            }
            ?>
            </strong>
            <br>
            Last Status Change at:<strong> <em><?php 
            if($rs['stat_change_time']){
              echo $rs['stat_change_time'];
            }else{
              echo $lcqueryresFet['initial_status'];
            }
            ?></em></strong><br>
            Comments/Notes:<strong><?php echo $rs['status_notes'] ;?></strong></p>
            <?php
   
            
      
            }
            if($rs=false){
                ?>
            <h5>Status: </h5><strong><h4>
            <?php
                echo"<span class='label label-success'>Open</span>";
            ?>
            </h4>
            </strong>
            <br>
            <h5>Last Status Change at:&nbsp;&nbsp;</h5><strong><h4><em><?php echo $lcqueryresFet['submit_time'];;?></em></strong></h4><br>
            <h5>Comments/Notes:&nbsp;&nbsp;</h5><strong><h4><?php echo "N/A" ;?></h4></strong>
            <?php 
            }
            ?>
          
            <br>
    
        
              <h3>Reporter:</h3>
              <address>
                <strong>Name: </strong>
                <?php  
                if($lcqueryresFet['reporter_name']){echo $lcqueryresFet['reporter_name'] ;}
                else{
                  echo "[Not Provided]";
                }
                ?><br>
                <strong>Phone:</strong> 
                <?php 
                if($lcqueryresFet['reporter_phone']){
                  echo $lcqueryresFet['reporter_phone'] ;}
                  else{
                    echo "[Not Provided]";
                  }
                  ?>
              </address>
              <br>
                 <h3>Location:</h3>
              <address>
                <strong>Ward No. :</strong> <?php echo $lcqueryresFet['ward_no'] ;?><br>
                <strong>Address:</strong>  <?php echo $lcqueryresFet['address_details'] ;?><br>

                <?php echo $lcqueryresFet['map_addr']."--";?><a href="https://www.google.com/maps/place/<?php echo $lcqueryresFet['map_lat'];?>,<?php echo $lcqueryresFet['map_lng'];?>" target="_blank"><?php echo $lcqueryresFet['map_lat'];?>,<?php echo $lcqueryresFet['map_lng'];?></a>  
                <div id="map-container" style="width:500px;height:380px;"></div>
    <script>

    function initialize() {
      var location = new google.maps.LatLng('<?php echo $lcqueryresFet['map_lat']; ?>', '<?php echo $lcqueryresFet['map_lng']; ?>');
      var options = {
        zoom: 17,
        center: location,
        streetViewControl: true,
        scaleControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP

      };
      var map = new google.maps.Map(document.getElementById("map-container"),
        options);
      var marker = new google.maps.Marker({
        map: map,
        position: location,
        draggable: false
      });
      marker.setMap(map);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
      google.maps.event.addDomListener(window, 'resize', initialize);
    </script>
              </address>
            </div><!-- /.col -->
            
           
            <div class="col-sm-6 invoice-col">		
              <!--<b>Issue Date: <em><?php echo $lcqueryresFet['issue_date'] ;?></em> </b><br>
              <!--	<b>Last Date of Shipment: <em><?php echo $lcqueryresFet['last_date'] ;?> </em></b><br>
             <!-- 	Personnel<br>
              	<b>Number of Agents: 4 <em><?php echo $lcqueryresFet['agents'] ;?></em> </b><br>
             <!--	<b>Number of Boatman: 34 <em><?php echo $lcqueryresFet['boatmans'] ;?> </em></b><br>
              <br>-->
              <p class="lead">Description</p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <td><?php echo $lcqueryresFet['description'] ;?></td>
                  </tr>
                  <tr>
                  <?php 
                  if ($lcqueryresFet['photo']) {
                    # code...
                  ?>
                   <td><img src="../rppic/<?php echo $lcqueryresFet['photo'];?>" height="300" width="450" alt="Photo of Complain No.-<?php echo $lcqueryresFet['report_id'];?>"></td>
                <?php
                  }
                   ?>
                  </tr>

                </table>
              </div>
              <br>
              <p class="lead">Assigned Personnel</p>
              <div class="table-responsive">
                <table class="table">

                  <tr>
                    <th>Assigned Inspector:</th>
                    <td><?php

                          if ($inspector) {
                          $sql2="SELECT * FROM inspectors WHERE ins_id='".$inspector."'";
                          $sql2res=mysqli_query($dbc,$sql2);
                          $sql2fetch=mysqli_fetch_array($sql2res);
                          echo $sql2fetch['ins_name']." [".$sql2fetch['ins_phone']."]";
                          }
                          else{
                            echo "Not Assigned Yet";
                          }


                    ?></td>
                  </tr>
             
                </table>
              </div>
              
            </div><!-- /.col -->


          
          </div><!-- /.row -->

          <div class="row">
           
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
             <!--<a href="printLCpage.php?id=<?php echo $lcqueryresFet['lc_id']; ?>" target="_blank" class="btn-lg bg-navy"><i class="fa fa-print"></i> Print</a>
             <!--  <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>-->
            </div>
          </div>
        </section><!-- /.content -->
      
       

        <div class="clearfix"></div>
        <?php
        	} 
        }else{
        	echo'<div class="example-modal">
            <div class="modal modal-danger">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    
                    <h4 class="modal-title">ERROR! <i class="fa  fa-warning (alias)"></i></h4>
                  </div>
                  <div class="modal-body">
                    <p>Undefined ID&hellip;</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline"><a href="allreports.php" style="color:white;">All Reports!</a></button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->';
        }
        ?>
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

  </body>
</html>