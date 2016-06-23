<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		var $edit_subscribe = jQuery('#edit-subscribe');
		var $edit_unsubscribe = jQuery('#edit-unsubscribe');
		$edit_unsubscribe.remove();		
		jQuery('.form-item-mail').append($edit_subscribe);
		jQuery('label[for="edit-mail"]').remove();
		jQuery('#edit-mail').attr('placeholder','Your email address');


		jQuery('#main-menu #top-menu a').each(function(){
			var elementUrl = jQuery(this).attr('href');
			var pathArray = window.location.pathname.split( '/' );
			if(pathArray[2].length > 0 && elementUrl.indexOf(pathArray[2]) > -1 ){
				jQuery(this).parent().addClass('active');
			}
		});	

});
</script>
<!--[if lt IE 9]><script src="<?php print base_path() . drupal_get_path('theme', 'nexus') . '/js/html5.js'; ?>"></script><![endif]-->
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
