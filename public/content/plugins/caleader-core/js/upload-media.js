jQuery(document).ready(function($) {
    $(document).on("click", ".button_add_new", function(e) {
        e.preventDefault();
        var widget_add_element = $(this).closest('.widget-inside');
        var clone_element = widget_add_element.find(".button_clone");
        widget_add_element.find(".button_add_container").append('<li style="margin-bottom:10px;">'+clone_element.html()+'</li>');
        var $new = widget_add_element.find(".button_add_container li:last-child");
        var $index = $new.index();
        $index++;
    });
    $(document).on("click", ".remove", function(e) {
        $(this).closest('.button_add_container').prev('p').find('input').trigger('change');
        $(this).closest('li').remove();
    });
});
