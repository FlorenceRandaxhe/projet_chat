<?php
/*
    Template Name: Homepage
*/
get_header() ?>
    <main>
        <section>
            <div id="contact">
                <div class="contact_text">
                    <h2 aria-level="2" role="heading" class="title-contact">Contact</h2>
                    <div class="contact_intro"><?php the_field('introduction_contact'); ?></div>
                </div>
                <?= apply_filters('the_content', '[contact-form-7 id="147" title="Contact"]');?>
            </div>
        </section>
        <div id="back-to-top">
            <a href="#" title="Haut de page">
                <span class="hidden">Haut de page</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" version="1.1" width="50" height="50"><path d="M464 256c0-114.875-93.125-208-208-208S48 141.125 48 256s93.125 208 208 208 208-93.125 208-208zm-112 32H160l96-96 96 96z"/></svg>
            </a>
        </div>
    </main>
<?php get_footer() ?>