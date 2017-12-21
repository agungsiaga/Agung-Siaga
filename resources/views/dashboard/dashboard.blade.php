@extends('dashboard/cores/base')
@section('content')
<!-- Main content -->
<section class="content">
  <!-- Default box -->
    <div class="callout callout-info">
      <h4>Welcome!</h4>

      <p>Welcome .</p>
    </div>
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $volunteer }}</h3>

          <p>Volunteers</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-people"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ $campaign }}<sup style="font-size: 20px">%</sup></h3>

          <p>Campaign</p>
        </div>
        <div class="icon">
          <i class="ion ion-android-checkbox"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ $donation_posts }}</h3>

          <p>Donation Posts</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-home"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{ $bank }}</h3>

          <p>Bank</p>
        </div>
        <div class="icon">
          <i class="ion ion-cash"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

</section>
<!-- /.content -->
@endsection
@section('footer')
  @include('dashboard/cores/footer')
@endsection