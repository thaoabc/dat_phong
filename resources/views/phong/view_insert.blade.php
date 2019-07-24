@extends('layer.master')
@section('content')
	<h1>Thêm phòng</h1>	
	<form class="form-horizontal" action="{{route('process_insert_phong')}}" method="post">
		{{csrf_field()}}
	    <div class="form-group">
	    	<label for="tinh_trang">Tên loại phòng:</label>
		    <select class="form-control" name="ma_loai_phong">
		    	@foreach ($array_loai_phong as $loai_phong)
					<option value="{{$loai_phong->ma_loai_phong}}">{{$loai_phong->ten_loai_phong}}</option>				
				@endforeach
		    </select>
	    </div>
	    <div class="form-group">
	    	<label for="ten_phong">Tên phòng:</label>
		    <input type="text" class="form-control" name="ten_phong" id="ten_phong">
		    @if ($errors->has('ten_phong'))
                <span class="help-block">
                    <strong>{{ $errors->first('ten_phong') }}</strong>
                </span>
            @endif
	    </div>
        <div class="form-group">
	    	<button class="btn btn-primary">Thêm</button>
	    	<button class="btn btn-info">
				<a href="{{ URL::previous() }}">
					Quay Lại
				</a>
			</button>
        </div>
		
	</form>
@endsection
