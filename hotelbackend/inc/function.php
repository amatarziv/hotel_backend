<?php

function tomorrow(){
return (date("Y-m-d",(strtotime("+1 day")))); /*прибавляет один день к текущей дате*/
}

function dateplus($day=1){
return (date("Y-m-d",(strtotime("+$day day")))); /*прибавляет дни к текущей дате*/
}

function date_interval($str1,$str2){
	return (int)((strtotime((string)$str2)-strtotime((string)$str1))/86400);	
}
