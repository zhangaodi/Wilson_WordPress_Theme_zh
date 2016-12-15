<?php get_header(); ?>

<div class="content">

	<?php if (have_posts()) : ?>

		<?php
		$paged = ( get_query_var( 'paged' ) ?: 1 );
		$total_post_count = wp_count_posts();
		$published_post_count = $total_post_count->publish;
		$total_pages = ceil( $published_post_count / $posts_per_page );

		if ( '1' < $paged ) : ?>

			<div class="page-title">

				<h4><?php printf( __( '第 %s 页，共 %s 页', 'wilson' ), $paged, $wp_query->max_num_pages ); ?></h4>

			</div>

		<?php endif; ?>

		<div class="posts">

	    	<?php while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		    		<?php get_template_part( 'content', get_post_format() ); ?>

	    		</div> <!-- .post -->

	        <?php endwhile; ?>

		<?php endif; ?>

	</div> <!-- .posts -->

	<?php if ( $wp_query->max_num_pages > 1 ) : ?>

		<div class="archive-nav">

			<?php echo get_next_posts_link( __( '&laquo; <span>较早的内容</span>', 'wilson' ) ); ?>

			<?php echo get_previous_posts_link( __( '<span>较新的内容</span> &raquo;', 'wilson' ) ); ?>

			<div class="clear"></div>

		</div> <!-- .archive-nav -->

	<?php endif; ?>

	<?php get_footer(); ?>
