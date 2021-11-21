<?php

namespace Drupal\mirror_twin_custom_blocks\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Block for the left side of the footer.
 *
 * @Block(
 *   id = "mirror_twin_left_half",
 *   admin_label = @Translation("Left Half Footer Block")
 * )
 */
class FooterLeftHalf extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->configuration['content'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();

    $form['content'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Content'),
      '#description' => $this->t('The text displayed in the content area of the block.'),
      '#rows' => 10,
      '#default_value' => isset($config['content']['value']) ? $config['content']['value'] : NULL,
      '#format' => 'full_html',
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['content'] = $values['content']['value'];
  }

}
