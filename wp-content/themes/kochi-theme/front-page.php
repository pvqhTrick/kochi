<!-- Trang TOP -->

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 */

get_header(); ?>
<div id="topSlider">
	<div class="wraper">
		<ul class="slide_top">
			<li><a class="hoverJS" href="#"><img src=<?php echo get_theme_file_uri() . ('/img/index/slide_photo1.png') ?> alt=""></a></li>
			<li><a class="hoverJS" href="#"><img src=<?php echo get_theme_file_uri() . ('/img/index/slide_photo2.png') ?> alt=""></a></li>
			<li><a class="hoverJS" href="#"><img src=<?php echo get_theme_file_uri() . ('/img/index/slide_photo3.png') ?> alt=""></a></li>
		</ul>
	</div>
	<script type="text/javascript">
		$('.slide_top').bxSlider({
			slideWidth: 1100,
			maxSlides: 1,
			moveSlides: 1,
		});
	</script>
</div>
<!-- #topSlider -->
<div id="content">
	<div class="toparea toparea1">
		<h2 class="areaTitle"><span class="txt">Where is <span>KOCHI</span>?</span></h2>
		<div class="wraper">
			<p class="map"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea1_map_photo.png' ?>
					alt=""></p>
			<p class="btn_access">
				<a href="#access" class="hoverJS"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea1_btn_access.png' ?> alt=""></a>
			</p>
		</div>
	</div>
	<!-- toparea1 -->
	<div class="toparea toparea2">
		<h2 class="areaTitle"><span class="txt">Movie</span></h2>
		<div class="wraper">
			<ul>
				<li>
					<a href="#" class="hoverJS" target="_blank">
						<p class="movie"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea2_movie1.png' ?>
								alt=""></p>
						<p class="title_movie">Movie Title</p>
					</a>
				</li>
				<li>
					<a href="#" class="hoverJS" target="_blank">
						<p class="movie"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea2_movie1.png' ?>
								alt=""></p>
						<p class="title_movie">Movie Title</p>
					</a>
				</li>
				<li>
					<a href="#" class="hoverJS" target="_blank">
						<p class="movie"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea2_movie1.png' ?>
								alt=""></p>
						<p class="title_movie">Movie Title</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- toparea2 -->
	<div class="toparea toparea3" id="recommended">
		<h2 class="areaTitle"><span class="txt">Recommended <span>Sights</span></span></h2>
		<div class="wraper">
			<div class="wraper_slide">
				<ul class="Recommen_slide">
					<li>
						<a href="#" class="hover_title">
							<p class="img_re"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea3_slide_photo1.png' ?> alt=""></p>
							<p class="title_re">Hirome Market</p>
						</a>
					</li>
					<li>
						<a href="#" class="hover_title">
							<p class="img_re"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea3_slide_photo2.png' ?> alt=""></p>
							<p class="title_re">Kochi Castle</p>
						</a>
					</li>
					<li>
						<a href="#" class="hover_title">
							<p class="img_re"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea3_slide_photo3.png' ?> alt=""></p>
							<p class="title_re">Katsurahama</p>
						</a>
					</li>
					<li>
						<a href="#" class="hover_title">
							<p class="img_re"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea3_slide_photo4.png' ?> alt=""></p>
							<p class="title_re">Sunday Market</p>
						</a>
					</li>
					<li>
						<a href="#" class="hover_title">
							<p class="img_re"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea3_slide_photo5.png' ?> alt=""></p>
							<p class="title_re">Mt.Godai</p>
						</a>
					</li>
					<li>
						<a href="#" class="hover_title">
							<p class="img_re"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea3_slide_photo6.png' ?> alt=""></p>
							<p class="title_re">Chikurinji</p>
						</a>
					</li>
				</ul>
			</div>
			<!-- wraper_slide -->
		</div>
		<script type="text/javascript">
			$('.Recommen_slide').bxSlider({
				slideWidth: 240,
				maxSlides: 6,
				moveSlides: 1,
				slideMargin: 22,
				pager: false
			});
		</script>
	</div>
	<!-- toparea3 -->
	<div class="toparea toparea4" id="toparea4">
		<h2 class="areaTitle"><span class="txt">Category</span></h2>
		
		<?php get_template_part('template-part/categories-image'); ?>

		<div class="boxListpost">
			<div class="boxHead">
				<ul class="displayBtn wraper">
					<li>
						<a class="hoverJS active" data-view="girdView" href="#">
							<img src=<?php echo get_theme_file_uri() . '/img/index/toparea4_gird_icon.png' ?> alt="">
							<img class="atc" src=<?php echo get_theme_file_uri() . '/img/index/toparea4_gird_icon_atc.png' ?> alt="">
						</a>
					</li>
					<li>
						<a class="hoverJS" data-view="listView" href="#">
							<img src=<?php echo get_theme_file_uri() . '/img/index/toparea4_list_icon.png' ?> alt="">
							<img class="atc" src=<?php echo get_theme_file_uri() . '/img/index/toparea4_list_icon_atc.png' ?> alt="">
						</a>
					</li>
				</ul>
			</div>
			<div class="boxContent">
				<div class="wraper">
					<div class="listSights">
						<?php
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 6,
						);
						$query = new WP_Query($args);
						if ($query->have_posts()):
							while ($query->have_posts()): $query->the_post(); 
								get_template_part('template-part/sight-item');
							endwhile; wp_reset_postdata();
						endif; ?>
					
						<!-- .listSights -->
						<p class="listSightBtn">
							<a class="hoverJS" href="<?php echo get_page_link(110) ?>"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea4_listpost_btn.png' ?> alt="List is here"></a>
						</p>
					</div>
				</div>
				<!-- .boxContent -->
			</div>
		</div>
		<!-- .toparea4 -->
		<div id="access" class="toparea toparea5">
			<h2 class="areaTitle"><span class="txt">Access</span></h2>
			<div class="wraper">
				<p class="areaPhoto"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea5_photo.png' ?>
						alt=""></p>
			</div>
		</div>
		<!-- .toparea5 -->
		<div class="toparea toparea6">
			<h2 class="areaTitle"><span class="txt"><span>Kochi City</span> Central Area</span></h2>
			<div class="wraper">
				<p class="areaPhoto"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea6_photo.png' ?>
						alt=""></p>
				<div class="boxStation">
					<div class="stationItem">
						<h3 class="staTitle"><span>A</span>Kochi Station： Bus Loading zone</h3>
						<div class="staInfo">
							<img src=<?php echo get_theme_file_uri() . '/img/index/toparea6_box_photo1.png' ?> alt="">
						</div>
					</div>
					<div class="stationItem">
						<h3 class="staTitle"><span>B</span>Harimaya Bridge： Bus Loading zone </h3>
						<div class="staInfo">
							<img src=<?php echo get_theme_file_uri() . '/img/index/toparea6_box_photo2.png' ?> alt="">
						</div>
					</div>
				</div>
				<!-- .boxStation -->
			</div>
		</div>
		<!-- .toparea6 -->
		<div class="toparea toparea7">
			<h2 class="areaTitle"><span class="txt">Link</span></h2>
			<div class="wraper">
				<div class="wrap_link">
					<ul class="link_slide">
						<li>
							<a href="#"><img src=<?php echo get_theme_file_uri('/img/index/toparea7_photo1.png') ?> alt=""></a>
						</li>
						<li>
							<a href="#"><img src=<?php echo get_theme_file_uri('/img/index/toparea7_photo1.png') ?> alt=""></a>
						</li>
						<li>
							<a href="#"><img src=<?php echo get_theme_file_uri('/img/index/toparea7_photo1.png') ?> alt=""></a>
						</li>
						<li>
							<a href="#"><img src=<?php echo get_theme_file_uri('/img/index/toparea7_photo1.png') ?> alt=""></a>
						</li>
						<li>
							<a href="#"><img src=<?php echo get_theme_file_uri('/img/index/toparea7_photo1.png') ?> alt=""></a>
						</li>
					</ul>
				</div>
			</div>
			<script type="text/javascript">
				$('.link_slide').bxSlider({
					slideWidth: 338,
					maxSlides: 5,
					moveSlides: 1,
					slideMargin: 4,
					pager: false
				});
			</script>
		</div>
		<!-- toparea7 -->
	</div>
	<!-- #content -->
	<?php get_footer(); ?>