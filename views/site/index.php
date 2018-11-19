<?php

/* @var $this yii\web\View */
/* Чтобы узнать URL*/
use yii\helpers\Url;

$this->title = 'Your simple Notes';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to the simple Notes!</h1>

       <!--   echo Url::to(['site/say', 'message' => 'Hallo World!']); -->
        
        <h2>Please authorise to START</h2>

        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Simple</h2>

                <p>You only need to authorise once to begin create and store your notes in cloud. </p>
                
            </div>
            <div class="col-lg-4">
                <h2>Secure</h2>

                <p>Your records are protected with at least a 6-digit password and a special hash encryption algorithm. </p>

                </div>
            <div class="col-lg-4">
                <h2>Speedy</h2>

                <p>Fast operation of the service is provided by a simple but reliable code.</p>

                
            </div>
        </div>

    </div>
</div>
