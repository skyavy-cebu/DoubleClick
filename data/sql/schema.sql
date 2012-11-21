CREATE TABLE admin (id INT UNSIGNED AUTO_INCREMENT, name VARCHAR(100) NOT NULL, email VARCHAR(80) NOT NULL, password VARCHAR(50) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE city (id SMALLINT UNSIGNED AUTO_INCREMENT, state_id SMALLINT UNSIGNED NOT NULL, name VARCHAR(50) NOT NULL, INDEX state_id_idx (state_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE feedback (id INT UNSIGNED AUTO_INCREMENT, customer_name VARCHAR(80) NOT NULL, body LONGBLOB, publish_date DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE mailmagazine (id INT UNSIGNED AUTO_INCREMENT, title VARCHAR(150) NOT NULL, content TEXT, publish_date DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE newsletter (id BIGINT UNSIGNED AUTO_INCREMENT, teacher_id BIGINT UNSIGNED NOT NULL, title VARCHAR(150) NOT NULL, content LONGBLOB, publish_date DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX teacher_id_idx (teacher_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE newsletter_x_student (newsletter_id BIGINT UNSIGNED, student_id BIGINT UNSIGNED, PRIMARY KEY(newsletter_id, student_id)) ENGINE = INNODB;
CREATE TABLE page (id TINYINT UNSIGNED AUTO_INCREMENT, title VARCHAR(150) NOT NULL, image1 VARCHAR(100), image2 VARCHAR(100), body LONGBLOB, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE settlement (id BIGINT UNSIGNED, status ENUM('0', '1', '2', '3') DEFAULT '0' NOT NULL, price DECIMAL(9, 2) DEFAULT 0.00 NOT NULL, paid_at DATETIME, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE state (id SMALLINT UNSIGNED AUTO_INCREMENT, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE student (id BIGINT UNSIGNED AUTO_INCREMENT, name VARCHAR(100) NOT NULL, furigana VARCHAR(100), email VARCHAR(80) NOT NULL, password VARCHAR(50), status ENUM('0', '1', '2', '3', '4') DEFAULT '0' NOT NULL, login_type ENUM('0', '1') DEFAULT '0' NOT NULL, zipcode1 VARCHAR(3), zipcode2 VARCHAR(4), state_id SMALLINT UNSIGNED NOT NULL, city_id SMALLINT UNSIGNED, address VARCHAR(150), contact VARCHAR(20), picture VARCHAR(42), activation VARCHAR(255), updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX city_id_idx (city_id), INDEX state_id_idx (state_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE subscription (id BIGINT AUTO_INCREMENT, student_id BIGINT UNSIGNED NOT NULL, subscription_plan_id INT UNSIGNED NOT NULL, settlement_id BIGINT UNSIGNED NOT NULL, is_active TINYINT DEFAULT '0' NOT NULL, valid_until DATETIME, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX teacher_id_idx (teacher_id), INDEX student_id_idx (student_id), INDEX settlement_id_idx (settlement_id), INDEX subscription_plan_id_idx (subscription_plan_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE subscription_plan (id INT UNSIGNED AUTO_INCREMENT, teacher_id BIGINT UNSIGNED NOT NULL, name VARCHAR(255) NOT NULL, duration TINYINT DEFAULT '0' NOT NULL, price DECIMAL(9, 2) DEFAULT 0.00 NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX teacher_id_idx (teacher_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE teacher (id BIGINT UNSIGNED AUTO_INCREMENT, title VARCHAR(100) NOT NULL, email VARCHAR(80) NOT NULL, password VARCHAR(50) NOT NULL, sender_email VARCHAR(80) NOT NULL, portfolio TEXT, details TEXT, change_password VARCHAR(255), updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE topic (id INT UNSIGNED AUTO_INCREMENT, title VARCHAR(255) NOT NULL, pdf_filename VARCHAR(50) NOT NULL, publish_date DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE city ADD CONSTRAINT city_state_id_state_id FOREIGN KEY (state_id) REFERENCES state(id);
ALTER TABLE newsletter ADD CONSTRAINT newsletter_teacher_id_teacher_id FOREIGN KEY (teacher_id) REFERENCES teacher(id);
ALTER TABLE newsletter_x_student ADD CONSTRAINT newsletter_x_student_student_id_student_id FOREIGN KEY (student_id) REFERENCES student(id);
ALTER TABLE newsletter_x_student ADD CONSTRAINT newsletter_x_student_newsletter_id_newsletter_id FOREIGN KEY (newsletter_id) REFERENCES newsletter(id);
ALTER TABLE student ADD CONSTRAINT student_state_id_state_id FOREIGN KEY (state_id) REFERENCES state(id);
ALTER TABLE student ADD CONSTRAINT student_city_id_city_id FOREIGN KEY (city_id) REFERENCES city(id);
ALTER TABLE subscription ADD CONSTRAINT subscription_teacher_id_teacher_id FOREIGN KEY (teacher_id) REFERENCES teacher(id);
ALTER TABLE subscription ADD CONSTRAINT subscription_subscription_plan_id_subscription_plan_id FOREIGN KEY (subscription_plan_id) REFERENCES subscription_plan(id);
ALTER TABLE subscription ADD CONSTRAINT subscription_student_id_student_id FOREIGN KEY (student_id) REFERENCES student(id);
ALTER TABLE subscription ADD CONSTRAINT subscription_settlement_id_settlement_id FOREIGN KEY (settlement_id) REFERENCES settlement(id);
ALTER TABLE subscription_plan ADD CONSTRAINT subscription_plan_teacher_id_teacher_id FOREIGN KEY (teacher_id) REFERENCES teacher(id);
