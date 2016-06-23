<?php
/**
 * Custom Rules Actions.
 */
function Adduserpassword_rules_action_info() {
  
  $actions['set_user_password'] = array(
    'parameter' => array(
      'account' => array(
        'type' => 'user',
        'label' => t('User'),
      ),
      'new_password' => array(
        'type' => 'text',
        'label' => t('New password'),
      )
    ),
    'group' => t('Custom Module'),
    'label' => t('Set a user password'),
    'base' => 'custom_module_rules_action_set_user_password',
  );
  dpm($actions);
  return $actions;
}

/**
 * Action: Set a user account password.
 */
function Adduserpassword_rules_action_set_user_password($account, $new_password) {
  $edit = array('pass' => $new_password);
  user_save($account, $edit);
}