CREATE DATABASE IF NOT EXISTS uas_pbw_perpustakaan;
USE uas_pbw_perpustakaan;

DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'admin'
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    penerbit VARCHAR(100) NOT NULL,
    tahun INT NOT NULL,
    kategori VARCHAR(50) NOT NULL
);

INSERT INTO users (nama, username, password, role)
VALUES ('Administrator', 'admin', MD5('admin123'), 'admin');

INSERT INTO books (judul, penulis, penerbit, tahun, kategori)
VALUES
('Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005, 'Novel'),
('Bumi Manusia', 'Pramoedya Ananta Toer', 'Hasta Mitra', 1980, 'Sejarah'),
('Negeri 5 Menara', 'Ahmad Fuadi', 'Gramedia', 2009, 'Novel');