@extends('layer.master')
@section('content')
	@if(($array_phong->count())==0)
		<h3>Không có kết quả nào được tìm thấy</h3>
	@else
		<h1>Day la danh sach tat ca phong</h1>
		<form class="form-horizontal" action="{{route('dat_phong')}}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<input type='hidden' class="form-control" name="ngay_nhan_phong" value="{{$array_ngay['ngay_nhan_phong']}}" />
			</div>
			<div class="form-group">
				<input type='hidden' class="form-control" name="ngay_tra_phong" value="{{$array_ngay['ngay_tra_phong']}}"/>
			</div>
			<div class="form-group">
		    	<label for="tinh_trang">Tên phòng:</label>
			    <select class="form-control" name="ma_phong">
			    	@foreach ($array_phong as $phong)
						<option value="{{$phong->ma_phong}}">{{$phong->ten_phong}}</option>
					@endforeach
			    </select>
		    </div>
			<div class="form-group">
		    	<button class="btn btn-primary">Đặt phòng</button>
		    	<button class="btn btn-info">
					<a href="{{ URL::previous() }}">
						Quay Lại
					</a>
				</button>
	        </div>
		</form>
	@endif
	@endsection
@push('js')

<script type="text/javascript">
	
</script>
@endpush