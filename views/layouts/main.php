<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?= $this->render('@app/views/components/_head');?>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <?= $this->render('@app/views/components/_header');?>                 
    <?= $content ?>
    <?= $this->render('@app/views/components/_footer');?>
</div>
    
<?php $this->endBody() ?>
</body>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/jquery.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/jquery.easing.1.3.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/bootstrap.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/jcarousel/jquery.jcarousel.min.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/jquery.fancybox.pack.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/jquery.fancybox-media.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/google-code-prettify/prettify.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/portfolio/jquery.quicksand.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/portfolio/setting.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/jquery.flexslider.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/jquery.nivo.slider.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/modernizr.custom.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/jquery.ba-cond.min.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/jquery.slitslider.js"></script>
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/animate.js"></script>

<!-- Template Custom JavaScript File -->
<script src="<?= Yii::$app->urlManager->baseUrl; ?>/flattern/js/custom.js"></script>
</html>
<?php $this->endPage() ?>
