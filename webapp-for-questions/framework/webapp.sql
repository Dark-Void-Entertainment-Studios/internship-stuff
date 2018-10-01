SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `progress` (
  `progress_id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `progress` (`progress_id`, `status`) VALUES
(1, 'waiting'),
(2, 'being worked on'),
(3, 'done');

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_text` varchar(60) NOT NULL,
  `time_stamp` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `progress_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `questions` (`question_id`, `student_id`, `question_text`, `time_stamp`, `progress_id`) VALUES
(1, 1, 'did it work?', '2018-09-26 14:50:44', 1),
(2, 2, 'maybe it did?', '2018-09-28 11:57:54', 2),
(3, 3, 'yes it did!', '2018-09-28 11:58:01', 3),
(7, 4, 'hello', '2018-09-28 15:54:56', 1);

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(60) NOT NULL,
  `student_password` varchar(60) NOT NULL,
  `power_lvl` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `students` (`student_id`, `student_name`, `student_password`, `power_lvl`) VALUES
(1, 'Rens', 'Acnologia', 1),
(2, 'Floris', 'Lanselot1940', 1),
(3, 'Bart', 'Bartkuip123', 1),
(4, 'babybuttholeblack', 'Baby', 0);

ALTER TABLE `progress`
  ADD PRIMARY KEY (`progress_id`);

ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `questions_ibfk_2` (`progress_id`);

ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;

ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`progress_id`) REFERENCES `progress` (`progress_id`);
