<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive

 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */


?>
<header class="tfc-woocommerce-products-header">

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
	</div>
	
</header>
<div class="tfc_category">
	<div class="tfc_category_name">
                     <div class="tfc_cat">
						<?php
					 $category = get_queried_object(); // get the current category object
$taxonomy = $category->taxonomy; // get the taxonomy of the category
$term_id = $category->term_id; // get the term ID of the category
$breadcrumb = '';

if ($taxonomy == 'product_cat') {
   $breadcrumb = woocommerce_breadcrumb(array(
      'delimiter' => ' &gt; ',
      'wrap_before' => '<nav class="tfc_breadcrumb woocommerce-breadcrumb" itemprop="breadcrumb">',
      'wrap_after' => '</nav>',
      'before' => '',
      'after' => '',
      'home' => __('Home', 'woocommerce'),
      'show_home' => true,
      'echo' => false,
      'taxonomy' => $taxonomy
   ), $term_id);
}

echo $breadcrumb;
?>
                    
</div>
                    <div class="tfc_category_name">
                        <ul>
							<?php
						$taxonomy = 'product_cat';
                        $orderby = 'name';
						$show_count = 0; // set to 1 to display the number of products in each category
						$pad_counts = 0;
						$hierarchical = 1;
						$title = '';
						$empty = 0;

						$args = array(
						'taxonomy' => $taxonomy,
						'orderby' => $orderby,
						'show_count' => $show_count,
						'pad_counts' => $pad_counts,
						'hierarchical' => $hierarchical,
						'title_li' => $title,
						'hide_empty' => $empty
						);

						$categories = get_terms($args);

						foreach($categories as $category) {
							echo '<li>';
						echo '<a href="' . get_term_link($category) . '">' . $category->name . '</a>';
						echo '</li>';
						}
						?>

                        </ul>
                    </div>
					</div>

<?php
do_action( 'woocommerce_before_main_content' );
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	
	do_action( 'woocommerce_before_shop_loop' );
	?>
	<div class="tfc-short-td">
			<div class="tfc-short-1"><p>SHORT BY:</p></div>
	</div>

	
<?php
	$term = '';
	if(! is_shop()){
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

}?>
	<div class="tfc-product-categories">
	


<?php
	woocommerce_product_loop_start();
	?>
	<div class="tfc_category_featured">
		<?php
	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();?>

	<div class="tfc_category_image">
       <?php
			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );
			wc_get_template_part( 'content', 'product' );
			?>
			<?php
			$product_id = get_the_ID(); // get the current product ID
            $product = get_post($product_id);
            $product_description = $product->post_content;
            echo $product_description;
         ?>
			</div>
			<?php
		}

		
	}

	woocommerce_product_loop_end();
		?>
		</div>
	</div><?php
	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}?>
</div> 
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );


get_footer( 'shop' );



