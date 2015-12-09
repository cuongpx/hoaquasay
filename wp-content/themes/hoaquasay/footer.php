<!-- footer -->
<div class="clear"></div>	
	</section><!--End content-->
        <div class="clear"></div>
            <footer id="site-footer"><!--Start site-footer-->
				<div class="container">
					<div class="row">
						<div class="col-md-6">
						<?php if( function_exists('ot_get_option')) : 
							$address_footer = ot_get_option( 'address_footer');
						?>
							<?php echo $address_footer;  ?>
						<?php endif; ?>
						</div>
						<div class="pull-right col-md-6">
							<?php if( function_exists('ot_get_option')) : 
								$coppyright_footer = ot_get_option( 'coppyright_footer');
							?>
							<?php echo $coppyright_footer;  ?>
						<?php endif; ?>
						</div>
					</div>
				</div>		
            </footer><!--End site-footer-->
		</div>
		<?php 
			if ( function_exists( 'ot_get_option' ) ) :
			$script = ot_get_option( 'script_id');
			if( !empty ( $script ) ) :
		?>
			<?php echo  $script; ?>
			
			<?php endif; ?>
		<?php endif; ?>
		<!-- /wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>
