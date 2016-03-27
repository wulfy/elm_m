<?php
/**
 * @package WordPress
 * @subpackage Lmsecurite_2
 */
?>
<!-- begin sidebar -->
<div id="menu">
<a href="http://www.lmsecurite.fr/ludo/wordpress/"><img src="http://www.lmsecurite.fr/lm.png" class="logo"/></a>

<div id="searchBox">
		<?php get_search_form(); ?>
</div>
<button class="buttonMenu hidden" type="button" onclick="toggleDisplayMenu();"><i class="fa fa-align-justify fa-fw"></i></button>
<div class="listMenuitem" id="listMenuitem">
	<a class="menuItem" onclick="javascript:scrolltotop();" href="javascript:scrolltotop()"><i class="fa fa-arrow-up"></i>&nbsp; Top</a> 
	<a class="menuItem" href="http://www.lmsecurite.fr/ludo/wordpress/"><i class="fa fa-home fa-fw"></i>&nbsp; Accueil</a> 
	<a class="menuItem" href=" http://www.lmsecurite.fr/ludo/wordpress/?page_id=609"><i class="fa fa-envelope"></i>&nbsp; Contacts/Devis</a> 
</div>
				
<ul>
<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	<?php if ( has_nav_menu( 'primary' ) || 1 ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">

				<div class="fondVert">
					  <div class="fond">
					  <a class="list-group-item fondVert" href="./equipements-urbains/"><i class="fa fa-bus fa-fw"></i>&nbsp; Equipement Urbain</a>
						<?php // Primary navigation menu.
							wp_nav_menu( array(
								'menu_class'     => 'nav-menu',
								'theme_location' => 'primary',
							) ); ?>
					</div>
				</div>
				<div class="fondBleu">
					  <div class="fond">
					  <a class="list-group-item fondBleu" href="identification%20%20balisage%20%20condamnation%20%20signal%C3%A9tique%20%20imprimantes.htm"><i class="fa fa-print fafw"></i>&nbsp; Identification Brady</a>
						<?php // Primary navigation menu.
							wp_nav_menu( array(
								'menu_class'     => 'nav-menu',
								'theme_location' => 'secondary',
							) ); ?>
					</div>
				</div>
				<div class="fondBleuGris">
					  <div class="fond">
					  <a class="list-group-item fondBleuGris" href="protection%20,%20secours%20,%20securite.htm"><i class="fa fa-medkit fa-fw"></i>&nbsp; Protection sécurité</a>
						<?php // Primary navigation menu.
							wp_nav_menu( array(
								'menu_class'     => 'nav-menu',
								'theme_location' => 'tertiary',
							) ); ?>
					</div>
				</div>
				<div class="fondOrange">
					  <div class="fond">
					 <a class="list-group-item fondOrange" href="signalisation%20%20des%20%20vehicules.htm"><i class="fa fa-exclamation-triangle fa-fw"></i>&nbsp; Signalisation</a>
						<?php // Primary navigation menu.
							wp_nav_menu( array(
								'menu_class'     => 'nav-menu',
								'theme_location' => 'quartiary',
							) ); ?>
					</div>
				</div>

				
			</nav><!-- .main-navigation -->
		<?php endif; ?>
	<?php //wp_list_bookmarks('title_after=&title_before='); ?>
	<?php //wp_list_categories('title_li=' . __('Categories')); ?>
<?php endif; ?>

</ul>




</div>
<!-- end sidebar -->
