<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */
?>

<footer class="footer-wrap">
	<div class="footer-top">
		<div class="container">
			<div class="row pt-100 pb-75">
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
					<div class="footer-widget">
					<?php $logo_white = get_field('logo_white', 'option'); ?>
						<?php if ($logo_white) : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
								<img src="<?php echo esc_url($logo_white['url']); ?>" alt="<?php echo $logo_white['alt']; ?>" />
							</a>
						<?php endif; ?>
						
						<p class="text-white"><?php echo get_field('short_description', 'option'); ?></p>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
					<div class="footer-widget">
						<h3 class="footer-widget-title">Contact information</h3>
						<ul class="contact-info list-style">
							<li>
								<i class="flaticon-map"></i>
								<p><?php echo get_field('contact_info', 'option')['address'];?></p>
							</li>
							<li>
								<i class="flaticon-support"></i>
								<a href="tel:<?php echo get_field('contact_info', 'option')['phone'];?>"><?php echo get_field('contact_info', 'option')['phone'];?></a>
							</li>
							<li>
								<i class="flaticon-email"></i>
								<a href="mailto:<?php echo get_field('contact_info', 'option')['email'];?>">
									<span><?php echo get_field('contact_info', 'option')['email'];?></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 ps-xl-4">
					<div class="footer-widget">
						<h3 class="footer-widget-title">Quick Links</h3>
						
						<?php
						wp_nav_menu(
							array(
								'theme_location'    => get_field('quick_links', 'option')['value'],
								'container'         => 'ul',
								'menu_class'        => 'footer-menu list-style',
								'link_before'		=> '<i class="ri-arrow-right-s-line"></i>',
								'link_after'		=> '<i class="ri-arrow-right-s-line"></i>',
							)
						);
						?>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
					<div class="footer-widget">
						<h3 class="footer-widget-title">Subscribe Newsletter</h3>
						<form action="<?php echo home_url('/?na=s')?>" class="newsletter-form" method="post">
							<input type="hidden" name="nlang" value="">
							<input type="email" name="ne" placeholder="Your Email" required>
							<button type="submit">Subscribe Now</button>
						</form>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="row align-items-center">
					<div class="col-md-6">
						<p class="copyright-text">
							<i class="ri-copyright-line"></i>
							<?php echo get_field('copyright_text', 'option');?>
						</p>
					</div>
					<div class="col-md-6 text-md-end">
						<?php $foo_social_media = get_field('social_media', 'option');?>
						<?php if( empty( $foo_social_media['facebook']['url'] ) && 
						empty( $foo_social_media['twitter']['url'] ) && 
						empty( $foo_social_media['instagram']['url'] )):?>
						<?php else:?>
						<div class="social-link">
							<h6>Follow Us On: </h6>
							<ul class="social-profile list-style style1">
								<?php if( !empty( $foo_social_media['facebook']['url'] ) ): ?>
								<li>
									<a target="_blank" href="<?php echo $foo_social_media['facebook']['url'];?>">
										<i class="ri-facebook-line"></i>
									</a>
								</li>
								<?php endif; ?>
								<?php if( !empty( $foo_social_media['twitter']['url'] ) ): ?>
								<li>
									<a target="_blank" href="<?php echo $foo_social_media['twitter']['url'];?>">
										<i class="ri-twitter-line"></i>
									</a>
								</li>
								<?php endif; ?>
								<?php if( !empty( $foo_social_media['instagram']['url'] ) ): ?>
								<li>
									<a target="_blank" href="<?php echo $foo_social_media['instagram']['url'];?>">
										<i class="ri-instagram-line"></i>
									</a>
								</li>
								<?php endif; ?>

								<?php if( !empty( $foo_social_media['linkedin']['url'] ) ): ?>
								<li>
									<a target="_blank" href="<?php echo $foo_social_media['linkedin']['url'];?>">
										<i class="ri-linkedin-line"></i>
									</a>
								</li>
								<?php endif; ?>
								
							</ul>
						</div>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>
<a href="javascript:void(0)" class="back-to-top bounce">
	<i class="ri-arrow-up-s-line"></i>
</a>
<style>
.iti--allow-dropdown input, .iti--allow-dropdown input[type=text], .iti--allow-dropdown input[type=tel], .iti--separate-dial-code input, .iti--separate-dial-code input[type=text], .iti--separate-dial-code input[type=tel] {
    padding-left: 52px !important;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">

<script src="<?php echo get_template_directory_uri(); ?>/landing/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/landing/js/bootstrap.bundle.min.js"></script>
<!-- <script src="js/aos.js"></script> -->
<script src="<?php echo get_template_directory_uri(); ?>/landing/js/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/landing/js/fancybox.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/landing/js/jquery.appear.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/landing/js/tweenmax.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/landing/js/main.js"></script>
<script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>
<script>
	var input = document.querySelector("#phone"),
		errorMsg = document.querySelector(".phone-errors");
	if (input) {
		var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Select Country Proper"];
		var iti = intlTelInput(input, {
			initialCountry: "auto",
			geoIpLookup: function(success, failure) {
				$.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
					var countryCode = (resp && resp.country) ? resp.country : "us";
					success(countryCode);
				});
			},
		});
		var reset = function() {
			var number = iti.getNumber();
			$('#phone').val(number);
		};
		// on blur: validate
		input.addEventListener('blur', function() {
			reset();
			if (input.value.trim()) {
				var number = iti.getNumber();
				$('#phone').val(number);

				if (iti.isValidNumber()) {
					$('#submit').parent().removeClass('disabled');
					$('#submit').attr('type', 'submit');
					errorMsg.innerHTML = "";
				} else {
					input.classList.add("error");
					var errorCode = iti.getValidationError();
					errorMsg.innerHTML = errorMap[errorCode];
					$('#submit').parent().addClass('disabled');
					$('#submit').attr('type', 'button');
				}
			}
		});
		// on keyup / change flag: reset
		input.addEventListener('change', reset);
		input.addEventListener('keyup', reset);
	}
</script>

<script>
$(document).ready(function () {	
    $("#phone").keypress(function (e) {
        var phoneVal = $(this).val();
        var regex = new RegExp(/^[0][1-11]\d{11}$|^[1-11]\d{11}$/);
        var key = e.charCode || e.keyCode || 0;
        // only numbers
        if (key < 43 || key > 58) {
            return false;
        }
        // only 12 digit
        if(phoneVal.length > 12) {
            return false;
        }
        return true
    });
});
</script>

<script>
function Validate() {
    var pattern = new RegExp("([^\d])\d{10}([^\d])");
    if (pattern.test(document.getElementById('phone').value)) {
        return true;
    }
    else {
        return false;
    }
}
jQuery("input, textarea").on("keypress", function(e) {
    if (e.which === 32 && !this.value.length)
        e.preventDefault();
});
</script>

<script type="text/javascript">
// document.addEventListener('contextmenu', event => event.preventDefault());
$('textarea').bind("keyup keydown", function (e) {
  if (event.keyCode === 17 || event.keyCode === 86){
    event.preventDefault();
    return false;
  }
});
</script>
<script>
	AOS.init({
		duration: 1200,
		once: true
	})
</script>
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
   if (event.detail.contactFormId == "1166") {
	   window.location.href = "<?php echo home_url('/thank-you/');?>";
   }
}, false );
</script>
<?php wp_footer(); ?>


</body>

</html>