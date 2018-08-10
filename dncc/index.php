<?php
include 'includes/conf.php';  
  
$limit = 10;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  

$sql = "SELECT * FROM submission ORDER BY report_id DESC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($dbc, $sql);  


?> 

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="NSU'ECE Spring'16 CSE499 Project">
    <meta name="keywords" content="citizen,connect,citizen connect,reporting,complaint,local-administration,local-government,citycorporation">
    <meta name="author" content="Adnan,Sakib">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="js/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/simplePagination.css" />
    <script src="dist/jquery.simplePagination.js"></script>
    <title>Citizen Connect</title>
    <script>
    </script>
<style>
tr:hover {
 
    background-color:#bebebe;
}

tr:hover td {
    background-color: transparent;
}
/*.popover {
    background: tomato;
}
.popover-title{
    background: magenta;
}*/

</style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8YUPTo99oths5C0CJeEBl99pfghiZjDI"
            type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[

    var customIcons = {
      Closed: {
        icon: 'img/icon/mm_20_blue.png'
      },
      Open: {
        icon: 'img/icon/mm_20_red.png'
      }
    };
    // ICON
 
    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(23.783731, 90.416912),
        zoom: 12,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("mapxml.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var title = markers[i].getAttribute("specificprob");
          var address = markers[i].getAttribute("address");
          var rid = markers[i].getAttribute("rid");
          var ward = markers[i].getAttribute("ward");
          var status = markers[i].getAttribute("status");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<div class=''><a style='text-decoration: none;' href='reportview.php?reportID="+rid+"' target='blank'>"+"<b>ID#"+rid+":"+title+"</b></a><br/>" +address+"</div>";
          var icon = customIcons[status] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>

  </script>

<!-- <script src="//fast.eager.io/DRuJKb9KX8.js"></script>   -->
<script src="//fast.eager.io/UnlpjXILhN.js"></script>


<body onload="load()"> 
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
          <a class="navbar-brand" href="index.php">DNCC Citizen Support<sub>&alpha;</sub></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav ">
                <li class="active"><a href="index.php">ENG<span class="sr-only">(current)</span></a></li>
                <li><a href="bn/">বাংলা</a></li>
            </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">View Complaint <span class="sr-only">(current)</span></a></li>
            <li><a href="newreport.php">Submit New Complaint</a></li>
            <li><a href="faq.php">Learn More</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-image:url(img/dhakaR.png);background-repeat:no-repeat;background-size: cover;min-height:250px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="container container-table">
             
                        <div class="row vertical-center-row">
                                <h3 style="text-align:center;font-weight: bold;">Find your complaint status</h3>
                                    <div id="custom-search-input">
                            
                                        <form class="input-group col-md-12" action="search.php" method="GET">
                             
                                            <input type="number" class="form-control input-lg" name="search_term" placeholder="#Report ID (example: 12)" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-info btn-lg" type="submit">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                            </span>
                                        </form>
                          

                                    </div>
                        </div>
                    </div>
                  </div>
                <div class="col-md-3"></div>
        </div> <!--row-->
        </div><!--container-->
    </div> <!--Jumbotron-->
    <div class="container">
      <!-- Example row of columns -->
      <div class="row" style="min-height:300px;">
        <div class="col-md-8">
        <table id="reports" class="table">
<tbody>  
<?php
function time_ago( $date )
{
    if( empty( $date ) )
    {
        return "No date provided";
    }

    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");

    $lengths = array("60","60","24","7","4.35","12","10");

    $now = time();

    $unix_date = strtotime( $date );

    // check validity of date

    if( empty( $unix_date ) )
    {
        return "Bad date";
    }

    // is it future date or past date

    if( $now > $unix_date )
    {
        $difference = $now - $unix_date;
        $tense = "ago";
    }
    else
    {
        $difference = $unix_date - $now;
        $tense = "ago";
    }

    for( $j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++ )
    {
        $difference /= $lengths[$j];
    }

    $difference = round( $difference );

    if( $difference != 1 )
    {
        $periods[$j].= "s";
    }

    return "$difference $periods[$j] {$tense}";

}
?>
<?php  
while ($row = mysqli_fetch_array($rs_result)) 
{


               if ($row['is_public']==1) 
            {
          # code...
        
?>  
<tr bgcolor="#eeeeee" class="report" onclick="location.href='reportview.php?reportID=<?php echo $row['report_id'];?>';"">
            <td class="report-content " colspan=2 >
                        <h4 class="report-title" style="font-weight:bold;">
                            <?php echo $row['specific_prob'];?> <small>at</small> <?php if($row['map_addr']){echo $row['map_addr'];}else {echo "Ward No.#".$row['ward_no'];}?>
                        </h4>
                        <div class="report-description" style="margin-bottom:1.0em;"><?php echo $row['description'];?></div>
                         <?php
                           $sqlcur="SELECT * FROM report_status WHERE report_id_fk='".$row['report_id']."' ORDER BY stat_id DESC LIMIT 1";
$sqlS=mysqli_query($dbc,$sqlcur);
$rsCS=mysqli_fetch_array($sqlS,MYSQLI_ASSOC);
                         if($rsCS['status']){
                        if ($rsCS['status']=='closed') {
                           echo '<span class="label label-info">Closed</span>';
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
                        else{
                          echo '<span class="label label-success">'.$row['initial_status'].'</span>';
                        }
                        ?>
                        

                        <span class="activity-timestamp">
                            Submitted at: <?php  echo date('m/d/Y-h:i a ', strtotime($row['submit_time']));
                            //echo date('h:i:s a m/d/Y', strtotime($row['submit_time']))
                          //  echo time_ago($row['submit_time']);
                             
                            ?>
                        <span>Report ID #<?php echo $row['report_id'];?></span>
                        </span>
                    </td>
                              <?php if($row['photo'])
            {
            ?>
                        <td class="report-image">
                            <a href="#"><img alt="" height="150" src="rppic/<?php echo $row['photo'];?>" title="" width="150" style="float:right;"/></a>
                        </td>
            <?php
            }else{
              ?>
              <td class="report-image">
              
            </td>
            <?php 
          }
            ?>
                </tr>
<?php  
    }
}  
?>  
</tbody>  
</table>


<?php  
    $sql = "SELECT COUNT(report_id) FROM submission";  
    $rs_result = mysqli_query($dbc, $sql);  
    $row = mysqli_fetch_row($rs_result);  
    $total_records = $row[0];  
    $total_pages = ceil($total_records / $limit);  
    $pagLink = "<nav><ul class='pagination'>";  
    for ($i=1; $i<=$total_pages; $i++) {  
                 $pagLink .= "<li><a href='index.php?page=".$i."'>".$i."</a></li>";  
    };  
    echo $pagLink . "</ul></nav>";  
?>
</div>

 <div class="col-md-4">
          <h3>App<sup>&alpha;</sup></h3>

            <ul style="list-style-type: none;">
                    <li>
                        <a href="https://db.tt/d2DEnPpq" class="app_thumbnail" target="_blank"><img alt="Android App" src="img/androidapp.jpeg" width="200"/></a>
                    </li>
    
            </ul>

            <h3>Map</h3><span class="help-block">Submitted Reports</span>
            <div id="map" style="width: 400px; height: 350px;margin:0 auto;"></div>
            <ul>
              
                <!--<li>Closed (Blue marker)</li>
                <li>Open (Red marker)</li>-->
            </ul>

      <!--       <h3>Map</h3>
            <div id="load">
             <div id="map" style="height:100px;width:100px"></div>
             </div> -->

</div>
</div>
   <hr>

      <footer>
        <p>&copy;<?php echo date("Y");?> <a href="#">NSU ECE_Summer'2016_CSE499(2)Group-2</a></p>
       <!-- <button class="btn btn-info" style="position: fixed; bottom: 0px; right: 0px;">
            <a href="" data-toggle="tooltip" title="Any Issue? Drop us a line please.." data-placement="top" style="text-decoration:none;color:black;"><img src="img/bgr.png" width="25px;"/> ssadnan1005@gmail.com</a>
         
        </button>-->
<!--    <a href="#" title="Drop us a line please" data-placement="top" data-toggle="popover" data-trigger="hover" data-content="ssadnan1005@gmail.com">Any Issue</a> -->
      </footer>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<!-- <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script> -->
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
		currentPage : <?php echo $page;?>,
		hrefTextPrefix : 'index.php?page='
    });
	});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-79221030-1', 'auto');
  ga('send', 'pageview');

</script>