-- Table des auteurs (authors) avec image
CREATE TABLE authors (
  id INT PRIMARY KEY AUTO_INCREMENT,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  phone CHAR(55),
  address VARCHAR(255),
  image VARCHAR(255), -- Chemin de l'image (par exemple 'images/authors/author1.jpg')
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Date de création
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Date de mise à jour
);

-- Table des livres (books)
CREATE TABLE books (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  biography TEXT,
  author_id INT NOT NULL,
  publication_date DATE, -- Date de publication
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Date de création
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Date de mise à jour
  FOREIGN KEY (author_id) REFERENCES authors(id) ON DELETE CASCADE -- Clé étrangère vers authors
);

-- Table des catégories (categories)
CREATE TABLE categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  slug VARCHAR(255) NOT NULL UNIQUE, -- Permet un URL plus facile (SEO)
  description TEXT, -- Description de la catégorie
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Date de création
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Date de mise à jour
);

-- Table des articles (articles) avec image
CREATE TABLE articles (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  sentence VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  date DATETIME DEFAULT CURRENT_TIMESTAMP, -- Date de publication (par défaut actuelle)
  status ENUM('draft', 'published', 'archived') DEFAULT 'draft', -- Statut de l'article
  author_id INT NOT NULL,
  category_id INT NOT NULL,
  image VARCHAR(255), -- Chemin de l'image associée à l'article (par exemple 'images/articles/article1.jpg')
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Date de création
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Date de mise à jour
  FOREIGN KEY (author_id) REFERENCES authors(id) ON DELETE CASCADE, -- Clé étrangère vers authors
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE -- Clé étrangère vers categories
);
