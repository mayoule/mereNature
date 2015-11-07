CREATE TABLE IF NOT EXISTS inscrits (
  id_in int(10) NOT NULL AUTO_INCREMENT,
  nom varchar(60) NOT NULL,
  adresse varchar(160) COLLATE utf8_unicode_ci DEFAULT '',
  
  PRIMARY KEY (id_in)
);

CREATE TABLE IF NOT EXISTS competences (
  id_com int(10) NOT NULL AUTO_INCREMENT,
  nom varchar(60) NOT NULL,

  PRIMARY KEY (id_com)
);

CREATE TABLE IF NOT EXISTS inscrits_competences (
  idi  int(10) NOT NULL,
  idc  int(10) NOT NULL,

  PRIMARY KEY (idi,idc),
  FOREIGN KEY (idi) REFERENCES inscrits (id_in),
  FOREIGN KEY (idc) REFERENCES competences (id_com)
);

CREATE TABLE IF NOT EXISTS inscrits_interets (
  idi  int(10) NOT NULL,
  idint  int(10) NOT NULL,

  PRIMARY KEY (idi,idint),
  FOREIGN KEY (idi) REFERENCES inscrits (id_in),
  FOREIGN KEY (idint) REFERENCES competences (id_com)
);

CREATE TABLE IF NOT EXISTS projets (
  id_pro int(10) NOT NULL AUTO_INCREMENT,
  nom varchar(60) NOT NULL,
  adresse varchar(160) COLLATE utf8_unicode_ci DEFAULT '',
  description text,
  
  PRIMARY KEY (id_pro)
  );