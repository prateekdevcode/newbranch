<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
			<footer id="site-footer" role="contentinfo" class="header-footer-group">

				<div class="section-inner">

					<div class="footer-credits">

						<p class="footer-copyright">&copy;
							<?php
							echo date_i18n(
								/* translators: Copyright date format, see https://secure.php.net/date */
								_x( 'Y', 'copyright date format', 'twentytwenty' )
							);
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						</p><!-- .footer-copyright -->

						<p class="powered-by-wordpress">
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentytwenty' ) ); ?>">
								<?php _e( 'Powered by WordPress', 'twentytwenty' ); ?>
							</a>
						</p><!-- .powered-by-wordpress -->

					</div><!-- .footer-credits -->

					<a class="to-the-top" href="#site-header">
						<span class="to-the-top-long">
							<?php
							/* translators: %s: HTML character for up arrow */
							printf( __( 'To the top %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
						</span><!-- .to-the-top-long -->
						<span class="to-the-top-short">
							<?php
							/* translators: %s: HTML character for up arrow */
							printf( __( 'Up %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
						</span><!-- .to-the-top-short -->
					</a><!-- .to-the-top -->

				</div><!-- .section-inner -->

			</footer><!-- #site-footer -->
<script>

jQuery(function () {
            jQuery(".toc_list li a").on("click", function (e) {
                e.preventDefault();
                var o = jQuery(jQuery(this).attr("href")),
                    s = jQuery("header");
                jQuery("html, body").animate({ scrollTop: o.offset().top - s.height() + "px" }, 500);
            });
        });
jQuery(document).ready(function () {
    if (
        (jQuery(window).scroll(function () {
            jQuery(this).scrollTop() > 1
                ? (jQuery("header").addClass("sticky"), jQuery(window).width() > 991 && jQuery("header .top-header").slideUp(300))
                : (jQuery("header").removeClass("sticky"), jQuery(window).width() > 991 && jQuery("header .top-header").slideDown(300));
        }),
        jQuery(".global-header").hasClass("hb"))
    ) {
        jQuery(".global-header.hb").addClass("position-fixed"), jQuery("body").addClass("hb-body"), jQuery(".hb-body main").prepend('<div class="hb-space"></div>');
        var e = jQuery(".global-header.hb").outerHeight();
        jQuery(".hb-space").height(e).css("background-color", "#03143e");
    }
    jQuery(window).width() < 992 &&
        (jQuery("<i class='fas fa-chevron-down'></i>").insertAfter("header .dropdown .dropdown-toggle"),
        jQuery("<i class='fas fa-chevron-down'></i>").insertAfter("header .subdrop-down > a"),
        jQuery("header .fas.fa-chevron-down").on("click", function () {
            jQuery(this).toggleClass("active").next(".dropdown-menu").toggleClass("active").slideToggle();
        }),
        jQuery(document).click(function () {
            jQuery("header.global-header #navbar").on("click", function (e) {
                e.stopPropagation();
            }),
                jQuery("#navbar").hasClass("show") && jQuery("header.global-header .navbar-toggler").trigger("click");
        })),
		
        jQuery(function () {
            jQuery(".hero-go-to, .skip-btn, .skip-top, .ma-bar a, .service-clicks a, .toc_widget_list li a").on("click", function (e) {
                e.preventDefault();
                var o = jQuery(jQuery(this).attr("href")),
                    s = jQuery("header");
                jQuery("html, body").animate({ scrollTop: o.offset().top - s.height() + "px" }, 500);
            });
        });
    var o = 0;
    jQuery(window).scroll(function () {
        var e = jQuery(".about_us, .game-dc, .about-us-main").offset().top - window.innerHeight;
        0 == o &&
            jQuery(window).scrollTop() > e &&
            (jQuery(".counting").each(function () {
                var e = jQuery(this),
                    o = e.attr("data-count");
                jQuery({ countNum: e.text() }).animate(
                    { countNum: o },
                    {
                        duration: 2e3,
                        easing: "swing",
                        step: function () {
                            e.text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            e.text(this.countNum);
                        },
                    }
                );
            }),
            (o = 1));
    }),
        jQuery(window).width() < 1200 && jQuery(".case-study-slider").slick({ autoplay: !0, slidesToShow: 1, slidesToScroll: 1, arrows: !1, fade: !1, dots: !0, verticalSwiping: !1, vertical: !1, pauseOnFocus: !1, pauseOnHover: !1 }),
        jQuery(window).width() < 992 && jQuery(".case-study-sec:not(.wd-case) .case-thumb").empty(),
        jQuery(".testimonials-slider").slick({ autoplay: !0, slidesToShow: 1, slidesToScroll: 1, arrows: !1, dots: !0, pauseOnFocus: !1, pauseOnHover: !1 }),
        jQuery(".app-categories-slider").slick({
            autoplay: !0,
            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: !0,
            dots: !0,
            pauseOnFocus: !1,
            pauseOnHover: !1,
            responsive: [
                { breakpoint: 992, settings: { slidesToShow: 2, slidesToScroll: 2 } },
                { breakpoint: 576, settings: { slidesToShow: 1, slidesToScroll: 1 } },
            ],
        }),
        jQuery(".d-recent-slider").slick({
            autoplay: !0,
            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: !1,
            dots: !0,
            infinite: !0,
            pauseOnFocus: !1,
            pauseOnHover: !1,
            focusOnSelect: !1,
            responsive: [
                { breakpoint: 992, settings: { slidesToShow: 2, slidesToScroll: 2 } },
                { breakpoint: 576, settings: { slidesToShow: 1, slidesToScroll: 1 } },
            ],
        }),
        jQuery(".life-slider").slick({ autoplay: !0, slidesToShow: 1, slidesToScroll: 1, arrows: !0, dots: !0, infinite: !0, pauseOnFocus: !1, pauseOnHover: !1 }),
        $(".guaranteed-slider").slick({
            autoplay: !0,
            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: !1,
            dots: !0,
            infinite: !0,
            pauseOnFocus: !1,
            pauseOnHover: !1,
            focusOnSelect: !1,
            responsive: [
                { breakpoint: 992, settings: { slidesToShow: 2, slidesToScroll: 2 } },
                { breakpoint: 576, settings: { slidesToShow: 1, slidesToScroll: 1 } },
            ],
        });
    var s = 0;
    $(".need-box .need-box-content").each(function () {
        s = $(this).height() > s ? $(this).height() : s;
    }),
        $(".need-box .need-box-content").css("min-height", s + "px"),
        jQuery(function () {
            jQuery('[data-toggle="tooltip"]').tooltip();
        });
}),
    jQuery(window).width() > 1279 &&
        (!(function (e) {
            e.fn.visible = function (o) {
                var s = e(this),
                    i = e(window),
                    r = i.scrollTop(),
                    t = r + i.height(),
                    a = s.offset().top,
                    n = a + s.height();
                return (!0 === o ? a : n) <= t && (!0 === o ? n : a) >= r;
            };
        })(jQuery),
        jQuery(window).scroll(function (e) {
            jQuery(".mvp-services-box").each(function (e, o) {
                (o = jQuery(o)).visible(!0) ? o.addClass("active") : o.removeClass("active");
            });
        }));

</script>
		<?php wp_footer(); ?>

	</body>
</html>
