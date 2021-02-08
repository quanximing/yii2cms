<?php

namespace backend\controllers;

use backend\models\BattributeGroupDescription;
use Yii;
use backend\models\BattributeGroup;
use backend\models\search\AttributeGroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Exception;
/**
 * AttributeGroupController implements the CRUD actions for BattributeGroup model.
 */
class AttributeGroupController extends Controller
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
     * Lists all BattributeGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AttributeGroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BattributeGroup model.
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
     * Creates a new BattributeGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BattributeGroup();
        $group_description = new BattributeGroupDescription();

        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->attributes =Yii::$app->request->post('BattributeGroup');
                if(!$model->save()){
                    throw new Exception ( '错误1:'.json_encode($model->errors));
                }
                $group_name = Yii::$app->request->post('BattributeGroupDescription');
                $group_description->attributes = $group_name;
                $group_description->attribute_group_id =$model->attribute_group_id;
                $group_description->language_id =1;
                if(!$group_description->save()){
                    throw new Exception ( '错误2:'.json_encode($group_description->errors));
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
            'group_description'=>$group_description,
        ]);
    }

    /**
     * Updates an existing BattributeGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $group_description =BattributeGroupDescription::findOne($id);
        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->attributes =Yii::$app->request->post('BattributeGroup');
                if(!$model->save()){
                    throw new Exception ( '错误1:'.json_encode($model->errors));
                }
                $banner_images = Yii::$app->request->post('BattributeGroupDescription');
                $group_description->attributes = $banner_images['name'];
               // $group_description->attribute_group_id =$model->attribute_group_id;
                $group_description->language_id =1;
                if(!$group_description->save()){
                    throw new Exception ( '错误2:'.json_encode($group_description->errors));
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
            'group_description'=>$group_description,
        ]);
    }

    /**
     * Deletes an existing BattributeGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        BattributeGroupDescription::findOne($id)->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the BattributeGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BattributeGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BattributeGroup::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
