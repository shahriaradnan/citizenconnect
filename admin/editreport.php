<?php
include 'includes/conf.php';


?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Complaine Management</title>
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
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
if (isset($_SESSION['username'])=="admin") {
	if (isset($_GET['id'])) {
		# code...

		$thisRpID=$_GET['id'];

		$qr="SELECT * FROM submission WHERE report_id='".$thisRpID."'";
		$qrEx=mysqli_query($dbc,$qr);

   $sqlcur="SELECT * FROM report_status 
                                  WHERE report_id_fk='".$thisRpID."' ORDER BY stat_id DESC LIMIT 1";
    $sqlS=mysqli_query($dbc,$sqlcur);
    $rsCS=mysqli_fetch_array($sqlS,MYSQLI_ASSOC);
	

		while($qrExF=mysqli_fetch_array($qrEx)){
		$RpID=$qrExF['report_id'];
    $RpWard=$qrExF['ward_no'];
    // $RpCom=$qrExF['comment'];
    // $RpInsp=$qrExF['as_insp_id'];


	
		}
?>
<!-- Horizontal Form -->
              <div class="box box-primary" style="width:60%;position:center;margin:0 auto;">

                <div class="box-header with-border">
                  <p class="box-title">Manage Complaint No.#: <em><strong><?php echo $RpID; ?></strong></em>

                  <small></small></p>
                  <p></p>
            <!--<h4><?php echo $qrExF['ward_no']; ?></h4> &amp; <h3><?php  echo $qrExF['addresss'];?></h3>-->
               <a href="reportpage.php?id=<?php echo $RpID; ?>"><button class="btn btn-info pull-right">Cancel</button></a>
                 
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="editreportprocess.php" method="post" enctype="multipart/form-data" >
                  <div class="box-body">
                    <div class="form-group">
                      
                        <div class="col-sm-10">
                          <input type="hidden" class="form-control" name="id" value="<?php echo $RpID ; ?>">
                        </div>
                    </div>
                     Current Status:<?php
                            if($rsCS['status']){
              if($rsCS['status']=="closed"){
                echo "<span class='label label-primary'>CLOSED</span>";}
              else if($rsCS['status']=="open"){
                echo "<span class='label label-success'>Open</span>";}
              else if($rsCS['status']=="working") {
              echo "<span class='label label-warning'>In Progress</span>";}
              else{
                echo "<span class='label label-success'>Open</span>";
              }
            }else{
                echo "<span class='label label-success'>Open</span>";
            }
                         ?>
                         <br>Current Notes: <?php
                         if($rsCS['status_notes']){
                        echo "<strong>".$rsCS['status_notes']."</strong>";}
                        else{
                          echo "[N/A]";
                        }
                         ?>
                         <br>Currently Assigned To Inspector ID: <?php
                         if($rsCS['assigned_ins_id']){
                        echo "<strong>".$rsCS['assigned_ins_id']."</strong>";
                      }

                        else
                        {
                          echo "<strong>Not Assigned</strong>";
                      }
                         ?>
                        
                    <hr>
                    
                    <div class="form-group">
                      <div>
                         <label class="col-sm-2 control-label"> Ward no. <?php echo $RpWard; ?></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Change Status</label>
                      <div class="col-sm-10">
                       <!-- <input type="text" class="form-control" name="lcImp" value="<?php echo $lcIm; ?>">-->
                        <select class="form-control select2" name="reportstat" required>
                          
                          <option value="open">Open</option>
                          <option value="closed">Closed</option>
                          <option value="working">In Progress</option>
                          <option value="dismissed">Dismissed</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Comments</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="comment">
                      </div>
                    </div>
                 <div class="form-group">
                      <label class="col-sm-2 control-label">Re/Assign Inspector<small class="help-block">Add Inspector ID from the List below</small></label>
                      
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="asgnd_insp" value="<?php echo $rsCS['assigned_ins_id'] ?>">
                      </div>
                    </div>

     
                  <div class="box-footer">
                    <!--<a href="allagents.php"><button class="btn btn-primary">Cancel</button></a>-->
              
                        <button type="submit" class="btn btn-success pull-right" name="change">
                        	<i class="fa fa-save"></i> Save
                        </button>
       
                    
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
         
     <!-- Horizontal Form -->
               <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">ALL Inspectors</h3>
                </div><!-- /.box-header -->
                 <div class="box-body table-responsive no-padding" style="height:400px;overflow:auto;">
                  <table class="table table-hover">
                    <thead>
                      <th>Inspector ID.</th>
                      <th>Name</th>
                      <th>Assigned Ward No.</th> 
                      <th>Phone</th>           
                    </thead>

                    
                    <?php
                    $sq="SELECT * FROM inspectors";
                    $sqres=mysqli_query($dbc,$sq);

                
                    while ($sqresfetch=mysqli_fetch_array($sqres)) {
                    ?>
                    <tr>
                      <td><?php echo $sqresfetch['ins_id']; ?></td>
                      <td><?php echo $sqresfetch['ins_name']; ?></td>
                      <td><?php echo $sqresfetch['ins_ward'];?></td>
                       <td><?php echo $sqresfetch['ins_phone'];?></td>
                    </tr>
                    <?php
                  
                    }
                    ?>
                    
             
                  </table>
                </div><!-- /.box-body -->
                <!-- form start -->
                
              </div><!-- /.box -->



<?php

		
	}else
	{
		echo '<section class="content">
	          <div class="error-page">
	            <h2 class="headline text-yellow"> 404</h2>
	            <div class="error-content">
	              <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
	              <p>
	                We could not find the page you were looking for.<br>
	                <a href="masterDashboard.php">Return to Dashboard</a>.
	              </p>
	            </div><!-- /.error-content -->
	          </div><!-- /.error-page -->
	        </section><!-- /.content --> ';
	}

}else{
	echo '<section class="content">
	          <div class="error-page">
	            <h2 class="headline text-red"> 401</h2>
	            <div class="error-content">
	              <h3><i class="fa fa-warning text-red"></i> Oops! Something Not Right.<br>You Are in Wrong Place May Be!. </h3>
	              <p>
	                <a href="master.php">Go There First</a>
	              </p>
	            </div><!-- /.error-content -->
	          </div><!-- /.error-page -->
	        </section><!-- /.content --> ';
}

?>
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