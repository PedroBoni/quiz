create database quiz;

use quiz;

create table question (
  cd_question int not null auto_increment,
  ds_question longtext NOT NULL,
  response_correct varchar(100) NOT NULL,
  presentation_type char(1) not null,
  primary key (cd_question)
) engine=InnoDB default charset=utf8; 

create table response_incorrect (
  cd_response_incorrect int not null auto_increment,
  ds_response_incorrect varchar(100) NOT NULL,
  id_question int not null,
  primary key (cd_response_incorrect),
  constraint question_fk foreign key (id_question) references question (cd_question)
) engine=InnoDB default charset=utf8; 

DROP TABLE response_incorrect;
DROP TABLE question;