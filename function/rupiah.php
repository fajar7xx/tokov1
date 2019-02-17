<?php  
////////////////////////////////////////////////////
// membuat fungsi pencetakan pemecahan rupiah nih //
//                                                //
////////////////////////////////////////////////////


function rupiah($angka){
	$hasil = "Rp " . number_format($angka, 2, ',', '.');
	return $hasil;
}
?>