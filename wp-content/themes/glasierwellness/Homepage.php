<?php 
/**
 * 
 * Template Name: Home Page
 * 
 **/

get_header();
 ?>
<style>
.tab-icons{
	background: #488dca;
	width: 70px;
	height: 70px;
	margin: 0 auto;
  -webkit-mask-size: 70px;
  mask-size: 70px;
  -webkit-mask-repeat: no-repeat;
  mask-repeat: no-repeat;  
}
.nav-pills-icons .nav-link:hover .tab-icons,
.nav-pills-icons .nav-link.active .tab-icons{
	background: #fff;
}
.category-list{
    display: grid;
    grid-template-columns: 48% 48%;
    column-gap: 20px;
}
</style>
<div class="page-content">
    <!--section slider-->
    <div class="section mt-0">
        
        <div id="mainSliderWrapper">
            <div class="loading-content">
                <div class="loader-dna">
                    <column>
                        <dot></dot>
                        <dot></dot>
                        <dot></dot>
                        <dot></dot>
                        <dot></dot>
                        <dot></dot>
                        <dot></dot>
                        <dot></dot>
                    </column>
                    <column>
                        <dash></dash>
                        <dash></dash>
                        <dash></dash>
                        <dash></dash>
                        <dash></dash>
                        <dash></dash>
                        <dash></dash>
                        <dash></dash>
                    </column>
                    <column>
                        <dot></dot>
                        <dot></dot>
                        <dot></dot>
                        <dot></dot>
                        <dot></dot>
                        <dot></dot>
                        <dot></dot>
                        <dot></dot>
                    </column>
                </div>
            </div>
            

            
            <div class="main-slider mb-0 arrows-white arrows-bottom" id="mainSlider" data-slick='{"arrows": false, "dots": true}'>

                
                <?php
                if( have_rows('slides', 'option') ):
                    while( have_rows('slides', 'option') ) : the_row();
                        $sub_value = get_sub_field('title', 'option'); ?>
                        <?php 
                            $slide_background_image = get_sub_field('background_image','option');
                            $slide_title = get_sub_field('title','option');
                            $slide_sub_title = get_sub_field('sub_title','option');
                            $slide_button = get_sub_field('button','option');
                        ?>
                <div class="slide">
                    <div class="img--holder" data-bg="<?php echo $slide_background_image;?>"></div>
                    <div class="slide-content center">
                        <div class="vert-wrap container">
                            <div class="vert">
                                <div class="container">
                                    <div class="slide-txt1 text-no-uppercase" data-animation="fadeInDown" data-animation-delay="1s"><?php echo $slide_title;?></div>
                                    <div class="slide-txt2 text-no-uppercase" data-animation="fadeInUp" data-animation-delay="1.5s"><?php echo $slide_sub_title;?></div>
                                    <?php 
                                    if( $slide_button ): 
                                        $link_url = $slide_button['url'];
                                        $link_title = $slide_button['title'];
                                        $link_target = $slide_button['target'] ? $slide_button['target'] : '_self';
                                        ?>
                                        <div class="slide-btn">
                                            <a href="<?php echo esc_url( $link_url ); ?>" class="btn link-inside" data-animation="fadeInUp" data-animation-delay="2s" target="<?php echo esc_attr( $link_target ); ?>">
                                                <i class="icon-right-arrow"></i>
                                                <span><?php echo esc_html( $link_title ); ?></span>
                                                <i class="icon-right-arrow"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               <?php
                    endwhile;
                else :
                endif;?>
            </div>
        </div>
    </div>
    <!--//section slider-->







<?php while ( have_rows('sections') ) : the_row();?>
    <?php if( get_row_layout() == 'tab_section' ) :

    $tab_section_heading = get_sub_field('tab_section_heading');
    ?>
    <!--section-->
    <div class="section bg-grey mt-md-0">
        <div class="container">
            <div class="title-wrap text-center">
                <h2 class="h1 double-title double-title--white double-title--center double-title--vcenter" data-title="<?php echo $tab_section_heading; ?>">
                    <span><?php echo $tab_section_heading; ?></span>
                </h2>
                <div class="h-decor"></div>
            </div>
            <div class="nav nav-pills-icons js-nav-pills-carousel" role="tablist">


                <?php 
                  
                  if( have_rows('tabs') ):
                     $i = 0;
                   while( have_rows('tabs') ) : the_row();
                     
                     $tabs_name = get_sub_field('tabs_name');
                     $tab_icon = $tabs_name['icon'];
                     $tab_name = $tabs_name['name'];
                     ?>
                     <a class="nav-link <?php if ($i==0) { ?>active<?php } ?>" data-toggle="pill" href="#tab<?php echo $i++;?>" role="tab">
						 <div class="tab-icons" style="-webkit-mask-image: url(<?php echo $tab_icon['url'];?>); mask-image: url(<?php echo $tab_icon['url'];?>);" ></div>
                        <span><?php echo $tab_name;?></span>
                    </a>

                    <?php 
                     endwhile;
                  else :
                  endif;
                     ?>
            </div>
            <div id="tab-content" class="tab-content mt-2 mt-sm-4">

                <?php 
                  
                     if( have_rows('tabs') ):
                         $j = 0;
                      while( have_rows('tabs') ) : the_row();
                       
                     $tabs_name = get_sub_field('tabs_name');
                     $tab_name = $tabs_name['name'];

                     $tab_contents = get_sub_field('tab_contents');

                           ?>
                <div class="tab-pane fade <?php if ($j==0) { ?>show active<?php } ?>" id="tab<?php echo $j++;?>"  role="tabpanel">
                    <div class="tab-bg">
                        <img src="<?php echo get_template_directory_uri();?>/images/content/bg-map.png" alt="">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pt-xl-1">
                                <h3><?php echo $tab_name;?></h3>
                                
                                <?php echo $tab_contents;?>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php 
                        endwhile;
                     else :
                     endif;
                        ?>
            </div>

        </div>
    </div>
    <!--//section-->
    <?php endif; ?>
