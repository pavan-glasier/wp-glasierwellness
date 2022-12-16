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


<?php //get_template_part( 'template-parts/footer/footer-widgets' ); 
?>
<style>
.iti {
    display: block !important;
}
span.error {
    position: absolute;
    z-index: 1;
    top: 86%;
    font-size: .8em;
    font-weight: 500 !important;
    color: #dc3232;
    width: 100%;
}
.disabled,
:disabled{
    cursor: no-drop;
    pointer-events: none;
}
</style>

<!--footer-->
<div class="footer mt-0">
	<div class="container">
		<div class="row py-1 py-md-2 px-lg-0">
			<div class="col-lg-4 footer-col1 pt-lg-3">
				<div class="row flex-column flex-md-row flex-lg-column">
					<div class="col-md col-lg-auto">

						<?php $logo = get_field('logo', 'option'); ?>
						<?php if ($logo) : ?>
							<div class="footer-logo">
								<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo $logo['title']; ?>" class="img-fluid">
							</div>
						<?php endif; ?>

						<div class="mt-2 mt-lg-0"></div>
						
					</div>
					<div class="col-md">
						<div class="footer-text mt-1 mt-lg-1">
							<?php $short_description = get_field('short_description', 'option'); ?>
							<p><?php echo $short_description; ?></p>
							<?php $news_letter = get_field('news_letter', 'option'); ?>
							<?php echo $news_letter; ?>
							<!-- <form action="<?php //echo site_url();?>/?na=s" class="footer-subscribe" method="post">
								<div class="input-group">
									<span class="wpcf7-form-control-wrap subscribe_mail">
										<input type="hidden" name="nlang" value="">
										<input name="ne" type="email" class="form-control" value="" placeholder="Your Email" required/>
									</span>
									<span class="submit-btn-span">
										<button type="submit" class="submit-btn">
											<span>
												<i class="icon-black-envelope"></i>
											</span>
										</button>
									</span>
								</div>
							</form> -->
							
						</div>
						<!-- <div class="footer-social d-md-none d-lg-block">
							<a href="https://www.facebook.com/" target="blank" class="hovicon"><i class="icon-facebook-logo"></i></a>
							<a href="https://www.twitter.com/" target="blank" class="hovicon"><i class="icon-twitter-logo"></i></a>
							<a href="https://plus.google.com/" target="blank" class="hovicon"><i class="icon-google-logo"></i></a>
							<a href="https://www.instagram.com/" target="blank" class="hovicon"><i class="icon-instagram"></i></a>
						</div> -->
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-4">
				<h3>Quick Link</h3>
				<div class="h-decor"></div>
				<?php $quick_links = get_field('quick_links', 'option'); ?>
				<?php
				$quick_links_value = $quick_links['value'];
				$footer = 'footer';
				wp_nav_menu(
					array(
						'theme_location'    => $quick_links_value,
						'container'         => 'ul',
						'menu_class'        => 'quick-links',
					)
				);
				?>
			</div>
			<!-- <div class="col-sm-6 col-lg-4">
				<h3>Our Contacts</h3>
				<div class="h-decor"></div>
				<?php //$inquiry_form = get_field('inquiry_form', 'option'); ?>
				<?php //echo do_shortcode($inquiry_form); ?>
			</div> -->
			<div class="col-sm-6 col-lg-4">
				<h3>Our Contacts</h3>
				<div class="h-decor"></div>
				<ul class="icn-list">
				<?php $contact_info = get_field('contact_info', 'option'); ?>
					<li><i class="icon-placeholder2"></i><?php echo $contact_info['address'];?></li>
					<li><i class="icon-telephone"></i><b><span class="phone"><span class="text-nowrap"><?php echo $contact_info['phone'];?></span></span></b>
					</li>
					<li><i class="icon-black-envelope"></i><a href="mailto:<?php echo $contact_info['email'];?>"><?php echo $contact_info['email'];?></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row text-center">
				<div class="col-sm">
					<?php echo get_field('copyright_text', 'option');?>
				</div>
				<!-- <div class="col-sm-auto ml-auto"><span class="d-none d-sm-inline">For emergency cases&nbsp;&nbsp;&nbsp;</span><i class="icon-telephone"></i>&nbsp;&nbsp;<b>1-800-267-0000</b></div> -->
			</div>
		</div>
	</div>
