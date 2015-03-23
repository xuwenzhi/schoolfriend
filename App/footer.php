<div data-role='footer' data-position='fixed'>
	<div data-role="navbar" data-iconpos='top'>
        <ul>
           <li><a href="index.php" data-ajax='false' data-icon='home'>首页</a></li><!-- class="ui-btn-active" -->
           <?php
            //session_start();
           	if(!isset($_SESSION['USERID'])){ 
           		//如果没有用户登录 下方的导航都是死链接
	            //echo "<li><a href='Login.php' data-icon='star'>班级</a></li>";
	            //echo "<li><a href='#' data-icon='search'>发现</a></li>";
	            //echo "<li><a href='#' data-icon='grid'>我</a></li>";
           	}else{
           		echo "<li><a href='Classes.php' data-ajax='false' data-icon='star'>班级</a></li>";
           		echo "<li><a href='Finder.php' data-ajax='false' data-icon='search'>发现</a></li>";
           		echo "<li><a href='Me.php' data-ajax='false' data-icon='grid'>我</a></li>";
           	}
            ?>
          </ul>
        </div>
	<h2><center>copyright &copy; AZXUWEN 哈尔滨理工大学</center></h2>
</div>
