<?php
namespace backend\controllers\common;
use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use common\library\image\image;
use common\library\tools\pagination;
use yii\web\Response;
class FileManagerController extends Controller {
    public $layout=false;
	public function actionIndex() {

		// Find which protocol to use to pass the full image link back
        $filter_name =Yii::$app->request->get('filter_name');
		if (isset($filter_name)) {
            $data['filter_name']=$filter_name;
			$filter_name = rtrim(str_replace(array('*', '/', '\\'), '', $filter_name), '/');
		} else {
			$filter_name = '';
            $data['filter_name']='';
		}

		// Make sure we have the correct directory
		if (Yii::$app->request->get('directory')) {
            $data['directory'] =urlencode(Yii::$app->request->get('directory'));
			$directory = rtrim(Yii::getAlias('@image') . '/images/catalog/' . str_replace('*', '', Yii::$app->request->get('directory')), '/');
		} else {
            $data['directory'] ='';
			$directory = Yii::getAlias('@image') . '/images/catalog';
		}

		if (Yii::$app->request->get('page')) {
			$page = Yii::$app->request->get('page');
		} else {
			$page = 1;
		}

		$directories = array();
		$files = array();

		$data['images'] = array();

		if (substr(str_replace('\\', '/', realpath($directory) . '/' . $filter_name), 0, strlen(Yii::getAlias('@image') . '/images/catalog')) == str_replace('\\', '/', Yii::getAlias('@image') . '/images/catalog')) {
			// Get directories
			$directories = glob($directory . '/' . $filter_name . '*', GLOB_ONLYDIR);

			if (!$directories) {
				$directories = array();
			}

			// Get files
			$files = glob($directory . '/' . $filter_name . '*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF,pdf}', GLOB_BRACE);
			if (!$files) {
				$files = array();
			}
		}

		// Merge directories and files
		$images = array_merge($directories, $files);

		// Get total number of files and directories
		$image_total = count($images);

		// Split the array based on current page number and max number of items per page of 10
		$images = array_splice($images, ($page - 1) * 16, 16);

		foreach ($images as $image) {
		    $iimmages = explode("/",str_replace('//','/',$image));
            $path_name = array_pop($iimmages);

			//$name = str_split(basename($image), 14);
            $name = str_split($path_name, 14);
            $url = '';
            $target = Yii::$app->request->get('target');
            if (isset($target)) {
                $data['target'] = $target;
                $url .= '&target=' . $target;
            }else{
                $data['target'] = '';
            }

            $thumb =Yii::$app->request->get('thumb');
            if (isset($thumb)) {
                $data['thumb'] =$thumb;
                $url .= '&thumb=' .$thumb;
            }else{
                $data['thumb'] = '';
            }

			if (is_dir($image)) {
				$data['images'][] = array(
					'thumb' => '',
					'name'  => implode(' ', $name),
					'type'  => 'directory',
					'path'  => iconv_substr($image, mb_strlen(Yii::getAlias('@image'))),
					'href'  =>Url::toRoute(['/common/file-manager/?'. 'directory=' . urlencode(iconv_substr($image, mb_strlen(Yii::getAlias('@image') . 'catalog/'))) . $url])
				);
			} elseif (is_file($image)) {
                $im = new image();
				$data['images'][] = array(
					'thumb' => $im->resize(iconv_substr($image, mb_strlen(Yii::getAlias('@image'))), 100, 100),
					'name'  => implode(' ', $name),
					'type'  => 'image',
					'path'  => iconv_substr($image, mb_strlen(Yii::getAlias('@image'))),
					'href'  => Yii::$app->params['image_url'].'/images' . iconv_substr($image, mb_strlen(Yii::getAlias('@image')))
				);
			}
		}

		// Parent
		$url = '';
		if ( Yii::$app->request->get('directory')) {
			$pos = strrpos( Yii::$app->request->get('directory'), '/');
			if ($pos) {
				$url .= '&directory=' . urlencode(substr(Yii::$app->request->get('directory'), 0, $pos));
			}
		}

		if (Yii::$app->request->get('target')) {
			$url .= '&target=' .  Yii::$app->request->get('target');
		}

		if (Yii::$app->request->get('thumb')) {
			$url .= '&thumb=' . Yii::$app->request->get('thumb');
		}

		$data['parent'] = Url::to(['/common/file-manager/?'.$url]);

		// Refresh
		$url = '';

		if (Yii::$app->request->get('directory')) {
			$url .= '&directory=' . urlencode(Yii::$app->request->get('directory'));
		}

		if (Yii::$app->request->get('target')) {
			$url .= '&target=' . Yii::$app->request->get('target');
		}

		if (Yii::$app->request->get('thumb')) {
			$url .= '&thumb=' . Yii::$app->request->get('thumb');
		}

		$data['refresh'] = Url::to('/common/file-manager/?'.$url);

		$url = '';

		if (isset($this->request->get['directory'])) {
			$url .= '&directory=' . urlencode(html_entity_decode(Yii::$app->request->get('directory'), ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode(Yii::$app->request->get('filter_name'), ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['target'])) {
			$url .= '&target=' . $this->request->get['target'];
		}

		if (isset($this->request->get['thumb'])) {
			$url .= '&thumb=' . $this->request->get['thumb'];
		}

        $pagination = new pagination();
        $pagination->total = $image_total;
        $pagination->page = $page;
        $pagination->limit = 16;
        $pagination->url = Url::to('/common/file-manager/?'.$url . '&page={page}');

        $data['pagination'] = $pagination->render();

		$directory =Yii::$app->request->get('directory')??'';
        return $this->render('filemanager.twig',[
            'pagination'=>$data['pagination'] ,
            'images'=>$data['images'],
            'parent'=>$data['parent'],
            'refresh'=>$data['refresh'],
			'directory'=>$directory,
        ]);
	}

	public function actionUpload() {
        Yii::$app->response->format=Response::FORMAT_JSON;
		$json = array();

		// Make sure we have the correct directory
		if (Yii::$app->request->get('directory')) {
			$directory = rtrim(Yii::getAlias('@image') . '/images/catalog/' . Yii::$app->request->get('directory'), '/');
		} else {
			$directory = Yii::getAlias('@image') . '/images/catalog';
		}


		// Check its a directory
		if (!is_dir($directory) || substr(str_replace('\\', '/', realpath($directory)), 0, strlen(Yii::getAlias('@image') . '/images/catalog')) != str_replace('\\', '/', Yii::getAlias('@image') . '/images/catalog')) {
			$json['error'] = '目录错误';
		}

		if (!$json) {
			// Check if multiple files are uploaded or just one
			$files = array();

			if (!empty($_FILES['file']['name']) && is_array($_FILES['file']['name'])) {
				foreach (array_keys($_FILES['file']['name']) as $key) {
					$files[] = array(
						'name'     => $_FILES['file']['name'][$key],
						'type'     => $_FILES['file']['type'][$key],
						'tmp_name' => $_FILES['file']['tmp_name'][$key],
						'error'    => $_FILES['file']['error'][$key],
						'size'     => $_FILES['file']['size'][$key]
					);
				}
			}

			foreach ($files as $file) {
				if (is_file($file['tmp_name'])) {
					// Sanitize the filename
					$filename = basename(html_entity_decode($file['name'], ENT_QUOTES, 'UTF-8'));

					// Validate the filename length
					if ((mb_strlen($filename) < 3) || (mb_strlen($filename) > 255)) {
						$json['error'] = '文件名错误';
					}

					// Allowed file extension types
					$allowed = array(
						'jpg',
						'jpeg',
						'gif',
						'png',
                        'pdf'
					);

					if (!in_array(mb_strtolower(iconv_substr(strrchr($filename, '.'), 1)), $allowed)) {
						$json['error'] ='文件类型错误.';
					}

					// Allowed file mime types
					$allowed = array(
						'image/jpeg',
						'image/pjpeg',
						'image/png',
						'image/x-png',
						'image/gif',
                        'application/pdf'
					);

					if (!in_array($file['type'], $allowed)) {
						$json['error'] = $this->language->get('error_filetype');
					}

					// Return any upload error
					if ($file['error'] != UPLOAD_ERR_OK) {
						$json['error'] = $this->language->get('error_upload_' . $file['error']);
					}
				} else {
					$json['error'] = $this->language->get('error_upload');
				}

				if (!$json) {
					move_uploaded_file($file['tmp_name'], $directory . '/' . $filename);
				}
			}
		}

		if (!$json) {
			$json['success'] ='文件上传成功';
		}
        return $json;

	}

	public function actionFolder() {
        Yii::$app->response->format=Response::FORMAT_JSON;

		$json = array();

        if (Yii::$app->request->get('directory')) {
            $directory = rtrim(Yii::getAlias('@image') . '/images/catalog/' . Yii::$app->request->get('directory'), '/');
        } else {
            $directory = Yii::getAlias('@image') . '/images/catalog';
        }

        // Check its a directory
        if (!is_dir($directory) || substr(str_replace('\\', '/', realpath($directory)), 0, strlen(Yii::getAlias('@image') . '/images/catalog')) != str_replace('\\', '/', Yii::getAlias('@image') . '/images/catalog')) {
            $json['error'] = '目录错误1';
        }

		if (Yii::$app->request->isPost) {
			// Sanitize the folder name
			$folder = basename(html_entity_decode(Yii::$app->request->post('folder'), ENT_QUOTES, 'UTF-8'));

			// Validate the filename length
			if ((mb_strlen($folder) < 3) || (mb_strlen($folder) > 128)) {
				$json['error'] = '目录名称错误';
			}

			// Check if directory already exists or not
			if (is_dir($directory . '/' . $folder)) {
				$json['error'] = '目录已经存在';
			}
		}

		if (!isset($json['error'])) {
			mkdir($directory . '/' . $folder, 0777);
			chmod($directory . '/' . $folder, 0777);
			@touch($directory . '/' . $folder . '/' . 'index.html');

			$json['success'] = '目录创建成功';
		}
		return $json;
	}

	public function actionDelete() {
        Yii::$app->response->format=Response::FORMAT_JSON;

		$json = array();

		// Check user has permission

		if (Yii::$app->request->post('path')) {
			$paths = Yii::$app->request->post('path');
		} else {
			$paths = array();
		}

		// Loop through each path to run validations
		foreach ($paths as $path) {
			// Check path exsists
			if ($path == Yii::getAlias('@image') . '/catalog' || substr(str_replace('\\', '/', realpath(Yii::getAlias('@image') . $path)), 0, strlen(Yii::getAlias('@image') . '/catalog')) != str_replace('\\', '/', Yii::getAlias('@image') . '/catalog')) {
				$json['error'] = '删除失败1';
				break;
			}
		}

		if (!$json) {
			// Loop through each path
			foreach ($paths as $path) {
				$path = rtrim(Yii::getAlias('@image'). $path, '/');

				// If path is just a file delete it
				if (is_file($path)) {
					unlink($path);

				// If path is a directory beging deleting each file and sub folder
				} elseif (is_dir($path)) {
					$files = array();

					// Make path into an array
					$path = array($path);

					// While the path array is still populated keep looping through
					while (count($path) != 0) {
						$next = array_shift($path);

						foreach (glob($next) as $file) {
							// If directory add to path array
							if (is_dir($file)) {
								$path[] = $file . '/*';
							}

							// Add the file to the files to be deleted array
							$files[] = $file;
						}
					}

					// Reverse sort the file array
					rsort($files);

					foreach ($files as $file) {
						// If file just delete
						if (is_file($file)) {
							unlink($file);

						// If directory use the remove directory function
						} elseif (is_dir($file)) {
							rmdir($file);
						}
					}
				}
			}

			$json['success'] = '删除成功';
		}

		 return $json;
	}
}