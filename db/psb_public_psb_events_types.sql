create table psb_events_types
(
    id   serial not null
        constraint psb_events_types_pk
            primary key,
    name varchar,
    img  varchar
);

comment on table psb_events_types is 'Типы событий';

alter table psb_events_types
    owner to postgres;

create unique index psb_events_types_id_uindex
    on psb_events_types (id);

INSERT INTO public.psb_events_types (id, name, img) VALUES (2, 'Встреча', 'gift.png');
INSERT INTO public.psb_events_types (id, name, img) VALUES (4, 'Обучение', 'icon_case.png');
INSERT INTO public.psb_events_types (id, name, img) VALUES (3, 'Тестирование', 'icon_test.png');
INSERT INTO public.psb_events_types (id, name, img) VALUES (1, 'Документы', 'icon_docs.png');
INSERT INTO public.psb_events_types (id, name, img) VALUES (5, 'Организационные', 'icon_docs.png');