@extends('layer.master')
@section('content')
	<h1>Danh sách hóa đơn</h1><br><br>
	<a class="btn btn-primary a-btn-slide-text" href="{{route('chua_nhan_phong')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	<span><strong>Chưa nhận phòng</strong></span></a>
	<a class="btn btn-primary a-btn-slide-text" href="{{route('da_thanh_toan')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	<span><strong>Đã thanh toán</strong></span></a>
	<a class="btn btn-primary a-btn-slide-text" href="{{route('dang_su_dung')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	<span><strong>Đang sử dụng</strong></span></a>
	<table class="table">
		<tr>
			<th>Tên khách hàng</th>
			<th>Ngày nhận phòng</th>
			<th>Ngày trả phòng</th>
			@if(!empty($day))
				<th>Số ngày</th>
			@endif
			<th>Thành tiền</th>
			@if($day['tinh_trang']==1)
				<th>Nhận phòng</th>
			
			@elseif($day['tinh_trang']==2)
				<th>Dừng thuê</th>
				<th>Thanh toán</th>
			
			@endif			
			
		</tr>
		@foreach ($array_hoa_don as $hoa_don)
			<tr>
				<td>{{$hoa_don->ten_khach_hang}}</td>
				<td>{{$hoa_don->ngay_nhan_phong}}</td>
				<td>{{$hoa_don->ngay_tra_phong}}</td>
				@if(!empty($day))
					<th>{{$day['day']}}</th>
				@endif
				<td>{{$hoa_don->thanh_tien}}</td>
				@if($day['tinh_trang']==1)
					<td><a href="{{route('xac_nhan',['ma_hoa_don'=>$hoa_don->ma_hoa_don])}}" class="btn btn-primary a-btn-slide-text">
			        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			        <span><strong>Xác nhận</strong></span>            
   					</a></td>
				
				@elseif($day['tinh_trang']==2)
					<td><a href="{{route('dung_thue',['ma_hoa_don'=>$hoa_don->ma_hoa_don])}}" class="btn btn-warning a-btn-slide-text">
			        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			        <span><strong>Dừng thuê</strong></span>            
   				</a></td>
   				<td><a href="{{route('thanh_toan',['ma_hoa_don'=>$hoa_don->ma_hoa_don])}}" class="btn btn-success a-btn-slide-text">
			        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			        <span><strong>Thanh toán</strong></span>            
   				</a></td>
				
				@endif
			</tr>
		@endforeach
	</table>
	{{ $array_hoa_don->links() }}
@endsection
@push('js')

<script type="text/javascript">
	
</script>
@endpush