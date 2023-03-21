<?php
/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$is_editor = isset( $_GET['elementor-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$footer_class = did_action( 'elementor/loaded' ) ? esc_attr( hello_get_footer_layout_class() ) : '';
$footer_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-2',
	'fallback_cb' => false,
	'echo' => false,
] );
?>
<footer id="site-footer" class="site-footer dynamic-footer <?php echo esc_attr( $footer_class ); ?>" role="contentinfo">
<div class="container">
                <div class="tfc_footer">
                    <div class="tfc_footer_information">
                    <?php dynamic_sidebar( 'content-widget-area' ); ?> 
                </div>
                    <div class="tfc_footer_information">
                        <?php dynamic_sidebar('widget-area');?>
                    </div>
                    <div class="tfc_footer_information">
                        <?php dynamic_sidebar('widget-area-blog');?>
                    </div>
                    <div class="tfc_footer_information">
                        <h2 class="tfc_footer_title">NEWSLETTER SIGN UP</h2>
                        <p class="tfc_footer_content">Sign up for exclusive updates,new arrivals & insider only
                            discounts</p>
                        <form>
                            <input type="email" id="emails" class="tfc_email" name="emails"
                                placeholder="enter email address..">
                            <button class="tfc_email_btn"><a href="#">SUBMIT</a></button>
                        </form>
                        <div class="tfc_footer_icon">
                            <div class="tfc_icon_div"><a href="#"><i class="fa-brands fa-facebook"></i></a></div>
                            <div class="tfc_icon_div"><a href="#"><i class="fa-brands fa-instagram"></i></a></div>
                            <div class="tfc_icon_div"><a href="#"><i class="fa-brands fa-pinterest"></i></a></div>
                            <div class="tfc_icon_div"><a href="#"><i class="fa-brands fa-tiktok"></i></a></div>
                            <div class="tfc_icon_div"><a href="#"><i class="fa-brands fa-youtube"></i></a></div>
                            <div class="tfc_icon_div"><a href="#"><i class="fa-brands fa-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="tfc_footer_card">
                    <div class="tfc_footer_rights">
                        <p class="tfc_footer_para">Dial A Crate All Rights Reserved.</p>
                    </div>
                    <div class="tfc_footer_payment_card">
                        <div class="tfc_card_box"><a href="#"><img class="tfc_card" src="images/Vector(9).png" alt=""></a></div>
                        <div class="tfc_card_box"><a href="#"><img class="tfc_card" src="images/card_master.png" alt=""></a></div>
                        <div class="tfc_card_box"><a href="#"><img class="tfc_card" src="images/Vector (5).png" alt=""></a></div>
                        <div class="tfc_card_box"><a href="#"><img class="tfc_card" src="images/Vector (6).png" alt=""></a></div>
                        <div class="tfc_card_box"><a href="#"><img class="tfc_card" src="images/download (1).png" alt=""></a></div>
                        <div class="tfc_card_box"><a href="#"><img class="tfc_card" src="images/download (2).png" alt=""></a></div>
                    </div>
                </div>
            </div>
</footer>


