create table psb_project_users
(
    id         integer not null
        constraint psb_project_users_pk
            primary key,
    id_project integer
        constraint psb_project_users_psb_projects_id_fk
            references psb_projects,
    id_user    integer
        constraint psb_project_users_psb_user_id_fk
            references psb_user
);

alter table psb_project_users
    owner to postgres;

create unique index psb_project_users_id_uindex
    on psb_project_users (id);

INSERT INTO public.psb_project_users (id, id_project, id_user) VALUES (1, 1, 1);
INSERT INTO public.psb_project_users (id, id_project, id_user) VALUES (2, 1, 4);
INSERT INTO public.psb_project_users (id, id_project, id_user) VALUES (3, 2, 2);
INSERT INTO public.psb_project_users (id, id_project, id_user) VALUES (6, 3, 5);
INSERT INTO public.psb_project_users (id, id_project, id_user) VALUES (7, 3, 4);