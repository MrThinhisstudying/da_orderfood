-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 10:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opd`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categorieId` int(12) NOT NULL,
  `categorieName` varchar(255) NOT NULL,
  `categorieDesc` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `categorieCreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorieId`, `categorieName`, `categorieDesc`, `image_name`, `categorieCreateDate`) VALUES
(42, 'Đồ ăn Việt Nam ', 'cơm tấm, phở, bún thịt nướng ', 'Food_category_812.jpg', '2022-12-24 14:32:55'),
(43, 'Thức ăn nhanh ', 'Burger, gà rán, khoai tây chiên', 'Food_category_532.jpg', '2022-12-24 14:33:34'),
(44, 'Salad', 'Các món rau trộn cùng các loại sốt ', 'Food_category_494.jpg', '2022-12-24 14:34:06'),
(45, 'Pizza', 'Tổng hợp các loại bánh pizza từ Ý', 'Food_category_209.jpg', '2022-12-24 14:34:35'),
(46, 'Đồ ăn thêm ', 'Bao gồm các phần ăn thêm ', 'Food_category_642.jpg', '2022-12-24 14:35:08'),
(47, 'Nước giải khác các loại', 'Các loại nước ép, nước ngọt có gas, nước suối,...', 'Food_category_320.jpg', '2022-12-24 14:35:47'),
(48, 'Mì ý ', 'Các loại mì Ý được đầu bếp từ Ý về chế biến', 'Food_category_543.jpg', '2022-12-24 14:36:35'),
(49, 'Tráng miệng', 'bánh ngọt, kem,...', 'Food_category_334.jpg', '2022-12-24 14:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `orderId` int(21) NOT NULL DEFAULT 0 COMMENT 'If problem is not related to the order then order id = 0',
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `userId`, `email`, `phoneNo`, `orderId`, `message`, `time`) VALUES
(1, 7, 'thinhmap665@gmail.com', 941306213, 0, 'test12', '2022-12-23 15:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `contactreply`
--

CREATE TABLE `contactreply` (
  `id` int(21) NOT NULL,
  `contactId` int(21) NOT NULL,
  `userId` int(23) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactreply`
--

INSERT INTO `contactreply` (`id`, `contactId`, `userId`, `message`, `datetime`) VALUES
(1, 1, 7, 'test12345', '2022-12-23 15:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `deliverydetails`
--

CREATE TABLE `deliverydetails` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `deliveryBoyName` varchar(35) NOT NULL,
  `deliveryBoyPhoneNo` bigint(25) NOT NULL,
  `deliveryTime` int(200) NOT NULL COMMENT 'Time in minutes',
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliverydetails`
--

INSERT INTO `deliverydetails` (`id`, `orderId`, `deliveryBoyName`, `deliveryBoyPhoneNo`, `deliveryTime`, `dateTime`) VALUES
(1, 2, 'Huỳnh Văn Bánh', 941306256, 25, '2022-12-27 09:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodId` int(12) UNSIGNED NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `foodPrice` decimal(10,3) NOT NULL,
  `foodDesc` text NOT NULL,
  `foodImg` varchar(255) NOT NULL,
  `foodCategorieId` int(12) NOT NULL,
  `foodPubDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodId`, `foodName`, `foodPrice`, `foodDesc`, `foodImg`, `foodCategorieId`, `foodPubDate`) VALUES
(5, 'Cơm tấm', '38.000', 'Cơm tấm, nước mắm chua ngọt, mỡ hành, sườn cốt lếch nướng mật ong, đưa leo, đồ chua, mơ hành tóp mỡ, súp.', 'Food_756.jpg', 42, '2022-12-25 15:49:58'),
(6, 'Cơm tấm sườn trứng', '38.000', 'Cơm tấm, nước mắm chua ngọt, mỡ hành tóp mỡ, sườn cốt lếch nướng mật ong, trứng, đưa leo, đồ chua, súp.', 'Food_870.jpg', 42, '2022-12-25 15:50:55'),
(7, 'Cơm tấm sườn chả', '38.000', 'Cơm tấm, nước mắm chua ngọt, mỡ hành tóp mỡ, sườn cốt lếch nướng mật ong, chả trứng, đưa leo, đồ chua, súp.', 'Food_581.jpg', 42, '2022-12-25 15:52:08'),
(8, 'Cơm tấm sườn bì', '38.000', 'Cơm tấm, nước mắm chua ngọt, mỡ hành tóp mỡ, sườn cốt lếch nướng mật ong, bì thính, mỡ hành, đưa leo, đồ chua,súp.', 'Food_650.jpg', 42, '2022-12-25 15:52:28'),
(9, 'Cơm tấm ốp la', '38.000', 'Cơm tấm, nước mắm chua ngọt, chả, ốp la, mỡ hành, đưa leo, đồ chua, mơ hành tóp mỡ, súp.', 'Food_174.jpg', 42, '2022-12-25 15:52:59'),
(10, 'Phở bò', '35.000', 'Bánh phở, nước dùng, thịt bò với một số loại gia vị khác', 'Food_655.jpg', 42, '2022-12-25 15:53:44'),
(11, 'Phở gà', '35.000', 'Bánh phở, nước dùng, thịt gà kèm với một số loại gia vị khác', 'Food_634.jpg', 42, '2022-12-25 15:54:13'),
(12, 'Phở tái nạm', '45.000', 'Bánh phở, nước dùng, thịt bò và nạm bò với một số loại gia vị khác', 'Food_312.jpg', 42, '2022-12-25 15:54:39'),
(13, 'Phở bò viên', '35.000', 'Bánh phở, nước dùng, bò viên và kèm với một số loại gia vị khác', 'Food_728.jpg', 42, '2022-12-25 15:55:10'),
(14, 'Phở đặc biệt', '50.000', 'Bánh phở, nước dùng, thịt bò, nạm, gân, bò viên, thịt gà kèm với một số loại gia vị khác', 'Food_411.jpg', 42, '2022-12-25 15:56:04'),
(15, 'Phở gà đặc biệt', '50.000', 'Bánh phở, nước dùng, thịt gà gấp đôi với một số loại gia vị khác', 'Food_711.jpg', 42, '2022-12-25 15:56:25'),
(16, ' Bánh mì đặc biệt', '45.000', 'Bánh mì ăn kèm phần nhân vô cùng đa dạng, chỉ nguyên nhân kẹp cũng đến mười mấy loại. Nào jambon, giò, chả, thịt xíu, thịt nướng, thịt gà, trứng, phô mai...', 'Food_977.jpg', 42, '2022-12-25 15:56:56'),
(17, 'Bánh mì thịt nướng', '30.000', 'Bánh mì ăn kèm phần nhân là thịt nướng, đồ chua, dưa leo, ngò, nước sốt thịt nướng.', 'Food_335.jpg', 42, '2022-12-25 15:57:18'),
(18, 'Bánh mì 2 trứng', '20.000', 'Bánh mì ăn kèm phần nhân là 2 trứng ốp la, đồ chua, dưa leo, ngò, nước sốt thịt nướng.', 'Food_588.jpg', 42, '2022-12-25 15:57:45'),
(19, 'Bánh mì hà nội', '30.000', 'Bánh mì ăn kèm phần nhân vô cùng đa dạng, chỉ nguyên nhân kẹp cũng đến mười mấy loại chả. Nào jambon, giò, chả, chả bo, nem chua, phô mai, patê, bơ...', 'Food_231.jpg', 42, '2022-12-25 15:58:10'),
(20, 'Ốp la', '7.000', 'Trứng chiên ăn kèm với cơm tấm', 'Food_293.jpg', 46, '2022-12-25 15:58:41'),
(21, 'Thịt nướng thêm', '32.000', 'Thịt nướng thêm ăn kèm với cơm và bún', 'Food_741.jpg', 46, '2022-12-25 15:59:06'),
(22, 'Chả trứng', '10.000', 'Chả trứng hấp ăn kèm với cơm tấm', 'Food_779.jpg', 46, '2022-12-25 15:59:38'),
(23, 'Canh chua', '15.000', 'Canh chua ăn kèm với cơm tấm', 'Food_348.jpg', 46, '2022-12-25 16:00:08'),
(24, 'Canh rong biển', '15.000', 'Ăn kèm với cơm', 'Food_766.jpg', 46, '2022-12-25 16:00:36'),
(25, 'Chả giò', '15.000', 'Chả giò thêm ăn kèm với bún thịt nướng', 'Food_5.jpg', 46, '2022-12-25 16:01:02'),
(26, 'Đồ chua', '5.000', 'Ăn kèm với cơm và bún thịt nướng', 'Food_357.jpg', 46, '2022-12-25 16:01:21'),
(27, 'Cơm thêm', '5.000', 'Cơm thêm', 'Food_520.jpg', 46, '2022-12-25 16:01:35'),
(28, 'Sprite', '15.000', 'Nước ngọt có ga', 'Food_567.jpg', 47, '2022-12-25 16:02:16'),
(29, 'Fanta', '15.000', 'Nước ngọt có ga', 'Food_511.jpg', 47, '2022-12-25 16:02:37'),
(30, 'Coca-cola', '15.000', 'Nước ngọt có ga', 'Food_683.jpg', 47, '2022-12-25 16:02:54'),
(32, 'Pizza Thịt Xông Khói', '250.000', 'Thịt giăm bông, thịt xông khói và hai loại rau của ớt xanh, cà chua', 'Food_240.jpg', 45, '2022-12-25 16:05:35'),
(33, 'Pizza Gà Nướng 3 vị', '200.000', 'Gà nướng, gà bơ tỏi và gà ướp sốt nấm', 'Food_313.jpg', 45, '2022-12-25 16:05:57'),
(34, 'Pizza 5 Loại Thịt Đặc Biệt', '200.000', 'Xúc xích lợn và bò đặc trưng của Ý, giăm bông, thịt xông khói', 'Food_70.jpg', 45, '2022-12-25 16:06:18'),
(35, 'Pizza 5 Loại Thịt Đặc Biệt và Rau Củ', '200.000', 'Xúc xích bò, giăm bông, thịt xông khói,...và cả thế giới rau phong phú.', 'Food_449.jpg', 45, '2022-12-25 16:07:58'),
(36, 'Gà rán phô mai', '59.000', 'Thịt gà tui dùi hoặc cánh hoặc má đùi được chiên ngâm dầu. Được tẩm ướt gia vị trước khi chiên. Ăn kèm cùng bột phô mai', 'Food_59.jpg', 43, '2022-12-25 16:08:32'),
(37, 'Gà Rán Sốt Chua Ngọt', '59.000', 'Thịt gà tui dùi hoặc cánh hoặc má đùi được chiên ngâm dầu. Được tẩm ướt gia vị trước khi chiên.', 'Food_707.jpg', 43, '2022-12-25 16:09:02'),
(38, 'Gà Rán Sốt Cay Hàn Quốc', '59.000', 'Thịt gà tui dùi hoặc cánh hoặc má đùi được chiên ngâm dầu. Được tẩm ướt gia vị trước khi chiên.', 'Food_382.jpg', 43, '2022-12-25 16:09:22'),
(39, 'Khoai Tây Chiên', '30.000', 'Khoai tây được cắt lát và chiên ngập dầu', 'Food_403.jpg', 43, '2022-12-25 16:09:42'),
(40, 'Khoai Tây Chiên Sốt Phô Mai', '49.000', 'Khoai tây được cắt lát và chiên ngập dầu ăn cùng sốt phô mai', 'Food_257.jpg', 43, '2022-12-25 16:10:04'),
(41, 'Bún Thịt Nướng', '30.000', 'Bún, thịt heo nướng, rau thơm, salad và nước chấm', 'Food_476.jpg', 42, '2022-12-25 16:10:37'),
(42, 'Bún Thịt Xào', '30.000', 'Bún, thịt heo xào, rau thơm, salad và nước chấm', 'Food_120.jpg', 42, '2022-12-25 16:10:54'),
(44, ' Bún Thịt Nướng Đặt Biệt', '50.000', 'Bún, thịt heo, nem nướng, chả giò, rau thơm, salad và nước chấm', 'Food_552.jpg', 42, '2022-12-25 16:11:27'),
(45, 'Salad Ức Gà', '59.000', 'Thịt gà và các loại rau rửa sạch, thêm chút muối, hạt tiêu, giấm, trộn đều. Bày thịt gà lên trên, thêm các loại hạt đập nhỏ. Cuối cùng thêm dầu ô liu.', 'Food_863.jpg', 44, '2022-12-25 16:11:59'),
(46, 'Salad Cá Hồi', '79.000', 'Cá hồi và các loại rau rửa sạch, thêm chút muối, hạt tiêu, giấm, trộn đều. Bày thịt gà lên trên, thêm các loại hạt đập nhỏ. Cuối cùng thêm dầu ô liu.', 'Food_668.jpg', 44, '2022-12-25 16:13:05'),
(47, 'Salad Thịt Xông Khói', '79.000', 'Thịt xông khói và các loại rau rửa sạch, thêm chút muối, hạt tiêu, giấm, trộn đều. Bày thịt gà lên trên, thêm các loại hạt đập nhỏ. Cuối cùng thêm dầu ô liu.', 'Food_682.jpg', 44, '2022-12-25 16:13:36'),
(48, 'Salad Trứng Gà', '49.000', 'Trứng gà và các loại rau rửa sạch, thêm chút muối, hạt tiêu, giấm, trộn đều. Bày thịt gà lên trên, thêm các loại hạt đập nhỏ. Cuối cùng thêm ', 'Food_818.jpg', 44, '2022-12-25 16:13:59'),
(49, 'Salad Thịt Nướng', '69.000', 'Thịt heo nướng và các loại rau rửa sạch, thêm chút muối, hạt tiêu, giấm, trộn đều. Bày thịt gà lên trên, thêm các loại hạt đập nhỏ. Cuối cùng thêm dầu ô liu.', 'Food_445.jpg', 44, '2022-12-25 16:14:33'),
(50, 'Mỳ Ý Cay Hải Sản', '129.000', 'Mỳ Ý rán với các loại hải sản tươi ngon cùng ớt và tỏi', 'Food_636.jpg', 48, '2022-12-25 16:16:21'),
(51, 'Mỳ Ý Chay Sốt Marinara', '89.000', 'Mỳ Ý áp chảo với sốt Marinara, nấm và cà chua đỏ', 'Food_746.jpg', 48, '2022-12-25 16:16:45'),
(52, 'Mỳ Ý Tôm Sốt Kem Cà Chua', '129.000', 'Sự tươi ngon của tôm kết hợp với sốt kem cà chua', 'Food_677.jpg', 48, '2022-12-25 16:17:10'),
(53, 'Mỳ Ý Cay Xúc Xích', '109.000', 'Mỳ Ý rán với xúc xích cay, thảo mộc, ngò gai và húng quế Ý', 'Food_927.jpg', 48, '2022-12-25 16:17:54'),
(54, 'Mỳ Ý Giăm Bông Và Nấm Sốt Kem', '99.000', 'Mỳ Ý, nấm và giăm bông được nấu cùng với sốt kem trắng', 'Food_156.jpg', 48, '2022-12-25 16:18:11'),
(56, 'Mỳ Ý Chay Sốt Kem Tươi', '89.000', 'Mỳ Ý chay thơm ngon với sốt kem và nấm', 'Food_210.jpg', 48, '2022-12-25 16:19:42'),
(57, 'Burger 2 lớp bò, phô-mai', '65.000', 'Burger gồm bánh mì, thịt bò miếng, salad và cà chua ăn kèm sốt', 'Food_961.jpg', 43, '2022-12-25 16:29:33'),
(58, 'Burger bò', '49.000', 'Burger gồm bánh mì, thịt bò miếng, salad và cà chua ăn kèm sốt', 'Food_559.jpg', 43, '2022-12-25 16:30:06'),
(59, 'Burger Bò miếng lớn phô-mai', '79.000', 'Burger gồm bánh mì, thịt bò miếng, salad và cà chua ăn kèm sốt', 'Food_388.jpg', 43, '2022-12-25 16:30:24'),
(61, 'Burger Bigsize', '72.000', 'Burger gồm bánh mì, thịt bò miếng, salad và cà chua ăn kèm sốt', 'Food_284.jpg', 43, '2022-12-25 16:31:23'),
(62, 'Burger Bò miếng lớn đặc biệt', '89.000', 'Burger gồm bánh mì, thịt bò miếng, salad và cà chua ăn kèm sốt', 'Food_52.jpg', 43, '2022-12-25 16:31:40'),
(63, 'Burger phi-lê gà cay đặc biệt', '89.000', 'Burger gồm bánh mì, thịt bò miếng, salad và cà chua ăn kèm sốt', 'Food_148.jpg', 43, '2022-12-25 16:32:05'),
(64, 'Burger Heo - 337 Kcal', '32.000', 'Burger gồm bánh mì, thịt bò miếng, salad và cà chua ăn kèm sốt', 'Food_372.jpg', 43, '2022-12-25 16:32:22'),
(65, 'Burger Bò Hoàng Gia Đặc Biệt', '89.000', 'Burger gồm bánh mì, thịt bò miếng, salad và cà chua ăn kèm sốt', 'Food_235.jpg', 43, '2022-12-25 16:32:38'),
(66, 'Burger Phi lê Cá phô mai', '54.000', 'Burger gồm bánh mì, thịt bò miếng, salad và cà chua ăn kèm sốt', 'Food_651.jpg', 43, '2022-12-25 16:32:55'),
(67, ' 20 miếng Gà McNuggets', '119.000', 'Những món ăn có thể chia sẻ cùng bạn bè', 'Food_473.jpg', 43, '2022-12-25 16:33:39'),
(68, '6 Miếng Cánh Gà', '125.000', 'Những món ăn có thể chia sẻ cùng bạn bè\r\n\r\n', 'Food_1.jpg', 43, '2022-12-25 16:34:07'),
(69, '6 miếng Gà McNugge', '49.000', 'Những món ăn có thể chia sẻ cùng bạn bè', 'Food_119.jpg', 43, '2022-12-25 16:34:23'),
(71, 'Greek Salad - Phô Mai Feta', '89.000', 'Cà chua chín mọng, ôliu đen bóng tươi ngon, phô mai feta béo mềm, salad Greek (Hy Lạp) mang đến hương vị đặc trưng của vùng Địa Trung H', 'Food_526.jpg', 44, '2022-12-25 16:37:26'),
(72, 'Niçoise Salad - Cá Ngừ Ngâm Dầu', '82.000', 'Đến từ miền Nam nước Pháp, salad Niçoise kết hợp rau quả tươi ngon cùng các loại nguyên liệu khác để tạo nên sự cân bằng giữa vitamin và protein.', 'Food_132.jpg', 44, '2022-12-25 16:37:43'),
(73, 'Salad Cá Basa Áp Chảo', '53.000', 'Các món salad đơn giản, kết hợp từ những loại nguyên liệu gần gũi với người Việt Nam, phù hợp cho bữa ăn hàng ngày', 'Food_680.jpg', 44, '2022-12-25 16:38:15'),
(74, 'Salad Nấm Đông Cô - Chay', '55.000', 'Các món salad đơn giản, kết hợp từ những loại nguyên liệu gần gũi với người Việt Nam, phù hợp cho bữa ăn hàng ngày', 'Food_100.jpg', 44, '2022-12-25 16:38:28'),
(75, 'Pizza Hải Sản Đào', '169.000', 'Tôm, Đào hoà quyện bùng nổ cùng sốt Thousand Island', 'Food_817.jpg', 45, '2022-12-25 16:39:29'),
(76, 'Pizza Hải Sản Pesto Xanh', '169.000', 'Tôm, cua, mực và bông cải xanh tươi ngon trên nền sốt Pesto Xanh', 'Food_24.jpg', 45, '2022-12-25 16:39:57'),
(77, 'Pizza Hải Sản Nhiệt Đới', '139.000', 'Tôm, nghêu, mực cua, dứa với sốt Thousand Island', 'Food_438.jpg', 45, '2022-12-25 16:40:22'),
(79, 'Pizza Thịt Nguội & Nấm', '119.000', 'Pizza giăm bông và nấm đem đến cho bạn những trải nghiệm thú vị.', 'Food_229.jpg', 45, '2022-12-25 16:41:05'),
(80, '7Up', '15.000', 'Nước ngọt có ga', 'Food_146.jpg', 47, '2022-12-25 16:43:52'),
(81, 'Aquafina', '10.000', 'Nước suối', 'Food_851.jpg', 47, '2022-12-25 16:44:16'),
(82, 'Lavie', '10.000', 'Nước suối', 'Food_442.jpg', 47, '2022-12-25 16:44:32'),
(83, 'Pepsi', '15.000', 'Nước ngọt có ga', 'Food_218.jpg', 47, '2022-12-25 16:44:48'),
(84, 'Mirinda Soda Kem', '15.000', 'Nước ngọt có ga', 'Food_828.jpg', 47, '2022-12-25 16:45:12'),
(85, '7UP Fiber', '15.000', 'Nước ngọt có ga', 'Food_274.jpg', 47, '2022-12-25 16:45:28'),
(86, 'Bì', '12.000', 'Ăn kèm với cơm và bún', 'Food_41.jpg', 46, '2022-12-25 16:48:25'),
(87, 'Macaron', '35.000', 'Được làm bằng cách đánh lòng trứng đều lên và thêm chút đường cùng chút axit từ chanh tây hay giấm', 'Food_788.jpg', 49, '2022-12-25 16:52:32'),
(88, 'Bánh trà xanh', '35.000', 'Lớp vỏ bánh đắng nhẹ, lớp nhân đậu xanh bên trong được sên mịn ngọt', 'Food_527.jpg', 49, '2022-12-25 16:54:45'),
(89, 'Bông lan trứng muối', '35.000', 'Trứng muối nướng có vị thơm nhẹ của hoa hồi, quế, khi ăn cảm nhận được vị khô, không tanh hay mềm nhũn', 'Food_129.jpg', 49, '2022-12-25 16:55:33'),
(90, 'Flan', '25.000', 'Flan mềm mịn béo ngậy', 'Food_28.jpg', 49, '2022-12-25 16:56:12'),
(91, 'Bánh Mousse Dâu tây Hàn Quốc mềm mịn, chua chua ngọt ngọt', '35.000', 'Bánh Mousse Dâu tây Hàn Quốc mềm mịn, chua chua ngọt ngọt', 'Food_850.jpg', 49, '2022-12-25 16:56:52'),
(92, 'Bánh mousse chanh leo', '35.000', 'Bánh mousse chanh leo thơm ngon mát lạnh', 'Food_103.jpg', 49, '2022-12-25 16:57:24'),
(93, 'Bánh mousse việt quất', '35.000', 'Bánh là sự quyện hòa giữa vị chua ngọt của việt quất với độ ngọt dịu của gia vị nên có khả năng cân bằng vị giác rất tốt', 'Food_919.jpg', 49, '2022-12-25 16:58:10'),
(94, 'Bánh Mousse socola', '35.000', 'Bánh Mousse socola là sự kết hợp hoàn hảo của một chút đắng socola hoà quyện cùng sự béo mịn', 'Food_675.jpg', 49, '2022-12-25 16:58:51'),
(95, 'Bánh mousse đào', '35.000', 'Một sự kết hợp khéo léo giữa kem và lớp bánh mềm, được phủ lên trên vài lát đào ngon tuyệt', 'Food_861.jpg', 49, '2022-12-25 16:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `foodId` int(21) NOT NULL,
  `itemQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `orderId`, `foodId`, `itemQuantity`) VALUES
(1, 1, 3, 10),
(2, 1, 4, 9),
(3, 2, 5, 1),
(4, 2, 58, 1),
(5, 2, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` int(21) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `amount` int(200) NOT NULL,
  `paymentMode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=cash on delivery, \r\n1=online ',
  `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0=Order Placed.\r\n1=Order Confirmed.\r\n2=Preparing your Order.\r\n3=Your order is on the way!\r\n4=Order Delivered.\r\n5=Order Denied.\r\n6=Order Cancelled.',
  `orderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `orderDate`) VALUES
(2, 3, 'Khu 7 đường Lê Văn Lương, Khu 7 đường Lê Văn Lương', 222222, 941306213, 125, '0', '4', '2022-12-26 15:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `sitedetail`
--

CREATE TABLE `sitedetail` (
  `tempId` int(11) NOT NULL,
  `systemName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `contact1` bigint(21) NOT NULL,
  `contact2` bigint(21) DEFAULT NULL COMMENT 'Optional',
  `address` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sitedetail`
--

INSERT INTO `sitedetail` (`tempId`, `systemName`, `email`, `contact1`, `contact2`, `address`, `dateTime`) VALUES
(1, 'Món Việt', 'monviet1997@gmail.com', 19001588, 18001989, '16 Lê Thánh Tôn, Bến Nghé, Quận 1, thành phố Hồ Chí Minh', '2021-03-23 19:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `userType` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=user\r\n1=admin',
  `password` varchar(255) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `phone`, `userType`, `password`, `joinDate`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 1111111111, '1', '$2y$10$AAfxRFOYbl7FdN17rN3fgeiPu/xQrx6MnvRGzqjVHlGqHAM4d9T1i', '2021-04-11 11:40:58'),
(3, 'test2', 'Nguyễn', 'Thịnh', 'thinhmap665@gmail.com', 941306213, '0', '$2y$10$./hBBpWOFrOHpe.r.C6TlOuWuILLZm0TkfjAmrbjOABuq2taKb2Fy', '2022-12-23 11:19:15'),
(6, 'testimg', 'Hoàng', 'Hùng', 'thinhmap665@gmail.com', 941306213, '0', '$2y$10$pZhWzUk71uP67f73ePXA2uKDHgnAXR6ZiBPvzx4bCXXre4rCe952i', '2022-12-23 11:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `viewcart`
--

CREATE TABLE `viewcart` (
  `cartItemId` int(11) NOT NULL,
  `foodId` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viewcart`
--

INSERT INTO `viewcart` (`cartItemId`, `foodId`, `itemQuantity`, `userId`, `addedDate`) VALUES
(34, 3, 1, 7, '2022-12-23 15:33:28'),
(35, 4, 1, 7, '2022-12-23 15:34:58'),
(39, 5, 1, 3, '2022-12-27 11:17:33'),
(40, 6, 1, 3, '2022-12-27 11:17:36'),
(41, 7, 1, 3, '2022-12-27 15:40:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorieId`);
ALTER TABLE `categories` ADD FULLTEXT KEY `categorieName` (`categorieName`,`categorieDesc`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `contactreply`
--
ALTER TABLE `contactreply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverydetails`
--
ALTER TABLE `deliverydetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderId` (`orderId`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodId`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `sitedetail`
--
ALTER TABLE `sitedetail`
  ADD PRIMARY KEY (`tempId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD PRIMARY KEY (`cartItemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorieId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactreply`
--
ALTER TABLE `contactreply`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deliverydetails`
--
ALTER TABLE `deliverydetails`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodId` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sitedetail`
--
ALTER TABLE `sitedetail`
  MODIFY `tempId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `viewcart`
--
ALTER TABLE `viewcart`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
