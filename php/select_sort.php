<?php

test();
// 每次找到最小的放在开头
function select_sort(array $arr): array
{
	$len = count($arr);
	for ($i = 0; $i < $len - 1; $i++) {
		$min = $i;
		for ($j = $i + 1; $j < $len; $j++) { 
			if ($arr[$min] > $arr[$j]) {
				$min = $j;
			}
		}
		if ($min != $i) {
			$temp = $arr[$min];
			$arr[$min] = $arr[$i];
			$arr[$i] = $temp;
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
	$arr = select_sort($arr);
	for ($i = 1; $i < $count; $i++) { 
		if ($arr[$i] < $arr[$i - 1]) {
			print_r($arr);
			exit("验证未通过！");
		}
	}
	exit("验证通过！");
}
