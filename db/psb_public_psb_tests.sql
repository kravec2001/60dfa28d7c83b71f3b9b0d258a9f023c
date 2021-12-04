create table psb_tests
(
    id          integer not null
        constraint psb_tests_pk
            primary key,
    name_test   varchar,
    date_test   timestamp,
    img_test    varchar,
    description varchar
);

alter table psb_tests
    owner to postgres;

create unique index psb_tests_id_uindex
    on psb_tests (id);

INSERT INTO public.psb_tests (id, name_test, date_test, img_test, description) VALUES (1, 'Общие данные о компании ', '2021-12-02 14:00:00.000000', null, 'Тест для оценки знаний общих знаний о компании');