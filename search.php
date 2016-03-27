<?php
/**
 * @package WordPress
 * @subpackage Lmsecurite_2
 */
get_header();
?>
<div id="primary" class="content-area">
		<div id="content" class="site-content <?php if(is_admin_bar_showing()) echo 'under_admin'; ?>" role="main">
			<div class=""><i class="fa fa-home"></i> <a href="<?php echo get_home_url(); ?>">Accueil</a> / <i class="fa fa-step-backward"></i> <a href="javascript:javascript:history.go(-1)"> Retour </a> </div>
			<div class="issearch displayMiddle">
			<?php if (have_posts()) : ?>

					<h1 class="page-title"> <i class="fa fa-search"></i> <?php printf( __( 'Résultats pour votre recherche : %s', 'lmsecurite_2' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					<?php if (is_search() && false) { ?>
						<p class="queryBlog"> Résultat pour la recherche <strong>'<?php the_search_query(); ?>'</strong>.</p>
					<?php } ?>

			 <?php $once = 1 ; ?>	
			 <?php /*echo ($GLOBALS['wp_the_query']->request); */?>
			 <div class="resultTypeTitle fondBleu"><i class="fa fa-product-hunt"></i> Produits <span>(<?php echo $wp_query->post_count ;?>)</span></div>
			<?php while (have_posts()) : the_post(); ?>

			 <?php if ($post->post_type != 'page' && $once && false) { $once = 0;?>
			 <div class="resultTypeTitle fondOrange"> page </div>
			  <?php } ?>

				 <?php if ($post->post_type != 'page'): //on affiche pas les pages?> 
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<div class="storyheader <?php if(is_single()) : ?>singlepost<?php endif; ?>">
						<h3 class="storytitle"><span class="storyComment"><?php /**comments_popup_link(__('0'), __('1'), __('%'), 'on', 'off');**/ ?></span><span class="postDate"><?php /**echo strftime('%m.%d.%y',strtotime(get_the_time('m/d/Y')));**/ ?></span> 
							<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
							<div class="search_thumb_container"><img src="<?php echo $thumb[0] ;?>" class="search_thumb" /></div>
							<span class="titleName"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></span></h3>
						</div>
				</div>
				<?php endif; ?>
			<?php endwhile; endif;
					if(has_terms()):?>
			<?php $oncecat = 1 ; ?>
			 <?php if ($oncecat) { $oncecat = 0; $termsresult = getTermsResults();?>
			 	<div class="resultTypeTitle fondOrange"><i class="fa fa-book"></i>  Catégories <span>(<?php echo sizeof($termsresult)?>)</span></div>
			  <?php } ?>
			 <?php foreach($termsresult as $key=>$term): ?>
			 <div class="searchresult category">
			 	<div class="search_thumb_container"><img class="search_thumb" src="<?php echo $termsdata[$term->term_id]['img'] ?>"></div>
			 	<div class="search_title_container"><h3 class="storytitle"><span class="titleName"><a href="<?php echo $termsdata[$term->term_id]['link'] ?>"><?php echo $term->name ?></a></span></h3></div>
			 </div>
			<?php endforeach; endif;?>
			<?php if(!have_posts() && ! has_terms()):?>
					<h2 class="searchtitle">Aucun résultat trouvé</h2>
					<p class="queryBlog">Essayer une recherche différente ?</p>
					<?php get_search_form(); ?>
			<?php endif;?>

			<div class="navi">
				<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			</div>

			</div>

</div>
</div>
<?php get_footer(); ?>
