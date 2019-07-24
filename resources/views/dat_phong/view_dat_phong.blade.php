@extends('layer.master')
@section('content')
	<form class="form-horizontal" action="{{route('view_phong')}}" method="post">
		{{csrf_field()}}
		<div class="row">
			<label for="ngay_nha_phong">Ngày nhận phòng:</label>
            <!-- <div class='input-group date' id='datetimepicker1'> -->
                <input type='date' class="form-control" name="ngay_nhan_phong" />
                <!-- <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span> -->
            <!-- </div> -->
             @if ($errors->has('ngay_nhan_phong'))
                <span class="help-block">
                    <strong>{{ $errors->first('ngay_nhan_phong') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
        	<label for="ngay_tra_phong">Ngày trả phòng:</label>
            <!-- <div class='input-group date' id='datetimepicker1'> -->
                <input type='date' class="form-control" name="ngay_tra_phong" />
                <!-- <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span> -->
           <!--  </div> -->
            @if ($errors->has('ngay_tra_phong'))
                <span class="help-block">
                    <strong>{{ $errors->first('ngay_tra_phong') }}</strong>
                </span>
            @endif
        </div>
         <div class="row">
        	<label for="tinh_trang">Loại phòng:</label>
		    <select class="form-control" name="ma_loai_phong">
		    	@foreach ($array_loai_phong as $loai_phong)
					<option value="{{$loai_phong->ma_loai_phong}}">{{$loai_phong->ten_loai_phong}}_{{$loai_phong->gia}} vnd</option>					
				@endforeach
		    </select>
        </div>
        <div class="row">
	    	<button class="btn btn-primary">Tìm phòng</button>
        </div>
    </form>    
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
@endsection
@push('js')
<script type="text/javascript">
    
</script>
<!-- <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>        
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" /> -->

<!-- search -->
@endpush