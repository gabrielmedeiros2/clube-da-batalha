<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="span6">
                <div class="inner-heading">
                    <h2>Cadastro de Usuários</h2>
                </div>
            </div>
            <div class="span6">
                <ul class="breadcrumb">
                    <li><a href="<?= Url::toRoute(['site/index'])?>"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                    <li class="active">Cadastro de Usuários</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="content">
    <div class="container">
        <h4>Preencha o formulário de cadastro</h4>
        <?php $form = ActiveForm::begin(['fieldConfig' => ['template' => "{label}\n{input}\n{hint}"]]); ?>
        <div class="row">
            <div class="span6">
                <div class="row">
                    <div class="span3">
                        <?= $form->field($usuario, 'login')->textInput(['style'=>'width:100% !important', 'required'=>true])?>
                    </div>
                    <div class="span3">
                        <?= $form->field($usuario, 'email')->input('email', ['style'=>'width:100% !important', 'required'=>true])?>
                    </div>            
                </div>
                <div class="row">
                    <div class="span3">
                        <?= $form->field($usuario, 'senha')->passwordInput(['style'=>'width:100% !important', 'required'=>true])?>
                    </div>
                    <div class="span3">
                        <?= $form->field($usuario, 'repetirSenha')->passwordInput(['style'=>'width:100% !important', 'required'=>true])?>
                    </div>               
                </div>
                <div class="row">
                    <div class="span12">
                        <?= Html::submitButton('Finalizar Cadastro', ['class'=>'btn btn-green'])?>
                    </div>
                </div>
                    </div>
            <div class="span6">
                <?php if(Yii::$app->session->hasFlash('temErro')){ ?>
                <div class="alert alert-danger">
                    <strong>O Formulário não pode ser salvo devido aos seguintes erros:</strong>
                    <ul>
                        <?= Yii::$app->session->getFlash('temErro') ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </div>        
        <?php ActiveForm::end(); ?>
    </div>
</section>