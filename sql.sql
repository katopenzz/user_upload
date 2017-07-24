--
-- Database: `users_upload`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_upload`
--
USE user_upload;
DROP TABLE IF EXISTS `user_upload`;
CREATE TABLE `user_upload` (
  `name` varchar(255) default NULL,
  `surname` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  PRIMARY KEY  (`email`),
)
