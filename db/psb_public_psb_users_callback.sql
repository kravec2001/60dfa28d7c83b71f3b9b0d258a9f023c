create table psb_users_callback
(
    id         integer not null
        constraint psb_users_callback_pk
            primary key,
    id_user    integer
        constraint psb_users_callback_psb_user_id_fk
            references psb_user,
    estimation integer,
    "Date_est" date
);

alter table psb_users_callback
    owner to postgres;

create unique index psb_users_callback_id_uindex
    on psb_users_callback (id);

