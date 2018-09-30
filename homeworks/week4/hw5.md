## 什麼是 DOM？
	DOM 的全名為 Document Object Model ，中文稱之為文件物件模型。是 W3C 組織所推廣的標準。基本上 DOM 屬於 JavaScript 的介面標準，各種瀏覽器如 Firefox 、 Chrome 、 Opera 、 Safari 與 IE 等都依此標準建置實際的物件，使 JavaScript 程式可以直接利用。

## 什麼是 Ajax？
	Ajax 是一種用於創建快速動態網頁的技術。通過在後台與 server 進行少量數據交換，Ajan 可以在不重新加載整個網頁的情況下，對網頁的某部分進行更新。

## HTTP method 有哪幾個？有什麼不一樣？
	GET：看、搜尋東西。例如：看網頁
	POST：要從 client 端送資料到 server。例如：登入帳號
	PATCH：更改資料。例如：更改會員資料
	PUT：資源換新。例如：將整個 user 資料換掉，將想換的放進來
	DELETE：刪除東西
	OPTIONS：看 server 支援哪些 method
	HEAD：request 就沒有 body，用在一些測試上面

## GET 跟 POST 有哪些區別，可以試著舉幾個例子嗎？
	GET：
	GET 就是在網址後面加上參數，?a=1&b=2&c=3 （多個東西它會用 & 隔開）
	會自動做 URL encoded（這很重要）
	因為是網址，所以有長度限制
	因為是網址，所以不會放敏感資訊
	例如：搜尋、API

	POST：
	POST 把參數放在 request body 裡面
	適合拿來放敏感資訊，從網址什麼都看不出來
	例如：登入帳號密碼、網路刷卡

## 什麼是 RESTful API？
	Restful API 為被轉化成 Rest 架構的 Web API。REST 的全名為 Resource Representational State Transfer，可譯為具象狀態傳輸。指網路中 Client 端和 Server 端的一種呼叫服務形式，透過既定的規則，滿足約束條件和原則的應用程式設計，和對資源的操作，包括獲取、創建、修改和刪除資源，比如 HTTP Method: GET、POST、PUT、PATCH和DELETE。

## JSON 是什麼？
	JSON 是個以純文字為基底去儲存和傳送簡單結構資料，你可以透過特定的格式去儲存任何資料(字串,數字,陣列,物件)，也可以透過物件或陣列來傳送較複雜的資料。JSON 資料可以非常簡單的跟其他程式溝通或交換資料，因為 JSON 就只是純文字格式檔案。

## JSONP 是什麼？
	JSONP 全名為 JSON with Padding，用於解决主流瀏覽器的跨域數據訪問的問題。由于同源策略，一般来説位於 server1.example.com 的網頁無法與不是 server1.example.com 的 server 溝通，而 HTML 的 <script> 元素是一个例外。利用 <script> 元素的這个開放策略，網頁可以得到從其他来源動態產生的 JSON 資料，而這種使用模式就是所謂的 JSONP。

## 要如何存取跨網域的 API？
	1. CROS: 如果你想開啟跨來源 HTTP 請求的話，Server 必須在 Response 的 Header 裡面加上 Access-Control-Allow-Origin。
	2. JSONP: 利用不受同源政策限制的，例如說 <script> 這個 Tag 的特性，來達成跨來源請求。
