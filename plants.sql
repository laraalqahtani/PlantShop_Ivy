-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2023 at 10:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plants`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminuser` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminuser`, `Password`, `aid`) VALUES
('hadeel', 'hadeel123', 1),
('lara', 'lara123', 2),
('lama', 'lama123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `pid` int(11) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `Picture` varchar(1000) NOT NULL,
  `Descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`pid`, `pname`, `Quantity`, `price`, `Picture`, `Descr`) VALUES
(110000, 'bamboo', 118, '190', 'Bamboo.png', 'Dracaena sanderiana is a species of flowering plant in the family Asparagaceae, native to Central Africa. It was named after the German–English gardener Henry Frederick Conrad Sander. The plant is commonly marketed as \"lucky bamboo\"'),
(110076, 'Fiddle leaf', 109, '340', 'Fiddle_leaf.png', 'Ficus lyrata, commonly known as the fiddle-leaf fig, is a species of flowering plant in the mulberry and fig family Moraceae. It is native to western Africa, from Cameroon west to Sierra Leone, where it grows in lowland tropical rainforest. It can grow up to 12–15 m tall.'),
(110093, 'Strelitzia', 109, '280', 'Strelitzia.png', 'Strelitzia is a genus of five species of perennial plants, native to South Africa. It belongs to the plant family Strelitziaceae. A common name of the genus is bird of paradise flower/plant, because of a resemblance of its flowers to birds-of-paradise. In South Africa, it is commonly known as a crane flower.'),
(110094, 'succulent', 112, '320', 'succulent.png', 'In botany, succulent plants, also known as succulents, are plants with parts that are thickened, fleshy, and engorged, usually to retain water in arid climates or soil conditions. The word succulent comes from the Latin word sucus, meaning \"juice\" or \"sap\"'),
(110095, 'Yucca', 117, '230', 'Yucca.png', 'Yucca is a genus of perennial shrubs and trees in the family Asparagaceae, subfamily Agavoideae. Its 40–50 species are notable for their rosettes of evergreen, tough, sword-shaped leaves and large terminal panicles of white or whitish flowers. They are native to the hot and dry parts of the Americas and the Caribbean'),
(110096, 'Caladium ', 142, '120', 'Caladium.png', 'Caladiums are tropical perennials with colorful, heart-shaped leaves native to tropical forests in South and Central America that have pronounced wet and dry seasons. Caladium bicolor, a Brazilian species, is the most common of several species in this genus in the arum family (Araceae) that are used as ornamentals.'),
(110097, 'Banana plant', 110, '190', 'Banana_plant.png', 'Musa is one of two or three genera in the family Musaceae. The genus includes flowering plants producing edible bananas and plantains. Around 70 species of Musa are known, with a broad variety of uses.'),
(110099, 'Aloe Vera', 113, '190', 'Aloevera.png', 'Aloe vera is a succulent plant species of the genus Aloe. It is widely distributed, and is considered an invasive species in many world regions. An evergreen perennial, it originates from the Arabian Peninsula, but grows wild in tropical, semi-tropical, and arid climates around the world.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234567891;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
