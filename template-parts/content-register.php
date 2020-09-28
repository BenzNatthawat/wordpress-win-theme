<?php
/*
 * Template name: Content Register
 * Template part for displaying a message that posts cannot be found
 *
 */
get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="container">
    <div class="row">
      <div class="col-sm">

      <form>
        <div class="form-group">
          <label for="username">ชื่อผู้ใช้งาน</label>
          <input name='username' type="text" class="form-control" id="username" placeholder="ชื่อผู้ใช้งาน">
        </div>
        <div class="form-group">
          <label for="password">รหัสผ่าน</label>
          <input name='password' type="password" class="form-control" id="password" placeholder="รหัสผ่าน">
        </div>
        <div class="form-group">
          <label for="password-confirm">ยืนยันรหัสผ่าน</label>
          <input name='password-confirm' type="password" class="form-control" id="password-confirm" placeholder="ยืนยันรหัสผ่าน">
        </div>
        <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
      </form>

	<?php underscores_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'underscores' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'underscores' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
  <?php endif; ?>
  
      </div>
    </div>
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
