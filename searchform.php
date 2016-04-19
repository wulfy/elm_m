<?php
/** searchform.php
 *
 * The template for displaying search forms
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 07.02.2012
 */
?>
<form method="get" id="searchform" class="form-search search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="assistive-text hidden"><?php _e( 'Search', 'the-bootstrap' ); ?></label>
	<div class="input-append search-wrapper card focused ">
		<input id="s" class="span2 search-query" type="search" name="s" placeholder="<?php esc_attr_e( 'Texte a rechercher','lmsecurite_2'); ?>">
		<button class="btn-floating btn-small red lighten-2 waves-effect waves-light searchbutton" name="submit" id="searchsubmit" type="submit"><i class="fa fa-search material-icons"></i></button><!--
	 -->
   	</div>
</form>
<?php


/* End of file searchform.php */
/* Location: ./wp-content/themes/the-bootstrap/searchform.php */