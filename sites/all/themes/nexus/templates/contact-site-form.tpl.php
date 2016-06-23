<?php global $base_url;?>
<div id="popup-form">
  <div class="popup-header">
    <div class="logo">
      <a href="<?php print $base_url;?>">
        <img src="<?php print $base_url;?>/sites/all/themes/nexus/logo.png" alt="<?php print t('Home'); ?>" />
      </a>
    </div>
    <div class="message">
      Please send all questions about orders to <a href="mailto:info@socialvalueaotearoa.nz">info@socialvalueaotearoa.nz</a> or fill out the form below
    </div>
  </div>
  <form class="user-info-from-cookie contact-form" action="<?php print $base_url;?>/modal_forms/nojs/contact" method="post" id="contact-site-form" accept-charset="UTF-8">
    <div class="has-error form-item form-item-name form-type-textfield form-group"> 
      <input type="text" id="edit-name" name="name" value="" size="60" maxlength="255" class="form-text required" placeholder="Your name" />
    </div>
    <div class="has-error form-item form-item-mail form-type-textfield form-group last">
      <input type="text" id="edit-mail" name="mail" value="" size="60" maxlength="255" class="form-text required" placeholder="Your e-mail address" />
    </div>
    <div class="has-error form-item form-item-subject form-type-textfield form-group full-row"> 
      <input type="text" id="edit-subject" name="subject" value="" size="60" maxlength="255" class="form-text required" placeholder="Subject" />
    </div>
    <div class="has-error form-item form-item-message form-type-textarea form-group full-row"> 
      <div class="form-textarea-wrapper resizable">
        <textarea id="edit-message" name="message" cols="60" rows="5" class="form-textarea required" placeholder="Type your message here"></textarea>
      </div>
      <input type="hidden" name="form_build_id" value="<?php print $form['#build_id'];?>" />
      <input type="hidden" name="form_id" value="contact_site_form" />
    </div>
    <div class="form-actions form-wrapper" id="edit-actions col-sm-12">
      <input type="submit" id="edit-submit" name="op" value="Send message" class="form-submit" />
    </div>
  </form>
</div>