<?php 
include("convert.php"); 
    if (@$_COOKIE['DMS_SLatitude']==NULL){
      $_COOKIE['DMS_SLatitude'] = "DMS from Latitude (Start)";
      $_COOKIE['DMS_SLongitude'] = "DMS from Longitude (Start)";
      $_COOKIE['DMS_DLatitude'] = "DMS from Latitude (Destination)";
      $_COOKIE['DMS_DLongitude'] = "DMS from Longitude (Destination)";
      $_COOKIE['MinDistance'] = "Minimum Distance";
      $_COOKIE['MaxDistance'] = "Maximum Distance";
      $_COOKIE['SLatitude2'] =0;
      $_COOKIE['SLongitude2'] =0;
      $_COOKIE['DLatitude2'] =0;
      $_COOKIE['DLongitude2'] = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DMS Converter</title>

    <!-- Ignore this just for WEB TEMPLATE-->
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
    <!-- END OF WEB TEMPLATE -->

    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <div class="site_title"><span>DMS Converter</span></div>
            </div>
          <!-- menu profile quick info -->
          <div class="profile clearfix">

              <div class="profile_info">
                <span>Code By,</span>
                <h2>Riki Nur Afifuddin <small><code>1301140290</code></small></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu"> 
                <li><a><i class="fa fa-spinner"></i> Convert <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="index1.php">Degrees to DMS</a></li>
                  </ul>
                </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
        <div class="x_title">
        <h2><small>LATITUDE LONGITUDE TO DMS</small></h2>
        </div>
            <!-- INPUT -->
            <div class="x_content">
                    <form action="convert.php" method="POST" class="form-horizontal form-label-left input_mask"> <!-- call convert.php for calculation -->

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" name="SLatitude" placeholder="Latitude (Start)">
                        <span class="fa fa-bullseye form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" name="DLatitude" placeholder="Latitude (Destination)">
                        <span class="fa fa-fighter-jet form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" name="SLongitude" placeholder="Longitude (Start)">
                        <span class="fa fa-bullseye form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" name="DLongitude" placeholder="Longitude (Destination)">
                        <span class="fa fa-fighter-jet form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-9 col-xs-12">
                          <button name="LtoDMS" type="submit" class="btn btn-success">Convert</button>
                        </div>
                      </div>

                    </form>
                  </div>
            <!-- INPUT -->

            <!-- OUTPUT -->
            <form class="form-horizontal form-label-left input_mask">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $_COOKIE['DMS_SLatitude'] ?>">
                <span class="fa fa-bullseye form-control-feedback left" aria-hidden="true"></span>
                </div>  

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $_COOKIE['DMS_DLatitude'] ?>">
                <span class="fa fa-fighter-jet form-control-feedback left" aria-hidden="true"></span>
                </div>  

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $_COOKIE['DMS_SLongitude'] ?>">
                <span class="fa fa-bullseye form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $_COOKIE['DMS_DLongitude'] ?>">
                <span class="fa fa-fighter-jet form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $_COOKIE['MinDistance'] ?> KM">
                <span class="fa fa-share form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $_COOKIE['MaxDistance'] ?> KM">
                <span class="fa fa-share-square-o form-control-feedback left" aria-hidden="true"></span>
                </div>

                <!-- Alternative from another web (if want see in map) 	(Courtesy of Google Maps) and (onlineconversion.com) -->
                <button type="button" class="btn btn-info"><a href="http://www.onlineconversion.com/maps_distance_gmap.htm?lat1=<?php echo $_COOKIE['SLatitude2']; ?>&lon1=<?php echo $_COOKIE['SLongitude2']; ?>&lat2=<?php echo $_COOKIE['DLatitude2']; ?>&lon2=<?php echo $_COOKIE['DLongitude2']; ?>">Alternative See In Map</button>
            </form> 
            <!-- TEST GOOGLE MAP API (my cc expired last month so I can't get API considered by new google policy we need enter billing address and cc)-->
            <!-- this code from google API documentation -->
            <div id="map"></div>

            <script>
                function initMap() {
                  var location1 = {lat: -25.363, lng: 131.004}; //I will replace lat long with entered data if my API work and add 1 more location and use distance matrix API to get distance 
                  var map = new google.maps.Map(document.getElementById('map'), {
                    center: location1,
                    zoom: 8
                  });
                  var marker = new google.maps.Marker({
                      position1: location,
                  })
                }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdvyJI3i6r12Nme057OvyqOH76Pj3M0kw&callback=initMap"></script>

            <!-- OUTPUT -->

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Basisdata Spasial 2018 x Telkom University
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Ignore this just for WEB TEMPLATE-->
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
    <!-- END OF WEB TEMPLATE SCRIPT -->
  </body>
</html>
