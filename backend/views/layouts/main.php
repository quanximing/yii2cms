<?php
use yii\helpers\Html;
use backend\assets\AppAsset;
/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);

/**
 * Do not use this code in your template. Remove it.
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= Html::encode($this->title) ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
        <?= Html::csrfMetaTags() ?>
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <?php $this->head() ?>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper boxed-wrapper">

        <?= $this->render(
            'header.php'
        ) ?>

        <?= $this->render(
            'left.php'
        )
        ?>
        <?= $this->render(
            'content.php',
            ['content' => $content,]
        ) ?>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">Version <?=\Yii::$app->params['version']?></div>
            Copyright © <?=date('Y ',time())?>. All rights reserved.</footer>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>

