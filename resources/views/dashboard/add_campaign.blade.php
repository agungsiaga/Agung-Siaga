@extends('dashboard/cores/base')
@section('content')
<!-- Main content -->

<section class="content">
  <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select2</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          {!! Form::open(['enctype' => 'multipart/form-data', 'url' => '/panel/administrator/add_volunteer']) !!}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Campaign Name</label>
                 {!! Form::text('campaign_name', '', ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Campaign Name']) !!}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Volunteer Email</label>
                 {!! Form::email('volunteer_email', '', ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Email']) !!}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Target Donation</label>
                 {!! Form::text('target_donation', '', ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Target Donation']) !!}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                  <label>Activate Status</label>
                  {{ Form::select('activate_status', [
                     '1' => 'Activate',
                     '0' => 'Inactivate']
                  ) }}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Profile Picture</label>
                {!! Form::file('profile_picture', ['required', 'autofocus']) !!}
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Description</label>
                {!! Form::textarea('description', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Description']) !!}
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {!! Form::submit('Add New Campaign', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
      </div>
</section>
<!-- /.content -->
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>

@endsection
@section('footer')
  @include('dashboard/cores/footer_posts')
@endsection
