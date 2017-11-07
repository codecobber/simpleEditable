<?php


	define("OTHERPATH","../../data/other/");


	//error handler function
	function customError($errno, $errstr) {
	  echo "<b>Error:</b> [$errno] $errstr";
	}

	//set error handler
	set_error_handler("customError");



	//get sent content
	$txt = strip_tags($_POST['content']);
	$txt = str_replace("&nbsp", "", $txt);
	$txt = str_replace("<?", "", $txt);
	$txt = str_replace("?>", "", $txt);
	$txt = trim($txt);

	$id = $_POST['id'];
	$id = str_replace('#', '', $id);



	$xmlDoc = new DOMDocument();
	$xmlDoc->load(OTHERPATH."/components.xml");
	$counter=0;
	
	$titles = $xmlDoc->getElementsByTagName('slug');
	foreach ($titles as $title) {

		if($title->nodeValue == $id){
			$xmlDoc->getElementsByTagName("value")->item($counter)->nodeValue = $txt;
			$xmlDoc->save(OTHERPATH."/components.xml");
   			echo $xmlDoc->getElementsByTagName("value")->item($counter)->nodeValue = $txt;
		}
    	$counter++;	
	}	
   


?>
