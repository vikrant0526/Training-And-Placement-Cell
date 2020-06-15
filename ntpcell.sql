-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 05:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ntpcell`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACCEPT_REG` (IN `id` INT, IN `type` CHAR(2), IN `nid` INT)  NO SQL
BEGIN
CALL `REMOVE_NOTIFICATION`(nid);
IF type = 'CP' THEN
	UPDATE tbl_company SET tbl_company.COMPANY_ACCEPTED='A' WHERE tbl_company.COMPANY_ID=id;
ELSEIF type = 'FC' OR type = 'CM' OR type = 'CH' THEN
	UPDATE tbl_faculty SET tbl_faculty.FACULTY_ACCEPTED='A' WHERE tbl_faculty.FACULTY_ID=id;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ADD_CHANGE_SHORTLIST_STUDENT_STATUS` (IN `studid` INT, IN `selectid` INT)  NO SQL
BEGIN



UPDATE tbl_shortlist SET tbl_shortlist.SHORTLIST_TYPE="SH" WHERE tbl_shortlist.SHORTLIST_STUDENT_ID=studid AND tbl_shortlist.SHORTLIST_SELECTION_LIST_ID=selectid;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ADD_MEMBER_BROADCASTLIST_CHANGE_STATUS` (IN `broadcast_id` INT, IN `company_id` INT)  NO SQL
BEGIN

UPDATE tbl_broadcast_list_members SET tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_STATUS='0' WHERE tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_BROADCAST_ID=broadcast_id
AND tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_COMPANY_ID=company_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `APPLY_EVENT` (IN `eid` INT, IN `sid` INT, IN `nid` INT)  NO SQL
BEGIN
INSERT INTO tbl_event_application (tbl_event_application.EVENT_APPLICATION_STUDENT_ID,tbl_event_application.EVENT_APPLICATION_EVENT_ID) VALUES(sid,eid);
CALL REMOVE_NOTIFICATION(nid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `B6` (IN `sid` INT, IN `board10` VARCHAR(255), IN `school10` VARCHAR(255), IN `perc10` FLOAT, IN `board12` VARCHAR(255), IN `school12` VARCHAR(255), IN `stream12` VARCHAR(255), IN `perc12` FLOAT, IN `bs1` FLOAT, IN `bs2` FLOAT, IN `bs3` FLOAT, IN `bs4` FLOAT, IN `bs5` FLOAT, IN `bs6` FLOAT, IN `unversity_b` VARCHAR(255), IN `institute_b` VARCHAR(255), IN `specialization_b` VARCHAR(255), IN `degree_b` VARCHAR(255))  NO SQL
BEGIN
CALL INSERT_UPDATE_10TH(sid,board10,school10,perc10);
CALL INSERT_UPDATE_12TH(sid,board12,school12,stream12,perc12);
CALL INSERT_UPDATE_BACHELOR( sid,unversity_b,institute_b,specialization_b
,degree_b, bs1, bs2, bs3, bs4, bs5, bs6, NULL, NULL);
CALL INSERT_UPDATE_ACADEMICS(sid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `B6M4` (IN `sid` INT, IN `board10` VARCHAR(255), IN `school10` VARCHAR(255), IN `perc10` FLOAT, IN `board12` VARCHAR(255), IN `school12` VARCHAR(255), IN `stream12` VARCHAR(255), IN `perc12` FLOAT, IN `university_b` VARCHAR(255), IN `institute_b` VARCHAR(255), IN `specialization_b` VARCHAR(255), IN `degree_b` VARCHAR(255), IN `bs1` FLOAT, IN `bs2` FLOAT, IN `bs3` FLOAT, IN `bs4` FLOAT, IN `bs5` FLOAT, IN `bs6` FLOAT, IN `ms1` FLOAT, IN `ms2` FLOAT, IN `ms3` FLOAT, IN `ms4` FLOAT, IN `university_m` VARCHAR(255), IN `institute_m` VARCHAR(255), IN `specialization_m` VARCHAR(255), IN `degree_m` VARCHAR(255))  NO SQL
BEGIN
CALL INSERT_UPDATE_10TH(sid,board10,school10,perc10);
CALL INSERT_UPDATE_12TH(sid,board12,school12,stream12,perc12);
CALL INSERT_UPDATE_BACHELOR( sid, university_b, institute_b, specialization_b,degree_b,bs1, bs2, bs3, bs4, bs5, bs6, NULL, NULL);
CALL INSERT_UPDATE_MASTER( sid,university_m,institute_m,specialization_m,degree_m,ms1, ms2, ms3, ms4);
CALL INSERT_UPDATE_ACADEMICS(sid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `B8` (IN `sid` INT, IN `board10` VARCHAR(255), IN `school10` VARCHAR(255), IN `perc10` FLOAT, IN `board12` VARCHAR(255), IN `school12` VARCHAR(255), IN `stream12` VARCHAR(255), IN `perc12` FLOAT, IN `bs1` FLOAT, IN `bs2` FLOAT, IN `bs3` FLOAT, IN `bs4` FLOAT, IN `bs5` FLOAT, IN `bs6` FLOAT, IN `bs7` FLOAT, IN `bs8` FLOAT, IN `university_b` VARCHAR(255), IN `institute_b` VARCHAR(255), IN `specialization_b` VARCHAR(255), IN `degree_b` VARCHAR(255))  NO SQL
BEGIN
CALL INSERT_UPDATE_10TH(sid,board10,school10,perc10);
CALL INSERT_UPDATE_12TH(sid,board12,school12,stream12,perc12);
CALL INSERT_UPDATE_BACHELOR( sid, university_b, institute_b,specialization_b,degree_b, bs1, bs2, bs3, bs4, bs5, bs6, bs7, bs8);
CALL INSERT_UPDATE_ACADEMICS(sid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `B8M4` (IN `sid` INT, IN `board10` VARCHAR(255), IN `school10` VARCHAR(255), IN `perc10` FLOAT, IN `board12` VARCHAR(255), IN `school12` VARCHAR(255), IN `stream12` VARCHAR(255), IN `perc12` FLOAT, IN `university_b` VARCHAR(255), IN `institute_b` VARCHAR(255), IN `specialization_b` VARCHAR(255), IN `degree_b` VARCHAR(255), IN `bs1` FLOAT, IN `bs2` FLOAT, IN `bs3` FLOAT, IN `bs4` FLOAT, IN `bs5` FLOAT, IN `bs6` FLOAT, IN `bs7` FLOAT, IN `bs8` FLOAT, IN `ms1` FLOAT, IN `ms2` FLOAT, IN `ms3` FLOAT, IN `ms4` FLOAT, IN `university_m` VARCHAR(255), IN `institute_m` VARCHAR(255), IN `specialization_m` VARCHAR(255), IN `degree_m` VARCHAR(255))  NO SQL
BEGIN
CALL INSERT_UPDATE_10TH(sid,board10,school10,perc10);
CALL INSERT_UPDATE_12TH(sid,board12,school12,stream12,perc12);
CALL INSERT_UPDATE_BACHELOR( sid, university_b, institute_b, specialization_b,degree_b,bs1, bs2, bs3, bs4, bs5, bs6, bs7, bs8);
CALL INSERT_UPDATE_MASTER( sid,university_m,institute_m,specialization_m,degree_m,ms1, ms2, ms3, ms4);
CALL INSERT_UPDATE_ACADEMICS(sid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BATCH_WISE_PLACEMENT_REPORT` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` VARCHAR(4))  NO SQL
BEGIN
	SELECT tbl_student.*, tbl_company.*, tbl_training.*, tbl_placement.* FROM tbl_student, tbl_company, tbl_training, tbl_placement WHERE tbl_student.STUDENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear) AND tbl_placement.PLACEMENT_TRAINING_ID=tbl_training.TRAINING_ID AND tbl_training.TRAINING_STUDENT_ID=tbl_student.STUDENT_ID AND tbl_training.TRAINING_COMPANY_ID=tbl_company.COMPANY_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CANCEL_EVENT` (IN `eid` INT)  NO SQL
BEGIN
UPDATE tbl_event SET tbl_event.EVENT_CANCLED=1 WHERE tbl_event.EVENT_ID=eid;
UPDATE tbl_notification SET tbl_notification.NOTIFICATION_REMOVE_STATUS=1 WHERE tbl_notification.NOTIFICATION_EVENT_ID=eid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHANGE_PASSWORD` (IN `PSWD` VARCHAR(40), IN `email` VARCHAR(255))  NO SQL
BEGIN

DECLARE salt varchar(16);

SELECT tbl_login.LOGIN_USER_SALT INTO salt FROM tbl_login WHERE tbl_login.LOGIN_USER_EMAIL=email;

CALL `PASSWORD_GEN`(PSWD,salt);

SELECT tbl_login.LOGIN_USER_EMAIL FROM tbl_login WHERE tbl_login.LOGIN_USER_EMAIL=email and tbl_login.LOGIN_USER_PASSWORD=PSWD;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_ENROLLMENT_NUMBER` (IN `eno` VARCHAR(15))  NO SQL
BEGIN
	DECLARE st int;
    DECLARE id int;
	SELECT tbl_student.STUDENT_ID INTO id FROM tbl_student WHERE tbl_student.STUDENT_ENROLLMENT_NUMBER=eno;
    IF ISNULL(id) THEN
    	SET st=0;
	ELSE
    	SET st=1;
	END if;
    SELECT st;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_PLACEMENT_DOCUMENTS` (IN `sid` INT, IN `cid` INT)  NO SQL
BEGIN
DECLARE id_OL int;
DECLARE id_BD int;
DECLARE OL int;
DECLARE BD int;

SELECT tbl_company_document.COMPANY_DOCUMENT_ID INTO id_OL FROM tbl_company_document WHERE tbl_company_document.COMPANY_DOCUMENT_STUDENT_ID=sid AND tbl_company_document.COMPANY_DOCUMENT_COMPANY_ID=cid AND tbl_company_document.COMPANY_DOCUMENT_TYPE='OL';

SELECT tbl_company_document.COMPANY_DOCUMENT_ID INTO id_BD FROM tbl_company_document WHERE tbl_company_document.COMPANY_DOCUMENT_STUDENT_ID=sid AND tbl_company_document.COMPANY_DOCUMENT_COMPANY_ID=cid AND tbl_company_document.COMPANY_DOCUMENT_TYPE='BD';

IF ISNULL(id_OL) THEN
	SET OL=0;
ELSE
	SET OL=1;
END IF;

IF ISNULL(id_BD) THEN
	SET BD=0;
ELSE
	SET BD=1;
END IF;

SELECT OL, BD, tbl_student.* FROM tbl_student WHERE tbl_student.STUDENT_ID=sid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_RECOMMENDATION_STATUS` (IN `rid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_recommendation WHERE tbl_recommendation.RECOMMENDATION_ID=rid; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_RESUME_DETAILS` (IN `sid` INT)  NO SQL
BEGIN

DECLARE rid,aid INT;

SELECT tbl_resume.RESUME_ID INTO rid FROM tbl_resume WHERE tbl_resume.RESUME_STUDENT_ID=sid;


SELECT tbl_academic_details.ACADEMIC_DETAILS_ID INTO aid FROM tbl_academic_details WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;

SELECT rid,aid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_STUDENT_ATTENDANCE` (IN `sid` INT, IN `eid` INT)  NO SQL
BEGIN
	DECLARE att int;
	SELECT tbl_attendance.ATTENDANCE INTO att FROM tbl_attendance WHERE tbl_attendance.ATTENDANCE_STUDENT_ID=sid AND tbl_attendance.ATTENDANCE_EVENT_ID=eid;
    SELECT att;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_STUDENT_IN_SHORTLIST` (IN `sid` INT, IN `cid` INT)  NO SQL
BEGIN
	DECLARE id int;
    DECLARE st int;
    
    SELECT tbl_shortlist.SHORTLIST_ID INTO id FROM tbl_shortlist, tbl_selection_list WHERE tbl_selection_list.SELECTION_LIST_ID=tbl_shortlist.SHORTLIST_SELECTION_LIST_ID AND tbl_selection_list.SELECTION_LIST_COMPANY_ID=cid AND tbl_shortlist.SHORTLIST_STUDENT_ID=sid;
    
    IF ISNULL(id) THEN
    	SET st=1;
	ELSE
    	SET st=0;
	END IF;
	
    SELECT st;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_STUDENT_PLACEMENT_DATA` (IN `sid` INT)  NO SQL
BEGIN
	SELECT tbl_company.COMPANY_NAME, tbl_placement.PLACEMENT_OFFERED_PACKAGE FROM tbl_company, tbl_training, tbl_placement WHERE tbl_training.TRAINING_STUDENT_ID=sid AND tbl_placement.PLACEMENT_TRAINING_ID=tbl_training.TRAINING_ID AND tbl_training.TRAINING_COMPANY_ID=tbl_company.COMPANY_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_STUDENT_PLACEMENT_NOTIFICATION` (IN `sid` INT)  NO SQL
BEGIN
	DECLARE id int;
	DECLARE st int;
    
    SELECT tbl_notification.NOTIFICATION_ID INTO id FROM tbl_notification WHERE tbl_notification.NOTIFICATION_RECEIVER_ID=sid AND tbl_notification.NOTIFICATION_RECIVER_TYPE='ST' AND tbl_notification.NOTIFICATION_TYPE='PLOF';
    
	IF ISNULL(id) THEN
    	SET st=1;
    ELSE
    	SET st=0;
	END IF;
    
    SELECT st;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_STUDENT_RESUME` (IN `sid` INT)  NO SQL
BEGIN
	DECLARE id int;
    DECLARE st int;
    
    SELECT tbl_resume_document.RESUME_DOCUMENT_ID INTO id FROM tbl_resume_document WHERE tbl_resume_document.RESUME_DOCUMENT_STUDENT_ID=sid;
    
    IF ISNULL(id) THEN
    	SET st=0;
        SELECT st;
	ELSE
    	SET st=1;
        SELECT st, tbl_resume_document.* FROM tbl_resume_document WHERE tbl_resume_document.RESUME_DOCUMENT_ID=id;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_STUDENT_TRAINING` (IN `sid` INT)  NO SQL
BEGIN
	DECLARE tid int;
    DECLARE pid int;
    DECLARE st int DEFAULT 0;
    
    SELECT tbl_training.TRAINING_ID INTO tid FROM tbl_training WHERE tbl_training.TRAINING_STUDENT_ID=sid;
    SELECT tbl_placement.PLACEMENT_ID INTO pid FROM tbl_placement WHERE tbl_placement.PLACEMENT_ACCEPTED<>'P' AND tbl_placement.PLACEMENT_TRAINING_ID=tid;
    
    IF ISNULL(pid) THEN
    	SET st = 0;
	ELSE
    	SET st = 1;
	END IF;
    
    SELECT st;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_STUDENT_TRAINING_ACCEPTED` (IN `sid` INT)  NO SQL
BEGIN
	DECLARE tid int;
    DECLARE st int;
    
    SELECT tbl_training.TRAINING_ID INTO tid FROM tbl_training WHERE tbl_training.TRAINING_STUDENT_ID=sid AND tbl_training.TRAINING_ACCEPTED<>'P';
    
    IF ISNULL(tid) THEN
    	SET st=0;
	ELSE
    	SET st=1;
	END IF;

	SELECT st;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_STUDENT_TRAINING_NOTIFICATION` (IN `sid` INT)  NO SQL
BEGIN
	DECLARE id int;
	DECLARE st int;
    
    SELECT tbl_notification.NOTIFICATION_ID INTO id FROM tbl_notification WHERE tbl_notification.NOTIFICATION_RECEIVER_ID=sid AND tbl_notification.NOTIFICATION_RECIVER_TYPE='ST' AND tbl_notification.NOTIFICATION_TYPE='TROF';
    
	IF ISNULL(id) THEN
    	SET st=1;
    ELSE
    	SET st=0;
	END IF;
    
    SELECT st;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_USER` (IN `pne` VARCHAR(50))  NO SQL
BEGIN

SELECT tbl_login.LOGIN_USER_EMAIL,tbl_login.LOGIN_REFERENCE_ID, 
tbl_login.LOGIN_USER_PHONE_NUMBER,
tbl_login.LOGIN_USER_TYPE FROM tbl_login WHERE tbl_login.LOGIN_USER_EMAIL=pne OR tbl_login.LOGIN_USER_PHONE_NUMBER=pne;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_USER_PHONE` (IN `pnum` VARCHAR(10))  NO SQL
BEGIN

SELECT tbl_login.LOGIN_USER_EMAIL,tbl_login.LOGIN_REFERENCE_ID, 
tbl_login.LOGIN_USER_PHONE_NUMBER,
tbl_login.LOGIN_USER_TYPE FROM tbl_login WHERE  tbl_login.LOGIN_USER_PHONE_NUMBER=pnum;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `COMPANY_PACKAGE_REPORT` (IN `cid` INT, IN `yr` INT)  NO SQL
BEGIN
	SELECT MAX(tbl_placement.PLACEMENT_OFFERED_PACKAGE) as PACKAGE FROM tbl_placement, tbl_training WHERE tbl_placement.PLACEMENT_TRAINING_ID=tbl_training.TRAINING_ID AND tbl_training.TRAINING_COMPANY_ID=cid AND YEAR(tbl_training.TRAINING_TIME_STAMP)=yr;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `COMPANY_PLACEMENT_REPORT` (IN `cid` INT, IN `yr` INT)  NO SQL
BEGIN
	SELECT COUNT(tbl_training.TRAINING_ID) as STUDENT_COUNT, tbl_company.COMPANY_NAME, MAX(tbl_training.TRAINING_OFFERED_STIPEND) as OFFERED_STIPEND FROM tbl_company, tbl_training WHERE tbl_training.TRAINING_COMPANY_ID=tbl_company.COMPANY_ID AND tbl_company.COMPANY_ID=cid AND YEAR(tbl_training.TRAINING_TIME_STAMP)=yr;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `COUNT_BATCH_STUDENTS` (IN `bid` INT)  NO SQL
BEGIN
	SELECT COUNT(tbl_student.STUDENT_ID) as STUDENTS FROM tbl_student WHERE tbl_student.STUDENT_BATCH_ID=bid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D6B6` (IN `sid` INT, IN `board10` VARCHAR(255), IN `school10` VARCHAR(255), IN `perc10` FLOAT, IN `university_d` VARCHAR(255), IN `institute_d` VARCHAR(255), IN `specialization_d` VARCHAR(255), IN `ds1` FLOAT, IN `ds2` FLOAT, IN `ds3` FLOAT, IN `ds4` FLOAT, IN `ds5` FLOAT, IN `ds6` FLOAT, IN `bs3` FLOAT, IN `bs4` FLOAT, IN `bs5` FLOAT, IN `bs6` FLOAT, IN `bs7` FLOAT, IN `bs8` FLOAT, IN `university_b` VARCHAR(255), IN `institute_b` VARCHAR(255), IN `specialization_b` VARCHAR(255), IN `degree_b` VARCHAR(255))  NO SQL
BEGIN
CALL INSERT_UPDATE_10TH(sid,board10,school10,perc10);
CALL INSERT_UPDATE_DIPLOMA(sid, university_d, institute_d, specialization_d, ds1, ds2, ds3, ds4, ds5, ds6);
CALL INSERT_UPDATE_BACHELOR( sid, university_b , institute_b, specialization_b ,degree_b,NULL, NULL, bs3, bs4, bs5, bs6, bs7, bs8);
CALL INSERT_UPDATE_ACADEMICS(sid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D6B6M4` (IN `sid` INT, IN `board10` VARCHAR(255), IN `school10` VARCHAR(255), IN `perc10` FLOAT, IN `university_d` VARCHAR(255), IN `institute_d` VARCHAR(255), IN `specialization_d` VARCHAR(255), IN `ds1` FLOAT, IN `ds2` FLOAT, IN `ds3` FLOAT, IN `ds4` FLOAT, IN `ds5` FLOAT, IN `ds6` FLOAT, IN `university_b` VARCHAR(255), IN `institute_b` VARCHAR(255), IN `specialization_b` VARCHAR(255), IN `degree_b` VARCHAR(255), IN `bs3` FLOAT, IN `bs4` FLOAT, IN `bs5` FLOAT, IN `bs6` FLOAT, IN `bs7` FLOAT, IN `bs8` FLOAT, IN `ms1` FLOAT, IN `ms2` FLOAT, IN `ms3` FLOAT, IN `ms4` FLOAT, IN `university_m` VARCHAR(255), IN `institution_m` VARCHAR(255), IN `specialization_m` VARCHAR(255), IN `degree_m` VARCHAR(255))  NO SQL
BEGIN
CALL INSERT_UPDATE_10TH(sid,board10,school10,perc10);
CALL INSERT_UPDATE_DIPLOMA(sid, university_d, institute_d, specialization_d, ds1, ds2, ds3, ds4, ds5, ds6);
CALL INSERT_UPDATE_BACHELOR( sid, university_b, institute_b, specialization_b,degree_b, NULL, NULL, bs3, bs4, bs5, bs6, bs7, bs8);
CALL INSERT_UPDATE_MASTER( sid,university_m,institution_m,specialization_m,degree_m,ms1, ms2, ms3, ms4);
CALL INSERT_UPDATE_ACADEMICS(sid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DEACTIVATE_COMPANY` (IN `cid` INT)  NO SQL
BEGIN
UPDATE tbl_company SET tbl_company.COMPANY_ACCEPTED='R' WHERE tbl_company.COMPANY_ID=cid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DEACTIVATE_STUDENT` (IN `sid` INT)  NO SQL
BEGIN
UPDATE tbl_student SET tbl_student.STUDENT_STATUS=1 WHERE tbl_student.STUDENT_ID=sid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DEACTIVE_FACULTY` (IN `id` INT)  NO SQL
BEGIN
	UPDATE tbl_faculty SET tbl_faculty.FACULTY_ACCEPTED='R' WHERE tbl_faculty.FACULTY_ID=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_BROADCAST_LIST` (IN `ilid` INT)  NO SQL
BEGIN
UPDATE tbl_broadcast_list SET tbl_broadcast_list.BROADCAST_LIST_STATUS=1 WHERE tbl_broadcast_list.BROADCAST_LIST_ID=ilid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_MATERIAL` (IN `did` INT)  NO SQL
BEGIN
DELETE FROM tbl_documents WHERE tbl_documents.DOCUMENT_ID=did;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_MEMBER_FROM_BROADCASTLIST` (IN `broadcast_id` INT, IN `company_id` INT)  NO SQL
BEGIN

UPDATE tbl_broadcast_list_members SET tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_STATUS='1' WHERE 
tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_BROADCAST_ID=broadcast_id AND tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_COMPANY_ID=company_id;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_SELECTION_LIST` (IN `sid` INT)  NO SQL
BEGIN

UPDATE tbl_selection_list SET tbl_selection_list.SELECTION_LIST_TYPE="DE"
WHERE tbl_selection_list.SELECTION_LIST_ID=sid;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_STUDENT_FROM_SHORTLIST` (IN `sid` INT, IN `selectid` INT)  NO SQL
BEGIN

UPDATE tbl_shortlist SET tbl_shortlist.SHORTLIST_TYPE="DE" WHERE tbl_shortlist.SHORTLIST_STUDENT_ID=sid AND tbl_shortlist.SHORTLIST_SELECTION_LIST_ID=selectid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EVENT_NOTIFICATION` (IN `cate` BOOLEAN, IN `gb` INT, IN `gtype` CHAR(2), IN `ename` VARCHAR(50), IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4), IN `eid` INT)  NO SQL
BEGIN
DECLARE cnt integer DEFAULT 0;
DECLARE sid int;
DECLARE c1 CURSOR FOR SELECT tbl_student.STUDENT_ID FROM tbl_student where tbl_student.STUDENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept and tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear);
DECLARE CONTINUE HANDLER FOR NOT FOUND SET cnt=1;
OPEN c1;
L1: LOOP
	FETCH c1 INTO sid;
    IF cnt = 1 THEN
    	LEAVE L1;
    END IF;
    IF cate = 1 THEN
    	INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_SENDER_ID,tbl_notification.NOTIFICATION_RECEIVER_ID,tbl_notification.NOTIFICATION_SENDER_TYPE,tbl_notification.NOTIFICATION_RECIVER_TYPE,tbl_notification.NOTIFICATION_DESCRPTION,tbl_notification.NOTIFICATION_REMOVE_STATUS,tbl_notification.NOTIFICATION_TYPE,tbl_notification.NOTIFICATION_EVENT_ID) VALUES(gb,sid,gtype,'ST',concat('New Event: ',ename),0,'MEVNT',eid);
    ELSEIF cate = 0 THEN
    	INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_SENDER_ID,tbl_notification.NOTIFICATION_RECEIVER_ID,tbl_notification.NOTIFICATION_SENDER_TYPE,tbl_notification.NOTIFICATION_RECIVER_TYPE,tbl_notification.NOTIFICATION_DESCRPTION,tbl_notification.NOTIFICATION_REMOVE_STATUS,tbl_notification.NOTIFICATION_TYPE,tbl_notification.NOTIFICATION_EVENT_ID) VALUES(gb,sid,gtype,'ST',concat('New Event: ',ename),0,'AEVNT',eid);
    END IF;
