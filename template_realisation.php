<?php /* Template Name: page realisation */ ?>

<?php get_header(); ?>


Je suis sur la page realisations

<style>
       li{    float: left;
    width: 33%;
    overflow: hidden;}
    li img {height:250px;}
    </style>

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


<div style="clear:both"></div>

<?php get_footer(); ?>