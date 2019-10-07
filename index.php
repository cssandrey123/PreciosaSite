<div id="homepage">
	<!-- carousel slider start -->
	<div id="homepage-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#homepage-carousel" data-slide-to="0" class="active">			
			</li>

			<li data-target="#homepage-carousel" data-slide-to="1">		
			</li>

			<li data-target="#homepage-carousel" data-slide-to="2">			
			</li>

			<li data-target="#homepage-carousel" data-slide-to="3">			
			</li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active slide-item homepage-carousel-slide-1">
				<div class="carousel-caption text-center">
					<h2 class="animated fadeInDown">
						Bun venit la
					</h2>

					<h3 class="animated fadeInUp delay-1s">
						PRECIOSA
					</h3>
				</div>
			</div>

			<div class="item slide-item homepage-carousel-slide-2">
				<div class="carousel-caption text-center">
					<h2 class="animated slideInDown">
						Cauți o oază de liniște
					</h2>

					<h3 class="animated fadeInUp delay-1s">
						ALEGE CAMERA PREFERATĂ
					</h3>

					<a href="#vila">
						<button type="button" class="btn btn-secondary animated zoomInRight delay-2s">
							Află mai mult
						</button>
					</a>
				</div>
			</div>

			<div class="item slide-item homepage-carousel-slide-3">
				<div class="carousel-caption">
					<h2 class="animated slideInDown">
						Bucură-te de soare
					</h2>

					<h3 class="animated fadeInUp delay-1s">
						ÎN GRĂDINA NOASTRĂ DE VARĂ
					</h3>

					<a href="#terasa">
						<button type="button" class="btn btn-secondary animated slideInUp delay-2s">
							Află mai mult
						</button>
					</a>
				</div>
			</div>

			<div class="item slide-item homepage-carousel-slide-4">
				<div class="carousel-caption">
					<h2 class="animated slideInDown">
						Delectează-ți gusturile
					</h2>

					<h3 class="animated fadeInUp delay-1s">
						CU UN VIN DE CALITATE
					</h3>

					<a href="#crama">
						<button type="button" class="btn btn-secondary animated slideInUp delay-2s">
							Află mai mult
						</button>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- carousel slider end -->

	<!-- Services START -->
	<div class="container-fluid" id="pages">
		<div class="container">
			<div class="row">
				<?php if ($pages): ?>		
					<h1 class="text-center dancing-script-font">
						Vila Restaurant Preciosa
					</h1>

					<?php foreach ($pages as $page): ?>
						<div class="col-xs-12 col-sm-6">
							<div class="sidepanel" id="<?php echo xss_clean($page->slug); ?>">
								<h3>
									<?php echo xss_clean($page->page); ?>
								</h3>


								<a href="<?php echo base_url(); ?><?php echo $page->slug; ?>" class="sidepanel-image-container">
									<div class="sidepanel-image" style="background-image: url('<?php echo get_image_from_string($page->content); ?>');"></div>
								</a>

								<p>										
									<?php echo character_limiter(remove_image_from_string(cleanup_string($page->content)), 250, '...'); ?>											
								</p>

								<a href="<?php echo base_url(); ?><?php echo $page->slug; ?>" class="btn btn-danger center-block"
								title="<?php echo xss_clean($page->page); ?>">
									<?php echo lang('defaults_learn_more_link'); ?>
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</div>
					<?php endforeach; ?>			
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- Servicies END -->

	<!-- Book a room START -->
	<div class="container-fluid rooms-container" id="rooms">
		<div class="text-area">
			<h2 class="dancing-script-font">
				Vrei să te bucuri de tot farmecul orașului Alba Iulia? 
			</h2>
			<h3>
				Rezervă o cameră la Vila Preciosa și explorează fiecare străduță din orașul nostru.
			</h3>
			<br>
			<a href="booking-modal" data-target="#booking-modal" data-toggle="modal" class="btn btn-primary btn-lg">
				Rezervă o cameră
			</a>
		</div>
	</div>
	<!-- Book a room END -->

	<!-- Testimonial START -->
	<div id="testimonial" class="container">
		<div class="row">
			<h2 class="h2-as-h1 text-center dancing-script-font">
				<?php echo lang('testimonials_what_clients_say_label'); ?>
			</h2>

			<div class="owl-carousel owl-theme" id="testimonials-carousel">
				<?php foreach ($testimonials as $testimonial): ?>
					<div class="col-xs-12 col-centered">
						<div class="testimonial-container">
							<div class="testimonial-image-container">
								<div class="testimonial-image">
									<p>
										<?php echo get_first_letter_of_each_word(htmlentities(xss_clean($testimonial->name))); ?>
									</p>
								</div>
							</div>

							<div class="testimonial-text">
								<h2>
									<?php echo xss_clean($testimonial->name); ?>
								</h2>

								<p>
									<i class="fa fa-quote-left"></i>
									<?php
										echo
										word_censor(
											xss_clean($testimonial->testimonial),
											xss_clean($testimonial->setting_value)
										);
									?>			
									<i class="fa fa-quote-right"></i>
								</p>

								<br>

								<cite>
									<?php echo date($this->config->item('date_format'), $testimonial->date_created); ?>
								</cite>
							</div>

							<div class="testimonial-bottom-separator">
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			
			<div class="horizontal-separator"></div>
			
			<div class="col-xs-12 text-center">
				<a href="<?php echo base_url(); ?><?php echo TESTIMONIALS; ?>" class="btn btn-primary btn-lg">
					<?php echo lang('testimonials_view_all_testimonials_label'); ?>
				</a>
			</div>
		</div>
	</div>
	<!-- Testimonials END-->
	
	<!-- About us START-->
	<div class="white-background" id="about-us">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2 class="h2-as-h1 text-center dancing-script-font">
						<?php echo lang('defaults_about_us_label'); ?>
					</h2>
					
					<div class="col-xs-12 col-sm-6">
						<img src="<?php echo base_url(); ?>upload/images/about_us.jpg" class="img-responsive" alt="Despre noi">
					</div>

					<div class="col-xs-12 col-sm-6">
						<p>
							La numai câteva minute de centrul istoric și administrativ, te intampină cu caldură și rafinament una
							dintre cele mai elegante locații ale orasului Alba Iulia, <strong>Vila Restaurant Preciosa</strong>. 
							În imediata vecinătate a vilei regăsitți Cetatea Alba Carolina, cele doua Catedrale, Muzeul și Sala Unirii, 
							Traseul celor Trei Fortificatii, precum și alte monumente istorice.
						</p>
						<br>
						<p>
							Odată ajuns la Restaurantul Preciosa, te declari surprins de o eleganță discretă. Indiferent dacă sunteți
							în compania persoanei iubite sau ne-ați călcat pragul pentru o intâlnire de afaceri, la Preciosa veți fi
							răsfățati cu preparate alese din bucătăria autohtonă și internationalâ acompaniate de un vin de calitate,
							și o atmosferă pe măsură. Toate acestea vă vor face să descoperiți că trăiți cu adevarat momente... prețioase.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About us END-->
</div>