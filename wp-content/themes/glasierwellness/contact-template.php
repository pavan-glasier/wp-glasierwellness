<?php 
/**
 * 
 * Template Name: Contact us Page
 * 
 **/

get_header();
 ?>



<div class="page-content">
		<!--section-->
        <div class="section mt-0" >
        <?php
        $iframe = get_field('map_iframe');
        echo $iframe;
        ?>
        
        </div>
		<div class="section mt-0 bg-grey">
			<div class="container">
				<div class="row">
                    
                    <?php 
                        $contact_details = get_field('contact_details');
                        // print_r($contact_details);
						$locations = $contact_details['locations'];
						$contact_info = $contact_details['contact_info'];
						$social_media = $contact_details['social_media'];
						
                    ?>
					<div class="col-md">
						<div class="title-wrap">
						<?php 
							if(!empty($locations['heading'])){ ?>
								<h5><?php echo $locations['heading'];?></h5>
								<div class="h-decor"></div>
							<?php }
							?>
						</div>
						<ul class="icn-list-lg">
							<li><i class="icon-placeholder2"></i> 
							<?php echo $locations['address'];?>
							</li>
						</ul>
					</div>
					<div class="col-md mt-3 mt-md-0">
						<div class="title-wrap">
						<?php 
							if(!empty($contact_info['heading'])){ ?>
								<h5><?php echo $contact_info['heading'];?></h5>
								<div class="h-decor"></div>
							<?php }
							?>
						</div>
						<ul class="icn-list-lg">
							<?php if( !empty($contact_info['phone']) ): ?>
							<li><i class="icon-telephone"></i>Phone: 
							<span class="theme-color">
								<span class="text-nowrap"><?php echo $contact_info['phone'];?></span>
							</span>
							</li>
							<?php endif;?>
							<?php if( !empty($contact_info['email']) ): ?>
							<li><i class="icon-black-envelope"></i><a href="mailto:<?php echo $contact_info['email'];?>"><?php echo $contact_info['email'];?></a></li>
							<?php endif;?>
						</ul>
					</div>

					<div class="col-md mt-3 mt-md-0">
						<div class="title-wrap">
							<?php 
							if(!empty($social_media['heading'])){ ?>
								<h5><?php echo $social_media['heading'];?></h5>
								<div class="h-decor"></div>
							<?php }
							?>
						</div>
						<?php 
							if($social_media) :
						?>
						<div class="content-social mt-15">
							<?php 
							if(!empty($social_media['facebook'])):
							?>
							<a href="<?php echo $social_media['facebook'];?>" target="blank" class="hovicon bg-white"><i class="icon-facebook-logo"></i></a>
							<?php endif;?>

							<?php 
							if(!empty($social_media['twitter'])):
							?>
							<a href="<?php echo $social_media['twitter'];?>" target="blank" class="hovicon bg-white"><i class="icon-twitter-logo"></i></a>
							<?php endif;?>

							<?php 
							if(!empty($social_media['instagram'])):
							?>
							<a href="<?php echo $social_media['instagram'];?>" target="blank" class="hovicon bg-white"><i class="icon-instagram"></i></a>
							<?php endif;?>

							<?php 
							if(!empty($social_media['linkedin'])):
							?>
							<a href="<?php echo $social_media['linkedin'];?>" target="blank" class="hovicon bg-white"><i class="icon-l fa fa-linkedin"></i></a>
							<?php endif;?>
							
						</div>
						<?php endif;?>
					</div>
					<!--  -->
				</div>
			</div>
		</div>
		<!--//section-->
		<!--section-->
		<div class="section pb-5">
			<div class="container">
				<div class="row">
					<div class="col-md col-lg-12">
						<div class="pr-0 pr-lg-8">
						<?php 
							$contact_form = get_field('contact_form');
						?>
							<div class="title-wrap">
								<?php 
								if(!empty($contact_form['heading']) && $contact_form['form']): ?>
								<h2><?php echo $contact_form['heading'];?></h2>
								<div class="h-decor"></div>
								<?php endif;?>
								
							</div>
						</div>
					</div>
					<div class="col-md col-lg-12 mt-4">
					<?php 
						if( $contact_form['form'] ): ?>
						<?php echo do_shortcode('[contact-form-7 id="'.$contact_form['form'].'" html_class="contact-form"]'); ?>
						<?php endif;?>
						
					</div>
				</div>
			</div>
		</div>
		<!--//section-->
</div>

    <?php get_footer()?>