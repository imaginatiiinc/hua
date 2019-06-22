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
		<!--?php the_title( '<h1 class="entry-title">', '</h1>' ); ?-->
                <h1 class="entry-title ">  
                <?php the_field('title'); ?> 
                <?php the_field('first_name'); ?> 
                <?php the_field('last_name'); ?><?php if( get_field('credential_letters') ): ?>,<?php endif; ?> 
                <?php the_field('credential_letters'); ?>
                </h1>
	</header><!-- .entry-header -->
        
        
        <div class="flex-container">
            <div class="staff-meta">
            <?php hua_post_thumbnail(); ?>
                <?php if( get_field('job_title') ): ?>
                    <h3 class="hua-title"><?php the_field('job_title'); ?></h3>
                <?php endif; ?>
                <?php if( get_field('email') ): ?>
                    <h3><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></h3>
                <?php endif; ?>
                <?php if( get_field('phone_number') ): ?>
                    <h3><a href="<?php the_field('phone_number'); ?>"><?php the_field('phone_number'); ?></a></h3>
                <?php endif; ?>
                <?php if( get_field('website') ): ?>
                    <h3><a href="<?php the_field('website'); ?>">Personal Website</a></h3>
                <?php endif; ?>
  
            </div>
            <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hua' ),
                            'after'  => '</div>',
                    ) );
                    ?>
                <a class="button" href="<?php echo get_site_url(); ?>/about/team">View our whole team</a>
            </div><!-- .entry-content -->
        </div>
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
