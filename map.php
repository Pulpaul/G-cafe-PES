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

  <div id="map" style="position:absolute; width:99%; height:98%; background: skyblue" ></div>

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
    waypoint0: '14.75301823,121.00761468', // Brandenburg Gate
    waypoint1: '14.7764,121.0447'  // Friedrichstraße Railway Station
  };


  router.calculateRoute(
    routeRequestParams,
    onSuccess,
    onError
  );
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