<?php

/** @var View $this
 */

use Quiz\Session;

?>

<div class="row">
    <div class="offset-md-3 col-md-6">
        <h1 class="text-center">User Registration Form</h1>
        <form action="/registerPost" method="post">
            <div class="form-group">
                <?php if (Session::getInstance()->hasErrors()): ?>
                    <div class="alert alert-danger">

                            <ul>
                                <?php foreach (Session::getInstance()->getErrors(true) as $error): ?>
                                <li><?= $error; ?></li>
                            </ul>
                            <?php endforeach; ?>
                    </div>
                <?php endif ?>
                <label for="name">Name</label>

                <input type="text" name="name" placeholder="First Name" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Register</button>

            </div>

        </form>
    </div>
</div>