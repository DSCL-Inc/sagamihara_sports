<?php
// タクソノミーURL　Rewrite
add_rewrite_rule('news/category/([^/]+)/?$', 'index.php?news_category=$matches[1]', 'top');
// タクソノミーURL　ページ送りも設定
add_rewrite_rule('news/category/([^/]+)/page/([0-9]+)/?$', 'index.php?news_category=$matches[1]&paged=$matches[2]', 'top');





/* PHPの読み込み
---------------------------------------------------------- */
/*function my_php_Include($params = array()) {
    extract(shortcode_atts(array('file' => 'default'), $params));
    ob_start();
    include(STYLESHEETPATH . "template-parts/$file.php");
    return ob_get_clean();
    }
    add_shortcode('call_php', 'my_php_Include');

*/

//wildcard 有効
function my_posts_where_wildcard( $where, $query ) {
	if ( $query->get( 'wildcard_meta_key' ) ) {
		$where = str_replace( 'meta_key =', 'meta_key LIKE', $where );
	}
	return $where;
}
add_filter( 'posts_where', 'my_posts_where_wildcard', 10, 2 );

//ダッシュボードからコメントを消す
/*   unset($menu[2]);  // ダッシュボード
    unset($menu[5]);  // 投稿
    unset($menu[10]); // メディア
    unset($menu[15]); // リンク
    unset($menu[20]); // ページ
    unset($menu[25]); // コメント
    unset($menu[60]); // テーマ
    unset($menu[65]); // プラグイン
    unset($menu[70]); // プロフィール
    unset($menu[75]); // ツール
    unset($menu[80]); // 設定
	*/
function remove_menus () {
    global $menu;
	unset($menu[5]); 
    //unset($menu[25]); 
	$menuReserve_media = $menu[10];
unset($menu[10]);
$menu[5] = $menuReserve_media;
	$menuReserve_page = $menu[20];
unset($menu[20]);
$menu[6] = $menuReserve_page;
		$menuReserve_form = $menu[29];
unset($menu[29]);
$menu[61] = $menuReserve_form;
}
add_action('admin_menu', 'remove_menus');

   if (function_exists('pagination')) {
     $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
     $max_num_pages = $the_query->max_num_pages;
     pagination($max_num_pages);
   }

function add_posttype_revisions() {
    add_post_type_support( 'news', 'revisions' );
}
add_action('init', 'add_posttype_revisions');
?>
