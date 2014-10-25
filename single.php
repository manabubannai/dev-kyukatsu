<?php get_header(); ?>

<div class="eleven columns ">
<div id="content" >

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<article itemscope itemtype="http://schema.org/Article" class="post" id="post-<?php the_ID(); ?>">

<!--
<div class="bread_crumb">
<?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
</div>
-->
<div>
    <div class="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
      <a href="<?php bloginfo('url'); ?>" itemprop="url">
        <span id="blue-color" itemprop="title">ホーム &gt;&nbsp;</span>
      </a>
    </div>
    <div class="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
      <a href="<?php $cat = get_the_category(); echo get_category_link($cat[0]->cat_ID); ?>" itemprop="url">
        <span itemprop="title"><?php echo $cat[0]->name; ?> &gt;&nbsp;</span>
      </a>
    </div>
    <strong><span id="glay-color"><?php the_title(); ?></span></strong>
</div>
<div style="clear: both;"></div>

<div class="title">

<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><span itemprop="name"><?php the_title(); ?></span></a></h1>

</div>
<div class="postmeta">
    <span class="clock"> 投稿日：<span itemprop="datePublished"><?php the_time('Y年 Mj日'); ?></span></span><?php echo ""; ?>

<span class="categori" id="single-author11">投稿者: <span itemprop="author" itemscope itemtype="http://schema.org/Person">
<span itemprop="name">
<?php
$post_id = $post->ID;
$link = get_post_meta($post_id,'link',true);
?>
<?php if($link) : ?>
<a href="<?php echo $link; ?>">
<?php
$posttags = get_the_tags();
if ($posttags) {
foreach($posttags as $tag) {
echo $tag->name . ' ';
}
}
?></a>
<?php echo "　 "; ?><span class="categori" id="single-author12">タグ:<?php the_category(', '); ?></span>
<?php else : ?>
未設定　タグ：<?php the_category(', '); ?>
<?php endif; ?> </span></span> </span>
</div>

<div class="entry">

<?php
  if (is_single()) :
    get_template_part('social_button');
  endif;
?>
<br style="clear:both;">
<?php the_content('Read the rest of this entry &raquo;'); ?>

<div class="clear"></div>
<!--
<?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
-->
</div>

<?php
  if (is_single()) :
    get_template_part('social_button');
  endif;
?>
<br style="clear:both;">

<!--
<?php
  if (is_single()) :
    get_template_part('flat-sns');
  endif;
?>
<br style="clear:both;">
-->
<?php related_posts(); ?>

<br style="clear:both;">
<div class="clear"></div>

<!-- インド留学広告はこちら〜( ՞ٹ՞) -->
<!-- <a href="http://india-it-school.com/" target="new"><img src="http://kyukatsu.com/wp-content/uploads/2014/05/india.jpg"  style="width:300px; height:250px"></a> -->


<!--あどせ〜〜〜んすっ-->
<script type="text/javascript">
    google_ad_client = "ca-pub-5457131240791605"; /* Adsense ID */
    width = document.documentElement.clientWidth;
    google_ad_slot = "9475837774"; /* デフォルトのad_slot ID */
    google_ad_width = 300; /* デフォルトのad_slotのWidth */
    google_ad_height = 250; /* デフォルトのad_slotのHeight */
        if (width > 376) { /* ここから条件分岐(幅500px以上だと以下を表示) */
        google_ad_slot = "7379995775";
        google_ad_width = 336;
        google_ad_height = 280;
    }
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

<!--
<div class="adevent">
<br>
<div class="fb-like-box" data-href="https://www.facebook.com/kyukatsu" data-width="640" data-show-faces="true" data-stream="false" data-header="false"></div>
</div>
-->
<!--
<div class="singleinfo">
<span class="categori">投稿者: <?php
$post_id = $post->ID;
$link = get_post_meta($post_id,'link',true);
?>
<?php if($link) : ?>
<a href="<?php echo $link; ?>"><?php
$posttags = get_the_tags();
if ($posttags) {
foreach($posttags as $tag) {
echo $tag->name . ' ';
}
}
?></a>
<?php else : ?>
<?php the_category(', '); ?>
<?php endif; ?> </span>
</div>

-->
</article>
<?php endwhile; else: ?>
		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>
<?php endif; ?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>