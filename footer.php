<footer id="footer">
<div class="container text-center">

<!--  
 Deux façons d'appeler un menu et empecher qu'un menu par défaut soit afficher si la zone est vide -->

<?php
$menu = wp_nav_menu(
    array(
        'theme_location' => 'footer-menu',
        'container'      => 'nav',
        'menu_class'     => 'right no-bullets no-margin',
        'fallback_cb'    => false,
        'echo'           => false,
    )
);

if ( $menu ) {
    echo $menu;
} 

?>





<?php
if ( has_nav_menu( 'footer-menu' ) ) : ?>
<?php
wp_nav_menu ( array (
'theme_location' => 'footer-menu' ,
'container'      => 'nav',
'menu_class'     => 'right no-bullets no-margin',
) ); ?>
<?php endif;
?>


<p>Created with love by ACS Montereau</p>
</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>


