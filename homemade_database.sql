-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2014 at 03:28 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `homemade_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `hm_category`
--

CREATE TABLE IF NOT EXISTS `hm_category` (
`category_id` int(11) NOT NULL,
  `category_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `hm_category`
--

INSERT INTO `hm_category` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Chinese', 'img/category/chinese.jpg'),
(2, 'African', 'img/category/african.jpg'),
(3, 'Italian', 'img/category/italian.jpg'),
(4, 'Greek', 'img/category/greek.jpg'),
(5, 'Mexican', 'img/category/mexican.jpg'),
(6, 'Lebanese', 'img/category/lebanese.jpg'),
(7, 'Argentinian', 'img/category/argentinian.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hm_cook`
--

CREATE TABLE IF NOT EXISTS `hm_cook` (
`cook_id` int(11) NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `cook_description` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `marker_id` int(11) NOT NULL,
  `cook_status_id` int(11) NOT NULL,
  `cook_rating_id` int(11) NOT NULL,
  `cook_photo` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `hm_cook`
--

INSERT INTO `hm_cook` (`cook_id`, `email`, `hash`, `salt`, `first_name`, `last_name`, `cook_description`, `phone_number`, `marker_id`, `cook_status_id`, `cook_rating_id`, `cook_photo`) VALUES
(29, 'ramsay@gmail.com', '1554b8e800d5ef78eb50490ad692c0022371cebe', 'l5bviMEm', 'Gordon', 'Ramsay', 'Duis commodo tempor mauris, at facilisis nisi porttitor ultrices. Fusce egestas ante nec maximus accumsan. Ut ut urna quis lectus iaculis vestibulum sed vitae odio. Donec eu velit sed dolor mollis dignissim. Donec at consectetur massa, sed tempor eros. Aenean eros tellus, rhoncus vitae urna sed, mollis porta purus. Vestibulum interdum mauris id rutrum blandit. Donec sed sapien tempus, posuere risus pellentesque, varius lectus. Sed augue orci, iaculis in justo vitae, tristique malesuada magna. Sed pellentesque, mi sit amet tempus tincidunt, ligula mauris aliquam ligula, luctus vestibulum tellus justo sit amet mi. Duis in tempus metus. Vivamus lobortis, lorem at cursus molestie, est justo ultricies nisl, id mattis diam erat a sem. Nunc pretium finibus lectus sed pharetra.', '413 333 3232', 89, 2, 16, 'img/chef/54768d071e064.jpg'),
(30, 'perkins@yahoo.com', '60a3e98e41f5b7a9ec8690c0dad01072448b68c7', 'a2nflGYo', 'Ted', 'Perkins', 'Duis commodo tempor mauris, at facilisis nisi porttitor ultrices. Fusce egestas ante nec maximus accumsan. Ut ut urna quis lectus iaculis vestibulum sed vitae odio. Donec eu velit sed dolor mollis dignissim. Donec at consectetur massa, sed tempor eros. Aenean eros tellus, rhoncus vitae urna sed, mollis porta purus. Vestibulum interdum mauris id rutrum blandit. Donec sed sapien tempus, posuere risus pellentesque, varius lectus. Sed augue orci, iaculis in justo vitae, tristique malesuada magna. Sed pellentesque, mi sit amet tempus tincidunt, ligula mauris aliquam ligula, luctus vestibulum tellus justo sit amet mi. Duis in tempus metus. Vivamus lobortis, lorem at cursus molestie, est justo ultricies nisl, id mattis diam erat a sem. Nunc pretium finibus lectus sed pharetra.', '514 444 2322', 90, 2, 17, 'img/chef/5476903ada794.jpg'),
(31, 'leo.ford11@example.com', '4ad2e65bfe52ac0bcf536e14cab1b3e901fdf03b', 'gdBqzmav', 'Leo', 'Ford', 'Duis commodo tempor mauris, at facilisis nisi porttitor ultrices. Fusce egestas ante nec maximus accumsan. Ut ut urna quis lectus iaculis vestibulum sed vitae odio. Donec eu velit sed dolor mollis dignissim. Donec at consectetur massa, sed tempor eros. Aenean eros tellus, rhoncus vitae urna sed, mollis porta purus. Vestibulum interdum mauris id rutrum blandit. Donec sed sapien tempus, posuere risus pellentesque, varius lectus. Sed augue orci, iaculis in justo vitae, tristique malesuada magna. Sed pellentesque, mi sit amet tempus tincidunt, ligula mauris aliquam ligula, luctus vestibulum tellus justo sit amet mi. Duis in tempus metus. Vivamus lobortis, lorem at cursus molestie, est justo ultricies nisl, id mattis diam erat a sem. Nunc pretium finibus lectus sed pharetra.', '(659)-810-4601', 91, 2, 18, 'img/chef/547691c402489.jpg'),
(32, 'ninacraig@gmail.com', 'b5c7285bb0cef81a647e7225ea56db86157bf727', 'Gy48HJRi', 'Nina', 'Craig', 'Duis commodo tempor mauris, at facilisis nisi porttitor ultrices. Fusce egestas ante nec maximus accumsan. Ut ut urna quis lectus iaculis vestibulum sed vitae odio. Donec eu velit sed dolor mollis dignissim. Donec at consectetur massa, sed tempor eros. Aenean eros tellus, rhoncus vitae urna sed, mollis porta purus. Vestibulum interdum mauris id rutrum blandit. Donec sed sapien tempus, posuere risus pellentesque, varius lectus. Sed augue orci, iaculis in justo vitae, tristique malesuada magna. Sed pellentesque, mi sit amet tempus tincidunt, ligula mauris aliquam ligula, luctus vestibulum tellus justo sit amet mi. Duis in tempus metus. Vivamus lobortis, lorem at cursus molestie, est justo ultricies nisl, id mattis diam erat a sem. Nunc pretium finibus lectus sed pharetra.', '233 324 4434', 92, 2, 19, 'img/chef/5476942666d93.jpg'),
(33, 'sidhub@gmail.com', '550839413d9877c77a64cc30b174ee42e46e3deb', 'aWeDJcRn', 'Sidney', 'Hubbard', 'Duis commodo tempor mauris, at facilisis nisi porttitor ultrices. Fusce egestas ante nec maximus accumsan. Ut ut urna quis lectus iaculis vestibulum sed vitae odio. Donec eu velit sed dolor mollis dignissim. Donec at consectetur massa, sed tempor eros. Aenean eros tellus, rhoncus vitae urna sed, mollis porta purus. Vestibulum interdum mauris id rutrum blandit. Donec sed sapien tempus, posuere risus pellentesque, varius lectus. Sed augue orci, iaculis in justo vitae, tristique malesuada magna. Sed pellentesque, mi sit amet tempus tincidunt, ligula mauris aliquam ligula, luctus vestibulum tellus justo sit amet mi. Duis in tempus metus. Vivamus lobortis, lorem at cursus molestie, est justo ultricies nisl, id mattis diam erat a sem. Nunc pretium finibus lectus sed pharetra.', '535 535 0202', 93, 2, 20, 'img/chef/54769708758c9.jpg'),
(34, 'willisr@gmail.com', '03e8537d4f7bc9b86adaa701e8a5d369a6662b23', '7cinyuVv', 'Rosa', 'Willis', 'Duis commodo tempor mauris, at facilisis nisi porttitor ultrices. Fusce egestas ante nec maximus accumsan. Ut ut urna quis lectus iaculis vestibulum sed vitae odio. Donec eu velit sed dolor mollis dignissim. Donec at consectetur massa, sed tempor eros. Aenean eros tellus, rhoncus vitae urna sed, mollis porta purus. Vestibulum interdum mauris id rutrum blandit. Donec sed sapien tempus, posuere risus pellentesque, varius lectus. Sed augue orci, iaculis in justo vitae, tristique malesuada magna. Sed pellentesque, mi sit amet tempus tincidunt, ligula mauris aliquam ligula, luctus vestibulum tellus justo sit amet mi. Duis in tempus metus. Vivamus lobortis, lorem at cursus molestie, est justo ultricies nisl, id mattis diam erat a sem. Nunc pretium finibus lectus sed pharetra.', '154 555 6455', 94, 1, 21, 'img/chef/5476989e5bb91.jpg'),
(35, 'tuccisteven@gmail.com', '99909d8a9f233a77769c9a2a313b26a86ac2bdad', '1DhFjmr2', 'Steven', 'Tucci', 'Duis commodo tempor mauris, at facilisis nisi porttitor ultrices. Fusce egestas ante nec maximus accumsan. Ut ut urna quis lectus iaculis vestibulum sed vitae odio. Donec eu velit sed dolor mollis dignissim. Donec at consectetur massa, sed tempor eros. Aenean eros tellus, rhoncus vitae urna sed, mollis porta purus. Vestibulum interdum mauris id rutrum blandit. Donec sed sapien tempus, posuere risus pellentesque, varius lectus. Sed augue orci, iaculis in justo vitae, tristique malesuada magna. Sed pellentesque, mi sit amet tempus tincidunt, ligula mauris aliquam ligula, luctus vestibulum tellus justo sit amet mi. Duis in tempus metus. Vivamus lobortis, lorem at cursus molestie, est justo ultricies nisl, id mattis diam erat a sem. Nunc pretium finibus lectus sed pharetra.', '514 123 4567', 95, 2, 22, 'img/chef/54769aa9ea884.jpg'),
(36, 'videscamilo@yahoo.com', '6723c56be1e7f5e5235db7c9b5430885e30cb4fa', 'HoAcR4de', 'Camilo', 'Vides', 'Duis commodo tempor mauris, at facilisis nisi porttitor ultrices. Fusce egestas ante nec maximus accumsan. Ut ut urna quis lectus iaculis vestibulum sed vitae odio. Donec eu velit sed dolor mollis dignissim. Donec at consectetur massa, sed tempor eros. Aenean eros tellus, rhoncus vitae urna sed, mollis porta purus. Vestibulum interdum mauris id rutrum blandit. Donec sed sapien tempus, posuere risus pellentesque, varius lectus. Sed augue orci, iaculis in justo vitae, tristique malesuada magna. Sed pellentesque, mi sit amet tempus tincidunt, ligula mauris aliquam ligula, luctus vestibulum tellus justo sit amet mi. Duis in tempus metus. Vivamus lobortis, lorem at cursus molestie, est justo ultricies nisl, id mattis diam erat a sem. Nunc pretium finibus lectus sed pharetra.', '514 456 4564', 96, 2, 23, 'img/chef/54769eca48867.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hm_cook_rating`
--

CREATE TABLE IF NOT EXISTS `hm_cook_rating` (
`cook_rating_id` int(11) NOT NULL,
  `rating_5_star` int(11) NOT NULL,
  `rating_4_star` int(11) NOT NULL,
  `rating_3_star` int(11) NOT NULL,
  `rating_2_star` int(11) NOT NULL,
  `rating_1_star` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `hm_cook_rating`
--

INSERT INTO `hm_cook_rating` (`cook_rating_id`, `rating_5_star`, `rating_4_star`, `rating_3_star`, `rating_2_star`, `rating_1_star`) VALUES
(16, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0),
(20, 1, 1, 0, 0, 2),
(21, 0, 0, 0, 0, 0),
(22, 2, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hm_cook_rating_details`
--

CREATE TABLE IF NOT EXISTS `hm_cook_rating_details` (
  `cook_rating_detail_id` int(11) NOT NULL,
  `cook_rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hm_cook_status`
--

CREATE TABLE IF NOT EXISTS `hm_cook_status` (
`cook_status_id` int(11) NOT NULL,
  `cook_status_name` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hm_cook_status`
--

INSERT INTO `hm_cook_status` (`cook_status_id`, `cook_status_name`) VALUES
(1, 'Available'),
(2, 'Not Available');

-- --------------------------------------------------------

--
-- Table structure for table `hm_dish`
--

CREATE TABLE IF NOT EXISTS `hm_dish` (
`dish_id` int(11) NOT NULL,
  `cook_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `dish_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `dish_description` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `dish_price` decimal(5,2) NOT NULL,
  `is_featured` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `photo_path` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Dumping data for table `hm_dish`
--

INSERT INTO `hm_dish` (`dish_id`, `cook_id`, `category_id`, `dish_name`, `dish_description`, `dish_price`, `is_featured`, `photo_path`) VALUES
(36, 29, 1, 'Pad Thai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '16.99', 'N', 'img/dish/54768e37e1715.jpg'),
(37, 29, 3, 'Vegetarian Pizza', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '12.99', 'N', 'img/dish/54768e9daf984.jpg'),
(38, 29, 3, 'Langoustine Ravioli', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '16.99', 'N', 'img/dish/54768ed1cca49.jpg'),
(39, 32, 4, 'Greek Salad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '9.99', 'N', 'img/dish/547694700211b.jpg'),
(40, 32, 3, 'Vege Mix', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '12.99', 'N', 'img/dish/54769494dd172.jpg'),
(41, 33, 5, 'Sloppy Tacos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '16.99', 'N', 'img/dish/5476976acfca4.jpg'),
(42, 33, 5, 'Spicy Fajita', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '13.99', 'N', 'img/dish/5476978ad1752.jpg'),
(43, 34, 3, 'Strawberry Cereal', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '5.99', 'N', 'img/dish/547698ff4c3b1.jpg'),
(44, 34, 3, 'Beef Ravioli', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '14.99', 'N', 'img/dish/547699293f639.jpg'),
(45, 35, 2, 'African Mix', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '12.99', 'N', 'img/dish/54769afcf3042.jpg'),
(46, 35, 5, 'Bandeja Paisa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '18.99', 'N', 'img/dish/54769b522e73a.jpg'),
(47, 35, 1, 'Sushi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '18.99', 'N', 'img/dish/54769bcab6e6a.jpg'),
(48, 35, 3, 'Vegetable and Fruit Platter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '9.99', 'N', 'img/dish/54769c04bdd09.jpg'),
(49, 35, 3, 'Sesame Chicken', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '16.99', 'N', 'img/dish/54769c59b962e.jpg'),
(50, 35, 7, 'Vege Style Burger', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '6.99', 'N', 'img/dish/54769c9c042ec.jpg'),
(51, 36, 3, 'Straw Berry Cake', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '24.99', 'N', 'img/dish/54769f1b8ff91.jpg'),
(52, 36, 7, 'Potato Salad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '13.99', 'N', 'img/dish/54769f401c45a.jpg'),
(53, 36, 6, 'Summer Squash', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '18.99', 'N', 'img/dish/54769f54b5e16.jpg'),
(54, 36, 6, 'Pizza Egg Breakfast', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '15.99', 'N', 'img/dish/54769f6e3a750.jpg'),
(56, 36, 4, 'Steak Bits with salad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a nunc iaculis, imperdiet diam nec, lobortis magna. Maecenas justo nisi, vestibulum a elementum quis, ornare imperdiet dui. Nulla at malesuada tortor. Aenean ut urna justo. Nullam vel turpis non risus posuere rutrum ut sed lacus. Suspendisse vitae venenatis ante. Suspendisse fermentum eros non velit congue rutrum. Morbi pellentesque nibh sit amet tristique aliquet. In commodo, purus eu egestas dapibus, urna velit commodo dui, in rhoncus nisl ex quis tellus. Cras mattis lectus ut volutpat posuere. Aliquam lobortis scelerisque tincidunt. Integer a tincidunt mi, non ornare enim. Nulla ornare, sapien sit amet vehicula semper, risus orci molestie enim, nec maximus justo nibh non nulla.\r\n\r\nInteger eu justo tortor. Suspendisse nec laoreet nulla. Phasellus malesuada non tellus a molestie. Duis non ultrices quam. Fusce tempus tortor vel leo hendrerit accumsan. Phasellus consectetur aliquam odio. Nunc sagittis eget est vitae dignissim. Sed nisl nibh, matti', '18.99', 'N', 'img/dish/54769fbebe327.jpg'),
(57, 36, 3, 'Eggplant Platter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elementum tincidunt dapibus. Donec commodo arcu sem, commodo finibus ante consequat eu. Nulla fermentum velit quis feugiat ullamcorper. Proin tristique varius lectus non malesuada. Aenean pellentesque, dui eu consectetur hendrerit, eros tortor euismod magna, eu eleifend lectus dui a felis. Aliquam pharetra, ligula eget consequat dignissim, tellus est dignissim dolor, id pretium ex purus ac justo. Mauris laoreet odio consectetur elit hendrerit, condimentum fermentum orci laoreet. Donec sit amet neque sagittis, rhoncus lorem sit amet, ultricies leo.', '12.99', 'N', 'img/dish/547742d3e328d.jpg'),
(58, 29, 3, 'Fruit Platter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elementum tincidunt dapibus. Donec commodo arcu sem, commodo finibus ante consequat eu. Nulla fermentum velit quis feugiat ullamcorper. Proin tristique varius lectus non malesuada. Aenean pellentesque, dui eu consectetur hendrerit, eros tortor euismod magna, eu eleifend lectus dui a felis. Aliquam pharetra, ligula eget consequat dignissim, tellus est dignissim dolor, id pretium ex purus ac justo. Mauris laoreet odio consectetur elit hendrerit, condimentum fermentum orci laoreet. Donec sit amet neque sagittis, rhoncus lorem sit amet, ultricies leo.', '12.99', 'N', 'img/dish/54774759a8219.jpg'),
(59, 30, 1, 'Shrimp Platter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elementum tincidunt dapibus. Donec commodo arcu sem, commodo finibus ante consequat eu. Nulla fermentum velit quis feugiat ullamcorper. Proin tristique varius lectus non malesuada. Aenean pellentesque, dui eu consectetur hendrerit, eros tortor euismod magna, eu eleifend lectus dui a felis. Aliquam pharetra, ligula eget consequat dignissim, tellus est dignissim dolor, id pretium ex purus ac justo. Mauris laoreet odio consectetur elit hendrerit, condimentum fermentum orci laoreet. Donec sit amet neque sagittis, rhoncus lorem sit amet, ultricies leo.', '12.99', 'N', 'img/dish/547747e68c8eb.jpg'),
(60, 36, 1, 'sushi', 'this is a famous dish', '10.00', 'N', 'img/dish/54778dad0249b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hm_marker`
--

CREATE TABLE IF NOT EXISTS `hm_marker` (
`marker_id` int(11) NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=104 ;

--
-- Dumping data for table `hm_marker`
--

INSERT INTO `hm_marker` (`marker_id`, `address`, `lat`, `lng`) VALUES
(89, '2152 Rue Ward, Saint-Laurent, QC H4M 1T7, Canada', '45.4990836', '-73.6779237'),
(90, '5512 Rue ParÃ©, Mont-Royal, QC H4P 2M1, Canada', '45.492668', '-73.6597855'),
(91, '1674 Rue Champigny, Saint-Laurent, QC H4L 4P8, Canada', '45.5264776', '-73.6832424'),
(92, '2054 O''Brien Ave, Saint-Laurent, QC H4L 3W9, Canada', '45.5249527', '-73.6951143'),
(93, '2677 Rue Saint Louis, Saint-Laurent, QC H4M 2T4, Canada', '45.4957548', '-73.6881922'),
(94, '2248 Rue Decelles, Saint-Laurent, QC H4M, Canada', '45.5045504', '-73.691687'),
(95, '670 Rue Rochon, Saint-Laurent, QC H4L 1T4, Canada', '45.5226916', '-73.6757113'),
(96, '1873 Rue Saint Cyr, Saint-Laurent, QC H4L 3A3, Canada', '45.5210289', '-73.6969973'),
(97, '1269 Rue Champigny, Saint-Laurent, QC H4L 4P5, Canada', '45.522931', '-73.6779012'),
(98, '2442 Rue Nantel, Saint-Laurent, QC H4M 1K4, Canada', '45.4996386', '-73.6888544'),
(99, '1161 Avenue Sainte Croix, Saint-Laurent, QC H4L 3Z2, Canada', '45.5177348', '-73.6822184'),
(100, '1494 Rue BarrÃ©, Saint-Laurent, QC H4L 4M6, Canada', '45.5235759', '-73.6820508'),
(101, '1495 Rue Dutrisac, Saint-Laurent, QC H4L 4J6, Canada', '45.5225006', '-73.6832984'),
(102, '222 Rue DÃ©carie, Cowansville, QC J2K 1Z1, Canada', '45.1994669', '-72.743675'),
(103, '226 Rue Hilton, Dollard-des-Ormeaux, QC H9B 2P4, Canada', '45.4959473', '-73.7849961');

-- --------------------------------------------------------

--
-- Table structure for table `hm_order`
--

CREATE TABLE IF NOT EXISTS `hm_order` (
`order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cook_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `order_date` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `order_comment` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `order_status_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `hm_order`
--

INSERT INTO `hm_order` (`order_id`, `user_id`, `cook_id`, `dish_id`, `order_date`, `order_comment`, `order_status_id`) VALUES
(13, 29, 35, 50, '1417063092', 'Please add extra tomatoes. It would be awesome.\r\n', 3),
(16, 29, 32, 39, '1417098843', '', 1),
(17, 32, 29, 38, '1417102780', '', 1),
(18, 29, 36, 51, '1417103730', 'Add more strawberries. Thank you!', 2),
(19, 29, 32, 40, '1417104602', 'Add more vegetables.', 1),
(20, 29, 35, 47, '1417104836', '', 3),
(22, 34, 36, 54, '1417119661', 'hello chef i would like you to put more cheese', 2),
(23, 34, 33, 42, '1417120249', 'hello your dish looks really good! i would like to taste it if you can make it for  me.', 3),
(24, 29, 33, 42, '1417121460', '', 1),
(25, 29, 34, 43, '1417122339', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hm_status_lookup`
--

CREATE TABLE IF NOT EXISTS `hm_status_lookup` (
`order_status_id` int(11) NOT NULL,
  `order_status_name` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hm_status_lookup`
--

INSERT INTO `hm_status_lookup` (`order_status_id`, `order_status_name`) VALUES
(1, 'awaiting'),
(2, 'deliver'),
(3, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `hm_user`
--

CREATE TABLE IF NOT EXISTS `hm_user` (
`user_id` int(11) NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `marker_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `hm_user`
--

INSERT INTO `hm_user` (`user_id`, `email`, `hash`, `salt`, `first_name`, `last_name`, `phone_number`, `marker_id`) VALUES
(29, 'janedoe@gmail.com', '78fb44bb3db2eee20820e151c0287eeaf885af98', '1My0H1Hj', 'Jane', 'Doe', '514 545 6445', 97),
(30, 'johndoe@gmail.com', '76fa14955f201a84bc1f16eaf71312d31ad419b7', 'VwZve8Za', 'John', 'Doe', '514 556 5454', 98),
(31, 'carlmax@gmail.com', '6644b160381b41f9255bd470f3d231b77d604c59', 'OOqIWr82', 'Carl', 'Max', '512 222 2223', 99),
(32, 'max@gmail.com', 'bd91f35aca95391141a926517f38c0c47c80fe32', '2cgsqaLK', 'Max', 'Dean', '514 455 5556', 100),
(33, 'lol@gmail.com', 'dbb5a0ba042fd6e3ddb0814e631bfd8e463ba04b', 'azEHbMWO', 'Lolo', 'Oko', '514 454 4545', 101),
(34, 'ajmer@yahoo.ca', '32ecd30b1458fdacd4eaa6411ad52cb883f1027e', 'b9VryWmi', 'Ajmer', 'ASG', '123 123 1234', 103);

-- --------------------------------------------------------

--
-- Table structure for table `hm_user_to_cook_distance`
--

CREATE TABLE IF NOT EXISTS `hm_user_to_cook_distance` (
  `user_id` int(11) NOT NULL,
  `distance` decimal(10,7) NOT NULL,
  `cook_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hm_user_to_cook_distance`
--

INSERT INTO `hm_user_to_cook_distance` (`user_id`, `distance`, `cook_id`) VALUES
(29, '0.1726706', 35),
(29, '0.5732887', 31),
(29, '1.3596889', 32),
(29, '1.5026814', 36),
(29, '2.3089128', 34),
(29, '2.6517105', 29),
(29, '3.1264501', 33),
(29, '3.6492102', 30),
(30, '0.4349321', 33),
(30, '0.5890948', 34),
(30, '0.8541540', 29),
(30, '2.3946255', 30),
(30, '2.4616753', 36),
(30, '2.7603910', 35),
(30, '2.8567500', 32),
(30, '3.0162271', 31),
(31, '0.7488681', 35),
(31, '0.9754228', 31),
(31, '1.2082915', 36),
(31, '1.2859108', 32),
(31, '1.6412304', 34),
(31, '2.1007480', 29),
(31, '2.4880047', 33),
(31, '3.2901768', 30),
(32, '0.3357425', 31),
(32, '0.5035755', 35),
(32, '1.0291489', 32),
(32, '1.1983789', 36),
(32, '2.2448291', 34),
(32, '2.7423411', 29),
(32, '3.1303624', 33),
(32, '3.8499368', 30),
(33, '0.4422437', 31),
(33, '0.5914641', 35),
(33, '0.9600471', 32),
(33, '1.0797193', 36),
(33, '2.1002697', 34),
(33, '2.6373179', 29),
(33, '2.9983473', 33),
(33, '3.7896346', 30),
(34, '7.3348995', 34),
(34, '7.4028264', 36),
(34, '7.5452450', 33),
(34, '7.7107982', 32),
(34, '8.3526121', 29),
(34, '8.6250504', 31),
(34, '9.0202865', 35),
(34, '9.7664030', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hm_category`
--
ALTER TABLE `hm_category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `hm_cook`
--
ALTER TABLE `hm_cook`
 ADD PRIMARY KEY (`cook_id`);

--
-- Indexes for table `hm_cook_rating`
--
ALTER TABLE `hm_cook_rating`
 ADD PRIMARY KEY (`cook_rating_id`);

--
-- Indexes for table `hm_cook_status`
--
ALTER TABLE `hm_cook_status`
 ADD PRIMARY KEY (`cook_status_id`);

--
-- Indexes for table `hm_dish`
--
ALTER TABLE `hm_dish`
 ADD PRIMARY KEY (`dish_id`);

--
-- Indexes for table `hm_marker`
--
ALTER TABLE `hm_marker`
 ADD PRIMARY KEY (`marker_id`);

--
-- Indexes for table `hm_order`
--
ALTER TABLE `hm_order`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `hm_status_lookup`
--
ALTER TABLE `hm_status_lookup`
 ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `hm_user`
--
ALTER TABLE `hm_user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hm_category`
--
ALTER TABLE `hm_category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hm_cook`
--
ALTER TABLE `hm_cook`
MODIFY `cook_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `hm_cook_rating`
--
ALTER TABLE `hm_cook_rating`
MODIFY `cook_rating_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `hm_cook_status`
--
ALTER TABLE `hm_cook_status`
MODIFY `cook_status_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hm_dish`
--
ALTER TABLE `hm_dish`
MODIFY `dish_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `hm_marker`
--
ALTER TABLE `hm_marker`
MODIFY `marker_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `hm_order`
--
ALTER TABLE `hm_order`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `hm_status_lookup`
--
ALTER TABLE `hm_status_lookup`
MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hm_user`
--
ALTER TABLE `hm_user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
