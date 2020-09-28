<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
      © <?php echo date("Y").' '.$_SERVER['HTTP_HOST']; ?> All Right Reserved.
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
