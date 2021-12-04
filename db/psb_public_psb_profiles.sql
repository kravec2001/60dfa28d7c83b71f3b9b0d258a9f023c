create table psb_profiles
(
    id      serial not null
        constraint psb_profiles_pk
            primary key,
    profile varchar
);

comment on table psb_profiles is 'Профили обучения (справочник)';

alter table psb_profiles
    owner to postgres;

create unique index psb_profiles_id_uindex
    on psb_profiles (id);

INSERT INTO public.psb_profiles (id, profile) VALUES (1, 'Аналитик');
INSERT INTO public.psb_profiles (id, profile) VALUES (2, 'Разрабочик full-stack');
INSERT INTO public.psb_profiles (id, profile) VALUES (3, 'Разработчик');