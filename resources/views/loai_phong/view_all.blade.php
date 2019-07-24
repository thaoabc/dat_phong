@extends('layer.master')
@section('content')
	<h1>Danh sách loại phòng</h1>
	<a class="btn btn-primary a-btn-slide-text" href="{{route('view_insert_loai_phong')}}">
	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	<span><strong>Thêm loại phòng</strong></span></a>
	<table class="table">
		<tr>
			<th>Tên loại phòng</th>
			<th>Giá</th>
			<th>Mô tả</th>
			<th>Ảnh</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		@foreach ($array_loai_phong as $loai_phong)
			<tr>
				<td>{{$loai_phong->ten_loai_phong}}</td>
				<td>{{$loai_phong->gia}}</td>
				<td>{{$loai_phong->mo_ta}}</td>
				<td><img src="{{asset("storage/$loai_phong->anh")}}"></td>
				<td><a href="{{route('view_one_loai_phong',['ma_loai_phong'=>$loai_phong->ma_loai_phong])}}" class="btn btn-primary a-btn-slide-text">
			        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			        <span><strong>Sửa</strong></span>            
   				</a></td>
   				<td><a href="{{route('delete_loai_phong',['ma_loai_phong'=>$loai_phong->ma_loai_phong])}}" class="btn btn-primary a-btn-slide-text">
			       	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			        <span><strong>Xóa</strong></span>            
			    </a></td>
			</tr>
		@endforeach
	</table>
@endsection
@push('js')

<script type="text/javascript">
	
</script>
@endpush