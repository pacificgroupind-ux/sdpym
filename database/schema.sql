CREATE DATABASE IF NOT EXISTS saitanpur_college CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE saitanpur_college;

CREATE TABLE IF NOT EXISTS admin_users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(120) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('super_admin','staff','editor') NOT NULL DEFAULT 'editor',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS notices (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  excerpt VARCHAR(255) DEFAULT '',
  notice_date DATE NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS faculty (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  department VARCHAR(120) NOT NULL,
  designation VARCHAR(120) NOT NULL,
  qualification VARCHAR(120) NOT NULL,
  experience INT DEFAULT 0,
  specialization VARCHAR(255) DEFAULT '',
  photo VARCHAR(255) DEFAULT '',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS admissions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  email VARCHAR(120) NOT NULL,
  course VARCHAR(120) NOT NULL,
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS gallery (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(120) DEFAULT '',
  image_path VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  details VARCHAR(255) DEFAULT '',
  event_date DATE NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(120) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admin_users (name,email,password_hash,role) VALUES
('Super Admin','superadmin@abcd.edu.in','$2y$10$MDIXsI4LvN18.a4ecLfrYu5x8EeHiZdUGyiXJgW7n4CUxI5I5n5Za','super_admin'),
('Staff Admin','staff@abcd.edu.in','$2y$10$MDIXsI4LvN18.a4ecLfrYu5x8EeHiZdUGyiXJgW7n4CUxI5I5n5Za','staff'),
('Editor Admin','editor@abcd.edu.in','$2y$10$MDIXsI4LvN18.a4ecLfrYu5x8EeHiZdUGyiXJgW7n4CUxI5I5n5Za','editor')
ON DUPLICATE KEY UPDATE email=email;

INSERT INTO students (name,email,password_hash) VALUES
('Demo Student','student@abcd.edu.in','$2y$10$MDIXsI4LvN18.a4ecLfrYu5x8EeHiZdUGyiXJgW7n4CUxI5I5n5Za')
ON DUPLICATE KEY UPDATE email=email;

INSERT INTO notices (title,excerpt,notice_date) VALUES
('UG Admission Open 2026','Applications invited for UG programs','2026-06-01'),
('NSS Camp Registration','Register by 15th July','2026-07-05');

INSERT INTO faculty (name,department,designation,qualification,experience,specialization,photo) VALUES
('Dr. Meera Singh','Science','Associate Professor','Ph.D. Chemistry',12,'Organic Chemistry','https://via.placeholder.com/400x240?text=Dr+Meera'),
('Prof. Rakesh Kumar','Commerce','Assistant Professor','M.Com, NET',8,'Accounting & Taxation','https://via.placeholder.com/400x240?text=Prof+Rakesh');

INSERT INTO gallery (title,image_path) VALUES
('Campus Front','https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=800&q=80'),
('Library Hall','https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=800&q=80');
