    <footer class="footer-main" role="contentinfo">
        &copy;<?php echo date("Y"); ?> <a href="http://3them.es">3themes</a> &#8226; All rights reserved.
	    <nav class="footer_menu">
		    <?php wp_nav_menu( array(
			    'container'       => 'ul',
			    'menu_class'      => 'footer-nav',
			    'depth'           => 0,
			    'theme_location' => 'footer_menu'
		    ));
		    ?>
	    </nav>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>