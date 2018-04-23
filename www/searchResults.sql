-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2018 at 02:25 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `searchResults`
--

-- --------------------------------------------------------

--
-- Table structure for table `hot`
--

CREATE TABLE `hot` (
  `category` varchar(50) NOT NULL,
  `count` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `category`, `text`) VALUES
(1, 'Holistic Health', 'The Institute for Holistic Health Studies (IHHS) is dedicated to providing San Francisco State University and the broader community with a deeper understanding of health and healing from a holistic perspective, integrating interdisciplinary ideas and practices from around the world. IHHS is committed to excellence in teaching, research, and service, and to the dissemination of innovative health promotion curricula in higher education.'),
(2, 'Dietetics', 'The Bachelor of Science in Dietetics is an accredited Didactic Program in Dietetics (DPD) and meets the Eligibility Requirements and Accreditation Standards of the Accreditation Council for Education in Nutritional Education of the Academy of Nutrition and Dietetics. The program prepares students for careers in clinical dietetics, foodservice systems management, and nutrition education in hospitals, industry, or government agencies. Most positions require an R.D. (Registered Dietitian). See Certificate in Dietetics section of this bulletin.'),
(3, 'Clínica Martín-Baró', 'Clínica Martín-Baró is a student-organized free clinic operating Saturdays out of the Mission Neighborhood Centers, Inc. It is a collaboration between medical students and faculty from the UCSF School of Medicine, and undergraduates from the SFSU Latin@ Studies Department. We work together to serve while learning about the social and medical conditions facing immigrants. We provide a space for student volunteers to develop and strengthen a socio-economic analysis of the state of healthcare in the U.S, and an educational environment to create life-long advocates for underserved communities. '),
(4, 'HPW', 'The mission of SFSU’s Health Promotion & Wellness (HP&W) unit is to achieve health equity and enhance academic, personal, and professional success for all members of the SF State community. Using a socio-ecological perspective and practicing with cultural humility, we aim to positively shift culture and social norms around health and wellness and to increase students’ self-efficacy to make informed health decisions. Our team is made up of health educators who focus on areas including sexual health, mental health, alcohol and other drugs, sexual violence prevention, men’s health issues, nutrition, and overall health and wellness. We coordinate the Health Promotion & Wellness Peer Health Internship and Health Promotion & Wellness Ambassador programs which support the development of health leaders who partner with us in addressing campus health needs. Other events and workshops include: sexual violence prevention education trainings, CalFresh enrollment assistance, Late Night “Turn Up!” social events, and Tobacco Free Tuesdays. HP&W is located in the Cesar Chavez Student Center, M-113C. Online information and resources related to health and wellness can be found at wellness.sfsu.edu. ?\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hot`
--
ALTER TABLE `hot`
  ADD PRIMARY KEY (`category`),
  ADD UNIQUE KEY `category` (`category`),
  ADD KEY `category2` (`category`),
  ADD KEY `count` (`count`);
ALTER TABLE `hot` ADD FULLTEXT KEY `category3` (`category`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
