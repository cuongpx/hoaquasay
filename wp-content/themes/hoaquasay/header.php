<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta name="google-site-verification" content="" />
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php //if(wp_title('', false)) { echo ' :'; } ?> <?php //bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/image/favicon-16x16.png" rel="shortcut icon">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!---->
		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>
		<!-- wrapper -->
	        <div id="wapper">
            <header id="site-header" class=""><!--header-->

				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="logo pull-left">
							<?php 
							if(is_home() ) :
								if ( function_exists( 'ot_get_option' ) ) :
									$logoSite = ot_get_option( 'logo_site');
								  
									if ( ! empty( $logoSite ) ) :
										
								?>
									<a href="<?php echo home_url();?>">
										<img src="<?php echo $logoSite ?>" alt="Hoa quả sấy" />
										<h1 style="text-indent:-9999px;height:1px;width:1px;position: absolute;">Hoa quả sấy</h1>
									</a>
									<?php else : ?>
									<a href="<?php echo home_url(); ?>">
										<img src="<?php bloginfo('template_directory'); ?>/image/logo-hoabinhfood.png" width="" alt="Hoa quả sấy hòa bình"/>
										<h1 style="text-indent:-9999px;height:1px;width:1px;position: absolute;">Hoa quả sấy</h1>
									</a>
									<?php endif; ?>
								<?php endif; ?>
								<?php else : ?>
								<a href="<?php bloginfo('url'); ?>">
									<img src="<?php bloginfo('template_directory'); ?>/image/logo-hoabinhfood.png" width="" alt="Hoa quả sấy hòa bình"/>
								</a>
							<?php endif; ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="frm-search">
								<form class="input-group pull-right" action="<?php echo home_url(); ?>" method="GET">
									<input id="frmSearch" type="search" class="form-control" placeholder="Tìm kiếm..." name="s"/>
									<span class="input-group-btn">
										<button id="frmSubmit" class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
									</span>
								</form>
							</div>
						</div>
						
						<div class="col-md-4">
							<?php
								sk_wcmenucart();
							?>
						</div>
					</div>
				</div>
				<div class="container">
					<nav id="site-navigation" class="" role="navigation">
						<?php 
							if ( has_nav_menu( 'main-menu' ) ) {
									wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false,'menu_class' => '' ) );
								}
						?>
					</nav>
				</div>
				
            </header>
			
		<div class="clear"></div>
			<section id="content" class="site-content"><!--Start content-->
			<?php /*if( is_home() ) : ?>
				<div class="banner">
					<!--<img src="<?php //bloginfo('template_directory'); ?>/image/hep-bao-quy-dau-banner.jpg" alt="Viêm bao quy đầu do đâu" width="" height=""/>-->
					<a target="_blank" href="<?php bloginfo('url'); ?>/uu-dai-kham-chua-bao-quy-dau-nhan-dip-ky-niem-61-nam-giai-phong-thu-do/">
					<img src="<?php bloginfo('template_directory'); ?>/image/phong-kham-nam-khoa-an-khang-giai-phong-thu-do.jpg" alt="Viêm bao quy đầu do đâu" width="" height=""/></a>
				</div>
			<?php endif; */?>
			<!-- /header -->
