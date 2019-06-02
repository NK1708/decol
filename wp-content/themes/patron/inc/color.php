<?php 

if(!function_exists('patron_custom_color_style')){
    function patron_custom_color_style(){
        
	global $patron_option;
	ob_start();

?>
	
	<?php if($patron_option['preload-switch']!= false){ ?>
		.preloader {background: <?php echo esc_attr( $patron_option['preload-bg-color'] ); ?>;}
		#ajaxloader3 .outer {
			border: 5px solid <?php echo esc_attr( $patron_option['preload-border-color'] ); ?>;
			border-right-color: transparent;
			border-left-color: transparent;
			-webkit-box-shadow: 0 0 35px <?php echo esc_attr( $patron_option['preload-shadow-color'] ); ?>;
			-moz-box-shadow: 0 0 35px <?php echo esc_attr( $patron_option['preload-shadow-color'] ); ?>;
			box-shadow: 0 0 35px <?php echo esc_attr( $patron_option['preload-shadow-color'] ); ?>;
		}
		#ajaxloader3 .inner {
			border: 5px solid <?php echo esc_attr( $patron_option['preload-border-color'] ); ?>;
			border-left-color: transparent;
			border-right-color: transparent;
			-webkit-box-shadow: 0 0 15px <?php echo esc_attr( $patron_option['preload-shadow-color'] ); ?>;
			-moz-box-shadow: 0 0 15px <?php echo esc_attr( $patron_option['preload-shadow-color'] ); ?>;
			box-shadow: 0 0 15px <?php echo esc_attr( $patron_option['preload-shadow-color'] ); ?>;
		}
	<?php } ?>
	<?php if($patron_option['banner-text-color']!=false){ ?>
		.page-titile, .banner-nav a, .banner-nav li {
			color: <?php echo esc_attr( $patron_option['banner-text-color'] ); ?>
		}
	<?php } ?>

	<?php if($patron_option['banner-image-switch']==false){ ?>
		#banner:before {
			background-color: transparent !important
		}
		.page-titile, .banner-nav a, .banner-nav li {
			color: #030d26
		}
	<?php } ?>

	<?php if($patron_option['scroll-fixed-header']==true){ ?>
	<?php if($patron_option['scroll-fixed-header-mobile']==false){ ?>@media screen and (min-width:768px){ <?php } ?>
		.header.fixed-header {
		  animation-duration: 1s;
		  animation-name: menu_sticky;
		  animation-timing-function: ease-out;
		  left: 0;
		  margin: 0;
		  position: fixed;
		  top: 0;
		  width: 100%;
		  z-index: 100;
		  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2)
		}
	<?php if($patron_option['scroll-fixed-header-mobile']==false){ ?> } <?php } ?>
	<?php } ?>
	<?php if($patron_option['header-border-bottom-color']){ ?>
		#header-2 .main-nav{
			border-bottom:1px solid <?php echo esc_attr( $patron_option['header-border-bottom-color'] ); ?>
		}
	<?php } ?>
	<?php if($patron_option['header_style'] != '2'){ ?>
		.main-nav, #header-3 .main-nav { 
			background-color:<?php echo esc_attr($patron_option['header_bg_color']['rgba']); ?>
		}
	<?php } ?>
	<?php if($patron_option['main-nav-text-color']){ ?>
		.navbar-default .navbar-nav > li > a,
		.navbar-default .navbar-nav .open .dropdown-menu > li > a,
		.mega-menu > li > a, 
		.mega-menu-child> li > a {
			color: <?php echo esc_attr( $patron_option['main-nav-text-color'] ); ?>
		}
	<?php } ?>
	<?php if($patron_option['pt-bg-color2']){ ?>
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
		.filter-range::before,.filter-range::after, 
		.filter-range, .product-item:hover .discount,
		.view-category .grid-view:hover,
		.view-category .grid-view:focus,
		.view-category .grid-view.active,
		.view-category .list-view:hover,
		.view-category .list-view:focus,
		.view-category .list-view.active,
		.woocommerce nav.woocommerce-pagination ul li a:focus,
		.woocommerce nav.woocommerce-pagination ul li a:hover,
		.woocommerce nav.woocommerce-pagination ul li span.current,
		.woocommerce span.onsale, .woocommerce-product-search input[type="submit"],
		.pagination > li > span.current,
		.pagination>li>a:hover, .pagination > .active > a, 
		.pagination > .active > a:focus, 
		.pagination > .active > a:hover, .pagination > .active > span, 
		.pagination > .active > span:focus, .pagination > .active > span:hover, 
		.pagination > li > a:focus, .pagination > li > a:hover, 
		.pagination > li > span:focus, .pagination > li > span:hover{
			background-color: <?php echo esc_attr( $patron_option['pt-bg-color2'] ); ?>
		}
		.service-item.bg-white:before,
		.service-item.bg-gray:before {
			background: <?php echo esc_attr( $patron_option['pt-bg-color2'] ); ?>
		}
		.sign-form::before,
		.vc_toggle_title::after,
		.vc_toggle_title::before,
		.woocommerce-MyAccount-navigation ul li a:hover,
		.woocommerce-MyAccount-navigation ul li.is-active a,
		.service-list li.active a,
		.service-list a:hover,
		.social-icon li a i.fa:hover,
		.wp-tag-cloud a:hover,
		.woocommerce .single_add_to_cart_button.button.alt:hover,
		.owl-theme .owl-controls .owl-nav [class*="owl-"]:hover,
		.btn-cart:hover, .about-category-nav a:focus, 
		.about-category-nav .active a, .about-category-nav li a::after,
		blockquote, .project-experience .overlay, .progress-bar,
		.pricing-item:hover .month-rate, .pricing-item:hover .btn-secondary, .pricing-nav li a:hover,
		.team-member:hover .team-overlay, .arrow1 a i,
		.achivement > span::after,
		.testimonials-carousel.owl-carousel .owl-dot.active span,
		.slider-item .carousel-indicators .active{
			background-color: <?php echo esc_attr( $patron_option['pt-bg-color2'] ); ?>
		}
		.btn-primary:hover, 
		.btn-primary:focus,
		.pricing-item:hover .month-rate, .pricing-item:hover .btn-secondary, .pricing-nav li a:hover,
		.experience-content-right h6::before, .experience-content-left h6::before, .experience-item,
		.slider-item .carousel-indicators .active {
			border-color: <?php echo esc_attr( $patron_option['pt-bg-color2'] ); ?>
		}
		.btn-experience-left .btn-primary::before, .btn-experience-right .btn-primary::before {
			border-top-color: <?php echo esc_attr( $patron_option['pt-bg-color2'] ); ?>
		}
		.tag-share span a,
		.widget_rss cite,
		.blog-detail a,
		.widget_recent_comments ul li:hover,
		#wp-calendar a,
		.blog-text a,
		.blog-detail .post-info span a:hover,
		.widget_archive li:hover,
		.widget_categories ul li,
		.blog-detail .tag-share .btn-share a:hover,
		.top-right ul li ul.dropdown-menu a:hover,
		.woocommerce div.product p.price .woocommerce-Price-amount,
		.blog-detail:hover .blog-text a .thumb-titile, 
		.related-post .post:hover a, 
		.related-post .post .comment i, 
		.comment-detail .replay, 
		.comment-reply-link,
		.cart-dropdown li a:hover, .top-right ul li a:hover,
		.navbar-default .navbar-nav .open .dropdown-menu > .active > a, 
		.navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus, 
		.navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
		.navbar-default .navbar-nav .open .dropdown-menu > li > a:focus, 
		.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
		.woocommerce ul.cart_list li:hover a,
		.woocommerce ul.product_list_widget li:hover a,
		.woocommerce .products .star-rating,
		.product-categories li a:hover,
		.product-categories li.current-cat > a,
		.woocommerce .star-rating,
		.product-list li a:hover, .slide-arrow a:hover, 
		.rating, .btn-stock i, .latest-product ul li:hover .post-txt h6, 
		.product-item:hover .product-detail .woocommerce-loop-product__title,
		.btn-primary:hover, 
		.btn-primary:focus,
		.service-item:hover .service-title,
		.service-item:hover a,
		.service-item:hover [class^="flaticon-"]:before,
		.about-video a:hover [class^="flaticon-"]::before,
		.specification-item span,
		.pricing-item:hover .thumb-title,
		.color-default,
		.welcome-item .btn-link,
		.blog-item:hover .thumb-title{
			color: <?php echo esc_attr( $patron_option['pt-bg-color2'] ); ?>
		}
		.owl-theme .owl-controls .owl-nav [class*="owl-"] {
			color: <?php echo esc_attr( $patron_option['pt-bg-color2'] ); ?>;
			border-color: <?php echo esc_attr( $patron_option['pt-bg-color2'] ); ?>
			}
	<?php } ?>
	<?php if($patron_option['pt-bg-color3']){ ?>
		.widget_rss a,
		.widget ul li a,
		.widget_categories li,
		.woocommerce ul.products li.product .price,
		.woocommerce ul.cart_list li a,
		.woocommerce ul.product_list_widget li a,
		.product-categories li a,
		.info-pages .btn-link, 
		.about-category-nav a,
		.product-list li a, 
		.slide-arrow a, 
		.product-detail .product-name,
		.service-widget .btn-secondary:hover [class^="flaticon-"]::before,
		.service-widget .btn-secondary:focus [class^="flaticon-"]::before,
		.footer-widget .social-icon li a i,
		.team-member .designation,
		.btn-link, .btn-link:focus, .btn-link:hover,
		.prgs-bar > span, .skill-percent, .skill-percent .count-num {
			color: <?php echo esc_attr( $patron_option['pt-bg-color3'] ); ?>
		}
		.woocommerce .single_add_to_cart_button.button.alt,
		.woocommerce a.add_to_cart_button, .btn-cart, .btn-stock .btn:hover,
		.woocommerce div.product form.cart .button,
		.woocommerce nav.woocommerce-pagination ul li a,
		.woocommerce nav.woocommerce-pagination ul li span,
		.pagination > li > a, 
		.pagination > li > span,
		.wp-tag-cloud a,
		.skill-progress .progress,
		.team-overlay .social-icon a i:hover,
		.navbar-nav .dropdown-menu, .mega-menu,
		.testimonials-carousel.owl-carousel .owl-dot span {
			background-color: <?php echo esc_attr( $patron_option['pt-bg-color3'] ); ?>
		}
	<?php } ?>
	.gallery-item:hover .overlay,
	.overlay-2:before{
		background-color: <?php echo esc_attr( $patron_option['ot-overlay-rgba1']['rgba'] ); ?>
	}
	.ad-banner::before,
	.blog-item:hover .overlay,
	.overlay-1::before{
		background-color: <?php echo esc_attr( $patron_option['ot-overlay-rgba2']['rgba'] ); ?>
	}

	<?php
		// Primary font color
		if($patron_option['pt-font-color4'] != false){ 
	?>
		.history_info::before, .history_info span,
		.info-pages .according_details span,
		.info-pages .career_according strong,
		.info-pages [class^="flaticon-"]::before,
		.footer-widget .widget ul li a:hover,
		.widget ul li a:hover,
		.widget_categories li a:hover, 
		.widget_archive li a:hover, 
		.widget_recent_entries ul li a:hover,
		.special-service-item .thumb-title,
		#footer-bottom li a:hover, 
		.copyright span a:hover,
		.article-list li a:hover, 
		.article-list li.active, 
		.article-list li.active a, 
		.article-details a, 
		.agreement-list li i.fa,
		.banner-nav li:last-child {
			color: <?php echo esc_attr( $patron_option['pt-font-color4'] ); ?>
		}
		.history_info::before {
			border-color: <?php echo esc_attr( $patron_option['pt-font-color4'] ); ?>
		}
		.wpb-js-composer .vc_tta.vc_general .vc_active .vc_tta-panel-title a {
			color: <?php echo esc_attr( $patron_option['pt-font-color4'] ); ?> !important;
		}
	<?php } ?>

	<?php 
		// Navigation font color
		if($patron_option['pt-font-color5'] != false){ 
	?>
		.dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover, .dropdown-menu > li.active > a,
		.navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > li > a:hover, 
		.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, 
		.navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .open > a, 
		.navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
			color: <?php echo esc_attr( $patron_option['pt-font-color5'] ); ?>
		}
	<?php } ?>

<?php
		$css = ob_get_clean();
		return $css;
    }
}