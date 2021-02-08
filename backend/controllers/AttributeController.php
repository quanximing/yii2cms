<?php

namespace backend\controllers;

use backend\models\BattributeDescription;
use backend\models\BattributeGroup;
use backend\models\BattributeGroupDescription;
use backend\models\BproductAttribute;
use Yii;
use backend\models\Battribute;
use backend\models\search\AttributeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Exception;
/**
 * AttributeController implements the CRUD actions for Battribute model.
 */
class AttributeController extends Controller
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
     * Lists all Battribute models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AttributeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Battribute model.
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
     * Creates a new Battribute model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Battribute();
        $description = new BattributeDescription();
        $group = BattributeGroup::find()->all();

        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->attributes =Yii::$app->request->post('Battribute');
                if(!$model->save()){
                    throw new Exception ( '错误1:'.json_encode($model->errors));
                }
                $des = Yii::$app->request->post('BattributeDescription');
                $description->attributes = $des;
                $description->attribute_id =$model->attribute_id;
                $description->language_id =1;
                if(!$description->save()){
                    throw new Exception ( '错误2:'.json_encode($description->errors));
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
            'description'=>$description,
            'group'=>$group,
        ]);
    }

    /**
     * Updates an existing Battribute model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $description =BattributeDescription::findOne($id);
        $group = BattributeGroup::find()->all();

        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->attributes =Yii::$app->request->post('Battribute');
                if(!$model->save()){
                    throw new Exception ( '错误1:'.json_encode($model->errors));
                }
                $des = Yii::$app->request->post('BattributeDescription');
                $description->attributes = $des;
                $description->attribute_id =$model->attribute_id;
                $description->language_id =1;
                if(!$description->save()){
                    throw new Exception ( '错误2:'.json_encode($description->errors));
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
            'description'=>$description,
            'group'=>$group,
        ]);
    }

    /**
     * Deletes an existing Battribute model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        BattributeDescription::findOne($id)->delete();
        BproductAttribute::deleteAll(['attribute_id'=>$id]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Battribute model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Battribute the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Battribute::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
