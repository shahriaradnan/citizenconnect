<?php
include 'includes/conf.php'; 
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Citizen Support</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <style>
            body {
                padding-top: 20px;
                padding-bottom: 10px;
            }
        </style>

        <link rel="stylesheet" href="css/bootstrap-theme.min.css">

   
        <!--<link rel="stylesheet" href="css/custom/customJumbotron.css">-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--<link rel="stylesheet" type="text/css" href="css/custom2.css">-->

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="https://maps.google.com/maps/api/js?libraries=places&sensor=false"></script>
</head>

<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">DNCC Citizen Support</a>
        </div>
      <div id="navbar" class="navbar-collapse collapse">
        <!--    <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>-->
         <ul class="nav navbar-nav ">
             <li class="active"><a href="index.php">ENG<span class="sr-only">(current)</span></a></li>
            <li><a href="bn/newreport.php">বাংলা</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li><a href="index.php">View Complaint</a></li>
          	<li class="active"><a href="newreport.php">Submit New Complaint<span class="sr-only">(current)</span></a></li>
          	<li><a href="faq.php">Learn More</a></li>
          	
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
  $hell=1;
  if(isset($_POST['url']) && $_POST['url'] == '') {
    # code...
    $hell=0;
  }
      //Photo
  $folder="rppic/";
  $uploadOK=1;
  $wnoErr=1;
  $file =$_FILES['photo']['name'];
  $file_loc = $_FILES['photo']['tmp_name'];
  $file_type = $_FILES['photo']['type'];
  $new_file_name = strtolower($file);//convert all to lowercase
//Photo

  $specificProb=mysqli_real_escape_string($dbc,$_POST['probspec']);
  $wno=mysqli_real_escape_string($dbc,$_POST['wardno']);
  if($wno>=37||$wno<=0){
    $wnoErr=0;

  }
  $adr=mysqli_real_escape_string($dbc,$_POST['add']);
  $lt=$_POST['lat'];
  $ln=$_POST['long'];

  $inDhaka=false;
  if (strpos($adr, ', Dhaka') !== false) {
    $inDhaka=true;
  }

  $variable = substr($adr, 0, strpos($adr, ", Dhaka"));
  
  $spaddr=mysqli_real_escape_string($dbc,$_POST['specificAddr']);
  $rpDes=mysqli_real_escape_string($dbc,$_POST['reportDescription']);
  $rpShare=$_POST['radios'];
  $rprtrName=mysqli_real_escape_string($dbc,$_POST['reporterName']);
  $rptrtPhn=mysqli_real_escape_string($dbc,$_POST['reporterPhone']);



  $media=$_POST['frommedia'];
  $iniStat=$_POST['initstatus'];

  $cmpic=str_replace(' ','-',$new_file_name);

  //
  if ($file_type!="image/jpg" && $file_type!="image/png" && $file_type!="image/jpeg") {
    $uploadOK=0;
  # code...
  }
  move_uploaded_file($file_loc,$folder.$cmpic);
 
 /* if (move_uploaded_file($file_loc,$folder.$cmpic)){*/
  if($hell==1){
  if ($wnoErr!=0&&$inDhaka==1) {
    if(mysqli_query($dbc,"INSERT INTO 
      submission(specific_prob,ward_no,address_details,map_addr,map_lat,map_lng,photo,description,is_public,from_media,initial_status,reporter_name,reporter_phone,submit_time) 
      VALUES 
      ('$specificProb','$wno','$spaddr','$variable','$lt','$ln','$cmpic','$rpDes','$rpShare','$media','$iniStat','$rprtrName','$rptrtPhn',NOW())"))
    {
     // echo mysqli_insert_id($dbc);

      echo '<hr><div class="alert alert-success" role="alert" style="width:300px;height=1500px;float: none;
     margin-left: auto;
     margin-right: auto;">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Success:</span>
  Complaint Submitted Successfully;
  <br><a href="reportview.php?reportID='.mysqli_insert_id($dbc).'">Report ID# '.mysqli_insert_id($dbc).'</a>
  <br>(click the link to see the report,note the report id to check the status later)
</div>';
echo $inDhaka;
  //header('refresh:2;url=reportView.php?reportID='.mysqli_insert_id($dbc));
    }
    else{
        echo '<hr><div class="alert alert-danger" role="alert" style="width:300px;height=1500px;float: none;
     margin-left: auto;
     margin-right: auto;">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  There Were some problems! Try Again.
</div>';
    }

  }else{
   echo '<hr><div class="alert alert-danger" role="alert" style="width:300px;height=1500px;float: none;
     margin-left: auto;
     margin-right: auto;">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Ward No not valid or Out of DNCC Service Area
</div>';
  }
}
  else
  {
    echo '<hr><div class="alert alert-warning" role="alert" style="width:300px;height=1500px;float: none;
       margin-left: auto;
       margin-right: auto;">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Submiited:</span>
  </div>';
  // echo $hell; 

  }
}
else{
  echo '<hr><div class="alert alert-danger" role="alert" style="width:200px;height=1500px;float: none;
     margin-left: auto;
     margin-right: auto;">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Nothing Submitted
</div>';
  
}
?>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/main.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>


        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>