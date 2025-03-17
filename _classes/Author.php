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
     * Ajouter un auteur à la base de données
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $phone
     * @param string $address
     * @param string $image
     * @return bool
     */
    public static function addAuthor($firstname, $lastname, $email, $phone, $address, $image) {
        global $db;

        // Préparation de la requête d'insertion
        $query = $db->prepare('
            INSERT INTO authors (firstname, lastname, email, phone, address, image)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        // Exécution de la requête
        return $query->execute([$firstname, $lastname, $email, $phone, $address, $image]);
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
     * Récupérer un auteur par son ID.
     * @param int $id
     * @return Author
     */
    public static function getAuthorById($id) {
        return new self($id); // Utilisation du constructeur pour récupérer un auteur par son ID
    }

    /**
     * Mettre à jour les informations d'un auteur.
     * @param int $id
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $phone
     * @param string $address
     * @param string $image
     * @return bool
     */
    public static function updateAuthor($id, $firstname, $lastname, $email, $phone, $address, $image) {
        global $db;

        // Préparation de la requête de mise à jour
        $req = $db->prepare('
            UPDATE authors
            SET firstname = ?, lastname = ?, email = ?, phone = ?, address = ?, image = ?
            WHERE id = ?
        ');

        // Exécution de la requête
        return $req->execute([$firstname, $lastname, $email, $phone, $address, $image, $id]);
    }


    /**
     * Récupère l'URL complète de l'image de l'auteur.
     * @param string $baseUrl
     * @return string
     */
    public function getImageUrl($baseUrl) {
        return $baseUrl . 'images/authors/' . $this->image;
    }
    /**
     * Supprimer un auteur de la base de données.
     * @param int $id
     * @return bool
     */
    public static function deleteAuthor($id) {
        global $db;

        // Préparation de la requête de suppression
        $req = $db->prepare('
            DELETE FROM authors
            WHERE id = ?
        ');

        // Exécution de la requête
        return $req->execute([$id]);
    }

}

// // Exemple de récupération de l'auteur
// $author = new Author(1); // Récupère l'auteur avec l'ID 1

// // Affichage de l'image
// $imageUrl = $author->getImageUrl('/path/to/'); // Remplace '/path/to/' par le chemin de base
// echo '<img src="' . $imageUrl . '" alt="' . $author->firstname . ' ' . $author->lastname . '" />';
