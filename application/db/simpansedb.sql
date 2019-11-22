drop database simpanse;
create database simpanse;

create table users(
	id SERIAL primary key not null,
	username varchar(25),
	password varchar(255)
);

create type jenis_kelamin as enum('L', 'P');
create type role_praktisi as enum('Manajer', 'Praktisi');

create table praktisi_medis(
	id SERIAL primary key not null,
	kode_praktisi varchar(10),
	nama varchar(50),
	jk jenis_kelamin,
	role role_praktisi,
	alamat varchar(100),
	hp varchar(15),
	password varchar(255),
	create_at date,
	updated_at date
);


create table pasien(
	id SERIAL primary key not null,
	kode_pasien varchar(10),
	nama varchar(50),
	jk jenis_kelamin,
	umur int,
	berat_badan int,
	riwayat_diabetes double precision
);

create table dataset(
	id SERIAL primary key not null
);

create table pemeriksaan(
	id SERIAL primary key not null,
	tgl_periksa date,
	prediksi int,
	praktisi_medis_id int not null,
	pasien_id int not null,
	dataset_id int not null,
	foreign key (praktisi_medis_id) references praktisi_medis(id),
	foreign key (pasien_id) references pasien(id),
	foreign key (dataset_id) references dataset(id)
);

