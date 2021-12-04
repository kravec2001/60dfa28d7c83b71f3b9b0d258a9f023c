create table psb_events_profile
(
    id           serial not null
        constraint events_profile_pk
            primary key,
    id_profile   integer
        constraint psb_events_profile_psb_profiles_id_fk
            references psb_profiles,
    id_events    integer
        constraint psb_events_profile_psb_events_id_fk
            references psb_events,
    number_order integer
);

comment on table psb_events_profile is 'Профили планов обучения';

alter table psb_events_profile
    owner to postgres;

create unique index events_profile_id_uindex
    on psb_events_profile (id);

INSERT INTO public.psb_events_profile (id, id_profile, id_events, number_order) VALUES (1, 1, 11, 1);
INSERT INTO public.psb_events_profile (id, id_profile, id_events, number_order) VALUES (2, 1, 13, 2);