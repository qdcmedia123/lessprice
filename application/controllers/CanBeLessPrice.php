<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CanBeLessPrice extends CI_Controller {

public function __construct() {
       

        parent:: __construct();
        ini_set('display_errors', 1);
        $this->load->helper('url');
        $this->load->library('session');
   
    }


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

		
		//$searchString = 'microsoft Surface Pro 4 Tablet - Intel Core i7, 12.3 Inch, 256GB, 8GB, WiFi, Windows 10 Pro, Silver with Surface Pen';

		$searchString = $this->input->post('search') ?? '';

		$m = new Memcached();
		$m->addServer('localhost', 11211);
		$productTitles = $m->get('product_title');
		$searchKeys = $m->get('search_key_words');
		$productSearchResult = $m->get('product_search_result');


		$output = $searchString !== '' ? json_encode($this->IfProductFound($productTitles, $searchString, $productSearchResult, $searchKeys)) : [];
		
		
		//$_SESSION['test'] = rand(1, 10);

		$data = ['output' => $output, 'searchString' => $searchString];

		$this->load->view('can-be-less-price/templates/header');
		$this->load->view('can-be-less-price/contents/index', $data);
		$this->load->view('can-be-less-price/templates/footer');
	}

	public function defaut_page() {


		$this->load->view('lessprice/index');
		

	}


	public function IfProductFound( 
						array $productTitles, 
						string $searchString, 
						array $productSearchResult, 
						array $searchKeys ):array {

	$finding = false;

	foreach($productTitles as $key => $value) {

	$found = false;

	// Again value foreach 
	foreach($value as $iKey => $iValue) {
		// Match the string 
		if(strtolower($iValue) === strtolower($searchString)) {

			// Set the variable 
			$found = true;

			// Break the  loop
			break;
		}
	}

	// Check if found is true 
	if($found === true ) {

		// Exchange key value 
		$copyFirstIndex = $productSearchResult[$key][0];

		$productSearchResult[$key][0] = $productSearchResult[$key][$iKey];

		$productSearchResult[$key][$iKey] = $copyFirstIndex;

		$finding =  [ 'result' => $productSearchResult[$key], 'index_to_find' => $iKey];
		// Then break the loop 
		break;
	}  

	}

	if($finding === false ) {

		// If nothing found we still need to look if the keyword is matching in the product search array array somewhere 
		foreach($searchKeys  as $key => $value ) {

			
			// If search string is greater then value 
			$found = strlen($value) <= strlen($searchString) ? stripos($searchString, urldecode ($value)) : stripos(urldecode($value), $searchString);
			
			// Check if it is false 
			if($found !== false ) {

				$finding = ['result' => $productSearchResult[$key]];

				break;
			}
		}
	}
	
	// Return finding 
	return $finding ? $finding : ['status' => 404, 'message' => 'Opps, We are unable to find anything right at the moment.', 'searchString' => $searchString];

}
	



	
}
