-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 05:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rabs_oep`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(200) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `ROLE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`USER_ID`, `USER_NAME`, `PASSWORD`, `ROLE`) VALUES
(1, 'Seema Jacob', 'SeemaJ@123', 'administrator'),
(2, 'Anil Thomas', 'Anilt123!', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QUESTION_ID` int(11) NOT NULL,
  `TEST_ID` int(11) NOT NULL,
  `QUESTION` text NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `OPTION_A` text NOT NULL,
  `OPTION_B` text NOT NULL,
  `OPTION_C` text NOT NULL,
  `OPTION_D` text NOT NULL,
  `ANSWER` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QUESTION_ID`, `TEST_ID`, `QUESTION`, `IMAGE`, `OPTION_A`, `OPTION_B`, `OPTION_C`, `OPTION_D`, `ANSWER`) VALUES
(1, 1, 'How do you insert COMMENTS in Java code?', 'Questions/', '/*comment', '//comment ', '#comment ', ' none', 'b'),
(2, 1, 'Which data type is used to create a variable that should store text?', 'Questions/text.jpg', 'string', 'String', 'myString ', ' Txt', 'b'),
(3, 1, 'How do you create a variable with the numeric value 5?', 'Questions/numeric.png', 'X = 5;', 'num x = 5;', 'float x=5;', ' int x = 5;', 'd'),
(4, 1, 'How do you create a variable with the floating number 2.8?', 'Questions/float.png', 'X = 2.8f;', 'float x = 2.8f;', 'byte x = 2.8f', ' int x = 2.8f;', 'b'),
(5, 1, 'Which method can be used to find the length of a string?', 'Questions/', 'getSize()', 'getLength()', 'len()', ' length()', 'd'),
(6, 1, 'Which operator is used to add together two values?', 'Questions/', '&', '+', '*', ' -', 'b'),
(7, 1, 'Which method can be used to return a string in upper case letters?', 'Questions/', 'upperCase()', 'touppercase()', 'toUpperCase()', ' tuc()', 'c'),
(8, 1, 'What is the size of short variable?', 'Questions/', '16 bit', '64 bit', '8 bit', '  32 bit', 'a'),
(9, 1, 'What is local variable?', 'Questions/', 'Variables defined inside methods, constructors or blocks are called local variables.', 'Variables defined outside methods, constructors or blocks are called local variables.', 'Static variables defined outside methods, constructors or blocks are called local variables.', ' None of the above.', 'a'),
(10, 1, 'This is the parent of Error and Exception classes.', 'Questions/', 'Catchable', 'MainException', 'Throwable', ' MainError', 'c'),
(11, 1, 'Which of the following is true about protected access modifier?', 'Questions/', 'Variables, methods and constructors which are declared protected can be accessed by any class.', 'Variables, methods and constructors which are declared protected can be accessed by any class lying in same package.', 'Variables, methods and constructors which are declared protected in the superclass can be accessed only by its child class.', ' None of the above.', 'b'),
(12, 1, 'What is composition?', 'Questions/', 'Composition is a data structure.', 'Composition is a way to create an object.', 'Holding the reference of the other class within some other class is known as composition.', ' None of the above.', 'c'),
(13, 1, 'Which Set class should be most popular in a multi-threading environment, considering performance constraint?', 'Questions/', 'HashSet', 'ConcurrentSkipListSet', 'LinkedHashSet', ' CopyOnWriteArraySet', 'b'),
(14, 1, 'Which allows the removal of elements from a collection?', 'Questions/', 'Enumeration', 'Iterator', 'Both', ' None of the above', 'd'),
(15, 1, 'What will be the output of given code', 'Questions/Java-Quiz-Three-Q.4-1024x582.jpg', 'Compile time exception', '3 2 1', '1 2 3', ' 2 3 1', 'b'),
(16, 1, 'Which offers the best performance?', 'Questions/', 'TreeMap', 'HashMap', 'LinkedHashMap', ' None of the above', 'b'),
(17, 1, 'Which of these is the most popularly used class as a key in a HashMap?', 'Questions/', 'String', 'Integer', 'Double', ' All of the above', 'b'),
(18, 1, 'The Comparator interface contains the method?', 'Questions/', 'compareWith', 'compareTo()', 'compare()', ' None of the above', 'c'),
(19, 1, 'What will be the output of the following code', 'Questions/JavaQuiz2.jpg', 'Runtime Exception', '[1]', '[null, 1]', ' {a=ferrari}', 'd'),
(20, 1, 'TreeMap', 'Questions/', 'Allow several null values', 'Doesn\'t enable null key', 'Both the above', 'None of the above', 'a'),
(21, 2, 'Which data type can be used to hold a wide character in C++?', 'Questions/', 'unsigned char;', 'int', 'wchar_t', ' none of the above.', 'c'),
(22, 2, 'i) single file can be opened by several streams simultaneously.\r\nii) several files simultaneously can be opened by a single stream', 'Questions/', '(i) and (ii) are true', '(i) and (ii) are false', 'Only (i) is true', ' Only (ii) is true', 'c'),
(23, 2, 'An exception is __', 'Questions/', 'Runtime error', 'Compile time error', 'Logical error', ' None of the above', 'a'),
(24, 2, 'Special symbol permitted with in the identifier name.', 'Questions/', '$', '@', '_', ' - .', 'c'),
(25, 2, 'i) Exceptions can be traced and controlled using conditional statements.\r\nii) For critical exceptions compiler provides the handler', 'Questions/', 'Only (i) is true', ' Only (ii) is true', 'Both (i) & (ii) are true', ' Both (i) && (ii) are false', 'b'),
(26, 2, 'The default access specifer for the class members is', 'Questions/', 'public', 'private', 'protected', ' None of the above', 'b'),
(27, 2, 'C++ does not supports the following', 'Questions/', 'Multilevel inheritance', 'Hierarchical inheritance', 'Hybrid inheritance', ' None of the above', 'd'),
(28, 2, 'One of the following is true for an inline function.', 'Questions/', 'It executes faster as it is treated as a macro internally', 'It executes faster because it priority is more than normal function', 'It doesn’t executes faster compared to a normal function', ' None of the above holds true for an inline function', 'a'),
(29, 2, 'Operators sizeof and ?:', 'Questions/', 'Both can be overloaded', 'Both cannot be overloaded', 'Only sizeof can be overloaded', ' Only ?: can be overloaded', 'b'),
(30, 2, 'The following operator can be used to calculate the value of one number raised to another.', 'Questions/', '^', '**', '^^', ' None of the above', 'd'),
(31, 3, 'Which of the following is correct about PHP?', 'Questions/php-tutsplus.png', 'PHP can access cookies variables and set cookies.', 'Using PHP, you can restrict users to access some pages of your website.', 'It can encrypt data.', ' All of the above.', 'd'),
(32, 3, 'Which of the following type of variables have only two possible values either true or false?', 'Questions/', 'Integers', 'Doubles', 'Booleans', ' Strings', 'c'),
(33, 3, 'Which of the following is correct about constants vs variables in PHP?', 'Questions/', 'Constants may be defined and accessed anywhere without regard to variable scoping rules.', 'Once the Constants have been set, may not be redefined or undefined.', 'Both of the above.', ' None of the above.', 'c'),
(34, 3, ' Which of the following array represents an array containing one or more arrays?', 'Questions/', 'Numeric Array', 'Associative Array', 'Multidimentional Array', ' None of the above', 'c'),
(35, 3, 'Which of the following variable is used to generate random numbers using PHP?', 'Questions/', 'srand()', 'rand()', 'random()', ' None of the above', 'b'),
(36, 3, 'Which of the following is an associative array containing session variables available to the current script?', 'Questions/', '$GLOBALS', '$_SERVER', '$_COOKIE', ' $_SESSION', 'd'),
(37, 3, 'Which of the following method connect a MySql database using PHP?', 'Questions/', 'mysql_connect()', 'mysql_query()', 'mysql_close()', ' None of the above', 'a'),
(38, 3, 'Which of the following method of Exception class returns source line?', 'Questions/', 'getMessage()', 'getCode()', 'getFile()', ' getLine()', 'd'),
(39, 3, 'Which of the following function is used to check if a file exists or not?', 'Questions/', 'fopen()', 'fread()', 'filesize()', ' file_exist()', 'd'),
(40, 3, 'Which of the following is correct about PHP?', 'Questions/', 'PHP is a recursive acronym for \"PHP: Hypertext Preprocessor\".', 'PHP is a server side scripting language that is embedded in HTML.', 'It is used to manage dynamic content, databases, session tracking, even build entire e-commerce sites.', ' All of the above.', 'd'),
(41, 4, 'The protocol data unit(PDU) for the application layer in the Internet stack is', 'Questions/', 'Segment', 'Datagram', 'Message', ' Frame', 'c'),
(42, 4, 'Which of the following transport layer protocolss is used to support electronic mail?', 'Questions/', 'SMTP', 'IP', 'TCP', ' UDP', 'c'),
(43, 4, 'In the IPv4 addressing format, the number of networks allowed under Class C addresses is', 'Questions/', '2^21', '2^14', '2^24', '  2^7', 'a'),
(44, 4, 'An Internet Service Provider(ISP) has the following chunk of CIDR-based IP addresses available with it:245.248.128.0/20. The ISP wants to give half of this chunk of addreses to Organization A, and a quarter to Organization B, while retaining the remaining with itself. Which of the following is a valid allocation of addresses to A and B?', 'Questions/', '245.248.136.0/21 and 245.248.128.0/22', '245.248.128.0/21 and 245.248.128.0/22', '245.248.132.0/22 and 245.248.132.0/21', ' 245.248.136.0/22 and 245.248.132.0/21', 'a'),
(45, 4, 'Every computer looking to access the Internet would be known as this', 'Questions/', 'client', 'hub', 'desktop', ' server', 'a'),
(46, 7, 'first letter of apple', 'Questions/', 'a', 'b', 'c', ' d', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `questions_desc`
--

CREATE TABLE `questions_desc` (
  `QUESTION_ID` int(11) NOT NULL,
  `TEST_ID` int(11) NOT NULL,
  `QUESTION` varchar(400) NOT NULL,
  `IMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions_desc`
--

INSERT INTO `questions_desc` (`QUESTION_ID`, `TEST_ID`, `QUESTION`, `IMAGE`) VALUES
(1, 1, 'What is Java?', 'Questions_desc/Java.jpg'),
(2, 1, 'What will be the output of the following code', 'Questions_desc/Java-Quiz-Four.jpg'),
(3, 1, 'What are constructors in Java?', 'Questions_desc/'),
(4, 1, 'Why Java is not 100% Object-oriented?', 'Questions_desc/'),
(5, 1, 'Why Java is platform independent?', 'Questions_desc/'),
(6, 2, 'Explain OOP Concept', 'Questions_desc/oop.png'),
(7, 2, 'What are the different features of c++?', 'Questions_desc/c++.png'),
(8, 3, 'What is PHP? Explain in details', 'Questions_desc/php-tutsplus.png'),
(9, 3, 'What is the difference between static and dynamic websites?', 'Questions_desc/'),
(10, 4, 'Explain topology, types, and what is topology', 'Questions_desc/topo.jpg'),
(11, 4, 'Explain difference layers in computer networking ', 'Questions_desc/');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SUBJECT_ID` int(11) NOT NULL,
  `SUBJECT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SUBJECT_ID`, `SUBJECT`) VALUES
(1, 'JAVA'),
(2, 'CPP'),
(3, 'PHP'),
(4, 'CN'),
(5, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `TEST_ID` int(11) NOT NULL,
  `SUBJECT` varchar(100) NOT NULL,
  `TEST_NAME` varchar(100) NOT NULL,
  `SDATETIME` datetime NOT NULL,
  `EDATETIME` datetime NOT NULL,
  `TEST_DURATION` int(11) NOT NULL,
  `ATTEMPTS` int(11) NOT NULL,
  `YES_NO` varchar(10) NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`TEST_ID`, `SUBJECT`, `TEST_NAME`, `SDATETIME`, `EDATETIME`, `TEST_DURATION`, `ATTEMPTS`, `YES_NO`, `CREATED`) VALUES
(1, 'JAVA', 'Java_Test_Core1', '2021-02-28 09:30:00', '2021-02-28 18:00:00', 60, 1, 'Yes', '2021-02-28 07:59:04'),
(2, 'CPP', 'CPP_Test_Core1', '2021-02-28 11:00:00', '2021-02-28 19:30:00', 30, 1, 'Yes', '2021-02-28 08:03:36'),
(3, 'PHP', 'PHP_Test_Core1', '2021-03-01 09:30:00', '2021-03-01 05:30:00', 45, 1, 'Yes', '2021-02-28 08:06:29'),
(4, 'CN', 'CN_Test_Core1', '2021-03-01 09:30:00', '2021-03-01 16:30:00', 45, 1, 'Yes', '2021-02-28 08:09:10'),
(5, 'C', 'C_Test_Core1', '2021-03-02 09:30:00', '2021-03-02 15:30:00', 30, 1, 'Yes', '2021-02-28 08:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE `test_result` (
  `RESULT_ID` int(11) NOT NULL,
  `TEST_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `RIGHT_ANS` int(11) NOT NULL,
  `WRONG_ANS` int(11) NOT NULL,
  `NO_ATTEMPT` int(11) NOT NULL,
  `SCORE` float NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`RESULT_ID`, `TEST_ID`, `USER_ID`, `RIGHT_ANS`, `WRONG_ANS`, `NO_ATTEMPT`, `SCORE`, `TIME`) VALUES
(1, 1, 2, 7, 13, 0, 35, '2021-02-28 09:40:43'),
(2, 2, 2, 5, 5, 0, 50, '2021-02-28 11:15:49'),
(3, 1, 1, 9, 11, 0, 45, '2021-02-28 11:20:46'),
(4, 2, 1, 5, 5, 0, 50, '2021-02-28 11:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `test_result_desc`
--

CREATE TABLE `test_result_desc` (
  `ID` int(11) NOT NULL,
  `RESULT_ID` int(11) NOT NULL,
  `QUESTION_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `TEST_ID` int(11) NOT NULL,
  `ANSWER` text NOT NULL,
  `MARKS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_result_desc`
--

INSERT INTO `test_result_desc` (`ID`, `RESULT_ID`, `QUESTION_ID`, `USER_ID`, `TEST_ID`, `ANSWER`, `MARKS`) VALUES
(1, 5, 2, 2, 1, 'newEmployee', 0),
(2, 5, 3, 2, 1, 'A constructor in Java is a special method that is used to initialize objects. The constructor is called when an object of a class is created.', 3),
(3, 5, 4, 2, 1, 'java is 100% pure OOP because it provide complete structure about OOP', 2),
(4, 5, 5, 2, 1, 'Java Platform is a collection of programs that help programmers to develop and run Java programming applications efficiently. It includes an execution engine, a compiler, and a set of libraries in it. It is a set of computer software and specifications. James Gosling developed the Java platform at Sun Microsystems, and the Oracle Corporation later acquired it.', 3),
(5, 2, 6, 2, 2, 'OOP stands for Object-Oriented Programming.\r\n\r\nProcedural programming is about writing procedures or functions that perform operations on the data, while object-oriented programming is about creating objects that contain both data and functions.\r\n\r\nObject-oriented programming has several advantages over procedural programming:\r\n\r\nOOP is faster and easier to execute\r\nOOP provides a clear structure for the programs\r\nOOP helps to keep the C++ code DRY \"Don\'t Repeat Yourself\", and makes the code easier to maintain, modify and debug\r\nOOP makes it possible to create full reusable applications with less code and shorter development time', 5),
(6, 2, 7, 2, 2, 'simple, complex, platform dependent', 2),
(7, 3, 1, 1, 1, 'Java is a programming language and computing platform first released by Sun Microsystems in 1995. There are lots of applications and websites that will not work unless you have Java installed, and more are created every day. Java is fast, secure, and reliable. From laptops to datacenters, game consoles to scientific supercomputers, cell phones to the Internet, Java is everywhere!', 5),
(8, 3, 2, 1, 1, 'sum', 0),
(9, 3, 3, 1, 1, 'A constructor in Java is a special method that is used to initialize objects. The constructor is called when an object of a class is created.', 3),
(10, 3, 4, 1, 1, 'Rich in OOP Concept', 1),
(11, 3, 5, 1, 1, 'Due to platform independent class file generated by machine', 1),
(12, 4, 6, 1, 2, 'OOP stands for Object-Oriented Programming.\r\n\r\nProcedural programming is about writing procedures or functions that perform operations on the data, while object-oriented programming is about creating objects that contain both data and functions.\r\n\r\nObject-oriented programming has several advantages over procedural programming:\r\n\r\nOOP is faster and easier to execute\r\nOOP provides a clear structure for the programs\r\nOOP helps to keep the C++ code DRY \"Don\'t Repeat Yourself\", and makes the code easier to maintain, modify and debug\r\nOOP makes it possible to create full reusable applications with less code and shorter development time', 5),
(13, 4, 7, 1, 2, 'OOP (Object-Oriented Programming) C++ is an object-oriented language, unlike C which is a procedural language, Platform or Machine Independent/ Portable, Simple,\r\nCompiler-Based, DMA (Dynamic Memory Allocation)', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(200) NOT NULL,
  `EMAIL_ID` varchar(200) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `PHONE_NO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `USER_NAME`, `EMAIL_ID`, `PASSWORD`, `PHONE_NO`) VALUES
(1, 'Antony Antony', 'antonyantony12@gmail.com', '3a71f57dd07c2a4423549f6bd18bc90d', '9022873094'),
(2, 'Abin Thomas', 'abin1237@gmail.com', 'ff2ecaa9c08695a9acb552d960871274', '8877565628'),
(3, 'Bibin Biju', 'bibinbiju00@gmail.com', '839af66f425f753aaeb10528d4762188', '7589453512'),
(4, 'Sarun Saji', 'sarunsaji1100@gmail.com', '6a98dd9eabd9118a94229fcabbeb743b', '9969452375'),
(5, 'Arun sam', 'arun77@gmail.com', '588dd15461a1c8752b3cef179dfbc503', '8599694522'),
(6, 'Nivin Cijo', 'NivinCijo789@gmail.com', '72f86417d8a932bc59f2666edf2b57c0', '8394561237'),
(7, 'Anu Thomas', 'anu123@gmail.com', '34f6782b601fbc5ff572ba9ac37d3179', '9876543210');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QUESTION_ID`);

--
-- Indexes for table `questions_desc`
--
ALTER TABLE `questions_desc`
  ADD PRIMARY KEY (`QUESTION_ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SUBJECT_ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`TEST_ID`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD PRIMARY KEY (`RESULT_ID`);

--
-- Indexes for table `test_result_desc`
--
ALTER TABLE `test_result_desc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QUESTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `questions_desc`
--
ALTER TABLE `questions_desc`
  MODIFY `QUESTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SUBJECT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `TEST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_result`
--
ALTER TABLE `test_result`
  MODIFY `RESULT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_result_desc`
--
ALTER TABLE `test_result_desc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
