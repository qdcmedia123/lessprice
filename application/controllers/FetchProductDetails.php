<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FetchProductDetails extends CI_Controller {

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
		$doc = new DOMDocument();

		// Restore error level
		//libxml_use_internal_errors(false);

		$internalErrors = libxml_use_internal_errors(true);

		$search_key = urlencode('Samsung Galaxy S10E');


		$data = [
				[
					'url' => 'https://uae.souq.com/ae-en/'.$search_key.'/s/?as=1',
					'attributes' => [
										'title' => '//h1[@class ="itemTitle"]',
										/*'logo' => '//img[@class="logo"]/@src',*/
										'image' => '//a[@class="img-bucket img-link itemLink sPrimaryLink"]/img/@data-src',
										'price' => "//h3[@class='itemPrice']",
		                                'description'=> "//div[@class='col col-info item-content']/a/@href",
		                                'review' => "//span[@class='rating-stars']",
		                                'shipping' => "//div[@class='free-shipping fs-ab-black']",
		                                'sim' => "//ul[@class='menu']/li/a",
		                                'original_price' => "//span[@class='was block itemOldPrice show']",
		                                /* 'discount_price' => "//span[@class='onoffer']",*/
		                                                                                                                    
									]
				],



		[
					'url' => 'https://www.carrefouruae.com/mafuae/en/search='.$search_key,
					'attributes' => [
										'title' => '//p[@class ="comp-productcard__name"]',
										/*'logo' => '//img[@class="c--logo"]/@src',*/
										'image' => '//img[@class="comp-productcard__img"]//@src',
										'price' => "//p[@class='comp-productcard__price']",
		 								'description'=> "//div[@class='comp-productcard__wrap']/a/@href",
		                                //need to add host name fot the description url
		                               /* 'review' => "//span[@class='rating-stars']",
		                               'shipping' => "//div[@class='free-shipping fs-ab-black']",
		                               'sim' => "//ul[@class='menu']/li/a",*/
		                               'original_price' => "//p[@class='comp-productcard__price']",
		                               /* 'discount_price' => "//span[@class='onoffer']",*/
									]
				],

		[
					'url' => 'https://www.erosdigitalhome.ae/catalogsearch/result/?q='.$search_key,
					'attributes' => [
										'title' => '//a[@class ="product-item-link"]',
										/*'logo' => '//a[@class="logo"]/img/@src',*/
										'image' => '//img[@class="product-image-photo"]//@src',
										'price' => "//span[@class='price']",
		                                'description'=> "//a[@class='product-item-link']/@href",
		                                /* 'review' => "//span[@class='rating-stars']",
		                                'shipping' => "//div[@class='free-shipping fs-ab-black']",
		                                'sim' => "//ul[@class='menu']/li/a",
		                                'original_price' => "//p[@class='comp-productcard__price']",*/
										'discount_price' => "//span[@class='onoffer']",
									]
				],
		[
					'url' => 'https://www.axiomtelecom.com/home/search?q='.$search_key,
					'attributes' => [
										'title' => '//span[@class ="variant-title"]/a',
										/*'logo' => '//div[@class="logo"]//a/img/@src',*/
										'image' => "//div[@id='content-slot']//div[@class='variant-image']//img/@src",
										'price' => "//span[@class='variant-final-price']",
		  								'description'=> "//span[@class='variant-title']/a/@href",
		                                //need to add host name fot the description url
		   								/* 'review' => "//span[@class='rating-stars']",
		                                'shipping' => "//div[@class='free-shipping fs-ab-black']",
		                                'sim' => "//ul[@class='menu']/li/a",*/
		                                'original_price' => "//span[@class='variant-list-price']",
										/*  'discount_price' => "//span[@class='variant-list-price']",*/
									]
				],

		[
					'url' => 'https://www.letstango.com/?q='.$search_key.'&idx=letsTango_default_products&p=0&is_v=1',
					'attributes' => [
										'title' => '//h1[@class ="line-clamp line-clamp-2"]',
										/*'logo' => '//img[@class="brand-image-desktop"]/@src',*/
										'image' => '//div[@class="thump_img"]//img/@src',
										'price' => "//div[@class='dealblock_thump']//h2",
		                                'description'=> "//div[@class='thump_img']/a/@href",
										/* 'review' => "//span[@class='rating-stars']",
		                                'shipping' => "//div[@class='free-shipping fs-ab-black']",
		                                'sim' => "//ul[@class='menu']/li/a",
		                                'original_price' => "//span[@class='variant-list-price']",
										'discount_price' => "//span[@class='variant-list-price']",*/
									]
				],

				[
					'url' => 'https://www.jumbo.ae/home/search?q='.$search_key.'/s/?as=1',
					'attributes' => [
										'title' => '//span[@class = "variant-title"]/a',
										/*'logo' => '//div[@class="logo"]//a//img/@src',*/
										'image' => "//div[@id='content-slot']//div[@class='variant-image']//img/@src",
										'price' => "//div[@id='content-slot']//span[@class='variant-final-price']",
										'description'=> "//span[@class='variant-title']/a/@href",
		                                //need to add host name fot the description url
		                                /* 'review' => "//span[@class='rating-stars']",
		                                 'shipping' => "//div[@class='free-shipping fs-ab-black']",
		                                'sim' => "//ul[@class='menu']/li/a",*/
		                                 'original_price' => "//span[@class='variant-list-price']",
										 /* 'discount_price' => "//span[@class='variant-list-price']",*/


					]
				],
		[
					'url' => 'https://www.noon.com/uae-en/search?q='.$search_key,
					'attributes' => [
										'title' => '//div[@class ="jsx-4075873112 name"]',
										/*'logo' => '//a[@class="jsx-1430647631 logoContainer"]/img/@src',*/
										'image' => '//div[@class="jsx-3461008014 mediaContainer"]//img/@src',
										'price' => "//span[@class='jsx-3248044173 sellingPrice']",
		                                'description'=> "//div[@class='jsx-4075873112 wrapper']/a/@href",
		                                 //need to add host name fot the description url
										/* 'review' => "//span[@class='rating-stars']",
		                                'shipping' => "//div[@class='free-shipping fs-ab-black']",
		                                'sim' => "//ul[@class='menu']/li/a",*/
		                                'original_price' => "//span[@class='jsx-3248044173 preReductionPrice']",
										 'discount_price' => "//span[@class='jsx-3248044173 discountBadge']",

									]
				],


		[
					'url' => 'https://uae.microless.com/search/?query='.$search_key,
					'attributes' => [
										'title' => '//div[@class ="product-title"]/a',
										/*'logo' => '//a[@class="site-logo"]/img/@src',*/
										'image' => '//div[@class="product-image-wrap"]//img/@src',
										'price' => "//span[@class='amount']",
		  								'description'=> "//div[@class='product-title']/a/@href",
		                                /* 'review' => "//span[@class='rating-stars']",*/
										'shipping' => "//div[@class='free-shipping']",
		                                /* 'sim' => "//ul[@class='menu']/li/a",,
		                                'original_price' => "//span[@class='price-old']",
										'discount_price' => "//div[@class='product-discount-badge']",*/
									]
				],
		[
					'url' => 'https://www.amazon.com/s?k='.$search_key.'&ref=nb_sb_noss_2',
					'attributes' => [
										'title' => '//span[@class ="a-size-medium a-color-base a-text-normal"]',
										/*'logo' => '//img[@class="brand-image-desktop"]/@src',*/
										'image' => '//img[@class="s-image"]/@src',
										'price' => "//span[@class='a-color-base']",
										'description'=> "//a[@class='a-link-normal a-text-normal']/@href",
										//need to add host name fot the description url
		                                'review' => "//span[@class='starRating__count']",
		                                'shipping' => "//span[@class='a-size-small a-color-secondary']",
		                                /* 'sim' => "//ul[@class='menu']/li/a",,*/
		                                'original_price' => "//span[@class='a-offscreen']",
										/* 'discount_price' => "//div[@class='product-discount-badge']",*/
									]
				]
		];



		$output = [];

		$siva = [];


		foreach ($data as $item) {
		    $content = file_get_contents($item['url']);

		    $doc->loadHTML($content);

		    $xpath = new DomXPath($doc);

		    // get grouped
		    $groupedItems = [];

		    // James
		    $all = [];


		    foreach ($item['attributes'] as $key => $value) {

		        if ($xpath->query($value) === false) {

		            continue;
		            
		        } else {
		            $Inner = [];

		            for ($j = 0; $j < $xpath->query($value)->length; $j++) {
		               
		               	// if($j === 15) { break; }
		                $Inner[] = preg_replace('/\s\s+/', ' ', trim($xpath->query($value)->item($j)->nodeValue, "\t\n\r\0\x0B"));
		            }

		            $all[$key] = $Inner;


		            $val = $xpath->query($value)->item(0)->nodeValue ?? '';

		            $groupedItems[$key] = preg_replace('/\s\s+/', ' ', trim($val, "\t\n\r\0\x0B"));
		        }
		    }



		    $parseurl = parse_url($item['url'])['host'];

		    $siva[$parseurl] = $all;

		    $output ["$parseurl"] = $groupedItems;
		}

		// Get data 
		$getData = [];


		// Loop data throught the value 
		foreach ($siva as $key => $value) {
		    $getBlock = [];



		    $howMany = count($value[key($value)]);


		    
		    for ($i = 0; $i < $howMany; $i++) {
		        $a = [];


		        foreach ($value as $k => $v) {
		            $a[$k] = isset($value[$k][$i]) ? $value[$k][$i] : '';
		        }

		        $getBlock[] = $a;
		    }
		        
		    $getData[$key] = $getBlock;
		}

		// Get max record 
		$getMaxRecord = $this->GetMaxRecord($getData);

		// Defining variable 
		$b = [];

		// Defining 
		$c = [];

		// Loop through each data 
		for ($i = 0; $i < $getMaxRecord; $i++) {
			foreach ($getData as $key => $value) {
				if (isset($getData[$key][$i])) {
				    $b[$key] = $getData[$key][$i];
				} else {
				    unset($b[$key]);
				}
		}

			$c[] = $b;
		}

		$productTitle = $siva['uae.souq.com']['title'] ?? '';

		// Load the configuration file 

		// Get the config keys 
        $this->load->helper('server');

		// Using Memcached 
        $m = new Memcached();

        // Add server 
        $m->addServer(HOST_NAME, MEMCACHED_PORT);


		// Get the product search title 
		$memSearchedKeyword = $m->get('search_key_words');
		$memProductTitles = $m->get('product_title');
		// Product Search Result 
		$productSearchResult = $m->get('product_search_result');



		if(is_array($memSearchedKeyword)) {

			if(!in_array($search_key, $memSearchedKeyword)) {

				array_push($memSearchedKeyword, $search_key);
				array_push($memProductTitles, $productTitle);
				array_push($productSearchResult, $c);

			
			} else {

				$memSearchedKeyword = $memSearchedKeyword;
				$memProductTitles = $memProductTitles;
				$productSearchResult = $productSearchResult;

			}

		} else {

			// Initialize the array 
			$memSearchedKeyword = [$search_key];
			$memProductTitles = [$productTitle];
			$productSearchResult = [$c];


		}



		// Check the product title 
		$m->set('search_key_words', $memSearchedKeyword );
		$m->set('product_title', $memProductTitles);
		$m->set('product_search_result', $productSearchResult);

		// Load view with all message 
	
		
		
		$message = 
			[
				'status' => 'success', 'message' => 'Product added sucessfull to you database'
			];




		$this->load->view('can-be-less-price/templates/header.php');
		$this->load->view('administrator/content/index', $message);
		$this->load->view('can-be-less-price/templates/footer');
	}

	public function GetMaxRecord($records)	{
	    return max(array_map(function ($items) {
	        return count($items) ;
	    }, $records));
	}

	

	
}
