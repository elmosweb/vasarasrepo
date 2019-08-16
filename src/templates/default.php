<?php

/**
 * @var string $contnent
 */
use Quiz\Session;
$content = $this->renderContent($params);
$this->registerJsFile('https://code.jquery.com/jquery-3.3.1.slim.min.js');
$this->registerJsFile('js/index.js');
$this->registerCssFile('assets/style.css');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
$this->registerJsFile('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
$this->registerCssFile('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
$this->registerCssFile('css/style.css');
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php if ($this->jsFiles): ?>
        <?php foreach ($this->jsFiles as $jsFile): ?>
            <script src="<?= $jsFile; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($this->cssFiles): ?>
        <?php foreach ($this->cssFiles as $cssFile): ?>
            <link rel="stylesheet" href="<?= $cssFile; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
<div id="app">

    <?= $this->renderView('header') ?>

    <?= $this->renderView('messages') ?>
    <div class="container">
        <?= $content ?>

    </div>



</div>


<!--<div id="greeting">Hello</div>-->


<div style="background-color: blue"></div>


<?php if ($this->js): ?>
    <script>
        <?=$this->js ?>

    </script>
<?php endif; ?>
</body>
<script src="assets/scripts.js"></script>

</html>