END LOOP L1;
CLOSE c1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EVENT_NOTIFICATION_COMPANY` (IN `eid` INT, IN `sid` INT, IN `rid` INT, IN `stype` CHAR(2))  NO SQL
BEGIN
	DECLARE ntype int;
    DECLARE ename varchar(50);
    SELECT tbl_event.EVENT_CATEGORY INTO ntype FROM tbl_event WHERE tbl_event.EVENT_ID=eid;
    SELECT tbl_event.EVENT_NAME INTO ename FROM tbl_event WHERE tbl_event.EVENT_ID=eid;
    
    IF ntype=1 THEN
    	INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_EVENT_ID, tbl_notification.NOTIFICATION_SENDER_ID, tbl_notification.NOTIFICATION_RECEIVER_ID, tbl_notification.NOTIFICATION_SENDER_TYPE, tbl_notification.NOTIFICATION_RECIVER_TYPE, tbl_notification.NOTIFICATION_TYPE, tbl_notification.NOTIFICATION_DESCRPTION, tbl_notification.NOTIFICATION_REMOVE_STATUS) VALUES (eid, sid, rid, stype, 'CP', 'MEVNT', concat('New Event: ',ename), 0);
    ELSE
    	INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_EVENT_ID, tbl_notification.NOTIFICATION_SENDER_ID, tbl_notification.NOTIFICATION_RECEIVER_ID, tbl_notification.NOTIFICATION_SENDER_TYPE, tbl_notification.NOTIFICATION_RECIVER_TYPE, tbl_notification.NOTIFICATION_TYPE, tbl_notification.NOTIFICATION_DESCRPTION, tbl_notification.NOTIFICATION_REMOVE_STATUS) VALUES (eid, sid, rid, stype, 'CP', 'AEVNT', concat('New Event: ',ename), 0);
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EVENT_NOTIFICATION_FACULTY` (IN `cate` BOOLEAN, IN `gb` INT, IN `gtype` CHAR(2), IN `ename` VARCHAR(50), IN `eid` INT)  NO SQL
BEGIN
DECLARE cnt integer DEFAULT 0;
DECLARE sid int;
DECLARE rtype CHAR(2);
DECLARE c1 CURSOR FOR SELECT tbl_faculty.FACULTY_ID, tbl_faculty.FACULTY_ROLE FROM tbl_faculty WHERE tbl_faculty.FACULTY_ROLE<>'FC';
DECLARE CONTINUE HANDLER FOR NOT FOUND SET cnt=1;
OPEN c1;
L1: LOOP
	FETCH c1 INTO sid,rtype;
    IF cnt = 1 THEN
    	LEAVE L1;
    END IF;
    IF cate = 1 THEN
    	INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_SENDER_ID, tbl_notification.NOTIFICATION_RECEIVER_ID, tbl_notification.NOTIFICATION_SENDER_TYPE, tbl_notification.NOTIFICATION_RECIVER_TYPE, tbl_notification.NOTIFICATION_DESCRPTION, tbl_notification.NOTIFICATION_REMOVE_STATUS, tbl_notification.NOTIFICATION_TYPE, tbl_notification.NOTIFICATION_EVENT_ID) VALUES(gb, sid, gtype, rtype, concat('New Event: ', ename), 0, 'MEVNT', eid);
    ELSEIF cate = 0 THEN
    	INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_SENDER_ID, tbl_notification.NOTIFICATION_RECEIVER_ID, tbl_notification.NOTIFICATION_SENDER_TYPE, tbl_notification.NOTIFICATION_RECIVER_TYPE, tbl_notification.NOTIFICATION_DESCRPTION, tbl_notification.NOTIFICATION_REMOVE_STATUS, tbl_notification.NOTIFICATION_TYPE, tbl_notification.NOTIFICATION_EVENT_ID) VALUES(gb,sid,gtype,rtype,concat('New Event: ',ename),0,'AEVNT',eid);
    END IF;
END LOOP L1;
CLOSE c1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `FORGET_ONE` (IN `pne` VARCHAR(50))  NO SQL
BEGIN

SELECT tbl_login.LOGIN_USER_EMAIL,tbl_login.LOGIN_REFERENCE_ID , tbl_login.LOGIN_USER_TYPE FROM tbl_login WHERE tbl_login.LOGIN_USER_EMAIL=pne OR tbl_login.LOGIN_USER_PHONE_NUMBER=pne;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GENERATE_PLACEMENT_SCHEDULE` (IN `gap` INT, IN `sdate` DATE)  NO SQL
BEGIN
DECLARE cnt int DEFAULT 0;
DECLARE cnt2 int DEFAULT 0;
DECLARE cid int;
DECLARE edate date;
DECLARE saturday varchar(20);
DECLARE sunday varchar(20);
DECLARE mydayname varchar(20);

DECLARE c1 CURSOR FOR SELECT tbl_company.COMPANY_ID FROM tbl_company, tbl_broadcast_list_members WHERE tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_BROADCAST_ID=0 AND tbl_company.COMPANY_ID=tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_COMPANY_ID ORDER BY tbl_company.COMPANY_MAXIMUM_PACKAGE DESC;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET cnt=1;

SELECT dayname('2020-05-02') INTO saturday;
SELECT dayname('2020-05-03') INTO sunday;
IF dayname(sdate) = sunday THEN
	SELECT DATE_ADD(sdate, INTERVAL 1 DAY) INTO sdate;
END IF;
SET edate = sdate;
OPEN c1;
L1: LOOP
	FETCH c1 INTO cid;
    IF cnt = 1 THEN
    	LEAVE L1;
    END IF;
    SET cnt2 = 0;
    L2: LOOP
    	IF cnt2 >= gap THEN
        	LEAVE L2;
		END IF;
    	SELECT dayname(edate) INTO mydayname;
		IF mydayname = saturday THEN
			SELECT DATE_ADD(edate, INTERVAL 2 DAY) INTO edate;
		ELSE
			SELECT DATE_ADD(edate, INTERVAL 1 DAY) INTO edate;
		END IF;
        SET cnt2 = cnt2 + 1;
	END LOOP L2;
    CALL INSERT_UPDATE_PLACEMENT_SCHEDULE(cid, sdate, edate);
    #SELECT sdate, dayname(sdate), edate, dayname(edate);
    SELECT DATE_ADD(edate, INTERVAL 1 DAY) INTO edate;
    SET sdate = edate;
END LOOP L1;
CLOSE c1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_ALL_BATCH_YEAR` ()  NO SQL
BEGIN
	SELECT DISTINCT tbl_batch.BATCH_PASSING_YEAR FROM tbl_batch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_ALL_NOTIFICATION` (IN `rid` INT, IN `utype` CHAR(2))  NO SQL
BEGIN
IF utype = 'CH' THEN
	SELECT * FROM tbl_notification WHERE tbl_notification.NOTIFICATION_RECEIVER_ID=rid AND tbl_notification.NOTIFICATION_RECIVER_TYPE=utype AND tbl_notification.NOTIFICATION_REMOVE_STATUS=0 AND tbl_notification.NOTIFICATION_TYPE<>'REGIS';
ELSE
	SELECT * FROM tbl_notification WHERE tbl_notification.NOTIFICATION_RECEIVER_ID=rid AND tbl_notification.NOTIFICATION_RECIVER_TYPE=utype AND tbl_notification.NOTIFICATION_REMOVE_STATUS=0;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_ALL_SHORTLIST_DATA_AND_STUDENT` (IN `sid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_selection_list,tbl_shortlist WHERE
tbl_selection_list.SELECTION_LIST_ID=sid AND tbl_shortlist.SHORTLIST_SELECTION_LIST_ID=sid AND tbl_shortlist.SHORTLIST_TYPE="SH";


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_ALL_TRANING_STUDENT_BY_COMPANY` (IN `company_id` INT)  NO SQL
BEGIN

	SELECT tbl_training.TRAINING_STUDENT_ID FROM tbl_training WHERE tbl_training.TRAINING_COMPANY_ID=company_id AND tbl_training.TRAINING_ACCEPTED='A';

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_APPLIED_PRESENT_STUDENT` (IN `eid` INT)  NO SQL
BEGIN
DECLARE cate int;
SELECT tbl_event.EVENT_CATEGORY INTO cate FROM tbl_event WHERE tbl_event.EVENT_ID=eid;
IF cate=0 THEN
SELECT tbl_student.STUDENT_ID, tbl_student.STUDENT_ENROLLMENT_NUMBER, tbl_student.STUDENT_FIRST_NAME, tbl_student.STUDENT_LAST_NAME, tbl_student.STUDENT_PROFILE_PIC FROM tbl_student, tbl_event_application, tbl_attendance WHERE tbl_event_application.EVENT_APPLICATION_EVENT_ID=eid AND tbl_student.STUDENT_ID=tbl_event_application.EVENT_APPLICATION_STUDENT_ID AND tbl_attendance.ATTENDANCE_EVENT_ID=tbl_event_application.EVENT_APPLICATION_STUDENT_ID AND tbl_attendance.ATTENDANCE_STUDENT_ID=tbl_student.STUDENT_ID AND tbl_attendance.ATTENDANCE=1;
ELSEIF cate=1 THEN
SELECT tbl_student.STUDENT_ID, tbl_student.STUDENT_ENROLLMENT_NUMBER, tbl_student.STUDENT_FIRST_NAME, tbl_student.STUDENT_LAST_NAME, tbl_student.STUDENT_PROFILE_PIC FROM tbl_student, tbl_event, tbl_attendance WHERE tbl_event.EVENT_ID=eid AND tbl_event.EVENT_BATCH_ID=tbl_student.STUDENT_BATCH_ID AND tbl_attendance.ATTENDANCE_EVENT_ID=tbl_event.EVENT_ID AND tbl_attendance.ATTENDANCE_STUDENT_ID=tbl_student.STUDENT_ID AND tbl_attendance.ATTENDANCE=1;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_APPLIED_STUDENT` (IN `eid` INT)  NO SQL
BEGIN
DECLARE cate int;
SELECT tbl_event.EVENT_CATEGORY INTO cate FROM tbl_event WHERE tbl_event.EVENT_ID=eid;
IF cate=0 THEN
SELECT tbl_student.STUDENT_ID,tbl_student.STUDENT_ENROLLMENT_NUMBER,tbl_student.STUDENT_FIRST_NAME,tbl_student.STUDENT_LAST_NAME,tbl_student.STUDENT_PROFILE_PIC FROM tbl_student,tbl_event_application WHERE tbl_event_application.EVENT_APPLICATION_EVENT_ID=eid AND tbl_student.STUDENT_ID=tbl_event_application.EVENT_APPLICATION_STUDENT_ID;
ELSEIF cate=1 THEN
SELECT tbl_student.STUDENT_ID,tbl_student.STUDENT_ENROLLMENT_NUMBER,tbl_student.STUDENT_FIRST_NAME,tbl_student.STUDENT_LAST_NAME,tbl_student.STUDENT_PROFILE_PIC FROM tbl_student,tbl_event WHERE tbl_event.EVENT_ID=eid AND tbl_event.EVENT_BATCH_ID=tbl_student.STUDENT_BATCH_ID;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_BATCH_INFO` (IN `bid` INT)  NO SQL
BEGIN
SELECT * FROM tbl_batch WHERE tbl_batch.BATCH_ID=bid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_BATCH_PAST_EVENT` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4))  NO SQL
BEGIN
SELECT * FROM tbl_event WHERE tbl_event.EVENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_BORADCAST_LIST` (IN `id` INT)  NO SQL
BEGIN
SELECT tbl_company.*, tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_ID FROM tbl_broadcast_list_members, tbl_company WHERE tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_BROADCAST_ID=id AND tbl_company.COMPANY_ID=tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_COMPANY_ID AND tbl_company.COMPANY_ACCEPTED='A' AND tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_STATUS=0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_BROADCAST_LIST_MEMBER` (IN `ilid` INT)  NO SQL
BEGIN
	SELECT tbl_company.* FROM tbl_company, tbl_broadcast_list_members WHERE tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_COMPANY_ID=tbl_company.COMPANY_ID AND tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_BROADCAST_ID=ilid AND tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_STATUS=0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_CH_DATA` ()  NO SQL
BEGIN

SELECT * FROM tbl_faculty WHERE tbl_faculty.FACULTY_ROLE="CH";

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_COMPANY` (IN `cid` INT)  NO SQL
BEGIN
SELECT * FROM tbl_company WHERE tbl_company.COMPANY_ID=cid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_COMPANY_DOCUMENT` (IN `studid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_company_document WHERE tbl_company_document.COMPANY_DOCUMENT_STUDENT_ID=studid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_COMPANY_FOR_REPORT` (IN `yr` INT)  NO SQL
BEGIN
	SELECT DISTINCT tbl_training.TRAINING_COMPANY_ID FROM tbl_training WHERE YEAR(tbl_training.TRAINING_TIME_STAMP)=yr;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_DEACTIVE_STUDENTS` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4))  NO SQL
BEGIN
	SELECT * FROM tbl_student WHERE tbl_student.STUDENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear) AND tbl_student.STUDENT_STATUS=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_DEGREE` (IN `DEPT` VARCHAR(10))  NO SQL
BEGIN
SELECT DISTINCT tbl_batch.BATCH_DEGREE FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=DEPT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_EVENT` (IN `eid` INT)  NO SQL
BEGIN
SELECT * FROM tbl_event WHERE tbl_event.EVENT_ID=eid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_EVENT_ATTENDANCE` (IN `eid` INT)  NO SQL
BEGIN
  SELECT tbl_attendance.*, tbl_student.STUDENT_ENROLLMENT_NUMBER, tbl_student.STUDENT_FIRST_NAME, tbl_student.STUDENT_LAST_NAME FROM tbl_attendance, tbl_student WHERE tbl_attendance.ATTENDANCE_EVENT_ID=eid AND tbl_student.STUDENT_ID=tbl_attendance.ATTENDANCE_STUDENT_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_EVENT_BY_BATCH` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4))  NO SQL
BEGIN
SELECT * FROM tbl_event WHERE tbl_event.EVENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear) AND tbl_event.EVENT_DATE<=now();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_EVENT_BY_BATCH_AND_COMPANY` (IN `cid` INT, IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4))  NO SQL
BEGIN
  SELECT * FROM tbl_event WHERE tbl_event.EVENT_COMPANY_ID=cid AND tbl_event.EVENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_EVENT_BY_COMPANY` (IN `cid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_event WHERE tbl_event.EVENT_COMPANY_ID=cid AND tbl_event.EVENT_DATE<now();

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_EVENT_NAME` (IN `eid` INT)  NO SQL
BEGIN
SELECT tbl_event.EVENT_NAME FROM tbl_event WHERE tbl_event.EVENT_ID=eid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_FACULTY` (IN `fid` INT)  NO SQL
BEGIN
SELECT * FROM tbl_faculty WHERE tbl_faculty.FACULTY_ID=fid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_FUTURE_TEST` ()  NO SQL
BEGIN
	SELECT tbl_test.*, tbl_event.*, tbl_batch.* FROM tbl_test, tbl_event, tbl_batch WHERE tbl_event.EVENT_ID=tbl_test.TEST_EVENT_ID AND tbl_event.EVENT_DATE>now() AND tbl_batch.BATCH_ID=tbl_event.EVENT_BATCH_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_PAST_TEST` ()  NO SQL
BEGIN
	SELECT tbl_test.*, tbl_event.*, tbl_batch.* FROM tbl_test, tbl_event, tbl_batch WHERE tbl_event.EVENT_ID=tbl_test.TEST_EVENT_ID AND tbl_event.EVENT_DATE<=now() AND tbl_batch.BATCH_ID=tbl_event.EVENT_BATCH_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_PLACEMENT_SCHEDULE_LIST` ()  NO SQL
BEGIN
	SELECT tbl_company.* FROM tbl_company, tbl_broadcast_list_members WHERE tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_BROADCAST_ID=0 AND tbl_company.COMPANY_ID=tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_COMPANY_ID AND tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_STATUS=0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_PLACMENT_SCHEDULE` ()  NO SQL
BEGIN
	SELECT tbl_placement_schedule.*, tbl_company.* FROM tbl_placement_schedule, tbl_company WHERE tbl_placement_schedule.PLACEMENT_SCHEDULE_STATUS=0 AND tbl_company.COMPANY_ID=tbl_placement_schedule.PLACEMENT_SCHEDULE_COMPANY_ID AND tbl_company.COMPANY_ACCEPTED='A' ORDER BY tbl_placement_schedule.PLACEMENT_SCHEDULE_START_DATE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_PLACMENT_STUDENTS` (IN `cid` INT)  NO SQL
BEGIN
	SELECT tbl_student.*, tbl_placement.PLACEMENT_OFFERED_PACKAGE FROM tbl_student, tbl_training, tbl_placement WHERE tbl_training.TRAINING_COMPANY_ID=cid AND tbl_training.TRAINING_ID=tbl_placement.PLACEMENT_TRAINING_ID AND tbl_placement.PLACEMENT_ACCEPTED='P' AND tbl_training.TRAINING_STUDENT_ID=tbl_student.STUDENT_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_PYEAR` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20))  NO SQL
BEGIN
SELECT DISTINCT tbl_batch.BATCH_PASSING_YEAR FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept and tbl_batch.BATCH_DEGREE=degree;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_RECOMMENDATION` (IN `sid` INT, IN `cid` INT)  NO SQL
BEGIN
	SELECT * FROM tbl_recommendation WHERE tbl_recommendation.RECOMMENDATION_STUDENT_ID=sid AND tbl_recommendation.RECOMMENDATION_COMPANY_ID=cid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_REG_NOTIFICATION` ()  NO SQL
BEGIN
	SELECT * FROM tbl_notification WHERE tbl_notification.NOTIFICATION_TYPE='REGIS' AND tbl_notification.NOTIFICATION_REMOVE_STATUS=0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_SELECTIONLIST_NAME` (IN `cid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_selection_list WHERE tbl_selection_list.SELECTION_LIST_COMPANY_ID=cid AND tbl_selection_list.SELECTION_LIST_TYPE='SH';

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_SELECTION_LIST_DATA` (IN `selection_list_id` INT)  NO SQL
SELECT tbl_company.COMPANY_ID, tbl_company.COMPANY_NAME, COUNT(tbl_shortlist.SHORTLIST_ID) as STUDENTS FROM tbl_company, tbl_selection_list, tbl_shortlist WHERE tbl_selection_list.SELECTION_LIST_ID=selection_list_id AND tbl_shortlist.SHORTLIST_SELECTION_LIST_ID=tbl_selection_list.SELECTION_LIST_ID AND tbl_company.COMPANY_ID=tbl_selection_list.SELECTION_LIST_COMPANY_ID AND tbl_shortlist.SHORTLIST_TYPE='SH'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_SHORTLISTED_STUDENT` (IN `sid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_shortlist WHERE tbl_shortlist.SHORTLIST_SELECTION_LIST_ID=sid AND
tbl_shortlist.SHORTLIST_TYPE="SH";

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_STIPEND_STUDENT` (IN `sid` INT, IN `shortlist_id` INT)  NO SQL
BEGIN

DECLARE cid int;

SELECT tbl_selection_list.SELECTION_LIST_COMPANY_ID INTO cid FROM tbl_selection_list WHERE tbl_selection_list.SELECTION_LIST_ID=shortlist_id;

SELECT * FROM tbl_training WHERE tbl_training.TRAINING_STUDENT_ID=sid AND
tbl_training.TRAINING_COMPANY_ID=cid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_STUDENTS_BY_BATCH` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4))  NO SQL
BEGIN
	SELECT * FROM tbl_student WHERE tbl_student.STUDENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear) AND tbl_student.STUDENT_STATUS=0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_STUDENT_DETAILS` (IN `sid` INT)  NO SQL
BEGIN
SELECT * FROM tbl_student WHERE tbl_student.STUDENT_ID=sid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_STUDENT_DIP_12TH` (IN `sid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_academic_details WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_STUDENT_PLACEMENT_DOCUMENTS` (IN `sid` INT)  NO SQL
BEGIN
	SELECT tbl_company_document.* FROM tbl_company_document WHERE tbl_company_document.COMPANY_DOCUMENT_STUDENT_ID=sid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_STUDENT_RESUME` (IN `sid` INT)  NO SQL
BEGIN

DECLARE id10 int DEFAULT 0;
DECLARE id12 int DEFAULT 0;
DECLARE iddip int DEFAULT 0;
DECLARE idba int DEFAULT 0;
DECLARE idma int DEFAULT 0;
DECLARE rid int DEFAULT 0;


SELECT tbl_academic_details.ACADEMIC_DETAILS_10TH_ID INTO id10 FROM tbl_academic_details WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;

SELECT tbl_academic_details.ACADEMIC_DETAILS_12TH_ID INTO id12 FROM tbl_academic_details WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;

SELECT tbl_academic_details.ACADEMIC_DETAILS_DIPLOMA_ID INTO iddip FROM tbl_academic_details WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;

SELECT tbl_academic_details.ACADEMIC_DETAILS_BACHELOR_ID INTO idba FROM tbl_academic_details WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;

SELECT tbl_academic_details.ACADEMIC_DETAILS_MASTER_ID INTO idma FROM tbl_academic_details WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;

SELECT tbl_resume.RESUME_ID INTO rid FROM tbl_resume WHERE
tbl_resume.RESUME_STUDENT_ID=sid;

IF ISNULL(iddip) AND ISNULL(idma) THEN
	SELECT * FROM tbl_student, tbl_academic_10th_details, tbl_academic_12th_details, tbl_academic_bachelor_details,tbl_resume WHERE tbl_academic_10th_details.ACADEMIC_10TH_ID=id10 AND tbl_academic_12th_details.ACADEMIC_12TH_ID=id12 AND tbl_academic_bachelor_details.ACADEMIC_BACHELOR_ID=idba AND
tbl_resume.RESUME_ID=rid AND tbl_student.STUDENT_ID=sid;
    
    
ELSEIF ISNULL(iddip) THEN
	SELECT * FROM tbl_student,tbl_academic_10th_details, tbl_academic_12th_details, tbl_academic_bachelor_details, tbl_academic_master_details,tbl_resume WHERE tbl_academic_10th_details.ACADEMIC_10TH_ID=id10 AND tbl_academic_12th_details.ACADEMIC_12TH_ID=id12 AND tbl_academic_bachelor_details.ACADEMIC_BACHELOR_ID=idba AND tbl_academic_master_details.ACADEMIC_MASTER_ID=idma AND
tbl_resume.RESUME_ID=rid AND
tbl_student.STUDENT_ID=sid;
    
ELSEIF ISNULL(id12) AND ISNULL(idma) THEN
	SELECT * FROM tbl_student, tbl_academic_10th_details, tbl_academic_diploma_details, tbl_academic_bachelor_details,tbl_resume WHERE tbl_academic_10th_details.ACADEMIC_10TH_ID=id10 AND tbl_academic_diploma_details.ACADEMIC_DIPLOMA_ID=iddip AND tbl_academic_bachelor_details.ACADEMIC_BACHELOR_ID=idba AND
tbl_resume.RESUME_ID=rid AND 
tbl_student.STUDENT_ID=sid;
    
ELSEIF ISNULL(id12) THEN
	SELECT * FROM tbl_student,tbl_academic_10th_details, tbl_academic_diploma_details, tbl_academic_bachelor_details, tbl_academic_master_details,tbl_resume WHERE tbl_academic_10th_details.ACADEMIC_10TH_ID=id10 AND tbl_academic_diploma_details.ACADEMIC_DIPLOMA_ID=iddip AND tbl_academic_bachelor_details.ACADEMIC_BACHELOR_ID=idba AND tbl_academic_master_details.ACADEMIC_MASTER_ID=idma AND
tbl_resume.RESUME_ID=rid AND 
tbl_student.STUDENT_ID =sid;    
    
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_STUDENT_TRAINING_DATA` (IN `selection_list_id` INT, IN `stud_id` INT)  NO SQL
BEGIN
	SELECT tbl_company.COMPANY_ID, tbl_company.COMPANY_NAME, tbl_training.TRAINING_OFFERED_STIPEND FROM tbl_company, tbl_training, tbl_selection_list WHERE tbl_selection_list.SELECTION_LIST_ID=selection_list_id AND tbl_training.TRAINING_STUDENT_ID=stud_id AND tbl_training.TRAINING_COMPANY_ID=tbl_company.COMPANY_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_TEST_BY_BATCH` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4))  NO SQL
BEGIN
SELECT tbl_test.TEST_ID,tbl_test.TEST_NAME FROM tbl_test, tbl_event WHERE tbl_test.TEST_EVENT_ID=tbl_event.EVENT_ID AND tbl_event.EVENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_TEST_EVENT_BY_BATCH` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4))  NO SQL
BEGIN
SELECT * FROM tbl_event WHERE tbl_event.EVENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear) AND tbl_event.EVENT_TYPE='TS' AND tbl_event.EVENT_DATE>=now();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_TEST_STUDENT` (IN `tid` INT)  NO SQL
BEGIN
DECLARE eid int;
SELECT tbl_test.TEST_EVENT_ID INTO eid FROM tbl_test WHERE tbl_test.TEST_ID=tid;
CALL GET_APPLIED_STUDENT(eid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_TOTAL_MARKS` (IN `tid` INT)  NO SQL
SELECT tbl_test.TEST_TOTAL_MARKS FROM tbl_test WHERE tbl_test.TEST_ID=tid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_USERNAME` (IN `id` INT, IN `type` CHAR(2))  NO SQL
BEGIN
IF type = 'ST' THEN
	SELECT concat(tbl_student.STUDENT_FIRST_NAME,concat(" ",tbl_student.STUDENT_LAST_NAME)) AS uname FROM tbl_student WHERE tbl_student.STUDENT_ID=id;
ELSEIF type = 'CP' THEN
	SELECT tbl_company.COMPANY_NAME AS uname FROM tbl_company WHERE tbl_company.COMPANY_ID=id;
ELSEIF type = 'FC' OR type = 'CM' OR type = 'CH' THEN
	SELECT concat(tbl_faculty.FACULTY_FIRST_NAME,concat(" ",tbl_faculty.FACULTY_LAST_NAME)) AS uname FROM tbl_faculty WHERE tbl_faculty.FACULTY_ID=id;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `I10` (IN `sid` INT, IN `board10` VARCHAR(255), IN `school10` VARCHAR(255), IN `perc10` FLOAT, IN `board12` VARCHAR(255), IN `school12` VARCHAR(255), IN `stream12` VARCHAR(255), IN `perc12` FLOAT, IN `i1` FLOAT, IN `i2` FLOAT, IN `i3` FLOAT, IN `i4` FLOAT, IN `i5` FLOAT, IN `i6` FLOAT, IN `i7` FLOAT, IN `i8` FLOAT, IN `i9` FLOAT, IN `i10` FLOAT, IN `university_m` VARCHAR(255), IN `institution_m` VARCHAR(255), IN `specialization_m` VARCHAR(255), IN `degree_m` VARCHAR(255))  NO SQL
BEGIN
CALL INSERT_UPDATE_10TH(sid,board10,school10,perc10);
CALL INSERT_UPDATE_12TH(sid,board12,school12,stream12,perc12);
CALL INSERT_UPDATE_BACHELOR( sid, NULL, NULL,NULL,NULL,i1, i2, i3, i4, i5, i6, NULL, NULL);
CALL INSERT_UPDATE_MASTER( sid,university_m,institution_m,specialization_m,degree_m,i7, i8, i9, i10);
CALL INSERT_UPDATE_ACADEMICS(sid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_ACADEMIC` (IN `sid` INT)  NO SQL
BEGIN
DECLARE id int;
SELECT tbl_academic_details.ACADEMIC_DETAILS_ID INTO id FROM tbl_academic_details WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;
IF ISNULL(id) THEN
INSERT INTO tbl_academic_details(tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID,  tbl_academic_details.ACADEMIC_DETAILS_10TH_ID, tbl_academic_details.ACADEMIC_DETAILS_12TH_ID, tbl_academic_details.ACADEMIC_DETAILS_DIPLOMA_ID, tbl_academic_details.ACADEMIC_DETAILS_BACHELOR_ID, tbl_academic_details.ACADEMIC_DETAILS_MASTER_ID) VALUES( sid, (SELECT tbl_academic_10th_details.ACADEMIC_10TH_ID FROM tbl_academic_10th_details WHERE tbl_academic_10th_details.ACADEMIC_10TH_STUDENT_ID=sid), (SELECT tbl_academic_12th_details.ACADEMIC_12TH_ID FROM tbl_academic_12th_details WHERE tbl_academic_12th_details.ACADEMIC_12TH_STUDENT_ID=sid), (SELECT tbl_academic_diploma_details.ACADEMIC_DIPLOMA_ID FROM tbl_academic_diploma_details WHERE tbl_academic_diploma_details.ACADEMIC_DIPLOMA_STUDENT_ID=sid),  (SELECT tbl_academic_bachelor_details.ACADEMIC_BACHELOR_ID FROM tbl_academic_bachelor_details WHERE tbl_academic_bachelor_details.ACADEMIC_BACHELOR_STUDENT_ID=sid),  (SELECT tbl_academic_master_details.ACADEMIC_MASTER_ID FROM tbl_academic_master_details WHERE tbl_academic_master_details.ACADEMIC_MASTER_STUDENT_ID=sid));
ELSE
UPDATE tbl_academic_details SET tbl_academic_details.ACADEMIC_DETAILS_10TH_ID = (SELECT tbl_academic_10th_details.ACADEMIC_10TH_ID FROM tbl_academic_10th_details WHERE tbl_academic_10th_details.ACADEMIC_10TH_STUDENT_ID=sid), tbl_academic_details.ACADEMIC_DETAILS_12TH_ID =  (SELECT tbl_academic_12th_details.ACADEMIC_12TH_ID FROM tbl_academic_12th_details WHERE tbl_academic_12th_details.ACADEMIC_12TH_STUDENT_ID=sid), tbl_academic_details.ACADEMIC_DETAILS_DIPLOMA_ID = (SELECT tbl_academic_diploma_details.ACADEMIC_DIPLOMA_ID FROM tbl_academic_diploma_details WHERE tbl_academic_diploma_details.ACADEMIC_DIPLOMA_STUDENT_ID=sid), tbl_academic_details.ACADEMIC_DETAILS_BACHELOR_ID = (SELECT tbl_academic_bachelor_details.ACADEMIC_BACHELOR_ID FROM tbl_academic_bachelor_details WHERE tbl_academic_bachelor_details.ACADEMIC_BACHELOR_STUDENT_ID=sid), tbl_academic_details.ACADEMIC_DETAILS_MASTER_ID = (SELECT tbl_academic_master_details.ACADEMIC_MASTER_ID FROM tbl_academic_master_details WHERE tbl_academic_master_details.ACADEMIC_MASTER_STUDENT_ID=sid);
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_BROADCAST_LIST` (IN `ilname` VARCHAR(255), IN `fid` INT)  NO SQL
BEGIN
INSERT INTO tbl_broadcast_list (tbl_broadcast_list.BROADCAST_LIST_NAME, tbl_broadcast_list.BROADCAST_LIST_CREATED_BY, tbl_broadcast_list.BROADCAST_LIST_DATE, tbl_broadcast_list.BROADCAST_LIST_STATUS) VALUES(ilname, fid, now(), 0);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_COMPANY` (IN `name` VARCHAR(30), IN `ryear` CHAR(4), IN `address` VARCHAR(255), IN `email` VARCHAR(255), IN `pn1` VARCHAR(10), IN `pn2` VARCHAR(10), IN `website` VARCHAR(100), IN `password` VARCHAR(40), IN `logo` VARCHAR(50), IN `about` VARCHAR(255), IN `tech` VARCHAR(255), IN `noe` INT, IN `maximum_pack` BIGINT(20), IN `minimum_pack` BIGINT(20), IN `hr_name` VARCHAR(50), IN `hr_email` VARCHAR(255))  NO SQL
BEGIN
DECLARE ID INT;
INSERT into tbl_company (tbl_company.COMPANY_NAME, tbl_company.COMPANY_REGISTERED_YEAR, tbl_company.COMPANY_ADDRESS, tbl_company.COMPANY_EMAIL, tbl_company.COMPANY_PHONE_NUMBER_1, tbl_company.COMPANY_PHONE_NUMBER_2, tbl_company.COMPANY_WEBSITE, tbl_company.COMPANY_ACCEPTED, tbl_company.COMPANY_PASSWORD, tbl_company.COMPANY_LOGO, tbl_company.COMPANY_ABOUT, tbl_company.COMPANY_TECHNOLOGIES, tbl_company.COMPANY_NO_OF_EMPLOYEES, tbl_company.COMPANY_MAXIMUM_PACKAGE, tbl_company.COMPANY_MINIMUM_PACKAGE, tbl_company.COMPANY_HR_NAME, tbl_company.COMPANY_HR_EMAIL) VALUES (name, ryear, address, email, pn1, pn2, website, 'P', password, logo, about, tech, noe, maximum_pack, minimum_pack, hr_name, hr_email);

