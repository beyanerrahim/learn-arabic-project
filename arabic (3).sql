-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 11:08 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arabic`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(20) NOT NULL,
  `book_name` text NOT NULL,
  `book_number` int(20) NOT NULL,
  `file_url` text NOT NULL,
  `department_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_number`, `file_url`, `department_id`) VALUES
(49, 'الدجاجة الحمراء الصغيرة', 11111, '11111.pdf', 4),
(50, 'أرنب في القمر', 22222, '22222.pdf', 4),
(51, 'الأرنب والسلحفاة', 33333, '33333.pdf', 4),
(52, 'الأرنب الذكي', 44444, '44444.pdf', 4),
(53, 'فرخ البط القبيح', 55555, '55555.pdf', 4),
(54, 'الثعلب المحتال', 66666, '66666.pdf', 4),
(55, 'القط ذو الحذاء الذهبي', 77777, '77777.pdf', 4),
(56, 'الغراب والثعلب المكار', 88888, '88888.pdf', 4),
(57, 'تعليم الأرقام من 1 حتى 20', 99999, '99999.pdf', 3),
(58, 'تعلم جمع الأرقام', 12121, '12121.pdf', 3),
(59, 'الاحاد والعشرات', 34242, '34242.pdf', 3),
(60, 'احسب واطرح', 25366, '25366.pdf', 3),
(61, 'الأرقام العربية', 98989, '98989.pdf', 3),
(64, 'كتاب الحروف العربية', 675757, '675757.pdf', 1),
(65, 'تعليم الحروف الهجائية', 24242, '24242.pdf', 1),
(66, 'كتاب حروفي الجميلة', 87876, '87876.pdf', 1),
(67, 'الحروف العربية بالنقاط', 33233, '33233.pdf', 1),
(68, 'كتاب تلوين الحروف العربية', 89111, '89111.pdf', 1),
(69, 'الأحرف والأرقام', 66522, '66522.pdf', 1),
(70, 'تدريب شامل لكتابة جميع الحروف', 743090, '743090.pdf', 1),
(71, 'كتاب تلوين الفواكه للأطفال', 411110, '411110.pdf', 2),
(73, 'قصص القران الكريم', 80009, '80009.pdf', 5),
(74, 'كتاب علمني القران', 70009, '70009.pdf', 5),
(75, 'كتاب تفسير سورة الاخلاص', 68870, '68870.pdf', 5),
(76, 'كتاب تفسير سورة الفلق', 10065, '10065.pdf', 5),
(78, 'قواعد النحو', 55990, '55990.pdf', 6),
(79, 'الاملاء المبسط', 28870, '28870.pdf', 6);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(20) NOT NULL,
  `department_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(1, 'letters'),
