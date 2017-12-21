@extends('dashboard/cores/base')
@section('content')
<style>
  #map-canvas{
    width: 100%;
    height: 450px;
  }
</style>
<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
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
    <!-- right column -->
    <div class="col-md-6">
      <!-- general form elements disabled -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">General Elements</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- text input -->
            <div class="form-group">
              <label>Address (Map)</label>
              {!! Form::text('address', '', ['class' => 'form-control', 'required', 'placeholder' => 'Address' , 'id' => 'searchmap', 'autofocus']) !!}
            </div>
            <div class="form-group">
              <label>Latitude</label>
              {!! Form::text('lat', '', ['class' => 'form-control', 'required', 'placeholder' => 'Lat', 'id' => 'lat', 'readonly']) !!}
            </div>
            <div class="form-group">
              <label>Longtitude</label>
              {!! Form::text('lng', '', ['class' => 'form-control', 'required', 'placeholder' => 'Lng' , 'id' => 'lng', 'readonly']) !!}
            </div>
        </div>
        <!-- /.box-body -->
        <!-- .box-footer -->
        <div class="box-footer">
            {!! Form::submit('Find Nearest Posts', ['id' => 'findNearestbtn', 'class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancel', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
    <div class="col-md-6">
      <!-- general form elements disabled -->
      <div style="visibility:hidden;" class="box box-warning" id="boxwarn">
        <div class="box-header with-border">
          <h3 class="box-title">General Elements</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="output"></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<script>
  $(function() {
      $('#findNearestbtn').click(function(){
          $("#boxwarn").attr("style", "visibility: none;");
          var lat = $('#lat').val();
          var lng = $('#lng').val();
          $data = {
              'lat':lat,
              'lng':lng
          };
          $.ajax({
              method: "POST",
              url: "/panel/administrator/nearest_posts",
              dataType: "json",
              data: $data,
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              success: function(data) {
                  output = "";
                  k = 0;
                  console.log(data.length);
                  if(data.length == 0){
                      output += "<h5>Not found the nearest place!</h5>";
                  }else{
                    for(i=0; i<data.length; i++){
                        output += (k+=1) + ". " + "<a href='" + "/panel/administrator/map/startLat/" + lat + "/startLng/" + lng + "/destLat/" + data[i].lat + "/destLng/" + 
                        data[i].lng + "'>" + data[i].address + "</a> (" + Math.round(data[i].distance) + "km) " + "<br />";
                    }
                  }
                  console.log(output);
                  $("#output").html(output);
              }
          });
      });
  });
</script>
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
  var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
  google.maps.event.addListener(searchBox,'places_changed',function(){
    var places = searchBox.getPlaces();
    var bounds = new google.maps.LatLngBounds();
    var i, place;
    for(i=0; place=places[i];i++){
        bounds.extend(place.geometry.location);
        marker.setPosition(place.geometry.location); //set marker position new...
      }
      map.fitBounds(bounds);
      map.setZoom(15);
  });
  google.maps.event.addListener(marker,'position_changed',function(){
    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();
    $('#lat').val(lat);
    $('#lng').val(lng);
  });
</script>
@endsection
@section('footer')
  @include('dashboard/cores/footer_posts')
@endsection
