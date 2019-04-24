
DROP DATABASE IF EXISTS macdoh;
CREATE DATABASE IF NOT EXISTS macdoh;
USE macdoh;
DROP TABLE IF EXISTS produit;
DROP TABLE IF EXISTS utilisatrice;
DROP TABLE IF EXISTS etape;
DROP TABLE IF EXISTS recette;
DROP TABLE IF EXISTS zonegeo;
DROP TABLE IF EXISTS adresse;
DROP TABLE IF EXISTS unite;
DROP TABLE IF EXISTS lieu;
DROP TABLE IF EXISTS ingredient;
DROP TABLE IF EXISTS contenir;
DROP TABLE IF EXISTS composer;
DROP TABLE IF EXISTS utiliser;
DROP TABLE IF EXISTS recourir;
DROP TABLE IF EXISTS fabriquer;
#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: produit
#------------------------------------------------------------

CREATE TABLE produit(
        nomP       Varchar (100) NOT NULL ,
        quantiteP  Float ,
        dateP      Date ,
        lieuP      Varchar (100) ,
        categorieP Varchar (100) ,
        nomUN      Varchar (100) ,
        lattitudeL Double ,
        longitudeL Double ,
        PRIMARY KEY (nomP )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisatrice
#------------------------------------------------------------

CREATE TABLE utilisatrice(
        NomU         Varchar (100) NOT NULL ,
        PrenomU      Varchar (100) ,
        NaissanceU   Date ,
        genreU       Varchar (100) ,
        emailU       Varchar (100) ,
        inscriptionU Date ,
        lattitudeL   Double ,
        longitudeL   Double ,
        PRIMARY KEY (NomU )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: étape
#------------------------------------------------------------

CREATE TABLE etape(
        numeroE       Integer NOT NULL ,
        instructionE  Varchar (100) ,
        nomustensileE Varchar (100) ,
        PRIMARY KEY (numeroE )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: recette
#------------------------------------------------------------

CREATE TABLE recette(
        titreR           Varchar (100) NOT NULL ,
        categorieR       Varchar (100) ,
        nombrepersonnesR Integer ,
        descriptionR     Varchar (100) ,
        dateprop         Date ,
        NomU             Varchar (100) ,
        PRIMARY KEY (titreR )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: zonegéo
#------------------------------------------------------------

CREATE TABLE zonegeo(
        continentZ Varchar (100) ,
        paysZ      Varchar (100) ,
        lattitudeL Double NOT NULL ,
        longitudeL Double NOT NULL ,
        PRIMARY KEY (lattitudeL ,longitudeL )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: adresse
#------------------------------------------------------------

CREATE TABLE adresse(
        villeA      Varchar (100) ,
        numerovoieA Integer ,
        voieA       Varchar (100) ,
        codepostalA Integer ,
        paysA       Varchar (100) ,
        lattitudeL  Double NOT NULL ,
        longitudeL  Double NOT NULL ,
        PRIMARY KEY (lattitudeL ,longitudeL )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: unité
#------------------------------------------------------------

CREATE TABLE unite(
        nomUN         Varchar (100) NOT NULL ,
        abreviationUN Varchar (100) ,
        PRIMARY KEY (nomUN )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: lieu
#------------------------------------------------------------

CREATE TABLE lieu(
        lattitudeL Double NOT NULL ,
        longitudeL Double NOT NULL ,
        PRIMARY KEY (lattitudeL ,longitudeL )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ingrédient
#------------------------------------------------------------

CREATE TABLE ingredient(
        nomI           Varchar (100) NOT NULL ,
        categorieI     Varchar (100) ,
        dateI          Date ,
        lieuI          Varchar (100) ,
        quantiteStockI Float ,
        lattitudeL     Double ,
        longitudeL     Double ,
        nomUN          Varchar (100) ,
        PRIMARY KEY (nomI )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contenir
#------------------------------------------------------------

CREATE TABLE contenir(
        nomI Varchar (100) NOT NULL ,
        nomP Varchar (100) NOT NULL ,
        PRIMARY KEY (nomI ,nomP )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: composer
#------------------------------------------------------------

CREATE TABLE composer(
        IngredientConcerne Varchar (100) NOT NULL ,
		OrdreE             Integer ,
        titreR             Varchar (100) NOT NULL ,
        numeroE            Integer NOT NULL ,
        PRIMARY KEY (titreR ,numeroE,IngredientConcerne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utiliser
#------------------------------------------------------------

CREATE TABLE utiliser(
        quantiteIngredient Float ,
        nomI               Varchar (100) NOT NULL ,
        titreR             Varchar (100) NOT NULL ,
        PRIMARY KEY (nomI ,titreR )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: recourir
#------------------------------------------------------------

CREATE TABLE recourir(
        quantiteProduit Float ,
        titreR          Varchar (100) NOT NULL ,
        nomP            Varchar (100) NOT NULL ,
        PRIMARY KEY (titreR ,nomP )
)ENGINE=InnoDB;

ALTER TABLE produit ADD CONSTRAINT FK_produit_nomUN FOREIGN KEY (nomUN) REFERENCES unite(nomUN);
ALTER TABLE produit ADD CONSTRAINT FK_produit_lattitudeL FOREIGN KEY (lattitudeL) REFERENCES lieu(lattitudeL);
ALTER TABLE produit ADD CONSTRAINT FK_produit_longitudeL FOREIGN KEY (longitudeL) REFERENCES lieu(longitudeL);
ALTER TABLE utilisatrice ADD CONSTRAINT FK_utilisatrice_lattitudeL FOREIGN KEY (lattitudeL) REFERENCES lieu(lattitudeL);
ALTER TABLE utilisatrice ADD CONSTRAINT FK_utilisatrice_longitudeL FOREIGN KEY (longitudeL) REFERENCES lieu(longitudeL);
ALTER TABLE recette ADD CONSTRAINT FK_recette_NomU FOREIGN KEY (NomU) REFERENCES utilisatrice(NomU);
ALTER TABLE zonegeo ADD CONSTRAINT FK_zonegeo_lattitudeL FOREIGN KEY (lattitudeL) REFERENCES lieu(lattitudeL);
ALTER TABLE zonegeo ADD CONSTRAINT FK_zonegeo_longitudeL FOREIGN KEY (longitudeL) REFERENCES lieu(longitudeL);
ALTER TABLE adresse ADD CONSTRAINT FK_adresse_lattitudeL FOREIGN KEY (lattitudeL) REFERENCES lieu(lattitudeL);
ALTER TABLE adresse ADD CONSTRAINT FK_adresse_longitudeL FOREIGN KEY (longitudeL) REFERENCES lieu(longitudeL);
ALTER TABLE ingredient ADD CONSTRAINT FK_ingredient_lattitudeL FOREIGN KEY (lattitudeL) REFERENCES lieu(lattitudeL);
ALTER TABLE ingredient ADD CONSTRAINT FK_ingredient_longitudeL FOREIGN KEY (longitudeL) REFERENCES lieu(longitudeL);
ALTER TABLE ingredient ADD CONSTRAINT FK_ingredient_nomUN FOREIGN KEY (nomUN) REFERENCES unite(nomUN);
ALTER TABLE contenir ADD CONSTRAINT FK_contenir_nomI FOREIGN KEY (nomI) REFERENCES ingredient(nomI);
ALTER TABLE contenir ADD CONSTRAINT FK_contenir_nomP FOREIGN KEY (nomP) REFERENCES produit(nomP);
ALTER TABLE composer ADD CONSTRAINT FK_composer_titreR FOREIGN KEY (titreR) REFERENCES recette(titreR);
ALTER TABLE composer ADD CONSTRAINT FK_composer_numeroE FOREIGN KEY (numeroE) REFERENCES etape(numeroE);
ALTER TABLE utiliser ADD CONSTRAINT FK_utiliser_nomI FOREIGN KEY (nomI) REFERENCES ingredient(nomI);
ALTER TABLE utiliser ADD CONSTRAINT FK_utiliser_titreR FOREIGN KEY (titreR) REFERENCES recette(titreR);
ALTER TABLE recourir ADD CONSTRAINT FK_recourir_titreR FOREIGN KEY (titreR) REFERENCES recette(titreR);
ALTER TABLE recourir ADD CONSTRAINT FK_recourir_nomP FOREIGN KEY (nomP) REFERENCES produit(nomP);
