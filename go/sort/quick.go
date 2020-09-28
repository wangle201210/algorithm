package sort

func Quick(arr []int) (res []int) {
	len := len(arr)
	if len <= 1 {
		return arr
	}
	var left,right []int
	for i := 1; i < len; i++ {
		if arr[i] < arr[0] {
			left = append(left,arr[i])
		} else {
			right = append(right,arr[i])
		}
	}
	left = Quick(left)
	right = Quick(right)
	left = append(left,arr[0])
	return append(left, right...)
}

func QuickTest(arr []int) bool {
	res := Quick(arr)
	for i := 1; i < len(res); i++ {
		if res[i] < res[i - 1] {
			return false
		}
	}
	return true
}