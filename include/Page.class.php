<?php
	class Page{
		//页面中的属性
		var $contents;
		var $title = '';
		var $keywords = '关键字';
		var $buttons = array(
				'Home'=>"home.php",
				'Contact'=>"Contact.php",
				'Services'=>"Servies.php"
			);
		public function __set($name, $value){
			$this->$name = $value;
		}
		//展示页面 这样面向对象的结果是可以控制页面的样式都会遵循一样的风格
		public function Display(){
			echo "<html>\n<head>\n";
			$this->DisplayTitle();
			$this->DisplayKeywords();
			$this->DisplayStyles();
			echo "</head>\n<body>\n";
			$this->DisplayHeader();
			$this->DisplayMenu($this->buttons);
			echo $this->contents;
			$this->DisplayFooter();
			echo "</body>\n</html>";
		}
		//标题函数
		public function DisplayTitle(){
			echo "<title>".$this->title."</title>";
		}
		//关键字函数
		public function DisplayKeywords(){
			echo "<meta name=\"Keywords\" content=\"".$this->keywords."\" />";
		}
		//样式表函数
		public function DisplayStyles(){
		?>
			<style type="text/css">
				<!--   样式表    -->
			</style>
<?php
		}
		//标题栏函数
		function DisplayHeader(){
			//添加标题
		}

		//主菜单函数
		function DisplayMenu(){
			//添加主菜单
			//展示链接之类的
		}
		
		function DisplayFooter(){
			//添加页脚
		}
	}
	$page = new Page();
	$page->contents = "面向对象显示页面";
	$page->Display();
?>