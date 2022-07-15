<?php $madal_test_drive = caleader_footer('modal_shortcode_modal_test_drive_content'); ?>
<div class="modal fade" id="modalAddTestDrive" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content ">
			<div class="modal-body modal-layout-dafault">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon-close"></span></button>
				<?php echo do_shortcode($madal_test_drive);?>
			</div>
		</div>
	</div>
</div>