-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 19 oct. 2019 à 18:15
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wallu`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(10) NOT NULL,
  `adminname` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `usertype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `loginid`, `password`, `status`, `usertype`) VALUES
(1, 'administrateur', 'admin', '123456789', 'Active', ''),
(2, 'admin1', 'admin1', '123456789', 'Active', '');

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentid` int(10) NOT NULL,
  `appointmenttype` varchar(25) NOT NULL,
  `patientid` int(10) NOT NULL,
  `roomid` int(10) NOT NULL,
  `departmentid` int(10) NOT NULL,
  `appointmentdate` date NOT NULL,
  `appointmenttime` time NOT NULL,
  `doctorid` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `app_reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `appointment`
--

INSERT INTO `appointment` (`appointmentid`, `appointmenttype`, `patientid`, `roomid`, `departmentid`, `appointmentdate`, `appointmenttime`, `doctorid`, `status`, `app_reason`) VALUES
(1, '', 1, 0, 1, '2019-06-17', '03:00:00', 1, 'Approved', 'Fever'),
(2, '', 2, 0, 2, '2019-10-20', '11:07:00', 1, 'Approved', 'fievre'),
(3, '', 3, 0, 1, '2019-10-13', '08:00:00', 1, 'Active', 'maladie'),
(4, '', 4, 0, 2, '2019-10-13', '14:03:00', 2, 'Active', 'maladie fievre');

-- --------------------------------------------------------

--
-- Structure de la table `department`
--

