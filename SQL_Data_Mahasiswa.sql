CREATE DATABASE db_mahasiswa;

USE db_mahasiswa;

CREATE TABLE mahasiswa(
	NIM VARCHAR(255),
	nama VARCHAR(255),
	program_studi VARCHAR(255),
	PRIMARY KEY (NIM)
);