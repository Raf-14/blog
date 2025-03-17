<!doctype html>
<html>
<head>

    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?></title>
</head>

<body>
<div class="container">
    <!---------------------------- HEADER --------------------------------------->
    <h1 class="display-3">Mon Blog</h1>
    <?php include_once 'views/includes/header.php'?>
    <!-- ------------------------------------- LINK FOR CATEGORIES --------------------------------- -->
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <?php foreach ($allCategories as $index => $category):  ?>
                
                <a class="p-2 text-muted" href="#"><?= $category['name']?></a>

            <?php endforeach; ?>
        </nav>
    </div>
    <!-- ------------------------------------- BANER --------------------------------- -->
         <!-- ------------------------------------- DISPLAY LATEST CATEGORY --------------------------------- -->
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic"><?= $lastArticle['title']?></h1>
            <p class="lead my-3"><?= $lastArticle['sentence']?></p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>
    <!-- ------------------------------------- CONTAINER CARD ARTICLE --------------------------------- -->
    <div class="row mb-2">
            <!-- ------------------------------------- LEFT CARD ARTICLE --------------------------------- -->
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary"><?= $lastArticleLeft['category'] ?></strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#"><?= $lastArticleLeft['title']?></a>
                    </h3>
                    <div class="mb-1 text-muted"><?= $lastArticleLeft['date']?></div>
                    <p class="card-text mb-auto"><?= $lastArticleLeft['sentence']?></p>
                    <a href="#">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" src="assets/images/thumbnail-1.jpg" alt="Card image cap">
            </div>
        </div>
            <!-- ------------------------------------- RIGHT CARD ARTICLE --------------------------------- -->
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success"><?= $lastArticleRight['category'] ?></strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#"><?= $lastArticleRight['title'] ?></a>
                    </h3>
                    <div class="mb-1 text-muted"><?= $lastArticleRight['date'] ?></div>
                    <p class="card-text mb-auto"><?= $lastArticleRight['sentence'] ?></p>
                    <a href="#">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" src="assets/images/thumbnail-2.jpg" alt="Card image cap">
            </div>
        </div>
    </div>
</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                From the Firehose
            </h3>
                <!-- ------------------------ DISPLAY ARTICLE--------------------------------------- -->
            <?php foreach ($allArticles as $index => $article):?>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <img alt="<?= $article['title']?>" src="<?= $article['image']?>"/>
                        <h4 class="card-title">
                            <a href="#"><h2 class="blog-post-title"><?= $article['title']?></h2></a>
                        </h4>
                        <div class="card-meta">
                            <span class="text-muted">Posted by</span>
                            <a href="#"><?= $article['firstname'] . ' ' . $article['lastname']?></a>
                            <span class="text-muted"><?= format_date(($article['date']), $format = "d/m/Y H:i")?></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?= $article['content']?>
                        </p>
                        <a href="#" class="stretched-link">Continue reading...</a>
                        <div class="card-footer">
                            <span class="text-muted">Comments</span>
                            <a href="#">3</a>
                        </div>
                    
                        <div class="card-footer">
                            <span class="text-muted">Likes</span>
                            <a href="#">12</a>
                        </div>
                    </div>
            </div>
            <!-- /.blog-post -->
            <?php endforeach; ?>
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->
        <!-- About section left -->
        <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
                <h4 class="font-italic">About</h4>
                <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>

        </aside><!-- /.blog-sidebar -->

         <!--=============== LOGIN ===============-->
        <div class="login" id="login">
            <i class="bx bx-x login__close" id="login-close">X</i>
            <h2 class="login__title-center">Login</h2>
            <!-- LOGIN FORM -->
            <form action="" class="login__form grid">
                <!-- EMAIL -->
                <div class="login__content">
                    <label for="email">Email:</label>
                    <input type="email" id="email" class="form-control login__input" required>
                </div>
                <!-- PASSWORD -->
                <div class="login__content">
                    <label for="password">Password:</label>
                    <input type="password" id="password" class="form-control login__input" required>
                </div>
                <!-- LOGIN BTN -->
                <div>
                        <a href="#" class="button btn btn-primary btn-large mt-3">Sign in</a>
                </div>
                <!-- HAVEN'T ACCOUNT -->
                <div>
                        <P class="signup">Not account? <a href="signup">Sign up now</a> </P>
                </div>
            </form>
        </div>
    </div><!-- /.row -->

</main><!-- /.container -->

    <?php include_once 'views/includes/footer.php'?>
    <!-- JS Files -->
    <script src="assets/js/app.js"></script>
</body>
</html>
