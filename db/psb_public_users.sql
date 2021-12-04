create table users
(
    id       integer not null
        constraint users_pk
            primary key,
    username varchar(180),
    roles    json,
    password varchar(255),
    salt     varchar(255)
);

alter table users
    owner to postgres;

INSERT INTO public.users (id, username, roles, password, salt) VALUES (3, 'admin', '["ROLE_ADMIN"]', 'zG7qV2BMyPDuW5HcXrdFenmYag80jm8r8BliTN0Vv37OAA9VtD47ro4Ks/+OLf18XL7gyHFnybqwdQIfhAGPXg==', '1624009886');
INSERT INTO public.users (id, username, roles, password, salt) VALUES (2, 'teacher', '["ROLE_TEACHER"]', 'zG7qV2BMyPDuW5HcXrdFenmYag80jm8r8BliTN0Vv37OAA9VtD47ro4Ks/+OLf18XL7gyHFnybqwdQIfhAGPXg==', '1624009886');
INSERT INTO public.users (id, username, roles, password, salt) VALUES (1, 'user', '["ROLE_USER"]', 'zG7qV2BMyPDuW5HcXrdFenmYag80jm8r8BliTN0Vv37OAA9VtD47ro4Ks/+OLf18XL7gyHFnybqwdQIfhAGPXg==', '1624009886');
INSERT INTO public.users (id, username, roles, password, salt) VALUES (4, 'user2', '["ROLE_USER"]', 'zG7qV2BMyPDuW5HcXrdFenmYag80jm8r8BliTN0Vv37OAA9VtD47ro4Ks/+OLf18XL7gyHFnybqwdQIfhAGPXg==', '1624009886');
INSERT INTO public.users (id, username, roles, password, salt) VALUES (5, 'user3', '["ROLE_USER"]', 'zG7qV2BMyPDuW5HcXrdFenmYag80jm8r8BliTN0Vv37OAA9VtD47ro4Ks/+OLf18XL7gyHFnybqwdQIfhAGPXg==', '1624009886');