###页面实现PHP测试form_login效果  
转自<http://www.blueshop.com.tw/board/show.asp?subcde=BRD20120528113920DQ2&fumcde=FUM20041006152627A9N&odr=cdt&odrtyp=0>

主要再說明一下：

	unit.php：單元測試的主程式，需要被載入後實體化。
	unit_display.php:單元測試顯示結果的畫面。
	run_unit.php：對單元測試功能的自我測試。
	form_login.php：登入畫面
	member_login.php：登入功能物件
	login.php：登入用的主程式
	test_member_login.php：測試member_login.php是否正常的測試程式。

	如果經過test_member_login驗證通過的話，member_login即表示功能為正常。
	當結果符合預期是會顯示綠色的passed。
	不符合就會顯示紅色的falsed。
	我希望從來不寫函式不寫物件的人開始學習將你的功能函式或物件化。
	然後透過這樣的測試來驗證你的程式碼是不是符合需求。
	當然，我這套unit_test也是仿ci的模式寫的。
	基本上大部份的framework都有提供unit_test的工具。
	使用方法跟我這個做法幾乎都是差不多的。
	我等於是將功能拆出來讓各位能夠好好練習並理解單元測試帶來處理bug的好處。