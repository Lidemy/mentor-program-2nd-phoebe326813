function add(a, b) {
	var result = []
	var aReverse = a.split("").reverse()
	var bReverse = b.split("").reverse()

	if (aReverse.length > bReverse.length){
		for (var i=0; i<aReverse.length-bReverse.length; i++){
			bReverse.push("0")
		}
		for (var i=0; i<aReverse.length; i++){
			result.push("0")
		}
	}else if (bReverse.length > aReverse.length){
		for (var i=0; i<bReverse.length-aReverse.length; i++){
			aReverse.push("0")
		}
		for (var i=0; i<bReverse.length; i++){
			result.push("0")
		}
	} else{
		for (var i=0; i<aReverse.length; i++){
			result.push("0")
		}
	}

	for (var i=0; i<aReverse.length; i++){
		if (parseInt(result[i],10)+parseInt(aReverse[i],10)+parseInt(bReverse[i],10) >= 10){
			result[i] = parseInt(result[i],10)+parseInt(aReverse[i],10)+parseInt(bReverse[i],10)-10
			result[i+1]++
		} else{
			result[i] = parseInt(result[i],10)+parseInt(aReverse[i],10)+parseInt(bReverse[i],10)
		}
	}

	return result.reverse().join("")
}

module.exports = add;