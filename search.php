<?php get_header(); ?>



<div class="eleven columns ">
<div id="content" >

<div class="subtitle">
<p>	<?php $mySearch =& new WP_Query("s=$s & showposts=-1"); echo 'キーワード：'; the_search_query();  echo '　'; $num = $mySearch->post_count;  echo  $num.' 件の検索結果'; ?> </p>
</div>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<article class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="postmeta">
	<span class="author">投稿者 <?php the_author(); ?> </span> <span class="clock">  <?php the_time('Y年 M  j日'); ?></span>
</div>
<?php
if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img class="postimg scale-with-grid" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=180&amp;w=300&amp;zc=1" alt="" /></a>
<?php } else { ?>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img class="postimg scale-with-grid" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/dummy.jpg&amp;h=180&amp;w=300&amp;zc=1" alt="" /></a>
<?php } ?>
</div>

<div class="entry">
<?php wpe_excerpt('wpe_excerptlength_index', ''); ?>
<div class="clear"></div>
</div>
</article>
<?php endwhile; ?>

<?php getpagenavi(); ?>

<?php else : ?>

<div class="post"><div class="title">
		<h4>Your search - <?php the_search_query();?> - did not match any entries.</h4>
</div>


<div class="entry">
<p>Suggestions:</p>
<ul>
   <li>  Make sure all words are spelled correctly.</li>
   <li>  Try different keywords.</li>
   <li>  Try more general keywords.</li>
</ul>
</div>
</div>

<?php endif; ?>

</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>