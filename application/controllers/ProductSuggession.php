<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProductSugesstion extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// Set the header 
		header('Content-Type: application/json'); 
		
		// Load the configuration file 

		// Get the config keys 
        $this->load->helper('server');

		// Using Memcached 
        $m = new Memcached();

        // Add server 
        $m->addServer(HOST_NAME, MEMCACHED_PORT);


		$productTitles = $m->get('product_title');

		$searchKeys = $m->get('search_key_words');

		$suggesstion = [];

		if(is_array($productTitles) && count($productTitles) === count($searchKeys )) {

		foreach($searchKeys as $key => $value ) {

		   $suggesstion[ucfirst (urldecode($value))] = $productTitles[$key];
		
		} 

		return $this->output->set_output(json_encode($suggesstion));
		
		}

		 // REST FUL ERROR MESSAGE 
        $msg = json_encode(['status' => '404', 'message' => 'Opps, We are unable to find something.']);

        // Send message 
        return $this->output->set_output(json_encode($msg));
		

		}
}






