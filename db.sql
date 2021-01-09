create table contacts
(
    id           bigint unsigned auto_increment
        primary key,
    name         varchar(255) not null,
    phone_number varchar(255) not null,
    address      varchar(255) not null,
    created_at   timestamp    null,
    updated_at   timestamp    null,
    email        varchar(100) null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Rana Wilder', '+1 (678) 233-5624', 'Est sint ex numquam ', '2021-01-04 16:13:01', '2021-01-04 16:13:01',
        'wyryrihe@mailinator.com');
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Stephanie Rojas', '+1 (478) 902-7501', 'Cillum id quos offic', null, null, null);
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Paloma Campbell', '+1 (138) 214-8267', 'Nostrum enim similiq', null, null, null);
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Hamilton Hampton', '+1 (927) 324-6141', 'Consequat Facilis n', null, null, 'fezifuli@mailinator.com');
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Carolyn Mcmahon', '+1 (557) 633-8978', 'Harum quis ex offici', null, null, null);
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Nadine Berry', '+1 (447) 231-8979', 'Doloribus aut enim e', null, null, 'mekab@mailinator.com');
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Chanda Finch', '+1 (713) 849-6223', 'Et fugiat dolor hic', null, null, 'pojugut@mailinator.com');
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Elvis Glenn', '+1 (988) 899-9901', 'Iusto commodi repreh', null, null, 'majaner@mailinator.com');
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Signe Chen', '+1 (813) 782-4023', 'Ullamco in consectet', null, null, 'gizumu@mailinator.com');
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Bruce Fisher', '+1 (853) 504-4281', 'Nemo tenetur quia se', null, null, 'loxarico@mailinator.com');
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Kylynn Gallagher updated', '+1 (233) 472-2725', 'Et voluptate quod eu', null, null,
        'falatebex@mailinator.com');
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Mufutau Kemp', '+1 (636) 237-7599', 'Qui aut quas dolores', null, null, 'gypedyhah@mailinator.com');
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Stacy Owen', '+1 (278) 986-6715', 'Officiis necessitati', null, null, 'pygijode@mailinator.com');
INSERT INTO contact_db.contacts (name, phone_number, address, created_at, updated_at, email)
VALUES ('Rachel Phelps', '+1 (874) 501-1089', 'Perspiciatis est ap', null, null, 'cypehuco@mailinator.com');
