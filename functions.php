<?php 
function get_average_rating($isbn, $conn){
	$avg_stid = oci_parse($conn, "Select sum(book_rating)/count(*) from ratings where isbn ='".$isbn."'");
	$num_stid = oci_parse($conn, "Select count(*) from ratings where isbn ='".$isbn."'");
  	if(oci_execute($avg_stid) && oci_execute($num_stid)){
  		$result['AVERAGE_RATING'] = round(current(oci_fetch_array($avg_stid)), 2);
  		$result['NUMBER_OF_RATINGS'] = current(oci_fetch_array($num_stid));
  		return $result;
  	}else{
  		return -1;
  	}
}
?>
