<?php

/**
 * @file
 * Post update functions for Media Entity Actions.
 */

use Drupal\system\Entity\Action;

/**
 * Update existing views to use "bulk_form" plugin instead of "media_bulk_form".
 *
 * Update system actions to use core plugins.
 *
 * Uninstall media_entity_actions module.
 */
function media_entity_actions_post_update_upgrade_remove() {
  if (\Drupal::moduleHandler()->moduleExists('views')) {
    $view_ids = \Drupal::entityQuery('view')
      ->condition('display.*.display_options.fields.*.plugin_id', 'media_bulk_form')
      ->execute();

    $views = \Drupal::entityTypeManager()->getStorage('view')->loadMultiple($view_ids);

    /* @var \Drupal\views\Entity\View[] $views */
    foreach ($views as $view) {
      $displays = $view->get('display');
      foreach (array_keys($displays) as $display_id) {
        $display =& $view->getDisplay($display_id);

        if (isset($display['display_options']['fields'])) {
          foreach ($display['display_options']['fields'] as $field_name => $value) {
            if (isset($value['plugin_id']) && $value['plugin_id'] == 'media_bulk_form') {
              $display['display_options']['fields'][$field_name]['plugin_id'] = 'bulk_form';
            }
          }
        }
      }
      $view->save();
    }
  }

  $mapping = [
    'media_delete_action' => 'entity:delete_action:media',
    'media_publish_action' => 'entity:publish_action:media',
    'media_save_action' => 'entity:save_action:media',
    'media_unpublish_action' => 'entity:unpublish_action:media',
  ];
  foreach ($mapping as $action_id => $plugin_id) {
    /** @var \Drupal\system\ActionConfigEntityInterface $action */
    $action = Action::load($action_id);
    if ($action && $action->getPlugin()->getPluginId() != $plugin_id) {
      $action->setPlugin($plugin_id);
      $action->save();
    }
  }

  // Uninstall the module if there are no remaining configuration dependents.
  $dependents = \Drupal::service('config.manager')->findConfigEntityDependents('module', ['media_entity_actions']);
  if (empty($dependents)) {
    \Drupal::service('module_installer')->uninstall(['media_entity_actions'], FALSE);
  }
  else {
    \Drupal::logger('media_entity_actions')->warning('Unable to uninstall media_entity_actions since there are remaining config entity dependents: @ids', ['@ids' => implode(', ', array_keys($dependents))]);
  }
}
