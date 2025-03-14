<?php

class Articles
{
    public $id;
    public $title;
    public $sentence;
    public $content;
    public $date;
    public $author;
    public $category;
    public $image; // Champ pour l'image

    /**
     * Articles constructor.
     * @param int $id
     */
    function __construct($id) {
        global $db;

        // Sécurisation de l'ID
        $id = (int) $id; // Cast en entier pour éviter les injections

        // Requête pour récupérer les données de l'article
        $reqArticle = $db->prepare('
            SELECT a.*, au.firstname, au.lastname, c.name AS category, a.image AS article_image
            FROM articles a 
            INNER JOIN authors au ON au.id = a.author_id
            INNER JOIN categories c ON c.id = a.category_id
            WHERE a.id = ?
        ');
        $reqArticle->execute([$id]);
        $data = $reqArticle->fetch();

        // Remplissage des propriétés de l'objet
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->sentence = $data['sentence'];
        $this->content = $data['content'];
        $this->date = $data['date'];
        $this->author = $data['firstname'] . ' ' . $data['lastname'];
        $this->category = $data['category'];
        $this->image = $data['article_image']; // Image de l'article
    }

    /**
     * Envoie tous les articles
     * @return array
     */
    static function getAllArticles() {
        global $db;

        // Requête pour récupérer tous les articles
        $reqArticles = $db->prepare('
            SELECT a.*, au.firstname, au.lastname, c.name AS category, a.image AS article_image
            FROM articles a 
            INNER JOIN authors au ON au.id = a.author_id
            INNER JOIN categories c ON c.id = a.category_id
        ');
        $reqArticles->execute();
        return $reqArticles->fetchAll();
    }

    /**
     * Envoie le dernier article, optionnellement filtré par catégorie
     * @param string|null $category
     * @return array
     */
    static function getLastArticle($category = null) {
        global $db;

        // Si une catégorie est précisée, filtre par catégorie
        if ($category === null) {
            $reqArticle = $db->prepare('
                SELECT a.*, au.firstname, au.lastname, c.name AS category, a.image AS article_image
                FROM articles a 
                INNER JOIN authors au ON au.id = a.author_id
                INNER JOIN categories c ON c.id = a.category_id
                ORDER BY a.id DESC
                LIMIT 1
            ');
            $reqArticle->execute();
        } else {
            // Sécurisation de la catégorie
            $category = (int) $category; // Cast en entier pour éviter injection
            $reqArticle = $db->prepare('
                SELECT a.*, au.firstname, au.lastname, c.name AS category, a.image AS article_image
                FROM articles a 
                INNER JOIN authors au ON au.id = a.author_id
                INNER JOIN categories c ON c.id = a.category_id
                WHERE c.id = ?
                ORDER BY a.id DESC
                LIMIT 1
            ');
            $reqArticle->execute([$category]);
        }

        return $reqArticle->fetch();
    }

    /**
     * Récupère l'URL complète de l'image associée à l'article.
     * @param string $baseUrl
     * @return string
     */
    public function getImageUrl($baseUrl) {
        return $baseUrl . 'images/articles/' . $this->image;
    }
}

/// Exemple de récupération de l'article
// $article = new Articles(1); // Récupère l'article avec l'ID 1

// // Affichage de l'image
// $imageUrl = $article->getImageUrl('/path/to/'); // Remplace '/path/to/' par le chemin de base
// echo '<img src="' . $imageUrl . '" alt="' . $article->title . '" />';


 ?>