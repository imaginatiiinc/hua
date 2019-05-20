<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hindu_University_if_America
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
 
 
  <header class="entry-header" <?php if (has_post_thumbnail( $post->ID ) ): ?>
          
          <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
          style="background-image: url('<?php echo $image[0]; ?>');"  id="custom-bg" <?php endif; ?> >
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
     
  </header>
    
  <!-- .entry-header --><!-- .entry-header -->

 
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hua' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'hua' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
