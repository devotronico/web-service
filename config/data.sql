CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobname` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `jobs` (`id`, `jobname`) VALUES
(1, 'Ingegnere'),
(2, 'Medico'),
(3, 'Autista'),
(4, 'Programmatore');


CREATE TABLE `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `job_id` int(2) NOT NULL,
  `name` varchar(32) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth` varchar(10) NOT NULL,
  `country` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `users` (`id`, `job_id`, `name`, `gender`, `email`, `birth`, `country`) VALUES
(1, 4, 'Dan', 'M', 'dan@mail.it', '1983-10-15', 'Italy'),
(3, 1, 'Foo', 'F', 'foo@mail.it', '1992-06-24', 'Poland'),
(2, 2, 'Yum', 'F', 'yum@mail.it', '1978-12-16', 'Ungary'),
(5, 3, 'Bob', 'M', 'bob@mail.it', '1969-11-27', 'Germany'),
(6, 2, 'Tom', 'M', 'tom@mail.it', '1997-07-02', 'Greece'),
(4, 4, 'Lin', 'F', 'zac@mail.it', '1991-01-11', 'France');

