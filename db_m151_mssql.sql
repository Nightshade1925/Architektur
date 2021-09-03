CREATE TABLE tbl_firma(
	id_firma INT IDENTITY(1,1) PRIMARY KEY,
	abteilungsname VARCHAR(255) NOT NULL
);

CREATE TABLE tbl_abteilung(
	id_abteilung INT IDENTITY(1,1) PRIMARY KEY,
	abteilungsname VARCHAR(255) NOT NULL
);

CREATE TABLE tbl_telefon(
	id_telefon INT IDENTITY(1,1) PRIMARY KEY,
	telefonnummer VARCHAR(255) NOT NULL
);

CREATE TABLE tbl_email(
	id_email INT IDENTITY(1,1) PRIMARY KEY,
	email VARCHAR(255) NOT NULL
);

CREATE TABLE tbl_beruf(
	id_beruf INT IDENTITY(1,1) PRIMARY KEY,
	berufsbezeichnung VARCHAR(255) NOT NULL,
	beschreibung VARCHAR(255) NOT NULL
);

CREATE TABLE tbl_person(
	id_person INT IDENTITY(1,1) PRIMARY KEY,
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
	id_log INT IDENTITY(1,1) PRIMARY KEY,
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


CREATE TRIGGER personen_log_insert
ON tbl_person
AFTER INSERT
AS
BEGIN
    INSERT INTO tbl_log_person
	SELECT
		'inserted',
		i.vorname,
		i.nachname,
		i.geburtsdatum,
		i.ahv_nr,
		i.personal_nr,
		i.fk_firma,
		i.fk_abteilung,
		i.fk_telefon,
		i.fk_email,
		i.fk_beruf,
		GETDATE()
	FROM inserted AS i
END

CREATE TRIGGER personen_log_delete
ON tbl_person
AFTER DELETE
AS
BEGIN
    INSERT INTO tbl_log_person
	SELECT
		'delete',
		i.vorname,
		i.nachname,
		i.geburtsdatum,
		i.ahv_nr,
		i.personal_nr,
		i.fk_firma,
		i.fk_abteilung,
		i.fk_telefon,
		i.fk_email,
		i.fk_beruf,
		GETDATE()
	FROM deleted AS i
END

CREATE TRIGGER personen_log_update
ON tbl_person
AFTER DELETE
AS
BEGIN
	INSERT INTO tbl_log_person
	SELECT
		'updated',
		i.vorname,
		i.nachname,
		i.geburtsdatum,
		i.ahv_nr,
		i.personal_nr,
		i.fk_firma,
		i.fk_abteilung,
		i.fk_telefon,
		i.fk_email,
		i.fk_beruf,
		GETDATE()
	FROM inserted AS i
    INSERT INTO tbl_log_person
	SELECT
		'updated',
		i.vorname,
		i.nachname,
		i.geburtsdatum,
		i.ahv_nr,
		i.personal_nr,
		i.fk_firma,
		i.fk_abteilung,
		i.fk_telefon,
		i.fk_email,
		i.fk_beruf,
		GETDATE()
	FROM deleted AS i
END