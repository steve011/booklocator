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

function is_admin($user, $conn){
	$stid = oci_parse($conn, "Select admin from users where username='".$user."'");
  	if(oci_execute($stid)){
  		$admin = current(oci_fetch_array($num_stid));
  		echo $admin;
		if($admin == 'T'){
			return true;
		}
  	}
	return false;
}


function display_book($row, $connection){
	$isbn = $row["ISBN"];
	$_SESSION["$isbn"] = $row;
	$rating = get_average_rating($row["ISBN"], $connection);
	if($rating['AVERAGE_RATING'] > 0) $_SESSION["$isbn"]['RATING'] = $rating;
	echo '<a href="product.php?Product='.htmlentities($row["ISBN"]).'">';
	echo '<div class="col-xs-2" style="height:300px;margin:19.5px;;background-size:100% 100%;>';
	echo '<img style="z-index:1;position:absolute;height:250px;width:100%;" src="http://i.imgur.com/pV1XQjk.jpg">';
	echo '<img style="z-index:2;position:relative;height:250px;width:100%;" src="'.htmlentities($row["IMAGE_URL_L"]).'">';
	echo '<div class="width:100%;text-align:center;color:white;border-top:1px solid black;">';
	echo '<p style="font-size:12px;text-align:center;">'.htmlentities($row["TITLE"]).'</p>';
	if($rating['AVERAGE_RATING'] > 0) echo '<p style="font-size:12px;text-align:center;"> Average Rating: '.htmlentities($rating['AVERAGE_RATING']).'</p>';
	if(isset($row["PRICE"])) echo '<p style="font-size:12px;text-align:center;">$'.htmlentities($row["PRICE"]).'</p>';
	echo '</div></div></a>';
}

?>
