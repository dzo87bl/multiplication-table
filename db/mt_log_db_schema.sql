--
-- Create database
--

CREATE DATABASE IF NOT EXISTS mt_log DEFAULT CHARSET utf8 COLLATE utf8_general_ci; 

--
-- Create log table
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factor1` int(11) unsigned NOT NULL,
  `factor2` int(11) unsigned NOT NULL,
  `operation` varchar(25) NOT NULL DEFAULT '*',
  `result` int(11) unsigned NOT NULL,
  `operation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Multiplication table log' AUTO_INCREMENT=1 ;