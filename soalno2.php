<?php

$from="2011-06-1";
$to ="2011-06-07";
while (strtotime($from)<strtotime($to)){
$from = mktime(0,0,0,date("m",strtotime($from)),date("d",strtotime($from))+1,date("Y",strtotime($from)));
$from=date("Y-m-d", $from);
echo $from."<br/>";
}

?>