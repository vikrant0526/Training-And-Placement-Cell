-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 04:18 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manav`
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_RESUME_DETAILS` (IN `sid` INT)  NO SQL
BEGIN

DECLARE rid,aid INT;

SELECT tbl_resume.RESUME_ID INTO rid FROM tbl_resume WHERE tbl_resume.RESUME_STUDENT_ID=sid;


SELECT tbl_academic_details.ACADEMIC_DETAILS_ID INTO aid FROM tbl_academic_details WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;

SELECT rid,aid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CHECK_STATUS` (IN `sid` INT)  NO SQL
BEGIN
DECLARE t int;
DECLARE p int;
DECLARE ch tinyint;
DECLARE st char(1);

SELECT tbl_training.TRAINING_ID INTO t FROM tbl_training WHERE tbl_training.TRAINING_STUDENT_ID=sid;
IF t IS null THEN
	SET st = 'Y';
ELSE
	SELECT tbl_training.TRAINING_ACCEPTED INTO ch FROM tbl_training WHERE tbl_training.TRAINING_ID=t;
    IF ch = 1 THEN
    	SELECT tbl_placement.PLACEMENT_ID INTO p FROM tbl_placement WHERE tbl_placement.PLACEMENT_TRAINING_ID=t;
        IF p IS null THEN
        	SET st = 'Y';
		ELSE
        	SET st = 'N';
		END IF;
	ELSE
    	SET st = 'N';
    END IF;
END IF;
SELECT st as 'STATUS';
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
    	INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_SENDER_ID,tbl_notification.NOTIFICATION_RECEIVER_ID,tbl_notification.NOTIFICATION_SENDER_TYPE,tbl_notification.NOTIFICATION_RECIVER_TYPE,tbl_notification.NOTIFICATION_DESCRPTION,tbl_notification.NOTIFICATION_REMOVE_STATUS,tbl_notification.NOTIFICATION_TYPE,tbl_notification.NOTIFICATION_EVENT_ID) VALUES(gb,sid,gtype,rtype,concat('New Event: ',ename),0,'MEVNT',eid);
    ELSEIF cate = 0 THEN
    	INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_SENDER_ID,tbl_notification.NOTIFICATION_RECEIVER_ID,tbl_notification.NOTIFICATION_SENDER_TYPE,tbl_notification.NOTIFICATION_RECIVER_TYPE,tbl_notification.NOTIFICATION_DESCRPTION,tbl_notification.NOTIFICATION_REMOVE_STATUS,tbl_notification.NOTIFICATION_TYPE,tbl_notification.NOTIFICATION_EVENT_ID) VALUES(gb,sid,gtype,rtype,concat('New Event: ',ename),0,'AEVNT',eid);
    END IF;
END LOOP L1;
CLOSE c1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `FORGET_ONE` (IN `pne` VARCHAR(50))  NO SQL
BEGIN

SELECT tbl_login.LOGIN_USER_EMAIL,tbl_login.LOGIN_REFERENCE_ID , tbl_login.LOGIN_USER_TYPE FROM tbl_login WHERE tbl_login.LOGIN_USER_EMAIL=pne OR tbl_login.LOGIN_USER_PHONE_NUMBER=pne;

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_DEGREE` (IN `DEPT` VARCHAR(10))  NO SQL
BEGIN
SELECT DISTINCT tbl_batch.BATCH_DEGREE FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=DEPT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_EVENT` (IN `eid` INT)  NO SQL
BEGIN
SELECT * FROM tbl_event WHERE tbl_event.EVENT_ID=eid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_EVENT_BY_COMPANY` (IN `cid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_event WHERE tbl_event.EVENT_COMPANY_ID=cid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_EVENT_NAME` (IN `eid` INT)  NO SQL
BEGIN
SELECT tbl_event.EVENT_NAME FROM tbl_event WHERE tbl_event.EVENT_ID=eid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_FACULTY` (IN `fid` INT)  NO SQL
BEGIN
SELECT * FROM tbl_faculty WHERE tbl_faculty.FACULTY_ID=fid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_PYEAR` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20))  NO SQL
BEGIN
SELECT DISTINCT tbl_batch.BATCH_PASSING_YEAR FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept and tbl_batch.BATCH_DEGREE=degree;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_REG_NOTIFICATION` ()  NO SQL
BEGIN
	SELECT * FROM tbl_notification WHERE tbl_notification.NOTIFICATION_TYPE='REGIS' AND tbl_notification.NOTIFICATION_REMOVE_STATUS=0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_SELECTIONLIST_NAME` (IN `cid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_selection_list WHERE tbl_selection_list.SELECTION_LIST_COMPANY_ID=cid AND tbl_selection_list.SELECTION_LIST_TYPE='SH';

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_SHORTLISTED_STUDENT` (IN `sid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_shortlist WHERE tbl_shortlist.SHORTLIST_SELECTION_LIST_ID=sid AND
tbl_shortlist.SHORTLIST_TYPE="SH";

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_STIPEND_STUDENT` (IN `sid` INT, IN `cid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_training WHERE tbl_training.TRAINING_STUDENT_ID=sid AND
tbl_training.TRAINING_COMPANY_ID=cid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_STUDENTS_BY_BATCH` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4))  NO SQL
BEGIN
	SELECT * FROM tbl_student WHERE tbl_student.STUDENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_STUDENT_DETAILS` (IN `sid` INT)  NO SQL
BEGIN
SELECT * FROM tbl_student WHERE tbl_student.STUDENT_ID=sid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_STUDENT_DIP_12TH` (IN `sid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_academic_details WHERE tbl_academic_details.ACADEMIC_DETAILS_STUDENT_ID=sid;

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_TEST_BY_BATCH` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4))  NO SQL
BEGIN
SELECT tbl_test.TEST_ID,tbl_test.TEST_NAME FROM tbl_test, tbl_event WHERE tbl_test.TEST_EVENT_ID=tbl_event.EVENT_ID AND tbl_event.EVENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_TEST_EVENT_BY_BATCH` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4))  NO SQL
BEGIN
SELECT * FROM tbl_event WHERE tbl_event.EVENT_BATCH_ID=(SELECT tbl_batch.BATCH_ID FROM tbl_batch WHERE tbl_batch.BATCH_DEPARTMENT=dept AND tbl_batch.BATCH_DEGREE=degree AND tbl_batch.BATCH_PASSING_YEAR=pyear) AND tbl_event.EVENT_TYPE='TS';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_TEST_STUDENT` (IN `tid` INT)  NO SQL
BEGIN
DECLARE eid int;
SELECT tbl_test.TEST_EVENT_ID INTO eid FROM tbl_test WHERE tbl_test.TEST_ID=tid;
CALL GET_APPLIED_STUDENT(eid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_TOTAL_MARKS` (IN `tid` INT)  NO SQL
BEGIN
SELECT tbl_test.TEST_TOTAL_MARKS FROM tbl_test WHERE tbl_test.TEST_ID=tid;
END$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_ATTENDANCE` (IN `eid` INT, IN `sid` INT, IN `fid` INT, IN `attendance` BOOLEAN)  NO SQL
BEGIN

INSERT INTO tbl_attendance (tbl_attendance.ATTENDANCE_EVENT_ID,tbl_attendance.ATTENDANCE_STUDENT_ID,tbl_attendance.ATTENDANCE_FACULTY_ID,tbl_attendance.ATTENDANCE) VALUES (eid,sid,fid,attendance);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_BATCH` (IN `dept` VARCHAR(10), IN `degree` VARCHAR(20), IN `pyear` CHAR(4))  NO SQL
BEGIN
INSERT INTO tbl_batch (tbl_batch.BATCH_DEPARTMENT,tbl_batch.BATCH_DEGREE,tbl_batch.BATCH_PASSING_YEAR) VALUES(dept,degree,pyear);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_COMPANY` (IN `name` VARCHAR(30), IN `ryear` CHAR(4), IN `address` VARCHAR(255), IN `email` VARCHAR(255), IN `pn1` VARCHAR(10), IN `pn2` VARCHAR(10), IN `website` VARCHAR(100), IN `password` VARCHAR(40), IN `logo` VARCHAR(50), IN `about` VARCHAR(255), IN `tech` VARCHAR(255), IN `noe` INT, IN `maximum_pack` BIGINT(20), IN `minimum_pack` BIGINT(20), IN `images` VARCHAR(255), IN `hr_name` VARCHAR(50), IN `hr_email` VARCHAR(255))  NO SQL
BEGIN
DECLARE ID INT;
INSERT into tbl_company(tbl_company.COMPANY_NAME,tbl_company.COMPANY_REGISTERED_YEAR,tbl_company.COMPANY_ADDRESS,tbl_company.COMPANY_EMAIL,tbl_company.COMPANY_PHONE_NUMBER_1,tbl_company.COMPANY_PHONE_NUMBER_2,tbl_company.COMPANY_WEBSITE,tbl_company.COMPANY_ACCEPTED,tbl_company.COMPANY_PASSWORD,tbl_company.COMPANY_LOGO,tbl_company.COMPANY_ABOUT,tbl_company.COMPANY_TECHNOLOGIES,tbl_company.COMPANY_NO_OF_EMPLOYEES,tbl_company.COMPANY_MAXIMUM_PACKAGE,tbl_company.COMPANY_MINIMUM_PACKAGE,tbl_company.COMPANY_IMAGES,tbl_company.COMPANY_HR_NAME,tbl_company.COMPANY_HR_EMAIL) VALUES(name,ryear,address,email,pn1,pn2,website,'P',password,logo,about,tech,noe,maximum_pack,minimum_pack,images,hr_name,hr_email);

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

INSERT INTO tbl_marks (tbl_marks.MARKS_TEST_ID,tbl_marks.MARKS_STUDENT_ID,tbl_marks.MARKS_OBTAINED) VALUES (test_id,stud_id,obtained);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_MATERIALS` (IN `title` VARCHAR(50), IN `type` CHAR(2), IN `mname` VARCHAR(255))  NO SQL
BEGIN
INSERT INTO tbl_materials(tbl_materials.MATERIALS_TITLE,tbl_materials.MATERIALS_TYPE,tbl_materials.MATERIALS_NAME) VALUES (title,type,mname);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_NOTIFICATION` (IN `sid` INT, IN `rid` INT, IN `stype` CHAR(2), IN `rtype` CHAR(2), IN `type` CHAR(5), IN `description` VARCHAR(255))  NO SQL
BEGIN
INSERT INTO tbl_notification (tbl_notification.NOTIFICATION_SENDER_ID,tbl_notification.NOTIFICATION_RECEIVER_ID,tbl_notification.NOTIFICATION_SENDER_TYPE,tbl_notification.NOTIFICATION_RECIVER_TYPE,tbl_notification.NOTIFICATION_TYPE,tbl_notification.NOTIFICATION_DESCRPTION,tbl_notification.NOTIFICATION_REMOVE_STATUS) VALUES(sid,rid,stype,rtype,type,description,0);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_PLACEMENT_SCHEDULE` (IN `cid` INT, IN `pdate` DATE)  NO SQL
BEGIN
INSERT INTO tbl_placement_schedule (tbl_placement_schedule.PLACEMENT_SCHEDULE_COMPANY_ID,tbl_placement_schedule.PLACEMENT_SCHEDULE_DATE) VALUES(cid,pdate);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_RECOMMENDATION` (IN `sid` INT, IN `cid` INT, IN `description` VARCHAR(255))  NO SQL
BEGIN

INSERT INTO tbl_recommendation(tbl_recommendation.RECOMMENDATION_STUDENT_ID,tbl_recommendation.RECOMMENDATION_COMPANY_ID,tbl_recommendation.RECOMMENDATION_DESCRIPTION)VALUES (sid,cid,description);


CALL RECOMMENDATION_NOTIFICATION(cid,description);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_SELECTION_LIST` (IN `cid` INT, IN `name` VARCHAR(50))  NO SQL
BEGIN
INSERT INTO tbl_selection_list (tbl_selection_list.SELECTION_LIST_COMPANY_ID,tbl_selection_list.SELECTION_LIST_YEAR,tbl_selection_list.SELECTION_LIST_NAME,tbl_selection_list.SELECTION_LIST_TYPE) VALUES(cid,YEAR(NOW()),name,'SH');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_SHORTLIST` (IN `rid` INT, IN `selectid` INT, IN `sid` INT)  NO SQL
BEGIN

INSERT INTO tbl_shortlist(tbl_shortlist.SHORT_LIST_RECOMMENDATION_ID,tbl_shortlist.SHORTLIST_SELECTION_LIST_ID,tbl_shortlist.SHORTLIST_STUDENT_ID,tbl_shortlist.SHORTLIST_TYPE) VALUES (rid,selectid,sid,"SH");

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_UPDATE_TRAINING` (IN `sid` INT, IN `cid` INT, IN `offered_stipend` INT, IN `accepted` CHAR(1))  NO SQL
BEGIN
DECLARE id int;
SELECT tbl_training.TRAINING_ID into id FROM tbl_training WHERE tbl_training.TRAINING_STUDENT_ID=sid AND
tbl_training.TRAINING_COMPANY_ID = cid;

IF ISNULL(id) THEN
INSERT INTO tbl_training (tbl_training.TRAINING_STUDENT_ID, tbl_training.TRAINING_COMPANY_ID,tbl_training.TRAINING_OFFERED_STIPEND,tbl_training.TRAINING_ACCEPTED) VALUES(sid,cid,offered_stipend,accepted);
ELSE
UPDATE tbl_training SET tbl_training.TRAINING_STUDENT_ID=sid,
tbl_training.TRAINING_COMPANY_ID=cid,
tbl_training.TRAINING_OFFERED_STIPEND=offered_stipend WHERE tbl_training.TRAINING_STUDENT_ID=sid AND
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

INSERT INTO tbl_notification(tbl_notification.NOTIFICATION_SENDER_ID,tbl_notification.NOTIFICATION_RECEIVER_ID,tbl_notification.NOTIFICATION_SENDER_TYPE,tbl_notification.NOTIFICATION_RECIVER_TYPE,tbl_notification.NOTIFICATION_TYPE,tbl_notification.NOTIFICATION_DESCRPTION,tbl_notification.NOTIFICATION_REMOVE_STATUS) VALUES((SELECT tbl_faculty.FACULTY_ID FROM tbl_faculty WHERE tbl_faculty.FACULTY_ROLE='CH'),cid,'CH','CP','RECOM',description,0);

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `REMOVE_NOTIFICATION` (IN `id` INT)  NO SQL
BEGIN
UPDATE tbl_notification SET tbl_notification.NOTIFICATION_REMOVE_STATUS = 1 WHERE tbl_notification.NOTIFICATION_ID=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SEARCH_STUDENT_NAME` (IN `name` VARCHAR(50))  NO SQL
BEGIN

SELECT * FROM tbl_student WHERE tbl_student.STUDENT_FIRST_NAME LIKE concat('%',name,'%') OR tbl_student.STUDENT_LAST_NAME LIKE concat('%',name,'%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECT_COMPANY_PROFILE` (IN `cid` INT)  NO SQL
SELECT * FROM tbl_company where tbl_company.COMPANY_ID=cid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TERMINATE_STUDENT_UNDER_TRAINING` (IN `tid` INT)  NO SQL
BEGIN
	DECLARE pid int;
    SELECT tbl_placement.PLACEMENT_ID INTO pid FROM tbl_placement WHERE tbl_placement.PLACEMENT_TRAINING_ID=tid;
    
    IF ISNULL(pid) THEN
	INSERT INTO tbl_placement (tbl_placement.PLACEMENT_TRAINING_ID, tbl_placement.PLACEMENT_OFFERED_PACKAGE, tbl_placement.PLACEMENT_ACCEPTED) VALUES (tid, 0, 'T');
    ELSE
    UPDATE tbl_placement SET tbl_placement.PLACEMENT_ACCEPTED='T', tbl_placement.PLACEMENT_OFFERED_PACKAGE=0 WHERE tbl_placement.PLACEMENT_ID=pid;
    END IF;
    UPDATE tbl_student, tbl_training SET tbl_student.STUDENT_STATUS=1 WHERE tbl_student.STUDENT_ID=tbl_training.TRAINING_STUDENT_ID AND tbl_training.TRAINING_ID=tid;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_COMPANY_PROFILE` (IN `id` INT, IN `name` VARCHAR(30), IN `ryear` CHAR(4), IN `address` VARCHAR(255), IN `website` VARCHAR(100), IN `about` VARCHAR(255), IN `noe` INT, IN `maximum` BIGINT, IN `minimum` BIGINT, IN `hrname` VARCHAR(50), IN `hremail` VARCHAR(255), IN `cemail` VARCHAR(255), IN `cnum` VARCHAR(10), IN `hrnum` VARCHAR(10))  NO SQL
BEGIN
UPDATE tbl_company SET tbl_company.COMPANY_NAME=name,tbl_company.COMPANY_REGISTERED_YEAR=ryear,tbl_company.COMPANY_ADDRESS=address,tbl_company.COMPANY_WEBSITE=website,tbl_company.COMPANY_ABOUT=about,tbl_company.COMPANY_NO_OF_EMPLOYEES=noe,tbl_company.COMPANY_MAXIMUM_PACKAGE=maximum,tbl_company.COMPANY_MINIMUM_PACKAGE=minimum,tbl_company.COMPANY_HR_NAME=hrname,tbl_company.COMPANY_HR_EMAIL=hremail,tbl_company.COMPANY_EMAIL=cemail,tbl_company.COMPANY_PHONE_NUMBER_1=cnum,tbl_company.COMPANY_PHONE_NUMBER_2=hrnum WHERE tbl_company.COMPANY_ID=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_FACULTY_PROFILE` (IN `id` INT, IN `fn` INT, IN `ln` INT, IN `gen` INT, IN `phn` INT, IN `abt` INT, IN `pp` INT)  NO SQL
BEGIN
UPDATE tbl_faculty SET tbl_faculty.FACULTY_FIRST_NAME=fn,tbl_faculty.FACULTY_LAST_NAME=ln,tbl_faculty.FACULTY_GENDER=gen,tbl_faculty.FACULTY_ABOUT=abt,tbl_faculty.FACULTY_PROFILE_PIC=pp WHERE tbl_faculty.FACULTY_ID = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_PLACEMENT_SCHEDULE` (IN `cid` INT, IN `pdate` DATE)  NO SQL
BEGIN
UPDATE tbl_placement_schedule SET tbl_placement_schedule.PLACEMENT_SCHEDULE_DATE=pdate WHERE tbl_placement_schedule.PLACEMENT_SCHEDULE_COMPANY_ID=cid AND YEAR(tbl_placement_schedule.PLACEMENT_SCHEDULE_DATE)=YEAR(pdate);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_STUDENT_PROFILE` (IN `id` INT, IN `fname` VARCHAR(20), IN `lname` VARCHAR(20), IN `ennum` VARCHAR(15), IN `dob` DATE, IN `gender` CHAR(1), IN `pname` VARCHAR(20), IN `about` VARCHAR(255), IN `address` VARCHAR(255), IN `pnum` VARCHAR(10), IN `email` VARCHAR(255), IN `ppnum` VARCHAR(10), IN `pemail` VARCHAR(255))  NO SQL
BEGIN  
UPDATE tbl_student SET tbl_student.STUDENT_FIRST_NAME=fname,tbl_student.STUDENT_LAST_NAME=lname,tbl_student.STUDENT_ENROLLMENT_NUMBER=ennum,tbl_student.STUDENT_EMAIL=email,tbl_student.STUDENT_PHONE_NUMBER=pnum,tbl_student.STUDENT_DATE_OF_BIRTH=dob,tbl_student.STUDENT_GENDER=gender,tbl_student.STUDENT_PARENT_NAME=pname,tbl_student.STUDENT_PARENT_PHONE_NUMBER=ppnum,tbl_student.STUDENT_PARENT_EMAIL=pemail,tbl_student.STUDENT_ABOUT=about,tbl_student.STUDENT_ADDRESS=address WHERE tbl_student.STUDENT_ID=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_STUDENT_PROFILE_PIC` (IN `ppic` VARCHAR(255), IN `sid` INT)  NO SQL
BEGIN

UPDATE tbl_student SET tbl_student.STUDENT_PROFILE_PIC=ppic WHERE tbl_student.STUDENT_ID=sid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_CANCELED_EVENT` ()  NO SQL
BEGIN
SELECT tbl_event.*,tbl_batch.BATCH_DEPARTMENT,tbl_batch.BATCH_DEGREE,tbl_batch.BATCH_PASSING_YEAR FROM tbl_event INNER JOIN tbl_batch WHERE tbl_batch.BATCH_ID=tbl_event.EVENT_BATCH_ID AND tbl_event.EVENT_CANCLED=1 ORDER BY tbl_event.EVENT_DATE DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_COMMITTEE_MEMBER` ()  NO SQL
BEGIN
SELECT * FROM tbl_faculty WHERE tbl_faculty.FACULTY_ROLE='CM' AND tbl_faculty.FACULTY_ACCEPTED='A';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_COMPANY` ()  NO SQL
BEGIN
SELECT * FROM tbl_company WHERE tbl_company.COMPANY_ACCEPTED='A';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_EVENT` (IN `id` INT)  NO SQL
BEGIN
DECLARE batch_id int;

SELECT tbl_student.STUDENT_BATCH_ID INTO @batch_id FROM tbl_student WHERE tbl_student.STUDENT_ID=id;


SELECT * FROM tbl_event WHERE tbl_event.EVENT_BATCH_ID=@batch_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_FACULTY` ()  NO SQL
BEGIN
SELECT * FROM tbl_faculty WHERE tbl_faculty.FACULTY_ROLE='FC' AND tbl_faculty.FACULTY_ACCEPTED='A';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_FUTURE_EVENT` ()  NO SQL
BEGIN
SELECT tbl_event.*,tbl_batch.BATCH_DEPARTMENT,tbl_batch.BATCH_DEGREE,tbl_batch.BATCH_PASSING_YEAR FROM tbl_event INNER JOIN tbl_batch WHERE tbl_event.EVENT_DATE>now() AND tbl_batch.BATCH_ID=tbl_event.EVENT_BATCH_ID AND tbl_event.EVENT_CANCLED=0 ORDER BY tbl_event.EVENT_DATE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_MATERIALS` ()  NO SQL
BEGIN

SELECT * FROM tbl_materials;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_NOTIFICATION` (IN `rid` INT, IN `type` INT)  NO SQL
BEGIN

SELECT * FROM tbl_notification WHERE tbl_notification.NOTIFICATION_RECEIVER_ID=rid AND tbl_notification.NOTIFICATION_TYPE=type;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_PAST_EVENT` ()  NO SQL
BEGIN
SELECT tbl_event.*,tbl_batch.BATCH_DEPARTMENT,tbl_batch.BATCH_DEGREE,tbl_batch.BATCH_PASSING_YEAR FROM tbl_event INNER JOIN tbl_batch WHERE tbl_event.EVENT_DATE<=now() AND tbl_batch.BATCH_ID=tbl_event.EVENT_BATCH_ID AND tbl_event.EVENT_CANCLED=0 ORDER BY tbl_event.EVENT_DATE DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_SELECTION_LIST` (IN `cid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_selection_list WHERE tbl_selection_list.SELECTION_LIST_COMPANY_ID=cid AND tbl_selection_list.SELECTION_LIST_TYPE='SH'; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VIEW_SHORTLIST` (IN `selectid` INT)  NO SQL
BEGIN

SELECT * FROM tbl_shortlist WHERE tbl_shortlist.SHORTLIST_SELECTION_LIST_ID=selectid AND tbl_shortlist.SHORTLIST_TYPE="SH";

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
(4, 49, 'Gujarat State Board', 'JJ', 55);

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
(4, 49, 'h', 'h', 'h', 5);

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
(13, 49, 'UKA Tarsadia University', 'BMIIT', 'COMPUTER SCIENCE', 'B.TECH/B.E (CE)', NULL, NULL, 8.8, 5.5, 4.5, 5.5, 5.4, 5.5);

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
(5, 49, 4, NULL, 2, 13, NULL);

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
(1, 1, 'aa', 'aa', 'aa', 1, 1, 1, 1, 1, 1),
(2, 49, 'UKA Tarsadia University', 'BMIIT', 'DIPLOMA (CE)', 5.5, 8.5, 5.5, 4.5, 8.5, 6.5);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`ATTENDANCE_ID`, `ATTENDANCE_EVENT_ID`, `ATTENDANCE_STUDENT_ID`, `ATTENDANCE_FACULTY_ID`, `ATTENDANCE`) VALUES
(1, 1, 14, 5, 1),
(2, 1, 14, 5, 1),
(3, 1, 14, 5, 1),
(4, 1, 14, 5, 1),
(5, 2, 2, 2, 0),
(6, 1, 14, 5, 1),
(7, 1, 14, 5, 1),
(8, 1, 14, 5, 1),
(9, 1, 14, 5, 1),
(10, 1, 27, 5, 1),
(11, 1, 12, 5, 1),
(12, 1, 13, 5, 1),
(13, 1, 14, 5, 1),
(14, 1, 12, 5, 1),
(15, 1, 12, 5, 1),
(16, 1, 13, 5, 1),
(17, 1, 13, 5, 1),
(18, 1, 14, 5, 1),
(19, 1, 14, 5, 1),
(20, 1, 12, 5, 1),
(21, 1, 13, 5, 1),
(22, 1, 14, 5, 1),
(23, 1, 11, 5, 1),
(24, 1, 12, 5, 1),
(25, 1, 13, 5, 1),
(26, 1, 14, 5, 1),
(27, 1, 1, 1, 1),
(28, 1, 7, 5, 0),
(29, 1, 8, 5, 0),
(30, 1, 9, 5, 0),
(31, 1, 11, 5, 0),
(32, 1, 12, 5, 0),
(33, 1, 13, 5, 0),
(34, 1, 14, 5, 0),
(35, 1, 16, 5, 0),
(36, 1, 28, 5, 0),
(37, 1, 7, 5, 0),
(38, 1, 8, 5, 0),
(39, 1, 9, 5, 0),
(40, 1, 11, 5, 0),
(41, 1, 12, 5, 0),
(42, 1, 13, 5, 0),
(43, 1, 14, 5, 0),
(44, 1, 16, 5, 0),
(45, 1, 28, 5, 0),
(46, 1, 7, 5, 1),
(47, 1, 8, 5, 1),
(48, 1, 9, 5, 0),
(49, 1, 11, 5, 1),
(50, 1, 12, 5, 0),
(51, 1, 13, 5, 1),
(52, 1, 14, 5, 1),
(53, 1, 16, 5, 1),
(54, 1, 28, 5, 1),
(55, 1, 7, 5, 1),
(56, 1, 8, 5, 1),
(57, 1, 9, 5, 1),
(58, 1, 11, 5, 1),
(59, 1, 12, 5, 0),
(60, 1, 13, 5, 1),
(61, 1, 14, 5, 1),
(62, 1, 16, 5, 1),
(63, 1, 28, 5, 1),
(64, 3, 8, 5, 0),
(65, 3, 9, 5, 0),
(66, 3, 11, 5, 0),
(67, 3, 12, 5, 0),
(68, 3, 13, 5, 1),
(69, 3, 14, 5, 1),
(70, 3, 16, 5, 1),
(71, 3, 28, 5, 0),
(72, 3, 8, 5, 0),
(73, 3, 9, 5, 0),
(74, 3, 11, 5, 0),
(75, 3, 12, 5, 0),
(76, 3, 13, 5, 1),
(77, 3, 14, 5, 1),
(78, 3, 16, 5, 1),
(79, 3, 28, 5, 0),
(80, 12, 8, 5, 0),
(81, 12, 9, 5, 0),
(82, 12, 11, 5, 0),
(83, 12, 12, 5, 1),
(84, 12, 13, 5, 0),
(85, 12, 14, 5, 0),
(86, 12, 16, 5, 0),
(87, 12, 28, 5, 1),
(88, 6, 8, 5, 0),
(89, 6, 9, 5, 0),
(90, 6, 11, 5, 1),
(91, 6, 12, 5, 0),
(92, 6, 13, 5, 1),
(93, 6, 14, 5, 0),
(94, 6, 16, 5, 0),
(95, 6, 28, 5, 1),
(96, 6, 7, 5, 1),
(97, 6, 8, 5, 0),
(98, 6, 8, 5, 0),
(99, 6, 9, 5, 1),
(100, 6, 9, 5, 1),
(101, 6, 11, 5, 0),
(102, 6, 11, 5, 0),
(103, 6, 12, 5, 1),
(104, 6, 12, 5, 1),
(105, 6, 13, 5, 0),
(106, 6, 13, 5, 0),
(107, 6, 14, 5, 1),
(108, 6, 14, 5, 1),
(109, 6, 16, 5, 0),
(110, 6, 16, 5, 0),
(111, 6, 28, 5, 1),
(112, 6, 28, 5, 1),
(113, 6, 7, 5, 1),
(114, 6, 8, 5, 0),
(115, 6, 9, 5, 1),
(116, 6, 11, 5, 0),
(117, 6, 12, 5, 1),
(118, 6, 13, 5, 0),
(119, 6, 14, 5, 1),
(120, 6, 16, 5, 0),
(121, 6, 28, 5, 1),
(122, 10, 7, 5, 1),
(123, 10, 8, 5, 0),
(124, 10, 9, 5, 0),
(125, 10, 11, 5, 0),
(126, 10, 12, 5, 1),
(127, 10, 13, 5, 1),
(128, 10, 14, 5, 0),
(129, 10, 16, 5, 1),
(130, 10, 28, 5, 1);

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
(1, 'BMIIT', 'MSC(IT)', '2017', 4, 0, '0'),
(2, 'BMIIT', 'BSC(IT)', '2017', 6, 0, '0'),
(3, 'BMIIT', 'IMSC(IT)', '2017', 10, 0, '0'),
(4, 'CGPIT', 'BTECH(IT)', '2017', 8, 1, 'BA'),
(5, 'CGPIT', 'MTECH(IT)', '2017', 4, 0, '0'),
(6, 'SRIMCA', 'BCA', '2017', 6, 0, '0'),
(7, 'SRIMCA', 'IMCA', '2017', 10, 0, '0'),
(8, 'BMIIT', 'BSC(IT)', '2016', 6, 0, '0'),
(10, 'BMIIT', 'MSC(IT)', '2020', 4, 0, '0'),
(11, 'BMIIT', 'BSC(IT)', '2020', 10, 0, '0'),
(12, 'BMIIT', 'IMSC(IT)', '2020', 0, 0, '0'),
(13, 'BMIIT', 'MSC(IT)', '2021', 0, 0, '0'),
(14, 'BMIIT', 'BSC(IT)', '2021', 0, 0, '0'),
(15, 'BMIIT', 'IMSC(IT)', '2021', 0, 0, '0'),
(16, 'BMIIT', 'MSC(IT)', '2022', 0, 0, '0'),
(17, 'BMIIT', 'BSC(IT)', '2022', 0, 0, '0'),
(18, 'BMIIT', 'IMSC(IT)', '2022', 0, 0, '0'),
(19, 'BMIIT', 'MSC(IT)', '2023', 0, 0, '0'),
(20, 'BMIIT', 'BSC(IT)', '2023', 0, 0, '0'),
(21, 'BMIIT', 'IMSC(IT)', '2023', 0, 0, '0'),
(22, 'BMIIT', 'MSC(IT)', '2024', 0, 0, '0'),
(23, 'BMIIT', 'BSC(IT)', '2024', 0, 0, '0'),
(24, 'BMIIT', 'IMSC(IT)', '2024', 0, 0, '0'),
(25, 'BMIIT', 'MSC(IT)', '2025', 0, 0, '0'),
(26, 'BMIIT', 'BSC(IT)', '2025', 0, 0, '0'),
(27, 'BMIIT', 'IMSC(IT)', '2025', 0, 0, '0'),
(28, 'CGPIT', 'BTECH(IT)', '2020', 0, 0, '0'),
(29, 'CGPIT', 'MTECH(IT)', '2020', 0, 0, '0'),
(30, 'CGPIT', 'BTECH(IT)', '2021', 0, 0, '0'),
(31, 'CGPIT', 'MTECH(IT)', '2021', 0, 0, '0'),
(32, 'CGPIT', 'BTECH(IT)', '2022', 0, 0, '0'),
(33, 'CGPIT', 'MTECH(IT)', '2022', 0, 0, '0'),
(34, 'CGPIT', 'BTECH(IT)', '2023', 0, 0, '0'),
(35, 'CGPIT', 'MTECH(IT)', '2023', 0, 0, '0'),
(36, 'CGPIT', 'BTECH(IT)', '2024', 0, 0, '0'),
(37, 'CGPIT', 'MTECH(IT)', '2024', 0, 0, '0'),
(38, 'CGPIT', 'BTECH(IT)', '2025', 0, 0, '0'),
(39, 'CGPIT', 'MTECH(IT)', '2025', 0, 0, '0'),
(40, 'SRIMCA', 'MCA', '2020', 0, 0, '0'),
(41, 'SRIMCA', 'BCA', '2020', 0, 0, '0'),
(42, 'SRIMCA', 'IMCA', '2020', 0, 0, '0'),
(43, 'SRIMCA', 'MCA', '2021', 0, 0, '0'),
(44, 'SRIMCA', 'BCA', '2021', 0, 0, '0'),
(45, 'SRIMCA', 'IMCA', '2021', 0, 0, '0'),
(46, 'SRIMCA', 'MCA', '2022', 0, 0, '0'),
(47, 'SRIMCA', 'BCA', '2022', 0, 0, '0'),
(48, 'SRIMCA', 'IMCA', '2022', 0, 0, '0'),
(49, 'SRIMCA', 'MCA', '2023', 0, 0, '0'),
(50, 'SRIMCA', 'BCA', '2023', 0, 0, '0'),
(51, 'SRIMCA', 'IMCA', '2023', 0, 0, '0'),
(52, 'SRIMCA', 'MCA', '2024', 0, 0, '0'),
(53, 'SRIMCA', 'BCA', '2024', 0, 0, '0'),
(54, 'SRIMCA', 'IMCA', '2024', 0, 0, '0'),
(55, 'SRIMCA', 'MCA', '2025', 0, 0, '0'),
(56, 'SRIMCA', 'BCA', '2025', 0, 0, '0'),
(57, 'SRIMCA', 'IMCA', '2025', 0, 0, '0');

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
  `COMPANY_IMAGES` varchar(255) DEFAULT NULL,
  `COMPANY_HR_NAME` varchar(50) NOT NULL,
  `COMPANY_HR_EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`COMPANY_ID`, `COMPANY_NAME`, `COMPANY_REGISTERED_YEAR`, `COMPANY_ADDRESS`, `COMPANY_EMAIL`, `COMPANY_PHONE_NUMBER_1`, `COMPANY_PHONE_NUMBER_2`, `COMPANY_WEBSITE`, `COMPANY_ACCEPTED`, `COMPANY_PASSWORD`, `COMPANY_LOGO`, `COMPANY_ABOUT`, `COMPANY_TECHNOLOGIES`, `COMPANY_NO_OF_EMPLOYEES`, `COMPANY_MAXIMUM_PACKAGE`, `COMPANY_MINIMUM_PACKAGE`, `COMPANY_IMAGES`, `COMPANY_HR_NAME`, `COMPANY_HR_EMAIL`) VALUES
(1, 'LA NET', '1999', 'SURAT', 'lanet@gmail.com', '5544663322', '4455663322', 'akbfdhjabfhb', '1', '123456', '', '', '', 0, 0, 0, '', '', ''),
(2, 'ssm', '1995', 'surat', 'ssm', '1236547890', '1236547890', 'ssm', '0', 'ssm', '', '', '', 0, 0, 0, '', '', ''),
(3, 'g', 'g', 'g', 'g', 'g', 'g', 'g', '0', 'de83473b9dd6e0a394e024b72af2ebd9420add05', '', '', '', 0, 0, 0, '', '', ''),
(4, 'Tech Code', '1999', 'Surat', 'Tech@gmail.com', '2255663311', '2255663311', 'lsjkfdsd', '0', '87541a580eda8bf760776b844c7bb1db57aa0ed7', 'tech', 'gg', 'java,python', 50, 200000, 100000, 'this', 'manav ', 'm@gmail.com'),
(5, 'ssm', '2019', 'surat', 'ssm@gmail.com', '7896541230', '7896541230', 'ansfn', '0', '9574ef5c32ab0006766942fb1efddf7ad4451931', 'hhh', 'akjsdn', 'java,php', 50, 1000000, 200000, 'n', 'rahul', 'rahul@gmail.com'),
(6, 'technolab', '1995', 'surat', 'technolab@gmail.com', '7896321450', '7896321450', 'addsd', '0', 'cc27222d19a7d26919d8097ebf86441b9a0960a8', 'adfasdd', 'ads', 'ads', 55, 5, 5, 'was', 'asd', 'ad'),
(7, 'tech', '2019', 'surat', 'ssm@gmail.com', '123', '123', 'ajwdjb', '0', 'abc', 'isbdfubd', 'skjdbf', 'java,php', 50, 200000, 100000, 'skjnf', 'raj', 'sdfbsfb'),
(8, 'abc', '1234', 'abc', 'abc@pqr.xyz', '123456789', '987654321', 'www.abc.xyz', '0', '3f98da675e0d63bd728813fc59cc48c0964597a5', 'dhcbmab', 'ahdcbjh', 'sdjck', 123, 123, 123, '1231654dcdcadc', 'adcasc', 'djchbajhdcb'),
(9, 'yashtech', '5555', 'surat', 'tect@gmail.com', '5566332211', '5566332211', 'sldknfq', 'P', 'e8c191ba34b9a0da5dab5faa6eb9b5bf545d11c8', 'laksndalksn', 'lskdn', 'slkdn', 50, 20, 200, 'skjbf', 'skjdf', 'skjdb'),
(10, 'THis', '5632', 'hbfahb', 'm@gmail.com', '6546', '65464', 'akbwdbbjk', 'A', '7936ea038b7111d89907c0b141d3cf5ed060f375', 'sn df', 'skdf', 'sk d ', 50, 50, 100, 'akw', 'akjwdn', 'kjdn'),
(21, 'Code Part', '1994', 'Pipload Surat, Gujarat, India', '17bmiit032@gmail.com', '1478523690', '1203654789', 'www.codepart.com', 'P', 'e0da99a335c60e640bc3701b8fdf615339eb738f', 'Screenshot (1).png', 'This For Testing Company', 'CShrap#nodejs#ruby#django#Android#CakePHP', 20, 2000000, 100000, 'null', 'Raju Bhagat', 'Raju@gmail.com'),
(23, 'TECH CODER TECH', '2020', 'Surat Sydney NSW, Australia                                                                  ', 'manavshah712@gmail.com', '1236547890', '1236547890', 'f', 'A', '2a1b88ddbca90f7861c0d5617b710cb015591b3b', 'IMG_6102.JPG', 'This is testing                                                                  ', 'CShrap#C+#nodejs#angjs', 5, 1200, 1200, 'null', 'g', 'gam@gmail.com'),
(24, 'viK', '1234', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'P', 'e4a93405885b9283204444c024491eb8a2b6cee4', 'ABC', 'ABC', 'ABC', 123, 123, 123, 'ABC', 'ABC', 'ABC'),
(25, 'a', '55', 'abc', 'A@GMAIL.COM', '123', '122', 'A', 'R', 'd3addbf2ec82655e2382e0a6e3ae92a2671cfd5c', 'J', 'J', 'J', 5, 5, 5, 'D', '5', '5'),
(26, 'Tech Code', '2015', '', '', '', '', '', 'A', '7163f8542c500e30c6f5229a0804650613ada933', '', '', '', 0, 0, 0, '', '', ''),
(27, 't', '2', 'surat', 'e@gmail.com', '123', '123', 'ww', 'A', '2bb7e58bfaeb9cfd410c276448fc31de4533ffd9', 'h', 'h', 'h', 50, 20, 20, 'h', 'h', 'g'),
(28, 'Vikrant Company', '2010', 'Surat Surabaya, Surabaya City, East Java, Indonesia', 'manavshah712@gmail.com', '1236547000', '1236547000', 'www.vik.com', 'R', 'd5e99c4d5816b00a714f5197460dee5dabc3cc26', 'IMG_20181111_103257400_HDR.jpg', 'This is for testing', 'CShrap#C+#nodejs', 50, 40, 20, 'null', 'First Compnay', 'First@gmail.com'),
(29, 'Vikrant Code', '2001', 'Surat Surat', 'vikrantch123@gmail.com', '1111111111', '2222222222', 'Vikrant.com', 'A', 'a0d3314d112098ffbed84c07696620e042e3fb7d', 'Screenshot (4).png', 'This', 'ruby#django#IOS', 2, 4000, 3000, 'null', 'Vikrant Shah', 'vikrant@gmail.com');

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
(2, 9, 23, 'BD', '318344 CamScanner 04-24-2020 19.15.49.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_placement_list`
--

CREATE TABLE `tbl_company_placement_list` (
  `COMPANY_PLACEMENT_LIST_ID` int(11) NOT NULL,
  `COMPANY_PLACEMENT_LIST_COMPANY_ID` int(11) NOT NULL,
  `COMPANY_PLACEMENT_LIST_YEAR` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company_placement_list`
--

INSERT INTO `tbl_company_placement_list` (`COMPANY_PLACEMENT_LIST_ID`, `COMPANY_PLACEMENT_LIST_COMPANY_ID`, `COMPANY_PLACEMENT_LIST_YEAR`) VALUES
(1, 2, '2020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `DOCUMENT_ID` int(11) NOT NULL,
  `DOCUMENT_UPLOADER_ID` int(11) NOT NULL,
  `DOCUMENT_UPLOADER_TYPE` char(2) NOT NULL,
  `DOCUMENT_TYPE` char(2) NOT NULL,
  `DOCUMENT_UPLOAD_TIME_STAMP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DOCUMENT_BATCH_ID` int(11) NOT NULL,
  `DOCUMENT_NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`EVENT_ID`, `EVENT_COMPANY_ID`, `EVENT_GENRATED_BY`, `EVENT_NAME`, `EVENT_DESCRIPTION`, `EVENT_VENUE`, `EVENT_DATE`, `EVENT_BATCH_ID`, `EVENT_TIME`, `EVENT_TYPE`, `EVENT_CATEGORY`, `EVENT_CANCLED`) VALUES
(1, 0, 5, 'Placement', 'For Exam', 'Surat', '2020-02-13', '7', '07:00:00', 'SM', 0, 0),
(2, 0, 5, 'Placement', 'For Exam', 'Surat', '2020-02-13', '7', '07:00:00', 'PR', 0, 0),
(3, 0, 5, 'Pla', 'BMIIT PL TEST', 'BMIIT', '2020-02-05', '2', '07:00:00', 'IP', 1, 0),
(4, 0, 5, 'Resume Writing', 'Resume Writing', 'BMIIT', '2020-02-27', '10', '08:00:00', 'PP', 1, 1),
(5, 0, 5, 'VIKRANT', 'sljfvlsdjv', 'sljdvnsl', '2020-02-07', '2', '12:00:00', 'TS', 0, 0),
(6, 0, 5, 'Test Placement ', 'Nothing', 'Surat', '2020-02-12', '2', '07:00:00', 'PP', 1, 0),
(7, 0, 5, 'Unit Test For Placement', 'Unit Test', 'Surat', '2020-02-29', '2', '07:00:00', 'TS', 0, 0),
(8, 0, 5, 'MANAV', 'ksdjcj', 'sjfvnjdfnv', '2020-02-15', '1', '09:00:00', 'PP', 1, 0),
(9, 0, 5, 'Something Is Worng', 'Something Is Worng..........', 'Bmiit', '0000-00-00', '10', '07:00:00', 'SM', 1, 1),
(10, 0, 5, 'Some thing is really worng', 'Some thing is really', 'BMIIT', '0000-00-00', '2', '12:00:00', 'SM', 1, 1),
(11, 0, 5, 'This may be Right', 'Right eoght ', 'skdj', '0000-00-00', '2', '09:00:00', 'SM', 1, 0),
(12, 0, 5, 'MANAV', 'Bhai bHai', 'skvjb', '0000-00-00', '2', '07:00:00', 'SM', 0, 0),
(13, 0, 5, 'sfjv', 'ksdjbc', 'ksncb', '2020-02-29', '2', '07:00:00', 'SM', 1, 1),
(14, 0, 5, 'Manav Bhai', 'Ssfhvavsdjv', 'slkndflkqn', '2020-02-13', '7', '08:35:00', 'TS', 1, 0),
(15, 23, 5, 'Resume Writing 1', 'Kuch Sikho Tattu o', 'Baap Ki dukan', '2020-02-29', '2', '08:48:00', 'TS', 1, 0),
(16, 0, 5, 'ABC', 'ABC', 'ABC', '2020-02-29', '2', '20:50:00', 'CM', 1, 1),
(17, 0, 5, 'ABC', 'ABC', 'ABC', '2020-02-29', '2', '20:50:00', 'CM', 0, 0),
(18, 0, 5, 'ABC', 'ABC', 'ABC', '2020-02-29', '2', '20:50:00', 'CM', 0, 0),
(19, 0, 5, 'ABC', 'ABC', 'ABC', '2020-02-29', '2', '20:50:00', 'CM', 0, 0),
(20, 0, 5, 'ABC', 'ABC', 'ABC', '2020-02-29', '2', '20:50:00', 'CM', 0, 1),
(21, 0, 5, 'aaa', 'abc abc abc abc a', 'aaa', '2020-06-30', '2', '12:12:00', 'SM', 1, 0),
(22, 23, 5, 'PIWAT', 'PI AND WAT', 'ADAJAN', '2020-04-08', '2', '07:00:00', 'SM', 0, 0),
(23, 23, 5, 'TECHNICAL ROUND', 'TECHNICAL PI & WAT', 'SURAT', '2020-04-08', '2', '07:00:00', 'SM', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event_application`
--

CREATE TABLE `tbl_event_application` (
  `EVENT_APPLICATION_ID` int(11) NOT NULL,
  `EVENT_APPLICATION_STUDENT_ID` int(11) NOT NULL,
  `EVENT_APPLICATION_EVENT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_event_application`
--

INSERT INTO `tbl_event_application` (`EVENT_APPLICATION_ID`, `EVENT_APPLICATION_STUDENT_ID`, `EVENT_APPLICATION_EVENT_ID`) VALUES
(1, 14, 7),
(2, 49, 12);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`FACULTY_ID`, `FACULTY_FIRST_NAME`, `FACULTY_LAST_NAME`, `FACULTY_GENDER`, `FACULTY_EMAIL`, `FACULTY_PHONE_NUMBER`, `FACULTY_ABOUT`, `FACULTY_PROFILE_PIC`, `FACULTY_ACCEPTED`, `FACULTY_PASSWORD`, `FACULTY_ROLE`) VALUES
(2, 'vikrant', 'shah', 'm', 'vik', '1236547890', 'dfdsf', 'dfsdf', 'A', 'ed74e2b50f66230da8fe57f550e1184abd53b9be', 'CM'),
(3, 'a', 'b', 'c', 'd', 'w', 'q', 'q', '0', '0061482c3ed99635abda4f2ef7bc16671464540b', 'FC'),
(4, 'cm', 'cm', 'c', 'cm', 'cm', 'cm', 'cm', 'A', '731f0124ee47edc169ba71c002bdecfe3fc92655', 'CM'),
(5, 'Bhumika', 'Patel', 'M', 'manavshah712@gmail.com', '5566332211', 'dd', 'IMG_6104.JPG', '0', '85662e4a07150a53a1daeaed9163b53ee792909e', 'CH'),
(6, 'a', 'b', 'M', 'a@b.c', '9876543221', 'ksdckdhc', '', '0', '4c3aae9a5dfd60cac9c18b3a67fa003c6fefbab5', 'FC'),
(7, 'a', 'b', 'M', 'a@b.c', '9876543000', 'kdjvbkdjvbks', 'IMG_6104.JPG', '0', 'f0462b81e336e68cb984da9236120e8466e10400', 'FC'),
(8, 'abcd', 'ajkdbck', 'M', 'a@b.c', '6535', 'sdobsdkc', '', '0', '4e8ba46c509a6f61fdb496c7e9f60725e290c382', 'FC'),
(10, 'bbchs', 'kajdnc', 'M', 'abc@gmail.com', '9846', 'ahdvbcjzhd', 'IMG_6116.JPG', '0', '28057849edf57fec36bbea63e3878d0187b5e294', 'FC'),
(11, 'kunal', 'shah', 'm', 'kunal@gmail.com', '7896541230', 'kahbd', 'kabsd', '0', 'b1c00dc8abedbf931ecf99cf761eba8a74a7a355', 'FC'),
(12, 'VK', 'SH', 'M', 'mnv@mnc.mnc', '987654321', 'jdvnkjfnvk', 'sf,vn,sfmb', 'A', '238ad94aaa6bca5e2591148f32b542e20632b14a', 'FC'),
(15, 'Manav ', 'Shah', 'M', 'manavshah712@gmail.com', '1236547890', 'This For Faculty', 'IMG_6125.JPG', 'A', '5bb341f3206c243d409f5df7e6eb53626fe3d1a7', 'FC'),
(17, 'ss', 'ss', 'm', 'm@gmail.com', '789654123', 's', 'j', 'p', 'cb9b8ab917479fb57792a9b5d2d7a81f9b1e928b', 'FC'),
(18, 'g', 'g', 'M', 'manavshah712@gmail.com', '4444444444', '\r\nt', 'IMG-20181111-WA0001.jpg', 'p', '641afe8146455cd4706d6d5bb87768fcf6c6bc44', 'FC'),
(19, 'Raj', 'Patel', 'm', 'm@gmail.com', '5555555555', 'd', '5', 'A', '11b726c19819b89175797e23463e50a3c17d4fc2', 'FC'),
(20, 'REBOOT ', 'IT', 'M', 'rebootitsolutions13@gmail.com', '7777777777', 'Tis ', 'Screenshot (14).png', 'A', 'aacbf2d0a8102b3bd7d297dd0ca48b2df5fe772f', 'FC'),
(21, 'Manav', 'Shah', 'F', 'manav@shah.com', '9999999999', 'Load pad vanu machine', 'a', 'A', 'a563e6577af456ff2201f101ad0444ccda3e7da2', 'FC');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`LOGIN_ID`, `LOGIN_REFERENCE_ID`, `LOGIN_USER_TYPE`, `LOGIN_USER_EMAIL`, `LOGIN_USER_PHONE_NUMBER`, `LOGIN_USER_PASSWORD`, `LOGIN_USER_SALT`) VALUES
(7, 8, 'ST', 'm', '5', 'a7c91fc816c35de52c422a97d7fcb88026696605', 'wnctprpyybgecxiw'),
(9, 2, 'CM', 'vik', '1236547890', 'ed74e2b50f66230da8fe57f550e1184abd53b9be', 'sxnvnfkmcbyqjvde'),
(10, 3, 'CM', 'd', 'w', '0061482c3ed99635abda4f2ef7bc16671464540b', 'vifyexedbtvulwzj'),
(12, 4, 'CM', 'cm', 'cm', '731f0124ee47edc169ba71c002bdecfe3fc92655', 'tprpyzcmeifbmklb'),
(13, 9, 'ST', 'dd', 'dd', '96548c98770faf0af386d59beb52dbea51e63c11', 'bxmscgydrabfwvlu'),
(17, 5, 'CH', '17bmiit062@gmail.com', '5566332211', '85662e4a07150a53a1daeaed9163b53ee792909e', 'kqxtcbawkhirmknl'),
(18, 6, 'FC', 'a@b.c', '9876543221', '4c3aae9a5dfd60cac9c18b3a67fa003c6fefbab5', 'hedzpbkyozfbosyq'),
(19, 7, 'FC', 'a@b.c', '9876543000', 'f0462b81e336e68cb984da9236120e8466e10400', 'tigjyuejjrhljnny'),
(20, 8, 'FC', 'a@b.c', '6535', '4e8ba46c509a6f61fdb496c7e9f60725e290c382', 'qssmeltkrfbpuenc'),
(21, 9, 'FC', 'a@b.c', '', '41dca26abab6366d2305bee1e948431988badb2f', 'ecbyqhowsxoajvzn'),
(22, 10, 'FC', 'abc@gmail.com', '9846', '28057849edf57fec36bbea63e3878d0187b5e294', 'ddhagffkktrachgj'),
(23, 13, 'ST', '201706100110032', '5566332211', 'ecc9c6848985b8a6c783911761484eb949f540c3', 'sdkrevquaqfdxfhv'),
(25, 14, 'ST', 'ricky@gmail.com', '5566332211', '372f12fa47dfeda9024e2def63aad676ecfd9f26', 'xgkjqbgdvvsawlqs'),
(27, 11, 'FC', 'kunal@gmail.com', '7896541230', 'b1c00dc8abedbf931ecf99cf761eba8a74a7a355', 'xtdfsypgiufmwwui'),
(31, 15, 'ST', 'abc@def.abc', '8469082432', 'b076fea2e0015bdaebcf5f2bf20949770224fe24', 'ojdomsdkqbhjubvb'),
(32, 12, 'FC', 'mnv@mnc.mnc', '987654321', '238ad94aaa6bca5e2591148f32b542e20632b14a', 'gljpyywnwybjtrdn'),
(46, 16, 'ST', 'man@gmail.com', '8520', '3a8e3995c765a73de092636d8d4ad96155c31c2a', 'cqacimjlcenbtpro'),
(54, 15, 'FC', 'manavshah712@gmail.com', '1236547890', '5bb341f3206c243d409f5df7e6eb53626fe3d1a7', 'rspxswgmulvvsays'),
(63, 28, 'ST', 'kjhg', 'kjhgj', '4cb2c88a6baf419d9e5a89efc463a32557922e03', 'qzzyudelshisrgdy'),
(82, 23, 'CP', 'manavshah712@gmail.com', '1236547890', '2a1b88ddbca90f7861c0d5617b710cb015591b3b', 'czqhmojeqrmjlbwi'),
(84, 17, 'FC', 'm@gmail.com', '789654123', 'cb9b8ab917479fb57792a9b5d2d7a81f9b1e928b', 'jvcypainrwgpjzud'),
(85, 18, 'FC', 'manavshah712@gmail.com', '4444444444', '641afe8146455cd4706d6d5bb87768fcf6c6bc44', 'xsvctsgakwhueicn'),
(86, 24, 'CP', 'ABC', 'ABC', 'e4a93405885b9283204444c024491eb8a2b6cee4', 'fcwdbsmhwqovnedf'),
(87, 25, 'CP', 'A@GMAIL.COM', '123', 'd3addbf2ec82655e2382e0a6e3ae92a2671cfd5c', 'ryubvdbtskskvaot'),
(88, 19, 'FC', 'm@gmail.com', '5555555555', '11b726c19819b89175797e23463e50a3c17d4fc2', 'xqkcfvpmngqmlusd'),
(89, 26, 'CP', '', '', '7163f8542c500e30c6f5229a0804650613ada933', 'ptzpdsiitvvrwkil'),
(90, 27, 'CP', 'e@gmail.com', '123', '2bb7e58bfaeb9cfd410c276448fc31de4533ffd9', 'kbaxozhlkrgffmvr'),
(91, 28, 'CP', 'manavshah712@gmail.com', '1236547000', 'd5e99c4d5816b00a714f5197460dee5dabc3cc26', 'yhpcpuekldfsxkil'),
(92, 48, 'ST', 'A', 'A', '5a53bec34d6a24ce8d09ba25a2341b07544f6f8a', 'lbxlmcwedelrdnix'),
(93, 20, 'FC', 'rebootitsolutions13@gmail.com', '7777777777', 'aacbf2d0a8102b3bd7d297dd0ca48b2df5fe772f', 'eoiywklxjysvwzhj'),
(94, 29, 'CP', 'vikrantch123@gmail.com', '1111111111', 'a0d3314d112098ffbed84c07696620e042e3fb7d', 'lurbeqtutlwctmgq'),
(95, 21, 'FC', 'manav@shah.com', '9999999999', 'a563e6577af456ff2201f101ad0444ccda3e7da2', 'encuvsbcjotcbcep'),
(96, 49, 'ST', 'ricky@gmail.com', '5566332211', '9bc3b266c4ee8bafe0d8d3cb228dcd3eba6d4489', 'szvfofgqljmgvlqy');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(21, 2, 16, 34);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materials`
--

CREATE TABLE `tbl_materials` (
  `MATERIALS_ID` int(11) NOT NULL,
  `MATERIALS_TITLE` varchar(50) NOT NULL,
  `MATERIALS_TYPE` char(2) NOT NULL,
  `MATERIALS_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_materials`
--

INSERT INTO `tbl_materials` (`MATERIALS_ID`, `MATERIALS_TITLE`, `MATERIALS_TYPE`, `MATERIALS_NAME`) VALUES
(1, 'Plcement Test', 'RW', ''),
(2, 'F', 'F', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`NOTIFICATION_ID`, `NOTIFICATION_EVENT_ID`, `NOTIFICATION_SENDER_ID`, `NOTIFICATION_RECEIVER_ID`, `NOTIFICATION_SENDER_TYPE`, `NOTIFICATION_RECIVER_TYPE`, `NOTIFICATION_TIME_STAMP`, `NOTIFICATION_TYPE`, `NOTIFICATION_DESCRPTION`, `NOTIFICATION_REMOVE_STATUS`) VALUES
(3, 0, 22, 5, 'CP', 'CH', '2020-02-11 07:16:25', 'REGIS', 'Newly Registered User', 1),
(4, 0, 12, 5, 'FC', 'CH', '2020-02-11 10:10:46', 'REGIS', 'Newly Registered User', 0),
(5, 0, 15, 5, 'FC', 'CH', '2020-02-11 10:10:59', 'REGIS', 'Newly Registered User', 0),
(7, 0, 25, 5, 'CP', 'CH', '2020-02-11 10:20:00', 'REGIS', 'Newly Registered User', 0),
(8, 0, 19, 5, 'FC', 'CH', '2020-02-11 10:26:21', 'REGIS', 'Newly Registered User', 0),
(9, 0, 26, 5, 'CP', 'CH', '2020-02-11 12:17:17', 'REGIS', 'Newly Registered User', 0),
(10, 0, 27, 5, 'CP', 'CH', '2020-02-11 13:20:32', 'REGIS', 'Newly Registered User', 0),
(11, 11, 28, 5, 'CP', 'CH', '2020-02-11 13:26:18', 'REGIS', 'Newly Registered User', 0),
(12, 12, 5, 49, 'CH', 'ST', '2020-02-12 13:13:38', 'MEVNT', 'New Event: RESUME', 1),
(13, 13, 5, 49, 'CH', 'ST', '2020-02-12 13:15:03', 'AEVNT', 'New Event: RESUME2', 0),
(14, 14, 5, 49, 'CH', 'ST', '2020-02-12 13:21:49', 'MEVNT', 'New Event: RES', 0),
(15, 0, 5, 28, '0', 'ST', '2020-02-12 13:31:16', 'AEVNT', 'New Event: VIKRANT', 0),
(16, 0, 5, 13, 'CH', 'ST', '2020-02-12 13:37:18', 'MEVNT', 'New Event: Test Placement ', 0),
(17, 0, 5, 14, 'CH', 'ST', '2020-02-12 13:37:18', 'MEVNT', 'New Event: Test Placement ', 0),
(18, 0, 5, 13, 'CH', 'ST', '2020-02-12 13:40:18', 'MEVNT', 'New Event: Unit Test For Placement', 0),
(19, 0, 5, 14, 'CH', 'ST', '2020-02-12 13:40:18', 'MEVNT', 'New Event: Unit Test For Placement', 1),
(20, 8, 5, 28, 'CH', 'ST', '2020-02-12 14:34:48', 'MEVNT', 'New Event: MANAV', 0),
(21, NULL, 5, 2, 'CH', 'CP', '2020-02-13 13:57:54', 'RECOM', 'Testing', 0),
(22, NULL, 5, 10, 'CH', 'CP', '2020-02-13 13:59:53', 'RECOM', 'TEst', 0),
(23, NULL, 5, 5, 'CH', 'ST', '2020-02-15 18:23:47', 'TESTS', 'sdlndlkncsldknclsdknclsdnclsdknclsn', 0),
(24, NULL, 20, 5, 'FC', 'CH', '2020-02-17 19:39:47', 'REGIS', 'Newly Registered User', 0),
(25, NULL, 29, 5, 'CP', 'CH', '2020-02-17 20:42:51', 'REGIS', 'Newly Registered User', 1),
(26, 11, 5, 11, 'CH', 'ST', '2020-02-20 04:49:46', 'MEVNT', 'New Event: This may be Right', 0),
(27, 11, 5, 12, 'CH', 'ST', '2020-02-20 04:49:46', 'MEVNT', 'New Event: This may be Right', 0),
(28, 11, 5, 13, 'CH', 'ST', '2020-02-20 04:49:46', 'MEVNT', 'New Event: This may be Right', 0),
(29, 11, 5, 14, 'CH', 'ST', '2020-02-20 04:49:46', 'MEVNT', 'New Event: This may be Right', 0),
(30, 11, 5, 16, 'CH', 'ST', '2020-02-20 04:49:46', 'MEVNT', 'New Event: This may be Right', 0),
(31, 10, 5, 2, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(32, 10, 5, 3, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(33, 10, 5, 4, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(34, 10, 5, 5, 'CH', 'CH', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(35, 10, 5, 6, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(36, 10, 5, 7, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(37, 10, 5, 8, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(38, 10, 5, 9, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(39, 10, 5, 10, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(40, 10, 5, 11, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(41, 10, 5, 12, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(42, 10, 5, 15, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(43, 10, 5, 17, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(44, 10, 5, 18, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(45, 10, 5, 19, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(46, 10, 5, 20, 'CH', 'FC', '2020-02-20 07:52:25', 'MEVNT', 'New Event: BAD', 1),
(47, NULL, 1, 5, 'FC', 'CH', '2020-02-21 03:52:31', 'REGIS', 'Newly Registered User', 1),
(48, NULL, 21, 5, 'FC', 'CH', '2020-02-21 04:35:22', 'REGIS', 'Newly Registered User', 1),
(49, 10, 5, 21, 'CH', 'FC', '2020-02-21 04:49:08', 'MEVNT', 'jsdgvchdbcbh', 1),
(50, 13, 5, 11, 'Ch', 'ST', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(51, 13, 5, 12, 'Ch', 'ST', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(52, 13, 5, 13, 'Ch', 'ST', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(53, 13, 5, 14, 'Ch', 'ST', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(54, 13, 5, 16, 'Ch', 'ST', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(55, 13, 5, 2, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(56, 13, 5, 3, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(57, 13, 5, 4, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(58, 13, 5, 5, 'Ch', 'CH', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(59, 13, 5, 6, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(60, 13, 5, 7, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(61, 13, 5, 8, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(62, 13, 5, 9, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(63, 13, 5, 10, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(64, 13, 5, 11, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(65, 13, 5, 12, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(66, 13, 5, 15, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(67, 13, 5, 17, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(68, 13, 5, 18, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(69, 13, 5, 19, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(70, 13, 5, 20, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(71, 13, 5, 21, 'Ch', 'FC', '2020-02-24 08:22:44', 'MEVNT', 'New Event: sfjv', 1),
(72, 14, 5, 2, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(73, 14, 5, 3, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(74, 14, 5, 4, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(75, 14, 5, 5, 'CH', 'CH', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(76, 14, 5, 6, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(77, 14, 5, 7, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(78, 14, 5, 8, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(79, 14, 5, 9, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(80, 14, 5, 10, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(81, 14, 5, 11, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(82, 14, 5, 12, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(83, 14, 5, 15, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(84, 14, 5, 17, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(85, 14, 5, 18, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(86, 14, 5, 19, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(87, 14, 5, 20, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(88, 14, 5, 21, 'CH', 'FC', '2020-02-24 08:43:29', 'MEVNT', 'New Event: Manav Bhai', 0),
(89, 15, 5, 11, 'CH', 'ST', '2020-02-24 08:48:23', 'AEVNT', 'New Event: Resume Writing 1', 0),
(90, 15, 5, 12, 'CH', 'ST', '2020-02-24 08:48:23', 'AEVNT', 'New Event: Resume Writing 1', 0),
(91, 15, 5, 13, 'CH', 'ST', '2020-02-24 08:48:23', 'AEVNT', 'New Event: Resume Writing 1', 0),
(92, 15, 5, 14, 'CH', 'ST', '2020-02-24 08:48:23', 'AEVNT', 'New Event: Resume Writing 1', 0),
(93, 15, 5, 16, 'CH', 'ST', '2020-02-24 08:48:23', 'AEVNT', 'New Event: Resume Writing 1', 0),
(94, 15, 5, 5, 'CH', 'CH', '2020-02-24 08:48:23', 'AEVNT', 'New Event: Resume Writing 1', 0),
(95, 16, 5, 11, 'CH', 'ST', '2020-02-24 08:50:36', 'AEVNT', 'New Event: ABC', 1),
(96, 16, 5, 12, 'CH', 'ST', '2020-02-24 08:50:36', 'AEVNT', 'New Event: ABC', 1),
(97, 16, 5, 13, 'CH', 'ST', '2020-02-24 08:50:36', 'AEVNT', 'New Event: ABC', 1),
(98, 16, 5, 14, 'CH', 'ST', '2020-02-24 08:50:36', 'AEVNT', 'New Event: ABC', 1),
(99, 16, 5, 16, 'CH', 'ST', '2020-02-24 08:50:36', 'AEVNT', 'New Event: ABC', 1),
(100, 16, 5, 5, 'CH', 'CH', '2020-02-24 08:50:36', 'AEVNT', 'New Event: ABC', 1),
(101, 17, 5, 11, 'CH', 'ST', '2020-02-24 08:55:39', 'AEVNT', 'New Event: ABC', 0),
(102, 17, 5, 12, 'CH', 'ST', '2020-02-24 08:55:39', 'AEVNT', 'New Event: ABC', 0),
(103, 17, 5, 13, 'CH', 'ST', '2020-02-24 08:55:39', 'AEVNT', 'New Event: ABC', 0),
(104, 17, 5, 14, 'CH', 'ST', '2020-02-24 08:55:39', 'AEVNT', 'New Event: ABC', 0),
(105, 17, 5, 16, 'CH', 'ST', '2020-02-24 08:55:39', 'AEVNT', 'New Event: ABC', 0),
(106, 17, 5, 5, 'CH', 'CH', '2020-02-24 08:55:39', 'AEVNT', 'New Event: ABC', 0),
(107, 18, 5, 11, 'CH', 'ST', '2020-02-24 08:56:38', 'AEVNT', 'New Event: ABC', 0),
(108, 18, 5, 12, 'CH', 'ST', '2020-02-24 08:56:38', 'AEVNT', 'New Event: ABC', 0),
(109, 18, 5, 13, 'CH', 'ST', '2020-02-24 08:56:38', 'AEVNT', 'New Event: ABC', 0),
(110, 18, 5, 14, 'CH', 'ST', '2020-02-24 08:56:38', 'AEVNT', 'New Event: ABC', 0),
(111, 18, 5, 16, 'CH', 'ST', '2020-02-24 08:56:38', 'AEVNT', 'New Event: ABC', 0),
(112, 18, 5, 5, 'CH', 'CH', '2020-02-24 08:56:38', 'AEVNT', 'New Event: ABC', 0),
(113, 19, 5, 11, 'CH', 'ST', '2020-02-24 08:57:21', 'AEVNT', 'New Event: ABC', 0),
(114, 19, 5, 12, 'CH', 'ST', '2020-02-24 08:57:21', 'AEVNT', 'New Event: ABC', 0),
(115, 19, 5, 13, 'CH', 'ST', '2020-02-24 08:57:21', 'AEVNT', 'New Event: ABC', 0),
(116, 19, 5, 14, 'CH', 'ST', '2020-02-24 08:57:21', 'AEVNT', 'New Event: ABC', 0),
(117, 19, 5, 16, 'CH', 'ST', '2020-02-24 08:57:21', 'AEVNT', 'New Event: ABC', 0),
(118, 19, 5, 5, 'CH', 'CH', '2020-02-24 08:57:21', 'AEVNT', 'New Event: ABC', 0),
(119, 20, 5, 11, 'CH', 'ST', '2020-02-24 08:58:35', 'AEVNT', 'New Event: ABC', 1),
(120, 20, 5, 12, 'CH', 'ST', '2020-02-24 08:58:35', 'AEVNT', 'New Event: ABC', 1),
(121, 20, 5, 13, 'CH', 'ST', '2020-02-24 08:58:35', 'AEVNT', 'New Event: ABC', 1),
(122, 20, 5, 14, 'CH', 'ST', '2020-02-24 08:58:35', 'AEVNT', 'New Event: ABC', 1),
(123, 20, 5, 16, 'CH', 'ST', '2020-02-24 08:58:35', 'AEVNT', 'New Event: ABC', 1),
(124, 20, 5, 5, 'CH', 'CH', '2020-02-24 08:58:35', 'AEVNT', 'New Event: ABC', 1),
(125, 21, 5, 7, 'CH', 'ST', '2020-03-04 06:47:20', 'MEVNT', 'New Event: Ricky\'s Company Visit', 0),
(126, 21, 5, 8, 'CH', 'ST', '2020-03-04 06:47:20', 'MEVNT', 'New Event: Ricky\'s Company Visit', 0),
(127, 21, 5, 9, 'CH', 'ST', '2020-03-04 06:47:20', 'MEVNT', 'New Event: Ricky\'s Company Visit', 0),
(128, 21, 5, 11, 'CH', 'ST', '2020-03-04 06:47:20', 'MEVNT', 'New Event: Ricky\'s Company Visit', 0),
(129, 21, 5, 12, 'CH', 'ST', '2020-03-04 06:47:20', 'MEVNT', 'New Event: Ricky\'s Company Visit', 0),
(130, 21, 5, 13, 'CH', 'ST', '2020-03-04 06:47:20', 'MEVNT', 'New Event: Ricky\'s Company Visit', 0),
(131, 21, 5, 14, 'CH', 'ST', '2020-03-04 06:47:20', 'MEVNT', 'New Event: Ricky\'s Company Visit', 0),
(132, 21, 5, 16, 'CH', 'ST', '2020-03-04 06:47:21', 'MEVNT', 'New Event: Ricky\'s Company Visit', 0),
(133, 21, 5, 28, 'CH', 'ST', '2020-03-04 06:47:21', 'MEVNT', 'New Event: Ricky\'s Company Visit', 0),
(134, 21, 5, 2, 'CH', 'CM', '2020-03-04 06:47:21', 'MEVNT', 'New Event: Ricky\'s Company Visit', 0),
(135, 21, 5, 4, 'CH', 'CM', '2020-03-04 06:47:21', 'MEVNT', 'New Event: Ricky\'s Company Visit', 0),
(136, 21, 5, 5, 'CH', 'CH', '2020-03-04 06:47:22', 'MEVNT', 'New Event: Ricky\'s Company Visit', 0),
(137, 21, 5, 7, 'CH', 'ST', '2020-04-06 09:07:04', 'MEVNT', 'New Event: aaa', 0),
(138, 21, 5, 8, 'CH', 'ST', '2020-04-06 09:07:04', 'MEVNT', 'New Event: aaa', 0),
(139, 21, 5, 9, 'CH', 'ST', '2020-04-06 09:07:04', 'MEVNT', 'New Event: aaa', 0),
(140, 21, 5, 11, 'CH', 'ST', '2020-04-06 09:07:04', 'MEVNT', 'New Event: aaa', 0),
(141, 21, 5, 12, 'CH', 'ST', '2020-04-06 09:07:04', 'MEVNT', 'New Event: aaa', 0),
(142, 21, 5, 13, 'CH', 'ST', '2020-04-06 09:07:04', 'MEVNT', 'New Event: aaa', 0),
(143, 21, 5, 14, 'CH', 'ST', '2020-04-06 09:07:04', 'MEVNT', 'New Event: aaa', 0),
(144, 21, 5, 16, 'CH', 'ST', '2020-04-06 09:07:04', 'MEVNT', 'New Event: aaa', 0),
(145, 21, 5, 28, 'CH', 'ST', '2020-04-06 09:07:04', 'MEVNT', 'New Event: aaa', 0),
(146, 21, 5, 2, 'CH', 'CM', '2020-04-06 09:07:04', 'MEVNT', 'New Event: aaa', 0),
(147, 21, 5, 4, 'CH', 'CM', '2020-04-06 09:07:04', 'MEVNT', 'New Event: aaa', 0),
(148, 21, 5, 5, 'CH', 'CH', '2020-04-06 09:07:04', 'MEVNT', 'New Event: aaa', 0),
(149, NULL, 23, 5, 'CP', 'CH', '2020-05-13 21:54:09', 'CSL', 'final Company Short List', 0),
(150, NULL, 23, 5, 'CP', 'CH', '2020-05-13 21:57:28', 'CSL', 'New Event:Final Company Short List', 0),
(151, NULL, 23, 5, 'CP', 'CH', '2020-05-14 13:58:26', 'CSL', 'New Event:Final Company Short List', 0),
(152, NULL, 23, 5, 'CP', 'CH', '2020-05-14 13:58:48', 'CSL', 'New Event:Final Company Short List', 0),
(153, NULL, 23, 5, 'CP', 'CH', '2020-05-14 14:00:23', 'CSL', 'New Event:Final Company Short List', 0),
(154, NULL, 23, 5, 'CP', 'CH', '2020-05-14 14:19:37', 'CSL', 'New Event:Final Company Short List', 0),
(155, NULL, 23, 5, 'CP', 'CH', '2020-05-19 14:20:32', 'CSL', 'New Event:Final Company Short List', 0),
(156, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:17:57', 'CSL', 'New Event:Final Company Short List', 0),
(157, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:23:57', 'CSL', 'New Event:Final Company Short List', 0),
(158, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:25:03', 'CSL', 'New Event:Final Company Short List', 0),
(159, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:25:32', 'CSL', 'New Event:Final Company Short List', 0),
(160, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:25:37', 'CSL', 'New Event:Final Company Short List', 0),
(161, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:27:28', 'CSL', 'New Event:Final Company Short List', 0),
(162, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:27:30', 'CSL', 'New Event:Final Company Short List', 0),
(163, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:29:56', 'CSL', 'New Event:Final Company Short List', 0),
(164, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:30:31', 'CSL', 'New Event:Final Company Short List', 0),
(165, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:38:00', 'CSL', 'New Event:Final Company Short List', 0),
(166, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:38:59', 'CSL', 'New Event:Final Company Short List', 0),
(167, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:44:05', 'CSL', 'New Event:Final Company Short List', 0),
(168, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:44:30', 'CSL', 'New Event:Final Company Short List', 0),
(169, NULL, 23, 5, 'CP', 'CH', '2020-05-21 13:46:59', 'CSL', 'New Event:Final Company Short List', 0),
(170, NULL, 23, 5, 'CP', 'CH', '2020-05-21 14:21:39', 'CSL', 'New Event:Final Company Short List', 0),
(171, NULL, 23, 5, 'CP', 'CH', '2020-05-21 16:46:56', 'CSL', 'New Event:Final Company Short List', 0),
(172, NULL, 23, 5, 'CP', 'CH', '2020-05-21 16:50:24', 'CSL', 'New Event:Final Company Short List', 0),
(173, NULL, 23, 5, 'CP', 'CH', '2020-05-21 16:51:21', 'CSL', 'New Event:Final Company Short List', 0),
(174, 0, 5, 23, 'CH', 'CP', '2020-05-21 18:19:26', 'RECOM', 'aaa bbb ccc ddd ', 0),
(175, NULL, 23, 5, 'CP', 'CH', '2020-05-23 11:32:35', 'CSL', 'New Event:Final Company Short List', 0),
(176, NULL, 23, 5, 'CP', 'CH', '2020-05-23 11:32:49', 'CSL', 'New Event:Final Company Short List', 0),
(177, NULL, 23, 5, 'CP', 'CH', '2020-05-23 11:33:49', 'CSL', 'New Event:Final Company Short List', 0),
(178, NULL, 23, 5, 'CP', 'CH', '2020-05-23 11:36:51', 'CSL', 'New Event:Final Company Short List', 0),
(179, NULL, 23, 5, 'CP', 'CH', '2020-05-23 11:39:23', 'CSL', 'New Event:Final Company Short List', 0),
(180, NULL, 23, 5, 'CP', 'CH', '2020-05-23 11:40:10', 'CSL', 'New Event:Final Company Short List', 0),
(181, NULL, 23, 5, 'CP', 'CH', '2020-05-24 16:54:21', 'CPL', 'New Event: TECH CODER TECH Placement Offer', 0),
(182, NULL, 23, 5, 'CP', 'CH', '2020-05-24 16:57:49', 'CPL', 'New Event: TECH CODER TECH Placement Offer', 0),
(183, NULL, 23, 5, 'CP', 'CH', '2020-05-24 16:59:06', 'CPL', 'New Event: TECH CODER TECH Placement Offer', 0),
(184, NULL, 23, 5, 'CP', 'CH', '2020-05-24 17:01:02', 'CPL', 'New Event: TECH CODER TECH Placement Offer', 0),
(185, NULL, 23, 5, 'CP', 'CH', '2020-05-24 17:04:24', 'CPL', 'New Event: TECH CODER TECH Placement Offer', 0),
(186, NULL, 23, 5, 'CP', 'CH', '2020-05-24 17:04:47', 'CPL', 'New Event: TECH CODER TECH Placement Offer', 0);

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
(4, 2, 10, '2020-05-24 16:16:20', 'R'),
(5, 3, 0, '2020-05-24 16:16:20', 'T'),
(9, 4, 0, '2020-05-28 17:21:19', 'P'),
(11, 1, 0, '2020-05-28 17:26:39', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_placement_schedule`
--

CREATE TABLE `tbl_placement_schedule` (
  `PLACEMENT_SCHEDULE_ID` int(11) NOT NULL,
  `PLACEMENT_SCHEDULE_COMPANY_ID` int(11) NOT NULL,
  `PLACEMENT_SCHEDULE_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_placement_schedule`
--

INSERT INTO `tbl_placement_schedule` (`PLACEMENT_SCHEDULE_ID`, `PLACEMENT_SCHEDULE_COMPANY_ID`, `PLACEMENT_SCHEDULE_DATE`) VALUES
(1, 0, '2020-03-03'),
(3, 1, '2019-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recommendation`
--

CREATE TABLE `tbl_recommendation` (
  `RECOMMENDATION_ID` int(11) NOT NULL,
  `RECOMMENDATION_STUDENT_ID` int(11) NOT NULL,
  `RECOMMENDATION_COMPANY_ID` int(11) NOT NULL,
  `RECOMMENDATION_DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_recommendation`
--

INSERT INTO `tbl_recommendation` (`RECOMMENDATION_ID`, `RECOMMENDATION_STUDENT_ID`, `RECOMMENDATION_COMPANY_ID`, `RECOMMENDATION_DESCRIPTION`) VALUES
(1, 2, 5, 'This for Testing'),
(2, 47, 10, 'TEst');

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
(15, 23, '2020', 'Tech Coder 1 ', 'SH'),
(16, 23, '2020', 'Tech Coder 2', 'SH'),
(17, 23, '2020', 'TESTING', 'SH'),
(18, 23, '2020', 'ttt', 'SH'),
(19, 23, '2020', 'TESTING 1 ', 'SH'),
(20, 23, '2020', 'THI?DS', 'SH'),
(21, 23, '2020', 'Vikrant Testing', 'SH'),
(22, 23, '2020', 'Ricky', 'SH'),
(23, 23, '2020', 'ff', 'DE'),
(24, 23, '2020', 'asd', 'DE'),
(25, 23, '2020', 'qqqq', 'DE'),
(26, 23, '2020', 'qqq', 'DE'),
(27, 23, '2020', 'aaaaaa', 'SH'),
(28, 23, '2020', 'qqq', 'DE'),
(29, 23, '2020', 'qqq', 'SH'),
(30, 23, '2020', 'java', 'SH');

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
(22, 0, 15, 11, 'SH'),
(24, 0, 15, 13, 'SH'),
(40, 0, 15, 14, 'SH'),
(41, 0, 15, 8, 'DE'),
(42, 0, 15, 9, 'SH'),
(43, 0, 16, 7, 'SH'),
(44, 0, 16, 9, 'DE'),
(45, 0, 16, 8, 'SH'),
(46, 0, 15, 7, 'DE'),
(47, 0, 15, 7, 'SH'),
(48, 0, 17, 7, 'SH'),
(49, 0, 17, 9, 'SH'),
(50, 0, 18, 12, 'DE'),
(51, 0, 18, 14, 'SH'),
(52, 0, 18, 28, 'SH'),
(53, 0, 19, 13, 'SH'),
(54, 0, 19, 14, 'SH'),
(55, 0, 19, 16, 'SH'),
(56, 0, 20, 7, 'SH'),
(57, 0, 20, 9, 'SH'),
(58, 0, 20, 11, 'SH'),
(59, 0, 20, 13, 'SH'),
(60, 0, 21, 7, 'SH'),
(61, 0, 21, 9, 'DE'),
(62, 0, 21, 11, 'DE'),
(63, 0, 22, 11, 'DE'),
(64, 0, 22, 12, 'DE'),
(65, 0, 22, 14, 'DE'),
(66, 0, 22, 14, 'DE'),
(67, 0, 23, 7, 'SH'),
(68, 0, 23, 28, 'SH'),
(69, 0, 24, 8, 'SH'),
(70, 0, 24, 16, 'SH'),
(71, 0, 25, 16, 'SH'),
(72, 0, 25, 28, 'SH'),
(73, 0, 30, 7, 'SH'),
(74, 0, 29, 14, 'SH'),
(75, 0, 29, 16, 'SH'),
(76, 0, 29, 28, 'SH');

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
(7, 'Manav ', 'Shah', '201706100110032', 'manavshah712@gmail.com', '4455663322', '1999-12-01', 'M', '1234', '', '', '', 'IMG_6102.JPG', '', '', 2, '', 0),
(8, 'm', 's', '032', 'm', '5', '2020-12-01', 'M', 'manav', '', '', '', 'IMG_6102.JPG', '', '', 2, '', 0),
(9, 'dd', 'dd', 'dd', 'dd', 'dd', '2020-01-15', 'F', '96548c98770faf0af386d59beb52dbea51e63c11', '', '', '', 'IMG_6102.JPG', '', '', 2, '', 1),
(11, 'Manav', 'Shah', '201706100110032', 'manav@gmail.com', '1234567890', '2017-01-01', 'M', '976c7142b972a8b077d874e533b60ef96d88b891', '', '', '', 'IMG_6102.JPG', '', '', 2, '', 1),
(12, 'bhavik', 'desai', '201', 'desai966@gmail.com', '5896458976', '2020-01-10', 'M', '32904fe8c09a853f8de34d206cee844cc80b16c4', '', '', '', 'IMG_6102.JPG', '', '', 2, '', 0),
(13, 'Manav ', 'Shah', '032', '201706100110032', '5566332211', '2020-01-22', 'M', 'ecc9c6848985b8a6c783911761484eb949f540c3', '', '', '', '', '', '', 2, '', 0),
(14, 'Bhavani', 'Sharma', '047', 'ricky@gmail.com', '5566332211', '2020-01-08', 'M', '372f12fa47dfeda9024e2def63aad676ecfd9f26', 'm', '4455663322', 's', 'nn', 'I am very happy to be Here', 'surat', 2, '2020', 1),
(16, 'man', 'patel', '032', 'man@gmail.com', '8520', '2020-02-04', 'M', '3a8e3995c765a73de092636d8d4ad96155c31c2a', 'mm', '22', '2', 'hjb', 'kb', 'kjb', 2, '2020', 0),
(28, 'hewv', 'hgsjkdh', 'jhgkj', 'kjhg', 'kjhgj', '2020-02-19', 'M', '4cb2c88a6baf419d9e5a89efc463a32557922e03', 'gfghf', 'ghfhgf', 'hgfhgf', 'hgfhgf', 'hgfhgf', 'jhgjhg', 2, '2022', 0),
(48, 'a', 'A', 'A', 'A', 'A', '0000-00-00', 'M', '5a53bec34d6a24ce8d09ba25a2341b07544f6f8a', 'A', 'A', 'A', 'A', 'A', 'A', 1, '2020', 0),
(49, 'BHAVANI ', 'SHARMA', '047', 'ricky@gmail.com', '5566332211', '2020-02-19', 'M', '9bc3b266c4ee8bafe0d8d3cb228dcd3eba6d4489', 'mm', '789654123', 'm@gmail.com', 'Body.jpg', 'avsd                    	', 'kajbsd                    	', 4, '2017', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`TEST_ID`, `TEST_EVENT_ID`, `TEST_NAME`, `TEST_DESCRIPTION`, `TEST_TOTAL_MARKS`, `TEST_PASSING_MARKS`) VALUES
(1, 2, 'Pre', 'FF', 100, 40),
(2, 15, 'Testing', 'Test Desc', 50, 17),
(3, 7, 'TESTTEST', 'sfjvsfljnvlknvlknvlknvflsfknvlsfknv', 100, 35),
(4, 5, 'Exam Entry check', 'This is for all student', 100, 50);

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
(1, 11, 23, 4000, '2020-05-21 16:55:30', 'A'),
(2, 13, 23, 3000, '2020-05-21 16:55:30', 'A'),
(3, 14, 23, 2000, '2020-05-21 16:55:30', 'A'),
(4, 9, 23, 2000, '2020-05-21 16:55:30', 'A'),
(5, 7, 23, 50000, '2020-05-21 16:55:30', 'A'),
(6, 8, 23, 20000, '2020-05-23 11:39:05', 'A');

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
-- Indexes for table `tbl_company_placement_list`
--
ALTER TABLE `tbl_company_placement_list`
  ADD PRIMARY KEY (`COMPANY_PLACEMENT_LIST_ID`);

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
-- Indexes for table `tbl_materials`
--
ALTER TABLE `tbl_materials`
  ADD PRIMARY KEY (`MATERIALS_ID`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`NOTIFICATION_ID`);

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
  MODIFY `ACADEMIC_10TH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_academic_12th_details`
--
ALTER TABLE `tbl_academic_12th_details`
  MODIFY `ACADEMIC_12TH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_academic_bachelor_details`
--
ALTER TABLE `tbl_academic_bachelor_details`
  MODIFY `ACADEMIC_BACHELOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_academic_details`
--
ALTER TABLE `tbl_academic_details`
  MODIFY `ACADEMIC_DETAILS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `ATTENDANCE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  MODIFY `BATCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `COMPANY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_company_document`
--
ALTER TABLE `tbl_company_document`
  MODIFY `COMPANY_DOCUMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_company_placement_list`
--
ALTER TABLE `tbl_company_placement_list`
  MODIFY `COMPANY_PLACEMENT_LIST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `DOCUMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `EVENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_event_application`
--
ALTER TABLE `tbl_event_application`
  MODIFY `EVENT_APPLICATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `FACULTY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `LOGIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  MODIFY `MARKS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_materials`
--
ALTER TABLE `tbl_materials`
  MODIFY `MATERIALS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `NOTIFICATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `tbl_placement`
--
ALTER TABLE `tbl_placement`
  MODIFY `PLACEMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_placement_schedule`
--
ALTER TABLE `tbl_placement_schedule`
  MODIFY `PLACEMENT_SCHEDULE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_recommendation`
--
ALTER TABLE `tbl_recommendation`
  MODIFY `RECOMMENDATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_resume`
--
ALTER TABLE `tbl_resume`
  MODIFY `RESUME_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_selection_list`
--
ALTER TABLE `tbl_selection_list`
  MODIFY `SELECTION_LIST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_shortlist`
--
ALTER TABLE `tbl_shortlist`
  MODIFY `SHORTLIST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `STUDENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `TEST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `TRAINING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
