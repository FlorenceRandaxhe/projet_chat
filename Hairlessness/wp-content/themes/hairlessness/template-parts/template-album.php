<?php
/*
    Template Name: Album
*/
get_header() ?>
    <main>
        <div class="content">
            <div class="secondary-nav">
                <ul>
                    <li><a href="#anciens">Nos anciens chats</a></li>
                    <li><a href="#chatterie">La chatterie et la salle de jeux</a></li>
                    <li><a href="#former">Que sont-ils devenus&nbsp;?</a></li>
                </ul>
            </div>
            <div id="myModal" class="modal">
                <img class="modal-content" id="showImg">
                <span id="close" class="close_btn">&times;</span>
            </div>
            <section class="photo">
                <?php if( have_rows('former_cats') ): while( have_rows('former_cats') ): the_row(); ?>
                <h2 aria-level="2" role="heading" class="title" id="anciens">Nos anciens chats</h2>
                <div><p><?php the_sub_field('introduction'); ?></p></div>
                <div class="gallery">
                    <?php
                    $images = get_sub_field('photos');
                    if( $images ): ?>
                        <?php foreach( $images as $image ): ?>
                        <div>
                            <img class="myImg" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" width="<?= $image['width']; ?>" height="<?= $image['height']; ?>">
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <?php endwhile; endif; ?>
            </section>

            <section class="photo">
                <?php if( have_rows('former_cats') ): while( have_rows('chatterie') ): the_row(); ?>
                <h2 aria-level="2" role="heading" class="title" id="chatterie">La chatterie et la salle de jeux</h2>
                <div><p><?php the_sub_field('introduction'); ?></p></div>
                <div class="gallery">
                    <?php
                    $images = get_sub_field('photos');
                    if( $images ): ?>
                        <?php foreach( $images as $image ): ?>
                            <div>
                                <img class="myImg" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" width="<?= $image['width']; ?>" height="<?= $image['height']; ?>">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <?php endwhile; endif; ?>
            </section>

            <section class="photo">
                <?php if( have_rows('former_cats') ): while( have_rows('former_kittens') ): the_row(); ?>
                <h2 aria-level="2" role="heading" class="title" id="former">Que sont-ils devenu ?</h2>
                <div><p><?php the_sub_field('introduction'); ?></p></div>
                <div class="gallery">
                    <?php
                    $images = get_sub_field('photos');
                    if( $images ): ?>
                        <?php foreach( $images as $image ): ?>
                            <div>
                                <img class="myImg" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" width="<?= $image['width']; ?>" height="<?= $image['height']; ?>">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <?php endwhile; endif; ?>
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