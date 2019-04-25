<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

public function __construct() {
       

        parent:: __construct();
        ini_set('display_errors', 1);
        $this->load->helper('url');
        $this->load->library('session');
   
    }

    public function index() { return 5; }
}
 ?>