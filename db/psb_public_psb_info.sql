create table psb_info
(
    id        integer not null
        constraint psb_info_pk
            primary key,
    type_info integer
        constraint psb_info_psb_info_types_id_fk
            references psb_info_types,
    data_info varchar,
    date_info timestamp,
    img_info  varchar,
    bonus     integer,
    title     varchar
);

alter table psb_info
    owner to postgres;

create unique index psb_info_id_uindex
    on psb_info (id);

INSERT INTO public.psb_info (id, type_info, data_info, date_info, img_info, bonus, title) VALUES (1, 0, 'ПСБ — универсальный банк, основанный в 1995 году. Входит в десятку крупнейших банков России и в список системно значимых кредитных организаций, утвержденный Центробанком. В конце декабря 2019 года ПСБ был законодательно присвоен статус опорного банка для оборонно-промышленного комплекса (ОПК). Услугами банка пользуются 2,5 миллиона физических и свыше 200 тысяч юридических лиц, в том числе более 10 тысяч крупных корпоративных клиентов. Сеть банка насчитывает около 300 точек продаж в России.<br><br>

Промсвязьбанк выбран в качестве опорного банка для реализации государственного оборонного заказа и сопровождения крупных государственных контрактов, оказывает полный спектр услуг розничным и корпоративным клиентам, малому и среднему бизнесу.<br><br>

Региональная сеть ПСБ насчитывает около 300 офисов, порядка 8 тыс. банкоматов (включая банкоматы банков-партнеров) и более 200 терминалов самообслуживания по всей России.', '2021-12-02 16:30:00.000000', 'operator.jpg', 10, 'Информация о банке');
INSERT INTO public.psb_info (id, type_info, data_info, date_info, img_info, bonus, title) VALUES (2, 1, '/docs/Приказ 158н.docx', '2021-12-02 12:00:00.000000', null, 2, 'Трудовой договор');
INSERT INTO public.psb_info (id, type_info, data_info, date_info, img_info, bonus, title) VALUES (6, 0, 'Подписание документов в отделе кадров', '2021-12-02 15:00:00.000000', 'meeting.png', 1, 'Кадровая служба');
INSERT INTO public.psb_info (id, type_info, data_info, date_info, img_info, bonus, title) VALUES (5, 0, 'Подписание ведомости по технике безопасности   ', '2021-12-02 11:10:00.000000', 'meeting.png', 1, 'Отдел безопасности');
INSERT INTO public.psb_info (id, type_info, data_info, date_info, img_info, bonus, title) VALUES (4, 4, 'https://yandex.ru', '2021-12-02 11:10:00.000000', null, 4, 'Структура и функции БИТ');
INSERT INTO public.psb_info (id, type_info, data_info, date_info, img_info, bonus, title) VALUES (7, 0, 'Сегодня тебе предстоит знакомство с офисом. <br>Время встречи : 11:00.<br>', '2021-12-04 12:00:00.000000', 'meeting.png', 1, 'Знакомство с офисом');
INSERT INTO public.psb_info (id, type_info, data_info, date_info, img_info, bonus, title) VALUES (3, 2, '/docs/Приказ 404ан.docx', '2021-12-02 13:15:00.000000', null, 3, 'Должностная инструкция программиста');