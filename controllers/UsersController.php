<?php

namespace app\controllers;

use app\models\Acara;
use app\models\File;
use app\models\JangkaWaktu;
use app\models\Komunitas;
use app\models\Menerima;
use app\models\Perusahaan;
use app\models\Sponsor;
use app\models\TimbalBalik;
use app\models\User;
use yii\web\UploadedFile;
use Yii;
use app\models\Users;
use app\models\Verifikasi;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Note;



/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionKirimemail(){
        $user = Users::findOne(Yii::$app->user->id);
        $model1 = new Verifikasi();
        $sukses = Yii::$app->mailer->compose()
            ->setFrom('aplikasiku@yii2.com')
            ->setTo($user->email)
            ->setSubject("Kode verifikasi epros")
            ->setHtmlBody("Hello, ". $user->username . "!\n\nThis is your verivication number : <b>". $user->authKey ."</b> .");
        if($sukses->send()){
            if ($model1->load(Yii::$app->request->post())) {
                if ($user->authKey == $_POST["Verifikasi"]["kodeverifikasi"]){
                    if ($user->status == "0,0,0,0"){
                        $user->status = "0,1,0,0";
                    }
                    if ($user->status == "1,0,0,0"){
                        $user->status = "1,1,0,0";
                    }
                    if ($user->status == "1,0,0,1"){
                        $user->status = "1,1,0,1";
                    }
                    if ($user->status == "0,0,1,1"){
                        $user->status = "0,1,1,1";
                    }
                    if ($user->status == "1,0,1,1"){
                        $user->status = "1,1,1,1";
                    }
                    if ($user->status == "0,0,1,0"){
                        $user->status = "0,1,1,0";
                    }
                    if ($user->status == "1,0,1,0"){
                        $user->status = "1,1,1,0";
                    }
                    if ($user->status == "0,0,0,1"){
                        $user->status = "0,1,0,1";
                    }
                    $user->save();
                    \Yii::$app->getSession()->setFlash('error', '<div class="alert alert-success"><strong>Sukses!</strong> Email berhasil diaktifasi.</div>');
                    return $this->redirect(['profile', 'username' => Yii::$app->user->identity->username]);
                }else {
                    \Yii::$app->getSession()->setFlash('error', '<div class="alert alert-danger"><strong>Error!</strong> Pastikan kode yang anda masukan benar .</div>');
                    return $this->render('verifikasiemail', [
                        'model' => $model1,
                    ]);
                }
            }
            else {

                return $this->render('verifikasiemail', [
                    'model' => $model1,
                ]);
            }
        }else {
            \Yii::$app->getSession()->setFlash('error', '<div class="alert alert-danger"><strong>Error!</strong> Pesan tidak terkirim pada email anda .</div>');
            return $this->redirect(['profile', 'username' => Yii::$app->user->identity->username]);
        }
    }
    public function actionKirimsms(){
        $user = Users::findOne(Yii::$app->user->id);
        $model1 = new Verifikasi();
        if ($user->level ==1 ){
            $model2 = Perusahaan::find()->where(['iduser' => Yii::$app->user->id ])->one();
        }else {
            $model2 = Komunitas::find()->where(['iduser' => Yii::$app->user->id ])->one();
        }
        // Script Kirim SMS Api Zenziva
        $telepon = $model2->phone;
        $userkey = "cz9s3i";
        $passkey = "ishom123";
        $message ="Hallo," . $user->username. ". kode verifikasi anda adalah" . $user->authKey;

        $url = "http://reguler.zenziva.net/apps/smsapi.php";
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$telepon.'&pesan='.urlencode($message));
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        $results = curl_exec($curlHandle);
        curl_close($curlHandle);
        if($results){
            if ($model1->load(Yii::$app->request->post())) {
                if ($user->authKey == $_POST["Verifikasi"]["kodeverifikasi"]){
                    if ($user->status == "0,0,0,0"){
                        $user->status = "0,0,1,0";
                    }
                    if ($user->status == "1,0,0,0"){
                        $user->status = "1,0,1,0";
                    }
                    if ($user->status == "1,0,0,1"){
                        $user->status = "1,0,1,1";
                    }
                    if ($user->status == "0,1,0,1"){
                        $user->status = "0,1,1,1";
                    }
                    if ($user->status == "1,1,0,1"){
                        $user->status = "1,1,1,1";
                    }
                    if ($user->status == "0,1,0,0"){
                        $user->status = "0,1,1,0";
                    }
                    if ($user->status == "1,1,0,0"){
                        $user->status = "1,1,1,0";
                    }
                    if ($user->status == "0,0,0,1"){
                        $user->status = "0,0,1,1";
                    }
                    $user->save();
                    \Yii::$app->getSession()->setFlash('error', '<div class="alert alert-success"><strong>Sukses!</strong> Email berhasil diaktifasi.</div>');
                    return $this->redirect(['profile', 'username' => Yii::$app->user->identity->username]);
                }else {
                    \Yii::$app->getSession()->setFlash('error', '<div class="alert alert-danger"><strong>Error!</strong> Pastikan kode yang anda masukan benar .</div>');
                    return $this->render('verifikasisms', [
                        'model' => $model1,
                    ]);
                }
            }
            else {

                return $this->render('verifikasisms', [
                    'model' => $model1,
                ]);
            }
        }else {
            \Yii::$app->getSession()->setFlash('error', '<div class="alert alert-danger"><strong>Error!</strong> Pesan tidak terkirim pada email anda .</div>');
            return $this->redirect(['profile', 'username' => Yii::$app->user->identity->username]);
        }
    }
    public function actionUploadberkas(){
        $model = new File();
        $user = Users::findOne(Yii::$app->user->id);

        if ($user->level ==1 ){
            $model2 = Perusahaan::find()->where(['iduser' => Yii::$app->user->id ])->one();
        }else {
            $model2 = Komunitas::find()->where(['iduser' => Yii::$app->user->id ])->one();
        }
        if (!empty($_POST)) {
            $model->imageFile = $_POST['File']['imageFile'];
            $data = \yii\web\UploadedFile::getInstances($model, 'imageFile');

            $message = Yii::$app->mailer->compose()
                ->setFrom([ Yii::$app->user->identity->email => 'Sample Mail'])
                ->setTo("rahayupeni20@gmail.com")
                ->setSubject($user->username ." telah mengirim berkas bukti \n ionsmart.co/epruslawas/web/users/profile?username=".$user->username)
                ->setHtmlBody("Epros Uhuy");
            $model2->urlbukti = "";
            foreach ($data as $file) {
                $filename = 'img/data/bukti/' . Yii::$app->user->id . md5($file->baseName). '.' . $file->extension; # i'd suggest adding an absolute path here, not a relative.
                $model2->urlbukti = $model2->urlbukti .','.  $filename;
                $file->saveAs($filename);
                $message->attach($filename);
            }
            $message->send();
            if ($user->status == "0,0,0,0"){
                $user->status = "0,0,0,1";
            }
            if ($user->status == "1,0,0,0"){
                $user->status = "1,0,0,1";
            }
            if ($user->status == "1,1,0,0"){
                $user->status = "1,1,0,1";
            }
            if ($user->status == "0,1,1,0"){
                $user->status = "0,1,1,1";
            }
            if ($user->status == "1,1,1,0"){
                $user->status = "1,1,1,1";
            }
            if ($user->status == "0,0,1,0"){
                $user->status = "0,0,1,1";
            }
            if ($user->status == "1,0,1,0"){
                $user->status = "1,0,1,1";
            }
            if ($user->status == "0,1,0,0"){
                $user->status = "0,1,0,1";
            }
            $user->save();
            $model2->save(false);
            \Yii::$app->getSession()->setFlash('error', '<div class="alert alert-success"><strong>Sukses!</strong> File berhasil dikirim pada admin.</div>');
            return $this->redirect(['profile', 'username' => Yii::$app->user->identity->username]);
            // its better if you relegate such a code to your model class
        }
        return $this->render('uploadfile', ['model'=>$model]);
    }
    public function actionGantifoto(){
        $model = new File();
        if (!empty($_POST)) {
            $model->imageFile = $_POST['File']['imageFile'];
            $file = \yii\web\UploadedFile::getInstance($model, 'imageFile');
            // You can then do the following
            if ($model->save()) {
                $file->saveAs('path/to/file');
            }
            // its better if you relegate such a code to your model class
        }
        return $this->render('uploadfile', ['model'=>$model]);
    }

    public function actionChat(){
        $this->layout = "message";
        $model = new Users();
        return $this->render('chat', [
            'model' => $model,
        ]);
    }

    public function actionUprofile(){
        $model1 = Users::findOne(Yii::$app->user->id);

        $notes = Note::find()->where(['iduser' => Yii::$app->user->id])->one();
        if (!isset($notes->id)) {
            $note = new Note();
        }else {
            $note = Note::find()->where(['iduser' => Yii::$app->user->id])->one();
        }
//        if(!$model1->load(Yii::$app->request->post())){
            if ($model1->level == 1){
                $model2= Perusahaan::find()->where(['iduser' => Yii::$app->user->id])->one();
                $model2->acara = explode(',' , $model2->acara);
                $model2->menerima = explode(',' , $model2->menerima);
                $model2->sponsor = explode(',' , $model2->sponsor);
                $model2->timbal_balik = explode(',' , $model2->timbal_balik);
                $index = "Perusahaan";
            } else {
                $model2 = Komunitas::find()->where(['iduser' => Yii::$app->user->id])->one();
                $index = "Komunitas";
            }
//        }
        if ($model1->load(Yii::$app->request->post())){
            $model2->nama = $_POST[$index]["nama"];
            $datagambar = explode("." , $_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], "img/data/profil/". Yii::$app->user->id. md5($datagambar[0]). ".". $datagambar[1]);
            $model2->urlgambar = "img/data/profil/". Yii::$app->user->id. md5($datagambar[0]). ".". $datagambar[1];
            $model2->alamat = $_POST[$index]["alamat"];
            $model2->cabang = $_POST[$index]["cabang"];
            $model2->phone = $_POST[$index]["phone"];
            if ($model1->level == 1){
                $model2->jangka_waktu = $_POST["Perusahaan"]["jangka_waktu"];
                $model2->acara = implode(',' , $_POST["Perusahaan"]["acara"]);
                $model2->menerima = implode(',' , $_POST["Perusahaan"]["menerima"]);
                $model2->sponsor = implode(',' , $_POST["Perusahaan"]["sponsor"]);
                $model2->timbal_balik = implode(',' , $_POST["Perusahaan"]["timbal_balik"]);
            }
            $note->note = $_POST["Note"]["note"];
            $note->iduser = Yii::$app->user->id;
            if ($model1->status == "0,0,0,0"){
                $model1->status = "1,0,0,0";
            }
            if ($model1->status == "0,0,0,1"){
                $model1->status = "1,0,0,1";
            }
            if ($model1->status == "0,1,0,1"){
                $model1->status = "1,1,0,1";
            }
            if ($model1->status == "0,1,1,0"){
                $model1->status = "1,1,1,0";
            }
            if ($model1->status == "0,1,1,1"){
                $model1->status = "1,1,1,1";
            }
            if ($model1->status == "0,0,1,0"){
                $model1->status = "1,0,1,0";
            }
            if ($model1->status == "0,0,1,1"){
                $model1->status = "1,0,1,1";
            }
            if ($model1->status == "0,1,0,0"){
                $model1->status = "1,1,0,0";
            }
            if ($model1->save() && $model2->save(false) && $note->save(false)){
                return $this->redirect(array('users/profile','username' => $model1['username']));
            }
        }

        return $this->render('updateprofile', [
            'model1' => $model1,
            'model2' => $model2,
            'note' => $note,
        ]);

    }

    public function actionProfile($username)
    {
//        mencari data user berdasarkan id
        $datauser = Users::findOne(Yii::$app->user->id);
        $id = Yii::$app->user->id;

//        mencari note
        $note = Note::find()->where(['iduser' => $id])->one();
        if($note == NULL){
            $note["note"] = "Lorem Ipsum";
        }
//membuat level status
        $index = 0;
        $status = explode(',', $datauser->status);
        $array[] = $id;
        $array[] = $datauser["level"];
        $array[] = $status;
        if ($datauser->level == 1){
            $rows = Perusahaan::find()->where(['iduser' => $id])->one();

            $temp = array();
            $namasponsor= explode(',', $rows["sponsor"]);
            foreach ($namasponsor as $value){
                $namasponsor = Sponsor::findOne($value);
                $temp[] = $namasponsor["sponsor"];
            }
            $sponsor = implode(',', $temp);

            $temp2 = array();
            $namaacara = explode(',', $rows["acara"]);
            foreach ($namaacara as $value){
                $namaacara = Sponsor::findOne($value);
                $temp2[] = $namaacara["sponsor"];
            }
            $acara = implode(',', $temp2);

            $temp2 = array();
            $namaacara = explode(',', $rows["acara"]);
            foreach ($namaacara as $value){
                $namaacara = Acara::findOne($value);
                $temp2[] = $namaacara["acara"];
            }
            $acara = implode(',', $temp2);

            $temp3 = array();
            $namamemiliki = explode(',', $rows["menerima"]);
            foreach ($namamemiliki as $value){
                $namamemiliki = Menerima::findOne($value);
                $temp3[] = $namamemiliki["menerima"];
            }
            $memiliki = implode(',', $temp3);

            $temp4 = array();
            $namatimbal= explode(',', $rows["timbal_balik"]);
            foreach ($namatimbal as $value){
                $namatimbal = TimbalBalik::findOne($value);
                $temp4[] = $namatimbal["timbal"];
            }
            $timbal = implode(',', $temp4);

            $jangka = JangkaWaktu::findOne($rows["jangka_waktu"]);

            $array[] = $rows['urlgambar'];
            $array[] = $rows["nama"];
            $array[] = $note["note"];
            $array[] = $datauser["email"];
            $array[] = $rows["phone"];
            $array[] = $rows["alamat"];
            $array[] = $rows["tanggal"];
            $array[] = $rows["cabang"];
            $array[] = $acara;
            $array[] = $memiliki;
            $array[] = $jangka["jangka"];
            $array[] = $sponsor;
            $array[] = $timbal;

        }else{
            $rows = Komunitas::find()->where(['iduser' => $id])->one();

            $array[] = $rows['urlgambar'];
            $array[] = $rows["nama"];
            $array[] = $note["note"];
            $array[] = $datauser["email"];
            $array[] = $rows["phone"];
            $array[] = $rows["alamat"];
            $array[] = $rows["tanggal"];
            $array[] = $rows["cabang"];
        }
        return $this->render('profile', [
            'model' => $array,
        ]);
    }

    public function actionAnotherprofile($username)
    {
//        mencari data user berdasarkan id
        $datauser = Users::find()->where(['username' => $username])->one();
        $id = $datauser["id"];

//        mencari note
        $note = Note::find()->where(['iduser' => $id])->one();
        if($note == NULL){
            $note["note"] = "Lorem Ipsum";
        }
//membuat level status
        $index = 0;
        $status = explode(',', $datauser->status);
        $array[] = $id;
        $array[] = $datauser["level"];
        $array[] = $status;
        if ($datauser->level == 1){
            $rows = Perusahaan::find()->where(['iduser' => $id])->one();

            $temp = array();
            $namasponsor= explode(',', $rows["sponsor"]);
            foreach ($namasponsor as $value){
                $namasponsor = Sponsor::findOne($value);
                $temp[] = $namasponsor["sponsor"];
            }
            $sponsor = implode(',', $temp);

            $temp2 = array();
            $namaacara = explode(',', $rows["acara"]);
            foreach ($namaacara as $value){
                $namaacara = Sponsor::findOne($value);
                $temp2[] = $namaacara["sponsor"];
            }
            $acara = implode(',', $temp2);

            $temp2 = array();
            $namaacara = explode(',', $rows["acara"]);
            foreach ($namaacara as $value){
                $namaacara = Acara::findOne($value);
                $temp2[] = $namaacara["acara"];
            }
            $acara = implode(',', $temp2);

            $temp3 = array();
            $namamemiliki = explode(',', $rows["menerima"]);
            foreach ($namamemiliki as $value){
                $namamemiliki = Menerima::findOne($value);
                $temp3[] = $namamemiliki["menerima"];
            }
            $memiliki = implode(',', $temp3);

            $temp4 = array();
            $namatimbal= explode(',', $rows["timbal_balik"]);
            foreach ($namatimbal as $value){
                $namatimbal = TimbalBalik::findOne($value);
                $temp4[] = $namatimbal["timbal"];
            }
            $timbal = implode(',', $temp4);

            $jangka = JangkaWaktu::findOne($rows["jangka_waktu"]);

            $array[] = $rows['urlgambar'];
            $array[] = $rows["nama"];
            $array[] = $note["note"];
            $array[] = $datauser["email"];
            $array[] = $rows["phone"];
            $array[] = $rows["alamat"];
            $array[] = $rows["tanggal"];
            $array[] = $rows["cabang"];
            $array[] = $acara;
            $array[] = $memiliki;
            $array[] = $jangka["jangka"];
            $array[] = $sponsor;
            $array[] = $timbal;

        }else{
            $rows = Komunitas::find()->where(['iduser' => $id])->one();

            $array[] = $rows['urlgambar'];
            $array[] = $rows["nama"];
            $array[] = $note["note"];
            $array[] = $datauser["email"];
            $array[] = $rows["phone"];
            $array[] = $rows["alamat"];
            $array[] = $rows["tanggal"];
            $array[] = $rows["cabang"];
        }
        return $this->render('anotherprofile', [
            'model' => $array,
        ]);
    }


    public function actionLevel($id){

        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->level = $_POST['Users']['level'];

            if ($model->save()) {
                if ($model->level == 1) {
                    return $this->redirect(array('/perusahaan/create', 'id' => $model->id));   
                }else{
                    return $this->redirect(array('/komunitas/create', 'id' => $model->id));
                }
            }
        }
        return $this->render('level', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */

    //verifikasi 
    public function actionVerifikasi($id) 
    {
        $model1 = $this->findModel($id);
        $model = new Verifikasi();

        if ($model->load(Yii::$app->request->post())) {
            if ($model1->authKey == $_POST['Verifikasi']['kodeverifikasi']) {
                $model1->status = 1;
                if ($model1->save()) {
                    return $this->redirect(['level', 'id' => $model1->id]);
                }
                else{
                    return $this->render('verifikasi', [
                        'model' => $model,
                    ]);
                }
            }else {
                return $this->render('verifikasi', [
                    'model' => $model,
                ]);
            }
        }
        return $this->render('verifikasi', [
            'model' => $model,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionVie($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function antionSomething(){
        echo "asd";
    }

    public function actionMembuat()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post())) {
            try {
                $model->authKey = rand(100000,999999);
                $model->status = "0,0,0,0";
                $model->password = md5($model->password);
                $model->level = $_POST['Users']['level'];

                if ($model->save(false)) {
                    if ($model->level == 1) {
                        return [
                            'message' => 'Mengarah ke perusahaan',
                            'username' => $model->username
                        ];
                    }else{
                        return [
                            'message' => 'Mengarah ke komunitas',
                            'username' => Yii::$app->user->identity->username
                        ];
                    }
                } else {
                    return [
                        'message' => 'Gagal Upload'
                    ];
                }

            } catch(Exception $e) {
                Yii::$app->getSession()->setFlash('error',"{$e->getMassage()}");
            }
        }
    }

    public function actionKirim()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post())) {
            try {
                $model->authKey = rand(100000,999999);
                $model->status = 0;
                $model->password = md5($model->password);
                $model->level = $_POST['Users']['level'];

                if ($model->save(false)) {
                    if ($model->level == 1) {
                        return [
                            'message' => 'Mengarah ke perusahaan',
                            'username' => $model->username
                        ];
                    }else{
                        return [
                            'message' => 'Mengarah ke komunitas',
                            'username' => Yii::$app->user->identity->username
                        ];
                    }
                } else {
                    return [
                        'message' => 'Gagal Upload'
                    ];
                }

            } catch(Exception $e) {
                Yii::$app->getSession()->setFlash('error',"{$e->getMassage()}");
            }
        }
    }

    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post())) {
            Users::find()->where(['username' => $_POST['Users']['username']])->one();
            if (Users::find()->where(['username' => $_POST['Users']['username']])->one()){
                \Yii::$app->getSession()->setFlash('error', '<div class="alert alert-danger"><strong>Error!</strong>Username telah digunakan.</div>');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            if (Users::find()->where(['email' => $_POST['Users']['email']])->one()){
                \Yii::$app->getSession()->setFlash('error', '<div class="alert alert-danger"><strong>Error!</strong>Email telah digunakan.</div>');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }


                $model->authKey = rand(100000,999999);
                $model->status = "0,0,0,0";
                $model->password = md5($model->password);
                $model->level = $_POST['Users']['level'];

                if ($model->save(false)) {
                    if ($model->level == 1) {
                        return $this->redirect(array('/perusahaan/create', 'id' => $model->id));
                    }else{
                        return $this->redirect(array('/komunitas/create', 'id' => $model->id));
                    }
                } else {
                    Yii::$app->getSession()->setFlash('error','Data not saved, errorx!');
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
