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
 *   id = "mirror_twin_pop_up",
 *   admin_label = @Translation("Pop Up")
 * )
 */
class PopUp extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $config = $this->getConfiguration();
    return [
      '#markup' => $this->t('This is placeholder content. It is overridden with the block template.'),
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

    $form['header'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Header'),
      '#maxlength' => 255,
      '#description' => $this->t('The text displayed in the header area of the block.'),
      '#default_value' => $config['header'] ?? NULL,
      '#required' => FALSE,
    ];

    $form['subheader'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Sub Header'),
      '#maxlength' => 255,
      '#description' => $this->t('The text displayed in the subheader area of the block.'),
      '#default_value' => $config['subheader'] ?? NULL,
      '#required' => FALSE,
    ];
    
    $form['image'] = [
      '#type' => 'media_library',
      '#allowed_bundles' => ['image'],
      '#title' => t('Upload your image'),
      '#default_value' => $config['image'] ?? NULL,
      '#description' => t('Upload or select your popup image.'),
    ];
    
    $form['link'] = [
      '#type' => 'url',
      '#title' => $this->t('Link address'),
      '#size' => 30,
      '#default_value' => $config['link'] ?? NULL,
    ];
  

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['header'] = $values['header'];
    $this->configuration['subheader'] = $values['subheader'];
    $this->configuration['image'] = $values['image'];
    $this->configuration['link'] = $values['link'];
  }

}
