<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>

<p class="backtotop">
    <a class="hoverJS" href="#"><img src=<?php echo get_theme_file_uri().'/img/common/backtotop_icon.png' ?> alt=""></a>
</p>
<div id="footer">
	<div class="wraper">
		<p class="copyright">Copyright (C) 2024 Phan Van Quoc Hung.</p>
		<p class="posiImg"><img src=<?php echo get_theme_file_uri().'/img/common/footer_bg_right.png' ?> alt=""></p>
	</div>
	<!-- .wraper -->
</div>
<!-- #footer -->
<?php wp_footer(); ?>
</body>

</html>