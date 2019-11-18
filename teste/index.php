<?php
$queryTaxonomy = array_key_exists('taxonomy', $_GET);
if($queryTaxonomy && $_GET['taxonomy'] === '') {
    wp_redirect(home_url());
}
$css_escolhido = 'index';
require_once('header.php');
?>
<main class="home-main">
	<div class="container">

    <?php $taxonomias = get_terms('localizacao'); ?>
    <form class="busca-localizacao-form" action="<?php bloginfo('url'); ?>">
        <div name="taxonomy-select-wrapper">
       <select class="taxonomy">
       <option value="">Todos os imóveis</option>
       <?php foreach($taxonomias as $taxonomia){ ?>
            <option value="<?php echo $taxonomia->slug; ?>"><?php echo $taxonomia->name; ?>
            </option>
       <?php } ?>
       </select>
       </div>     
       <button type="submit">Filtrar</button>
    </form>

        <?php 
        if($queryTaxonomy) {
            $taxQuery = array(
                array(
                'taxonomy' =>'localizacao',
                'field' => 'slug',
                'terms' => $_GET['taxonomy'] //https://www.php.net/manual/en/reserved.variables.get.php
                )
            );
        }

			$args = array( 
                'post_type' => 'imovel',
                'tax_query' => $taxQuery
            );

       		$loop = new WP_Query( $args );
			if( $loop->have_posts() ) { ?>
			<ul class="imoveis-listagem">
			<?php while( $loop->have_posts() ) {
					$loop->the_post(); ?>

				<li class="imoveis-listagem-item">
					<a href="<?= the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>

						<h2><?php the_title(); ?></h2>

						<p><?php the_content(); ?></p>
					</a>
				</li>

			<?php } ?>
			</ul>
		<?php	} ?>
	</div>
</main>


<?php get_footer(); ?>
