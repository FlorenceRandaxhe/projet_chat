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
                    <div class="contact_intro">
                        <?php the_field('introduction_contact'); ?>
                    </div>
                </div>

                <?= apply_filters('the_content', '[contact-form-7 id="147" title="Contact"]');?>

                </form>
            </div>
        </section>
    </main>

<?php get_footer() ?>