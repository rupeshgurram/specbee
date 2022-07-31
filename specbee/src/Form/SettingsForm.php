<?php

/**
 * @file
 * Contains Drupal\specbee\Form\SettingsForm.
 */

namespace Drupal\specbee\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SettingsForm.
 *
 * @package Drupal\specbee\Form
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'specbee.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('specbee.settings');
	
	$dropdowns = array(
	  "0"=>'select List',
      "america/chicago" => 'America/Chicago',
	  "america/new_York" => 'America/New_York',
	  "asia/tokyo" => 'Asia/Tokyo',
	  "asia/dubai" => 'Asia/Dubai',
	  "asia/kolkata" => 'Asia/Kolkata',
	  "europe/amsterdam" => 'Europe/Amsterdam',
	  "europe/oslo" => 'Europe/Oslo',
	  "europe/london" => 'Europe/London',
	);

    $form['Country'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Mention your country'),
	  '#required => TRUE'
      '#default_value' => $config->get('Country'),
    );
	
	$form['City'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Mention your City'),
	  '#required => TRUE'
      '#default_value' => $config->get('City'),
    );
	
	$form['Timezone'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Mention your Timezone'),
	  '#required => TRUE'	  
      '#default_value' => $dropdowns,
    );

    return parent::buildForm($form, $form_state);
  }
  
  
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('specbee.settings')
      ->set('Country', $form_state->getValue('Country'))
	  ->set('City', $form_state->getValue('City'))
	  ->set('Timezone', $form_state->getValue('Timezone'))
      ->save();
  }

}
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
