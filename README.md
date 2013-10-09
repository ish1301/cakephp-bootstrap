cakephp-bootstrap
=================

BootstrapFormHelper for apply bootstrap classes appropriately

To implement this FormHelper change AppController.php

    class AppController extends Controller {
        public $helpers = array('Form' => array('className' => 'BootstrapForm'));