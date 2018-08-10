<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head lang="bn">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>নতুন অভিযোগ</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="../apple-touch-icon.png">

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
            <!-- Bootstrap stuff -->
	    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"> -->
	    <link rel="stylesheet" href="../css/bootstrap.min.css">
	    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css"> -->
	    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	    <script src="../js/jquery-1.11.2.min.js"></script>
	    <!-- <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> -->
	    <script src="../js/bootstrap.min.js"></script>
	    <!-- -->

	    <!-- Location picker -->
	    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8YUPTo99oths5C0CJeEBl99pfghiZjDI&callback=initMap"
  type="text/javascript"></script>
	<!--     <script src = "http://maps.googleapis.com/maps/api/js"></script> -->
	    <!-- <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script> -->
	    <script src="../mapextra/dist/locationpicker.jquery.js"></script>
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
            <li><a href="../newreport.php">ENG</a></li>
            <li  class="active"><a href="index.php">বাংলা<span class="sr-only">(current)</span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li><a href="index.php">সকল অভিযোগ</a></li>
            <li class="active"><a href="newreport.php">অভিযোগ করুন<span class="sr-only">(current)</span></a></li>
            <li><a href="faq.php">জানুন</a></li>
          	
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
            <legend>বর্জ্য ব্যবস্থাপনা বিভাগে অভিযোগ জানান<h6 class="pull-right"><span class="help-block"><i style="color:red">*</i> বাধ্যতামূলক</span></h6></legend>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="probspec">সুনির্দিষ্ট সমস্যা<span style="color:red">*<span></label>
              <div class="col-md-6">
                <select id="probspec" name="probspec" class="form-control" required>
                  <option value="">সুনির্দিষ্ট সমস্যা সিলেক্ট করুন</option>
                  <option value="কালেকশন পয়েন্ট থেকে বর্জ্য অপসারণ করা হয়নি">কালেকশন পয়েন্ট থেকে বর্জ্য অপসারণ করা হয়নি</option>
                  <option value="কালেকশন পয়েন্টের সঠিক রক্ষণাবেক্ষণ করা হচ্ছেনা">কালেকশন পয়েন্টের সঠিক রক্ষণাবেক্ষণ করা হচ্ছেনা</option>
                  <option value="মার্কেট থেকে বর্জ্য অপসারণ করা হয়নি ">মার্কেট থেকে বর্জ্য অপসারণ করা হয়নি </option>
                  <option value="রাস্তা থেকে বর্জ্য অপসারণ করতে হবে">রাস্তা থেকে বর্জ্য অপসারণ করতে হবে</option>
                  <option value="মৃত পশুপাখি অপসারণ করতে হবে">মৃত পশুপাখি অপসারণ করতে হবে</option>
                  <option value="অন্যান্য">অন্যান্য</option>
                </select>
              </div>
            </div>
            <!-- SPAM :( -->
             <p class="antspm">Leave this empty: <input type="text" name="uhrl" /></p>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="wardno">ওয়ার্ড নাম্বার<span style="color:red">*<span><h6><a href="" data-toggle="modal" data-target=".bs-example-modal-lg">ওয়ার্ড লিস্ট</a></h6></label>

            <div class="col-md-6">
              <input type="number" name="wardno"  class="form-control" placeholder="যেমন-21(ইংরেজি ডিজিট )" required>
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
				  			<td>উত্তরা মডেল টাউন</td>
				  		</tr>
				  		<tr>
				  			<td>2</td>
				  			<td>মিরপুর সেকশন- ১২, মিরপুর- ১২ / প, উত্তর কালশী</td>
				  		</tr>
				  		<tr>
				  			<td>3</td>
				  			<td>মিরপুর সেকশন- ১০, মিরপুর সেকশন- ১১, ব্লক- সি ।</td>
				  		</tr>
				  		<tr>
				  			<td>4</td>
				  			<td>মিরপুর সেকশন- ১৩ ও ১৪ বাইশটেকি</td>
				  		</tr>
				  		<tr>
				  			<td>5</td>
				  			<td>মিরপুর সেকশন-১১, ব্লক- এ, বি, ও ডি/ই , বাউনিয়া বেড়ীবাঁধ, পলাশ নগর</td>
				  		</tr>
				  		<tr>
				  			<td>6</td>
				  			<td>মিরপুর সেকশন- ৭ পল্লবী ওয়াপদা কলোনী, দ্বিগুন সেনানিবাস, আলবদী রূপনগর টিনশেড, দুয়ারী পাড়া, সেকশন- ৬, ব্লক- সি, ডি, জ ও ট</td>
				  		</tr>
				  		<tr>
				  			<td>7</td>
				  			<td>মিরপুর সেকশন- ২, মিরপুর সেকশন- ৬, ব্লক- এ ও বি, রূপনগর, সরকারী হাউজিং এষ্টেট</td>
				  		</tr>
				  		<tr>
				  			<td>8</td>
				  			<td>মিরপুর সেকশন- ১, উত্তর বিশিল, চিড়িয়াখানা আবাসিক এলাকা (বকস নগর), বোটনিক্যাল গার্ডেন আবাসিক এলাকা, নবাবের বাগ ও চটবাড়ী, বি, আই, এস, এফ ষ্টাফ কোয়ার্টার (কুমির শাহ মাজার) </td>
				  		</tr>
				  		<tr>
				  			<td>9</td>
				  			<td>বাগবাড়ী, হরিরামপুর, জহরাবাদ, বাজার পাড়া, বর্ধনবাড়ী, গোলারটেক, ছোটদিয়াবাড়ী জাহানাবাদ, কোটবাড়ী, আনন্দ নগর</td>
				  		</tr>
				  		<tr>
				  			<td>10</td>
				  			<td>গাবতলী জমিদারবাড়ী (হাছনাবাদ), গাবতলী ১ম, ২য় ও ৩য় কলোনী, গৈদারটেক, দারুস সালাম</td>
				  		</tr>
				  		<tr>
				  			<td>11</td>
				  			<td>কল্যাণপুর, পাইক পাড়া</td>
				  		</tr>
				  		<tr>
				  			<td>12</td>
				  			<td>আহম্মেদ নগর, দক্ষিণ বিশিল, শাহআলী বাগ, কালওয়ালা পাড়া, পাইকপাড়া ষ্টাফ কোয়ার্টার, শিক্ষা বোর্ড ষ্টাফ কোয়ার্টার এবং ওয়াকাপ কলোনী টোলারবাগ, বিএডিসি ষ্টাফ কোয়ার্টার</td>
				  		</tr>
				  		<tr>
				  			<td>13</td>
				  			<td>বড় বাগ, পীরের বাগ, মনীপুর</td>
				  		</tr>
				  		<tr>
				  			<td>14</td>
				  			<td>কাজী পাড়া, শেওড়া পাড়া, সেনপাড়া পর্বতা</td>
				  		</tr>
				  		<tr>
				  			<td>15</td>
				  			<td>ভাসান টেক, আলবদিরটেক, দামালকোট, লালাসরাই, মাটি কাটা, মানিকদি, বালুঘাট, বাইগারটেক, বারনটেক</td>
				  		</tr>
				  		<tr>
				  			<td>16</td>
				  			<td>Ibrahimpur, Kafrul</td>
				  		</tr>
				  		<tr>
				  			<td>17</td>
				  			<td>খিলক্ষেত, কুড়িল, কুঁরাতরী, জোয়ার সাহারা (ওলিপাড়া), জগন্নাথপুর</td>
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
            <label class="col-md-4 control-label" for="mapLoc">ম্যাপে লোকেশান<span style="color:red">*<span><h6 class="help-block">*খুঁজুন অথবা পিনটি সরিয়ে চিহ্নিত করুন</h6></label>
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
              <label class="col-md-4 control-label" for="specificAddr">সুনির্দিষ্ট ঠিকানা <span style="color:red">*<span></label>
              <div class="col-md-6">                     
                <textarea class="form-control" id="specificAddr" name="specificAddr" placeholder="বিস্তারিত ঠিকানা" required></textarea>
              </div>
            </div>

            <!-- File Button --> 
            <div class="form-group">
              <label class="col-md-4 control-label" for="photo">ছবি</label>
              <div class="col-md-4">
                <input id="photo" name="photo" class="input-file" type="file">
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="reportDescription">বর্ণনা<span style="color:red">*<span></label>
              <div class="col-md-6">                     
                <textarea class="form-control" id="reportDescription" placeholder="সংক্ষিপ্ত বর্ণনা" name="reportDescription" required></textarea>
              </div>
            </div>

            <!-- Multiple Radios (inline) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="radios">সবাইকে জানাতে চান?<h6 class="help-block">ওয়েবসাইটে প্রদর্শিত হবে</h6></label>
              <div class="col-md-4"> 
                <label class="radio-inline" for="radios-0">
                  <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
                  হ্যা/পাবলিক
                </label> 
                <label class="radio-inline" for="radios-1">
                  <input type="radio" name="radios" id="radios-1" value="2">
                  না/প্রাইভেট
                </label>
              </div>
            </div>

            <input type="hidden" name="frommedia" id="from_media" value="web">
            <input type="hidden" name="initstatus" id="initstat" value="Open">

            <legend>অভিযোগকারীর তথ্যঃ<span class="help-block" id="hint_name"><h6>(পরিচয় গোপন রাখতে চাইলে খালি রাখুন)</h6></span></legend>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="reporterName">অভিযোগকারীর নাম</label>  
              <div class="col-md-6">
              <input id="reporterName" name="reporterName" type="text" class="form-control input-md">
              <span class="help-block">পূর্ণ নাম</span>  
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="reporterPhone">অভিযোগকারীর ফোন</label>  
              <div class="col-md-6">
              <input id="reporterPhone" name="reporterPhone" type="number" class="form-control input-md">
              <span class="help-block">ফোন নাম্বার</span>  
              </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="button1id"></label>
              <div class="col-md-8">
                <button id="button1id" name="button1id" class="btn btn-success">সাবমিট</button>
                <button id="button2id" name="button2id" class="btn btn-inverse" type="reset" value="Reset">বাতিল</button>
              </div>
            </div>

          </fieldset>
    </form>
  
      </div>
     
      <div class="col-md-4">
      <br>
        <h4>কিভাবে একটি কার্যকারী  অভিযোগ সম্পন্ন করবেন?</h4>   
        <p>
          <ul type="circle"">
          	<li>সুনির্দিষ্ট সমস্যা নির্বাচন করন</li>
            <li>ওয়ার্ড নাম্বার লিখুন (প্রয়োজনে ওয়ার্ড লিস্ট দেখে নিন)</li>
            <li>ম্যাপে অবস্থান চিহ্নিত করুন</li>
            <li>বিস্তারিত ঠিকানা লিখুন</li>
            <li>ছবি সংযুক্ত করুন(যদি থাকে)</li>
            <li>সংক্ষেপে সমস্যা বর্ণনা করুন</li>
            <li>এই ওয়েবসাইটের মাধ্যমে সমস্যাটি সবার সাথে শেয়ার করতে চাইলে তা নির্বাচন করুন</li>
            <li>পরিচয় প্রকাশ করতে চাইলে নাম এবং ফোন নাম্বার লিখুন</li>
            <li>সঠিক ভাবে অভিযোগ প্রদান সম্পন্ন করলে, "সাকসেস মেসেজ" প্রদর্শিত হবে;
এবং,সাথে একটি  "অভিযোগ নাম্বার" -ও দেওয়া হবে।
এই নাম্বার ব্যবহার করে পরবর্তিতে, হোম পেজের সার্চ অপশন ব্যবহার করে অভিযোগের অবস্থা জানা যাবে।</li>
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
    
    <script src="../js/jquery-1.11.2.min.js"></script>

    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>

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