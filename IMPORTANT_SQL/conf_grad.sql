-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 06:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conf_grad`
--

-- --------------------------------------------------------

--
-- Table structure for table `cfp`
--

CREATE TABLE `cfp` (
  `cfp_id` int(11) NOT NULL,
  `conf_id` int(11) NOT NULL,
  `cfp_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cfp`
--

INSERT INTO `cfp` (`cfp_id`, `conf_id`, `cfp_status`) VALUES
(10, 6, 1),
(14, 10, 1),
(15, 7, 1),
(16, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cfp_desc`
--

CREATE TABLE `cfp_desc` (
  `cfp_id` int(11) NOT NULL,
  `desc_key` varchar(255) NOT NULL,
  `desc_val` varchar(10000) DEFAULT NULL,
  `desc_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cfp_desc`
--

INSERT INTO `cfp_desc` (`cfp_id`, `desc_key`, `desc_val`, `desc_status`) VALUES
(10, 'About the Conference', 'The aim of ALENEX is to provide a forum for the presentation of original research in the design, implementation, and experimental evaluation of algorithms and data structures. Typical submissions will include an extensive experimental analysis of nontrivial algorithmic results, ideally bridging the gap between theory and practice. We also invite submissions that address methodological issues and standards in the experimental evaluation of algorithms and data structures.\r\n\r\n \r\n\r\nRelevant areas of applied algorithmic research include but are not limited to databases; geometry; graphs and networks, including web applications; operations research; combinatorial aspects of scientific computing; and computational problems in the natural sciences or engineering.\r\n\r\nAlso encouraged are submissions that address algorithms and data structures for advanced models of computing, including memory hierarchies and parallel computing, ranging from instruction parallelism over multicore computing to high-performance and cloud computing.\r\n\r\nProceedings will be posted online in January 2025. ALENEX is supported by SIAM.\r\n\r\nSince researchers in all fields are approaching the problem of learning detailed information about the performance of particular algorithms, we expect that interesting synergies will develop between the co-located conferences.\r\n\r\nThe following conferences will be held jointly:\r\n\r\nACM-SIAM Symposium on Discrete Algorithms (SODA)\r\n\r\nSIAM Symposium on Algorithm Engineering and Experiments (ALENEX)\r\n\r\nSIAM Symposium on Simplicity in Algorithms (SOSA)', 1),
(10, 'How to Participate', 'Format\r\n\r\nSubmissions must be PDF, formatted according to the double column macro posted here. (Note that there is also a single column macro, but ALENEX uses the double-column one.) Submissions must not exceed 10 pages, excluding front matter (title and abstract), references, and a clearly marked appendix (further described below).\r\n\r\n \r\n\r\nContent\r\n\r\nPapers should be submitted in the form of an extended abstract, which begins with the title of the paper as well as a short abstract. This should be followed by the main body of the paper that begins with a precise statement of the problem considered, a succinct summary of the results obtained (emphasizing the significance, novelty, and potential impact of the research), and a clear comparison with related work. The remainder of the extended abstract should provide sufficient details to allow the program committee to evaluate the validity, quality, and relevance of the contribution. Clarity of presentation is very important; the entire extended abstract should be written carefully, taking into consideration that it will be read and evaluated by both experts and non-experts, often under tight time constraints.', 1),
(10, 'Program Committee', 'Anne Benoit, ENS Lyon - LIP, France\r\n\r\nChristina Boucher, University of Florida, U.S.\r\n\r\nMaike Buchin, Ruhr Universität Bochum, Germany\r\n\r\nDavid Bunde, Knox College, U.S.\r\n\r\nDonatella Firmani, Sapienza University, Italy\r\n\r\nKasimir Gabert, Sandia National Laboratories, U.S.\r\n\r\nMahantesh Halappanavar, Pacific Northwest National Laboratory, U.S. \r\n\r\nStephen Kobourov, University of Arizona, U.S.\r\n\r\nJakub Łącki, Google Research, U.S.\r\n\r\nJohannes Langguth, Simula Research Laboratory, Norway\r\n\r\nRichard Peng, Carnegie Mellon University, U.S.         \r\n\r\nA. Erdem Sarıyüce, University at Buffalo, U.S.     \r\n\r\nChristian Schulz, Heidelberg University, Germany\r\n\r\nMartin P. Seybold, University of Vienna, Austria\r\n\r\nSivan Toledo, Tel Aviv University, Israel        \r\n\r\nChristos Zaroliagis, CTI and University of Patras, Greece', 1),
(10, 'Program Committee Co-chairs', 'Jonathan Berry, Sandia National Laboratories, U.S.\r\n\r\nKathrin Hanauer, University of Vienna, Austria', 1),
(10, 'Steering Committee', 'Paolo Ferragina, University of Pisa, Italy\r\n\r\nCynthia Phillips, Sandia National Laboratory, U.S.\r\n\r\nSolon Pissis, CWI, Netherlands\r\n\r\nAlex Pothen, Purdue University, U.S.\r\n\r\nJulian Shun, Massachusetts Institute of Technology, U.S.\r\n\r\nHelen Xu, Georgia Institute of Technology - Atlanta, U.S.', 1),
(10, 'Steering Committee Chair', 'Martin Farach-Colton, New York University, U.S.', 1),
(14, 'About', 'The second annual workshop on Learnersourcing: Student-generated Content @ Scale is taking place at Learning @ Scale 2024. This full day hybrid workshop will feature invited speakers, interactive activities, paper presentations, and discussions, as we delve into the fields opportunities and challenges. Attendees will engage in hands-on development of learnersourcing activities suited to their own courses or systems and gain access to various learnersourcing systems and datasets for exploration. This workshop aims to foster discussions on new types of learnersourcing activities, strategies for evaluating the quality of student-generated content, the integration of LLMs with the field, and approaches to scaling learnersourcing to produce valuable instructional and assessment materials.\r\n\r\nWe believe participants from a wide range of backgrounds and prior knowledge on learnersourcing can both benefit and contribute to this workshop, as learnersourcing draws on work from education, crowdsourcing, learning analytics, data mining, ML/NLP, and many more fields!  Additionally, as the learnersourcing process involves many stakeholders (students, instructors, researchers, instructional designers, etc.), multiple viewpoints can help to inform what future student-generated content might be useful, new and better ways to assess the quality of the content, and spark potential collaboration efforts between attendees. We ultimately want to show how everyone can make use of learnersourcing and have participants gain hands on experience using these tools, creating their own learnersourcing activities using them or their own platforms, and take part in discussing the next challenges and opportunities in the learnersourcing space. Our hope is to attract attendees interested in scaling the generation of instructional and assessment content and those interested in the use of online learning platforms. ', 1),
(14, 'Committees', '    Steven Moore, Carnegie Mellon University\r\n    Anjali Singh, University of Michigan \r\n    Xinyi Lu, University of Michigan \r\n    Hyoungwook Jin, Korea Advanced Institute of Science & Technology\r\n    Paul Denny, The University of Auckland\r\n    Hassan Khosravi, The University of Queensland\r\n    Chris Brooks, University of Michigan\r\n    Xu Wang, University of Michigan\r\n    Juho Kim, Korea Advanced Institute of Science & Technology\r\n    John Stamper, Carnegie Mellon University\r\n', 1),
(14, 'Contact', 'All questions about submissions should be emailed to stevenmo@andrew.cmu.edu', 1),
(14, 'List of Topics', 'Here are some questions and ideas applicants may want to considering addressing in their submissions:\r\n\r\n    Strategies for engaging and motivating student participation in learnersourcing activities\r\n\r\n    Exploration of innovative learnersourcing content formats\r\n\r\n    Methods for evaluating the quality of student-generated content\r\n\r\n    Incentivizing high-quality student contributions\r\n\r\n    Techniques for providing actionable feedback during the learnersourcing process\r\n\r\n    Approaches to enable collaboration and content sharing across institutions\r\n\r\n    Training students to develop high-quality resources\r\n\r\n    Exploring models of co-creating content\r\n\r\n    How LLMs can assist in the cold start problem for student-content creation\r\n\r\n    Leveraging LLMs to assist in the different stages (creation, evaluation, etc.) of the learnersourcing process\r\n', 1),
(14, 'Submission Guidelines', 'While no submission is required to participate in the workshop, we encourage submissions of various types as stated above. We expanded our submissions to include artifacts such as videos and commentary to express your perspectives on learnersourcing. However, the core submission format is a research, work-in-progression, or position paper, targeting roughly 3 to 5 pages.\r\n\r\n​​​​Research, Work-in-Progress, or Position paper [3 to 5 pages, double column, PDF format preferred, Templates: Latex, Word]\r\n\r\nCommentary on a past publication(s) [3 to 5 pages, PDF format preferred, Templates: Latex, Word]\r\n\r\nThe 3 to 5 page submissions will be curated into a learnersourcing proceedings that will be made available via a public proceedings. Submissions should contain mostly novel work, however there can be overlap between the submission and work submitted elsewhere (such as summaries, describing the process of the work, and focusing on the learnersourcing aspect). Each of the submissions will be reviewed by multiple members of the Program Committee.', 1),
(14, 'Venue', 'The conference will be held in Atlanta, Georgia at the Learning @ Scale 2024 conference.', 1),
(15, 'About', 'GCMM2024 is the 18th international conference in manufacturing and management which is venue at Rajamangala University of Technology Krungthep (RMUTK), Bangkok, Thailand. GCMM stands for Global Congress on Manufacturing and Management which is the forum where leading researchers and practitioners comes together and disseminate knowledge and views on advancement in manufacturing, management, engineering, technology, business, environment, and control. Sustainable development goals (SDGs) and growth are more concern in the Universities all over the world whereas this year is very special for 72nd anniversary of RMUTK and fortunately GCMM is cyclically back to venue in Bangkok again after 12-year times which was in venue in Bangkok in 2002 and 2012. In addition, the world has been changed in terms of digital transformation, smart manufacturing system and industry 4.0. Therefore, the GCMM 2024 organizes a special event with new popular topics for both presentation and contest among university students and open to industry gathered brilliant minds and visionaries to share knowledge and insights in the fields of research and innovation.  ', 1),
(15, 'Committees', 'Conference Chair\r\n\r\n    Assoc. Prof.Pichai Janmanee, President of RMUTK, Bangkok, Thailand\r\n\r\nOrganizing committee\r\n\r\n    Assoc. Prof.Suthep Butdee, RMUTK, Thailand\r\n    Asst. Prof.Phatchani Srikhumsuk, RMUTK, Thailand\r\n    Asst. Prof.Suppawat Chuvaree, RMUTK, Thailand\r\n    Asst. Prof.Kamonpong Jamkamon, RMUTK, Thailand\r\n', 1),
(15, 'Invited Speakers', '\r\n    Prof.Prasad KDV Yarlagadda, Dean (Faculty of Engineering) OAM, UniSQ, Australia\r\n    Prof.Andre D.L. Batako, Liverpool Johnmoors University, UK\r\n    Prof.M.Anthony Xavier, Dean (Academics), VIT, India\r\n    Prof.Anna Burduk, Wroclaw University of Science and Technology, Poland\r\n    Prof.Dr. José Machado, University of Minho, Portugal\r\n    Prof.Dr. Géza Husi, University of Debrecen, Hungary\r\n    Dr. Kitipong Promwong, The Office of National Higher Education Science Research and Innovation Policy Council (NXPO), Thailand\r\n    Prof.Dr. Tritos Laosirihongthong, Thammasat University, Thailand\r\n', 1),
(15, 'Submission Guidelines', 'All papers must be original and not simultaneously submitted to another journal or conference. The following paper categories are welcome:\r\n\r\n    Full papers\r\n\r\n    Authors are invited to submit manuscripts written in English. All contributions must be original, should not have been published elsewhere and should not be intended to be published elsewhere during the review period.\r\n\r\n    Acceptance is based on condition that at least one author will register and present the paper at the conference.\r\n', 1),
(16, 'About', 'Welcome to MCIS & CAPSI 2024, a joint conference: the 16th Mediterranean Conference on Information Systems (MCIS) and the 24th Conference of the Portuguese Association for Information Systems (CAPSI).\r\n\r\nThe joint conference will be held in Porto, Portugal, hosted by Porto Accounting and Business School, Polytechnic of Porto, from October 3rd to 5th, 2024.\r\n\r\nThe conference theme is Navigating Digital Landscapes: Bridging Technology, People, and Processes. MCIS & CAPSI 2024 aims to bring together contributions from the Information Systems (IS) community that explore a wide array of topics related to IS and its organisational and societal impacts.', 1),
(16, 'Committees', 'Conference Co-Chairs\r\n\r\n    Ilias Pappas (NTNU & UiA, Norway)\r\n    Paula Peres (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n    Agostinho Sousa Pinto (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n\r\nProgram Committee Co-Chairs\r\n\r\n    Elena Parmiggiani (NTNU, Norway)\r\n    Antoine Harfouche (University Paris Nanterre, France)\r\n    Cleopatra Bardaki (Harokopio University of Athens, Greece)\r\n    Luís Silva Rodrigues (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n\r\nGeneral Track Co-Chairs\r\n\r\n    Tiago Oliveira (NOVA IMS, Portugal)\r\n    Anabela Mesquita (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n\r\nPanels Co-Chairs\r\n\r\n    Alvaro Arenas (IE Business School, ES)\r\n    Ana Azevedo (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n\r\nDoctoral and Junior Faculty Consortium Co-Chairs\r\n\r\n    Andreja Pucihar (University of Maribor, Slovenia)\r\n    Nazim Taskin (Bogazici University, Turkey)\r\n\r\nCommunication Co-Chairs\r\n\r\n    Susana Pinto (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n    Ricardo Soares (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n\r\nOrganizing committee\r\n\r\n    Ana Azevedo (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n    Agostinho Sousa Pinto (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n    Rui Pereira (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n    Luís Rodrigues (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n    Alexandra Albuquerque (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n    Isabel Cristina Lopes (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n    Rui Bertuzi (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n    Eusébio Costa (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n    Paula Peres (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n    Anabela Mesquita (CEOS.PP, ISCAP, Polytechnic of Porto, Portugal)\r\n', 1),
(16, 'Submission Guidelines', 'MCIS #1 - General Track\r\n\r\nMCIS #2 - Digital Transformation for Social and Economic Development and Inclusion in Developing and Underexplored Contexts\r\n\r\nMCIS #3 - Strategic alignment for Information systems and logistics 5.0\r\n\r\nMCIS #4 -Innovation and Transparency: Challenges and Opportunities of Open Data and Participatory Governance Policies\r\n\r\nMCIS #5 - Intelligent Ambient Assisted Living Systems\r\n\r\nMCIS #6 - Digital Learning for Digital Inclusion\r\n\r\nMCIS #7 - Cybersecurity and digitalization of financial and payment services in the Era of Emerging Technologies\r\n\r\nMCIS #8 - Artificial Intelligence in Project Management\r\n\r\nMCIS #09 Unique Web3 Capabilities and Their Societal Applications\r\n\r\nMCIS #10 Acceptance, Interaction and Decision-Making Towards Human-Centric Information Systems\r\n\r\nMCIS #11 Data Analytics and Decision-Making\r\n\r\nMCIS #12 - Artificial Intelligence and Information Systems in institutions from different contexts\r\n\r\nCAPSI - All Tracks', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cfp_status`
--

CREATE TABLE `cfp_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cfp_status`
--

INSERT INTO `cfp_status` (`status_id`, `status_name`) VALUES
(0, 'CFP Inactive'),
(1, 'CFP Active');

-- --------------------------------------------------------

--
-- Table structure for table `cfp_topics`
--

CREATE TABLE `cfp_topics` (
  `topic_id` int(11) NOT NULL,
  `cfp_id` int(11) NOT NULL,
  `topic_name` varchar(200) DEFAULT NULL,
  `topic_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cfp_topics`
--

INSERT INTO `cfp_topics` (`topic_id`, `cfp_id`, `topic_name`, `topic_status`) VALUES
(32, 10, 'algorithm engineering', 1),
(43, 14, 'large language model', 1),
(44, 14, 'learnersouricng', 1),
(45, 14, 'content greantion', 1),
(46, 14, 'co creating', 1),
(47, 15, 'manufacturing', 1),
(48, 15, 'management', 1),
(49, 15, 'engineering', 1),
(50, 15, 'environment', 1),
(51, 16, 'information systems', 1),
(52, 16, 'digital transformation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chair_action`
--

CREATE TABLE `chair_action` (
  `action_id` int(11) NOT NULL,
  `action_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `conf_id` int(11) NOT NULL,
  `conf_name` varchar(255) DEFAULT NULL,
  `acronym` varchar(200) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `sub_deadline` date DEFAULT NULL,
  `sub_count` int(11) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `web_page` varchar(200) DEFAULT NULL,
  `primary_area` varchar(200) DEFAULT NULL,
  `sec_area` varchar(200) DEFAULT NULL,
  `area_note` varchar(2500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `contact_phone` varchar(200) DEFAULT NULL,
  `extra_info` varchar(3000) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `conf_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`conf_id`, `conf_name`, `acronym`, `start_date`, `end_date`, `sub_deadline`, `sub_count`, `country`, `city`, `web_page`, `primary_area`, `sec_area`, `area_note`, `user_id`, `contact_phone`, `extra_info`, `created_date`, `conf_status`) VALUES
(6, 'SIAM Symposium on Algorithm Engineering and Experiments', 'ALENEX25', '2025-01-12', '2025-01-17', '2024-07-05', 30, 'US', 'New Orleans, LA, ', 'https://sites.google.com/site/modevva/home', 'Algorithms', '', '', 1, '0778804242', '', '2024-05-27 16:24:48', 1),
(7, '18th Global Congress on Manufacturing and Management', 'GCMM 2024', '2024-12-04', '2024-12-10', '2024-08-31', 30, 'UK', 'Bangkok', 'https://sites.google.com/site/modevva/home', 'Manufacturing and Management', '', '', 1, '0778804242', '', '2024-05-27 16:24:49', 1),
(8, '16th Mediterranean Conference on Information Systems and 24th Conference of the Portuguese Association for Information Systems', 'MCIS & CAPSI 2024', '2024-10-03', '2024-10-10', '2024-06-04', 30, 'IN', 'Porto', 'https://capsi2024.apsi.pt/index.php/en/', 'Information Systems', '', '', 1, '0778804242', '', '2024-05-27 16:24:51', 1),
(9, 'IASS Annual Symposium 2024 - Redefining the Art of Structural Design', 'IASS 2024', '2024-08-26', '2024-08-30', '2024-01-21', 30, 'JO', 'Zurich', 'https://iass2024.org/web/', 'structural engineering', 'architecture', '', 1, '0778804242', '', '2024-05-27 16:45:55', 2),
(10, 'Learnersourcing: Student-Generated Content @ Scale', 'LSGCS2', '2024-07-18', '2024-07-22', '2024-06-01', 30, 'US', 'Atlanta, GA,', 'https://sites.google.com/andrew.cmu.edu/learnersourcing/home', 'language', 'content grenation', '', 1, '0778804242', '', '2024-05-27 16:24:54', 1),
(11, 'For A Morphology Of Concepts In The Democratic Lexicon – 1st PhD Students and Young Researchers Transdisciplinary Seminar', 'MORCON24', '2024-11-07', '2024-11-14', '2024-07-10', 30, 'EG', 'Rome', 'https://drive.google.com/file/d/18nmz2sOiI3W0cv0J3XIchstOKgm2wTP5/view?usp=drive_link', 'political theory', '', '', 1, '0778804242', '', '2024-05-27 18:16:54', 2);

-- --------------------------------------------------------

--
-- Table structure for table `conf_status`
--

CREATE TABLE `conf_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conf_status`
--

INSERT INTO `conf_status` (`status_id`, `status_name`) VALUES
(0, 'Conference Inactive'),
(1, 'Conference Active '),
(2, 'Conference Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `decr_status`
--

CREATE TABLE `decr_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decr_status`
--

INSERT INTO `decr_status` (`status_id`, `status_name`) VALUES
(0, 'Description Inactive'),
(1, 'Description Active');

-- --------------------------------------------------------

--
-- Table structure for table `invite_token`
--

CREATE TABLE `invite_token` (
  `token_id` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `conf_id` int(11) DEFAULT NULL,
  `track_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `token_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`) VALUES
(1, 'Organizer'),
(2, 'Super Chair'),
(3, 'Chair'),
(4, 'PC member'),
(5, 'Author'),
(10, 'Technical Admin');

-- --------------------------------------------------------

--
-- Table structure for table `sheets`
--

CREATE TABLE `sheets` (
  `sheet_id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `conf_id` int(11) DEFAULT NULL,
  `sheet_title` varchar(255) DEFAULT NULL,
  `sheet_abstract` varchar(2000) DEFAULT NULL,
  `sheet_file` varchar(255) DEFAULT NULL,
  `track_id` int(11) DEFAULT NULL,
  `sheet_status` int(11) DEFAULT NULL,
  `submitted_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sheets`
--

INSERT INTO `sheets` (`sheet_id`, `author_id`, `conf_id`, `sheet_title`, `sheet_abstract`, `sheet_file`, `track_id`, `sheet_status`, `submitted_date`) VALUES
(14, 29, 6, 'experimental evaluation of algorithms', 'In this study, we conduct an experimental evaluation of several algorithms to assess their performance across various computational tasks. The algorithms examined include both classical and contemporary methods, spanning domains such as sorting, searching, optimization, and machine learning. Our evaluation framework incorporates a comprehensive set of performance metrics, including time complexity, space complexity, scalability, and robustness. We employ a diverse suite of benchmark datasets and problem instances to ensure a thorough assessment. The experimental results highlight significant variations in algorithm efficiency depending on the context and specific use cases. We observe that while traditional algorithms exhibit consistent performance in well-defined scenarios, modern algorithms, particularly those leveraging machine learning, demonstrate superior adaptability and performance in complex and dynamic environments. This evaluation provides critical insights into the selection of appropriate algorithms for different computational problems and underscores the importance of contextual considerations in algorithm design and application. The findings serve as a valuable resource for researchers and practitioners aiming to optimize computational efficiency and effectiveness in various domains.', '../papers_file/6/629.pdf', 29, 1, '2024-05-29 14:58:07'),
(15, 30, 10, 'Learnersourcing', 'Learnersourcing, an innovative educational paradigm, leverages the collective intelligence and contributions of learners to enhance the learning experience and resource creation. This study explores the mechanisms, benefits, and challenges associated with learnersourcing in contemporary educational settings. By harnessing the input from students through activities such as generating questions, providing peer feedback, and creating content, learnersourcing transforms traditional passive learning into an interactive, participatory process. We analyze various case studies and implementations across diverse educational contexts to understand how learnersourcing can improve engagement, knowledge retention, and skill acquisition. Our findings indicate that learnersourcing not only fosters a deeper understanding of the material among participants but also creates a rich repository of educational resources that benefit subsequent learners. However, the approach also presents challenges, including ensuring the quality and accuracy of learner-generated content and managing the scalability of such initiatives. Despite these challenges, learnersourcing demonstrates significant potential as a scalable, effective strategy for enhancing both individual learning outcomes and the collective educational ecosystem. This research underscores the value of learnersourcing as a transformative tool in modern education, advocating for its broader adoption and further exploration.', '../papers_file/10/1030e.pdf', 42, 1, '2024-05-29 15:02:09'),
(16, 31, 10, 'Languages model', 'Language models, which are at the forefront of natural language processing (NLP), have revolutionized the way machines understand and generate human language. This study provides a comprehensive overview of the development, architecture, and applications of language models, with a particular focus on recent advancements in deep learning techniques. We examine the evolution from traditional statistical models to sophisticated neural network-based models, such as the Transformer architecture, which underpins state-of-the-art models like GPT, BERT, and their successors. The research highlights key performance metrics and benchmarks, illustrating the models capabilities in tasks such as text generation, translation, summarization, and sentiment analysis. We also explore the implications of large-scale pre-training and fine-tuning, which have significantly enhanced the versatility and accuracy of these models. Additionally, the study addresses challenges and ethical considerations, including bias, interpretability, and the environmental impact of training large models. Through extensive experimentation and analysis, we demonstrate the transformative potential of language models across various domains, from automated customer service to advanced research tools. This study aims to provide valuable insights into the current state and future directions of language modeling, emphasizing its critical role in advancing artificial intelligence and its applications in real-world scenarios.', '../papers_file/10/1031a.pdf', 42, 1, '2024-05-29 15:10:36'),
(17, 8, 8, 'Intelligent Ambient', 'Intelligent Ambient, also known as Ambient Intelligence (AmI), refers to environments embedded with smart technologies that are responsive to the presence and activities of individuals. This study explores the design, implementation, and implications of Intelligent Ambient systems, which integrate sensors, actuators, and artificial intelligence to create adaptive, context-aware spaces. We review the core components and technologies that enable these environments, including IoT devices, machine learning algorithms, and ubiquitous computing frameworks. Through a series of case studies and experimental setups, we evaluate the effectiveness of Intelligent Ambient systems in various applications such as smart homes, healthcare, and workplace efficiency. Our findings highlight the significant benefits of these systems, including enhanced user convenience, improved energy efficiency, and personalized user experiences. However, the study also identifies challenges related to privacy, security, and the complexity of integrating heterogeneous technologies. By addressing these challenges, the potential of Intelligent Ambient environments to transform daily life and improve quality of life is immense. This research provides a comprehensive understanding of Intelligent Ambient systems and offers insights into their future development and deployment, emphasizing their role in the evolution of smart, interconnected spaces.', '../papers_file/8/88Int.pdf', 34, 1, '2024-05-29 15:22:13'),
(18, 22, 7, 'Managment', 'Effective production management lies at the heart of a successful organizations ability to deliver goods and services. This abstract explores the core principles of this discipline, highlighting its role in transforming resources into desired outputs. It emphasizes the importance of achieving efficiency, quality, and timely production while navigating factors like cost control and meeting customer demands. The abstract briefly touches upon the various tools and techniques employed by production managers to optimize these processes.', '../papers_file/7/722Man.pdf', 46, 1, '2024-05-29 18:05:35'),
(19, 26, 7, 'Environmental Production', 'Environmental production delves into the practices that minimize the environmental impact of manufacturing goods.\r\n This abstract explores the integration of sustainability principles throughout the production process. It emphasizes reducing pollution, conserving resources, and minimizing waste generation. The abstract highlights how environmental production can contribute to a circular economy and explores methods for achieving this, such as using recycled materials and implementing energy-efficient technologies. It concludes by mentioning the potential benefits of environmental production, including cost reduction, brand reputation enhancement, and compliance with environmental regulations.', '../papers_file/7/726Env.pdf', 48, 1, '2024-05-29 18:08:10'),
(20, 27, 8, 'Digital Paper', 'Digital transformation has become a defining characteristic of successful businesses in the modern landscape.\r\n This abstract explores this ongoing process of integrating digital technologies across all facets of an organization. It emphasizes the transformation of not just technology infrastructure, but also business processes, products, and even company culture. The abstract highlights the key drivers of digital transformation, such as the need to meet evolving customer expectations and remain competitive. It briefly touches upon the potential benefits, including increased efficiency, improved customer experiences, and the creation of entirely new revenue streams. Finally, the abstract acknowledges the cultural shift often required for successful digital transformation, emphasizing the importance of continuous innovation and adaptation.', '../papers_file/8/827Dig.pdf', 31, 1, '2024-05-29 20:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `sheets_keywords`
--

CREATE TABLE `sheets_keywords` (
  `keyword_id` int(11) NOT NULL,
  `sheet_id` int(11) NOT NULL,
  `keyword` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sheets_keywords`
--

INSERT INTO `sheets_keywords` (`keyword_id`, `sheet_id`, `keyword`) VALUES
(16, 14, 'evaluation'),
(17, 14, 'algorithms'),
(18, 14, 'math'),
(19, 15, 'learnersourcing'),
(20, 15, 'education'),
(21, 15, 'language'),
(22, 16, 'Languages model'),
(23, 16, 'language'),
(24, 16, 'letters'),
(25, 17, 'Intelligent Ambient'),
(26, 17, 'Ambient'),
(27, 17, 'smart technologies'),
(28, 18, 'managment'),
(29, 18, 'production'),
(30, 18, 'managers'),
(31, 19, 'Environmental'),
(32, 19, 'manufacturing'),
(33, 19, 'economy'),
(34, 20, 'transformation'),
(35, 20, 'social development'),
(36, 20, 'inclusion in development');

-- --------------------------------------------------------

--
-- Table structure for table `sheet_authors`
--

CREATE TABLE `sheet_authors` (
  `generated_id` int(11) NOT NULL,
  `auth_fname` varchar(255) DEFAULT NULL,
  `auth_lname` varchar(255) DEFAULT NULL,
  `auth_email` varchar(255) DEFAULT NULL,
  `auth_country` varchar(255) DEFAULT NULL,
  `auth_aff` varchar(255) DEFAULT NULL,
  `auth_web` varchar(255) DEFAULT NULL,
  `sheet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sheet_authors`
--

INSERT INTO `sheet_authors` (`generated_id`, `auth_fname`, `auth_lname`, `auth_email`, `auth_country`, `auth_aff`, `auth_web`, `sheet_id`) VALUES
(23, 'rama', 'manaseer', 'rama@gmail.com', 'JO', '', '', 14),
(24, 'abeer', 'maqableh', 'abeer@gmail.com', 'United States', '', '', 14),
(25, 'abeer', 'maqableh', 'abeer@gmail.com', 'JO', '', '', 15),
(26, 'faris', 'jamal', 'faris@gmail.com', 'United States', '', '', 15),
(27, 'feras', 'abdullah', 'feras@gmail.com', 'JO', '', '', 16),
(28, 'ahmad', 'aziz', 'ahmad@gmail.com', 'JO', '', '', 17),
(29, 'abdullah', 'ghazi', 'abdullah@gmail.com', 'United States', '', '', 17),
(30, 'muna', 'zu', 'muna@gmail.com', 'JO', '', '', 18),
(31, 'lara', 'll', 'lara@gmail.com', 'United States', '', '', 18),
(32, 'kazem', 'Kaa', 'kazem@gmail.com', 'EG', '', '', 19),
(33, 'nazem', 'kaa', 'nazem@gmail.com', 'EG', '', '', 20);

-- --------------------------------------------------------

--
-- Table structure for table `sheet_result`
--

CREATE TABLE `sheet_result` (
  `sheet_id` int(11) NOT NULL,
  `chair_id` int(11) NOT NULL,
  `total_score` double DEFAULT NULL,
  `chair_action` int(11) DEFAULT NULL,
  `chair_note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sheet_reviewed`
--

CREATE TABLE `sheet_reviewed` (
  `sheet_id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `score` double DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sheet_reviewed`
--

INSERT INTO `sheet_reviewed` (`sheet_id`, `reviewer_id`, `score`, `feedback`) VALUES
(15, 9, 2, 'Great !'),
(15, 10, 1, 'Not bad, I\'ts Good'),
(15, 13, 2, 'Good job!'),
(16, 9, 0, 'Bad!'),
(16, 10, -1, 'Very Bad!'),
(16, 13, 0, 'Bad '),
(19, 1, 2, 'Greate!'),
(19, 7, 1, 'Good '),
(20, 11, 2, 'Very Good'),
(20, 12, 1, 'Good '),
(20, 14, 2, 'Great!');

-- --------------------------------------------------------

--
-- Table structure for table `sheet_status`
--

CREATE TABLE `sheet_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sheet_status`
--

INSERT INTO `sheet_status` (`status_id`, `status_name`) VALUES
(0, 'Sheet Inactive'),
(1, 'Sheet Active');

-- --------------------------------------------------------

--
-- Table structure for table `token_status`
--

CREATE TABLE `token_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `token_status`
--

INSERT INTO `token_status` (`status_id`, `status_name`) VALUES
(0, 'Token Inactive'),
(1, 'Token Active');

-- --------------------------------------------------------

--
-- Table structure for table `topic_status`
--

CREATE TABLE `topic_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topic_status`
--

INSERT INTO `topic_status` (`status_id`, `status_name`) VALUES
(0, 'Topic Inactive'),
(1, 'Topic Active');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `track_id` int(11) NOT NULL,
  `conf_id` int(11) NOT NULL,
  `track_name` varchar(255) NOT NULL,
  `track_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`track_id`, `conf_id`, `track_name`, `track_status`) VALUES
(29, 6, 'General Track', 0),
(48, 7, 'Environmental Sustainability and Production', 0),
(30, 8, 'General Track', 1),
(31, 8, 'Digital Transformation for Social and Economic Development and Inclusion in Developing and Underexplored Contexts', 1),
(34, 8, 'Intelligent Ambient Assisted Living Systems', 1),
(42, 10, 'General Track', 1),
(43, 7, 'GCMM 2024', 1),
(46, 7, 'Advanced Management in Production', 1),
(53, 9, 'General Track', 1);

-- --------------------------------------------------------

--
-- Table structure for table `track_status`
--

CREATE TABLE `track_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `track_status`
--

INSERT INTO `track_status` (`status_id`, `status_name`) VALUES
(0, 'Track Inactive'),
(1, 'Track Active');

-- --------------------------------------------------------

--
-- Table structure for table `urole_status`
--

CREATE TABLE `urole_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `urole_status`
--

INSERT INTO `urole_status` (`status_id`, `status_name`) VALUES
(0, 'Role Suspended'),
(1, 'Role Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `DOB` date NOT NULL,
  `region` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `phone`, `password`, `DOB`, `region`, `status`, `created_date`) VALUES
(1, 'moayad shloul', 'shloul97@gmail.com', '0778804242', '123456789', '1997-12-02', 'JO', 1, '2024-05-16 10:01:24'),
(7, 'mustafa', 'mustafa@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-27 15:18:27'),
(8, 'ahmad', 'ahmad@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-27 15:18:46'),
(9, 'khalid', 'khalid@gmail.com', '0778804242', '123456789', '1997-02-12', 'KW', 1, '2024-05-27 15:19:26'),
(10, 'khalil', 'khalil@gmail.com', '0778804242', '123456789', '1997-02-12', 'SU', 1, '2024-05-27 15:20:47'),
(11, 'moh sh', 'moh@gmail.com', '0778804242', '123456789', '1997-02-12', 'SU', 1, '2024-05-27 17:15:38'),
(12, 'mazn', 'mazn@gmail.com', '0778804242', '123456789', '1997-02-12', 'KW', 1, '2024-05-27 17:16:22'),
(13, 'hamad', 'hamad@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-27 17:17:07'),
(14, 'jamal', 'jamal@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-27 17:17:37'),
(15, 'kamal', 'kamal@gmail.com', '0778804242', '123456789', '1997-02-19', 'JO', 1, '2024-05-27 17:18:06'),
(16, 'wael', 'wael@gmail.com', '0778804242', '123456789', '1997-02-15', 'SU', 1, '2024-05-27 17:19:18'),
(17, 'kamel', 'kamel@gmail.com', '0778804242', '123456789', '1997-02-15', 'JO', 1, '2024-05-27 17:19:57'),
(18, 'muneer', 'muneer@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-29 13:36:20'),
(19, 'majed', 'majed@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-29 13:37:19'),
(20, 'maha', 'maha@gmail.com', '0778804242', '123456789', '1997-02-12', 'SU', 1, '2024-05-29 13:37:49'),
(21, 'amal', 'amal@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-29 13:38:19'),
(22, 'muna', 'muna@gmail.com', '0778804242', '123456789', '1997-02-12', 'KW', 1, '2024-05-29 13:38:44'),
(23, 'musa', 'musa@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-29 13:39:14'),
(24, 'omar', 'omar@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-29 13:39:34'),
(25, 'aziz', 'aziz@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-29 13:44:59'),
(26, 'kazem', 'kazem@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-29 13:45:29'),
(27, 'nazem', 'nazem@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-29 13:45:49'),
(28, 'belal', 'belal@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-29 13:46:14'),
(29, 'rama', 'rama@gmail.com', '0778804242', '123456789', '1997-02-12', 'SU', 1, '2024-05-29 14:49:36'),
(30, 'abeer', 'abeer@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-29 14:59:30'),
(31, 'feras', 'feras@gmail.com', '0778804242', '123456789', '1997-02-12', 'JO', 1, '2024-05-29 15:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `gen_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `conf_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `track_id` int(11) DEFAULT NULL,
  `role_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`gen_id`, `user_id`, `conf_id`, `role_id`, `track_id`, `role_status`) VALUES
(1, 1, 6, 1, 45, 1),
(2, 1, 6, 2, NULL, 1),
(3, 1, 6, 3, 29, 1),
(4, 1, 7, 1, NULL, 1),
(5, 1, 8, 1, NULL, 1),
(6, 1, 9, 1, NULL, 1),
(7, 1, 10, 1, NULL, 1),
(8, 1, 11, 1, NULL, 1),
(9, 7, 10, 2, NULL, 1),
(10, 8, 7, 2, NULL, 1),
(11, 9, 8, 2, NULL, 1),
(12, 10, 9, 2, NULL, 1),
(13, 10, 11, 2, NULL, 1),
(14, 13, 8, 3, 31, 1),
(17, 15, 8, 3, 34, 1),
(24, 7, 8, 3, 30, 1),
(26, 13, 7, 3, 43, 1),
(31, 7, 7, 3, 46, 1),
(33, 17, 7, 3, 48, 1),
(38, 1, 10, 3, 53, 1),
(39, 7, 10, 3, 42, 1),
(40, 29, 6, 5, 29, 1),
(41, 30, 10, 5, 42, 1),
(42, 31, 10, 5, 42, 1),
(43, 8, 8, 5, 34, 1),
(44, 22, 7, 5, 46, 1),
(45, 26, 7, 5, 48, 1),
(46, 27, 8, 5, 31, 1),
(47, 11, 8, 4, 31, 1),
(48, 12, 8, 4, 31, 1),
(49, 14, 8, 4, 31, 1),
(50, 17, 8, 4, 34, 1),
(51, 18, 8, 4, 34, 1),
(52, 19, 8, 4, 34, 1),
(53, 20, 8, 4, 31, NULL),
(54, 20, 7, 4, 46, 1),
(55, 21, 7, 4, 46, 1),
(56, 23, 7, 4, 46, 1),
(57, 24, 6, 4, 29, 1),
(58, 25, 6, 4, 29, 1),
(59, 28, 6, 4, 29, 1),
(60, 1, 7, 4, 48, 1),
(61, 7, 7, 4, 48, 1),
(62, 15, 7, 4, 48, 1),
(63, 9, 10, 4, 42, 1),
(64, 10, 10, 4, 42, 1),
(65, 13, 10, 4, 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`status_id`, `status_name`) VALUES
(1, 'User Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cfp`
--
ALTER TABLE `cfp`
  ADD PRIMARY KEY (`cfp_id`),
  ADD UNIQUE KEY `conf_id` (`conf_id`),
  ADD KEY `cfp_ifk_2` (`cfp_status`);

--
-- Indexes for table `cfp_desc`
--
ALTER TABLE `cfp_desc`
  ADD PRIMARY KEY (`cfp_id`,`desc_key`),
  ADD KEY `cfp_desc_fk_2` (`desc_status`);

--
-- Indexes for table `cfp_status`
--
ALTER TABLE `cfp_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `cfp_topics`
--
ALTER TABLE `cfp_topics`
  ADD PRIMARY KEY (`topic_id`,`cfp_id`),
  ADD KEY `cfp_topic_fk_1` (`cfp_id`),
  ADD KEY `cfp_topic_fk_2` (`topic_status`);

--
-- Indexes for table `chair_action`
--
ALTER TABLE `chair_action`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`conf_id`),
  ADD KEY `conf_status` (`conf_status`),
  ADD KEY `conference_ibfk_2` (`user_id`);

--
-- Indexes for table `conf_status`
--
ALTER TABLE `conf_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `decr_status`
--
ALTER TABLE `decr_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `invite_token`
--
ALTER TABLE `invite_token`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `token_ifk_1` (`conf_id`),
  ADD KEY `token_ifk_2` (`role_id`),
  ADD KEY `token_ifk_3` (`token_status`),
  ADD KEY `token_ifk_4` (`track_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sheets`
--
ALTER TABLE `sheets`
  ADD PRIMARY KEY (`sheet_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `conf_id` (`conf_id`),
  ADD KEY `sheet_status` (`sheet_status`),
  ADD KEY `sheets_ibfk_4` (`track_id`);

--
-- Indexes for table `sheets_keywords`
--
ALTER TABLE `sheets_keywords`
  ADD PRIMARY KEY (`keyword_id`,`sheet_id`),
  ADD KEY `sheet_keywords_ifk_1` (`sheet_id`);

--
-- Indexes for table `sheet_authors`
--
ALTER TABLE `sheet_authors`
  ADD PRIMARY KEY (`generated_id`),
  ADD KEY `authors_fk_1` (`sheet_id`);

--
-- Indexes for table `sheet_result`
--
ALTER TABLE `sheet_result`
  ADD PRIMARY KEY (`sheet_id`,`chair_id`),
  ADD KEY `chair_action` (`chair_action`),
  ADD KEY `chair_id` (`chair_id`);

--
-- Indexes for table `sheet_reviewed`
--
ALTER TABLE `sheet_reviewed`
  ADD PRIMARY KEY (`sheet_id`,`reviewer_id`),
  ADD KEY `reviewer_id` (`reviewer_id`);

--
-- Indexes for table `sheet_status`
--
ALTER TABLE `sheet_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `token_status`
--
ALTER TABLE `token_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `topic_status`
--
ALTER TABLE `topic_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`track_id`,`conf_id`,`track_name`),
  ADD KEY `conf_id` (`conf_id`),
  ADD KEY `track_status` (`track_status`);

--
-- Indexes for table `track_status`
--
ALTER TABLE `track_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `urole_status`
--
ALTER TABLE `urole_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`gen_id`,`user_id`,`conf_id`,`role_id`),
  ADD KEY `conf_id` (`conf_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `track_id` (`track_id`),
  ADD KEY `user_role_ibfk_5` (`role_status`),
  ADD KEY `user_role_ibfk_6` (`user_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cfp`
--
ALTER TABLE `cfp`
  MODIFY `cfp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cfp_topics`
--
ALTER TABLE `cfp_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `conf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invite_token`
--
ALTER TABLE `invite_token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sheets`
--
ALTER TABLE `sheets`
  MODIFY `sheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sheets_keywords`
--
ALTER TABLE `sheets_keywords`
  MODIFY `keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sheet_authors`
--
ALTER TABLE `sheet_authors`
  MODIFY `generated_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cfp`
--
ALTER TABLE `cfp`
  ADD CONSTRAINT `cfp_ifk_1` FOREIGN KEY (`conf_id`) REFERENCES `conference` (`conf_id`),
  ADD CONSTRAINT `cfp_ifk_2` FOREIGN KEY (`cfp_status`) REFERENCES `cfp_status` (`status_id`);

--
-- Constraints for table `cfp_desc`
--
ALTER TABLE `cfp_desc`
  ADD CONSTRAINT `cfp_desc_fk_1` FOREIGN KEY (`cfp_id`) REFERENCES `cfp` (`cfp_id`),
  ADD CONSTRAINT `cfp_desc_fk_2` FOREIGN KEY (`desc_status`) REFERENCES `decr_status` (`status_id`);

--
-- Constraints for table `cfp_topics`
--
ALTER TABLE `cfp_topics`
  ADD CONSTRAINT `cfp_topic_fk_1` FOREIGN KEY (`cfp_id`) REFERENCES `cfp` (`cfp_id`),
  ADD CONSTRAINT `cfp_topic_fk_2` FOREIGN KEY (`topic_status`) REFERENCES `topic_status` (`status_id`);

--
-- Constraints for table `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `conference_ibfk_1` FOREIGN KEY (`conf_status`) REFERENCES `conf_status` (`status_id`),
  ADD CONSTRAINT `conference_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `invite_token`
--
ALTER TABLE `invite_token`
  ADD CONSTRAINT `token_ifk_1` FOREIGN KEY (`conf_id`) REFERENCES `conference` (`conf_id`),
  ADD CONSTRAINT `token_ifk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `token_ifk_3` FOREIGN KEY (`token_status`) REFERENCES `token_status` (`status_id`),
  ADD CONSTRAINT `token_ifk_4` FOREIGN KEY (`track_id`) REFERENCES `tracks` (`track_id`);

--
-- Constraints for table `sheets`
--
ALTER TABLE `sheets`
  ADD CONSTRAINT `sheets_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `sheets_ibfk_2` FOREIGN KEY (`conf_id`) REFERENCES `conference` (`conf_id`),
  ADD CONSTRAINT `sheets_ibfk_3` FOREIGN KEY (`sheet_status`) REFERENCES `sheet_status` (`status_id`),
  ADD CONSTRAINT `sheets_ibfk_4` FOREIGN KEY (`track_id`) REFERENCES `tracks` (`track_id`);

--
-- Constraints for table `sheets_keywords`
--
ALTER TABLE `sheets_keywords`
  ADD CONSTRAINT `sheet_keywords_ifk_1` FOREIGN KEY (`sheet_id`) REFERENCES `sheets` (`sheet_id`);

--
-- Constraints for table `sheet_authors`
--
ALTER TABLE `sheet_authors`
  ADD CONSTRAINT `authors_fk_1` FOREIGN KEY (`sheet_id`) REFERENCES `sheets` (`sheet_id`);

--
-- Constraints for table `sheet_result`
--
ALTER TABLE `sheet_result`
  ADD CONSTRAINT `sheet_result_ibfk_1` FOREIGN KEY (`chair_action`) REFERENCES `chair_action` (`action_id`),
  ADD CONSTRAINT `sheet_result_ibfk_2` FOREIGN KEY (`sheet_id`) REFERENCES `sheets` (`sheet_id`),
  ADD CONSTRAINT `sheet_result_ibfk_3` FOREIGN KEY (`chair_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sheet_reviewed`
--
ALTER TABLE `sheet_reviewed`
  ADD CONSTRAINT `sheet_reviewed_ibfk_1` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `sheet_reviewed_ibfk_2` FOREIGN KEY (`sheet_id`) REFERENCES `sheets` (`sheet_id`);

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `conference` (`conf_id`),
  ADD CONSTRAINT `tracks_ibfk_2` FOREIGN KEY (`track_status`) REFERENCES `track_status` (`status_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status`) REFERENCES `user_status` (`status_id`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`conf_id`) REFERENCES `conference` (`conf_id`),
  ADD CONSTRAINT `user_role_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `user_role_ibfk_4` FOREIGN KEY (`track_id`) REFERENCES `tracks` (`track_id`),
  ADD CONSTRAINT `user_role_ibfk_5` FOREIGN KEY (`role_status`) REFERENCES `urole_status` (`status_id`),
  
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
