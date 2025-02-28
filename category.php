<?php
/**
 * The template for displaying Category Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>


<div class="eleven columns centered"><?php //This just gives a little room on the edges.?>


  <!-- Get the Left Sidebar (if there is one)-->
  <?php get_sidebar('left'); ?>
  

  <!-- Main Content -->
  <div id="content" class="<?php print cogito_wp_col_class('content'); ?>" role="main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php
				printf( __( 'Category Archives: %s', 'twentyeleven' ), '<span>' . single_cat_title( '', false ) . '</span>' );
  			?></h1>

			<?php
				$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
			?>
		</header>

		<?php cogito_wp_content_nav( 'nav-above' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to overload this in a child theme then include a file
				 * called loop-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'loop', get_post_format() );
			?>

		<?php endwhile; ?>

		<?php cogito_wp_content_nav( 'nav-below' ); ?>

	<?php else : ?>
      <?php get_template_part( 'loop','noresult' ); ?>
	<?php endif; ?>

	</div><!-- #content -->

  			
  <!-- Right Sidebar (if there is one)-->
  <?php get_sidebar('right'); ?>
  
  
  
</div><?php //div eleven centered ?>


<?php get_footer(); ?>