<?php

namespace backend\controllers;


use backend\models\BproductFilter;
use Yii;
use common\models\FilterGroup;
use common\models\FilterGroupDescription;
use common\models\Filter;
use common\models\FilterDescription;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Exception;
/**
 * FilterGroupController implements the CRUD actions for FilterGroup model.
 */
class FilterGroupController extends Controller
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
     * Lists all FilterGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => FilterGroup::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FilterGroup model.
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
     * Creates a new FilterGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FilterGroup();
        $group_description = new FilterGroupDescription();

        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->attributes =Yii::$app->request->post('FilterGroup');
                if(!$model->save()){
                    throw new Exception ( 'filter Group信息错误:'.json_encode($model->errors));
                }
                $group_description->attributes = Yii::$app->request->post('FilterGroupDescription');
                $group_description->filter_group_id = $model->filter_group_id;
                $group_description->language_id =1;
                if(!$group_description->save()){
                    throw new Exception ( 'filter Group信息错误1:'.json_encode($group_description->errors));
                }

                $filters_data = Yii::$app->request->post('filter');
                foreach ($filters_data as $filter_data){
                    $filter = new Filter();
                    $filter->filter_group_id =  $model->filter_group_id;
                    $filter->sort_order = !empty($filter_data['sort_order'])?$filter_data['sort_order']:0;
                    if(!$filter->save()){
                        throw new Exception ( 'filter信息错误:'.json_encode($filter->errors));
                    }
                    $filter_descrip = new FilterDescription();
                    $filter_descrip->filter_id = $filter->filter_id;
                    $filter_descrip->name = $filter_data['name'];
                    $filter_descrip->filter_group_id = $model->filter_group_id;
                    $filter_descrip->language_id =1 ;
                    if(!$filter_descrip->save()){
                        throw new Exception ( 'filter信息错误1:'.json_encode($filter_descrip->errors));
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
            'group_description'=>$group_description,
        ]);
    }

    /**
     * Updates an existing FilterGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $group_description =FilterGroupDescription::findOne($id);
        $filters = Filter::findAll(['filter_group_id'=>$id]);
        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->attributes =Yii::$app->request->post('FilterGroup');
                if(!$model->save()){
                    throw new Exception ( 'filter Group信息错误:'.json_encode($model->errors));
                }
                $group_description->attributes = Yii::$app->request->post('FilterGroupDescription');
                $group_description->filter_group_id = $model->filter_group_id;
                $group_description->language_id =1;
                if(!$group_description->save()){
                    throw new Exception ( 'filter Group信息错误1:'.json_encode($group_description->errors));
                }

                $filters_data = Yii::$app->request->post('filter');
                Filter::deleteAll(['filter_group_id'=>$id]);
                FilterDescription::deleteAll(['filter_group_id'=>$id]);
                foreach ($filters_data as $filter_data){
                    $filter = new Filter();
                    $filter->filter_group_id =  $model->filter_group_id;
                    $filter->sort_order = !empty($filter_data['sort_order'])?$filter_data['sort_order']:0;
                    if(!$filter->save()){
                        throw new Exception ( 'filter信息错误:'.json_encode($filter->errors));
                    }
                    $filter_descrip = new FilterDescription();
                    $filter_descrip->filter_id = $filter->filter_id;
                    $filter_descrip->name = $filter_data['name'];
                    $filter_descrip->filter_group_id = $model->filter_group_id;
                    $filter_descrip->language_id =1 ;
                    if(!$filter_descrip->save()){
                        throw new Exception ( 'filter信息错误1:'.json_encode($filter_descrip->errors));
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
            'group_description'=>$group_description,
            'filters'=>$filters,
        ]);
    }

    /**
     * Deletes an existing FilterGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();
        FilterGroupDescription::deleteAll(['filter_group_id'=>$id]);
        $filters = Filter::findAll(['filter_group_id'=>$id]);
        foreach ($filters as $value){
            BproductFilter::findAll(['filter_id'=>$value->filter_id]);
        }
        Filter::deleteAll(['filter_group_id'=>$id]);
        FilterDescription::deleteAll(['filter_group_id'=>$id]);


        return $this->redirect(['index']);
    }

    /**
     * Finds the FilterGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FilterGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FilterGroup::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
