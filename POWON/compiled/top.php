<div id="toptb" class="cl">
	<div class="wp">
		<div class="z"><a href="javascript:;" onclick="setHomepage('<?php echo $web_url; ?>')" >Set as homepage</a><a href="javascript:;" onclick="window.external.AddFavorite(location.href,document.title);return false;">Bookmark our website</a></div>
	</div>
</div>
<script>
function setHomepage(sURL) {
	
		document.body.style.behavior = 'url(#default#homepage)';
		document.body.setHomePage(sURL);
	
}             
</script>