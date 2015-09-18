-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 18, 2015 at 01:10 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `secure_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `time`) VALUES
(1, '1385995353'),
(1, '1386011064'),
(1, '1441792834'),
(1, '1441792861'),
(1, '1441792888'),
(2, '1441792984'),
(2, '1441792997'),
(2, '1441793253'),
(2, '1441794924'),
(4, '1442391268'),
(4, '1442392698'),
(0, '1442518175');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `password`, `salt`, `admin`) VALUES
(1, 'test_user', 'test@example.com', '00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc', 'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef', 0),
(3, 'Vincent', 'vincent@vincent.nl', 'fb14a2c8982667352115bd12aa8551214aa013a3a8e50f55f06f08b6a3a1415897d72eafb0e96bc5e46a8db1cdf09c8262e4f6e4ea3be574e5b53d4fb9ce34d2', 'f85a4c59bb50ed8f366357a22d5d3e74d06bcc16dd734713f37ee178395c1c398840b58b7d9111d76e250391dd0431ca3fd5d25d218bd743b3a715678345d542', 0),
(4, 'admin', 'admin@admin.nl', 'eb90c53926fde2bc85aad22e2e0a98cf97505f31ba89e4d8030325e428a949e8db62f54be0a65e661a1bc5fc62ded5cf43d613f098ad5996461370561c2c1986', '67f359f36572a3b617f1566a5a9a0cf6c49ddac3ead221f7c60fac79cfef9d5bdee307208b267d1882d2c5412f9c45fd8de262829e6aa1b7dd5de50bea9b8720', 2),
(5, 'admin2', 'admin2@admin2.nl', '68d69833aa1f0e5360b389820586406a88f492f708defea6c841d8dbf94139af7dfb2b03ca6e16bb6fb5c2b953a271ff938bd5e3ad1fe259391eade58c9427f4', '9c90a3e0138b71cf0207f4ab499282edc77af7bf10bc35bcbc266f818d168e9acec3459e503986c75c76399f953b2e71b0206eb35518c0700345a6db557a9ffe', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
