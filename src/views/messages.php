<?php
use Quiz\Session;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12 offset-md-3">
            <?php if(Session::getInstance()->hasErrors('error')): ?>
                <?php foreach (Session::getInstance()->getMessages('error', true) as $error): ?>
                    <div class="alert alert-dismissible alert-primary mt-3">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?= $error; ?></strong>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <!--      Error Messages     -->
            <?php if (Session::getInstance()->hasMessages(SESSION::MESSAGES)): ?>
                <?php foreach (Session::getInstance()->getMessages(SESSION::MESSAGES, true) as $error): ?>
                    <div class="alert alert-dismissible alert-primary mt-3">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?= $error; ?></strong>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (Session::getInstance()->hasMessages(SESSION::MESSAGES)): ?>
                <?php foreach (Session::getInstance()->getMessages(SESSION::MESSAGES, true) as $message): ?>
                    <div class="alert alert-dismissible alert-success mt-3">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?= $message; ?></strong>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>