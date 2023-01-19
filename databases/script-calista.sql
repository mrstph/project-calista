
#when data are inserted, we first need to delete all the foreign keys in odrer to drop the tables

#uncomment this field before executing the code if you want to delete tables. 

alter table Board drop constraint board_ibfk_1;
alter table List_app drop constraint list_app_ibfk_1;
alter table Card drop constraint card_ibfk_1;
alter table invite drop constraint invite_ibfk_1 ;
alter table invite drop constraint invite_ibfk_2;
alter table invite drop constraint invite_ibfk_3;
alter table invite drop constraint invite_ibfk_4;
alter table should_have drop constraint should_have_ibfk_1;
alter table should_have drop constraint should_have_ibfk_2;

drop table if exists User_app;
drop table if exists Board;
drop table if exists List_app;
drop table if exists Card;
drop table if exists Role_app;
drop table if exists Permission;
drop table if exists invite;
drop table if exists should_have;

CREATE TABLE User_app(
   id INT AUTO_INCREMENT,
   email_user_app VARCHAR(100),
   type_account_user_app VARCHAR(50),
   password_user_app VARCHAR(64),
   first_name_user_app VARCHAR(50),
   last_name_user_app VARCHAR(50),
   state_of_account_user_app BOOLEAN,
   color_user_app VARCHAR(50) DEFAULT 'blue',
   profile_picture_user_app VARCHAR(50),
   creation_date_user_app DATE,
   PRIMARY KEY(id)
);