(2, 'fruits'),
(3, 'numbers'),
(4, 'animals'),
(5, 'Quran'),
(6, 'grammar');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(20) NOT NULL,
  `exam_name` text NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_name`, `department_id`) VALUES
(3, 'حيوانات', 3),
(4, 'ارقام', 1),
(5, 'احرف', 1),
(6, 'فواكة', 4),
(7, 'قواعد', 6),
(8, 'قرأن', 5);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(20) NOT NULL,
  `lesson_name` text NOT NULL,
  `link` varchar(2048) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `lesson_name`, `link`, `department_id`) VALUES
(42, 'الرقم واحد', 'https://www.youtube.com/embed/hccCUadwKiM', 3),
(43, 'الرقم اثنان', 'https://www.youtube.com/embed/ZKWhbghJMt0', 3),
(44, 'الرقم ثلاثة', 'https://www.youtube.com/embed/7r3oIuBosZ0', 3),
(45, 'الرقم أربعة', 'https://www.youtube.com/embed/7r3oIuBosZ0', 3),
(46, 'الرقم خمسة', 'https://www.youtube.com/embed/St0yggkmKLo', 3),
(47, 'الرقم ستة', 'https://www.youtube.com/embed/1T7ACei7lbI', 3),
(48, 'الرقم سبعة', 'https://www.youtube.com/embed/75ZOo3e63t0', 3),
(49, 'الرقم ثمانية', 'https://www.youtube.com/embed/7qqhShI4aTM', 3),
(50, 'الرقم تسعة', 'https://www.youtube.com/embed/QnLz-LIqwuc\"', 3),
(51, 'الرقم عشرة', 'https://www.youtube.com/embed/11viXjnB3bA', 3),
(52, 'سورة اللإخلاص والمعوذتين', 'https://www.youtube.com/embed/H8RQNCl3yC4', 5),
(53, 'سورة الكافرون', 'https://www.youtube.com/embed/FPyB265t-6U', 5),
(54, 'سورة النصر', 'https://www.youtube.com/embed/JIZ_K1MHMF8', 5),
(55, 'سورة المسد', 'https://www.youtube.com/embed/fybzcegLTcM', 5),
(56, 'سورة قريش', 'https://www.youtube.com/embed/OWeHRcGdUlQ', 5),
(57, 'سورة الأخلاص', 'https://www.youtube.com/embed/8ESZMcUk-FA', 5),
(58, 'سورة الفلق', 'https://www.youtube.com/embed/wQoKJj_wRGU', 5),
(59, 'سورة الناس', 'https://www.youtube.com/embed/GliLccAb-Do', 5),
(60, 'سورة الماعون', 'https://www.youtube.com/embed/wy8XgjinDRo', 5),
(61, 'سورة الكوثر', 'https://www.youtube.com/embed/y8GAdnHpHto', 5),
(62, 'سورة الفيل', 'https://www.youtube.com/embed/k42j1GsVY8w', 5),
(63, 'سورة العصر', 'https://www.youtube.com/embed/BFZmk8RG3E4', 5),
(64, 'سورة التكاثر', 'https://www.youtube.com/embed/6V9fa0kyHhk', 5),
(65, 'سورة الهمزة', 'https://www.youtube.com/embed/cuYadem1r5w', 5),
(66, 'حرف الألف', 'https://www.youtube.com/embed/sArfIe_2N0Q', 1),
(67, 'حرف الباء', 'https://www.youtube.com/embed/IvrYlypCksI', 1),
(68, 'حرف التاء', 'https://www.youtube.com/embed/C0q_CkFCufM', 1),
(69, 'حرف الثاء', 'https://www.youtube.com/embed/9TILtCccb8c', 1),
(70, 'حرف الجيم', 'https://www.youtube.com/embed/e2Ho5S5Jd-4', 1),
(71, 'حرف الحاء', 'https://www.youtube.com/embed/aEfrEUasJVI', 1),
(72, 'حرف الخاء', 'https://www.youtube.com/embed/j6UYgKbP08w', 1),
(73, 'حرف الدال', 'https://www.youtube.com/embed/WlQv6qUp4Ws', 1),
(74, 'حرف الذال', 'https://www.youtube.com/embed/vi0ag0vhfn0', 1),
(75, 'حرف الراء', 'https://www.youtube.com/embed/hNGT_4Usrkw', 1),
(76, 'حرف الزاي', 'https://www.youtube.com/embed/64g0NrPwAL8', 1),
(77, 'حرف السين', 'https://www.youtube.com/embed/IJzSkLy-sw4', 1),
(78, 'حرف الشين', 'https://www.youtube.com/embed/G8y5HNey-iQ', 1),
(79, 'حرف الصاد', 'https://www.youtube.com/embed/SWru1FAnF4E', 1),
(80, 'حرف الضاد', 'https://www.youtube.com/embed/HsdbnE6c3x4', 1),
(81, 'حرف الطاء', 'https://www.youtube.com/embed/rSFDwL5PAbE', 1),
(82, 'حرف الظاء', 'https://www.youtube.com/embed/aBh0vCNIdgE', 1),
(83, 'حرف العين', 'https://www.youtube.com/embed/iNb2R9JhCpw', 1),
(84, 'حرف الغين', 'https://www.youtube.com/embed/p8vzQQvtipo', 1),
(85, 'حرف الفاء', 'https://www.youtube.com/embed/GDITXP6SZYQ', 1),
(86, 'حرف القاف', 'https://www.youtube.com/embed/U9w0gqzIGzI', 1),
(87, 'حرف الكاف', 'https://www.youtube.com/embed/qXH7Ibf-op4', 1),
(88, 'حرف اللام', 'https://www.youtube.com/embed/uJQgpsMVglw', 1),
(89, 'حرف الميم', 'https://www.youtube.com/embed/27o-ducKy-o', 1),
(90, 'حرف النون', 'https://www.youtube.com/embed/HgHF_0f1tgQ', 1),
(91, 'حرف الهاء', 'https://www.youtube.com/embed/3kNPo4ZKU0I', 1),
(92, 'حرف الواو', 'https://www.youtube.com/embed/NvPxafjSF0U', 1),
(93, 'حرف الياء', 'https://www.youtube.com/embed/gVolXNpQqI0', 1),
(94, 'حيوانات الغابة', 'https://www.youtube.com/embed/bJvzjM0uLwI', 4),
(95, 'حيوانات البحر', 'https://www.youtube.com/embed/dmAb6XbJmF8', 4),
(96, 'حيوانات المزرعة', 'https://www.youtube.com/embed/d-AcSjaM-dU', 4),
(97, 'أصوات الحيوانات', 'https://www.youtube.com/embed/I3YnXSeUAto', 4),
(98, 'تعلم المفرد والمثنى باللغة العربية', 'https://www.youtube.com/embed/QXdwBFOqZAo', 6),
(99, 'ظرفي الزمان والمكان', 'https://www.youtube.com/embed/HPReufmUjA8', 6),
(100, 'أسماء الإشارة', 'https://www.youtube.com/embed/HtR5pkOhRg8', 6),
(101, 'الجملة الاسمية والفعلية', 'https://www.youtube.com/embed/IZ9Zq8CLdLU', 6),
(102, 'الكلمات وعكسها', 'https://www.youtube.com/embed/lRfIvkgFKsE', 6),
(103, 'الحروف مع الصفات', 'https://www.youtube.com/embed/DKEIkPuDYZI', 6),
(104, 'الصفات وأوزانها', 'https://www.youtube.com/embed/rbXX7gNvaVE', 6),
(105, 'تحليل الكلمات الى مقاطع صوتية', 'https://www.youtube.com/embed/tA6maWrMi5Q', 6),
(106, 'تصريف الفعل مع جميع أزمنته', 'https://www.youtube.com/embed/7AE8QPi7h5U', 6),
(107, 'تحويل الفعل الماضي الى مضارع', 'https://www.youtube.com/embed/7AE8QPi7h5U', 6),
(108, ' حركة الشدة ونطقها', 'https://www.youtube.com/embed/Q_mCM26VZAo', 6),
(109, 'حركة السكون ونطقها', 'https://www.youtube.com/embed/yf21LtCCJjg', 6),
(110, 'تحليل الصورة واستخراج الفعل', 'https://www.youtube.com/embed/pzD2iBDzBdg', 6),
(111, 'تنوين الفتح والضم والكسر', 'https://www.youtube.com/embed/QZSaFf_Vs8k', 6),
(112, 'تصريف الأفعال', 'https://www.youtube.com/embed/izv0NvAs2fg', 6),
(113, 'الفرق بين المذكر والمؤنث', 'https://www.youtube.com/embed/zK6eEaJ2kdU', 6),
(114, 'أنشودة الفواكه', 'https://www.youtube.com/embed/NgkUIQGjTvg', 2),
(115, 'أسماء ونطق بعض الفواكه', 'https://www.youtube.com/embed/UEaOhNvaBgE', 2),
(116, 'أنشودة التفاحة', 'https://www.youtube.com/embed/P6GafXzeRcs', 2),
(117, 'فاكهة الموز وفوائدها', 'https://www.youtube.com/embed/b6wISjLf8IQ', 2),
(118, 'أسماء الفواكه ونطقها', 'https://www.youtube.com/embed/avZnogsP_vA', 2),
(119, 'أنشودة البرتقالة', 'https://www.youtube.com/embed/uE23bFWVMeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `massages`
--

CREATE TABLE `massages` (
  `massage_id` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `user_name` text NOT NULL,
  `subject` text NOT NULL,
  `massagefromuser` text NOT NULL,
  `massagetouser` text NOT NULL,
  `statuss` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `massages`
--

INSERT INTO `massages` (`massage_id`, `user_email`, `user_name`, `subject`, `massagefromuser`, `massagetouser`, `statuss`) VALUES
(2, 'salialmolhem@gmail.com', 'sssssss', 'ss', 'sssssssssssss', 'ssssssssss nedir anlamadım', 1),
(3, 'salialmolhem@gmail.com', 'fffff', 'ddd', 'vvv', 'vvvvv nedir', 1),
(4, 'salialmolhem@gmail.com', 'ffffff', 'ffffffffeww', 'mmmmssss', 'helllooooo', 1),
(5, 'sss@gmail.com', 'dddd', 'learn arabic', 'öööoooo', 'eeeee', 1),
(9, 'star.m.52716@gmail.com', 'muhammed', 'subjectttt', 'merhabaa ben öğrenciyim', 'merhabaaaaaaaaaaaa', 1),
(12, 'selinmolhem2019@gmail.com', 'selin', 'toooo learn', 'hello how are ypu', 'merhaba ben admin sally nasıl yardım edebilirim', 1),
(14, 'salialmolhem@gmail.com', 'sally', 'sssssss', 'sallly merhaba', 'merhabaa sally', 1),
(15, 'bayanrhayyem@gmail.com', 'Beyan errahim', 'امتحان الاحرف', 'merhaba benim adim beyan', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` int(20) NOT NULL,
  `permission_name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(20) NOT NULL,
  `question` text NOT NULL,
  `answer_A` text NOT NULL,
  `answer_B` text NOT NULL,
  `answer_C` text NOT NULL,
  `answer_true` text NOT NULL,
  `question_score` int(3) NOT NULL,
  `exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `answer_A`, `answer_B`, `answer_C`, `answer_true`, `question_score`, `exam_id`) VALUES
