<?php 

test();

function insert_sort(array $arr): array
{
	$len = count($arr);
	for ($i = 1; $i < $len; $i++) { 
		for ($j = 0; $j < $i; $j++) { 
			$temp = $arr[$j];
			if ($arr[$i] < $arr[$j]) {
				$arr[$j] = $arr[$i];
				$arr[$i] = $temp;
			}
		}
	}
	return $arr;
}

function test($count = 100)
{
	$arr = [];
	for ($i = 0; $i < $count; $i++) {
		$arr[$i] = mt_rand(0,100);
	}
	$arr = insert_sort($arr);
	for ($i = 1; $i < $count; $i++) { 
		if ($arr[$i] < $arr[$i - 1]) {
			print_r($arr);
			exit("验证未通过！");
		}
	}
	exit("验证通过！");
}
