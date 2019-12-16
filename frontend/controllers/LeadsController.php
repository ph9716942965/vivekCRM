<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Leads;
use frontend\models\LeadsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\UploadForm;
use yii\web\UploadedFile;
use yii\db\Query;

/**
 * LeadsController implements the CRUD actions for Leads model.
 */
class LeadsController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Leads models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LeadsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Leads model.
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
     * Creates a new Leads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Leads();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    // public function actionNextCall(){
    public function nextCall(){
        $currentDateTime = Date("Y-m-d H:i");
        $model = Leads::find()
            // ->where('user_id = :user_id and next_calling_after < :next_calling_after', [
            //     ':user_id' => Yii::$app->user->identity->id,
            //     ':next_calling_after' => $currentDateTime
            //     ])
            ->where('next_calling_after < :next_calling_after and disposition_id not in (1,6)', [
                    ':next_calling_after' => $currentDateTime,
                    // ':disposition_id' => [1,6]
                    ])
            ->orderBy(['updated_at' => SORT_ASC, 'next_calling_after' => SORT_ASC])
            ->select('id')
            ->one();
        // echo "<pre>";
        // print_r($model->id);
        // exit;
        return isset($model->id) ? $model->id : 0;
    }

    /**
     * Updates an existing Leads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id=null)
    {
        $id = ($id==null) ? $this->nextCall() : $id;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                if( Yii::$app->request->post('snxt') && ($this->nextCall()!= 0)){
                    return $this->redirect(['update']);
                }
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionImport()
    {
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {

            //    $data= file_get_contents($model->file->tempName);
            $connection = \Yii::$app->db;
            $transaction = $connection->beginTransaction();
            try {
                $connection->createCommand()
                        ->insert('leads', [
                                'user_id' => 1,
                                'name' => 1,
                                'phone'=> 1,
                                'email' => 'email',
                                'problem' => 'problem',
                                'address' => '',
                                'city' => '',
                                'state' => '',
                                'pincode' => ''
                        ])->execute();
        
                //.....
                $transaction->commit();
            } catch(Exception $e) {
                $transaction->rollback();
            }
               $row = 1;
               if (($handle = fopen($model->file->tempName, "r")) !== FALSE) {
                 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                     
                    if( $row > 1){
                        $connection->createCommand()
                        ->insert('leads', [
                                'user_id' => 1,
                                'name' => $data[0],
                                'phone'=> $data[1],
                                'email' => isset($data[2]) ? $data[2] : '',
                                'problem' => isset($data[3]) ? $data[3] : '',
                                'address' => isset($data[4]) ? $data[4] : '',
                                'city' => isset($data[5]) ? $data[5] : '',
                                'state' => isset($data[6]) ? $data[6] : '',
                                'pincode' => isset($data[7]) ? $data[7] : '',
                        ])->execute();
                    }
                
                   $num = count($data);
                   echo "<p> $num fields in line $row: <br /></p>\n";
                   $row++;
                   for ($c=0; $c < $num; $c++) {
                       echo $data[$c] . "<br />\n";
                   }
                 }
                 fclose($handle);
               }
                echo "<pre>";
                // print_r( $data);
                exit;
                // $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
            }
        }
        return $this->render('import', ['model' => $model]);
    }

    /**
     * Deletes an existing Leads model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Leads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Leads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Leads::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
