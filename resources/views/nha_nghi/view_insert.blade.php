@extends('layer.master')
@section('content')
	<h1>Thêm nha_nghi</h1>	
	<form class="form-horizontal" action="process_insert_nha_nghi" method="post">
		{{csrf_field()}}
		<div class="form-group">
		    <label for="ten_nha_nghi">Tên:</label>
		    <input type="text" class="form-control" id="ten_nha_nghi" name="ten_nha_nghi">
	    </div>
		<div class="form-group">
		    <label for="dia_chi">Địa chỉ:</label>
		    <input type="text" class="form-control" id="dia_chi" name="dia_chi">
	    </div>
	    <div class="form-group">
		    <label for="mo_ta">Mô tả:</label>
		    <input type="text" class="form-control" id="mo_ta" name="mo_ta">
	    </div>
        <div class="form-group">
	    	<button class="btn btn-primary">Thêm</button>
        </div>
		
	</form>
@endsection
