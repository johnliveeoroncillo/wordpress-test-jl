jQuery(document).ready(function($) {
    $('#carleaderreviewForm').submit(function(e) {


        e.preventDefault(); // cancel default behavior
        var datastring = $(this).serializeArray();
        datastring.push({ name: 'action', value: 'carleader_review_submit_ajax' });
        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: carleader_review_js_obj.carleader_review_ajax_url,
            data: datastring,
            success: function(data) {
                $('.tt-form-review').append("<p><strong>" + data + "</strong></p>");
                $('.leave-review-alert').addClass("leave-review-success");

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                $('.tt-form-review').append("<p><strong>" + carleader_review_js_obj.text_error + "</strong></p>");
                $('.leave-review-alert').addClass("leave-review-error");
            }
        });
        return false;

    })
    $('.send-review-by-star i').on('click', function(e) {
        $('.send-review-by-star i').removeClass('icon-star')
        var $index = $(this).data('value')
        $('#send-review-by-star-input').val($index)
        $('.send-review-by-star i').each(function(index, el) {
            if (index < $index)
                $(this).addClass('icon-star')

        });

    });


})