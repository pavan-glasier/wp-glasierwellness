<?php

/**
 * 
 * Template Name: About Us
 * 
 **/

get_header();
?>

<div class="page-content">
<!--section-->
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/about-bg.jpg);">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="page-banner-cont">
               <h2><?php the_title();?></h2>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?=site_url();?>">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li>
                  </ol>
               </nav>
            </div>
            <!-- page banner cont -->
         </div>
      </div>
      <!-- row -->
   </div>
   <!-- container -->
</section>
<!--//section-->
	
	

<?php while ( have_rows('sections') ) : the_row();?>
    <?php if( get_row_layout() == 'about_section' ) :
    $about_content_group = get_sub_field('content_group');
    $about_image = get_sub_field('image');
    ?>
<?php if($about_content_group):?>
<!--section-->
<div class="section page-content-first">
   <section id="about-page" >
      <div class="container">
         <div class="row">
            <div class="col-lg-6">
				
               <div class="section-title mt-50">
				   <?php if(!empty($about_content_group['tag_line'])): ?>
                  <h5><?php echo $about_content_group['tag_line'];?></h5>
				   <?php endif; ?>
				   
				   <?php if(!empty($about_content_group['title'])): ?>
                  	<h2><?php echo $about_content_group['title'];?></h2>
				   <?php endif; ?>
               </div>
				
				<?php if(!empty($about_content_group['content_1'])): ?>
               <!-- section title -->
               <div class="about-cont">
                  <p><?php echo $about_content_group['content_1'];?></p>
               </div>
				<?php endif; ?>
            </div>
            <!-- about cont -->
			 <?php if(!empty($about_image['url'])): ?>
            <div class="col-lg-6">
               <div class="about-image mt-150">
                  <img src="<?php echo esc_url( $about_image['url'] ); ?>" alt="<?php echo esc_attr( $about_image['alt'] ); ?>">
               </div>
               <!-- about imag -->
            </div>
			 <?php endif;?>
			 
			 <?php if(!empty($about_content_group['content_2'])): ?>
            <div class="col-lg-12 mt-30">
               <p><?php echo $about_content_group['content_2'];?></p>
            </div>
			 <?php endif;?>
         </div>
         <!-- row -->
      </div>
	   </section>
</div>
	   <?php endif;?>
	<?php endif; ?>
<?php endwhile; ?>
	
	
	
<?php while ( have_rows('sections') ) : the_row();?>
    <?php if( get_row_layout() == 'why_section' ) :

    $about_image = get_sub_field('image');
    ?>
	<!--section-->
<div class="section page-content-first">
   <section id="" >
      <div class="about-items pt-60">
         <div class="container">
			  <?php if(!empty( get_sub_field('heading') )): ?>
            <div class="section-title">
               <h5><?php echo get_sub_field('heading');?></h5>
            </div>
			  <?php endif;?>
			 
			 <?php if( have_rows('boxes') ): $counter = 1; ?>
            <div class="row justify-content-center mt-50">
				<?php while( have_rows('boxes') ) : the_row(); ?>
               <div class="col-lg-4 col-md-6 col-sm-10">
                  <div class="about-singel-items mt-30">
<!--                     <!-- <span>0<?php echo $counter;?></span> -->
					  <img src="<?php echo esc_url(get_sub_field('icon')['url']);?>" alt="<?php echo esc_attr(get_sub_field('icon')['alt']);?>"/>
                     <h4><?php echo get_sub_field('title');?></h4>
                     <p><?php echo get_sub_field('description');?></p>
                  </div>
                  <!-- about singel -->
               </div>
				<?php $counter++; endwhile;?>
            </div>
            <!-- row -->
			 <?php endif; ?>
         </div>
         <!-- about items -->
      </div>
      <!-- container -->
   </section>
</div>
	<?php endif; ?>
<?php endwhile; ?>
	
<?php $count = 1; while ( have_rows('sections') ) : the_row();?>
    <?php if( get_row_layout() == 'content_image_section' ) :
    $image = get_sub_field('image');
?>
<div class="section page-content-first">
   <section>
   <div class="container">
      <div class="row <?php if($count % 2 == 0):?>flex-md-row-reverse<?php endif;?>">
         <div class="col-lg-6">
			 <?php if($image):?>
            <div class="about-image mt-50">
               <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
            </div>
            <!-- about imag -->
			 <?php endif;?>
         </div>
         <div class="col-lg-6">
			 <?php if(!empty( get_sub_field('contents')['heading'])): ?>
            <div class="section-title mt-50">
               <h4><?php echo get_sub_field('contents')['heading']; ?></h4>
            </div>
			 <?php endif;?>
			 
			 <?php if(!empty( get_sub_field('contents')['heading'])): ?>
            <!-- section title -->
            <div class="about-cont">
               <p><?php echo get_sub_field('contents')['content']; ?></p>
            </div>
			 <?php endif;?>
         </div>
         <!-- about cont -->
      </div>
      <!-- row -->
	   
	    </div>
	</section>
</div>
	<?php endif; ?>
<?php $count++; endwhile; ?>
	

	
<?php while ( have_rows('sections') ) : the_row();?>
    <?php if( get_row_layout() == 'accordion_section' ) : ?>
	
<?php if( have_rows('accordions') ): ?>
  
<div class="section page-content-first">
   <section>
      <div class="container list-details">
         <div class="row mt-85 pb-110">
            <div class="accordion" id="accordion2">
				
				<?php $acc = 1; while( have_rows('accordions') ) : the_row(); ?>
               <div class="accordion-group">
                  <div class="accordion-heading">
                     <a class="accordion-toggle <?php echo ($acc == 1) ? '' : 'collapsed';?>" data-toggle="collapse" data-parent="#accordion2" href="#collapse_<?php echo $acc;?>" aria-expanded="<?php echo ($acc == 1) ? 'true' : 'false';?>">
                    	<?php echo get_sub_field('title');?>
                     </a>
                  </div>
                  <div id="collapse_<?php echo $acc;?>" class="accordion-body collapse <?php echo ($acc == 1) ? 'show' : '';?>">
                     <div class="accordion-inner">
                       <?php echo get_sub_field('content');?>
                     </div>
                  </div>
               </div>
				<?php $acc++; endwhile; ?>
				
            </div>
         </div>
      </div>
   <!--//section-->
	</section>
</div>
<?php endif; ?>
	<?php endif; ?>
<?php endwhile; ?>



<?php get_footer(); ?>