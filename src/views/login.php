<?php
use Quiz\Session;
?>
<div class="row">
    <div class="offset-md-3 col-md-6">
        <h1 class="text-center">Log in</h1>
        <form action="/loginPost" method="post">
            <div class="form-group">
                <p class="text-center">Please log in:</p>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark" >Log in</button>

            </div>
            <div class="col-xl-16">
                <a class="text-primary" href="/register">Not registered? Register! </a>
            </div>

        </form>
    </div>
</div>