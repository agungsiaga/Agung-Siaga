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
          {!! Form::open(['enctype' => 'multipart/form-data', 'url' => '/panel/administrator/edit_volunteer']) !!}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Fullname</label>
                 {!! Form::text('full_name', $volunteer->full_name, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Full Name']) !!}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Address</label>
                 {!! Form::text('address', $volunteer->address, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Address']) !!}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Age</label>
                 {!! Form::text('age', $volunteer->age, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Age']) !!}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Identity Number</label>
                 {!! Form::text('identity_number', $volunteer->identity_number, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Identity Number']) !!}
              </div>
              <div class="form-group">
                <label>Phone Number</label>
                 {!! Form::text('phone_number', $volunteer->phone_number, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Phone Number']) !!}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Email</label>
                 {!! Form::email('email', $volunteer->email, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Email']) !!}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>New Password</label>
                 {!! Form::password('password', ['class' => 'form-control', 'autofocus', 'placeholder' => 'Password']) !!}
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Description</label>
                {!! Form::textarea('description', $volunteer->description, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Description']) !!}              </div>
              <!-- /.form-group -->
              <div class="form-group">
                  <label>Activate Status</label>
                  {{ Form::select('activate_status', [
                     '0' => 'Activate',
                     '1' => 'Inactivate']
                  ) }}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Profile Picture</label>
                <img src='/uploads/{{ $volunteer->thumbnail }}'>
                {!! Form::file('profile_picture', ['autofocus']) !!}
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {!! Form::submit('Change', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
      </div>
</section>
<!-- /.content -->
@endsection
@section('footer')
  @include('dashboard/cores/footer_posts')
@endsection