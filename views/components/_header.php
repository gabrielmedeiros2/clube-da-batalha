<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<header>
    <div class="container ">           
        <!-- end toggle link -->
        <div class="row nomargin">
            <div class="span12">
                <div class="headnav">
                    <ul>
                        <?php if(empty(Yii::$app->user->identity->id)){?>                        
                            <li><a href="<?= Url::toRoute(['usuario/cadastro'])?>" data-toggle="modal"><i class="icon-user"></i> Registar-se</a></li>
                            <li><a href="#mySignin" data-toggle="modal">Fazer Login</a></li>
                        <?php }else{?>
                            <li style="color:#F03C02;"><i class="icon-user"></i><?= Yii::$app->user->identity->login . (empty(Yii::$app->user->identity->perfil->perfil) ? '' : ' ('.Yii::$app->user->identity->perfil->perfil.')')?></li>
                            <li><?= Html::a('Sair', ['site/logout'], ['data' => ['method' => 'post', 'params'=>['_csrf'=>Yii::$app->request->getCsrfToken()]]]) ?></li>
                        <?php }?>
                    </ul>
                </div>
<!-- Signup Modal -->
                <div id="mySignup" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySignupModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 id="mySignupModalLabel">Crie sua <strong>conta</strong></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="usuario-nome">Login</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputSignupPassword">Password</label>
                                <div class="controls">
                                    <input type="password" id="inputSignupPassword" placeholder="Password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputSignupPassword2">Confirm Password</label>
                                <div class="controls">
                                    <input type="password" id="inputSignupPassword2" placeholder="Password">
                                </div>
                            </div>                            
                            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn">Sign up</button>
                                </div>
                                <p class="aligncenter margintop20">
                                    Already have an account? <a href="#mySignin" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Sign in</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end signup modal -->                
                <!-- Sign in Modal -->
                <div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 id="mySigninModalLabel">Entre com sua <strong>Conta</strong></h4>
                    </div>
                    <div class="modal-body">                        
                        <form class="form-horizontal" method="POST" action="<?= Url::toRoute('site/login')?>">
                            <div class="control-group">
                                <label class="control-label" for="login-form_username">Login</label>
                                <div class="controls">
                                    <input type="text" id="login-form_username" name="LoginForm[username]" placeholder="Login">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="login-form_password">Senha</label>
                                <div class="controls">
                                    <input type="password" id="login-form_password" name="LoginForm[password]" placeholder="Senha">
                                </div>
                            </div>
                            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-blue">Fazer Login</button>
                                </div>
                                <p class="aligncenter margintop20">
                                    Esqueceu a senha? <a href="#myReset" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Resetar Senha</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end signin modal -->
                <!-- Reset Modal -->
                <div id="myReset" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="myResetModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 id="myResetModalLabel">Reset your <strong>password</strong></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="inputResetEmail">Email</label>
                                <div class="controls">
                                    <input type="text" id="inputResetEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn">Reset password</button>
                                </div>
                                <p class="aligncenter margintop20">
                                    We will send instructions on how to reset your password to your inbox
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end reset modal -->
            </div>
        </div>
        <div class="row">
            <div class="span4">
                <div class="logo">
                    <a href="<?=Url::toRoute('site/index')?>"><img src="<?= Yii::$app->urlManager->baseUrl; ?>/images/logo-header.jpg" alt="" class="logo" /></a>              
                </div>
            </div>
            <div class="span8">
                <div class="navbar navbar-static-top">
                    <div class="navigation">
                        <nav>
                            <ul class="nav topnav">
                                <li class="dropdown active">
                                    <a href="<?=Url::toRoute('site/index')?>">Home <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index-alt2.html">Homepage 2</a></li>
                                        <li><a href="index-alt3.html">Homepage 3</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Features <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="typography.html">Typography</a></li>
                                        <li><a href="table.html">Table</a></li>
                                        <li><a href="components.html">Components</a></li>
                                        <li><a href="animations.html">56 Animations</a></li>
                                        <li><a href="icons.html">Icons</a></li>
                                        <li><a href="icon-variations.html">Icon variations</a></li>
                                        <li class="dropdown"><a href="#">3 Sliders <i class="icon-angle-right"></i></a>
                                            <ul class="dropdown-menu sub-menu-level1">
                                                <li><a href="index.html">Nivo slider</a></li>
                                                <li><a href="index-alt2.html">Slit slider</a></li>
                                                <li><a href="index-alt3.html">Parallax slider</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Pages <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="about.html">About us</a></li>
                                        <li><a href="pricingbox.html">Pricing boxes</a></li>
                                        <li><a href="testimonials.html">Testimonials</a></li>
                                        <li><a href="404.html">404</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Portfolio <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="portfolio-2cols.html">Portfolio 2 columns</a></li>
                                        <li><a href="portfolio-3cols.html">Portfolio 3 columns</a></li>
                                        <li><a href="portfolio-4cols.html">Portfolio 4 columns</a></li>
                                        <li><a href="portfolio-detail.html">Portfolio detail</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Blog <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
                                        <li><a href="post-left-sidebar.html">Post left sidebar</a></li>
                                        <li><a href="post-right-sidebar.html">Post right sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html">Contact </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- end navigation -->
                </div>
            </div>
        </div>
    </div>
</header>