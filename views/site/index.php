<?php
$this->registerJsFile(Yii::$app->urlManager->baseUrl . '/js/flash-modal-fade.js', ['depends' => [yii\web\JqueryAsset::className()]]);
?>
<section id="featured">
    <!-- start slider -->
    <!-- Slider -->
    <div id="nivo-slider">
        <div class="nivo-slider">
            <!-- Slide #1 image -->
            <img src="<?= Yii::$app->urlManager->baseUrl; ?>/images/banner1.jpg" alt="" title="#caption-1" />
            <!-- Slide #2 image -->
            <img src="<?= Yii::$app->urlManager->baseUrl; ?>/images/banner2.jpg" alt="" title="#caption-2" />
            <!-- Slide #3 image -->
            <img src="<?= Yii::$app->urlManager->baseUrl; ?>/images/banner3.jpg" alt="" title="#caption-3" />
            <!-- Slide #4 image -->
            <img src="<?= Yii::$app->urlManager->baseUrl; ?>/images/banner4.jpg" alt="" title="#caption-4" />
        </div>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <!-- Slide #1 caption -->
                    <div class="nivo-caption" id="caption-1">
                        <div>
                            <h2>Bem vindo ao Clube da Batalha</h2>
                            <p>
                                Um lugar para você testar suas habilidades em batalhas Pokémon.
                            </p>
                            <a href="#" class="btn btn-theme">Ler mais</a>
                        </div>
                    </div>
                    <!-- Slide #2 caption -->
                    <div class="nivo-caption" id="caption-2">
                        <div>
                            <h2>Desafie os melhores</h2>
                            <p>
                                Entre em torneios contra os melhores jogadores do site concorrendo a prêmios no seu jogo.
                            </p>
                            <a href="#" class="btn btn-theme">Ler mais</a>
                        </div>
                    </div>
                    <!-- Slide #3 caption -->
                    <div class="nivo-caption" id="caption-3">
                        <div>
                            <h2>Enfrente a seção azul</h2>
                            <p>
                                Torneios competitivos onde são exploradas as capacidades máximas dos treinadores.
                            </p>
                            <a href="#" class="btn btn-theme">Ler mais</a>
                        </div>
                    </div>
                    <!-- Slide #4 caption -->
                    <div class="nivo-caption" id="caption-4">
                        <div>
                            <h2>Desafie a seção vermelha</h2>
                            <p>
                                Encare desafios que exploram o máximo da criatividade do treinador na formação do seu time.
                            </p>
                            <a href="#" class="btn btn-theme">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end slider -->
</section>

<section id="content">
    <div class="container">                
        <!-- Portfolio Projects -->
        <div class="row">
            <div class="span12">
                <h4 class="heading"><strong>Últimas Notícias</strong></h4>
                <div class="row">
                    <div class="span3">                   
                        <h6>Desafie o ginásio de gelo</h6>
                        <img src="<?= Yii::$app->urlManager->baseUrl; ?>/images/desafio-gym.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                        Enfrente o ginásio para garantir sua insignia de treinador
                    </div>
                    <div class="span3">                   
                        <h6>Distribuição de Pokémon</h6>
                        <img src="<?= Yii::$app->urlManager->baseUrl; ?>/images/give2.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                        Garanta seu froslass shiny agora mesmo (oferta limitada)
                    </div>
                    <div class="span3">                   
                        <h6>Distribuição de Pokémon</h6>
                        <img src="<?= Yii::$app->urlManager->baseUrl; ?>/images/give3.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                        Garanta seu piloswine competitivo agora mesmo (oferta limitada)
                    </div>
                    <div class="span3">                   
                        <h6>Distribuição de Pokémon</h6>
                        <img src="<?= Yii::$app->urlManager->baseUrl; ?>/images/give4.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                        Garanta seu jynx competitivo agora mesmo (oferta limitada)
                    </div>
                </div>                
                <div class="row">
                    <div class="span12">
                        <a href="#" class="btn btn-blue pull-right">Ver mais notícias <i class="icon icon-angle-right pull-right"></i></a>
                    </div>
                </div>
            </div>
        </div>        
        <!-- End Portfolio Projects -->
        <!-- divider -->
        <div class="row">
            <div class="span12">
                <div class="solidline">
                </div>
            </div>
        </div>
        <!-- end divider -->
    </div>
</section>

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
<?php }?>