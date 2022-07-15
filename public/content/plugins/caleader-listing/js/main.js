(function($) {
    "use strict";
    $(document).ready(function() {

        $('.select_ajax_mobile').on("change", function(e) {
            e.preventDefault();
            console.log("hello now")
            var val = $(this).val();
            var key = $(this).attr("name");
            var prevval = $(this).parent('.SumoSelect').prevAll();

            // $('.id_select_' + key).each(function() {
            //     var elem = $(this);
            //     elem[0].sumo.selectItem(val);
            // });

            console.log(key)

            var nextval = $(this).parents('.col-mobile-ajax').nextAll('.col-mobile-ajax').find('.SumoSelect');

            $.each(nextval, function(key, value) {

                var label = $(value.firstChild).data('label_sumo');

                $(value.firstChild).html('').append('<option disabled="disabled" selected="selected">' + label + '</option>');;
                $(value.firstChild)[0].sumo.disable();
                $(value.firstChild)[0].sumo.reload();
            });

            var nextvalother = $("select.id_select_"+key+".select_ajax").parent('.SumoSelect').nextAll();
            $.each(nextvalother, function(key, value) {
                var label = $(value.firstChild).data('label_sumo');
                $(value.firstChild).html('').append('<option disabled="disabled" selected="selected">' + label + '</option>');;
                $(value.firstChild)[0].sumo.disable();
                $(value.firstChild)[0].sumo.reload();
            });

            $.ajax({
                type: "POST",
                url: listing_obj.ajax_url,
                data: {
                    action: 'caleader_ajax_search',
                    value_select: val,
                    key_select: key,
                },
                success: function(res) {
                    var obj = JSON.parse(res)
                    var n = obj.next;
                    var c = obj.result;

                    $.each(obj, function(key, value) {
                        if (key == "next" || key == "result") {

                        } else {
                            if (n == "make" || n == "body_type") {
                                $('select.id_select_' + obj.next).each(function() {
                                    var elem = $(this);
                                    elem[0].sumo.add(key, value);
                                });
                            } else {
                                $('select.id_select_' + obj.next).each(function() {
                                    var elem = $(this);
                                    elem[0].sumo.add(value);
                                });
                            }

                        }
                    });
                    $('select.id_select_' + n).each(function() {
                        var elem = $(this);
                        elem[0].sumo.enable();
                    });
                    $('#home_post_count').html(c + "&nbsp;")
                    $('#home_post_count_mob').html(c + "&nbsp;")
                }
            });

        });

        $('.select_ajax').on("change", function(e) {
            e.preventDefault();
            console.log("hello again")
            var val = $(this).val();
            var key = $(this).attr("name");
            var prevval = $(this).parent('.SumoSelect').prevAll();
            console.log(prevval)
            $.each(prevval, function(key, value) {
                console.log(value)
            });

            var nextval = $(this).parent('.SumoSelect').nextAll();
            $.each(nextval, function(key, value) {
                var label = $(value.firstChild).data('label_sumo');
                $(value.firstChild).html('').append('<option disabled="disabled" selected="selected">' + label + '</option>');;
                $(value.firstChild)[0].sumo.disable();
                $(value.firstChild)[0].sumo.reload();
            });

            var nextvalother = $("select.id_select_"+key+".select_ajax_mobile").parents('.col-mobile-ajax').nextAll('.col-mobile-ajax').find('.SumoSelect');

            $.each(nextvalother, function(key, value) {

                var label = $(value.firstChild).data('label_sumo');

                $(value.firstChild).html('').append('<option disabled="disabled" selected="selected">' + label + '</option>');;
                $(value.firstChild)[0].sumo.disable();
                $(value.firstChild)[0].sumo.reload();
            });

            $.ajax({
                type: "POST",
                url: listing_obj.ajax_url,
                data: {
                    action: 'caleader_ajax_search',
                    value_select: val,
                    key_select: key,
                },
                success: function(res) {
                    var obj = JSON.parse(res)
                    var n = obj.next;
                    var c = obj.result;
                    const years = [];

                    $.each(obj, function(key, value) {
                        if (key == "next" || key == "result") {

                        } else {
                            if (n == "make" || n == "body_type") {
                                $('select.id_select_' + obj.next).each(function() {
                                    var elem = $(this);
                                    elem[0].sumo.add(key, value);
                                });
                            } else {
                                if (n === 'the_year') {
                                    years.push(value);
                                }
                                else { 
                                    $('select.id_select_' + obj.next).each(function() {
                                        var elem = $(this);
                                        elem[0].sumo.add(value);
                                    });
                                }
                            }
                        }
                    });
                    $('select.id_select_' + n).each(function() {
                        var elem = $(this);

                        if (n === 'the_year') {
                            years.reverse();
                            years.forEach(item => {
                                elem[0].sumo.add(item);
                            });
                        }
                        elem[0].sumo.enable();
                    });
                    $('#home_post_count').html(c + "&nbsp;")
                    $('#home_post_count_mob').html(c + "&nbsp;")
                }
            });

        });

        // $('.multiple_select_ajax').on("change", function(e) {
        //     e.preventDefault();
        //     var val = $(this).val();
        //     var key = $(this).attr("name");
            

        //     $.ajax({
        //         type: "POST",
        //         url: listing_obj.ajax_url,
        //         data: {
        //             action: 'caleader_multiple_ajax_search',
        //             value_select: val,
        //             key_select: key,
        //         },
        //         success: function(res) {
                   
        //             console.log(res);
                    
        //         }
        //     });

        // });


        $('.carleader-listings-ordering').on('change', '.tt-select', function() {
            $('.carleader-listings-ordering').submit();
        });

        $('.var-filter').on("click", function(e) {
            e.preventDefault();
            var val = $(this).data('var_filter');
            var key = $(this).data('var_name');
            var layout = $("#id_layout").val();
            $("#id_" + key + " :selected").each(function(i, selected) {
                if ($(this).val() == val) {
                    $("select option[value='" + val + "']").prop("selected", false); // to deselect that option from selectbox
                }
            });
            if (layout == 1) {
                $('#tt-filters-aside').submit();
            } else {
                $('#tt-filters-fullwidth').submit();
            }

        });

        $('.var-filter-price').on("click", function(e) {
            e.preventDefault();
            var layout = $("#id_layout").val();
            $('#minp').val('');
            $('#maxp').val('');
            $('#minp').removeAttr('name');
            $('#maxp').removeAttr('name');
            if (layout == 1) {
                $('#tt-filters-aside').submit();
            } else {
                $('#tt-filters-fullwidth').submit();
            }
        });

        $('.tt-filters-options').on('click', '.tt-quantity a', function(e) {
            if ($(e.target).hasClass('tt-grid-switch')) {
                var show = "list";
                $('.showclass').val('');
                $('.showclass').val(show);
            } else {
                var show = "grid";
                $('.showclass').val('');
                $('.showclass').val(show);
            };
        });
        $('#modalVideoProduct').on('show.bs.modal', function(e) {
            var relatedTarget = $(e.relatedTarget),
                attr = relatedTarget.attr('data-value'),
                attrPoster = relatedTarget.attr('data-poster'),
                attrType = relatedTarget.attr('data-type');
            console.log(attr);
            if (attrType === "youtube" || attrType === "vimeo" || attrType === undefined) {
                $('<iframe src="' + attr + '" allowfullscreen></iframe>').appendTo($(this).find('.modal-video-content'));
            };
            if (attrType === "video") {
                $('<div class="tt-video-block"><a href="#" class="link-video"></a><video class="movie" src="' + attr + '" poster="' + attrPoster + '" allowfullscreen></video></div>').appendTo($(this).find('.modal-video-content'));
            };
            ttVideoBlock();
        }).on('hidden.bs.modal', function() {
            $(this).find('.modal-video-content').empty();
        });

    });
    //video
    function ttVideoBlock() {
        $('.tt-video-block').on('click', function(e) {
            e.preventDefault();
            var myVideo = $(this).find('.movie')[0];
            if (myVideo.paused) {
                myVideo.play();
                $(this).addClass('play');
            } else {
                myVideo.pause();
                $(this).removeClass('play');
            }
        });
    };
})(jQuery);