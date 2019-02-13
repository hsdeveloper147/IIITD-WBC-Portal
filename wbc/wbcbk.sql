-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: wbc
-- ------------------------------------------------------
-- Server version	5.1.73

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `wbc`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `wbc` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `wbc`;

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application` (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `SID` int(11) NOT NULL,
  `aapply_date` varchar(100) NOT NULL,
  `concern` varchar(10000) NOT NULL,
  `preference` varchar(200) NOT NULL,
  `CID` varchar(100) NOT NULL,
  `astatus` int(11) NOT NULL DEFAULT '0',
  `aresolve_date` varchar(100) NOT NULL,
  `aprob_area` varchar(100) NOT NULL,
  `aprob_area_remark` varchar(10000) NOT NULL,
  `amedical_state_remark` varchar(10000) NOT NULL,
  `ahistory` varchar(10000) NOT NULL,
  `ainterventions` varchar(10000) NOT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counsellors`
--

DROP TABLE IF EXISTS `counsellors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `counsellors` (
  `CID` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cdegree` varchar(100) NOT NULL,
  `coffice_no` varchar(100) NOT NULL,
  `cmob_no` varchar(100) NOT NULL,
  `croom_no` varchar(100) NOT NULL,
  `cabout_us` varchar(1000) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counsellors`
--

LOCK TABLES `counsellors` WRITE;
/*!40000 ALTER TABLE `counsellors` DISABLE KEYS */;
INSERT INTO `counsellors` VALUES ('akshay@iiitd.ac.in','Akshay Kumar','PhD, University of Delhi','011-26907448','+91-9999801130','Room no. B-308-2(A), Academic Block','Senior Research Fellow Indian Council of Medical Research Consultant Psychologist at BLK Super Specialty Hospital and Artemis Hospital.\r\nFranchise owner of \"Men are from Mars Women are from Venus\" Asia pacific region.'),('amitapuri@iiitd.ac.in','Amita Puri','PhD (PGI, Chandigarh)','-','+91-9717458266','Room no. A-503-1, Academic building','Consultant Clinical Psychologist\r\n\r\nClinical AttachÃ©, Govt. Medical College, Chandigarh, Hypnotherapist from California Hypnosis Institute, Ex Counsellor, IIT Delhi, International Affiliate, American Psychological Association.\r\nWritten Two Books, Several Book Chapters and 50+ Research Publication\'s.'),('khushpinder@iiitd.ac.in','Khushpinder P. Sharma','Counselling Psychologist','011-26907484','+91-9815181252','Room no. A-206, Academic block','Besides being a Counseling Psychologist with diverse clientele ranging across all age groups, he has also partaken and conducted a multitude of Counseling Workshops.\r\n\r\nWith tremendous experience in counseling to his name since 2008, his contributions to human betterment, as the former Counseling Psychologist at Lovely Professional University,Punjab, Counseling Supervisor at ICTCs for GFATM, Counselor at Dept. of Education,Chandigarh Administration and as the Superintendent at CCWCD, Chandigarh, have been no less than exceptional.');
/*!40000 ALTER TABLE `counsellors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `semail` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `sage` varchar(100) NOT NULL,
  `sgender` varchar(100) NOT NULL,
  `sprogram` varchar(100) NOT NULL,
  `ssemester` varchar(100) NOT NULL,
  `stype` varchar(100) NOT NULL,
  PRIMARY KEY (`SID`,`semail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'anshul16010@iiitd.ac.in','Anshul Khantwal','24','Male','MTech CSE','4th','Day Scholar');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-30 18:58:16
