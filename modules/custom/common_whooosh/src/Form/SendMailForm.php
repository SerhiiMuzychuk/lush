<?php

/**
 * @file
 * Contains Drupal\common_whooosh\Form\SendMailForm.
 */

namespace Drupal\common_whooosh\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SendMailForm extends FormBase {
	/**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'send_mail_form';
  }

/**
   * {@inheritdoc}
   */
public function buildForm(array $form, FormStateInterface $form_state) {
    // Объявляем телефон.
    $form['mail'] = array(
      '#type' => 'email',
      // Не забываем из Drupal 7, что t, в D8 $this->t() можно использовать
      // только с английскими словами. Иначе не используйте t() а пишите
      // просто строку.
      
    );

    
    // Предоставляет обёртку для одного или более Action элементов.
    $form['actions']['#type'] = 'actions';
    // Добавляем нашу кнопку для отправки.
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('SUBSCIBE'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  /**
   * Валидация отправленых данных в форме.
   *
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // Если длина имени меньше 5, выводим ошибку.
    
  }

  /**
   * Отправка формы.
   *
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Мы ничего не хотим делать с данными, просто выведем их в системном
    // сообщении.
    
  }

}