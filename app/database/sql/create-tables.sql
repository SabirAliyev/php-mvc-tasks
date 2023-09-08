create table tasks
(
    id          serial  primary key,
    title       varchar not null,
    description text    not null,
    completed   boolean default false
);

alter table tasks owner to postgres;