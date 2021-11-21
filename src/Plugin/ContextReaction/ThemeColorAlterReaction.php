<?php

namespace Drupal\webinar_cd\Plugin\ContextReaction;

use Drupal\context\ContextReactionPluginBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * ThemeColorAlterReaction Context Reaction Plugin.
 *
 * @ContextReaction(
 *   id = "themecoloralterraction",
 *   label = @Translation("ThemeColorAlterReaction")
 * )
 */
class ThemeColorAlterReaction extends ContextReactionPluginBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return parent::defaultConfiguration() + [
      'color' => "",
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function summary() {
    return $this->t('Change the base color of the theme');
  }

  /**
   * {@inheritdoc}
   */
  public function execute() {
    $config = $this->getConfiguration();
    return [
      'color' => $config['color'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {

    $form['color'] = [
      '#title' => $this->t('Color'),
      '#default_value' => $this->configuration['color'],
      '#type' => 'textfield',
      '#description' => $this->t('The new hex color to use'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->setConfiguration([
      'color' => $form_state->getValue('color'),
    ]);
  }

}