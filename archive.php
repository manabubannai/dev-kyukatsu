<?php get_header(); ?>
<div class="eleven columns ">
<div id="content">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<article class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="postmeta">
	<span class="clock">  <?php the_time('Y年Mj日'); ?></span>
</div>

<div class="entry">
<?php
if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img class="postimg scale-with-grid" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=180&amp;w=300&amp;zc=1" alt="" /></a>
<?php } else { ?>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img class="postimg scale-with-grid" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/dummy.jpg&amp;h=180&amp;w=300&amp;zc=1" alt="" /></a>
<?php } ?>

<?php wpe_excerpt('wpe_excerptlength_archive', ''); ?>
<div class="clear"></div>
</div>


<div class="singleinfo">
<span class="categori">カテゴリー: <?php the_category(', '); ?> </span>
</div>

</article>
<?php endwhile; ?>

<?php getpagenavi(); ?>

<?php else : ?>

	<h1 class="title">記事ないよ＼(＾o＾)／</h1>
	<p>ごめんなさい...</p>

<?php endif; ?>

</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>