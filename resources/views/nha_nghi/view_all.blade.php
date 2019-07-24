@extends('layer.master')
@section('content')
	<h1>Day la danh sach tat ca nha_nghi</h1>
	<button class="btn btn-success"><a href="{{route('view_insert_nha_nghi')}}">Thêm nha_nghi</a></button>
	<table class="table">
		<tr>
			<th>Tên</th>
			<th>Địa chỉ</th>
			<th>Mô tả</th>
			<th>Tình trạng</th>
		</tr>
		@foreach ($array_nha_nghi as $nha_nghi)
			<tr>
				<td>{{$nha_nghi->ten_nha_nghi}}</td>
				<td>{{$nha_nghi->dia_chi}}</td>
				<td>{{$nha_nghi->mo_ta}}</td>					
				<td>
				@if($nha_nghi->tinh_trang==1)
					{{"Đang hoạt động"}}
				
				@else
					{{"Tạm dừng"}}
				
				@endif
				</td>
				<td><a href="{{route('view_one_nha_nghi',['ma_nha_nghi'=>$nha_nghi->ma_nha_nghi])}}" class="btn btn-primary a-btn-slide-text">
			        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			        <span><strong>Edit</strong></span>            
   				</a></td>
   				<td><a href="{{route('delete_nha_nghi',['ma_nha_nghi'=>$nha_nghi->ma_nha_nghi])}}" class="btn btn-primary a-btn-slide-text">
			       	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			        <span><strong>Delete</strong></span>            
			    </a></td>
			</tr>
		@endforeach
	</table>
@endsection
@push('js')

<script type="text/javascript">
	
</script>
@endpush