SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `FAQ` (
  `FAQ_id` int(11) NOT NULL,
  `question` varchar(10000) NOT NULL,
  `answer` varchar(10000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `FAQ` (`FAQ_id`, `question`, `answer`) VALUES
(1, 'wat is een LED', 'LED staat voor light emitting deode. dus het is een lampje'),
(2, 'waarom kan ik niet uploaden', 'zit je USB er in en heb je de poort geselecteert'),
(3, 'welke resistor moet ik gebruiken by een LED ', 'de meeste LEDs hier hebben een 220ohm resistor nodig');

CREATE TABLE IF NOT EXISTS `progress` (
  `progress_id` int(60) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `progress` (`progress_id`, `status`) VALUES
(1, 'waiting'),
(2, 'being worked on'),
(3, 'done');

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(60) NOT NULL,
  `student_id` int(60) NOT NULL,
  `question_text` varchar(10000) NOT NULL,
  `time_stamp` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `progress_id` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `questions` (`question_id`, `student_id`, `question_text`, `time_stamp`, `progress_id`) VALUES
(1, 1, 'did it work?', '2018-09-26 14:50:44', 1),
(2, 2, 'maybe it did?', '2018-10-03 12:07:34', 1),
(3, 3, 'yes it did!', '2018-09-28 11:58:01', 3),
(7, 4, 'hello', '2018-10-03 12:09:53', 2);

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(60) NOT NULL,
  `student_name` varchar(180) NOT NULL,
  `student_password` varchar(180) NOT NULL,
  `power_lvl` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `students` (`student_id`, `student_name`, `student_password`, `power_lvl`) VALUES
(1, 'Rens', 'Acnologia', 1),
(2, 'Floris', 'Lanselot1940', 1),
(3, 'Bart', 'Bartkuip123', 1);

ALTER TABLE `FAQ`
  ADD PRIMARY KEY (`FAQ_id`);

ALTER TABLE `progress`
  ADD PRIMARY KEY (`progress_id`);

ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `questions_ibfk_2` (`progress_id`);

ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

ALTER TABLE `FAQ`
  MODIFY `FAQ_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;

ALTER TABLE `questions`
  MODIFY `question_id` int(60) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;

ALTER TABLE `students`
  MODIFY `student_id` int(60) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;

ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`progress_id`) REFERENCES `progress` (`progress_id`);