CREATE TABLE `department` (
  `departmentid` int(10) NOT NULL,
  `departmentname` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `department`
--

INSERT INTO `department` (`departmentid`, `departmentname`, `description`, `status`) VALUES
(1, 'Medicine', 'Medicine', 'Active'),
(2, 'pediatrie', 'pÃ©diatrie', 'Active'),
(3, 'Dentiste', 'Dentiste', 'Active'),
(4, 'chirurgie', 'chirurgie', 'Active'),
(5, 'cardiologie', 'cardiologie', 'Active'),
(6, 'neurologie', 'neurologie', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `doctor`
--

CREATE TABLE `doctor` (
  `doctorid` int(10) NOT NULL,
  `doctorname` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `departmentid` int(10) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `doctor`
--

INSERT INTO `doctor` (`doctorid`, `doctorname`, `mobileno`, `departmentid`, `loginid`, `password`, `status`) VALUES
(1, 'Galaye', '221776137225', 1, 'med', '123456789', 'Active'),
(2, 'FATOU FAYE', '221776137225', 2, 'ped', '123456789', 'Active'),
(3, 'MATAR FAYE', '221776137225', 3, 'den', '123456789', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `doctor_timings`
--

CREATE TABLE `doctor_timings` (
  `doctor_timings_id` int(10) NOT NULL,
  `doctorid` int(10) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `available_day` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `doctor_timings`
--

INSERT INTO `doctor_timings` (`doctor_timings_id`, `doctorid`, `start_time`, `end_time`, `available_day`, `status`) VALUES
(17, 35, '09:30:00', '13:00:00', '', 'Active'),
(18, 36, '13:30:00', '17:00:00', '', 'Active'),
(19, 37, '14:00:00', '18:00:00', '', 'Active'),
(20, 38, '17:00:00', '21:00:00', '', 'Active'),
(21, 39, '13:00:00', '19:00:00', '', 'Active'),
(22, 40, '07:00:00', '11:00:00', '', 'Active'),
(23, 41, '13:30:00', '16:30:00', '', 'Active'),
(24, 42, '11:30:00', '14:30:00', '', 'Active'),
(25, 43, '12:30:00', '16:30:00', '', 'Active'),
(26, 44, '21:30:00', '12:30:00', '', 'Active'),
(27, 36, '01:03:00', '13:03:00', '', 'Active'),
(28, 61, '11:11:00', '19:07:00', '', 'Active'),
(29, 35, '11:11:00', '16:44:00', '', 'Active'),
(30, 35, '01:10:00', '16:11:00', '', 'Active'),
(31, 35, '01:02:00', '15:04:00', '2018-03-26', 'Active'),
(32, 35, '16:25:00', '01:00:00', '', 'Active'),
(33, 1, '18:00:00', '00:02:00', '', 'Active'),
(34, 1, '08:00:00', '08:15:00', '', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `medicine`
--

CREATE TABLE `medicine` (
  `medicineid` int(10) NOT NULL,
  `medicinename` varchar(25) NOT NULL,
  `medicinecost` float(10,2) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `medicine`
--

INSERT INTO `medicine` (`medicineid`, `medicinename`, `medicinecost`, `description`, `status`) VALUES
(1, 'Paracetamol', 3.00, 'For fever per day 1 pc', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(10) NOT NULL,
  `patientid` int(10) NOT NULL,
  `doctorid` int(10) NOT NULL,
  `prescriptionid` int(10) NOT NULL,
  `orderdate` date NOT NULL,
  `deliverydate` date NOT NULL,
  `address` text NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `cvv_no` varchar(5) NOT NULL,
  `expdate` date NOT NULL,
  `card_holder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `patientid` int(10) NOT NULL,
  `patientname` varchar(50) NOT NULL,
  `admissiondate` date NOT NULL,
  `admissiontime` time NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `city` varchar(25) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `loginid` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`patientid`, `patientname`, `admissiondate`, `admissiontime`, `address`, `mobileno`, `city`, `pincode`, `loginid`, `password`, `bloodgroup`, `gender`, `dob`, `status`) VALUES
(1, 'anta', '2019-06-15', '18:47:22', 'thies', '2125798361', 'mbour', '0000', 'galaye4444@gmail.com', '123456789', 'O+', 'MALE', '1990-01-01', 'Active'),
(2, 'ABDOU SALL', '2019-10-11', '21:55:02', 'DAKAR', '221776137225', 'DAKAR', '', 'admin', '', '', 'Male', '2019-10-10', 'Active'),
(3, 'ABDOU NGOM', '2019-10-11', '22:19:51', 'thies', '221776137225', 'mbour', '0000', 'pat1', '123456789', 'B-', 'MALE', '2019-10-11', 'Active'),
(4, 'sokhna ndiaye', '2019-10-12', '17:54:44', 'thies', '221776137225', 'mbour', '0000', 'pat2', '123456789', 'B+', 'MALE', '2019-10-09', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `prescription`
--

CREATE TABLE `prescription` (
  `prescriptionid` int(10) NOT NULL,
  `treatment_records_id` int(10) NOT NULL,
  `doctorid` int(10) NOT NULL,
  `patientid` int(10) NOT NULL,
  `delivery_type` varchar(10) NOT NULL COMMENT 'Delivered through appointment or online order',
  `delivery_id` int(10) NOT NULL COMMENT 'appointmentid or orderid',
  `prescriptiondate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `appointmentid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prescription`
--

INSERT INTO `prescription` (`prescriptionid`, `treatment_records_id`, `doctorid`, `patientid`, `delivery_type`, `delivery_id`, `prescriptiondate`, `status`, `appointmentid`) VALUES
(1, 0, 1, 1, '', 0, '2019-06-17', 'Active', 1);

-- --------------------------------------------------------

--
-- Structure de la table `prescription_records`
--

CREATE TABLE `prescription_records` (
  `prescription_record_id` int(10) NOT NULL,
  `prescription_id` int(10) NOT NULL,
  `medicine_name` varchar(25) NOT NULL,
  `cost` float(10,2) NOT NULL,
  `unit` int(10) NOT NULL,
  `dosage` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prescription_records`
--

INSERT INTO `prescription_records` (`prescription_record_id`, `prescription_id`, `medicine_name`, `cost`, `unit`, `dosage`, `status`) VALUES
(1, 1, '1', 3.00, 15, '1-1-1', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `roomid` int(10) NOT NULL,
  `roomtype` varchar(25) NOT NULL,
  `roomno` int(10) NOT NULL,
  `noofbeds` int(10) NOT NULL,
  `room_tariff` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`roomid`, `roomtype`, `roomno`, `noofbeds`, `room_tariff`, `status`) VALUES
(15, 'GENERAL WARD', 1, 20, 500.00, 'Active'),
(16, 'SPECIAL WARD', 2, 10, 100.00, 'Active'),
(17, 'GENERAL WARD', 2, 10, 500.00, 'Active'),
(18, 'GENERAL WARD', 121, 13, 150.00, 'Active'),
(19, 'GENERAL WARD', 850, 11, 500.00, 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `service_type`
--

CREATE TABLE `service_type` (
  `service_type_id` int(10) NOT NULL,
  `service_type` varchar(100) NOT NULL,
  `servicecharge` float(10,2) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service_type`
--

INSERT INTO `service_type` (`service_type_id`, `service_type`, `servicecharge`, `description`, `status`) VALUES
(10, 'X-ray', 250.00, 'To take fractured photo copy', 'Active'),
(11, 'Scanning', 450.00, 'To scan body from injury', 'Active'),
(12, 'MRI', 300.00, 'Regarding body scan', 'Active'),
(13, 'Blood Testing', 150.00, 'To detect the type of disease', 'Active'),
(14, 'Diagnosis', 210.00, 'To analyse the diagnosis', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `treatment`
--

CREATE TABLE `treatment` (
  `treatmentid` int(10) NOT NULL,
  `treatmenttype` varchar(25) NOT NULL,
  `treatment_cost` decimal(10,2) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `treatment`
--

INSERT INTO `treatment` (`treatmentid`, `treatmenttype`, `treatment_cost`, `note`, `status`) VALUES
(20, 'Blood test', '300.00', 'total IgE', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `treatment_records`
--

CREATE TABLE `treatment_records` (
  `treatment_records_id` int(10) NOT NULL,
  `treatmentid` int(10) NOT NULL,
  `appointmentid` int(10) NOT NULL,
  `patientid` int(10) NOT NULL,
  `doctorid` int(10) NOT NULL,
  `treatment_description` text NOT NULL,
  `uploads` varchar(100) NOT NULL,
  `treatment_date` date NOT NULL,
  `treatment_time` time NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `treatment_records`
--

INSERT INTO `treatment_records` (`treatment_records_id`, `treatmentid`, `appointmentid`, `patientid`, `doctorid`, `treatment_description`, `uploads`, `treatment_date`, `treatment_time`, `status`) VALUES
(1, 20, 1, 1, 1, 'Fever \r\ntake paracitamol', '1746614148', '2019-06-15', '17:00:00', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `loginname` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `patientname` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `createddateandtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`userid`, `loginname`, `password`, `patientname`, `mobileno`, `email`, `createddateandtime`) VALUES
(1, 'admin', 'admin', 'admin', '', '', '2017-12-14 11:21:45');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `adminname` (`adminname`);

--
-- Index pour la table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentid`);

--
-- Index pour la table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentid`);

--
-- Index pour la table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorid`);

--
-- Index pour la table `doctor_timings`
--
ALTER TABLE `doctor_timings`
  ADD PRIMARY KEY (`doctor_timings_id`);

--
-- Index pour la table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicineid`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientid`),
  ADD KEY `loginid` (`loginid`);

--
-- Index pour la table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescriptionid`);

--
-- Index pour la table `prescription_records`
--
ALTER TABLE `prescription_records`
  ADD PRIMARY KEY (`prescription_record_id`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomid`);

--
-- Index pour la table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`service_type_id`);

--
-- Index pour la table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treatmentid`);

--
-- Index pour la table `treatment_records`
--
ALTER TABLE `treatment_records`
  ADD PRIMARY KEY (`treatment_records_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `department`
--
ALTER TABLE `department`
  MODIFY `departmentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `doctor_timings`
--
ALTER TABLE `doctor_timings`
  MODIFY `doctor_timings_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicineid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescriptionid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `prescription_records`
--
ALTER TABLE `prescription_records`
  MODIFY `prescription_record_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `roomid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `service_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `treatmentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `treatment_records`
--
ALTER TABLE `treatment_records`
  MODIFY `treatment_records_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`doctorid`) REFERENCES `patient` (`patientid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
