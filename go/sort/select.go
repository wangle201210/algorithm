package sort

func Select (arr []int) []int {
	len := len(arr)
	for i := 0; i < len - 1; i++ {
		min := i
		for j := i + 1; j < len; j++ {
			if arr[min] > arr[j]{
				min = j
			}
		}
		if min != i {
			temp := arr[i]
			arr[i] = arr[min]
			arr[min] = temp
		}
	}
	return arr
}

func SelectTest(arr []int) bool {
	res := Select(arr)
	for i := 1; i < len(res); i++ {
		if res[i] < res[i - 1] {
			return false
		}
	}
	return true
}
