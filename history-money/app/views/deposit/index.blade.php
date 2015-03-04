@extends('theme_xenon')

@section('content')
<div class="page-title"> 
	<div class="title-env"> 
		<h1 class="title">Deposit</h1> 
		<p class="description">ระบบฝากเงิน</p> 
	</div> 
	<div>
		
	</div>
	<div class="breadcrumb-env"> 
		<h1>{{$total_deposit }} <i class="fa fa-btc"></i></h1>
	</div>
</div>

<div class="panel panel-default">
	<script type="text/javascript">
	    $(document).ready(function(){
			 $("#table").dataTable({
				aLengthMenu: [
				[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
				],
				responsive: true
				});
	    });
	</script>
	<div class="dataTables_wrapper form-inline dt-bootstrap">
		<table id="table" class="table table-striped table-bordered dataTable">
			<thead>
				<tr>
					<th>#</th>
					<th>Money</th>
					<th>User</th>
					<th>Detail</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>
			@foreach($deposit as $idx => $value)
				<tr>
					<td>{{ $idx+1 }}</td>
					<td>{{ $value->money }}</td>
					<td>{{ $value->user->profile->firstname." ".$value->user->profile->lastname }}</td>
					<td>{{ $value->detail }}</td>
					<td>{{ $value->time }}<em> <i>({{ $value->updated_at }})</i> </em></td>
				</tr>
			@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>#</th>
					<th>Money</th>
					<th>User</th>
					<th>Detail</th>
					<th>Time</th>
				</tr>
			</tfoot>
		</table>
	</div>
@stop