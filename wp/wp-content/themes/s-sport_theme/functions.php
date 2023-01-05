<?php
// タクソノミーURL　Rewrite
add_rewrite_rule('news/category/([^/]+)/?$', 'index.php?news_category=$matches[1]', 'top');
// タクソノミーURL　ページ送りも設定
add_rewrite_rule('news/category/([^/]+)/page/([0-9]+)/?$', 'index.php?news_category=$matches[1]&paged=$matches[2]', 'top');



/* PHPの読み込み
---------------------------------------------------------- */

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
	global $submenu;
	unset($menu[5]); 
    unset($menu[25]); 
	$menuReserve_media = $menu[10];
unset($menu[10]);
$menu[5] = $menuReserve_media;
	$menuReserve_page = $menu[20];
unset($menu[20]);
$menu[6] = $menuReserve_page;
$menuReserve_form = $menu[26];
unset($menu[26]);
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
	add_post_type_support( 'project', 'revisions' );
	add_post_type_support( 'tournament', 'revisions' );
	add_post_type_support( 'junior_tournament', 'revisions' );
	add_post_type_support( 'junior_project', 'revisions' );
	add_post_type_support( 'member', 'revisions' );
	add_post_type_support( 'junior_member', 'revisions' );
	add_post_type_support( 'magazine', 'revisions' );
	add_post_type_support( 'member_stakeholder', 'revisions' );
	add_post_type_support( 'junior_stakeholder', 'revisions' );
}
add_action('init', 'add_posttype_revisions');


//MWWP Formの保存先パスを修正
/**
 * @param empty $path
 * @param MW_WP_Form_Data $Data
 * @param string name 属性値
 * @return string 空値以外を返したときだけそのパスが使用される
 */

// MW-WP-FormのID一覧を取得して、add filterする。

function my_mwform_upload_dir( $path, $Data, $key ) {
	return '/form_upload_data';// ディレクトリ名を指定
}
$args= array(
  'posts_per_page'  => -1,
  'post_type' => 'mw-wp-form'
);
$the_query = new WP_Query($args);
if ( $the_query->have_posts() ) {
	while( $the_query->have_posts() ) {
		$the_query->the_post();
		add_filter( 'mwform_upload_dir_mw-wp-form-' . $post->ID, 'my_mwform_upload_dir', 10, 3 );
	}
}
wp_reset_query();



/** tinymce advancedのテーブル幅を無効化**/
function tinymce_custom($settings) {
		global $post;
	if('news'!=$post->post_type){
		$invalid_style = array(
        'table' => 'width height',
        'th' => 'width height',
        'td' => 'width height'
    );
    $settings['invalid_styles'] = json_encode($invalid_style);
		$settings['table_resize_bars'] = false;
	$settings['object_resizing'] = "img";
    return $settings;
		}
	else{
		return $settings;
	}
}

add_filter('tiny_mce_before_init', 'tinymce_custom');

//tinyMCEのキャッシュサフィックスを無効化するアクションフィルタ
function extend_tiny_mce_before_init( $mce_init ) {
    $mce_init['cache_suffix'] = 'v='.time();
    return $mce_init;
}
add_filter( 'tiny_mce_before_init', 'extend_tiny_mce_before_init' );

/** 固定ページ「パスワード保護中」の文言を外す**/
add_filter('protected_title_format', 'remove_protected');
function remove_protected($title) {
return '%s';
}


/**
 *パスワード保護の時にでるテキスト修正
 */
function my_password_form() {
  return
    '<head> 
  <meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="'.get_template_directory_uri().'/assets/css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<div class="p-password__wrap">
	<div class="p-password__body"><h2>'. get_the_title().' ログイン画面</h2>
	<form class="p-password__form" action="' . home_url() . '/s-sport/login_35224?action=postpass" method="post">
	<label>パスワード<input name="post_password" type="password" size="24"/>
	</label>
	<input type="submit" name="Submit" " value="' . esc_attr__("確認") . '" />
    </form>
　　　</div>
   </div>
   ';
}
add_filter('the_password_form', 'my_password_form');


/*-------------------------------------------*/
/* 　管理画面のカスタム投稿記事並び替え
/*-------------------------------------------*/

function admin_custom_posttype_order($wp_query) {
  if( is_admin() ) {
    $post_type = $wp_query->query['post_type'];
    if(($post_type == 'news')||($post_type == 'junior_stakeholder')||($post_type == 'member_stakeholder')) {
      $wp_query->set('orderby','date'); 
      $wp_query->set('order','DESC'); 
    }
  }
}
add_filter('pre_get_posts', 'admin_custom_posttype_order');



/*-------------------------------------------*/
/* 　カスタムフィールドもプレビューできるようにする
/*-------------------------------------------*/
function get_preview_id($postId) {
    global $post;
    $previewId = 0;
    if ( isset($_GET['preview'])
            && ($post->ID == $postId)
                && $_GET['preview'] == true
                    &&  ($postId == url_to_postid($_SERVER['REQUEST_URI']))
        ) {
        $preview = wp_get_post_autosave($postId);
        if ($preview != false) { $previewId = $preview->ID; }
    }
    return $previewId;
}
 
add_filter('get_post_metadata', function($meta_value, $post_id, $meta_key, $single) {
    if ($preview_id = get_preview_id($post_id)) {
        if ($post_id != $preview_id) {
            $meta_value = get_post_meta($preview_id, $meta_key, $single);
        }
    }
    return $meta_value;
}, 10, 4);
 
add_action('wp_insert_post', function ($postId) {
    global $wpdb;
    if (wp_is_post_revision($postId)) {
        if (isset($_POST['fields'])) {
            foreach ($_POST['fields'] as $key => $value) {
                $field = get_field($key);
                if ( !isset($field['name']) || !isset($field['key']) ) continue;
                if (count(get_metadata('post', $postId, $field['name'], $value)) != 0) {
                    update_metadata('post', $postId, $field['name'], $value);
                    update_metadata('post', $postId, "_" . $field['name'], $field['key']);
                } else {
                    add_metadata('post', $postId, $field['name'], $value);
                    add_metadata('post', $postId, "_" . $field['name'], $field['key']);
                }
            }
        }
        do_action('save_preview_postmeta', $postId);
    }
});


?>