<?php endwhile; ?>



    <!--section services -->
    <div class="section bg-norepeat bg-md-none section-top-padding  section-bottom-padding" style="background-image: url(wp-content/themes/glasierwellness/images/bg-top-left.png)">
        <div class="container-fluid px-0 over-visible">
            <div class="row">
                <div class="col-lg-6">
                    <div class="services-tab-wrap float-right">
                        <div class="title-wrap-alt text-center text-md-left">
<!--                             <div class="h-sub theme-color">What we Offer</div> -->
<!--                             <h2 class="h1 double-title double-title--top-md" data-title="Services"><span>Other Laboratory <span class="theme-color">Services</span></span></h2> -->
                            <h2 class="h1 double-title double-title--top-md" data-title="Categories"><span>All <span class="theme-color">Categories</span></span></h2>
                        </div>
<!--                         <p>Results of test procedures processed on site are reported to the health care provider the same day during regular business hours. Testing and services available through our Laboratory include:</p> -->
						<?php 
						$cat_args = array(
							'orderby'       => 'term_id', 
							'order'         => 'ASC',
							'hide_empty'    => true, 
						);
						$terms = get_terms('product_category', $cat_args);
// 						print_r($terms);
						?>
                        <div class="row">
                            <div class="col-12">
                                <ul class="marker-list-md category-list">
									<?php 
									foreach($terms as $taxonomy){ ?>
									<li><a href="<?php echo get_term_link($taxonomy);?>"><?php echo $taxonomy->name;?></a></li>
									<?php } ?>
                                </ul>
                            </div>
<!--                             <div class="col-sm-auto mt-1 mt-md-0">
                                <ul class="marker-list-md">
                                    <li>Point-of-Care Testing</li>
                                    <li>Microbiology and Virology</li>
                                    <li>Molecular Pathology</li>
                                    <li>Bone Marrow Biopsy</li>
                                    <li>Coagulation</li>
                                    <li>Pathology & Cytology</li>
                                    <li>Urinalysis</li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 position-relative">
                    <div class="ml-xl-6">
                        <img src="<?php echo site_url();?>/wp-content/uploads/2022/10/laboratory-img.png" class="w-sm-100" alt="">
                    </div>
<!--                     <div class="over-image-card pos-left">
                        <div class="over-image-card-icon"><i class="icon-download"></i></div>
                        <div class="over-image-card-text">
                            <h4>Download Forms</h4>
                            <p>We have request forms available for diagnostics that list the test panels and individual markers currently available.</p>
                            <a href="#" class="btn btn-white btn-white--all" data-toggle="modal" data-target="#modalQuestionForm">
                                <i class="icon-right-arrow"></i>
                                <span>download forms</span>
                                <i class="icon-right-arrow"></i>
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!--//section services -->



