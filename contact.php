<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1>
				<?php echo lang('contact_contact_label'); ?>
			</h1>
		</div>

		<div class="col-xs-12 col-sm-4">
			<div class="white-block">
				<div id="contact-table">
					<table class="table">
						<tbody>
							<tr>
								<td colspan="3">
									<h3>
										<?php echo $this->config->item('website_name'); ?>
									</h3>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									&nbsp;
								</td>
							</tr>
							
							<tr>
								<td width="1%">
									<i class="fa fa-map-marker"></i>
								</td>
								<td>
									<?php echo $this->config->item('address'); ?>
								</td>
							</tr>
							<tr>
								<td width="1%">
									<i class="fa fa-phone-square"></i>
								</td>

								<td>
									<?php echo $this->config->item('phone_number_1'); ?>
								</td>
							</tr>
							<tr>
								<td width="1%">
									<i class="fa fa-fax"></i>
								</td>

								<td>
									<?php echo $this->config->item('fax_number_1'); ?>
								</td>
							</tr>
							<tr>
								<td width="1%">
									<i class="fa fa-phone"></i>
								</td>

								<td>
									<?php echo $this->config->item('mobile_phone_number_1'); ?>
								</td>
							</tr>
							<tr>
								<td width="1%">
									<i class="fa fa-phone"></i>
								</td>

								<td>
									<?php echo $this->config->item('mobile_phone_number_2'); ?>
								</td>
							</tr>
							<tr>
								<td width="1%">
								</td>
								<td colspan="2">
									<a href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $this->config->item('google_maps_lat'); ?>,<?php echo $this->config->item('google_maps_long'); ?>"
									target="_blank" class="btn btn-primary btn-xs">
										<i class="glyphicon glyphicon-globe"></i>
										<?php echo lang('contact_get_directions_label'); ?>
									</a>
								</td>
							</tr>							
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-8">
			<div class="white-block">
				<h2>
					<?php echo lang('contact_heading_contact_form'); ?>
				</h2>

				<form action="<?php echo base_url(); ?>send-email" method="POST">
					<div class="form-group">
						<input type="text" name="name" id="name" value="<?php echo $this->session->flashdata('name'); ?>"
						placeholder="<?php echo lang('contact_name_label'); ?>" maxlength="50" required />

						<span class="form-response">
							<?php echo form_error('name'); ?>
						</span>
					</div>

					<div class="form-group">
						<input type="email" name="email" id="email" value="<?php echo $this->session->flashdata('email'); ?>"
						placeholder="<?php echo lang('contact_email_label'); ?>" maxlength="50" required />

						<span class="form-response">
							<?php echo form_error('email'); ?>
						</span>
					</div>

					<div class="form-group">
						<input type="text" name="phone" id="phone" value="<?php echo $this->session->flashdata('phone'); ?>"
						placeholder="<?php echo lang('contact_phone_label'); ?>" maxlength="30" />

						<span class="form-response">
							<?php echo form_error('phone'); ?>
						</span>
					</div>

					<div class="form-group">
						<textarea name="message" id="message" placeholder="<?php echo lang('contact_message_label'); ?>" rows="5" required><?php echo $this->session->flashdata('contact_message'); ?></textarea>

						<span class="form-response">
							<?php echo form_error('message'); ?>
						</span>
					</div>

					<div class="checkbox">
						<label for="terms">
							<input type="checkbox" name="terms" id="terms" required>
							<?php echo lang('defaults_terms_acceptance_label'); ?>
						</label>
					</div>

					<div class="recaptcha-holder"></div>

					<button type="submit" name="submit">
						<i class="fa fa-envelope"></i>
						<?php echo lang('contact_submit_label'); ?>
					</button>
				</form>
			</div>
		</div>

		<div class="clear"></div>
		<div class="horizontal-separator"></div>
		<div class="horizontal-separator"></div>
	</div>
</div>

<script>
	/* <![CDATA[ */
	jQuery(document).ready(function ($) {
		'use strict';
		// Google maps init
		var locations = [
			['\
				<img src="<?php echo base_url(); ?>assets/images/logo.svg" width="140"><br>\n' +
				'<b><?php echo $this->config->item('website_name'); ?></b><br>\n' +
				'<i class="fa fa-home"></i> <?php echo $this->config->item('address'); ?> <br>\n',
				<?php echo $this->config->item('google_maps_lat'); ?>,
				<?php echo $this->config->item('google_maps_long'); ?>,
				<?php echo $this->config->item('google_maps_zoom'); ?>
			]
		];

		var style = [
			{"featureType": "road",
				"elementType":
						"labels.icon",
				"stylers": [
					{"saturation": 1},
					{"gamma": 1},
					{"visibility": "on"},
					{"hue": "#e6ff00"}
				]
			},
			{"elementType": "geometry", "stylers": [
					{"saturation": 0}
				]
			}
		];

		var map = new google.maps.Map(document.getElementById('map-canvas'), {
			// Set the center of the map
			center: new google.maps.LatLng(<?php echo $this->config->item('google_maps_lat'); ?>, <?php echo $this->config->item('google_maps_long'); ?>),
			// Map style and zoom level
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			zoom: <?php echo $this->config->item('google_maps_zoom'); ?>,
			// Background color
			backgroundColor: "#FFFFFF"/*,*/
			// Remove all controls excep zoom
			/*
			panControl: true,
			zoomControl: true,
			mapTypeControl: true,
			scaleControl: true,
			streetViewControl: true,
			overviewMapControl: true,
			scrollwheel: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL
			}
			*/
		});

		var mapType = new google.maps.StyledMapType(style, {name: "Grayscale"});
		map.mapTypes.set('grey', mapType);
		map.setMapTypeId('grey');

		var infowindow = new google.maps.InfoWindow();

		//CREATE A CUSTOM PIN ICON
		var marker_image = '<?php echo base_url(); ?>assets/images/map_marker.svg';
		var pinIcon = new google.maps.MarkerImage(marker_image, null, null, null, new google.maps.Size(60, 60));

		var marker, i;

		marker = new google.maps.Marker({
			position: new google.maps.LatLng(<?php echo $this->config->item('google_maps_lat'); ?>, <?php echo $this->config->item('google_maps_long'); ?>),
			map: map,
			icon: pinIcon
		});

		for (i = 0; i < locations.length; i++) {
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(locations[i][1], locations[i][2]),
				map: map,
				icon: pinIcon
			});

			google.maps.event.addListener(marker, 'click', (function (marker, i) {
				return function () {
					infowindow.setContent(locations[i][0]);
					infowindow.open(map, marker);
				};
			})(marker, i));
		};
	});
	/* ]]> */
</script>

<div id="map-canvas"></div>