<?php 
/* Template Name: Accueil Montereau */ 
?>


<?php get_header(); ?>




<header style="background:url(<?= get_field('image_home'); ?>);     background-size: cover;    background-position: center;">
<div class="center">
            <h1><?= get_field('accroche_home'); ?></h1>
        </div>
        
</header>

<section id="agency">
        <div class="container agencyflex">
            <div class="bloctitre">

                <?php 
                    if(get_field('rotation_titre_introduction')!=""){
                        $rotation = get_field('rotation_titre_introduction');
                    }else{
                        $rotation = 45;
                    }

                ?>


                <div class="fondtitre" style="transform: rotate(<?= $rotation; ?>deg);"><?= get_field('fond_titre_introduction'); ?></div>
                <div class="titre"><?= get_field('titre_introduction'); ?></div>
            </div>

            
                    <?php $blocs =  get_field('bloc_introduction'); ?>


                    <?php
                    foreach ($blocs as $bloc) {
                    echo " <div class='bloc'><a href='".$bloc["lien_bloc_intro"]."'><img src='".$bloc["image_bloc_intro"]."' alt='write' class='agency-ico'><h2>".$bloc["titre_bloc_intro"]."</h2><p>".$bloc["description_bloc_intro"]."</p></a></div>";






                    }
                    ?>

          



        </div>
    </section>

    <section id="portfolio" class="container ">
    <div class="row">
    <?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => '10' ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>



<?php $the_content = apply_filters('the_content', get_the_content()); ?>
<?php 



echo '
<div class="card" style="width: 18rem;">
 '.get_the_post_thumbnail( $post->ID, 'thumbnail' ).'
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">';
    echo esc_html( get_the_title() );
    echo '</h5>
    <p class="card-text">'.esc_attr(wp_strip_all_tags(get_the_content())).'</p>
    <a href="'.get_the_permalink().'" class="btn btn-primary">Go somewhere</a>
  </div>
</div>';
?>

<?php endwhile; wp_reset_query(); ?>
</div>
    
    </section>





