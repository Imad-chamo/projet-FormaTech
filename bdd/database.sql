CREATE TABLE employees  (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prénom  VARCHAR(155),
    nom VARCHAR(255),
    poste VARCHAR(255),
    email VARCHAR(100) UNIQUE
);

CREATE TABLE formations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    duree INT,
    abreviation VARCHAR(255),
    RNCP_niveau INT,
    is_public BOOLEAN
);

CREATE TABLE modules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    duree INT,
    formation_id INT UNSIGNED,
    FOREIGN KEY (formation_id) REFERENCES formations(id)
);

CREATE TABLE promotions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    formation_id INT,
    year INT,
    start_date DATE,
    end_date DATE,
    FOREIGN KEY (formation_id) REFERENCES formations(id)
);

CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    birth_date DATE,
    email VARCHAR(255) UNIQUE,
    promotion_id INT,
    FOREIGN KEY (promotion_id) REFERENCES promotions(id)
);



