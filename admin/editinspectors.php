<?php
include 'includes/conf.php';


?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Inspectors Info</title>
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

		$thisAgID=$_GET['id'];

		$qr="SELECT * FROM inspectors WHERE ins_id='".$thisAgID."'";
		$qrEx=mysqli_query($dbc,$qr);
		
		while($qrExF=mysqli_fetch_array($qrEx)){
		$insID=$qrExF['ins_id'];
		$insNam=$qrExF['ins_name'];
    $insWard=$qrExF['ins_ward'];
		$insNid=$qrExF['ins_nid'];
    $insPhn=$qrExF['ins_phone'];
		}
?>
<!-- Horizontal Form -->
              <div class="box box-primary" style="width:60%;position:center;margin:0 auto;">

                <div class="box-header with-border">
                  <h1 class="box-title">Edit Information of: <em><strong><?php echo $insNam; ?></strong></em>
                  <small>[Inspector]</small></h1>
            
                <a href="allInspectors.php"><button class="btn btn-info pull-right">Cancel</button></a>
                 
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="editinspectorprocess.php" method="post" enctype="multipart/form-data" >
                  <div class="box-body">
                  <div class="form-group">
                    
                      <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="insId" value="<?php echo $insID ; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="insName" value="<?php echo $insNam ; ?>">
                      </div>
                    </div>
           
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Assigned Ward</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="asWard" value="<?php echo $insWard ; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">NID</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="insNid" value="<?php echo $insNid;?>" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Phone</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="insPhn" value="<?php echo $insPhn;?>" >
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
	                <a href="masterdashboard.php">Return to Dashboard</a>.
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