</div>
<!--//footer-->
<div class="backToTop js-backToTop">
	<i class="icon icon-up-arrow"></i>
</div>



<!-- MODAL POPUP -->
<div class="modal modal-form modal-form-sm fade" id="modalQuestionForm">
	<div class="modal-dialog">
		<div class="modal-content">
			<button aria-label='Close' class='close' data-dismiss='modal'>
				<i class="icon-error"></i>
			</button>
			<div class="modal-body">
				<div class="modal-form">
					<h3>Ask a Question</h3>
					<form class="mt-15" id="questionForm" method="post" novalidate>
						<div class="successform">
							<p>Your message was sent successfully!</p>
						</div>
						<div class="errorform">
							<p>Something went wrong, try refreshing and submitting the form again.</p>
						</div>
						<div class="input-group">
							<span>
								<i class="icon-user"></i>
							</span>
							<input type="text" name="name" class="form-control" autocomplete="off" placeholder="Your Name*" />
						</div>
						<div class="input-group">
							<span>
								<i class="icon-email2"></i>
							</span>
							<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Your Email*" />
						</div>
						<div class="input-group">
							<span>
								<i class="icon-smartphone"></i>
							</span>
							<input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Your Phone" />
						</div>
						<textarea name="message" class="form-control" placeholder="Your comment*"></textarea>
						<div class="text-right mt-2">
							<button type="submit" class="btn btn-sm btn-hover-fill">Ask Now</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal modal-form fade" id="modalBookingForm">
	<div class="modal-dialog">
		<div class="modal-content">
			<button aria-label='Close' class='close' data-dismiss='modal'>
				<i class="icon-error"></i>
			</button>
			<div class="modal-body">
				<div class="modal-form">
					<h3>Book an Appointment</h3>
					<form class="mt-15" id="bookingForm" method="post" novalidate>
						<div class="successform">
							<p>Your message was sent successfully!</p>
						</div>
						<div class="errorform">
							<p>Something went wrong, try refreshing and submitting the form again.</p>
						</div>
						<div class="input-group">
							<span>
								<i class="icon-user"></i>
							</span>
							<input type="text" name="bookingname" class="form-control" autocomplete="off" placeholder="Your Name*" />
						</div>
						<div class="row row-xs-space mt-1">
							<div class="col-sm-6">
								<div class="input-group">
									<span>
										<i class="icon-email2"></i>
									</span>
									<input type="text" name="bookingemail" class="form-control" autocomplete="off" placeholder="Your Email*" />
								</div>
							</div>
							<div class="col-sm-6 mt-1 mt-sm-0">
								<div class="input-group">
									<span>
										<i class="icon-smartphone"></i>
									</span>
									<input type="text" name="bookingphone" class="form-control" autocomplete="off" placeholder="Your Phone" />
								</div>
							</div>
						</div>
						<div class="row row-xs-space mt-1">
							<div class="col-sm-6">
								<div class="input-group">
									<span>
										<i class="icon-birthday"></i>
									</span>
									<input type="text" name="bookingage" class="form-control" autocomplete="off" placeholder="Your age" />
								</div>
							</div>
						</div>
						<div class="selectWrapper input-group mt-1">
							<span>
								<i class="icon-micro"></i>
							</span>
							<select name="bookingservice" class="form-control">
								<option selected="selected" disabled="disabled">Select Service</option>
								<option value="Molecular Testing & Oncology">Molecular Testing & Oncology</option>
								<option value="Histology">Histology</option>
								<option value="General Diagnostic Tests">General Diagnostic Tests</option>
								<option value="Naturopathic">Naturopathic</option>
								<option value="Genetics Tests">Genetics Tests</option>
								<option value="Cytology">Cytology</option>
							</select>
						</div>
						<div class="input-group flex-nowrap mt-1">
							<span>
								<i class="icon-calendar2"></i>
							</span>
							<div class="datepicker-wrap">
								<input name="bookingdate" type="text" class="form-control datetimepicker" placeholder="Date" readonly>
							</div>
						</div>
						<div class="input-group flex-nowrap mt-1">
							<span>
								<i class="icon-clock"></i>
							</span>
							<div class="datepicker-wrap">
								<input name="bookingtime" type="text" class="form-control timepicker" placeholder="Time">
							</div>
						</div>
						<textarea name="bookingmessage" class="form-control" placeholder="Your comment"></textarea>
						<div class="text-right mt-2">
							<button type="submit" class="btn btn-sm btn-hover-fill">Book now</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>




