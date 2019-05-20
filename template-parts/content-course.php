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
        
        
        
        
	<div class="entry-content">
            
            
            <ul class="course-meta">
            
            
                <?php if( get_field('credit_hours') ): ?><li>Credit Hours: <?php the_field('credit_hours'); ?></li> <?php endif; ?>
                
                <?php if( get_field('course_code') ): ?><li>Course Code: <?php the_field('course_code'); ?></li><?php endif; ?>
                
 						<?php 

						$prerequisite = get_field('prerequisites');

						?>
						<?php if( $prerequisite ): ?>
							<li> Prerequisites: 
                                                           
							<?php foreach( $prerequisite as $prerequisites ): ?>
								
                                                                <a href="<?php echo get_permalink( $prerequisites->ID ); ?>"><?php echo get_the_title($prerequisites->ID ); ?></a>
							<?php endforeach; ?>
                                                           
							</li>
						<?php endif; ?>     
                                                        
                                                        
 						<?php 

						$instructors = get_field('instructor');

						?>
						<?php if( $instructors ): ?>
							<li> Instructor(s): 
                                                           
							<?php foreach( $instructors as $instructor ): ?>
								
                                                                <a href="<?php echo get_permalink( $instructor->ID ); ?>"><?php echo get_the_title($instructor->ID ); ?></a>
							<?php endforeach; ?>
                                                           
							</li>
						<?php endif; ?>    
                
                
            </ul>
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
