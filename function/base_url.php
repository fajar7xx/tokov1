<?php  
// fungsi base_url
function base_url($url = null){
	$base_url = "http://localhost/toko";
	if($url != null){
		return $base_url. "/" .$url;
	}
	else{
		return $base_url;
	}
}

?>