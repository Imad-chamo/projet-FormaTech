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
    abréviation VARCHAR(255),
    RNCP_niveau INT,
    is_public BOOLEAN
);

CREATE TABLE modules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    durée INT,
    formation_id INT UNSIGNED,
    FOREIGN KEY (formation_id) REFERENCES formations(id)
);




