@extends('dashboard/cores/base')
@section('content')
<style>
  #map-canvas{
    width: 100%;
    height: 600px;
  }
</style>
<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Preview Map</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="map-canvas"></div>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (left) -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<script>
  function initMap(){
    var pointA = new google.maps.LatLng({{ $startLat }}, {{ $startLng }}),
    pointB = new google.maps.LatLng({{ $destLat }} , {{ $destLng }}),
    map = new google.maps.Map(document.getElementById('map-canvas'),{
      center: pointA,
      zoom:15
    });
    
    directionsService = new google.maps.DirectionsService,
    directionsDisplay = new google.maps.DirectionsRenderer({
      map: map
    }),
    markerA = new google.maps.Marker({
      position: pointA
    }), 
    markerB = new google.maps.Marker({
      position: pointB
    });

    calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
    
  }

  function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
    directionsService.route({
        origin: pointA,
        destination: pointB,
        avoidTolls: true,
        avoidHighways: false,
        travelMode: google.maps.TravelMode.DRIVING
    }, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
  }

  initMap();
</script>
@endsection
@section('footer')
  @include('dashboard/cores/footer_posts')
@endsection
