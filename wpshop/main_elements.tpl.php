<?php
/*
 * General
	{WPSHOP_CART_LINK}		=> Link for the cart page
	{WPSHOP_CURRENCY}		=> Currency defined for the shop
 *
 */

$tpl_element = array();

/*
* LM SPECIFIC TEMPLATES
*
*/
ob_start();
?>
<div class="login_container">
	<ul class="user_infos">
		<li><strong> <a class="login_text" href="{WPSHOP_LOGIN_URL}"><i class="fa fa-user"></i> <span>{WPSHOP_ACCOUNT_LOGIN}</span></a></strong>
				
		</li>
	</ul>
</div>
<?php
$tpl_element['lm_logged_container'] = ob_get_contents();
ob_end_clean();

/*
* Not logged container
*/ 
ob_start();
?>
<div class="login_container">
	<ul class="user_infos">
		<li>
			 <a class="user_infos_more" href="{WPSHOP_LOGIN_URL}"><i class="fa fa-user"></i> <span>Se connecter</span></a>
		</li>
	</ul>
</div>
<?php
$tpl_element['lm_not_logged_container'] = ob_get_contents();
ob_end_clean();
/********************/

/*	"Add to cart" button	|							Bouton Ajouter au panier */
/**
 * {WPSHOP_PRODUCT_ID}
 *LLA: <button itemprop="availability" content="in_stock" type="button" id="wpshop_ask_a_quotation_{WPSHOP_PRODUCT_ID}" class="bton_bleu wpshop_ask_a_quotation_button wpshop_products_listing_bton_panier_active">Demander un devis</button>
 */
ob_start();
?>
<button itemprop="availability" content="in_stock" id="wpshop_add_to_cart_{WPSHOP_PRODUCT_ID}" class="wpbutton waves-effect waves-light btn wpshop_add_to_cart_button wps-bton-first-mini-rounded"><i class="wps-icon-basket"></i><?php _e('Add to cart', 'wpshop'); ?></button> <button itemprop="availability" content="in_stock" type="button" id="wpshop_ask_a_quotation_{WPSHOP_PRODUCT_ID}" class="wpbutton waves-effect waves-light btn bton_bleu wpshop_ask_a_quotation_button wpshop_products_listing_bton_panier_active">Demander un devis</button>

<?php
$tpl_element['add_to_cart_button'] = ob_get_contents();
ob_end_clean();

/*	Product mini display (List)										Produits mini liste */
ob_start();
?>
<li class="product_main_information_container-mini-list wpshop_clearfix wpshop_clear {WPSHOP_PRODUCT_CLASS} valign-wrapper" itemscope itemtype="http://data-vocabulary.org/Product" >
	{WPSHOP_PRODUCT_EXTRA_STATE}
	<a href="{WPSHOP_PRODUCT_PERMALINK}" class="product_thumbnail-mini-list" title="{WPSHOP_PRODUCT_TITLE}">{WPSHOP_PRODUCT_THUMBNAIL_MEDIUM}</a>
	<span class="product_information-mini-list valign" itemprop="offers" itemscope itemtype="http://data-vocabulary.org/Offers">
		<a href="{WPSHOP_PRODUCT_PERMALINK}" title="{WPSHOP_PRODUCT_TITLE}" class="wpshop_clearfix">
			<h2 itemprop="name" >{WPSHOP_PRODUCT_TITLE}</h2>
			<span class="crossed_out_price">{WPSHOP_CROSSED_OUT_PRICE}</span> {WPSHOP_PRODUCT_PRICE}
			{WPSHOP_LOW_STOCK_ALERT_MESSAGE}
			<p itemprop="description" class="wpshop_liste_description">{WPSHOP_PRODUCT_EXCERPT}</p>
		</a>
		{WPSHOP_PRODUCT_BUTTONS}
	</span>
</li><?php
$tpl_element['product_mini_list'] = ob_get_contents();
ob_end_clean();

/*	Product mini display (grid)									Produits mini grid */
ob_start();
?>
<li class="product_main_information_container-mini-grid {WPSHOP_PRODUCT_CLASS}" itemscope itemtype="http://data-vocabulary.org/Product" >
	<a href="{WPSHOP_PRODUCT_PERMALINK}" title="{WPSHOP_PRODUCT_TITLE}" itemprop="offers" itemscope itemtype="http://data-vocabulary.org/Offers" >
		<span class="wpshop_mini_grid_thumbnail product_thumbnail_{WPSHOP_PRODUCT_ID}">{WPSHOP_PRODUCT_THUMBNAIL_MEDIUM}</span>
		{WPSHOP_PRODUCT_EXTRA_STATE}
		<h2 itemprop="name" >{WPSHOP_PRODUCT_TITLE}</h2>
	    {WPSHOP_PRODUCT_PRICE}<br/>


	</a>
	{WPSHOP_PRODUCT_BUTTONS}
</li><?php
$tpl_element['product_mini_grid'] = ob_get_contents();
ob_end_clean();


/**
 *
 *
 * Categories display
 *
 *
 */