CALL `PASSWORD_UPDATE`();

SELECT tbl_company.COMPANY_ID INTO @ID FROM tbl_company ORDER BY tbl_company.COMPANY_ID DESC LIMIT 1;

CALL `REG_NOTIFICATION`(@ID,'CP');

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_COMPANY_PLACEMENT_LIST` (IN `cid` INT, IN `yr` CHAR(4))  NO SQL
BEGIN
INSERT INTO tbl_company_placement_list (tbl_company_placement_list.COMPANY_PLACEMENT_LIST_COMPANY_ID,tbl_company_placement_list.COMPANY_PLACEMENT_LIST_YEAR) VALUES(cid,yr);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_EVENT` (IN `gb` INT, IN `ename` VARCHAR(50), IN `edes` VARCHAR(255), IN `evenue` VARCHAR(255), IN `date` DATE, IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4), IN `t` TIME, IN `type` VARCHAR(255), IN `cate` BOOLEAN, IN `gtype` CHAR(2), IN `cid` INT)  NO SQL
BEGIN
DECLARE cnt INTEGER DEFAULT 0;
DECLARE sid int;
DECLARE eid int;
INSERT INTO tbl_event (tbl_event.EVENT_GENRATED_BY,tbl_event.EVENT_NAME,tbl_event.EVENT_DESCRIPTION,tbl_event.EVENT_VENUE,tbl_event.EVENT_DATE,tbl_event.EVENT_BATCH_ID,tbl_event.EVENT_TIME,tbl_event.EVENT_TYPE,tbl_event.EVENT_CATEGORY,tbl_event.EVENT_CANCLED,tbl_event.EVENT_COMPANY_ID) values(gb,ename,edes,evenue,date,(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept and tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear),t,type,cate,0,cid);

SELECT tbl_event.EVENT_ID INTO eid FROM tbl_event ORDER BY tbl_event.EVENT_ID DESC LIMIT 1;

CALL EVENT_NOTIFICATION(cate, gb, gtype, ename, dept, degree, pyear, eid);
CALL EVENT_NOTIFICATION_FACULTY(cate, gb, gtype, ename, eid);

if cid<>0 THEN
		CALL EVENT_NOTIFICATION_COMPANY(eid, gb, cid, gtype);
end IF;




END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_EVENT_APPLICATION` (IN `nid` INT, IN `sid` INT, IN `eid` INT)  NO SQL
BEGIN

INSERT INTO tbl_event_application(tbl_event_application.EVENT_APPLICATION_STUDENT_ID,tbl_event_application.EVENT_APPLICATION_EVENT_ID) VALUES(sid,eid);

CALL REMOVE_NOTIFICATION(nid);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_FACULTY` (IN `fn` VARCHAR(20), IN `ln` VARCHAR(20), IN `gender` CHAR(1), IN `email` VARCHAR(255), IN `pn` VARCHAR(10), IN `about` VARCHAR(255), IN `pp` VARCHAR(255), IN `password` VARCHAR(40))  NO SQL
BEGIN
DECLARE ID INT;
INSERT into tbl_faculty (tbl_faculty.FACULTY_FIRST_NAME,tbl_faculty.FACULTY_LAST_NAME,tbl_faculty.FACULTY_GENDER,tbl_faculty.FACULTY_EMAIL,tbl_faculty.FACULTY_PHONE_NUMBER,tbl_faculty.FACULTY_ABOUT,tbl_faculty.FACULTY_PROFILE_PIC,tbl_faculty.FACULTY_ACCEPTED,tbl_faculty.FACULTY_PASSWORD,tbl_faculty.FACULTY_ROLE)
VALUES(fn,ln,gender,email,pn,about,pp,'P',password,'FC');

CALL `PASSWORD_UPDATE`();

SELECT tbl_faculty.FACULTY_ID INTO @ID FROM tbl_faculty ORDER BY tbl_faculty.FACULTY_ID DESC LIMIT 1;

CALL `REG_NOTIFICATION`(@ID,'FC');


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_MARKS` (IN `test_id` INT, IN `stud_id` INT, IN `obtained` INT)  NO SQL
BEGIN

DECLARE id INT;
SELECT tbl_marks.MARKS_ID INTO id FROM tbl_marks WHERE tbl_marks.MARKS_TEST_ID=test_id AND tbl_marks.MARKS_STUDENT_ID=stud_id;

IF ISNULL(id) THEN
INSERT INTO tbl_marks (tbl_marks.MARKS_TEST_ID, tbl_marks.MARKS_STUDENT_ID, tbl_marks.MARKS_OBTAINED) VALUES (test_id,stud_id,obtained);
ELSE
UPDATE tbl_marks SET tbl_marks.MARKS_OBTAINED=obtained WHERE tbl_marks.MARKS_ID=id;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_MATERIAL` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `up_id` INT, IN `up_type` VARCHAR(2), IN `doc_type` VARCHAR(2), IN `doc_name` VARCHAR(255), IN `doc_title` VARCHAR(255))  NO SQL
BEGIN

