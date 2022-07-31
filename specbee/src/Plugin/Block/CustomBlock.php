<?php

/**
 * @file
 * Contains \Drupal\specbee\Plugin\Block;
 */

namespace Drupal\specbee\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

class CustomBlock extends BlockBase {
	
  /**
   * {@inheritdoc}
   */
   
  public function build() {
	
	$data = \Drupal::service('specbee.specbeeservice')->getdata();
	
	$form = \Drupal::formBuilder()->getForm('Drupal\specbee\Form\SettingsForm');
	
	return [
	  '#theme' => 'my_template',
	  '#data' => '$data',
	  '#form' => '$form',
	  '#cache' => .[
	    '#max-age => .0,
	];
  }
}