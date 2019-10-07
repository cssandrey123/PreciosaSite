<div class="row">
	<div class="col-xs-12 col-sm-3">
		<h2>
			<?php echo lang('defaults_info_label'); ?>
		</h2>

		<?php $language = $this->db->escape($this->session->userdata('language')); ?>
		<?php $header_pages = $this->pages_model->get_level_one_header_pages($language); ?>
		<?php $footer_pages = $this->pages_model->get_footer_pages($language);?>

		<ul>
			<?php foreach ($header_pages as $header_page): ?>
				<li>
					<a href="<?php echo base_url() . $header_page->slug; ?>">
						<?php echo xss_clean($header_page->page); ?>
					</a>
				</li>
			<?php endforeach; ?>
		
			<?php foreach ($footer_pages as $footer_page): ?>
				<li>
					<a href="<?php echo base_url() . $footer_page->slug; ?>">
						<?php echo xss_clean($footer_page->page); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="col-xs-12 col-sm-3">
		<h2>
			<?php echo lang('newsletter_newsletter'); ?>
		</h2>
		
		<form action="<?php echo base_url(); ?><?php echo NEWSLETTER; ?>/subscribe" method="POST">
			<div class="input-group">				
				<input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>"
				placeholder="<?php echo lang('newsletter_email_label'); ?>" maxlength="50" required />

				<div class="recaptcha-holder"></div>
				
				<div class="input-group-btn">					
					<button type="submit" value="submit" class="btn-secondary">
						<i class="fa fa-envelope"></i>
					</button>
				</div>
			</div>
			
			<div class="form-group">
				<div class="checkbox">
					<label for="terms" class="tiny-text">
						<input type="checkbox" name="terms" id="terms" required>
						<?php echo lang('defaults_terms_acceptance_label'); ?>
					</label>
				</div>
			</div>
		</form>
	</div>
	
	<div class="col-xs-12 col-sm-3">
		<h2>
			<?php echo lang('contact_contact_label'); ?>
		</h2>

		<i class="fa fa-home"></i>
		<?php echo $this->config->item('address'); ?>
		
		<br>
		
		<i class="fa fa-phone-square"></i>
		<?php echo $this->config->item('phone_number_1'); ?>
		
		<br>
		
		<i class="fa fa-fax"></i>
		<?php echo $this->config->item('fax_number_1'); ?>
		
		<br>
		
		<i class="fa fa-phone"></i>
		<?php echo $this->config->item('mobile_phone_number_1'); ?>
		
		<br>
		
		<i class="fa fa-phone-square"></i>
		<?php echo $this->config->item('mobile_phone_number_2'); ?>
		
		<br>
	
		<i class=" fa fa-envelope-o "></i>
		<?php echo safe_mailto($this->config->item('primary_email')); ?>
	</div>
	
	<div class="col-xs-12 col-sm-3">
		<h2>
			<?php echo lang('defaults_social_media_label'); ?>
		</h2>
		
		<div class="footer-media">
			<a href="https://www.facebook.com/VilaRestaurantPreciosa" target="_blank">
				<i class="fa fa-facebook fa-2x"></i>
			</a>
			<a href="https://www.instagram.com/vilapreciosa/"target="_blank">
				<i class="fa fa-instagram fa-2x"></i>
			</a>
			<a href="https://www.tripadvisor.com/Hotel_Review-g315903-d2717695-Reviews-Vila_Preciosa-Alba_Iulia_Alba_County_Central_Romania_Transylvania.html" target="_blank">
				<i class="fa fa-tripadvisor fa-2x"></i>
			</a>
			<a href="https://www.booking.com/hotel/ro/vila-preciosa.ro.html?aid=318615;label=Romanian_Romania_RO_RO_29562110425-Zi3LSwfS3la5rnzVtxUdEAS217273061228%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap1t1%3Aneg%3Afi2643546179%3Atidsa-322307133553%3Alp1011789%3Ali%3Adec%3Adm;sid=78928363355783cf2dad48c0e3547357;dest_id=-1150871;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=total;sr_order=popularity;srepoch=1566929215;srpvid=fc967f5fad570099;type=total;ucfs=1&#hotelTmpl" target="_blank">
				<i class="fa fa-bold fa-2x"></i>
			</a>
		</div>
	</div>
</div>

<div id="booking-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="booking-modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				<div class="clear"></div>

				<?php $this->load->view('frontend/custom/booking'); ?>

			</div>		
		</div>
	</div>
</div>

<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">&nbsp;</h3>
    <a class="prev">&laquo;</a>
    <a class="next">&raquo;</a>
    <a class="close">&times;</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>

    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">&nbsp;</h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-primary next">
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>