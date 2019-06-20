<?php
/*
    Template Name: Commentaires
*/
get_header() ?>
    <main>
        <div class="content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="head_text"><?php the_content(); ?></div>
            <?php endwhile; endif; ?>
            <a href="#add-comment" class="btn-green">Laissez-nous un commentaire&nbsp;!</a>
            <section class="livre-dor">
                <h2 aria-level="2" role="heading" class="title">Les commentaires</h2>
                <?php
                $comments = new WP_Query([
                    'post_type'=>'comments',
                    'order'=>'DESC',
                    'order_by'=>'date'
                ]);
                if ($comments->have_posts()) : while ($comments->have_posts()) : $comments->the_post(); ?>
                <div class="comment">
                    <div class="comment_info"><p class="comment_name"><?php the_title();?></p></div>
                    <div class="comment_date"><p>Publié le <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time></p></div>
                    <div class="comment_content"><?php the_content();?></div>
                </div>
                <?php endwhile; else: ?>
                    <div>
                        <p class="empty">Il n'y a pas encore de commentaire&nbsp;! <a href="#add-comment">Soyez le premier à nous en laisser un&nbsp;!</a></p>
                    </div>
                <?php endif; ?>
            </section>
            <section id="add-comment">
                <?php
                if (isset( $_POST['send_comment'])){
                    $name = htmlspecialchars($_POST['pseudo']);
                    $comment = htmlspecialchars($_POST['message']);
                    if (!empty($name) AND !empty($comment)){
                        $my_post = array('post_title' =>  $name, 'post_content' =>  $comment, 'post_status' => 'pending', 'post_type' => 'comments');
                        wp_insert_post($my_post);
                        hl_get_page_url("template-comment.php");
                        echo "Votre commentaire à bien été envoyé !";
                        exit;
                    } else {
                        echo "Tous les champs ne sont pas remplis !";
                    }
                }
                ?>
                <div class="share">
                    <h2 aria-level="2" role="heading" class="title">Laisser un commentaire</h2>
                    <form action="" method="POST">
                        <label for="pseudo">Nom</label>
                        <input type="text" id="name" name="pseudo" placeholder="Jean Dupont">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Tapez votre message ici..." rows="6"></textarea>
                        <button type="submit" class="btn-white" name="send_comment">Envoyer</button>
                    </form>
                </div>
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