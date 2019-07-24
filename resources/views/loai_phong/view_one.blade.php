@extends('layer.master')
@section('content')
	<h1>Sửa loại phòng</h1>	
	<form class="form-horizontal" action="{{route('process_update_loai_phong')}}" method="post">
		{{csrf_field()}}
		<div class="form-group">
		    <input type="hidden" class="form-control" value="{{$loai_phong->ma_loai_phong}}" name="ma_loai_phong">
	    </div>
		<div class="form-group">
		    <label for="ten_loai_phong">Tên loại phòng:</label>
		    <input type="text" class="form-control" value="{{$loai_phong->ten_loai_phong}}" id="ten_loai_phong" name="ten_loai_phong">
		    @if ($errors->has('ten_loai_phong'))
                <span class="help-block">
                    <strong>{{ $errors->first('ten_loai_phong') }}</strong>
                </span>
            @endif
	    </div>
		<div class="form-group">
		    <label for="gia">Giá:</label>
		    <input type="text" class="form-control" value="{{$loai_phong->gia}}" id="gia" name="gia">
		    @if ($errors->has('gia'))
                <span class="help-block">
                    <strong>{{ $errors->first('gia') }}</strong>
                </span>
            @endif
	    </div>
	    <div class="form-group">
		    <label for="mo_ta">Mô tả:</label>
		    <input type="text" class="form-control" value="{{$loai_phong->mo_ta}}" id="mo_ta" name="mo_ta">
		    @if ($errors->has('mo_ta'))
                <span class="help-block">
                    <strong>{{ $errors->first('mo_ta') }}</strong>
                </span>
            @endif
	    </div>
	    <div class="form-group">
		    <label for="anh">Ảnh:</label>
		    <img src="{{asset("storage/$loai_phong->anh")}}">
	    </div>
	    <div class="form-group">
		    <label for="anh">Ảnh:</label>
		    <input type="file" class="form-control" id="anh" name="anh" accept="image/*">
		    @if ($errors->has('anh'))
                <span class="help-block">
                    <strong>{{ $errors->first('anh') }}</strong>
                </span>
            @endif
	    </div>
        <div class="form-group">
	    	<button class="btn btn-primary">Sửa</button>
	    	<button class="btn btn-info">
				<a href="{{ URL::previous() }}">
					Quay Lại
				</a>
			</button>
        </div>
		
	</form>
@endsection
