<?php

declare(strict_types = 1);

namespace Drupal\custom_layout\Plugin\Layout;

use Drupal\custom_layout\CustomLayout;
use Drupal\custom_layout\Helper\MediaHelperTrait;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Plugin\PluginFormInterface;

/**
 * Provides a layout base for custom layouts.
 */
abstract class LayoutBase extends LayoutDefault implements PluginFormInterface {

  use MediaHelperTrait;

  /**
   * {@inheritdoc}
   */
  public function build(array $regions): array {
    $build = parent::build($regions);

    $build['#attributes']['class'][] = [];

    $hero = $this->configuration['hero'];
    if ($hero) {
      $build['#attributes']['class'][] = 'l-hero-row';
    }

    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration(): array {
    return [
      'background_color' => CustomLayout::NO_BACKGROUND_COLOR,
      'class' => NULL,
      'hero' => FALSE,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state): array {

    $pluginId = $this->getPluginId();

    $form['background'] = [
      '#type' => 'details',
      '#title' => $this->t('Background'),
      '#open' => $this->hasBackgroundSettings(),
    ];

    $form['background']['background_color'] = [
      '#type' => 'custom_layout_background_color_radios',
      '#plugin_id' => $this->getPluginDefinition()->id(),
      '#default_value' => $this->configuration['background_color'],
    ];

    $form['extra'] = [
      '#type' => 'details',
      '#title' => $this->t('Extra'),
      '#open' => TRUE,
    ];

    $form['extra']['hero'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Hero Mode'),
      'checkbox' => [
        '#type' => 'checkbox',
        '#title' => $this->t('Enable hero mode'),
        '#description' => $this->t('Enabling hero mode will remove the left and right space of the row. This will make the row the width of the browser window.'),
        '#default_value' => $this->configuration['hero'],
      ],
    ];

    $form['#attached']['library'][] = 'custom_layout/layout_builder';

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    $this->configuration['background_color'] = $values['background']['background_color'];
    $this->configuration['hero'] = (bool) $values['extra']['hero']['checkbox'];

  }

  /**
   * Determine if this layout has background settings.
   *
   * @return bool
   *   If this layout has background settings.
   */
  protected function hasBackgroundSettings(): bool {
    if (!empty($this->configuration['background_color'])) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Determine if this layout has extra settings.
   *
   * @return bool
   *   If this layout has extra settings.
   */
  protected function hasExtraSettings(): bool {
    return $this->configuration['class'] || $this->configuration['hero'];
  }

}
