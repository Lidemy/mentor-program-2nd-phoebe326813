## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。
	<br> 空行
	<hr> 分隔線
	<strong></strong> 強調，將字體加粗

## 請問什麼是盒模型（box modal）
	在 HTML 裡面的每個元素都可以看成是一個盒子，可以用 CSS 來調整這些盒子的一些屬性。最基本屬性就是寬、高、padding、border 和 margin。

## 請問 display: inline, block 跟 inline-block 的差別是什麼？
	1. display: inline; 僅佔自己的空間
	2. display: block; 佔滿整行
	3. display: inline-block; 在一行裡面，剩下空間可以容納其他元素

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？
	1. position: static; 
		為預設。元素依照順序排下去。
	2. position: relative; 
		元素離本來照順序要排的位置，再偏移一些距離。不影響其他元素位置。（偏移基準點為本來元素照順序排的位置的左上角）
	3. position: absolute; 
		元素固定在最初瀏覽器畫面上的某個點位，但頁面往下滾動就不見了。（基準點：它會往上找最靠近的且有設定 position 且 position 非設定為 static 的元素，以此元素左上角為基準點。都沒有的話就會找到 body 左上角為基準點。）
	4. position: fixed; 
		元素固定在瀏覽器畫面上的某個點位，即使頁面不斷往下滾動，還是固定在一樣點位畫面。