<?php get_header(); ?>
	<main role="main">
		<div class="container">
			<div class="pull-left main-container">
				<div class="slider">
				<style>
					.slider{margin:28px 0}
				</style>
				<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
				  <!-- Indicators -->
				  
				  <ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
					<div class="item active"> 
					<img src="<?php bloginfo('template_directory') ?>/image/phong-kham-nam-khoa-an-khang-giai-phong-thu-do.jpg" style="width:100%;height:328px" alt="First slide">
					  <div class="container">
						<div class="carousel-caption">
						  <h1>Slide 1</h1>
						  <p>Aenean a rutrum nulla. Vestibulum a arcu at nisi tristique pretium.</p>
						  <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
						</div>
					  </div>
					</div>
					<div class="item"> <img src="http://lorempixel.com/1200/400/people" style="width:100%;height:328px" data-src="" alt="Second    slide">
					  <div class="container">
						<div class="carousel-caption">
						  <h1>Slide 2</h1>
						  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae egestas purus. </p>
						  <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
						</div>
					  </div>
					</div>
					<div class="item"> <img src="http://lorempixel.com/1200/400/abstract" style="width:100%;height:328px" data-src="" alt="Third slide">
					  <div class="container">
						<div class="carousel-caption">
						  <h1>Slide 3</h1>
						  <p>Donec sit amet mi imperdiet mauris viverra accumsan ut at libero.</p>
						  <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
						</div>
					  </div>
					</div>
				  </div>
				  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				  <span><i class="fa fa-chevron-left fa-2x"></i></span></a> 
				  <a class="right carousel-control" href="#myCarousel" data-slide="next">
				  <span><i class="fa fa-chevron-right fa-2x"></i></span></a> 
				  </div>
				</div>
				<div class="main-product">
					<h2 class="pro-title">Hoa quả sấy giòn</h2>
					<?php echo do_shortcode("[product_category category='hoa-qua-say-gion' per_page='6' columns='3' orderby='date' order='desc']"); ?>
				</div>
				<div class="main-product">
					<h2 class="pro-title">Hoa quả sấy dẻo</h2>
					<?php echo do_shortcode("[product_category category='hoa-qua-say-deo' per_page='6' columns='3' orderby='date' order='desc']"); ?>
				</div>
			</div>

			<?php get_sidebar(); ?>
		</div>
		<div class="clear"></div>
	</main>
<?php get_footer(); ?>
