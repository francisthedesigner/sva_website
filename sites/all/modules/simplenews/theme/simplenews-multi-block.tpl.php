<?php
// $Id: simplenews-multi-block.tpl.php,v 1.6 2009/01/02 12:01:17 sutharsan Exp $

/**
 * @file
 * Default theme implementation to display the simplenews block.
 *
 * Copy this file in your theme directory to create a custom themed block.
 *
 * Available variables:
 * - $subscribed: the current user is subscribed to the $tid newsletter
 * - $user: the current user is authenticated
 * - $message: announcement message (Default: 'Stay informed on our latest news!')
 * - $form: newsletter subscription form
 *
 * @see template_preprocess_simplenews_multi_block()
 */
?>
<?php if($_GET['q'] == 'News'):?>
<div class="col-lg-6">
<h1>STAY UP TO DATE</h1>
</div>
<?php endif; ?>
<div <?php if ($_GET['q'] == 'News') print 'class="col-lg-6"'; else print 'style="width:100%;float:left;"';?>>
  <?php if ($message): ?>
  	<?php if ($_GET['q'] == 'News'):?>
    <h2>Welcome to ours news room. Here you can find latest news stories about social value Aotearoa.</h2>
	<?php else: ?>
    <h2>Latest Newsletters</h2>
	<?php endif; ?>
    <p><?php print $message; ?></p>
  <?php endif; ?>
  <?php print render($form); ?>
</div>