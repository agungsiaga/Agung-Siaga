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
          {!! Form::open(['url' => '/panel/administrator/edit_donation_posts']) !!}
            <!-- text input -->
            <div class="form-group">
              <label>Posts Name</label>
              {!! Form::text('posts_name', $donationposts->posts_name, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Title']) !!}
            </div>
            <div class="form-group">
              <label>Address (Map)</label>
              {!! Form::text('address', $donationposts->address, ['class' => 'form-control', 'required', 'placeholder' => 'Address' , 'id' => 'searchmap']) !!}
            </div>
            <div class="form-group">
              <label>Latitude</label>
              {!! Form::text('lat', $donationposts->lat, ['class' => 'form-control', 'required', 'placeholder' => 'Lat', 'id' => 'lat']) !!}
            </div>
            <div class="form-group">
              <label>Longtitude</label>
              {!! Form::text('lng', $donationposts->lng, ['class' => 'form-control', 'required', 'placeholder' => 'Lng' , 'id' => 'lng']) !!}
            </div>
            <div class="form-group">
              {!! Form::hidden('id', $donationposts->id, ['class' => 'form-control']) !!}
            </div>
        </div>
        <!-- /.box-body -->
        <!-- .box-footer -->
        <div class="box-footer">
            {!! Form::submit('Change', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancel', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<script>
  var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
      lat: {{ $donationposts->lat }},
      lng: {{ $donationposts->lng }}
    },
    zoom:15
  });
  var marker = new google.maps.Marker({
    position: {
      lat: {{ $donationposts->lat }},
      lng: {{ $donationposts->lng }}
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
