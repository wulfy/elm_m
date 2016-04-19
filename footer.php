<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->

	</div><!-- #page -->
<script>
$( document ).ready(function(){

	$(".button-collapse").sideNav();
	var searchContent = $('#searchContent');
	if(searchContent.length)
		Materialize.showStaggeredList(searchContent);

	var searchBox = $("#searchBox");
	var searchbutton = $("#searchbutton");

	searchBox.focusout(function() {$(this).removeClass("animate")});
	searchbutton.click(function() {searchBox.toggleClass("animate"); (searchBox.is(":focus"))?'':searchBox.focus();});
})
</script>
<footer class="page-footer grey">
          <div class="container">
            <div class="row">
           	 <div class="col l4 s12">
                <h5 class="white-text">Contact</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!"><div  class="row valign-wrapper"><img class="imgfooter col s2." src="<?php bloginfo('template_directory'); ?>/images/lm.png"/> <span class="col s10">Michel Lasry</span></div></a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-envelope-o"></i> : lmsecurite@yahoo.fr</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-mobile"></i> : 06 68 54 96 28 </a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-phone"></i> : 04 50 27 46 33</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-map-marker"></i> : 31 Allee des romains 74370 PRINGY</a></li>
                </ul>
              </div>
              <div class="col l6 offset-l2 s12">
                <h5 class="white-text">Références</h5>
                <p class="grey-text text-lighten-4">Références  : Aéroports , Ambulances , Armée , Autoroutes , CEA , Centres  commerciaux , Centres  hospitaliers , CERN ,  CIRAD , Conseils  généraux , Communautés  de  communes , Délégation  générale  à  l'armement , Douanes , EADS , ERDF , Entreprises  , Garages , Industries , Mairies , Polices  , Préfectures  , RATP , Pompiers  SDIS , SAMU , SNCF , SNSM  , Stations  de  skis , Tunnel  du  mont  blanc ..</p>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2016 Copyright LmSecurite
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
		
	<?php wp_footer(); ?>
</body>
</html>