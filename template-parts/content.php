<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php underscores_post_thumbnail(); ?>

  <ul class="pages-list">
           <?php $our_pages = get_pages($args); ?>
           <?php if (!empty($our_pages)): ?>
            <?php foreach ($our_pages as $key => $page_item): ?>
              <li>
                <?php echo get_post_thumbnail_id( $page->ID ) ?>
                <a href="<?php echo esc_url(get_permalink($page_item->ID)); ?>"><?php echo $page_item->post_title ; ?></a>
                <?php echo get_the_post_thumbnail($page_item->ID,'thumbnail'); ?>
              </li>
            <?php endforeach ?>
           <?php endif ?>
           </ul>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'underscores' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'underscores' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer">
		<?php underscores_entry_footer(); ?>
  </footer> -->
  <!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
