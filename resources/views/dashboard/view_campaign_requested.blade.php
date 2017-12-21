@extends('dashboard/cores/base')
@section('content')
<!-- Main content -->
<style>
#custom_view p{
  text-align: justify;
}
#custom_view img{
  width: 100%;
  height: 100%;
}
</style>
<section class="content">
<!-- Default box -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">{{ $campaignRequested->campaign_name }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-md-5">
            <div id="custom_view"><img src="/uploads/{{ $campaignRequested->campaign_image }}"></div>
            <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Campaigner</th>
              <th>Target Donation</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>{{ $campaignRequested->full_name }}</td>
              <td>Rp. {{ $campaignRequested->target_donation }}</td>
            </tr>
            </tbody>
          </table>
        </div>
          </div>
          <div class="col-md-6">
            <div id="custom_view">{!! $campaignRequested->description !!}</div>
            <div class="row no-print">
              <div class="col-xs-12">
                <a href="/panel/administrator/view_campaign_requested/confirm/{{ $campaignRequested->id }}" class="btn btn-primary" onclick="if (confirm(\'Confirm ?\')) return true; return false"><i class="fa fa-check"></i> Confirm</a>
                <a href="/panel/administrator/view_campaign_requested/ignore/{{ $campaignRequested->id }}" class="btn btn-warning" onclick="if (confirm(\'Ignore ?\')) return true; return false"><i class="fa fa-close"></i> Ignore</a>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection
@section('footer')
  @include('dashboard/cores/footer_campaign')
@endsection
