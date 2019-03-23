<?php 
include('php/functions.php');
include 'php/connection.php';

if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM event WHERE id = '$id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G-Cafe | Manager</title>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1542186754" />
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
<style type="text/css">
.directions li span.arrow {
  display:inline-block;
  min-width:28px;
  min-height:28px;
  background-position:0px;
  background-image: url("img/edit.jpg");
  position:relative;
  top:8px;
}
.directions li span.depart  {
  background-position:-28px;
}
.directions li span.rightUTurn  {
  background-position:-56px;
}
.directions li span.leftUTurn  {
  background-position:-84px;
}
.directions li span.rightFork  {
  background-position:-112px;
}
.directions li span.leftFork  {
  background-position:-140px;
}
.directions li span.rightMerge  {
  background-position:-112px;
}
.directions li span.leftMerge  {
  background-position:-140px;
}
.directions li span.slightRightTurn  {
  background-position:-168px;
}
.directions li span.slightLeftTurn{
  background-position:-196px;
}
.directions li span.rightTurn  {
  background-position:-224px;
}
.directions li span.leftTurn{
  background-position:-252px;
}
.directions li span.sharpRightTurn  {
  background-position:-280px;
}
.directions li span.sharpLeftTurn{
  background-position:-308px;
}
.directions li span.rightRoundaboutExit1 {
  background-position:-616px;
}
.directions li span.rightRoundaboutExit2 {
  background-position:-644px;
}

.directions li span.rightRoundaboutExit3 {
  background-position:-672px;
}

.directions li span.rightRoundaboutExit4 {
  background-position:-700px;
}

.directions li span.rightRoundaboutPass {
  background-position:-700px;
}

.directions li span.rightRoundaboutExit5 {
  background-position:-728px;
}
.directions li span.rightRoundaboutExit6 {
  background-position:-756px;
}
.directions li span.rightRoundaboutExit7 {
  background-position:-784px;
}
.directions li span.rightRoundaboutExit8 {
  background-position:-812px;
}
.directions li span.rightRoundaboutExit9 {
  background-position:-840px;
}
.directions li span.rightRoundaboutExit10 {
  background-position:-868px;
}
.directions li span.rightRoundaboutExit11 {
  background-position:896px;
}
.directions li span.rightRoundaboutExit12 {
  background-position:924px;
}
.directions li span.leftRoundaboutExit1  {
  background-position:-952px;
}
.directions li span.leftRoundaboutExit2  {
  background-position:-980px;
}
.directions li span.leftRoundaboutExit3  {
  background-position:-1008px;
}
.directions li span.leftRoundaboutExit4  {
  background-position:-1036px;
}
.directions li span.leftRoundaboutPass {
  background-position:1036px;
}
.directions li span.leftRoundaboutExit5  {
  background-position:-1064px;
}
.directions li span.leftRoundaboutExit6  {
  background-position:-1092px;
}
.directions li span.leftRoundaboutExit7  {
  background-position:-1120px;
}
.directions li span.leftRoundaboutExit8  {
  background-position:-1148px;
}
.directions li span.leftRoundaboutExit9  {
  background-position:-1176px;
}
.directions li span.leftRoundaboutExit10  {
  background-position:-1204px;
}
.directions li span.leftRoundaboutExit11  {
  background-position:-1232px;
}
.directions li span.leftRoundaboutExit12  {
  background-position:-1260px;
}
.directions li span.arrive  {
  background-position:-1288px;
}
.directions li span.leftRamp  {
  background-position:-392px;
}
.directions li span.rightRamp  {
  background-position:-420px;
}
.directions li span.leftExit  {
  background-position:-448px;
}
.directions li span.rightExit  {
  background-position:-476px;
}