INSERT INTO tbl_documents(tbl_documents.DOCUMENT_UPLOADER_ID,tbl_documents.DOCUMENT_UPLOADER_TYPE,tbl_documents.DOCUMENT_TYPE,tbl_documents.DOCUMENT_DEPARTMENT,tbl_documents.DOCUMENT_DEGREE,tbl_documents.DOCUMENT_NAME,tbl_documents.DOCUMENT_TITLE) VALUES(up_id,up_type,doc_type,dept,degree,doc_name,doc_title);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_NOTIFICATION` (IN `sid` INT, IN `rid` INT, IN `stype` CHAR(2), IN `rtype` CHAR(2), IN `type` CHAR(5), IN `description` VARCHAR(255))  NO SQL
BEGIN
INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_SENDER_ID,tbl_notification.NOTIFICATION_RECEIVER_ID,tbl_notification.NOTIFICATION_SENDER_TYPE,tbl_notification.NOTIFICATION_RECIVER_TYPE,tbl_notification.NOTIFICATION_TYPE,tbl_notification.NOTIFICATION_DESCRPTION,tbl_notification.NOTIFICATION_REMOVE_STATUS) VALUES(sid,rid,stype,rtype,type,description,0);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_SELECTION_LIST` (IN `cid` INT, IN `name` VARCHAR(50))  NO SQL
BEGIN
INSERT INTO tbl_selection_list (tbl_selection_list.SELECTION_LIST_COMPANY_ID,tbl_selection_list.SELECTION_LIST_YEAR,tbl_selection_list.SELECTION_LIST_NAME,tbl_selection_list.SELECTION_LIST_TYPE) VALUES(cid,YEAR(NOW()),name,'SH');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_SHORTLIST` (IN `rid` INT, IN `selectid` INT, IN `sid` INT)  NO SQL
BEGIN

INSERT INTO tbl_shortlist(tbl_shortlist.SHORT_LIST_RECOMMENDATION_ID,tbl_shortlist.SHORTLIST_SELECTION_LIST_ID,tbl_shortlist.SHORTLIST_STUDENT_ID,tbl_shortlist.SHORTLIST_TYPE) VALUES (rid,selectid,sid,"SH");

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_SHORTLIST_NOTIFICATION` (IN `sid` INT, IN `rid` INT, IN `stype` CHAR(2), IN `rtype` CHAR(2), IN `type` CHAR(5), IN `description` VARCHAR(255), IN `shortlist_id` INT)  NO SQL
BEGIN
INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_SENDER_ID, tbl_notification.NOTIFICATION_RECEIVER_ID, tbl_notification.NOTIFICATION_SENDER_TYPE, tbl_notification.NOTIFICATION_RECIVER_TYPE, tbl_notification.NOTIFICATION_TYPE, tbl_notification.NOTIFICATION_DESCRPTION, tbl_notification.NOTIFICATION_REMOVE_STATUS, tbl_notification.NOTIFICATION_EVENT_ID) VALUES (sid, rid, stype, rtype, type, description, 0, shortlist_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_STUDENT` (IN `fn` VARCHAR(20), IN `ln` VARCHAR(20), IN `en` VARCHAR(15), IN `email` VARCHAR(255), IN `pn` VARCHAR(10), IN `dob` DATE, IN `gender` CHAR(1), IN `password` VARCHAR(40), IN `pname` VARCHAR(20), IN `ppnum` VARCHAR(10), IN `pemail` VARCHAR(255), IN `ppic` VARCHAR(255), IN `about` VARCHAR(255), IN `address` VARCHAR(255), IN `dept` VARCHAR(10), IN `degree` VARCHAR(10), IN `pyear` CHAR(4), IN `ayear` CHAR(4))  NO SQL
BEGIN

INSERT into tbl_student(tbl_student.STUDENT_FIRST_NAME,tbl_student.STUDENT_LAST_NAME,tbl_student.STUDENT_ENROLLMENT_NUMBER,tbl_student.STUDENT_EMAIL,tbl_student.STUDENT_PHONE_NUMBER,tbl_student.STUDENT_DATE_OF_BIRTH,tbl_student.STUDENT_GENDER,tbl_student.STUDENT_PASSWORD,tbl_student.STUDENT_PARENT_NAME,tbl_student.STUDENT_PARENT_PHONE_NUMBER,tbl_student.STUDENT_PARENT_EMAIL,tbl_student.STUDENT_PROFILE_PIC,tbl_student.STUDENT_ABOUT,tbl_student.STUDENT_ADDRESS,tbl_student.STUDENT_BATCH_ID,tbl_student.STUDENT_ADMISSION_YEAR) VALUES(fn,ln,en,email,pn,dob,gender,password,pname,ppnum,pemail,ppic,about,address,(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept and tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear),ayear);


CALL `PASSWORD_UPDATE`();

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_TEST` (IN `eid` INT, IN `name` VARCHAR(20), IN `description` VARCHAR(255), IN `tmarks` INT, IN `pmarks` INT)  NO SQL
BEGIN


INSERT INTO tbl_test (tbl_test.TEST_EVENT_ID,tbl_test.TEST_NAME,tbl_test.TEST_DESCRIPTION,tbl_test.TEST_TOTAL_MARKS,tbl_test.TEST_PASSING_MARKS) VALUES (eid,name,description,tmarks,pmarks);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_TRAINING_NOTIFICATION` (IN `sid` INT, IN `rid` INT, IN `stype` CHAR(2), IN `rtype` CHAR(2), IN `type` CHAR(5), IN `description` VARCHAR(255), IN `selection_list_id` INT)  NO SQL
BEGIN
INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_SENDER_ID,tbl_notification.NOTIFICATION_RECEIVER_ID,tbl_notification.NOTIFICATION_SENDER_TYPE,tbl_notification.NOTIFICATION_RECIVER_TYPE,tbl_notification.NOTIFICATION_TYPE,tbl_notification.NOTIFICATION_DESCRPTION,tbl_notification.NOTIFICATION_REMOVE_STATUS, tbl_notification.NOTIFICATION_EVENT_ID) VALUES(sid,rid,stype,rtype,type,description,0,selection_list_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_10TH` (IN `sid` INT, IN `board` VARCHAR(255), IN `school` VARCHAR(255), IN `perc` FLOAT)  NO SQL
BEGIN
DECLARE id int;
SELECT tbl_academic_10th_details.ACADEMIC_10TH_ID INTO id FROM tbl_academic_10th_details WHERE tbl_academic_10th_details.ACADEMIC_10TH_STUDENT_ID=sid;
IF ISNULL(id) THEN
INSERT INTO tbl_academic_10th_details(tbl_academic_10th_details.ACADEMIC_10TH_STUDENT_ID, tbl_academic_10th_details.ACADEMIC_10TH_BOARD, tbl_academic_10th_details.ACADEMIC_10TH_SCHOOL, tbl_academic_10th_details.ACADEMIC_10TH_PERCENTAGE) VALUES(sid,board,school,perc);
ELSE
UPDATE tbl_academic_10th_details SET tbl_academic_10th_details.ACADEMIC_10TH_BOARD=board, tbl_academic_10th_details.ACADEMIC_10TH_SCHOOL=school, tbl_academic_10th_details.ACADEMIC_10TH_PERCENTAGE=perc WHERE tbl_academic_10th_details.ACADEMIC_10TH_ID=id;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_12TH` (IN `sid` INT, IN `board` VARCHAR(255), IN `school` VARCHAR(255), IN `stream` VARCHAR(20), IN `perc` FLOAT)  NO SQL
BEGIN
DECLARE id int;
SELECT tbl_academic_12th_details.ACADEMIC_12TH_ID INTO id FROM tbl_academic_12th_details WHERE tbl_academic_12th_details.ACADEMIC_12TH_STUDENT_ID=sid;
IF ISNULL(id) THEN
INSERT INTO tbl_academic_12th_details(tbl_academic_12th_details.ACADEMIC_12TH_STUDENT_ID, tbl_academic_12th_details.ACADEMIC_12TH_BOARD, tbl_academic_12th_details.ACADEMIC_12TH_SCHOOL, tbl_academic_12th_details.ACADEMIC_12TH_PERCENTAGE, tbl_academic_12th_details.ACADEMIC_12TH_STREAM) VALUES(sid,board,school,perc,stream);
ELSE
UPDATE tbl_academic_12th_details SET 
tbl_academic_12th_details.ACADEMIC_12TH_BOARD=board, tbl_academic_12th_details.ACADEMIC_12TH_SCHOOL=school,
tbl_academic_12th_details.ACADEMIC_12TH_STREAM=stream,
tbl_academic_12th_details.ACADEMIC_12TH_PERCENTAGE=perc WHERE tbl_academic_12th_details.ACADEMIC_12TH_ID=id;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_ACADEMICS` (IN `sid` INT)  NO SQL
BEGIN
DECLARE id int;
SELECT tbl_academic_details.ACADEMIC_DETAILS_ID INTO id FROM tbl_academic_details WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;
IF ISNULL(id) THEN
INSERT INTO tbl_academic_details( tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID, tbl_academic_details.ACADEMIC_DETAILS_10TH_ID, tbl_academic_details.ACADEMIC_DETAILS_12TH_ID, tbl_academic_details.ACADEMIC_DETAILS_DIPLOMA_ID, tbl_academic_details.ACADEMIC_DETAILS_BACHELOR_ID, tbl_academic_details.ACADEMIC_DETAILS_MASTER_ID) VALUES( sid, (SELECT tbl_academic_10th_details.ACADEMIC_10TH_ID FROM tbl_academic_10th_details WHERE tbl_academic_10th_details.ACADEMIC_10TH_STUDENT_ID=sid),(SELECT tbl_academic_12th_details.ACADEMIC_12TH_ID FROM tbl_academic_12th_details WHERE tbl_academic_12th_details.ACADEMIC_12TH_STUDENT_ID=sid),(SELECT tbl_academic_diploma_details.ACADEMIC_DIPLOMA_ID FROM tbl_academic_diploma_details WHERE tbl_academic_diploma_details.ACADEMIC_DIPLOMA_STUDENT_ID=sid),(SELECT tbl_academic_bachelor_details.ACADEMIC_BACHELOR_ID FROM tbl_academic_bachelor_details WHERE tbl_academic_bachelor_details.ACADEMIC_BACHELOR_STUDENT_ID=sid),(SELECT tbl_academic_master_details.ACADEMIC_MASTER_ID FROM tbl_academic_master_details WHERE tbl_academic_master_details.ACADEMIC_MASTER_STUDENT_ID=sid));
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_ATTENDANCE` (IN `eid` INT, IN `sid` INT, IN `fid` INT, IN `attendance` BOOLEAN)  NO SQL
BEGIN
DECLARE aid INT;

SELECT tbl_attendance.ATTENDANCE_ID INTO aid FROM tbl_attendance WHERE tbl_attendance.ATTENDANCE_EVENT_ID=eid and tbl_attendance.ATTENDANCE_STUDENT_ID=sid;
IF ISNULL(aid) THEN
	INSERT INTO tbl_attendance (tbl_attendance.ATTENDANCE_EVENT_ID, tbl_attendance.ATTENDANCE_STUDENT_ID, tbl_attendance.ATTENDANCE_FACULTY_ID, tbl_attendance.ATTENDANCE) VALUES (eid,sid,fid,attendance);
ELSE
	UPDATE tbl_attendance SET tbl_attendance.ATTENDANCE_EVENT_ID=eid, tbl_attendance.ATTENDANCE_STUDENT_ID=sid, tbl_attendance.ATTENDANCE_FACULTY_ID=fid, tbl_attendance.ATTENDANCE=attendance WHERE tbl_attendance.ATTENDANCE_ID=aid;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_BACHELOR` (IN `sid` INT, IN `university` VARCHAR(255), IN `institute` VARCHAR(255), IN `specialization` VARCHAR(255), IN `degree` VARCHAR(255), IN `s1` FLOAT, IN `s2` FLOAT, IN `s3` FLOAT, IN `s4` FLOAT, IN `s5` FLOAT, IN `s6` FLOAT, IN `s7` FLOAT, IN `s8` FLOAT)  NO SQL
BEGIN
DECLARE id int;
SELECT tbl_academic_bachelor_details.ACADEMIC_BACHELOR_ID into id FROM tbl_academic_bachelor_details WHERE tbl_academic_bachelor_details.ACADEMIC_BACHELOR_STUDENT_ID=sid;
IF ISNULL(id) THEN
INSERT INTO tbl_academic_bachelor_details(tbl_academic_bachelor_details.ACADEMIC_BACHELOR_STUDENT_ID, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_UNIVERSITY, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_INSTITUTE, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SPECIALIZATION,           tbl_academic_bachelor_details.ACADEMIC_BACHELOR_DEGREE,                    tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_1, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_2, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_3, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_4, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_5, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_6, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_7, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_8) VALUES(sid, university, institute, specialization,degree, s1, s2, s3, s4, s5, s6, s7, s8);
ELSE
UPDATE tbl_academic_bachelor_details SET tbl_academic_bachelor_details.ACADEMIC_BACHELOR_UNIVERSITY=university, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_INSTITUTE=institute, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SPECIALIZATION=specialization,
tbl_academic_bachelor_details.ACADEMIC_BACHELOR_DEGREE=degree,
tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_1=s1, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_2=s2, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_3=s3, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_4=s4, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_5=s5, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_6=s6, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_7=s7, tbl_academic_bachelor_details.ACADEMIC_BACHELOR_SEM_8=s8 WHERE tbl_academic_bachelor_details.ACADEMIC_BACHELOR_ID=id;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_BATCH` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4), IN `sem` INT, IN `d2d` BOOLEAN, IN `type` CHAR(3))  NO SQL
BEGIN
	DECLARE id int;
    SELECT tbl_batch.BATCH_ID INTO id FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear;
    
    IF ISNULL(id) THEN
    	INSERT INTO tbl_batch (tbl_batch.BATCH_DEPARTMENT, tbl_batch.BATCH_DEGREE, tbl_batch.BATCH_PASSING_YEAR, tbl_batch.BATCH_SEMESTER, tbl_batch.BATCH_D2D, tbl_batch.BATCH_TYPE) VALUES(dept, degree, pyear, sem, d2d, type);
	ELSE
    	UPDATE tbl_batch SET tbl_batch.BATCH_SEMESTER=sem, tbl_batch.BATCH_D2D=d2d, tbl_batch.BATCH_TYPE=type WHERE tbl_batch.BATCH_ID=id;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_BROADCAST_LIST_MEMBER` (IN `broadcast_id` INT, IN `company_id` INT)  NO SQL
BEGIN
DECLARE id int;
SELECT tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_ID INTO id FROM tbl_broadcast_list_members WHERE tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_BROADCAST_ID=broadcast_id AND tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_COMPANY_ID=company_id;
IF ISNULL(id) THEN
	INSERT INTO tbl_broadcast_list_members(tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_BROADCAST_ID, tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_COMPANY_ID,tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_STATUS) VALUES(broadcast_id,company_id,0);
ELSE
	UPDATE tbl_broadcast_list_members SET tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_STATUS=0 WHERE tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_ID=id;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_COMPANY_DOCUMENT` (IN `studid` INT, IN `company_id` INT, IN `doc_type` VARCHAR(50), IN `doc_name` VARCHAR(50))  NO SQL
BEGIN
DECLARE id int;
SELECT tbl_company_document.COMPANY_DOCUMENT_ID into id FROM tbl_company_document WHERE tbl_company_document.COMPANY_DOCUMENT_STUDENT_ID=studid AND tbl_company_document.COMPANY_DOCUMENT_COMPANY_ID=company_id AND tbl_company_document.COMPANY_DOCUMENT_TYPE=doc_type;


IF ISNULL(id) THEN
INSERT into tbl_company_document(tbl_company_document.COMPANY_DOCUMENT_STUDENT_ID,tbl_company_document.COMPANY_DOCUMENT_COMPANY_ID,tbl_company_document.COMPANY_DOCUMENT_TYPE,tbl_company_document.COMPANY_DOCUMENT_NAME) VALUES(studid,company_id,doc_type,doc_name);
ELSE
UPDATE tbl_company_document SET tbl_company_document.COMPANY_DOCUMENT_STUDENT_ID=studid,
tbl_company_document.COMPANY_DOCUMENT_COMPANY_ID=company_id,
tbl_company_document.COMPANY_DOCUMENT_TYPE=doc_type,
tbl_company_document.COMPANY_DOCUMENT_NAME=doc_name WHERE
tbl_company_document.COMPANY_DOCUMENT_STUDENT_ID=studid AND tbl_company_document.COMPANY_DOCUMENT_COMPANY_ID=company_id AND 
tbl_company_document.COMPANY_DOCUMENT_TYPE=doc_type;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_DIPLOMA` (IN `sid` INT, IN `university` VARCHAR(255), IN `institute` VARCHAR(255), IN `specialization` VARCHAR(255), IN `s1` FLOAT, IN `s2` FLOAT, IN `s3` FLOAT, IN `s4` FLOAT, IN `s5` FLOAT, IN `s6` FLOAT)  NO SQL
BEGIN
DECLARE id int;
SELECT tbl_academic_diploma_details.ACADEMIC_DIPLOMA_ID into id FROM tbl_academic_diploma_details WHERE tbl_academic_diploma_details.ACADEMIC_DIPLOMA_STUDENT_ID=sid;
IF ISNULL(id) THEN
INSERT INTO tbl_academic_diploma_details( tbl_academic_diploma_details.ACADEMIC_DIPLOMA_STUDENT_ID, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_UNIVERSITY, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_INSTITUTE, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SPECIALIZATION, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SEM_1, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SEM_2, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SEM_3, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SEM_4, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SEM_5, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SEM_6) VALUES(sid, university, institute, specialization, s1, s2, s3, s4, s5, s6);
ELSE
UPDATE tbl_academic_diploma_details SET tbl_academic_diploma_details.ACADEMIC_DIPLOMA_UNIVERSITY=university, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_INSTITUTE=institute, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SPECIALIZATION=specialization, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SEM_1=s1, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SEM_2=s2, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SEM_3=s3, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SEM_4=s4, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SEM_5=s5, tbl_academic_diploma_details.ACADEMIC_DIPLOMA_SEM_6=s6 WHERE tbl_academic_diploma_details.ACADEMIC_DIPLOMA_ID=id;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_MASTER` (IN `sid` INT, IN `university` VARCHAR(255), IN `institution` VARCHAR(255), IN `specialization` VARCHAR(255), IN `degree` VARCHAR(255), IN `s1` FLOAT, IN `s2` FLOAT, IN `s3` FLOAT, IN `s4` FLOAT)  NO SQL
BEGIN
DECLARE id int;
SELECT tbl_academic_master_details.ACADEMIC_MASTER_ID into id FROM tbl_academic_master_details WHERE tbl_academic_master_details.ACADEMIC_MASTER_STUDENT_ID=sid;
IF ISNULL(id) THEN
INSERT INTO tbl_academic_master_details(tbl_academic_master_details.ACADEMIC_MASTER_STUDENT_ID,tbl_academic_master_details.ACADEMIC_MASTER_UNIVERSITY,tbl_academic_master_details.ACADEMIC_MASTER_INSTITUTE,tbl_academic_master_details.ACADEMIC_MASTER_SPECIALIZATION,tbl_academic_master_details.ACADEMIC_MASTER_DEGREE,tbl_academic_master_details.ACADEMIC_MASTER_SEM_1, tbl_academic_master_details.ACADEMIC_MASTER_SEM_2, tbl_academic_master_details.ACADEMIC_MASTER_SEM_3, tbl_academic_master_details.ACADEMIC_MASTER_SEM_4) VALUES(sid,university,institution,specialization,degree,s1, s2, s3, s4);
ELSE
UPDATE tbl_academic_master_details SET 
tbl_academic_master_details.ACADEMIC_MASTER_UNIVERSITY=university,
tbl_academic_master_details.ACADEMIC_MASTER_INSTITUTE=institution,
tbl_academic_master_details.ACADEMIC_MASTER_SPECIALIZATION=specialization,
tbl_academic_master_details.ACADEMIC_MASTER_DEGREE=degree,
tbl_academic_master_details.ACADEMIC_MASTER_SEM_1=s1, tbl_academic_master_details.ACADEMIC_MASTER_SEM_2=s2, tbl_academic_master_details.ACADEMIC_MASTER_SEM_3=s3, tbl_academic_master_details.ACADEMIC_MASTER_SEM_4=s4 WHERE tbl_academic_master_details.ACADEMIC_MASTER_ID=id;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_PLACEMENT` (IN `sid` INT, IN `cid` INT, IN `package` INT)  NO SQL
BEGIN
	DECLARE tid int;
    DECLARE pid int;
    SELECT tbl_training.TRAINING_ID INTO tid FROM tbl_training WHERE tbl_training.TRAINING_STUDENT_ID=sid AND tbl_training.TRAINING_COMPANY_ID=cid;
    SELECT tbl_placement.PLACEMENT_ID INTO pid FROM tbl_placement WHERE tbl_placement.PLACEMENT_TRAINING_ID=tid;
    IF ISNULL(pid) THEN
    	INSERT INTO tbl_placement (tbl_placement.PLACEMENT_TRAINING_ID, tbl_placement.PLACEMENT_OFFERED_PACKAGE, tbl_placement.PLACEMENT_ACCEPTED) VALUES (tid, package, 'P');
	ELSE
    	UPDATE tbl_placement SET tbl_placement.PLACEMENT_OFFERED_PACKAGE=package WHERE tbl_placement.PLACEMENT_ID=pid;
	END IF;
    
    SELECT tid, pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_PLACEMENT_SCHEDULE` (IN `cid` INT, IN `sdate` DATE, IN `edate` DATE)  NO SQL
BEGIN
DECLARE id int;
   SELECT tbl_placement_schedule.PLACEMENT_SCHEDULE_ID INTO id FROM tbl_placement_schedule WHERE tbl_placement_schedule.PLACEMENT_SCHEDULE_COMPANY_ID=cid;
IF ISNULL(id) THEN
	INSERT INTO tbl_placement_schedule (tbl_placement_schedule.PLACEMENT_SCHEDULE_COMPANY_ID, tbl_placement_schedule.PLACEMENT_SCHEDULE_START_DATE, tbl_placement_schedule.PLACEMENT_SCHEDULE_END_DATE, tbl_placement_schedule.PLACEMENT_SCHEDULE_STATUS) VALUES (cid, sdate, edate, 0);
ELSE
	UPDATE tbl_placement_schedule SET tbl_placement_schedule.PLACEMENT_SCHEDULE_START_DATE=sdate, tbl_placement_schedule.PLACEMENT_SCHEDULE_END_DATE=edate, tbl_placement_schedule.PLACEMENT_SCHEDULE_STATUS=0 WHERE tbl_placement_schedule.PLACEMENT_SCHEDULE_COMPANY_ID=cid;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_RECOMMENDATION` (IN `sid` INT, IN `cid` INT, IN `description` VARCHAR(255))  NO SQL
BEGIN
	DECLARE id int;
    SELECT tbl_recommendation.RECOMMENDATION_ID INTO id FROM tbl_recommendation WHERE tbl_recommendation.RECOMMENDATION_STUDENT_ID=sid AND tbl_recommendation.RECOMMENDATION_COMPANY_ID=cid;
    IF ISNULL(id) THEN
		INSERT INTO tbl_recommendation(tbl_recommendation.RECOMMENDATION_STUDENT_ID, tbl_recommendation.RECOMMENDATION_COMPANY_ID, tbl_recommendation.RECOMMENDATION_DESCRIPTION) VALUES (sid,cid,description);
	ELSE
    	UPDATE tbl_recommendation SET tbl_recommendation.RECOMMENDATION_DESCRIPTION=description WHERE tbl_recommendation.RECOMMENDATION_ID=id;
	END IF;
	CALL RECOMMENDATION_NOTIFICATION(cid,description);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_RESUME` (IN `sid` INT, IN `tskill` VARCHAR(255), IN `pskill` VARCHAR(255), IN `languages` VARCHAR(255), IN `project` VARCHAR(255), IN `achivment` VARCHAR(255), IN `cobj` VARCHAR(255))  NO SQL
BEGIN
DECLARE id_check int;
SELECT tbl_resume.RESUME_STUDENT_ID INTO id_check FROM tbl_resume WHERE tbl_resume.RESUME_STUDENT_ID=sid;

IF sid=id_check THEN
	UPDATE tbl_resume SET tbl_resume.RESUME_TECHNICAL_SKILLS=tskill,tbl_resume.RESUME_PERSONAL_SKILLS=pskill,tbl_resume.RESUME_LANGUAGES=languages,tbl_resume.RSEUME_PROJECTS=project,tbl_resume.RESUME_ACHIVEMENTS=achivment,tbl_resume.RESUME_CARRIER_OBJECTIVE=cobj WHERE tbl_resume.RESUME_STUDENT_ID=sid;
ELSE
	INSERT INTO tbl_resume (tbl_resume.RESUME_STUDENT_ID,tbl_resume.RESUME_TECHNICAL_SKILLS,tbl_resume.RESUME_PERSONAL_SKILLS,tbl_resume.RESUME_LANGUAGES,tbl_resume.RSEUME_PROJECTS,tbl_resume.RESUME_ACHIVEMENTS,tbl_resume.RESUME_CARRIER_OBJECTIVE) VALUES(sid,tskill,pskill,languages,project,achivment,cobj);
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_SHORTLIST` (IN `rid` INT, IN `select_id` INT, IN `sid` INT, IN `type` CHAR(2))  NO SQL
BEGIN
	DECLARE id int;
    SELECT tbl_shortlist.SHORTLIST_ID INTO id FROM tbl_shortlist WHERE tbl_shortlist.SHORTLIST_SELECTION_LIST_ID=select_id AND tbl_shortlist.SHORTLIST_STUDENT_ID=sid;
    
    IF ISNULL(id) THEN
    	INSERT INTO tbl_shortlist (tbl_shortlist.SHORT_LIST_RECOMMENDATION_ID, tbl_shortlist.SHORTLIST_SELECTION_LIST_ID, tbl_shortlist.SHORTLIST_STUDENT_ID, tbl_shortlist.SHORTLIST_TYPE) VALUES (rid, select_id, sid, type);
	ELSE
    	UPDATE tbl_shortlist SET tbl_shortlist.SHORT_LIST_RECOMMENDATION_ID=rid, tbl_shortlist.SHORTLIST_SELECTION_LIST_ID=select_id, tbl_shortlist.SHORTLIST_STUDENT_ID=sid, tbl_shortlist.SHORTLIST_TYPE=type WHERE tbl_shortlist.SHORTLIST_ID=id;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_TRAINING` (IN `sid` INT, IN `cid` INT, IN `offered_stipend` INT, IN `accepted` CHAR(1))  NO SQL
BEGIN
DECLARE id int;
SELECT tbl_training.TRAINING_ID into id FROM tbl_training WHERE tbl_training.TRAINING_STUDENT_ID=sid AND
tbl_training.TRAINING_COMPANY_ID = cid;

IF ISNULL(id) THEN
INSERT INTO tbl_training (tbl_training.TRAINING_STUDENT_ID, tbl_training.TRAINING_COMPANY_ID,tbl_training.TRAINING_OFFERED_STIPEND,tbl_training.TRAINING_ACCEPTED) VALUES(sid,cid,offered_stipend,accepted);
ELSE
UPDATE tbl_training SET 
tbl_training.TRAINING_OFFERED_STIPEND=offered_stipend, tbl_training.TRAINING_ACCEPTED=accepted WHERE tbl_training.TRAINING_STUDENT_ID=sid AND
tbl_training.TRAINING_COMPANY_ID=cid;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LOGIN_AUTHENTICATION` (IN `uname` VARCHAR(255), IN `pass` VARCHAR(50))  NO SQL
BEGIN

SELECT LOGIN_REFERENCE_ID,LOGIN_USER_TYPE,LOGIN_USER_EMAIL,LOGIN_USER_PHONE_NUMBER
FROM tbl_login WHERE (LOGIN_USER_EMAIL=uname OR LOGIN_USER_PHONE_NUMBER=uname)
AND LOGIN_USER_PASSWORD=(SHA1(concat(pass,LOGIN_USER_SALT))); 
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `NEW_PASSWORD` (IN `A` VARCHAR(255), IN `B` VARCHAR(255))  NO SQL
BEGIN
DECLARE S varchar(16);
SELECT tbl_login.LOGIN_USER_SALT INTO S FROM tbl_login WHERE tbl_login.LOGIN_USER_EMAIL=A;
CALL PASSWORD_GEN(B, S);
UPDATE tbl_login SET tbl_login.LOGIN_USER_PASSWORD=B WHERE tbl_login.LOGIN_USER_EMAIL=A;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `NO_PLACEMENT_APPROVE_STATUS` (IN `sid` INT)  NO SQL
BEGIN
	
UPDATE tbl_no_placement SET tbl_no_placement.NO_PLACEMENT_APPROVED=1   WHERE tbl_no_placement.NO_PLACEMENT_STUDENT_ID=sid; 
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PASSWORD_GEN` (INOUT `A` VARCHAR(40), IN `B` VARCHAR(16))  NO SQL
BEGIN

SELECT SHA1(concat(A,B)) into A;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PASSWORD_UPDATE` ()  NO SQL
BEGIN
DECLARE A int;
DECLARE B char(2);
DECLARE C VARCHAR(40);

SELECT LOGIN_REFERENCE_ID INTO @A from tbl_login order by LOGIN_ID DESC LIMIT 1;
SELECT LOGIN_USER_TYPE INTO @B from tbl_login order by LOGIN_ID DESC LIMIT 1;
SELECT LOGIN_USER_PASSWORD INTO @C from tbl_login order by LOGIN_ID DESC LIMIT 1;
IF @B='ST' THEN
	UPDATE tbl_student SET STUDENT_PASSWORD=@C WHERE STUDENT_ID=@A;
ELSEIF @B='FC' OR @B='CM' OR @B='CH' THEN
	UPDATE tbl_faculty SET FACULTY_PASSWORD=@C WHERE FACULTY_ID=@A;
ELSEIF @B='CP' THEN
	UPDATE tbl_company SET COMPANY_PASSWORD=@C WHERE COMPANY_ID=@A;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RANDOM_STRING_16` (OUT `A` VARCHAR(16))  NO SQL
BEGIN

SELECT concat(
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97),
char(round(rand()*25)+97)
)INTO A;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RECOMMENDATION_NOTIFICATION` (IN `cid` INT, IN `description` VARCHAR(255))  NO SQL
BEGIN

INSERT INTO tbl_notification(tbl_notification.NOTIFICATION_SENDER_ID, tbl_notification.NOTIFICATION_RECEIVER_ID, tbl_notification.NOTIFICATION_SENDER_TYPE, tbl_notification.NOTIFICATION_RECIVER_TYPE, tbl_notification.NOTIFICATION_TYPE, tbl_notification.NOTIFICATION_DESCRPTION, tbl_notification.NOTIFICATION_REMOVE_STATUS) VALUES((SELECT tbl_faculty.FACULTY_ID FROM tbl_faculty WHERE tbl_faculty.FACULTY_ROLE='CH'),cid,'CH','CP','RECOM',description,0);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REG_NOTIFICATION` (IN `id` INT, IN `type` CHAR(2))  NO SQL
BEGIN
INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_SENDER_ID,tbl_notification.NOTIFICATION_RECEIVER_ID,tbl_notification.NOTIFICATION_SENDER_TYPE,tbl_notification.NOTIFICATION_RECIVER_TYPE,tbl_notification.NOTIFICATION_DESCRPTION,tbl_notification.NOTIFICATION_REMOVE_STATUS,tbl_notification.NOTIFICATION_TYPE) VALUES(id,(SELECT tbl_faculty.FACULTY_ID FROM tbl_faculty WHERE tbl_faculty.FACULTY_ROLE='CH'),type,'CH','Newly Registered User',0,'REGIS');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REJECT_REG` (IN `id` INT, IN `type` CHAR(2), IN `nid` INT)  NO SQL
BEGIN
CALL `REMOVE_NOTIFICATION`(nid);
IF type = 'CP' THEN
	UPDATE tbl_company SET tbl_company.COMPANY_ACCEPTED='R' WHERE tbl_company.COMPANY_ID=id;
ELSEIF type = 'FC' OR type = 'CM' OR type = 'CH' THEN
	UPDATE tbl_faculty SET tbl_faculty.FACULTY_ACCEPTED='R' WHERE tbl_faculty.FACULTY_ID=id;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REMOVE_BROADCAST_MEMBER` (IN `id` INT)  NO SQL
BEGIN
UPDATE tbl_broadcast_list_members SET tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_STATUS=1 WHERE tbl_broadcast_list_members.BROADCAST_LIST_MEMBER_ID=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REMOVE_EVENT_NOTIFICATION` (IN `eid` INT)  NO SQL
BEGIN
	UPDATE tbl_notification SET tbl_notification.NOTIFICATION_REMOVE_STATUS=1 WHERE tbl_notification.NOTIFICATION_EVENT_ID=eid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REMOVE_NOTIFICATION` (IN `id` INT)  NO SQL
BEGIN
UPDATE tbl_notification SET tbl_notification.NOTIFICATION_REMOVE_STATUS = 1 WHERE tbl_notification.NOTIFICATION_ID=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REMOVE_RECOMMENDATION` (IN `rid` INT)  NO SQL
BEGIN
 
UPDATE tbl_recommendation SET tbl_recommendation.RECOMMENDATION_STATUS=1 WHERE 
tbl_recommendation.RECOMMENDATION_ID=rid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RESTORE_COMPANY` (IN `cid` INT)  NO SQL
BEGIN
UPDATE tbl_company SET tbl_company.COMPANY_ACCEPTED='A' WHERE tbl_company.COMPANY_ID=cid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RESTORE_EVENT` (IN `eid` INT)  NO SQL
BEGIN
UPDATE tbl_event SET tbl_event.EVENT_CANCLED=0 WHERE tbl_event.EVENT_ID=eid;
UPDATE tbl_notification SET tbl_notification.NOTIFICATION_REMOVE_STATUS=0 WHERE tbl_notification.NOTIFICATION_EVENT_ID=eid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RESTORE_FACULTY` (IN `id` INT)  NO SQL
BEGIN
	UPDATE tbl_faculty SET tbl_faculty.FACULTY_ROLE='FC', tbl_faculty.FACULTY_ACCEPTED='A' WHERE tbl_faculty.FACULTY_ID=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RESTORE_STUDENT` (IN `sid` INT)  NO SQL
BEGIN
UPDATE tbl_student SET tbl_student.STUDENT_STATUS=0 WHERE tbl_student.STUDENT_ID=sid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_COMPANY_PROFILE` (IN `cid` INT)  NO SQL
SELECT * FROM tbl_company where tbl_company.COMPANY_ID=cid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `STUDENT_RESUME_UPLOAD` (IN `sid` INT, IN `resume_name` VARCHAR(255))  NO SQL
BEGIN
DECLARE id INT;
SELECT tbl_resume_document.RESUME_DOCUMENT_ID INTO id FROM tbl_resume_document WHERE tbl_resume_document.RESUME_DOCUMENT_STUDENT_ID=sid;

IF ISNULL(id) THEN
	INSERT INTO tbl_resume_document(tbl_resume_document.RESUME_DOCUMENT_STUDENT_ID,tbl_resume_document.RESUME_DOCUMENT_NAME) VALUES (sid,resume_name);
ELSE 
  UPDATE tbl_resume_document SET tbl_resume_document.RESUME_DOCUMENT_STUDENT_ID=sid,
tbl_resume_document.RESUME_DOCUMENT_NAME=resume_name WHERE  
tbl_resume_document.RESUME_DOCUMENT_ID=id;
END if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TERMINATE_STUDENT_UNDER_TRAINING` (IN `sid` INT, IN `cid` INT, IN `chid` INT)  NO SQL
BEGIN
	DECLARE pid int;
    DECLARE tid int;
    DECLARE sfname varchar(50);
    DECLARE slname varchar(50);
    DECLARE msg varchar(255);
    SELECT tbl_training.TRAINING_ID INTO tid FROM tbl_training WHERE tbl_training.TRAINING_STUDENT_ID=sid AND tbl_training.TRAINING_COMPANY_ID=cid;
    
    SELECT tbl_placement.PLACEMENT_ID INTO pid FROM tbl_placement WHERE tbl_placement.PLACEMENT_TRAINING_ID=tid;
    
    IF ISNULL(pid) THEN
		INSERT INTO tbl_placement (tbl_placement.PLACEMENT_TRAINING_ID, tbl_placement.PLACEMENT_OFFERED_PACKAGE, tbl_placement.PLACEMENT_ACCEPTED) VALUES (tid, 0, 'T');
    ELSE
    	UPDATE tbl_placement SET tbl_placement.PLACEMENT_ACCEPTED='T', tbl_placement.PLACEMENT_OFFERED_PACKAGE=0 WHERE tbl_placement.PLACEMENT_ID=pid;
    END IF;
    UPDATE tbl_student, tbl_training SET tbl_student.STUDENT_STATUS=1 WHERE tbl_student.STUDENT_ID=tbl_training.TRAINING_STUDENT_ID AND tbl_training.TRAINING_ID=tid;
    SELECT tbl_student.STUDENT_FIRST_NAME INTO sfname FROM tbl_training, tbl_student WHERE tbl_student.STUDENT_ID=tbl_training.TRAINING_STUDENT_ID AND tbl_training.TRAINING_ID=tid;
    SELECT tbl_student.STUDENT_LAST_NAME INTO slname FROM tbl_training, tbl_student WHERE tbl_student.STUDENT_ID=tbl_training.TRAINING_STUDENT_ID AND tbl_training.TRAINING_ID=tid;
    SET msg = concat(sfname, concat(" ", concat(slname, " is Terminated")));
    CALL `INSERT_NOTIFICATION`(cid, chid, 'CP', 'CH', 'TRMNT', msg);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TERMINATION_REQUEST` (IN `sid` INT, IN `type` CHAR(2), IN `reason` VARCHAR(255), IN `chid` INT)  NO SQL
BEGIN
DECLARE id int;
SELECT tbl_no_placement.NO_PLACEMENT_ID INTO id FROM tbl_no_placement WHERE tbl_no_placement.NO_PLACEMENT_STUDENT_ID=sid;
IF ISNULL(id) THEN
	INSERT INTO tbl_no_placement(tbl_no_placement.NO_PLACEMENT_STUDENT_ID, tbl_no_placement.NO_PLACEMENT_TYPE,                 tbl_no_placement.NO_PLACEMENT_REASON, tbl_no_placement.NO_PLACEMENT_APPROVED)
                 VALUES (sid,type,reason,'0');           
ELSE
   UPDATE tbl_no_placement SET tbl_no_placement.NO_PLACEMENT_STUDENT_ID=sid,
tbl_no_placement.NO_PLACEMENT_TYPE=type,
tbl_no_placement.NO_PLACEMENT_REASON=reason
WHERE tbl_no_placement.NO_PLACEMENT_STUDENT_ID=sid AND
tbl_no_placement.NO_PLACEMENT_ID=id;
END IF;

CALL `INSERT_NOTIFICATION`(sid, chid, 'ST', 'CH', 'TRREQ', reason);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_ACADEMIC_DETAILS` (IN `sid` INT, IN `m10` FLOAT, IN `m12` FLOAT, IN `s1` FLOAT, IN `s2` FLOAT, IN `s3` FLOAT, IN `s4` FLOAT, IN `s5` FLOAT, IN `s6` FLOAT, IN `s7` FLOAT, IN `s8` FLOAT, IN `s9` FLOAT, IN `s10` FLOAT)  NO SQL
BEGIN
DECLARE id_check int;
SELECT tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID INTO id_check FROM tbl_academic_details WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;
IF sid=id_check THEN
	UPDATE tbl_academic_details SET tbl_academic_details.ACADEMIC_DETAILS_10TH=m10, tbl_academic_details.ACADEMIC_DETAILS_12TH=m12, tbl_academic_details.ACADEMIC_DETAILS_SEM_1=s1, tbl_academic_details.ACADEMIC_DETAILS_SEM_2=s2, tbl_academic_details.ACADEMIC_DETAILS_SEM_3=s3, tbl_academic_details.ACADEMIC_DETAILS_SEM_4=s4, tbl_academic_details.ACADEMIC_DETAILS_SEM_5=s5, tbl_academic_details.ACADEMIC_DETAILS_SEM_6=s6, tbl_academic_details.ACADEMIC_DETAILS_SEM_7=s7, tbl_academic_details.ACADEMIC_DETAILS_SEM_8=s8, tbl_academic_details.ACADEMIC_DETAILS_SEM_9=s9, tbl_academic_details.ACADEMIC_DETAILS_SEM_10=s10 WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;
ELSE
	INSERT INTO tbl_academic_details (tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID, tbl_academic_details.ACADEMIC_DETAILS_10TH, tbl_academic_details.ACADEMIC_DETAILS_12TH, tbl_academic_details.ACADEMIC_DETAILS_SEM_1, tbl_academic_details.ACADEMIC_DETAILS_SEM_2, tbl_academic_details.ACADEMIC_DETAILS_SEM_3, tbl_academic_details.ACADEMIC_DETAILS_SEM_4, tbl_academic_details.ACADEMIC_DETAILS_SEM_5, tbl_academic_details.ACADEMIC_DETAILS_SEM_6, tbl_academic_details.ACADEMIC_DETAILS_SEM_7, tbl_academic_details.ACADEMIC_DETAILS_SEM_8, tbl_academic_details.ACADEMIC_DETAILS_SEM_9, tbl_academic_details.ACADEMIC_DETAILS_SEM_10) VALUES(sid,m10,m12,s1,s2,s3,s4,s5,s6,s7,s8,s9,s10);
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_COMPANY_DP` (IN `cid` INT, IN `img_name` VARCHAR(255))  NO SQL
BEGIN
	UPDATE tbl_company SET tbl_company.COMPANY_LOGO=img_name WHERE tbl_company.COMPANY_ID=cid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_COMPANY_LOGO` (IN `cid` INT, IN `company_logo_nam` VARCHAR(255))  NO SQL
BEGIN

UPDATE tbl_company SET tbl_company.COMPANY_LOGO = company_logo_nam WHERE tbl_company.COMPANY_ID=cid;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_COMPANY_PROFILE` (IN `id` INT, IN `name` VARCHAR(30), IN `ryear` CHAR(4), IN `address` VARCHAR(255), IN `website` VARCHAR(100), IN `about` VARCHAR(255), IN `noe` INT, IN `maximum` BIGINT, IN `minimum` BIGINT, IN `hrname` VARCHAR(50), IN `hremail` VARCHAR(255), IN `cemail` VARCHAR(255), IN `cnum` VARCHAR(10), IN `hrnum` VARCHAR(10))  NO SQL
BEGIN
UPDATE tbl_company SET tbl_company.COMPANY_NAME=name, tbl_company.COMPANY_REGISTERED_YEAR=ryear, tbl_company.COMPANY_ADDRESS=address, tbl_company.COMPANY_WEBSITE=website, tbl_company.COMPANY_ABOUT=about, tbl_company.COMPANY_NO_OF_EMPLOYEES=noe, tbl_company.COMPANY_MAXIMUM_PACKAGE=maximum, tbl_company.COMPANY_MINIMUM_PACKAGE=minimum, tbl_company.COMPANY_HR_NAME=hrname, tbl_company.COMPANY_HR_EMAIL=hremail, tbl_company.COMPANY_EMAIL=cemail, tbl_company.COMPANY_PHONE_NUMBER_1=cnum, tbl_company.COMPANY_PHONE_NUMBER_2=hrnum WHERE tbl_company.COMPANY_ID=id;


UPDATE tbl_login SET tbl_login.LOGIN_USER_EMAIL=cemail, tbl_login.LOGIN_USER_PHONE_NUMBER=cnum WHERE tbl_login.LOGIN_REFERENCE_ID=id AND tbl_login.LOGIN_USER_TYPE='CP';

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_EVENT` (IN `gb` INT, IN `ename` VARCHAR(50), IN `edes` VARCHAR(255), IN `evenue` VARCHAR(255), IN `date` DATE, IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4), IN `t` TIME, IN `type` VARCHAR(255), IN `cate` BOOLEAN, IN `gtype` CHAR(2), IN `cid` INT, IN `eid` INT)  NO SQL
BEGIN

