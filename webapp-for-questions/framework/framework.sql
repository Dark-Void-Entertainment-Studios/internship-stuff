SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `webapp` (
	`student_id` int(11) NOT NULL,
	`student_name` varchar(60) NOT NULL,
	`student_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `questions` (
	`question_id` int(11) NOT NULL,
	`student_name`int(11) NOT NULL,
	`question_text` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `webapp` (`student_id`, `student_name`, `student_password`) VALUES
	(1,`Rens`,`Acnologia`),
	(2,`Floris`,`Lanselot1940`),
	(3,`Bart`,`Bartkuip123`);

INSERT INTO `webapp` (`question_id`, `asked_by`, `question_text`) VALUES
	(1,1,`did it work?`),
	(2,2,`maybe it did`),
	(3,3,`yes it did`);

ALTER TABLE `webapp`
	MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99041395;

	ALTER TABLE `webapp`
	ADD PRIMARY KEY (`student_name`);

	ALTER TABLE `questions`
	ADD KEY `student_name` (`student_name`);

