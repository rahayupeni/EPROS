<?php

namespace app\controllers;

use app\models\Acara;
use app\models\JangkaWaktu;
use app\models\Komunitas;
use app\models\Menerima;
use app\models\Note;
use app\models\Perusahaan;
use app\models\Sponsor;
use app\models\TimbalBalik;
use app\models\User;
use app\models\Users;
use app\models\UsersSearch;
use Yii;
use app\models\Teman;
use app\models\TemanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use YiiNodeSocket\Frames\IFrameFactory;

/**
 * TemanController implements the CRUD actions for Teman model.
 */
class TemanController extends Controller
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
     * Lists all Teman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $sudahteman = Teman::find()->where(['ini' => Yii::$app->user->identity->username, 'status' => 1])->asArray()->all();
        $mauteman = Teman::find()->where(['ini' => Yii::$app->user->identity->username, 'status' => 0])->asArray()->all();
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'sudahteman' => $sudahteman,
            'mauteman' => $mauteman,
        ]);
    }

    public function actionAddfriend($username)
    {
        $model = $this->findModel(['denganini' => $username, 'ini' => Yii::$app->user->identity->username]);

        $sudahteman = Teman::find()->where(['ini' => Yii::$app->user->identity->username, 'status' => 1])->asArray()->all();
        $mauteman = Teman::find()->where(['ini' => Yii::$app->user->identity->username, 'status' => 0])->asArray()->all();

        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model->status = 1;
        $model->save(false);
        return $this->redirect('index');
    }

    /**
     * Displays a single Teman model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
//        mencari data user berdasarkan id
        $datauser = Users::findOne($id);
        return $this->redirect(array('users/anotherprofile','username' => $datauser->username));
    }

    /**
     * Creates a new Teman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
//        $model = new Teman();
//        $model->ini = Teman::find()->where(['ini' => Yii::$app->user->identity->username, 'status' => 1]);
//        $model->denganini = User::findOne($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->idteman]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
    }

    /**
     * Updates an existing Teman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = new Teman();
        $model->ini = Yii::$app->user->identity->username;
        $user = Users::findOne($id);
        $model->denganini = $user->username;
        $model->status = 0;
        if ($model->save()){
            return $this->redirect('index');
        }
         else {
             return $this->redirect('index');
        }
    }

    /**
     * Deletes an existing Teman model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Teman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Teman::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
