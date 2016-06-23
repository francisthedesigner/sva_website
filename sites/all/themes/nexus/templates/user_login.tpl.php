<?php global $base_url;?>
<div id="popup-form">
  <div class="popup-header">
    <div class="logo">
      <a href="/membership">
        <img src="<?php print $base_url;?>/sites/all/themes/nexus/logo.png" alt="<?php print t('Home'); ?>" />
      </a>
    </div>
  </div>
  <form action="<?php print $base_url;?>/modal_forms/nojs/login" method="post" id="user-login" accept-charset="UTF-8">
    <div>
        <div class="has-error form-item form-item-name form-type-textfield form-group"> 
            <input id="edit-name" name="name" value="" size="25" maxlength="60" class="form-text required" type="text" placeholder="Username">
        </div>
        <div class="has-error form-item form-item-pass form-type-password form-group last">
            <input id="edit-pass" name="pass" size="25" maxlength="128" class="form-text required" type="password" placeholder="Password">
        </div><input name="form_build_id" value="<?php print $form['#build_id'];?>" type="hidden">
        <input name="form_id" value="user_login" type="hidden">
        <div class="form-actions form-wrapper" id="edit-actions"><input id="edit-submit" name="op" value="Log in" class="form-submit" type="submit"></div>
        <div class="item-list">
            <ul>
                <li class="first"><a href="<?php print $base_url;?>/modal_forms/nojs/register" class="ctools-use-modal ctools-modal-modal-popup-medium ctools-use-modal-processed" title="Create a new user account">Create new account</a></li>
                <li class="last"><a href="<?php print $base_url;?>/modal_forms/nojs/password" class="ctools-use-modal ctools-modal-modal-popup-small ctools-use-modal-processed" title="Request new password via e-mail.">Request new password</a></li>
            </ul>
        </div>
    </div>
</form>
</div>