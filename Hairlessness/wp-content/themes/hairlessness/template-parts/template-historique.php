<?php
/*
    Template Name: Historique
*/
get_header() ?>
<main>
    <div class="content">
        <div class="secondary-nav historic-nav">
            <ul>
                <li><a href="#nav-1">Caractère du sphynx</a></li>
                <li><a href="#nav-2">Caractéristiques de concours</a></li>
                <li><a href="#nav-3">Origine de la race</a></li>
                <li><a href="#nav-4">Santé du sphynx</a></li>
                <li><a href="#nav-5">Histoire de la chatterie</a></li>
                <li><a href="#nav-6">De l naissance à l'adoption</a></li>
            </ul>
        </div>
        <section class="history">
            <h2 aria-level="2" role="heading" class="sub-title">Historique de la race</h2>
            <?php if( have_rows('caractere') ):  while( have_rows('caractere') ): the_row(); ?>
            <h3 aria-level="3" role="heading" class="title" id="nav-1"><?php the_sub_field('sous_titre'); ?></h3>
            <div class="histo_content">
                <?php the_sub_field('paragraphe_1'); ?>
            </div>
            <div class="histo_picture">
                <?php
                $image = get_sub_field('photo_1');?>
                    <img src="<?= $image['url']; ?>" width="<?= $image['width']; ?>" height="<?= $image['height']; ?>">
            </div>
            <div class="histo_content">
                <?php the_sub_field('paragraphe_2'); ?>
            </div>
            <div class="histo_picture">
                <?php
                $image_2 = get_sub_field('photo_2');?>
                    <img src="<?= $image_2['url']; ?>" width="<?= $image_2['width']; ?>" height="<?= $image_2['height']; ?>">
            </div>
            <div class="histo_content">
                <?php the_sub_field('paragraphe_3'); ?>
            </div>
            <?php endwhile; endif; ?>
            <?php if( have_rows('concours') ):  while( have_rows('concours') ): the_row(); ?>
                <h3 aria-level="3" role="heading" class="title" id="nav-2"><?php the_sub_field('sous_titre'); ?></h3>
                <div class="histo_content">
                    <?php the_sub_field('paragraphe_1'); ?>
                </div>
                <div class="histo_picture">
                    <?php
                    $image = get_sub_field('photo_1');?>
                    <img src="<?= $image['url']; ?>" width="<?= $image['width']; ?>" height="<?= $image['height']; ?>">
                </div>
                <div class="histo_content">
                    <?php the_sub_field('paragraphe_2'); ?>
                </div>
                <div class="histo_picture">
                    <?php
                    $image_2 = get_sub_field('photo_2');
                    $image_3 = get_sub_field('photo_3');
                    $image_4 = get_sub_field('photo_4');
                    ?>
                    <img src="<?= $image_2['url']; ?>" width="<?= $image_2['width']; ?>" height="<?= $image_2['height']; ?>">
                    <img src="<?= $image_3['url']; ?>" width="<?= $image_3['width']; ?>" height="<?= $image_3['height']; ?>">
                    <img src="<?= $image_4['url']; ?>" width="<?= $image_4['width']; ?>" height="<?= $image_4['height']; ?>">
                </div>
                <div class="histo_content">
                    <?php the_sub_field('paragraphe_3'); ?>
                </div>
                <div class="histo_picture">
                    <?php
                    $image_5 = get_sub_field('photo_5');?>
                    <img src="<?= $image_5['url']; ?>" width="<?= $image_5['width']; ?>" height="<?= $image_5['height']; ?>">
                </div>
                <?php
                $file = get_sub_field('loof');
                if( $file ): ?>
                <div class="histo_content">
                    <p class="link_pdf">Pour les concours voir la fiche <a href="<?= $file['url']; ?>"><abbr title="Livre Officiel des Origines Félines">LOOF</abbr></a></p>
                </div>
                <?php endif; ?>
                <div class="histo_picture">
                    <?php
                    $image_6 = get_sub_field('photo_6');
                    $image_7 = get_sub_field('photo_7');
                    $image_8 = get_sub_field('photo_8');
                    ?>
                    <img src="<?= $image_6['url']; ?>" width="<?= $image_6['width']; ?>" height="<?= $image_6['height']; ?>">
                    <img src="<?= $image_7['url']; ?>" width="<?= $image_7['width']; ?>" height="<?= $image_7['height']; ?>">
                    <img src="<?= $image_8['url']; ?>" width="<?= $image_8['width']; ?>" height="<?= $image_8['height']; ?>">
                </div>
            <?php endwhile; endif; ?>
            <?php if( have_rows('origine') ):  while( have_rows('origine') ): the_row(); ?>
                <h3 aria-level="3" role="heading" class="title" id="nav-3"><?php the_sub_field('sous_titre'); ?></h3>
                <div class="histo_content">
                    <?php the_sub_field('paragraphe_1'); ?>
                </div>
            <?php endwhile; endif; ?>
            <?php if( have_rows('sante') ):  while( have_rows('sante') ): the_row(); ?>
                <h3 aria-level="3" role="heading" class="title" id="nav-4"><?php the_sub_field('sous_titre'); ?></h3>
                <div class="histo_content">
                    <?php the_sub_field('paragraphe_1'); ?>
                </div>
                <h4 aria-level="4" role="heading">Qu’est ce que c’est ?</h4>
                <div class="histo_content">
                    <?php the_sub_field('paragraphe_2'); ?>
                </div>
                <div class="histo_picture">
                    <?php
                    $image = get_sub_field('photo');?>
                    <img src="<?= $image['url']; ?>" width="<?= $image['width']; ?>" height="<?= $image['height']; ?>">
                </div>
                <div class="histo_content">
                    <?php the_sub_field('paragraphe_3'); ?>
                </div>
            <?php endwhile; endif; ?>
        </section>
        <section class="history">
            <h2 aria-level="2" role="heading" id="chatterie" class="sub-title">Historique de la chatterie</h2>
            <?php if( have_rows('chatterie') ):  while( have_rows('chatterie') ): the_row(); ?>
                <h3 aria-level="3" role="heading" class="title" id="nav-5"><?php the_sub_field('sous_titre'); ?></h3>
                <div class="histo_content">
                    <?php the_sub_field('paragraphe_1'); ?>
                </div>
            <?php endwhile; endif; ?>
            <?php if( have_rows('naissance') ):  while( have_rows('naissance') ): the_row(); ?>
                <h3 aria-level="3" role="heading" class="title" id="nav-6"><?php the_sub_field('sous_titre'); ?></h3>
                <div class="histo_content">
                    <?php the_sub_field('paragraphe_1'); ?>
                </div>
                <div class="histo_picture">
                    <?php
                    $image1 = get_sub_field('photo');?>
                    <img src="<?= $image1['url']; ?>" width="<?= $image1['width']; ?>" height="<?= $image1['height']; ?>">
                </div>
                <div class="histo_content">
                    <?php the_sub_field('paragraphe_2'); ?>
                </div>
                <div class="histo_picture">
                    <?php
                    $image2 = get_sub_field('photo_2');
                    $image3 = get_sub_field('photo_3');?>
                    <img src="<?= $image2['url']; ?>" width="<?= $image2['width']; ?>" height="<?= $image2['height']; ?>">
                    <img src="<?= $image3['url']; ?>" width="<?= $image3['width']; ?>" height="<?= $image3['height']; ?>">
                </div>
                <div class="histo_content">
                    <?php the_sub_field('paragraphe_3'); ?>
                </div>
                <div class="histo_picture">
                    <?php
                    $image4 = get_sub_field('photo_4');
                    $image5 = get_sub_field('photo_5');
                    $image6 = get_sub_field('photo_6');
                    ?>
                    <img src="<?= $image4['url']; ?>" width="<?= $image4['width']; ?>" height="<?= $image4['height']; ?>">
                    <img src="<?= $image5['url']; ?>" width="<?= $image5['width']; ?>" height="<?= $image5['height']; ?>">
                    <img src="<?= $image6['url']; ?>" width="<?= $image6['width']; ?>" height="<?= $image6['height']; ?>">
                </div>
                <div class="histo_content">
                    <?php the_sub_field('paragraphe_4'); ?>
                </div>
            <?php endwhile; endif; ?>
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