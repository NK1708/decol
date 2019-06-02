<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Пути для css, js и изображений-->
    <!-- блок с meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <meta name="description" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/image.jpg"/>
    <!-- блок с favicon-->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.ico" type="image/x-icon"/>
    <!-- цвет в мобильной версии-->
    <meta name="theme-color" content="#000"/>
    <meta name="msapplication-navbutton-color" content="#000"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#000"/>
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
    <!-- подключение сss-->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen">
    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?159"></script>
  </head>

<body>
	<div class="m-header container">
		<div class="m-header__inner row">
			<nav class="navbar navbar-default" role="navigation">
		        <div class="container-fluid">
		        	<div class="m-header__left">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" class="m-header__logo">
					</div>
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle hamburger hamburger--collapse" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		                    <span class="hamburger-box">
		                        <span class="hamburger-inner"></span>
		                    </span>
		                </button>
		            </div>
		            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		               <!-- <ul class="m-header__menu">
                        <li class="m-header__menu-item"><a href="#" class="m-header__menu-link">О выставке</a></li>
                                       <li class="m-header__menu-item"><a href="#" class="m-header__menu-link">Фото</a></li>
                                       <li class="m-header__menu-item"><a href="#" class="m-header__menu-link">Участникам</a></li>
                                       <li class="m-header__menu-item"><a href="#" class="m-header__menu-link">Посетителям</a></li>
                                       <li class="m-header__menu-item"><a href="#" class="m-header__menu-link">Конкурс</a></li>
                                       <li class="m-header__menu-item"><a href="#" class="m-header__menu-link">Контакты</a></li>
                   </ul> -->
                   <?php 
                      wp_nav_menu( array(
                        'menu_class'=>'m-header__menu',
                        'theme_location'=>'top',
                        'container' => ''
                      ) );
                    ?>
		            </div>
		        </div>
		    </nav>
		</div>
	</div>

    <header class="header container">
      <div class="row">
        <div class="header__left col-4">
          <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" class="header__logo">
          <div class="header__text">Московская международная выставка коллекционных медведей Teddy</div></a>
        </div>
        <div class="header__menu col-8">
          <!-- <ul class="header__menu-list">
            <li class="header__menu-item"><a href="#" class="header__menu-link">О выставке</a></li>
            <li class="header__menu-item"><a href="#" class="header__menu-link">Фото</a></li>
            <li class="header__menu-item"><a href="#" class="header__menu-link">Участникам</a></li>
            <li class="header__menu-item"><a href="#" class="header__menu-link">Посетителям</a></li>
            <li class="header__menu-item"><a href="#" class="header__menu-link">Конкурс</a></li>
            <li class="header__menu-item"><a href="#" class="header__menu-link">Контакты</a></li>
          </ul> -->
          <?php 
          wp_nav_menu( array(
            'menu_class'=>'header__menu-list',
            'theme_location'=>'top',
            'container' => ''
          ) );
        ?>
        </div>
        
      </div>
    </header>

    <?php if( is_front_page() ) { ?>
       <div class="info container">
        <div class="row">
          <div class="info__left col-12 col-lg-4">
            <div class="info__title">
              <div class="info__title-number">Х</div>
              <h1 class="info__title-text">Московская международная выставка коллекционных медведей Teddy</h1>
            </div>
            <div class="info__box">
              <span>состоится</span>
              <span class="info__box-big">7 - 9 декабря 2018 года</span>
              <span>Тишинская пл., дом 1</span>
            </div>
            <div class="info__until">До начала выставки:</div>
            <div class="info__timer">
              <script class="info__timer" src="http://megatimer.ru/s/4fa43ddcf0781ec1df5ec0d3269939bb.js"></script>
            </div>
            <a href="#" class="info__btn"><img src="<?php echo get_template_directory_uri(); ?>/img/info-btn.png" alt="Купить билет"><span>купить билет</span></a>
          </div>
          <div class="info__pic col-12 col-lg-8"></div>
        </div>
      </div>
    <div class="content container"> 
    <? } else { ?>
    <div class="content container" style="border-top: 1px solid #DBD1C2"> 
    <? } ?>
    
      <div class="row">
        <?php get_sidebar(); ?>
        <div class="content__main col-12 col-lg-8">