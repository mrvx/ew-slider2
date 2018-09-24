<?php
	function ew_slider_shortcode( $atts, $content = null ) {
		$args = array(
			'post_type'      => 'slaidid',
			'posts_per_page' => 10,
			'orderby'        => 'post_date',
			'order'          => 'DESC'
		); ?>
		<?php
		/* The Query */
		$the_query = new WP_Query( $args ); ?>


        <div class="outer-vx relative">
			<?php if ( get_field( "taustapilt", "option" ) ) { ?>
            <div class="one--bg-img" style="background-image: url('<?php the_field( "taustapilt", "option" ); ?>');">

                <div class="overlay none on-<?php if ( get_field( "labipaistev_kiht", "option" ) ) { ?><?php the_field( "labipaistev_kiht", "option" );
				} ?>" style="
				<?php if ( get_field( "labipaistva_kihi_varv", "option" ) ) { ?> background-color: <?php the_field( "labipaistva_kihi_varv", "option" ); ?> ; <?php } ?>
				<?php if ( get_field( "labipaistvus", "option" ) ) { ?> opacity: <?php the_field( "labipaistvus", "option" ); ?> ; <?php } ?>
                        ">
                </div>


                <div class="vx-slider owl-theme slider-container owl-carousel flex full-width full-height"
                     data-speed="<?php the_field( 'slaidi_vahetamise_kiirus', 'option' ); ?>"
                     data-dots="<?php the_field( 'luba_slaidivahetus_nupud', 'option' ); ?>"
                     data-arrows="<?php the_field( 'luba_slaidivahetus_nooled', 'option' ); ?>">

					<?php // The Loop
						if ( $the_query->have_posts() ) {
							while ( $the_query->have_posts() ) {
								$the_query->the_post(); ?>

                                <div class="item">

                                    <div class="descWrapper--text-only full-width" style="
									<?php if ( get_field( "teksti_ala_laius", "option" ) ) { ?> max-width: <?php  the_field("teksti_ala_laius","option");?>px; <?php } ?>
                                            ">
                                        <div class="description--text-only absolute color-white <?php if ( get_field( 'teksti_joondus' ) ) {
											the_field( 'teksti_joondus' );
										} ?>">
                                            <div class="inner--text-only">
												<?php if ( get_field( 'tekst_pildil' ) ) {
													the_field( 'tekst_pildil' );
												} ?>
                                            </div>
                                        </div>
                                    </div>


                                </div>

							<?php }
						} else {
							// no posts found
						} ?>

                </div>
            </div>

				<?php } else { ?>
            <div class="vx-slider owl-theme slider-container owl-carousel flex full-width full-height"
                 data-speed="<?php the_field( 'slaidi_vahetamise_kiirus', 'option' ); ?>"
                 data-dots="<?php the_field( 'luba_slaidivahetus_nupud', 'option' ); ?>"
                 data-arrows="<?php the_field( 'luba_slaidivahetus_nooled', 'option' ); ?>">

				<?php // The Loop
					if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
					$the_query->the_post(); ?>

				<?php if ( get_field( "slaidi_link" ) ) { ?>
                <a href="<?php the_field( 'slaidi_link' ) ?>" target="<?php the_field( 'sihtkoht' ); ?>"
                   class="item link pointer">
					<?php } else { ?>
                    <div class="item">
						<?php } ?>
                        <div class="owl-img " style="background-image: url('<?php the_field( "pilt" ); ?>');
						<?php if ( get_field( "pildi_joondus" ) ) { ?> background-position: <?php  the_field( "pildi_joondus" ); ?> ; <?php } ?>
						<?php if ( get_field( "slaideri_korgus", "option" ) ) { ?> padding-bottom: <?php  the_field("slaideri_korgus","option");?>%; <?php } ?>
                                ">
                                <div class="overlay none on-<?php if ( get_field( "pildi_joondus" ) ) { ?><?php the_field( "labipaistev_kiht" );
								} ?>" style="
								<?php if ( get_field( "labipaistva_kihi_varv" ) ) { ?> background-color: <?php the_field( "labipaistva_kihi_varv" ); ?> ; <?php } ?>
								<?php if ( get_field( "labipaistvus" ) ) { ?> opacity: <?php the_field( "labipaistvus" ); ?> ; <?php } ?>
                                        "></div>

                            <div class="descWrapper" style="
							<?php if ( get_field( "teksti_ala_laius", "option" ) ) { ?> max-width: <?php  the_field("teksti_ala_laius","option");?>px; <?php } ?>
                                    ">
                                <div class="description absolute <?php if ( get_field( 'teksti_joondus' ) ) {
									the_field( 'teksti_joondus' );
								} ?>">
                                    <div class="inner">
										<?php if ( get_field( 'tekst_pildil' ) ) {
											the_field( 'tekst_pildil' );
										} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php if ( get_field( "slaidi_link" ) ) { ?>
                </a>


				<?php } else { ?>
            </div>
		<?php } ?>
		<?php }
			} else {
			// no posts found
		} ?>
        </div>

        </div>
		<?php
		/* Restore original Post Data */
		wp_reset_postdata(); ?>
	<?php } ?>
		<?php function start_slider() { ?>
            <script>
                jQuery(document).ready(function ($) {
                    var owlSlider = $('.owl-carousel');
                    var slideSpeed = $(owlSlider).attr('data-speed');
                    var slideDots = $(owlSlider).attr('data-dots');
                    var slideArrows = $(owlSlider).attr('data-arrows');
                    $(owlSlider).owlCarousel({
                        /*items: 1,*/
                        autoplay: true,
                        loop: true,
                        singleItem: true,
                        autoplayTimeout: slideSpeed == "" ? "10000" : slideSpeed,
                        /*slideSpeed : 300,*/
                        items: 1,
                        paginationSpeed: 400,
                        autoPlay: 3000,
                        stopOnHover: true,
                        nav: slideArrows == "" ? false : true,
                        dots: slideDots == "" ? false : true,
                        /*  paginationSpeed : 1000,
						goToFirstSpeed : 2000,*/
                        autoHeight: true,
                        autoPlay: true,
                        singleItem: true,
                        animateOut: 'fadeOut',
                        animateIn: 'fadeIn'
                    });
                });
            </script>
			<?php
		}
	}

	add_action( 'wp_footer', 'start_slider' ); ?>
<?php add_shortcode( 'ew_slider', 'ew_slider_shortcode' ); ?>