var cart = JSON.parse(localStorage.cart);

jQuery(document).ready(function($) {
	updateYourOrder();

	var input_email = jQuery('.input-email');

	input_email.on('change', function(event) {
		event.preventDefault();

		email = input_email.val();
		
		$.ajax({
			url: '/api/v1/user/is_email_exists',
			type: 'POST',
			data: {
				email: email
			},
			success: function(response) {
				if (response == 'exists') {
					displayLoginRequest();
				} else {
					removeLoginRequest();
				}
			},
			error: function(xhr, message, error) {
				console.log(error);
			}
		});
	});

	jQuery(document).on('click', '.show-login', function(event) {
		event.preventDefault();
		
		jQuery('.showlogin').click();
	});
});

function updateYourOrder() {
	var items = '';

	cart.forEach(function(item, index) {
        items += '<li class="hidden">' +
        			'<input type="hidden" name="orderDetails[' + index + '][product_id]" value="' + item['id'] + '" />' +
        			'<input type="hidden" name="orderDetails[' + index + '][quantity]" value="' + item['quantity'] + '" />' +
        		'</li>' +
        		'<li>' + item['name'] + ' × ' + item['quantity'] + '<span>' + (item['price'] * item['quantity']).format() + 'đ</span></li>';
    });
	
	jQuery('.order_product').html(items);
	jQuery('.cart_subtotal').html(calculateSubtotal().format() + 'đ');
	jQuery('.cart_total').html(calculateSubtotal().format() + ' VNĐ');
}

function displayLoginRequest() {
	parent = jQuery('.input-email').parent();

	parent.find('.login-request').remove();
	parent.find('.has-error').remove();

	block = '<div class="login-request">' +
				'<p>Email của bạn đã được đăng ký. Vui lòng <a class="show-login" style="color: #e59285" href="#">đăng nhập</a> để việc thanh toán dễ dàng hơn.</p>' +
			'</div>';

	parent.append(block);
}

function removeLoginRequest() {
	parent = jQuery('.input-email').parent();

	parent.find('.login-request').remove();
	parent.find('.has-error').remove();
}