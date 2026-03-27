CREATE DATABASE IF NOT EXISTS astoncv
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE astoncv;


CREATE TABLE cvs (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  keyprogramming VARCHAR(255) DEFAULT NULL,
  profile TEXT DEFAULT NULL,
  education TEXT DEFAULT NULL,
  URLlinks TEXT DEFAULT NULL,
  phone VARCHAR(50) DEFAULT NULL,
  location VARCHAR(100) DEFAULT NULL,
  skills TEXT DEFAULT NULL,
  experience TEXT DEFAULT NULL,
  projects TEXT DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Password for ALL users = password123

INSERT INTO cvs (
  name, email, password, keyprogramming,
  profile, education, URLlinks,
  phone, location, skills, experience, projects
) VALUES

-- 1
(
  'Sarla Chadda',
  'sarla@example.com',
  '$2y$10$8zGZJxUjG0R8rYF5WcP8Re6yWk3Cw9O2uPzXzV7ZrF9lqZqvP8T8a',
  'Python',
  'Experienced educator with strong background in academic leadership.',
  'M.Ed in Education Management',
  'linkedin.com/sarla',
  '9876543210',
  'Pune',
  'Leadership, Curriculum Design',
  '20+ years in education sector',
  'School transformation initiatives'
),

-- 2
(
  'Mona Aggarwal',
  'mona@example.com',
  '$2y$10$8zGZJxUjG0R8rYF5WcP8Re6yWk3Cw9O2uPzXzV7ZrF9lqZqvP8T8a',
  'Java',
  'Passionate about innovation in education and curriculum development.',
  'Masters in Psychology',
  'linkedin.com/mona',
  '9123456780',
  'Pune',
  'Public Speaking, Counseling',
  'Founder and education leader',
  'Multiple school initiatives'
),

-- 3
(
  'Selvi Kumar',
  'selvi@example.com',
  '$2y$10$8zGZJxUjG0R8rYF5WcP8Re6yWk3Cw9O2uPzXzV7ZrF9lqZqvP8T8a',
  'C++',
  'Aspiring young author and creative thinker.',
  'High School Student',
  'instagram.com/selvi',
  '9000000001',
  'Chennai',
  'Writing, Creativity',
  'Student author',
  'Pre-teen book publication'
),

-- 4
(
  'Devi Vishwakumar',
  'devi@example.com',
  '$2y$10$8zGZJxUjG0R8rYF5WcP8Re6yWk3Cw9O2uPzXzV7ZrF9lqZqvP8T8a',
  'JavaScript',
  'Confident and ambitious student with strong academic goals.',
  'High School',
  'github.com/devi',
  '9000000002',
  'California',
  'Debate, Leadership',
  'School projects and competitions',
  'Student-led initiatives'
),

-- 5
(
  'Lara Jean Covey',
  'lara@example.com',
  '$2y$10$8zGZJxUjG0R8rYF5WcP8Re6yWk3Cw9O2uPzXzV7ZrF9lqZqvP8T8a',
  'HTML/CSS',
  'Creative writer with a love for storytelling and design.',
  'High School',
  'portfolio.com/lara',
  '9000000003',
  'USA',
  'Writing, Design',
  'Creative projects',
  'Personal blog and letters'
),

-- 6
(
  'Hermione Granger',
  'hermione@example.com',
  '$2y$10$8zGZJxUjG0R8rYF5WcP8Re6yWk3Cw9O2uPzXzV7ZrF9lqZqvP8T8a',
  'Python',
  'Highly intelligent and disciplined student with exceptional analytical skills.',
  'Hogwarts School of Witchcraft and Wizardry',
  'wizardingworld.com/hermione',
  '9000000004',
  'London',
  'Research, Logic, Problem Solving',
  'Academic excellence',
  'Time-turner based projects'
);