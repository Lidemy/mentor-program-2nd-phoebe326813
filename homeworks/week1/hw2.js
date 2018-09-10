function capitalize(str) {
	var result = str[0].toUpperCase()
	for (i=1; i<str.length; i++){
		result += str[i]
	}
	return result
}

console.log(capitalize('nick'))
// 正確回傳值：Nick
console.log(capitalize('Nick'))
// 正確回傳值：Nick
console.log(capitalize(',hello'))
// 正確回傳值：,hellon