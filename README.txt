squelette de framework 

environnement de travail avec des configurations, des bonnes pratiques et une structure solide pour un projet PHP

Mis en place jusqu'à présent :
    Configuration centralisée : La gestion des erreurs, des sessions, des constantes et des informations de connexion à la 
        base de données est proprement définie dans des fichiers séparés.
    Structures modulaires :Utilisation d'une structure de répertoires pour séparer les contrôleurs, les modèles et les vues. 
       approche typique des frameworks modernes comme MVC (Model-View-Controller).
    Bonnes pratiques :Prise soin de la sécurité (comme la gestion des sessions et des informations sensibles), des performances 
        (comme la gestion des erreurs en fonction de l'environnement), et de la modularité (comme l'inclusion de fichiers de manière sécurisée).


Ce qui  manque pour avoir un framework complet :
    Gestion des routes : Un composant pour diriger les requêtes vers les bons contrôleurs selon l'URL.
    Autoloading des classes : Un système d'automatisation pour charger les classes sans avoir besoin de les inclure manuellement.
    Système de base de données : Un ORM pour interagir avec la base de données, ou un système de requêtes SQL abstraites.
    Gestion des formulaires et de la validation : Un système pour gérer les formulaires de manière sécurisée et centralisée.
    Composants pour la gestion de la sécurité : Comme des mécanismes CSRF, gestion des sessions et des tokens de manière plus avancée.