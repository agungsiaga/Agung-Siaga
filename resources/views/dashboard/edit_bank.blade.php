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
          {!! Form::open(['url' => '/panel/administrator/edit_bank']) !!}
          <div class="row">
            <div class="col-md-3">
              <label>Bank Name</label>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                 {!! Form::text('bank_name', $bank->bank_name, ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Bank Name']) !!}
              </div>
              <div class="form-group">
                 {!! Form::hidden('id', $bank->id, ['class' => 'form-control']) !!}
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
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
