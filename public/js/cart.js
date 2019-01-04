Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

var cart = [];

if (!localStorage.cart) {
    localStorage.cart = cart;
} else {
    cart = JSON.parse(localStorage.cart);
}

jQuery().ready(function ($) {
    updateMinicart(cart);

    $(document).on('click', '.add-to-cart', function (event) {
        event.preventDefault();

        //get data from this element
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var quantity = $(this).attr('data-quantity');
        var price = $(this).attr('data-price');
        var image = $(this).attr('data-image');

        var item = {
            id: parseInt(id),
            name: name,
            quantity: parseInt(quantity),
            price: parseInt(price),
            image: image
        };

        //add the first item to the cart if the cart is empty
        if (isEmptyCart()) {
            addToCart(item);
        } else {
            //if the item already exists in the shopping cart, increase the quantity
            //else, add a new item to the shopping cart
            if (isItemExists(id)) {
                increaseItemQuantity(id, quantity);
            }
            else {
                addToCart(item);
            }
        }

        updateLocalStorageCart();

        updateMinicart();

        if (!isMinicartVisible()) {
            displayMinicart();
        }
    });

    $(document).on('click', '.delete-item', function (event) {
        event.preventDefault();

        //get id
        var id = $(this).attr('data-id');

        //remove this item in cart
        removeCartItem(id);

        updateLocalStorageCart();

        updateMinicart();
    });

    function updateMinicart() {
        var shopcart = $('.shopcart');
        var totalItems = cart.length;
        var subtotal = calculateSubtotal();

        //update cartbox quantity
        shopcart.find('.product_qun').html(totalItems);

        //update total items
        shopcart.find('.items-total > span:first-child').html(totalItems + ' sản phẩm');

        //update subtotal
        subtotal = subtotal.format();
        shopcart.find('.total_amount > span').html(subtotal + 'đ');

        if (totalItems == 0) {
            shopcart.find('.single__items > .miniproduct').html('');
            shopcart.find('.single__items > .miniproduct').css({
                height: 0
            });
            shopcart.find('.single__items').append('<p>Chưa có sản phẩm nào trong giỏ hàng của bạn.</p>');
            shopcart.find('.checkout').hide();
            shopcart.find('.cart').hide();
        } else {
            shopcart.find('.single__items > p').remove();
            shopcart.find('.single__items > .miniproduct').css({
                height: 300
            });
            shopcart.find('.checkout').show();
            shopcart.find('.cart').show();

            //update miniproduct
            items = '';
            cart.forEach(item => {
                items += '<div class="item01 d-flex">' +
                            '<div class="thumb">' +
                                '<a href="product-details.html"><img src="' + item['image'] + '" alt="product images"></a>' +
                            '</div>' +
                            '<div class="content">' +
                                '<h6><a href="/products/' + item['id'] + '">' + item['name'] + '</a></h6>' +
                                '<span class="prize">' + item['price'].format() + '</span>' +
                                '<div class="product_prize d-flex justify-content-between">' +
                                    '<span class="qun">Số lượng: ' + item['quantity'] + '</span>' +
                                    '<ul class="d-flex justify-content-end">' +
                                        '<li><a href="#"><i class="zmdi zmdi-delete delete-item" data-id="' + item['id'] + '"></i></a></li>' +
                                    '</ul>' +
                                '</div>' +
                            '</div>' +
                        '</div>';
            });

            shopcart.find('.miniproduct').html(items);
        }

    }

    function isEmptyCart(){
        if (cart.length == 0) {
            return true;
        }
        return false;
    }

    function addToCart(item) {
        cart.push(item);
    }

    function isItemExists(id) {
        for(i = 0; i < cart.length; i++) {
            if (cart[i]['id'] == id) {
                return true;
            }
        }
        return false;
    }

    function increaseItemQuantity(id, quantity) {
        for(i = 0; i < cart.length; i++) {
            if (cart[i]['id'] == id) {
                cart[i]['quantity'] += parseInt(quantity);
            }
        }
    }

    function updateLocalStorageCart() {
        localStorage.cart = JSON.stringify(cart);
    }

    function calculateSubtotal() {
        var subtotal = 0;

        cart.forEach(item => {
            subtotal += item['price'] * item['quantity'];
        });
        return subtotal;
    }

    function removeCartItem(id) {
        for(i = 0; i < cart.length; i++) {
            if (cart[i]['id'] == id) {
                cart.splice(i, 1);
            }
        }
    }

    function isMinicartVisible() {
        if ($('.block-minicart').hasClass('is-visible')) {
            return true;
        }
        return false;
    }

    function displayMinicart() {
        $('.block-minicart').addClass('is-visible');
    }
})
