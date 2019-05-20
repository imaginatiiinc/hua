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
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php hua_post_thumbnail(); ?>

	<div class="entry-content">
                <?php if( get_field('credit_hours') ): ?>Credit Hours:<?php endif; ?> <?php the_field('credit_hours'); ?> 
                <?php if( get_field('prerequisites') ): ?>Prerequisites:<?php endif; ?> <?php the_field('prerequisites'); ?> 
                <?php if( get_field('instructor') ): ?>Instructor:<?php endif; ?> <?php the_field('instructor'); ?>
                <?php if( get_field('course_code') ): ?>Course Code:<?php endif; ?> <?php the_field('course_code'); ?>  
                
             <h2>Description</h2><?php the_excerpt(); ?>
		<h2>Course Content</h2><?php
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
