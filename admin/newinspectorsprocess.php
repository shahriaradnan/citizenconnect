<?php
include 'includes/conf.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adding New Inspectors...</title>
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
if (isset($_SESSION['username'])=='admin') {
  if ($_SERVER['REQUEST_METHOD']=='POST'){
	/*
  $folder="uploads/";
  $uploadOK=1;

  $file =$_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
  $file_type = $_FILES['file']['type'];


  $file_size = $_FILES['file']['size'];
  
  
  // new file size in KB
  $new_size = $file_size/1024;  

  // make file name in lower case
  $new_file_name = strtolower($file);

  
  $final_file=str_replace(' ','-',$new_file_name);
  
  $sq="SELECT id FROM tbl_uploads WHERE file='".$final_file."'";
  $sqR=mysql_query($sq);
  $sqRN=mysql_num_rows($sqR);
  

  if ($file_type!="image/jpg" && $file_type!="image/png" && $file_type!="image/jpeg") {
    $uploadOK=0;
  # code...
  }

  if ($sqRN==0&&$uploadOK!=0) 
  {   # code...

    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
      $sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
      mysql_query($sql);
  
  */
//Photo
 // $folder="agentPic/";
  //$uploadOK=1;
  //$file =$_FILES['agPic']['name'];
  //$file_loc = $_FILES['agPic']['tmp_name'];
  //$file_type = $_FILES['agPic']['type'];
  //$new_file_name = strtolower($file);//convert all to lowercase
//Photo

  $insp_name= $_POST['ins_name'];
	$assg_ward=$_POST['as_ward'];
  $insp_nid=$_POST['ins_nid'];
  $insp_phn=$_POST['ins_phone'];


  //$agpic=str_replace(' ','-',$new_file_name);

  //
  /*if ($file_type!="image/jpg" && $file_type!="image/png" && $file_type!="image/jpeg") {
    $uploadOK=0;
  # code...
  }*/

  //check if the file already exist
 /* $sq="SELECT * FROM agents WHERE ag_pic='".$agpic."'";
  $sqR=mysqli_query($dbc,$sq);
  $sqRN=mysqli_num_rows($sqR);
  if ($sqRN!=0) {
    # code...
    $uploadOK=0;
  }*/
	
  //check if there is no other Agents with Same PHONE Number
	$dup_lc1 = mysqli_num_rows(mysqli_query($dbc,'SELECT * FROM inspectors WHERE ins_nid="'.$insp_nid.'"'));
	if ($dup_lc1==0) {
		# code...
    #if(mysqli_query($dbc,"INSERT INTO lc(lc_no,importer,imp_addr,exporter,exp_addr,active,issue_date,last_date) VALUES ('$lno','$imp','$imp_addr','$exp','$exp_addr','$act','$startD','$endD')"))
		if(mysqli_query($dbc,"INSERT INTO inspectors(ins_name,ins_ward,ins_nid,ins_phone) 
                      VALUES ('$insp_name','$assg_ward','$insp_nid','$insp_phn')"))
		{	
			echo'<div class="example-modal">
            <div class="modal modal-success">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    
                    <h4 class="modal-title">Success! <i class="fa fa-smile-o"></i></h4>
                  </div>
                  <div class="modal-body">
                    <p>Added Successfully&hellip;</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"><a href="allinspectors.php" style="color:white;">Inspector List</a></button>
                    <button type="button" class="btn btn-outline"><a href="newinspectors.php" style="color:white;">Add Another!</a></button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->';
		}
	}else{
		echo'<div class="example-modal">
            <div class="modal modal-danger">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                   
                    <h4 class="modal-title">ERROR! <i class="fa fa-frown-o"> </i></h4>
                  </div>
                  <div class="modal-body">
                    <p>Something Went Wrong. like,Person Exist with Same NID!&hellip;</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline"><a href="newinspectors.php" style="color:white;">Try Again!</a></button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->';
	}

	# code...
  }else{
     echo'<div class="example-modal">
            <div class="modal modal-danger">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    
                    <h4 class="modal-title">ERROR! <i class="fa  fa-frown-o"></i></h4>
                  </div>
                  <div class="modal-body">
                    <p>Fillup the FORM Properly&hellip;</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline"><a href="newinspectors.php" style="color:white;">Go Back!</a></button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->';
  }
}else{
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
                    <button type="button" class="btn btn-outline"><a href="master.php" style="color:white;">Go Home!</a></button>
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
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
