<!doctype html>
<html>
<head>

    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?>Erreur 404 - Page non trouvée</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 120px;
            color: #ff4c4c;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 24px;
            color: #555;
            margin-bottom: 30px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        a {
            text-decoration: underline;
            color: #ff4c4c;
            transition: color 0.3s;
            &:hover {
                color:rgb(255, 72, 0);
            }
        }
    </style>
</head>

<body>

    <?php include_once 'views/includes/header.php'?>

    <div class="container">
        <h1>404</h1>
        <h2>Oups ! La page que vous cherchez n'existe pas.</h2>
        <p>Il semble que vous soyez perdu dans notre site. Ne vous inquiétez pas, vous pouvez revenir à la <a href="/blog" class="button">page d'accueil</a> et continuer à explorer notre blog.</p>
        <p>Si vous avez des questions ou si vous avez trouvé un lien cassé, n'hésitez pas à nous contacter.</p>
    </div>
    <?php include_once 'views/includes/footer.php'?>

</body>
</html>