(7, 'اي من الحيوانات يصنف من فصيلة الزواحف', 'ارنب', 'افعى', 'فيل', 'B', 20, 3),
(8, 'اي من الحيوانات يصنف من فصيلة الطيور', 'ارنب', 'خروف', 'صقر', 'C', 20, 3),
(9, 'كيف تتنفس السمكة؟', 'الفم', 'الانف', 'الغلاصم', 'C', 20, 3),
(10, 'كم رجل يوجد للفيل', '4', '2', '5', 'A', 20, 3),
(11, 'حيوان له جلده مخطط', 'ارنب', 'حمار الوحشي', 'حصان', 'B', 20, 3),
(12, '1, .... , 3 , 4 , 5', '2', '20', '100', 'A', 20, 4),
(14, '10 , 20 ,..... ,40', '20', '30', '40', 'B', 20, 4),
(16, 'اي من الاعداد التالية عدد زوجي؟', '30', '50', '40', 'C', 20, 4),
(17, 'أي من الاعداد التالية هو عدد فردي؟', '50', '10', '80', 'A', 40, 4),
(18, ' ا , ..... ,ت', 'ب', 'ح', 'د', 'A', 20, 5),
(19, 'باي حرف تبدأ كلمة تفاحة؟', 'ت', 'ل', 'ب', 'A', 20, 5),
(20, 'اي من الفواكه التالية يوجد فيها حرف الزاي؟', 'موز', 'تفاح', 'باب', 'A', 20, 5),
(21, 'اي الكلمات تبدأ بحرف الراء؟', 'ارنب', 'رمان', 'غلاصم', 'B', 20, 5),
(22, 'اي من الكلمات التالية يوجد فيها حرف ب؟', 'نافذة', 'باب', 'جمل', 'B', 20, 5),
(23, 'اي من الفواكه التالية لونها اصفر؟	', 'موز', 'رمان', 'كيوي', 'A', 20, 6),
(25, 'اي من الفواكه التالية من الحمضيات؟', 'ليمون', 'تفاح', 'موز', 'A', 40, 6),
(26, 'ما هي الفاكهة التي اسمها نفس لونها؟', 'برتقال', 'تفاح', 'رمان', 'A', 20, 6),
(27, 'اي من الفواكه التالية لونها اخضر؟	', 'برتقال', 'تفاح', 'مشمش', 'B', 20, 6),
(28, 'اي من الكلمات التالية هي كلمة مذكرة؟ ', 'قمر  ', 'سماء  ', 'أرض ', 'A', 20, 7),
(29, 'اي الكلمات التالية مؤنثة ؟ ', 'فاطمة ', 'حسن ', 'أحمد', 'A', 20, 7),
(30, 'أي الأفعال التالية هو فعل ماض؟ ', 'يدرس ', 'ادرس', 'درس ', 'C', 20, 7),
(31, 'عند تحويل الفعل لعب الى فعل مضارع كيف سيكون؟', 'يلعب ', 'العب ', 'ادرس', 'A', 20, 7),
(32, 'اكتب فعل الامر من مصدر القفز  ', 'يقفز ', 'اقفز', 'قفز ', 'B', 20, 7),
(33, 'ماهي اصغر سورة بالقرآن الكريم؟', 'الكوثر', 'البقرة', 'الفلق', 'A', 20, 8),
(34, 'كم عدد سور القرآن الكريم', '120', '114', '110', 'B', 20, 8),
(35, 'كم عدد سور جزء عمّ؟', '10', '50', '37', 'C', 20, 8),
(36, 'كم عدد السور المكية؟', '90', '92', '93', 'C', 20, 8),
(37, 'ما هي اول سورة بالقرآن الكريم؟', 'الكوثر', 'البقرة', 'الفاتحة', 'C', 20, 8);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roles_id` int(20) NOT NULL,
  `roles_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roles_id`, `roles_name`) VALUES
(0, 'student'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `rol_per`
--

CREATE TABLE `rol_per` (
  `roles_id` int(20) NOT NULL,
  `permission_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `user_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_birthday` date NOT NULL,
  `user_gander` text NOT NULL,
  `user_country` text NOT NULL,
  `rol_id` int(20) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_birthday`, `user_gander`, `user_country`, `rol_id`, `code`) VALUES
(15, 'beyan', 'bayanrhayyem@gmail.com', '77d39b08d409b9614b3a0ed4a1fc13f4', '1998-08-11', 'female', 'syria', 1, 0),
(20, 'beyan', 'beyanerrahim2468@gmail.com', '98b0bd7eea82dea77a200b16f33400dd', '2011-08-04', 'female', 'syria', 0, 0),
(37, 'sally', 'salialmolhem@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1998-12-09', 'famale', 'syria', 1, 0),
(38, 'muhammed', 'star.m.52716@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', 'male', 'syria', 0, 0),
(40, ' selin almolhem ', 'selinmolhem2019@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2007-10-10', 'famale', 'syria', 0, 0),
(41, ' maha ', 'maha@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '2014-02-16', 'famale', 'turkiye', 0, 0),
(42, ' nura ', 'nura@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2015-11-14', 'famale', 'irak', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_exam`
--

