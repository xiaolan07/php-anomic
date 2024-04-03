BEGIN TRANSACTION;
INSERT INTO article VALUES(1,'Premier', 1,'Premier message, sans commentaire.');
INSERT INTO article VALUES(2,'Second', 0,'Second message, avec des commentaires.');
INSERT INTO comment VALUES(1,2,'Commentaire initial !',1,'Un commentaire pour tester. FG.');
INSERT INTO comment VALUES(2,2,'Nouveau commentaire',1,'...écrit en ligne.');
INSERT INTO comment VALUES(3,2,'Commentaire !!!',2,'Tralala...');
INSERT INTO user VALUES(1,'francois','François','mdp','http://fr.php.net');
INSERT INTO user VALUES(2,'moi','Moi même','moi','http://localhost/');
COMMIT;
