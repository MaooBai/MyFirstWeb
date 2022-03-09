<?php

@$username = $_COOKIE['username'];

	if ((isset($_FILES['imgfile'])) && is_uploaded_file($_FILES['imgfile']['tmp_name']))
	{
		$imgFile = $_FILES['imgfile'];
		$upErr = $imgFile['error'];
	}
	if ($upErr == 0) {
		$imgType = $imgFile['type'];


		if($imgType  == "image/jpeg")
		{
		
			$new_file = $username.'_头像.jpg';
			$filename = 'images/user/'.$new_file;
			$imgsize = $imgFile['size'];
			$imgTmpFile = $imgFile['tmp_name'];


			move_uploaded_file($imgTmpFile,$filename);

			$strPrompt = sprintf("上传文件成功");		
			echo $strPrompt;	
		}
		else
		{
			echo "上传文件失败";
		}
	}
?>