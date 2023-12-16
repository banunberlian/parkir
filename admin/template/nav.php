<nav class="navbar navbar-expand-lg " color-on-scroll="100">
    <div class=" container-fluid  ">
        <a class="navbar-brand" href="#pablo"> <?= $_SESSION['user']['username']; ?> </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../config/do_logout.php">
                        <span class="no-icon">Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>