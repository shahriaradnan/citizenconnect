<?php
include '../includes/conf.php';
$getError=0;

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head lang="bn">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>রিপোর্ট ভিউ</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="../apple-touch-icon.png">

        <link href="../abcd.css" media="all" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css">
     
        <style>
            body {
                padding-top: 20px;
                padding-bottom: 10px;
            }
        </style>

        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">

   
        <!--<link rel="stylesheet" href="css/custom/customJumbotron.css">-->
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <!--<link rel="stylesheet" type="text/css" href="css/custom2.css">-->

        <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
         <!-- exampl1 -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <script src="../js/jquery-1.11.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
         <!-- Location picker -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8YUPTo99oths5C0CJeEBl99pfghiZjDI"
            type="text/javascript"></script>
<!--     <script src = "http://maps.googleapis.com/maps/api/js"></script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script> -->
    <script src="../mapextra/dist/locationpicker.jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    </head>
    <body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
               <a class="brand" href="index.php">DNCC Citizen Support</a>
          	
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">সকল অভিযোগ</a></li>
          	<li><a href="newreport.php">অভিযোগ করুন </a></li>
          	<li><a href="faq.php">জানুন </a></li>
          	
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <hr>
    <?php
        if(isset($_GET['reportID'])){
        	$getError=0;
        	$rpquery="SELECT * FROM submission WHERE report_id='".$_GET['reportID']."'";
			$rpqueryres=mysqli_query($dbc,$rpquery);
				while ($rpqueryresFet=mysqli_fetch_array($rpqueryres)){


	?>
	<div class="container">
    <div id="main" role="main" class="row">
      <div id="content" class="span8">
        <div class="content-head">
          <h2><?php echo $rpqueryresFet['specific_prob'];?> at Ward No#<?php echo $rpqueryresFet['ward_no'];?> 
          <?php echo ';'.$rpqueryresFet['map_addr'];?>	
          <div style="float:right;" class="fb-share-button" data-href="http://[host]/initializr/reportView.php?reportID=<?php echo $rpqueryresFet['report_id'];?>" data-layout="box_count" data-mobile-iframe="true" ></div>
        </div>
          </h2>

          
      <!--  <a href="https://www.facebook.com/sharer/sharer.php?<?php echo $rpqueryresFet['report_id'];?>" target="_blank">
  Share on Facebook
<!--</a>-->
<!-- Load Facebook SDK for JavaScript -->
<br>

	<!-- Your share button code -->

        <div class="content-well">
          

	<div id="report-source" class="blue-bar">
<?php

  $sqlcur="SELECT * FROM report_status WHERE report_id_fk='".$_GET['reportID']."' ORDER BY stat_id DESC LIMIT 1";
$sqlS=mysqli_query($dbc,$sqlcur);
$rsCS=mysqli_fetch_array($sqlS,MYSQLI_ASSOC);

  ?>

    <span class="">
    <?php 
    if($rsCS['status']){
      if ($rsCS['status']=='closed') {
                           echo '<span class="label label-into">Closed</span>';
                          // echo $rsCS['status'];
                        }elseif($rsCS['status']=='working'){
                            echo '<span class="label label-warning">In Progress</span>';
                           //echo $rsCS['status'];
                        }elseif ($rsCS['status']=='dismissed') {
                          # code...
                          echo '<span class="label label-default">Dismissed</span>';
                          // echo $rsCS['status'];
                        }
                        else{
                            echo '<span class="label label-success">Open</span>';
                            // echo $rsCS['status'];
                        }
    }
    else{echo $rpqueryresFet['initial_status'];}
  ?> </span>

    <?php
    if($rsCS['status_notes']){
      echo "<p><strong>NOTES:</strong>".$rsCS['status_notes']."</p>";
    }
    ?>
     <strong>&nbsp;report id#<?php echo $rpqueryresFet['report_id'];?></strong> 
	</div>


<div class="container-fluid">
		
	    
     <?php 
     if ($rpqueryresFet['photo']){
      ?>
      <div class="box">
      <div class="boxInner">
      <a href=""><img alt="" src="../rppic/<?php echo $rpqueryresFet['photo'];?>"/> </a>
      <div class="titleBox">Submitted on <?php echo date('m/d/Y-h:i a ', strtotime($rpqueryresFet['submit_time']));?></div>
      </div>
      </div>
      <?php
      }else{

      }
      ?>
				
				
		
</div>

	<p>
		<blockquote>
		  <p><?php echo $rpqueryresFet['description'];?></p>
		</blockquote>
	</p>

	<br/>

	<div class="tabbable">
		<ul class="nav nav-tabs">
		<li class="active">
	  	<a href="#location-tab" data-toggle="tab">অবস্থান</a>
      </li>
      <!--<div id="us2" style="width: 280px; height: 100px;"></div>
      <div class="clearfix">&nbsp;</div>-->

      

	  	<li><a href="#notes-tab" data-toggle="tab">নোটস</a></li>



	  </ul>
	  <div class="tab-content">

	  	<div class="tab-pane active" id="location-tab">
	      
    <style>
      #map-container { height: 200px; border: 0px solid grey }
    </style>
    <div id="map-container" class="col-md-12"></div>


    <script>

    function initialize() {
      var location = new google.maps.LatLng('<?php echo $rpqueryresFet['map_lat']; ?>', '<?php echo $rpqueryresFet['map_lng']; ?>');
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
<br/>
<p><strong>ঠিকানা:<?php echo $rpqueryresFet['map_addr'];?> </strong> </p>
  <!--<p><strong>coordinates x,y: </strong>  </p>-->
  <p><strong>অক্ষাংশ,দ্রাঘিমাংশ: </strong> <a href="https://www.google.com/maps/place/<?php echo $rpqueryresFet['map_lat'];?>,<?php echo $rpqueryresFet['map_lng'];?>" target="_blank"><?php echo $rpqueryresFet['map_lat'];?>,<?php echo $rpqueryresFet['map_lng'];?></a></p>

	    </div>

    	<div class="tab-pane" id="notes-tab">
		<p>
	<table class="table table-striped table-bordered table-condensed">
	  <colgroup>
	     <col span="1" style="width: 30%;">
	     <col span="1" style="width: 57%;">
	     <col span="1" style="width: 13%;">
	   </colgroup>
		  <tr>
      <th>Timestamp</th>
      <th>Status</th>
      <th>Notes</th>
    </tr>
    <?php


  $sqlcur="SELECT * FROM report_status WHERE report_id_fk='".$_GET['reportID']."' ORDER BY stat_id ASC";
$sqlS=mysqli_query($dbc,$sqlcur);
// $rsCS=mysqli_fetch_array($sqlS,MYSQLI_ASSOC);

     ?>
    <tr>
      <tr>
        <td><?php echo $rpqueryresFet['submit_time'];?></td>
        <td>
          <?php echo $rpqueryresFet['initial_status'];?>
        </td>
        <td></td>
      </tr>
    </tr>
    <tr>
      <tr>
        <td><?php echo $rpqueryresFet['submit_time'];?></td>
        <td><?php echo $rpqueryresFet['initial_status'];?></td>
        <td>
          Submitted via <?php echo $rpqueryresFet['from_media'];?>
        </td>
      </tr>
    </tr>
    <?php 
    while($rsCS=mysqli_fetch_array($sqlS,MYSQLI_ASSOC)){
      ?>
    <tr>
      <tr>
        <td><?php echo $rsCS['stat_change_time'];?></td>
        <td><?php echo $rsCS['status'];?></td>
        <td>
          <?php echo $rsCS['status_notes'];?>
        </td>
      </tr>
    </tr>
      <?php
    }
    ?>
	</table>
</p>
    </div>
	  </div>
	</div> <!-- /tabbable -->
        </div>
      </div><!-- #content -->

    </div><!-- #main -->


	<?php
			}
        }
        else{
        	$getError=1;
        }
     ?>


       <hr>

    
    </div> <!-- /container -->  
      <!-- Map -->
           <script>
                    $('#us2').locationpicker({
                        location: {
                            latitude: 23.7834974,
                            longitude: 90.4168823
                        },
                        radius: 0,
                        inputBinding: {
                            latitudeInput: $('#us2-lat'),
                            longitudeInput: $('#us2-lon'),
                            radiusInput: $('#us2-radius'),
                            locationNameInput: $('#us2-address')
                        },
                        enableAutocomplete: true
                    });
                    // $('#us2').locationpicker('map').map;
                    // $('#us2').locationpicker('map').map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
                    // $('#us2').locationpicker('map').map.setMapTypeId(google.maps.mapTypeControl:true);
                        // http://logicify.github.io/jquery-locationpicker-plugin/    
                   
                </script>
           
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

        <script type="text/javascript">
          $(document).ready(function(e){
              $('.search-panel .dropdown-menu').find('a').click(function(e) {
              e.preventDefault();
              var param = $(this).attr("href").replace("#","");
              var concept = $(this).text();
              $('.search-panel span#search_concept').text(concept);
              $('.input-group #search_param').val(param);
            });
          });
        </script>
    </body>
</html>


    <?php
    if ($getError==1) {
    	# code...
    	echo '<hr><div class="alert alert-warning" role="alert" style="width:200px;height=1500px;float: none;
     margin-left: auto;
     margin-right: auto;">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>ReportID not defined!
</div>';
    }
    
    ?>