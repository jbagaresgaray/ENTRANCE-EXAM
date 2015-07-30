
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Database: `entance`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `category`
--
-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE IF NOT EXISTS `choice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionid` int(11) NOT NULL,
  `choice` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=557 ;

--
-- Dumping data for table `choice`
--
-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `lesson`
--
-- --------------------------------------------------------

--
-- Table structure for table `lesson_pdf`
--

CREATE TABLE IF NOT EXISTS `lesson_pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `file` varchar(300) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=390 ;

--
-- Dumping data for table `lesson_pdf`
--
-- --------------------------------------------------------

--
-- Table structure for table `lesson_video`
--

CREATE TABLE IF NOT EXISTS `lesson_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `file` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `source` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `lesson_video`
--
-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `lesson` varchar(100) NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `quiz`
--
-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` varchar(50) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `try` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `result`
--
-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` varchar(50) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `has_quiz` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `status`
--
-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studid` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mobileno` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `student`
--
-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `userdata`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
