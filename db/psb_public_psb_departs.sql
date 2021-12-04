create table psb_departs
(
    id   integer not null
        constraint psb_departs_pk
            primary key,
    name varchar
);

alter table psb_departs
    owner to postgres;

create unique index psb_departs_id_uindex
    on psb_departs (id);

INSERT INTO public.psb_departs (id, name) VALUES (2, 'Проектирование инф. систем банка');
INSERT INTO public.psb_departs (id, name) VALUES (3, 'Управление инф. систем банка');
INSERT INTO public.psb_departs (id, name) VALUES (1, 'Разработка инф. систем банка');