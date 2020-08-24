-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2020 at 02:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdm_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `hamburger`
--
 

--
-- Dumping data for table `hamburger`
--

INSERT INTO `hamburgers` (`shopid`, `name`, `photo`, `bread_type`, `recipies`, `total_sold`, `price`, `burgerid`) VALUES
('1', '50/50 burger', 'resources/burguer1.png', 'Multigrain', 'Freshh beef patty with pickels on it', 0, 25, 1),
('1', 'Kiwiburger', 'resources/burguer2.2.png', 'Wheat', 'Popular regional hamburger ingredients in Australia and New Zealand include canned beetroot, pineapple and a fried egg.', 0, 10, 2),
('1', 'Bacon cheeseburger', 'resources/burguer2.png', 'Multigrain', 'Hamburger with bacon and cheese ', 0, 25, 3),
('1', 'Barbecue burger', 'resources/burguer3.png', 'Wheat', 'Prepared with ground beef, mixed with onions and barbecue sauce, and then grilled.', 0, 20, 4),
('1', 'Buffalo burger', 'resources/ham1.jpg', 'Wheat', 'Prepared with meat from the American Bison', 0, 10, 6),
('1', 'California burger', 'resources/ham3.jpg', 'Multigrain', 'hamburger served with lettuce, tomato, and onion', 0, 16, 7),
('1', 'Cheeseburger', 'resources/ham4.jpg', 'Wheat', 'Hamburger accompanied with melted cheese', 0, 15, 8),
('1', 'Green chile burger', 'resources/hamburguesa2.jpg', 'Wheat', 'Burger topped with Roasted New Mexico chiles.', 0, 15, 10),
('1', 'Hawaii burger', 'resources/hamburguesa4.jpg', 'Multigrain', 'Topped with pineapple and often teriyaki sauce', 0, 25, 11),
('1', 'Kimchi burger', 'resources/hamburguesa5.jpg', 'Wheat', 'A hamburger that includes kimchi in its preparation', 0, 15, 12),
('1', 'Patty melt', 'resources/hamburguesa6.jpg', 'Wheat', 'Hamburger sandwich consisting of a ground beef patty, pieces of sautÃ©ed or grilled onion and Cheddar or Swiss cheese between two slices of bread', 0, 20, 13),
('1', 'Rice burger', 'resources/hamburguesa7.jpg', 'Wheat', 'Style of hamburger in which the bun is a compressed cake of rice', 0, 20, 14),
('1', 'Slopper', 'resources/hamburguesa9.jpg', 'Wheat', 'Cheeseburger, or hamburger served open-faced and smothered in red chile, or green chile (aka chile verde or green chile sauce). Sloppers', 0, 10, 15),
('1', 'Steak burger', 'resources/hamburguesa10.jpg', 'wheat', 'Typically prepared with ground, sliced or minced beefsteak meat.', 0, 16, 16),
('1', 'Steamed cheeseburger', 'resources/hamburguesa11.jpg', 'Wheat', 'Instead of being fried in a pan or grilled on a grill, a steamed cheeseburger is steamed in a stainless-steel cabinet', 0, 10, 17),
('1', 'Teriyaki burger', 'resources/hamburguesa12.jpg', 'wheat', 'topped with teriyaki sauce or with the sauce worked into the ground meat patty.', 0, 12, 18),
('1', 'Veggie burger', 'resources/hamburguesa13.jpg', 'wheat', 'Veggie burger, garden burger, or tofu burger uses a meat analogue, a meat substitute such as tofu, textured vegetable protein, seitan (wheat gluten), Quorn, beans, grains or an assortment of vegetables, which are ground up and formed into patties.', 0, 10, 19),
('1', 'Luger Burger', 'resources/hamburguesa14.jpg', 'wheat', 'Luger Burger features extra thick bacon and more than a half pound of beef.', 0, 12, 20),
('1', 'Le Pigeon Burger', 'resources/hamburguesa15.jpg', 'wheat', 'The grilled Le Pigeon Burger has a nice, smoky flavor that is enhanced with each topping.', 0, 15, 21),
('1', 'Double Animal Style', 'resources/hamburguesa16.jpg', 'wheat', 'added pickles, extra spread with grilled onions, and theyâ€™ll fry some mustard onto your patties.', 0, 18, 22),
('1', 'Whiskey King Burger', 'resources/hamburguesa17.jpg', 'wheat', 'Itâ€™s topped with maple bourbon glazed cipollini, bleu cheese, bacon, and a bit of foie gras. Sweet, fatty, and decadent.', 0, 10, 23),
('1', 'The Company Burger', 'resources/hamburguesa18.jpg', 'wheat', 'Two patties and tons of flavor.', 0, 5, 24),
('1', 'Chargrilled Burger', 'resources/hamburguesa19.jpg', 'wheat', 'burger is served with mustard, onion, and pickles, and worth any impending health problems.', 0, 18, 25),
('1', 'The Lola Burger', 'resources/hamburguesa20.jpg', 'wheat', 'runny egg, some spicy ketchup, and a bit of bacon,', 0, 20, 26),
('1', 'Raw Steak Tartare Burger', 'resources/hamburguesa21.jpg', 'wheat', 'The Raw Steak Tartare is obviously a bit different from your everyday hamburger, but the fried egg and smoky mayo just make it incredible. Like a steak tartare appetizer on a bun.', 0, 10, 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hamburger`
--
ALTER TABLE `hamburgers`
  ADD PRIMARY KEY (`burgerid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
