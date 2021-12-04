create table psb_news
(
    id        integer not null
        constraint psb_news_pk
            primary key,
    news      varchar,
    date_news timestamp,
    img_news  varchar
);

alter table psb_news
    owner to postgres;

create unique index psb_news_id_uindex
    on psb_news (id);

INSERT INTO public.psb_news (id, news, date_news, img_news) VALUES (1, 'ПСБ повышает ставки по вкладам для сотрудников', '2021-05-23 21:56:07.000000', null);
INSERT INTO public.psb_news (id, news, date_news, img_news) VALUES (2, 'ПСБ и "Вертолеты России" запустят первый в РФ проект операционного лизинга вертолетов', '2021-11-11 21:57:57.000000', null);
INSERT INTO public.psb_news (id, news, date_news, img_news) VALUES (3, 'Покупка ценных бумаг в интернет-банке или мобильном банке', '2021-08-23 21:59:54.000000', null);