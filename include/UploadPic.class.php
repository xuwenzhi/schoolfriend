<?php
	//1 : �ж�ͼƬ�����ͺʹ�С�Ƿ��׼
	//2 : ΪͼƬ��������
	//3 : �����Ƿ�����Ҫ��ͼƬ�ĳ�����ͳһ��ͼƬ
	//4 : ��ͼƬ���Ƶ�ָ���ļ��У����ж��Ƿ���ڣ�
	//5 : ��ͼƬ����ƣ�����չ�����͵���ݿ�
	class UploadPic{
		var $ImgName;  //ͼƬ���(�����ڱ?��file��name����)
		var $ImgPath;	//ͼƬ��·��
		var $ImgMaxSize;	//ͼƬ���������
		var $ImgType;	//ͼƬ�������չ������
		var $boolWH;   //�Ƿ�����ı��ϴ�ͼƬ�Ŀ�͸�
		var $ImgWidth;	//ͼƬ�Ŀ��
		var $ImgHeight;	//ͼƬ�ĸ߶�
		var $ImgMinTitle;  //ͼƬ��С����
		var $ImgContent; //ͼƬ������
		var $dbFileName;   //Ҫ��ݿ����
		//
		//
		//
		//���廹��Ҫʲô���� �������



		//�ж�ͼƬ�ĸ�ʽ�ʹ�С�Ƿ������׼
		public function checkImg(){
			//����С
			if($this->ImgName['size'] > $this->ImgMaxSize){
				echo'<script> alert("图片过大，请从新选择!"); location.replace ("index.php") </script>'; 
				exit();
			}
			//�������
			
		}
		//�����ϴ�
		public function finishUpload(){
			$this->ImgName['name'] = $this->createRandName().".jpg";//ͼƬ������ƣ�����չ��
			$filename = $this->ImgPath."/".$this->ImgName['name'];//����ͼƬ��ŵ��ļ�·��
			$this->dbFileName = $filename; //��Ҫ��ŵ���ݿ��е�ͼƬ���
			if(!move_uploaded_file($this->ImgName['tmp_name'],  $filename)){
				  echo'<script> alert("图片上传失败!"); location.replace ("index.php") </script>'; exit();
			}
			//设定上传图片的尺寸
			if($this->boolWH == '1'){
				$this->resize_image($filename, $filename, $this->ImgWidth, $this->ImgHeight);
			}
		}
		//ΪͼƬ���������
		public function createRandName(){
			$randStr = '';
			$pattern='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
			for($i=0 ; $i<20; $i++){
				$randStr .= $pattern[rand(0, 51)];
			}
			return $randStr;
		}
		/******************************************************************/
		/**
		 * �ı�ͼƬ�Ŀ��
		 * @param string $img_src ԭͼƬ�Ĵ�ŵ�ַ��url
		 * @param string $new_img_path ��ͼƬ�Ĵ�ŵ�ַ
		 * @param int $new_width ��ͼƬ�Ŀ��
		 * @param int $new_height ��ͼƬ�ĸ߶�
		 * @return bool �ɹ�true, ʧ��false
		 */
		public function resize_image($img_src, $new_img_path, $new_width, $new_height)
		{
			$img_info = @getimagesize($img_src);
			if (!$img_info || $new_width < 1 || $new_height < 1 || empty($new_img_path)) {
				return false;
			}
			if (strpos($img_info['mime'], 'jpeg') !== false) {
				$pic_obj = imagecreatefromjpeg($img_src);
			} else if (strpos($img_info['mime'], 'gif') !== false) {
				$pic_obj = imagecreatefromgif($img_src);
			} else if (strpos($img_info['mime'], 'png') !== false) {
				$pic_obj = imagecreatefrompng($img_src);
			} else {
				return false;
			}

			$pic_width = imagesx($pic_obj);
			$pic_height = imagesy($pic_obj);

			if (function_exists("imagecopyresampled")) {
				$new_img = imagecreatetruecolor($new_width,$new_height);
				imagecopyresampled($new_img, $pic_obj, 0, 0, 0, 0, $new_width, $new_height, $pic_width, $pic_height);
			} else {
				$new_img = imagecreate($new_width, $new_height);
				imagecopyresized($new_img, $pic_obj, 0, 0, 0, 0, $new_width, $new_height, $pic_width, $pic_height);
			}
			if (preg_match('~.([^.]+)$~', $new_img_path, $match)) {
				$new_type = strtolower($match[1]);
				switch ($new_type) {
					case 'jpg':
						imagejpeg($new_img, $new_img_path);
						break;
					case 'gif':
						imagegif($new_img, $new_img_path);
						break;
					case 'png':
						imagepng($new_img, $new_img_path);
						break;
					default:
						imagejpeg($new_img, $new_img_path);
				}
			} else {
				imagejpeg($new_img, $new_img_path);
			}
			imagedestroy($pic_obj);
			imagedestroy($new_img);
			return true;
		}
	}
?>