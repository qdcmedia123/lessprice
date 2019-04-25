<!DOCTYPE html>
<html>
<head>
	
	<title>Search until you die.</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- CSS file -->
<link rel="stylesheet" href="<?= base_url()?>assets/css/easy-autocomplete.min.css"> 

<!-- Additional CSS Themes file - not required-->
<link rel="stylesheet" href="<?= base_url()?>assets/css/easy-autocomplete.themes.min.css"> 


	<style>
	
	@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}

.search {
  width: 100%;
  position: relative
}

.searchTerm {
  float: left;
  width: 100%;
  border: 3px solid #00B4CC;
  padding: 5px;
  height: 20px;
  border-radius: 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  position: absolute;  
  bottom:1px;
  right: -50px;
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  font-size: 20px;

}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 35%;
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.easy-autocomplete{

  width:90%;
}

</style>




</head>
<body>


<div class="wrap">
<h2 align="center"><font color="black" size="15">tri<font color="red">buy<font color="orange">go</h2>
<p style="font-size:30%;color:#000;" align="center">Find your Ideal Purchase and Compare Prices from Different Websites</p>

<form method="POST" action = "search">
   <div class="search">
      <input name = "search" type="text" class="searchTerm" placeholder="Type... eg: Samsung,Iphone...." id = "categories-basic" style = "width:100%;">


      
      <button type="submit" class="searchButton" style = "width:10%;">
        <i class="fa fa-search"></i>
     </button>
  
   
   </div>
</form>
</div>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <!-- JS file -->
  <script src="<?= base_url()?>assets/js/jquery.easy-autocomplete.min.js"></script> 
   <script src="<?= base_url()?>assets/js/keys.js"></script> 

<script>

 

    // http://localhost/canbelessprice/api/category_list_location
    // http://localhost/canbelessprice/api/product_sugesstion

    $.ajax({
      type: 'POST',
      url: ORIGIN+"/canbelessprice/api/category_list_location",
      data: {token: 'abcd'},
      dataType: "json",
      success: function(resultData) 
      { 
          

           var options = {
           url: ORIGIN+"/canbelessprice/api/product_sugesstion",
           categories: resultData
         ,
    
        list: {
    match: {
      enabled: true
    }
  }


};

$("#categories-basic").easyAutocomplete(options);
      }
});

   






  
 
</script>



</body>

</html>
