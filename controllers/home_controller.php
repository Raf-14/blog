<?php

include_once '_classes/Articles.php';
include_once '_classes/Category.php';

$allArticles = Articles::getAllArticles();
$allCategories = Category::getAllCategories();

$lastArticle = Articles::getLastArticle();
$lastArticleLeft = Articles::getLastArticle((1));
$lastArticleRight = Articles::getLastArticle((2));