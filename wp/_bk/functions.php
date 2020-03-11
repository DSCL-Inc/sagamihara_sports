<?php
// タクソノミーURL　Rewrite
add_rewrite_rule('news/category/([^/]+)/?$', 'index.php?news_category=$matches[1]', 'top');
// タクソノミーURL　ページ送りも設定
add_rewrite_rule('news/category/([^/]+)/page/([0-9]+)/?$', 'index.php?news_category=$matches[1]&paged=$matches[2]', 'top');



/* PHPの読み込み
---------------------------------------------------------- */
function my_php_Include($params = array()) {
    extract(shortcode_atts(array('file' => 'default'), $params));
    ob_start();
    include(STYLESHEETPATH . "template-parts/$file.php");
    return ob_get_clean();
    }
    add_shortcode('call_php', 'my_php_Include');


?>
