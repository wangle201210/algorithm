package main

import (
	"fmt"
	"math/rand"
	"runtime"
	"time"
)

func quickSort(arr []int) []int {
	l := len(arr)
	if l < 2 {
		return arr
	}
	mid := arr[0]
	left, right := make([]int,0,l/2), make([]int,0,l/2)//减少扩容次数
	for i := 1; i < l; i++ {
		if arr[i] < mid {
			left = append(left, arr[i])
		} else {
			right = append(right, arr[i])
		}
	}
	left = quickSort(left)
	right = quickSort(right)
	res := append(left, mid)
	return append(res, right...)
}

func quickTest(c int) {
	var m1,m2 runtime.MemStats
	runtime.ReadMemStats(&m1)
	startAt := time.Now()
	arr := make([]int,0,c)
	for i := 0; i < c; i++ {
		arr = append(arr, rand.Intn(c))
	}
	arr = quickSort(arr)
	for i := 0; i < c-1; i++ {
		if arr[i] > arr[i+1] {
			panic("验证未通过")
		}
	}
	runtime.ReadMemStats(&m2)
	timeUsed := time.Since(startAt) / time.Millisecond
	stat := (m2.Alloc - m1.Alloc) / (1 << 20)
	fmt.Printf("验证通过！\n内存使用：%dM,\n耗时：%dms\n", stat, timeUsed)
}

func main() {
	quickTest(1000000)
}
