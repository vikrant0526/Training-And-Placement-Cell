DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_SHORTLIST_NOTIFICATION`(IN `sid` INT, IN `rid` INT, IN `stype` CHAR(2), IN `rtype` CHAR(2), IN `type` CHAR(5), IN `description` VARCHAR(255))
    NO SQL
BEGIN
INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_SENDER_ID, tbl_notification.NOTIFICATION_RECEIVER_ID, tbl_notification.NOTIFICATION_SENDER_TYPE, tbl_notification.NOTIFICATION_RECIVER_TYPE, tbl_notification.NOTIFICATION_TYPE, tbl_notification.NOTIFICATION_DESCRPTION, tbl_notification.NOTIFICATION_REMOVE_STATUS) VALUES (sid, rid, stype, rtype, type, description, 0);
END$$
DELIMITER ;