<?php
$wplogoutURL = urlencode(get_the_permalink());
$wplogoutTitle = urlencode(get_the_title());
$wplogoutImage= urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));
?>
<div class="col-md-4">
    <div class="blog-post">
        <div class="post-image">
            <a href="<?php the_permalink(); ?>">
            <?php 
                if ( has_post_thumbnail() ) { ?>
                   <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>" alt="<?php echo get_the_title(); ?>">
                <?php }
                else { ?>
                    <img src="<?=site_url();?>/wp-content/uploads/2022/10/placeholder-img-glasierwellness.png" alt="noprivew" >
                <?php }
                ?>
            </a>
        </div>
        <div class="blog-post-info">
        
            <div class="post-date">
                <?php echo get_the_date( 'd ', $post->ID ); ?>
                <span><?php echo get_the_date( 'M ', $post->ID ); ?></span>
            </div>
            <div>
                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>">
                    <?php 
                    $title = get_the_title();
                    $trim_title = wp_trim_words($title, 6, "");
                    echo $trim_title;?>
                    </a>
                </h2>
                <div class="post-meta">
                    <div class="post-meta-author">by 
                        <!-- <a href="#"><i>admin</i></a> -->
                        <?php
                        $get_author_id = get_the_author_meta('ID');
                        $get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));
                        ?>
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                            <i><?php the_author();?></i>
                        </a>
                    </div>
                    <div class="post-meta-social">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $wplogoutURL; ?>" target="_blank"><i class="icon-facebook-logo"></i></a>
                        <a href="https://twitter.com/intent/tweet?text=<?php echo $wplogoutTitle;?>&amp;url=<?php echo $wplogoutURL;?>&amp;via=wplogout" target="_blank"><i class="icon-twitter-logo"></i></a>
                        <a href="https://pinterest.com/pin/create/button/?url=<?php echo $wplogoutURL; ?>&amp;media=<?php echo $wplogoutImage; ?>&amp;description=<?php echo $wplogoutTitle; ?>" target="_blank"><i class="icon-a fa fa-pinterest"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?url=<?php echo $wplogoutURL; ?>&amp;title=<?php echo $wplogoutTitle; ?>&amp;mini=true" target="_blank"><i class="icon-a fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="post-teaser">
        <?php $content = get_the_content();
            $trim_content = wp_trim_words($content, 20, ".");
            echo $trim_content;
            ?>
        </div>
        <div class="mt-2">
            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-hover-fill">
                <i class="icon-right-arrow"></i>
                <span>Read more</span>
                <i class="icon-right-arrow"></i>
            </a>
        </div>
    </div>
</div>