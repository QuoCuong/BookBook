@switch ($order->status)
	@case('approved')
		<h4>Đơn hàng của bạn đã được chuyển đi</h4>
		@break
	@case('complete')
		<h4>Đơn hàng của bạn đã hoàn tất</h4>
		@break
	@case('cancelled')
		<h4>Đơn hàng của bạn đã hủy</h4>
		@break
	@default
@endswitch