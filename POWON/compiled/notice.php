<?php include template("header.html");?>
<!--TOP start-->
<?php include template("top.html");?>
<!--TOP end-->

<!--HEAD start-->
<?php include template("head.html");?>
<!--HEAD end-->

<!--NOTICE START-->
<div id="wp" class="wp">
	<div id="ct" class="wp cl w">
		<div class="nfl">
			<div class="f_c altw">
				<div id="messagetext" class="<?php echo $style; ?>">
				<p><?php echo $msg; ?>，Please wait…… <br />
				<script type="text/javascript" reload="1">setTimeout("location.href='<?php echo $url; ?>';", <?php echo $toTime; ?>);</script></p>
				<p class="alert_btnleft"><a href="<?php echo $url; ?>">If your browser didn't navigate automatically，please click the link below</a></p>
			</div>
			</div>
		</div>
	</div>
</div>
<!--NOTICE END-->

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
</body>
</html>

