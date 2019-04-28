var main_cart = jQuery('tbody');

jQuery(document).ready(function($) {
    updateMainCart();

    jQuery(document).on('click', '.delete-item', function (event) {
        event.preventDefault();

        //get id
        var id = $(this).attr('data-id');

        //remove this item in cart
        removeCartItem(id);

        updateLocalStorageCart();

        updateMinicart();

        updateMainCart();
    });

    jQuery(document).on('click', '.delete-cart', function(event) {
        event.preventDefault();
        
        deleteCart();

        updateLocalStorageCart();

        updateMinicart();

        updateMainCart();
    });

    jQuery(document).on('change', '.item-quantity', function(event) {
        event.preventDefault();
        
        var item = $(this).parent().parent();

        var id = item.find('.product-id').text();
        var quantity = item.find('.product-quantity > input').val();

        if (!updateItemQuantity(id, quantity)) {
            alert('Số lượng tối thiểu có thể mua: 1\nSố lượng tối đa có thể mua: 10');
        }

        updateLocalStorageCart();

        updateMinicart();

        updateMainCart();
    });

});

function updateMainCart() {
    var totalItems = cart.length;

    if (totalItems == 0) {
        title = '<h3>Chưa có sản phẩm nào trong giỏ hàng của bạn.</h3>';
        message = '<p>Nhấn <a style="text-decoration: underline;" href="/">vào đây</a> để quay về trang chủ.</p>';
        jQuery('.cart-main-area > .container').html(title + message);
    } else {
        var items = '';

        cart.forEach(item => {
            items += '<tr>' +
                        '<td class="product-id hidden">' + item["id"] + '</td>' +
                        '<td class="product-thumbnail"><a href="/products/' + item["id"] + '"><img src="' + item["image"] + '" alt="product img"></a></td>' +
                        '<td class="product-name"><a href="/products/' + item["id"] + '">' + item["name"] + '</a></td>' +
                        '<td class="product-price"><span class="amount">' + item["price"].format() + 'đ</span></td>' +
                        '<td class="product-quantity"><input class="item-quantity" type="number" value="' + item["quantity"] + '"></td>' +
                        '<td class="product-subtotal">' + (item["price"] * item["quantity"]).format() + 'đ</td>' +
                        '<td class="product-remove"><a class="delete-item" href="#" data-id="' + item["id"] + '">X</a></td>' +
                    '</tr>';
        });
        
        main_cart.html(items);

        jQuery('.cart_total').html(calculateSubtotal().format() + ' VNĐ');
    }
}

function deleteCart() {
    cart = [];
}

function updateItemQuantity(id, quantity) {
    for(i = 0; i < cart.length; i++) {
        if (cart[i]['id'] == id) {
            if (isGreaterThan10(quantity) || isSmallerThan1(quantity)) {
                return false;
            } else {
                cart[i]['quantity'] = parseInt(quantity);
                return true;
            }
        }
    }
}