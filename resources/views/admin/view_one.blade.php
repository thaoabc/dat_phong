@extends('layer.master')
@section('content')
	<h1>Sửa admin</h1>
	<form class="form-horizontal" action="{{route('process_update_admin')}}" method="post">
		{{csrf_field()}}
		<div class="form-group">
		    <input type="hidden" class="form-control" value="{{$admin->ma_admin}}" name="ma_admin">
	    </div>
		<div class="form-group">
		    <label for="ten_admin">Tên:</label>
		    <input type="text" class="form-control" id="ten_admin" value="{{$admin->ten_admin}}" name="ten_admin">
		    @if ($errors->has('ten_admin'))
                <span class="help-block">
                    <strong>{{ $errors->first('ten_admin') }}</strong>
                </span>
            @endif
	    </div>
		<div class="form-group">
		    <label for="sdt">Số điện thoại:</label>
		    <input type="tel" class="form-control" id="sdt" value="{{$admin->so_dien_thoai}}" name="sdt">
		    @if ($errors->has('sdt'))
                <span class="help-block">
                    <strong>{{ $errors->first('sdt') }}</strong>
                </span>
            @endif
	    </div>
	    <div class="form-group">
		    <label for="email">Email:</label>
		    <input type="text" class="form-control" id="email" value="{{$admin->email}}" name="email">
		    @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
	    </div>
	    <div class="form-group">
		    <label for="password">Mật khẩu:</label>
		    <input type="password" class="form-control" id="password" value="{{$admin->password}}" name="password">
		    @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
	    </div>
	    <div class="form-group">
		    <b>Cấp độ:</b>
		    <select class="form-control" name="cap_do">
		    	@if($admin->cap_do==1)
						<option value="1" selected>Admin</option>
						<option value="2">Nhân viên</option>
				@elseif($admin->cap_do==2)
					<option value="1">Admin</option>
					<option value="2" selected>Nhân viên</option>
				@endif	    	
		    </select>
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
