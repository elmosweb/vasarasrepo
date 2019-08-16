<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-tertiary">
        <a class="nav-link" href="/"><img src="https://www.printful.com/static/images/layout/printful-logo.png" width="50rem"alt="Printful logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Printful vasaras skola <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <?php use Quiz\ActiveUser;

                if (ActiveUser::isLoggedIn()): ?>
                <div class="col-xl-16 mr-3 text-white">
                    Hello, <?= ActiveUser::getLoggedInUser()->name; ?>!
                    <a class='text-white' href="/quizzes">Statistika</a>
                </div>
                    <div class="col-xl-16 ">
                        <button class="btn btn-primary "><a class='text-white' href="/logout">Log out</a></button>
                    </div>



                <?php else: ?>
                    <div class="col-xl-16">
                        <button class="btn btn-primary "><a class="text-white" href="/login">Log in/Register </a></button>
                    </div>


                <?php endif ?>
            </form>
        </div>
    </nav>
</header>