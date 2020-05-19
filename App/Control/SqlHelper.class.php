<?php
  
    
  class SqlHelper{
   	var $conn;
   	var $dbname="schoolfriend";  //数据库名称

   	var $username="root";	//数据库用户名
   	var $userpass="";		//密码
   	var $host="localhost";
	//构造函数
    public function __construct(){
      $this->conn = mysqli_connect($this->host,$this->username,$this->userpass, $this->dbname);
      mysqli_select_db($this->conn, $dbname);
    }
    
    //执行一条SQL语句
    public function execute_dql($sql){
        $res = mysqli_query($this->conn, $sql);
        return $res;
        //获取数据库信息的时候用
    }
    
    //执行多条sql语句
    
    function excute_dml($sql){
        $b=mysqli_query($this->conn, $sql);
        if (!$b){   //如果没有获取到数据
            return 0; //执行失败
        }else{
            if (mysqli_affected_rows($this->conn)>0){
                //成功
                return 1;   //当数据库中的条数不为零时 也就是有数据
            } else {
                return 2;   //当数据库中的条数为零时  返回2
            }
        }
    }
    
   //执行select语句，返回记录集组成的数组
  function execute_dql2($sql){
      $res = mysqli_query($this->conn, $sql);  
      $arr = array();
      if($res){
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            $arr[]=$row;
        }
        mysqli_free_result($res);
      }
      //释放资源
     return $arr; 
     }

   
   
    //关闭连接
     function close_connect(){
        if (!empty($this->conn)){
            mysqli_close($this->conn);
        }   
    }
    //返回sql语句影响的条数
    function excute_Record_Exist($sql){
        $res = mysqli_query($this->conn, $sql);    
        $nums = mysqli_affected_rows($res);
        return $nums;
    }
    //执行分页部分的函数
    /*
        $sql1 为$pageCount 服务  获取列表中的数据要分几页
        $sql2 为获取当前页面数据服务
    */
    function excute_dql_asspage($sql1, $sql2, &$assPage){
        $res1 = mysqli_query($this->conn, $sql1);
	$assPage->pageCount = mysqli_affected_rows($this->conn);
        $arr = array();
        while($rows = mysqli_fetch_row($res1)){
            $arr[] = $rows;
        }
exit;
//        $assPage->pageCount = $arr[0][0];   //这样才把总页数 传过来？
            if($assPage->pageCount%$assPage->pageSize == 0){
                $assPage->pageCount = $assPage->pageCount/$assPage->pageSize;//将页数记录在 pageCount中
            }else{
                $assPage->pageCount = ceil($assPage->pageCount / $assPage->pageSize );
            }
        //$arrPage ->pageRows = $rows[0];  //将数据库中的记录数记录在pageRows中
            mysqli_free_result($res1);  //释放资源
        $arr1 = array();
        $res2 = mysqli_query($sql2, $this->conn);
        if($res2){
            while($row = mysqli_fetch_array($res2)){
                $arr1[] = $row;
            }
            $assPage->pageArr = $arr1;//将在数据库中的数据存储在 临时数组中 
            mysqli_free_result($res2);
            //断开连接
            $this->close_connect();
            //return $arr1;    //返回的是 数据库的数据
        }
    }
    
    
    //现在想要在新建一个函数 该函数用来统计一个文章的长度 然后再用来分页
    //只需取文章的内容即可 至于其他附件 比如评论暂先不考虑
    function excute_content_asspage($sql_count, &$assPage){
        $res1 = mysqli_query($sql_count, $this->conn) or die(mysqli_error());//获取当前文章内容的长度
        $arr =mysqli_fetch_array($res1);  //这里获取的是文章的题目和内容
        $contentSize = strlen($arr['content']);  //获取该文章的长度
        $assPage->pageCount = ceil($contentSize/$assPage->pageSize);  //还是将所有内容都取出来 之后再通过 pageNow截取
        $content = substr($arr['content'], ($assPage->pageNow-1)*$assPage->pageSize, $assPage->pageNow+$assPage->pageSize);
        $assPage->pageTitle = $arr['title'];
        $assPage->pageContent = $content;
        
        //所以文章目前的内容已经记录在了 分页对象中 
        $this->close_connect($this->conn);
        mysqli_free_result($res1);
    }
}
