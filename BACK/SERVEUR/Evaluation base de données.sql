Evaluation base de données Exo 1
Exercice 1 : La base exo1

CREATE DATABASE La base exo1
CREATE TABLE Client(
cli_num    Int NOT NULL ,
        cli_nom     Varchar (50) NOT NULL ,
        cli_adresse  Varchar (50) NOT NULL ,
        cli_tel     Varchar (30) NOT NULL,
    CONSTRAINT Client_PK PRIMARY KEY (cli_num)
);

CREATE TABLE Commande(
com_num INT NOT NULL,
cli_num INT NOT NULL,
com_date DATETIME NOT NULL,
com_obs Varchar(50)NOT NULL,
CONSTRAINT Commande_PK PRIMARY KEY (com_num),
CONSTRAINT Commande_Client_FK FOREIGN KEY (cli_num) REFERENCES client(cli_num)
);

CREATE TABLE Produit(
    pro_num INT NOT NULL,
    pro_libelle Varchar(50) NOT NULL,
    pro_description Varchar(50) NOT NULL,
    CONSTRAINT Produit_PK PRIMARY KEY (pro_num)
);

CREATE TABLE `est_compose` (
	`com_num` INT(11) NOT NULL,
	`pro_num` INT(11) NOT NULL,
	`est_qte` INT(11) NOT NULL,
	PRIMARY KEY (`com_num`, `pro_num`),
	INDEX `pro_num` (`pro_num`),
	INDEX `com_num` (`com_num`),
	CONSTRAINT `est_compose_ibfk_1` FOREIGN KEY (`com_num`) REFERENCES `commande` (`com_num`),
	CONSTRAINT `est_compose_ibfk_2` FOREIGN KEY (`pro_num`) REFERENCES `produit` (`pro_num`)
)

CREATE INDEX Mrrose ON Client (cli_nom);
SHOW INDEX from Client
