<?php
/**
 * -------------------------------------------------------------------------------------------------+
 * 文件上传函数库     	                                                                                |
 * -------------------------------------------------------------------------------------------------+
 */

	/**
	 * Image upload
	 * @param String $name
	 * @param Integer $maxsize
	 * @param Array $allowSub
	 * @param Array $allowMime
	 * @param Boolean $isRandName
	 * @return String
	 */
	function upload($name, $maxsize = 2000000, $allowSub = ['jpg','jpeg','gif','png','bmp'], $allowMime = ['image/jpg','image/jpeg','image/jpe','image/gif','image/png','image/x-png','image/bmp'], $isRandName = true)
	{
		$files=$_FILES[$name];
		if (is_array($files['name']))
		{
			//如果是数组执行多文件上传	
			for($i=0; $i<count($files['name']); $i++){
			//文件最大值，允许的文件类型，允许的MIME类型，是否生成随机文件名称
			$fileName=$files['name'][$i];
			$fileType=$files['type'][$i];
			$fileTmpName=$files['tmp_name'][$i];
			$fileError=$files['error'][$i];
			$fileSize=$files['size'][$i];
			if ($fileName!='')
			{
				return fileUp($fileName, $fileType, $fileTmpName, $fileError, $fileSize, $maxsize, $allowSub, $allowMime, $isRandName);
			}
			}
		
		}else{

			//如果不是数组执行单文件上传
			$fileName=$files['name'];
			$fileType=$files['type'];
			$fileTmpName=$files['tmp_name'];
			$fileError=$files['error'];
			$fileSize=$files['size'];
			return fileUp($fileName, $fileType, $fileTmpName, $fileError, $fileSize, $maxsize, $allowSub, $allowMime, $isRandName);
		
		}
	}

	function fileUp($fileName, $fileType, $fileTmpName, $fileError, $fileSize, $MaxSize, $allowSub, $allowMime, $isRandName)
	{

		if (!$fileError)
		{
			//上传文件不能超过手动设置的大小
			if ($fileSize>$MaxSize)
			{
				return $fileName.'The size of the file exceeds '.$Maxsize.'Bytes';
			}

			//判断文件的后缀名是否合法
			$arr = explode('.',$fileName);
			$subFix = array_pop($arr);
			if(!in_array($subFix,$allowSub))
			{
				return $fileName.'illegal name extension！';
			}

			//判断文件的MIME类型是否合法
			if (!in_array($fileType, $allowMime))
			{
				return $fileName.'the MIME type of the file is illegal！';
			}

			//手动指定文件保存路径
			$path='upload/'.date('Y').'/'.date('m').'/'.date('d');
			
			//判断文件路径是否存在，不存在则创建
			if (!file_exists($path))
			{
				mkdir($path, 0777, true);
			}

			//判断是否生成随机文件名
			if($isRandName){
				$NewPath=$path.'/'.uniqid('yh_').'.'.$subFix;
			}else{
				$NewPath=$path.'/'.$fileName;
			}

			//判断是否为上传文件
			if (is_uploaded_file($fileTmpName))
			{
				if (move_uploaded_file($fileTmpName, $NewPath))
				{
					if (!in_array('txt', $allowSub) && !in_array('doc', $allowSub) && !in_array('xls', $allowSub) )
					{
						return $NewPath;
					}else{
						return $NewPath;
					}
				}
			}else{
				return 'not the file uploaded！';
			}

		}else{

			switch ($fileError)
			{
				case 1:
					return 'size of the file exceeds the default limitation！<br />';
					break;
				case 2:
					return 'MAX_FILE_SIZE';
					break;
				case 3:
					return 'only a part of the file is uploaded！<br />';
					break;
				case 4:
					return 'the file has not been uploaded！<br />';
					break;
				case 6:
					return 'cannot find the temp folder！<br />';
					break;
				case 7:
					return 'file writing failed！<br />';
					break;
			}

		}
	}

/**
 * easy image resize function
 * @param  $file - file name to resize
 * @param  $string - The image data, as a string
 * @param  $width - new image width
 * @param  $height - new image height
 * @param  $proportional - keep image proportional, default is no
 * @param  $output - name of the new file (include path if needed)
 * @param  $delete_original - if true the original image will be deleted
 * @param  $use_linux_commands - if set to true will use "rm" to delete the image, if false will use PHP unlink
 * @param  $quality - enter 1-100 (100 is best quality) default is 100
 * @param  $grayscale - if true, image will be grayscale (default is false)
 * @return boolean|resource
 */
function smart_resize_image($file,
                            $string             = null,
                            $width              = 0,
                            $height             = 0,
                            $proportional       = false,
                            $output             = 'file',
                            $delete_original    = true,
                            $use_linux_commands = false,
                            $quality            = 100,
                            $grayscale          = false
) {

    if ( $height <= 0 && $width <= 0 ) return false;
    if ( $file === null && $string === null ) return false;
    # Setting defaults and meta
    $info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;
    $cropHeight = $cropWidth = 0;
    # Calculating proportionality
    if ($proportional) {
        if      ($width  == 0)  $factor = $height/$height_old;
        elseif  ($height == 0)  $factor = $width/$width_old;
        else                    $factor = min( $width / $width_old, $height / $height_old );
        $final_width  = round( $width_old * $factor );
        $final_height = round( $height_old * $factor );
    }
    else {
        $final_width = ( $width <= 0 ) ? $width_old : $width;
        $final_height = ( $height <= 0 ) ? $height_old : $height;
        $widthX = $width_old / $width;
        $heightX = $height_old / $height;

        $x = min($widthX, $heightX);
        $cropWidth = ($width_old - $width * $x) / 2;
        $cropHeight = ($height_old - $height * $x) / 2;
    }
    # Loading image to memory according to type
    switch ( $info[2] ) {
        case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
        case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
        case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
        default: return false;
    }

    # Making the image grayscale, if needed
    if ($grayscale) {
        imagefilter($image, IMG_FILTER_GRAYSCALE);
    }

    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
        $transparency = imagecolortransparent($image);
        $palletsize = imagecolorstotal($image);
        if ($transparency >= 0 && $transparency < $palletsize) {
            $transparent_color  = imagecolorsforindex($image, $transparency);
            $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
            imagefill($image_resized, 0, 0, $transparency);
            imagecolortransparent($image_resized, $transparency);
        }
        elseif ($info[2] == IMAGETYPE_PNG) {
            imagealphablending($image_resized, false);
            $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
            imagefill($image_resized, 0, 0, $color);
            imagesavealpha($image_resized, true);
        }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);


    # Taking care of original, if needed
    if ( $delete_original ) {
        if ( $use_linux_commands ) exec('rm '.$file);
        else @unlink($file);
    }
    # Preparing a method of providing result
    switch ( strtolower($output) ) {
        case 'browser':
            $mime = image_type_to_mime_type($info[2]);
            header("Content-type: $mime");
            $output = NULL;
            break;
        case 'file':
            $output = $file;
            break;
        case 'return':
            return $image_resized;
            break;
        default:
            break;
    }

    # Writing image according to type to the output destination and image quality
    switch ( $info[2] ) {
        case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
        case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
        case IMAGETYPE_PNG:
            $quality = 9 - (int)((0.9*$quality)/10.0);
            imagepng($image_resized, $output, $quality);
            break;
        default: return false;
    }
    return true;
}
