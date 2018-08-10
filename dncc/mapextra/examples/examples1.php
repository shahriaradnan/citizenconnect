<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap stuff -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <!-- -->

    <!-- Location picker -->
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
<!--     <script src = "http://maps.googleapis.com/maps/api/js"></script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script> -->
    <script src="../dist/locationpicker.jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div id="examples">
            <p>

                <h3>Binding UI with the widget</h3>

                <div class="form-horizontal">
                <form method="post" action="map.php">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Location:</label>

                        <div class="col-sm-5">
                            <input type="text" name="add" class="form-control" id="us2-address"/>
                        </div>
                    </div>
                   <!-- <div class="form-group">
                        <label class="col-sm-1 control-label">Radius:</label>

                        <div class="col-sm-2">
                            <input type="text" name="rad" class="form-control" id="us2-radius" />
                        </div>
                    </div> -->
                    <div id="us2" style="width: 550px; height: 200px;"></div>
                    <div class="clearfix">&nbsp;</div>
                    
                    <div class="m-t-small">
                        <!-- <label class="p-r-small col-sm-1 control-label">Lat.:</label> -->

                        <div class="col-sm-1">
                            <input type="hidden" name="lat" class="form-control" style="width: 110px" id="us2-lat" />
                        </div>
                        <!-- <label class="p-r-small col-sm-1 control-label">Long.:</label> -->

                        <div class="col-sm-1">
                            <input type="hidden" name="long" class="form-control" style="width: 110px" id="us2-lon" />
                        </div>
                        <hr>
                         <div class="form-group">
                            <button id="button1id" name="button1id" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
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


        </div>
 
    </div>
</body>

</html>
