<?php

class Category
{
    public $id;
    public $name;
    public $slug; // Pour une URL plus propre
    public $description;
    public $image; // Image associée à la catégorie

    /**
     * Category constructor.
     * @param int $id
     */
    function __construct($id) {
        global $db;

        // Sécurisation de l'ID
        $id = (int) $id; // Cast en entier pour éviter les injections

        // Requête pour récupérer les données de la catégorie
        $reqCategory = $db->prepare('
            SELECT * 
            FROM categories
            WHERE id = ?
        ');
        $reqCategory->execute([$id]);
        $data = $reqCategory->fetch();

        // Remplissage des propriétés de l'objet
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->slug = $data['slug'];
        $this->description = $data['description'];
        $this->image = $data['image']; // Image de la catégorie
    }

    /**
     * Récupère toutes les catégories.
     * @return array
     */
    static function getAllCategories() {
        global $db;

        // Requête pour récupérer toutes les catégories
        $reqCategories = $db->prepare('
            SELECT * 
            FROM categories
        ');
        $reqCategories->execute();
        return $reqCategories->fetchAll();
    }

    /**
     * Récupère l'URL complète de l'image de la catégorie.
     * @param string $baseUrl
     * @return string
     */
    public function getImageUrl($baseUrl) {
        return $baseUrl . 'images/categories/' . $this->image;
    }
}

// // Exemple de récupération de la catégorie
// $category = new Category(1); // Récupère la catégorie avec l'ID 1

// // Affichage de l'image
// $imageUrl = $category->getImageUrl('/path/to/'); // Remplace '/path/to/' par le chemin de base
// echo '<img src="' . $imageUrl . '" alt="' . $category->name . '" />';

