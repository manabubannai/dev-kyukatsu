<?php get_header(); ?>
<div class="eleven columns ">
<div id="content" >
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<article class="post" id="post-<?php the_ID(); ?>">

<div  id="bread-page"  itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
	<a itemprop="url" href="<?php echo get_option('home'); ?>">
		<span id="blue-color" itemprop="title" >ホーム &gt;&nbsp;</span>
	</a>
<div  id="bread-page"  itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
	<?php foreach ( array_reverse(get_post_ancestors($post->ID)) as $parid ) { ?>
		<a href="<?php echo get_page_link( $parid );?>" title="<?php echo get_page($parid)->post_title; ?>">
			<span id="blue-color" itemprop="title"><?php echo get_page($parid)->post_title; ?> &gt;&nbsp;</span></a>
	<?php } ?>
	<strong><?php the_title(''); ?></strong>
</div></div>
<div style="clear: both;"></div>

	
	<div class="title">
		<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	</div>
	<div class="entry">

<?php get_template_part('social_button'); ?>
<br />
<br style="clear:both;">

		<?php the_content('Read the rest of this entry &raquo;'); ?>
<?php get_template_part('social_button2'); ?>
<br style="clear:both;">


		<div class="clear"></div>
	</div>
</article>
<?php endwhile; endif; ?>
</div>		
</div>	
<?php get_sidebar(); ?>
<?php get_footer(); ?>