<?php

declare(strict_types = 1);

namespace Drupal\mirror_twin_custom_blocks\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a custom block for rendering of the middle third icons.
 *
 * @Block(
 *   id = "mirror_twin_footer_middle_third",
 *   admin_label = @Translation("Mirror Twin Footer Middle Third"),
 * )
 */
class FooterMiddleThird extends BlockBase {

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
    $this->configuration['mirror_twin_footer_middle_third'] = $form_state->getValue('mirror_twin_footer_middle_third');
  }

}
