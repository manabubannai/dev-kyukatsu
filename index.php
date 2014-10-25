<?php get_header(); ?>

<div class="container">
<div class="slidebox">
	<h2>イベント情報</h2>
<div class="flexslider">
	<ul class="slides">
		<div class="slidebox2">
		<?php if ( function_exists('wp_is_mobile') && wp_is_mobile() ) :?>
				<li id="top-slide">
					<a href="http://kyukatsu.com/meeting" target="_new"><img class="slideimg photo-effect" src="http://kyukatsu.com/wp-content/uploads/2014/03/meeting-sp.jpg" width="100%" title="" alt="" /></a>
				</li>
			<?php else: ?>
				<li id="top-slide">
					<a href="http://kyukatsu.com/meeting" target="_new"><img class="slideimg photo-effect" src="http://kyukatsu.com/wp-content/uploads/2014/03/meeting.jpg" width="97%" title="" alt="" /></a>
				</li>
			<?php endif; ?>
		</div>
	</ul>
</div>
</div>
</div>
<?php if ( function_exists('wp_is_mobile') && wp_is_mobile() ) :?>
	<div class="slidebox2">
		<h2>サイト内の案内所</h2>
	</div>
<?php else: ?>
<?php endif; ?>

<div class="container home-widget">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Services widgets') ) : else : ?>
	<?php endif; ?>
	<hr/>
</div>

<?php if ( function_exists('wp_is_mobile') && wp_is_mobile() ) :?>
<div class="slidebox3">
	<h2>新着記事の一覧</h2>
</div>
	<?php else: ?>
	<?php endif; ?>



<div class="container">
<?php
	$hpostcount = get_option('orio_hpostcount');
	$my_query = new WP_Query('cat=-219,-224&showposts='.$hpostcount.'');
	while ($my_query->have_posts()) : $my_query->the_post();
?>
<div class="four columns">
<article class="post" id="post-<?php the_ID(); ?>">
<?php
if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>"><img class="scale-with-grid" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=250&amp;w=450&amp;zc=1" alt=""/></a>
<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="scale-with-grid" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt="" /></a>
<?php } ?>

<div class="btitle">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<p id="topgazou-p"><span id="topgazou-text">新着</span></p>
<span class="categori">
<?php
	$post_id = $post->ID;
	$link = get_post_meta($post_id,'link',true);
?>
<?php if($link) : ?>
投稿者:<a href="<?php echo $link; ?>">
<?php  $posttags = get_the_tags();
	if ($posttags) {
		foreach($posttags as $tag) {
		echo $tag->name . ' ';
		}
	}
?></a>
<?php else : ?>
	<?php the_tags(""); ?>
<?php endif; ?> </span>
<br />
<span class="categori">タグ:<?php the_category(', '); ?></span>
</div>

<div class="boxentry">

<div class="clear"></div>
</div>

</article>

</div>

<?php if(++$counter % 4 == 0) : ?>
<div class="clear"></div>
<?php endif; ?>
<?php endwhile; ?>

<div class="clear"></div>
</div>

<!-- ぼやきコンテンツ -->

	<?php if ( function_exists('wp_is_mobile') && wp_is_mobile() ) :?>
<div class="slidebox3">
	<h2 id="h2-boyaki">休学した学生のぼやき</h2>
</div>

	<?php else: ?>

	<?php endif; ?>


<div class="container">


<?php
	$hpostcount = get_option('orio_hpostcount');
	$my_query = new WP_Query('cat=219&showposts=4');
	while ($my_query->have_posts()) : $my_query->the_post();
?>
<div class="four columns">
<article class="post" id="post-<?php the_ID(); ?>">
<?php
if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>"><img class="scale-with-grid" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=250&amp;w=450&amp;zc=1" alt=""/></a>
<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="scale-with-grid" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt="" /></a>
<?php } ?>

<div class="btitle">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<p id="topgazou-p"><span id="topgazou-text" class="topgazou-color2">ぼやき</span></p>
<span class="categori"><?php
$post_id = $post->ID;
$link = get_post_meta($post_id,'link',true);
?>
<?php if($link) : ?>
投稿者：<a href="<?php echo $link; ?>">
<?php
$posttags = get_the_tags();
if ($posttags) {
foreach($posttags as $tag) {
echo $tag->name . ' ';
}
}
?></a>
<?php else : ?>
<?php the_tags("投稿者："); ?>
<?php endif; ?> </span>
<br />
<span class="categori">タグ:<?php the_category(', '); ?></span>
</div>

