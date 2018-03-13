<?php


namespace Drupal\first_module\Controller;
/**
 * Class ApiSettingsController.
 *
 * @package Drupal\first_module\Controller
 */
use Drupal\Core\Controller\ControllerBase;
class ApiSettingsController extends ControllerBase
{
    /**
     * Returns settings page.
     */
    public function getSettingsPage()
    {
        return array(
            '#type' => 'markup',
            '#markup' => t('Hello world'),
        );
    }
}

