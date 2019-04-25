<?php
    User::addSqlQuery('USER_LIST',
    'SELECT * FROM UTILISATEUR ORDER BY NOM');

    User::addSqlQuery('USER_GET_WITH_EMAIL',
    'SELECT * FROM UTILISATEUR WHERE ADRESSE_MAIL = :email');

    User::addSqlQuery('USER_CREATE',
    'INSERT INTO UTILISATEUR (NOM, PRENOM, ADRESSE_MAIL, TYPE, MOT_DE_PASSE, MATRICULE, MATIERE, PROMO)
    VALUES (:nom, :prenom, :email, :type, :password, :matricule, :subject, :promo)');

    User::addSqlQuery('USER_CONNECT',
    'SELECT * FROM UTILISATEUR WHERE ADRESSE_MAIL=:email AND MOT_DE_PASSE = :password');

    User::addSqlQuery('USER_IS_MAIL_USED',
    'SELECT COUNT(*) FROM UTILISATEUR WHERE ADRESSE_MAIL = :email');

    User::addSqlQuery('USER_IS_LOGIN_SUCCESS',
    'SELECT (MOT_DE_PASSE) FROM UTILISATEUR WHERE ADRESSE_MAIL = :email');
?>