CREATE TABLE `user_exam` (
  `users_id` int(11) NOT NULL,
  `exams_id` int(11) NOT NULL,
  `degree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_exam`
--

INSERT INTO `user_exam` (`users_id`, `exams_id`, `degree`) VALUES
(15, 3, 100),
(15, 4, 60),
(15, 6, 80),
(15, 8, 60),
(38, 3, 100),
(38, 4, 100),
(38, 5, 40),
(38, 6, 100),
(38, 7, 80),
(38, 8, 100),
(41, 3, 60),
(41, 4, 60),
(41, 6, 40),
(41, 7, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `bookkdepar` (`department_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `fkexam` (`department_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `fklesson` (`department_id`);

--
-- Indexes for table `massages`
--
ALTER TABLE `massages`
  ADD PRIMARY KEY (`massage_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `fkques` (`exam_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`);

--
-- Indexes for table `rol_per`
--
ALTER TABLE `rol_per`
  ADD KEY `fkrol_pe` (`roles_id`),
  ADD KEY `fkrol_pee` (`permission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`) USING HASH,
  ADD KEY `userroles` (`rol_id`);

--
-- Indexes for table `user_exam`
--
ALTER TABLE `user_exam`
  ADD PRIMARY KEY (`users_id`,`exams_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `exams_id` (`exams_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `massages`
--
ALTER TABLE `massages`
  MODIFY `massage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `bookkdepar` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `fkexam` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `fklesson` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fkques` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`);

--
-- Constraints for table `rol_per`
--
ALTER TABLE `rol_per`
  ADD CONSTRAINT `fkrol_pe` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`),
  ADD CONSTRAINT `fkrol_pee` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `userroles` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`roles_id`);

--
-- Constraints for table `user_exam`
--
ALTER TABLE `user_exam`
  ADD CONSTRAINT `user_exam_ibfk_1` FOREIGN KEY (`exams_id`) REFERENCES `exams` (`exam_id`),
  ADD CONSTRAINT `user_exam_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
