<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Usuario;

class UsuarioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
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
    
    public function actionCadastro(){
        $usuario = new Usuario();        
        $usuario->scenario = 'create';
        if($usuario->load(Yii::$app->request->post())){
            $transaction = Yii::$app->db->beginTransaction();
            $usuario->perfil_id = 2;
            if($usuario->save()){
                Yii::$app->session->setFlash('sucesso', 'Usuário Salvo com Sucesso');
                $transaction->commit();
                return $this->redirect(['site/index']);
            }else{
                $usuario->senha = '';
                $usuario->repetirSenha = '';
                $erroMsg = '';                
                foreach($usuario->errors as $campos){                    
                    foreach($campos as $erro){                        
                        $erroMsg .= '<li>'.$erro.'</li>';
                    }
                }
                Yii::$app->session->setFlash('temErro', $erroMsg);                
                $transaction->rollback();                
            }            
        }
        return $this->render('cadastro', ['usuario'=>$usuario]);
    }
}