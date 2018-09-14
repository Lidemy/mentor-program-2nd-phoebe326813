function alphaSwap(str) {
	var result = ""
	for(var i=0; i<str.length; i++){
		str[i] >= "A" && str[i] <= "Z" ? result += str[i].toLowerCase() : result += str[i].toUpperCase()
	}
	return result
}

module.exports = alphaSwap