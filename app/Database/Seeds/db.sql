create table contact_forms (
  contact_form_id int not null auto_increment,
  contact_name varchar(50) not null,
  contact_email varchar(50) not null,
  contact_message varchar(255) not null,
  created_at datetime not null default current_timestamp(),
  last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
  primary key(contact_form_id)
);