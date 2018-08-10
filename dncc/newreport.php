<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>New Complaint</title>
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
            <!-- Bootstrap stuff -->
	    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"> -->
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css"> -->
	    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
	    <script src="js/jquery-1.11.2.min.js"></script>
	    <!-- <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> -->
	    <script src="js/bootstrap.min.js"></script>
	    <!-- -->

	    <!-- Location picker -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8YUPTo99oths5C0CJeEBl99pfghiZjDI&libraries=places"
  type="text/javascript"></script>

	  <!--  <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>-->
	<!--     <script src = "http://maps.googleapis.com/maps/api/js"></script> -->
	    <!-- <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script> -->
	    <script src="mapextra/dist/locationpicker.jquery.js"></script>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <style type="text/css">
	    	.antspm { display:none;}
	    </style>
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
          	<li class="active"><a href="newreport.php">Submit New Complaint <span class="sr-only">(current)</span></a></li>
          	<li><a href="faq.php">Learn More</a></li>
          	
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    
    <div class="container">
      <div class="row">
      <hr>
      <div class="col-md-8">
          <form class="form-horizontal"  role="form" action="newreportprocess.php" method="post" enctype="multipart/form-data">
             <fieldset>
           <!-- Form Name -->
            <legend>Report to Waste Management Department<h6 class="pull-right"><span class="help-block"><i style="color:red">*</i> Mandatory</span></h6></legend>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="probspec">Specific Problem<span style="color:red">*<span></label>
              <div class="col-md-6">
                <select id="probspec" name="probspec" class="form-control" required>
                  <option value="">Select a Subcomplain</option>
                  <option value="Garbage not lifted from collection point">Garbage not lifted from collection point</option>
                  <option value="Collection point not attended properly">Collection point not attended properly</option>
                  <option value="Garbage not lifted from market">Garbage not lifted from market</option>
                  <option value="Need to pick waste from road">Need to pick waste from road</option>
                  <option value="Removal of dead animals">Removal of dead animals</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>
            <!-- SPAM :( -->
             <p class="antspm">Leave this empty: <input type="text" name="uhrl" /></p>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="wardno">Ward Number<span style="color:red">*<span><h6><a href="" data-toggle="modal" data-target=".bs-example-modal-lg">DNCC Ward List</a></h6></label>

            <div class="col-md-6">
              <input type="number" name="wardno"  class="form-control" placeholder="example: 21" required>
              </div>
            </div>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title" id="gridSystemModalLabel">DNCC Ward List</h3>
					<a href="http://www.dncc.gov.bd/dncc-setup/geographical-location-area-of-dncc.html" target="blank">[Source]</a>

					<!-- <div class="form-group" style="width:30%; display:inline-block;">
					    <input type="text" class="search form-control" placeholder="Search">
					</div> -->
					<div class="input-group"> <span class="input-group-addon">Find</span>

					    <input id="filter" type="text" class="form-control" placeholder="Type here...">
					</div>

				  </div>
				  <div class="modal-body" style="height:400px; overflow:auto;">
				  	<table id ="search" class="table table-striped table-bordered" cellspacing="0" width="100%">
				  	<thead>
				  		<th>#Ward</th>
				  		<th>Area</th>
				  	</thead>
				  	<tbody class="searchable">
				  		<tr>
				  			<td>1</td>
				  			<td>Uttara Model Town</td>
				  		</tr>
				  		<tr>
				  			<td>2</td>
				  			<td>Mirpur Section-12, Mirpur Section-12/Pa, Uttar Kalshi</td>
				  		</tr>
				  		<tr>
				  			<td>3</td>
				  			<td>Mirpur Section-10, Mirpur Section-11(Block-C)</td>
				  		</tr>
				  		<tr>
				  			<td>4</td>
				  			<td>Mirpur Section-13, Mirpur Section-14, Baish Teki</td>
				  		</tr>
				  		<tr>
				  			<td>5</td>
				  			<td>Mirpur Section-11 (Block-A,B), Bauniya Beribad,Polsh Nagar</td>
				  		</tr>
				  		<tr>
				  			<td>6</td>
				  			<td>Mirpur Section-7, Pallabi Wapda Colony, Mirpur Section-6(block-C,D)</td>
				  		</tr>
				  		<tr>
				  			<td>7</td>
				  			<td>Mirpur Section-2, Mirpur Section-6(Block-A,B), Rupnagar, Govt. Housing Estate</td>
				  		</tr>
				  		<tr>
				  			<td>8</td>
				  			<td>Mirpur Section-1, Uttar bishil, Zoo R/A(Box Nagar), Botanical Garden R/A, Nababer Bag, Chatbari, Kumir Shah Mazar</td>
				  		</tr>
				  		<tr>
				  			<td>9</td>
				  			<td>Bagbari, Horirampur, Joharabad, Bazar para, Bardhanbari, Golartek,Choto diyabari jahanabad, Kot bari, Ananda nagar</td>
				  		</tr>
				  		<tr>
				  			<td>10</td>
				  			<td>Gabtoli Jamidarbari(Hasnabad), Gabtali (1st,2n,3rd) Colony, Goidartek, Darussalam</td>
				  		</tr>
				  		<tr>
				  			<td>11</td>
				  			<td>Kallyanpur, Paikpara</td>
				  		</tr>
				  		<tr>
				  			<td>12</td>
				  			<td>Ahmed Nagar, Dakshin Bishil, Shah Ali bag, Kalwala Para, Paikpara staff quarter,BADC staff quarter</td>
				  		</tr>
				  		<tr>
				  			<td>13</td>
				  			<td>Boro Bag, Pirer Bag, Monipur</td>
				  		</tr>
				  		<tr>
				  			<td>14</td>
				  			<td>Kazi Para, Shewrapara,Shenpara Porbota</td>
				  		</tr>
				  		<tr>
				  			<td>15</td>
				  			<td>Vashan Tek, Albadir Tek, Damalkot, Lala Sorai, Mati Kata, Manikdi, Balughat, Baigar Tek, Baron Tek</td>
				  		</tr>
				  		<tr>
				  			<td>16</td>
				  			<td>Ibrahimpur, Kafrul</td>
				  		</tr>
				  		<tr>
				  			<td>17</td>
				  			<td>Khilkhet, Kuril, Kuratoli,Joar Sahara,Jagannathpur</td>
				  		</tr>
				  		<tr>
				  			<td>18</td>
				  			<td>Baridhara R/A(Block-I,K), Kalachadpur, Nadda, Shahajadpur(Ka,Kha,Ga)</td>
				  		</tr>
				  		<tr>
				  			<td>19</td>
				  			<td>Banani, Gulshan-1, Gulshan-2, Gulshan Sweeper Colony(1), Korail</td>
				  		</tr>
				  		<tr>
				  			<td>20</td>
				  			<td>Mohakhali</td>
				  		</tr>
				  		<tr>
				  			<td>21</td>
				  			<td>Uttar Badda, Dakshin Badda, Maddha Badda, Purbo Merul Badda,Pashchim Merul badda, Gopipara Badda</td>
				  		</tr>
				  		<tr>
				  			<td>22</td>
				  			<td>Rampura, Ulan, Bagichar Tek, nachirer Tek, Omar Ali Len, Pashchm Haji para</td>
				  		</tr>
				  		<tr>
				  			<td>23</td>
				  			<td>Khilgaon 'B' Zone, Khilgaon Purba Hajipara, Malibag Chowdhury Para,Malibag,malibag Bazar Road(Sobujbag)</td>
				  		</tr>
				  		<tr>
				  			<td>24</td>
				  			<td>Tejgaon Industrial Area</td>
				  		</tr>
				  		<tr>
				  			<td>25</td>
				  			<td>Nakhal Para, Arjat Para, Civil Aviation Staff Quarter</td>
				  		</tr>
				  		<tr>
				  			<td>26</td>
				  			<td>Kawran Bazar,Tejtori Para, Tejkuni para, Railway Colony</td>
				  		</tr>
				  		<tr>
				  			<td>27</td>
				  			<td>Raja Bazar, Indira Road, Monipuri Para, Sher-e bangla Nagar,Green Road</td>
				  		</tr>
				  		<tr>
				  			<td>28</td>
				  			<td>Agargaon Staff Quarter, Pashchim Agargaon, Kafrul, Taltola Staff Quarter, Shaymoli Road-1</td>
				  		</tr>
				  		<tr>
				  			<td>29</td>
				  			<td>Mohammadpur (block-C,F), Jahuri Mohalla</td>
				  		</tr>
				  		<tr>
				  			<td>30</td>
				  			<td>Shaymoli Ring Road, Adabo, Najrul Bag, PC Culture Housing Society, Baytul Aman, Saker Tek</td>
				  		</tr>
				  		<tr>
				  			<td>31</td>
				  			<td>Mohammadpur (block-D-1,2,3,4,5), Azam Road, Zakir Hussain Road (Block-E), Kazi najrul Islam Road (Blck-E)</td>
				  		</tr>
				  		<tr>
				  			<td>32</td>
				  			<td>Lalmatia (Block-A,B,C,D,E,F,G), New Colony Asad gate, Khilji Road, Babar Road, Gajanbi Road, Humayun Road,Mohammadpur (Block-A),Asad Aveneue,Iqbal Roaad,Sir Syed Road, Aorongajeb Road, PC Culture(Park)</td>
				  		</tr>
				  		<tr>
				  			<td>33</td>
				  			<td>Bosila, Washpur, Katasur,Graphic Art and Physical College,Mohammadia Housing Society,Bashbari</td>
				  		</tr>
				  		<tr>
				  			<td>34</td>
				  			<td>Jafarabad, Uttar Sultangonj, Rayer Bazar, Bibir Bazar, Sankar, Purba rayer Bazar,Modhu Bazar, Pashchim Dhanmondi</td>
				  		</tr>
				  		<tr>
				  			<td>35</td>
				  			<td>Boro Moghbazar,Dilu Road, new Eskaton Road,Pashchim Malibag,Maddhya Peyarabag,Greenway,Uttar Nayatola(first part)</td>
				  		</tr>
				  		<tr>
				  			<td>36</td>
				  			<td>Mirer Tek,Mirbag,Modhubag, Uttar Nayatola(2nd Part), Purba Nayatola,Dakshin Nayatola,Moghbazar Wirless Colony </td>
				  		</tr>
				  	</tbody>
				
					</table>
			      </div>

				  <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    
			    </div>
			  </div>
			</div>

            <div class="form-group">
            <label class="col-md-4 control-label" for="mapLoc">Location<span style="color:red">*<span><h6 class="help-block">*Search or Move the Pin to Mark Your Location</h6></label>
            <div class="col-md-6">
            <input type="text" name="add" class="form-control" id="us2-address" required/>
            </div>
            </div>
            <div class="row">
            <div class="col-md-4 control-label"></div>
            <div class="col-md-4" id="us2" style="width: 480px; height: 220px;"></div>
            
            <div class="clearfix">&nbsp;</div>
	                <!-- <label class="p-r-small col-sm-1 control-label">Lat.:</label> -->
	                <div class="m-t-small">
                        <div class="col-sm-1">
                            <input type="hidden" name="lat" class="form-control" style="width: 110px" id="us2-lat" />
                        </div>
                        <!-- <label class="p-r-small col-sm-1 control-label">Long.:</label> -->

                        <div class="col-sm-1">
                            <input type="hidden" name="long" class="form-control" style="width: 110px" id="us2-lon" />
                        </div>
                      </div>
            </div>
     
           <!--  </div> -->
       <div class="clearfix"></div>
       <br>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="specificAddr">Specific Address<span style="color:red">*<span></label>
              <div class="col-md-6">                     
                <textarea class="form-control" id="specificAddr" name="specificAddr" placeholder="As Details as possible " required></textarea>
              </div>
            </div>

            <!-- File Button --> 
            <div class="form-group">
              <label class="col-md-4 control-label" for="photo">Photo</label>
              <div class="col-md-4">
                <input id="photo" name="photo" class="input-file" type="file">
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="reportDescription">Description<span style="color:red">*<span></label>
              <div class="col-md-6">                     
                <textarea class="form-control" id="reportDescription" placeholder="Problem Description" name="reportDescription" required></textarea>
              </div>
            </div>

            <!-- Multiple Radios (inline) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="radios">Share With Others?<h6 class="help-block">Wiil be availbale in this website</h6></label>
              <div class="col-md-4"> 
                <label class="radio-inline" for="radios-0">
                  <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
                  Public
                </label> 
                <label class="radio-inline" for="radios-1">
                  <input type="radio" name="radios" id="radios-1" value="2">
                  Private
                </label>
              </div>
            </div>

            <input type="hidden" name="frommedia" id="from_media" value="web">
            <input type="hidden" name="initstatus" id="initstat" value="Open">

            <legend>Reporter Info<span class="help-block" id="hint_name"><h6>(keep blank to report Annonymously)</h6></span></legend>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="reporterName">Reporter Name</label>  
              <div class="col-md-6">
              <input id="reporterName" name="reporterName" type="text" placeholder="" class="form-control input-md">
              <span class="help-block">Name of the Reporter</span>  
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="reporterPhone">Reporter Phone</label>  
              <div class="col-md-6">
              <input id="reporterPhone" name="reporterPhone" type="number" placeholder="" class="form-control input-md">
              <span class="help-block">Phone number of the Reporter</span>  
              </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="button1id"></label>
              <div class="col-md-8">
                <button id="button1id" name="button1id" class="btn btn-success">Submit</button>
                <button id="button2id" name="button2id" class="btn btn-inverse" type="reset" value="Reset">Cancel</button>
              </div>
            </div>

          </fieldset>
    </form>
  
      </div>
     
      <div class="col-md-4">
      <br>
        <h4>How To: Make A Successful Report</h4>   
        <p>
          <ul type="circle"">
          	<li>Select Specific Issue</li>
            <li>Select the Ward Number(DNCC,Ward No#1 to #36) of the Area</li>
            <li>Use the Map Marker (or,Search) to pin your location</li>
            <li>Enter Address, as details as  possible</li>
            <li>Select a Photo (preferable)</li>
            <li>A brief description about the issue</li>
            <li>Select if you want to make the report public(other people will be able to see the report in this website)</li>
            <li>Put your Name and Phone number (keep blank to reprot annonymously)</li>
          </ul>
        </p>
      </div>
      
      </div>
      <hr>
      <script>
      	$(document).ready(function () {
		    (function ($) {

		        $('#filter').keyup(function () {

		            var rex = new RegExp($(this).val(), 'i');
		            $('.searchable tr').hide();
		            $('.searchable tr').filter(function () {
		                return rex.test($(this).text());
		            }).show();

		        })

		    }(jQuery));

		});
      </script>
      <script>
    $('#us2').locationpicker({
                        location: {
                            latitude: 23.7834974,
                            longitude: 90.4168823
                        },
                        radius: 10,
                        zoom:17,
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
      <footer>
        <p>&copy;<a href="#">NSU ECE_Summer'2016_CSE499(2)Group-2</a></p>
      </footer>

    </div> <!-- /container -->     
    
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
    <script src="js/jquery-1.11.2.min.js"></script>

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
    ga('create','UA-79221030-1','auto');ga('send','pageview');
</script>
    </body>
</html>