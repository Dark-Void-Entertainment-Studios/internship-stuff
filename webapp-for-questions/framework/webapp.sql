SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `questions` (
	`question_id` int(11) NOT NULL,
	`student_id` int(11) NOT NULL,
	`question_text` varchar(60) NOT NULL,
	`time_stamp` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `questions` (`question_id`, `student_id`, `question_text`, `time_stamp`) VALUES
(1, 1, 'did it work?', '2018-09-25 12:04:19'),
(2, 2, 'maybe it did', '2018-09-25 12:04:19'),
(3, 3, 'yes it did', '2018-09-25 12:04:19'),
(4, 1, 'bye', '2018-09-25 12:04:19');

CREATE TABLE IF NOT EXISTS `students` (
	`student_id` int(11) NOT NULL,
	`student_name` varchar(60) NOT NULL,
	`student_password` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=99041395 DEFAULT CHARSET=utf8;

INSERT INTO `students` (`student_id`, `student_name`, `student_password`) VALUES
(1, 'Rens', 'Acnologia'),
(2, 'Floris', 'Lanselot1940'),
(3, 'Bart', 'Bartkuip123');

ALTER TABLE `questions`
	ADD UNIQUE KEY `question_id` (`question_id`),
	ADD KEY `student_id` (`student_id`),
	ADD KEY `student_id_2` (`student_id`);

ALTER TABLE `students`
	ADD PRIMARY KEY (`student_id`);

ALTER TABLE `questions`
	MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

ALTER TABLE `students`
	MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99041395;

ALTER TABLE `questions`
	ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);