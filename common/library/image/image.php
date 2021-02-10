<?php
namespace common\library\image;
use common\library\tools\images;
class image {
	public function resize($filename, $width, $height) {
         $dir_image = \Yii::getAlias('@image').'/';

		if (!is_file($dir_image . $filename) || substr(str_replace('\\', '/', realpath($dir_image . $filename)), 0, strlen($dir_image)) != str_replace('\\', '/', $dir_image)) {
			return;
		}

		$extension = pathinfo($filename, PATHINFO_EXTENSION);

		$image_old = $filename;
		$image_new = 'cache/' . mb_substr($filename, 0, iconv_strpos($filename, '.',0,'UTF-8')) . '-' . $width . 'x' . $height . '.' . $extension;
		if (!is_file($dir_image . $image_new) || (filemtime($dir_image . $image_old) > filemtime($dir_image . $image_new))) {
			list($width_orig, $height_orig, $image_type) = getimagesize($dir_image . $image_old);

			if (!in_array($image_type, array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF))) {
				return $dir_image . $image_old;
			}

			$path = '';

			$directories = explode('/', dirname($image_new));

			foreach ($directories as $directory) {
				$path = $path . '/' . $directory;

				if (!is_dir($dir_image . $path)) {
					@mkdir($dir_image . $path, 0777);
				}
			}

			if ($width_orig != $width || $height_orig != $height) {
				$image = new Images($dir_image . $image_old);
				$image->resize($width, $height);
				$image->save($dir_image . $image_new);
			} else {
				copy($dir_image . $image_old, $dir_image . $image_new);
			}
		}

		return \Yii::$app->params['image_url'] . '/' . $image_new;

	}
}
