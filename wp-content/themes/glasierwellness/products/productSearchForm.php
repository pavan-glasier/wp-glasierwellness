<?php
global $wp;
$wp->parse_request();
//echo home_url( $wp->request );
?>

<form action="<?php echo site_url(); ?>/product-search/" class="content-search content-search--style2 d-flex mb-3" method="post">
    <div class="input-wrap">
        <input type="hidden" name="title" value="<?php echo home_url($wp->request); ?>" />
        <input type="text" class="form-control" name="search" value="<?php echo $search; ?>" placeholder="Search for Products" id="productSearch">
    </div>
    <button type="submit" id="productSBtn"><i class="icon-search"></i></button>
</form>