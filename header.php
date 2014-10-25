<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--
休活BLOGのソースをご覧頂きありがとうございます！！
休活BLOGは@manabubannaiが作っているので、基本にソースは汚いです。
あんまりソースを見られると恥ずかしいので、閉じていただけると助かります〜。

　　／⌒ヽ
　 ∩ ＾ω＾）　ページCLOSE 希望！！
　 |　　 ⊂ﾉ
　｜　　 _⊃
　 し ⌒
個人ブログ：manablog.org
-->
<!-- microdata マークアップを Google 構造化データ マークアップ支援ツールで追加 -->
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<!--<![endif]-->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<head>
<meta charset="UTF-8"/>
<meta name="pocket-site-verification" content="a59e625c4d6f1dc7ddf11ffe7dc30a" />
<title>休活BLOG</title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link href='http://fonts.googleapis.com/css?family=Happy+Monkey' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/base.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/layout.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/responsive-style.css">

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<link href="https://plus.google.com/114590255126373611881" rel="publisher" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<?php
wp_enqueue_script('jquery');
wp_enqueue_script('effects', get_stylesheet_directory_uri() .'/js/effects.js');
wp_enqueue_script('superfish', get_stylesheet_directory_uri() .'/js/superfish.js');
wp_enqueue_script('flexslider', get_stylesheet_directory_uri() .'/js/jquery.flexslider-min.js');
wp_enqueue_script('mobilemenu', get_stylesheet_directory_uri() .'/js/jquery.mobilemenu.js');
?>

<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40634591-1', 'kyukatsu.com');
  ga('send', 'pageview');

</script>

<!--TOPのホバーエフェクト-->
<script type="text/javascript">
$(function(){
  $("img.photo-effect, a.impact1 img").hover(function(){
    $(this).stop().animate({
      "opacity":"0.75"
    });
  },function(){
    $(this).stop().animate({"opacity":"1"});
  });
});
</script>


<!--画像切り替え-->
<script type="text/javascript">

$(function(){
     $('a img').hover(function(){
        $(this).attr('src', $(this).attr('src').replace('_off', '_on'));
          }, function(){
             if (!$(this).hasClass('currentPage')) {
             $(this).attr('src', $(this).attr('src').replace('_on', '_off'));
        }
   });
});
</script>


</head>
<body id="<?php $post = get_page($page_id); echo $post->post_name; ?>" >

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=623948124318563";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="topbar">
	<div class="container">
		<div class="topfeed">休学経験者が当時の経験や考えを語る共同ブログ</div>
	</div>
</div>

<div class="top">
	<div class="container">
		<div class="sixteen columns head">
			<div class="four columns alpha">
				<div id="blogname">
<?php
if (is_single()) {
  get_template_part('forsingle');
} elseif (is_page()) {
  get_template_part('forsingle');
} else {
  get_template_part('forother');
}
?>
</div>
	</div>
		<div class="twelve columns omega">
			<div id="botmenu">
			<?php wp_nav_menu( array( 'container_id' => 'submenu', 'theme_location' => 'primary','menu_class'=>'sfmenu','fallback_cb'=> 'fallbackmenu' ) ); ?>

<?php
  if (is_single()) {
    get_template_part('none');
  } elseif (is_page()) {
    get_template_part('none');
  } else {
    get_template_part('social_button2');
  }
?>



				</div>
			</div>
		</div>
	</div>
</div>
<div class="container casing">