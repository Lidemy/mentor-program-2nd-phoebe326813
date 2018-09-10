function printFactor(n) {
	for (i=1; i<=n; i++){
		if (n%i===0){
			console.log(i)
		}
	}
}

printFactor(10)
// 正確輸出：
// 1
// 2
// 5
// 10
printFactor(7)
// 正確輸出：
// 1
// 7