-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 04:07 PM
-- Server version: 5.7.20-log
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviestoredb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actorProc` (IN `fname` VARCHAR(100), IN `lname` VARCHAR(100), OUT `id` INT)  NO SQL
BEGIN
	SELECT Actor_id
    INTO id
    FROM actor
   	WHERE FirstName LIKE fname AND LastName LIKE lname;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `characterProc` (IN `characName` VARCHAR(100), OUT `id` INT)  NO SQL
BEGIN
	SELECT Character_id
    INTO id
    FROM charactr
    WHERE Name LIKE characName;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `directorProc` (IN `fname` VARCHAR(100), IN `lname` VARCHAR(100), OUT `id` INT)  NO SQL
BEGIN
	SELECT Director_id
    INTO id
    FROM director
   	WHERE FirstName LIKE fname AND LastName LIKE lname;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `genreProc` (IN `name` VARCHAR(50), OUT `id` INT)  NO SQL
BEGIN
	SELECT Genre_id
    INTO id
    FROM genre
   	WHERE Genre LIKE name;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectProc` (IN `id` INT)  NO SQL
BEGIN
SELECT *
FROM film
WHERE Film_id = id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `Actor_id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`Actor_id`, `FirstName`, `LastName`, `img`) VALUES
(0, 'Robert', 'Downey Jr.', '1YjdSym1jTG7xjHSI0yGGWEsw5i.jpg'),
(1, 'Chris ', 'Hemsworth', 'lrhth7yK9p3vy6p7AabDUM1THKl.jpg'),
(2, 'Mark', 'Ruffalo', 'isQ747u0MU8U9gdsNlPngjABclH.jpg'),
(3, 'Benedict', 'Cumberbatch', 'wz3MRiMmoz6b5X3oSzMRC9nLxY1.jpg'),
(4, 'Josh', 'Brolin', 'x8KKnvHyPvH16M6waAnY1OeCtA8.jpg'),
(5, 'Denzel', 'Washington', 'semwsON3dN3np6cyzlCw7F2YDGe.jpg'),
(6, 'Pedro', 'Pascal', '8HP2vzmDR4Q9tmciUwFmzQJoJzP.jpg'),
(7, 'Ashton', 'Sanders', 'eONLhaBvc3IyhWsfwdIdbRnbK9M.jpg'),
(8, 'Bill', 'Pullman', 'pIpTEQVbDif8m8OdjAxQKNCj0D6.jpg'),
(9, 'Melissa', 'Leo', 'fcDdsUAyp7DZEi4UEzGXZEjXlUC.jpg'),
(10, 'Tom', 'Cruise', '3oWEuo0e8Nx8JvkqYCDec2iMY6K.jpg'),
(11, 'Rebecca', 'Ferguson', '5i3268fkFMTvUcqlQ9gycMwTfeU.jpg'),
(12, 'Henry', 'Cavill', 'hErUwonrQgY5Y7RfxOfv8Fq11MB.jpg'),
(13, 'Simon', 'Pegg', '23e2uoNlpDvLumNic16fS2YjZjL.jpg'),
(14, 'Ving', 'Rhames', '8nS83GOu0iqxjL2Oj2DgwkAceFQ.jpg'),
(15, 'Chris', 'Pratt', 'n4DD1AYU7WEMNPLga1TxqnHivn1.jpg'),
(16, 'Bryce', 'Dallas Howard', 'taWmUeEJvR4j14nydUnVYmhDadT.jpg'),
(17, 'Rafe', 'Spall', '7ucsDEWvcMU4SpxtZEaYErPpXHh.jpg'),
(18, 'Toby', 'Jones', '9FUBqeLZZGz8Jmk9B18LODG6aky.jpg'),
(19, 'Justice', 'Smith', '9G8pKfvfbqs5fmRo0VtlHqxdVBQ.jpg'),
(20, 'Ryan', 'Reynolds', 'h1co81QaT2nJA41Sb7eZwmWl1L2.jpg'),
(21, 'Morena', 'Baccarin', 'dhdQT0fMRcbg8Gi9nx7JF0oVzzr.jpg'),
(22, 'Julian', 'Dennison', 'ApBsNEF9JnXDJ27XLaWnRXdVCQz.jpg'),
(23, 'Zazie', 'Beets', 'sgxzT54GnvgeMnOZgpQQx9csAdd.jpg'),
(24, 'Chadwick', 'Boseman', 'if0BTPOSkbnvIjry5OcfV7GfRrO.jpg'),
(25, 'Michael', 'B. Jordan', 'xjMZd0k7G0nN6BXTjQBzf3Gyrz7.jpg'),
(26, 'Lupita', 'Nyong\'o', '95QjzhpCgoNQ06piZRVSPxZTQHd.jpg'),
(27, 'Danai', 'Gurira', 'xgo39kFf6rAynb1i9J1BeLfSXxg.jpg'),
(28, 'Martin', 'Freeman', 'ashlWz2KDQTbo8NPUbVOwcB3zXJ.jpg'),
(29, 'Tom', 'Hiddleston', 'qB1lHPFBPIzw6I7EvsciZ5wyUNS.jpg'),
(30, 'Cate', 'Blanchett', 'eE98pTm0Q2xIn0710VBC603IE5Q.jpg'),
(31, 'Tessa', 'Thompson', 'fycqdiiM6dsNSbnONBVVQ57ILV1.jpg'),
(32, 'Dwayne', 'Johnson', 'akweMz59qsSoPUJYe7QpjAc2rQp.jpg'),
(33, 'Naomie', 'Harris', '3Y55D8wZgg4CkKadhXvSh91Q121.jpg'),
(34, 'Malin', 'Åkerman', 'sQ18pOQEgu1zsmaIVEw5GwIMgpn.jpg'),
(35, 'Jeffrey', 'Dean Morgan', '6ors2HGy8UdXm8kBx6on0HwRHB5.jpg'),
(36, 'Jake', 'Lacy', 'qU6n9EaesBGqhNLlj5BecUrb5LW.jpg'),
(37, 'Zoe', 'Saldana', 'ofNrWiA2KDdqiNxFTLp51HcXUlp.jpg'),
(38, 'Dave', 'Bautista', 'oZDL1VprkUEFhOtG5WcVjudj5ks.jpg'),
(39, 'Vin', 'Diesel', 'mjRdM6w6Uz1UnrKQ5Kw02qGln2K.jpg'),
(40, 'Bradley', 'Cooper', 'z5LUl9bljJnah3S5rtN7rScrmI8.jpg'),
(41, 'Rain', '', '7oLrI71PNp9iGwJkgr2Bq34t2Yt.jpg'),
(42, 'Sung', 'Kang', 'fqt53KEfHWsRDcbV2YAY2lKlKrM.jpg'),
(43, 'Randall', 'Duk Kim', '9AWMELz25S915kaUr5OzHJN4Xtm.jpg'),
(44, 'Rick', 'Yune', '9r5aykT0VjYC4pdexmNA0PovmFI.jpg'),
(45, 'Alden', 'Alden', 'hPbiRySz3k5XEZ3DwJtExnNTKiG.jpg'),
(46, 'Harrelson', 'Harrelson', '1ecdooAHICUhCZKKEKlFtccEmTU.jpg'),
(47, 'Alden', 'Ehrenreich', 'hPbiRySz3k5XEZ3DwJtExnNTKiG.jpg'),
(48, 'Woody', 'Harrelson', '1ecdooAHICUhCZKKEKlFtccEmTU.jpg'),
(49, 'Emilia', 'Clarke', 'lRSqMNNhPL4Ib1hAJxmDFBXHAMU.jpg'),
(50, 'Donald', 'Glover', '36o5mpbQVdxOf9kUxWw7SllOuk.jpg'),
(51, 'Joonas', 'Suotamo', '5JI6S5bedeOtnPBAk6QECuYdVGg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `actor_film`
--

CREATE TABLE `actor_film` (
  `actor_film` int(11) NOT NULL,
  `Film_id` int(11) NOT NULL,
  `Actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actor_film`
--

INSERT INTO `actor_film` (`actor_film`, `Film_id`, `Actor_id`) VALUES
(1, 0, 0),
(2, 0, 1),
(3, 0, 2),
(4, 0, 3),
(5, 0, 4),
(6, 1, 5),
(7, 1, 6),
(8, 1, 7),
(9, 1, 8),
(10, 1, 9),
(11, 2, 10),
(12, 2, 11),
(13, 2, 12),
(14, 2, 13),
(15, 2, 14),
(16, 3, 15),
(17, 3, 16),
(18, 3, 17),
(19, 3, 18),
(20, 3, 19),
(21, 4, 20),
(22, 4, 4),
(23, 4, 21),
(24, 4, 22),
(25, 4, 23),
(26, 5, 24),
(27, 5, 25),
(28, 5, 26),
(29, 5, 27),
(30, 5, 28),
(31, 6, 1),
(32, 6, 29),
(33, 6, 30),
(34, 6, 2),
(35, 6, 31),
(36, 7, 32),
(37, 7, 33),
(38, 7, 34),
(39, 7, 35),
(40, 7, 36),
(41, 8, 15),
(42, 8, 37),
(43, 8, 38),
(44, 8, 39),
(45, 8, 40),
(46, 9, 41),
(47, 9, 33),
(48, 9, 42),
(49, 9, 43),
(50, 9, 44),
(53, 12, 47),
(54, 12, 48),
(55, 12, 49),
(56, 12, 50),
(57, 12, 51);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `Username` varchar(256) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Username`, `FirstName`, `LastName`, `Email`, `Password`) VALUES
(1, 'desmond', 'Desmond', 'Wallace', '1234admin@email.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `charactr`
--

CREATE TABLE `charactr` (
  `Character_id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `charactr`
--

INSERT INTO `charactr` (`Character_id`, `Name`) VALUES
(0, 'Iron Man'),
(1, 'Thor'),
(2, 'Hulk'),
(3, 'Stephen Strange'),
(4, 'Thanos'),
(5, 'Robert McCall'),
(6, 'Brian Plummer'),
(7, 'Susan Plummer'),
(8, 'Ethan Hunt'),
(9, 'Ilsa Faust'),
(10, 'August Walker'),
(11, 'Benji Dunn'),
(12, 'Luther Stickell'),
(13, 'Owen Grady'),
(14, 'Claire Dearing'),
(15, 'Mills'),
(16, 'Wheaton'),
(17, 'Franklin'),
(18, 'Wade Wilson / Deadpool / Juggernaut (voice) / Juggernaut (facial mocap)'),
(19, 'Nathan Summers / Cable'),
(20, 'Vanessa Carlysle'),
(21, 'Rusty Collins / Fire Fist'),
(22, 'Neena Thurman / Domino'),
(23, 'T\'Challa / Black Panther'),
(24, 'N’Jadaka / Erik Killmonger'),
(25, 'Nakia'),
(26, 'Okoye'),
(27, 'Loki'),
(28, 'Hela'),
(29, 'Brunnhilde / Valkyrie'),
(30, 'Davis Okoye'),
(31, 'Dr. Kate Caldwell'),
(32, 'Claire Wyden'),
(33, 'Agent Russwell'),
(34, 'Brett Wyden'),
(35, 'Peter Quill / Star-Lord'),
(36, 'Gamora'),
(37, 'Drax the Destroyer'),
(38, 'Groot (voice)'),
(39, 'Rocket Raccoon (voice)'),
(40, 'Raizo'),
(41, 'Mika Coretti'),
(42, 'Hollywood'),
(43, 'Tattoo Master'),
(44, 'Takeshi'),
(45, 'Han Solo'),
(46, 'Tobias Beckett'),
(47, 'Qi\'ra'),
(48, 'Lando Calrissian'),
(49, 'Chewbacca');

-- --------------------------------------------------------

--
-- Table structure for table `charactr_film`
--

CREATE TABLE `charactr_film` (
  `charactr_film` int(11) NOT NULL,
  `Character_id` int(11) DEFAULT NULL,
  `Film_id` int(11) NOT NULL,
  `Actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `charactr_film`
--

INSERT INTO `charactr_film` (`charactr_film`, `Character_id`, `Film_id`, `Actor_id`) VALUES
(1, 0, 0, 0),
(2, 1, 0, 1),
(3, 2, 0, 2),
(4, 3, 0, 3),
(5, 4, 0, 4),
(6, 5, 1, 5),
(7, 6, 1, 8),
(8, 7, 1, 9),
(9, NULL, 2, 6),
(10, NULL, 2, 7),
(11, 8, 2, 10),
(12, 9, 2, 11),
(13, 10, 2, 12),
(14, 11, 2, 13),
(15, 12, 2, 14),
(16, 13, 3, 15),
(17, 14, 3, 16),
(18, 15, 3, 17),
(19, 16, 3, 18),
(20, 17, 3, 19),
(21, 18, 4, 20),
(22, 19, 4, 4),
(23, 20, 4, 21),
(24, 21, 4, 22),
(25, 22, 4, 23),
(26, 23, 5, 24),
(27, 24, 5, 25),
(28, 25, 5, 26),
(29, 26, 5, 27),
(30, 27, 5, 28),
(31, 1, 6, 1),
(32, 27, 6, 29),
(33, 28, 6, 30),
(34, 2, 6, 2),
(35, 29, 6, 31),
(36, 30, 7, 32),
(37, 31, 7, 33),
(38, 32, 7, 34),
(39, 33, 7, 35),
(40, 34, 7, 36),
(41, 35, 8, 15),
(42, 36, 8, 37),
(43, 37, 8, 38),
(44, 38, 8, 39),
(45, 39, 8, 40),
(46, 40, 9, 41),
(47, 41, 9, 33),
(48, 42, 9, 42),
(49, 43, 9, 43),
(50, 44, 9, 44),
(53, 45, 12, 47),
(54, 46, 12, 48),
(55, 47, 12, 49),
(56, 48, 12, 50),
(57, 49, 12, 51);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_id`, `UserName`, `FirstName`, `LastName`, `Email`, `Password`) VALUES
(1, 'John123', 'John', 'Williams', '1234example@gmail.com', 'password'),
(2, 'alex32', 'Alexander', 'Fiddle', 'alex1234@email.com', 'password'),
(3, 'kim534', 'Kimberly', 'Williams', 'kimberly2342@email.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `Director_id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`Director_id`, `FirstName`, `LastName`) VALUES
(0, 'Joe', 'Russo'),
(1, 'Anthony', 'Russo'),
(2, 'Michael', 'Sloan'),
(3, 'Antoine', 'Fuqua'),
(4, 'Christopher', 'McQuarrie'),
(5, 'Juan', 'Antonio Bayona'),
(6, 'David', 'Leitch'),
(7, 'Ryan', 'Coogler'),
(8, 'Taika', 'Waititi'),
(9, 'Brad', 'Peyton'),
(10, 'James', 'Gunn'),
(11, 'James', 'McTeigue'),
(12, 'Ron', 'Howard');

-- --------------------------------------------------------

--
-- Table structure for table `director_film`
--

CREATE TABLE `director_film` (
  `director_film` int(11) NOT NULL,
  `Director_id` int(11) NOT NULL,
  `Film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `director_film`
--

INSERT INTO `director_film` (`director_film`, `Director_id`, `Film_id`) VALUES
(1, 0, 0),
(2, 1, 0),
(3, 2, 1),
(4, 3, 1),
(5, 4, 2),
(6, 5, 3),
(7, 6, 4),
(8, 7, 5),
(9, 8, 6),
(10, 9, 7),
(11, 10, 8),
(12, 11, 9),
(13, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `Favourites_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`Favourites_id`, `Customer_id`, `Film_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(5, 1, 4),
(7, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `Film_id` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `Run_time` varchar(45) DEFAULT NULL,
  `Release_Date` date DEFAULT NULL,
  `Rating` varchar(10) DEFAULT NULL,
  `Price` decimal(6,2) NOT NULL,
  `Trailer` varchar(1000) NOT NULL,
  `Overview` varchar(2000) NOT NULL,
  `Image_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`Film_id`, `Title`, `Run_time`, `Release_Date`, `Rating`, `Price`, `Trailer`, `Overview`, `Image_Name`) VALUES
(0, 'The Avengers: Infinity War', '2h 29m', '2018-04-27', 'PG-13', '9.79', 'https://www.youtube.com/embed/QwievZ1Tx-8', 'As the Avengers and their allies have continued to protect the world from threats too large for any one hero to handle, a new danger has emerged from the cosmic shadows: Thanos. A despot of intergalactic infamy, his goal is to collect all six Infinity Stones, artifacts of unimaginable power, and use them to inflict his twisted will on all of reality. Everything the Avengers have fought for has led up to this moment - the fate of Earth and existence itself has never been more uncertain.', 'A1t8xCe9jwL._SY679_.jpg'),
(1, 'The Equalizer 2', 'N/A', '2018-07-20', 'R', '13.50', 'https://www.youtube.com/embed/KQKtSekSi94', 'Robert McCall returns to deliver his special brand of vigilante justice -- but how far will he go when it\'s someone he loves?', 'maxresdefault-1.jpg'),
(2, 'Mission: Impossible - Fallout', 'N/A', '2018-07-27', 'PG-13', '14.30', 'https://www.youtube.com/embed/XiHiW4N7-bo', 'The sixth installment in the \"Mission: Impossible\". When an IMF mission ends badly, the world is faced with dire consequences. As Ethan Hunt takes it upon himself to fullfil his original briefing, the CIA begin to question his loyalty and his motives. The IMF team find themselves in a race against time, hunted by assassins while trying to prevent a global catastrophe.', '80PWnSTkygi3QWWmJ3hrAwqvLnO.jpg'),
(3, 'Jurassic World: Fallen Kingdom', '2h 9m', '2018-06-22', 'PG-13', '14.60', 'https://www.youtube.com/embed/1FJD7jZqZEk', 'A volcanic eruption threatens the remaining dinosaurs on the island of Isla Nublar, where the creatures have freely roamed for several years after the demise of an animal theme park known as Jurassic World. Claire Dearing, the former park manager, has now founded the Dinosaur Protection Group, an organization dedicated to protecting the dinosaurs. To help with her cause, Claire has recruited Owen Grady, a former dinosaur trainer who worked at the park, to prevent the extinction of the dinosaurs once again.', 'c9XxwwhPHdaImA2f1WEfEsbhaFB.jpg'),
(4, 'Deadpool 2', '1h 59m', '2018-05-18', 'R', '12.95', 'https://www.youtube.com/embed/D86RtevtfrA', 'Wisecracking mercenary Deadpool battles the evil and powerful Cable and other bad guys to save a boy\'s life.', 'to0spRl1CMDvyUbOnbb4fTk3VAd.jpg'),
(5, 'Black Panther', '2h 14m', '2018-02-16', 'PG-13', '6.80', 'https://www.youtube.com/embed/xjDjIWPwcPU', 'King T\'Challa returns home from America to the reclusive, technologically advanced African nation of Wakanda to serve as his country\'s new leader. However, T\'Challa soon finds that he is challenged for the throne by factions within his own country as well as without. Using powers reserved to Wakandan kings, T\'Challa assumes the Black Panther mantel to join with girlfriend Nakia, the queen-mother, his princess-kid sister, members of the Dora Milaje (the Wakandan \'special forces\') and an American secret agent, to prevent Wakanda from being dragged into a world war.', 'uxzzxijgPIY7slzFvMotPv8wjKA.jpg'),
(6, 'Thor: Ragnarok', '2h 10m', '2018-10-10', 'PG-13', '7.30', 'https://www.youtube.com/embed/ue80QwXMRHg', 'Thor is imprisoned on the other side of the universe and finds himself in a race against time to get back to Asgard to stop Ragnarok, the prophecy of destruction to his homeworld and the end of Asgardian civilization, at the hands of an all-powerful new threat, the ruthless Hela.', 'rzRwTcFvttcN1ZpX2xv4j3tSdJu.jpg'),
(7, 'Rampage', '1h 47m', '2018-04-13', 'PG-13', '10.90', 'https://www.youtube.com/embed/coOKvrsmQiI', 'Primatologist Davis Okoye shares an unshakable bond with George, the extraordinarily intelligent, silverback gorilla who has been in his care since birth. But a rogue genetic experiment gone awry mutates this gentle ape into a raging creature of enormous size. To make matters worse, it’s soon discovered there are other similarly altered animals. As these newly created alpha predators tear across North America, destroying everything in their path, Okoye teams with a discredited genetic engineer to secure an antidote, fighting his way through an ever-changing battlefield, not only to halt a global catastrophe but to save the fearsome creature that was once his friend.', '30oXQKwibh0uANGMs0Sytw3uN22.jpg'),
(8, 'Guardians of the Galaxy', '2h 1m', '2014-07-31', 'PG-13', '4.50', 'https://www.youtube.com/embed/d96cjJhvlMA', 'Light years from Earth, 26 years after being abducted, Peter Quill finds himself the prime target of a manhunt after discovering an orb wanted by Ronan the Accuser.', 'y31QB9kn3XSudA15tV7UWQ9XLuW.jpg'),
(9, 'Ninja Assassin', '1h 39m', '2009-11-25', 'R', '6.40', 'https://www.youtube.com/embed/NhYH26KTNbQ', 'Ninja Assassin follows Raizo (Rain), one of the deadliest assassins in the world. Taken from the streets as a child, he was transformed into a trained killer by the Ozunu Clan, a secret society whose very existence is considered a myth. But haunted by the merciless execution of his friend by the Clan, Raizo breaks free from them and vanishes. Now he waits, preparing to exact his revenge.', 'k0Nu7HuUdnjfeNPR6YSY0PDH2et.jpg'),
(12, 'Solo: A Star Wars Story', '2h 15m', '2018-05-10', 'PG-13', '10.98', 'https://www.youtube.com/embed/jPEYpryMp2s', 'Through a series of daring escapades deep within a dark and dangerous criminal underworld, Han Solo meets his mighty future copilot Chewbacca and encounters the notorious gambler Lando Calrissian.', '4oD6VEccFkorEBTEDXtpLAaz0Rl.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `Genre_id` int(11) NOT NULL,
  `Genre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`Genre_id`, `Genre`) VALUES
(0, 'Action'),
(1, 'Drama'),
(2, 'Comedy'),
(3, 'Fiction'),
(4, 'Science Fiction'),
(5, 'Adventure'),
(6, 'Fantasy'),
(7, 'Family'),
(8, 'Horror'),
(9, 'Thriller'),
(10, 'Mystery'),
(11, 'Crime');

-- --------------------------------------------------------

--
-- Table structure for table `genre_film`
--

CREATE TABLE `genre_film` (
  `genre_film` int(11) NOT NULL,
  `Genre_id` int(11) NOT NULL,
  `Film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre_film`
--

INSERT INTO `genre_film` (`genre_film`, `Genre_id`, `Film_id`) VALUES
(1, 0, 0),
(2, 5, 0),
(3, 4, 0),
(4, 6, 0),
(5, 0, 1),
(6, 9, 1),
(7, 0, 2),
(8, 5, 2),
(9, 9, 2),
(10, 0, 3),
(11, 5, 3),
(12, 4, 3),
(13, 0, 4),
(14, 2, 4),
(15, 4, 4),
(16, 0, 5),
(17, 5, 5),
(18, 4, 5),
(19, 6, 5),
(20, 0, 6),
(21, 5, 6),
(22, 6, 6),
(23, 4, 6),
(24, 2, 6),
(25, 0, 7),
(26, 5, 7),
(27, 4, 7),
(28, 0, 8),
(29, 5, 8),
(30, 4, 8),
(31, 0, 9),
(32, 9, 9),
(33, 10, 9),
(34, 11, 9),
(36, 0, 12),
(37, 5, 12),
(38, 6, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`Actor_id`);

--
-- Indexes for table `actor_film`
--
ALTER TABLE `actor_film`
  ADD PRIMARY KEY (`actor_film`),
  ADD KEY `Film_id_idx` (`Film_id`),
  ADD KEY `Actor_id_idx` (`Actor_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `charactr`
--
ALTER TABLE `charactr`
  ADD PRIMARY KEY (`Character_id`);

--
-- Indexes for table `charactr_film`
--
ALTER TABLE `charactr_film`
  ADD PRIMARY KEY (`charactr_film`),
  ADD KEY `Character_id` (`Character_id`),
  ADD KEY `Film_id` (`Film_id`),
  ADD KEY `Actor_id` (`Actor_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`Director_id`);

--
-- Indexes for table `director_film`
--
ALTER TABLE `director_film`
  ADD PRIMARY KEY (`director_film`),
  ADD KEY `Director_id` (`Director_id`,`Film_id`),
  ADD KEY `Film_id` (`Film_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`Favourites_id`),
  ADD KEY `Film_id` (`Film_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`Film_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`Genre_id`);

--
-- Indexes for table `genre_film`
--
ALTER TABLE `genre_film`
  ADD PRIMARY KEY (`genre_film`),
  ADD KEY `Film_id` (`Film_id`),
  ADD KEY `Genre_id` (`Genre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `Actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `actor_film`
--
ALTER TABLE `actor_film`
  MODIFY `actor_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `charactr`
--
ALTER TABLE `charactr`
  MODIFY `Character_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `charactr_film`
--
ALTER TABLE `charactr_film`
  MODIFY `charactr_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `Director_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `director_film`
--
ALTER TABLE `director_film`
  MODIFY `director_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `Favourites_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `Film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `genre_film`
--
ALTER TABLE `genre_film`
  MODIFY `genre_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actor_film`
--
ALTER TABLE `actor_film`
  ADD CONSTRAINT `Actor_id` FOREIGN KEY (`Actor_id`) REFERENCES `actor` (`Actor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Film_id` FOREIGN KEY (`Film_id`) REFERENCES `film` (`Film_id`) ON DELETE CASCADE;

--
-- Constraints for table `charactr_film`
--
ALTER TABLE `charactr_film`
  ADD CONSTRAINT `charactr_film_ibfk_1` FOREIGN KEY (`Character_id`) REFERENCES `charactr` (`Character_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `charactr_film_ibfk_2` FOREIGN KEY (`Film_id`) REFERENCES `film` (`Film_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `charactr_film_ibfk_3` FOREIGN KEY (`Actor_id`) REFERENCES `actor` (`Actor_id`) ON DELETE CASCADE;

--
-- Constraints for table `director_film`
--
ALTER TABLE `director_film`
  ADD CONSTRAINT `director_film_ibfk_1` FOREIGN KEY (`Director_id`) REFERENCES `director` (`Director_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `director_film_ibfk_2` FOREIGN KEY (`Film_id`) REFERENCES `film` (`Film_id`) ON DELETE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `Customer_id` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`Film_id`) REFERENCES `film` (`Film_id`) ON DELETE CASCADE;

--
-- Constraints for table `genre_film`
--
ALTER TABLE `genre_film`
  ADD CONSTRAINT `genre_film_ibfk_1` FOREIGN KEY (`Film_id`) REFERENCES `film` (`Film_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `genre_film_ibfk_2` FOREIGN KEY (`Genre_id`) REFERENCES `genre` (`Genre_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
