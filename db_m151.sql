DROP DATABASE IF EXISTS db_m151;
CREATE DATABASE db_m151;
USE db_m151;

CREATE TABLE tbl_firma(
	id_firma INT AUTO_INCREMENT PRIMARY KEY,
	abteilungsname VARCHAR(255) NOT NULL
);

CREATE TABLE tbl_abteilung(
	id_abteilung INT AUTO_INCREMENT PRIMARY KEY,
	abteilungsname VARCHAR(255) NOT NULL
);

CREATE TABLE tbl_telefon(
	id_telefon INT AUTO_INCREMENT PRIMARY KEY,
	telefonnummer VARCHAR(255) NOT NULL
);

CREATE TABLE tbl_email(
	id_email INT AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(255) NOT NULL
);

CREATE TABLE tbl_beruf(
	id_beruf INT AUTO_INCREMENT PRIMARY KEY,
	berufsbezeichnung VARCHAR(255) NOT NULL,
	beschreibung VARCHAR(255) NOT NULL
);

CREATE TABLE tbl_person(
	id_person INT AUTO_INCREMENT PRIMARY KEY,
	vorname VARCHAR(255) NOT NULL,
	nachname VARCHAR(255) NOT NULL,
	geburtsdatum DATE NOT NULL,
	ahv_nr VARCHAR(255) NOT NULL,
	personal_nr INT NOT NULL,
	fk_firma INT NOT NULL,
	fk_abteilung INT NOT NULL,
	fk_telefon INT,
	fk_email INT,
	fk_beruf INT NOT NULL,
	CONSTRAINT fk_personfirma FOREIGN KEY (fk_firma) REFERENCES tbl_firma(id_firma),
	CONSTRAINT fk_personabteilung FOREIGN KEY (fk_abteilung) REFERENCES tbl_abteilung(id_abteilung),
	CONSTRAINT fk_persontelefon FOREIGN KEY (fk_telefon) REFERENCES tbl_telefon(id_telefon),
	CONSTRAINT fk_personemail FOREIGN KEY (fk_email) REFERENCES tbl_email(id_email),
	CONSTRAINT fk_personberuf FOREIGN KEY (fk_beruf) REFERENCES tbl_beruf(id_beruf)
);


CREATE TABLE tbl_log_person(
	id_log INT AUTO_INCREMENT PRIMARY KEY,
	action VARCHAR(255) NOT NULL,
	vorname VARCHAR(255) NOT NULL,
	nachname VARCHAR(255) NOT NULL,
	geburtsdatum DATE NOT NULL,
	ahv_nr VARCHAR(255) NOT NULL,
	personal_nr INT NOT NULL,
	fk_firma INT NOT NULL,
	fk_abteilung INT NOT NULL,
	fk_telefon INT,
	fk_email INT,
	fk_beruf INT NOT NULL,
	changedat DATETIME NOT NULL
);


DELIMITER $$
CREATE TRIGGER personen_log_insert
    AFTER INSERT ON tbl_person
    FOR EACH ROW 
BEGIN
    INSERT INTO tbl_log_person
    SET action = 'insert',
	vorname = new.vorname,
	nachname = new.nachname,
	geburtsdatum = new.geburtsdatum,
	ahv_nr = new.ahv_nr,
	personal_nr = new.personal_nr,
	fk_firma = new.fk_firma,
	fk_abteilung = new.fk_abteilung,
	fk_telefon = new.fk_telefon,
	fk_email = new.fk_email,
	fk_beruf = new.fk_beruf,
	changedat = NOW(); 
END$$

CREATE TRIGGER personen_log_update
    AFTER UPDATE ON tbl_person
    FOR EACH ROW 
BEGIN
    INSERT INTO tbl_log_person
    SET action = 'update',
	vorname = new.vorname,
	nachname = new.nachname,
	geburtsdatum = new.geburtsdatum,
	ahv_nr = new.ahv_nr,
	personal_nr = new.personal_nr,
	fk_firma = new.fk_firma,
	fk_abteilung = new.fk_abteilung,
	fk_telefon = new.fk_telefon,
	fk_email = new.fk_email,
	fk_beruf = new.fk_beruf,
	changedat = NOW(); 
END$$

CREATE TRIGGER personen_log_delete
    BEFORE DELETE ON tbl_person
    FOR EACH ROW 
BEGIN
    INSERT INTO tbl_log_person
    SET action = 'delete',
	vorname = OLD.vorname,
	nachname = OLD.nachname,
	geburtsdatum = OLD.geburtsdatum,
	ahv_nr = OLD.ahv_nr,
	personal_nr = OLD.personal_nr,
	fk_firma = OLD.fk_firma,
	fk_abteilung = OLD.fk_abteilung,
	fk_telefon = OLD.fk_telefon,
	fk_email = OLD.fk_email,
	fk_beruf = OLD.fk_beruf,
	changedat = NOW(); 
END$$

DELIMITER ;