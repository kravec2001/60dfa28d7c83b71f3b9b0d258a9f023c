create table psb_info_types
(
    id        integer not null
        constraint psb_types_info_pk
            primary key,
    name_type varchar,
    img_type  varchar
);

alter table psb_info_types
    owner to postgres;

create unique index psb_types_info_id_uindex
    on psb_info_types (id);

INSERT INTO public.psb_info_types (id, name_type, img_type) VALUES (5, 'Бухгалтерия', null);
INSERT INTO public.psb_info_types (id, name_type, img_type) VALUES (4, 'Информационная безопасность', null);
INSERT INTO public.psb_info_types (id, name_type, img_type) VALUES (3, 'Кадровая служба ', null);
INSERT INTO public.psb_info_types (id, name_type, img_type) VALUES (2, 'Разработка', null);
INSERT INTO public.psb_info_types (id, name_type, img_type) VALUES (1, 'Общие', null);
INSERT INTO public.psb_info_types (id, name_type, img_type) VALUES (0, 'Инфоблоки', null);