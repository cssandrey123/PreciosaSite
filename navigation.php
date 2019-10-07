<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navigation-bar">
	<div class="container">
		<div class="row">
			<div class="navbar-header">
				<a href="<?php echo base_url(); ?>" class="navbar-brand">
					<img src="<?php echo base_url(); ?>assets/images/logo_xs.svg" width="120" class="img-responsive">
				</a>

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-frontend" onclick="navbarColorChange()">
					<i class="fa fa-bars"></i>
				</button>
			</div>

			<div class="navbar-inner">
				<div class="collapse navbar-collapse" id="navbar-collapse-frontend">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="<?php echo base_url(); ?>">
								<i class="fa fa-home"></i>
								<?php echo lang('defaults_link_home'); ?>
							</a>
						</li>
						
						<?php $language = $this->db->escape($this->session->userdata('language')); ?>
						<?php $rows = $this->pages_model->build_header_navigation($language); ?>

						<?php if ($rows): ?>
							<?php global $menu_items; ?>
							<?php global $parent_menu_ids; ?>
							<?php foreach ($rows as $parent_id): ?>
								<?php $parent_menu_ids[] = $parent_id['parent_id']; ?>
							<?php endforeach; ?>

							<?php $menu_items = $rows; ?>

							<?php function build_pages_navigation($parent) { ?>
								<?php $has_children = false; ?>
								<?php global $menu_items; ?>
								<?php global $parent_menu_ids; ?>

								<?php foreach ($menu_items as $key => $value): ?>
									<?php if ($value['parent_id'] == $parent): ?>
										<?php if ($has_children === false): ?>
											<?php $has_children = true; ?>
											<?php if ($parent != 0): ?>
												<ul class="dropdown-menu"id="dropdownMenu">
											<?php endif; ?>
										<?php endif; ?>

										<?php if ($value['parent_id'] == 0 && in_array($value['page_id'], $parent_menu_ids)): ?>
											<li class="dropdown">
												<a class="dropdown-toggle" data-toggle="dropdown" href="#">
													<?php echo xss_clean($value['page']); ?>
												</a>
										<?php elseif ($value['parent_id'] != 0 && in_array($value['page_id'], $parent_menu_ids)): ?>
											<li class="dropdown-submenu">
												<a href="#">
													<?php echo xss_clean($value['page']); ?>
												</a>
										<?php else: ?>
											<li>
												<a href="<?php echo base_url(); ?><?php echo $value['slug']; ?>">
													<?php echo xss_clean($value['page']); ?>
												</a>
										<?php endif; ?>
										<?php build_pages_navigation($value['page_id']); ?>
										</li>										
										

									<?php endif; ?>
								<?php endforeach; ?>

								<?php if ($has_children === true): ?>
									
									 <li class="hidden-xs hidden-sm" id="nav-search-item">
										<form class="navbar-form" action="<?php echo base_url(); ?>search" method="POST" role="search" class="search-form">
											<div class="input-group" id="nav-search">
												<input type="text" name="search_term" class="form-control" id=""
												placeholder="<?php echo lang('defaults_search_term_label'); ?>" maxlength="255" pattern=".{3,}" required >

												<div class="input-group-btn">
													<button type="submit" name="search" value="search">
														<i class="glyphicon glyphicon-search"></i>
													</button>
												</div>
											</div>
										</form>
									</li> 
									</ul>
								<?php endif; ?>
							<?php } ?>
							<?php build_pages_navigation(0); ?>						
						<?php endif; ?>

					<!--</ul>-->

					<?php $multilingual_site = $this->settings_model->get_setting('multilingual_site'); ?>
					<?php $languages = $this->settings_model->get_setting('languages'); ?>

					<?php if ($multilingual_site->setting_value == 1 OR $this->tank_auth->is_logged_in()): ?>
						<ul class="navbar-nav no-li visible-xs visible-sm">	
							<?php if ($multilingual_site->setting_value == 1): ?>
								<li class="dropdown">			
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="fa fa-globe"></i>
										<?php echo ucfirst($this->session->userdata('language')); ?>
										<i class="fa fa-angle-down"></i>
									</a>

									<ul class="dropdown-menu">
										<?php foreach (explode(',', $languages->setting_value) as $website_language): ?>
											<li>
												<a href="<?php echo base_url() . 'language/' . $website_language; ?>">
													<img src="<?php echo base_url(); ?>assets/images/<?php echo $website_language; ?>_flag.svg">
													<?php echo ucfirst($website_language); ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>			
								</li>
							<?php endif; ?>

							<?php if ($this->tank_auth->is_logged_in()): ?>		
								<li class="dropdown">	
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="fa fa-user-circle-o"></i>
										<?php echo lang('users_label_my_account'); ?>
										<i class="fa fa-angle-down"></i>
									</a>

									<ul class="dropdown-menu">
										<li>
											<a href="<?php echo base_url(); ?>">
												<i class="fa fa-home"></i>
												<?php echo lang('defaults_link_home'); ?>
											</a>
										</li>
										
										<?php if (user_level(1)): ?>
											<li>
												<a href="<?php echo base_url(); ?>admin">
													<i class="fa fa-cog"></i>
													<?php echo lang('users_title_admin_dashboard'); ?>
												</a>
											</li>
										<?php endif; ?>

										<li>
											<a href="<?php echo base_url(); ?><?php echo USERS; ?>">
												<i class="fa fa-user"></i>
												<?php echo lang('users_title_user_dashboard'); ?>
											</a>
										</li>				

										<li>
											<a href="<?php echo base_url(); ?><?php echo USERS; ?>/logout">
												<i class="fa fa-power-off"></i>
												<?php echo lang('users_link_logout'); ?>
											</a>
										</li>			
									</ul>			
								</li>
							<?php endif; ?>	
						</ul>
					<?php endif; ?>

					<div class="visible-xs visible-sm">
						<form action="<?php echo base_url(); ?>search" method="POST" role="search" id="search_product_form_mobile" >
							<div class="input-group">
								<input type="text" name="search_term" class="form-control" id="search_product_mobile"
								placeholder="Caută un produs" maxlength="255" pattern=".{3,}" required>

								<div class="input-group-btn">
									<button type="submit" name="search" value="search" class="btn-secondary">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</div>
							</div>
						</form>

						<div class="horizontal-separator"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>

