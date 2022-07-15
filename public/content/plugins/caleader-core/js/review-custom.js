(function($) {
    "use strict";

    $(document).ready(function() {


        var $ptPageContent = $('#tt-pageContent'),
            ptPortfolioMasonry = $ptPageContent.find('.pt-wrapper-masonry');
        var $grid = ptPortfolioMasonry.find('.pt-portfolio-content').isotope({
            itemSelector: '.element-item',
            layoutMode: 'masonry',
        });

        var ptAddItem = $('.ajax-more-posts-review');

        var page = $('.review-page-count').val();
        var nonce = $('.review-page-nonce').val();
        var review_post_per_page = $('.review-post-per-page').val();
        $('body').on('click', '.review-ajax-more', function() {
            var data = {
                'action': 'load_reviews_by_ajax',
                'page': page,
                'review_post_per_page': review_post_per_page,
                'security': nonce
            };

            $.post(ajax_object.ajax_url, data, function(response) {
                if (response != '') {
                    var $item = $(response);
                    $grid.append($item).isotope('appended', $item).isotope('layout');
                    page++;
                    $('.review-page-count').val(page);
                    $('.leave-review-section').addClass('leave-review-top-gap-continue');
                    $('.division-more-review-ajax').addClass('margin-more-review-ajax');
                } else {
                    $('.review-ajax-more').hide();
                    $('.leave-review-section').removeClass('leave-review-top-gap-continue');
                    $('.leave-review-section').addClass('leave-review-top-gap-last');

                }
            });
        });

    });

})(jQuery);




jQuery(document).ready(function($) {
    $('#carleaderreviewForm').submit(function(e) {


        e.preventDefault(); // cancel default behavior
        var datastring = $(this).serializeArray();
        datastring.push({ name: 'action', value: 'carleader_review_submit_ajax' });
        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_object.ajax_url,
            data: datastring,
            success: function(data) {
                $('.tt-form-review .leave-review-alert').append("<p>" + data + "</p>");
                $('.tt-form-review .leave-review-alert').addClass("success-review");
                $('#carleaderreviewForm').trigger("reset");

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('.tt-form-review .leave-review-alert').addClass("error-review");
                $('.tt-form-review .leave-review-alert').append("<p>" + textStatus + "</p>");
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
        return false;

    })
    $('.send-review-by-star i').on('click', function(e) {
        var $index = $(this).data('value')
        $('#send-review-by-star-input').val($index)
        $('.tt-rating-value').html($index + " " + ajax_object.star_text)
        $('.send-review-by-star i').each(function(index, el) {
            console.log(index + "   " + $index);
            if (index < $index) {
                $(this).addClass('icon-118669');
            } else {
                $(this).removeClass('icon-118669');
            }


        });

    });


})