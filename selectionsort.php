<?php  
function selectionSort($data) {
    $length = count($data);
    for($i=0;$i<$length-1;$i++) {
		$minIndex = $i;
        for($j=$i+1;$j<=$length-1;$j++) {
            if($data[$j] < $data[$minIndex]) {
				$minIndex = $j;
            }
        }
		$tmp = $data[$minIndex];
        $data[$minIndex] = $data[$i];
        $data[$i] = $tmp;
    }
    return $data;
}
$_array = array(12,4,5,2,90,3,1,34,55);
$_array = selectionSort($_array);
print_r($_array);
?>