<!-- Modal Popup -->

<div class="modal modal-product modal-form fade " id="productDetail">
    <div class="modal-dialog" style="max-width: 800px !important;">
        <div class="modal-content">
            <button aria-label='Close' class='close' onclick="closePop()">
                <i class="icon-error"></i>
            </button>
            <div class="modal-body">
                <div class="modal-form text-center">
                    <!-- <form> -->
                        <!-- <input type="hidden" id="postID" name="postID" value="" />
                        <input type="hidden" id="action" name="action" value="contactUs"> -->
                        <!-- </form> -->
                    <h3>Get Best Quote </h3>
					
                    <div class="row" >
                    <!-- <div class="col-lg-6 mt-4 mt-lg-0" id="html"> -->
				    </div>
                        <div class="col-lg-12">
                            <div>
                                <?php echo do_shortcode('[contact-form-7 id="252" title="Product Inquiry Form"]');?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- or -->
<!-- <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script> -->
<script src="<?php echo get_template_directory_uri();?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/jquery-migrate/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/cookie/jquery.cookie.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/bootstrap-datetimepicker/moment.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/popper/popper.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/waypoints/sticky.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/slick/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/scroll-with-ease/jquery.scroll-with-ease.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/countTo/jquery.countTo.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/jquery.elevateZoom/jquery.elevateZoom-3.0.8.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/form-validation/jquery.form.js"></script>
<script src="<?php echo get_template_directory_uri();?>/vendor/form-validation/jquery.validate.min.js"></script>
<!-- Custom Scripts -->

<script src="<?php echo get_template_directory_uri();?>/js/app.js"></script>
<!-- <script src="<?php echo get_template_directory_uri();?>/color/color.js"></script> -->
<script src="<?php echo get_template_directory_uri();?>/js/app-shop.js"></script>
<!-- <script src="<?php echo get_template_directory_uri();?>/form/forms.js"></script> -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>




<script>
    var input = document.querySelector("#phone"),
      errorMsg = document.querySelector(".errormsg");
    var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Select Country Proper"];
    var iti = intlTelInput(input, {
      initialCountry: "auto",
      geoIpLookup: function (success, failure) {
        $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
          var countryCode = (resp && resp.country) ? resp.country : "us";
          success(countryCode);
        });
      },
    });

var reset = function() {

};

