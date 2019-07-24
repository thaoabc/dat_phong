@extends('layer.master')
@section('content')
	<h1>Sửa loại phòng</h1>	
	<form class="form-horizontal" action="{{route('process_update_phong')}}" method="post">
		{{csrf_field()}}
		<div class="form-group">
		    <input type="hidden" class="form-control" value="{{$phong->ma_phong}}" name="ma_phong">

	    </div>
	    <div class="form-group">
	    	<label for="tinh_trang">Tên loại phòng:</label>
		    <select class="form-control" name="ma_loai_phong">
		    	@foreach ($array_loai_phong as $loai_phong)
					<option value="{{$loai_phong->ma_loai_phong}}">{{$loai_phong->ten_loai_phong}}</option> 
					@if($loai_phong->ma_loai_phong==$phong->ma_loai_phong)
						selected
					@endif					
				@endforeach
		    </select>
	    </div>
	    <div class="form-group">
	    	<label for="tinh_trang">Tên phòng:</label>
		    <input type="text" class="form-control" name="ten_phong" value="{{$phong->ten_phong}}">
	    </div>
	    <div class="form-group">
		    <label for="tinh_trang">Tình trạng:</label>
		    
		    <select class="form-control" name="tinh_trang">
					<option value="1">Đang hoạt động</option>
					<option value="2">Khóa</option>
		    </select>

	    </div>
        <div class="form-group">
	    	<button class="btn btn-primary">Sửa</button>
        </div>
		
	</form>
@endsection
