<?php get_header(); ?>

		<?php if( is_front_page() ) { ?>

		<div class="content__mainline1 content__mainline">X Московская международная выставка коллекционных медведей Teddy</div>
		<div class="content__mainline2 content__mainline">состоится</div>
		<div class="content__mainline3 content__mainline">7 - 9 декабря 2018 года</div>
		<div class="content__mainline4 content__mainline">Тишинская пл., дом 1.</div>
		<div class="content__mainline5 content__mainline">Ежегодно в первые выходные декабря тысячи медведей со всего мира страдают бессонницей. На три дня выставки Hello Teddy  все мишки Тедди выходят из своей спячки, чтобы подарить нам немного праздника, привести в нужный предновогодний тонус и добавить в снежную московскую зиму детского тепла и уюта.</div>
		<div class="content__mainline6 content__mainline">МИШКИ ТЕДДИ ЖДУТ ВАС!</div>
		<div class="content__mainline7 content__mainline">города участников выставки</div>
		<div class="content__mainline8 content__mainline">(карта активная, под каждой цифрой город и имя художника)</div>

		<a class="content__map-link" href="https://yandex.ru/maps/?um=OVbudA1pgE8AhwPZZ35HK18K96tFaP59&ll=69.840874%2C55.716243&spn=277.734375%2C86.764122&z=3&l=map&mode=usermaps">
			<img class="content__map" src="<?php echo get_template_directory_uri(); ?>/img/map_1.jpg" alt="Карта" target="_blank">
		</a>

		<? } else { ?>

			<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>


			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			// End the loop.
			endwhile;
			?>

		<? } ?>

<?php get_footer(); ?>
