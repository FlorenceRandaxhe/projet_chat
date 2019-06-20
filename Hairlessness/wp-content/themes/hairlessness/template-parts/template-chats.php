<?php
/*
    Template Name: Chats
*/
get_header() ?>
    <main>
        <div class="content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="head_text">
                  <?php the_content(); ?>
                </div>
            <?php endwhile; endif; ?>
            <div class="secondary-nav">
                <ul>
                    <li><a href="#male">Les étalons</a></li>
                    <li><a href="#female">Les femelles</a></li>
                </ul>
            </div>
            <section>
                <h2 aria-level="2" role="heading" class="sub-title" id="male">Les étalons</h2>
            <?php
            $chats = new WP_Query([
                'post_type'=>'chats',
                'order'=>'DESC',
                'order_by'=>'date'
            ]);
            if ($chats->have_posts()) : while ($chats->have_posts()) : $chats->the_post();
            if( get_field('sexe') == 'Mâle' ): ?>
                <div class="cat">
                    <h3 aria-level="3" role="heading" class="title"><?php the_title(); ?></h3>
                    <div class="cat_picture">
                        <?php
                        $image = get_field('photo_chat');
                        if( !empty($image) ): ?>
                            <img class="myImg" src="<?= $image['url']; ?>" alt=" " width="<?= $image['width']; ?>" height="<?= $image['height']; ?>">
                        <?php endif; ?>
                    </div>
                    <div class="male_description">
                        <ul>
                            <li>
                                <div>Couleur de la robe</div>
                                <div><?php the_field('color_robe'); ?></div>
                            </li>
                            <li>
                                <div>Couleur des yeux</div>
                                <div><?php the_field('color_eyes'); ?></div>
                            </li>
                            <?php
                            $title = get_field('title');
                            if( $title): ?>
                            <li>
                                <div>Titre</div>
                                <div><?= $title; ?></div>
                            </li>
                            <?php endif; ?>

                            <?php
                            $elevage = get_field('elevage');
                            if( $elevage): ?>
                            <li>
                                <div>Elevage</div>
                                <div><?= $elevage; ?></div>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <?php the_field('description'); ?>
                    </div>
                </div>
                    <div id="myModal" class="modal">
                        <img class="modal-content" id="showImg">
                        <span id="close" class="close_btn">&times;</span>
                    </div>
            <?php endif; ?>
            <?php endwhile; else: endif; ?>
            </section>
            <section>
                <h2 aria-level="2" role="heading" class="sub-title" id="female">Les femelles</h2>
            <?php
            $chats = new WP_Query([
                'post_type'=>'chats',
                'order'=>'DESC',
                'order_by'=>'date'
            ]);
            if ($chats->have_posts()) : while ($chats->have_posts()) : $chats->the_post();
            if( get_field('sexe') == 'Femelle' ): ?>
                <div class="cat">
                    <h3 aria-level="3" role="heading" class="title"><?php the_title(); ?></h3>
                    <div class="cat_picture">
                        <?php
                        $image = get_field('photo_chat');
                        if( !empty($image) ): ?>
                            <img class="myImg" src="<?= $image['url']; ?>" alt=" " width="<?= $image['width']; ?>" height="<?= $image['height']; ?>">
                        <?php endif; ?>
                    </div>
                    <ul class="femelle_description">
                        <li>
                            <div>Couleur de la robe</div>
                            <div><?php the_field('color_robe'); ?></div>
                        </li>
                        <li>
                            <div>Couleur des yeux</div>
                            <div><?php the_field('color_eyes'); ?></div>
                        </li>
                        <?php
                        $title = get_field('title');
                        if( $title): ?>
                        <li>
                            <div>Titre</div>
                            <div><?= $title; ?></div>
                        </li>
                        <?php endif; ?>

                        <?php
                        $elevage = get_field('elevage');
                        if( $elevage): ?>
                        <li>
                            <div>Elevage</div>
                            <div><?= $elevage; ?></div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div id="myModal" class="modal">
                    <img class="modal-content" id="showImg">
                    <span id="close" class="close_btn">&times;</span>
                </div>
            <?php endif; ?>
            <?php endwhile; else: endif; ?>
            </section>
        </div>
        <div id="back-to-top">
            <a href="#" title="Haut de page">
                <span class="hidden">Haut de page</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" version="1.1" width="50" height="50"><path d="M464 256c0-114.875-93.125-208-208-208S48 141.125 48 256s93.125 208 208 208 208-93.125 208-208zm-112 32H160l96-96 96 96z"/></svg>
            </a>
        </div>
    </main>
<?php get_footer() ?>