// on blur: validate
input.addEventListener('blur', function() {
  reset();
  if (input.value.trim()) {
    var number = iti.getNumber();
    $('#fullnumber').val(number);
    
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
</script>



<script>
$(document).ready(function() {
	$('#orderby').change(function() {
		location.href = $(this).val();
	});
  var queryString = window.location.href.slice(window.location.href.indexOf('?'));
  $("#orderby > option").each(function() {
    if (this.value == queryString) {
      this.selected = 'selected';
    }
  });
});
</script>


<!-- PRODUCT LOADMORE AJAX -->
<script>
//     var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' );?>';
//     var page = 2;
// $(window).scroll(function() {
	
//     if ($(window).scrollTop() == $(document).height() - $(window).height()) {
//         var data = {
//             'action': 'load_products_by_ajax',
//             'page': page,
//             'security': '<?php echo wp_create_nonce( 'load_more_products' );?>'
//         };
 
//         $.post(ajaxurl, data, function(response) {
//             if($.trim(response) != '') {
// 				$('#loadMore').removeClass('hidden');
// 				setTimeout(
// 				function () {
// 					$('#loadMore').addClass('hidden');
// 					$('#prd-grid').append(response);
// 				},2000);
// 				page++;
//             } else {
//                 $('#loadMore').addClass('hidden');
//             }
//         });
//     }
// });
</script>
<!-- END PRODUCT LOADMORE AJAX -->



<!-- CATEGORY PRODUCT LOADMORE AJAX -->
<script>
//     var catAjaxurl = '<?php echo admin_url( 'admin-ajax.php' );?>';
//     var paged = 2;
// 	var categoryID = $('#categoryID').val();
// 	// alert(categoryID);
// $(window).scroll(function() {
//     if ($(window).scrollTop() == $(document).height() - $(window).height()) {
//         var catData = {
//             'action': 'load_catproducts_by_ajax',
// 			'categoryID': categoryID,
//             'page': paged,
//             'security': '<?php echo wp_create_nonce( 'load_more_catproducts' );?>'
//         };
 
//         $.post(catAjaxurl, catData, function(resp) {
//             if($.trim(resp) != '') {
// 				$('#loadMoreCat').removeClass('hidden');
// 				setTimeout(
// 				function () {
// 					$('#loadMoreCat').addClass('hidden');
// 					$('#prd-gridCat').append(resp);
// 				},2000);
// 				paged++;
//             } else {
//                 $('#loadMoreCat').addClass('hidden');
//             }
//         });
//     }
// });
</script>
<!-- END CATEGORY PRODUCT LOADMORE AJAX -->
<script>
$(document).ready(function(){
	// $("#btnDis").attr("disabled", true);
	if( parseInt($("#qty").attr("min")) <= parseInt($("#qty").val()) ){
		$("#btnDis").attr("disabled", false);
	}
	if( $("#qty").attr("min") == "" && $("#qty").val() == "" ){
		$("#btnDis").attr("disabled", true);
	}
  $("#qty").on('keyup', function(){

	var val1 = parseInt($(this).attr("min"));
    var val2 = parseInt($(this).val());
    if($(this).val() == ""){
		$("#msg").html("please enter a number");
		$("#btnDis").attr("disabled", true);
	}
	if( val1 > val2){
		$("#msg").html("please enter a number greater than "+(val1-1));
		$("#btnDis").attr("disabled", true);
	}
	else if(val1 <= val2){
		$("#msg").html("")
		$("#btnDis").attr("disabled", false);
		
	}
	
  });
});
</script>
<script>
$('#searchid').hover(function(){
	$(this).focus();
})

$(document).ready(function(){
	$('#searchSubmit').attr("disabled", true);
	$("#searchid").on('keyup', function(e){
		if(e.which == 32){
			$(this).val('')
			 return false;
		}
		else if($(this).val() === ""){
			$("#searchSubmit").attr("disabled", true);
		}else{
			$("#searchSubmit").attr("disabled", false);
		}
	});
})
</script>

<script>
$(document).ready(function(){
	$('#productSBtn').attr("disabled", true);
	$("#productSearch").on('keyup', function(e){
		if(e.which == 32){
			$(this).val('')
			 return false;
		}
		else if($(this).val() === ""){
			$("#productSBtn").attr("disabled", true);
		}else{
			$("#productSBtn").attr("disabled", false);
		}
	});
})
</script>


<script>

function ajaxSubmit(postID) {
    jQuery.ajax({
        type: "POST",
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        data: { action: 's_data_fetch', postID: postID  },
         success: function(data){
			Obj = JSON.parse(data)
			jQuery('#productName').val(Obj.name);
			jQuery("#productImg").val(Obj.imgUrl);
            // setTimeout(closePop, 3000);
         }
    });

    return false;
}
</script>

<script>
    function openProductDetail(id){
        ajaxSubmit(id);
        setTimeout(formPopOpen, 300);
    }
    function formPopOpen(){
        $('#productDetail').addClass('show');
        $('#productDetail').css('display', 'block');
        $('body').append('<div class="modal-backdrop fade show" id="overlayBg"></div>');
    }
    function closePop(){
        $('#productDetail').removeClass('show');
        $('#productDetail').css('display', 'none');
        $('#overlayBg').remove();
    }
</script>

<?php wp_footer(); ?>
<script type="text/javascript">
var message = document.getElementById('message');
message.onkeypress= function(e) {
  var k = e.keyCode;
   	if(k != 32){
	   return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8   || (k >= 48 && k <= 57));
	}
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
document.addEventListener('contextmenu', event => event.preventDefault());
$('textarea').bind("keyup keydown", function (e) {
  if (event.keyCode === 17 || event.keyCode === 86){
    event.preventDefault();
    return false;
  }
});
</script>
</body>

</html>