create table psb_events
(
    id               serial not null
        constraint psb_events_pk
            primary key,
    event            varchar,
    typ_event        integer
        constraint psb_events_psb_events_types_id_fk
            references psb_events_types,
    text             varchar,
    to_telegr_bot    integer default 0,
    to_email         integer default 0,
    count_ball       integer default 0,
    count_days       double precision,
    event_hyperlink  varchar,
    do_boss          integer default 0,
    do_person        integer default 1,
    begin_days_after integer default 0,
    end_kol_days     integer,
    do_mentor        integer,
    url              integer
);

comment on table psb_events is 'События (справочник)';

alter table psb_events
    owner to postgres;

INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (9, 'Ознакомление с должностной инструкцией', 1, null, 1, 1, 10, 1, '/user/docs/2', 0, 1, 1, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (4, 'Отправка данных о местоположении', 5, 'Мы находимя по адресу: г.Красноярск, ул. Ленина, 43', 1, 1, 10, 1, '', 1, 1, 0, 2, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (5, 'Получение wellcome pack', 5, null, 0, 1, 10, 1, '', 1, 0, 1, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (10, 'Ознакомиться с правилами работы в ИТ управлении', 4, null, 1, 0, 10, 1, null, 0, 1, 0, null, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (45, 'Приветственный кофе', 2, null, 0, 0, 10, 1, '/user/info/1', 1, 1, 3, 1, 1, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (33, 'Где я в структуре', 1, null, 0, 0, 10, 1, '/user/docs/3', 0, 1, 2, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (32, 'Структура и функции БИТ', 1, null, 0, 0, 10, 1, '/user/docs/4', 0, 1, 2, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (13, 'Опрос по результатам приема', 3, null, 1, 0, 10, 1, '/user/testing/1', 1, 0, 1, 1, 1, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (18, 'Подготовить задачи на испытательный срок', 4, null, 0, 0, 5, 1, null, 0, 0, 0, null, 1, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (19, 'Знакомство с офисом', 2, null, 0, 0, 5, 1, '/user/info/7', 1, 1, 1, 1, 1, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (1, 'Направить приветственное письмо', 5, null, 1, 1, 5, 1, null, 1, 0, -2, 0, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (22, 'Оформление базовых доступов', 5, null, 0, 0, 5, 1, null, 0, 0, 1, 1, 1, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (14, 'Ознакомиться с продуктом "Корпоративный портал"', 4, null, 1, 0, 5, 1, null, 0, 1, 11, 21, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (48, 'Развитие компетенций сотрудников', 5, null, 0, 0, 10, 1, null, 1, 1, 3, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (15, 'Ознакомиться с продуктом "Личный кабинет пользователя"', 4, null, 1, 0, 5, 3, null, 0, 1, 5, 10, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (23, 'Доступы к площадкам разработки и тестирование', 5, null, 0, 0, 10, 1, null, 0, 1, 1, 1, 1, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (37, 'Опрос по изученному материалу', 3, null, 0, 0, 10, 1, '/user/testing/1', 1, 1, 2, 1, 1, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (36, 'Активности и специальные проекты', 4, null, 0, 0, 10, 1, null, 0, 1, 2, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (39, 'Заполнить компетенции', 5, null, 0, 0, 10, 1, null, 0, 1, 3, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (8, 'Встреча с руководителем', 2, null, 1, 0, 10, 1, '/user/info/5', 1, 1, 0, 1, 1, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (2, 'Организовать рабочее место', 5, null, 1, 0, 10, 1, null, 1, 0, -2, 0, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (12, 'Ознакомиться с орг структурой', 4, null, 1, 0, 10, 1, null, 0, 1, 0, null, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (7, 'Встреча с менеджером по персоналу', 2, null, 1, 0, 10, 1, '/user/info/6', 0, 1, 1, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (35, 'Инструменты работы', 4, null, 0, 0, 10, 1, null, 0, 1, 2, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (11, 'Подписание трудового договора', 1, null, 0, 0, 10, 1, '/user/docs/1', 0, 1, 1, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (40, 'Заполнить увлечения', 5, null, 0, 0, 10, 1, null, 0, 1, 3, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (38, 'Заполнить информацию о себе', 5, null, 0, 0, 10, 1, null, 0, 1, 3, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (44, 'Коллеги и роли', 4, null, 0, 0, 10, 1, null, 0, 1, 3, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (6, 'Отправка плана на адаптацию в виде таймлайна', 5, null, 1, 1, 10, 1, '', 0, 1, 1, 1, 1, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (46, 'Определение списка необходимого ПО', 4, null, 0, 0, 10, 1, null, 0, 1, 3, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (47, 'Знакомство с инструментами работы и отчетностью', 1, null, 0, 0, 10, 1, null, 0, 1, 3, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (3, 'Составить заявку по правам доступа', 5, null, 1, 0, 10, 1, null, 0, 0, -2, 0, 1, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (41, 'Заполнить цели', 5, null, 0, 0, 10, 1, null, 0, 1, 3, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (42, 'О центре или подразделении', 4, null, 0, 0, 10, 1, null, 0, 1, 3, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (43, 'Зоны ответственности', 4, null, 0, 0, 10, 1, null, 0, 1, 3, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (21, 'Прохождение обязательного инструктажа', 5, null, 0, 0, 10, 1, '', 0, 1, 1, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (28, 'Знакомство с активностями', 4, null, 0, 0, 10, 1, null, 0, 1, 2, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (29, 'Обучение и развитие', 4, null, 0, 0, 10, 1, null, 0, 1, 2, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (30, 'Социальный пакет', 5, null, 0, 0, 10, 1, null, 0, 1, 2, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (24, 'Что тебе доступно в банке', 4, null, 0, 0, 10, 1, null, 0, 1, 2, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (25, 'Что требуется от тебя', 4, null, 0, 0, 10, 1, null, 0, 1, 2, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (26, 'Правила героев ПСБ', 4, null, 0, 0, 10, 1, null, 0, 1, 2, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (34, 'Команда', 4, null, 0, 0, 10, 1, '/user/team/0', 0, 1, 2, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (17, 'Ознакомиться с задачами на адаптацию', 4, null, 1, 0, 5, 1, null, 0, 1, 0, null, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (16, 'Назначение наставника и знакомство', 5, null, 0, 0, 5, 1, '', 1, 0, 1, 1, 0, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (20, 'Отправка контактов встречающего ', 5, null, 1, 1, 5, 1, '', 0, 0, 1, 1, 1, null);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (27, 'Возможности, которые предоставляет банк', 4, null, 0, 0, 10, 1, 'https://www.psbank.ru/Corporate/Everyday/Cards/Salary/Employee', 0, 1, 2, 1, 0, 1);
INSERT INTO public.psb_events (id, event, typ_event, text, to_telegr_bot, to_email, count_ball, count_days, event_hyperlink, do_boss, do_person, begin_days_after, end_kol_days, do_mentor, url) VALUES (31, 'Опрос по изученному материалу', 3, null, 0, 0, 10, 1, '/user/testing/1', 0, 1, 2, 1, 0, null);