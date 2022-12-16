<?php
// My custom comments output html
function better_comments( $comment, $args, $depth ) {

	// Get correct tag used for the comments
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'div';
		$add_below = 'div-comment';
	} ?>

	<<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">

	<?php
	// Switch between different comment types
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' : ?>
		<div class="pingback-entry">
			<span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'glasierwellness' ); ?></span> <?php comment_author_link(); ?>
		</div>
	<?php
		break;
		default :

		if ( 'div' != $args['style'] ) { ?>
		<!-- <div id="div-comment-<?php comment_ID() ?>" class="commen-item"> -->
			<?php } ?>
			<div class="userpic d-none d-sm-block">
				<div class="author">
				<?php
				// Display avatar unless size is set to 0
				if ( $args['avatar_size'] != 0 ) {
					$avatar_size = ! empty( $args['avatar_size'] ) ? $args['avatar_size'] : 70; // set default avatar size
						echo get_avatar( $comment, $avatar_size );
				} ?>
				</div>
				
			</div>
			<!-- .comment-author -->
			<div class="text">
				
				<div class="meta">
					<!-- <a href="#" class="meta-author">
						<b>admin</b>
					</a> -->
					<?php printf( __( '<b class="meta-author">%s</b>', 'glasierwellness' ), get_comment_author_link() ); ?>
					<span class="meta-date">
						<i class="icon icon-clock3"></i>
						<?php
							/* translators: 1: date, 2: time */
							printf(
								__( '%1$s at %2$s', 'glasierwellness' ),
								get_comment_date(),
								get_comment_time()
							); 
						?>
					</span>
				</div>
				<p><?php comment_text(); ?></p>
				<?php
				// Display comment reply link
				comment_reply_link( array_merge( $args, array(
					'reply_text' => __('<i class="icon-reply-black"></i>Reply', 'glasierwellness'),
					'add_below' => $add_below,
					'depth'     => $depth,
					'max_depth' => $args['max_depth']
				) ) ); ?>
				
				
				<!-- <a href="<?php //echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
				
					</a> -->
					<?php
					//edit_comment_link( __( '(Edit)', 'glasierwellness' ), '  ', '' ); ?>
			</div>
	<?php
		if ( 'div' != $args['style'] ) { ?>
		<!-- </div> -->
		<?php }
	// IMPORTANT: Note that we do NOT close the opening tag, WordPress does this for us
		break;
	endswitch; // End comment_type check.
	?>
	</div>
	<?php }