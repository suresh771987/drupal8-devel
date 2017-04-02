<?php

/**
 * @file
 * Contains \Drupal\resume\Form\ResumeForm.
 */

namespace Drupal\devel\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\HtmlCommand;

class DevelForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'devel_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#id'] = 'devel-form';

    $form['candidate_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Candidate Name:'),
      '#required' => TRUE,
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
      '#ajax' => array(
        'callback' => 'Drupal\devel\Form\DevelForm::ajaxSubmit',
        'wrapper' => 'devel-form',
        'event' => 'click',
        'progress' => array('type' => 'throbber', 'message' => NULL),
      ),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function ajaxSubmit(array &$form, FormStateInterface $form_state) {

    $response = new AjaxResponse();
    $response->addCommand(new HtmlCommand('#devel-form', "Node created"));
    return $response;
  }

}
