<?php
/**
 * @package WordPress
 * @subpackage Mondo_Zen_Theme
 */

get_header(); ?>

	<div class="container">


      <?php 
            $post = get_page_by_title("Home_slider"); 
            $content = apply_filters('the_content', $post->post_content); 
            echo $content; 
          ?>

   
</div>

<?php get_footer(); ?>