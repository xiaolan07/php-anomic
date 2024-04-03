CREATE TABLE article (id INTEGER PRIMARY KEY, title TEXT, closed NUMERIC, content TEXT);
CREATE TABLE comment (id INTEGER PRIMARY KEY, id_article NUMERIC, title TEXT, id_user NUMERIC, content TEXT);
CREATE TABLE user (id INTEGER PRIMARY KEY, login TEXT, name TEXT, password TEXT, url TEXT);
