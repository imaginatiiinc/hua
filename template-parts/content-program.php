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
                    <!--h2>Courses In This Program</h2>
                                            <?php 

						/*
						*  Query posts for a relationship value.
						*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
						*/

						$courses = get_posts(array(
							'post_type' => 'course',
							'meta_query' => array(
								array(
									'key' => 'associated_programs', // name of custom field
									'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
									'compare' => 'LIKE',
                                                                    
								)
							)
						));

						?>
						<?php if( $courses ): ?>
							<ul>
							<?php foreach( $courses as $course ): ?>
								<?php 

								$credit_hours = get_field('credit_hours', $course->ID);
                                                                $course_code = get_field('course_code', $course->ID);
                                                                $thumbn = get_the_post_thumbnail($course->ID, 'thumbnail');
								?>
                                                            
                                                            
                                                            
								<li>
								<?php echo $course_code; ?> 
                                                                    <a href="<?php echo get_permalink( $course->ID ); ?>">
                                                                       <?php echo $thumbn ?> <?php echo get_the_title( $course->ID ); ?>
                                                                    </a> 
                                                                     Credit Hours: <?php echo $credit_hours; ?>
                                                                        
								</li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>

                    
                    
                    
                    
                    
                    
                    
                    
                    
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