/*	Mini category (list)	*/
/*
 * {WPSHOP_CATEGORY_LINK}
 * {WPSHOP_CATEGORY_THUMBNAIL}
 * {WPSHOP_CATEGORY_TITLE}
 * {WPSHOP_CATEGORY_DESCRIPTION}
 * {WPSHOP_CATEGORY_ITEM_WIDTH}
 *
 * {WPSHOP_CATEGORY_ID}
 * {WPSHOP_CATEGORY_DISPLAY_TYPE}
 */
ob_start();
?><div class="category_main_information_container-mini-list wpshop_clear" >
	<a href="{WPSHOP_CATEGORY_LINK}" >
	<div class="category_thumbnail-mini-list" >{WPSHOP_CATEGORY_THUMBNAIL}</div>
		<div class="category_information-mini-list" >
			<div class="category_title-mini-list" >{WPSHOP_CATEGORY_TITLE}</div>
			<div class="category_more-mini-list" >{WPSHOP_CATEGORY_DESCRIPTION}</div>
		</div>
	</a>
</div><?php
$tpl_element['category_mini_list'] = ob_get_contents();
ob_end_clean();

/*	Mini category (grid)	*/
/*
 * {WPSHOP_CATEGORY_LINK}
 * {WPSHOP_CATEGORY_THUMBNAIL}
 * {WPSHOP_CATEGORY_TITLE}
 * {WPSHOP_CATEGORY_DESCRIPTION}
 * {WPSHOP_CATEGORY_ITEM_WIDTH}
 *
 * {WPSHOP_CATEGORY_ID}
 * {WPSHOP_CATEGORY_DISPLAY_TYPE}
 */
ob_start();
?><div class="category_main_information_container-mini-grid" style="width:{WPSHOP_ITEM_WIDTH};" >
	<a href="{WPSHOP_CATEGORY_LINK}" >
		<div class="category_thumbnail-mini-grid" >{WPSHOP_CATEGORY_THUMBNAIL}</div>
		<div class="category_information-mini-grid" >
			<div class="category_title-mini-grid" >{WPSHOP_CATEGORY_TITLE}</div>
			<div class="category_title-mini-grid" >{WPSHOP_CATEGORY_DESCRIPTION}</div>
		</div>
	</a>
</div><?php
$tpl_element['category_mini_grid_old'] = ob_get_contents();
ob_end_clean();

ob_start();
?><a href="{WPSHOP_CATEGORY_LINK}">


            <div class="item">
            		<div class="category_picture_container" ><div class="vertical_align_helper"></div><img src="{WPSHOP_CATEGORY_PICTURE}" /></div>
	        	<div class="item_title">{WPSHOP_CATEGORY_TITLE}</div>
	         </div>
         </a><?php
$tpl_element['category_mini_grid'] = ob_get_contents();
ob_end_clean();


/**
 *
 *
 * Product front display
 *
 *
 */
/*	Product complete sheet	|										Détails produits (single) */
/*
 * {WPSHOP_PRODUCT_THUMBNAIL}
 * {WPSHOP_PRODUCT_GALERY_PICS}
 * {WPSHOP_PRODUCT_PRICE}
 * {WPSHOP_PRODUCT_INITIAL_CONTENT}
 * {WPSHOP_PRODUCT_BUTTON_ADD_TO_CART}
 * {WPSHOP_PRODUCT_BUTTON_QUOTATION}
 * {WPSHOP_PRODUCT_BUTTONS}
 * {WPSHOP_PRODUCT_BUTTONS}
 * {WPSHOP_PRODUCT_GALERY_DOCS}
 * {WPSHOP_PRODUCT_FEATURES}
 */
ob_start();
?>
<section class="wps-single">
	<div class="wps-gridwrapper2">
		{WPSHOP_PRODUCT_COMPLETE_SHEET_GALLERY}
	<div class="detail_product_info">
		<div itemscope="" itemtype="http://schema.org/Product">
				<div class="wps-product-section">
					<h1 itemprop="name" class="entry-title">{WPSHOP_PRODUCT_TITLE}</h1>
					<div class="wps-productRating">[wps_star_rate_product pid="{WPSHOP_PRODUCT_ID}"]</div>
					
					<div class="wps-prices" itemscope itemtype="http://schema.org/Offer">{WPSHOP_PRODUCT_PRICE}</div>
				</div>
				<div class="wps-product-section">[wps_low_stock_alert id="{WPSHOP_PRODUCT_ID}"]</div>
				<div class="wps-product-section">
					<p itemprop="description">{WPSHOP_PRODUCT_INITIAL_CONTENT}</p>
				</div>
				<div class="wps-product-section">
					{WPSHOP_PRODUCT_VARIATIONS}
				</div>
			{WPSHOP_PRODUCT_QUANTITY_CHOOSER}
			{WPSHOP_PRODUCT_BUTTONS}

			<p>
				<?php echo apply_filters('wps-below-add-to-cart', "");?>
			</p>

			{WPSHOP_PRODUCT_GALERY_DOCS}
		</div>
	</div>
</div>
[wps_product_caracteristics pid="{WPSHOP_PRODUCT_ID}"]
</section>
<?php
$tpl_element['product_complete_tpl'] = ob_get_contents();
ob_end_clean();






