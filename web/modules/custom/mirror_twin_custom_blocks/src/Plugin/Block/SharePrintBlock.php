<?php

declare(strict_types = 1);

namespace Drupal\mirror_twin_custom_blocks\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a custom block for rendering of the share and print icons.
 *
 * @Block(
 *   id = "mirror_twin_share_print_block",
 *   admin_label = @Translation("Share and Print Icons"),
 * )
 */
class SharePrintBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    return [
      '#markup' => $this->t('This is placeholder content. It is overridden with the block template.'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account): object {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state): array {
    $config = $this->getConfiguration();

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state): void {
    $this->configuration['mirror_twin_share_print_settings'] = $form_state->getValue('mirror_twin_share_print_settings');
  }

}
