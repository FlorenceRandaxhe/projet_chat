<?php
/*
    Template Name: Chatons
*/
get_header() ?>

<main>
    <div class="content">
        <div class="head_text">
            <p><?php the_field('introduction_chaton'); ?></p>
        </div>
        <a href="<?= get_home_url(); ?>#contact" class="btn-green" title="Vers le formulaire de contact">Nous contacter</a>

        <section>
            <h2 aria-level="2" role="heading" class="hidden">Les chatons disponibles pour l'adoption</h2>
        <?php
        $chatons = new WP_Query([
            'post_type'=>'chatons',
            'order'=>'DESC',
            'order_by'=>'date'
        ]);
        if ($chatons->have_posts()) : while ($chatons->have_posts()) : $chatons->the_post(); ?>

            <div class="kitten">
                <h3 aria-level="3" role="heading" class="title"><?php the_title(); ?></h3>
                <div class="kitten_picture">
                    <?php
                    $image = get_field('photo_chaton');
                    if( !empty($image) ): ?>
                        <img src="<?= $image['url']; ?>" alt=" " width="<?= $image['width']; ?>" height="<?= $image['height']; ?>">
                    <?php endif; ?>
                </div>
                <ul class="kitten_description">
                    <li>
                        <div>Sexe</div>
                        <div><?php the_field('sexe'); ?></div>
                    </li>
                    <li>
                        <div>Date de naissance</div>
                        <div><time datetime="<?php the_field('birth_date'); ?>"><?php the_field('birth_date'); ?></time></div>
                    </li>
                    <li>
                        <div>Couleur de la robe</div>
                        <div><?php the_field('color_robe'); ?></div>
                    </li>
                    <li>
                        <div>Couleur des yeux</div>
                        <div><?php the_field('color_eyes'); ?></div>
                    </li>
                    <?php $part = get_field('particularities');
                    if( $part): ?>
                        <li>
                            <div>Signes particuliers</div>
                            <div><?= $part; ?></div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

        <?php endwhile; else: ?>
            <div class="noproject">
                <div class="noproject_wrapper">
                    <p class="empty">Il n'y a pas de chaton à adopter en ce moment&nbsp;!</p>
                </div>
            </div>
        <?php endif; ?>
        </section>

    </div>
    <div id="back-to-top">
        <a href="#" title="Haut de page">
            <span class="hidden">Haut de page</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" version="1.1" width="50" height="50">
                <path d="M464 256c0-114.875-93.125-208-208-208S48 141.125 48 256s93.125 208 208 208 208-93.125 208-208zm-112 32H160l96-96 96 96z"/>
            </svg>
        </a>
    </div>
</main>

<?php get_footer() ?>