<?php while ( have_rows('sections') ) : the_row();?>
    <?php if( get_row_layout() == 'blog_section' ) :
    $blog_group = get_sub_field('blog_group');
    ?>

    <?php 
        $achievements = get_sub_field('achievements');
        $heading = $achievements['heading'];
        $image = $achievements['image'];
        $counters = $achievements['counter'];
     ?>

    <!--section news & achieved-->
    <div class="section" style="display:none;">
        <div class="row no-gutters row-shift">
            <?php if($blog_group): ?>
            <div class="col-lg-6 col-shift-right">
                <div class="container-shift-left">
                    <div class="title-wrap">
                        <h2 class="double-title double-title--white double-title--vcenter" data-title="<?php echo $blog_group['blog_heading'];?>">
                            <span><?php echo $blog_group['blog_heading'];?></span>
                        </h2>
                    </div>
                    <div class="blog-post-sm-vertical">


                    <?php
                     $blogs = $blog_group['blogs'];
                        $blog = new WP_Query(array(
                            'post_type' => 'post',
                            'cat' => $blogs,
                            'posts_per_page' => 3,
                            'order' => 'DESC'
                        ));
                        ?>
                        <?php
                        while ($blog->have_posts()) : $blog->the_post(); ?>
                        
                        <div class="blog-post-sm">
                            <div class="blog-post-sm-photo">
                                <?php 
                                    if ( has_post_thumbnail() ) { ?>
                                       <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>" class="img-fluid" alt="<?php echo get_the_title(); ?>">
                                    <?php }
                                    else { ?>
                                        <img src="<?=site_url();?>/wp-content/uploads/2022/10/placeholder-img-glasierwellness.png" class="img-fluid" alt="noprivew" >
                                    <?php }
                                    ?>
                            </div>
                            <div class="blog-post-sm-text">
                                <div class="blog-post-sm-date"><?php echo get_the_date( 'M d, Y', $post->ID ); ?></div>
                                <div class="blog-post-sm-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php 
                                        $title = get_the_title();
                                        $trim_title = wp_trim_words($title, 20, "");
                                        echo $trim_title;?>
                                    </a>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="blog-post-sm-readmore">...</a>
                            </div>
                        </div>

                        <?php endwhile; wp_reset_postdata(); ?>

                        


                    </div>

                </div>
            </div>
            <?php endif; ?>

            <?php if($achievements): ?>
            <div class="col-lg-6 col-shift-left mt-4 mt-md-5 mt-lg-2">
                <?php if($heading): ?>
                <div class="container-shift-right">
                    <div class="title-wrap text-center text-md-left">
                        <h2 class="h1">
                            <?php echo $heading;?>
                        </h2>
                    </div>
                </div>
                <?php endif; ?>

                <div class="mt-2 mt-md-3 mt-lg-4">
                    <?php if(!empty($image)){ ?>
                        <img src="<?php echo $image;?>" alt="Image" class="w-sm-100">
                    <?php } else{ ?>
                        <img src="<?php echo get_template_directory_uri();?>/images/content/banner-right.jpg" alt="Image" class="w-sm-100">
                    <?php } ?>
                    

                    <?php 
                    if( $counters ) { ?>
                    <div class="over-image-counter pos-left">
                        <div class="d-flex w-100 justify-content-between">
                            <?php 
                            foreach( $counters as $counter ) { ?>
                            <div class="counter-box-sm">
                                <div class="counter-box-sm-number">
                                    <span class="count" data-to="<?php echo $counter['number'];?>" data-speed="1500">0</span>
                                    <span class="sup"><?php echo $counter['affix'];?></span>
                                </div>
                                <div class="counter-box-sm-text"><?php echo $counter['text'];?></div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                <?php } ?>

                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <!--//section news & achieved-->

    <?php endif; ?>
<?php endwhile; ?>


<?php while ( have_rows('sections') ) : the_row();?>
    <?php if( get_row_layout() == 'inquiry_section' ) :
    $form_section = get_sub_field('form_section');
    $form_image = get_sub_field('image');
    
    ?>
    <!--section contact-->
    <div class="section bg-norepeat bg-bottom bg-left bg-md-none bg-fixed section-bottom-padding-half section-top-padding" style="background-image: url(<?php echo get_template_directory_uri();?>/images/bg-bottom-left2.png);background-color: #488dca0d;">
        <div class="banner-appointment-form">
            <div class="container">
                <div class="row no-gutters">
                    <?php if (!empty($form_image)) { ?>
                        <div class="col-sm-5 col-lg-5 order-2 order-sm-2 mt-3 mt-md-0 text-center">
                            <img src="<?php echo $form_image;?>" alt="" class="banner-appointment-form-image">
                        </div>
                    <?php } else{?>
                    <div class="col-sm-5 col-lg-5 order-2 order-sm-2 mt-3 mt-md-0 text-center">
                        <img src="<?php echo get_template_directory_uri();?>/images/content/banner-appointment.png" alt="" class="banner-appointment-form-image">
                    </div>
                    <?php } ?>
                    <div class="col-sm-7 col-lg-7 order-1 order-sm-1 d-flex">
                        <div class="pt-2 pt-lg-6 px-lg-3">
                            <?php if (!empty($form_section['heading'])) { ?>
                            <div class="title-wrap-alt">
                                <h2 class="double-title double-title--vcenter double-title--center" data-title="<?php echo strip_tags($form_section['heading']);?>">
                                    <span><?php echo $form_section['heading'];?> </span>
								</h2>
                            </div>
                            <?php } ?>
                            <?php if (!empty($form_section['sub_heading'])) { ?>
                            <p><?php echo $form_section['sub_heading'];?></p>
                            <?php } ?>

                            <?php if (!empty($form_section['form_code'])) {
                                echo do_shortcode('[contact-form-7 id="'.$form_section['form_code'].'" title="Inquiry Form" html_class="contact-form"]');
                            }?>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//section contact-->

    <?php endif; ?>
<?php endwhile; ?>
</div>


 <?php  

get_footer();

?>