.directions li span.ferry  {
  background-position:-1316px;
</style>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class=" ">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"> <img src="img/gcafelogs.png" style="width:125px; height:40px;"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
          <a href="#"  class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounts <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="marshalls.php"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Marshall accounts</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events <span class="caret"></span></a
 >         <ul class="dropdown-menu">
            <li><a href="#">GCALP Elite</a></li>
            <li><a href="#">Academy Arena</a></li>
            <li><a href="#">Teemo Cup</a></li>
            <li><a href="#">Lulu Cup</a></li>
            <li><a href="#">AOV Community Arena</a></li>
            <li role="separator" class="divider"></li>
            <li class="active"><a href="event.php">All Tournaments</a></li>
          </ul>
        </li>
            <li><a href="report.php" id="seen_report_btn">Reports <span id="report_noti"> </span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="seen_accept_noti"> <i class="glyphicon glyphicon-bell"></i> <span id="count_accept"></span></a>
              <ul class="dropdown-menu">
                <li id="fetch_accep_noti"></li>
              </ul>
            </li>
            <li><a href="#">  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Welcome <?php echo ucfirst($_SESSION['user']['user_type']); ?></a></li>
            <li><a href="#">  <span style="color:gray" class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> </a></li>
            <li><a href="events.php?logout='1'">  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <header id="header">
        <div class=" ">
            <div class="row">
                <div class="col-md-10">
                    <h1> <span class="glyphicon glyphicon-user" aria-hidden="true"> Event<small>accounts</small></h1>
                </div>
                <div class="col-md-2">

                </div>

            </div>

        </div>
    </header> 

    <section id="main">
        <div class=" ">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                  <h3 class="panel-title"> Event Details</h3>
              </div>
              <div class="panel-body table-responsive no-padding">
                <div class="row">
                  <div class="col-md-2">
                  <b>Marshall ID: </b> <?php echo $row['id']; ?>   <br>
                  <b>Marshall: </b> <?php echo $row['marshall']; ?>   <br>
                  <b>Cafe Name: </b><?php echo $row['cafename']; ?> </b>  <br>
                  <b>Land Mark: </b> <?php echo $row['landmark']; ?>   <br>
                  <b>Event Date:</b>  <?php echo $row['eventdate']; ?>  <br>
                  <b>Event Time: </b> <?php echo $row['time']; ?>   <br>
                  <b>Event Type: </b> <?php echo $row['type']; ?>   <br>
                  <b>Event Status:  </b> <?php echo $row['status']; ?> <br>
                  <a class="btn btn-danger btn-sm" href="event.php" style="margin-top: 95%;"><i class="glyphicon glyphicon-circle-arrow-left"></i></a>
                  </div>
                  <div class="col-md-10">
                    <div id="map" style=" width:98%; height:65vh; background: skyblue" ></div>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
    </section> 



    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script  type="text/javascript" charset="UTF-8" >

    

/**
 * Calculates and displays a car route from the Brandenburg Gate in the centre of Berlin
 * to Friedrichstraße Railway Station.
 *
 * A full list of available request parameters can be found in the Routing API documentation.
 * see:  http://developer.here.com/rest-apis/documentation/routing/topics/resource-calculate-route.html
 *
 * @param   {H.service.Platform} platform    A stub class to access HERE services
 */
function calculateRouteFromAtoB (platform) {
  var router = platform.getRoutingService(),
  routeRequestParams = {
    mode: 'fastest;car',
    representation: 'display',
    routeattributes: 'waypoints,summary,shape,legs',
    maneuverattributes: 'direction,action',
    waypoint0: '<?php echo $row['lat']; ?>,<?php echo $row['lon']; ?>', // Brandenburg Gate
    waypoint1: '<?php echo $row['upLt']; ?>,<?php echo $row['upLn']; ?>'  // Friedrichstraße Railway Station
  };


  router.calculateRoute(
    routeRequestParams,
    onSuccess,
    onError
  );
  var sad = new H.map.Marker({
    lat:<?php echo $row['lat']; ?>,
    lng:<?php echo $row['lon']; ?>
  });
  map.addObject(sad);
  var berlinMarker = new H.map.Marker({
    lat:<?php echo $row['upLt']; ?>,
    lng:<?php echo $row['upLn']; ?>
  });
  map.addObject(berlinMarker);
}
/**
 * This function will be called once the Routing REST API provides a response
 * @param  {Object} result          A JSONP object representing the calculated route
 *
 * see: http://developer.here.com/rest-apis/documentation/routing/topics/resource-type-calculate-route.html
 */
function onSuccess(result) {
  var route = result.response.route[0];
 /*
  * The styling of the route response on the map is entirely under the developer's control.
  * A representitive styling can be found the full JS + HTML code of this example
  * in the functions below:
  */
  addRouteShapeToMap(route);
  addManueversToMap(route);

  addWaypointsToPanel(route.waypoint);
  addManueversToPanel(route);
  addSummaryToPanel(route.summary);
  // ... etc.
}

/**
 * This function will be called if a communication error occurs during the JSON-P request
 * @param  {Object} error  The error message received.
 */
function onError(error) {
  alert('Ooops!');
}




/**
 * Boilerplate map initialization code starts below:
 */

// set up containers for the map  + panel
var mapContainer = document.getElementById('map'),
  routeInstructionsContainer = document.getElementById('panel');

//Step 1: initialize communication with the platform
var platform = new H.service.Platform({
  app_id: 'FVtpiX9zc0nM4RxzkxY4',
  app_code: '1gfhZROtCabKQQ36AxilzQ',
  useHTTPS: true
});
var pixelRatio = window.devicePixelRatio || 1;
var defaultLayers = platform.createDefaultLayers({
  tileSize: pixelRatio === 1 ? 256 : 512,
  ppi: pixelRatio === 1 ? undefined : 320
});

//Step 2: initialize a map - this map is centered over Berlin
var map = new H.Map(mapContainer,
  defaultLayers.normal.map,{
  center: {lat:52.5160, lng:13.3779},
  zoom: 13,
  pixelRatio: pixelRatio
});

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Create the default UI components
var ui = H.ui.UI.createDefault(map, defaultLayers);

// Hold a reference to any infobubble opened
var bubble;

/**
 * Opens/Closes a infobubble
 * @param  {H.geo.Point} position     The location on the map.
 * @param  {String} text              The contents of the infobubble.
 */
function openBubble(position, text){
 if(!bubble){
    bubble =  new H.ui.InfoBubble(
      position,
      // The FO property holds the province name.
      {content: text});
    ui.addBubble(bubble);
  } else {
    bubble.setPosition(position);
    bubble.setContent(text);
    bubble.open();
  }
}


/**
 * Creates a H.map.Polyline from the shape of the route and adds it to the map.
 * @param {Object} route A route as received from the H.service.RoutingService
 */
function addRouteShapeToMap(route){
  var lineString = new H.geo.LineString(),
    routeShape = route.shape,
    polyline;

  routeShape.forEach(function(point) {
    var parts = point.split(',');
    lineString.pushLatLngAlt(parts[0], parts[1]);
  });

  polyline = new H.map.Polyline(lineString, {
    style: {
      lineWidth: 4,
      strokeColor: 'rgba(0, 128, 255, 0.7)'
    }
  });
  // Add the polyline to the map
  map.addObject(polyline);
  // And zoom to its bounding rectangle
  map.setViewBounds(polyline.getBounds(), true);
}


/**
 * Creates a series of H.map.Marker points from the route and adds them to the map.
 * @param {Object} route  A route as received from the H.service.RoutingService
 */
function addManueversToMap(route){
  var svgMarkup = '<svg width="18" height="18" ' +
    'xmlns="http://www.w3.org/2000/svg">' +
    '<circle cx="8" cy="8" r="8" ' +
      'fill="#1b468d" stroke="white" stroke-width="1"  />' +
    '</svg>',
    dotIcon = new H.map.Icon(svgMarkup, {anchor: {x:8, y:8}}),
    group = new  H.map.Group(),
    i,
    j;

  // Add a marker for each maneuver
  for (i = 0;  i < route.leg.length; i += 1) {
    for (j = 0;  j < route.leg[i].maneuver.length; j += 1) {
      // Get the next maneuver.
      maneuver = route.leg[i].maneuver[j];
      // Add a marker to the maneuvers group
      var marker =  new H.map.Marker({
        lat: maneuver.position.latitude,
        lng: maneuver.position.longitude} ,
        {icon: dotIcon});
      marker.instruction = maneuver.instruction;
      group.addObject(marker);
    }
  }

  group.addEventListener('tap', function (evt) {
    map.setCenter(evt.target.getPosition());
    openBubble(
       evt.target.getPosition(), evt.target.instruction);
  }, false);

  // Add the maneuvers group to the map
  map.addObject(group);
}


/**
 * Creates a series of H.map.Marker points from the route and adds them to the map.
 * @param {Object} route  A route as received from the H.service.RoutingService
 */
function addWaypointsToPanel(waypoints){



  var nodeH3 = document.createElement('h3'),
    waypointLabels = [],
    i;


   for (i = 0;  i < waypoints.length; i += 1) {
    waypointLabels.push(waypoints[i].label)
   }

   nodeH3.textContent = waypointLabels.join(' - ');

  routeInstructionsContainer.innerHTML = '';
  routeInstructionsContainer.appendChild(nodeH3);
}

/**
 * Creates a series of H.map.Marker points from the route and adds them to the map.
 * @param {Object} route  A route as received from the H.service.RoutingService
 */
function addSummaryToPanel(summary){
  var summaryDiv = document.createElement('div'),
   content = '';
   content += '<b>Total distance</b>: ' + summary.distance  + 'm. <br/>';
   content += '<b>Travel Time</b>: ' + summary.travelTime.toMMSS() + ' (in current traffic)';


  summaryDiv.style.fontSize = 'small';
  summaryDiv.style.marginLeft ='5%';
  summaryDiv.style.marginRight ='5%';
  summaryDiv.innerHTML = content;
  routeInstructionsContainer.appendChild(summaryDiv);
}

/**
 * Creates a series of H.map.Marker points from the route and adds them to the map.
 * @param {Object} route  A route as received from the H.service.RoutingService
 */
function addManueversToPanel(route){



  var nodeOL = document.createElement('ol'),
    i,
    j;

  nodeOL.style.fontSize = 'small';
  nodeOL.style.marginLeft ='5%';
  nodeOL.style.marginRight ='5%';
  nodeOL.className = 'directions';

     // Add a marker for each maneuver
  for (i = 0;  i < route.leg.length; i += 1) {
    for (j = 0;  j < route.leg[i].maneuver.length; j += 1) {
      // Get the next maneuver.
      maneuver = route.leg[i].maneuver[j];

      var li = document.createElement('li'),
        spanArrow = document.createElement('span'),
        spanInstruction = document.createElement('span');

      spanArrow.className = 'arrow '  + maneuver.action;
      spanInstruction.innerHTML = maneuver.instruction;
      li.appendChild(spanArrow);
      li.appendChild(spanInstruction);

      nodeOL.appendChild(li);
    }
  }

  routeInstructionsContainer.appendChild(nodeOL);
}


Number.prototype.toMMSS = function () {
  return  Math.floor(this / 60)  +' minutes '+ (this % 60)  + ' seconds.';
}

// Now use the map as required...
calculateRouteFromAtoB (platform);
  </script>
</body>
</html>

