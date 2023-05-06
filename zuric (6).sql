-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 08:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zuric`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `createAdmin` (IN `inputUserId` INT, IN `inputMobile` VARCHAR(255), IN `inputEmail` VARCHAR(255), IN `inputFirstName` VARCHAR(255), IN `inputLastName` VARCHAR(255), IN `inputProfilePic` VARCHAR(255), IN `inputTitle` VARCHAR(255), IN `inputDOB` VARCHAR(255), IN `inputGender` VARCHAR(255), IN `inputDesignation` VARCHAR(255), IN `inputMaritalStatus` VARCHAR(255), IN `inputJoiningDate` DATETIME, IN `inputAddress` VARCHAR(255), IN `inputParmanentAddress` VARCHAR(255), IN `inputCity` VARCHAR(255), IN `inputState` VARCHAR(255), IN `inputCountry` VARCHAR(255), IN `inputZipCode` VARCHAR(255), IN `inputLongitude` DOUBLE, IN `inputLatitude` DOUBLE, IN `inputPassword` VARCHAR(255), IN `inputConfirmPassword` VARCHAR(255), IN `inputPasswordHash` VARCHAR(255))   BEGIN
       
       DECLARE currTime DATETIME DEFAULT UTC_TIMESTAMP();
       DECLARE locUserId, locDetailsId INT;
       
       DECLARE EXIT HANDLER FOR SQLEXCEPTION
	   BEGIN
           GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
		        @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
                CALL raiseError(@errno , @text, NULL, NULL); 
	   END;
       
       START TRANSACTION;
       
               IF inputUserId IS NULL THEN
                     IF EXISTS( SELECT 1 FROM user WHERE mobile = inputMobile) THEN
                            CALL raiseError(10001, '', NULL, NULL);   
                     END IF;
                     IF EXISTS (SELECT 1 FROM user WHERE email = inputEmail ) THEN
                            CALL raiseError(10002, '', NULL, NULL);
                     END IF;
                     
                     INSERT INTO user(mobile, email, created_by, modified_by, created_date, modified_date, start_date)
                     VALUES(inputMobile, inputEmail, locUserId, locUserId, currTime, currTime, currTime);
                     SET locUserId = LAST_INSERT_ID();
                     
                     INSERT INTO user_details(first_name, last_name, profile_pic, title, dob, designation, gender, marital_status, joining_date, created_by, modified_by, created_date, modified_date, start_date)
                     VALUES(inputFirstName, inputLastName, inputProfilePic, inputTitle, inputDOB,inputDesignation, inputGender, inputMaritalStatus, inputJoiningDate, locUserId, locUserId, currTime, currTime, currTime);
                     SET locDetailsId = LAST_INSERT_ID();
                     
                     INSERT INTO user_xref(user_id, pk_value, type_id, password_text, confirm_password, password_hash, created_by, modified_by, created_date, modified_date, start_date)
                     VALUES(locUserId, locDetailsId, 1002, inputPassword, inputConfirmPassword, inputPasswordHash, locUserId, locUserId, currTime, currTime, currTime);
                     
                     INSERT INTO address(user_id, address, parmanent_address, city, state, country, zip_code, location, created_by, modified_by, created_date, modified_date, start_date)
                     VALUES(locUserId, inputAddress, inputParmanentAddress, inputCity, inputState, inputCountry, inputZipCode, ST_GeomFromText(CONCAT('POINT(',inputLongitude,' ',inputLatitude, ')'), 4326), locUserId, locUserId, currTime, currTime, currTime);
	
                     
               END IF;
                     
                     IF locUserId IS NULL THEN
                           SET locUserId = inputUserId;
                     END IF;      
       
       COMMIT;
       
					CALL getUserDetails(locUserId, 1002);
       
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `createHR` (IN `inputUserId` INT, IN `inputMobile` VARCHAR(255), IN `inputEmail` VARCHAR(255), IN `inputFirstName` VARCHAR(255), IN `inputLastName` VARCHAR(255), IN `inputProfilePic` VARCHAR(255), IN `inputTitle` VARCHAR(255), IN `inputDOB` VARCHAR(255), IN `inputGender` VARCHAR(255), IN `inputDesignation` VARCHAR(255), IN `inputMaritalStatus` VARCHAR(255), IN `inputJoiningDate` DATETIME, IN `inputAddress` VARCHAR(255), IN `inputParmanentAddress` VARCHAR(255), IN `inputCity` VARCHAR(255), IN `inputState` VARCHAR(255), IN `inputCountry` VARCHAR(255), IN `inputZipCode` VARCHAR(255), IN `inputLongitude` DOUBLE, IN `inputLatitude` DOUBLE, IN `inputPassword` VARCHAR(255), IN `inputConfirmPassword` VARCHAR(255), IN `inputPasswordHash` VARCHAR(255))   BEGIN
       
       DECLARE currTime DATETIME DEFAULT UTC_TIMESTAMP();
       DECLARE locUserId, locDetailsId INT;
       
       DECLARE EXIT HANDLER FOR SQLEXCEPTION
	   BEGIN
           GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
		        @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
                CALL raiseError(@errno , @text, NULL, NULL); 
	   END;
       
       START TRANSACTION;
       
               IF inputUserId IS NULL THEN
                     IF EXISTS( SELECT 1 FROM user WHERE mobile = inputMobile) THEN
                            CALL raiseError(10001, '', NULL, NULL);   
                     END IF;
                     IF EXISTS (SELECT 1 FROM user WHERE email = inputEmail ) THEN
                            CALL raiseError(10002, '', NULL, NULL);
                     END IF;
                     
                     INSERT INTO user(mobile, email, created_by, modified_by, created_date, modified_date, start_date)
                     VALUES(inputMobile, inputEmail, locUserId, locUserId, currTime, currTime, currTime);
                     SET locUserId = LAST_INSERT_ID();
                     
                     INSERT INTO user_details(first_name, last_name, profile_pic, title, dob, designation, gender, marital_status, joining_date, created_by, modified_by, created_date, modified_date, start_date)
                     VALUES(inputFirstName, inputLastName, inputProfilePic, inputTitle, inputDOB, inputGender, inputMaritalStatus, inputJoiningDate, locUserId, locUserId, currTime, currTime, currTime);
                     SET locDetailsId = LAST_INSERT_ID();
                     
                     INSERT INTO user_xref(user_id, pk_value, type_id, password_text, confirm_password, password_hash, created_by, modified_by, created_date, modified_date, start_date)
                     VALUES(locUserId, locDetailsId, 1003, inputPassword, inputConfirmPassword, inputPasswordHash, locUserId, locUserId, currTime, currTime, currTime);
                     
                     INSERT INTO address(user_id, address, parmanent_address, city, state, country, zip_code, latitude, longitude, created_by, modified_by, created_date, modified_date, start_date)
                     VALUES(locUserId, inputAddress, inputParmanentAddress, inputCity, inputState, inputCountry, inputZipCode, ST_GeomFromText(CONCAT('POINT(',inputLongitude,' ',inputLatitude,')'), 4326), locUserId, locUserId, currTime, currTime, currTime);
	
                     
               END IF;
                     
                     IF locUserId IS NULL THEN
                           SET locUserId = inputUserId;
                     END IF;      
       
       COMMIT;
       
                     CALL getUserDetails(locUserId, 1003);
       
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `createLeave` (IN `inputUserId` INT, IN `inputLeaveId` INT, IN `inputTypeId` INT, IN `inputLeaveType` VARCHAR(255), IN `inputLeaveStatus` VARCHAR(255), IN `inputMobile` VARCHAR(255), IN `inputBereavement` VARCHAR(255), IN `inputFromDate` DATE, IN `inputToDate` DATE, IN `inputNumberOfDays` INT)   BEGIN

       DECLARE currTime DATETIME DEFAULT UTC_TIMESTAMP();
       DECLARE locLeaveId INT;
       
       DECLARE EXIT HANDLER FOR SQLEXCEPTION
	   BEGIN
           GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
		        @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
                CALL raiseError(@errno , @text, NULL, NULL); 
	   END;
       
       START TRANSACTION;
       
			IF inputLeaveId IS NULL THEN
                      
                      INSERT INTO user_leave(user_id, type_id, leave_type, leave_status, mobile, bereavement, from_date, to_date, number_of_days, created_by, modified_by, created_date, modified_date, start_date)
                      VALUES(inputUserId, inputTypeId, inputLeaveType, inputLeaveStatus, inputMobile, inputBereavement, inputFromDate, inputToDate, inputNumberOfDays, inputUserId, inputUserId, currTime, currTime, currTime);
                      SET locLeaveId = LAST_INSERT_ID();
                      
                      INSERT INTO user_leave_xref(user_id, type_id, created_by, modified_by, created_date, modified_date, start_date)
                      VALUES(inputUserId, inputTypeId, inputUserId, inputUserId, currTime, currTime, currTime);
                      
            END IF;   
            
                      IF locLeaveId IS NULL THEN 
                            SET locLeaveId = inputLeaveId;
                      END IF;      
       
       COMMIT;
                      
                      CALL getUserLeaveDetails(inputUserId, inputTypeId, locLeaveId);
                      
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `createRequirment` (IN `inputUserId` INT, IN `inputRequirmentId` INT, IN `inputRequirmentTypeId` INT, IN `inputRequirmentType` VARCHAR(255), IN `inputBrandsName` VARCHAR(255), IN `inputModelsName` VARCHAR(255), IN `inputUrgent` VARCHAR(255), IN `inputRemark` VARCHAR(255), IN `inputUploadDocument` BLOB, IN `inputUploadPicture` BLOB)   BEGIN

      DECLARE currTime DATETIME DEFAULT UTC_TIMESTAMP();
      DECLARE locRequirmentId INT;
      DECLARE EXIT HANDLER FOR SQLEXCEPTION
      BEGIN
               GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
			         @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
		       CALL raiseError(@errno , @text, NULL, NULL); 
	  END;
      
      START TRANSACTION;
      
              IF inputRequirmentId IS NULL THEN 
              
                      INSERT INTO requirment(user_id, requirment_type_id, requirment_type, brands_name, models_name, urgent, remark, upload_document, upload_picture, created_by, modified_by, created_date, modified_date, start_date)
                      VALUES(inputUserId, inputRequirmentTypeId, inputRequirmentType, inputBrandsName, inputModelsName, inputUrgent, inputRemark, inputUploadDocument, inputUploadPicture, inputUserId, inputUserId, currTime, currTime, currTime);
                      SET locRequirmentId = LAST_INSERT_ID();
                      
                      INSERT INTO user_requirment_xref(user_id, requirment_id, requirment_type_id, created_by, modified_by, created_date, modified_date, start_date)
                      VALUES(inputUserId, locRequirmentId, inputRequirmentTypeId, inputUserId, inputUserId, currTime, currTime, currTime);
                      
             END IF;
             
                    IF locRequirmentId IS NULL THEN
                         SET locRequirmentId = inputRequirmentId;
					END IF;
             
       COMMIT;
       
             CALL getRequirmentDetails(inputUserId, locRequirmentId, inputRequirmentTypeId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `createServices` (IN `inputUserId` INT, IN `inputServicesId` INT, IN `inputServicesTypeId` INT, IN `inputRequirmentType` VARCHAR(255), IN `inputBrandsName` VARCHAR(255), IN `inputModelsName` VARCHAR(255), IN `inputOemName` VARCHAR(255), IN `inputPartName` VARCHAR(255), IN `inputRemark` VARCHAR(255), IN `inputUrgent` VARCHAR(255), IN `inputUploadDocument` LONGTEXT, IN `inputUploadPicture` LONGTEXT)   BEGIN

      DECLARE currTime DATETIME DEFAULT UTC_TIMESTAMP();
      DECLARE locServicesId INT;
      DECLARE EXIT HANDLER FOR SQLEXCEPTION
      BEGIN
               GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
			         @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
		       CALL raiseError(@errno , @text, NULL, NULL); 
	  END;
      
      START TRANSACTION;
      
              IF inputServicesId IS NULL THEN 
              
                      INSERT INTO services(user_id, services_type_id, services_type, brands_name, models_name, oem_name, part_name, urgent, remark, upload_document, upload_picture, created_by, modified_by, created_date, modified_date, start_date)
                      VALUES(inputUserId, inputServicesTypeId, inputRequirmentType, inputBrandsName, inputModelsName, inputOemName, inputPartName, inputUrgent, inputRemark, inputUploadDocument, inputUploadPicture, inputUserId, inputUserId, currTime, currTime, currTime);
                      SET locServicesId = LAST_INSERT_ID();
                      
                      INSERT INTO user_services_xref(user_id, services_id, services_type_id, created_by, modified_by, created_date, modified_date, start_date)
                      VALUES(inputUserId, locServicesId, inputServicesTypeId, inputUserId, inputUserId, currTime, currTime, currTime);
                      
             END IF;
             
                    IF locServicesId IS NULL THEN
                         SET locServicesId = inputServicesId;
					END IF;
             
       COMMIT;
       
             CALL getServicesDetails(inputUserId, locServicesId, inputServicesTypeId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `createSpareParts` (IN `inputUserId` INT, IN `inputSparePartId` INT, IN `inputRequirmentType` VARCHAR(255), IN `inputOemName` VARCHAR(255), IN `inputModelsName` VARCHAR(255), IN `inputPartName` VARCHAR(255), IN `inputRemark` VARCHAR(255), IN `inputUploadDocument` BLOB, IN `inputUploadPicture` BLOB)   BEGIN

      DECLARE currTime DATETIME DEFAULT UTC_TIMESTAMP();
      DECLARE locSparePartId INT;
      DECLARE EXIT HANDLER FOR SQLEXCEPTION
      BEGIN
               GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
			         @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
		       CALL raiseError(@errno , @text, NULL, NULL); 
	  END;
      
      START TRANSACTION;
             
             IF inputSparePartId IS NULL THEN
                    
                    INSERT INTO spare_parts(user_id, requirment_type, oem_name, models_name, part_name, remark, upload_document, upload_picture, created_by, modified_by, created_date, modified_date, start_date)
                    VALUES(inputUserId, inputRequirmentType, inputOemName, inputModelsName, inputPartName, inputRemark, inputUploadDocument, inputUploadPicture, inputUserId, inputUserId, currTime, currTime, currTime);
                    SET locSparePartId = LAST_INSERT_ID();
                    
                    INSERT INTO user_requirment_xref(user_id,services_id, services_type_id, created_by, modified_by, created_date, modified_date, start_date)
                    VALUES(inputUserId, locSparePartId, 2004, inputUserId, inputUserId, currTime, currTime, currTime);
                    
             END IF;
                    
                    IF locSparePartId IS NULL THEN
                         SET locSparePartId = inputSparePartId;
					END IF;
                    
       COMMIT;
       
              CALL getSparePartDetails(inputUserId, locSparePartId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `createUserLeave` (IN `inputUserId` INT, IN `inputLeaveId` INT, IN `inputTypeId` INT, IN `inputLeaveType` VARCHAR(255), IN `inputLeaveStatus` VARCHAR(255), IN `inputMobile` VARCHAR(255), IN `inputBereavement` VARCHAR(255), IN `inputFromDate` DATE, IN `inputToDate` DATE, IN `inputNumberOfDays` INT)   BEGIN

       DECLARE currTime DATETIME DEFAULT UTC_TIMESTAMP();
       DECLARE locLeaveId INT;
       
       DECLARE EXIT HANDLER FOR SQLEXCEPTION
	   BEGIN
           GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
		        @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
                CALL raiseError(@errno , @text, NULL, NULL); 
	   END;
       
       START TRANSACTION;
       
			IF inputLeaveId IS NULL THEN
                      
                      INSERT INTO user_leave(user_id, type_id, leave_type, leave_status, mobile, bereavement, from_date, to_date, number_of_days, created_by, modified_by, created_date, modified_date, start_date)
                      VALUES(inputUserId, inputTypeId, inputLeaveType, inputLeaveStatus, inputMobile, inputBereavement, inputFromDate, inputToDate, inputNumberOfDays, inputUserId, inputUserId, currTime, currTime, currTime);
                      SET locLeaveId = LAST_INSERT_ID();
                      
                      INSERT INTO user_leave_xref(user_id, type_id, created_by, modified_by, created_date, modified_date, start_date)
                      VALUES(inputUserId, inputTypeId, inputUserId, inputUserId, currTime, currTime, currTime);
                      
            END IF;   
            
                      IF locLeaveId IS NULL THEN 
                            SET locLeaveId = inputLeaveId;
                      END IF;      
       
       COMMIT;
                      
                      CALL getUserLeaveDetails(inputUserId, inputTypeId, locLeaveId);
                      
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `forgetPassword` (IN `inputUserId` INT, IN `inputUserName` VARCHAR(255), IN `inputTypeId` INT, IN `inputNewPassword` VARCHAR(255), IN `inputConfirmPassword` VARCHAR(255), IN `inputPasswordHash` VARCHAR(255))   BEGIN
	  DECLARE currTime DATETIME DEFAULT UTC_TIMESTAMP();
      DECLARE locUserId INT;
      DECLARE EXIT HANDLER FOR SQLEXCEPTION
	  BEGIN
           GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
		        @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
           CALL raiseError(@errno , @text, NULL, NULL); 
      END;
      
		SELECT 		u.user_id
		INTO		locUserId
		FROM 		user u 
					INNER JOIN 	user_xref ux 
							ON 	u.user_id = ux.user_id 
		WHERE 		(u.email = inputUserName)
		AND 		ux.end_date IS NULL 
		AND 		ux.type_id = inputTypeId
		LIMIT 		1;
         
         IF locUserId IS NULL THEN
                IF NOT EXISTS(SELECT 1 FROM user WHERE email = inputUserName) THEN 
                     CALL raiseError(10004, '', NULL, NULL);
                END IF;     
        
                UPDATE     user_xref
                SET        password_text = inputNewPassword,
                           confirm_password = inputConfirmPassword,
                           password_hash = inputPasswordHash,
                           modified_by = locUserId,
                           modified_date = currTime
                WHERE      user_id = locUserId;      
                
         END IF;       

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDashboardDetails` ()   BEGIN

       SELECT 
              ( SELECT    COUNT(u.user_id)
                          FROM user u
                          INNER JOIN user_xref ux
                          ON u.user_id = ux.user_id
               WHERE      ux.type_id = 1001 AND u.end_date IS NULL )           
                          AS users,
               
			  ( SELECT    COUNT(requirment_id)
                          FROM user_requirment_xref
               WHERE      requirment_type_id = 2001 ) 
                          AS Normal,
                          
              ( SELECT    COUNT(requirment_id)
                          FROM user_requirment_xref
               WHERE      requirment_type_id = 2002) 
                          AS Emergency,
                          
              ( SELECT    COUNT(requirment_id)
                          FROM user_requirment_xref
               WHERE      requirment_type_id = 2003) 
                          AS Budgetry,    
                          
              ( SELECT    COUNT(spare_parts_id)
                          FROM spare_parts
               WHERE      spare_parts_id IS NOT NULL)
                          AS SpareParts;
                          

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getLoginDetails` (IN `inputUserId` INT, IN `inputTypeId` INT)   BEGIN

       SELECT          u.user_id,
                       u.mobile,
                       u.email,
                       ux.password_hash,
                       ux.type_id,
                       us.token,
                       us.ip_address,
                       us.os,
                       us.version,
                       us.device_id,
                       us.device_type,
                       us.device_model,
                       us.app_version,
                       us.user_app_language
        FROM           user u
        INNER JOIN     user_xref ux
				ON     u.user_id = ux.user_id AND ux.type_id = inputTypeId
        INNER JOIN     user_session us
				ON     ux.user_id = us.user_id AND us.end_date IS NULL
        WHERE          us.user_id = inputUserId
        ORDER BY 	   us.user_session_id DESC
        LIMIT          1;
                
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getRegisterDetails` (IN `inputUserId` INT)   BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
         GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
		     @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
         CALL raiseError(@errno , @text, NULL, NULL); 
    END;
    
    SELECT      u.user_id, 
                u.mobile, 
                u.email,
                rd.person_name,
                rd.company_name,
                rd.plant_name, 
                rd.plant_location,
                a.address,
                a.city, 
                a.state, 
                a.country,
                a.zip_code,
                a.created_date,
                a.modified_date,
                a.start_date
      FROM      user u 
                INNER JOIN user_xref ux
                ON u.user_id = ux.user_id
                INNER JOIN register_details rd
                ON register_details_id = ux.pk_value
                INNER JOIN address a
                ON u.user_id = a.user_id
      WHERE     ( CASE WHEN inputUserId IS NULL THEN 1 ELSE u.user_id = inputUserId END);
                
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getRequirmentDetails` (IN `inputUserId` INT, IN `inputRequirmentId` INT, IN `inputRequirmentTypeId` INT)   BEGIN

      SELECT      r.requirment_id,
                  r.user_id,
                  r.requirment_type_id,
                  r.requirment_type,
                  r.brands_name, 
                  r.models_name,
                  r.urgent, 
                  r.remark,
                  r.upload_document,
                  r.upload_picture,
                  r.created_date,
                  r.modified_date, 
                  r.start_date
       FROM       requirment r
                  INNER JOIN user u
                  ON u.user_id = r.user_id
       WHERE      ( CASE WHEN inputUserId IS NULL THEN 1 ELSE r.user_id = inputUserId END)
		 AND      ( CASE WHEN inputRequirmentId IS NULL THEN 1 ELSE r.requirment_id = inputRequirmentId END)
         AND      ( CASE WHEN inputRequirmentTypeId IS NULL THEN 1 ELSE r.requirment_type_id = inputRequirmentTypeId END); 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getResponseMessage` (IN `responseCode` INT, IN `inputUserId` INT, IN `inputLanguage` VARCHAR(22))   BEGIN
		
        SELECT 			response_message
		FROM 			response_message
        WHERE 			response_code = responseCode;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getServicesDetails` (IN `inputUserId` INT, IN `inputServicesId` INT, IN `inputServicesTypeId` INT)   BEGIN

      SELECT      s.services_id,
                  s.user_id,
                  s.services_type_id,
                  s.services_type,
                  s.brands_name, 
                  s.models_name,
                  s.part_name,
                  s.oem_name,
                  s.urgent, 
                  s.remark,
                  s.upload_document,
                  s.upload_picture,
                  s.created_date,
                  s.modified_date, 
                  s.start_date
       FROM       services s
                  INNER JOIN user u
                  ON u.user_id = s.user_id
       WHERE      ( CASE WHEN inputUserId IS NULL THEN 1 ELSE s.user_id = inputUserId END)
		 AND      ( CASE WHEN inputServicesId IS NULL THEN 1 ELSE s.services_id = inputServicesId END)
         AND      ( CASE WHEN inputServicesTypeId IS NULL THEN 1 ELSE s.services_type_id = inputServicesTypeId END); 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSparePartDetails` (IN `inputUserId` INT, IN `inputSparePartId` INT)   BEGIN

      SELECT      s.spare_parts_id,
                  s.user_id,
                  s.requirment_type,
                  s.oem_name, 
                  s.models_name,
                  s.part_name,
                  s.remark,
                  s.upload_document,
                  s.upload_picture,
                  s.created_date,
                  s.modified_date, 
                  s.start_date
       FROM       spare_parts s
                  INNER JOIN user u
                  ON s.user_id = u.user_id
       WHERE      ( CASE WHEN inputUserId IS NULL THEN 1 ELSE u.user_id = inputUserId END)
		 AND      ( CASE WHEN inputSparePartId IS NULL THEN 1 ELSE s.spare_parts_id = inputSparePartId END); 
         
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserByToken` (IN `inputToken` VARCHAR(255))   BEGIN
	   
       SELECT * FROM user_session WHERE token = inputToken;
                  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserByUsernameAndTypeId` (IN `inputUserName` VARCHAR(255), IN `inputTypeId` INT)   BEGIN 
	 
	  SELECT         u.user_id,
                     u.mobile,
                     u.email,
                     ux.type_id,
                     ux.password_text,
                     ux.password_hash,
                     us.ip_address,
                     us.os,
                     us.version,
                     us.device_type,
                     us.user_app_language,
                     us.device_id
	  FROM           user u
	  INNER JOIN     user_xref ux
              ON     u.user_id = ux.user_id
      LEFT JOIN      user_session us
			  ON     u.user_id = us.user_id
	  WHERE          (u.mobile = inputUserName OR u.email = inputUserName) AND ux.type_id = inputTypeId
      LIMIT          1;
      
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserDetails` (IN `inputUserId` INT, IN `inputTypeId` INT)   BEGIN

       DECLARE EXIT HANDLER FOR SQLEXCEPTION
	   BEGIN
                GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
		        @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
                CALL raiseError(@errno , @text, NULL, NULL); 
	   END;   
       
       SELECT      u.user_id,
                   u.mobile, 
                   u.email,
                   ud.first_name,
                   ud.last_name,
                   up.profile_pic,
                   ud.title,
                   ud.dob,
                   ud.designation,
                   ud.gender, 
                   ud.marital_status, 
                   ud.joining_date,
                   ux.type_id,
                   a.address, 
                   a.parmanent_address, 
                   a.city, 
                   a.state, 
                   a.country, 
                   a.zip_code,
                   u.created_date,
                   u.modified_date,
                   u.start_date
       FROM        user u 
                   INNER JOIN user_xref ux
                   ON u.user_id = ux.user_id AND ux.type_id = inputTypeId
                   INNER JOIN user_details ud
                   ON ux.pk_value = ud.user_details_id
                   INNER JOIN address a
                   ON a.user_id = u.user_id
       WHERE       ( CASE WHEN inputUserId IS NULL THEN 1 ELSE u.user_id = inputUserId END)
       AND         ( CASE WHEN inputTypeId IS NULL THEN 1 ELSE ux.type_id = inputTypeId END);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserLeaveDetails` (IN `inputUserId` INT, IN `inputTypeId` INT, IN `inputLeaveId` INT)   BEGIN
       
       DECLARE EXIT HANDLER FOR SQLEXCEPTION
	   BEGIN
           GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
		        @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
                CALL raiseError(@errno , @text, NULL, NULL); 
	   END;
       
       SELECT      l.user_leave_id,
                   l.user_id,
                   l.type_id,
                   l.leave_type, 
                   l.leave_status,
                   l.mobile, 
                   l.bereavement, 
                   l.from_date, 
                   l.to_date, 
                   l.number_of_days, 
                   l.created_date, 
                   l.modified_date, 
                   l.start_date
        FROM       user u
                   INNER JOIN user_xref ux
                   ON u.user_id = ux.user_id AND ux.type_id = inputTypeId
                   INNER JOIN user_leave l
                   ON l.user_id = u.user_id
        WHERE      ( CASE WHEN inputUserId IS NULL THEN 1 ELSE u.user_id = inputUserId END)
        AND        ( CASE WHEN inputTypeId IS NULL THEN 1 ELSE ux.type_id = inputTypeId END)
        AND        ( CASE WHEN inputLeaveId IS NULL THEN 1 ELSE l.user_leave_id = inputLeaveId END); 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginAdmin` (IN `inputUserName` VARCHAR(255), IN `inputPassword` VARCHAR(255), IN `inputPasswordHash` VARCHAR(255), IN `inputToken` VARCHAR(255), IN `inputIPAddress` DOUBLE, IN `inputOS` VARCHAR(255), IN `inputVersion` DOUBLE, IN `inputDeviceId` INT, IN `inputDeviceType` VARCHAR(255), IN `inputDeviceModel` VARCHAR(255), IN `inputAppVersion` DOUBLE, IN `inputUserAppLanguage` VARCHAR(255))   BEGIN
      
      DECLARE currTime DATETIME DEFAULT UTC_TIMESTAMP();
      DECLARE locUserId INT;
      
      DECLARE EXIT HANDLER FOR SQLEXCEPTION
	  BEGIN
           GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
		        @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
                CALL raiseError(@errno , @text, NULL, NULL); 
	  END;
      
      SELECT   u.user_id
      INTO     locUserId 
               FROM user u
               INNER JOIN user_xref ux
               ON u.user_id = ux.user_id AND ux.type_id = 1002
      WHERE    e.email = inputUserName AND ux.password_text = inputPassword
	  AND      ux.end_date IS NULL
      AND      ux.type_id = 1002;
      
      START TRANSACTION;
            
            IF locUserId IS NULL THEN
                   IF NOT EXISTS ( SELECT 1 FROM user WHERE email = inputUserName) THEN
                          CALL raiseError(10004, '', NULL, NULL);
                   END IF;
              
                   IF NOT EXISTS ( SELECT 1 FROM user_xref WHERE password_text = inputPassword) THEN
                          CALL raiseError(10005, '', NULL, NULL);
                   END IF;
              
                   INSERT INTO user_session(user_id, type_id, token, ip_address, os, version, device_id, device_type, device_model, app_version, user_app_language, created_by, modified_by, created_date, modified_date, start_date)
	               VALUES(locUserId, 1002, inputToken, inputIPAddress, inputOS, inputVersion, inputDeviceId, inputDeviceType, inputDeviceModel, inputAppVersion, inputUserAppLanguage, locUserId, locUserId, currTime, currTime, currTime);
            
            END IF;
            
      COMMIT;
              
              CALL getLoginDetails(locUserId, 1002);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `raiseError` (IN `inputResponseCode` INT, IN `inputResponseMsg` TEXT, IN `inputLanguage` VARCHAR(256), IN `inputUserId` INT)   BEGIN
     DECLARE msg VARCHAR(256);
     DECLARE rCode INT;
     IF inputLanguage IS NULL THEN
          IF inputUserId IS NULL THEN 
                SET inputLanguage='en';
          ELSE
				SELECT user_app_language INTO inputLanguage
                FROM user_xref WHERE user_id=inputUserId;
                
                IF inputLanguage IS NULL THEN 
                      SET inputLanguage= 'en';
                 END IF;
                 
           END IF;
      END IF;
      
      IF inputResponseCode >= 10000 THEN
           IF inputResponseMsg != "" THEN
           
           SET rCode=inputResponseCode;
           SET msg=inputResponseMsg;
           
           ELSE 
                IF EXISTS(SELECT 1 FROM response_message WHERE response_code = inputResponseCode LIMIT 1) THEN
				      SELECT response_code, response_message
				      INTO rCode, msg
				      FROM	response_message
				      WHERE response_code = inputResponseCode;
                
				ELSE     
				     INSERT INTO response_message(response_code,response_message)
			         VALUES(inputResponseCode, inputResponseMsg);
            
			         SET rCode = inputResponseCode;
				     SET msg = inputResponseMsg;
                
                END IF;
         END IF;
         ELSE 
               SET rCode = inputResponseCode;
			   SET msg = inputResponseMsg;
	 END IF;
     
	 SIGNAL SQLSTATE 'ERROR'
	 SET MESSAGE_TEXT = msg, 
	 MYSQL_ERRNO = rCode;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registerNow` (IN `inputUserId` INT, IN `inputMobile` VARCHAR(255), IN `inputEmail` VARCHAR(255), IN `inputPersonName` VARCHAR(255), IN `inputProfilePic` LONGTEXT, IN `inputCompanyName` VARCHAR(255), IN `inputPlantName` VARCHAR(255), IN `inputPlantLocation` VARCHAR(255), IN `inputAddress` VARCHAR(255), IN `inputParmanentAddress` VARCHAR(255), IN `inputCity` VARCHAR(255), IN `inputState` VARCHAR(255), IN `inputCountry` VARCHAR(255), IN `inputZipCode` VARCHAR(255), IN `inputLongitude` DOUBLE, IN `inputLatitude` DOUBLE, IN `inputPassword` VARCHAR(255), IN `inputConfirmPassword` VARCHAR(255), IN `inputPasswordHash` VARCHAR(255))   BEGIN

	  DECLARE currTime DATETIME DEFAULT UTC_TIMESTAMP();
      DECLARE locUserId, locDetailsId INT;
      DECLARE EXIT HANDLER FOR SQLEXCEPTION
      BEGIN
               GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
			         @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
		       CALL raiseError(@errno , @text, NULL, NULL); 
	  END;
      
      START TRANSACTION;
      
              IF inputUserId IS NULL THEN
              
                     IF EXISTS (SELECT 1 FROM user WHERE mobile = inputMobile) THEN
                           CALL raiseError(10001, '', NULL, NULL); 
                     END IF;
                     
                     IF EXISTS (SELECT 1 FROM user WHERE email = inputMobile) THEN
                            CALL raiseError(10002, '', NULL, NULL); 
                     END IF;
              
                     INSERT INTO user(mobile, email, created_by, modified_by, created_date, modified_date, start_date)
                     VALUES(inputMobile, inputEmail, locUserId, locUserId, currTime, currTime, currTime);
                     SET locUserId = LAST_INSERT_ID();
                     
                     INSERT INTO register_details(person_name, profile_pic, company_name, plant_name, plant_location, created_by, modified_by, created_date, modified_date, start_date)
                     VALUES(inputPersonName, inputProfilePic, inputCompanyName, inputPlantName, inputPlantLocation, locUserId, locUserId, currTime, currTime, currTime);
                     SET locDetailsId = LAST_INSERT_ID();
                     
                     INSERT INTO user_xref(user_id, pk_value, type_id, password_text, confirm_password, password_hash, created_by, modified_by, created_date, modified_date, start_date)
                     VALUES(locUserId, locDetailsId, 1001, inputPassword, inputConfirmPassword, inputPasswordHash, locUserId, locUserId, currTime, currTime, currTime);
                     
                     INSERT INTO address(user_id, address, parmanent_address, city, state, country, zip_code, location, created_by, modified_by, created_date, modified_date, start_date)
                     VALUES(locUserId, inputAddress, inputParmanentAddress, inputCity, inputState, inputCountry, inputZipCode, ST_GeomFromText(CONCAT('POINT(',inputLongitude,' ',inputLatitude,')'), 4326), locUserId, locUserId, currTime, currTime, currTime);
              
              END IF;
                     
                     IF locUserId IS NULL THEN
                         SET locUserId = inputUserId;
                     END IF;    
      
      COMMIT;
      
             CALL getRegisterDetails(locUserId);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `signIn` (IN `inputUserName` VARCHAR(255), IN `inputPassword` VARCHAR(255), IN `inputPasswordHash` VARCHAR(255), IN `inputTypeId` INT, IN `inputToken` VARCHAR(255), IN `inputIPAddress` DOUBLE, IN `inputOS` VARCHAR(255), IN `inputVersion` DOUBLE, IN `inputDeviceId` INT, IN `inputDeviceType` VARCHAR(255), IN `inputDeviceModel` VARCHAR(255), IN `inputAppVersion` DOUBLE, IN `inputUserAppLanguage` VARCHAR(255))   BEGIN
      DECLARE locUserId INT;
      DECLARE EXIT HANDLER FOR SQLEXCEPTION
	  BEGIN
          GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
		       @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
          CALL raiseError(@errno , @text, NULL, NULL); 
      END;       
       
		SELECT 		u.user_id
		INTO		locUserId
		FROM 		user u 
					INNER JOIN 	user_xref ux 
							ON 	u.user_id = ux.user_id 
		WHERE 		(u.email = inputUserName) AND ux.password_text = inputPassword
		AND 		ux.end_date IS NULL 
		AND 		ux.type_id = 1001 
		LIMIT 		1;
        
        IF locUserId IS NULL THEN 
              IF NOT EXISTS (SELECT 1 FROM user WHERE email = inputUserName) THEN
                    CALL raiseError(10004, '', NULL, NULL); 
              END IF;
              
              IF NOT EXISTS(SELECT 1 FROM user_xref WHERE password_text = inputPassword) THEN
                     CALL raiseError(10005, '', NULL, NULL);
              END IF;       
        END IF;      

	START TRANSACTION;
      
		INSERT INTO user_session(user_id, type_id, token, ip_address, os, version, device_id, device_type, device_model, app_version, user_app_language, created_by, modified_by)
		VALUES(locUserId, 1001, inputToken, inputIPAddress, inputOS, inputVersion, inputDeviceId, inputDeviceType, inputDeviceModel, inputAppVersion, inputUserAppLanguage, locUserId, locUserId);
             
	COMMIT;
       
	CALL getLoginDetails(locUserId, 1001);
      
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `signOut` (IN `inputUserId` INT, IN `inputTypeId` INT, IN `inputToken` VARCHAR(255), IN `inputOS` VARCHAR(255), IN `inputIPAddress` DOUBLE, IN `inputVersion` DOUBLE, IN `inputDeviceId` VARCHAR(255), IN `inputDeviceType` VARCHAR(255), IN `inputDeviceModel` VARCHAR(255), IN `inputAppVersion` DOUBLE, IN `inputUserAppLanguage` VARCHAR(255))   BEGIN
     
      DECLARE currTime DATETIME DEFAULT UTC_TIMESTAMP();
      DECLARE EXIT HANDLER FOR SQLEXCEPTION
      BEGIN
               GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
			         @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
		       CALL raiseError(@errno , @text, NULL, NULL); 
	  END;

      UPDATE      user_session
      SET         end_date = currTime,
                  modified_date = currTime,
                  modified_by = inputUserId
      WHERE       user_id = inputUserId AND type_id = inputTypeId
      ORDER BY    user_session_id DESC
      LIMIT       1;
      
      START TRANSACTION;
      
            INSERT INTO user_session(user_id, type_id, token, ip_address, os, version, device_id, device_type, device_model, app_version, user_app_language, created_by, modified_by)
		    VALUES(inputUserId, inputTypeId, inputToken, inputIPAddress, inputOS, inputVersion, inputDeviceId, inputDeviceType, inputDeviceModel, inputAppVersion, inputUserAppLanguage, inputUserId, inputUserId);
             
       COMMIT;
      
           CALL getLoginDetails(inputUserId, inputTypeId);
      
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `addbanner`
--

