create table psb_events_pers
(
    id            serial  not null
        constraint psb_adapt_pk
            primary key,
    id_events     integer
        constraint psb_events_pers_psb_events_id_fk
            references psb_events,
    id_user       integer
        constraint psb_events_pers_psb_user_id_fk
            references psb_user,
    id_user_chief integer,
    number_order  integer not null,
    status        integer default 0,
    status_chief  integer default 0
);

alter table psb_events_pers
    owner to postgres;

INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (23, 24, 1, 3, 13, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (24, 25, 1, 3, 14, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (25, 26, 1, 3, 15, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (26, 27, 1, 3, 16, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (27, 28, 1, 3, 17, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (28, 29, 1, 3, 18, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (29, 30, 1, 3, 19, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (30, 31, 1, 3, 20, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (31, 32, 1, 3, 21, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (32, 33, 1, 3, 22, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (33, 34, 1, 3, 23, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (8, 7, 5, 3, 1, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (16, 3, 3, 3, 1, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (34, 35, 1, 3, 24, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (35, 36, 1, 3, 25, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (36, 37, 1, 3, 26, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (37, 38, 1, 3, 27, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (38, 39, 1, 3, 28, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (39, 40, 1, 3, 29, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (40, 41, 1, 3, 30, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (41, 42, 1, 3, 31, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (42, 43, 1, 3, 32, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (43, 44, 1, 3, 33, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (44, 45, 1, 3, 34, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (45, 46, 1, 3, 35, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (46, 47, 1, 3, 36, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (47, 48, 1, 3, 37, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (14, 4, 1, 3, 4, 1, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (19, 20, 1, 3, 5, 1, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (11, 13, 1, 3, 6, 1, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (18, 16, 1, 3, 7, 1, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (6, 5, 5, 3, 1, 1, 1);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (3, 4, 5, 3, 1, 1, 1);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (12, 11, 1, 3, 1, 1, 1);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (4, 6, 1, 3, 3, 1, 1);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (7, 6, 5, 3, 1, 0, 1);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (15, 2, 3, 3, 1, 0, 1);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (9, 2, 5, 3, 1, 0, 1);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (10, 1, 5, 3, 1, 0, 1);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (1, 3, 5, 3, 3, 1, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (20, 21, 1, 3, 10, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (2, 5, 1, 3, 2, 1, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (22, 23, 1, 3, 12, 0, 1);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (21, 22, 1, 3, 11, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (13, 9, 1, 3, 9, 0, 0);
INSERT INTO public.psb_events_pers (id, id_events, id_user, id_user_chief, number_order, status, status_chief) VALUES (17, 19, 1, 3, 8, 0, 0);