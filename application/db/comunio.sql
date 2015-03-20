drop table comunidad cascade;
create table comunidad(
  id_comunidad              bigserial      constraint pk_comunidad primary key,
  nombre_comunidad          varchar(30)    not null constraint uq_comunidad_nombre unique

);

insert into comunidad (nombre_comunidad) values ('papafritas');


drop table usuarios cascade;

create table usuarios (
  id_usuario bigserial      constraint pk_usuarios primary key,
  nombre     varchar(20)    not null,
  apellidos  varchar(40),
  nick      varchar(10)     not null constraint uq_usuarios_nick unique,
  email      varchar(32)    not null constraint ck_email_valido
                            check (email ~* '^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+[.][A-Za-z]+$'),
  password   char(32)       not null,
  comunidad_id  bigint      constraint fk_comunidad_id
                            references comunidad(id_comunidad) 
                            on delete no action
                            on update cascade,
  valido    boolean         default false
);

insert into usuarios (nombre, nick, email, password, comunidad_id)
            values('pepe', 'pepe', 'pepe@hotmail.com',md5('pepe'), 1);





drop table if exists validaciones_pendientes cascade;

create table validaciones_pendientes(
  usuarios_id bigint      constraint fk_usuarios
                            references usuarios(id_usuario)
                            on delete cascade
                            on update cascade,
  token       char(32)    constraint pk_validaciones_pendientes primary key
);


drop table if exists ci_sessions cascade;

create table ci_sessions (
  session_id    varchar(40)  not null default '0',
  ip_address    varchar(45)  not null default '0',
  user_agent    varchar(120) not null,
  last_activity numeric(10)  not null default 0,
  user_data     text         not null,
  constraint pk_ci_sessions primary key (session_id)
);

create index last_activity_idx on ci_sessions (last_activity);



/*

drop table aeropuertos cascade;

create table aeropuertos (
  id_aero  char(3)     constraint pk_aeropuertos primary key,
  den_aero varchar(40) not null
);

insert into aeropuertos (id_aero, den_aero) 
            values('BAR', 'El Prat');
insert into aeropuertos (id_aero, den_aero) 
            values('MAD','Barajas');




drop table companias cascade;

create table companias (
  id_comp  bigserial   constraint pk_companias primary key,
  den_comp varchar(30) not null
);

insert into companias (den_comp) 
            values('Iberia');
insert into companias (den_comp) 
            values('Ryanair');


drop table vuelos cascade;

create table vuelos (
  id_vuelo char(6)      constraint pk_vuelos primary key,
  id_orig  char(3)      not null constraint fk_vuelos_aeropuerto_origen
                        references aeropuertos (id_aero)
                        on delete no action on update cascade,
  id_dest  char(3)      not null constraint fk_vuelos_aeropuerto_destino
                        references aeropuertos (id_aero)
                        on delete no action on update cascade,
  id_comp  bigint       not null constraint fk_vuelos_companias
                        references companias (id_comp)
                        on delete no action on update cascade,
  salida   timestamp    not null,
  llegada  timestamp    not null,
  plazas   numeric(3)   not null,
  precio   numeric(6,2) not null
);

insert into vuelos (id_vuelo, id_orig, id_dest, id_comp, salida, llegada, plazas, precio)
  values('VU0001','BAR','MAD', 1, to_timestamp('05 03 2015 10:00:00', 'DD MM YYYY HH24:MI:SS'),
to_timestamp('05 03 2015 12:00:00', 'DD MM YYYY HH24:MI:SS'), 20, 40);

insert into vuelos (id_vuelo, id_orig, id_dest, id_comp, salida, llegada, plazas, precio)
  values('VU0002', 'MAD','BAR', 2, to_timestamp('05 03 2015 12:00:00', 'DD MM YYYY HH24:MI:SS'),
to_timestamp('05 03 2015 14:00:00', 'DD MM YYYY HH24:MI:SS'), 10, 30);






drop table reservas cascade;

create table reservas (
  id_reserva bigserial constraint pk_reservas primary key,
  id_usuario bigint    not null constraint fk_reservas_usuarios
                       references usuarios (id_usuario)
                       on delete no action on update cascade,
  id_vuelo   char(6)   not null constraint fk_reservas_vuelos
                       references vuelos (id_vuelo)
                       on delete no action on update cascade,
  fecha_hora timestamp not null
);

insert into reservas (id_usuario, id_vuelo, fecha_hora) values (1,' VU0001', current_timestamp);










drop table if exists ci_sessions cascade;

create table ci_sessions (
  session_id    varchar(40)  not null default '0',
  ip_address    varchar(45)  not null default '0',
  user_agent    varchar(120) not null,
  last_activity numeric(10)  not null default 0,
  user_data     text         not null,
  constraint pk_ci_sessions primary key (session_id)
);

create index last_activity_idx on ci_sessions (last_activity);





create view vista_vuelos as 

           select v.id_vuelo, a1.den_aero origen, a2.den_aero destino, c.den_comp, to_char(v.salida, 'DD-MM-YYYY, HH24:MI:SS') as fecha_salida, to_char(v.llegada, 'DD-MM-YYYY  HH24:MI:SS') as fecha_llegada, to_char(v.precio, '99D00 L') as precio, v.plazas       from vuelos v, aeropuertos a1, aeropuertos a2, companias c       where v.id_orig = a1.id_aero and v.id_dest = a2.id_aero        and v.id_comp = c.id_comp order by fecha_salida, fecha_llegada;


insert into reservas (id_usuario, id_vuelo, fecha_hora) values (1,' vu0001', current_timestamp);

  */