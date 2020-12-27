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

    $class = $this->configuration['class'];
    if ($class) {
      $build['#attributes']['class'] = array_merge(
        explode(' ', $this->configuration['class']),
        $build['#attributes']['class']
      );
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

    $form['layout'] = [
      '#type' => 'details',
      '#title' => $this->t('Layout'),
      '#open' => TRUE,
    ];

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

}
