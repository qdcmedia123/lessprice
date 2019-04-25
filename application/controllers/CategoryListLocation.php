<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class CategoryListLocation extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html

     
        categories: [
        {   //Category fruits
        listLocation: "Apple macbook pro",
        header: "--Apple--"

        }, 
        {   //Category vegetables
        listLocation: "Huawei MateBook 13 Laptop",
        header: "--Huawei--"

        }
        ],
        
     */
        public function __construct() {
        
        parent:: __construct();

        $this->load->helper('url');
        
    

    }
    





    public function index()
    {
      
        // Set content header type 
        header('Content-Type: application/json'); 

          // Get the config keys 
        $this->load->helper('server');

        // Using Memcached 
        $m = new Memcached();

        // Add server 
        $m->addServer(HOST_NAME, MEMCACHED_PORT);

        // Product title 
        $productTitles = $m->get('product_title');

        // Keyworlds 
        $searchKeys = $m->get('search_key_words');

        // Sugesstion 
        $suggesstion = [];

        // Loop each keyworld 
        if(is_array($searchKeys ) && count($searchKeys ) > 0) {

        foreach($searchKeys as $key => $value ) {

        // Change value 
        $value = ucfirst (urldecode($value));

        // Suggesstion 
        $suggesstion[] = [
                        'listLocation' => $value,
                        'header' => "--$value--"
                    ];
        } 


        return $this->output->set_output(json_encode($suggesstion));
        
        }

        // REST FUL ERROR MESSAGE 
        $msg = json_encode(['status' => '404', 'message' => 'Opps, We are unable to find something.']);

        // Send message 
        return $this->output->set_output(json_encode($msg));
        
    }


}



