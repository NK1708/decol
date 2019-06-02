<div class="content__left col-12 col-lg-4">
	<?php 
      wp_nav_menu( array(
        'menu_class'=>'content__list',
        'theme_location'=>'left',
        'container' => ''
      ) );
    ?>
  <!-- <ul class="content__list">
    <li class="content__list-item"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/list-pic.png" alt="Меню"><span>организатор</span></a></li>
    <li class="content__list-item"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/list-pic.png" alt="Меню"><span>партнеры</span></a></li>
    <li class="content__list-item"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/list-pic.png" alt="Меню"><span>наши баннеры</span></a></li>
  </ul> -->
  <div class="content__socicons">
  	<div class="content__socicons-title">Мы в социальных сетях</div>
  	<div class="content__socicons-list">
  		<a href="http://vk.com/club31213120"><img src="<?php echo get_template_directory_uri(); ?>/img/vk.png" alt=""></a>
  		<a href="https://www.facebook.com/groups/463314957045541/"><img src="<?php echo get_template_directory_uri(); ?>/img/fb.png" alt=""></a>
  		<a href="https://www.instagram.com/helloteddy_vystavka/"><img src="<?php echo get_template_directory_uri(); ?>/img/ig.png" alt=""></a>
  		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/yt.png" alt=""></a>
  	</div>
  </div>
	  <div class="content__vkbox">
	  <div id="vk_groups"></div>
		<script type="text/javascript">
		VK.Widgets.Group("vk_groups", {mode: 0, no_cover: 1, width: "250", height: '290'}, 31213120);
		</script>
	</div>
	  <div class="content__footer">
		<div class="content__counters"></div>
		<div class="content__copyright">Copyright © 2009-15, Russian Doll House Ltd</div>
	<div class="content__studio">
		<span class="content__studio-line1">Создание сайта</span>
		<span class="content__studio-line2">MStudio</span>
	</div>
	  </div>
</div>