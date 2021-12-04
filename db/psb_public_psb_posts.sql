create table psb_posts
(
    id   integer not null
        constraint psb_posts_pk
            primary key,
    name varchar
);

comment on table psb_posts is 'Должности';

alter table psb_posts
    owner to postgres;

create unique index psb_posts_id_uindex
    on psb_posts (id);

INSERT INTO public.psb_posts (id, name) VALUES (1, 'Программист');
INSERT INTO public.psb_posts (id, name) VALUES (3, 'Руководитель');
INSERT INTO public.psb_posts (id, name) VALUES (4, 'Тестировщик');
INSERT INTO public.psb_posts (id, name) VALUES (2, 'Аналитик');
INSERT INTO public.psb_posts (id, name) VALUES (5, 'Дизайнер');