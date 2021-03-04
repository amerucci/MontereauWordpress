<?php /* Template Name: page about */ ?>

<?php get_header(); ?>


Je suis sur la page about


<?php 
$image = get_field('image_de_presentation'); 


echo "<img src='".$image."' />";

?>


<a href="<?php echo get_field('lien_bouton_contactez_moi'); ?>" class="">
    <span class="intitule">
        <?php echo get_field('intitule_bouton_contactez_moi'); ?>
    </span>
</a>
5

<?php
    $args = array( 'post_type' => 'post', 'posts_per_page' => 8 );


	$loop = new WP_Query( $args );
	
		while ( $loop->have_posts() ) : $loop->the_post();
	echo "<li>";
        echo '<a href="'.get_permalink().'">';	

                echo the_title();
                $image = get_field('image_realisation'); 
                echo "<img src='".$image."' />";
			echo '</a>';
            echo "</li>";
		
    	endwhile;

	


	?>


<?php get_footer(); ?>