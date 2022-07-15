jQuery(function ($) {

	// the upload image button, saves the id and outputs a preview of the image
	var imageFrame;
	$(document).on('click','.meta_box_upload_image_button',function (event) {
		event.preventDefault();

		var options, attachment;

		$self = $(event.target);
		$div = $self.closest('div.meta_box_image');

		// if the frame already exists, open it
		if (imageFrame) {
			imageFrame.open();
			return;
		}

		// set our settings
		imageFrame = wp.media({
			title: 'Choose Image',
			multiple: false,
			library: {
				type: 'image'
			},
			button: {
				text: 'Use This Image'
			}
		});

		// set up our select handler
		imageFrame.on('select', function () {
			selection = imageFrame.state().get('selection');

			if (!selection)
				return;

			// loop through the selected files
			selection.each(function (attachment) {
				console.log(attachment);
				var src = attachment.attributes.sizes.full.url;
				var id = attachment.id;

				$div.find('.meta_box_preview_image').attr('src', src);
				$div.find('.meta_box_upload_image').val(id);
			});
		});

		// open the frame
		imageFrame.open();
	});

	// the remove image link, removes the image id from the hidden field and replaces the image preview
	$(document).on('click','.meta_box_clear_image_button',function () {
		var defaultImage = $(this).parent().siblings('.meta_box_default_image').text();
		$(this).parent().siblings('.meta_box_upload_image').val('');
		$(this).parent().siblings('.meta_box_preview_image').attr('src', defaultImage);
		return false;
	});

	// the file image button, saves the id and outputs the file name
	var fileFrame;
	$(document).on('click','.meta_box_upload_file_button',function (e) {
		e.preventDefault();

		var options, attachment;

		$self = $(event.target);
		$div = $self.closest('div.meta_box_file_stuff');

		// if the frame already exists, open it
		if (fileFrame) {
			fileFrame.open();
			return;
		}

		// set our settings
		fileFrame = wp.media({
			title: 'Choose File',
			multiple: false,
			library: {
				type: 'file'
			},
			button: {
				text: 'Use This File'
			}
		});

		// set up our select handler
		fileFrame.on('select', function () {
			selection = fileFrame.state().get('selection');

			if (!selection)
				return;

			// loop through the selected files
			selection.each(function (attachment) {
				console.log(attachment);
				var src = attachment.attributes.url;
				var id = attachment.id;

				$div.find('.meta_box_filename').text(src);
				$div.find('.meta_box_upload_file').val(src);
				$div.find('.meta_box_file').addClass('checked');
			});
		});

		// open the frame
		fileFrame.open();
	});

	// the remove image link, removes the image id from the hidden field and replaces the image preview
	$(document).on('click','.meta_box_clear_file_button',function () {
		$(this).parent().siblings('.meta_box_upload_file').val('');
		$(this).parent().siblings('.meta_box_filename').text('');
		$(this).parent().siblings('.meta_box_file').removeClass('checked');
		return false;
	});

	// function to create an array of input values
	function ids(inputs) {
		var a = [];
		for (var i = 0; i < inputs.length; i++) {
			a.push(inputs[i].val);
		}
		//$("span").text(a.join(" "));
	}
	// repeatable fields
	$(document).on('click', '.meta_box_repeatable_add', function () {
		// clone
		var row = $(this).closest('.meta_box_repeatable').find('> tbody > tr:last-child');
		var clone = row.clone();
		clone.find('select.chosen').removeAttr('style', '').removeAttr('id', '').removeClass('chzn-done').data('chosen', null).next().remove();
		clone.find('input.regular-text, textarea, select').val('');
		clone.find('input[type=checkbox], input[type=radio]').attr('checked', false);
		clone.find('.meta_box_repeatable > tbody > tr').not(':first').remove();
		row.after(clone);
		// increment name and id
		clone.find('> td > div > p > input, select,  > td > div > .wp-editor-wrap > .wp-editor-container > textarea')
			.attr('name', function (index, name) {
				return name.replace(/(\d+)(?!.*\d)/, function (fullMatch, n) {
					return Number(n) + 1;
				});
			})
			.attr('id', function (index, name) {
				return name.replace(/(\d+)(?!.*\d)/, function (fullMatch, n) {
					return Number(n) + 1;
				});
			});
		
		clone.find('textarea.wp-editor-area').each(function(){
			var _this = $(this);
			_this.parent().find(".mce-container").remove();
			_this.css({"display":"block"});
			console.log(_this.attr("id"));
			//wp.editor.remove(_this.attr("id"));
			$(document).ready(function(){	
				tinymce.execCommand( 'mceAddEditor', true, _this.attr("id") );
			})
			
			//wp.editor.initialize(_this.attr("id"), true);
		})
		//image reset
		
		clone.find('> td > div > .meta_box_image').each(function(){
			var defaultImage = $(this).find('.meta_box_default_image').text();
			$(this).find('.meta_box_upload_image').val('');
			$(this).find('.meta_box_preview_image').attr('src', defaultImage);
		})

		var _old_name = "";
		var _new_name = "";
		clone.find('> td > div > table[repeatable_name]')
			.attr('id', function (index, name) {
				return name.replace(/(\d+)(?!.*\d)/, function (fullMatch, n) {
					return Number(n) + 1;
				});
			})
			.attr('repeatable_name', function (index, name) {
				_old_name = $(this).attr('repeatable_name');
				_new_name = name.replace(/(\d+)(?!.*\d)/, function (fullMatch, n) {

					return Number(n) + 1;
				});
				return _new_name;
			})
		console.log(_old_name,_new_name)
		clone.find('> td > div > table[repeatable_name] [name]').each(function (i,val) {
			var _name = $(this).attr('name');
			$(this).attr("name",_name.replace(_old_name,_new_name));
			$(this).attr("id",_name.replace(_old_name,_new_name));
		})
		var arr = [];
		$('input.repeatable_id:text').each(function () { arr.push($(this).val()); });
		clone.find('input.repeatable_id')
			.val(Number(Math.max.apply(Math, arr)) + 1);
		if (!!$.prototype.chosen) {
			clone.find('select.chosen')
				.chosen({ allow_single_deselect: true });
		}
		//
		return false;
	});

	$(document).on('click', '.meta_box_repeatable_remove', function () {
		$(this).closest('tr').remove();
		return false;
	});

	$('.meta_box_repeatable tbody').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.hndle'
	});

	// post_drop_sort	
	$('.sort_list').sortable({
		connectWith: '.sort_list',
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		cancel: '.post_drop_sort_area_name',
		items: 'li:not(.post_drop_sort_area_name)',
		update: function (event, ui) {
			var result = $(this).sortable('toArray');
			var thisID = $(this).attr('id');
			$('.store-' + thisID).val(result)
		}
	});

	$('.sort_list').disableSelection();

	// turn select boxes into something magical
	if (!!$.prototype.chosen)
		$('.chosen').chosen({ allow_single_deselect: true });
});