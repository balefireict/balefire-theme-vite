<?php
/**
 * The template for displaying the footer. 
 *
 * Contains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
	<footer>
		<section class="container">
			<div class="row">
				<div class="col-sm-12">
					<p class="copyright">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
					<p class="siteby"><a href="https://balefireagency.com" target="_blank" title="Balefire Marketing + Advertising">Web Design by Balefire Marketing + Advertising</a></p>
					<nav id="nav-footer">
						<?php balefire_footer_links(); ?>
					</nav>
				</div>
			</div>
		</section>
	</footer>

	<div class="cookies">
		<div id="cookieConsent" class="wrapper">
			<p>This site uses cookies. By continuing to browse this site you are agreeing to our use of cookies. <a href="/privacy-policy" title="Privacy policy">View our Privacy Policy</a>. <a href="#" class="accept"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg></a></p>
		</div>
	</div>

</div> <!-- end #page -->
<?php wp_footer(); ?>
</body>
</html>