<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hindu_University_if_America
 */

get_header();
?>
  <header class="entry-header" <?php if (has_post_thumbnail( $post->ID ) ): ?>
          
          <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
          style="background-image: url('<?php echo $image[0]; ?>');"  id="custom-bg" <?php endif; ?> >
          <!--?php the_title( '<h1 class="entry-title">', '</h1>' ); ?-->
     
  </header>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
 <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
