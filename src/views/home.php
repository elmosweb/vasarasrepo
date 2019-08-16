<?php
/**
 * @var array $quizData
 *
 */
use Quiz\Models\UserModel;
use Quiz\View;
use Quiz\ActiveUser;


$this->registerJsFile('js/index.js');
$this->registerCssFile('css/style.css');
?>




<?php
if (ActiveUser::isLoggedIn()):
    $userName = ActiveUser::getLoggedInUser()->name; ?>

    <quiz :name ='<?= json_encode($userName); ?>' :quizzes-prop ='<?= json_encode($quizData); ?>'></quiz>


<?php else: ?>
<div class="container">
    <div class="row">
        <div class="col-xl-12 mt-3">
        <h1>Main page</h1>
        </div>
    </div>
</div>
<?php endif ?>




