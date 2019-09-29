<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Florence Randaxhe">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="keywords" content="Hairlessness, Chatons, Sphynx, chats reproducteurs, Contact, Historique, Album, Livre d’or, élevage, chat, adoption, chatterie">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title><?php wp_title(''); ?></title>
    <link rel="stylesheet" type="text/css" href="<?= get_stylesheet_directory_uri(); ?>/public/css/main.css">
    <link rel="icon" type="image/png" href="<?= asset_path('assets/icon.png'); ?>">
</head>
<body>
<header>
    <?php if ( is_front_page() ):
        $image = get_field('landing_page_image');?>
        <div class="banner" style="background: center no-repeat url(<?= $image['url']; ?>)/cover">
            <div class="banner-content">
                <h1 aria-level="1" role="heading" class="banner_headline"><?php the_title(); ?><span class="hidden"> - Accueil</span></h1>
                <div class="banner_text"><?php the_field('introduction_homepage'); ?></div>
                <div class="banner_link"><a href="<?= hl_get_page_url('template-historique.php'); ?>#chatterie" title="Vers la page historique de la chatterie">&Agrave; propos de nous</a></div>
            </div>
        </div>
    <?php else : ?>
    <div class="head">
        <h1 aria-level="1" role="heading"><?php the_title(); ?><span class="hidden"> | <?php bloginfo('name'); ?></span></h1>
    </div>
    <?php endif; ?>
    <div class="header">
        <div class="header_wrapper">
            <div class="logo">
                <a href="<?= get_home_url(); ?>" title="Vers la page d'accueil"><img src="<?= asset_path('assets/logo.svg'); ?>" alt="<?php bloginfo('name'); ?>" width="90" height="90"></a>
            </div>
            <div class="navigation">
                <input type="checkbox" id="menu">
                <label for="menu" class="menu-icon">
                    <span class="hidden">Menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55.83 34.33" width="35" height="35"><g><line y1="1.5" x2="55.83" y2="1.5"/><line y1="17.17" x2="55.83" y2="17.17"/><line y1="32.83" x2="55.83" y2="32.83"/></g></svg>
                </label>
                <nav class="dropdown-menu">
                    <h2 class="hidden" aria-level="2" role="heading">Navigation principale</h2>
                    <ul class="nav_list">
                        <?php foreach (hl_getMenu('main') as $item): ?>
                            <li class="nav_item"><a href="<?= $item->url; ?>" class="nav_link <?= $item->current ? 'nav_link--current' : '';?>"><?= $item->label; ?></a></li>
                        <?php endforeach; ?>
                            <li class="nav_item"><a href="https://www.facebook.com/chatterie.dhairlessness/" title="Page Facebook" class="fb">
                                <span class="hidden">Vers la page Facebook d'Hairlessness</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/></svg></a>
                            </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>