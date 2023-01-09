/*
#when data are inserted, we first need to delete all the foreign keys in odrer to drop the tables

#uncomment this field before executing the code if you want to delete tables. 

alter table board drop constraint board_ibfk_1;
alter table List_app drop constraint list_app_ibfk_1;
alter table card drop constraint card_ibfk_1;
alter table invite drop constraint invite_ibfk_1 ;
alter table invite drop constraint invite_ibfk_2;
alter table invite drop constraint invite_ibfk_3;
alter table invite drop constraint invite_ibfk_4;
alter table should_have drop constraint should_have_ibfk_1;
alter table should_have drop constraint should_have_ibfk_2;
*/

drop table if exists User_app;
drop table if exists Board;
drop table if exists List_app;
drop table if exists Card;
drop table if exists Role_app;
drop table if exists Permission;
drop table if exists invite;
drop table if exists should_have;




CREATE TABLE User_app(
   id_user_app INT AUTO_INCREMENT,
   email_user_app VARCHAR(100),
   type_account_user_app VARCHAR(50),
   password_user_app VARCHAR(64),
   first_name_user_app VARCHAR(50),
   last_name_user_app VARCHAR(50),
   state_of_account_user_app BOOLEAN,
   color_user_app VARCHAR(50),
   profile_picture_user_app VARCHAR(50),
   creation_date_user_app DATE,
   PRIMARY KEY(id_user_app)
);

CREATE TABLE Board(
   id_board INT auto_increment,
   name_board VARCHAR(50),
   creation_date_board DATETIME,
   position_board INT,
   color_board VARCHAR(50),
   id_user_app INT NOT NULL,
   PRIMARY KEY(id_board),
   FOREIGN KEY(id_user_app) REFERENCES User_app(id_user_app)
);

CREATE TABLE List_app(
   id_list_app INT auto_increment,
   name_list_app VARCHAR(50),
   position_list_app INT,
   creation_date_list_app DATE,
   id_board INT NOT NULL,
   PRIMARY KEY(id_list_app),
   FOREIGN KEY(id_board) REFERENCES Board(id_board)
);

CREATE TABLE Card(
   id_card INT auto_increment,
   name_card VARCHAR(50),
   position_card INT,
   starting_date_card DATE,
   content_card VARCHAR(2000),
   creation_date_card DATE,
   due_date_card DATE,
   color_card VARCHAR(50),
   id_list_app INT NOT NULL,
   PRIMARY KEY(id_card),
   FOREIGN KEY(id_list_app) REFERENCES List_app(id_list_app)
);

CREATE TABLE Role_app(
   id_role_app INT auto_increment,
   name_role_app VARCHAR(50),
   PRIMARY KEY(id_role_app)
);

CREATE TABLE Permission(
   id_permission INT auto_increment,
   name_permission VARCHAR(50),
   PRIMARY KEY(id_permission)
);

CREATE TABLE invite(
   id_user_app INT,
   id_user_app_1 INT,
   id_board INT,
   id_role_app INT,
   PRIMARY KEY(id_user_app, id_user_app_1, id_board, id_role_app),
   FOREIGN KEY(id_user_app) REFERENCES User_app(id_user_app),
   FOREIGN KEY(id_user_app_1) REFERENCES User_app(id_user_app),
   FOREIGN KEY(id_board) REFERENCES Board(id_board),
   FOREIGN KEY(id_role_app) REFERENCES Role_app(id_role_app)
);

CREATE TABLE should_have(
   id_role_app INT,
   id_permission INT,
   PRIMARY KEY(id_role_app, id_permission),
   FOREIGN KEY(id_role_app) REFERENCES Role_app(id_role_app),
   FOREIGN KEY(id_permission) REFERENCES Permission(id_permission)
);

#insert data into User_app

/* insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (1, 'bmainstone0@weibo.com', 'admin', 'c1a8da2f18d78d0e12278a724ca6adb1119e53dcbfb16807e0eb97dbcd925ad4', 'Baldwin', 'Mainstone', false, 'Aquamarine', 'Indigo', '2023-07-08');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (2, 'knoir1@bing.com', 'super-admin', 'e31b9ef0fd24fdf838908f1596c05edcb6452f1a80ae1b901fba8190e942c768', 'Kilian', 'Noir', false, 'Blue', 'Khaki', '2023-01-20');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (3, 'mdew2@sogou.com', 'super-admin', 'fa83d04d5ac0919151b899fce57478f2e2fe32dfeffd191f95140d47b475c12a', 'Morly', 'Dew', false, 'Green', 'Goldenrod', '2023-02-04');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (4, 'cbirkwood3@yale.edu', 'super-admin', '5b310fe642292a0548e0a959baf3372e1e8bbfe5aaf027bd6c23346a88269cdc', 'Cyrus', 'Birkwood', false, 'Indigo', 'Orange', '2023-05-04');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (5, 'ecrichmer4@bizjournals.com', 'super-admin', 'eb63e7012bdbb14ca2fff5e2e6bc1d232aad7f97a98465250d839b728458a0c3', 'Ediva', 'Crichmer', true, 'Violet', 'Pink', '2023-10-13');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (6, 'gphoebe5@wordpress.com', 'super-admin', '99408686cf63a331c186d718aaa849a25a6dccd281a9cc2714f751af54a08e5e', 'Gusta', 'Phoebe', false, 'Aquamarine', 'Puce', '2023-12-06');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (7, 'elegg6@wufoo.com', 'admin', 'd470483e0519710a55eaecd6b5005a61b90db99603ea8c67a45b7293341e2aa8', 'Eamon', 'Legg', true, 'Puce', 'Puce', '2023-01-30');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (8, 'rgraith7@mozilla.org', 'admin', '04431129b8baf1d2c78b12070a13fd1990fb5a33f34509fb3ed9bfb4d31b95b4', 'Rhona', 'Graith', false, 'Purple', 'Turquoise', '2023-10-14');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (9, 'gmallord8@salon.com', 'super-admin', 'b4a498c863669490d3a62c27cea1fc282d57732425fd3a6e1a109389a7cbcba6', 'Gwenni', 'Mallord', true, 'Violet', 'Goldenrod', '2023-01-10');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (10, 'tpeasee9@chronoengine.com', 'admin', '33495145baa11881d78e256ae499c9c4419a2dd0248ec091c2636f998db00af9', 'Torrey', 'Peasee', true, 'Aquamarine', 'Goldenrod', '2023-09-26');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (11, 'ufardya@china.com.cn', 'super-admin', '332d94813e92d64b0df8972bc884b15dac54cfaa1b0e7bf67c484e4e489cf11d', 'Una', 'Fardy', false, 'Khaki', 'Indigo', '2023-09-27');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (12, 'dfritschelb@columbia.edu', 'admin', '8a0a52e0a80c5d10c95809f451d2ab9b21746089e306f64456a8aba70702c27d', 'Darya', 'Fritschel', false, 'Aquamarine', 'Yellow', '2023-05-03');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (13, 'rschistlc@drupal.org', 'admin', 'cdf07e9bb202e55b98577e147f7543e1812e3d4f935aae1eb417088fb5eb3db2', 'Ricky', 'Schistl', true, 'Maroon', 'Yellow', '2023-08-02');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (14, 'wgoodbarrd@de.vu', 'admin', 'f5c4a9f6e8cf86ae3afd22024a76840d9648e4930f5d96cb41f8d115b6cc9a45', 'Wald', 'Goodbarr', false, 'Turquoise', 'Violet', '2023-10-05');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (15, 'spinckneye@virginia.edu', 'admin', '7dfd658d1f0936bb9f75e2f80b32c02df32dafbfc0b53640c75fb0bba680d751', 'Stacey', 'Pinckney', false, 'Orange', 'Yellow', '2023-02-05');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (16, 'aocurneenf@marriott.com', 'admin', '34c4ad6ff54b05faa583b6b575017bf48213f24ba6425c2a96c7a4ba3a31c111', 'Antonie', 'O''Curneen', true, 'Orange', 'Fuscia', '2023-09-14');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (17, 'kyakovlg@chron.com', 'super-admin', '14cff158bb9055cacd82fb5f9bbbe3d3d307775e4f862932b3e05e7f7669adea', 'Kippy', 'Yakovl', false, 'Khaki', 'Puce', '2023-01-12');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (18, 'fkash@nasa.gov', 'super-admin', '08c33205cc5570662c2a13c344fdf553d510485c414eddf44938230b320c9b07', 'Flori', 'Kas', true, 'Violet', 'Blue', '2023-07-28');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (19, 'nlottringtoni@themeforest.net', 'admin', '0a5c9139db487c259a346c881c848f5d1873b938bd9e2528f171c4b5439ba657', 'Neall', 'Lottrington', false, 'Maroon', 'Red', '2023-06-12');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (20, 'ajoscelinj@desdev.cn', 'super-admin', 'c3491045ad46099d76ca69d1fd0e9372c0453a5d3eb63ba269bb2e5a0544e2a3', 'Anne-corinne', 'Joscelin', true, 'Blue', 'Pink', '2023-07-22');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (21, 'jdenkelk@goo.ne.jp', 'admin', 'fd40c8b3a164b15901266df67c9a45004cfdd8cf8165d53e682133978491284f', 'Joey', 'Denkel', true, 'Green', 'Khaki', '2023-07-26');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (22, 'aleerl@alibaba.com', 'super-admin', '31ddd23ac3a42aa6a11917ccd887f60327584238a0690c43c9d416044275362e', 'Alexandro', 'Leer', true, 'Teal', 'Red', '2023-08-30');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (23, 'eescofierm@nasa.gov', 'super-admin', 'a2728d379b8892bd016f336a200ae9db9de3ec5a1f2a3bb9a69b12e70d707913', 'Elfrieda', 'Escofier', false, 'Orange', 'Purple', '2023-07-16');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (24, 'pfawleyn@marriott.com', 'admin', 'b23354d51fb95e7f1021b61884c83736c319670c52c64f8ef63b9bb4799f8df6', 'Patton', 'Fawley', true, 'Indigo', 'Yellow', '2023-07-15');
insert into User_app (id_user_app, email_user_app, type_account_user_app, password_user_app, first_name_user_app, last_name_user_app, state_of_account_user_app, color_user_app, profile_picture_user_app, creation_date_user_app) values (25, 'apoppyo@twitter.com', 'super-admin', '089abe060b154cefc44b17ebbc5e4361e48dd2d0125c7c48b7f5f155f1e3bf85', 'Audy', 'Poppy', false, 'Puce', 'Turquoise', '2023-10-20');

# insert data into Board

insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (1, 'Cardguard', '2022-03-01', 44, 'Turquoise', 1);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (2, 'Zontrax', '2022-11-01', 100, 'Pink', 2);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (3, 'Tres-Zap', '2022-02-11', 52, 'Fuscia', 3);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (4, 'Span', '2022-10-22', 90, 'Teal', 4);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (5, 'Lotstring', '2022-10-03', 40, 'Violet', 5);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (6, 'Matsoft', '2022-07-16', 14, 'Mauv', 6);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (7, 'Holdlamis', '2022-09-29', 98, 'Puce', 7);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (8, 'Asoka', '2022-01-22', 27, 'Yellow', 8);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (9, 'Rank', '2022-12-22', 32, 'Pink', 9);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (10, 'Rank', '2022-05-29', 81, 'Khaki', 10);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (11, 'Sonsing', '2022-07-07', 68, 'Green', 11);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (12, 'Regrant', '2022-07-01', 66, 'Khaki', 12);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (13, 'Solarbreeze', '2022-07-01', 13, 'Green', 13);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (14, 'Prodder', '2022-04-19', 54, 'Green', 14);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (15, 'Kanlam', '2022-12-31', 97, 'Teal', 15);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (16, 'Keylex', '2022-04-10', 14, 'Violet', 16);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (17, 'Biodex', '2022-09-17', 65, 'Pink', 17);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (18, 'Rank', '2022-07-23', 84, 'Indigo', 18);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (19, 'Treeflex', '2022-12-27', 54, 'Khaki', 19);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (20, 'Bamity', '2022-02-01', 64, 'Turquoise', 20);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (21, 'Sonsing', '2022-04-14', 54, 'Puce', 21);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (22, 'Pannier', '2022-01-15', 48, 'Maroon', 22);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (23, 'Fixflex', '2022-03-06', 83, 'Teal', 23);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (24, 'Bamity', '2022-02-09', 90, 'Indigo', 24);
insert into Board (id_board, name_board, creation_date_board, position_board, color_board, id_user_app) values (25, 'Transcof', '2022-10-12', 43, 'Yellow', 25);

# insert data into list_app

insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (1, 'Aero 8', 1, '2023-01-07', 1);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (2, '9000', 2, '2023-01-18', 2);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (3, 'Neon', 3, '2023-01-07', 3);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (4, 'Pajero', 4, '2023-01-07', 4);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (5, 'Blackwood', 5, '2023-01-16', 5);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (6, 'Pathfinder', 6, '2023-01-09', 6);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (7, 'RX-7', 7, '2023-01-17', 7);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (8, 'Topaz', 8, '2023-01-17', 8);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (9, 'New Beetle', 9, '2023-01-13', 9);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (10, 'Explorer', 10, '2023-01-06', 10);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (11, 'F450', 11, '2023-01-23', 11);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (12, 'E-Series', 12, '2023-01-25', 12);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (13, 'Ranger', 13, '2023-01-22', 13);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (14, 'LTD Crown Victoria', 14, '2023-01-24', 14);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (15, 'Somerset', 15, '2023-01-09', 15);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (16, 'LeMans', 16, '2023-01-06', 16);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (17, 'Suburban 1500', 17, '2023-01-17', 17);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (18, '525', 18, '2023-01-15', 18);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (19, 'Esprit', 19, '2023-01-24', 19);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (20, 'Maxima', 20, '2023-01-20', 20);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (21, 'Cougar', 21, '2023-01-06', 21);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (22, 'Venture', 22, '2023-01-17', 22);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (23, 'Altima', 23, '2023-01-15', 23);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (24, 'CX-9', 24, '2023-01-14', 24);
insert into List_app (id_list_app, name_list_app, position_list_app, creation_date_list_app, id_board) values (25, 'SVX', 25, '2023-01-07', 25);

#inserting data into Card

insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (1, null, 96, '2023-01-20', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.', '2023-01-09', '2023-02-24', 'Goldenrod', 1);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (2, null, 28, '2023-01-21', 'In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', '2023-01-16', '2023-03-19', 'Indigo', 2);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (3, null, 92, '2023-01-10', 'Nulla tellus.', '2023-01-17', '2023-05-07', 'Turquoise', 3);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (4, null, 92, '2023-01-18', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.', '2023-01-18', '2023-01-19', 'Teal', 4);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (5, null, 6, '2023-01-13', 'Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius.', '2023-01-22', '2023-03-27', 'Indigo', 5);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (6, null, 30, '2023-01-13', 'Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus.', '2023-01-19', '2023-03-11', 'Purple', 6);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (7, null, 99, '2023-01-17', 'Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices.', '2023-01-21', '2023-01-21', 'Red', 7);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (8, null, 7, '2023-01-16', 'In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna.', '2023-01-18', '2023-04-15', 'Maroon', 8);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (9, null, 85, '2023-01-17', 'Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo.', '2023-01-25', '2023-04-25', 'Red', 9);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (10, null, 94, '2023-01-21', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum.', '2023-01-14', '2023-01-20', 'Orange', 10);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (11, null, 68, '2023-01-23', 'Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa.', '2023-01-14', '2023-03-30', 'Maroon', 11);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (12, null, 35, '2023-01-09', 'Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', '2023-01-08', '2023-05-10', 'Violet', 12);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (13, null, 67, '2023-01-09', 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst.', '2023-01-25', '2023-03-17', 'Green', 13);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (14, null, 75, '2023-01-23', 'Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', '2023-01-20', '2023-03-20', 'Goldenrod', 14);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (15, null, 20, '2023-01-11', 'Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', '2023-01-12', '2023-05-11', 'Turquoise', 15);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (16, null, 84, '2023-01-07', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio.', '2023-01-18', '2023-05-12', 'Pink', 16);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (17, null, 17, '2023-01-24', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi.', '2023-01-13', '2023-03-04', 'Khaki', 17);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (18, null, 21, '2023-01-15', 'Suspendisse potenti.', '2023-01-11', '2023-03-25', 'Orange', 18);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (19, null, 57, '2023-01-17', 'Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '2023-01-14', '2023-05-20', 'Puce', 19);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (20, null, 39, '2023-01-13', 'In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna.', '2023-01-14', '2023-01-15', 'Green', 20);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (21, null, 40, '2023-01-17', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '2023-01-24', '2023-01-14', 'Crimson', 21);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (22, null, 50, '2023-01-16', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi.', '2023-01-24', '2023-02-10', 'Khaki', 22);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (23, null, 97, '2023-01-24', 'Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est.', '2023-01-08', '2023-04-09', 'Pink', 23);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (24, null, 20, '2023-01-07', 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', '2023-01-24', '2023-05-08', 'Fuscia', 24);
insert into Card (id_card, name_card, position_card, starting_date_card, content_card, creation_date_card, due_date_card, color_card, id_list_app) values (25, null, 41, '2023-01-20', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', '2023-01-20', '2023-05-08', 'Aquamarine', 25);

#inserting data into Role_app

insert into Role_app (id_role_app, name_role_app) values (1, 'observer');
insert into Role_app (id_role_app, name_role_app) values (2, 'member');

#inserting data into Permission

insert into Permission (id_permission, name_permission) values (1, 'create');
insert into Permission (id_permission, name_permission) values (2, 'read');
insert into Permission (id_permission, name_permission) values (3, 'update');
insert into Permission (id_permission, name_permission) values (4, 'delete');


#inserting data into invite
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (1, 1, 1, 1);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (2, 2, 2, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (3, 3, 3, 1);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (4, 4, 4, 1);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (5, 5, 5, 1);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (6, 6, 6, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (7, 7, 7, 1);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (8, 8, 8, 1);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (9, 9, 9, 1);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (10, 10, 10, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (11, 11, 11, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (12, 12, 12, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (13, 13, 13, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (14, 14, 14, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (15, 15, 15, 1);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (16, 16, 16, 1);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (17, 17, 17, 1);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (18, 18, 18, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (19, 19, 19, 1);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (20, 20, 20, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (21, 21, 21, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (22, 22, 22, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (23, 23, 23, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (24, 24, 24, 2);
insert into invite (id_user_app, id_user_app_1, id_board, id_role_app) values (25, 25, 25, 1);

#inserting data into should_have

insert into should_have (id_role_app, id_permission) values (2, 1);
insert into should_have (id_role_app, id_permission) values (2, 2);
insert into should_have (id_role_app, id_permission) values (2, 3);
insert into should_have (id_role_app, id_permission) values (2, 4);
insert into should_have (id_role_app, id_permission) values (1, 3);
insert into should_have (id_role_app, id_permission) values (1, 4);
insert into should_have (id_role_app, id_permission) values (1, 1);
insert into should_have (id_role_app, id_permission) values (1, 2); */