@extends('admin')

@section('title')

@stop
@section('style')

@stop
@section('contain')
	<section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-8 col-sm-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add User Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form method="POST" action="{{ URL::to('/user/add_user') }}" accept-charset="UTF-8" class="form-horizontal ng-pristine ng-valid">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
              <span class="text-danger">(*)Fields are Mandatory</span>
                <div class="form-group">
                  <label for="input" class="col-sm-3 control-label">Firstname<em class="text-danger">*</em></label>
                  <div class="col-sm-6">
                    <input class="form-control" placeholder="Firstname" name="firstname" type="text" value="">
                    <p class="text-danger"> {{ $errors->first('firstname') }}</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input" class="col-sm-3 control-label">Lastname<em class="text-danger">*</em></label>
                  <div class="col-sm-6">
                    <input class="form-control" placeholder="Lastname" name="lastname" type="text" value="">
                    <p class="text-danger"> {{ $errors->first('lastname') }}</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input" class="col-sm-3 control-label">Email<em class="text-danger">*</em></label>
                  <div class="col-sm-6">
                    <input class="form-control" id="input_email" placeholder="Email" name="email" type="text" value="">
                    <p class="text-danger"> {{ $errors->first('email') }}</p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input_password" class="col-sm-3 control-label">Password<em class="text-danger">*</em></label>
                  <div class="col-sm-6">
                    <input class="form-control" id="input_password" placeholder="Password" name="password" type="text" value="">                  
                    <p class="text-danger"> {{ $errors->first('password') }}</p>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="input" class="col-sm-3 control-label">Gender<em class="text-danger">*</em></label>
                  <div class="col-sm-6">
                    <input class="form-control" id="input_email" placeholder="Gender" name="gender" type="text" value="">
                    <p class="text-danger"> {{ $errors->first('gender') }}</p>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="input" class="col-sm-3 control-label">Phone<em class="text-danger">*</em></label>
                  <div class="col-sm-6">
                    <input class="form-control" id="input_email" placeholder="Phone Number" name="phone" type="text" value="">
                    <p class="text-danger"> {{ $errors->first('phone') }}</p>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="input" class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-6">
                    <input class="form-control" id="input_email" placeholder="Address" name="address" type="text" value="">
                    <span class="text-danger"></span>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-warning" name="cancel" value="cancel">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" name="submit" value="submit">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
@stop
@section('script')

@stop