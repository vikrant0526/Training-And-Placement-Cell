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
    #CALL INSERT_UPDATE_PLACEMENT_SCHEDULE(cid, sdate, edate);
    SELECT sdate, dayname(sdate), edate, dayname(edate);
    SET sdate = edate;
END LOOP L1;
CLOSE c1;
END