<div class="boxentry">

<div class="clear"></div>
</div>

</article>

</div>

<?php if(++$counter % 4 == 0) : ?>
<div class="clear"></div>
<?php endif; ?>
<?php endwhile; ?>

<div class="clear"></div>
</div>

<!-- ぼやきコンテンツEND -->


<!-- 人気コンテンツ -->

	<?php if ( function_exists('wp_is_mobile') && wp_is_mobile() ) :?>
<div class="slidebox3">
	<h2 id="h2-popular">よく読まれている記事</h2>
</div>

	<?php else: ?>

	<?php endif; ?>


<div class="container">

<div class="four columns">
<article class="post" id="post-3225">
	<a href="http://kyukatsu.com/tanki-ryugaku/"><img class="scale-with-grid" src="http://kyukatsu.com/wp-content/themes/Orion/timthumb.php?src=http://kyukatsu.com/wp-content/uploads/2013/06/Screen-Shot-2013-06-18-at-18.05.05.png&amp;h=250&amp;w=450&amp;zc=1" alt=""></a>

<div class="btitle">
	<h2><a href="http://kyukatsu.com/tanki-ryugaku/" rel="bookmark" title="Permanent Link to 『短期留学は時間のムダ(笑)』｜30日でどれくらい英語が伸びたか暴露します">『短期留学は時間のムダ(笑)』｜30日でどれくらい英語が伸びたか暴露します</a></h2>
	<p id="topgazou-p"><span id="topgazou-text" class="topgazou-color3">人気記事</span></p>
<span class="categori">投稿者: <a href="http://kyukatsu.com/member/manabu-bannai/">
坂内学 </a>
 </span>
<br>
<span class="categori">タグ:<a href="http://kyukatsu.com/category/study_in_philippines/" title="フィリピン留学 の投稿をすべて表示" rel="category tag">フィリピン留学</a>, <a href="http://kyukatsu.com/category/hosei/" title="法政大学 の投稿をすべて表示" rel="category tag">法政大学</a></span>
</div>

<div class="boxentry">

<div class="clear"></div>
</div>

</article>

</div>

<div class="four columns">
<article class="post" id="post-3218">
	<a href="http://kyukatsu.com/kyukatsujun6/"><img class="scale-with-grid" src="http://kyukatsu.com/wp-content/themes/Orion/timthumb.php?src=http://kyukatsu.com/wp-content/uploads/2013/06/IMG_3018.jpg&amp;h=250&amp;w=450&amp;zc=1" alt=""></a>

<div class="btitle">
	<h2><a href="http://kyukatsu.com/kyukatsujun6/" rel="bookmark" title="Permanent Link to 【フィリピン留学】3ヶ月目でTOEICは何点になるのか。">【フィリピン留学】3ヶ月目でTOEICは何点になるのか。</a></h2>
	<p id="topgazou-p"><span id="topgazou-text" class="topgazou-color3">人気記事</span></p>
<span class="categori">投稿者: <a href="http://kyukatsu.com/member/jun-watanabe/">
渡辺淳 </a>
 </span>
<br>
<span class="categori">タグ:<a href="http://kyukatsu.com/category/toeic/" title="TOEIC の投稿をすべて表示" rel="category tag">TOEIC</a>, <a href="http://kyukatsu.com/category/study_in_philippines/" title="フィリピン留学 の投稿をすべて表示" rel="category tag">フィリピン留学</a>, <a href="http://kyukatsu.com/category/meiji/" title="明治大学 の投稿をすべて表示" rel="category tag">明治大学</a>, <a href="http://kyukatsu.com/category/how-to-study-eng/" title="英語学習 の投稿をすべて表示" rel="category tag">英語学習</a></span>
</div>

<div class="boxentry">

<div class="clear"></div>
</div>

</article>

</div>

<div class="four columns">
<article class="post" id="post-1968">
	<a href="http://kyukatsu.com/escape/"><img class="scale-with-grid" src="http://kyukatsu.com/wp-content/themes/Orion/timthumb.php?src=http://kyukatsu.com/wp-content/uploads/2013/06/c0645585bc224f96e6fbb6ad7e13978a.jpg&amp;h=250&amp;w=450&amp;zc=1" alt=""></a>