CREATE TABLE `addbanner` (
  `id` int(20) NOT NULL,
  `bannername` varchar(50) NOT NULL,
  `bannerimage` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addbanner`
--

INSERT INTO `addbanner` (`id`, `bannername`, `bannerimage`, `status`) VALUES
(1, 'xaltam', 'Screenshot_20190301-093801.png', 0),
(2, 'biii', 'Screenshot_20190507-083848.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `parmanent_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `location` point DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `modified_date` datetime DEFAULT current_timestamp(),
  `start_date` datetime DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `address`, `parmanent_address`, `city`, `state`, `country`, `zip_code`, `location`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`) VALUES
(1, 1, 'a 59', 'a59', 'noida', 'up', 'INDIA', 201001, 0xe610000001010000005c8fc2f5285c354085eb51b81e454040, 1, 1, '2022-12-06 06:15:28', '2022-12-06 06:15:28', '2022-12-06 06:15:28', NULL),
(2, 2, 'a 59', 'a59', 'noida', 'up', 'india', 201001, 0xe610000001010000005c8fc2f5285c354085eb51b81e454040, 2, 2, '2022-12-06 06:16:03', '2022-12-06 06:16:03', '2022-12-06 06:16:03', NULL),
(3, 3, 'a 59', 'a59', 'noida', 'up', 'India', 201001, 0xe610000001010000005c8fc2f5285c354085eb51b81e454040, 3, 3, '2022-12-06 06:16:14', '2022-12-06 06:16:14', '2022-12-06 06:16:14', NULL),
(4, 6, '59', 'a 59', 'noida in', 'up', 'India', 231217, 0xe6100000010100000014ae47e17a14294048e17a14ae474040, 6, 6, '2022-12-07 04:36:45', '2022-12-07 04:36:45', '2022-12-07 04:36:45', NULL),
(5, 7, 'a-59', 'a59', 'noida', 'up', 'india', 124578, 0xe610000001010000005c8fc2f5285c35403333333333733540, 7, 7, '2022-12-09 05:34:35', '2022-12-09 05:34:35', '2022-12-09 05:34:35', NULL),
(7, 23, 'dsoikuyghrkjikui,olioluykiyou', 'htyjiuuykiuoliuuyjh', 'Tiwi Islands', 'Northern Territory', 'au', NULL, NULL, NULL, NULL, '2022-12-14 14:16:17', '2022-12-14 14:16:17', '2022-12-14 14:16:17', NULL),
(8, 24, 'dfgfgthbfbfghfg', 'ujjkmhgjgf', 'Departamento de Maipu', 'Mendoza Province', 'ar', NULL, NULL, NULL, NULL, '2022-12-14 14:18:24', '2022-12-14 14:18:24', '2022-12-14 14:18:24', NULL),
(9, 25, 'dfgfgthbfbfghfg', 'ujjkmhgjgf', 'Departamento de Maipu', 'Mendoza Province', 'ar', NULL, NULL, NULL, NULL, '2022-12-14 14:20:19', '2022-12-14 14:20:19', '2022-12-14 14:20:19', NULL),
(10, 26, 'asdfsfdfgfjhjk', 'hgjhklk', 'Rrethi i Elbasanit', 'Qarku i Elbasanit', 'al', NULL, NULL, NULL, NULL, '2022-12-16 12:29:49', '2022-12-16 12:29:49', '2022-12-16 12:29:49', NULL),
(11, 27, '', '', '', '', '', NULL, NULL, NULL, NULL, '2022-12-16 12:53:50', '2022-12-16 12:53:50', '2022-12-16 12:53:50', NULL),
(12, 28, '', '', '', '', '', NULL, NULL, NULL, NULL, '2022-12-16 12:58:38', '2022-12-16 12:58:38', '2022-12-16 12:58:38', NULL),
(13, 29, '', '', '', '', '', NULL, NULL, NULL, NULL, '2022-12-16 13:00:03', '2022-12-16 13:00:03', '2022-12-16 13:00:03', NULL),
(14, 30, '', '', '', '', '', NULL, NULL, NULL, NULL, '2022-12-16 14:10:57', '2022-12-16 14:10:57', '2022-12-16 14:10:57', NULL),
(15, 31, '', '', '', '', '', NULL, NULL, NULL, NULL, '2022-12-16 14:15:38', '2022-12-16 14:15:38', '2022-12-16 14:15:38', NULL),
(16, 32, '', '', '', '', '', NULL, NULL, NULL, NULL, '2022-12-16 14:20:14', '2022-12-16 14:20:14', '2022-12-16 14:20:14', NULL),
(17, 33, '', '', '', '', '', NULL, NULL, NULL, NULL, '2022-12-16 17:29:03', '2022-12-16 17:29:03', '2022-12-16 17:29:03', NULL),
(18, 34, '', '', '', '', '', NULL, NULL, NULL, NULL, '2022-12-17 11:25:25', '2022-12-17 11:25:25', '2022-12-17 11:25:25', NULL),
(19, 35, '', '', '', '', '', NULL, NULL, NULL, NULL, '2022-12-17 12:42:21', '2022-12-17 12:42:21', '2022-12-17 12:42:21', NULL),
(20, 36, 'rgfthgf', 'tryhtyu', '', 'Barda Rayon', 'az', NULL, NULL, NULL, NULL, '2022-12-17 14:06:52', '2022-12-17 14:06:52', '2022-12-17 14:06:52', NULL),
(21, 37, 'gfhghgh', 'ghfjhgjh', 'Bashkia Klos', 'Qarku i Dibres', 'al', NULL, NULL, NULL, NULL, '2022-12-20 10:46:23', '2022-12-20 10:46:23', '2022-12-20 10:46:23', NULL),
(22, 38, 'gtjuokuygjhfhtuyikuk', 'yujyukilkugkyu', 'Luanda Municipality', 'Luanda Province', 'ao', NULL, NULL, NULL, NULL, '2022-12-20 11:43:04', '2022-12-20 11:43:04', '2022-12-20 11:43:04', NULL),
(23, 39, 'frdhttfjtrdtfesrfe', 'erfethytyrer', 'Politischer Bezirk Steyr-Land', 'Oberoesterreich', 'at', NULL, NULL, NULL, NULL, '2022-12-20 11:46:08', '2022-12-20 11:46:08', '2022-12-20 11:46:08', NULL),
(24, 40, 'gjjojhuguyi', 'guiiyut', 'Bashkia Korce', 'Qarku i Korces', 'al', NULL, NULL, NULL, NULL, '2022-12-20 11:58:07', '2022-12-20 11:58:07', '2022-12-20 11:58:07', NULL),
(25, 41, 'fhdfgsdfs', 'fdgdsgdfgdg', 'Dawlatabad District', 'Faryab Province', 'af', NULL, NULL, NULL, NULL, '2022-12-20 17:45:02', '2022-12-20 17:45:02', '2022-12-20 17:45:02', NULL),
(26, 43, 'vcbcvbcvbcv', 'vcbcvbvb', 'Barcoo', 'State of Queensland', 'au', NULL, NULL, NULL, NULL, '2022-12-21 11:12:55', '2022-12-21 11:12:55', '2022-12-21 11:12:55', NULL),
(27, 44, 'hfgjhgjkhkhljlk', 'ghgjdhkhjkjlghjhgh', 'Yiyang Shi', 'Hunan Sheng', 'cn', NULL, NULL, NULL, NULL, '2022-12-22 14:17:03', '2022-12-22 14:17:03', '2022-12-22 14:17:03', NULL),
(28, 45, 'ghjjj', 'tyhyj', 'yiyuju', 'yuyj', 'japan', NULL, NULL, NULL, NULL, '2022-12-28 16:53:47', '2022-12-28 16:53:47', '2022-12-28 16:53:47', NULL),
(29, 46, 'hfhgijhggf', 'hjnghjh', 'gfhgjhg', 'ghfhgh', 'nepal', NULL, NULL, NULL, NULL, '2022-12-28 16:53:47', '2022-12-28 16:53:47', '2022-12-28 16:53:47', NULL),
(30, 47, 'dgfdgfdg', 'hgghjhkj', 'Politischer Bezirk Melk', 'Niederoesterreich', 'at', NULL, NULL, NULL, NULL, '2022-12-28 17:05:22', '2022-12-28 17:05:22', '2022-12-28 17:05:22', NULL),
(31, 48, 'fgsgs', 'sgsgsds', 'Achtarak', 'Aragatsotni Marz', 'am', NULL, NULL, NULL, NULL, '2022-12-29 10:45:30', '2022-12-29 10:45:30', '2022-12-29 10:45:30', NULL),
(32, 49, 'fgsdg', 'gsdgsdg', 'Politischer Bezirk Moedling', 'Niederoesterreich', 'at', NULL, NULL, NULL, NULL, '2022-12-29 10:47:18', '2022-12-29 10:47:18', '2022-12-29 10:47:18', NULL),
(33, 50, 'dfdgrdtgfhggggg', 'rdghfghtyjgh', 'Chittagong', 'Chittagong', 'bd', NULL, NULL, NULL, NULL, '2022-12-29 11:24:05', '2022-12-29 11:24:05', '2022-12-29 11:24:05', NULL),
(34, 51, 'kjhgfdsfghj', 'fghjkl;kjhgfd', 'Politischer Bezirk Voecklabruck', 'Oberoesterreich', 'at', NULL, NULL, NULL, NULL, '2022-12-29 12:17:54', '2022-12-29 12:17:54', '2022-12-29 12:17:54', NULL),
(35, 52, 'kjhgfdsfghj', 'fghjkl;kjhgfd', '', '', '', NULL, NULL, NULL, NULL, '2022-12-29 12:24:25', '2022-12-29 12:24:25', '2022-12-29 12:24:25', NULL),
(36, 8, 'a-59', 'a-59', 'noida', 'up', 'india', 202021, 0xe610000001010000008d976e1283686d408fc2f5285c8ff23f, 8, 8, '2022-12-29 09:07:09', '2022-12-29 09:07:09', '2022-12-29 09:07:09', NULL),
(37, 53, 'etgrthtyhyjkhlkjl', 'rtgthyjjkhj', 'Departamento de Norquinco', 'Rio Negro Province', 'ar', NULL, NULL, NULL, NULL, '2023-01-02 11:39:56', '2023-01-02 11:39:56', '2023-01-02 11:39:56', NULL),
(38, 54, 'fgfhgh', 'jmhllkkj', 'Departamento de General San Martin', 'La Rioja Province', 'ar', NULL, NULL, NULL, NULL, '2023-01-12 10:50:33', '2023-01-12 10:50:33', '2023-01-12 10:50:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `Admin_Name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Admin_Password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `state` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `Admin_Name`, `Admin_Password`, `name`, `mobile`, `postcode`, `state`, `email`, `country`, `image`) VALUES
(1, 'Zuric', 'Zuric@123$#%', 'Shakeel Ahmad', '8578834971', '843125', 'Madhya pradesh', 'satishrkt10@gmail.com', 'usa', 0xffd8ffe000104a46494600010100000100010000ffdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc000110802bc020003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fb32dd76ab0f7a493ef7e1fe3448bf367da9d136e53f5af8a3ea0882f7a376ea7c9f7bf0ff001a745f74fd6801224dd5295db4942fdea0028a68fbd52d003a2fba7eb48ff7d7eb494a9d6801ebfeb1a84fbe69c6a22db65c7b50028fbe69c7ef0fa5089e6316f4e2915bf7845003cd35feed389f2c11ebcd41bb7337d28024d9920fb52b2ed703da9614dc47d29e63e4d0020e942ffacfc2908c1a555e09a97b0847ea6a3a919b766a3ad600828a464dcb4a1768c56a30dbdea585b729fad569268e26ccaf14518e4bc8cab8fc4d729aafc63f04e837124375e28b22e0f389cb95ff0067e5e3b7eb5124dab225bb23b7a70385fc6bcdd7e3ef83252cb6f7ef78c177010c6403f9d58b0f8d5e19ba265f32e6dd470cd243fd6b0f672ea62e49a3d01bb7d2a3915b0a57d6b3ec3c4da5eb16ab7b69387b607872eb8fd6b175df897a0787fce5b9bf40500fddab0c1e4f714d536fe134bd95cea998b039a51cf046e5ea41e95f3e78e3f6b7d2740693ecb6315c201c3ac9bbe6e7ff00ad5e09e28fdac3c65e2d778eca6fecbb666d8a90ae5dff00ce6bae18393d5994a6ac7dcbac78bb46d0c6dbbbe8908f9b6af61fe4570fab7ed21e0dd35e4496f62271b771da4fd0035f1c59f87757f1dca8dadea2f2364b2c227585c8c7bfe3cd703e287d0f48b992df4fb0b98f50889490de5e8955fe98fe55d71c12b6a63ce7dcb6dfb53784e79a4005f6106034c11236f60bdfeb525afed47e0d9a5549175192466d8891424a29fa2f15f9e36faf5cc53be008875080600fa5753a37c44bdd390426efcb8890fb0b704fae3f0ade5828df42a333f4534ff8cfe1db8c4b7376f6b183802eecdd79fafe35d669fe21b2d49567b5b8f3639395619c7e19af80b4af89d6fab595e5dad8ff006828744958d887b72c3f85d9db60ea0fdd27915df782fe2e6ab696c8b6421d1e1dea73a66a6af085c9e3cb55500fb0cf6e6b965836b62b9cfb5965f35739dd48537367ad785f85fe37dd6f892fa292e6d581ff00497558d8904f63d7eb5dad97c63d2ee36c935acd1c4f26d5949041e9c715c5530f386a5295f43d03cb512648ed48ce090074cd72da67c48f0eeafa8bda5a6ab6e6e97936d249861f8574b1ce9212c8cac0f2768c0cd442324f5348ee4cb1b65b1eb52c519da73d6abb1cb7e15662fba7eb5a972d8465da714e8fee9a751526234fdea71a2917effe140087ef538d22ff0017d690fdea0009dad9a1879ac1bd0629c6957a1a00434abd0d2d27f15002d1b7bd29a4a000b6e5a02e40a4fe2a79e86801b8c5148bd0d1fc5400a5376dfad0576b9a7d31bef0a00535e6dfb4bffc9b97c56ffb15355ffd239abd24d79b7ed2ff00f26e5f15bfec54d57ff48e6ab87c48997c2ceac2fcc0fbd26edcedec6973b7e5fc6936ed35ce750e349bbb529a6ff1504cb6176eda72f43486957a1a97b19c770ec685e868ec688fefd5ad8b7b0b45294dc4d3913009a4643280bde891b754ebf745004710de49f4e2936956f97ef53d9b9c50b1fcd400c914338fa73432ed0bf5a9123ebf5a5c6d34007fcb53f4a53d4d29a4a0028a28a0029a4e1be54dede9419026e2cdc280403d3af5af05f8fdfb4fd8fc349a5d234445bad68c419a61f721c9619faf1fca9a8b93e5885eda9eabe39f88be1df005935c6b5a9c56f950de51fbe464f03f106be54f1e7ed93aeeb57f7d0f856cadf47d26dfe517f75feb9db9c95ff6718fc735f3978b3c79adf8df5417dacdf4b7f70642213236231bba91f95675eea01ada3f25cef94f52739038e3f106bdca1808c23796e724aaf29d3f8d3e29eade2bb7f2b57bd92e0b3a1632cf2056084b02230db7ab1e4a93f95637fc25862b4688d99775270f2de02b9273c47b57b11ebf5aa106a76e92a346aa97ec0ffa49feef4dbfccfe355eda6066324fe52329cb20fbd282719fa735dea9c631b223e2d4e9acf55f104fa5cb756293456c0a249b0f91f3649e077e08e7fc2b7f42d17e23dfdafda53589f4cb407e49e4be60719e981dab98bef1cd9d8cb6f71736b1bed84186cadced5f9498f739ff008074f6a483c75af78821bbba9afa4b3b00a14a4645bc2a33c0057e790f3f4fd6a791058e9aff00c3b3b6a5b659ff00b42fa40d23b90f2bc8ca07ddcf19e6b4eef41b4f0f436897ba7db4d336d22392e3748ac79c322700f3d0f3cd72fa3f88adb475fb1e8b09bed4661bef6e64471203fc2b102c02f4c9279e6baab1bdbb7315c584b65656d31daf0c6aadb88fbcc5949c9ce413ed49d3404cde1c9fc5f737064f0b489200de54b05a1dbf7463ad713a9693afe857b25bb23e929249e5932c6d1e70073c57acc5e21bf9a216697b61630ccc3cfba62c8fb07454ea32483dab4354d635fb1ba8cdbe8e6ef6a7ca25d4d62253a0008441bb8270413c8e7d254b97403c21f45b1bebadba96b568f0292f2192e2475e07f122a9623f4aad2787fc3ba84f04d1f882d60b4c12ab1c260de79e231e5ee3f53fd2bd846abe2292e2312786ac808d4be26ba8e59235dc3a796bbb775e4b0ed4e9fc29e18f174f71797d6eb65a8cbe634712dfa49e69439259124dc719e54f6c55f381e21a8f86ed6d2d44f15dc52066212458a77318ff006d880031f4f4c556b18ee91cbc3b03821114602a9fafaf39fc6bd5750d234bf0343753b476d7b1ba37957715bc73d8062a0e140276b0eea79e87bd7332f882e2f2d649750d5fc4b6b06c0a86d0a5ac00638c41fc43fdaefd3b56bcd78d80c4d5afb58b9916df577bad41548290e3cc098ee1bb0f6ab369ab58cebe6f97765c71949f6b023b62b0e3b5bdbd69e6b1be8f5685465a0b9b789642bea63ea7fdefc3b5470dd594250ac4b6f3e395552a07e1da925719ec9e12f8a9a078736b4f0788e295976c8af32bc0c0743cf7cff4af47f0a7c48d23527796da7b8b6967f99a3954825bd7e5e318c7e55f3e68d7da3de2c9fda17d2c2db76a6c459158fa15ebf8d779a27856f2ff004f5fec2d4740b870bbbca37212e2327f8d629786206381eb5cb52292bb04ec7d2561f19069b15bdaeaf30d4eca7c1447524a1e9dfe95ec3e14f1869daedac66d2fc5cc7d4a887fd59feee7f2fcebe2df0eeb0da413a6788562d1a3524cabe4f94015e46e51c0639ddc718615b7a3eae9e13d544fa795991dcee62ca0ae46778cf6c11f91af365454b586e74295e363ee48dd02f988700f6ce735344dbf9dbb7fad785f81be304105814d61a3962723c8b9b520f3df763bd7af787fc5ba7f8a2333693756b7918e30d26181c0c82b5c92528bb3358ec6e1a2ab4625dcc58aa927384181530ceee4e6a4053f7aa41d29a5377e54a8bb4114001a4a714ddb7eb48cbb59a8013b5487b7d2a2fe25fad4adf78d00368a36f7a31bf9dd8c7140050bf7a80bb7be68a00077a28a72f43400da294ae4d371b4d4bd8051de953a1fad1eb42743f5a71d800d79b7ed2fff0026e5f15bfec54d57ff0048e6af486fbc2bce3f699ff9372f8adff629eabffa4735690f89132f859d3d1463149fc541d42eec518de33449522f51512d8996c2902300b7dda7b03c1f519148dda917a9ac8c4290f4a5ee68a0073f6fa522360e29d1fdd34acbf2e6a5ec54771b343c669d0fdca471bd14fbe2942edcd5ad8d50f5ff0059f85364fbd4bfc348fd7f0a23b8c65491fdd351afdffc29f1746fad53d8996c3e93f1a5a4dbbab377e86226c0ecb93939aa1afebfa7f85ed25bdd52e61b3810644d2751eb8ae67e2cfc50d27e13f868eaba81125c3b6cb581feebbf61f5afcfaf8b5f19f5af1e7892e6e352babb1b8ed8ed848c20886490303bf3fa8ae9a787753e2d82f6d4f68f8e1fb5fdeea4973a5f8315adec73b3edf3fde93939dbfecf4fd6be56bcbc17d34d7577279b75231691ff00bc7d6a8dcde6652243e636724e08c7b73546fee96e1d4a8c00bb7f535f41468c611d0e39cafa17e7be50ab183c6735564b866326de8405fd6a9dae0872df75466ab5e48f2bc7b06f279dbed5d0a36313566ba58a431c8cd91d00a6a9bbba478630e4b6088fd79eb4cd2b4c85dcb49f34b9f957d2bb4d0e4b3d22da6b9b81f66b607648dff3d1cf45fd07e7449d9010af810b69c6fafa19647601a45f2f20443a73f5cd60eafab44662d6dba3830044aa73f2ff009cd67f8a7c5daa789b54925ba958419c2463f8547ca07e9592b701dcf96a4f3d4d2e5f779868e9b4abaf24f9f74ecf167e545fbccdfe1d2b7adf5b92598388bce7ff0057e4190468aa7fbe47ccdd3eef4fd6b0fc3fe11d6fc53b23b481d6d436cfb449fea519bef67df007e95bfade973685610db595dc33abcfb08b346525800a4b38fe1e3a7f8d48a5b175fc4fabde5d477b24f09c00b1965f2d22504a8daa9db20f279fd2b51bc47ac24d224babb5cda96c79830a41c7401b923a735c85ae9b7e97370d77385083082351231f6019b207fb7b4f7f4ab7a77872f753993c9ba4567ce626c33023fda0abfd7eb469d41fc27a168de319265163a81d3ef6dc48ade695749d0760a55b6e720f55279fa5765a45ec7ac958a7f0e4578233849feda52607272490aa338c70727debcbd3e1c7882de3b7962b68af0dca14586776db96603390a7d3a55cb79b5cb3bb960d564b7b48e0768da3364fe5a282431dc40078c734a5184959151d8f55f137c36b2d736c81f58d3e2dadb0c51ac980003bb2bd4673efc5798f89bc08d69733dcc53693a9c4a8b97bcb068dcf6e5c743c5771e00f17e8d6d792f9b0da191c7946fb4d5dbc76cece33823af3c8af43f10e94d16929726f3fb4f4cb88c2c904d187caeec8db21f98375f9471d0f7ac7da726851f24eaff0f356b191ee20d3a7fb1b7cfe769acf73127fc0bb1ff67e9eb5ce5e9309f2da1bb9180e64b88ca31fc0f6af60f1afc394bab21ad784ae679e785e4175a781224d17ced83ee3a735e393ea1a85bdc6dd42432cea36b8bc019c1c9e32dce3ff00af5b2775713d8581199548dd18cfde76c2ff00faeb5749b87b4bf8d92e27b69836e048ca1c77cd665beaf247264451aa9e7f76001fa5751a5f89ec65896cb53d346a568cfb8426e4c2c8d8037211c86e073d38a637f09ec3e07f19ddebc9711ea96515e5aa47e635d20595362f5561d47afe35b2de0eb59ad87fc235788d6b18f3069723ee4656e418f77cc392781c71f5af39d13c3be1fb89ede4d2355d6344d426996de24bf8567472dd57cf460a78c7def9bd78c574916b369a3ea76d69ab5d8d3a4198229e46cacc549fbae818230393c9cf3d2b9e5b971d8e83c31aacf06a5f62bcb592d2739b5304ccd8959bfe59e1bbe307f1aed7c3faeacd34b6b3bc96725af1b15b63da8070005ee38ce7deb9bb796eded8e6dd75a86601964bb8cccee01fbca481b88fef7b7b573fe2b17b67736fa8adf2dec529f219e19183c78e7071d08cf4ae59a6de853763eaff000a78bbc41a6dbdbb49341ace9c8800f34e26db9fbe0771fe15ea3a2eae9acdb2cd109555bb4abb48fa7b57c17e0ef8e1e21f01deac16d733ea7a493fbcb7bec4c0e782416e4700715f55fc2df89ba5f88e159ed62fb3f99feb23832850e064903e5dbf5e7ad70ce335ab3783e6d0f5900e4fb539c636fd6a18ee12640632ac87a329520fd36d4918c5605f25b5257fbc69869c69a690845eb4f34d5e868fe2a005a294d254bd80077a077a55fbadf5a647d5fe94e3b00ea283fc3f4a534c06ff001538d2af4340fbd400cfe2a71a79fbc291fafe1400caf37fda5ffe4dcbe2b7fd8a9aaffe91cd5e915e6ffb4bff00c9b97c56ff00b15355ff00d239aae1f12265f0b3ac2307ebcd2521fbb4a3a5739435aa509b803ed4dfe1a7c870c94ad7d0a8ee39176822a45e86a076f98d4909ca9fad0a36d4d50e34dd9ba959371a688fe6a6296c3d1768229d4ddbb4e289179cd0620692951b7034ea0045e869463f8beed145002283e667db8a3acb9f51b7f9d364fbb42f6fa5277e802332ac8cc594ed1b597ba8f5ae3fe277c54d1fe16684baa6a3283e66560b7eb24cc3a1c7a7f81accf8c3f14b4df85fa25bcf7486f750bd91a2b0d393adc48a3396f65ce6bf3cbe2a7c42d4bc6de2abad5754d41b54d4675d925c1e9c336157d8671f81aeaa387751ae6d84e5c8ae3fe317c4cd4fe2678c2ef59d4e40cccbe5dbc7b3679510662108fa963f8d79a34bb7737be29c6e434acbdc715129c5c11ea335f4aa8c69c558e36f99dc58df863ebcd52b939929d29d8ce3df3551cee6aa86e44b62eab379640e98a9220155779e7155ac7697c15c9eb525e5c2b4e001b485031f89ad52be8669d8b8b3ac23706da83ef3556d4b5d9afe48367faa8f853ea2a95c16e84f514e8a10ebb7f897e6a7ca96a372be842633380c7a9e6b5b44d395ae517e5dfc9f7c536c4208a6dfccf280b0ff00b247535d3f8534b335d40f1ba4b7171709689007f2da40eca4b337f746de9f5a86f955c48eb3c2565a75bc2d713c8b6b2a260dd4e72235e73b57f889cd62ea9f10adedd6e2df41b56b289988fb548d9775ee76ff000e4e7e5ff1ac8f1df895f56bcb5d1e14823d374df94adbfdd965ea5f3df82a33fecd73d6d1f9b308914b1dc1480b92727815115d4a3b1d12fe5b8bb8963e64b8530a129bdddcf5da3f115e93e22d593e1e5a41a75aa4771ab3329b904b3320da38623ee9f6f71eb587e18f0b0d1629e29ecf52bcd5e44f311f4b0cd7b6eaa54bf96bb70a08232db87e95c07892d2f1359ba8eee35b693cf7648e59e369803c8dff003365bd7a7d2a2d766cbe13d6b41f8c7a7cdaac2badeef23948d6089e67dcc500193200a32393b4fd7d35aebe29783f54bb5f2f44b9b7d6e389122bfd1985b859186d219e321990851c953ce79af9bfcb255e391d8921b20003a7d2b79aedda58cc281140521a49bcb3bb03ee9f5e955ca23e84b4b18655b7beb7d3f47d32699887104e2499980c161f2a65ce3b9cf4aec6df53b0d66d934cbd7d593518c0f2a436d28c202776f92377383d8647d39e7e7ff056af71617cd74753fec676fdcc93c36cad3c8adc6093d7a57aef85a2d32e65f334cf124c9aadc3ac9e55dc4c279153e5cc71c7202dcb1cfca7ebe9cd28db51c77332fe08249611f6896d6f8b346cf751fcf06e2401223fcce8401b89e80ad79e78b7439575112de5fdbcf1b20093b482ea346058796ddb6f191e81857a66b5e1cd5fc36f7116b9e22b18e46245aa43095709939ca81bbaedf90fd7bd717a8ebd6f6e2e5668ecb529c5ab5b47abc3796d69736f2393bd1a3fe24ce4ed3f3658fb528bb329ec70973e03babe7775d3563c47e60bed16d7cf8176927e710f299cf53ed5c8496773a45c912947f2cfdd4e8b9e71cf3df3cf3cd7a468635ed2d92e74974d32688e127608870405ca472361b3839daa47eb478a2d6d6eac62b5d5b508ed75a43b59e0dc20b81d7214aaed2493c0c8e3af26b68d4d4c9ec637853c5935ab4d1c7388448be5bc4cfb5640dc618f6e9c1f5af454ba377682d7ecd75ab5adeda847d2eec3453650b636c83fd681c915e2d2a882e0db7d892268c9650dbb2dfed0c76ff0ae8f44f174d730c76b7de698a35118922670f02b120b2e5b1c639f94f1576ea4adced34abab9f08c6351f086a8d79a03737565324b88241c0565e818303cfd2bacb6f17c9a95a43717b136966f5c3c535d480d94db7aaefe8af927e53db07bd54b7806a6905c6e6fedd78f0b7b0a2b43ab471fdd5dcaabce0e0f5e9d6bcf9351369aade5b664d367911e29ec9be7f2cbff00015feef7cfb9a870e756358ee7adf88f4bd47c330fdaaced25849625bca0854e4039564e31cf7e6a0f87bf11ae7c39aada5fd84f2c774263e7473fcfe6038dc33e98aa3e07d72efc32824750ba7b8546b3957cc826c000e0763c56c78c3c29a5dd24daf68d325bd8a046beb363bb7124fcea7f847418ff0067deb866bec96dd8fb83c0dacdaeb7a25bdee98f0cd0c832d083b4c6dd4ae3f1cfe35d54528653fbbd873cf39c1af86be0bf8fff00e115b9b7974dd4679ad581f3a1ba6ca28c9c007b0afaff00c1de33b1f12da3c91cb8b8501a45126f1cfa1fe95e7d485b53684aeac7501b77f16ea293e5de427dd1d29c6b9cb128a28a00293f8a8fe2a71a000d3776d6a5a280027730fa529a4a4fe2a005a28ff96bf8529ea6801bfc54e349450015e6ff00b4bffc9b97c56ffb15355ffd239abd236e6bcdff0069718fd9cbe2b7fd8a9aaffe91cb570f89132f859d684ca13ef4d917691f4a7329daa54ee6ddf73fad2380f2138c7622b08ee6b0dc8ea783ee1fad319769a9a0fb87eb54f62e5b0b42fdff00c29b23ed6fc29d136e53f5a831187a9fad487b7d2834ddbde8010fdea95319f9beee2a3f329bb99a41b7a54bd8a8ee3ce79fd288e8950c8caa7ad27dc9a3f66356b62dec48df7853a988fbca9dbdf19a648db65e7737cdf2b760691905c00bf39fb8dfba7ff8174fd45667887588b44d0af2fa69111a282466f37ee82a36a9fd4d6b70ecd965673d76fb5789fed23e24b8d1b46b28d5247899a4ba902f4c08a503f955421cf2b01f267c7ff89b77f103e246a77b0bb7d8b4c492dec8ac980b1a33091c0f72e47e15e157370f2484e082a02608c631c0fd00fcebaad4b53b616a896d1b472cfa55ba90bde52eaedff8e85ae10dd19a4674ce1be6e7df9feb5f494972a48e596e39d8b39cd569e3cb160d860bfe34e958b024d5597ef0fa575437397a8e9a692eb6090e4aae01f6c9a621c9fa714cfe25fad485b6961ef5b3d864af72d12b22b60119a8c3bb2ab673c54217ce971ed4e29c91e9c53fb248d66324c33d718ad58d5608f7374c543a6e9525cb2cdbca40b228761d57deaddd35bcfb92d8bb46b91b9fab1c9e6a068d3d034e7be649b386f33ca8cffb4d803ff4235bd7d751698fab18e155834f88dbae7b900213f983506817f1e990445982bed7d8edd2238ff59f51dbeb59f06937d359c71bace9f6d613ba4dfeb0046620b7b92777d1857348a463456ed39750000802e07d01feb5d5f85ae67f0cbadfc131b5ba5cac53a6d0e33d429eb9abba0f8598949ae894498624661bce598e02afaf039ae8edbc2571e24d4dd6e43ef242832b658aaf0323b74e94a7555f959d71a4edcc8e46f3c67ab6c74b12d6e1c967964937bcec7a96dfce7e9c715866eee0b09668a1925dd96692d9091ed80b9fc770eb5ed127c2a9ede5448a3c09977abbae518f236fd78fd6b9bbff0087f78f70eed0059f760a01818f6a8552087c933cf6e996ea45916d96dfb9585d8863eb8666c1f6e3a74a8d2cda5983287625bee9e9f5af44b5f873a85c1736f67b803865f7f5abba7f802e84ad1caa9031e0093a31f4a25562d590724ba9c469fa7013235e5e4d6f0798b8fb32f3c75c9fa57b97c3cf15d8e8da609ac228b40b69d76fdb1a179eeee5413cc413e61939cf6ae24f86aeb4f32c28ab1dc1c0585bfd631cf3b7db1fd6b2b57b0bfb3d5e06bf33fc8a3ecf0dd3ec2a39ced3f5cd65cd7172db53a8f1c5de95ad6b627d3629e19b1b9de44da64ebf360f233efcf06b2b4c5d4af7789f4fb35d399591eeb53b8fb24607fb1316c6ff00f6769ea3d78d07d766d4e0b2866b7d3f45860188eec59c677abf00bb152c5f2a7a718c55b1e1197c4b015fed8b1bab9997cb3e6a807cc424c64078f673d3d69a113e9fe02f01cf76e355b5be82162006bc80b4529da3e65b98d5548fae4f1d704545abf8674bd16ce68b439358beb112190da2cd15c5ba6d03aa952ca3047cdfe159d75e09d56db4a6bc97447b4b8f357cf6f92111f62e4ef442a483d109ebcf618d1e82b66a5f51cea2aaa4db244ae72727e6040c11f4e3835ba575625ec72fad68b8badede6950729e5e7f759e70a7032bcfea6b2d93ca9f30460ce4156cfde93debb68f4d6bdbbb46b4984ee1f74f0ac6c648bfda51d58a8c123d18574f71e0f8f58b7bd5b2b1fb6db1fdd496a5b718e56e44d6c1a3324521d993860bd38ce73b29f2ab193d8c8f83daf8864934b12954b90de7dbbae7630e5197dc1cd753e29f850de38b34bcd2eee0bcd536ef8ae6d4edf3b0486571fdf073f862bca6f60b796fa46b1be91ee9305669df2f391d7773f33839049f41e95ea7e10bd6d4a18629b4e48752ba8395b63b61d5c2f215bfb970a72c1bb8503b565555e4a437f09ca785bc5977a15cdc68fa95b7dbac524f2ae6d58e4c7d335e8aba53c5713ea5a342b7562b6ffbcb490093cbb71cb168b70765c91cc7f30e73c62b95f89fa02dd6aa9a9ce2db49d71a0595f8d82f93951211dd8ed209ee54d43e09bb69f4d5b49ae11f6319562c66689d402ad19f4049cfd6a65f09a44eaf5ad0a09268359d2218e2d3aee3551f6773e5ef1f7f04939f9b3fcba835e9ff000bfe205d786eea064802cf90a88873bc77af36f0ecb6dacda6ada292f696caa4c9672b64432b8f96453d83b027eb9ac4f0c5fde69f14f6979741ade39d1ed9d1d5cab2ee59139f62a71fed57254873c6c51fa29e15d76df5fd3c4f1bbc618f31bf553819ad8241276f415f32fc0cf1b446f23904dfb99235b5b85b86007cbc0e9ed8afa56dd111884381e80e41fa579535cba1bc7624a294f53f2eda4acc618ddf2fe3499e71e9c503ef8a56ff0058df5a0019be7c5295db41a6ff0015002eeed49b769a71a58fefd0007a52bfdf1f4ff1a717db247fecb13f9d4653cbf97d2801a4fc8dec47eb4ae36ccf1ff70edfd33451400495e73fb4cffc9b97c55ffb14f55ffd239abd157fd67e15e73fb4c7fc9b97c56ffb15355ffd2396ae1f12265f0b3a53f797eb4e93fd60fad232eda7b2e71f4a0ea0fe37fa538fdd1f4a6a8c15fad3cfdf6a00605dcd4fda55be5fbd4dee6a58bee9fad44b6265b0e5c638fc69cbde917eff00e14c0fb588ac1ec671dc698f70dde8d4e917748bf5a49cee29f5a4fe3ad606a8713b2622a440ae093eb5114dcc0fb54aabb462aa5b0a5b08d09dd946e31f76aa3b967109550ec4951dce2af2a6e6aad7918284105bbe0f43feeffb43afe559110dc82dae45dc5b865668f9689bbfbd780fed5ffe97ff0008cdd4f2c7f65b8b9fb048acb9283ef93f8e00fc2bd97525b9df05c40fe6ea11bed86e9546645c302b26721b3b8a80db7af0739c782fed0ba943e33f00ea36968c3edd984cf16f28c15981dac8724152a53927841ce318d293b48a96c7c45aec0ef1417328d8f73089b6631b464851f9283f8d729246db8e3a57aaf8df4f8e5ba7b48c664b7718e3180599bff66af30bf89adee30c30771fe66be9684af13cea856f2ceee6868b73eddd8e3346fdf24876eee3153c48cd10c0c0ae9302910c0901f8151b025f04e4e2ae3c433f3f5a4118fe1e94010c76eaab93d69772a918ab11459c8ab11e9be638345eda85afa0c8ddcc781f72ace9d688d38775c8ce2b4f4dd09e794ec2dd3e603d2bd37e1dfc339753792596d8cb6e01539e8a98c92dedc8ace75796373a69d3b999e10f09bea811a1b7f35b7e107e02bd374bf8772338796379274dc26b54ebb3039fcf3f95765e05d03ec70c3697d10b0b80760b948f30b2ff000e0fd315ea36de039a17598146551912b062587b11d0578b3c4b6ec8ee8d1b2b9e69e1ff008750d9de2290226f98c72a7458f6ae10fbe771fc6bb2b2f02c2d3ac821f2767dc9163c86381ce6ba793499e342ad8457e57cd90942477e6b734e319114820f3a66508cf19c81d78ae36e52776754236d4e2d3c3ada608e2687ed0acc371843175393cf1f854da6e81a6ea50ee2c5a4058b2907cc232795054f35e8d1da16e8a2320155dedce4f5e3e98a643e0db158553ecf1e07dddcaca0f3d723be7341a9e7abe12b3495e52af22f1e5b35be1939fe2381cfff005aa8eb1e054d52621e116f21240914e77f1d6bd71740658d628ddcf390aceed81ec7b0f6a6ff0064185ff79b96356c90c4c9183eb93dfda84ec2ba5b9f3f5ef8526b7b71697702ce855951b6f3c7bd4571e19b19c35bcf0ccb1c912ac91f98085c7495437cb95efdf0457d163c316fa8348dfeb948ce241843ee2b32f3c010dc15f294a04e707d7dbdaab9dfd92252a6d1f3c37826dadee9648fc88c47cb8b788ac00f40cc4a95c363240e39abfa468f73a22fda6ebc37a6b4c0e71691242c173c602001bd771e79f6af5cd4bc2175032b2402688313b924c3a71cf1e8462b9dbcf064f7512cba42080ee252d4baab71d783d7eb5bc672b6a73ba516b991e57e26d360f11dec90882eb4c794bb2bdd066553819c11ed5c64fa568ba05fc76b71ad43abc574a2cc2085c5c2e7a185f6ff0001cb11b87defcfd7ef3c38f7c2f45c17875171fea91c23823b71dabc57c6171aa42c1fec57d68d0e6317369a9b090373d40aeba72be870ce36d49b56d1ac2d23b17b1d29b548cc861bc9814b5963c701cb36e6753c1c060324f1d49b3637b78d15c68d6fe20d42c6ee4747b54bddb34320c9c2aee66c0e3a71f4e6b0d7c51a95ad8dbadd6a92691e505066b8ba330bce4fc873dfdaa3bad72c35ad3ed50bc4b304924f2143472f538dac3d0827f1aec5f09cef6317e21eab7506a3610ea9047a7deae54cf0db88d247cb7381dfa73543c3cef6f773cd0ced03be3ed6a81b6c91a9dc5881df8fd2bd3534dd63c6be1c5b376b7beb50152e14a842182b1594c87e6321cede38c2ad70b65aba7863545b46492d6181964b3d45cc8cd67b54064f7dc73f9d6ab620f58f11699078afc0627bfd4217bc8904961a8884ac9bdbf788189fe1c71f9d783c7a984d4c4735aad84af2ab8ba89d5e22c79395eb8ce4e7debe94f0d6b56373a5c69712acb6524c238e2b842bf65b875276007af556cffb75f39f8abc3b7da16b1a969baac6cb756986902a6c631b1255c0f4ce47e1408e9d60b8b6b48b58b2b8ba86f6c90c8d74aecd005df8e377407774ab288f73ad4578b0262690b5e41074f2c12af29f752a87f1abbf0d7596d3ace482f152e2ce74314a47de5e0609ad1bff000abe87a54ba9e9332dccf6b1f9d3dabfde10970038f6e08fc2b964ecce85b16be185d9b0bdb6bb82532402674b9b33fc126ee4fe20a9fc6bef2f055dc57be1eb39617de85381fddf6afcf6fece3617716b36771e6c5725263fec82ec31fa7eb5f647c08f12eef0fb40e8cf1cafe62b0ec4803fa57062d5d731d113d6d7bfd69477a6c6725cf39ddce69c3bd79f1d8b13f8a9c6936e69146d93f0a602d14a7a9a4db9a004fe2a92998c52afde1400f5ea6987ef1a7b76a4a006520fbcdf4a928fe25fad0003ee8fa579b7ed31ff0026e3f15bfec53d57ff0048e6af4b3f7dabccff006995cfece7f15cff00d4a9aaff00e91cb570f89132f859d485fde29a90b6e93fe054c5ff00586a64eff5a4744b603f7c7d694ffad34b452460c88f7a66efbabef563f8bf0aae7efd346f1d80aed71fef52b2fef81f7a5fe2fc29863dce1bde9943d9cb3b05fbd9a92188607aeee6998dee57f1a994e7f0e29132d8936ed722893a8fa5145498826dc1cf27d2a09e35697721f2b0b874eb9193838fae6ac6de87633f3d3b552d42ecc7211020b9b923eea330207fdf38ff00c7854bd80c3d765306e68a2170ce8526852ddb7e477c0ea30457ce7f1db42b3205dc7a8269f752dcc0a2482041742266559236859833c6720e4700a9f7afa3758b3866b6796f22921555f98060aca48619678d99957eb8efc7af01e25d0347b8d1af2ca078e165f24041247245295d8fe6296fe25fef9e7903b528bb3366aeac7c55e399b50f105e5d45791dbade1db7426b16262b89500dd2b7272ec793ed81dabcab579eee6bab817524a2e0280eb2aedc9e4e47b735f427c41f01d85a789ef63b59e780c90417522c56b34de5bcbe672e4292010036f1f2f38ec6bc6ded0eb3abc318bb7bec00a4b9c8c0e3e524038e3bf3d6bdfa13f74e3943530b45f0dbdc41bf6e722b6ad7c245b0a7e53d715e85a378596082118c283c0add934a587385cd539ea6f1a77563c76ebc32c8d807802ab7fc23d2053cd7b1b787d24049e09aab2787123e33c1a5ed797513a3a1e4f6be1c7693705cf35d2e9de0ebcbc8d9a10bd42e0fad7a7e87e1732c2e63e99c5745a6f83e46c7dd2010707daa2789d0d638653566719a0fc18bb802cb792f9c51f845e80601feb5ed3e19d12ead628218922e31b7e6c1cd5ad33473707cdda91027071d7a0aed744f0fc56ae8dbda46209cb2e6bce9d7f69a1d91a51a6b41da469b7513b6c8a56bbcfcc222ac587a60d6e69b6c8c2702dbca3c79a1418f07df6f19ad4d1ac8c568a3f849cf4c55e683cb955e13b5f1866f6ac41ec363d3acd71248b1c898002cd2993f53fcaad24291aaadbbbae5b3b3b7e1ed576242501217d87723d6940c363cad9eedd68327b112da6e72645dedfdc6ebf5a54b0576215a58dbfb9b722ac04dc7ef337fbd53222a9cb75a68cc812290713332a8e06d18ab10c4a5b898eeec0fa54e8237e59be5e9b6ad42800e1188ecbdbeb4c96ecae554b75c92bf8fd68b84dfb10bede7e53ef5a4381f715bdd7b7b528457e5bad5c5733b18ba9a19d0c0e1cfc9b48ebee7d689ac6d2f884bbb659dd4e51b6f29ef9ad0f263dd4f102672bf7ab650e5d48e7397d57c1d697484c81a58c1c83bb7306fa7a74af1ff00881f0ced668ee05bc1e43dda7d9dfca46459324e18e3f8bfc057d1e822009c64f422b17c43a2dbea368d14d09446e43a7de53ebf4a77b0e32be87c15e20f062e8bbae6d16f51e01e4ddda9cbfcc0e04858b72a4606dda7a13deb9ab6b26599adee35495249c6cf21ae632b267b0b72aaca063ef0c8ed9e2be92f88ff000e6eada67b9b6093488b87864e93c1b86ec7fb43fc2bc5fc45a1bff6a4962f10b766b8cc2262e7cd1f37cb846dd9c639da45745395ccdee51f0eeba7fb72c92eee8ddda93bc5d5adafefa331e411b1b89540073b7919aeaf5df06c7e39f0cc7325cc3717b0177548911a3994925002bc83b0af0df303ed8ae4ae748b3d3a733d9adcdbdf6f8f1666f488f1e59c90c21dc9dfab76af46d3ed9ad6cee25837590b9760c262b2232e4e19dd0ed6553920b7cd9273c62ba22eccca7b1c578600d2743b9b7bed35ed248800f0cdc01b594821f6fcbc93fc43fc6d78f34dd42eb5cb3b84b392f2ee0b4ba71e6067db10019c060cdb861873c7d3d74826b2fab9b5b95b77f29838b5bf5d8ca9821da365f97e60c08079aa1af681756faedcb4914ab6184290322a955445578fe5eb852ad9ff006aaf9afa19c373cbbc2df62b5f13c3a2c90bdacb745278c30223c81b875efc8af4b92d2f744934f3751b7da84935a868e4c3343200d823fbb90dfad735aee816dafea16d3db5e37f685a63ecaea3cc68d10908593fba48233ec6bbe17da86ad069d26a51c49a81923f35235da8ec0fa76e3159bd8dce42c9ce8baddfd9410acf6da82a98234180824c8e0fd54d7a37ecd1e299b4ad61b4f77b6b51e6b2117136edc41c67f4ae4afac22bad32c7549cff00a2a5a5ca4cb6fd55d602c83f306a6f87d6b24de259e285a5f9648278bcbe5977a2be48fa935854578b454773ef1b306445638c633953907e9536ddad587e0fbd9a6d26169f0f2a7c86409b09fa8f5e6b7d8e4e776ecf35e4a8d933610d250bf7a80b9cd200a72f434dc628a007d14ca72f43400b483ef52d0d1ee556ff006a8015bb52529ea6a48bee9fad00406bcdbf697ff9372f8adff62a6abffa47357a749f7bf0ff001af33fda63fe4dc7e2b7fd8a7aaffe91cd570f89132f859d63741f4a6819a7bff4a233f29a946c9da3719b6a588614fd69ca4e0d1411cf7d0298c9b8d0fd6983ef37d2908911768228c65b148bfc3f4a7b7f0fcbdfef5003b618f685fbd9a70c6eff0081734c54dcec776ee6a40bb5a801ecdf3114cdbb597eb4e6fbc94ac9b99be6fc28011f3bdb6f2de954e4446752f0841bbaa2fcec7d33e957a31b49fe1ff67d6a0997f784fdd18f9947522a5ec5c3732ae34fb19ee2679dda1900c65598baafa6474eff009d721e34d421d1748bdfb1df5ec0bf676669eedc4b1c639c1daea77124100575b7f76201236ef2ec9577309fb63b8af9abc79f109358d4afb6c5b6ca0479616768c069108fde3e7e6d8a318c7192688479e5635bf2ea784fc5886eb5199f50d6754bb9d8b794b14d0dbc53794c392c5402bfeefa73dea9fc2bf0d30b19ee8c7992e1f11920e446b80b93dfa5725e23bc9751bfbb959a5373e6b965249c6f6febf7bfe055ee9a068ffd91a25a5a0623ca894367d48cff005af5e5ee4523284539f331b2e9c2489883ce707eb55534d65538ada8caed3839e691d7f8bdb158295f43abdde867da6961fef75ad8b6d2a3855bdc52d8a6d43ee735793fd7474a4ed1355b0fd3b47552add8d74b67a5a3ba956f97bafbd55b40cd2616b72ca12b70bbba919af3e53378ec6cd8e951aed2836f15d2585becd824fb8a7756769d1811392d815af64d1988159395e6a14afa0a5b1aebb54165e84e6a70fe6e0a9cb20fbbf5ef54adee582eedd967e33ed569633918e83afd68307b16206084a6edc5783eded567ce3950abf367ef555b440c24446f9b7671572140ac176ede79ade3b193d87e0172036e3deaddb2f9084fa9a8520daec7dea75424fb0aa4ae632d8b518c73eb5305dc41f6aa8a855772f4ab28ccc06eeb5d518d91cf2d87b2ed6fc29eb1ee9376ee83eed49126efe25ff74d4a63ff00a6607b8a72d8c48d3a8fdde3e6a7b22b48723140803f1bf0dfdffe948493c11d38cfad671dc04923195c74cd57ba210956fbac715622cef3b7ef536750431c2bf1caf7ab96c6bf64e23c4568b26f0e7cb03847f7f4af20f13786a59ee5a7dc4bae544e9d633eadec738fcebddaf61f31590962b9f994ae4907b579678a748789a6b725dadc4a823778f6185f2768dfefcf1571d86be13ccadb4cb664b85994f9e226f3add97965cf12c3fde2a7248f7ab36b0c76b6770f09f2a190ac4f711ae155f000764dbc06de38dc2b5f51b47b3464f2d4a3b14d85b1e590724fbf3939aad7b6ed0e9172558cd048abca1e0364e4e7e98ae85b1cd3312e7c3f24b6762b34911d434e4da1224d85b6390a806e6e1c3b73c743c550d662fed0f0849692c83cd758ef23923fbe91c51a2fcdfecc7b53f335d849a71fecef320468a78151ade4799995d0e4638ef9dd4a607d3b430b7aa6677509340c818b03271866e7009269a261b9c36b5a27f6b5ddbdc59c90dbdcdc431cc922aff163e7c1f720b7fc0aaf5c436ba7dad907800f32750e656dc8ec55be6fcd2ba395238ed0d9cca435a4a67866560af9326df9987f0e0818f6359b2dd47a4bf973c7104695da350311c1b4bf0dea0ece0fa9aa3539ed134dfb5c7225ec388259c453247bb1f380d8e3fbca48ff0080d68f86ad0db6af1c80cbe5c63685c94134224da3e63fdd40831ed561a34b3104edb7c89961f390fdeb7c6f00ff00bc71f962aee990868c491a90198444b37cc8a768391eb861f9d673d811f54787d231651385f31d41025c6372e723ebc11cd6ab019ae63e1d5dc975e18b64b85c5cdb3bdb3b6ddbbb631507fef902ba9e7cd39af3666eb622fe2a78fbd4e3f78d2564314fde14376a68fbd4e3f78500252c79dcfb7ef6da1bb5206ed400831f27ae79ab11a6e66a836eda962fba7eb400f0bb7228a29a7ef2fd6801ebd4d79a7ed35ff26e1f167fec53d5bff48e6af4c7fbc6bccff69aff00936ff8afff00629eadff00a47355c3e244cbe1674cff00d28897e527de9bfc34f83a9acdec6df64911b703514df7bf0a704dd9fad3245da71ed530dc50dc653d3eefe34ca962fba7eb5a972d87326e607da9e179c533776a9225db59bd8c476cd831f8d285ef520e94b500351b70347f153a8a0046fbdd3b75fcea063942819b2cd862173c7a558d9b94d336e0607dfc315fd3348a8ee79bfc5ad6e5f0f78175a96ca46b3de9f6766ced243719c57ccbf14e08b44d1f4eb2d2c2cee63862b89cb62790b921903ed3b540604ffbc6be9ef8a1a57f6b786fc4acc864c40c912b2e57cb50ac7f1ce6be3cf8e3e2a96c3c53169ad3b5bbe95a7c33cdb863f792a9231edb0a57650873bb0e6f96373ce6f561b8f88367a259c914b670dfa8dd03ef8f72aaa9dad81b87cbd7d735ee92aa28653d89fe66bc0fe14db9bff1ec48c7cd36d0bc85bea49af6bbd9967b970a3684017f4ffebd76d58fd9268abc798b3100338e99a91836d6c7a553b3dc1f02b42142d907eb5cbcb63d08ec2da2169173d715b16cbb25159903e5f3e9c56bdab79ae2a5ec52366ce1317cdfc24d749a388d1b0cac54ab9c8f5c0ac38a0ca05fc6b674c9150046e99ae37b9d2be13a782360885010bb075ab16931de54f5cd4766ed1c619bbf4fa526e0d7407cc588ce050672d8dcb24539cb77fbb57114047541b19b8dde9ef598b2b8466c18b681c1efcf5ad2b4ccac4b1c8ddbbf4a46459b48fca3b57970bcb7f7baf35a08a3f765beef7fad568627557675e4b641f6a94658ab2b6e60715b47639a5b96e6725982f5c71f4ab16e02203fecf354c306639fbbdfeb536f65280afc99e1aba69993d8bb1befc1f418ab2bd57e55ebf7bbd548833ee2cdbb9e3e9565536b83ed5ba3997c4581d5be666e7f8a9ad9cfcbf7a9a18b67ef6cfd334e50c4e1b6fb6df4ab2a5b046b97f97af7a798a4c9cd288554f2bb8d39e11b720605062462323ad43326d3bb1db1baaf420b363f869b716c492a9d1860d4bd80c2bcb412e14b2b06ebeb8ae13c4d6286f16d6585e5cffab445f9e44c9dc33e8383f8d7a2df44caa14860178dddbe95cc6ab142ce43c4a7072a17b9f5ad60079ade68c8b1dcc8f24ad7058b811fcefb555b3b8ff77695fd6aac9a2ddcad796afb0dda389c40c8a1645671c827d062bd02c74fc5f473c8be78126e1f2e76b7031ff8f0a8edf4b68eda181de36060481159395900c83ff8ed5b76570388585a46bbb68a36b97b6899e312b065914ca738c7a106b235db396e2ddcc5fbd8a00ce8675626552e3cc518ec38fd6bd3122976c724319da1b76506d6950b21ff0081004ca7158baea472ea05a35536ca8ac2473b55a361184257b1e318f6a98cafa01e5774f2e9d137db944f6d3332c65108578fe738c9f4e29b9235395e5915e72eccdb5b76f6eb17fe3aac2b6753d227b4d62dac266602de3dcacade637ccabc04f4e3ad67c76a2e9746bdc85865d3e379711ec25933c97ec76249c7f8d68040658b4ed3da20a58432a2dbfcbc22f988319fc3f5a9b4cbc64c43bf089309222b2644485be76c7be00fc299722d889edcb12a608dc32b6362798506ef5076e33576df4958278e3687c8447cc4b8cc7cb9e01fd7f1ace7f081f4cf87238e4d3a396245447c30555dbd863f4c56bb565f87a16b7d2ad2372c595070cdbb6fb0f6ad509b9bf0af3666b1d8695f9734bbb75343f96c57d79a9e31f29ac8b201f7a9cdda9d27defc3fc69d17dd3f5a00221b948f7a71fdd328f539a72f534dfe23400ae774868232d8a52b934c230cbf5a007326c603db3437de14e75c316fc29acbb547b9cd04cb606fbc2bcdbf69cff9370f8aff00f629eadffa47357a49fbd5e71fb4dae7f66ef8b07fea53d5bff48e5ab87c48c1ecce950eeddf5a7534fde5fad2b7fac350748f5e86969074a5a97b011bfdf5fad0c9ba42695979cd11b6e73f4a98ee0288fe6a976eda1537668dbb6b401f1fdd34d7eb4817bd2ab6e3400e8fee9a5dddaa78fee9a475e734010952abfece69470e857a60835346db81f6a63fdf4fad04cb631753b4866b3688b325b99622e4ae57717dbf9f22bf3b3f69dd3ee2d3e2c78b2e5965588ddc491f9a31954b789323dbe53fad7e955d00f148878058727a57c8dfb70782a23a741e2348115cf9506e4e870ce73ff8f56b84972544c4b63e79f804163bdd6ef24ff57e546bf8e4d7a4ef3200c7a124afd326b8ff0082b69147e1fd5a723f7925d6ccfd003fd6baab7983e4bb6e3b8e3e9935e9547cd524ce85b1a3668ad28cf5ad648c67e5f4ac8b721a75c74c56a47f7ff0ae096e764762c40bb411ef5a16481a78f72e5726a85ac5e64bf4adab440e84eec1538aca5b148d6b0849da40c32ae47d326b72c238e43bcae5d4e7f3e2b0f4fc86624e78c574da5c6a91e0f5237572f53a7a1bd699fddaecf962cfeb535a28040031b38febfd6aa45382aac3a20a9cbec55976b36f6c6455a11af09f35b6ff0077e6abb69f347237bd6559c81773b02141c73576d57ce94bb49b51790b4d9cef735a36dc8bf4a94fdf5fa5430a97566ec7a55858788cfa55c7639a5b9747f0ed5f9b1f7a9cca19d7e6ddc7351a751fef54c7fd656cb62112c0bb778dabdbe6efd6b46465e41666ff007aa940a393fc59ab20348323ef0e3f0aeb8ec60f7254c2ba28e879a957e59997d79a8fcb1918f4e6ac431a7f17dea1ec62f71d1aed07eb4e09bbf87f1a5312f7a74718f971eb54b62462c7f37dedd4247f31f9bfe0353ca9b5c9dbf8d42c19ce436eed4010dc5af9d1e02ed6cd731ac69f265a56660eaae02edc86181c7f3aea195d64c6dedf7aa192dfce4fde7cc99c6ef4a00e46d82dc5a47b955368c6d518c1c0aa96e3214bf40e171ea3278ade9ad041348b1ee62ee9f3761826b2b5306def22751f7dc9322b6013d36fe9fad0065220568acbcc6dcacc411fc2849c2fe79fceb3b53d25443322c65da24d91a9ff00969f30cfe59cd6d5c7eec99c82084663e51c950a09feb55b58f3ece46290a7da239dbcadab9f300732e4fbe15ea5ec079d6b96d0e8aed13879ada59b66233b0f0df7b77fc0f18f6ac1d2a449aca380c8211691c56f014181851ce7d49ce33ed5d1f8a2d962baba85e2536d03898c5860c61720e171dc673f8d625adac0b631ce2159952490c92157c9058ed2c7fbd8c7e42b5801841a35bc456cdbc1761e0cf9798e10a77019f5258fe62ba29126b89618de37459a6837807200071c7e59fc6a8dee9b14df66b66923fb4332ca1918b107278e7e83f3ad6f0c5b48f7b6ac0a8916ec160ff78f38cfd38a73f840fa274a188506e2ca30173e9570ae5cd51d354a2042bb4ae41fceae8fbd5e6ccd63b0e2bb5c54b1fdda88aee61f4a91176d64396c3e8a534d1f79be94188b453597f78a7fd9feb4a1b76680168561bb0df768a157e6cd003594ae3fdee29eff007e9bbb731a715ef40015c9af34fda686dfd9bfe2c7fd8a7ab7fe91cd5e92adba4fc2bcdff69bff009370f8b1ff00629eadff00a47355c3e2427b33a955f9b3ed483e6cb7a714cdfb557e942b6e3507492a36e069d519fbc3e941fbc3e9401251483a5393ad0009d6a429bbf2a46fe94277a00722ed0453a94d22f5a00722f04b37cbfdda92362c0e576fa535bb5368015feffe14adda99fc5532f4a97b011afdd3f5af32f8fda326a9e00bb67b67b858849cc5f7973148b9fd6bd39ba9aab776505f5bcb0dca7990b15cafe3ff00d7ab83b01f9ede0fb3fecef064318180d70c467a9da047cffdf157d532e73eb5d46bfe1e8fc3b3dd691171159dccea83d0199dff00f66ae71462723d0d76c257375b1a7a68f2f07deba0b618fc466b2f4dfbcb5b49d45633dcea8ec4b026edff004ad0b0550429563bb8c8a6045280b2ee35a7a7c6369c2573cb629166c91609ce01000c735ac8046d13eef9db8dbed59d046be71c8c715a84058508e554a9c7be4d64757d937b4f688bec3f2a8ce57d4d599024b159160d1a25c261bb746acad11de4b6919d3cbc938fa66adca8cf68abbf7ee95429f7a0ca5b17d9bca9d480a124e32bdf815a5a7c215171595630348153fe5aa920fe66ba7b68488411d0707eb4e3b98376572d5b463e5ddf7735722899cb267e5ce6a3b75465d9da4e0fe15319147117dee95d495d58e394c99610a703a629562f94eefbb9a22db34817196c722acc71387c6c65c7f08ef5bc2365733e7be83a38df098e99e2acc709f3096eb55cb1849dd1142dc64d4126adf66936f99d062b4444b6348f534f88e326b353505273bfe73cd5882e52798283918e7eb43d8c4d247f339dbd3f8aa618c7cdf3afad4116cfe06e0718ab03a7dddb54b6005ce7a6076a49ff00d625393efafd69ed8dcdbbeee68018bf79aa10b926a6da77e7b638a68f9b2de9c54b76572a2ae579ad9644381f3f1f37b562eb9a603310a16646e083eb5d0349cd45322ce8ca7ae2b173bab14e364704a85243012236dc4061d801d2a9dc4c64b76f35cf9982c1875641f787f2ad9d62c912659415464dcc1f760ee0ac07e8ed5cbdcdd98af5e46919cc529921cab48769de41c0ff0066415b47620c8bd8e5f12692b3ab7d8274251a6b85e117eea1cfd5957fe055c75a5ec5a75fc89358adb4174e8275f333fdf2b81e80103f0aeb2546b1b3bf93ed00c388e6cccc66263c6c65d87a0f93f5ae3f5284491c3bda3b66ba8dd6371b576156063f94fae6ad086c709b79165dc9b5b694f3e3c6d5190c41fa30ab5e176961d62de3695c36363485b729daec063db0054d7b7cd144f244512696376540a14923861c7d09fc6a2f0ddc0bb7b41810c8f347246776240a7871f4e050f6047d1769cdbab7ca770072bdf8c7f4a94fdd355b4eb76b5b611b61c03f2be73c76cd5b76dab8ddbab865b9a477109dbb5bdf14a061fead9a6bb6ed9f5ab11f7acca96c397f8beb4a17e653bbbf4a0a6e7a08d8c3e952621bbe676dbb79c518c7e3cd297dfcfe149400526e5dd8342e3ccf9beee2979f357d3b5001c2c9b42f046777e74797fbd5f9b7734e3d5feb4c5e8680240bb64ff81579a7ed3bff0026e5f167fec54d5bff0048e6af4a5e86bcd7f69c6c7ecdff001606dcff00c527ab73ff006e72d5c3e2427b33a3ee69c87602df85397f8beb4b50748dc61bebcd3d3eff00e14d0bba4fc29c176b50038f534abd57eb48df785387dea00749dfeb4f5fba281d2957ef500142f5a67f11ab31fdd3400abd296a27fbff008548bd28016938cd2d252b5f4019fc46901c153fed81f9d49de93a63fdac8a49f42e3b9f20fc51b5dbe3cd7e3feedc91fa0ff1ae32dadbcab9c7af35e87f15a256f88bafe7ac738ffd045723000f21dbd09cd742d8eb8166d631b87ad6bdac41a60aebb8e322a9c29b0e3f1abf60bfbd53b73f31fe548d0bed1871b00c015ada4dbf9919f638aa51279db79c617eefe26b7f498bcd96339d9e5f6f5ac9ec6f1d862c1b2403de862c93902b525b757b95881cb8900cfb0e7fad669f2a59339dadcfcdff00023c560f628d0d3e470f93d3a56c883f70ac1be50fbb1591a530904a08c6ce54fa9ad5d32769e4d83a9e4fd6aba10f636ece30f6cee8bb58915a0d32c08eee5420ea4fad456d0930952db5b20fe15e4ff15fe26ae9b7ad6704b1f9b1ab2ec6fbd21230157dcd6f08f3ab1cd3d8eff52f1de9ba45acf737b7d15b4108dcd3b9daa8bdf27fa5726bf1875af15439f87be1f5bab0fbb1ebdae3797619efb13f8bd7777ce3b5792e8ba0ff006bdf477be31992f674656b7d1266ff0044b43d46f1ff003d79c9f62b5e9f7de2cb1b105e49885894031aab0543e880755e9fad68938e88c52b9a11781fc61e2384c9e26f8aba8462439fb1f85e35b7817db71efefe98a7c9f057c2f1c5b6e757f135dccfd65b8d683393ebc74fa57171fc61b7b5b96104d3dc45371fbc8648d148ec0f1b8f4f973e9eb4dd43e2f43713c27ce5982f2d15bdbb5bbfa7ef3990fea3e9dcf547da58c1c6cee74371f0a67d1d7768be38f16e92c0fc98963bc83e8ca5777e4c074a8ec35ff881a09963bdf27c576d19c196d03c33e3b6620cd939c9cf1d718e2b913f141d480ba6dc5b4632049696d29dcbd71b980cf5aecedae35893c3d6faa5bdfb0b5bac218e65259771c01cfd286a6d5a44b7657363c3bf12d35abdfecd5bd7b2d5edd774f63a84262940f607a8f7f63e95e81a7f887cd0aed889fa6d4fbadef5e5bac786f5bf122db41a969d69a8c7bb7adc5c4522b45201b53c970c1564f97bf3c8ab3a77fc245e0192d22d75d6ff0045bd996da2bf330f36d598fc8971fbce7e60d87f7c76a51872bb99b95d58f6fd3f502464c6a7273b96b6a39cccbf2f2dd2b82d3f516760f1967404a9910e4020e082d93b8f19cfa115d6e99742e23cff001038cfad686669aa853fcea6aa891b824d5a498e0ab75a9600a9bb3f2fe3485769fbdba963ff005943f4348de3b1049f7bf0ff001a44e8695bbd572fb5c544f614b6307c4b0f991364e7a6d4f707ad79f59ec9b5db8f3a690aceca8555548524e33cfd2bd23580ac859b80255e7763d6bcbf5485c6b115e67ece619b07072597279fe75a476322a78a2789bc336f248632a56388020032a0501ba7a605627d8e78998452e658203fbff48c91b8fe2bb47e1527899a69aeecc46ef1ccd37ee4baf3f78e4e7fcf4ab7ad88ed45f3348b0a2c65259cc99edc1fc4e47e1568463c7a6c766f0cf1bf92ce8c164c67cb226574ff0077a119ff00a6949a6c1143a9dac4cad681da33e5e72108760573df04119a9a795ec6e5415814dbb4c4c721622449182b2f1dc22b91ee6abe8d04ae6202776984a4c6c73e76d472407cf7da47e18a52d80fa23467325ac6df291d8af719ad44eff5ac7f0f822d13e40a0e08c753900e4fbe49ad845e18fbd70ccbfb24727fac1f4a0a6ea595b737e14b177ac881625daa7eb4ed9b9a948cb629ac3cb942fa8cff003a00794c734dfbcdbbd38a40bb58d2bfdf5a007336ea4a79fbc6a37fbeb400b4e5e8697f8cd0df7bf0a0041f7abcdbf69e5cfece1f15cffd4a5ab7fe91cd5e9231b64fef715e6ffb4eab9fd9c7e2d13d3fe113d5bff48a5ab87c484f66742bf79a907df7fa52af534f4eff005a83a423fbcbf4ff001a7a7fac3f4a55e86968003d4d2af4349fddff007aa473b6426801d1fdd34ea6a9f324dde8314eddb89a006ff15588fee9a847de5fad3dff00d61a97b00add4d2c5f74fd69a688fa9a71d80968a090149f98918da376064d71fe32f1c2e8f7eda268b689af78a665531e9e92fcb1ae4e2498ff000a020f3df0476a60749a95e5be9b6d25dde5cc5676712e64b899d11507ab3370a3dc579ddf7ed09e0b85b6e91fdb5e3065601c78774c96e90107a094f5fc38e6ac5a7c1fb2bcd55759f1b4dff099eb4c43c70dec8cba6da37610dbf4c8e7e6ef517c72f8916df0c3c0371765847733e6de18e28d514363a003ea2ae0aeec1b9f30f8f3e26e9daef8c359ba6b0d674bf3672cb0ea1a73a4806075ac4d23c5d673b32c1389086fb92655bfef935e7cde3892eb529e7981f3e525e4cfa93ffeaa9ee3c456b7d084b8b782e38e564dc180f50457746973ab171abf64f62b7f115b3e0348a1c71865db8ad3b4d514cd1ba3a11c8af9e93586b48b65a5ccd796a5f2609dbe78ba7fab98fcc83d8fca79ef9ab165f112ef42b88c9956e2d6495024c14ab29e7e5607807bfcbc720f5cd4cb0cd2d0d635145dd9f4f6937264656c0704751f5aeaac4c3b5642763eec62bc77c1de308f50dbf7b77de38ee726bd32daf8f9fb867670e73fe7dab866a51d19dd07096a8dd4bb6b5d523983659067f03c543731057697bb726a85d5c249711cc8db41183f5ad4b7267cae58af5e2b9dec6a269526d95a33b4f983e553fc47d2ba7b3b368de29c6199b978c7f0fb57292c4be7050cea40ae8f44be645f29dcf94082dbbd2a92bab10f620f897e3b83c11e15bfbe9e558e468cac59f4edfae6be68b54b88f4b4f13ea7396d6b538f769e99c2c1064f99222ff14d272a8dfc02373deb77e346af17c44f8a3a6682e1a6d1ed964b8bf0adc2db42af24bb87a381b7f1ae12e75ad43c6fe2bbdd5b548dae9ef2e0cc2ca15db1c6abcc719ff6510a0fc2bd6a71b40e096e4b6975a9c73b3db5f6cb7393134722912aff007b27af75cf7db9aaf0f8bf5804c735f315c630e4151c9e78ef57ee835beab259d84d2cb6fb8fda7c9fb8ec46760fa6455ad37fe126809834d2f6c48c18e655c29cf4c9f6c55129d8e3e7b9d4a57f34b19943e77b753f4f6ad0d134cd6750bf6974f8c2b1eb24bb881f402bd5fc2fe1db7f0fdbcb7376df68d4e6c34af2ec7207a03e9d7f5aebadee3ccb9552fb625019390bcfd052553ec97ecfed1c47873c1fa9cd7507daaeae27c8d8cae04509279c3066cb7dde06d35ee7e0ff000a7916114b34b2843f32c3311b949e7a055c75e9cfd6a9e8d323b03e4e26fef6739aeb74c7d8cce0678c135cf295f42650d0d3b3d3638dc151e6cbdd4b703f0ad01a4c32332cb1a4caeb87804785607a8cfad32d59a6870cfba2ce71ef5a56e718f2c6c51c66b78ec704e36d4f3416c3e17f8cb4ed1eee690f8575e9192c246977fd96eb191194feef439f735ea5a6d935bec5471b80e517ee83939c7a0c8271ef553c47e1cb5f1be8779a2df32baceabe53b7f0cbc94fd4527c36d5b52bff000bdaaeb2806ad6e5adae5c7f1321da0ffdf216a8afb274618e403173fdea788790694fdf3f36ea5f97cd19eb8a081e38a69a6b98c1cd366b94001f6a96023bedcd57ddb8b7d2a9deeb76d6ec03b36fec07a563dd6bed3ccde442718c6e3eb594dd91bc762deab824ab74c67f9d79acf7368fa94d186517409d9cb29070769c8fc78aeaae7ced458fda267445fe18db939f6aab235a787a16fb3da8de3ac5085432e7bbb3e1001eadbbd867a8a7a0a4aeac794f8d75eb8d2f5d444d32f27ba6b757d376c0e91c806d13104f05be6ebf4ae6fc67e2eb944b8178d69a024932289258dae2e1a2538f282a61559980f989cf1f4aeffc75aa43aa7f63ca1603a869774f710cd199369cc4ca464e0bf5fbd81e98c019d8d13e155a6b5a6896f624696791ca9da573b029efef9ae98d4d0cd479753c0bfe12dfed8b69edeca4d4a6be314c607b880451ceea373aefdef975208ea38c71ebe9be02d3b50bd30dc5d4059f734a08eeccc5b2c7b9e719f6ad0d53e0b585cf8d0ebba7d925bbcd8327fb4d8db9fd057ad7863c31158430c4d822318217d6b172bbb1d2a9c7979a7b0ed2c6b12a26fb8741d36c11a923ea4d7436d637a7e679229bfd92416fc7156e7b4992ca45809b70c31b875af18f115f6a5a0ea01edaf2e10873b8ac9827f0f4ae594b93536a386fac45b81ec2dba2255c10dd71e952c0db949f7ac1f02eb27c45a528b860d320c8603049f7f7ae821180c0fdecf3437cd1b9c9529ca9be562d27f15116edcd85c8cf5a519e770c1ac8c452dda9bb769a5dbde8ddba8014e7f87ef5271fe34d29b9d680bb77ff00bd40122f4347f11fa53693f8a801f1909216efd2bcdff69d047ece1f1633dfc27ab1ff00c939abd26bcd7f69bff936ff008b1ff629eadffa47355c3e2427b33a65e94abf7ff0a60fbd4e3f787d2a0e9157eeb7d69ddc51fc34f5e94007f12fd6a46ea7eb51d393bd003d9b6b01ed4ae7205237dea3fe5afe1401343f7291fad2c5f74fd69cbf7ff0a0048fee9a75307df3493c2660234f9e471b523f56ec7f0e6930393f899e323e0ed09459c71dcebfaac9f60d26d59b065b83c83ff01c67f1a7fc3ef062783345956e655bad62f9bed3aadf84dcf713b004fcde8385c7b1ac1d2ac0f8b3e356b3af07f32d3c3309d22c3fda9dd43dc3ff00df2507fc06bd1edf67963cb39538607d7233fd6b47b090d2ad26599846c32700e7b0183f957c79fb6aebd7d26beb668ed6f6705aa43c7f19767f33ff001d45afb1260480abbb7303f4e39af99bf6b1f024da8d95ceb71062d1b4330441b56504949016f6054e3deaa935195d8ed7d0f8565b86918ba2954619507d0f4fd2ab5add88a670ecc0e33c57a05df841adc49128f30444c59d9b7a74faf1deb0ae3c1a636249d84f38af75ce2d248e771b32a59dc1963ca39c74e69867921bd575109571b66f3023f98832766d6c8f5c103a9a26d0a4b7e11f8eb51b5948a30c73c524ec075de14d6aff00c21a3691ac45750cba25f34b6d142aefe659c80e5ada45644c300caff2823120e7ae3dc3c33e37b79de38a3728aca08465dbdabe6ad2b528f4a86f6cae3e7d3350554bb89c673b4929247fdd642724fa115dbf822df50d35f5249ae2d6ded34b9116492e6703cc2c015f2d47cd212194fa73f5ae69d0e7d4eca557ec9f44cbad2cb6e508e55b756e7867542f2c651ba386db5e127c532f971d8e97248f2a71713ea96bf7589276a42ab8e841cb303cfb0aebf44ff8482e9e01a75ce9b2f1cf9f6183bbdc2330f4eb83ed5c12c3f26a77a95d58f6c8c8bcb16b88cec60c411f89ae47c69e3f93c3b04d244e37ed6887ae5862aa69561e3558e29afe5d0c5bab80f0c56b711bc8a39c6e1205ee782a4fbfa4be308b45f1ae9ba96956fe09d3bfb7aed765bea50bbc1e490a7195c7cc7209ddef8ed53185d99cdf2c6e715f0b3c1fe75c78e75abf1e6c93241a1c21baed90f9f71ff8e2c75d95b7840595c1bb8f71ba94f9922b7a3fce9ff8e32543f0034ed4aebe1beb2da94cb3eaabe2326e64562c0b436512f7f6615deeb29fd996cce5f0ca48fcaaeacf974268c7dd723918b40b0b0679e540a55fcc652b9049e3fa5666afe21834f2560448c67f8062b27c53e2b759245dfd47f8d7093dda492b4d2c9c628a71e6d4d4ed86b6b772b32befec4fbd6d695324c987fbbbabc52efe200b195a2d363579872d21ec3d2aa7fc2c1f10dd6e58ee0a8c6084e063eb5baa4e7a204d2d59f56e8d71b154aedc038e7d2bbed26e6058c2a3637f5dad819af80f57f1e78834b9ed11e7958b00ea3ce6618c91dbe86913e2df88212e557748b282a325b19ea70693c24ec72ceac16a7e8ce9da8c092f96d711a37ddc6735d045344c306646c719af82be1ffc4ef1c45e1f3aac36518b48a736b6f2dc58c816e5d812218e4119566393952c0e3071ce4fb8f87bc49aedd8d2a5b8f0dd8cff006fb6f3a396d6dc445caae1c633c60a95fc2ad4654e3a9c2f966f43e809363480a90782411ea39acdb3bd487c57a869f84f32fe18b5184336198891229b6fd3f704fb1af27b1f1bdbdcc31c890dee98f2296708db8c78623a7a715c4fc7bf1beaf63e1dd0351d0f561f6e8ef7ecc67e6191a1700e1f63072bbd53dbad252be86d1a5ccac7d43a3788ec35cb4175a7dc41716accca2580e6324120e3f2a8b57f1341a7c6a562975090c88be4d9f55e4fccdf30e2be3cf84fe3dd7b558e6912db5092e3ed71359b69914822632b32c8c492493f29e4fb57db773041a8e8b6705b46cef0c68aa258c8230a33927be734a57b6862d28bb330ae3c4535cc53b5adbc84afdf567c00327a726b3aeb50bbbbfbf3246180c007271e95d05bf85ae637f327b84547e0a43f33fe7dbe95a56da35a5982625472a725ddb2d9ac9a9356634e2b638ab7d2aee6398a176ff6d97827eb5a167e1ab96cb5c3a2907845f98e3eb5d6794c640c4fde19148f175cf351ecb9b42d4ae73eba246991e5316fef30c5715e27d3841238567495d8a1745c9da52438ff00c74d7a5cb1fddf4cd73fe23b0f3d4938c1057dfa1ab82e57628f2cb1d1bfb4bc41616ce04f1bcbbcec181820373efcd7ba41a6a790a91e0281c05ec2bcf3c2da74967e226f35142079c091fef7df6e07b57a9a0115bee0782071ebc0ad5932d8c2fecd81ee70ab923a9ad7b458e19503ae3078a643096986176866f9be82b1ee2e65b8d56493f8470bf4150dd95ca8479d58eae6983c9b5bbf03e95e5df127c28b3a49768ac5d06723ea6bb88d9e4407d0d335764bdd3e78a55c929b47eb4a4f9e163a283f67511e55f0bf5468b5431962c33839ed5eb8eaacc597bf35e27a15ab69fe284843794de6121bdabda2321a28bbfcbc9f5eb5c5195a2e275e62eed31ca986cd03e7c9fc294d25078826369a76df9f3ed4d64dd4e65da40f6a0040dbb34e8fef2fd681f7a9cdfd2802378f74acdbba1e947fcb4fbbb78a5349400e1debcd3f69c5cfece1f15cff00d4a7ab7fe91cb5e949d6bce7f69cff00936ff8b1ff006296adff00a47355c3e2427b33a44fb83e9fe3487ef2fd6a40bb46296a0e910756fad397a1a4a7c5f78d00253a3fbc69a3ef9a71fbc3e9400e4eff005a7c7f7e9a178cd2ab6e65fad0038fdea7f75fad1fc66897a54bd8047fbed4c8dc24dbdba20c9ff741de7ff458a963fba6a09c90263db611f9ab55c04f63ce7e001fb6fc36b5d6a4ff008f8d76e27d624facf2171ff8e95af454c8ea6b89f81d1087e0df82231fc3a2d98ffc82b5daec5237337978fe3f9463ea4d44936ec888ee4e47cb58de23d0adbc49a54d6373f71d48047504f435c5f8eff687f01781d648ee3575d5afd0ed367a3a079777a3483a7d3f1ef5f3c78f3f6cdf16ea87ec9e16d2ecfc351bb6c4ba95bcfbd6fc7b76e3d73eb5bc30f36ae5bd8c7f1e780ee7c3ba9de5a5c23a4b0485433f571d41ff003e95e5faa42e65647ea2bd9bc0fa0fc43f14f86b5ebef18d86a53dbab2dd5beb7aa246b86e9b1419036df9b230a4658f3e9e11e3f92eb4f9d96e91ad9f24185b3d895c8e3a1db5dd4d4a3a3355b19ba94eb6ef8326d3b7eefe26b9dbdd5d44840e063fc692dacaf35ab8d902640e58ff00b358baa43f67bc78b18d9c5775357395ee6943761d9895ca900b7d1581feb5f6afecabf0e7c2bf1b7e115df87f5a81a1bab0d598437b1c9b5d10857518f4dccc7f1af84618d9a39640ca04450fdec1e49af79fd937c51709ad78c3c17f6f96cd7c47a0dda5aca872c97518f3233f4e2b570d0c6a36a37473af76de11f1b6b1e1fba99ae134dbd96d56567dc58072473f8d7baf81aecc26d5b19472180f6af93f4896fbc53aedaaacbf6bd46fa4123ca7ac8ea30cc7fe040fe55f5bfc1bb437da569a672a67662ae1bb10d8af33111b45b3d2c3ca525691ebf730bdc5bc2f1c5b5415cfb9e6b53e1d782cc77235190ec625c85fef10c303f9d763a1e908b0888e30a3b52c57074bd404720c063c3fb7a579e95dd8e89d69a8b8c0cdf0df86edf49d47c62b6d1ee8eef5882ed62fee2c9650464ffdf513572be3fd349812448db681b011df0315e81f6a8cf8ce7b28d033eaba5945476c2bc90485953eaeb2cbff007eeb07c5165737b14d190657da770272195491b87b641aeaa94f447050a8e9cad2dcf983c476cf6b282633f38c2e7d726b8ad574b9eee520fc8806187bf3ff00d6af7abef0fc57b72b712aac502753df8af22f11c17a9e27371046cf648d8dacd8de39aaa73e5d0f464f9a1738f6f0fac9711436c3391cb7bd775e03f8736e5835c0333120edec39ac59de6bfd4de4b71f668f3855ce70de9fcabaff000bebb71a65e79532ac876e4fafd7f4ad5c9c9591ccd5f431fe3ff820e9b77a16a967b45bb074217b363fc315e4b6fe19d5639a68e17118b90106ee0311f3819f5eb5f4c5feb1a77882336b77e75cc447cd0aff000fbd73d0fc3eb7338fb1decc620dba38a55cb27b0f6a54ebca116999ca1a1d07c1af15ae9fa658f86a282796d2d8fda2de062ae0dc3804e18f4193d2be83d621b7f0f7876d7c3da58f335703f73070de53bfccfc8e9c93c578ef803c333693792b5adc9379371e64a3047b7f9f5af6ff000af875fc34229e69a3fb448c5e5913eff200fcb8a8e7e79115538ea8e62c7e137f67c2f3cf712db5d8ff005de532b166ea4f3f5fd2abf8b6cd747f03ea5395498c6d03ae31b8bacf1ed271df935e85a9dd2cb0886db042b75f5fad72be2e549e3f0fe9529dd26a7ad5a88e3ffaf76fb539fca215611949ab33d3122113b6d775dd2bb946e996624fea4d5b8ced2c76af5eab5991b606318da0201eca368fd0539656ce05073cd5dd8d613ee6ebbb8a228f7396ddf8557b38cb7cc7ad583d4d4b2d42d1b927f0b7cbb79a81ced3bbf0a922fba7eb4d93ef0aca7b16be12031e727d6a0b9b55921e7ae6ae377aaeebb9bf0ae67b1afd9322c2c05b5db489d735bb2387801f7e6a920da587bd493dc794c88cdf2b7f0d6b15744ad1953c41e21b5f0e5924d7526df35fcb51ef55ad755b49537c7df93f5ae27e2a09ef2fed2621becd6f1e02760dbbef7ea3f2ae534ff101d3ee984136ec3b799b3a1f98d62ead9f29ebc30eea53f74f77d37508642d1af53cd56be80c72aaff000b366b85d0bc4c2e2600485413c29ef5e896f22ea7680b0c1538ade2f9d58e3a94a54d3b9e6975662cfc58a15bfd737ddaf4884ee82238db95ff001ae3bc4da72ff6ee96635f9c348377e02baeb188c56f1a96dc7683584a367723113f694a2c968a3b9a2a4f3828a29f17de34008bd0d01371a07df34f2bdfd05003245da7f0a44c67e6fbb4eddba8a00539dff8715e6bfb4eff00c9b7fc57ff00b14b56ff00d239abd2026e35e6dfb4f263f670f8afff006296adff00a47355c3e2427b33a43feb3f0a53feb529ebde8fe3fc2a4dbec80fbeff005a7af434dfe234e54dc69151d8963fba69afd6942856f9beee299b4860ddb38140c7ab7eef6fbd4ab1fcb4d58f6b31f539a7b36e61f4a0058d76be2894f5a5eebf5a251f39a4c97b0c553e683c9078015b073fe15cfebfe3bf0ff85e42351bc579d9b6a5b5b8dcf21046413f955fd7ad1b52d22fece2797cf9a06548e36c6e35f10ea5fb377c59d47c5da85e5868ff006175ba496cee2f6ebcb124aa374607e4df9d74d1a49eacccf6ad3be286adf0f3c07f0db495d260826bdd1e3064ba3cc65502aa85ee76aa9fc6bccbc59e08f8adf1a75e59449aadee9b3e39bf9dadf4f4e4f0221f78ff00b5dc6076afa3bc2de1cd134df1447613e876f65ab470c9a9d849e77da3cc79265174d1376612aa823d1c7ad77f1c81d770cec6e54e3008f41f4395ff00809ab75141da1b88f9d7c29fb19e956ca87c53aec9a86d51bac34a678e11ec7d4f5e7e95ebfe0cf84de0df87f97f0ff87acf4cba239bb6517170cbe9bdb903dbdc9ef5d679983d29c1b728ff007ab964e5277606178d4a3f83b5df3498a15b4662eea074f615f9c7e30924f1bf89dafe7659a1b1830b145f7a64425822fb91bff2afd0df889a18d7bc33ac5bdc3cbf6036ae668e2ead8e95f07ebfe1886e353b68addc44a176ae3aa9e783ef8c7e75db87f88da3b15a7b3d3ec5a19f4d904b6175b67858fdedae0300dee010bff0115e6de39f0fbda6a6f7117faa7f98fd727ffad5ad776d77a2de4f6eaed90c4923b9ff0022b36ea7b8ba8a432c87038e6bd18bb314b63897883cac475e95d2f8075bbef077896c75db253f6cb176789f7f405191d769e30cac413ed51a5bc58183b9a9d2db3451c931c88c2e323ae6b552e6d0e692bab1d47833c26be14d5ec645d420beba8ac2330cf613a4b02cb346a123529c2ed465183cfe75f5e7c29d10e9bf63b42fe5985550b6dce5c70dfa8af99be0c787ae1af6c64961758ca79cbbfa919233fa57d91f0eed49b78dc45f316c83ed5e4e2a779f29e8d285a173d874903c855ce48e18e3193506bfa31d42d99578931f21f7ab5a72108bb4673f293e86b55a33e58476cec39ac22b9958ca4f95dcf00d7755b9b6f14692d2c05355b073258320cb1b850c2218fe20dbdd71ef57f5af16efbdd1b59d06ede3d06fa2596dee312cc9006910c88553ee18d8952a7b60f7aebfe23fc3b87c6364ef03086f6321a2959782c092067d7fc6bcbf43d6af7c357f75a578982a787e69a29b5296693074fba5388ee8b7f71c054c7ac66baa2ecb94ceb45db9a258f11daddcb8fed0b5b6b09eedb7dc4366ca554ffcb29500e42b8e7079ce6bceb5dd19d6eb2000a4f0a3b7ae7f1cfe75eede3bd2923b19a4845bc6eb0bba3c63018e37c641ee0b0073ef5ce6a5e1417514d24676a296d836e779048fe95cf376675e1adc9e678a49e1479ee33b73c558ff00846667658fcadd18fe75dc4b606ca65324782472b8c63935af64b148eaa06323359f39d671161e169519488d936fddc37def6c5775a2e83e4db106dc9324885b31e369f4fd07e75bb6f1400a83f7ab61234dd1fcdb69395f4225b0ed3acde38d437eede363b1c0da7e99ad4b1911ae241bdfce9461a477de78f7aaaa9f7823639fbffd2aec5108e3ca0c1cf27d4d52d8e17b97edf0ee8e46540623fde18c1fd6b9ad26ddbc47f16eeee8b06b0f0859369c647fbbf6ebb20baffdfb58bf3a9bc55e283e12d2e3789639f5cbf93ecda4599eb3dd1194ff00be704fe35a7f0fbc2f2783fc2d67a5cd2fdab526dd73a85cff00cf6b9918bc8df81217fe035d4b63396c758accccdb810431183d0609e9ed572da3dc7716e076aa96b68226f9fa9e6b5edd031f969a311f6bbf277aede78fa548fd69d18da4d4a6860357ee8a8e4fbc2a41de83d6b29ec6cbe12acbd7f0a8c7dd3562e133cfb5560bb62715ccf635fb2302e413ef52b47f68451e86a01d05695a91c03d2b58ec652d8e4bc51a7adedabc2c7663f8abc6b51d2a4b6ba96223a1c8f7af7bd69e1943841f383f7abcb7c476a1259660dbb1c1fd6b9e67ab82ab65ca72ba55cc96f700af0ca739af6ff09cc2eada3767dec5339af14d36d9af6e8613cc05f6edaf65d25534bd25bcd18d89903d31452dce8c5be65632f579c4de25b641ff002cbe6fcc91fd2baf88fee947a0c5719e124fed1d567bf97ef48df2ff00bbfe735dc489b08f719aa67935de96194e5e86962fbc68ee6a4e21a69294d25004b17dd3f5a1fad46a9b8d3d9769a00747f74d3aa218e7d68e7bd002b7dffc2bcd7f69dff936ff008aff00f6296adffa47357a4d799fed39ff0026e1f15ffec53d5bff0048e6ab87c484f66759450df757eb41ea6a0e91a7ef2fd6a53f78d353ad3e4fbb400d1f7aa53f7450bf74527f15003d137629ccbb5d3eb407db4dcee65fad003dfef1a67f154c3ab7d698fd6801c7ee52f381e9491fdd34bce6930b5f4397f1e21b1b0875fb7b53777da39799638bfd6c96cc845cc6bfef28427fdcaddb69e3bbb78eea0904d6f70be6c32af478cfdd23f0c0fae6a7690452ab15de8843b0f7e40fcf9ae534bb31e0bbab8d3269e3b6d12690c9612349830c8ec4bc38f63f37fc0eb4e866e3647529d0fd6a58fee9a8805562aab851d0e31bbde9eddab0ea52f84e7be214bf67f0a6a92ff76dd87e75f0d789e26fed2247b57d8df1b6eda1f044b047f7e79555bfddaf966ef42f3e4cb1ec40fa64d755376368abab1e55ac4524af28f7c573b369171237cbd2bda66f0f244d8ee466a95df87a26504aee6f5aee8cf4074cf173a3b4130fb4fdceb526b4be5da45027dc95c0fbd8af40b8d082dcb36df9b381fec8ee6b9fb7b44bfd6de68ce6cecc048dbfbc7273fceba233d08703d6be1940905ac476e6620679cfcb81ff00d7afa23c108523073b118800578a78374d3059db46ea4e3078ebeb5eede059e77d567b492de6f2922591663d01248c7e9fad793395e763d051b523d3f4e5467500e4ab63f4ad98f2aeca6b32c9becf84dbc8eadef5a36f36777cdbb9ae886c79b508e68b0e485cb7f0fd6b96f1bfc39b4f19d83c457c9d4f610b36dc8c73f2b7b1aec230af2925b06ac32aa2677e573c8ab6b9958c632e4d4f9b7c27f68f0b4f73a0f8894c9a458832db491c0de6e9fb4e4b20e9247df6f6c93debb3bc4b17d3a0d474eba86eec2e507977b69b5a398649dc36fd7047b574de36f0c47a8c91dcdaa186fa36189d79217278c7a75af25d7b48b9d2b52bfb8d02f9fc3ba83306ba61019ad2ecf769ed9b2ac4e00dcbb58607cd802b194acb94ec8be6572dea0209ae269932a49c6e2319aa6f6ed12ef0fbc3719acdbaf13c71b09351d267b528a37dce923edf0ca7fbcd0eef3f77b0dca06dc1ce40acbe3cf0d5cb29b5f1668e8e490f6da8de35a3c7ff006c675574fa0c8f7ce6b1e4b7bc75c5d91d0425a131fcf83922b6f478a49b6236d6dffc5df8ae46cfc49a5dbac2f73afe8a90b31c4a75680a91ea3daa7ff85dbe08d1888d7c4d6bab5d8f962b2d1d1b51958f39fddc7f28fa9e7f4aa8abbb0a4ee8f4ab6b7124c26679256c6363fdc5f7fad41e28f16e93e0ab7b79b527f3ae6e5fcbb5d3e31ba6be93f85107f08cf535c85bebfe34f15d93bf86b475f07d8ca42aeb1e25c4d2e3bf956bfc1d783eb9f4aebbc19f0e74ef0bde4baa4935f6bbe219d76dc6af7e374ae3fb91ff0072307242f62cc7bd538d8e696c47e0af09dfc9aedcf8abc591c03c4330db6b6502ee4d36dfbc08bff3d1b27749e840ed5e87696f1c2a5b20907f87a0f419ef8181f85456b08420390c7eb9dbec7fcf7ad155036847dcd9ce2ba23b1cf2d874080b6477ab96f16e257df3556d660ceff26dc3609abf6e720fcdbb9aa3126283f89b6a8e28119e7e6c8ed53c2b953f5a71183401508c29a62743f5ab0fdeab94dcd5caf7378ec0fd2aac89baae38dab5542962c17ef0a902baa6d39a835ad5c68da4cf764e07099ab1b5e472cbd1783f5accf12e9cbaad82dbc8dfbbdd923dea422949d99cfc7aea1f92106791b9c7619a5b8f089d795647b9fb34aa4fdc5c8c1ad4f0e787ad74e958aa741c57510f970aef2369ed47229e8cdaa5450768ee70da2780a3f0f04224795b772c460533c67ab19962d32d4aa99485765f4ae935dd40db46eeabb8e339fceb95d07459afafa4ba946371c8fa526a315646b094adccce93c2b60b636a768e00c67d6b517bfb9a94208e1451d96a31ce69238ea4aeec397a1a5a22fbc68ee69bd8c40376a36eda7c7f74d29fbb531dc048fee9a75397ee8a4356046fd69b4f6a0ffad3fee0fe668023fe25fad79d7ed39ff26ddf16bfec53d5bff48e5af498fef8fa7f8d79afed3cb9fd9c3e2c9ffa94b56ffd239aaa3f12f513d99d3d2a75a4a55e86b03a47ff00cb41f4a1ba9a6d1fc4bf5a0007dea9474a31b8b2fbe69327763b0e2801ebd0d382f7a7c78da76d31feff00e1400f8db703ed41fbcbf5a694dd4e8d76822801c7ef1a28a280237eb505e6996dacd85cd8dec625b4994075232091d0ff00b38ec6a77eb4275a0996c71adabdcf822e60b4d71f6e972304b7d69bf78a9d825c11f70f1c3b704103f84d756ee928578d99a3600a96ee3d401c01f4e3bf7a9ee234b889e195239e265c490c8011b4f0720f0c0f4c75ae1cf81751f0abdcbf82b564b7b7662e9a1eae257b64cf511b32e6207d03051d7a934ad7d0c91cefc73ba206936c3fe9a3b7d318fe95e2d2c03008e548c8fa576bf153c49a95d5ddac5e29d22efc2579140e219cc62f6ca71b86583c2ce467918619e07b579fcdafe8c972c3fe123d063ce48dd7811b193fc05158739fe13f53d06f4e0fa1dd4ddb524f29369cf5aa3736d13ba9da580e085ea73d07d2997fe25d22db0df6dfed193b41a4594b72f27fbb234488a7db39e873c8acb7d5753d4e399acece6f0fa9f97ed37920b8bd553d422b332c648eb8c7d2b4e592d59ab9dd58e7fc73766d5974d83cb92f48ff004911ff00cb3439ebef59da35a416bfd9b6110fddabe41f5f7ab7a969b67a547159da46d1a4926f7dcc58b1eed93eb8edc53fc176eb75e2a7917eec6bb87f2ad97c24c773d9bc356e897491eedb97415ee1e148c2400a0dc532bbbf1af0ff000dc7b5e38c2e58f0a7df39af77f0e483fb2f2630642a0b0ef9ae67b9acfe13aeb4042ae1b70239fad69dbb00a76d63e9e8642ec4b3e0632ddbdab4ad97beedd8157f64f36659237f3ef56218b8aa913175601b0435595d44c402cd27ca0d744363277e836fed1194b16e7006dfc4d713e27f0c457b391e5724939fa0aecceab033ba16ce4f06b27c428d0da9ba846e880daeb5525cc9a1d294a124d9e07e26f0f9811a4593634870bf5c9ae62e34392448a1ba61760e720ed207e06bd53c50c979245955962c6429ed826b87d4a68a49da40a39f4ed5e62972a68fa58fbf1467699f0eb450d6f7074fb399f91f3d9a161f8d7a0787fc336d0431a42ab6e1b3b8c0a0103d302b91b1d43cb9e242762924e2bd0fc353abdba9697e6cf03da8e64ce7946c747a4d9a43630c2d892356f95875c7bfbd6fdb440b120600e05625b3e650315b96a7671f8d6cb63ceadb16a18fccc2fa354ee48ca8ebba9603b81fad48787cfe15d1f64e58ee456c8e93b348d84ad6b58510190fcde8d491db1d8067008ce69c92a82543ef23bd697b23292be83d58090e1b20f343499269ab9dad9f5a692a637cd252be8528d90b9c9fc6a30bf313fedff8508caaa9fddcfeb43cdf3b03d3b562be2378ec433cdfbe22a390e028f7a976a89431eb8c5215113161d0d54b6194dcf96ec3f1a82e674f2486fbdd6ac4c990ff00ed29ae4758d5248f5fb9b4ff00966b0237e3cff8560dd8a8abb2fb6b4d19283a544facba8dd5416cdef1f7ff0009ad6b5d15148cf3ed50e573451b15a2ba7b99436dcd747689e5a0764c363ad3ac7474460fb3663b55ab8003803a60552d889fc257049c92dbaa48fee9a603fbc61fecd3e35dab52f63987514b1fde34e4eff5a98ee491ff0012fd69cff78d494c7eb54f601b486a48fee9a3f8ff000acc047edf4a685ef47734b1fde340081b73579afed3dff26e3f15ff00ec52d57ff48e6af4a39da76fdecd79b7ed398ff866ef8af8ebff000896ad9ffc039aae1f1213d99d47f153e93f807fbd4e3f7cd41d225491fdd34d3f787d29ddc5002bfdd5ff007a97b9a0b738a407cbc8fc680169d1f7a6ab6e352376a0067f11a7b76a23fbf4ae9b9a8023fe2a593b526dda69edda8006edf4a17a1a13ad12f514d00b4d3f7a9e7b7d2a36fbeb4c896c7927c7cb701b4cb867dabe54898fef720e3f5af0e699dc801d80466c28edc9e2be8df8d5a63dd78556f235f9acee83337b371fd2be6c97f773489bb7046207e64ff5ad63b1e852f8465dde3c64f24eee79ac5d4f5362e23fe22bfd4d5cb8b47bf6386c20e0d4d67a54111207cce07deab8bb3b9a3d8e37538db4fb69666fbec38fa56dfc3ed01ec74d9e793adc9f307d0e07f4a96eb4cfed0d4ed6d1db72799bcfd2bad8c2128b1fdc030bf4a273bab131dce97c2b6c0ddc6bf361305b1e95ed3a06c9a1db1e767519af2cf04db66e11762c81890ca7d315eb9a6469a72db46a408981014562827b1d4697001164f415a7044b26420c807915574a57fb1950bb476ad25b76f24fcbe61dbf73fad76c55d1e6cdd999d74ff398f0a981f73b9f7aa2ea4e4ed65038f9ab6d2c9dd0165dad8c01e82ab3e9f2212cedf2f4db4d46c5c67a19b040b1293fc04e7f1ab115c46d1cb6f3f304ab865db9dde82afae992e51b6ed5aa37f10824dcdf773fad05c649b3c6bc576f2e9d752230fddef2a4631b0fa7e58ae3a56f32e1d4b2b460f7af4af16d935eb4d94f313770b5e6b7f6f2d8338e8b9e9e95c723dba7f00e4412b85dc303eea8f5aec7c35318a39136ed7c73f5ae0adee984800fad761a2dd2ddc0e0ef12a321062fbd8c9acc1abab1dfe912feed448d827a0f6ae96cc01d0e45715a71df323acfb9f1c83d7a9eb5d4da4aa50e3efe79ad56c70558db537ec3ef3568c2b8cb7e15856922e7e5fc7eb5b16f37cb8dd8cd6f4f63cf92bbb17501438dd8523348b1c6189c6ff7a606da3ae6a273ba4e17e6c7deab6ecae438d95c9b7c7b8718e6a5254b36de95522755cfcdbb9e6a566f972abf37f7aa14efa103dfa542a406cb7ddc54c92875c6edc7bd35939c7ad31c7721dfbd89ec3814e66e71ed4fd9b323f1a63f434914f629ba0432337dddac2bce7c57e643e34de524109b74fde2c791d5b8cd7a4edc96aceb88145e452676b8c8c95c8c5454578d8da94f93531b47910853efeb9cd7576924413df35996d636f71365a1890f7da319e7ad6808628ce234031c64566a368dc5295df3170ccdb768e9510cef5cf5cd44773753ba8518150f63272ba1c63dd3b37a528fbd4ddb9a728da2b3331cdfd290fdc3f5a4fe25fad39fef1a000f6fa5227dfa4fe25fad39bfd61a00785ea7d290b6e23eb4e1d28a00847de7fad2d39fad247f78d00347deaf37fda77fe4dbfe2bff00d8a5ab7fe91cd5e903ef9af37fda77fe4dbfe2bffd8a5ab7fe91cd570f8909eccea97a1a5fe25fad14541d224bfeb4d3d1b69c537f897eb4e913767eb4012939a89fad017694fad2c9feb6801224dcf4e78fe6342f53feed295e54ff00b34d00d55dacbf5a9c7df350236e26a75ea29932d87b26e61f4a5236d34fde1f4a79fba2a4c417a1a69ff5a3e94f1d290d0027ad21eff4a5a6b1ed4d0d2b997e24d2575dd0f50d3cf59e1f97eab935f21eb501b5bd91dfb7ca7f02457d9dcc0e8e0e32467fdaf6af9e3e3c785d2c3c48d78abb20bdfdfb8fefe32ae9f802a7f1ab8ae6763aa855b2713c9e3bb81ddb6f4c53279159386c7159771118e57646dc146cddebb4951fa01559af89da5872062bafd9fba7573dcd4f0fc8bfda7723393e58fe66ba96b85b6ba87cd5cab2e2bccb43d4963f111926e2d8828c6bd0565b696d117cc701bfd4ce9ff2cffdef6359ca9e807a5780e41232a03b031c015ec5636e0adb7caae5495dddc57cff00e01bd7b1bf8a3b8043efe17f840e3eefb77fc6be82b0b9568d5f76062b251b6a5557cba9d0e9c42a1572c4e33f35690d4d235551d42d7396d7e97bb84727cca7159faa5c4d149866278c023af535d29b8c6e8e0e55277675f1eaa771f9b069a7522d3a1937373f7857004ea0d28103bbc646497eb9aa97fad6b7a71416f6f1dc73cab360d2f692fb4354e1d0f603a94287862c718e6b96f18dd04b17915b0eec8a3e9935ccda78ae631bfda2192de4003103e61f9d4d717d36b1279ec9b5636cac78c6ef7ff3e952e77d0b8c2cc6c561e6c48ec37f2413f8d73be23f08adeab6d0caadc71eb5d7da440643aecc1e5fd0fa559fb3294666e7b03ea2b26afa1b2afc9a1e057da25ce8d318594b425be52deb53d82496d329543b95b277fdcfff005d7aeeafa1acc8559728e2b057c2d1825047c2d438d91d90c4736857d1a50d96c60b364e3a678e95d2c52e1d57dab361d20c3190892000f257a558b3b7f2f25db72e715063395f43a8b1936e17d79ad046da71f8d615a42d1904fdc3c8ad3b72ce086ec78fa56ab63824afa1a904953eedd55aca5f3814f438ab2385907a574fd933e5b6a4abb778cf5c5386377cbd2a9c6c5400cbfbbfef7bd5a8991bf8b77a52427b12b47bb6b7bd208f74acde9c5488c376074c54663dae4d29ec664322fcc0fa1a8da4f99beb524b372455757da47fbd56b618fce6a96a3fc1f5abcc7731aa97bfc3513d8110da7fad35793bfd6a9c0bf31356e16dca7eb5ccf618fa55ea6907de148ddffdeff0acc91c9f78d4a3effe1518ef4b40083ef9a737f4a4a280107dea90d32957a1aa8ee342d397a1a6afdea6ff001553d8639fad247f78d297dbf953776eacc90ee6bcd7f69bff00936ff8b1ff00629eadff00a47357a4ff0012fd6bcdff0069eff9371f8b3ff629eadffa472d5c3e2427b33ad7fbc6986a42ddbda9bb76d41d2357a1a7c5f7e9d1fdd347f150028ff5bf87f8d3c77a4fe2a737de1f4a004a0fdd34e6ed4cfe2a0996c4aabc67d29436ea40bc6698cdb9bf0a0c4969a3fd67e14abd296800f5a4cd3a35f9f3ed48ec19d7eb55157d0684c8a72720d2b6371a07b5370b2b80d3f797eb5c77c5ef0e27887c277276e64b43e77e1fe457675148aacea5c6f890112a7fb2dc528ee117cacf84fc44504af2118ddcff009fcab93b9b80eac8bd0d7acfc5ff00083786bc557d6bb76c05cc900ff60938fd735e5d3d97992e77639aea5b1ded5ed232ade3f209f7e69d717cf0db49b59b6b70c07f3ab1a8c5f678d8799ef582e5a53c3fb574249ab326ed2ba37bc35f12358f0a4b11464bad3f71f9665e87038cfe55ec1e1bfdab2d21b68e0bff000f6a6f20388ded595a3fc8d7cfe2c19f9ceeadbf0d68ad71301e8d9a3d9c3a0273968cfaebc2bf1b34fd6612cb63796f38e915c2043f5c0ff3c56bc1e246d55e46986e2e784f4039af03d0e07b1b889e42cb6f8d8cc2ba8d0bc44b1b3c0ece899f97fdb4edfae6b8ea3fb275c61a1ebf63e29512e2357965270163ea052cb7d31b87794c20939c3745f73ef5cae8724eaac60392cc8630dc141939e6ba092ce195846232e858b798cfbf273cd28ec6128d993457515d4ce02b492a807cc5e8464f4ad88672864720929f36e3db3c7f4acdd3ad1d1d8a1f901c56aa5b94ddb79603762999bd8bd65fba84be77e474ad08642e8bb6264623af6a82c230634253629e48f7a59fcd8a4660dfbbce36d7443638dee5d36e8ebcb063df6d5496c951f3fc18fd79a9a19a20d13ecdac43f3f80abc15658cee3bba1fd2892ba1c1d998b15a997765723381511d3369276639eb5aa3cb12e31d282f1a93f37fc06b0e5b1d31926ca7143e501f36eab51b06fbadf3fa7b548922004f97ed4e8d444fb80c0348a96c4b0e71caed35723cf9676bec6cf5aa20624faf3563ccda36d5c37312c3202071b3d47afbd4caaa366531cf5a817b54a197a16e7d2b5265b12ba8dc0ab6e19a479b965f7a8f685e8bb4535dbe5c53462432fdefc29d17dd3f5a1e3e73bfcbda33baa08d99e42c0e41efeb5405aaa97bf792a46ce465b9cfdda8a5ff005a7e5db59cfe11a1917fafabe9b70373719e955a0ff5c7fddff1ab726762edfbd8ae47b0c62eedcfb976f3c7d296838c8f5c734a6b3246ff001538d251400e5e8696917a1a923fba680181bb53d23e0d38a6edbf5a36ed2df5a0002eda28a6bb6d465fef0c5001fc5449f7bf0ff1a489764617d287eb400c1f7abcdff69e5cfece1f15cffd4a5ab7fe91cd5e91fc4bf5af37fda7bfe4dc7e2cff00d8a7ab7fe91cb570f8909eccebd7bd230c9c52af7a3f8be5fbd5074476044f2c11f8d03fd67e1fe34f38fc7bd22f5a0634fdea6cdf7bf0ab05375579976bfe14d00c4ef53d322fba7eb522f434c996c0bd0d4b1fdd3447f74d3aa4c4429bb6fd6971b4b7d6957a1a5a0045e8690fde5fad397ef503bd0039bef1a6d145001487bfd29690d027b1e5bf1e7c1ffdb3a0aea96f1eeb9b31895bd22c93fcc9af96aeedbfd3c107285014fa64d7de52c31ce1a399049032ed954f4da6be59f89be0793c2be267511fee19cdc5a623cc7247caba13ea339fc4574d33b694eeb94f00f144712ceaadfeb33c7e751d9d81788b1f5e2ac78c74f92d6e65965258e786ce72012a31f80aafe16f1158c87ec37571f6794b6633fde3d31fa5764417c4584b3c48a7cc54ea306bd37e1c68962aab71793e46dc011361abc9757d36ea1bc924dfbc751ec2a95beb57f672031dcb438fe11fce89c5cd591b4773e94d634d4bbb7436780a8c7041c9e9dfde93c35e1e2ab2dc4f3afca84ae7d6bccfc09f103505b80b773996db215c9fe1cf435e9779771c720d8fbd99be61fde38073f9115cb28cd2b33aa2ae8f54b4d4f4ab28233248924ccaa1d42e4e302b523f1068888365c85c70038c62bc8f4fb98af3ca2adb95864fb1c9e2b56efcb58c90df2a98f8fc4d38c3414a0ada9eb5a5de58ddce7cbb889d42eec6ec1adcb2f2647f95b6a1fbdce6bc22c63492ecec0c8ac0b310d8ee6af5bdeea76d74d15add3a40cad96df9e063b55c61caee734a11b687bd2c28adc3e57f847b552bf912df255bca6f5f5af2793c4dafc02436b224c36ab00ebb58678cfe95cc78cfe30eabe15bab6d3e6d0751d53539937c49651e41072324fd41a728f32b197b2e6d0f79b4d5627c0dd86ddd7d6b4ece70fbdb393bb19af9fbc19e27d62f62927b8b1b9d32e9cfcf15ca6e018062b93d8f278af44f0478be4d59097c011795924e493d0e3db39aca2ecf94ce743955cef2442b2f3dc66a2032e416c0a63c824b67dbb86e62b96fad490af950a47bf7e075ad074e36d462ab248565f994f21aacc2a554fcdb8678a89536c99f6a991f7023de99a4b61d9c734a8ed21c8e9d2953e5057d79a548f6c8c7fd9a0c4b16ec7907ad35d4ac836b36ecfdded444db929a57f7d9dd8e3fad44f6265b130700b008abcf2569af37047dee7ef7a543e62f9872f93e95189937019d9f374ad23b19165915979653c753da9b180aa409430638e299e50672c24e2a68d7e6ce7762a89645b8212ac72a38a8e3432166fc053ee3f7afb686fdd285a96ec8da2ec85b5ff5847a5597e4fb573b7d7d72754b1b1d353ccbe99b2c3fbb1fafe79aed9f448e5b201bf7b73d59bdc5632a3ccae73ceaf2ea6391834fa69521f2576eee7fa7f4a79ae76acac5c5f32b8833fc3f7a90b0dca3de977741b37f3d2831ed663bb773f97b5400f2bb4b539132698adb81a9a2fba7eb551dc0785dbc50b1ee60de869a692ac053feb7f1a67fcb56a75140117734f8ba9a0fde5fad3cfde3400dd9bf1fec9cd799fed3e31fb38fc593ebe13d58ff00e49cb5e9b5e69fb4e7fc9b6fc59ffb14b56ffd239aaa3f12f513d99d6ecdd405db4acb83bbf0a40bb7f1e6b03a455fbd4c6e9f8d3e9bfc7f85340357ef8fa53c77a6a7de5ff7aa63f78d3265b0ca17ad3a93f8aa4c4993ef7e14a9dfeb489f7bf0a54eff005a007527f152d1400a6928a2800a28a2800a69fbcbf5a7527f15003a4ea7eb5ccf8f7c249e2cd09e00156ee3f9ad9fbb3f75fcb15d31a039042fcdc1c83d94fad0839b9353e0af8b1e1a96c58a4e8c92c6db583763cd7826a367e65fc9fef62bf43ff684f8727c43a1c9aa58445aead6366b854e8e9fdefe7f957c31af696a9a99daa55411b437615ead0abfbbe53a22f995cc5822bdb39512d6668d4a86207ad5a9a7d69643b90dcaedea63cf73c66ba38b4513c49363ee9c7f9fceb6b45bdf2af1637da6204f0deb5a39a2e0aece63c3d3cd2b937b69756cbc049a01b943039fcf9aebee3e206a3a65e4463d1b50b90855fcdc63783919fd2bd1b47b8865b5b60224511e587d4f1fd2b5358b4b49e089e38c656350fb7fbdb89fea2b91d4d4ed8c6cae723e0df1b5deab25b9ff008476fa33bc872fb46e19ce327eb5e9f63a6eabaedc8b7b78c6956ceffbd0c0492151d0061d3e9599a059c4d789e5a28963756527df8fe95ea5a1e9c92da2aaca3ed22325947b313494b9b41b76572959fc3c8adefadd9ee6eeecdcb059a3776dc854305298f676cfb56c7fc22764f0cb6ea9b64906636490ecced574c67d5580ad88561658a628a242a9fbceff0079b8a72da4934659d58c7fc2ccb9da771e6b65b1c53999d6d616305ff9b0c11bc8ead2c4ac788be5552b9f5dcac7f1ab161e10845fb4b768d7175263f7921f3028c67683e9d4e3deb6eced96012b155966ff009e84633c55e858051800e4649149ec61cefa181ac786ad6f2cd956de240e780a3186fef7f2fcab3b4fd35f4b87cb1ba39213bbcc45ca9cf1fd2baebb56982846dc4550ba4264c1ea38ac2a7c27442526b51b6533aba8625f8fbe06056c4b393b446ab21c7de5ed596a9b707daadc3271534c25b1a30671c1f9fbd39146e27f3aac927cb4ef33e95b991651b703f5a19f69c556f33e949e77cd8dd8a068b21b71a5a8164db2aae739e69cdf7dbeb42325bb242ea992f1ee4fef5112ac6c0a9e09cd42cdb47ddcd282ace80fca47f0d55ae64f72e79f8595bdf151194a85c7522a06659a66063f913f9d3a0b745ccf205450720f7a971b6a296c598ad5a3065917df3ed54a779afee05be9c0cd72473bbeea2fafd6b56cf49bbd6d8c8e0c169d0e3efb8ff0aea2caca0b0b658ad90a47d707ae7deaed75630956e55633bc3da0c5a15b10373dc4adba499bfbd81c0f6e2b5dd88030380707dcd2e314df7ad547963738a4f99dcc0d4e0f2ae37ffcb3638fc6b3d801211e8702b7b5c8fced3a5d9e50990168cc9b8fcddb815f1878eff695f1d68fae5f693135a59ddda48616961b7024ddd720b73d08ae774399dcde156cb94fabee6e20b385a5b996182dd7efc93b61507ad65e89e31d03c413dd5be8facc17f340a0b2c12fcc067a81e95f10bebbad788af3fb43c45abea1aa4e58baadcb8d899f4c7e35d7f827c433e83a85bde5a996de5b621f739c8719e71f856df56b44d555e5d4fb1c7ccd8383b7e5ce319ef93f9d4c060d52d17548b5cd22d351876ecba8c4802f6ec7f956820c035e725ca9a3aa2f995c7533fe5afe14a69a3fd67e1fe3400f1dea393ef7e1fe34ef5a63f5a4f6018cfb76fd6a6dd825bf0a847dea9593740ff856602818fc79af34fda73fe4db7e2cff00d8a5ab7fe91cd5e9617696af34fda7173fb377c593ff005296adff00a47355c3e2427b33aa4fbc7eb4b27defc3fc69f4d3f797eb506f2d868fbbf8d4a1be603da83f78d11fdfa0c46797f3548176f14d91bf78a3dea645dbbbeb400c09ba9bb769a9e9a7ef5002a7defc2953bfd6834abd0d00364e8bf5a72ff17d68342f43400b451450034fde5fad48cb9634ddd8a6b4983400a460d2019a89a4f9ff000a52f9e29a1a57d0954aab73d68571ce3d6abc8a547cabf37ad2c603b15fbdf2e4b7a530e4b6a4930df82572a7e5c7afa8fcabe45fda0fe0e3699ac3eaba783fd99704b961d51b272bfc8fe35f5cab7ca1776eed5435bd16db5cd3ee2c6e1559654c73ef914e0ecee54773e0cf0fdac48143ab985d7e62fd79e3fa565eb3a44fa55e18d571167747fee926bd3fc69e099fc1fe21bcb3750b1c6d98b1fdcedfae6b192fedee6de582e93cc5e3e5aed553955cec5b193a3ea53436bb075ce6bb2d3ae9ae3ca45e85467eb5cffd874c86462adb46738f4ad2d2b5db1d2a494346b3c2ca1bef60a95279fd4566df32b9d5076573d1f43d2a34505994333639aeff004ab14455248661f2e4578a5b6bb2457b1ec9e54501990e721f201c7eb5ea9e1df17477f0451b2b2c8a02b05f5c0a84ec5c9f3ab1dfdb40b0468a573939dd57e2548c37cfbb9e958315f0f2c37cf9ed52c5a8991f0cc476e69f3be87138d99b2ce18ee117038eb4df35256d8e368f4acd491848641237a63b54a970149dfb413cfcb473cba8179d8a7dd6f9474150adc06c874c1f5a8cce1f81d29f0a039ddf76a5caeac08472186c127079a7ac72f97989c1238c77a544f988fcaacc29e5b5409bb2b8db6924ce0c4f9eecdd2a5667504654ff00bb48f26ecfcbf8d572fcf5dd5a43732e7be839b748a41e99a7215674cafca9ce7dea1df96c54aaeb11552ca0b1c7bd742044c1b6334992e09e00eb4e8d5e57deb13a2fabf5a6ec1b9802eea38c374cd25b891598197cd6cf0abd00aa306ecee4a4297c195b3fdded4ac44070362a1e588ea69accb1b09372b3838007427d2a18247bbbc3696a7ccba5386c2feee2f627d7fc4534673a9a16add1e49846b0bc8adcc703743fed7f9f4ae974df0d2abc735db8964539589bee467fc6ae685a547a4db11b4c93c8d9690b6ec9c0e95a883008ce7079ab479ee57609fc5d339e48e87e94ea28aa444b60a8e4539cafdea92b375dd6edb42b192e6e5d504637062d8dbea6ad2b98dec62f8f35cb7d2f497334bf6689559e79fd17d3f9d7c3df15757d37c5fe36b9d574f83644b12c31dc7fcf50093bbf5fd2ba2f8e9f185bc5fab7f67e9f201a46ec97073bc82726bcba2bbfb4191e35da9bb03dfdeba54341a95cd0b78d36aee6c1fe75af6d3a5aba330f32100eec360f35876d31405bf8ba54885896676604ff0076851e5d468fa2bf67ef1a451c8fa04d3130cb97b4590e48938cfe8057bdc5f77b67bedaf827c39a85d68fa8c4f003217951a3cf66539fe58afb53c07e2c87c67e17b5d4e37dd3b652e3da41d47e58af27134ed3e63ba8d4bbe53a5a299b3700680bb6b94eb07e9f77fe05476fbdba98fd69bb7723afd0fe468025a3776a546de5dffbe73fd3fa5397a9a006a2ed06bccbf6a0ff009371f8b1ff006296adff00a47357a6ff0019af31fda73fe4dbfe2cff00d8a5ab7fe91cd551f897a89ecceb026e14e54da09a41d29cbd0d646f2d84ddb9a9e69290a6edbf5a931115ca49f2fdec54888149f7e4d3561f9d9bde9edf787d2801e9dfeb40ff0059f852af4a8dfeff00e1400f3f7e9ebd4ffbb4d5e94e5e86801c7ee8fa534d06a377da71400fa633ed38a89a4e699bb73ad345c372467c9c526ddb511ff59ff02ab09dfeb546a32a58bee9fad23fdda50a01466fbbd29132d876cdd49b36f34aea577fbf229a3f87e952622b36e4fc69aec7e40bf7aa431eef9bd0546dd6803cd3e36f858eb1a4fdb60406eac62924dc3a98f2bbc37b631fad7ca9ae62dcbba646f62e17f85464e02fb607f3afb9b57d3d6fed258e401e22a5591d72adff00d7af903e24e931689a9dedb8431aa3108846368c9e07b574c0e9a679abeaec3787eb55ff00b6a70a422e63c827ea287b7fb4163ef57ec7c3735e4798a1f3319c9aeb4d25766c8d9f0bf88259ee1e48f93e66e31faf0067f4af5cd0daf3560af05bb4acbcb81d85701e1ff0e0834d80c71bc374bf788e8cbe9fcebd13c2daf47a76e4891a1988c0656ea3bae3fcf5ae39ca2f44754763a6b11a948194ef5895909f6193c574fa44937daff7e5e4439da7d064d6268bab25e070b97841c2a15db8ff0026bb6d3dd5e10cc7381b40f4159a149d95c45612332046419e1b6e4d5ab75ccc89b6418ece319f7ad5b5d384b0aedee3353476be5bae79c1ae98ec704e65758bce948c2c78fe15efef522458623cbe957238d1a56dcd839a574556e0e45519f3b29c51fce78c524e881d4b2ee6cd3ee6ea3b52bbcfde38c54324c1d86e8d9501c03da80e762348b96cfcbcfddaaaf28ced55da29d728d2cc002ac33c6da8a546130cac78439dccb93532d8a8cf5258031ce02a8539f33bfd2adc0479a1cfdf3cef6eb8acf5917ccf33ef296c6ec6306a49d774c10b72fd0fd3b55a5ccac65295f42c4971b8c8117cb1bb966ea4d24d790e9d6af7174c218947324adc1fa0aab2dc496ec02c44bccdf2428b96723bfd2b5345f02ff6a5f0d435d617d20e63b591772c3e985feff5e7d315d318d91c33adcba19da25bea5e2b9f302b5ae9a06ef3c7c8f203d80feeff00f5ebd3345d1ed745b658618cc617d4e493ea6a6b6b74b65548feef5c13923ebe9f4ab83a5339a4f995c4518cfbd21a7534d06484a0535979cd733e39f1d69fe08d224bdd425c220cac7ea7d69257761deda9a3e2af1358f85f4f96f2fe489228d324cad80073cd7c51f1a3e355e7c40d456d6c37ae951e41da73f68e4f5ff6471fad607c5bf8cdad7c40d45cc7986c8ee486376f930392d8f5c1fd2b8331a97f34b79618aba90bb430c0191f8835e8c63685c872ba24b526e090859541e09e8deebeddbf035651433346e724a30cd52b8bd8619e7691f7a311cfbd39e679e39f0d852508fa0269c3714372e802395e31b7850396c76a50cb04618900faa9cd630d404684b98d8b92d97ebd71fd284d517c8211943b363e4e952f7353a2b7d4122da49f3413d6bd8fe01f8e5fc3baf1b3b86db63a83f96cbe870306bc2ac2ed01018e641c7e15d069b751d9160a4e1fe66546c3103afe038358558f3c1a34a72e4773ef62029e39ff006bfbdeff00caa651c579ff00c1af1c49e2ef09a79ed1bdfd962390a9cc8e981b643f8103fe035e8083024e4364e73dcfd6bc5b72a68f462f995c5a6ff152a77a4fe2a82c93f8a9cddaa26fbdf2fdea7b6368f5cf340085f6579a7ed4236fece1f15d76b1cf847566c8e9ff001e7357a4afdfff0081579b7ed37ff26ddf173fec53d5bff48e5aa8fc4bd44f66752c9b0e3f1a17aafd69a1f7caa7f0a79ff59ff02ac064bdcd14d61962295136023f1a00963fba69d507f154cbd280169a3fd67e14ea4dfb68017d69bbb6bfe14c693e7fc287938a684c63c9fbcfc29a8dbb3f5a8dcee71f4a7ff02ffbd4fa1a7d92448cc9bd57ef30fe550aca241f5eb5286f9c8a411f5a9206247938fc6a40373799e836d214d9b5bdf14e55da5bdce680041d7dcd2d0bfeb07d294a6e26801f1fdd34ea6c6bb41141fbd400ea611b9f1ed448fb4e3daa35f9a5dded40093c24ee556f9b00edfc4d7cc3fb50e81269dab585f347e5d95d2f952bbfdc6652580faf23f3afa7cb7ef01f7c5799fed09e0e6f16f81ef24b5459b51840f29199b21064b9503b9040fc2ae0f9657364ed13e3a88c32225d1015a63920741ce38fc857a1f8408c0f2cec5fef7d6bca63b79adee2482ecb45347f2981d4ab443b29cf7c73f8d7a17c3fd48c21829ca960a3eb5dd563eef31d34e676f211a41919d43c61192557fba17a86fae49ae2f52f13986f18239da48524f4271dbdb18af44bf64b98d617dbfbc6dafebc006bc83c63a3883529b6fdc077aeff004e47f4ae682bbb1ab9e87acf81bc526eaf21814b3b00385fe75edda11479046d2190b8e0b763e95f267c3cd55ed75040675823774dbbbeeb303d3ebd2bdf740d51f50b6b86e55b6ee24f41c9e9ed49c6cc26f9a163d6ad6e23694e7ef9ebf5abacdf385dbdb39ae1b4fd5459c0244959d914315ec73c63f4ab90f88a49e4545dbb506f7656c7979edfa7eb5bd33cfe4d4eb8b3b7dcf99871bbd2a1927d8db5a4ea326b1575011e447233b641db9c865fef7f3fca9d777c24ba61fba5660007ee00ed5a838d95cb535ddbc2ad945949f5ac23294bd57fb3b44ef90027dd23d69b7fac245222afef1e7241565c86c545e6cd19805ac16edbc6e92363b428c91f9f141695e362fc76e92a8678977a8c6e3f535309fcd2cbbd46d18fddab6ffcc76aa531524904c43b861b87e1ed55fce8941b89d638e18790506324d095ce59492d19a32b4323462570ec07ca858966ebeb50db4925d6aa2dada191571f3beec6c39fbbfcbf3a7689a35f6a97267205bda9fefc982ebf4aeff4db0b7b45458a20a00ce00c575c29e87056c4452e543b43d023b505d915df1cbb9cb574b045e50519ce466a2b51fbbdd8c60d582db990fbd43767ca7227cda928a522907de6fad284dcd9f6a46edda371841a140e4374eb4636b328e0f5cd70ff0011be2669de01d0ae2f6f2e02c51e5b27a31f4fd2ae2aeec62e575626f88ff13348f875a15c6a3a8c8ab1a29daa7bb57c05f153e2cdf7c53d7e2bb92e2548230f15ac4adfbb01b3f363d7fc0551f8a5f13b51f8a1abc9a85d4ca96837c1691eec471ab7f1fd4f4fc05700a8b14d0c5100aa08c0072060638fcabbe9c6da906dcd3fcccc6679d1708bbd76e4818e3da9c93a22e5036e1cf9a3f858f18fd07e759d772e4fef06086c06f6f4aa33ca82438f90ff003f7aded7d046e7da85bdd2a4d2169546e04ae79e6a09b5465924707249e78c73546d67952d2e248c2bc91e0e4fa1aa13184ab1705272d9ca74a392da8cde86ecc91966db9cfcb9f5ab361892566973b71cece991fe4563da2ee74df29670a3afa1ad8492dad919207e220049f535cd2dcdd6c6ba6a5291190b947c91bbafa7f4ad1d3e613228cb2373c356025eac32bc68ff00281c52e9b334cec01dc37e6b293b20b5f43da3e1078c64f06ea905f87debbbcbb85ffa667fc9afb02cef22bbb486e6ddb75b4c8248bd94ff00f5f35f9efa6eabf67ba68860dc01bd077c0e4ffe835f55fecdfe2f9f59d1e7d1ee0b3ada95b88246fe157f9b6fe64fe75e7e269dbde3b68bd794f5f66dcdf853d3bd201e5e09fbdce7dce4d291f303ea335e79d63dbef538d33b8a7ff1fe1400b1f7af31fda83fe4dc7e2c7fd8a5ab7fe91cd5e95fc46bce7f69c5cfecd9f164ff00d4a5ab7fe91cd551f897a89eccea0fdf5a41f7dfeb437534e8bbd6032c47f74d2afdff00c298dda9aabfbccfb5003c7df34f35116dc4d3e3fba6801d51bf5a53f7bf0a8cfde3400d6fbd4ac771d9f8d1450027fabda7df14c71876f7e69dfc5492fdf5a0044ef52ff12fd699b7e73fed7cb4acbb1b6fa0c5004adfeb07d698df7dfeb41a4553bb2bf7a80246edf4a6d3049d76fdfef407ce42fdfef401205efb7fe0546e2d9c36e6a58b0aa57b93cd38228e4f5a0022c6e3fad2aff17d698ee08c0a722ed5a0055fbff85413461f2a79f33e502ac5277a2c07cc3f1ffe058b7b2d53c43e1f3999b64f716a1725b1e66f6fcb6fe55e1325edef85a39eceeaca4b6926937aa4a30a417049ff00be76d7e874d147302922ee56e305721bdabcfbe20fc12d23c6f77632385b7f215d5e2076a38dad818f50493f88ae98554972b364ed13e5cf0ff8b964810319239833b481ba31dc4003f00b595e25f155acf2c865700f1955ecb93c7f3af51f177ec9b7d05ba7fc23f7c224168924f1cf361677520823f02a3f0af9e7c61e0bd7bc1f7fa858eb56a6cef118b040db9594b120e7f3aec84612d50b9cd7b6d6a06d4e56b53e642b1bbeddb9e56376fe95eade11f1999adad442ea2591a3ea76ec0df3e7ff001eaf9bec6f2e52ee1605708f86dbe8df2ff5aeaad757d42c2490da050b14a0ac8573b4a294c7e355282b0739f52e9fae18f2cd2195a12732a1c83926b461d776ef504a042b24a1bf8d70d8fd41af9fb44f88ba94b06dc01e6c3179b6c171b4a653f4c83f8d769e16d66f6f23b713db7989130fdf8eb731066565fc36feb597289caeac7b369de268a596392693ece59630cdbb1e54794de3fe05fbb3ff0000a92df538ede5d8d70cf248a1d26071e5be3e67dffed7071ef5e66b21d42e12086edeca4859dd64921694027ee0c0ec7a1a5d5fc63e1ff0a1ba37daada45244159e00e523dd8e446a7b6727ea4d3506f622f63d674dba9ae4968e5252472dfbc8383d063777e99fc6a5bfbdb3819d2532ef51b88930db7e9bbe555f53d6be6df127ed59a4688a93e956b79aa4b20d822dd8553f4ee2b17c3ba7f8f7e356a515df88750974fd0e701e2d234e6d893264e0c8bdfebec2ad41fdad8cea4fdd3e8083c669abde4967a5476b7e3fd5caf6a5cdb447b05238279ea38e6bd0fc2be128ada113ea09e75c2f386cf96adebcfe15cf780bc216be16b58edede341b5300a0c035dc59933028a36ed3826bb29c22b54793525756372d5e3855767561924743f4ad7b7849995dbd2b1f4d89966037ef7f5f6ae92da31b78f5e6ae5b1c295e562d45f35595e07ad4512e38a959c06da5b0319ae67a23a92e48dc0b1155aeb508ad14b4b26d18fbb54355f105bd82b027271c1af34f1bf8dadb4bd3ae353d4ae05bd8c0b9763d08c9e2b6853d3985cf7d0d2f887f156c7c2da35dea77f702cf4db65ccf3afdec7381f426be03f8bbf18eefe27ebad2bc862d261571696b1b703bef23d4823f4aa7f1afe33ea1f153599635260d0ed9b167045f75f93990fb9181ff0001af3a442401095531b6549fe21ebf9e6bb69c6da8e3b9ab05c0b81e5c6311200a0eddb9e3afeb4fc2797201d5706b3cdf16726e5901fe17f7f4a9e198cdbb6202ea32e47715b1a92c92c819b8563f7957be6ac69d36f8e46b80cd21393bbb7b5534fdd3c2e1fca476c2fd685748af650d70b2b06ea57a31ed9fca811b11cf082100da4a1aa3611a2c2e4eece4f4f4a7cba8222980a97645c1646dc01a726ab6a2d817c79a381bfad66d5d5893421bb48eda207390c586573c62b3c5ebc8c595d8a9ff009678c0fad67cb2dc4a2412e30ea76e3d2896548d9a31d5703f4152a9eba9b7d9351e58e48c6ff2b20fcbea0d6a5acd33a6e3bbcc55dbc7a572df6b118d92f43cd5ad3ee9677dd8621180c0f4f5a2505620ecb416b8b9bc48e06f9cf27cdfbaa0753f957b57c1ff008d763e0ad46ed23b48aef4f99d23695bfd66f1d76fb74fd6be6af1df8bed344fb3d858c62eefe556f38cd2f92b1c447f0b7f789cf1f4ac2d1fc4eb05f6e7d2eee1448c04fb3cab2ba0f424f5e727f1ae69d2e6563a60ecae7ea5785be27f86bc54c8b697ad6d70fcfd9ef1b1bb9eded5d53aed3800807b16c81f4f6afcc3f0efc55d2924449b539aca55627fd3acc84518ebbd7807ad7bc780be35788f4cb38a4b4d5c5f5891b9124613c6e3d467e61d3b715e6cf0cd6a8ea53f74fb1b382286ff005bf87f8d78d7877f687b0bd78a1d674d9ed1c00c66b5919c63d70dd3bf15e99a1f8ebc3fe235ce99ab4174e4e3ca98f96e0ffbbdfeb5cd2528ab31c65776360fdf5fad79dfed41ff0026e1f167fec52d5bff0048e5af476ddbbe6da0e3f84605799fed40ac7f672f8b0474ff00844b56ff00d239aa21f122deccebd71b9777dda40e5666fd29adfd288befd738c941dcd5283819a887de1f5a90fdf6a006b3ef6cfb6294beda45fbcd4c67dac680066e73481f7f3e9c501b752d0037f8a9e6917ef53426e6a0072fdea6a7fac34fdbb5bf0a8cfde5fad0029fbd4edbfbdcfb523fdf353c7f74d00445b72b546bf78d5ba827fbc2801ae9b9d7eb4f2bb5cd03a5491fdd3400d6ed480e39a96a37eb4009bf7e4fa714e45c02df852226e35294c2e68020977465768e49ce6a5f9589656ddebf5a446dc0fb53a801036ea5a29a7ef2fd6801496caedea371fe55e31f16fc3b06a9aade6fb7594b80779ec71d2bd99c8127cdf77afe55e4fe28bffed2d4e7959772eeda2aa2ecca8ee7c77e39f0edbe897b2c66341313bd47b648fe95c049aecfa7994041e61e063fbb5f54fc4df045b78ab4b923c7d9e6424a4defe9fe7d6be4af11c771a2ea13d85e26c910f07fbebd01fd0fe55ebd2926b525ee6e68ff0013a3b1431496714e78c99173c8357f54f8e7ab5c5dc7258436f691201fb9017613fdec1efd07e02bcc5f0ac4af4aad3cec5c63d2bb55184a3725ec769ad7c4cd7f5cbc9279f54ba80951188e0730af527a2f07af5ac0bcf11dcdc058a7967be9ce16349a42ed9cfa9ed58d0adc5cdc471c503dd48cea1208972c5b2706bebffd9b7f67db5f0ec16fe25f11933788a542608645c2c073d0fbff008d69cd1a71d0c64ec8e4fe037ecdba9ea77d6faf789a2305b1c3c16f2f53dc37d3fc2bec5d17c376f6b1471c31840a0038ff003f4a2d200a53763046491d09f6addb3899d8aa8c8c702b9377738653163d35b7854f98752de95ad69009996187e723a9f7a5b0b396e232a7f7311f95fdc56fdb5a5ad9dba8813695e33ebef5d09b4ae8e1a932de9b602d9429187eb579a51103bfaf6ac7fed1400e7a838acad535d1112449b571f77f3e6a1c2525796c62aa3e874571ada5ba01bb15cbeafe2b0b210b27535ce5fea93ced966daa7a7b8ac6d4f56874db792e2e2716f6d1a6e9667fba14751f5a4a514ec8e8519b8dd9735ff12dae9561797faa5dc76f650a992466eac076af84fe367c6fbff8a9ad476f6be6697e1c88398221d2e0827e7fc4607e147ed09f1d2e7e286acba5e96e60f0c59c9ba287a2dd1c90657fef2ae0607ae6bcb65512cbb4b48554600906081f4ec0f5c7bd7653a76f78de11b22cc4d24ed260ee50002be9c54de6b320461e5c44608f53eb51dac70a20776c27cc83fdec0ab128512caaa56440ab856fef7ffab15b16556b8c2f951b6554f5a9a0d45e05674651212a8d9553f2e4fafe355640d752ceae41283381da96009142a27660c46576fa7f906802dadd6eb66538dc7a380071b8f1c7e3530ba5b46900180464afa9f5aa26fa28176c783df73f5a8a7ba33e18b06c0c714017c5e15882c8ec0ca482dd828edfceaa47a86eb30123531ef3975f4acf77767fdd33f987f7788fae1b8fe94e590b6f0408fcc0119a3f5538e7df8a00d88ee97780bf748e2925dad963d6b264bc11cc0212ad9efdf8eb50c97c8c5327276f3f99a0ae85d9ef8c32ed4e98cff3a993c58be1bb19351ce6e8bac50a7fb5ebfad6599849e632f444dcdf4ae2efb50fed8ba2c7fd547c0fccd049a16d7526a1772dddd36eb99a46793d8e7a56fda5cc21ca1fbf8c8ae72d408f04742335663bbda40ff6ab26afa1d31d8ee2cf58922458baa11c83c8fcaaddb5bd8f9e66b51259de638bab23e5c83db6f71eff00e15c8db5c2b927760e6b52d6ed6070cd27cfdbe95938d95ca3d0b4cf11f8ab4e8848fabdb6b31afdc86f0624fa66b774af8c6ca48d66c2f347643969b7b3418f5c8e9df8af3eb6d565098237e7906af4324b3a97da7674215b9fcbd2b2924d6a347d13e16f8dfa9a242fa178924b887190b93247f4c9e9f4ad2f8c1fb435f6a9f02fe25695a969b632fdafc33a95b8b8864d8c19ed655cedee79cd7cab77a0dbcd70971e408661c09ed7e4907d456378cf54d7e1f00788edc6aaf7b6674cb9575bbf9a4553138201fa7ea6b2fabc1ea36da5a1face3ef0ff007aa43feb45357a9ff769c57853ed5f3c7581fbeff5a4dfb680dba87f9155fd4eda00036ea37eda53d48f4e2a1964db26df6a007336e34e8fee9a22eb4063bb1da800d996a76ddacbbbeed232856e3d29c6801a33e637a678a13ef1a366ea7c6bb73401195f949f7a5deb804f6a7f734c70a5941a008e6d4a2b7521a558f3f9d361679db780c0762ddfdea1b7b58adf5b378d1f9812dde2fbb9fbc40fe957cb97766ce46480318c60918fd2801a909c92ddaa75e94d1f7a9e6800a69fbd4ea4dfb68011fb53b255832fdec63f9d3376e6a795f994d00228033ea4e4d2d3376e91beb4eff9683e94008ff7697d3e94d7fbe2b9af1efc40d13e19e8175e20d767fb3dbda65e34ff009f87c7dcff003eb5518f3bb0996bc55e29d3bc370db45772a7daf5093ecf696cb261e66dac4f1e8335e79342b1060c416006481ec3ad788fc0ef18eaff001c3e27f897e21eb2ade55845f65d06ddbee41bc9dc3eb86cfe35ed775fb98b7312500c03db3df1f8e6b4aaada1b44cab9816e15ced52a38cb5792fc59f86165e35d265411017f6e0bc0e3fbdcf15ea924ce4363a13c5731e31f16693e0dd3fedfad5e45670121559dbe627d00aba6dad86f63e10d522bdd03539ac3504d9750b6d6f7f7a44937472f7f3142e3fe0407fecd5ee5e23f197c3cf8a3aecf69a95bdc69abf763bfb98f69cf6707fbbcfe86b12fbf670b9f0d2aebe9abdb7897c151b07bd3a54b9b911ff007587a631f9d7d0c6a4b955ce399eb5fb21fc2dd1f51d09bc65751c775aa35c4b6f6f24c77ac0a8426553fbc7079fa57d3763a725b4e6dd1762e72108c11f51dabc13f646f8a5a2f8b2f3c4de13d3ad21d36d74f912e74c882ed678080b97ff006b2adf90afa652c5e5937c1189769ca81fc23ffd79ae770bbb9c5376d47e9f619933e9c56f59daaa4996eb49670c71c3927321e48f43e9572dee510157fbb5b28d91e74e77d099582e76f4aacf7ab0b807a66a1b8bd01588e9dab0ef2f9a76017a526ec62a8f36a5dd4f585524c7eb8ae7e7b991ddcb36d26ac1b7632163492c2ae13701236e0150f407d6a1cae8ec82b6867989a5214c83059572dd141ce4fd78af873f68ff008f377f11359baf0b68cd2c3e1cb595a2b8c1d8d3cc8c42e5bfb83038fad7a67ed4dfb493785aea4f09782ef01d6173f6fbd4e918390625ff0068633ff0215f1f58c8f748d2caed2cacc4bbbfde624e493ef5d14a9dbde3545eb50eecb875902b6ddea300e3ae0f7e73cd681631c84e76c918ddbbd8f1fd2a822796aaff00ed62a76914677362ba464c93052ca16459baef1d08a20bade59e45dac0edfafbd67cce8ca557e66ebba881d4a395dcf8c0257d6802f48c4b1d9b483ce0d46ec576a9548f073f9f1fd2ab34dbae1b823eb4f40d231c2ee02802d3c3f6649a23286180785f7f5a88aba93be4fa7cdbb8a8fce2ab962ab86c6d6a8e404c52b2e15b23e51de802725029246f7f5f6a5f39193e4181dfeb55d58348df2edf5a4de30d1bb61339a0a8ee398b480a8e950ef2ad82b9c535a5504aa9c8aad7973f6485a466c2819a0a7b1078835430422dd061a4196fa5655b2044403a678aaab27daa732e7218e455d43b38a0d61b136fda5beb4a927351b1c9a4a4f628d1b5b9d8d8ad6b6b8dee4ffb35ce42fb722ae4136d39ac9abe80753677c2051f9d6dd96b2a607cb62b8a86fc671bf15a76d2a48b8697bfca3deb371b2b81d0bdf24f106ceeed585e37951bc0de22fbd9feceb8e9d3fd5353da70381c11d7eb591e3197778335ff00faf0b8ff00d16d5282f63f61fcbdc437e14fddb5b1ed4d3264e3fdaa648bb5cd7cb1da2349f3d4a1b721a8694376a0050c7710bf7aa3f2479a4fb73522c7b589a6336e26801c1baad3d0f9608fc699177a74ff0071f6fdec0fe7400ef33e94e8c6f7cfe14cdc01c7bf353c4bb777d6801cabb734b4d3f7a9c680237eb4cfe3fc29efd6986801813735588d76a9a857ad4ebd280168a69fbd4e34005148bf7ff0a17f8beb400b48bf7ff0a5a8a6fb876fdec8a00917f8beb4639a69c79aff005e69cf83b17246721b6f5238c0fa669ad068a9a95ddbd8db49737522dbd95ba34d7529ef1a8ce3f9d7e5ff00ed37f1daf3e3478d5ee84e46816bbd74cb5693118c120cca3fbcdf77fe022be8bfdb9fe39476b6eff0f343b9f2eee7dafaa4f174083388cfbf19ff00810af8265ba4791a60d9894efdbfdf55ebff00a08af67074d25ccce7955d794fb73f62df2cfc2ad6594189e4d61d1830e540820383f9e7f1af6ed4dd5629a7b9952deda25ded2cbca841df1f9d798fece7a3587c2afd9df4bd77c417ab6d69721f589d4ffd35e8bff7caafe75f357c76fda5359f8b976ba55806d27c2913388a0b71b0dd8fefb3ff007791c7b573aa12af566d6c5c6ab8aba3d27e2cfed57a668ed358781e15d53510363ea12a6c8e33920803d4707f1af95b5ef146b5e27d5e4d435abd96fef5b8df2f455c93b57db24fe66abc8151caa7cd18002b0390c31d41efe9f8546cdb4e2bdca74a9d3869b98c9ca5ab35acf54f28f972701c601aeb6d3e2ff88344f0eea1a059dc462d2f6068dc98f271e99af3e88eea27750f83d715495f420ee7e107c459fe147c45d0fc4a9c5a5bc9e4ea233feb2cd82f9ff902b5fae7a15ddaea5a5c3a9584de7d9df22dc4327ac6ca367fe3bb6bf13fe6689fca50fcae7774523254fd4e08afb5bf600fda091e5ff8561afdcedb77dd2e8b24dd6266c39847b062cdff000334a51491c7515cfb794189da371fb9939ddef552e98abf9bbb7291c7d29f7d3199c961893f8fdc8e3fa554f34c841f4e2b966ec8e5f67cda10bb4923fcbf74f5a3cac3fbe2a76556ea79fa520c21c0ae672be87445595889e1e0c8a4ef5c0015796f6cfa57807ed59fb42c7f0a3469b42d0668a4f186a1104570d95b088961e61f72430fc0574ffb477ed0961f043c2c5a265b9f12de8db616bde23c812fe608ff0080d7e6af8835cd4bc4fad5eeb1ac5cb5d6a97b219ae646fef9ff00eb62ba2951e6d4d23b8d6b879efde59e533dd48dba59cf4958f561ed5369f13c775751ff0079437ea7fc2b2d2e8472124f18ab52dd6dbab1bd8fa29f2ff1ff0026bd08ae5563537b9478b7afca09f9bf0a1672c8416dc3b556790b9643d8548b2332281d00c50c97b10dc3bc72865fbb8a86690291f36188cd59b8251541eb9cd44c82462de66dc71b6ae3b1315ccec21791a2fbd9a03485635dbb86e273f8532450c3ef6da700638f707f97bd293b2b9a725b512395f2c318e31fad5a865261196c6de6aa48006438df19e49f7a499d90304185ce69a7cf1b01a3e7314c86ce79cd579252b963f4aa1e6c9b69f6a1a4c96f5a9e4e5d409d63670241f701e6b275dd54dc3adb47f7075fad5dd5af3ec30fd45738afe6316fef7340e3b93e31201e82a7a6409b852cc563600fa50683d7a1a5f336fcb51c6c18123a52ff0012fd6802546da0d4892706a176db21a532376a4f602edadcecc8f7abe2ff0068c561ac873cf5a9d24e6b3037ad6f55a339f5aa5e2b9d1fc21af7193f609c67fed9b5456f271f8d53f15dc15f0b6b283a1b29bff406a56b89ec7ed332794c3e99a648fe61cfb6281f78d486be40ee20a63d4edf74d407ef50049d87d29026e34d6fbc29c9f7e802411e0e696593298a03750bf7a91542c9ef8e6801b1c752edda714d1feb7f0ff1a70fbd40132f4a5a45e94b400d7e950ac7b8eef4e2ac546fd680157eff00e14ff5a6c7f74d3a800a28a28010b76a02eda5a28013f897eb4b71d4fd68a6920293c6e18da0f4249e94d5efa0d036445f7b1fecd70ff187e26dbfc25f006a1e21923cdeaa18ac2dff00e7e6e08f947fc03ef7e3589f1bff00680f0efc19b67599a2d57c425330e94bfc20e407fcc1fcabf3bbe337c61d7fe26eba9a9ebb726e2740e96b68cfba3b546cfdd4fef1e467e95dd4a8ca4d3644dda2719e32f115e788b58bdd5750b9fb65fdf4867b8b9ff9eae4f27f0c6dff0080d53f02f8566f1e78db41f0e40db65d4ef63841f45ce5cfe55857777bae0c982a1b00231e57031823b74ce3debd67e014d0f82b4cf17fc409c2c97da6db7d8f4953fc37132b2b9ffbe76d7d0356858e1e6bbb1d5fed3bf13ad75fd5ecfc1fa2cb22786bc3911b3445e8f2a1219bf90fc2bc2a69f7c83e7df8c0fa71d296447458c4a434a406723bb1e4fea6aac832f8ff006ab386e592b1dccd513a6e7fc29d1c3b59beb5215dac3e95bc77011155473bbf0a8ae3185c67af7ab05b6a9aa571236ee3a62acce7b0864db215f6a6db4b3d9ddc7736f3fd92e639164b7b81c15914e473f954fa569d26ab771c596039e457a2f85be1469f73a66a777a835c4e2ded9dd107dccfbd44e4a2af22a0aeac7de9fb2a7ed0b1fc77f06490eab98fc4fa66c86f83bef69d4a80b303ef823fe035ece18ba8725886ce4b77c123fa57e517c33f18eb1f0fbc4365ae786d92dae2d1848caadf25ca719888f5c0cfe22bf4a7e0f7c5ed1fe2ff0084c6b5a3b6db85fddde5996d8f6f2e016017bae0839f735e6544e9ebd0c251b3b9daee5038e95c3fc60f8aba57c1ff00065d788353b84594831d85b4bf7679c0cedfd45753adea169e1bd3ef352bf9443a6d9c4f3dccd8c1280743fad7e5f7ed01f19aebe32f8e6eb5470cda240ad6ba646ff71613f7a55ff68e71ff00011554a9f3b33b5f438bf1df8f758f88be29bcf116b736fbcba624403a5ba64e231f4c93ff0002ac333e29a420c6c276e0008dd5401800fe001fc69a5f15ea35cba1bc63657268a5dd5a11399f4dbb857cbdc007f9bad63f98dbb8e957b4cb9923bb4c77e1be86a5ec068d95cbcd04522fdd9320fd7153db4bb414f45c7ea6b1ad91ad2fef61ddb537647d2b5e2d9b5f9cf3fe154fe119396516a73d735485c84240a8e762adf274aa73c872b9eb5a4761a2d0b9f30b8f6a1a5dd003e87159e25d859b76de71534472a4efea6a866b2dd6d8947b542d3ef39ddb6aa2743ceea71ff567eb400f6f99f7673818a532aa027d461be82abeeedbb155352be36d6c2d50ee699be6fa54bd8996c41a95f7db65df1fdcc607eb51dba95539eb9a8531bc11d0f4ab4bd6b32e1b127f154cbd2aac9f7bf0ff001a922ff567eb49ec513d1502f4352c7f74d4c77011df69c53a293e53f5a5a29cb601dbea48a4a86957a1ac9016c49f3567f8a1d8f86f56c74fb1cbff00a0354bfc554bc485878735603a7d925ffd01aa84f63f6d877a923fba6915017623ae79a7bc276e57ef57c79dc35bee9aae7ef8fad586c6df7ef518ef4001fbed4b0fdf34d34a8fb411400f7fbc6917aafd69c8db88fad28ff58df5a0071fbc688fefd467bfd6a4f4fa5004a9de9d48bd29680117effe14d1f7cd38afdd3ef4d66dce3eb400f34507ef1a2801aff769c3a5347facfc29deb400526052d472286650ca5970ce02f5cae31fce8d7a00d9397440a70436edbc123b73e95f3b7ed25fb5043f0ee7b9d03c2cc9a878a14059ee54ef5b2046396ecc319c7b8aaffb4ffed2d1f81d2f7c2be14be5b8f10101750be8ff00e5d030cf963fdac60ffc0857c1bad5fcda85dbcd33333cad9667fbc4f727debd3c3d073d67b05ec5cf11f892e35abebcd46f6f5b50be91cbcd72cdbb7b7723dabcfb51ba7b891a4f5ad1d6e725d624e8b5837121f9b3d735ebd38461a239652b8d666209f3361030c7d10900fe7915df5b6b2965f0d745d2236ff4992faeafee07fcf33858427fdf30a9ff008157036f035cb803ee9e1be95af205c2a2fdd41b456ad5d102bb077670bb4741ef4d0be61dde9c53664f2c0f71496ebb909f7ad630b2b81296dbc51e67ca6a3906ce6aab4ccd9c74a4f625ec3a79baad56487ce902afde638a84966dc7a956ce2bd63e02fc3cff00848f57bcd6750863934ed3a3f312d8f2d34ec19538f41baa9bb42e64dd95cc3f06e9ce6f61584b23ab10587f2af72d32c6e6d7c29a934933da2340c91cdeb23718fcb15e89a6fc24d17fb2f40d3af744825be855555ed4796e71d411edcf35d778dfc19a6685a7697f604312cc2591949c983604d84fd5b70af2eb4f43a68caeec781f86be1fc32086c265123dbc6ab2b3f567fbd9fc88af54f044177e02d5e3d434706da55458e61ff2ce44c9c0fae73577c3fe19974eb39a592dd9166919f8f53c9fd73f9d729f18bc769f0efc2ad3444beb7780db69e87f84ff0019fc88ae58fef1f29d13d8c6fdaeff006935f1be99078274392482d63612788258faeee76c43db807fe055f2c006593611b481d0f51e99fc3150492b4f33c85f7972589f53939fd734f4e86bdba54b96173865b8b2a6ce2a0a7cabfc554e493f79f856b1dc48b35241bb70f2fefe7f4aa88dbaa6ee289ec32d5f7ee6f2de48f6fce8c8d9f51cff005157c4dbe30c71bc81d3d3154661ff0012c77ff9e7221fccd441f11aff00bc7f9d54760469318c9fc39aa52300c71d2abccdfbdcfb50f2ef8f154316493e6fc3fc69623baa031d0094523761680341137026a58a3ac94bc4843f39e334ababaaa07db951c54bd8996c6e34eb6a016e839ae7659dae679a46eedc7d2a4bcd4fed4238e31853c9fad54c112107ad662fb04c6a5b7fb8df5aaefdaacc1f70fd6a65b1a43624a28a2b128962fba7eb4faaf52c5f74fd6ae1b80fa556da2928ab96c02f99f35293b987d2915b68a09c9ac4077f1fe1599e236c7877551ff4eb2ffe806b42b3fc44ca3c3baa83d7ecb2ff00e8069a13d8fdbc4ef52ff1fe14cee2a55ea6be4e3b9dc463bd31fad4a7ef8fad36e3fd61aa7b0115491fdd34c09ba8dbb6a63b813c7de8ee6a38bbd4cddaac06d28e9f8d25393ad004a7b7d2929a7ef0fa538d27b00d3f7a83f787d283f7a9c6a63b801a28a2a9ec034fdea77cbbff00dac5148132eb8dc09e33daa63b811b990f04020125779d89bbb166f41d715f28fed01fb615ae9126a5e18f87f22de6a48be4cfae63115bb12448b1fa9f7f7abbfb717c727f056831f82b41bc316b7ac424dddc27fcbb5a92ca0ffc0d95d7f0af83be4b4631c60c4a800580ff00cb2e3eefe272dff02af4f0f454a37617b17f55d4c192695dde5b8762d24927de663c926b9a9e7774795fae703e9525dca6ea65ddd471597a83e2623dbfc6bd98284636472ca576579a5c863ef55253b88fa54a1b766a394b13b45691dc826b3b978d0c6ab95ce6b42dae1277f98618718aa50462dd32fd4d22c224638385ce73ef5606c32eda895f6822aac3793db8f9c79b10e8fe9ed4e9ae049f30e98a004bb93e6fc3fc6b3a63ba54353487735247134ae8117cd6ce045ea4f02a65b12f63a3f00f82e7f196af2ab844d22c765cdf4cfda204960bee768afacbe0cf84ed60fb3bd8c0b1da8669e181fa02ff003479f7c1cfe22b9bf87ff051b46f8592586e2faaeb2126b864fbd12ff0a7d3827f1af5bf861a25de89a75959c880c8d0c8323aefca85cfbf15c13a97f74e6ea7a2787fc3db6ee273991623bde63d1fd48f6ce47e150f8c552f434436bb4f26d527fba3fc9aea9a08f49d3d2143b26989dc3df3cfeb9ae78c7f6ab879641be4c32c67d1b8ae59ec063ea5a8d9786bc3f75a86a2c22b0b1b7696723b63a7e678afcfdf8abf116efe29f8d6f35a9ff716e408ad61feec23257f524fe35ec3fb617c5dfed5d493c0da5c864b2b7db71a914fbcf3ae76a7d00c1ff8157ce01179d8c1d3a861d4e7939f7c935dd84a768731d31d856701801d852f99f3fe14e8d7682291d994f1d2bb41ec464ee03fdea81fefb55862580cf5cd40df7da8263b844db7f8734f793e61c62ab47feb1aa556dac45013d8dbb39a29ad0da4bf7253f31feefa1fceb16ee5fecfb830c8fe63c7c16f5eb4f327cebf36de28d534efb4db25d23ef78ce197fd9f5fd4d54771c7e12b3eaa1c71d2a0fb732e76b301ed5035b7984b6edc0f4f6f6a416db2b40256bd949eae45279ecfc8cfe3488aac0e7a8a9628c6d38e952f61a22f31e954bb1e7a54de5fd68f2feb59943e3c6d38a753123e0d382ede2801ebd0d397a1a6af434868024a923fba6a18fee9a9a3fba6a65b00ea8caaf9b93d7152546fd6a21b808cc189c74ab16df70fd6ab5491fdd3572d80964fbdf87f8d3a2fba7eb50efdb4799f4ac40b3597e256c681a98ffa7597ff0041356c36eacff10b6340d4c6e61fe8b2f03a7dc34d09ec7ee57f12fd6a61d5beb50ff154cbd2be58ee16ab5c7df1f4a95fad4127defc3fc680163fba69afd69b40fbd400e4ef529a62fdf1f4a9077a0045e869693f8a9cdf787d2801523dc777a5483eff00e148bd285fbff85000bfc5f5a5a60fbe69e68015578269a5b74bf852d14001fbcbf5acef146bf63e14d1752d6f5293cbd3f4fb792e2e5bd154647e66b457ef719ce4060bd4af71f4af91ff006f5f8c9f62d2a2f87ba7bafdb6f544bac3c5fc1065844a7df2a4fe22b4a70e79244bd8f8fbe24f8feffe297c40d63c5ba80db36a6fe6a47fdc8c7ca83fef900fe35ccdd33c01767de2334c45c6c2493213f393dc8e07e80523305959dfeea9f97eb5f48972c52391ee55b8210f3f788cd625cb3339cd4b77296b8918f56393551a4c127f0ad96c4bd81177b6d1f789031fdec9e07e75d5697e14b8b49dff00b4a2d8e83715f4e38fd2b53e11e856efa99d63501bed6ca457857fe9afff00ab15dc6b9a918741d775fb83fbc7c94f6dc48fe95ccea5fdd34478dea8c1ae9f68c28e05469d07d3fc6a111f94aa87ef05e7ea4e7fad4abf7456b1f84cfa9317545cb5549408dc94ea467f9d4bb9475eb4d621ce074a6515e29d18303d73cd7a07c15f082788fc6b677532ff00a258c892b9fef1c9c0ae10c04152a824619210f427803f9d7d5ff03fe1add780f57b1d2ee674babb92237d304e910755f93f0c67f1ace72e48dcce7b1f43697662d74f2cf1e24931b17d393815d0f812c4cb6e924f1aab445b6c9b72739391f9628d2a35be7662aa11308aa7d702ba995534eb48ed0a0595b8703b47d58ff2af364efa9ce8a37572679e478f7794176a6e18c8ff00f5e6bc77f689f8b89f07fc0cf3da307f11ea65adb4e8fba123e77fcbf957a8788b5db1d0749bfd5f549445a75942d34923fdd655edf52368afcd2f8b3f11aefe2cf8f352f125e831accc12d613d23807dc51edc93f8d6d4a8f33b81cb34924f752cf2b33cb33195ddbf8989e4fe79a4ce734d0a376474c629ab2633f5af55ae5d0ea8ec4a137519d9c544af9931ed4edbb49a0a1f8dfcd45246dbb8f4a77f09a88f53400d68ce793cd309d8715623fba6a39bad34673d86891bb74ad2b09dfcb68dbeebf15991fdeab3192391d6a98fec946fa16867656fc3e94b1fddabd72ad730127fd62723e95422259493d735028ee3e8a28a0d028a72aee14b8c500328a5349400e5e86976f7a65397a1a006eedd20a95fafe14da2800a04be5f14534d27b00f57de09a5a62cbe582290bef39a98ee0495247f74d431fdd35347f74d396c02efdb597e247ce87a97fd7ac9ffa09ad5accf11ffc80b52ffaf593ff00413511dc4f63f7451b703f5a0fdea6bb6e63488bf3135f28770f73b46ef6c55690601f7e69e5b7135149f7bf0ff1a06862b7514aabb4d34f43441de819653aafd69eff00eb0d45dc52b7dea092575f9734e46dcb51d491fdd3400ea42dda99274f97ef50b8cff3a0091176d3cd34fdd14a7ee2fd6800db9a6347f37e1527734dfe2a00e53e26f8d20f873e02f10788e6e174eb3924cffb4c309fa8afc90d675bd43c4baf5d6afa93efd4af9fcfb93fed1e9ff8eedafb6bfe0a27f101ec3c33a1783eda4c497eef7974bff4c5381fa86af87ac010824fe12c36fd302bd5c353b4398caa7c23ae77996351d5b8acfd5e4f98429fc3d7eb572f65f28993d4e2b9e9db12487fbc735e9c4e72bca4f9c73d47152d9d9b6a17b1dbaae4be07e66ab48492cc3ae315d2f832336773f6a7fbc071f4aa11dddbc1fd8f247a6a0c794801fad45f17b52fb2687a4e9ab26d791bed722ffb09c0fd58d269570f35e3dc7de6765dabfde233c7eb5cf7c568a5b3f185c584c7f79651450edfeee503e3ff001fac7a9a7d938c5431b956fbc0e0d4adfd2a07fbd49e632fca3a75aeb8ec4130fbd4f54fde06dd8c0a8a3ced3bbad0e40470371936fca05296c4bd8f4ff803e09b6f1afc41497524f3b47d2616bbb81ea4f083f315f66f8034630df6a7a8dc46a93c87807f85768da3f2c57947ecc1f0ece9fe078648901b9d524fb5cd70fd5c285091fe0431ff008157d45a5f8722d3ed24b68d51a420176ff9e8c7935e7d4a975ca73750f0d6988889713480ff001823f817f88fe3c0ab2ef26a37acd185324cd8da7f817a01f960fe353dddb0648ec03b2c390f2ecfba3d13f4cfe35e55fb49fc615f841e04924b673ff0936aa0dae9b147f7a3e30cff0097f2ae7e5e7d00f02fdb33e3236b1ac47e01d06ebcbd32c8e753787ef4b3e4e226ff0064000ffc0abe62046c2abb7cb4f954af423b91f8e689249669a59667124d2317771d5989e49f7ce6917a57af4972c2c5477113bd2efdb4b4559ac771036ea5a298cfb4e28341f4545bb7520fbd401351483a52d0035a82774813db3fce97776a6e7c9973ed419cf62cda20f3406fbbd2a96a1666d2e9ff00daf987ebfe15615f07ebcd457e736e3fdea0a86c5646dc0d3a9b1f43f5a750505397a1a6d397a1a005a69a7534d0025151bfdf3feed3d3ee0fa7f8d002d1451400514526cdd400f5e8696a30bb78a5a007d151efdb406dd4012550d7ff00e405a97fd7b49ffa0b55cfe135435b6c681a98ff00a7797ff413409ec7ee8eeed42aed6a77f154cbd2be3cee2b8ef42afef33ed4f9aa266e83da80091b7352277a02ed5fc69eff00792801dfc7f85353ef1a564dcc6855dacbf5a0054e87eb4e0fb69c7efb52a77fad00119dc0d3d7a1a4a4fe25fad003f3b3e6fc28031f8f34e6fbc69a7eed0034fde5fad2cd1798590fdd97319faed603ff0042347a7d2a1d42fbfb32da5bcdbff1ed0cb36eff00754b7fecb55157607e5efed99e3c8fc79fb437884c1ff1eba432e930ff00bb116cff00e3ccd5e5d126d8957df349afea23c41e2dd5355ddbbed77935d7fdf4ec7fad55d56e0a290bf79ebdda11b44e59199aacecd7476f4031fceb2e6258f3e952c8479981db83fad572a18484ff000f22bbbec904ba5e9eda95ec10a2e70d96fa5742b101ab1b68d70aa4559d234a9b49d13ed118f32f2eb122aff7517bfe79aef3c15f0a6eb54d62c2ca056325e3869a51e879c7eb594df2c5b172f3687a27c06f021d57501a9ea0bbb48b0dd230f59157781ff8e8af9bbc6bae1f1378a355d60b645f5dc9385fee82c401fa7eb5f64fc67d4ad3e147c1bb9d32cdc89a585ac707bb632c7f222be1b9768408830aa401f903fd6b9e84bda5e474547a728d6ff5869dfc4b518fbe6a74fbb5db1dcc071fbc6bb3f835f0fa5f89ff0011b48d0117303c9e74ff00eeaf3fd2b8a27e645ddb19b2aa7ea467f957dcff00b0ff00c3b1a1780b52f16dd47b6ebc40fe540deb023900ff00df41e95497245b339ec7bf787341b3d0ed608acc61621b07fba38fe60d6b23ca16e678a269dd0811461b197ec7f0e6996eee8f18493f7972c429fee81d4d4b11ff009e4aa2388b796c7f8b3805bf4fd2bc66ee9b328ee56d56f2c745d3ee6f2f242d676b13dc4ee4e77051927fefadc3f0afcccf8e1f15aefe30fc41d435d9a4dda7e045a7c7ff004c549c1fccb57b7fedc1f1964bfd413e1de8970c9676e164d4ee61fbccfcfeebf0014ffc0abe4eddbb381b40e003d7f1af4f0b4ed0e6358ee4b1125493d49e7da893eed117dd3f5a1864e2ba8d072fdd14c7eb49b3671f8d2500145148680168a6d393183eb401247f74d3aa3085bad0176951ef401253422492c4aefe5ae4fcdb734b22fcd9a49186417fb80554771118037151c81d0e319a8e49fcc429e86ab5ccfb9888feed32dd1d813ef54f6122e4672bf4a7542010dcd4a3a56650b4d34ea69a008d9f69c52a36e04d3a8a008dfef9ff00769e9f707d3fc6968a0028a28a0028a28a004dfb680dba968a00291b6ede7ad2d14000c638e954b5dff900ea5ff5ed27fe826aed50d7ff00e405a8ff00d7b49ffa09a04f63f74a85fbd49ff2d7f0a5f5af8f3b88dba9a6d39fad3680055fde67d0548adb99fe9518fbd5277140120fba3e949fc541a45eb4012f75fad2b7fac349dd7eb4adfeb0d002b26edbf5a728da587bd30fde1f4a71a00534c3f7a9ff00c3f8d237f050034fde1f4af2cfda8bc710fc3bf81de2cd5246fdf5cda1b2817fda6cff008d7aaa8cb30f7af8f7fe0a15acb3af827c381bf72f34ba8cabeea36a7ea4d694d5e4912f63e28d32d65d2ec80ba5db2aa877fa919feb5cfea1766e65772d804f1f4adad71d03b408bb44676fe23afeb9ae6db1e6e1bb1afa6853ba4723dc631c8ce73c574ff0efc0f2f8b75179251b74cb7c199ffbc7a85fe5f9d6568da25c78975cb3d2b4d567bbba93cb07b28ee6beb1f0bfc3f57b2b4f0f69ebb63b3409712af42dce7fa54cea7246c673d8e13e1ffc3497c4de239e411f97a75bc9e5c87e801c7e4457d63e1ff0e59785fc3b757602c11f93b7cd6ed127cdfd4d47e0df095ae990476109df0da80d205e8c4f4fe55e4ffb6e7c52ff008477c3b6be03d3a4dbab6aeab2dd469d16df2c00fcd5abcc71f68c717647ccff001dfe25c9f147c5f2dd22edd3ad03db5885e8ea720c9f8f23f0af36243720a95c000af7c0c7f4a9a560c15573e5a2854cfa0ffebe6ab8ef5ec525cb0b14a571026f91450cfba7c7a1c53d4632ff00dda647f392ff00de39a27b0cd9f07786a6f19f8bf4df0fc032352b858e61ff004cd4e4ff003afd4cf0c6996da2e8d63a75afee74db08d614f7007f8d7c35fb1f7848dcf8b2ebc4b3c7be1b11f66b76feecae064fe5b6bee1b2bef32458de5758ad977974ec70db9bfdeda8557dd8d70d7ab6763965b9ab24a4dc6eca2c937eee20bf7d221cbbfd0e71f85707fb407c5fb5f835e00b9d5102b6a776a6d34d83bf9a7ee9fc339fc6b6346d5217b1bff10ea3225ac12a79d83d61b400308c7fc04807df757e7b7c74f8b173f17fe215deaaeec9a4db17b6d2e391be48223c02a3fbc79fd2b2a54f9e571f4383d52f2e352d4ae2f2f2469aeee1ccb348dfc4e7ef7ebc7e15582f53e9c5123ef90b0042e0050cbb4800639fcb3f8d321fbadf5af59ae5d023b92ab6e069698bfeb3f0a78ef41ac770a4341a61a0d0751bb14ca2801f9cd393760eddd8ff006698bd0d3d13702680244ce0eece7de9d5182221ee6ac2200312f42370a0085b69187fb954ae67321d91ff00ab1535dcef2e513ee0a8a23f29f6a008bb7d2a783ee1fad3d7a1a5a0029a686fba6989d0fd6801d51bfdf5fad49450003ab7d68a28a00633ed38a546dc09a751401149f7bf0ff1a6558a2802bd4b17dd3f5a7d31fad003e8a6c7f74d3a800a28a8dfef9ff768024aa1afff00c80b51ff00af693ff4135793ee0fa7f8d51d7ffe405a8ffd7b49ff00a09a04f63f720b60d26734c56f9b34a87cccb7a1c57c79e88d93a8a9e2a88b3348a0724e401ef458012a921bcc643b59bd0fa7ea3f3a04593f787d29e7ee8a68fbc7e6dd5287dad41222fdd14aabfbccfb5398e6917ef7ddff00815003d479993f8526d2ad8ed4d4fbc7e6dd529a000e3b52ff000fe342a6e19db9f7a36ed3f7b750028e94d638a795c9a6918347401ab82c0edc90e983efbb3fd2bf3c3f6dff0014a5e7c6fb98c4bbce9ba65bd818ff00db3be6ff00dac2bf4035fd76d7c2fa1ea1adea0db74cd3a169ee7f00767eb9afc86f8b3e32b8f1df8eb57f10ccff003ea170d30ff77385fd00af47054f9fdf339fc27237b36e6663f78f5f63551e54552cedb140c33fa2f71f8f14eb890ee258e4d6b781348fedaf12419fbb07ef5be82bdb71e58dce63dbbf677f86f71a6d936a3711b7f6d6a28020ff009f2b7eeebee463f2afab344d1c787b4b02346695ce5647fbd2640018fbe0572df07341823d152fdd23dd71f32bb75d800e3f306bd3b49d29f509c5cce0ac04b4691aaf3b0e096cfa1db8fc2bcea93d0e696e43757561e00f0aea1aeea8de55a5844d7371fed363e41f98afcc8f1d78c6ff00e2078c754f116a326f9f5195a65ff6532428fc87eb5f4f7ede9f1450de69be02b49633161751d5a28db3861910c47dc6777fc0ebe3f5528cf1b72d1b6c2dea456d85a7a731bc7613f89beb4d6a79a63577942cadf262a4d3aca6bbb9b782d94b5ccb3247184fbcccc703f01c9a82719282bd93f664f0a43ad78c6fee6e23df1d8c092a9ff6b27fc2a273e457339ec7befc1cd3e0f066956ba1c518296abf3c83ac8e79663ef9e3f0af718225934d8e00a566d41d90baf58e250198fe38c5703e03d2e3d436bbc5fbe9246444f5e7e53f873573e2e7c4ed3fe12f84350d7fcecc96805969f27f7e539c9fcd88fc2b83e395ce73c6bf6c9f8c51c31c7e00d09fe61b64d49a2e8a8d96543ef8c1ff00810af934603b053f20e147a0a9efafaeb53bfb8bfbf7df7b75234d31ff0069989fe58a84ff004aeba71b6a754761b2fde1f4a6af434e3513fdf5fad6e512af434beb48bfc5f5a6bf5a0068e8ff005a6a743f5a75472500494d3f797eb502f435345f74fd680275fe2fad28fbd489feacfd69c103b807a62802445427e7fba0555b8ba6924c2fdd030296e67e0ac7d075aaeb9c8cf5a0076c27af5a9625daa7eb48bd29ebd0d002d1451400534d3a9a680128a8dfef8a7af4a005a28a2800a28a2800a8a4fbdf87f8d4b450057a962fba7eb4fa63f5a007d14d8fee9a750014530fdefc2953bfd6800dfb5b154fc4077685a8ff00d7b49ffa09abd59de20ff902ea3ff5ed27fe826813d8fdc44c6f5ddf769e73b9bd33c52ac3d4d397a9af8f3d118c4fd9df0b9c11cd2595b2d8adc2c63114b2798dfef1007f414ec65c8a921b691e66541c0405989c2af27a9ed4f710d19efebc54f1fdf1f4ff001a9238ed82a0f9eee4dd8013e55fe593fa55c48a7887cb670424f79300ff00e3e6a946e4b6541de8abcc267017c9b6b83dd536eeff00c74d45e5c1b9d5e396d24cf46f997f2ea3f5a39494cabfc55285e335235bbc2a09c3237dd753906a33f7aa6d62842dbaa4f4fa54536323d7152a676fcd48057eb50caa70ccac54aa97665ea36f4fc093529ac2f187892c3c1be1ed4b5fd4dfcbd3f4f80cd39fef019c0fce9a8f33b12f63e57ff82807c584b4d3ac7e1d5a1db2ddaa5e6afe5748e224ec53efb949ff00810af82a6918c92bb9cb31c93f4e07e805759f123c7ba8f8fbc5fab7886fe4f327d4a669c0feea67083fef903f3ae29e52d9cf5afa3a14b9617391ee45732706bd57f675d0c788fc4bf64f2f78761b8fb0c57933cabe6c61f210b6723af19afb3ff632f86cda37839bc4d7d138b9d50b7928fd4c008c1fcf753aaf960d81f46691a408e286154d96f128403e95b3aaeaf65e16d0b50d62e8e2cf4db692e273f87c9ff8f03525843b137e723a2fb0af9cff006e4f1f3683e05d3bc356b36cbad7672932fac4bce7f3cd7974a9f3c847c61e3af14ddf8dfc5fabf886f5f7dc6a5399c9f6e8bfa015823a52c855e40e8728c3e5fa0e3fa529af662b95d86252aaf56f4a4a4dfe5927dab625ec4007993b7b01fccd7d43fb2120b2f0d78f754d9f379b6d007fa06623ff001eaf9820c19fe66d8194b193fb8a0827f3e057d83fb38683e57c3ad334c9558ff6e4936ad7efda38b2d1edfc444bf9d6553e139e7b1ecbe159215d074dba8e26175710c9e4b768613c3c9fa30fc2be2ffda17e27afc47f199b4b395a5f0fe9c5ad2cd93eeca0ff00ad94fd7601ff0001af7bfda7be2da7837c1f1e83a6e20d5b58b608a8bff2ef69b4293f885af8d608842de5afdd50001ed8aca842cb98aa639995dd9d4615b0c0fa8c0c1fca8a4ecdf5a5aea3a02917fd67e148692801e7a9a633ed38a28a00696dc334917dd3f5a7d14005377ed6c53a8c64636e6801ea7cc2a3a73d696e65db95dfbfde924c40338c122ab924b293dcd0007ef0a784dc3346fdae45480ee140088bb411432a93cf5a6b7dff00c29e3a500220001dbd286fba69d4500449d0fd69d4d93ef7e1fe34c5ea68025a2a25fbcd4f4eff005a007514531fad003e8a6c7f74d3a800a633ed38a7d1400d46dc09a649f7bf0ff1a24fbdf87f8d32800a28a2800a962fba7eb515140162b3bc41ff00205d47febda4ff00d04d59aabacffc80352ffaf793ff00413409ec7ee9347d3e94dd9b79a783b30def8a7ac7bd987af35f1e770c82137123127644832efe83fc6ad0225552d982cd4fca83ef39fea7dfa0fd294c48b34566ce23553ba57271f37a7e038fae6ac08fe76b8dd0075c244a640420f5fc3f99cd6a91171865fb3828c4db03cf9317df239fbcddbfcf1512dcbcd214b7b64271d305cff87e943d83a13fbe89ddbe62e6519a75b593432acab3c2cca739f3075a35b8682beeb698c7756d1920f0c14ae47b63153c6eb3e1626f3147fcb09f9ffbe5bffd5f8d32e6096ee532493425c8009120e6a2166cbf2f9b0faffac146b7d034b12c78b7691a2cbc24e2585faafd7fa1ff00249e10815e33ba27fba4f51ec7dea70180590cd0f9e0e1b2e0875f7fe47d69a238d276b7565314d823073b1bb73ec78fa1a2d704ca27fd68fa53c77a4652ac548c107041a9111020f32758c374006e6fcbb7e35095cb217e086ec0e083d0fa0af8c3fe0a0df14d6ded34bf87f6ce7cd9556ff5468bee88cb3aa21f7cc64fe35f666a33d8d859cb777174b1dbdb234ec665d808519209e40edd6bf25fe3cea1aff8afc79abf8b354b57fb2ea539686ee1225b765c908ab2a128c76af40735dd83a3ed25cc6537ee9e6b793b3ccfe67fac53861e9e9fa62b26e9b338c7a7f535726b80acca79e320575be04f87326b8e977751b18de554863ec5bd7f515eefc11b1ce58f81bf0cee7e2778ded2c042cfa6dbb09ef4f668c1e07e60fe75fa31a6dadbe9767041691ac56b0a048917b28af3bf827f0dedfe1f786bec7044b14f732b4b3baf72401b7f203f3af517b6090ab01804640f4af26acaeec22cda4b2107cbc073f382ff00776af2ff008e315f9b9fb43fc41ff858ff001735ad46172fa7db37d8ec89ed12963c7b6f67afb17f693f88a7e1c7c29d4ae2dd986a9a97fa0d8e3fbe7eff00fe3a457e78b44d0feed8962a3bfa9e4fea4d746129d97300c1d5beb4b4515e88c2a29cfc856a4ce39a8679779fc2825ec3611e5ac85beeedebe9c8e6bec6f066a5a77c37f853e1fd46f76c6f7da5c7293dda1894339fc7207e15f1cb03e5c881724c6707d0e457affc74f1b9d565d33c3c87ce5b482013b7f7dbca5d89f81c9ff81562e3ceec66d5d58e27e2178f352f891e2dbcd7754dcb2cf858a36ff9670ffcb35ffbe483f8d60afc8377e1483b8ceec71bbd7d7f5cd2af435ac572ab1a46364394633efcd31173bbeb4ea6b7dd34ca1d9d9c519cd57f5a962fba7eb400fa866ebf854d504df7bf0a0020fb87eb52557a7c7fc3f5a009d5770a72218b32ff0000e3f1a74583bc1e99cd54b99cc8c123fb80f3f5a00496669a42cdf41f4a434846e27db8a9e01b50fd6801b17dd3f5a957a1a4351b3ed38a007b3ed38a66edcd4a8db8134d7ddbf8e98a009874a5a8d738e7ad1bf6d00494d34236e04d0680128a28a0028a298c9b8d003e8a6a2ed0453a800a28a2800a61fbdf853e8a0080fde3494f93ef7e1fe34ca0028a28a002aaeb3ff200d4bfebde4ffd04d5aaabacff00c80352ff00af793ff413409ec7ee8a7de3f5ab76481ef23dd8da3e66cfa0e4ff002aad9f2e4947fb5fd2ad5836e98ffb8fff00a09af918ee76bd8d4d15226b6b9bbb9dadfbce59c0e3fce6b46196c6e241e5f92cc4700019354206ff008924813a89067ebb87ff005aaddc89fceb779911624901263724e7903a81c64d764348a307ab6584b6b6949658e26c1c1f947069561b69725638d8038c851d6a1ba59229730903ed076367f84ff787e19fd2ad4712c11ac6830aa30056ab576b11d0a6f3e9e8ccac610ca704151c1a9a1fb2384d8b11f333b70a39c75aaf68d3813f951c6dfbe7e59c83f78fb1a74d93a85812006f9f201c8ceda94f4b8cb462b7575431c619b381b4738aa1abdbc5258f9b1041b1baa8ebce08fceaddc82750b3c7657cfe42a9cfff0020293fde3ffa32a65669a08ee8cabde67df8c798aafc7a91cfeb9a62db064ded2471e7a6e3c9fc064d3eebfd5dbe7af95ffb335316ce6b94558e45859981491db1800fce40ea78f4ae3b7333a3a1f3b7edabe2e1a57c3a3e15d3356b0835cf107eefcabb9bc8f3615c9c2b380b9ceeeac2bf3c659fc55f0e351dadf6dd1669906e439115caa92391f7254ebd7729c9f5af70fdb12ea5f8b1f19b509b44d534ad42d74edba6db5a25e2c539552eff00764dbb896761842c6bc14ebde24f0549269923dcd94322e65d3350837c4d939cb41282b9e0725735f41878da07348def09df695e2dd5d9b5af0a6952c088be75c5ab4d6a5c8e07c91b88c1eff2a00735f4b7c214b1d43581756de19b1b2b6b3cc51bccf24ec1b68e70edb3a11d54d7cfba0f88bc3b790a19bc36f673bc84b8d26fcc30b138e764892907e8c07b0afaf3e0b1d2ed3c3ab35ae9521632647dbaebce03e51d9153f5cd456d8c9ec7a05b4b35eb493dc399263f799bbff9f4a91a495044a87876fbbeac381f96e353ca649e33712905d801f2a851c0c0000e0700579a7c71f888bf0cfe186b7a996c5c4eab6d6bff005d1b20fe98ae0e5e77614773e4afdaafe231f881f13974ab29a4fecad13ccd3a075e9e7726693f10aabff01af15898ba9763f3b72c3d3d3f4c1fc696446604c873312cd27fbc5893fce9fb7681f4af760b96291a094515149f7bf0ff001aa0242bce7daaa30df213f854a9fc7f4a8426e22802c23144015b0f9f97eb953ffb2d59b9b96bcbbb8b873b9e691a46fa939aaa91fcb5222ed045003e3fbe7e9520ef4c55dc29765003c3ede299236ea318a6b7dd3400917dd3f5a19f69c5315f6e47bd0d273400349cd3776ea6b364d25004d1fdd34a519e3755ea703f5a8e24ddcd4e5843193fc5400cbcb816e7ca4fbc00cd57570e33dfbd36424ba93dcd48bb771cf5cd000bf7854cbd298d8cf1d2a48bee9fad00397a1a434bdea34eff005a00751451400515149f7bf0ff001a650058a2abd1401628a645f74fd6867da71400fa3f84d351b70269d400d4e87eb4ea28a0028a8e4a895770a00b3453211853f5a6c9f7bf0ff1a0096a293ef7e1fe34c5fbd4c3f797eb400fa295bef1a4a002a8eb9ff204d43febde4ffd04d5eaa3ae7fc81350ff00af793ff413409ec7eebeccb558b47105d4449c063b5bfdd3c1a8370e8df7680a57e9dabe413b1dc6ce9461582eacae2458b6b8c9dd8c9079c7e42b422168ae19af3ce0a7204930201f5c561b4bc437a40936b049518673c601fc47ea292ea4920978584c6ff3238853e61f975ae853e55b1972dd9d2c9716928426e23f91d5861c75e47f5a517f6d81fe9117fdf63d4d7396bf69bc7658a388e0649f2531fcaa2592e1ee042b14664ce36f9299fe557ed5ef62793ccdcf2acfcc775be64dc4b109380324d49bece48563376ac50e55cca3703f5fc6b12eda7b59da2748b3d8f929c8f5e94b3add5aaa34b146a1871fb94e3d8f1d6a79ed7d07cbe66ec2f690c9bcddac92118dcf20271e954755b8863b2fb3c122c859f90a771c649edef8ace8a59ae2508ab174c9630a61477278a95e442ed74102c716163c281b9bb74fccfe5439dd59028d9ea57bee2e0a673e5811fe2060feb9ae4fe27f8867f06fc37f12ebc9e521b7b192385ee264863dee0af2ee428edd4d74adcad7c8ff00f050cf1fcba7f853c3be10b79486d4ae0dcdc2ff00d324ce3f50d514a3cf3b152f84f8ce7f006bd793cad6d0da6a573ccb2c1a76a16f75312c72488e29198f51d056cf85f54d44782bc550dc42daddf695e57d9b43d523f3a28d03309b08df34640ee854fbd79d5ecbb7cd914e09f98115eb7f097c6bad48b6d25fbc3ae2a48b1aff00682979d1720fcb3022451ec1b1d78afa37eec2c713dccfd10f8535c0f38d2755d3622d1379da74eb2c393c101240180c8ef237d6bef0f04db68fa6e8d629616b75701615c1ba9020270392aa33ff008f5791cdf0cfe1d78e2df4fb7bbb0bcd22ef7bdf379056566909c6fddb94f4503a76eb5ef5a1dbe93a669f1dac7f6dbe8e3444566da99000ea72d5c339696337b05d4cf7523fca9133e32235daa07a01f857c0ff00b5f7c425f16f8facf43b593ceb1d096488a7fd37908ddff8ea257daff147c7569e07f0bebde2078846b656a52355ce03b0da3afe15f9677f7135ededc5ddcb6eb9b991a693eac49fe58a30d0b5e46d1d881991a67318c216240fa927fad48bd2923fba69d5e8c77288a4fbdf87f8d45fc7f854b27defc3fc6a2fe3fc2ac027936a6da8e3fbc9f5a74e3240a9eda2d9418af88993bfd6957fd67e1406dd9a4341b120ef41e8698bd0d397bd00357a1a46fba690747fad33f84d002a743f5a917a1aaea9b8135222ed045003cd44fbb7f1d315253420791416c0a009622101797a2f354e7c4d2ef1d08c8a92e262ecd1c677203c9f7a676fa5003a28f9a42bb49a4a962fba7eb401154b17dd3f5a7d1400d6e94917dd3f5a1fad343eda0024fbdf87f8d3a2fba7eb4a8db8134ea008a4fbdf87f8d329f27defc3fc6994006ec519cd0bf7a9077a005a962fba7eb445f74fd691fefafd68024a17effe14c6660c76f4a54924c1a0055fe2fad2d0096ebd68a0028a28a008a4fbdf87f8d32a492a255dc280168dd8a318a51f74d0026734522f434b400e4755041eb5575b60da0ea5b7a7d9e4ff00d04d58aa3ae7fc81350ffaf793ff00413409ec7ee986da98f7a9b3903e9516dda83eb4a57f780fb57c79dcb62c413181c9c065230ca7a30f4abb6e0468e5419ed09c91fc487fa1f7e86b391b7135661b97b76f918ab7b55276158b104734323cb65279848c1007ce07fba7fa66aa17782e4c98db203bb047435644b04a3f79198dbfbd174ffbe4ff00422a612bf54bfe318db286fe5822abe6672d8cdb899ee9f7b9dce78271d6b427fb45c84376c21451f286183f80ea7b7f8d3bce900f9afc01e91061fa6055632c1136e5469dfaee97819cfa0ff1a7b5f5296c3c61e2754cc3681be776fbce7b0f7fa76efeb4c9a612e1546d8d7855f4ff00ebd31a779f976ce3803a003d876a8d97e656f7a9721a43594b31fe2c8d810f42cc7683f864d7e647eda9e348fc59f1f3578e174960d1e38f4a8e54e8e232c49ffbe9987e15fa4de2cd5d343d0753d55fa59dacb27fe3b5f8e9e25d4c6b9addf6a83a5eccf38fc588fe95e8e0e9dbde267f09cfdf3ee771fed2ff005af66f81f64d34766c177001bf9d78a5f32ef01ba6dafa23e00058f48dedfeb427cbfeeff9cd77d4f84e47b1f41f86d7ed5abdc48e9feac247f9007fad7add844f0da48ec361fe03f80af34f02db6d8039eae7757a640824b208cd85621587fb3d4ff2ae26aeac64f63e57fdb73e20cd65e1ed23c230dc6db8d425fb65d9fef42b9c0fcc357c740a167318da84e40fad7a47ed1de3a3e3ff008bfad5fab66d6dd859dbff00d73427fa96af34df826bd4a31b46e6b1d8495b0df853339a991b70269b256c50d1f70fd69c1b6b2d44bd0d387dd3400aa9e64ccde9c53ff897eb4902a943bbae6a4c00a71d28014fde3494d4e87eb4bbf6d003d7a1a5a8c36ea5f9bf876e3fdaa0057dbb39eb9a6ae31f2f4a519fe2c67da8a0028a2a37fbe28009064e295d92d931ff002d1c63f0a7c38f372df75466ab4ae6495dbb11c50032346524af6eb52962dd6a27ff0054bf4a7afdd1400b4e57da08a45fbc29edda80137e78a7a2ed0688fee9a47eb400fa72f4351c7f74d3d76f3bbad0006929a98f9b6fad3a800a8a4fbdf87f8d127defc3fc69940051451400526edad4b45002939a922fba7eb5151401628aafbb146fa0095fad34fdd34cce68a00737f4a6d145001451450028fba69abd0d2d1400551d73fe409a87fd7bc9ff00a09abd5475cff9026a1ff5ef27fe826813d8fdd490618fd69fb3247d287197fc2948c15fad7c79dc3c7ca36d491aed06a11f7dbeb53a7defc280168a44ea7eb4f6fbe3e94132d86ff0d140fba7eb51c833c678a0a5b08ff7ff000a737dca69edc638a3a0fc68b5c0f0afdb4fc5efe17f819aa5adbb62f35a922b14fa025cff002afcc2bd72ad92dbb736efcf9fea6beedff828bdecc6c7c1369bc883cf964da3fbc571fd057c1f2a08d88049f9b3cd7bb868d95ce59142eff7b232fb0fe75f4d7c0c768b48b5847466c7e82be61bb1fe944fb0fe75f4b7c119ddb53d3612dfbb16eaf8f7c9ff000ae9a9f0999f55f862d4c70107a8aa9f16fc5f1f81be18f883597fbd05a3a47fef30c569e9249b765cf048af9f3f6ecd52e2d3c1ba1d844fb6daeaf4f9a31c9da0115c118f34ec07c6ac4b3b3b7df90f98df56e7fad21a2525a69189c92dfd292bd64acd218514a3ee9a6af435602d2aaee34953c1f70fd6801c8bb569d451400514514005472ff0fd69cdf74d313a1fad00247fc5f5a7d4527defc3fc6994012bf5a225667c2f53c546bf7854ebc296ef4010dd4dbb6c49fc2707eb51c64fcd9ec69acc5a424d483a500149f36ee3a52d2838a000e7bf5a4a334500152c5f74fd6a2a2802d2f43486ab51400f93ef7e1fe351ff00152d2afde140016c1a4ce69cfd7f0a6d0014514500145145001451450014514500145145001452838a4cd00145140383400d3f797eb4f6fbc695bad36800aa3ae7fc81350ffaf793ff0041357aa8eb9ff204d43febde4ffd04d027b1ffd9);

