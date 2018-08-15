<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Perfil;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile(Yii::$app->urlManager->baseUrl . '/js/data-pass-modal.js', ['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->urlManager->baseUrl . '/js/flash-modal-fade.js', ['depends' => [yii\web\JqueryAsset::className()]]);
?>
<div class="usuario-index">
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="span6">
                    <div class="inner-heading">
                        <h2>Gerência de Usuários</h2>
                    </div>
                </div>
                <div class="span6">
                    <ul class="breadcrumb">
                        <li><a href="<?= Url::toRoute(['site/index'])?>"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                        <li class="active">Gerência de Usuários</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">            
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [ 
                    [
                        'attribute' => 'perfil_id',
                        'value' => function($data){
                            return $data->perfil->perfil;
                        },
                        'filter' => Html::dropDownList('UsuarioSearch[perfil_id]', null, ArrayHelper::map(Perfil::find()->orderBy('perfil')->asArray()->all(), 'id', 'perfil'), ['prompt' => 'Selecione um Perfil'])
                    ],                    
                    'login',
                    'email:email',
                    [
                        'attribute' => 'foto_url',
                        'format' => 'raw',
                        'value' => function($data){
                            if(!empty($data->foto_url)){
                                return  '<a class="hover-wrap fancybox" data-fancybox-group="gallery" href="'.Yii::$app->urlManager->baseUrl.'/images-upload/trainer-card/'.$data->foto_url.'" title="Trainer Card">'
                                      . $data->foto_url
                                      . '</a> <img src="#" alt="Pokémon Trainer '.$data->login.'" style="display:none"/>';
                            }else{
                                return 'Trainer Card ainda não cadastrado';
                            }
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn',
                        'header'=>'Ações',
                        'template'=>'{delete} {trainer-card}',
                        'buttons' =>[                                                        
                            'delete' => function($url, $model){
                                return Html::a('<i class="icon-trash"></i>', Url::toRoute(['admin/usuario-delete', 'id'=>$model->id]), ['title' => 'Deletar', 'data-confirm' => 'Você realmente deseja excluir este Usuário?']);
                            },
                            
                            'trainer-card' => function($url, $model){
                                return Html::a('<i class="fa fa-address-card-o"></i>', '#myTrainerCard', ['title' => 'Adicionar Trainer Card', 'data-toggle'=>'modal', 'data-id'=>$model->id, 'class' => 'trainer-card']);
                            }
                        ]
                    ],
                ],
            ]); ?>
        </div>        
    </section>
</div>

<div id="myTrainerCard" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="mySigninModalLabel">Adicionar/Trocar Trainer Card</h4>
    </div>
    <div class="modal-body">                        
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?= Url::toRoute('admin/usuario-update')?>">            
            <label class="control-label" for="usuario-foto_url">Trainer Card</label>
            <div class="controls">                    
                <input type="file" id="usuario-foto_url" name="Usuario[foto_url]" accept="image/jpeg"/>
            </div>         
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <input type="hidden" name="usuario-id" id="usuario-id" value=""/>          
            <br/>
            <center><input type="submit" value="Enviar" class="btn btn-success"/></center>
        </form>
    </div>
</div>

<?php if(Yii::$app->session->hasFlash('sucesso')){ ?>
<div id="modalFlash" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="mySignupModalLabel" aria-hidden="true">        
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="alert alert-success alert-dismissible" style="margin-bottom: 0px !important;" role="alert">                
                <strong><?= Yii::$app->session->getFlash('sucesso')?></strong>
            </div>
        </div>
    </div>           
</div>
<?php Yii::$app->session->setFlash('sucesso', null)?>
<?php } else if(Yii::$app->session->hasFlash('temErro')){ ?>
<div id="modalFlash" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="mySignupModalLabel" aria-hidden="true">        
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="alert alert-danger alert-dismissible" style="margin-bottom: 0px !important;" role="alert">                
                <strong><?= Yii::$app->session->getFlash('temErro')?></strong>
            </div>
        </div>
    </div>
</div>
<?php Yii::$app->session->setFlash('temErro', null)?>
<?php }?>