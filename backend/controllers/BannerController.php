<?php

namespace backend\controllers;

use Yii;
use backend\models\Bbanner;
use backend\models\search\BbannerSearch;
use backend\models\BbannerImage;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Exception;
/**
 * BannerController implements the CRUD actions for Bbanner model.
 */
class BannerController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Bbanner models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BbannerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bbanner model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bbanner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bbanner();

        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->attributes =Yii::$app->request->post('Bbanner');
                if(!$model->save()){
                    throw new Exception ( '信息错误:'.json_encode($model->errors));
                }

                $banner_images = Yii::$app->request->post('banner_image');
                foreach ($banner_images as $banner){
                    $bimages = new BbannerImage();
                    $bimages->attributes = $banner;
                    $bimages->sort_order = !empty($banner['sort_order'])?$banner['sort_order']:0;
                    $bimages->banner_id = $model->banner_id;
                    $bimages->language_id =1;
                    if(!$bimages->save()){
                        throw new Exception ( '图像信息错误:'.json_encode($bimages->errors));
                    }
                }
                $transaction->commit();//提交
                return $this->redirect(['index']);
            }catch (Exception $e) {
                $transaction->rollBack();//回滚
                Yii::$app->session->setFlash('save-error',$e->getMessage());
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bbanner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $banner_images = BbannerImage::findAll(['banner_id'=>$id]);

        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->attributes =Yii::$app->request->post('Bbanner');
                if(!$model->save()){
                    throw new Exception ( '信息错误:'.json_encode($model->errors));
                }

                $banner_images = Yii::$app->request->post('banner_image');
                BbannerImage::deleteAll(['banner_id'=>$id]);
                foreach ($banner_images as $banner){
                    $bimages = new BbannerImage();
                    $bimages->attributes = $banner;
                    $bimages->banner_id = $model->banner_id;
                    $bimages->sort_order = !empty($banner['sort_order'])?$banner['sort_order']:0;
                    $bimages->language_id =1;
                    if(!$bimages->save()){
                        throw new Exception ( '图像信息错误:'.json_encode($bimages->errors));
                    }
                }
                $transaction->commit();//提交
                return $this->redirect(['index']);
            }catch (Exception $e) {
                $transaction->rollBack();//回滚
                Yii::$app->session->setFlash('save-error',$e->getMessage());
            }
        }

        return $this->render('update', [
            'model' => $model,
            'banner_images'=>$banner_images,
        ]);
    }

    /**
     * Deletes an existing Bbanner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Bbanner::findOne($id)->delete();
        BbannerImage::deleteAll(['banner_id'=>$id]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Bbanner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bbanner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bbanner::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
