@extends('layer.master')
@section('content')
	<h1>Danh sách admin</h1>
	<a class="btn btn-primary a-btn-slide-text" href="{{route('view_insert_admin')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	<span><strong>Thêm admin</strong></span></a>
	<table class="table">
		<tr>
			<th>Tên</th>
			<th>SDT</th>
			<th>Email</th>
			<th>Cấp độ</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		@foreach ($array_admin as $admin)
			<tr>
				<td>{{$admin->ten_admin}}</td>
				<td>{{$admin->so_dien_thoai}}</td>
				<td>{{$admin->email}}</td>
				@if($admin->cap_do==1)
					<td>Chủ nhà nghỉ</td>
				
				@else
					<td>Nhân viên</td>
				
				@endif					
				<td><a href="{{route('view_one_admin',['ma_admin'=>$admin->ma_admin])}}" class="btn btn-primary a-btn-slide-text">
			        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			        <span><strong>Sửa</strong></span>            
   				</a></td>
   				<td><a href="{{route('delete_admin',['ma_admin'=>$admin->ma_admin])}}" class="btn btn-primary a-btn-slide-text">
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