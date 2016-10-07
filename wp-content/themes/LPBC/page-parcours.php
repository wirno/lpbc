<?php $url = get_permalink(); ?>
<form action="<?php bloginfo('template_url'); ?>/include/pdfg.php" method="POST" target="_blank">
	<input type="hidden" name="url_pdf" value="<?php echo $url;?>">
	<div><input type="submit" value="generer le pdf"></div>
</form>