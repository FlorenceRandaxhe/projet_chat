<footer>
    <div class="footer_top">
        <div class="nav">
            <ul>
                <?php foreach (hl_getMenu('footer') as $item): ?>
                    <li class="nav_item"><a href="<?= $item->url; ?>" class="nav_link"><?= $item->label; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="social">
            <ul>
                <li>
                    <a href="https://www.facebook.com/chatterie.dhairlessness/" title="Page Facebook" class="fb">
                        <span class="hidden">Vers la page Facebook d'Hairlessness</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/></svg>
                    </a>
                </li>
                <li>
                    <a href="<?= get_home_url(); ?>#contact" title="Formulaire de contact" class="mail">
                        <span class="hidden">Vers le formulaire de contact</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path d="M13.718 10.528c0 .792-.268 1.829-.684 2.642-1.009 1.98-3.063 1.967-3.063-.14 0-.786.27-1.799.687-2.58 1.021-1.925 3.06-1.624 3.06.078zm10.282 1.472c0 6.627-5.373 12-12 12s-12-5.373-12-12 5.373-12 12-12 12 5.373 12 12zm-5-1.194c0-3.246-2.631-5.601-6.256-5.601-4.967 0-7.744 3.149-7.744 7.073 0 3.672 2.467 6.517 7.024 6.517 2.52 0 4.124-.726 5.122-1.288l-.687-.991c-1.022.593-2.251 1.136-4.256 1.136-3.429 0-5.733-2.199-5.733-5.473 0-5.714 6.401-6.758 9.214-5.071 2.624 1.642 2.524 5.578.582 7.083-1.034.826-2.199.799-1.821-.756 0 0 1.212-4.489 1.354-4.975h-1.364l-.271.952c-.278-.785-.943-1.295-1.911-1.295-2.018 0-3.722 2.19-3.722 4.783 0 1.73.913 2.804 2.38 2.804 1.283 0 1.95-.726 2.364-1.373-.3 2.898 5.725 1.557 5.725-3.525z"/></svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer_bottom">
        <p>Site web réalisé par <a href="http://florence-randaxhe.com/">Florence Randaxhe</a></p>
    </div>
</footer>
<script src="<?= get_template_directory_uri(); ?>/public/js/main.js" type="text/javascript"></script>
</body>
</html>