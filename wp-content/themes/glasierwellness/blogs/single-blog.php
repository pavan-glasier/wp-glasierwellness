<?php
$wplogoutURL = urlencode(get_the_permalink());
$wplogoutTitle = urlencode(get_the_title());
$wplogoutImage = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));
?>

<div class="page-content">
    <!--section-->
    <div class="section mt-0">
        <div class="breadcrumbs-wrap">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="<?php echo site_url()?>">Home</a>
                    <span>Blog</span>
                </div>
            </div>
        </div>
    </div>
    <!--//section-->
    <!--section-->
    <div class="section page-content-first">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 aside pb-5">
                    <div class="blog-post blog-post-single">
                        <div class="blog-post-info">
                            <div class="post-date">
                                <?php echo get_the_date('d ', $post->ID); ?>
                                <span><?php echo get_the_date('M ', $post->ID); ?></span>
                            </div>
                            <div>
                                <h2 class="post-title">
                                    <?php echo get_the_title(); ?>
                                </h2>
                                <div class="post-meta">
                                    <div class="post-meta-author">by
                                    <?php $author_id=$post->post_author; ?>
                                        <?php
                                        ?>
                                        <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>">
                                            <i><?php the_author_meta( 'display_name', $author_id ); ?></i>
                                        </a>
                                    </div>

                                    <div class="post-meta-social">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $wplogoutURL; ?>" target="_blank"><i class="icon-facebook-logo"></i></a>
                                        <a href="https://twitter.com/intent/tweet?text=<?php echo $wplogoutTitle; ?>&amp;url=<?php echo $wplogoutURL; ?>&amp;via=wplogout" target="_blank"><i class="icon-twitter-logo"></i></a>
                                        <a href="https://pinterest.com/pin/create/button/?url=<?php echo $wplogoutURL; ?>&amp;media=<?php echo $wplogoutImage; ?>&amp;description=<?php echo $wplogoutTitle; ?>" target="_blank"><i class="icon-a fa fa-pinterest"></i></a>
                                        <a href="https://www.linkedin.com/shareArticle?url=<?php echo $wplogoutURL; ?>&amp;title=<?php echo $wplogoutTitle; ?>&amp;mini=true" target="_blank"><i class="icon-a fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-image">
                            <?php
                            if (has_post_thumbnail()) { ?>
                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>" alt="<?php echo get_the_title(); ?>">
                            <?php } else { ?>
                                <img src="<?= site_url(); ?>/wp-content/uploads/2022/10/placeholder-img-glasierwellness.png" alt="noprivew">
                            <?php }
                            ?>
                        </div>
                        <div class="post-text">
                        <?php echo get_the_content();?>
                        </div>
                        
                            
                        <?php
                            $posttags = get_the_tags();
                                if ($posttags) { ?>
							<ul class="tags-list">
							<?php foreach($posttags as $tag) { ?>
                                    <li><a href="<?php echo esc_attr( get_tag_link( $tag->term_id ) );?>"><?php echo $tag->name; ?></a></li>
                                    <?php } ?>
							</ul>
							<?php } ?>
                            
                    </div>
                    <div class="comments-block mt-4 mt-lg-7">
                        <h3><?php echo get_comments_number();?> Comment</h3>
                        <div class="comments">
                        <?php $comments_number = get_comments_number();
                            if($comments_number != 0){  ?>
                            
                            
                            <?php 
                            // $args1 = array(
                            // 	'callback'          => 'better_comments',
                            // );
                            ?>
                            <?php $args1 = array(
                                'add_below' 		=> true,
                                'depth'     		=> 4,
                                'max_depth' 		=> 20,
                                'callback'          => 'better_comments',
                                'reverse_top_level' => false,
                                'reverse_children'  => true,
                            ); ?>
                            <?php
                            $comments = get_comments(array(
                                'post_id' => $post->ID,
                                'status' => 'approve'
                                ));
                                wp_list_comments($args1, $comments);
                            }
                            ?>
                            <?php
                            
                            ?>
                            
                        </div>
                    </div>
                    <div class="clearfix mt-3 mt-lg-4"></div>
                    

                <?php  $fields =  array(

                'author' => '<div class="mt-15 row"><div class="col-md-10"> <label>Your name*</label><input class="form-control" id="author" name="author" type="text" /></div></div>',
                'email' => '<div class="mt-15 row"><div class="col-md-10"> <label>Email*</label><input class="form-control" id="email" name="email" type="text" /></div></div>',
                );
                $args = array(

                'title_reply'       => '<h3>Leave a Comment</h3>',
                'fields' => $fields,
                'comment_field' => '<div class="mt-15 row"><div class="col-md-10"><label>Message*</label><textarea id="comment" name="comment" cols="30" rows="10" placeholder="Comment" class="form-control" aria-required="true">' .
                '</textarea></div></div>',
                'id_form'           => 'commentform',
                'class_form'      => 'contact-form mt-2 pb-0',
                'comment_notes_before' => '<p>Your email address will not be published. Required fields are marked *</p>',
                'label_submit'      => 'Submit',
                'id_submit'         => 'submitt',
                'class_submit'      => 'btn btn-primary comment-btn',
                'submit_field'         => '<p class="mt-2">%1$s %2$s</p>',
                'name_submit'       => 'submit',
// 				'comment_notes_after' => ,
                );
                ?>
                <?php comment_form($args);?>
                </div>
                <?php get_template_part('blogs/blog-sidebar'); ?>
                
            </div>
        </div>
    </div>
    <!--//section-->
</div>