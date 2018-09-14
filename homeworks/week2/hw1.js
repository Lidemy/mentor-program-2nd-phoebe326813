function stars(n) {
	var result = ["*"]
	for (var i=2; i<=n; i++){
		result.push("*".repeat(i))
	}
	return result
}

module.exports = stars;