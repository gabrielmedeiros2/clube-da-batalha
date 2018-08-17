<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Usuario;
use app\models\UsuarioSearch;
use yii\web\UploadedFile;
use Cloudinary;
use Cloudinary\Uploader;

class AdminController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'usuario-index'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['usuario-index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action){
                            return (Yii::$app->user->identity->perfil_id == 1);                            
                        }
                    ],                                        
                ],
                'denyCallback' => function($rule, $action){
                    Yii::$app->session->setFlash('temErro', 'Você não tem permissão para acessar esta página');
                    return $this->redirect(['site/index']);
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function actionUsuarioIndex(){
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('usuario/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionUsuarioUpdate(){
        $transaction = Yii::$app->db->beginTransaction();
        $usuario = $this->findUsuario(Yii::$app->request->post()['usuario-id']);        
        $usuario->load(Yii::$app->request->post());        
        $arquivo = UploadedFile::getInstance($usuario, 'foto_url');                 
        if($arquivo->saveAs(Yii::$app->basePath.'/web/images-upload/trainer-card/trainer-'.$usuario->login.'-'.$usuario->id.'.' . $arquivo->extension)){
            Cloudinary::config([
                'cloud_name' => 'clubedabatalha',
                'api_key' => '925316213494833',
                'api_secret' => 'OYakjaCrTOtio21whA0Zo36SHAc'
            ]);
            $retorno = Uploader::upload(Yii::$app->basePath.'/web/images-upload/trainer-card/trainer-'.$usuario->login.'-'.$usuario->id.'.' . $arquivo->extension, ['public_id' => 'trainer-'.$usuario->login.'-'.$usuario->id, 'invalidate' => true, 'folder'=>'trainer-card']);
            if(!empty($retorno)){
                unlink(Yii::$app->basePath.'/web/images-upload/trainer-card/trainer-'.$usuario->login.'-'.$usuario->id.'.' . $arquivo->extension);
                $usuario->foto_url = $retorno['public_id'];        
                if($usuario->save()){
                    $transaction->commit();
                    Yii::$app->session->setFlash('sucesso', 'Trainer Card salvo com sucesso');
                }else{
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('temErro', 'Erro ao salvar o Trainer Card');
                }  
            }else{
                Yii::$app->session->setFlash('temErro', 'Erro ao tentar fazer upload do arquivo');
            }                 
        }else{
            $transaction->rollBack();
            Yii::$app->session->setFlash('temErro', 'Erro ao tentar fazer upload do arquivo');
        }            
                          
        $this->redirect('usuario-index');
    }
    
    public function actionUsuarioDelete($id){
        $this->findUsuario($id)->delete();
        return $this->redirect(['index']);
    }
    
    protected function findUsuario($id){
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
        

    /**
     * Displays a single Usuario model.
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
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuario model.
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
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}