<div class="clear"></div>
</div>

<div class="footcover">

<div class="container">
<?php include (TEMPLATEPATH . '/bottom.php'); ?>
<div id="footer">


	<div class="fcred">
		Copyright &copy; <?php echo date('Y');?> <a href="<?php bloginfo('siteurl'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?> 
	</div>
	<div class="ads-foot"><a href="http://kyukatsu.com/ads/">広告主のみなさまへ　　　</a></div>	
	<div class='clear'></div>	
<?php wp_footer(); ?>

</div></div>


</div>


<script type="text/javascript">
jQuery(function() {
    /* click tracking google ana */
    jQuery("a").click(function(e) {
        var ahref = jQuery(this).attr('href');
        if (ahref.indexOf("kyukatsu.com") != -1 || ahref.indexOf("http") == -1 ) {
            _gaq.push(['_trackEvent', 'Inbound Links', 'Click', ahref]);
        }
        else {
            _gaq.push(['_trackEvent', 'Outbound Links', 'Click', ahref]);
        }
    });
});
</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.async=true;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</body>
</html>      