@extends('layer.master')
@section('content')
	<h1>Danh sách phòng</h1>
	<a class="btn btn-primary a-btn-slide-text" href="{{route('view_insert_phong')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	<span><strong>Thêm phòng</strong></span></a>
	<table class="table">
		<tr>
			<th>Mã phòng</th>
			<th>Tên loại phòng</th>
			<th>Tên phòng</th>
			<th>Tình trạng</th>
			<th>Sửa</th>
		</tr>
		@foreach ($array_phong as $phong)
			<tr>
				<td>{{$phong->ma_phong}}</td>
				<td>{{$phong->ten_loai_phong}}</td>
				<td>{{$phong->ten_phong}}</td>
				<td>
					@if($phong->tinh_trang==1)
						Đang hoạt động
					@elseif($phong->tinh_trang==2)
						Khóa
					@endif
				</td>
				<td><a href="{{route('view_one_phong',['ma_phong'=>$phong->ma_phong])}}" class="btn btn-primary a-btn-slide-text">
			        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			        <span><strong>Sửa</strong></span>            
   				</a></td>
			</tr>
		@endforeach
	</table>
	{{ $array_phong->links() }}
@endsection
@push('js')

<script type="text/javascript">
	
</script>
@endpush