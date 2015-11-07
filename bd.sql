CREATE TABLE IF NOT EXISTS inscrits (
  id_in int(10) NOT NULL AUTO_INCREMENT,
  nom varchar(60) NOT NULL,
  prenom varchar(60) NOT NULL,
  age int,
  adresse varchar(160) COLLATE utf8_unicode_ci DEFAULT '' NOT NULL,
  
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
  adresse varchar(160) COLLATE utf8_unicode_ci DEFAULT '' NOT NULL,
  description text,
  fond_actuel float,
  date_debut date NOT NULL,
  chef_de_projet varchar(60) NOT NULL,
  
  PRIMARY KEY (id_pro)
);


CREATE TABLE IF NOT EXISTS mots_projets (
  idm  int(10) NOT NULL,
  idp  int(10) NOT NULL,

  PRIMARY KEY (idm,idp),
  FOREIGN KEY (idm) REFERENCES competences (id_mot),
  FOREIGN KEY (idp) REFERENCES projets (id_pro)
);

CREATE TABLE IF NOT EXISTS competences_projets (
  idc  int(10) NOT NULL,
  idp  int(10) NOT NULL,

  PRIMARY KEY (idc,idp),
  FOREIGN KEY (idc) REFERENCES competences (id_com),
  FOREIGN KEY (idp) REFERENCES projets (id_pro)
);

CREATE TABLE IF NOT EXISTS inscrits_projets (
  idi  int(10) NOT NULL,
  idp  int(10) NOT NULL,

  PRIMARY KEY (idi,idp),
  FOREIGN KEY (idi) REFERENCES inscrits (id_in),
  FOREIGN KEY (idp) REFERENCES projets (id_pro)
);

CREATE TABLE IF NOT EXISTS groupes (
  id_gr int(10) NOT NULL AUTO_INCREMENT,
  nom varchar(60) NOT NULL,
  adresse varchar(160) COLLATE utf8_unicode_ci DEFAULT '',
  description text,
  createur varchar(60) NOT NULL,
  
  PRIMARY KEY (id_gr)
);

CREATE TABLE IF NOT EXISTS competences_groupes (
  idc  int(10) NOT NULL,
  idg  int(10) NOT NULL,

  PRIMARY KEY (idc,idg),
  FOREIGN KEY (idc) REFERENCES competences (id_com),
  FOREIGN KEY (idg) REFERENCES groupes (id_gr)
);

CREATE TABLE IF NOT EXISTS inscrits_groupes (
  idi  int(10) NOT NULL,
  idg  int(10) NOT NULL,

  PRIMARY KEY (idi,idg),
  FOREIGN KEY (idi) REFERENCES inscrits (id_in),
  FOREIGN KEY (idg) REFERENCES groupes (id_gr)
);

CREATE TABLE IF NOT EXISTS evenements (
  id_gr int(10) NOT NULL AUTO_INCREMENT,
  nom varchar(60) NOT NULL,
  adresse varchar(160) COLLATE utf8_unicode_ci DEFAULT '' NOT NULL,
  description text,
  date_debut date NOT NULL,
  
  PRIMARY KEY (id_gr)
);
