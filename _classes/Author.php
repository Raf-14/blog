<?php

class Author
{
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $address;
    public $image; // Image de l'auteur

    /**
     * Author constructor.
     * @param int $id
     */
    function __construct($id) {
        global $db;

        // Sécurisation de l'ID
        $id = (int) $id; // Cast en entier pour éviter les injections

        // Requête pour récupérer les données de l'auteur
        $reqAuthor = $db->prepare('
            SELECT * 
            FROM authors
            WHERE id = ?
        ');
        $reqAuthor->execute([$id]);
        $data = $reqAuthor->fetch();

        // Remplissage des propriétés de l'objet
        $this->id = $data['id'];
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->address = $data['address'];
        $this->image = $data['image']; // Image de l'auteur
    }

    /**
     * Récupère tous les auteurs.
     * @return array
     */
    static function getAllAuthors() {
        global $db;

        // Requête pour récupérer tous les auteurs
        $reqAuthors = $db->prepare('
            SELECT * 
            FROM authors
        ');
        $reqAuthors->execute();
        return $reqAuthors->fetchAll();
    }

    /**
     * Récupère l'URL complète de l'image de l'auteur.
     * @param string $baseUrl
     * @return string
     */
    public function getImageUrl($baseUrl) {
        return $baseUrl . 'images/authors/' . $this->image;
    }
}

// // Exemple de récupération de l'auteur
// $author = new Author(1); // Récupère l'auteur avec l'ID 1

// // Affichage de l'image
// $imageUrl = $author->getImageUrl('/path/to/'); // Remplace '/path/to/' par le chemin de base
// echo '<img src="' . $imageUrl . '" alt="' . $author->firstname . ' ' . $author->lastname . '" />';
