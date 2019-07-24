@extends('layer.master')
@section('content')
	<h1>Sửa nhà nghỉ</h1>	
	<form class="form-horizontal" action="{{route('process_update_nha_nghi')}}" method="post">
		{{csrf_field()}}
		<div class="form-group">
		    <input type="hidden" class="form-control" value="{{$nha_nghi->ma_nha_nghi}}" name="ma_nha_nghi">
	    </div>
		<div class="form-group">
		    <label for="ten_nha_nghi">Tên:</label>
		    <input type="text" class="form-control" placeholder="{{$nha_nghi->ten_nha_nghi}}" id="ten_nha_nghi" name="ten_nha_nghi">
	    </div>
		<div class="form-group">
		    <label for="dia_chi">Địa chỉ:</label>
		    <input type="text" class="form-control" placeholder="{{$nha_nghi->dia_chi}}" id="dia_chi" name="dia_chi">
	    </div>
	    <div class="form-group">
		    <label for="mo_ta">Mô tả:</label>
		    <input type="text" class="form-control" placeholder="{{$nha_nghi->mo_ta}}" id="mo_ta" name="mo_ta">
	    </div>
	    <div class="form-group">
	    	<label for="khoa">Tình trạng:</label>
	    	<select class="browser-default custom-select" name="khoa">
				  <option selected>Open this select menu</option>
				  <option value="1">Hoạt động</option>
				  <option value="0">Tạm dừng</option>
			</select>
	    </div>
        <div class="form-group">
	    	<button class="btn btn-primary">Sửa</button>
        </div>
		
	</form>
@endsection
