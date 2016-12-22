<?php

namespace app\controllers;

use Yii;
use app\models\Perusahaan;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\PerusahaanSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\TimbalBalik;
use app\models\Sponsor;
use app\models\Menerima;
use app\models\Users;
use app\models\User;
use app\models\LoginForm;
use app\models\Acara;




/**
 * PerusahaanController implements the CRUD actions for Perusahaan model.
 */
class PerusahaanController extends Controller
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
     * Lists all Perusahaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PerusahaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perusahaan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionKirim($id){
        $model = new Perusahaan();
        if (Yii::$app->request->isPost) {
            $model->iduser = $id;
            $model->nama = $_POST["Perusahaan"]["nama"];
            $model->phone = $_POST["Perusahaan"]["phone"];
            $model->alamat = $_POST["Perusahaan"]["alamat"];
            $model->tanggal = $_POST["Perusahaan"]["tanggal"];
            $model->cabang = $_POST["Perusahaan"]["cabang"];
            $model->jangka_waktu = $_POST["Perusahaan"]["jangka_waktu"];
            $model->acara = $_POST["Perusahaan"]["acara"];
            $model->acara = implode(",", $model->acara);
            $model->menerima = $_POST["Perusahaan"]["menerima"];
            $model->menerima = implode(",", $model->menerima);
            $model->sponsor = $_POST["Perusahaan"]["sponsor"];
            $model->sponsor = implode(",", $model->sponsor);
            $model->timbal_balik = $_POST["Perusahaan"]["timbal_balik"];
            $model->timbal_balik = implode(",", $model->timbal_balik);
            $model->urlgambar = "img/data/profil/default.png";
//            // select moodel
//            $model->gambar = UploadedFile::getInstances($model, 'gambar');
//            $model->bukti = UploadedFile::getInstances($model, 'bukti');
//
            // upload file to server
//            foreach ($model->gambar as $key => $value1) {
//                $value1->saveAs('img/data/profil/'. $id .md5($value1->baseName) . '.' . $value1->extension);
//            }
//
//            foreach ($model->bukti as $key => $value) {
//                $value->saveAs('img/data/bukti/' .$id .md5($value->baseName) . '.' . $value->extension);
//            }
//
//            // upload file to DB
//            $gambar = $model->gambar;
//
//            $model->urlgambar = $id . md5($gambar->baseName) . '.' . $gambar->extension;
//
//            var_dump($urlgambar);
//            die();
//            $model->urlbukti = implode(";" , ($id . $model->bukti->baseName . '.' .$model->bukti->extension));
//
//            var_dump($model->urlbukti);
//            var_dump($model->urlgambar);
//            die();


            if ($model->save(false)) {
                // file is uploaded successfully
                return $this->redirect(array('/site/login'));
            }else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Creates a new Perusahaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Perusahaan();
        $this->actionKirim($id);
        return $this->render('create', [
            'model' => $model,
        ]);

            // foreach ($model->gambar as $key => $file) {
            //     var_dump($file->extension);
            //     die();
            //     $file->saveAs('img/data'. $file->baseName . '.' . $file->extension);//Upload files to server
            //     $model->urls .= 'uploads/' . $file->baseName . '.' . $file->extension.'**';//Save file names in database- '**' is for separating images
            // }
    }

    /**
     * Updates an existing Perusahaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idperusahaan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Perusahaan model.
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
     * Finds the Perusahaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perusahaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Perusahaan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
