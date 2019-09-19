-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
-- Database: 'freshbr1_bot'
--
-- --------------------------------------------------------
--
-- Table structure 'atm'
--
CREATE TABLE 'atm' (
  'id' int(11) NOT NULL,
  'name' varchar(255) NOT NULL,
  'address' varchar(255) NOT NULL,
  'descr' varchar(255) NOT NULL,
  'lat' float(10, 6) NOT NULL,
  'lng' float(10, 6) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;--
-- Dump table data 'atm'
--
INSERT INTO
  'atm' ('id', 'name', 'address', 'descr', 'lat', 'lng')
VALUES
  (
    1,
    'BC Nurly Tau',
    'Almaty, Al-Farabi Ave. 13/1',
    'around the clock',
    43.231377,
    76.945442
  ),
  (
    2,
    'BC Nurly Tau',
    'Almaty, Al-Farabi Ave. 13/1',
    'from 9:00 to 18:00',
    43.231377,
    76.945442
  ),
  (
    3,
    'BC Nurly Tau',
    '\' the city of Almaty, Al-Farabi Ave. 13/1 ',
    ' from 9:00 to 18:00 ',
    43.231377,
    76.945442
  ),
  (
    4,
    'UDO "Samal"',
    'Almaty, microdistrict Samal-2, d. 105',
    'around the clock',
    43.233868,
    76.952736
  ),
  (
    5,
    'TD Dostyk Plaza' ',' Almaty,
    159 Dostyk Ave./ Zholdasbekova St.','
    from
      9 :00 to 24 :00 ', 43.233555, 76.957687);

-- --------------------------------------------------------

--
-- table structure ' markers '
--

CREATE TABLE ' markers ' (
  ' id ' int(11) NOT NULL,
  ' name ' varchar(60) NOT NULL,
  ' address ' varchar(80) NOT NULL,
  ' phone ' varchar(255) NOT NULL,
  ' lat ' float(10,6) NOT NULL,
  ' lng ' float(10,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump data table ' markers '
--

INSERT INTO ' markers ' (' id ', ' name ', ' address ', ' phone ', ' lat ', ' lng ') VALUES
(1, ' Division of branch No.109 ', ' Almaty,
      Karasai Batyr St.125,
      corner of Muratbaev St.', ' 8 (727) 321 23 73,
      321 23 74,
      321 23 72 ', 43.250080, 76.919548) ,
(2, ' Central Office ', ' Almaty,
      Al - Farabi Ave.,
      13 / 1 ', ' 8 (727) 266 35 68 ', 43.231377, 76.945442),
(3, ' Division of branch No.112 ', ' Almaty,
      38 Dostyk Ave.,
      Ken Dala business center,
      floor 1 ', ' 8 (727) 266 90 09 ', 43.252304, 76.956924),
(4, ' Branch in Almaty ', ' Almaty,
      Gogol / Kaldayakova St.,
      30 / 26 ', ' 8 (727) 250 30 20 ', 43.260391, 76.958710),
(5, ' Division of the branch No.3 ', ' Almaty,
      microdistrict Samal -2,
      d.105 ', ' 8 (727) 250 -52 -14,
      250 -52 -30,
      250 -52 -15,
      334 -20 -33,
      334 -20 -32,
      334 -20 -31 ', 43.233868, 76.952736),
(6, ' Division of branch No.96 ', ' Almaty,
      97 Dostyk Ave.,
      office 3 ', ' 8 (727) 258 49 99 ', 43.229702, 76.959801);

-- --------------------------------------------------------

--
-- Table structure ' markers_schedule '
--

CREATE TABLE ' markers_schedule ' (
  ' id ' int(11) NOT NULL,
  ' marker_id ' int(11) NOT NULL,
  ' day ' text NOT NULL,
  ' fromthe ' varchar(255) NOT NULL,
  ' along ' varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump data table ' markers_schedule '
--

INSERT INTO ' markers_schedule ' (' id ', ' marker_id ', ' day ', ' fromthe ', ' along ') VALUES
(1, 1, ' mon ', ' 9 00 ', ' 18 00 '),
(2, 1, ' tue ', ' 9 00 ', ' 18 00 '),
(3, 1, ' Wed ', ' 9 00 ', ' 18 00 '),
(4, 1, ' thu ', ' 9 00 ', ' 18 00 '),
(5, 1, ' Fri ', ' 9 00 ', ' 18 00 '),
(6, 1, ' sat ', ' 9 00 ', ' 15 00 '),
(7, 2, ' mon ', ' 9 00 ', ' 18 00 '),
(8, 2, ' Tue ', ' 9 00 ', ' 18 00 '),
(9, 2, ' Wed ', ' 9 00 ', ' 18 00 '),
(10, 2, ' thu ', ' 9 00 ', ' 18 00 '),
(11, 2, ' Fri ', ' 9 00 ', ' 18 00 '),
(12, 2, ' sat ', ' 9 00 ', ' 14 00 '),
(13, 3, ' mon ', ' 9 00 ', ' 18 00 '),
(14, 3, ' Tue ', ' 9 00 ', ' 18 00 '),
(15, 3, ' Wed ', ' 9 00 ', ' 18 00 '),
(16, 3, ' thu ', ' 9 00 ', ' 18 00 '),
(17, 3, ' Fri ', ' 9 00 ', ' 18 00 '),
(18, 3, ' sat ', ' 9 00 ', ' 15 00 '),
(19, 4, ' mon ', ' 9 00 ', ' 19 00 '),
(20, 4, ' Tue ', ' 9 00 ', ' 19 00 '),
(21, 4, ' Wed ', ' 9 00 ', ' 19 00 '),
(22, 4, ' thu ', ' 9 00 ', ' 19 00 '),
(23, 4, ' Fri ', ' 9 00 ', ' 19 00 '),
(24, 4, ' sat ', ' 9 00 ', ' 15 00 '),
(25, 5, ' mon ', ' 9 00 ', ' 18 00 '),
(26, 5, ' Tue ', ' 9 00 ', ' 18 00 '),
(27, 5, ' Wed ', ' 9 00 ', ' 18 00 '),
(28, 5, ' thu ', ' 9 00 ', ' 18 00 '),
(29, 5, ' Fri ', ' 9 00 ', ' 18 00 '),
(30, 5, ' sat ', ' 9 00 ', ' 15 00 '),
(31, 6, ' mon ', ' 9 00 ', ' 18 00 '),
(32, 6, ' Tue ', ' 9 00 ', ' 18 00 '),
(33, 6, ' Wed ', ' 9 00 ', ' 18 00 '),
(34, 6, ' thu ', ' 9 00 ', ' 18 00 '),
(35, 6, ' Fri ', ' 9 00 ', ' 18 00 ');

-- --------------------------------------------------------

--
-- Table structure ' message_queue '
--

CREATE TABLE ' message_queue ' (
  ' id ' int(11) NOT NULL,
  ' chat_id ' int(11) NOT NULL,
  ' message_text ' varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump data table ' message_queue '
--

INSERT INTO ' message_queue ' (' id ', ' chat_id ', ' message_text ') VALUES
(158, 148954138, ' Facts
      and Tips '),
(159, 148954138, ' Contacts '),
(163, 107074230, ' Menu '),
(164, 107074230, ' Facts
      and Tips '),
(167, 131983959, ' Facts
      and Tips '),
(213, 133051296, ' Contacts '),
(214, 133051296, ' Menu '),
(234, 70852849, ' 52.284393,
      76.967709 '),
(235, 70852849, ' Facts
      and Tips '),
(247, 148496854, ' Branches '),
(248, 148496854, ' 43.23688,
      76.883168 '),
(259, 131983959, ' Council '),
(262, 132111055, ' ATMs '),
(263, 132111055, ' 43.233309,
      76.948044 '),
(280, 118015723, ' Contacts '),
(281, 118015723, ' Menu '),
(289, 50045174, ' Contacts '),
(290, 50045174, ' Menu '),
(291, 50045174, ' Currency '),
(293, 232325073, ' 43.231631,
      76.946503 '),
(294, 232325073, ' / start '),
(296, 196727219, ' ATMs '),
(297, 196727219, ' 43.318294.76.914682 '),
(300, 74043295, ' ATMs '),
(301, 74043295, ' 43.199532,
      76.875041 '),
(302, 50045174, ' Currency '),
(309, 225061816, ' Contacts '),
(310, 225061816, ' Menu '),
(311, 50045174, ' Currency ');

-- --------------------------------------------------------

--
-- Table structure ' texts '
--

CREATE TABLE ' texts ' (
  ' id ' int(11) DEFAULT NULL,
  ' header ' varchar(255) NOT NULL,
  ' text ' varchar(255) NOT NULL,
  ' type ' int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump data table ' texts '
--

INSERT INTO ' texts ' (' id ', ' header ', ' text ', ' type ') VALUES
(NULL, ' Tip # 1', 'Remember the value of a thing is made up not only of the price of the goods, but also of expenses ....', 0),(
      NULL,
      'Tip # 8',
      'If you received an SMS notification about the debiting of funds from your account ....',
      0
  ),
  (
    NULL,
    'Fact No. 3',
    'In 2014, Sberbank made a qualitative breakthrough in the development of IT along the path of creating a high-tech system ...',
    1
  ),
  (
    NULL,
    'Fact No. 6',
    'Sberbank today is 14 territorial banks and more than 17 thousand branches throughout the country.',
    1
  );--
  -- Indexes of Saved Tables
  --
  --
  -- 'Atm' table indices
  --
ALTER TABLE
  'atm'
ADD
  PRIMARY KEY ('id');--
  -- 'Markers' table indices
  --
ALTER TABLE
  'markers'
ADD
  PRIMARY KEY ('id');--
  -- Indexes on the table 'markers_schedule'
  --
ALTER TABLE
  'markers_schedule'
ADD
  PRIMARY KEY ('id');--
  -- Indexes on the table 'message_queue'
  --
ALTER TABLE
  'message_queue'
ADD
  PRIMARY KEY ('id');--
  -- AUTO_INCREMENT for saved tables
  --
  --
  -- AUTO_INCREMENT for table 'markers'
  --
ALTER TABLE
  'markers'
MODIFY
  'id' int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;--
  -- AUTO_INCREMENT for table 'markers_schedule'
  --
ALTER TABLE
  'markers_schedule'
MODIFY
  'id' int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 36;--
  -- AUTO_INCREMENT for table 'message_queue'
  --
ALTER TABLE
  'message_queue'
MODIFY
  'id' int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 312;
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
