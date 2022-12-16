<?php
global $wp;
$wp->parse_request();
?>
<?php
    $category = get_queried_object();
    $cat_ID = $category->term_id;
    $cat_name = $category->name;
?>

<div class="col-md-4 col-lg-3 col-sm-12 column-filters d-lg-block d-none">
	<div style="position: -webkit-sticky;position: sticky;top:90px;">

		<select name="orderby" class="orderby form-control mb-3" id="orderby" aria-label="Shop order">
			<option value="<?php echo home_url( $wp->request );?>" selected="selected">Default sorting</option>
			<option value="?orderby=title" >Sort by Name</option>
			<option value="?orderby=date">Sort by latest</option>
		</select>
		<?php get_template_part('products/productSearchForm'); ?>
		<div class="column-filters-inside">
			<div class="side-block">
				<h3 class="side-block-title">Categories</h3>
				<ul class="category-list">
					<?php
					$args = array('hide_empty=1');
					$terms = get_terms('product_category', $args);
					if (!empty($terms) && !is_wp_error($terms)) {
						$count = count($terms);
						$i = 0;
						// $term_list = '<p class="my_term-archive"></p>';
						foreach ($terms as $term) {
							$i++;
							if($cat_name == $term->name){
								$term_list .= '<li class="active-cat"><a href="' . esc_url(get_term_link($term)) . '" alt="">' . $term->name . '</a></li>';
							}else{
								$term_list .= '<li><a href="' . esc_url(get_term_link($term)) . '" alt="">' . $term->name . '</a></li>';
							}
						}
						echo $term_list;
					}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>