CREATE TABLE Board(
   id INT auto_increment,
   name_board VARCHAR(200),
   creation_date_board DATETIME,
   position_board INT,
   color_board VARCHAR(50) DEFAULT 'blue',
   id_user_app INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_user_app) REFERENCES User_app(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE List_app(
   id INT auto_increment,
   name_list_app VARCHAR(200),
   position_list_app INT,
   creation_date_list_app DATE,
   id_board INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_board) REFERENCES Board(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Card(
   id INT auto_increment,
   name_card VARCHAR(200),
   position_card INT,
   starting_date_card DATE,
   content_card VARCHAR(2000),
   creation_date_card DATE,
   due_date_card DATE,
   color_card VARCHAR(50),
   id_list_app INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_list_app) REFERENCES List_app(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Role_app(
   id INT auto_increment,
   name_role_app VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE Permission(
   id INT auto_increment,
   name_permission VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE invite(
   id INT,
   id_1 INT,
   id_board INT,
   id_role_app INT,
   PRIMARY KEY(id, id_1, id_board, id_role_app),
   FOREIGN KEY(id) REFERENCES User_app(id) ON UPDATE CASCADE ON DELETE CASCADE,
   FOREIGN KEY(id_1) REFERENCES User_app(id) ON UPDATE CASCADE ON DELETE CASCADE,
   FOREIGN KEY(id_board) REFERENCES Board(id) ON UPDATE CASCADE ON DELETE CASCADE,
   FOREIGN KEY(id_role_app) REFERENCES Role_app(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE should_have(
   id INT,
   id_permission INT,
   PRIMARY KEY(id, id_permission),
   FOREIGN KEY(id) REFERENCES Role_app(id),
   FOREIGN KEY(id_permission) REFERENCES Permission(id) ON UPDATE CASCADE ON DELETE CASCADE
);

########################################################################################################################

#insert data into User_app

insert into User_app (email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, creation_date_user_app) values ('frodo.baggins@test.com', 'super-admin', '$2y$10$f4Ue8oN8ZpFALg6HPTMMeeTpK0WqoVJkYD.3rN.3J8q2pwv8ogyiO', 'Frodo', 'Baggins', false, 'blue', '2023-01-10');
insert into User_app (email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, creation_date_user_app) values ('james.bond@test.com', 'admin', '$2y$10$XnGgAJdn3WN12G/7Q5BIb.U62aRbLWueoeeRA0mEZgCo66K5DadQS', 'James', 'Bond', false, 'red', '2023-07-08');
insert into User_app (email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, creation_date_user_app) values ('leia.organa@test.com', 'admin', '$2y$10$l8otV9fz9K20Ni6dTfwMMu/jtBbayUFh8shEFie/St2pcnVQy4QES', 'Leia', 'Organa', false, 'red', '2023-01-20');

# insert data into Board

insert into Board (name_board, creation_date_board, position_board, color_board, id_user_app) values ("Détruire l'anneau", '2022-11-01', 2, 'red', 1);
insert into Board (name_board, creation_date_board, position_board, color_board, id_user_app) values ('Retour à la Comté', '2022-02-11', 3, 'orange', 1);
insert into Board (name_board, creation_date_board, position_board, color_board, id_user_app) values ('Missions hors MI6', '2022-03-01', 1, 'blue', 2);
insert into Board (name_board, creation_date_board, position_board, color_board, id_user_app) values ('Rébellion', '2022-03-01', 4, 'blue', 3);

# insert data into list_app

insert into List_app (name_list_app, position_list_app, creation_date_list_app, id_board) values ('A faire', 1, '2023-01-07', 1);
insert into List_app (name_list_app, position_list_app, creation_date_list_app, id_board) values ('En cours', 2, '2023-01-18', 1);
insert into List_app (name_list_app, position_list_app, creation_date_list_app, id_board) values ('Terminé', 3, '2023-01-07', 1);
insert into List_app (name_list_app, position_list_app, creation_date_list_app, id_board) values ('A faire', 4, '2023-01-07', 2);
insert into List_app (name_list_app, position_list_app, creation_date_list_app, id_board) values ('En cours', 5, '2023-01-18', 2);
insert into List_app (name_list_app, position_list_app, creation_date_list_app, id_board) values ('Terminé', 6, '2023-01-07', 2);
insert into List_app (name_list_app, position_list_app, creation_date_list_app, id_board) values ('A faire', 7, '2023-01-07', 3);
insert into List_app (name_list_app, position_list_app, creation_date_list_app, id_board) values ('En cours', 8, '2023-01-18', 3);
insert into List_app (name_list_app, position_list_app, creation_date_list_app, id_board) values ('Terminé', 9, '2023-01-07', 3);
insert into List_app (name_list_app, position_list_app, creation_date_list_app, id_board) values ('A faire', 10, '2023-01-07', 4);
insert into List_app (name_list_app, position_list_app, creation_date_list_app, id_board) values ('En cours', 11, '2023-01-18', 4);
insert into List_app (name_list_app, position_list_app, creation_date_list_app, id_board) values ('Terminé', 12, '2023-01-07', 4);

#inserting data into Card

insert into Card (name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values ('Arroser les plantes de Bilbo', 2, '2023-01-20', '', '2023-01-09', '2023-02-24', 'orange', 3);
insert into Card (name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values ('Aller à Fondcombe', 3, '2023-01-21', 'Voir les elfes !', '2023-01-09', '2023-02-24', 'blue', 3);
insert into Card (name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values ('Préparer le voyage vers le Mordor', 3, '2023-01-21', 'Faire le plein de Lembas, se reposer', '2023-01-09', '2023-02-24', 'blue', 3);
insert into Card (name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values ('Trouver un moyen de locomotion pour le Mordor', 4, '2023-01-21', "Peut être qu'un aigle ferait l'affaire ? Y aller à pied semble lointain...", '2023-01-09', '2023-02-24', 'blue', 1);
insert into Card (name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values ("Se débarasser de l'anneau", 5, '2023-01-21', "Et retourner à la Comté.", '2023-01-09', '2023-02-24', 'blue', 1);
/*
#inserting data into Role_app

insert into Role_app (name_role_app) values ('observer');

insert into Role_app (id_role_app, name_role_app) values (2, 'member');

#inserting data into Permission

insert into Permission (name_permission) values ('create');

insert into Permission (id_permission, name_permission) values (2, 'read');

#inserting data into invite

insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (1, 1, 1, 1);

#inserting data into should_have

insert into should_have (id_role_app, id_permission) values (2, 1);
*/