<?php 

$logos = array(
   
        'uae.souq.com' => 'https://cf1.s3.souqcdn.com/public/style/img/en/souqAmazon-logo-v2.png',
      	'www.carrefouruae.com' => 'https://hybrisprod.azureedge.net/sys-master-prod/static_images/carrefour.svg',
		'www.erosdigitalhome.ae' => 'https://cdn.erosdigitalhome.ae/pub/media/logo/default/english.png',
		'www.axiomtelecom.com' => 'https://bab-assets2.babapi.ooo/img/lookandfeel/8687242/af55ef6287b71_axiomlogo.png.999xx.png',
		'www.letstango.com' => 'https://www.letstango.com/skin/frontend/default/ltreact/images/lets-tango-logo-light.png',
  		'www.jumbo.ae' => 'https://bab-assets3.babapi.ooo/img/lookandfeel/0441617/da39a3ee5e6b4b0d3255b_jumbo.png.999xx.png',
		'www.noon.com' => 'https://k.nooncdn.com/s/app/2019/com-www-bigalog/f668c69a972129bbd6f74d6331994b19084e8636/static/images/noon_logo_black_english.svg',
		'uae.microless.com' => 'https://uae.microless.com/cdn/microless-svg-logo-next.svg',
		'www.amazon.com'=> 'https://images-na.ssl-images-amazon.com/images/G/01/rainier/available_at_amazon_1200x600_Nvz5h2M.png',

);

?>
<section class="section-content bg padding-y">
<div class="container">

<div class="row">
	
	<div class = "col-md-2">
	</div>
	<main class="col-md-10">


	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<section class="section-content bg padding-y">
<div class="container">

<div class="row">
	
	<div class="col-sm-2">
	</div>
	<main class="col-sm-10">

<?php if(isset($output)) :?>

<!-- Check if result is set -->
<?php
	$decode = json_decode($output, true);
	$result = $decode['result'] ?? null;
?>

<!-- Check if it is not null -->
<?php if($result !== null) :?>

<!-- Count the result in the array -->
<?php for($i = 0; $i < count($result); $i++) :?>

<!-- Foreach data inside the index -->
<?php foreach($result[$i] as $key => $value) :?>

<?php 
	if(!filter_var($value['description'], FILTER_VALIDATE_URL)) {

		$value['description'] = 'http://'.$key.'/'.$value['description'];

	}
?>

<article class="card card-product">
	<div class="card-body">
	<div class="row">
		<aside class="col-sm-3">
			<div class="img-wrap">
				
				<img src="<?= $value['image']?>">

			</div>
		</aside> <!-- col.// -->
		<article class="col-sm-6">
				<h5 class="title"> <?= $value['title']?></h5>
				<div class="rating-wrap  mb-2">
					<ul class="rating-stars">
						<li style="width:80%" class="stars-active"> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> 
						</li>
						<li>
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> 
						</li>
					</ul>

					<?php
					$review = '';

						if(isset($value['review'])){

							if($value['review'] !== '') {

								$review = $value['review'] . 'reviews';
							}
						}
					?>
					<div class="label-rating"><?= $review ?></div>
					
				</div> <!-- rating-wrap.// -->

				<!--
				<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Ut wisi enim ad minim veniam </p>

			-->
				 <!-- <dl class="dlist-align">
				  <dt>Color</dt>
				  <dd>Black and white</dd>
				 </dl> item-property-hor .// 
				<dl class="dlist-align">
				  <dt>Material</dt>
				  <dd>Syntetic, wooden</dd>
				</dl>  <!-- item-property-hor .//
				<dl class="dlist-align">
				  <dt>Delivery</dt>
				  <dd>Russia, USA, and Europe</dd>
				</dl>  <!-- item-property-hor .// -->
				
				<dl class="dlist-align">
			<dt> 

		<img style="width:140px; 
			text-shadow: 0 1px black;
		    background: #333; /* For browsers that don't support RGBA */
		    background: rgba(0,0,0,0.18);
		    padding: 4px 8px;" src="<?= $logos[$key];?>" alt="">

</dt>
			</dl> 
				
				
			
		</article> <!-- col.// -->
		<aside class="col-sm-3 border-left">
			<div class="action-wrap">
				<div class="price-wrap h4">
					<span class="price"> <?= $value['price']; ?> </span>	
					<del class="price-old"> <?= $value['original_price']; ?></del>
				</div> <!-- info-price-detail // -->
				<p class="text-success"><?= $value['shipping']?></p>
				<p class="text-success"><?= $value['discount_price'] ?? '';?></p>

				<br>
				<p>
					<a href="<?= $value['description']; ?>" target="_blank" class="btn btn-primary"> Buy now </a>
					<a href="<?= $value['description']; ?>" target="_blank" class="btn btn-secondary"> Details  </a>
				</p>
				<a href="#"><i class="fa fa-heart"></i> Add to wishlist</a>
			</div> <!-- action-wrap.// -->
			
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
	</div> <!-- card-body .// -->
</article> <!-- card product .// -->


<?php endforeach; ?>
<!-- End foreach data here -->

<?php endfor; ?>

<?php else: ?>

<!-- Check that if variable array is empty -->

<?php if(count($output) === 0):?>

<?php else: ?>

 <?php
  
   	$message = json_decode($output, true);

   ?>

<div class="alert alert-info" role="alert">
<?= $message['message'].' '.$message['searchString'] ;?>
</div>

<?php endif; ?>


<?php endif; ?>

<?php endif ;?>





</div> <!-- container .//  -->
</section>


