<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <br><br>This service is developed by Alexander Bashtanov. <br><br>The following methods were used in the development:<br> 1. Authorization and storage of information using MySQL.<br> 2. The DB queries using various commands like SELECT, INSERT, JOIN, Migrations, Active record, etc.<br> 3. Users access to data is implemented on the basis of ACF and RBAC.<br> 4. Built-in controller to remove login information for CRON job scheduler (or run 'yii history/clear' in Console).<br><br> The product is free for use by anyone.<br><br><a href="https://github.com/Alexandr211/Simple-Notes.git">You can getCode of the project from Github here.</a>
        
        
    </p>

    
    <h1><?= Html::encode($user) ?></h1>
    
</div>
