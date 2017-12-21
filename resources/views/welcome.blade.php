<html>
<head>
    <title>aa</title>
      <script src="/dashboard_as/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <!-- Gmap -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCr2-piW40A6QEcYr6ULvppMvZ6QIg4-84&libraries=places" type="text/javascript"></script>
</head>
<body>
<!-- Main content -->
<div id="map-canvas"></div>
 
<script>
  var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
      lat: -8.673093,
      lng: 115.22671200000002
    },
    zoom:15
  });
  var marker = new google.maps.Marker({
    position: {
      lat: -8.673093,
      lng: 115.22671200000002
    },
    map: map,
    draggable: true
  });
</script>


</body>
</html>
