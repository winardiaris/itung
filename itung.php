<?php
function UbahXXX($str){
	$str = trim($str);
	$search = array ("'\''",
						"'%'",
						"'@'",
						"'_'",
						"'1=1'",
						"'/'",
						"'!'",
						"'<'",
						"'>'",
						"'\('",
						"'\)'",
						"'\{'",
						"'\}'",
						"'\*'",
						"'&'",
						"'\^'",
						"'\"'",
						"';'",
						"'-'",
						"'_'",
						"'\['",
						"'\]'",
						"'\.'",
						"':'",
						"'  '",
						"'\\$'",
						"'#'",
						"'~'",
						"'`'",
						"'\+'",
						"'='",
						"'\?'",
						"'\|'",
						"'\\\'",
						"'/'",
						"'\,'"
					);

	$replace = array (" ");

	$str = preg_replace($search,$replace,$str);
	return $str;
	
}

function __hilang_simbol($str){
	return UbahXXX(UbahXXX(UbahXXX($str)));
}



function __data_kata($str){
	$data_kata = explode(" ",__hilang_simbol($str));
	return $data_kata;
}
function __kata($str){
	$kata = array("kata" => __data_kata($str));
	return $kata;
}
function __jumlah_kata($str){
	$data_jumlah_kata = count(__data_kata($str));
	$jumlah_kata = array("jumlah_kata" => $data_jumlah_kata);
	return $jumlah_kata;
}
function __hitung_kata($str){
	$data_hitung_kata = array_count_values(__data_kata($str));
	arsort($data_hitung_kata);
	$hitung_kata = array("hitung_kata" => $data_hitung_kata);
	return $hitung_kata;
}


//--karakter--
function __data_karakter($str){
	return str_split($str);
	
}
function __karakter($str){
	$karakter = array("karakter" => __data_karakter($str));
	return $karakter;
}
function __jumlah_karakter($str){
	$data_karakter= strlen($str);
	$karakter = array("jumlah_karakter" => $data_karakter);
	return $karakter;
}
function __hitung_karakter($str){
	$data_hitung_karakter = array_count_values(__data_karakter($str));
	arsort($data_hitung_karakter);
	$hitung_karakter = array("hitung_karakter" => $data_hitung_karakter);
	return $hitung_karakter;
}


function itung($str){
	$return = array();
	
	$kata = __kata($str);
	$jumlah_kata = __jumlah_kata($str);
	$hitung_kata = __hitung_kata($str);
		
	//karakter -------------
	$karakter = __karakter($str);
	$jumlah_karakter = __jumlah_karakter($str);
	$hitung_karakter = __hitung_karakter($str);
	
	array_push($return,$jumlah_kata);
	//~ array_push($return,$kata);
	array_push($return,$hitung_kata);
	array_push($return,$jumlah_karakter);
	//~ array_push($return,$karakter);
	array_push($return,$hitung_karakter);
		
	
	
	return $return;

}
if(isset($_REQUEST['str'])){
 $str = $_REQUEST['str'];
 echo json_encode(itung($str)).PHP_EOL;
}
?>
