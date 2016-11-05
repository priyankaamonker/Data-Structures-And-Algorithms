<?php  
function bubbleSort($data) {
    $length = count($data);
    for($i=0;$i<$length-2;$i++) {
        for($j=0;$j<$length-1-$i;$j++) {
            if($data[$j] > $data[$j+1]) {
                $tmp = $data[$j+1];
                $data[$j+1] = $data[$j];
                $data[$j] = $tmp;
            }
        }
    }
    return $data;
}
$_array = array(12,4,5,2,90,3,1,34,55);
$_array = bubbleSort($_array);
print_r($_array);
?>