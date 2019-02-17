@extends('layouts.adminlte')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Panel Report</h3>
	</div>
	<div class="panel-body">
		<form>
			<div class="form-group">
				<label for="exampleInputEmail1">Kecamatan</label>
				{!! Form::select('kecamatan_id',$list_kec,null,['class'=>'form-control','id'=>'kecamatan_id']) !!}
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Desa</label>
				{!! Form::select('desa_id',[],null,['class'=>'form-control','id'=>'desa_id']) !!}
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Category</label>
				{!! Form::select('category_id',[],null,['class'=>'form-control','id'=>'category_id']) !!}
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>

		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
	$('#kecamatan_id').on('change',function(){
		$.get('{{url("api/get-desa/")}}/'+this.value,function(data){
			$('#desa_id').html(data);
		});
	});

	$('#category_id').on('change',function(){
		$.get('{{url("api/sub-category")}}/'+this.value,function(data){
			$('#sub').html(data);
		});
	});
</script>
@endpush