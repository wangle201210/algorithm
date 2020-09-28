<?php 

test(1000);
// 与前面的比较找到合适位置插入
function insert_sort(array $arr): array
{
	$len = count($arr);
	for ($i = 1; $i < $len; $i++) { 
		for ($j = 0; $j < $i; $j++) { 
			if ($arr[$i] < $arr[$j]) {
				$temp = $arr[$i];
				$arr[$i] = $arr[$j];
				$arr[$j] = $temp;
			}
		}
	}
	return $arr;
}

function insert_sort2(array $arr): array
{
	$len = count($arr);
	for ($i = 1; $i < $len; $i++) { 
		for ($j = 0; $j < $i; $j++) { 
			if ($arr[$i] < $arr[$j]) {
				$temp = $arr[$i];
				$arr[$i] = $arr[$j];
				for ($k = $i; $k > $j; $k--) { 
					$arr[$k] = $arr[$k-1];
				}
				continue 2;
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
	$st = microtime(true) * 1000;
	$arr = insert_sort($arr);
	// for ($i = 1; $i < $count; $i++) { 
	// 	if ($arr[$i] < $arr[$i - 1]) {
	// 		print_r($arr);
	// 		exit("验证未通过！");
	// 	}
	// }
	// exit("验证通过！");
	$et = microtime(true) * 1000;
	$arr = insert_sort2($arr);
	$et2 = microtime(true) * 1000;
	echo "第一种：";
	print_r($et - $st);
	echo "\n";
	echo "第二种：";
	print_r($et2 - $et);
}


