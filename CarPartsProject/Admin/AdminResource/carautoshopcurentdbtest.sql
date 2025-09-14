

CREATE TABLE `admininfo` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `Foreign` (`id`),
  CONSTRAINT `FK_2` FOREIGN KEY (`id`) REFERENCES `logininfo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

insert into `admininfo` values('1', '29', 'ADMIN', '$2y$10$KpMfaYN5k9uS7z4PKofrvO.nug4fwdAr3iDLg6nu8d9JhzuWImC66');


CREATE TABLE `customerinfo` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenum` varchar(13) NOT NULL,
  `address` varchar(250) NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `Foreign` (`id`),
  CONSTRAINT `FK_1` FOREIGN KEY (`id`) REFERENCES `logininfo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

insert into `customerinfo` values('5', '24', 'Zahin', '$2y$10$7DttDfw5tUk9Tnm32xuU6.DeOlT3fq.SGiaXJbnpz1pZvtv0MJirq', 'acearea.orky11@gmail.com', '01715000166', 'Green Road');
insert into `customerinfo` values('6', '25', 'Walid', '$2y$10$TymS3grv2PcAIcmbYaywheu/eQ5EqlLF4iF2/fT5FQEL8YDDwBuVq', 'acearea.candy11@gmail.com', '01680600170', 'Kuril');
insert into `customerinfo` values('8', '27', 'Arnob', '$2y$10$FMstUgWBNkakpkRmJh77iuankCaeeqL7XHg.WCsFRMeJ8ui2UYc92', 'ace.ABC11@gmail.com', '01918005432', 'Boshundhara');
insert into `customerinfo` values('9', '28', 'Rakib', '$2y$10$8Bbmh889Zbq0453.RcRXoeJnu1CS7FX8Jhi0yjhvxIMbyQrKmNwca', 'xyz.ABC11@gmail.com', '01880300170', 'Panthapath');


CREATE TABLE `logininfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

insert into `logininfo` values('24', 'Zahin', '$2y$10$7DttDfw5tUk9Tnm32xuU6.DeOlT3fq.SGiaXJbnpz1pZvtv0MJirq', 'customer');
insert into `logininfo` values('25', 'Walid', '$2y$10$TymS3grv2PcAIcmbYaywheu/eQ5EqlLF4iF2/fT5FQEL8YDDwBuVq', 'customer');
insert into `logininfo` values('27', 'Arnob', '$2y$10$FMstUgWBNkakpkRmJh77iuankCaeeqL7XHg.WCsFRMeJ8ui2UYc92', 'customer');
insert into `logininfo` values('28', 'Rakib', '$2y$10$8Bbmh889Zbq0453.RcRXoeJnu1CS7FX8Jhi0yjhvxIMbyQrKmNwca', 'customer');
insert into `logininfo` values('29', 'ADMIN', '$2y$10$KpMfaYN5k9uS7z4PKofrvO.nug4fwdAr3iDLg6nu8d9JhzuWImC66', 'admin');
