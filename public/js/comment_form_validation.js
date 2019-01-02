$(document).ready(function ($) {
    $('#comment_form').validate({
        errorClass: 'help-block',
        errorElement: 'div',
        highlight: function(e) {
            jQuery(e).removeClass('border-red').addClass('border-red');
        },
        success: function(e) {
            jQuery(e).parent().children('input').removeClass('border-red');
            jQuery(e).parent().children('textarea').removeClass('border-red');
        },
        rules: {
            'rating_quality': {
                required: true
            },
            'rating_price': {
                required: true
            },
            'rating_value': {
                required: true
            },
            'nickname': {
                required: true,
                minlength: 3,
                maxlength: 20,
            },
            'title': {
                required: true,
                minlength: 6,
                maxlength: 60
            },
            'content': {
                required: true,
                minlength: 20,
                maxlength: 255
            }
        },
        messages: {
            'rating_quality': {
                required: 'Vui lòng đánh giá sản phẩm của chúng tôi. Cảm ơn!'
            },
            'rating_price': {
                required: 'Vui lòng đánh giá sản phẩm của chúng tôi. Cảm ơn!'
            },
            'rating_value': {
                required: 'Vui lòng đánh giá sản phẩm của chúng tôi. Cảm ơn!'
            },
            'nickname': {
                required: 'Vui lòng nhập biệt danh',
                minlength: 'Biệt danh phải có ít nhất 3 ký tự',
                maxlength: 'Biệt danh chỉ được tối đa 20 ký tự'
            },
            'title': {
                required: 'Vui lòng nhập tiêu đề',
                minlength: 'Tiêu đề phải có ít nhất 6 ký tự',
                maxlength: 'Tiêu đề chỉ được tối đa 60 ký tự'
            },
            'content': {
                required: 'Vui lòng nhập nhận xét của bạn',
                minlength: 'Nhận xét phải có ít nhất 20 ký tự',
                maxlength: 'Nhận xét chỉ được tối đa 255 ký tự'
            }
        }
    });
});
