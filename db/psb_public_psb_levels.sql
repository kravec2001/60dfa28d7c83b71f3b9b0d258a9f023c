create table psb_levels
(
    id        integer not null
        constraint psb_levels_pk
            primary key,
    name      varchar,
    level     integer,
    img_level integer
);

alter table psb_levels
    owner to postgres;

create unique index psb_levels_id_uindex
    on psb_levels (id);

INSERT INTO public.psb_levels (id, name, level, img_level) VALUES (1, 'Стажер', 0, null);
INSERT INTO public.psb_levels (id, name, level, img_level) VALUES (2, 'Знаток', 50, null);
INSERT INTO public.psb_levels (id, name, level, img_level) VALUES (3, 'Мастер', 100, null);