create table psb_tasks
(
    id       integer not null
        constraint psb_tasks_pk
            primary key,
    task     varchar,
    answer1  varchar,
    answer2  varchar,
    answer3  varchar,
    answer4  varchar,
    bonus    integer,
    img_task varchar,
    id_test  integer
        constraint psb_tasks_psb_tests_id_fk
            references psb_tests
);

alter table psb_tasks
    owner to postgres;

create unique index psb_tasks_id_uindex
    on psb_tasks (id);

INSERT INTO public.psb_tasks (id, task, answer1, answer2, answer3, answer4, bonus, img_task, id_test) VALUES (3, 'В какое структурное подразделение необходимо обращаться в случаи спам атаки?  ', 'Бухгалтерию', 'Отдел разработки ИТ', 'Кадровая служба', 'Отдел информационной безопасности ', 1, null, 1);
INSERT INTO public.psb_tasks (id, task, answer1, answer2, answer3, answer4, bonus, img_task, id_test) VALUES (2, 'Обязанности специалиста определяются?', 'Штатным расписанием', 'Уставом компании', 'Должносной инструкцией', 'Все варианты верны', 1, null, 1);
INSERT INTO public.psb_tasks (id, task, answer1, answer2, answer3, answer4, bonus, img_task, id_test) VALUES (1, 'Сколько подразделений в ИТ управление банка?', 'Один', 'Два', 'Три', 'Четыре', 1, null, 1);