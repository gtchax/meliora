<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<meta name="author" content="<?php esc_attr_e('TeslaThemes','suarez'); ?>"/>

		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<?php wp_head(); ?>
	</head>
	<body id="page" <?php body_class();?>>
		<?php get_template_part('templates/searchform'); ?>
		<!-- Header -->
		<header class="main-header <?php if(_go('navigation_style') == "Sticky") echo 'sticky'; ?>">
			<?php get_template_part('templates/logo'); ?>

			<div class="header-actions-block">
				<!-- Secondary Nav -->
				<nav class="secondary-nav">
					<?php wp_nav_menu( 
						array(
							'theme_location' => 'secondary',
							'container' => false,
							'menu_class' => false
						)
					); ?>
					<span class="search-form-toggle">
						<i class="icon-search"></i>
					</span>

					<span class="primary-nav-toggle">
						<i class="icon-more-icon"></i>
					</span>
				</nav>

				<!-- Primary Nav -->
				<nav class="primary-nav">
					<span class="close-nav"><?php esc_html_e('Close', 'suarez') ?><i class="icon-cross"></i></span>

					<div class="nav-inner">
						<?php wp_nav_menu( 
							array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => false
							)
						); ?>
					</div>
				</nav>
			</div>
		</header>

		<!-- Main Content Box -->
		<div class="content-box">