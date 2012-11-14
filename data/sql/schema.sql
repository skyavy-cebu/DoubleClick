CREATE TABLE admin (id INT UNSIGNED AUTO_INCREMENT, name VARCHAR(100) NOT NULL, email VARCHAR(80) NOT NULL, password VARCHAR(50) NOT NULL, updated_at DATETIME, created_at DATETIME, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE city (id SMALLINT UNSIGNED AUTO_INCREMENT, state_id SMALLINT UNSIGNED NOT NULL, name VARCHAR(50) NOT NULL, INDEX state_id_idx (state_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE feedback (id INT UNSIGNED AUTO_INCREMENT, customer_name VARCHAR(80) NOT NULL, body LONGBLOB, publish_date DATETIME NOT NULL, updated_at DATETIME, created_at DATETIME, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE mailmagazine (id INT UNSIGNED AUTO_INCREMENT, title VARCHAR(150) NOT NULL, content TEXT, publish_date DATETIME NOT NULL, updated_at DATETIME, created_at DATETIME, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE newsletter (id BIGINT UNSIGNED AUTO_INCREMENT, teacher_id BIGINT UNSIGNED NOT NULL, title VARCHAR(150) NOT NULL, content LONGBLOB, publish_date DATETIME NOT NULL, updated_at DATETIME, created_at DATETIME, INDEX teacher_id_idx (teacher_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE newsletter_admin (id INT UNSIGNED AUTO_INCREMENT, admin_id INT UNSIGNED NOT NULL, title VARCHAR(150) NOT NULL, content TEXT, publish_date DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX admin_id_idx (admin_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE newsletter_teacher (id INT UNSIGNED AUTO_INCREMENT, teacher_id INT UNSIGNED NOT NULL, title VARCHAR(150) NOT NULL, content TEXT, publish_date DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX teacher_id_idx (teacher_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE newsletter_x_student (newsletter_id BIGINT UNSIGNED, student_id BIGINT UNSIGNED, PRIMARY KEY(newsletter_id, student_id)) ENGINE = INNODB;
CREATE TABLE page (id TINYINT UNSIGNED AUTO_INCREMENT, title VARCHAR(150) NOT NULL, image1 VARCHAR(100), image2 VARCHAR(100), body LONGBLOB, updated_at DATETIME, created_at DATETIME, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE state (id SMALLINT UNSIGNED AUTO_INCREMENT, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE student (id BIGINT UNSIGNED AUTO_INCREMENT, name VARCHAR(100) NOT NULL, furigana VARCHAR(100), email VARCHAR(80) NOT NULL, password VARCHAR(50), login_type ENUM('0', '1') DEFAULT '0' NOT NULL, zipcode1 VARCHAR(3), zipcode2 VARCHAR(4), address VARCHAR(150), state_id SMALLINT UNSIGNED NOT NULL, city_id SMALLINT UNSIGNED, contact VARCHAR(20), picture VARCHAR(42), status ENUM('0', '1', '2', '3', '4') DEFAULT '0' NOT NULL, activation VARCHAR(255), updated_at DATETIME, created_at DATETIME, INDEX city_id_idx (city_id), INDEX state_id_idx (state_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE subscription (teacher_id BIGINT UNSIGNED, student_id BIGINT UNSIGNED, status ENUM('0', '1', '2') DEFAULT '2' NOT NULL, duration ENUM('0', '1', '2') DEFAULT '0' NOT NULL, price INT UNSIGNED DEFAULT '0' NOT NULL, valid_until DATETIME, modified_at DATETIME, created_at DATETIME, PRIMARY KEY(teacher_id, student_id)) ENGINE = INNODB;
CREATE TABLE teacher (id BIGINT UNSIGNED AUTO_INCREMENT, title VARCHAR(100) NOT NULL, email VARCHAR(80) NOT NULL, password VARCHAR(50) NOT NULL, portfolio TEXT, details TEXT, updated_at DATETIME, created_at DATETIME, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE topic (id INT UNSIGNED AUTO_INCREMENT, title VARCHAR(255) NOT NULL, pdf_filename VARCHAR(50) NOT NULL, publish_date DATETIME NOT NULL, updated_at DATETIME, created_at DATETIME, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user (id INT UNSIGNED AUTO_INCREMENT, role ENUM('0', '1', '2') DEFAULT '0', status ENUM('0', '1', '2', '3', '4') DEFAULT '0', email VARCHAR(80) NOT NULL UNIQUE, password VARCHAR(32) NOT NULL, name VARCHAR(100) NOT NULL, state_id SMALLINT UNSIGNED, city_id SMALLINT UNSIGNED, request_code VARCHAR(32), login_type ENUM('0', '1', '2') DEFAULT '0', picture VARCHAR(42) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX state_id_idx (state_id), INDEX city_id_idx (city_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE city ADD CONSTRAINT city_state_id_state_id FOREIGN KEY (state_id) REFERENCES state(id);
ALTER TABLE newsletter ADD CONSTRAINT newsletter_teacher_id_teacher_id FOREIGN KEY (teacher_id) REFERENCES teacher(id);
ALTER TABLE newsletter_admin ADD CONSTRAINT newsletter_admin_admin_id_admin_id FOREIGN KEY (admin_id) REFERENCES admin(id) ON DELETE CASCADE;
ALTER TABLE newsletter_teacher ADD CONSTRAINT newsletter_teacher_teacher_id_teacher_id FOREIGN KEY (teacher_id) REFERENCES teacher(id) ON DELETE CASCADE;
ALTER TABLE newsletter_x_student ADD CONSTRAINT newsletter_x_student_student_id_student_id FOREIGN KEY (student_id) REFERENCES student(id);
ALTER TABLE newsletter_x_student ADD CONSTRAINT newsletter_x_student_newsletter_id_newsletter_id FOREIGN KEY (newsletter_id) REFERENCES newsletter(id);
ALTER TABLE student ADD CONSTRAINT student_state_id_state_id FOREIGN KEY (state_id) REFERENCES state(id);
ALTER TABLE student ADD CONSTRAINT student_city_id_city_id FOREIGN KEY (city_id) REFERENCES city(id);
ALTER TABLE subscription ADD CONSTRAINT subscription_teacher_id_teacher_id FOREIGN KEY (teacher_id) REFERENCES teacher(id);
ALTER TABLE subscription ADD CONSTRAINT subscription_student_id_student_id FOREIGN KEY (student_id) REFERENCES student(id);
ALTER TABLE user ADD CONSTRAINT user_state_id_state_id FOREIGN KEY (state_id) REFERENCES state(id) ON DELETE SET NULL;
ALTER TABLE user ADD CONSTRAINT user_city_id_city_id FOREIGN KEY (city_id) REFERENCES city(id) ON DELETE SET NULL;
