@extends('layer.master')
@section('content')
	<h1>Thêm loại phòng</h1>	
	<form class="form-horizontal" action="process_insert_loai_phong" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group">
		    <label for="ten_loai_phong">Tên loại phòng:</label>
		    <input type="text" class="form-control" id="ten_loai_phong" name="ten_loai_phong">
		    @if ($errors->has('ten_loai_phong'))
                <span class="help-block">
                    <strong>{{ $errors->first('ten_loai_phong') }}</strong>
                </span>
            @endif
	    </div>
		<div class="form-group">
		    <label for="gia">Giá:</label>
		    <input type="text" class="form-control" id="gia" name="gia">
		    @if ($errors->has('gia'))
                <span class="help-block">
                    <strong>{{ $errors->first('gia') }}</strong>
                </span>
            @endif
	    </div>
	    <div class="form-group">
		    <label for="mo_ta">Mô tả:</label>
		    <input type="text" class="form-control" id="mo_ta" name="mo_ta">
		    @if ($errors->has('mo_ta'))
                <span class="help-block">
                    <strong>{{ $errors->first('mo_ta') }}</strong>
                </span>
            @endif
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
	    	<button class="btn btn-primary">Thêm</button>
	    	<button class="btn btn-info">
				<a href="{{ URL::previous() }}">
					Quay Lại
				</a>
			</button>
        </div>
		
	</form>
@endsection
