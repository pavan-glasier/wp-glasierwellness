<div class="prd">
    <div class="prd-img">
        <a href="<?php the_permalink(); ?>">
            <?php
            if (has_post_thumbnail()) { ?>
                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>" class="img-fluid" alt="<?php echo get_the_title(); ?>">
            <?php } else { ?>
                <img src="<?= site_url(); ?>/wp-content/uploads/2022/10/placeholder-img-glasierwellness.png" alt="noprivew">
            <?php }
            ?>
        </a>
    </div>
    <div class="prd-info">
        <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
        <a class="btn" href="<?php the_permalink(); ?>">
            <i class="icon-right-arrow"></i>Details<i class="icon-right-arrow"></i>
        </a>
        <!-- <button class="btn" onclick="openProductDetail(<?php echo $post->ID;?>)"><i class="icon-right-arrow"></i>Get Best Quote<i class="icon-right-arrow"></i></button> -->
    </div>
</div>

