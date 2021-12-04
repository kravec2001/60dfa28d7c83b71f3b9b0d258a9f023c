create table psb_user
(
    id                 integer not null
        constraint psb_user_pk
            primary key
        constraint psb_user_users_id_fk
            references users,
    fio                varchar(200),
    id_user            integer,
    id_manager         integer,
    id_depart          integer
        constraint psb_user_psb_departs_id_fk
            references psb_departs,
    id_post            integer
        constraint psb_user_psb_posts_id_fk
            references psb_posts,
    img                varchar,
    bonus              integer,
    phone              varchar,
    email              varchar,
    "Profile_telegram" varchar,
    chat_id            integer,
    date_start         date,
    id_teacher         integer
);

comment on table psb_user is 'Сотрудники';

alter table psb_user
    owner to postgres;

INSERT INTO public.psb_user (id, fio, id_user, id_manager, id_depart, id_post, img, bonus, phone, email, "Profile_telegram", chat_id, date_start, id_teacher) VALUES (3, 'Умелова Светлана', 3, 0, 3, 3, 'woman.jpg', 115, '200', 'SvetaBoss@gmail.com', 'SMaidannik', 697558447, '2016-12-22', null);
INSERT INTO public.psb_user (id, fio, id_user, id_manager, id_depart, id_post, img, bonus, phone, email, "Profile_telegram", chat_id, date_start, id_teacher) VALUES (2, 'Шмелёв Вячеслав', 2, 3, 2, 2, 'devel2.png', 37, '211', 'Mohnat_Smel@yandex.ru', '@Maker', null, '2020-12-11', null);
INSERT INTO public.psb_user (id, fio, id_user, id_manager, id_depart, id_post, img, bonus, phone, email, "Profile_telegram", chat_id, date_start, id_teacher) VALUES (5, 'Петрова Екатерина ', 5, 3, 1, 5, 'devel4.png', 44, '226', 'Petrova@gmail.com', '@Tester', null, '2021-12-01', 2);
INSERT INTO public.psb_user (id, fio, id_user, id_manager, id_depart, id_post, img, bonus, phone, email, "Profile_telegram", chat_id, date_start, id_teacher) VALUES (1, 'Иванов Александр', 1, 3, 1, 1, 'devel.jpg', 45, '417', 'Ivanov@gmail.com', 'kravec2001', 940560239, '2021-12-02', 2);
INSERT INTO public.psb_user (id, fio, id_user, id_manager, id_depart, id_post, img, bonus, phone, email, "Profile_telegram", chat_id, date_start, id_teacher) VALUES (4, 'Топоров Георгий', 4, 3, 2, 4, 'devel3.png', 0, '212', 'Toporov_Georg@gmail.com', 'Kotter21', null, '2021-12-03', 2);