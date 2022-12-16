<?php

/**
 * 
 * Template Name: Inquiry Form
 * 
 **/
get_header();

$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
// print_r(getValue($data));
?>


<div class="page-content">
	<!--section contact-->
	<div class="section bg-norepeat bg-bottom bg-left bg-md-none bg-fixed section-bottom-padding-half " style="background-image: url(<?php echo get_template_directory_uri();?>/images/bg-bottom-left2.png)">
		<div class="banner-appointment-form">
			<div class="container">
				<div class="title-wrap-alt text-center">
					<h2 class="double-title double-title--vcenter double-title--center" data-title="Inquiry"><span>Make an <span class="theme-color">Inquiry</span></span></h2>
					<p>We believe in providing the best possible care to all our existing patients and welcome
					new patients to sample.</p>
				</div>
				
				
				<div class="row mt-5">
					<div class="col-sm-12 col-lg-12">
						<p class="text-danger mb-0">(*) required</p>
						<?php echo do_shortcode('[contact-form-7 id="252" title="Inquiry Form" html_class="contact-form"]');?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!--//section contact-->

	

</div>


 <?php get_footer(); ?>