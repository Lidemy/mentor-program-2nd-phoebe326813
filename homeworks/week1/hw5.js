function join(str, concatStr) {
	var result = ""
	for (i=0; i<str.length-1; i++){
		result += str[i]+concatStr
	}
	result += str[str.length-1]
	return result
}

function repeat(str, times) {
	var result = ""
	for(i=1; i<=times; i++){
		result += str
	}
	return result
}

console.log(join([1, 2, 3], ''))
// 正確回傳值：123
console.log(join(["a", "b", "c"], "!"))
// 正確回傳值：a!b!c
console.log(join(["a", 1, "b", 2, "c", 3], ','))
// 正確回傳值：a,1,b,2,c,3

console.log(repeat('a', 5))
// 正確回傳值：aaaaa
console.log(repeat('yoyo', 2))
// 正確回傳值：yoyoyoyo