CALL REMOVE_EVENT_NOTIFICATION(eid);

UPDATE tbl_event SET tbl_event.EVENT_COMPANY_ID=cid, tbl_event.EVENT_GENRATED_BY=gb, tbl_event.EVENT_NAME=ename, tbl_event.EVENT_DESCRIPTION=edes, tbl_event.EVENT_VENUE=evenue, tbl_event.EVENT_DATE=date, tbl_event.EVENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear), tbl_event.EVENT_TIME=t, tbl_event.EVENT_TYPE=type, tbl_event.EVENT_CATEGORY=cate WHERE tbl_event.EVENT_ID=eid;

CALL EVENT_NOTIFICATION(cate, gb, gtype, ename, dept, degree, pyear, eid);


CALL EVENT_NOTIFICATION_FACULTY(cate, gb, gtype, ename, eid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_FACULTY_PROFILE` (IN `id` INT, IN `fn` VARCHAR(20), IN `ln` VARCHAR(20), IN `gen` VARCHAR(5), IN `phn` VARCHAR(10), IN `abt` VARCHAR(255), IN `email` VARCHAR(255))  NO SQL
BEGIN
DECLARE utype char(20);

SELECT tbl_faculty.FACULTY_ROLE INTO utype FROM tbl_faculty WHERE tbl_faculty.FACULTY_ID=id;

UPDATE tbl_faculty SET tbl_faculty.FACULTY_FIRST_NAME=fn, tbl_faculty.FACULTY_LAST_NAME=ln, tbl_faculty.FACULTY_GENDER=gen, tbl_faculty.FACULTY_EMAIL=email, tbl_faculty.FACULTY_PHONE_NUMBER=phn, tbl_faculty.FACULTY_ABOUT=abt WHERE tbl_faculty.FACULTY_ID = id;

UPDATE tbl_login SET tbl_login.LOGIN_USER_EMAIL=email, tbl_login.LOGIN_USER_PHONE_NUMBER=phn WHERE tbl_login.LOGIN_REFERENCE_ID=id AND tbl_login.LOGIN_USER_TYPE=utype;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_FACULTY_PROFILE_PIC` (IN `fid` INT, IN `profile_pic_name` VARCHAR(255))  NO SQL
BEGIN

UPDATE tbl_faculty SET tbl_faculty.FACULTY_PROFILE_PIC=profile_pic_name WHERE 
tbl_faculty.FACULTY_ID=fid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_FACULTY_ROLE` (IN `fid` INT, IN `frole` VARCHAR(20))  NO SQL
BEGIN

DECLARE old_type char(2);

SELECT tbl_faculty.FACULTY_ROLE INTO old_type FROM tbl_faculty WHERE tbl_faculty.FACULTY_ID=fid;

UPDATE tbl_faculty SET tbl_faculty.FACULTY_ROLE = frole WHERE tbl_faculty.FACULTY_ID=fid; 

UPDATE tbl_login SET tbl_login.LOGIN_USER_TYPE = frole WHERE tbl_login.LOGIN_REFERENCE_ID=fid AND tbl_login.LOGIN_USER_TYPE=old_type;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_PLACEMENT_STATUS` (IN `sid` INT, IN `status` CHAR(1))  NO SQL
BEGIN
	DECLARE pid int;
    SELECT tbl_placement.PLACEMENT_ID INTO pid FROM tbl_placement, tbl_training WHERE tbl_placement.PLACEMENT_TRAINING_ID=tbl_training.TRAINING_ID AND tbl_training.TRAINING_STUDENT_ID=sid;
    UPDATE tbl_placement SET tbl_placement.PLACEMENT_ACCEPTED=status WHERE tbl_placement.PLACEMENT_ID=pid;
    CALL `DEACTIVATE_STUDENT`(sid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_STUDENT_PROFILE` (IN `id` INT, IN `fname` VARCHAR(20), IN `lname` VARCHAR(20), IN `ennum` VARCHAR(15), IN `dob` DATE, IN `gender` CHAR(1), IN `pname` VARCHAR(20), IN `about` VARCHAR(255), IN `address` VARCHAR(255), IN `pnum` VARCHAR(10), IN `email` VARCHAR(255), IN `ppnum` VARCHAR(10), IN `pemail` VARCHAR(255))  NO SQL
BEGIN  
UPDATE tbl_student SET tbl_student.STUDENT_FIRST_NAME=fname, tbl_student.STUDENT_LAST_NAME=lname, tbl_student.STUDENT_ENROLLMENT_NUMBER=ennum, tbl_student.STUDENT_EMAIL=email, tbl_student.STUDENT_PHONE_NUMBER=pnum, tbl_student.STUDENT_DATE_OF_BIRTH=dob, tbl_student.STUDENT_GENDER=gender, tbl_student.STUDENT_PARENT_NAME=pname, tbl_student.STUDENT_PARENT_PHONE_NUMBER=ppnum, tbl_student.STUDENT_PARENT_EMAIL=pemail, tbl_student.STUDENT_ABOUT=about,  tbl_student.STUDENT_ADDRESS=address 
WHERE tbl_student.STUDENT_ID=id;


UPDATE tbl_login SET tbl_login.LOGIN_USER_EMAIL=email,
tbl_login.LOGIN_USER_PHONE_NUMBER=pnum WHERE tbl_login.LOGIN_REFERENCE_ID=id AND tbl_login.LOGIN_USER_TYPE='ST';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_STUDENT_PROFILE_PIC` (IN `ppic` VARCHAR(255), IN `sid` INT)  NO SQL
BEGIN

UPDATE tbl_student SET tbl_student.STUDENT_PROFILE_PIC=ppic WHERE tbl_student.STUDENT_ID=sid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_BATCH` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20))  NO SQL
BEGIN
	SELECT * FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree ORDER BY tbl_batch.BATCH_DEPARTMENT, tbl_batch.BATCH_DEGREE, tbl_batch.BATCH_PASSING_YEAR;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_BROADCAST_LISTS` ()  NO SQL
BEGIN
SELECT tbl_broadcast_list.*, tbl_faculty.FACULTY_FIRST_NAME, tbl_faculty.FACULTY_LAST_NAME FROM tbl_broadcast_list, tbl_faculty WHERE tbl_faculty.FACULTY_ID=tbl_broadcast_list.BROADCAST_LIST_CREATED_BY AND tbl_broadcast_list.BROADCAST_LIST_STATUS=0 AND tbl_broadcast_list.BROADCAST_LIST_ID<>0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_COMMITTEE_MEMBER` ()  NO SQL
BEGIN
SELECT * FROM tbl_faculty WHERE tbl_faculty.FACULTY_ROLE='CM' AND tbl_faculty.FACULTY_ACCEPTED='A';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_COMPANY` ()  NO SQL
BEGIN
SELECT * FROM tbl_company WHERE tbl_company.COMPANY_ACCEPTED='A';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_DEACTIVE_COMPANY` ()  NO SQL
BEGIN
 SELECT * FROM tbl_company WHERE tbl_company.COMPANY_ACCEPTED='R';
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_DEACTIVE_FACULTY` ()  NO SQL
BEGIN
	SELECT * FROM tbl_faculty WHERE tbl_faculty.FACULTY_ACCEPTED='R';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_DOCUMENTS` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20))  NO SQL
BEGIN
	SELECT * FROM tbl_documents WHERE tbl_documents.DOCUMENT_DEPARTMENT=dept AND tbl_documents.DOCUMENT_DEGREE=degree;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_EVENT` (IN `id` INT)  NO SQL
BEGIN
DECLARE batch_id int;

SELECT tbl_student.STUDENT_BATCH_ID INTO @batch_id FROM tbl_student WHERE tbl_student.STUDENT_ID=id;


SELECT * FROM tbl_event WHERE tbl_event.EVENT_BATCH_ID=@batch_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_EVENT_DETAILS` (IN `eid` INT)  NO SQL
BEGIN
	SELECT * FROM tbl_event WHERE tbl_event.EVENT_ID=eid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_FACULTY` ()  NO SQL
BEGIN
SELECT * FROM tbl_faculty WHERE tbl_faculty.FACULTY_ROLE='FC' AND tbl_faculty.FACULTY_ACCEPTED='A';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_FUTURE_CANCELED_EVENT` ()  NO SQL
BEGIN
SELECT tbl_event.*,tbl_batch.BATCH_DEPARTMENT,tbl_batch.BATCH_DEGREE,tbl_batch.BATCH_PASSING_YEAR FROM tbl_event INNER JOIN tbl_batch WHERE tbl_batch.BATCH_ID=tbl_event.EVENT_BATCH_ID AND tbl_event.EVENT_CANCLED=1 AND tbl_event.EVENT_DATE>now() ORDER BY tbl_event.EVENT_DATE DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_FUTURE_EVENT` ()  NO SQL
BEGIN
SELECT tbl_event.*, tbl_batch.BATCH_DEPARTMENT, tbl_batch.BATCH_DEGREE, tbl_batch.BATCH_PASSING_YEAR FROM tbl_event INNER JOIN tbl_batch WHERE tbl_event.EVENT_DATE>now() AND tbl_batch.BATCH_ID=tbl_event.EVENT_BATCH_ID AND tbl_event.EVENT_CANCLED=0 ORDER BY tbl_event.EVENT_DATE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_NOTIFICATION` (IN `rid` INT, IN `type` INT)  NO SQL
BEGIN

SELECT * FROM tbl_notification WHERE tbl_notification.NOTIFICATION_RECEIVER_ID=rid AND tbl_notification.NOTIFICATION_TYPE=type;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_PAST_CANCELED_EVENT` ()  NO SQL
BEGIN
SELECT tbl_event.*,tbl_batch.BATCH_DEPARTMENT,tbl_batch.BATCH_DEGREE,tbl_batch.BATCH_PASSING_YEAR FROM tbl_event INNER JOIN tbl_batch WHERE tbl_batch.BATCH_ID=tbl_event.EVENT_BATCH_ID AND tbl_event.EVENT_CANCLED=1 AND tbl_event.EVENT_DATE<=now() ORDER BY tbl_event.EVENT_DATE DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_PAST_EVENT` ()  NO SQL
BEGIN
SELECT tbl_event.*,tbl_batch.BATCH_DEPARTMENT,tbl_batch.BATCH_DEGREE,tbl_batch.BATCH_PASSING_YEAR FROM tbl_event INNER JOIN tbl_batch WHERE tbl_event.EVENT_DATE<=now() AND tbl_batch.BATCH_ID=tbl_event.EVENT_BATCH_ID AND tbl_event.EVENT_CANCLED=0 ORDER BY tbl_event.EVENT_DATE DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_RECOMMENDATIONS` (IN `cid` INT)  NO SQL
BEGIN
	SELECT tbl_student.*, tbl_recommendation.* FROM tbl_recommendation, tbl_student WHERE tbl_recommendation.RECOMMENDATION_COMPANY_ID=cid AND tbl_recommendation.RECOMMENDATION_STUDENT_ID=tbl_student.STUDENT_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_SELECTION_LIST` (IN `cid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_selection_list WHERE tbl_selection_list.SELECTION_LIST_COMPANY_ID=cid AND tbl_selection_list.SELECTION_LIST_TYPE='SH'; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_SHORTLIST` (IN `selectid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_shortlist WHERE tbl_shortlist.SHORTLIST_SELECTION_LIST_ID=selectid AND tbl_shortlist.SHORTLIST_TYPE="SH";

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_TEST_MARKS` (IN `tid` INT)  NO SQL
BEGIN
	SELECT tbl_student.STUDENT_FIRST_NAME, tbl_student.STUDENT_LAST_NAME, tbl_student.STUDENT_ENROLLMENT_NUMBER, tbl_marks.MARKS_OBTAINED, tbl_test.TEST_TOTAL_MARKS, tbl_test.TEST_PASSING_MARKS, tbl_test.TEST_NAME FROM tbl_student, tbl_marks, tbl_test WHERE tbl_student.STUDENT_ID=tbl_marks.MARKS_STUDENT_ID AND tbl_marks.MARKS_TEST_ID=tid AND tbl_test.TEST_ID=tid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_10th_details`
--

CREATE TABLE `tbl_academic_10th_details` (
  `ACADEMIC_10TH_ID` int(11) NOT NULL,
  `ACADEMIC_10TH_STUDENT_ID` int(11) NOT NULL,
  `ACADEMIC_10TH_BOARD` varchar(255) NOT NULL,
  `ACADEMIC_10TH_SCHOOL` varchar(255) NOT NULL,
  `ACADEMIC_10TH_PERCENTAGE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_academic_10th_details`
--

INSERT INTO `tbl_academic_10th_details` (`ACADEMIC_10TH_ID`, `ACADEMIC_10TH_STUDENT_ID`, `ACADEMIC_10TH_BOARD`, `ACADEMIC_10TH_SCHOOL`, `ACADEMIC_10TH_PERCENTAGE`) VALUES
(1, 1, 'bb', 'bb', 95.64),
(2, 3, 'aa', 'aa', 10),
(3, 4, 'a', 'a', 90),
(5, 49, 'Gujarat State Board', 'JEEVANBHARTI SCHOOL', 55);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_12th_details`
--

CREATE TABLE `tbl_academic_12th_details` (
  `ACADEMIC_12TH_ID` int(11) NOT NULL,
  `ACADEMIC_12TH_STUDENT_ID` int(11) NOT NULL,
  `ACADEMIC_12TH_BOARD` varchar(255) NOT NULL,
  `ACADEMIC_12TH_SCHOOL` varchar(255) NOT NULL,
  `ACADEMIC_12TH_STREAM` varchar(20) NOT NULL,
  `ACADEMIC_12TH_PERCENTAGE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_academic_12th_details`
--

INSERT INTO `tbl_academic_12th_details` (`ACADEMIC_12TH_ID`, `ACADEMIC_12TH_STUDENT_ID`, `ACADEMIC_12TH_BOARD`, `ACADEMIC_12TH_SCHOOL`, `ACADEMIC_12TH_STREAM`, `ACADEMIC_12TH_PERCENTAGE`) VALUES
(1, 1, 'bb', 'bb', '', 94.65),
(2, 3, 'aa', 'aa', 'com', 10),
(3, 4, 'aa', 'aa', 'aa', 90),
(5, 49, 'Delhi State Board', 'HHHH', 'COMMERCE', 67);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_bachelor_details`
--

CREATE TABLE `tbl_academic_bachelor_details` (
  `ACADEMIC_BACHELOR_ID` int(11) NOT NULL,
  `ACADEMIC_BACHELOR_STUDENT_ID` int(11) NOT NULL,
  `ACADEMIC_BACHELOR_UNIVERSITY` varchar(255) DEFAULT NULL,
  `ACADEMIC_BACHELOR_INSTITUTE` varchar(255) DEFAULT NULL,
  `ACADEMIC_BACHELOR_SPECIALIZATION` varchar(255) DEFAULT NULL,
  `ACADEMIC_BACHELOR_DEGREE` varchar(255) DEFAULT NULL,
  `ACADEMIC_BACHELOR_SEM_1` float DEFAULT NULL,
  `ACADEMIC_BACHELOR_SEM_2` float DEFAULT NULL,
  `ACADEMIC_BACHELOR_SEM_3` float NOT NULL,
  `ACADEMIC_BACHELOR_SEM_4` float NOT NULL,
  `ACADEMIC_BACHELOR_SEM_5` float NOT NULL,
  `ACADEMIC_BACHELOR_SEM_6` float NOT NULL,
  `ACADEMIC_BACHELOR_SEM_7` float DEFAULT NULL,
  `ACADEMIC_BACHELOR_SEM_8` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_academic_bachelor_details`
--

INSERT INTO `tbl_academic_bachelor_details` (`ACADEMIC_BACHELOR_ID`, `ACADEMIC_BACHELOR_STUDENT_ID`, `ACADEMIC_BACHELOR_UNIVERSITY`, `ACADEMIC_BACHELOR_INSTITUTE`, `ACADEMIC_BACHELOR_SPECIALIZATION`, `ACADEMIC_BACHELOR_DEGREE`, `ACADEMIC_BACHELOR_SEM_1`, `ACADEMIC_BACHELOR_SEM_2`, `ACADEMIC_BACHELOR_SEM_3`, `ACADEMIC_BACHELOR_SEM_4`, `ACADEMIC_BACHELOR_SEM_5`, `ACADEMIC_BACHELOR_SEM_6`, `ACADEMIC_BACHELOR_SEM_7`, `ACADEMIC_BACHELOR_SEM_8`) VALUES
(1, 1, 'VNSGU', 'BMIIT', 'Information Technology', 'M.Sc(IT)', 55, 55, 80, 60, 55, 55, 55, 55),
(3, 55, 'a', 'a', 'a', 'a', NULL, NULL, 5, 5, 5, 5, 5, 5),
(4, 888, 'j', 'j', 'j', 'j', NULL, NULL, 5, 5, 5, 5, 5, 5),
(12, 88, NULL, NULL, NULL, NULL, 8.5, 8.5, 8.7, 8.6, 8.6, 8.2, NULL, NULL),
(14, 49, 'UKA Tarsadia University', 'BMIIT', 'INFORMATION TECHNOLOGY', 'B.Sc(IT)', 6, 6, 6, 6, 6, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_details`
--

CREATE TABLE `tbl_academic_details` (
  `ACADEMIC_DETAILS_ID` int(11) NOT NULL,
  `ACADEMIC_DETAILS_STUDENT_ID` int(11) NOT NULL,
  `ACADEMIC_DETAILS_10TH_ID` int(11) NOT NULL,
  `ACADEMIC_DETAILS_12TH_ID` int(11) DEFAULT NULL,
  `ACADEMIC_DETAILS_DIPLOMA_ID` int(11) DEFAULT NULL,
  `ACADEMIC_DETAILS_BACHELOR_ID` int(11) NOT NULL,
  `ACADEMIC_DETAILS_MASTER_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_academic_details`
--

INSERT INTO `tbl_academic_details` (`ACADEMIC_DETAILS_ID`, `ACADEMIC_DETAILS_STUDENT_ID`, `ACADEMIC_DETAILS_10TH_ID`, `ACADEMIC_DETAILS_12TH_ID`, `ACADEMIC_DETAILS_DIPLOMA_ID`, `ACADEMIC_DETAILS_BACHELOR_ID`, `ACADEMIC_DETAILS_MASTER_ID`) VALUES
(1, 47, 3, 3, NULL, 3, NULL),
(3, 3, 3, 3, NULL, 3, NULL),
(4, 4, 3, 3, NULL, 3, NULL),
(6, 49, 5, 5, NULL, 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_diploma_details`
--

CREATE TABLE `tbl_academic_diploma_details` (
  `ACADEMIC_DIPLOMA_ID` int(11) NOT NULL,
  `ACADEMIC_DIPLOMA_STUDENT_ID` int(11) NOT NULL,
  `ACADEMIC_DIPLOMA_UNIVERSITY` varchar(255) NOT NULL,
  `ACADEMIC_DIPLOMA_INSTITUTE` varchar(255) NOT NULL,
  `ACADEMIC_DIPLOMA_SPECIALIZATION` varchar(255) NOT NULL,
  `ACADEMIC_DIPLOMA_SEM_1` float NOT NULL,
  `ACADEMIC_DIPLOMA_SEM_2` float NOT NULL,
  `ACADEMIC_DIPLOMA_SEM_3` float NOT NULL,
  `ACADEMIC_DIPLOMA_SEM_4` float NOT NULL,
  `ACADEMIC_DIPLOMA_SEM_5` float NOT NULL,
  `ACADEMIC_DIPLOMA_SEM_6` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_academic_diploma_details`
--

INSERT INTO `tbl_academic_diploma_details` (`ACADEMIC_DIPLOMA_ID`, `ACADEMIC_DIPLOMA_STUDENT_ID`, `ACADEMIC_DIPLOMA_UNIVERSITY`, `ACADEMIC_DIPLOMA_INSTITUTE`, `ACADEMIC_DIPLOMA_SPECIALIZATION`, `ACADEMIC_DIPLOMA_SEM_1`, `ACADEMIC_DIPLOMA_SEM_2`, `ACADEMIC_DIPLOMA_SEM_3`, `ACADEMIC_DIPLOMA_SEM_4`, `ACADEMIC_DIPLOMA_SEM_5`, `ACADEMIC_DIPLOMA_SEM_6`) VALUES
(1, 1, 'aa', 'aa', 'aa', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_master_details`
--

CREATE TABLE `tbl_academic_master_details` (
  `ACADEMIC_MASTER_ID` int(11) NOT NULL,
  `ACADEMIC_MASTER_STUDENT_ID` int(11) NOT NULL,
  `ACADEMIC_MASTER_UNIVERSITY` varchar(255) DEFAULT NULL,
  `ACADEMIC_MASTER_INSTITUTE` varchar(255) DEFAULT NULL,
  `ACADEMIC_MASTER_SPECIALIZATION` varchar(255) DEFAULT NULL,
  `ACADEMIC_MASTER_SEM_1` float NOT NULL,
  `ACADEMIC_MASTER_SEM_2` float NOT NULL,
  `ACADEMIC_MASTER_SEM_3` float NOT NULL,
  `ACADEMIC_MASTER_SEM_4` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_academic_master_details`
--

INSERT INTO `tbl_academic_master_details` (`ACADEMIC_MASTER_ID`, `ACADEMIC_MASTER_STUDENT_ID`, `ACADEMIC_MASTER_UNIVERSITY`, `ACADEMIC_MASTER_INSTITUTE`, `ACADEMIC_MASTER_SPECIALIZATION`, `ACADEMIC_MASTER_SEM_1`, `ACADEMIC_MASTER_SEM_2`, `ACADEMIC_MASTER_SEM_3`, `ACADEMIC_MASTER_SEM_4`) VALUES
(1, 1, '2', '3', '4', 5, 6, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `ATTENDANCE_ID` int(11) NOT NULL,
  `ATTENDANCE_EVENT_ID` int(11) NOT NULL,
  `ATTENDANCE_STUDENT_ID` int(11) NOT NULL,
  `ATTENDANCE_FACULTY_ID` int(11) NOT NULL,
  `ATTENDANCE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`ATTENDANCE_ID`, `ATTENDANCE_EVENT_ID`, `ATTENDANCE_STUDENT_ID`, `ATTENDANCE_FACULTY_ID`, `ATTENDANCE`) VALUES
(1, 2, 16, 5, 1),
(2, 2, 13, 5, 1),
(3, 2, 28, 5, 1),
(4, 2, 49, 5, 1),
(5, 2, 7, 5, 0),
(6, 2, 8, 5, 0),
(7, 2, 9, 5, 0),
(8, 2, 11, 5, 1),
(9, 2, 12, 5, 0),
(10, 2, 14, 5, 0),
(11, 2, 48, 5, 0),
(12, 1, 7, 5, 1),
(13, 1, 8, 5, 0),
(14, 1, 9, 5, 1),
(15, 1, 11, 5, 1),
(16, 1, 12, 5, 1),
(17, 1, 13, 5, 1),
(18, 1, 14, 5, 0),
(19, 1, 16, 5, 1),
(20, 1, 28, 5, 1),
(21, 3, 7, 5, 1),
(22, 3, 8, 5, 1),
(23, 3, 9, 5, 0),
(24, 3, 11, 5, 0),
(25, 3, 12, 5, 0),
(26, 3, 13, 5, 0),
(27, 3, 14, 5, 0),
(28, 3, 16, 5, 0),
(29, 3, 28, 5, 0),
(30, 3, 49, 5, 0),
(31, 11, 7, 5, 1),
(32, 11, 13, 5, 1),
(33, 11, 14, 5, 1),
(34, 11, 11, 5, 1),
(35, 11, 8, 5, 0),
(36, 11, 9, 5, 1),
(37, 11, 12, 5, 1),
(38, 11, 16, 5, 0),
(39, 11, 28, 5, 0),
(40, 11, 49, 5, 0),
(41, 1, 49, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE `tbl_batch` (
  `BATCH_ID` int(11) NOT NULL,
  `BATCH_DEPARTMENT` varchar(20) NOT NULL,
  `BATCH_DEGREE` varchar(50) NOT NULL,
  `BATCH_PASSING_YEAR` char(4) NOT NULL,
  `BATCH_SEMESTER` int(11) NOT NULL,
  `BATCH_D2D` tinyint(1) NOT NULL,
  `BATCH_TYPE` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`BATCH_ID`, `BATCH_DEPARTMENT`, `BATCH_DEGREE`, `BATCH_PASSING_YEAR`, `BATCH_SEMESTER`, `BATCH_D2D`, `BATCH_TYPE`) VALUES
(1, 'BMIIT', 'MSC(IT)', '2017', 4, 0, 'MA'),
(2, 'BMIIT', 'BSC(IT)', '2017', 6, 0, 'BA'),
(3, 'BMIIT', 'IMSC(IT)', '2017', 10, 0, 'IBM'),
(4, 'CGPIT', 'BTECH(IT)', '2017', 8, 1, 'BA'),
(5, 'CGPIT', 'MTECH(IT)', '2017', 4, 1, 'MA'),
(6, 'SRIMCA', 'BCA', '2017', 6, 0, 'BA'),
(7, 'SRIMCA', 'IMCA', '2017', 10, 0, 'IBM'),
(8, 'BMIIT', 'BSC(IT)', '2016', 6, 0, 'BA'),
(10, 'BMIIT', 'MSC(IT)', '2020', 4, 0, 'MA'),
(11, 'BMIIT', 'BSC(IT)', '2020', 10, 0, 'BA'),
(12, 'BMIIT', 'IMSC(IT)', '2020', 0, 0, 'IBM'),
(13, 'BMIIT', 'MSC(IT)', '2021', 0, 0, 'MA'),
(14, 'BMIIT', 'BSC(IT)', '2021', 0, 0, 'BA'),
(15, 'BMIIT', 'IMSC(IT)', '2021', 0, 0, 'IBM'),
(16, 'BMIIT', 'MSC(IT)', '2022', 0, 0, 'MA'),
(17, 'BMIIT', 'BSC(IT)', '2022', 0, 0, 'BA'),
(18, 'BMIIT', 'IMSC(IT)', '2022', 0, 0, 'IBM'),
(19, 'BMIIT', 'MSC(IT)', '2023', 0, 0, 'MA'),
(20, 'BMIIT', 'BSC(IT)', '2023', 0, 0, 'BA'),
(21, 'BMIIT', 'IMSC(IT)', '2023', 0, 0, 'IBM'),
(22, 'BMIIT', 'MSC(IT)', '2024', 0, 0, 'MA'),
(23, 'BMIIT', 'BSC(IT)', '2024', 0, 0, 'BA'),
(24, 'BMIIT', 'IMSC(IT)', '2024', 0, 0, 'IBM'),
(25, 'BMIIT', 'MSC(IT)', '2025', 0, 0, 'MA'),
(26, 'BMIIT', 'BSC(IT)', '2025', 6, 0, 'BA'),
(27, 'BMIIT', 'IMSC(IT)', '2025', 0, 0, 'IBM'),
(28, 'CGPIT', 'BTECH(IT)', '2020', 0, 1, 'BA'),
(29, 'CGPIT', 'MTECH(IT)', '2020', 0, 1, 'MA'),
(30, 'CGPIT', 'BTECH(IT)', '2021', 0, 1, 'BA'),
(31, 'CGPIT', 'MTECH(IT)', '2021', 0, 1, 'MA'),
(32, 'CGPIT', 'BTECH(IT)', '2022', 0, 1, 'BA'),
(33, 'CGPIT', 'MTECH(IT)', '2022', 0, 1, 'MA'),
(34, 'CGPIT', 'BTECH(IT)', '2023', 0, 1, 'BA'),
(35, 'CGPIT', 'MTECH(IT)', '2023', 0, 1, 'MA'),
(36, 'CGPIT', 'BTECH(IT)', '2024', 0, 1, 'BA'),
(37, 'CGPIT', 'MTECH(IT)', '2024', 0, 1, 'MA'),
(38, 'CGPIT', 'BTECH(IT)', '2025', 0, 1, 'BA'),
(39, 'CGPIT', 'MTECH(IT)', '2025', 0, 1, 'MA'),
(40, 'SRIMCA', 'MCA', '2020', 0, 0, 'MA'),
(41, 'SRIMCA', 'BCA', '2020', 0, 0, 'BA'),
(42, 'SRIMCA', 'IMCA', '2020', 0, 0, 'IBM'),
(43, 'SRIMCA', 'MCA', '2021', 0, 0, 'MA'),
(44, 'SRIMCA', 'BCA', '2021', 0, 0, 'BA'),
(45, 'SRIMCA', 'IMCA', '2021', 10, 0, 'IBM'),
(46, 'SRIMCA', 'MCA', '2022', 0, 0, 'MA'),
(47, 'SRIMCA', 'BCA', '2022', 0, 0, 'BA'),
(48, 'SRIMCA', 'IMCA', '2022', 0, 0, 'IBM'),
(49, 'SRIMCA', 'MCA', '2023', 0, 0, 'MA'),
(50, 'SRIMCA', 'BCA', '2023', 0, 0, 'BA'),
(51, 'SRIMCA', 'IMCA', '2023', 0, 0, 'IBM'),
(52, 'SRIMCA', 'MCA', '2024', 0, 0, 'MA'),
(53, 'SRIMCA', 'BCA', '2024', 0, 0, 'BA'),
(54, 'SRIMCA', 'IMCA', '2024', 0, 0, 'IBM'),
(55, 'SRIMCA', 'MCA', '2025', 0, 0, 'MA'),
(56, 'SRIMCA', 'BCA', '2025', 0, 0, 'BA'),
(57, 'SRIMCA', 'IMCA', '2025', 0, 0, 'IBM'),
(59, 'BMIIT', 'BSC(IT)', '2030', 6, 0, 'BA'),
(60, 'CGPIT', 'BTECH(IT)', '2027', 8, 1, 'BA'),
(61, 'CGPIT', 'MTECH(IT)', '2028', 4, 1, 'MA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_broadcast_list`
--

CREATE TABLE `tbl_broadcast_list` (
  `BROADCAST_LIST_ID` int(11) NOT NULL,
  `BROADCAST_LIST_NAME` varchar(255) NOT NULL,
  `BROADCAST_LIST_CREATED_BY` int(11) NOT NULL,
  `BROADCAST_LIST_DATE` date NOT NULL,
  `BROADCAST_LIST_STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_broadcast_list`
--

INSERT INTO `tbl_broadcast_list` (`BROADCAST_LIST_ID`, `BROADCAST_LIST_NAME`, `BROADCAST_LIST_CREATED_BY`, `BROADCAST_LIST_DATE`, `BROADCAST_LIST_STATUS`) VALUES
(0, 'Placement Schedule List', 0, '0000-00-00', 0),
(1, 'Vikrant\'s', 5, '2020-04-30', 1),
(2, 'Temprory', 5, '2020-04-30', 1),
(3, 'AAA', 5, '2020-04-30', 1),
(4, 'AAA', 5, '2020-04-30', 1),
(5, 'Try', 5, '2020-05-01', 1),
(8, 'This is for testing', 5, '2020-05-28', 0),
(9, 'Video Broadcastlist', 5, '2020-06-13', 0),
(10, 'Sample Broadcast List', 5, '2020-06-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_broadcast_list_members`
--

CREATE TABLE `tbl_broadcast_list_members` (
  `BROADCAST_LIST_MEMBER_ID` int(11) NOT NULL,
  `BROADCAST_LIST_MEMBER_BROADCAST_ID` int(11) NOT NULL,
  `BROADCAST_LIST_MEMBER_COMPANY_ID` int(11) NOT NULL,
  `BROADCAST_LIST_MEMBER_STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_broadcast_list_members`
--

INSERT INTO `tbl_broadcast_list_members` (`BROADCAST_LIST_MEMBER_ID`, `BROADCAST_LIST_MEMBER_BROADCAST_ID`, `BROADCAST_LIST_MEMBER_COMPANY_ID`, `BROADCAST_LIST_MEMBER_STATUS`) VALUES
(1, 1, 26, 1),
(2, 1, 23, 0),
(3, 1, 10, 0),
(4, 0, 10, 0),
(5, 0, 23, 0),
(6, 0, 26, 1),
(7, 0, 27, 0),
(8, 0, 29, 1),
(9, 0, 30, 0),
(10, 0, 31, 1),
(11, 9, 23, 0),
(12, 9, 28, 0),
(13, 9, 29, 0),
(14, 9, 30, 0),
(15, 9, 31, 0),
(16, 0, 28, 0),
(17, 10, 23, 0),
(18, 10, 28, 0),
(19, 10, 30, 0),
(20, 10, 29, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `COMPANY_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(30) NOT NULL,
  `COMPANY_REGISTERED_YEAR` char(4) NOT NULL,
  `COMPANY_ADDRESS` varchar(255) NOT NULL,
  `COMPANY_EMAIL` varchar(255) NOT NULL,
  `COMPANY_PHONE_NUMBER_1` varchar(10) NOT NULL,
  `COMPANY_PHONE_NUMBER_2` varchar(10) NOT NULL,
  `COMPANY_WEBSITE` varchar(100) NOT NULL,
  `COMPANY_ACCEPTED` char(1) NOT NULL,
  `COMPANY_PASSWORD` varchar(40) NOT NULL,
  `COMPANY_LOGO` varchar(50) NOT NULL,
  `COMPANY_ABOUT` varchar(255) NOT NULL,
  `COMPANY_TECHNOLOGIES` varchar(255) NOT NULL,
  `COMPANY_NO_OF_EMPLOYEES` int(11) NOT NULL,
  `COMPANY_MAXIMUM_PACKAGE` bigint(20) NOT NULL,
  `COMPANY_MINIMUM_PACKAGE` bigint(20) NOT NULL,
  `COMPANY_HR_NAME` varchar(50) NOT NULL,
  `COMPANY_HR_EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`COMPANY_ID`, `COMPANY_NAME`, `COMPANY_REGISTERED_YEAR`, `COMPANY_ADDRESS`, `COMPANY_EMAIL`, `COMPANY_PHONE_NUMBER_1`, `COMPANY_PHONE_NUMBER_2`, `COMPANY_WEBSITE`, `COMPANY_ACCEPTED`, `COMPANY_PASSWORD`, `COMPANY_LOGO`, `COMPANY_ABOUT`, `COMPANY_TECHNOLOGIES`, `COMPANY_NO_OF_EMPLOYEES`, `COMPANY_MAXIMUM_PACKAGE`, `COMPANY_MINIMUM_PACKAGE`, `COMPANY_HR_NAME`, `COMPANY_HR_EMAIL`) VALUES
(1, 'LA NET', '1999', 'SURAT', 'lanet@gmail.com', '5544663322', '4455663322', 'akbfdhjabfhb', '1', '123456', '', '', '', 0, 0, 0, '', ''),
(2, 'ssm', '1995', 'surat', 'ssm', '1236547890', '1236547890', 'ssm', '0', 'ssm', '', '', '', 0, 0, 0, '', ''),
(3, 'g', 'g', 'g', 'g', 'g', 'g', 'g', '0', 'de83473b9dd6e0a394e024b72af2ebd9420add05', '', '', '', 0, 0, 0, '', ''),
(4, 'Tech Code', '1999', 'Surat', 'Tech@gmail.com', '2255663311', '2255663311', 'lsjkfdsd', '0', '87541a580eda8bf760776b844c7bb1db57aa0ed7', 'tech', 'gg', 'java,python', 50, 200000, 100000, 'manav ', 'm@gmail.com'),
(5, 'ssm', '2019', 'surat', 'ssm@gmail.com', '7896541230', '7896541230', 'ansfn', '0', '9574ef5c32ab0006766942fb1efddf7ad4451931', 'hhh', 'akjsdn', 'java,php', 50, 1000000, 200000, 'rahul', 'rahul@gmail.com'),
(6, 'technolab', '1995', 'surat', 'technolab@gmail.com', '7896321450', '7896321450', 'addsd', '0', 'cc27222d19a7d26919d8097ebf86441b9a0960a8', 'adfasdd', 'ads', 'ads', 55, 5, 5, 'asd', 'ad'),
(7, 'tech', '2019', 'surat', 'ssm@gmail.com', '123', '123', 'ajwdjb', '0', 'abc', 'isbdfubd', 'skjdbf', 'java,php', 50, 200000, 100000, 'raj', 'sdfbsfb'),
(8, 'abc', '1234', 'abc', 'abc@pqr.xyz', '123456789', '987654321', 'www.abc.xyz', '0', '3f98da675e0d63bd728813fc59cc48c0964597a5', 'dhcbmab', 'ahdcbjh', 'sdjck', 123, 123, 123, 'adcasc', 'djchbajhdcb'),
(9, 'yashtech', '5555', 'surat', 'tect@gmail.com', '5566332211', '5566332211', 'sldknfq', 'P', 'e8c191ba34b9a0da5dab5faa6eb9b5bf545d11c8', 'laksndalksn', 'lskdn', 'slkdn', 50, 20, 200, 'skjdf', 'skjdb'),
(10, 'THis', '5632', 'hbfahb', 'm@gmail.com', '6546', '65464', 'akbwdbbjk', 'R', '7936ea038b7111d89907c0b141d3cf5ed060f375', 'sn df', 'skdf', 'sk d ', 50, 50, 100, 'akjwdn', 'kjdn'),
(21, 'Code Part', '1994', 'Pipload Surat, Gujarat, India', '17bmiit032@gmail.com', '1478523690', '1203654789', 'www.codepart.com', 'P', 'e0da99a335c60e640bc3701b8fdf615339eb738f', 'Screenshot (1).png', 'This For Testing Company', 'CShrap#nodejs#ruby#django#Android#CakePHP', 20, 2000000, 100000, 'Raju Bhagat', 'Raju@gmail.com'),
(23, 'TECH CODER', '2020', 'Surat Sydney NSW, Australia                                                                                                                                                                                                                                    ', 'manavshah712@gmail.com', '789654120', '7788996655', 'f', 'A', '2a1b88ddbca90f7861c0d5617b710cb015591b3b', 'marvel-cake.jpg', 'This is testing                                                                                                                                                                                                                                                ', 'CShrap#C+#nodejs#angjs', 50, 5000, 12000, 'g', 'gam@gmail.com'),
(24, 'viK', '1234', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'P', 'e4a93405885b9283204444c024491eb8a2b6cee4', 'ABC', 'ABC', 'ABC', 123, 123, 123, 'ABC', 'ABC'),
(25, 'a', '55', 'abc', 'A@GMAIL.COM', '123', '122', 'A', 'R', 'd3addbf2ec82655e2382e0a6e3ae92a2671cfd5c', 'J', 'J', 'J', 5, 5, 5, '5', '5'),
(26, 'Tech Code', '2015', '', '', '', '', '', 'A', '7163f8542c500e30c6f5229a0804650613ada933', '', '', '', 0, 0, 0, '', ''),
(27, 't', '2', 'surat', 'e@gmail.com', '123', '123', 'ww', 'A', '2bb7e58bfaeb9cfd410c276448fc31de4533ffd9', 'h', 'h', 'h', 50, 20, 20, 'h', 'g'),
(28, 'Vikrant Company', '2010', 'Surat Surabaya, Surabaya City, East Java, Indonesia', 'manavshah712@gmail.com', '1236547000', '1236547000', 'www.vik.com', 'A', 'd5e99c4d5816b00a714f5197460dee5dabc3cc26', 'IMG_20181111_103257400_HDR.jpg', 'This is for testing', 'CShrap#C+#nodejs', 50, 40, 20, 'First Compnay', 'First@gmail.com'),
(29, 'Vikrant Code', '2001', 'Surat Surat', 'vikrantch123@gmail.com', '1111111111', '2222222222', 'Vikrant.com', 'A', 'a0d3314d112098ffbed84c07696620e042e3fb7d', 'Screenshot (4).png', 'This', 'ruby#django#IOS', 2, 4000, 3000, 'Vikrant Shah', 'vikrant@gmail.com'),
(30, 'VIk', '2000', 'Athwalines,Surat Surat', '17bmiit032@gmail.com', '7788445500', '7458960000', 'www.VIK.com', 'A', 'ead78907c68a1df93ce3b6e70b118be1aaaec89e', 'cake.jpeg', 'This is for testing', 'CShrap#Java#Python#nodejs#ruby', 500, 500000, 200000, 'Manav Shah', 'manavshah@gmail.com'),
(31, 'SSM INFO TECH', '2000', 'Surat', 'ssm@gmail.com', '1236547890', '5263141478', 'www.ssm.com', 'A', 'd8690c9461cf679a254030aa1b29d618051f0b97', 'this', 'This', 'C#', 50, 50000, 5000, 'Ricky', 'Ricky@gmail.com');

--
-- Triggers `tbl_company`
--
DELIMITER $$
CREATE TRIGGER `TR_COMPANY_REGISTRATION` AFTER INSERT ON `tbl_company` FOR EACH ROW BEGIN
DECLARE A VARCHAR(16);
DECLARE B VARCHAR(40);
SET @B := NEW.COMPANY_PASSWORD;

CALL `RANDOM_STRING_16`(@A);
CALL `PASSWORD_GEN`(@B, @A);

INSERT INTO tbl_login VALUES(NULL,NEW.COMPANY_ID,'CP',NEW.COMPANY_EMAIL,NEW.COMPANY_PHONE_NUMBER_1,@B,@A);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_document`
--

CREATE TABLE `tbl_company_document` (
  `COMPANY_DOCUMENT_ID` int(11) NOT NULL,
  `COMPANY_DOCUMENT_STUDENT_ID` int(11) NOT NULL,
  `COMPANY_DOCUMENT_COMPANY_ID` int(11) NOT NULL,
  `COMPANY_DOCUMENT_TYPE` varchar(50) NOT NULL,
  `COMPANY_DOCUMENT_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company_document`
--

INSERT INTO `tbl_company_document` (`COMPANY_DOCUMENT_ID`, `COMPANY_DOCUMENT_STUDENT_ID`, `COMPANY_DOCUMENT_COMPANY_ID`, `COMPANY_DOCUMENT_TYPE`, `COMPANY_DOCUMENT_NAME`) VALUES
(1, 9, 23, 'OL', '318344 New Doc 04-10-2020 11.29.48.pdf'),
(2, 9, 23, 'BD', '318344 CamScanner 04-24-2020 19.15.49.pdf'),
(3, 7, 23, 'OL', '681568 p1.1.pdf'),
(4, 7, 23, 'BD', '681568 p1.2.pdf'),
(5, 8, 23, 'OL', '644194 temp.pdf'),
(6, 8, 23, 'BD', '644194 temp.pdf'),
(7, 49, 23, 'OL', '820767 temp.pdf'),
(8, 49, 23, 'BD', '820767 temp.pdf'),
(9, 12, 23, 'OL', '759566 p1.2.pdf'),
(10, 12, 23, 'BD', '759566 p1.1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `DOCUMENT_ID` int(11) NOT NULL,
  `DOCUMENT_UPLOADER_ID` int(11) NOT NULL,
  `DOCUMENT_UPLOADER_TYPE` char(2) NOT NULL,
  `DOCUMENT_TYPE` char(2) NOT NULL,
  `DOCUMENT_DEPARTMENT` varchar(10) NOT NULL,
  `DOCUMENT_DEGREE` varchar(20) NOT NULL,
  `DOCUMENT_TITLE` varchar(255) NOT NULL,
  `DOCUMENT_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_documents`
--

INSERT INTO `tbl_documents` (`DOCUMENT_ID`, `DOCUMENT_UPLOADER_ID`, `DOCUMENT_UPLOADER_TYPE`, `DOCUMENT_TYPE`, `DOCUMENT_DEPARTMENT`, `DOCUMENT_DEGREE`, `DOCUMENT_TITLE`, `DOCUMENT_NAME`) VALUES
(1, 5, 'CH', 'RL', 'BMIIT', 'BSC(IT)', 'PHP Reffrence', '648437 SPM UNIT 1.pdf'),
(2, 5, 'CH', 'RL', 'BMIIT', 'BSC(IT)', 'Java Reffrence', '797111 SPM UNIT 2.pdf'),
(7, 5, 'CH', 'PL', 'BMIIT', 'BSC(IT)', 'Node Js For Placement', '159340 797111 SPM UNIT 2.pdf'),
(8, 5, 'CH', 'PL', 'BMIIT', 'BSC(IT)', 'Node Js For Placement', '559834 648437 SPM UNIT 1 (1).pdf'),
(9, 5, 'CH', 'PL', 'BMIIT', 'BSC(IT)', 'Node Js For Placement', '469838 648437 SPM UNIT 1.pdf'),
(10, 5, 'CH', 'PL', 'BMIIT', 'BSC(IT)', 'Node Js For Placement', '859112 820767 temp (4).pdf'),
(11, 5, 'CH', 'PL', 'BMIIT', 'BSC(IT)', 'Node Js For Placement', '972074 820767 temp (3).pdf'),
(12, 5, 'CH', 'RL', 'BMIIT', 'BSC(IT)', 'Video Material', '156019 p1.1.pdf'),
(13, 5, 'CH', 'RL', 'BMIIT', 'BSC(IT)', 'Video Material', '802347 p1.2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `EVENT_ID` int(11) NOT NULL,
  `EVENT_COMPANY_ID` int(11) NOT NULL,
  `EVENT_GENRATED_BY` int(11) NOT NULL,
  `EVENT_NAME` varchar(50) NOT NULL,
  `EVENT_DESCRIPTION` varchar(255) NOT NULL,
  `EVENT_VENUE` varchar(255) NOT NULL,
  `EVENT_DATE` date NOT NULL,
  `EVENT_BATCH_ID` char(4) NOT NULL,
  `EVENT_TIME` time NOT NULL,
  `EVENT_TYPE` char(2) NOT NULL,
  `EVENT_CATEGORY` tinyint(1) NOT NULL,
  `EVENT_CANCLED` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`EVENT_ID`, `EVENT_COMPANY_ID`, `EVENT_GENRATED_BY`, `EVENT_NAME`, `EVENT_DESCRIPTION`, `EVENT_VENUE`, `EVENT_DATE`, `EVENT_BATCH_ID`, `EVENT_TIME`, `EVENT_TYPE`, `EVENT_CATEGORY`, `EVENT_CANCLED`) VALUES
(1, 23, 5, 'File Display Testing', 'File Display Testing for bond and offer letter', 'Bhavik\'s House', '2020-06-01', '2', '12:12:00', 'TS', 1, 0),
(2, 23, 5, 'Navo TEst', 'description', 'Surat', '2020-06-02', '2', '12:12:00', 'TS', 1, 0),
(3, 23, 5, 'Placement Tetsing', 'For Today Placement ', 'Surat', '2020-06-08', '2', '13:01:00', 'TS', 1, 0),
(4, 23, 5, 'This is testing show company', 'For Company', 'Surat', '2020-07-06', '', '12:00:00', 'TS', 1, 0),
(5, 0, 5, 'aa', 'ss', 'dd', '2020-06-06', '2', '10:10:00', 'TS', 1, 0),
(6, 0, 5, 'aa', 'ss', 'dd', '2020-06-06', '2', '10:10:00', 'TS', 1, 0),
(7, 23, 5, 'Company Notification testing', 'For testing', 'Surat', '2020-06-06', '2', '14:02:00', 'CM', 1, 0),
(8, 23, 5, 'Company Notification testing', 'For testing', 'Surat', '2020-06-06', '2', '14:02:00', 'CM', 1, 0),
(9, 23, 5, 'Test for ss', 'This is for testing', 'Surat', '2020-06-09', '2', '17:05:00', 'TS', 1, 0),
(10, 23, 5, 'This for testing', 'testing', 'Surat', '2020-06-09', '2', '17:05:00', 'TS', 0, 0),
(11, 33, 5, 'For New Company Testing', 'For testing', 'Surat', '2020-06-09', '2', '17:05:00', 'CM', 1, 0),
(12, 23, 5, 'For Video', 'Tesiting Event for video....', 'Surat', '2020-06-30', '2', '22:10:00', 'TS', 1, 0),
(13, 23, 5, 'Sample Event Update', 'Sample Event Discription', 'Surat', '2020-07-01', '2', '22:10:00', 'TS', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event_application`
--

CREATE TABLE `tbl_event_application` (
  `EVENT_APPLICATION_ID` int(11) NOT NULL,
  `EVENT_APPLICATION_STUDENT_ID` int(11) NOT NULL,
  `EVENT_APPLICATION_EVENT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_event_application`
--

INSERT INTO `tbl_event_application` (`EVENT_APPLICATION_ID`, `EVENT_APPLICATION_STUDENT_ID`, `EVENT_APPLICATION_EVENT_ID`) VALUES
(3, 49, 1),
(4, 49, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `FACULTY_ID` int(11) NOT NULL,
  `FACULTY_FIRST_NAME` varchar(20) NOT NULL,
  `FACULTY_LAST_NAME` varchar(20) NOT NULL,
  `FACULTY_GENDER` char(1) NOT NULL,
  `FACULTY_EMAIL` varchar(255) NOT NULL,
  `FACULTY_PHONE_NUMBER` varchar(10) NOT NULL,
  `FACULTY_ABOUT` varchar(255) NOT NULL,
  `FACULTY_PROFILE_PIC` varchar(255) NOT NULL,
  `FACULTY_ACCEPTED` char(1) NOT NULL,
  `FACULTY_PASSWORD` varchar(40) NOT NULL,
  `FACULTY_ROLE` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`FACULTY_ID`, `FACULTY_FIRST_NAME`, `FACULTY_LAST_NAME`, `FACULTY_GENDER`, `FACULTY_EMAIL`, `FACULTY_PHONE_NUMBER`, `FACULTY_ABOUT`, `FACULTY_PROFILE_PIC`, `FACULTY_ACCEPTED`, `FACULTY_PASSWORD`, `FACULTY_ROLE`) VALUES
(2, 'vikrant', 'shah', 'm', 'vik', '1236547890', 'dfdsf', 'dfsdf', 'A', 'ed74e2b50f66230da8fe57f550e1184abd53b9be', 'FC'),
(3, 'a', 'b', 'c', 'd', 'w', 'q', 'q', 'A', '0061482c3ed99635abda4f2ef7bc16671464540b', 'FC'),
(4, 'cm', 'cm', 'c', 'cm', 'cm', 'cm', 'cm', 'A', '731f0124ee47edc169ba71c002bdecfe3fc92655', 'FC'),
(5, 'Vikrant', 'Shah', 'M', '17bmiit062@gmail.com', '8469082432', 'This is for testing                     	                    	                    	                    	                    	                    	                    	                    	                    	                    	                    	    ', 'Home.PNG', 'A', '85662e4a07150a53a1daeaed9163b53ee792909e', 'CH'),
(6, 'a', 'b', 'M', 'a@b.c', '9876543221', 'ksdckdhc', '', 'R', '4c3aae9a5dfd60cac9c18b3a67fa003c6fefbab5', 'CM'),
(7, 'a', 'b', 'M', 'a@b.c', '9876543000', 'kdjvbkdjvbks', 'IMG_6104.JPG', 'A', 'f0462b81e336e68cb984da9236120e8466e10400', 'CM'),
(8, 'abcd', 'ajkdbck', 'M', 'a@b.c', '6535', 'sdobsdkc', '', 'A', '4e8ba46c509a6f61fdb496c7e9f60725e290c382', 'CM'),
(10, 'bbchs', 'kajdnc', 'M', 'abc@gmail.com', '9846', 'ahdvbcjzhd', 'IMG_6116.JPG', 'A', '28057849edf57fec36bbea63e3878d0187b5e294', 'CM'),
(11, 'kunal', 'shah', 'm', 'kunal@gmail.com', '7896541230', 'kahbd', 'kabsd', 'A', 'b1c00dc8abedbf931ecf99cf761eba8a74a7a355', 'FC'),
(12, 'VK', 'SH', 'M', 'mnv@mnc.mnc', '987654321', 'jdvnkjfnvk', 'sf,vn,sfmb', 'A', '238ad94aaa6bca5e2591148f32b542e20632b14a', 'FC'),
(15, 'Manav ', 'Shah', 'M', 'manavshah712@gmail.com', '1236547890', 'This For Faculty', 'IMG_6125.JPG', 'R', '5bb341f3206c243d409f5df7e6eb53626fe3d1a7', 'FC'),
(17, 'ss', 'ss', 'm', 'm@gmail.com', '789654123', 's', 'j', 'R', 'cb9b8ab917479fb57792a9b5d2d7a81f9b1e928b', 'FC'),
(18, 'g', 'g', 'M', 'manavshah712@gmail.com', '4444444444', '\r\nt', 'IMG-20181111-WA0001.jpg', 'R', '641afe8146455cd4706d6d5bb87768fcf6c6bc44', 'FC'),
(19, 'Raj', 'Patel', 'm', 'm@gmail.com', '5555555555', 'd', '5', 'R', '11b726c19819b89175797e23463e50a3c17d4fc2', 'FC'),
(20, 'REBOOT ', 'IT', 'M', 'rebootitsolutions13@gmail.com', '7777777777', 'Tis ', 'Screenshot (14).png', 'A', 'aacbf2d0a8102b3bd7d297dd0ca48b2df5fe772f', 'FC'),
(21, 'Manav', 'Shah', 'F', 'manav@shah.com', '9999999999', 'Load pad vanu machine', 'a', 'R', 'a563e6577af456ff2201f101ad0444ccda3e7da2', 'FC'),
(22, 'Manan', 'Shah', 'M', 'manan@gmail.co', '8899665522', 'This', 'This', 'R', '224ab02ad7ad6d1247044ed5f32d6856ffd5892a', 'FC'),
(24, 'Manan', 'Shah', 'M', 'jig_manav11@yahoo.com', '9727027517', 'This is for testing                    	', 'Screenshot (34).png', 'A', '8192c83031ced431b5fcfa7cfc6eb069e4be7fcb', 'FC'),
(26, 'Ricky', 'Sharma', 'M', 'newsuraybattery01@gmail.com', '9874561230', 'Something About user', 'About.PNG', 'A', '6712d8ded95490b19dcd8785dde52b6a65737389', 'FC');

--
-- Triggers `tbl_faculty`
--
DELIMITER $$
CREATE TRIGGER `TR_FACULTY_REGISTRATION` AFTER INSERT ON `tbl_faculty` FOR EACH ROW BEGIN
DECLARE A VARCHAR(16);
DECLARE B VARCHAR(40);
SET @B := NEW.FACULTY_PASSWORD;

CALL `RANDOM_STRING_16`(@A);
CALL `PASSWORD_GEN`(@B, @A);

INSERT INTO tbl_login VALUES(NULL,NEW.FACULTY_ID,'FC',NEW.FACULTY_EMAIL,NEW.FACULTY_PHONE_NUMBER,@B,@A);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `LOGIN_ID` int(11) NOT NULL,
  `LOGIN_REFERENCE_ID` int(11) NOT NULL,
  `LOGIN_USER_TYPE` char(2) NOT NULL,
  `LOGIN_USER_EMAIL` varchar(255) NOT NULL,
  `LOGIN_USER_PHONE_NUMBER` varchar(10) NOT NULL,
  `LOGIN_USER_PASSWORD` varchar(40) NOT NULL,
  `LOGIN_USER_SALT` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`LOGIN_ID`, `LOGIN_REFERENCE_ID`, `LOGIN_USER_TYPE`, `LOGIN_USER_EMAIL`, `LOGIN_USER_PHONE_NUMBER`, `LOGIN_USER_PASSWORD`, `LOGIN_USER_SALT`) VALUES
(7, 8, 'ST', 'm', '5', 'a7c91fc816c35de52c422a97d7fcb88026696605', 'wnctprpyybgecxiw'),
(8, 2, 'CP', 'ssm', '1236547890', '4fc1317bc0e5a9aed0028630f96df0a16f262e4e', 'vultmejilgxuidry'),
(9, 2, 'CM', 'vik', '1236547890', 'ed74e2b50f66230da8fe57f550e1184abd53b9be', 'sxnvnfkmcbyqjvde'),
(10, 3, 'FC', 'd', 'w', '0061482c3ed99635abda4f2ef7bc16671464540b', 'vifyexedbtvulwzj'),
(11, 3, 'CP', 'g', 'g', 'de83473b9dd6e0a394e024b72af2ebd9420add05', 'voixrnojbdneickt'),
(12, 4, 'CM', 'cm', 'cm', '731f0124ee47edc169ba71c002bdecfe3fc92655', 'tprpyzcmeifbmklb'),
(13, 9, 'ST', 'dd', 'dd', '96548c98770faf0af386d59beb52dbea51e63c11', 'bxmscgydrabfwvlu'),
(17, 5, 'CH', '17bmiit062@gmail.com', '8469082432', '85662e4a07150a53a1daeaed9163b53ee792909e', 'kqxtcbawkhirmknl'),
(18, 6, 'FC', 'a@b.c', '9876543221', '4c3aae9a5dfd60cac9c18b3a67fa003c6fefbab5', 'hedzpbkyozfbosyq'),
(19, 7, 'CM', 'a@b.c', '9876543000', 'f0462b81e336e68cb984da9236120e8466e10400', 'tigjyuejjrhljnny'),
(20, 8, 'FC', 'a@b.c', '6535', '4e8ba46c509a6f61fdb496c7e9f60725e290c382', 'qssmeltkrfbpuenc'),
(21, 9, 'FC', 'a@b.c', '', '41dca26abab6366d2305bee1e948431988badb2f', 'ecbyqhowsxoajvzn'),
(22, 10, 'CM', 'abc@gmail.com', '9846', '28057849edf57fec36bbea63e3878d0187b5e294', 'ddhagffkktrachgj'),
(23, 13, 'ST', '201706100110032', '5566332211', 'ecc9c6848985b8a6c783911761484eb949f540c3', 'sdkrevquaqfdxfhv'),
(24, 4, 'CP', 'Tech@gmail.com', '2255663311', '87541a580eda8bf760776b844c7bb1db57aa0ed7', 'vgtbxkjortrgbnog'),
(26, 5, 'CP', 'ssm@gmail.com', '7896541230', '9574ef5c32ab0006766942fb1efddf7ad4451931', 'twfiyueknicngrtr'),
(27, 11, 'FC', 'kunal@gmail.com', '7896541230', 'b1c00dc8abedbf931ecf99cf761eba8a74a7a355', 'xtdfsypgiufmwwui'),
(28, 6, 'CP', '7896321450', '7896321450', 'cc27222d19a7d26919d8097ebf86441b9a0960a8', 'akvcwfhtbvefqmpm'),
(29, 7, 'CP', 'ssm@gmail.com', '123', '7f4aa2d83111df9add80d2da24eafa7b56e7c31a', 'ecxkfvqrlcfqrmie'),
(30, 8, 'CP', 'abc@pqr.xyz', '123456789', '3f98da675e0d63bd728813fc59cc48c0964597a5', 'uhbhjwkhhoajrjsm'),
(31, 15, 'ST', 'abc@def.abc', '8469082432', 'b076fea2e0015bdaebcf5f2bf20949770224fe24', 'ojdomsdkqbhjubvb'),
(32, 12, 'FC', 'mnv@mnc.mnc', '987654321', '238ad94aaa6bca5e2591148f32b542e20632b14a', 'gljpyywnwybjtrdn'),
(33, 9, 'CP', 'tect@gmail.com', '5566332211', 'e8c191ba34b9a0da5dab5faa6eb9b5bf545d11c8', 'qudemxfflqwnvscf'),
(35, 10, 'CP', 'm@gmail.com', '6546', '7936ea038b7111d89907c0b141d3cf5ed060f375', 'uvumapybfbmjkvct'),
(46, 16, 'ST', 'man@gmail.com', '8520', '3a8e3995c765a73de092636d8d4ad96155c31c2a', 'cqacimjlcenbtpro'),
(63, 28, 'ST', 'shah@gmail.com', 'kjhgj', '4cb2c88a6baf419d9e5a89efc463a32557922e03', 'qzzyudelshisrgdy'),
(82, 23, 'CP', 'manavshah712@gmail.com', '789654120', '2a1b88ddbca90f7861c0d5617b710cb015591b3b', 'czqhmojeqrmjlbwi'),
(84, 17, 'FC', 'm@gmail.com', '789654123', 'cb9b8ab917479fb57792a9b5d2d7a81f9b1e928b', 'jvcypainrwgpjzud'),
(86, 24, 'CP', 'ABC', 'ABC', 'e4a93405885b9283204444c024491eb8a2b6cee4', 'fcwdbsmhwqovnedf'),
(87, 25, 'CP', 'A@GMAIL.COM', '123', 'd3addbf2ec82655e2382e0a6e3ae92a2671cfd5c', 'ryubvdbtskskvaot'),
(88, 19, 'FC', 'm@gmail.com', '5555555555', '11b726c19819b89175797e23463e50a3c17d4fc2', 'xqkcfvpmngqmlusd'),
(89, 26, 'CP', '', '', '7163f8542c500e30c6f5229a0804650613ada933', 'ptzpdsiitvvrwkil'),
(90, 27, 'CP', 'e@gmail.com', '123', '2bb7e58bfaeb9cfd410c276448fc31de4533ffd9', 'kbaxozhlkrgffmvr'),
(92, 48, 'ST', 'A', 'A', '5a53bec34d6a24ce8d09ba25a2341b07544f6f8a', 'lbxlmcwedelrdnix'),
(93, 20, 'FC', 'rebootitsolutions13@gmail.com', '7777777777', 'aacbf2d0a8102b3bd7d297dd0ca48b2df5fe772f', 'eoiywklxjysvwzhj'),
(94, 29, 'CP', 'vikrantch123@gmail.com', '1111111111', 'a0d3314d112098ffbed84c07696620e042e3fb7d', 'lurbeqtutlwctmgq'),
(95, 21, 'FC', 'manav@shah.com', '9999999999', 'a563e6577af456ff2201f101ad0444ccda3e7da2', 'encuvsbcjotcbcep'),
(96, 49, 'ST', 'ricky@gmail.com', '9869859598', '9bc3b266c4ee8bafe0d8d3cb228dcd3eba6d4489', 'szvfofgqljmgvlqy'),
(97, 30, 'CP', '17bmiit032@gmail.com', '7788445500', 'ead78907c68a1df93ce3b6e70b118be1aaaec89e', 'zucxkfwsbceruapb'),
(101, 22, 'FC', 'manan@gmail.co', '8899665522', '224ab02ad7ad6d1247044ed5f32d6856ffd5892a', 'vukorrlelretiiqh'),
(102, 31, 'CP', 'ssm@gmail.com', '1236547890', 'd8690c9461cf679a254030aa1b29d618051f0b97', 'evrxnvschdshhoai'),
(106, 24, 'FC', 'jig_manav11@yahoo.com', '9727027517', '8192c83031ced431b5fcfa7cfc6eb069e4be7fcb', 'xtbxkgainrubvzlf'),
(108, 26, 'FC', 'newsuraybattery01@gmail.com', '9874561230', '6712d8ded95490b19dcd8785dde52b6a65737389', 'bxkfxzdsepocqzbf');

--
-- Triggers `tbl_login`
--
DELIMITER $$
CREATE TRIGGER `TR_UPDATE_PASSWORD` AFTER UPDATE ON `tbl_login` FOR EACH ROW BEGIN
if new.LOGIN_USER_TYPE = "ST" THEN
UPDATE tbl_student SET tbl_student.STUDENT_PASSWORD=new.LOGIN_USER_PASSWORD WHERE tbl_student.STUDENT_ID=new.LOGIN_REFERENCE_ID;
ELSEIF new.LOGIN_USER_TYPE = "FC" OR new.LOGIN_USER_TYPE = "CM" OR new.LOGIN_USER_TYPE = "CH" THEN
UPDATE tbl_faculty SET tbl_faculty.FACULTY_PASSWORD=new.LOGIN_USER_PASSWORD WHERE tbl_faculty.FACULTY_ID=new.LOGIN_REFERENCE_ID;
ELSEIF new.LOGIN_USER_TYPE = "CP" THEN
UPDATE tbl_company SET tbl_company.COMPANY_PASSWORD=new.LOGIN_USER_PASSWORD WHERE tbl_company.COMPANY_ID=new.LOGIN_REFERENCE_ID;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marks`
--

CREATE TABLE `tbl_marks` (
  `MARKS_ID` int(11) NOT NULL,
  `MARKS_TEST_ID` int(11) NOT NULL,
  `MARKS_STUDENT_ID` int(11) NOT NULL,
  `MARKS_OBTAINED` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_marks`
--

INSERT INTO `tbl_marks` (`MARKS_ID`, `MARKS_TEST_ID`, `MARKS_STUDENT_ID`, `MARKS_OBTAINED`) VALUES
(1, 1, 10, 50),
(2, 2, 11, 25),
(3, 2, 12, 36),
(4, 2, 13, 25),
(5, 2, 14, 45),
(6, 2, 16, 34),
(7, 2, 11, 25),
(8, 2, 12, 36),
(9, 2, 13, 25),
(10, 2, 14, 45),
(11, 2, 16, 34),
(12, 2, 11, 25),
(13, 2, 12, 36),
(14, 2, 13, 25),
(15, 2, 14, 45),
(16, 2, 16, 34),
(17, 2, 11, 25),
(18, 2, 12, 36),
(19, 2, 13, 25),
(20, 2, 14, 45),
(21, 2, 16, 34),
(22, 4, 7, 80),
(23, 4, 8, 60),
(24, 4, 9, 20),
(25, 4, 11, 60),
(26, 4, 12, 80),
(27, 4, 13, 60),
(28, 4, 14, 80),
(29, 4, 16, 60),
(30, 4, 28, 80),
(31, 2, 7, 20),
(32, 2, 8, 20),
(33, 2, 9, 20),
(34, 2, 28, 30),
(35, 2, 48, 40),
(36, 2, 49, 40),
(37, 7, 7, 80),
(38, 7, 8, 80),
(39, 7, 9, 80),
(40, 7, 11, 80),
(41, 7, 12, 80),
(42, 7, 13, 80),
(43, 7, 14, 80),
(44, 7, 16, 80),
(45, 7, 28, 80),
(46, 7, 49, 80),
(47, 10, 7, 15),
(48, 10, 8, 25),
(49, 10, 9, 36),
(50, 10, 11, 45),
(51, 10, 12, 50),
(52, 10, 13, 36),
(53, 10, 14, 14),
(54, 10, 16, 26),
(55, 10, 28, 19),
(56, 10, 49, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `NOTIFICATION_ID` int(11) NOT NULL,
  `NOTIFICATION_EVENT_ID` int(11) DEFAULT NULL,
  `NOTIFICATION_SENDER_ID` int(11) NOT NULL,
  `NOTIFICATION_RECEIVER_ID` int(11) NOT NULL,
  `NOTIFICATION_SENDER_TYPE` char(2) NOT NULL,
  `NOTIFICATION_RECIVER_TYPE` char(2) NOT NULL,
  `NOTIFICATION_TIME_STAMP` timestamp NOT NULL DEFAULT current_timestamp(),
  `NOTIFICATION_TYPE` char(5) NOT NULL,
  `NOTIFICATION_DESCRPTION` varchar(255) NOT NULL,
  `NOTIFICATION_REMOVE_STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`NOTIFICATION_ID`, `NOTIFICATION_EVENT_ID`, `NOTIFICATION_SENDER_ID`, `NOTIFICATION_RECEIVER_ID`, `NOTIFICATION_SENDER_TYPE`, `NOTIFICATION_RECIVER_TYPE`, `NOTIFICATION_TIME_STAMP`, `NOTIFICATION_TYPE`, `NOTIFICATION_DESCRPTION`, `NOTIFICATION_REMOVE_STATUS`) VALUES
(1, 4, 5, 7, 'CH', 'ST', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(2, 4, 5, 8, 'CH', 'ST', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(3, 4, 5, 9, 'CH', 'ST', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(4, 4, 5, 11, 'CH', 'ST', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(5, 4, 5, 12, 'CH', 'ST', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(6, 4, 5, 13, 'CH', 'ST', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(7, 4, 5, 14, 'CH', 'ST', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(8, 4, 5, 16, 'CH', 'ST', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(9, 4, 5, 28, 'CH', 'ST', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(10, 4, 5, 49, 'CH', 'ST', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(11, 4, 5, 3, 'CH', 'CM', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(12, 4, 5, 5, 'CH', 'CH', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(13, 4, 5, 6, 'CH', 'CM', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(14, 4, 5, 7, 'CH', 'CM', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(15, 4, 5, 8, 'CH', 'CM', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(16, 4, 5, 24, 'CH', 'CM', '2020-06-13 07:02:31', 'MEVNT', 'New Event: This is testing show company', 1),
(17, 4, 5, 3, 'CH', 'CM', '2020-06-13 07:02:46', 'MEVNT', 'New Event: This is testing show company', 0),
(18, 4, 5, 5, 'CH', 'CH', '2020-06-13 07:02:46', 'MEVNT', 'New Event: This is testing show company', 1),
(19, 4, 5, 6, 'CH', 'CM', '2020-06-13 07:02:46', 'MEVNT', 'New Event: This is testing show company', 0),
(20, 4, 5, 7, 'CH', 'CM', '2020-06-13 07:02:46', 'MEVNT', 'New Event: This is testing show company', 0),
(21, 4, 5, 8, 'CH', 'CM', '2020-06-13 07:02:46', 'MEVNT', 'New Event: This is testing show company', 0),
(22, 4, 5, 24, 'CH', 'CM', '2020-06-13 07:02:46', 'MEVNT', 'New Event: This is testing show company', 0),
(23, NULL, 23, 5, 'CP', 'CH', '2020-06-13 07:12:55', 'TRMNT', 'In-Training Student Terminated', 1),
(24, NULL, 23, 5, 'CP', 'CH', '2020-06-13 07:23:09', 'TRMNT', 'Manav  Shah is Terminated', 1),
(25, NULL, 23, 5, 'CP', 'CH', '2020-06-13 07:35:19', 'TRMNT', 'RICKY SHARMA is Terminated', 1),
(26, NULL, 23, 5, 'CP', 'CH', '2020-06-13 07:35:20', 'TRMNT', 'RICKY SHARMA is Terminated', 1),
(27, NULL, 5, 5, 'ST', 'CH', '2020-06-13 09:41:10', 'TRREQ', 'FF', 1),
(28, NULL, 49, 5, 'ST', 'CH', '2020-06-13 09:54:09', 'TRREQ', 'My Own Company', 0),
(29, NULL, 5, 49, 'CH', 'ST', '2020-06-13 10:22:30', 'TRREG', 'Termination Request Denied', 1),
(31, 8, 23, 5, 'CP', 'CH', '2020-06-13 10:40:21', 'CSL', 'New Event: TECH CODER TECH Short List', 1),
(32, 8, 5, 49, 'CH', 'ST', '2020-06-13 10:40:37', 'TROF', 'You Have Traning Offer', 1),
(33, NULL, 25, 5, 'FC', 'CH', '2020-06-13 11:19:26', 'REGIS', 'Newly Registered User', 1),
(34, 12, 5, 7, 'CH', 'ST', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(35, 12, 5, 8, 'CH', 'ST', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(36, 12, 5, 9, 'CH', 'ST', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(37, 12, 5, 11, 'CH', 'ST', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(38, 12, 5, 12, 'CH', 'ST', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(39, 12, 5, 13, 'CH', 'ST', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(40, 12, 5, 14, 'CH', 'ST', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(41, 12, 5, 16, 'CH', 'ST', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(42, 12, 5, 28, 'CH', 'ST', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(43, 12, 5, 49, 'CH', 'ST', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(44, 12, 5, 3, 'CH', 'CM', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(45, 12, 5, 5, 'CH', 'CH', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 1),
(46, 12, 5, 6, 'CH', 'CM', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(47, 12, 5, 7, 'CH', 'CM', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(48, 12, 5, 8, 'CH', 'CM', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(49, 12, 5, 24, 'CH', 'CM', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(50, 12, 5, 23, 'CH', 'CP', '2020-06-13 11:22:48', 'MEVNT', 'New Event: For Video', 0),
(51, 12, 5, 7, 'CH', 'ST', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(52, 12, 5, 8, 'CH', 'ST', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(53, 12, 5, 9, 'CH', 'ST', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(54, 12, 5, 11, 'CH', 'ST', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(55, 12, 5, 12, 'CH', 'ST', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(56, 12, 5, 13, 'CH', 'ST', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(57, 12, 5, 14, 'CH', 'ST', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(58, 12, 5, 16, 'CH', 'ST', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(59, 12, 5, 28, 'CH', 'ST', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(60, 12, 5, 49, 'CH', 'ST', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 1),
(61, 12, 5, 3, 'CH', 'CM', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(62, 12, 5, 5, 'CH', 'CH', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 1),
(63, 12, 5, 6, 'CH', 'CM', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(64, 12, 5, 7, 'CH', 'CM', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(65, 12, 5, 8, 'CH', 'CM', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(66, 12, 5, 24, 'CH', 'CM', '2020-06-13 11:23:41', 'MEVNT', 'New Event: For Video', 0),
(67, NULL, 5, 23, 'CH', 'CP', '2020-06-13 11:35:15', 'RECOM', 'Test Recommendation For Video', 0),
(68, 8, 23, 5, 'CP', 'CH', '2020-06-13 11:40:48', 'CSL', 'New Event: TECH CODER TECH Short List', 1),
(69, NULL, 23, 5, 'CP', 'CH', '2020-06-13 11:41:50', 'CPL', 'New Event: TECH CODER TECH Placement Offer', 1),
(70, NULL, 23, 5, 'CP', 'CH', '2020-06-13 11:45:57', 'CPL', 'New Event: TECH CODER TECH Placement Offer', 1),
(71, NULL, 23, 5, 'CP', 'CH', '2020-06-13 11:46:32', 'TRMNT', 'bhavik desai is Terminated', 1),
(72, NULL, 5, 49, 'CH', 'ST', '2020-06-13 11:48:10', 'PLOF', 'You Have Placement Offer', 0),
(73, NULL, 26, 5, 'FC', 'CH', '2020-06-13 12:51:06', 'REGIS', 'Newly Registered User', 1),
(74, 13, 5, 7, 'CH', 'ST', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(75, 13, 5, 8, 'CH', 'ST', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(76, 13, 5, 9, 'CH', 'ST', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(77, 13, 5, 11, 'CH', 'ST', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(78, 13, 5, 12, 'CH', 'ST', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(79, 13, 5, 13, 'CH', 'ST', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(80, 13, 5, 14, 'CH', 'ST', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(81, 13, 5, 16, 'CH', 'ST', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(82, 13, 5, 28, 'CH', 'ST', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(83, 13, 5, 49, 'CH', 'ST', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(84, 13, 5, 3, 'CH', 'CM', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(85, 13, 5, 5, 'CH', 'CH', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(86, 13, 5, 6, 'CH', 'CM', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(87, 13, 5, 7, 'CH', 'CM', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(88, 13, 5, 8, 'CH', 'CM', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(89, 13, 5, 23, 'CH', 'CP', '2020-06-13 12:55:46', 'MEVNT', 'New Event: Sample Event', 1),
(90, 13, 5, 7, 'CH', 'ST', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(91, 13, 5, 8, 'CH', 'ST', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(92, 13, 5, 9, 'CH', 'ST', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(93, 13, 5, 11, 'CH', 'ST', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(94, 13, 5, 12, 'CH', 'ST', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(95, 13, 5, 13, 'CH', 'ST', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(96, 13, 5, 14, 'CH', 'ST', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(97, 13, 5, 16, 'CH', 'ST', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(98, 13, 5, 28, 'CH', 'ST', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(99, 13, 5, 49, 'CH', 'ST', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 1),
(100, 13, 5, 3, 'CH', 'CM', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(101, 13, 5, 5, 'CH', 'CH', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 1),
(102, 13, 5, 6, 'CH', 'CM', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(103, 13, 5, 7, 'CH', 'CM', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(104, 13, 5, 8, 'CH', 'CM', '2020-06-13 12:56:29', 'MEVNT', 'New Event: Sample Event Update', 0),
(105, NULL, 5, 23, 'CH', 'CP', '2020-06-13 13:06:45', 'RECOM', 'This is a Sample Recommendation', 0),
(106, 10, 23, 5, 'CP', 'CH', '2020-06-13 13:14:01', 'CSL', 'New Event:  Short List', 1),
(107, 9, 23, 5, 'CP', 'CH', '2020-06-13 13:14:09', 'CSL', 'New Event: TECH CODER TECH Short List', 0),
(108, 8, 5, 7, 'CH', 'ST', '2020-06-13 13:14:56', 'TROF', 'You Have Traning Offer', 0),
(109, 8, 5, 9, 'CH', 'ST', '2020-06-13 13:15:00', 'TROF', 'You Have Traning Offer', 0),
(110, NULL, 23, 5, 'CP', 'CH', '2020-06-13 13:17:34', 'CPL', 'New Event: TECH CODER TECH Placement Offer', 0),
(111, NULL, 23, 5, 'CP', 'CH', '2020-06-13 13:18:05', 'TRMNT', 'm s is Terminated', 0),
(112, NULL, 23, 5, 'CP', 'CH', '2020-06-13 13:18:08', 'TRMNT', 'man patel is Terminated', 1),
(113, NULL, 23, 5, 'CP', 'CH', '2020-06-13 13:18:11', 'TRMNT', 'Manav  Shah is Terminated', 1),
(114, NULL, 49, 5, 'ST', 'CH', '2020-06-13 13:32:16', 'TRREQ', 'OWNER', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_no_placement`
--

CREATE TABLE `tbl_no_placement` (
  `NO_PLACEMENT_ID` int(11) NOT NULL,
  `NO_PLACEMENT_STUDENT_ID` int(11) NOT NULL,
  `NO_PLACEMENT_TYPE` char(2) NOT NULL,
  `NO_PLACEMENT_REASON` varchar(255) NOT NULL,
  `NO_PLACEMENT_APPROVED` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_no_placement`
--

INSERT INTO `tbl_no_placement` (`NO_PLACEMENT_ID`, `NO_PLACEMENT_STUDENT_ID`, `NO_PLACEMENT_TYPE`, `NO_PLACEMENT_REASON`, `NO_PLACEMENT_APPROVED`) VALUES
(1, 5, 'TY', 'FF', 0),
(2, 49, 'ET', 'OWNER', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_placement`
--

CREATE TABLE `tbl_placement` (
  `PLACEMENT_ID` int(11) NOT NULL,
  `PLACEMENT_TRAINING_ID` int(11) NOT NULL,
  `PLACEMENT_OFFERED_PACKAGE` int(11) NOT NULL,
  `PLACEMENT_TIME_STAMP` timestamp NOT NULL DEFAULT current_timestamp(),
  `PLACEMENT_ACCEPTED` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_placement`
--

INSERT INTO `tbl_placement` (`PLACEMENT_ID`, `PLACEMENT_TRAINING_ID`, `PLACEMENT_OFFERED_PACKAGE`, `PLACEMENT_TIME_STAMP`, `PLACEMENT_ACCEPTED`) VALUES
(4, 4, 0, '2020-06-13 11:41:50', 'T'),
(5, 9, 200000, '2020-06-13 11:45:57', 'A'),
(6, 3, 250000, '2020-06-13 13:17:34', 'P'),
(7, 7, 0, '2020-06-13 13:18:05', 'T'),
(8, 10, 0, '2020-06-13 13:18:08', 'T'),
(9, 11, 0, '2020-06-13 13:18:10', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_placement_schedule`
--

CREATE TABLE `tbl_placement_schedule` (
  `PLACEMENT_SCHEDULE_ID` int(11) NOT NULL,
  `PLACEMENT_SCHEDULE_COMPANY_ID` int(11) NOT NULL,
  `PLACEMENT_SCHEDULE_START_DATE` date NOT NULL,
  `PLACEMENT_SCHEDULE_END_DATE` date NOT NULL,
  `PLACEMENT_SCHEDULE_STATUS` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_placement_schedule`
--

INSERT INTO `tbl_placement_schedule` (`PLACEMENT_SCHEDULE_ID`, `PLACEMENT_SCHEDULE_COMPANY_ID`, `PLACEMENT_SCHEDULE_START_DATE`, `PLACEMENT_SCHEDULE_END_DATE`, `PLACEMENT_SCHEDULE_STATUS`) VALUES
(1, 5, '2020-06-07', '2020-06-09', 0),
(2, 4, '2020-06-13', '2020-06-16', 0),
(3, 7, '2020-07-08', '2020-07-11', 0),
(4, 6, '2020-06-03', '2020-07-11', 0),
(5, 1, '2020-07-04', '2020-07-07', 0),
(6, 2, '2020-07-08', '2020-07-10', 0),
(7, 3, '2020-07-11', '2020-07-14', 0),
(8, 22, '2020-06-04', '2020-06-06', 0),
(9, 29, '2020-07-14', '2020-07-17', 0),
(10, 8, '2020-06-20', '2020-06-23', 0),
(11, 10, '2020-07-18', '2020-07-22', 0),
(12, 25, '2020-06-27', '2020-06-30', 0),
(13, 21, '2020-06-01', '2020-06-03', 0),
(14, 23, '2020-07-09', '2020-07-13', 0),
(15, 27, '2020-07-28', '2020-07-31', 0),
(16, 26, '2020-08-04', '2020-08-09', 0),
(17, 30, '2020-07-01', '2020-07-04', 0),
(18, 31, '2020-07-05', '2020-07-08', 0),
(19, 28, '2020-07-23', '2020-07-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recommendation`
--

CREATE TABLE `tbl_recommendation` (
  `RECOMMENDATION_ID` int(11) NOT NULL,
  `RECOMMENDATION_STUDENT_ID` int(11) NOT NULL,
  `RECOMMENDATION_COMPANY_ID` int(11) NOT NULL,
  `RECOMMENDATION_DESCRIPTION` varchar(255) NOT NULL,
  `RECOMMENDATION_STATUS` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_recommendation`
--

INSERT INTO `tbl_recommendation` (`RECOMMENDATION_ID`, `RECOMMENDATION_STUDENT_ID`, `RECOMMENDATION_COMPANY_ID`, `RECOMMENDATION_DESCRIPTION`, `RECOMMENDATION_STATUS`) VALUES
(1, 2, 5, 'This for Testing', '0'),
(2, 7, 23, 'This is a Sample Recommendation', '1'),
(4, 49, 23, 'This is for testing', '1'),
(5, 48, 23, 'aabbaa', '1'),
(6, 12, 23, 'testing with manav', '1'),
(7, 9, 23, 'Tetsing', '1'),
(8, 14, 33, 'This is Good Programmer in PHP', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resume`
--

CREATE TABLE `tbl_resume` (
  `RESUME_ID` int(11) NOT NULL,
  `RESUME_STUDENT_ID` int(11) NOT NULL,
  `RESUME_TECHNICAL_SKILLS` varchar(255) NOT NULL,
  `RESUME_PERSONAL_SKILLS` varchar(255) NOT NULL,
  `RESUME_LANGUAGES` varchar(255) NOT NULL,
  `RSEUME_PROJECTS` varchar(255) NOT NULL,
  `RESUME_ACHIVEMENTS` varchar(255) NOT NULL,
  `RESUME_CARRIER_OBJECTIVE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_resume`
--

INSERT INTO `tbl_resume` (`RESUME_ID`, `RESUME_STUDENT_ID`, `RESUME_TECHNICAL_SKILLS`, `RESUME_PERSONAL_SKILLS`, `RESUME_LANGUAGES`, `RSEUME_PROJECTS`, `RESUME_ACHIVEMENTS`, `RESUME_CARRIER_OBJECTIVE`) VALUES
(1, 1, 'kfnvkjsfnv', 'skfjvnksjdn', 'ksdjnvksjd', 'kdjncskdjnc', 'ksdjncksjdn', 'ajdncksdjcn'),
(2, 49, 'JAVA #Python#PHP', 'Reading#Writing', 'Gujarati#Hindi', 'Cafe Shop,This is ASP.Net Project,6 Months#T&PCELL,php Project,6 Months', 'Testing,TESTING,6 Months', 'A web server is server software, or hardware dedicated to running this software, that can satisfy client requests on the World Wide Web. A web server can, in general, contain one or more websites. A web server processes incoming network requests over HTTP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resume_document`
--

CREATE TABLE `tbl_resume_document` (
  `RESUME_DOCUMENT_ID` int(11) NOT NULL,
  `RESUME_DOCUMENT_STUDENT_ID` int(11) NOT NULL,
  `RESUME_DOCUMENT_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_resume_document`
--

INSERT INTO `tbl_resume_document` (`RESUME_DOCUMENT_ID`, `RESUME_DOCUMENT_STUDENT_ID`, `RESUME_DOCUMENT_NAME`) VALUES
(1, 49, '650416 p1.1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_selection_list`
--

CREATE TABLE `tbl_selection_list` (
  `SELECTION_LIST_ID` int(11) NOT NULL,
  `SELECTION_LIST_COMPANY_ID` int(11) NOT NULL,
  `SELECTION_LIST_YEAR` char(4) NOT NULL,
  `SELECTION_LIST_NAME` varchar(60) NOT NULL,
  `SELECTION_LIST_TYPE` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_selection_list`
--

INSERT INTO `tbl_selection_list` (`SELECTION_LIST_ID`, `SELECTION_LIST_COMPANY_ID`, `SELECTION_LIST_YEAR`, `SELECTION_LIST_NAME`, `SELECTION_LIST_TYPE`) VALUES
(1, 23, '2020', 'File Upload', 'DE'),
(2, 23, '2020', 'Testing', 'DE'),
(3, 23, '2020', 'Temp', 'DE'),
(4, 23, '2020', 'Vikrant\'s', 'DE'),
(7, 33, '2020', 'PHP', 'SH'),
(8, 23, '2020', 'PHP', 'SH'),
(9, 23, '2020', 'Sample Shortlist', 'SH'),
(10, 23, '2020', 'New Shortlist', 'SH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shortlist`
--

CREATE TABLE `tbl_shortlist` (
  `SHORTLIST_ID` int(11) NOT NULL,
  `SHORT_LIST_RECOMMENDATION_ID` int(11) NOT NULL,
  `SHORTLIST_SELECTION_LIST_ID` int(11) NOT NULL,
  `SHORTLIST_STUDENT_ID` int(11) NOT NULL,
  `SHORTLIST_TYPE` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shortlist`
--

INSERT INTO `tbl_shortlist` (`SHORTLIST_ID`, `SHORT_LIST_RECOMMENDATION_ID`, `SHORTLIST_SELECTION_LIST_ID`, `SHORTLIST_STUDENT_ID`, `SHORTLIST_TYPE`) VALUES
(1, 0, 1, 49, 'DE'),
(2, 5, 1, 48, 'SH'),
(3, 2, 1, 7, 'SH'),
(4, 0, 1, 8, 'SH'),
(5, 0, 1, 14, 'DE'),
(6, 6, 2, 12, 'SH'),
(7, 0, 4, 49, 'DE'),
(8, 0, 4, 11, 'SH'),
(9, 7, 1, 9, 'SH'),
(12, 8, 7, 14, 'SH'),
(15, 0, 8, 49, 'SH'),
(16, 2, 8, 7, 'SH'),
(17, 7, 8, 9, 'SH'),
(18, 0, 8, 8, 'DE'),
(19, 0, 9, 7, 'SH'),
(20, 0, 9, 16, 'SH'),
(21, 0, 9, 13, 'SH'),
(22, 0, 9, 9, 'SH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `STUDENT_ID` int(11) NOT NULL,
  `STUDENT_FIRST_NAME` varchar(20) NOT NULL,
  `STUDENT_LAST_NAME` varchar(20) NOT NULL,
  `STUDENT_ENROLLMENT_NUMBER` varchar(15) NOT NULL,
  `STUDENT_EMAIL` varchar(255) NOT NULL,
  `STUDENT_PHONE_NUMBER` varchar(10) NOT NULL,
  `STUDENT_DATE_OF_BIRTH` date NOT NULL,
  `STUDENT_GENDER` char(1) NOT NULL,
  `STUDENT_PASSWORD` varchar(40) NOT NULL,
  `STUDENT_PARENT_NAME` varchar(20) NOT NULL,
  `STUDENT_PARENT_PHONE_NUMBER` varchar(10) NOT NULL,
  `STUDENT_PARENT_EMAIL` varchar(255) NOT NULL,
  `STUDENT_PROFILE_PIC` varchar(255) NOT NULL,
  `STUDENT_ABOUT` varchar(255) NOT NULL,
  `STUDENT_ADDRESS` varchar(255) NOT NULL,
  `STUDENT_BATCH_ID` int(11) DEFAULT NULL,
  `STUDENT_ADMISSION_YEAR` char(4) NOT NULL,
  `STUDENT_STATUS` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`STUDENT_ID`, `STUDENT_FIRST_NAME`, `STUDENT_LAST_NAME`, `STUDENT_ENROLLMENT_NUMBER`, `STUDENT_EMAIL`, `STUDENT_PHONE_NUMBER`, `STUDENT_DATE_OF_BIRTH`, `STUDENT_GENDER`, `STUDENT_PASSWORD`, `STUDENT_PARENT_NAME`, `STUDENT_PARENT_PHONE_NUMBER`, `STUDENT_PARENT_EMAIL`, `STUDENT_PROFILE_PIC`, `STUDENT_ABOUT`, `STUDENT_ADDRESS`, `STUDENT_BATCH_ID`, `STUDENT_ADMISSION_YEAR`, `STUDENT_STATUS`) VALUES
(7, 'Manav ', 'Shah', '201706100110032', 'manavshah712@gmail.com', '4455663322', '1999-12-01', 'M', '1234', '', '', '', 'IMG_6102.JPG', '', '', 2, '', 1),
(8, 'm', 's', '032', 'm', '5', '2020-12-01', 'M', 'manav', '', '', '', 'IMG_6102.JPG', '', '', 2, '', 1),
(9, 'dd', 'dd', 'dd', 'dd', 'dd', '2020-01-15', 'F', '96548c98770faf0af386d59beb52dbea51e63c11', '', '', '', 'IMG_6102.JPG', '', '', 2, '', 0),
(11, 'Manav', 'Shah', '201706100110031', 'manav@gmail.com', '1234567890', '2017-01-01', 'M', '976c7142b972a8b077d874e533b60ef96d88b891', '', '', '', 'IMG_6102.JPG', '', '', 2, '', 0),
(12, 'bhavik', 'desai', '201', 'desai966@gmail.com', '5896458976', '2020-01-10', 'M', '32904fe8c09a853f8de34d206cee844cc80b16c4', '', '', '', 'IMG_6102.JPG', '', '', 2, '', 1),
(13, 'Manav ', 'Shah', '032', '201706100110032', '5566332211', '2020-01-22', 'M', 'ecc9c6848985b8a6c783911761484eb949f540c3', '', '', '', '', '', '', 2, '', 1),
(14, 'Bhavani', 'Sharma', '048', 'ricky@gmail.com', '5566332211', '2020-01-08', 'M', '372f12fa47dfeda9024e2def63aad676ecfd9f26', 'm', '4455663322', 's', 'nn', 'I am very happy to be Here', 'surat', 2, '2020', 0),
(16, 'man', 'patel', '032', 'man@gmail.com', '8520', '2020-02-04', 'M', '3a8e3995c765a73de092636d8d4ad96155c31c2a', 'mm', '22', '2', 'hjb', 'kb', 'kjb', 2, '2020', 1),
(28, 'hewv', 'hgsjkdh', 'jhgkj', 'kjhg', 'kjhgj', '2020-02-19', 'M', '4cb2c88a6baf419d9e5a89efc463a32557922e03', 'gfghf', 'ghfhgf', 'hgfhgf', 'hgfhgf', 'hgfhgf', 'jhgjhg', 2, '2022', 1),
(48, 'a', 'A', 'A', 'A', 'A', '0000-00-00', 'M', '5a53bec34d6a24ce8d09ba25a2341b07544f6f8a', 'A', 'A', 'A', 'A', 'A', 'A', 1, '2020', 0),
(49, 'RICKY', 'SHARMA', '047', 'ricky@gmail.com', '9869859598', '2019-04-02', 'M', '9bc3b266c4ee8bafe0d8d3cb228dcd3eba6d4489', 'mm', '789654123', 'm@gmail.com', 'About.PNG', 'avsd                    	                    	                    	                    	                    	                    	                    	                    	                    	                    	                    	                    ', 'kajbsd                    	                    	                    	                    	                    	                    	                    	                    	                    	                    	                    	                  ', 2, '2017', 0);

--
-- Triggers `tbl_student`
--
DELIMITER $$
CREATE TRIGGER `TR_STUDENT_REGISTRATION` AFTER INSERT ON `tbl_student` FOR EACH ROW BEGIN
DECLARE A VARCHAR(16);
DECLARE B VARCHAR(40);
SET @B := NEW.STUDENT_PASSWORD;

CALL `RANDOM_STRING_16`(@A);
CALL `PASSWORD_GEN`(@B, @A);

INSERT INTO tbl_login VALUES(NULL,NEW.STUDENT_ID,'ST',NEW.STUDENT_EMAIL,NEW.STUDENT_PHONE_NUMBER,@B,@A);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `TEST_ID` int(11) NOT NULL,
  `TEST_EVENT_ID` int(11) NOT NULL,
  `TEST_NAME` varchar(20) NOT NULL,
  `TEST_DESCRIPTION` varchar(255) NOT NULL,
  `TEST_TOTAL_MARKS` int(11) NOT NULL,
  `TEST_PASSING_MARKS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`TEST_ID`, `TEST_EVENT_ID`, `TEST_NAME`, `TEST_DESCRIPTION`, `TEST_TOTAL_MARKS`, `TEST_PASSING_MARKS`) VALUES
(1, 2, 'Pre', 'FF', 100, 40),
(2, 15, 'Testing', 'Test Desc', 50, 17),
(3, 7, 'TESTTEST', 'sfjvsfljnvlknvlknvlknvflsfknvlsfknv', 100, 35),
(4, 5, 'Exam Entry check', 'This is for all student', 100, 50),
(5, 22, 'Fill Marks', 'Testing For Fill Marks', 100, 50),
(6, 22, 'This is for Database', 'THIS IS FOR MERGE', 100, 40),
(7, 3, 'FOR TECH CODER TECH ', 'FOR LAB TEST', 100, 40),
(8, 4, 'For testing test', 'testing', 100, 40),
(9, 12, 'For Video', 'Test for testing', 100, 40),
(10, 13, 'Sample Test', 'Sample Test Discription', 50, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_training`
--

CREATE TABLE `tbl_training` (
  `TRAINING_ID` int(11) NOT NULL,
  `TRAINING_STUDENT_ID` int(11) NOT NULL,
  `TRAINING_COMPANY_ID` int(11) NOT NULL,
  `TRAINING_OFFERED_STIPEND` int(11) NOT NULL,
  `TRAINING_TIME_STAMP` timestamp NOT NULL DEFAULT current_timestamp(),
  `TRAINING_ACCEPTED` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_training`
--

INSERT INTO `tbl_training` (`TRAINING_ID`, `TRAINING_STUDENT_ID`, `TRAINING_COMPANY_ID`, `TRAINING_OFFERED_STIPEND`, `TRAINING_TIME_STAMP`, `TRAINING_ACCEPTED`) VALUES
(2, 48, 23, 500, '2020-06-04 07:14:59', 'A'),
(3, 7, 23, 5000, '2020-06-04 07:14:59', 'A'),
(4, 12, 23, 2000, '2021-06-08 20:07:29', 'A'),
(5, 11, 33, 2000, '2020-06-09 06:04:02', 'A'),
(6, 14, 33, 5000, '2020-06-10 16:23:01', 'A'),
(7, 8, 23, 100, '2020-06-13 10:36:14', 'A'),
(8, 9, 23, 5500, '2020-06-13 10:36:14', 'A'),
(9, 49, 23, 5000, '2020-06-13 10:40:16', 'A'),
(10, 16, 23, 8000, '2020-06-13 13:13:33', 'A'),
(11, 13, 23, 6000, '2020-06-13 13:13:33', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_academic_10th_details`
--
ALTER TABLE `tbl_academic_10th_details`
  ADD PRIMARY KEY (`ACADEMIC_10TH_ID`),
  ADD UNIQUE KEY `ACADEMIC_10TH_STUDENT_ID` (`ACADEMIC_10TH_STUDENT_ID`);

--
-- Indexes for table `tbl_academic_12th_details`
--
ALTER TABLE `tbl_academic_12th_details`
  ADD PRIMARY KEY (`ACADEMIC_12TH_ID`),
  ADD UNIQUE KEY `ACADEMIC_12TH_STUDENT_ID` (`ACADEMIC_12TH_STUDENT_ID`);

--
-- Indexes for table `tbl_academic_bachelor_details`
--
ALTER TABLE `tbl_academic_bachelor_details`
  ADD PRIMARY KEY (`ACADEMIC_BACHELOR_ID`);

--
-- Indexes for table `tbl_academic_details`
--
ALTER TABLE `tbl_academic_details`
  ADD PRIMARY KEY (`ACADEMIC_DETAILS_ID`),
  ADD UNIQUE KEY `ACADEMIC_DETAILS_STUDENT_ID` (`ACADEMIC_DETAILS_STUDENT_ID`);

--
-- Indexes for table `tbl_academic_diploma_details`
--
ALTER TABLE `tbl_academic_diploma_details`
  ADD PRIMARY KEY (`ACADEMIC_DIPLOMA_ID`),
  ADD UNIQUE KEY `ACADEMIC_DIPLOMA_STUDENT_ID` (`ACADEMIC_DIPLOMA_STUDENT_ID`),
  ADD UNIQUE KEY `ACADEMIC_DIPLOMA_STUDENT_ID_2` (`ACADEMIC_DIPLOMA_STUDENT_ID`);

--
-- Indexes for table `tbl_academic_master_details`
--
ALTER TABLE `tbl_academic_master_details`
  ADD PRIMARY KEY (`ACADEMIC_MASTER_ID`),
  ADD UNIQUE KEY `ACADEMIC_MASTER_STUDENT_ID` (`ACADEMIC_MASTER_STUDENT_ID`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`ATTENDANCE_ID`);

--
-- Indexes for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  ADD PRIMARY KEY (`BATCH_ID`);

--
-- Indexes for table `tbl_broadcast_list`
--
ALTER TABLE `tbl_broadcast_list`
  ADD PRIMARY KEY (`BROADCAST_LIST_ID`);

--
-- Indexes for table `tbl_broadcast_list_members`
--
ALTER TABLE `tbl_broadcast_list_members`
  ADD PRIMARY KEY (`BROADCAST_LIST_MEMBER_ID`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`COMPANY_ID`);

--
-- Indexes for table `tbl_company_document`
--
ALTER TABLE `tbl_company_document`
  ADD PRIMARY KEY (`COMPANY_DOCUMENT_ID`);

--
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`DOCUMENT_ID`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`EVENT_ID`);

--
-- Indexes for table `tbl_event_application`
--
ALTER TABLE `tbl_event_application`
  ADD PRIMARY KEY (`EVENT_APPLICATION_ID`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`FACULTY_ID`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`LOGIN_ID`);

--
-- Indexes for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  ADD PRIMARY KEY (`MARKS_ID`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`NOTIFICATION_ID`);

--
-- Indexes for table `tbl_no_placement`
--
ALTER TABLE `tbl_no_placement`
  ADD PRIMARY KEY (`NO_PLACEMENT_ID`);

--
-- Indexes for table `tbl_placement`
--
ALTER TABLE `tbl_placement`
  ADD PRIMARY KEY (`PLACEMENT_ID`);

--
-- Indexes for table `tbl_placement_schedule`
--
ALTER TABLE `tbl_placement_schedule`
  ADD PRIMARY KEY (`PLACEMENT_SCHEDULE_ID`);

--
-- Indexes for table `tbl_recommendation`
--
ALTER TABLE `tbl_recommendation`
  ADD PRIMARY KEY (`RECOMMENDATION_ID`);

--
-- Indexes for table `tbl_resume`
--
ALTER TABLE `tbl_resume`
  ADD PRIMARY KEY (`RESUME_ID`);

--
-- Indexes for table `tbl_resume_document`
--
ALTER TABLE `tbl_resume_document`
  ADD PRIMARY KEY (`RESUME_DOCUMENT_ID`);

--
-- Indexes for table `tbl_selection_list`
--
ALTER TABLE `tbl_selection_list`
  ADD PRIMARY KEY (`SELECTION_LIST_ID`);

--
-- Indexes for table `tbl_shortlist`
--
ALTER TABLE `tbl_shortlist`
  ADD PRIMARY KEY (`SHORTLIST_ID`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`STUDENT_ID`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`TEST_ID`);

--
-- Indexes for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD PRIMARY KEY (`TRAINING_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_academic_10th_details`
--
ALTER TABLE `tbl_academic_10th_details`
  MODIFY `ACADEMIC_10TH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_academic_12th_details`
--
ALTER TABLE `tbl_academic_12th_details`
  MODIFY `ACADEMIC_12TH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_academic_bachelor_details`
--
ALTER TABLE `tbl_academic_bachelor_details`
  MODIFY `ACADEMIC_BACHELOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_academic_details`
--
ALTER TABLE `tbl_academic_details`
  MODIFY `ACADEMIC_DETAILS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_academic_diploma_details`
--
ALTER TABLE `tbl_academic_diploma_details`
  MODIFY `ACADEMIC_DIPLOMA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_academic_master_details`
--
ALTER TABLE `tbl_academic_master_details`
  MODIFY `ACADEMIC_MASTER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `ATTENDANCE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  MODIFY `BATCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_broadcast_list`
--
ALTER TABLE `tbl_broadcast_list`
  MODIFY `BROADCAST_LIST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_broadcast_list_members`
--
ALTER TABLE `tbl_broadcast_list_members`
  MODIFY `BROADCAST_LIST_MEMBER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `COMPANY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_company_document`
--
ALTER TABLE `tbl_company_document`
  MODIFY `COMPANY_DOCUMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `DOCUMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `EVENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_event_application`
--
ALTER TABLE `tbl_event_application`
  MODIFY `EVENT_APPLICATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `FACULTY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `LOGIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  MODIFY `MARKS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `NOTIFICATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `tbl_no_placement`
--
ALTER TABLE `tbl_no_placement`
  MODIFY `NO_PLACEMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_placement`
--
ALTER TABLE `tbl_placement`
  MODIFY `PLACEMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_placement_schedule`
--
ALTER TABLE `tbl_placement_schedule`
  MODIFY `PLACEMENT_SCHEDULE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_recommendation`
--
ALTER TABLE `tbl_recommendation`
  MODIFY `RECOMMENDATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_resume`
--
ALTER TABLE `tbl_resume`
  MODIFY `RESUME_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_resume_document`
--
ALTER TABLE `tbl_resume_document`
  MODIFY `RESUME_DOCUMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_selection_list`
--
ALTER TABLE `tbl_selection_list`
  MODIFY `SELECTION_LIST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_shortlist`
--
ALTER TABLE `tbl_shortlist`
  MODIFY `SHORTLIST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `STUDENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `TEST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `TRAINING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
