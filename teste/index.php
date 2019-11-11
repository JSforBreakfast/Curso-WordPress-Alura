<?php get_header();?>

<h1>Bem vindo(a)!</h1>

<?php
 if(have_posts()){
        while(have_posts()){
            the_post();
 ?>
    <h2><?php the_title(); ?></h2>
    <div><?php the_content();?></div>  
<?php       
    }
}
    ?>

<?php get_footer();?>
