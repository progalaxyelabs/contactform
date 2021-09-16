create table contact_forms (
  contact_form_id int not null auto_increment,
  contact_name varchar(50) not null,
  contact_email varchar(50) not null,
  contact_message varchar(255) not null,
  created_at datetime not null default current_timestamp(),
  last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
  primary key(contact_form_id)
);

create table admin_signin (
  admin_id int not null auto_increment,
  admin_name varchar(50) not null,
  admin_email varchar(50) not null,
  admin_password varchar(255) not null,
  created_at datetime not null default current_timestamp(),
  last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
  primary key(admin_id)
);

insert into admin_signin
(admin_name, admin_email, admin_password)
values
('test', 'admin@test.com', '$2y$10$AJgsl/vT11/VByFGTVCl0uqsP2wNnSoaOEwxcIOn5IO1pDC7CeAkG');