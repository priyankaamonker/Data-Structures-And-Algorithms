<?php
function hasDuplicateChars($s) {
	$item = str_split($s);
	$counter = array();
	foreach($item as $key => $val) {
		if(!in_array($val,$counter))
			$counter[] = $val;
		else 
			return "true";
	}
	if(count($counter) > 1)
		return "false";
}
$result = hasDuplicateChars("anaconda");
echo "anaconda has duplicates? " . $result;
?>