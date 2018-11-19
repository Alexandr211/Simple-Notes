<?php

namespace app\controllers;

use Yii;
use app\models\Calendr;
use app\models\CalendrSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Access1;
//use yii\caching\Dbdependency;


/**
 * CalendrController implements the CRUD actions for Calendr model.
 */
class CalendrController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
            'class' => AccessControl::className(),
            'only' => ['update', 'delete', 'create', 'index'],
            'rules' => [
                [
                    'actions' => ['update', 'delete', 'create', 'index'],
                    'allow' => true,
                    'roles' => ['@'],
                ],                
              ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Calendr models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CalendrSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
       
    }

    /**
     * Displays a single Calendr model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if (\Yii::$app->user->can('View', ['calendr' => $model])) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        }
        else {
            return $this->render('no_access');
        }
    }

    /**
     * Creates a new Calendr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Calendr();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Calendr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);
        $access = Access1::checkAccess($model, Yii::$app->user->id);
        if($access < Access1::ACCESS_CREATOR) {
           return $this->render('no_access');
            //return $this->render('/Basic/web/index.php?r=site%2Fno_access');
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Calendr model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $access = Access1::checkAccess($model, Yii::$app->user->id);
        if($access < Access1::ACCESS_CREATOR) {
           return $this->render('no_access');
            //return $this->render('/Basic/web/index.php?r=site%2Fno_access');
        }
        else {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);  
        }
            
    }

    /**
     * Finds the Calendr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Calendr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        //Пример использования кэширования
   //     $cache = Yii::$app->cache;
   //     $model = $cache->get(["calendar", "model", $id]);
   //     if(!empty($model)) {
         //  var_dump('Данные получены из кэша'); die(); 
 //          return $model; 
 //       }
  //     else
           if (($model = Calendr::findOne($id)) !== null) {
    //       $dependency = new \yii\caching\Dbdependency(['sql' => 'SELECT max(id) FROM calendr']);
          // $dependency->sql = "SELECT max(id) from calendr"; 
          // var_dump($dependency); die();
   //         $isCached = $cache->set(["calendar", "model", $id], $model, null, $dependency);
          //  var_dump($isCached); die();
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
