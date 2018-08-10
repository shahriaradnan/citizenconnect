<?php
include '../includes/conf.php';
error_reporting(E_ALL & ~E_NOTICE);
$getOK=0;
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="bn"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>অনুসন্ধান...</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="../apple-touch-icon.png">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style>
            body {
                padding-top: 20px;
                padding-bottom: 10px;
            }
            tr:hover {
             
                background-color:#bebebe;
            }

            tr:hover td {
                background-color: transparent;
            }
        </style>

        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">

   
        <!--<link rel="stylesheet" href="css/custom/customJumbotron.css">-->
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <!--<link rel="stylesheet" type="text/css" href="css/custom2.css">-->

        <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

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
          <a class="navbar-brand" href="index.php">DNCC Citizen Connect</a>
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
             <li><a href="index.php">ENG</a></li>
          	<li class="active"><a href="bn/">বাংলা<span class="sr-only">(current)</span></a></li>
          	
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">সকল অভিযোগ</a></li>
            <li><a href="newreport.php">অভিযোগ করুন</a></li>
            <li><a href="faq.php">জানুন</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
 <!-- Main jumbotron for a primary marketing message or call to action -->
 <div class="jumbotron">
    	<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
        		<div class="col-md-8">
            	<div class="container container-table">
                <div class="row vertical-center-row"> 
				<?php
				if (isset($_GET['search_term'])){
          
          $getOK=1;
          
          $term=mysqli_real_escape_string($dbc,$_GET['search_term']);


          ?>
            <!--<h3 style="text-align:center;">Complaints in Ward No.#
              <span style="font-weight: bold;">
             
              </span>
            </h3>-->
            <h3 style="text-align:center;">Search for Report ID#
              <span style="font-weight: bold;">
              <?php echo $_GET['search_term'];?>
              </span>
            </h3>
        <?php
          }
        else
        {
          $getOK=0;
        ?>
            <h3 style="text-align:center;">Nothing Submitted. 
              <a style="font-weight: bold;" href="index.php">
              Search Here 
              </a>
            </h3>
        <?php  
        }
        ?>

                </div>     
              </div>
            </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>

  <!--Search Result Display-->
  <div class="container">
      <!-- Example row of columns -->
      <div class="row" style="min-height:330px;">
        <div class="col-md-9">
          <table id="reports" class="table">
            <tbody>
      
          <?php
          if ($getOK==1) 
          {
            //echo "hola";
            //$sql1="SELECT * FROM submission WHERE ward_no='".$term."'ORDER BY report_id DESC";
            $sql1="SELECT * FROM submission WHERE report_id='".$term."'ORDER BY report_id DESC";
            $sql1res=mysqli_query($dbc,$sql1);
            $sql1resRows=mysqli_num_rows($sql1res);
            if ($sql1resRows!=0) {
              # code...
            
            while( $sql1resfetch=mysqli_fetch_array($sql1res))
            {
  
            
              if(!empty($sql1resfetch['ward_no'])){

          ?>

              <tr class="report" onclick="location.href='reportview.php?reportID=<?php echo $sql1resfetch['report_id'];?>';"">
              <td class="report-content " colspan=2 >
                <h5 class="report-title">
                  Ward No# <?php echo $sql1resfetch['ward_no'];?>
                </h5>
                <div class="report-description">Problem Description: <?php echo $sql1resfetch['description'];?></div>
                <span class=""> </span>

                <span class="activity-timestamp">
                  Submitted at : <?php echo $sql1resfetch['submit_time'];?>
                  Complaint ID # <?php echo $sql1resfetch['report_id'];?>
                </span>
              </td>
              <?php if($sql1resfetch['photo'])
               {
              ?>
                  <td class="report-image">
                    <a href="#"><img alt="" height="150" src="../rppic/<?php echo $sql1resfetch['photo'];?>" title="" width="150" style="float:right;"/></a>
                  </td>
          <?php
                }else
                {
                  ?>
                   <td class="report-image">
                  </td>
                  <?php
                }
             ?>
             </tr>

             <?php   
            }
          //end_if
            else{
              ?>
              <tr class="report" onclick="location.href='index.php';"">
                <td class="report-content " colspan=2 >
                <h5 class="report-title">
                  No Reult Found
                </h5>
                </td>
              </tr>
              <?php
            }
          }
        }else{
            ?>
         <tr class="report" onclick="location.href='index.php';"">
            <td class="report-content " colspan=2 >
            <h5 class="report-title">
              No Reult Found
            </h5>
            </td>
         </tr>
          <?php

        }

        }//end_if
          else
          {
          ?>
         <tr class="report" onclick="location.href='index.php';"">
            <td class="report-content " colspan=2 >
            <h5 class="report-title">
              No Reult Found
            </h5>
            </td>
         </tr>
          <?php
              
          }
          ?>

            </tbody>
          </table>
        </div>
      </div>

       <hr>

      <footer>
        <p>&copy;<a href="#">NSU ECE_Summer'2016_CSE499(2)Group-2</a></p>
      </footer>
  </div> <!-- /container -->  
           
    <script src="../js/jquery-1.11.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>

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
