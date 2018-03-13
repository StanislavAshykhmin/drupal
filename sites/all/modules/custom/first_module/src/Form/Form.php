<?php

namespace Drupal\first_module\Form;

use Drupal\Core\Form\FormBase;                   // Базовый класс Form API
use Drupal\Core\Form\FormStateInterface;              // Класс отвечает за обработку данных

/**
 * Наследуемся от базового класса Form API
 * @see \Drupal\Core\Form\FormBase
 */
class Form extends FormBase {

    // метод, который отвечает за саму форму - кнопки, поля
    public function buildForm(array $form, FormStateInterface $form_state) {

        $form['title'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Ваше имя'),
            '#description' => $this->t('Имя не должно содержать цифр'),
            '#required' => TRUE,
        ];

        // Add a submit button that handles the submission of the form.
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Отправить форму'),
        ];

        return $form;
    }

    // метод, который будет возвращать название формы
    public function getFormId() {
        return 'ex_form_exform_form';
    }

    // ф-я валидации
    public function validateForm(array &$form, FormStateInterface $form_state) {
        $title = $form_state->getValue('title');
        $is_number = preg_match("/[\d]+/", $title, $match);

        if ($is_number > 0) {
            $form_state->setErrorByName('title', $this->t('Строка содержит цифру.'));
        }
    }

    // действия по сабмиту
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $title = $form_state->getValue('title');
        drupal_set_message(t('Здравствуйте, %title!', ['%title' => $title]));
    }

}