-- --------------------------------------------------------

--
-- Table structure for table `code_type`
--

CREATE TABLE `code_type` (
  `type_id` int(11) NOT NULL,
  `app_id` int(11) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `code_type`
--

INSERT INTO `code_type` (`type_id`, `app_id`, `language`, `short_code`, `description`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`) VALUES
(1001, 1, 'en', 'user_type', 'USER', 0, 0, '2022-11-29 14:44:17', '2022-11-29 14:44:17', '2022-11-29 14:44:17', '0000-00-00 00:00:00'),
(1002, 1, 'en', 'user_type', 'Admin', 0, 0, '2022-12-01 17:36:56', '2022-12-01 17:36:56', '2022-12-01 17:36:56', NULL),
(1003, 1, 'en', 'user_type', 'HR', 0, 0, '2022-12-01 17:36:56', '2022-12-01 17:36:56', '2022-12-01 17:36:56', NULL),
(2001, 1, 'en', 'service_type', 'Normal', 0, 0, '2022-11-29 14:44:17', '2022-11-29 14:44:17', '2022-11-29 14:44:17', '0000-00-00 00:00:00'),
(2002, 1, 'en', 'service_type', 'Emergency', 0, 0, '2022-11-29 14:44:17', '2022-11-29 14:44:17', '2022-11-29 14:44:17', '0000-00-00 00:00:00'),
(2003, 1, 'en', 'service_type', 'Budgetary', 0, 0, '2022-11-29 14:44:17', '2022-11-29 14:44:17', '2022-11-29 14:44:17', '0000-00-00 00:00:00'),
(2004, 1, 'en', 'service_type', 'Spare Part', NULL, NULL, '2022-12-06 12:09:16', '2022-12-06 12:09:16', '2022-12-06 12:09:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `name`, `phone`, `email`, `date`, `subject`) VALUES
(1, 'Shakeel Ahmad', '8578834971', 'shakeelahmad0291@gmail.com', '2022-03-26 05:59:33', 'grievance');

-- --------------------------------------------------------

--
-- Table structure for table `customer_remarks`
--

CREATE TABLE `customer_remarks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `rating` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_remarks`
--

INSERT INTO `customer_remarks` (`id`, `name`, `email`, `date`, `rating`, `remarks`, `action`) VALUES
(1, 'Shakeel Ahmad', 'shakeelahmad0291@gmail.com', '2022-03-21 05:47:24', '*****', 'Online shoppers today rely heavily on customer reviews when they are making a purchasing decision.', 'intagado'),
(2, 'Akil Raza', 'akilraza07860786@gmail.com', '2022-03-21 05:51:51', '****', 'Online shoppers today rely heavily on customer reviews when they are making a purchasing decision.', 'Intagado'),
(3, 'Vikash Kumar', 'vkr0407@gmail.com', '2022-03-21 05:54:06', '***', 'Online shoppers today rely heavily on customer reviews when they are making a purchasing decision.', 'Intagado'),
(5, 'Irshad Alam', 'irshadalam0291@gmailcom', '2022-03-21 06:20:15', '**', 'Online shoppers today rely heavily on customer reviews when they are making a purchasing decision.', 'Intagado'),
(6, 'Aftab Alam', 'aftabalam@gmail.com', '2022-03-21 06:25:40', '*', 'Online shoppers today rely heavily on customer reviews when they are making a purchasing decision.', 'Intagado');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `profile_pic` longtext DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `emergency_mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `basic` double DEFAULT NULL,
  `hra` double DEFAULT NULL,
  `allowance` double DEFAULT NULL,
  `other` double DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `modified_date` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `title`, `first_name`, `last_name`, `dob`, `gender`, `designation`, `profile_pic`, `joining_date`, `mobile`, `emergency_mobile`, `email`, `marital_status`, `salary`, `basic`, `hra`, `allowance`, `other`, `created_date`, `modified_date`, `created_by`, `modified_by`, `start_date`, `end_date`) VALUES
(1, 'gbjsd', 'asdf', 'sadf', '2022-10-10', 'male', 'dec', NULL, '1223-12-01', '1246935', '645646', '565658', 'maeeied', 12230, NULL, NULL, NULL, NULL, '2022-12-17 12:22:05', '2022-12-17 12:22:05', NULL, NULL, '2022-12-17 12:22:05', NULL),
(2, 'guygud', 'huijyh', 'hifd', '2023-02-02', 'female', 'jhd', NULL, '2010-05-03', '45789856', '45878965', 'wq@ghgdsj.com', 'kjk', 21000, NULL, NULL, NULL, NULL, '2022-12-17 12:22:05', '2022-12-17 12:22:05', NULL, NULL, '2022-12-17 12:22:05', NULL),
(3, 'dfdsf', 'gffgh', 'hghj', '1201-11-11', 'fgfh', 'hjgjh', NULL, '2020-02-02', '8956895689', '4578458745', '8787@gmail.com', 'no', 50000, NULL, NULL, NULL, NULL, '2022-12-17 12:22:05', '2022-12-17 12:22:05', NULL, NULL, '2022-12-17 12:22:05', NULL),
(37, 'Mr.', 'satish', 'singh', '2022-12-21', 'Male', 'Account', 'Bands Ring.jpg', '2022-12-30', '1111111111', '2222274524', '666@gmail.com', 'Single', 179.376, 12.12, 56.546, 65.56, 45.15, '2022-12-20 10:46:23', '2022-12-20 10:46:23', NULL, NULL, '2022-12-20 10:46:23', NULL),
(38, 'Mr.', 'ankit', 'singh', '2023-01-01', 'Male', 'Operation', '', '2022-12-29', '0000000000', '2222222222', 'sonuyadavbca777@gmail.com', 'Single', 3130737.12, 586548, 12.12, 2542152, 2025, '2022-12-20 11:43:04', '2022-12-20 11:43:04', NULL, NULL, '2022-12-20 11:43:04', NULL),
(39, 'Mr.', 'abhay', 'singh', '2023-01-02', 'Male', 'Logistics', 'wp6171067.jpg', '2022-12-24', '4578956111', '10101010', 'mdirshad0477@gmail.com', 'Single', 16419, 5878, 524, 4563, 5454, '2022-12-20 11:46:08', '2022-12-20 11:46:08', NULL, NULL, '2022-12-20 11:46:08', NULL),
(40, 'Mr.', 'satish', 'singh', '2023-01-03', 'Male', 'Account', '22.png', '2022-12-29', '12457889', '2222222222', '66@gmail.com', 'Single', 5543.8, 12.12, 12.12, 65.56, 5454, '2022-12-20 11:58:07', '2022-12-20 11:58:07', NULL, NULL, '2022-12-20 11:58:07', NULL),
(41, 'Mr.', 'ankit', 'singh', '2022-12-15', 'Male', 'Marketing', 'wp6171067.jpg', '2022-12-29', '3323012001', '2222274524', '666@gmail.com', 'Single', 3138.41, 577.2, 524, 12.21, 2025, '2022-12-20 17:45:01', '2022-12-20 17:45:01', NULL, NULL, '2022-12-20 17:45:01', NULL),
(42, NULL, 'abc', 'abc', '2022-12-21', 'FeMale', 'Marketing', 'Transparent-Logo1.jpg', '2022-12-30', '0000000000', '2222274524', 'sonuyadav777@gmail.com', 'Single', NULL, NULL, NULL, NULL, NULL, '2022-12-20 18:02:42', '2022-12-20 18:02:42', NULL, NULL, '2022-12-20 18:02:42', NULL),
(43, NULL, 'satish', 'abc', '2022-12-15', 'FeMale', 'HR', '5d7222a481a62.jpg', '2022-12-20', '119911122200', '2222274524', '60066@gmail.com', 'Single', 230068665626, NULL, NULL, NULL, NULL, '2022-12-21 11:12:55', '2022-12-21 11:12:55', NULL, NULL, '2022-12-21 11:12:55', NULL),
(44, 'Mrs.', 'John', 'Smith', '2022-12-21', 'FeMale', 'HR', 'ring.png', '2022-12-20', '1111111111', '2222274524', 'sonubca777@gmail.com', 'Single', 7998.54, 577.2, 56.546, 12.21, 2025, '2022-12-22 14:17:03', '2022-12-22 14:17:03', NULL, NULL, '2022-12-22 14:17:03', NULL),
(45, NULL, 'sonam', 'dala kothi', '2022-12-29', 'FeMale', 'HR', 'screencapture-app-zeplin-io-project-61e2b5c9dde5625ffa7011c3-screen-627a644203a7b014d950422d-2022-07-29-00_19_06.pdf', '2022-12-29', '865554', '4521332222', 'sonam@gmail.com', 'Married', 0, NULL, NULL, NULL, NULL, '2022-12-28 16:42:01', '2022-12-28 16:42:01', NULL, NULL, '2022-12-28 16:42:01', NULL),
(46, 'Mrs.', 'abc', 'abc', '2022-12-21', 'FeMale', 'HR', 'WhatsApp Image 2022-08-02 at 5.46.55 AM.jpeg', '2022-12-29', '3546965463', '4521332222', '66@gmail.com', 'Single', 654.3399, 12.12, 12.12, 65.56, 564.54, '2022-12-28 16:48:36', '2022-12-28 16:48:36', NULL, NULL, '2022-12-28 16:48:36', NULL),
(47, 'Mr.', 'satish', 'dala kothi', '2023-01-06', 'FeMale', 'Sales', '- Read Me.pdf', '2022-12-20', '1111111111', '4521332222', '404@gmail.com', '', 6031.2, 577.2, 0, 0, 5454, '2022-12-28 17:05:21', '2022-12-28 17:05:21', NULL, NULL, '2022-12-28 17:05:21', NULL),
(48, 'Mr.', 'ranajn', 'hatya', '2022-12-30', 'FeMale', 'Operation', 'corporate-business-email-signature-template-design-vector-40080299.jpg', '2022-12-24', '0000000000', '2222222222', 'sonuyadav777@gmail.com', 'Single', 72.88, 3, 12.12, 12.21, 45.55, '2022-12-29 10:45:30', '2022-12-29 10:45:30', NULL, NULL, '2022-12-29 10:45:30', NULL),
(49, 'Mr.', 'ankit', 'abc', '2022-12-15', 'FeMale', 'HR', 'hero-bg-3.jpg', '2022-12-30', '12457889', '2222222222', 'sonuyadav777@gmail.com', 'Married', 2000, 12.12, 12.12, 12.21, 564.54, '2022-12-29 10:47:18', '2022-12-29 10:47:18', NULL, NULL, '2022-12-29 10:47:18', NULL),
(50, 'Mr', 'hgjhkhjkjl', 'kjhkljl', '2022-12-29', 'Male', 'Operation', 'Frame 4.png', '2022-12-22', '0000000001', '2222222222', '666@gmail.com', 'Single', 2670.956, 577.2, 56.546, 12.21, 2025, '2022-12-29 11:24:05', '2022-12-29 11:24:05', NULL, NULL, '2022-12-29 11:24:05', NULL),
(51, 'Mrs', 'ankit', 'dala kothi', '2022-12-29', 'FeMale', 'Admin', 'Transparent-Logo1.jpg', '2023-01-04', '3546965463', '2222274524', '666@gmail.com', 'Single', 42012, 0, 0, 0, 0, '2022-12-29 12:17:54', '2022-12-29 12:17:54', NULL, NULL, '2022-12-29 12:17:54', NULL),
(52, 'Miss', 'vishal', 'fgghjh', '2022-12-30', 'Male', 'HR', 'Transparent-Logo1.jpg', '2022-12-20', '3546965463', '2222274524', '111@gmail.com', 'Single', 754245, 0, 0, 0, 0, '2022-12-29 12:24:24', '2022-12-29 12:24:24', NULL, NULL, '2022-12-29 12:24:24', NULL),
(53, 'Mrs', 'ankit', 'abc', '2022-12-29', 'FeMale', 'Marketing', 'samar-ahmad--nKCbZlOHek-unsplash.jpg', '2022-12-29', '4444444444', '4521332222', '6644@gmail.com', '', 1001426, 12.12, 56.546, 12.21, 45.55, '2023-01-02 11:39:55', '2023-01-02 11:39:55', NULL, NULL, '2023-01-02 11:39:55', NULL),
(54, 'Mrs', 'abc', '', '2022-12-21', 'FeMale', 'Marketing', '[GetPaidStock.com]-62d276ca2fe28.jpg', '2022-12-24', '3546965463', '4521332222', 'mdirshad0477@gmail.com', 'Single', NULL, NULL, NULL, NULL, NULL, '2023-01-12 10:50:33', '2023-01-12 10:50:33', NULL, NULL, '2023-01-12 10:50:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsetller`
--

CREATE TABLE `newsetller` (
  `id` int(11) NOT NULL,
  `emailId` varchar(100) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsetller`
--

INSERT INTO `newsetller` (`id`, `emailId`, `date`) VALUES
(1, 'shakeelahmad0291@gmail.com', '2022-03-19 13:32:23'),
(2, 'akilraza07869786@gmail.com', '2022-03-19 13:34:28'),
(3, 'akilraza07869786@gmail.com', '2022-03-19 13:34:28'),
(4, 'vikashkumar@gmail.com', '2022-03-19 13:34:55'),
(5, 'armanali0423@gmail.com', '2022-03-21 13:52:26'),
(6, 'irshadali0291@gmail.com', '2022-03-21 13:53:21'),
(7, 'salmanali0231@gmail.com', '2022-03-21 13:53:53'),
(8, 'shakeelahmad0291@gmail.com', '2022-03-25 11:27:12'),
(9, 'shakeelahmad0291@gmail.com', '2022-03-25 13:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `order_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `pay_mode` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `total_order` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `modified_date` datetime DEFAULT current_timestamp(),
  `start_date` datetime DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `passport_details`
--

CREATE TABLE `passport_details` (
  `passport_details_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `visa` varchar(255) DEFAULT NULL,
  `insurance` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `modified_date` datetime DEFAULT current_timestamp(),
  `start_date` datetime DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL,
  `passport_number` int(11) DEFAULT NULL,
  `passport_expairy` date DEFAULT NULL,
  `visa_number` int(11) DEFAULT NULL,
  `visa_expairy` date DEFAULT NULL,
  `emirates_number` int(11) DEFAULT NULL,
  `emirates_expairy` date DEFAULT NULL,
  `insurance_expairy` date DEFAULT NULL,
  `probation_period` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passport_details`
--

INSERT INTO `passport_details` (`passport_details_id`, `user_id`, `passport`, `visa`, `insurance`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`, `passport_number`, `passport_expairy`, `visa_number`, `visa_expairy`, `emirates_number`, `emirates_expairy`, `insurance_expairy`, `probation_period`) VALUES
(1, 1, 'Perfect Herbal care. Affinity Diagrame', NULL, NULL, NULL, NULL, '2022-12-14 11:28:50', '2022-12-14 11:28:50', '2022-12-14 11:28:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Perfect Herbal care Distributor Pannel-A3', 'screencapture-app-zeplin-io-project-61e2b5c9dde5625ffa7011c3-screen-627a644203a7b014d950422d-2022-07-29-00_19_06', 'nothing', NULL, NULL, '2022-12-14 12:00:48', '2022-12-14 12:00:48', '2022-12-14 12:00:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, 'Distributor Pannel', 'HP_Agreement', 'HP_Agreement', NULL, NULL, '2022-12-14 14:10:05', '2022-12-14 14:10:05', '2022-12-14 14:10:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 37, 'nothing', 'screencapture-app-zeplin-io-project-61e2b5c9dde5625ffa7011c3-screen-627a644203a7b014d950422d-2022-07-29-00_19_06', 'Perfect Herbal Care Changes', NULL, NULL, '2022-12-20 10:46:23', '2022-12-20 10:46:23', '2022-12-20 10:46:23', NULL, 2147483647, '0000-00-00', 2147483647, '0000-00-00', 2147483647, '0000-00-00', '0000-00-00', 'Notice Period 30 Days from 28/12/2022  to 27/01/2023'),
(19, 38, '', '', '', NULL, NULL, '2022-12-20 11:43:04', '2022-12-20 11:43:04', '2022-12-20 11:43:04', NULL, 2147483647, '2022-12-22', 2147483647, '2022-10-20', 2147483647, '2020-12-12', '2022-12-23', '2'),
(20, 39, 'screencapture-app-zeplin-io-project-61e2b5c9dde5625ffa7011c3-screen-627a644203a7b014d950422d-2022-07-29-00_19_06', 'Perfect Herbal Care Changes', 'Perfect Herbal Care Changes', NULL, NULL, '2022-12-20 11:46:08', '2022-12-20 11:46:08', '2022-12-20 11:46:08', NULL, 2147483647, '2022-12-22', 2147483647, '2022-10-23', 2147483647, '2020-12-12', '2022-12-23', '3'),
(21, 40, '', '', '', NULL, NULL, '2022-12-20 11:58:07', '2022-12-20 11:58:07', '2022-12-20 11:58:07', NULL, 2147483647, '2022-12-22', 2147483647, '2023-01-20', 2147483647, '2020-12-12', '2022-12-23', '5'),
(22, 41, '- Read Me.pdf', 'Perfect Herbal care. Affinity Diagrame.pdf', 'Perfect Herbal care. Affinity Diagrame.pdf', NULL, NULL, '2022-12-20 17:45:01', '2022-12-20 17:45:01', '2022-12-20 17:45:01', NULL, 2100003647, '2023-02-01', 2141111647, '0000-00-00', 444483647, '0000-00-00', '0000-00-00', 'Resign 12/12/2022'),
(23, 42, 'Stageevent.de (final)', 'Perfect Herbal Care Changes', 'nothing', NULL, NULL, '2022-12-20 18:02:42', '2022-12-20 18:02:42', '2022-12-20 18:02:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 43, 'nothing.pdf', '- Read Me.pdf', 'Distributor Pannel  Dashboard work flow.pdf', NULL, NULL, '2022-12-21 11:12:55', '2022-12-21 11:12:55', '2022-12-21 11:12:55', NULL, 2147483647, '2022-01-15', 2147483647, '2020-11-26', 2147483647, '2025-10-25', '2029-11-24', 'Probation Period 30 Days from 28/12/2022  to 27/01/2023'),
(25, 44, 'Perfect Herbal care. Affinity Diagrame.pdf', '- Read Me.pdf', 'Perfect Herbal care. Affinity Diagrame.pdf', NULL, NULL, '2022-12-22 14:17:03', '2022-12-22 14:17:03', '2022-12-22 14:17:03', NULL, 123456789, '0000-00-00', 123456789, '2023-10-10', 123456789, '2025-11-17', '0000-00-00', 'Resign 12/29/2022'),
(26, 45, 'nothing.pdf', 'Perfect Herbal Care Changes.pdf', 'screencapture-app-zeplin-io-project-61e2b5c9dde5625ffa7011c3-screen-627a644203a7b014d950422d-2022-07-29-00_19_06.pdf', NULL, NULL, '2022-12-28 16:42:01', '2022-12-28 16:42:01', '2022-12-28 16:42:01', NULL, 1544149366, '0000-00-00', 0, '0000-00-00', 0, '2023-01-15', '0000-00-00', ''),
(27, 46, '- Read Me.pdf', '- Read Me.pdf', 'Perfect Herbal Care Distributor Pannel.1.pdf', NULL, NULL, '2022-12-28 16:48:37', '2022-12-28 16:48:37', '2022-12-28 16:48:37', NULL, 589859859, '2022-12-30', 787877878, '0000-00-00', 111144444, '2001-01-27', '2022-12-28', '2'),
(28, 47, '- Read Me.pdf', '- Read Me.pdf', '- Read Me.pdf', NULL, NULL, '2022-12-28 17:05:21', '2022-12-28 17:05:21', '2022-12-28 17:05:21', NULL, 111001, '0000-00-00', 111001, '0000-00-00', 111001, '2020-12-12', '2023-01-10', '1'),
(29, 48, '- Read Me.pdf', 'Stageevent.de (final 2).pdf', 'nothing.pdf', NULL, NULL, '2022-12-29 10:45:30', '2022-12-29 10:45:30', '2022-12-29 10:45:30', NULL, 2147483647, '2022-12-22', 2147483647, '0000-00-00', 2047483647, '2022-12-30', '2022-12-28', '3'),
(30, 49, 'Stageevent.de (final).pdf', 'Perfect Herbal Care Changes.pdf', 'screencapture-app-zeplin-io-project-61e2b5c9dde5625ffa7011c3-screen-627a644203a7b014d950422d-2022-07-29-00_19_06.pdf', NULL, NULL, '2022-12-29 10:47:18', '2022-12-29 10:47:18', '2022-12-29 10:47:18', NULL, 896568000, '2022-12-22', 11111, '2022-10-24', 111111000, '2022-12-31', '2022-12-25', '2'),
(31, 50, 'Perfect Herbal care. Affinity Diagrame.pdf', 'Perfect Herbal care. Affinity Diagrame.pdf', 'Perfect Herbal care. Affinity Diagrame.pdf', NULL, NULL, '2022-12-29 11:24:05', '2022-12-29 11:24:05', '2022-12-29 11:24:05', NULL, 11111111, '2048-12-11', 111111110, '2022-10-23', 40083647, '2001-01-27', '2022-12-28', 'Resign 12/01/2022'),
(32, 51, 'nothing.pdf', 'screencapture-app-zeplin-io-project-61e2b5c9dde5625ffa7011c3-screen-627a644203a7b014d950422d-2022-07-29-00_19_06.pdf', 'nothing.pdf', NULL, NULL, '2022-12-29 12:17:54', '2022-12-29 12:17:54', '2022-12-29 12:17:54', NULL, 2147483647, '2023-01-08', 1010101, '0000-00-00', 554445454, '0000-00-00', '0000-00-00', '1 Month'),
(33, 52, 'nothing.pdf', 'screencapture-app-zeplin-io-project-61e2b5c9dde5625ffa7011c3-screen-627a644203a7b014d950422d-2022-07-29-00_19_06.pdf', 'nothing.pdf', NULL, NULL, '2022-12-29 12:24:25', '2022-12-29 12:24:25', '2022-12-29 12:24:25', NULL, 14411441, '2023-04-18', 2147483647, '2023-01-22', 2147483647, '0000-00-00', '0000-00-00', '1 Month'),
(34, 53, 'nothing.pdf', 'screencapture-app-zeplin-io-project-61e2b5c9dde5625ffa7011c3-screen-627a644203a7b014d950422d-2022-07-29-00_19_06.pdf', 'Perfect Herbal Care Changes.pdf', NULL, NULL, '2023-01-02 11:39:56', '2023-01-02 11:39:56', '2023-01-02 11:39:56', NULL, 121212100, '2023-03-08', 201401477, '2022-12-23', 2112112, '0000-00-00', '2022-12-28', 'Resign 01/12/2023'),
(35, 54, 'nothing.pdf', 'screencapture-app-zeplin-io-project-61e2b5c9dde5625ffa7011c3-screen-627a644203a7b014d950422d-2022-07-29-00_19_06.pdf', 'screencapture-app-zeplin-io-project-61e2b5c9dde5625ffa7011c3-screen-627a644203a7b014d950422d-2022-07-29-00_19_06.pdf', NULL, NULL, '2023-01-12 10:50:33', '2023-01-12 10:50:33', '2023-01-12 10:50:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `register_details`
--

CREATE TABLE `register_details` (
  `register_details_id` int(11) NOT NULL,
  `person_name` varchar(255) DEFAULT NULL,
  `profile_pic` longtext DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `plant_name` varchar(255) DEFAULT NULL,
  `plant_location` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_details`
--

INSERT INTO `register_details` (`register_details_id`, `person_name`, `profile_pic`, `company_name`, `plant_name`, `plant_location`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`) VALUES
(1, 'satish', 'null', 'xaltam', 'xal', 'noida', 1, 1, '2022-12-06 06:15:28', '2022-12-06 06:15:28', '2022-12-06 06:15:28', NULL),
(2, 'amit', 'null', 'xal', 'xal', 'noida', 2, 2, '2022-12-06 06:16:03', '2022-12-06 06:16:03', '2022-12-06 06:16:03', NULL),
(3, 'deepak', 'null', 'xaltam', 'xal', 'noida', 3, 3, '2022-12-06 06:16:14', '2022-12-06 06:16:14', '2022-12-06 06:16:14', NULL),
(8, 'abhay', 'null', 'dex', 'dex', 'c block', 7, 7, '2022-12-09 05:34:35', '2022-12-09 05:34:35', '2022-12-09 05:34:35', NULL),
(9, 'xyz', 'null', 'xaltamtech', 'xaltam', 'noida', 8, 8, '2022-12-29 09:07:09', '2022-12-29 09:07:09', '2022-12-29 09:07:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `response_message`
--

CREATE TABLE `response_message` (
  `response_code` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `response_message` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response_message`
--

INSERT INTO `response_message` (`response_code`, `app_id`, `language`, `short_code`, `response_message`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`) VALUES
(200, 1, 'en ', 'sucess', 'SUCCESS', 0, 0, '2022-11-30 17:12:05', '2022-11-30 17:12:05', '2022-11-30 17:12:05', NULL),
(201, 1, 'en', 'created', 'RECORD_CREATED', 0, 0, '2022-11-30 17:16:11', '2022-11-30 17:16:11', '2022-11-30 17:16:11', NULL),
(202, 1, 'en', 'accepted', 'REQUEST_ACCEPTED', 0, 0, '2022-11-30 17:16:11', '2022-11-30 17:16:11', '2022-11-30 17:16:11', NULL),
(204, 1, 'en', 'no_content', 'NO_CONTENT', 0, 0, '2022-11-30 17:16:11', '2022-11-30 17:16:11', '2022-11-30 17:16:11', NULL),
(206, 1, 'en', 'partial_content', 'PARTIAL_CONTENT', 0, 0, '2022-11-30 17:16:11', '2022-11-30 17:16:11', '2022-11-30 17:16:11', NULL),
(400, 1, 'en ', 'bad_request', 'BAD REQUEST', 0, 0, '2022-11-30 17:12:05', '2022-11-30 17:12:05', '2022-11-30 17:12:05', NULL),
(401, 1, 'en  ', 'unauthorized', 'UNAUTHORIZED', 0, 0, '2022-11-30 17:12:05', '2022-11-30 17:12:05', '2022-11-30 17:12:05', NULL),
(403, 1, 'en', 'forbidden', 'FORBIDDEN', 0, 0, '2022-11-30 17:12:05', '2022-11-30 17:12:05', '2022-11-30 17:12:05', NULL),
(404, 1, 'en', 'page_not_found', 'PAGE NOT FOUND', 0, 0, '2022-11-30 17:12:05', '2022-11-30 17:12:05', '2022-11-30 17:12:05', NULL),
(405, 1, 'en', 'method_not_allowed', 'METHOD_NOT_ALLOWED', 0, 0, '2022-11-30 17:12:05', '2022-11-30 17:12:05', '2022-11-30 17:12:05', NULL),
(409, 1, 'en', 'conflict', 'CONFLICT', 0, 0, '2022-11-30 17:12:05', '2022-11-30 17:12:05', '2022-11-30 17:12:05', NULL),
(500, 1, 'en', 'server_error', 'INTERNAL_SERVER_ERROR', 0, 0, '2022-11-30 17:12:05', '2022-11-30 17:12:05', '2022-11-30 17:12:05', NULL),
(10001, 1, 'en', 'mobile_verification', 'Mobile Already Exist', 0, 0, '2022-11-29 14:47:45', '2022-11-29 14:47:45', '2022-11-29 14:47:45', '0000-00-00 00:00:00'),
(10002, 1, 'en', 'email_verification', 'Email Already Exist', 0, 0, '2022-11-29 14:47:45', '2022-11-29 14:47:45', '2022-11-29 14:47:45', '0000-00-00 00:00:00'),
(10003, 1, 'en', 'mobile_match', 'Mobile Does Not Matched', 0, 0, '2022-11-30 15:57:03', '2022-11-30 15:57:03', '2022-11-30 15:57:03', NULL),
(10004, 1, 'en', 'email_match', 'Email Does Not Matched', 0, 0, '2022-11-30 15:57:03', '2022-11-30 15:57:03', '2022-11-30 15:57:03', NULL),
(10005, 1, 'en', 'password_match', 'Password Does Not Matched', 0, 0, '2022-11-30 16:03:13', '2022-11-30 16:03:13', '2022-11-30 16:03:13', NULL),
(50001, 1, 'en ', 'success', 'SUCCESS', 0, 0, '2022-11-30 17:13:22', '2022-11-30 17:13:22', '2022-11-30 17:13:22', NULL),
(50002, 1, 'en', 'failed', 'FAILED', 0, 0, '2022-11-30 17:13:22', '2022-11-30 17:13:22', '2022-11-30 17:13:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `services_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `services_type_id` int(11) DEFAULT NULL,
  `services_type` varchar(255) DEFAULT NULL,
  `brands_name` varchar(255) DEFAULT NULL,
  `models_name` varchar(255) DEFAULT NULL,
  `oem_name` varchar(255) DEFAULT NULL,
  `part_name` varchar(255) DEFAULT NULL,
  `urgent` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `upload_document` longtext DEFAULT NULL,
  `upload_picture` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services_id`, `user_id`, `services_type_id`, `services_type`, `brands_name`, `models_name`, `oem_name`, `part_name`, `urgent`, `remark`, `upload_document`, `upload_picture`, `status`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`) VALUES
(1, 1, 2001, 'normal', 'top', 'middle', NULL, NULL, 'jhhds', 'hkjhh', '22.png', '22.png', 'Out of Stock', 1, 1, '2022-12-06 06:55:12', '2022-12-06 06:55:12', '2022-12-06 06:55:12', NULL),
(2, 2, 2002, 'emergency', 'top', 'middle', NULL, NULL, 'jhhds', 'hkjhh', 'null', 'null', 'Available', 1, 1, '2022-12-06 06:55:28', '2022-12-06 06:55:28', '2022-12-06 06:55:28', NULL),
(3, 3, 2003, 'budgetry', 'top', 'middle', NULL, NULL, 'jhhds', 'hkjhh', 'null', 'null', 'Delivered', 1, 1, '2022-12-06 06:55:45', '2022-12-06 06:55:45', '2022-12-06 06:55:45', NULL),
(4, 1, 2004, 'spare_part', 'new', 'imb', '', '', 'no', 'need', NULL, 'new.jpg', 'Available', 1, 1, '2022-12-13 18:21:46', '2022-12-13 18:21:46', '2022-12-13 18:21:46', NULL),
(7, 2, 2002, 'budgetry', 'abc', 'xyz', 'DEF', 'NUM', 'yes', 'AAAA', 'null', 'null', 'Cancelled', 2, 2, '2022-12-29 09:00:54', '2022-12-29 09:00:54', '2022-12-29 09:00:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spare_parts`
--

CREATE TABLE `spare_parts` (
  `spare_parts_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `services_type` varchar(255) DEFAULT NULL,
  `oem_name` varchar(255) DEFAULT NULL,
  `models_name` varchar(255) DEFAULT NULL,
  `part_name` varchar(255) DEFAULT NULL,
  `urgent` varchar(255) DEFAULT NULL,
  `upload_document` blob DEFAULT NULL,
  `upload_picture` blob DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spare_parts`
--

INSERT INTO `spare_parts` (`spare_parts_id`, `user_id`, `services_type`, `oem_name`, `models_name`, `part_name`, `urgent`, `upload_document`, `upload_picture`, `status`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`) VALUES
(1, 1, 'spare parts', 'fgfdh', 'gfhj', 'ghgj', 'ghghg', 0x6e756c6c, 0x6e756c6c, NULL, 3, 3, '2022-11-30 08:51:28', '2022-11-30 08:51:28', '2022-11-30 08:51:28', NULL),
(2, 2, 'spare parts', 'ghfgjljgd', 'hkjdjf', 'dhfkjf', 'hkjjc', 0x6e756c6c20, 0x6e756c6c, NULL, 2, 2, '2022-12-06 06:57:41', '2022-12-06 06:57:41', '2022-12-06 06:57:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `modified_date` datetime DEFAULT current_timestamp(),
  `start_date` datetime DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `mobile`, `email`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`) VALUES
(1, '7347704921', '73@gmil.com', NULL, NULL, '2022-12-06 06:15:28', '2022-12-06 06:15:28', '2022-12-06 06:15:28', NULL),
(2, '9999999999', '99@gmil.com', NULL, NULL, '2022-12-06 06:16:03', '2022-12-06 06:16:03', '2022-12-06 06:16:03', NULL),
(3, '9999999998', '98@gmil.com', NULL, NULL, '2022-12-06 06:16:14', '2022-12-06 06:16:14', '2022-12-06 06:16:14', NULL),
(4, '1111111111', '11@gmail.com', NULL, NULL, '2022-12-07 04:31:33', '2022-12-07 04:31:33', '2022-12-07 04:31:33', NULL),
(5, '7777777777', '77@gmail.com', NULL, NULL, '2022-12-07 04:32:59', '2022-12-07 04:32:59', '2022-12-07 04:32:59', NULL),
(6, '1234567890', 'Admin', NULL, NULL, '2022-12-07 04:36:45', '2022-12-07 04:36:45', '2022-12-07 04:36:45', NULL),
(7, '5555555555', '55@gmail.com', NULL, NULL, '2022-12-09 05:34:35', '2022-12-09 05:34:35', '2022-12-09 05:34:35', NULL),
(8, '8888888888', '88@gmail.com', NULL, NULL, '2022-12-29 09:07:09', '2022-12-29 09:07:09', '2022-12-29 09:07:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_details_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `profile_pic` longtext DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `modified_date` datetime DEFAULT current_timestamp(),
  `start_date` datetime DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_details_id`, `first_name`, `last_name`, `profile_pic`, `title`, `dob`, `designation`, `gender`, `marital_status`, `joining_date`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`) VALUES
(1, '66@gmail.com', 'prajapati', 'twitter.png', 'abcd', '0000-00-00', 'bd', 'm', 'no', '2023-11-22', 6, 6, '2022-12-07 04:36:45', '2022-12-07 04:36:45', '2022-12-07 04:36:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_leave`
--

CREATE TABLE `user_leave` (
  `user_leave_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `leave_type` varchar(255) DEFAULT NULL,
  `leave_status` varchar(255) DEFAULT 'Pending',
  `mobile` varchar(255) DEFAULT NULL,
  `bereavement` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `number_of_days` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `modified_date` datetime DEFAULT current_timestamp(),
  `start_date` datetime DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL,
  `action` varchar(45) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_leave`
--

INSERT INTO `user_leave` (`user_leave_id`, `user_id`, `type_id`, `leave_type`, `leave_status`, `mobile`, `bereavement`, `from_date`, `to_date`, `number_of_days`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`, `action`) VALUES
(1, 39, NULL, 'Maternity leave', 'Unpaid', '1111111111', 'rajat', '2022-12-15', '2022-12-17', 2, NULL, NULL, '2022-12-22 11:27:54', '2022-12-22 11:27:54', '2022-12-22 11:27:54', NULL, 'Rejected'),
(2, 38, NULL, 'Paternal leave', '50%/Half-Day', '4578956', 'jhkl,jhkl,jk', '2022-12-15', '2022-12-23', 8, NULL, NULL, '2022-12-22 11:28:29', '2022-12-22 11:28:29', '2022-12-22 11:28:29', NULL, 'Approved'),
(3, 2, NULL, 'Sick leave', 'Paid', '12457889', 'bjhj', '2022-12-17', '2022-12-24', 7, NULL, NULL, '2022-12-22 11:28:58', '2022-12-22 11:28:58', '2022-12-22 11:28:58', NULL, 'Approved'),
(4, 1, NULL, 'Casual Leave', '50%/Half-Day', '8521661109', 'jhkl,jhkl,jk', '2022-12-28', '2022-12-29', 1, NULL, NULL, '2022-12-28 16:44:17', '2022-12-28 16:44:17', '2022-12-28 16:44:17', NULL, 'Approved'),
(5, 3, NULL, 'Casual Leave', '50%/Half-Day', '4578956', '', '2022-12-29', '2022-12-31', 2, NULL, NULL, '2022-12-29 11:01:15', '2022-12-29 11:01:15', '2022-12-29 11:01:15', NULL, ''),
(6, 37, NULL, 'Casual Leave', '50%/Half-Day', '1111111111', 'jhkl,jhkl,jk', '2022-12-15', '2022-12-17', 2, NULL, NULL, '2022-12-29 11:10:35', '2022-12-29 11:10:35', '2022-12-29 11:10:35', NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_leave_xref`
--

CREATE TABLE `user_leave_xref` (
  `user_leave_xref_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `modified_date` datetime DEFAULT current_timestamp(),
  `start_date` datetime DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `user_order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_name` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_services_xref`
--

CREATE TABLE `user_services_xref` (
  `user_services_xref_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `services_id` int(11) DEFAULT NULL,
  `services_type_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_services_xref`
--

INSERT INTO `user_services_xref` (`user_services_xref_id`, `user_id`, `services_id`, `services_type_id`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`) VALUES
(1, 1, 1, 2001, 1, 1, '2022-12-06 06:55:12', '2022-12-06 06:55:12', '2022-12-06 06:55:12', NULL),
(2, 1, 2, 2002, 1, 1, '2022-12-06 06:55:28', '2022-12-06 06:55:28', '2022-12-06 06:55:28', NULL),
(3, 1, 3, 2003, 1, 1, '2022-12-06 06:55:45', '2022-12-06 06:55:45', '2022-12-06 06:55:45', NULL),
(4, 2, 2, 2004, 2, 2, '2022-12-06 06:57:41', '2022-12-06 06:57:41', '2022-12-06 06:57:41', NULL),
(5, 2, 7, 2002, 2, 2, '2022-12-29 09:00:54', '2022-12-29 09:00:54', '2022-12-29 09:00:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `user_session_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `token` int(11) DEFAULT NULL,
  `ip_address` double DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `device_model` varchar(255) DEFAULT NULL,
  `version` double DEFAULT NULL,
  `app_version` double DEFAULT NULL,
  `user_app_language` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `modified_date` datetime DEFAULT current_timestamp(),
  `start_date` datetime DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_session`
--

INSERT INTO `user_session` (`user_session_id`, `user_id`, `type_id`, `token`, `ip_address`, `os`, `device_id`, `device_type`, `device_model`, `version`, `app_version`, `user_app_language`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`) VALUES
(1, 3, 1001, 0, NULL, 'null', NULL, 'null', 'null', NULL, NULL, 'null', 3, 3, '2022-11-30 14:12:25', '2022-11-30 08:46:53', '2022-11-30 14:12:25', '2022-11-30 08:46:53'),
(2, 4, 1001, 0, NULL, 'null', 'null', 'null', 'null', NULL, NULL, 'null', 4, 4, '2022-11-30 14:16:28', '2022-11-30 14:16:28', '2022-11-30 14:16:28', NULL),
(3, 3, 1001, 0, NULL, 'null', 'null', 'null', 'null', NULL, NULL, 'null', 3, 3, '2022-11-30 14:16:53', '2022-11-30 14:16:53', '2022-11-30 14:16:53', NULL),
(4, 3, 1001, 0, NULL, 'null', NULL, 'null', 'null', NULL, NULL, 'null', 3, 3, '2022-11-30 15:51:03', '2022-11-30 15:51:03', '2022-11-30 15:51:03', NULL),
(5, NULL, 1001, 0, NULL, 'null', NULL, 'null', 'null', NULL, NULL, 'null', NULL, NULL, '2022-11-30 15:51:42', '2022-11-30 15:51:42', '2022-11-30 15:51:42', NULL),
(6, NULL, 1001, 0, NULL, 'null', NULL, 'null', 'null', NULL, NULL, 'null', NULL, NULL, '2022-11-30 15:54:55', '2022-11-30 15:54:55', '2022-11-30 15:54:55', NULL),
(7, 3, 1001, 0, NULL, 'null', NULL, 'null', 'null', NULL, NULL, 'null', 3, 3, '2022-11-30 16:03:21', '2022-11-30 16:03:21', '2022-11-30 16:03:21', NULL),
(8, 3, 1001, 0, NULL, 'null', NULL, 'null', 'null', NULL, NULL, 'null', 3, 3, '2022-11-30 16:03:38', '2022-11-30 16:03:38', '2022-11-30 16:03:38', NULL),
(9, 3, 1001, 0, NULL, 'null', NULL, 'null', 'null', NULL, NULL, 'null', 3, 3, '2022-11-30 16:04:59', '2022-11-30 16:04:59', '2022-11-30 16:04:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_xref`
--

CREATE TABLE `user_xref` (
  `user_xref_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pk_value` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `password_text` varchar(255) DEFAULT NULL,
  `confirm_password` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_xref`
--

INSERT INTO `user_xref` (`user_xref_id`, `user_id`, `pk_value`, `type_id`, `password_text`, `confirm_password`, `password_hash`, `status`, `created_by`, `modified_by`, `created_date`, `modified_date`, `start_date`, `end_date`) VALUES
(1, 1, 1, 1001, '123456', '123456', '123456', 'Active', 1, 1, '2022-12-06 06:15:28', '2022-12-06 06:15:28', '2022-12-06 06:15:28', NULL),
(2, 2, 2, 1001, '123456', '123456', '123456', 'Active', 2, 2, '2022-12-06 06:16:03', '2022-12-06 06:16:03', '2022-12-06 06:16:03', NULL),
(3, 3, 3, 1001, '123456', '123456', '123456', 'Active', 3, 3, '2022-12-06 06:16:14', '2022-12-06 06:16:14', '2022-12-06 06:16:14', NULL),
(4, 6, 1, 1002, 'Zuric@123$#%', 'Zuric@123$#%', '123456', 'inactive', 6, 6, '2022-12-07 04:36:45', '2022-12-07 04:36:45', '2022-12-07 04:36:45', NULL),
(5, 7, 8, 1001, '123456', '123456', '123456', 'Active', 7, 7, '2022-12-09 05:34:35', '2022-12-09 05:34:35', '2022-12-09 05:34:35', NULL),
(6, 8, 9, 1001, '123456', '123456', '123456', 'Inactive', 8, 8, '2022-12-29 09:07:09', '2022-12-29 09:07:09', '2022-12-29 09:07:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbanner`
--
ALTER TABLE `addbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `code_type`
--
ALTER TABLE `code_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_remarks`
--
ALTER TABLE `customer_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `newsetller`
--
ALTER TABLE `newsetller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `passport_details`
--
ALTER TABLE `passport_details`
  ADD PRIMARY KEY (`passport_details_id`);

--
-- Indexes for table `register_details`
--
ALTER TABLE `register_details`
  ADD PRIMARY KEY (`register_details_id`);

--
-- Indexes for table `response_message`
--
ALTER TABLE `response_message`
  ADD PRIMARY KEY (`response_code`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `spare_parts`
--
ALTER TABLE `spare_parts`
  ADD PRIMARY KEY (`spare_parts_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_details_id`);

--
-- Indexes for table `user_leave`
--
ALTER TABLE `user_leave`
  ADD PRIMARY KEY (`user_leave_id`);

--
-- Indexes for table `user_leave_xref`
--
ALTER TABLE `user_leave_xref`
  ADD PRIMARY KEY (`user_leave_xref_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`user_order_id`);

--
-- Indexes for table `user_services_xref`
--
ALTER TABLE `user_services_xref`
  ADD PRIMARY KEY (`user_services_xref_id`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`user_session_id`);

--
-- Indexes for table `user_xref`
--
ALTER TABLE `user_xref`
  ADD PRIMARY KEY (`user_xref_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbanner`
--
ALTER TABLE `addbanner`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `code_type`
--
ALTER TABLE `code_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2005;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_remarks`
--
ALTER TABLE `customer_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `newsetller`
--
ALTER TABLE `newsetller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passport_details`
--
ALTER TABLE `passport_details`
  MODIFY `passport_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `register_details`
--
ALTER TABLE `register_details`
  MODIFY `register_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `response_message`
--
ALTER TABLE `response_message`
  MODIFY `response_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50003;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `spare_parts`
--
ALTER TABLE `spare_parts`
  MODIFY `spare_parts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_leave`
--
ALTER TABLE `user_leave`
  MODIFY `user_leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_leave_xref`
--
ALTER TABLE `user_leave_xref`
  MODIFY `user_leave_xref_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `user_order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_services_xref`
--
ALTER TABLE `user_services_xref`
  MODIFY `user_services_xref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `user_session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_xref`
--
ALTER TABLE `user_xref`
  MODIFY `user_xref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
