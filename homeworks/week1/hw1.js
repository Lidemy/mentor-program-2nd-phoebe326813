function printStars(n) {
 if (n >= 1 && n <= 30) {
	for (i = 1; i <=n; i++) {
 		console.log("*")
 	}
 } 
}

printStars(1)
// 正確輸出：
// *
printStars(3)
// 正確輸出：
// *
// *
// *
printStars(6)
// 正確輸出：
// *
// *
// *
// *
// *
// *