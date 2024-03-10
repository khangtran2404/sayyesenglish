<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->
	<footer id="colophon" class="footer">
		<div class="container">
			<div class="main-footer">
				<div class="row custom-row">
					<div class="col-lg-2 col-md-12">
						<div class="logo-footer">
							<?php 
								if ( is_active_sidebar( 'widget-logo-footer-area' )) :
									dynamic_sidebar( 'widget-logo-footer-area' );
								endif;
								if ( has_nav_menu( 'footer' ) ) :?>
									<section class="social-icon-footer">
										<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
											<ul class="footer-navigation-wrapper">
												<?php
												wp_nav_menu(
													array(
														'theme_location' => 'footer',
														'items_wrap'     => '%3$s',
														'container'      => false,
														'depth'          => 1,
														'link_before'    => '<span>',
														'link_after'     => '</span>',
														'fallback_cb'    => false,
													)
												);
												?>
											</ul><!-- .footer-navigation-wrapper -->
										</nav><!-- .footer-navigation -->
									</section>
								<?php endif;
							?>
						</div>
					</div>
					<div class="col-lg-7 col-md-12">
						<div class="information">
							<?php
								if ( is_active_sidebar( 'sidebar-1' )) :
									dynamic_sidebar( 'sidebar-1' );
								endif;
							?>
						</div>
					</div>
					<div class="col-lg-3 col-md-12">
						<div class="instagram-footer">
							<?php
								if ( is_active_sidebar( 'widget-instagram-area' )) :
									dynamic_sidebar( 'widget-instagram-area' );
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright-footer">
				<p class="copyright"><?= __('© 2022 Volcano Creative All right reserved.','volcano');?></p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<div class="scroll-top"><img src="<?= DF_IMAGE.'/arrow-left.png';?>" alt="icon-scroll-top"></div>
<script>wow = new WOW({boxClass: 'wow', animateClass: 'animated', offset: 0, mobile: false, live: true}); wow.init(); AOS.init();</script>
</body>
</html>
