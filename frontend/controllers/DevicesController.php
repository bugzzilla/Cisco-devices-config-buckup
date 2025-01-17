<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Devices;
use frontend\models\DevicesSearch;
use frontend\models\ImportForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;


/**
 * DevicesController implements the CRUD actions for Devices model.
 */
class DevicesController extends Controller
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
//                	'delete-multiple' => ['POST'],                		
                ],
            ],
        ];
    }

    public function actionImport()
    {
    	$model = new ImportForm();

    	
    	if (Yii::$app->request->isPost) {
    		$model->importFile = UploadedFile::getInstance($model, 'importFile');
    		$request = Yii::$app->request->post();
    		$model->backupStatus = $request['ImportForm']['backupStatus'];
    		$model->defaultTemplate = $request['ImportForm']['defaultTemplate'];
    		$model = $model->import();
    		return $this->render('importResult', ['model' => $model]);
    	}
    	
    	return $this->render('import', ['model' => $model]);
    }
    
    /**
     * Lists all Devices models.
     * @return mixed
     */

    public function actionIndex()
    {
        $searchModel = new DevicesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Devices model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Devices model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Devices();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->device_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Devices model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->device_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Devices model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

	public function actionMultidel()
	{
		if (isset($_POST['keylist'])) {
			$keys = $_POST['keylist'];
			if (is_array($keys)) {
				for ($i = 0; $i < count($keys); $i++) {
					$this->findModel($keys[$i])->delete();
				}
				return $this->redirect(['index']);
			}
			//file_put_contents('/tmp/12.txt', print_r($keys,true));
		}
	}
    
    /**
     * Finds the Devices model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Devices the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Devices::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
   
}
