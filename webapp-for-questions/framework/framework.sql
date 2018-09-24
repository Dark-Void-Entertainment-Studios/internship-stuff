SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `webapp` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(60) NOT NULL,
  `student_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `webapp` (`student_id`, `student_name`, `student_password`) VALUES
(1,`Rens`,`Acnologia`),
(2,`Floris`,`Lanselot1940`),
(3,`Bart`,`Bartkuip123`);

ALTER TABLE `webapp`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99041395;