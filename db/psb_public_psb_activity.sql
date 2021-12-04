create table psb_activity
(
    id            serial not null
        constraint psb_activity_pk
            primary key,
    activity      varchar,
    date_activity timestamp,
    img_activity  varchar,
    count_ball    integer default 0,
    id_user       integer
        constraint psb_activity_psb_user_id_fk
            references psb_user,
    id_events     integer
        constraint psb_activity_psb_events_id_fk
            references psb_events
);

comment on table psb_activity is 'календарь событий';

alter table psb_activity
    owner to postgres;

INSERT INTO public.psb_activity (id, activity, date_activity, img_activity, count_ball, id_user, id_events) VALUES (13, 'Ознакомиться с информацией о банке', '2021-12-02 00:00:00.000000', null, 0, 1, 11);
INSERT INTO public.psb_activity (id, activity, date_activity, img_activity, count_ball, id_user, id_events) VALUES (14, 'Ознакомиться с документом "Регламент по информационной безопасности"', '2021-12-02 00:00:00.000000', null, 0, 1, 4);
INSERT INTO public.psb_activity (id, activity, date_activity, img_activity, count_ball, id_user, id_events) VALUES (15, 'Подписать документы в Отделе кадров', '2021-12-03 00:00:00.000000', null, 0, 1, 6);
INSERT INTO public.psb_activity (id, activity, date_activity, img_activity, count_ball, id_user, id_events) VALUES (16, 'Ознакомиться с документом "Режим работы сотрудников"', '2021-12-01 00:00:00.000000', null, 0, 1, 5);
INSERT INTO public.psb_activity (id, activity, date_activity, img_activity, count_ball, id_user, id_events) VALUES (17, 'Выбор подарка про итогу онбординга', '2021-12-02 00:00:00.000000', null, 0, 1, 21);
INSERT INTO public.psb_activity (id, activity, date_activity, img_activity, count_ball, id_user, id_events) VALUES (18, 'Подписать ведомость по технике безопасности   ', '2021-12-02 00:00:00.000000', null, 0, 1, 20);
INSERT INTO public.psb_activity (id, activity, date_activity, img_activity, count_ball, id_user, id_events) VALUES (19, 'Встреча с командой', '2021-12-05 00:00:00.000000', null, 0, 1, 16);
INSERT INTO public.psb_activity (id, activity, date_activity, img_activity, count_ball, id_user, id_events) VALUES (20, 'Пройти тестирование', '2021-12-02 00:00:00.000000', null, 0, 1, 9);
INSERT INTO public.psb_activity (id, activity, date_activity, img_activity, count_ball, id_user, id_events) VALUES (21, 'Ознакомиться с текущими проектами  ', '2021-12-02 00:00:00.000000', null, 0, 1, 19);
INSERT INTO public.psb_activity (id, activity, date_activity, img_activity, count_ball, id_user, id_events) VALUES (22, 'Ознакомиться со своей командой', '2021-12-02 00:00:00.000000', null, 0, 1, 13);
INSERT INTO public.psb_activity (id, activity, date_activity, img_activity, count_ball, id_user, id_events) VALUES (2, 'Семинар "Основы рефакторинга кода с примерами на Java"', '2021-12-24 15:00:00.000000', null, 10, 2, 10);
INSERT INTO public.psb_activity (id, activity, date_activity, img_activity, count_ball, id_user, id_events) VALUES (1, 'Тренинг по ораторскому искусству', '2021-12-15 11:00:00.000000', null, 10, 2, 2);