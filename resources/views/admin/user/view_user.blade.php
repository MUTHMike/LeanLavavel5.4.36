@extends('admin')

@section('title')
	<title>Status</title>
@stop

@section('style')

@stop

@section('contain')
 	<header class="panel_header">
		<h2 class="title pull-left">Dashboad | Status</h2>
	</header>

	<div class="row " id="content-body">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-sm-2 col-xs-2">
					<div class="form-group">
						<a href="{{ URL::to('/user/create.html') }}" class="btn btn-success">Add User</a>
					</div>
			</div>
			<div class="col-sm-10 col-xs-10">
				<form method="get" action="{{ URL::to('/main/status/search') }}" role="search" accept-charset="UTF-8">
					<div class="form-group">
						<div class="input-group col-sm-12 col-xs-12">
							<input type="text" name="txtSearch" id="txtSearch" class="form-control" placeholder="Search id, title, description">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default" id="btnSearch"><i><span class="glyphicon glyphicon-search"></i></button>
							</div><!-- /itnput-group-btn -->
						</div>	<!-- /input-group -->
					</div><!-- /form-group -->
				</form>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-border">
				<thead>
					<tr>
						<th>Firstname</th>
						<th>Lastanme</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="tbody">

					@foreach($users as $st)
						<tr>
							<td>{{ $st->first_name }}</td>
							<td>{{ $st->last_name }}</td>
							<td>{{ $st->email}}</td>
							<td>{{ $st->gender }}</td>
							<td>{{ $st->phone1 }}</td>
							<td>{{ $st->address }}</td>
							<td>
								<a href="{{ URL::to('/main/status')."/show/".$st->id }}" class="btn btn-success btn-ms " >View</a> &nbsp;
								<a href="{{ URL::to('/main/status')."/edit/".$st->id }}" class="btn btn-primary btn-ms">Edit</a> &nbsp;
								<a href="{{ URL::to('/main/status')."/delete/".$st->_id }}" class="btn btn-danger btn-ms">Delete</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			 {!! $users->render() !!}
		</div><!-- /table-responsive -->
	</div><!-- /col-xs-12 -->
  </div><!-- /row -->
@stop

@section('script')
<script type="text/javascript">

</script>
@stop