<div class="btitle">
	<h2><a href="http://kyukatsu.com/escape/" rel="bookmark" title="Permanent Link to 逃げて逃げて逃げた末の休学そしてワーホリ">逃げて逃げて逃げた末の休学そしてワーホリ</a></h2>
	<p id="topgazou-p"><span id="topgazou-text" class="topgazou-color3">人気記事</span></p>
<span class="categori">投稿者: <a href="http://kyukatsu.com/member/yuki-higuchi/">
樋口夕記 </a>
 </span>
<br>
<span class="categori">タグ:<a href="http://kyukatsu.com/category/working-holiday/" title="ワーキングホリデー の投稿をすべて表示" rel="category tag">ワーキングホリデー</a>, <a href="http://kyukatsu.com/category/chuo/" title="中央大学 の投稿をすべて表示" rel="category tag">中央大学</a>, <a href="http://kyukatsu.com/category/%e5%a4%a7%e5%ad%a6%e7%94%9f%e6%b4%bb/" title="大学生活 の投稿をすべて表示" rel="category tag">大学生活</a></span>
</div>

<div class="boxentry">

<div class="clear"></div>
</div>

</article>

</div>

<div class="four columns">
<article class="post" id="post-3577">
	<a href="http://kyukatsu.com/akinakagami-08-volunteer/"><img class="scale-with-grid" src="http://kyukatsu.com/wp-content/themes/Orion/timthumb.php?src=http://kyukatsu.com/wp-content/uploads/2013/07/426869_360967403926136_901138586_n.jpg&amp;h=250&amp;w=450&amp;zc=1" alt=""></a>

<div class="btitle">
	<h2><a href="http://kyukatsu.com/akinakagami-08-volunteer/" rel="bookmark" title="Permanent Link to 7.【黒人と白人mixしない？☆】女がアフリカでボランティアしてみたら？">7.【黒人と白人mixしない？☆】女がアフリカでボランティアしてみたら？</a></h2>
	<p id="topgazou-p"><span id="topgazou-text" class="topgazou-color3">人気記事</span></p>
<span class="categori">投稿者 : <a href="http://kyukatsu.com/tag/akinakagami/" rel="tag">中上亜紀</a> </span>
<br>
<span class="categori">タグ:<a href="http://kyukatsu.com/category/npongo/" title="NPO, NGO の投稿をすべて表示" rel="category tag">NPO, NGO</a>, <a href="http://kyukatsu.com/category/africa-volunteer/" title="アフリカボランティア の投稿をすべて表示" rel="category tag">アフリカボランティア</a>, <a href="http://kyukatsu.com/category/volunteer/" title="ボランティア の投稿をすべて表示" rel="category tag">ボランティア</a>, <a href="http://kyukatsu.com/category/chiba/" title="千葉大学 の投稿をすべて表示" rel="category tag">千葉大学</a></span>
</div>

<div class="boxentry">

<div class="clear"></div>
</div>

</article>

</div>


<div class="clear"></div>
</div>

<!-- 人気コンテンツEND -->


<!-- おすすめコンテンツ -->

	<?php if ( function_exists('wp_is_mobile') && wp_is_mobile() ) :?>
<div class="slidebox3">
	<h2 id="h2-recommend">おすすめ記事</h2>
</div>

	<?php else: ?>

	<?php endif; ?>

<div class="container">


<?php
	$hpostcount = get_option('orio_hpostcount');
	$my_query = new WP_Query('cat=224&showposts=4');
	while ($my_query->have_posts()) : $my_query->the_post();
?>
<div class="four columns">
<article class="post" id="post-<?php the_ID(); ?>">
<?php
if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>"><img class="scale-with-grid" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=250&amp;w=450&amp;zc=1" alt=""/></a>
<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="scale-with-grid" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt="" /></a>
<?php } ?>

<div class="btitle">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<p id="topgazou-p"><span id="topgazou-text" class="topgazou-color4">おすすめ</span></p>
<span class="categori">投稿者: <?php
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
<?php else : ?>
<?php the_tags("投稿者："); ?>
<?php endif; ?> </span>
<br />
<span class="categori">タグ:<?php the_category(', '); ?></span>
</div>

<div class="boxentry">

<div class="clear"></div>
</div>

</article>

</div>

<?php if(++$counter % 4 == 0) : ?>
<div class="clear"></div>
<?php endif; ?>
<?php endwhile; ?>

<div class="clear"></div>
</div>

<!-- おすすめコンテンツEND -->

<?php get_footer(); ?>