-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2025 lúc 08:42 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tzbookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `image_url` varchar(255) DEFAULT NULL,
  `published_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`book_id`, `title`, `category_id`, `author`, `publisher`, `description`, `price`, `stock_quantity`, `image_url`, `published_date`) VALUES
(1, 'Đắc Nhân Tâm', 1, 'Dale Carnegie', NULL, 'Quyển sách đưa ra các lời khuyên về cách thức cư xử, ứng xử và giao tiếp với mọi người để đạt được thành công trong cuộc sống', 99000.00, 20, 'https://cungdocsach.vn/wp-content/uploads/2020/10/%C4%90%E1%BA%AFc-nh%C3%A2n-t%C3%A2m-3.jpg', NULL),
(2, 'Nhà Giả Kim', 1, 'Paulo Coelho', NULL, 'Những triết lý sâu sắc trong \"Nhà Giả Kim\" nhấn mạnh vào ý tưởng rằng mỗi người đều có khả năng biến giấc mơ của mình thành hiện thực, miêu tả sự quan trọng của việc khám phá và theo đuổi ước mơ của mình, dù cho có gặp phải những khó khăn và thử thách như thế nào.', 80000.00, 20, 'https://doanducdong.com/wp-content/uploads/2021/10/nha-gia-kim-1.jpg', NULL),
(3, '7 Thói Quen Hiệu Quả', 3, 'Stephen Covey', NULL, '\"7 Thói Quen Hiệu Quả\" của Stephen R. Covey là một cuốn sách về phát triển cá nhân và quản lý cuộc sống. Cuốn sách giới thiệu bảy thói quen giúp con người trở nên hiệu quả hơn trong cuộc sống và công việc...', 99000.00, 20, 'https://sachnoi.cc/wp-content/uploads/2021/09/Sach-Noi-7-thoi-quen-de-thanh-dat-Stephen-R-Covey-audio-book-sachnoi.cc-5.jpg', NULL),
(4, 'Dám Thất Bại', 3, 'Billi P.S.Lim', NULL, 'Cuốn sách khuyến khích bạn đọc dũng cảm đối diện với những thất bại, vượt qua nỗi sợ bị người khác đánh giá, và tìm ra cách sống một cuộc đời tự do, không bị ràng buộc bởi kỳ vọng xã hội hay áp lực cá nhân.\r\n\r\n', 67000.00, 7, 'https://phuongnamvina.com/img_data/images/doc-sach-kinh-doanh.jpg', NULL),
(5, 'Tư duy ngược', 1, 'Nguyễn Anh Dũng', NULL, 'Cuốn sách này khám phá và khuyến khích người đọc áp dụng phương pháp tư duy ngược để giải quyết vấn đề và đạt được thành công trong cuộc sống.', 89000.00, 20, 'https://sbooks.vn/wp-content/uploads/2024/06/Sach-Tu-Duy-Nguoc.jpeg', NULL),
(6, 'Rèn luyện tư duy phản biện', 1, 'Albert Rutheford', NULL, 'Một cuốn sách cung cấp các phương pháp và công cụ để phát triển khả năng tư duy phản biện. Sách giúp người đọc nhận diện và đánh giá các lập luận, phân biệt giữa các lý lẽ hợp lý và không hợp lý, cũng như cách tránh các sai lầm trong lập luận...', 79000.00, 20, 'https://phamvanquy.com/wp-content/uploads/2023/04/06a7831bd25ac833631eb5744907f373.jpg', NULL),
(7, 'Hoàng tử bé', 2, 'Antoine de Saint-Exupéry', NULL, 'Thông qua hành trình khám phá các hành tinh khác nhau của Hoàng Tử Bé, câu chuyện đưa ra những bài học sâu sắc về tình yêu, tình bạn, sự trưởng thành và cách nhìn nhận thế giới một cách trong sáng, chân thành. Với lối viết giàu hình ảnh và ẩn dụ, \"Hoàng Tử Bé\" không chỉ dành cho trẻ em mà còn mang ý nghĩa sâu sắc đối với người lớn.', 50000.00, 21, 'https://img.tripi.vn/cdn-cgi/image/width=700,height=700/https://gcs.tripi.vn/public-tripi/tripi-feed/img/473670otI/hoang-tu-be-1054177.jpg', NULL),
(8, 'Sổ đỏ', 2, 'Vũ Trọng Phụng', NULL, 'Tác phẩm là một bức tranh châm biếm sâu sắc về xã hội Việt Nam thời kỳ thuộc địa, nơi sự suy đồi đạo đức, thói hư danh và lối sống trụy lạc được phơi bày một cách trần trụi.\r\n\r\nNhân vật chính, Xuân Tóc Đỏ, là một kẻ vô học nhưng nhờ vận may và sự láu cá, đã leo lên những vị trí cao trong xã hội. Qua hành trình của Xuân, tác phẩm chế nhạo các giá trị giả tạo của tầng lớp thượng lưu và sự tha hóa của văn hóa thời bấy giờ.\r\n\r\n\"Số Đỏ\" không chỉ là một câu chuyện hài hước mà còn mang ý nghĩa phê phán xã hội sâu sắc, khẳng định tài năng và tầm nhìn của Vũ Trọng Phụng trong văn học hiện thực phê phán.', 49000.00, 21, 'https://cdn.tgdd.vn/Files/2023/03/10/1516432/10-cuon-sach-van-hoc-hay-tieu-thuyet-van-hoc-kinh-dien-202303110854161072.jpg', NULL),
(9, 'Đạo kinh doanh', 3, 'Nguyễn Anh Dũng', NULL, 'Tập trung vào việc khai thác triết lý kinh doanh từ góc nhìn sâu sắc về đạo đức, nhân văn và văn hóa Á Đông. Cuốn sách không chỉ đưa ra những bài học về cách làm giàu bền vững mà còn nhấn mạnh sự cân bằng giữa lợi ích kinh tế và giá trị đạo đức.\r\n\r\nTác giả Nguyễn Anh Dũng kết hợp giữa kinh nghiệm thực tiễn và tư duy triết học để trình bày những nguyên tắc kinh doanh có ý nghĩa vượt thời gian. Nội dung phù hợp với doanh nhân, nhà quản lý và cả những người đang tìm kiếm sự phát triển toàn diện trong cuộc sống và sự nghiệp.', 69000.00, 22, 'https://static-images.vnncdn.net/files/publish/2023/10/11/dao-kinh-doanh-lot-top-10-cuon-sach-dang-doc-545.jpeg?width=0&s=qEYJLCJxaZvJNH4-qBaL1g', NULL),
(10, 'Sự Giàu Và Nghèo Của Các Dân ', 4, 'David S.Landes', NULL, 'Sự Giàu và Nghèo của Các Dân Tộc\" (tên gốc: The Wealth and Poverty of Nations) là một cuốn sách nổi tiếng của nhà sử học kinh tế David S. Landes, xuất bản lần đầu năm 1998. Cuốn sách là một nghiên cứu toàn diện về lý do tại sao một số quốc gia trở nên giàu có, trong khi những quốc gia khác vẫn nghèo đói qua nhiều thế kỷ.', 78000.00, 31, 'https://img.lazcdn.com/g/p/f1ad3e9d8eb9093315528b22ec767d53.jpg_960x960q80.jpg_.webp', NULL),
(11, 'Biến Mọi Thứ Thành Tiền ', 4, 'Nguyễn Anh Dũng', NULL, 'Bí quyết giúp bạn thoát nghèo để đạt được thành công và giàu có thực sự “Biến mọi thứ thành tiền” là cuốn sách xoay quanh chủ đề tài chính cá nhân. Đây là vấn đề đang được nhiều người, trong đó có các bạn trẻ đặc biệt quan tâm.\r\nTác giả chia sẻ: “Tiền được tạo ra bởi trí tuệ, sức lao động, thời gian của con người nên những gì tạo ra trí tuệ, sức khỏe, tiết kiệm thời gian đều sẽ tạo ra tiền.”', 79000.00, 32, 'https://vn-test-11.slatic.net/p/b9de58071dd5dd135984bd9ebaf21521.png', NULL),
(12, 'Tư Duy Kinh Tế', 4, 'Lượng Thúc', NULL, 'Cuốn sách “Tư duy kinh tế - 50 bài giảng để hiểu quy luật làm giàu” tập trung truyền đạt các nguyên lý kinh tế học của trường phái Áo dưới dạng tiểu luận tổng hợp, đồng thời sử dụng các nguyên lý này để giải thích và phân tích nhiều trường hợp trong kinh doanh, giai thoại trong thế giới thực, cổ đại và hiện đại, trên toàn thế giới liên quan đến nhiều nội dung: Từ giá trị, quyền sở hữu, cạnh tranh cho đến vấn đề mang tính nhận thức như bản chất con người, đạo đức, nhận thức… bằng một văn phong mộc mạc và giản dị.', 99000.00, 33, 'https://bizbooks.vn/uploads/images/2023/thang-9/sach-tu-duy-kinh-te.jpg', NULL),
(13, 'Tôi Tài Giỏi Bạn Cũng Thế', 5, 'Adam khoo', NULL, 'Cuốn sách cung cấp những phương pháp học thông minh như: phát triển trí não để ghi nhớ các sự kiện, con số một cách dễ dàng, sơ đồ tư duy, thành thạo quản lý thời gian, xác định mục tiêu một cách khoa học. Tài giỏi mang lại sự tự tin, hướng dẫn bạn cách thức trở thành người tài giỏi qua sẽ lập được kế hoạch cho cuộc đời của chính mình.', 67000.00, 34, 'https://file.hstatic.net/200000504927/article/toi_tai_gioi_ban_cung_the_2_01b44b5ea7b54cc9b43788751ef421a0.jpg', NULL),
(14, 'Kĩ Năng Giao Tiếp Đỉnh Cao', 5, 'Lý Tử Quyên', NULL, 'Ngạn ngữ xưa có câu “Học ăn, học nói, học gói, học mở” đã chỉ ra sự quan trọng của việc ăn nói.\r\nTừ xưa đến nay, con người giao tiếp không đơn thuần chỉ để truyền đạt những điều trong tâm tư mà nó còn là phương thức để người thấu hiểu người trong tình cảm, để thăng tiến trong sự nghiệp và để tỏ rõ sự hiểu biết của mình với thế giới bên ngoài.\r\nBiết im lặng đúng lúc cũng là một cách giao tiếp thông minh, biết nói đúng đủ để đem lại hiệu quả mà người nói muốn là điều ai cũng mong đạt được. Tất cả những kỹ năng được gói gọn trong “Giao tiếp đỉnh cao”- cuốn sách giúp bạn trở thành người làm chủ được khả năng giao tiếp, mở rộng mối quan hệ và đạt được thành công.', 95000.00, 35, 'https://bizweb.dktcdn.net/thumb/grande/100/490/462/products/298c75df6aded2cc81fba3aa18db2c8a-jpg-jpeg.jpg?v=1699093799380', NULL),
(15, 'Kỹ năng hoạt động nhóm', 5, 'Lam Hạnh', NULL, 'Sách minh họa cách các nhóm bạn làm việc cùng nhau để giải quyết vấn đề hoặc hoàn thành dự án. Tập trung vào việc giúp trẻ nhận ra tầm quan trọng của mỗi thành viên trong nhóm.', 56000.00, 36, 'https://bizweb.dktcdn.net/100/222/758/products/kns-hoat-dong-nhom.jpg?v=1603871571077', NULL),
(16, 'Harry Potter Và Hòn Đá Phù Thuỷ ', 6, 'J.K.Rowling, Lý Lan', NULL, 'Khi một lá thư được gởi đến cho cậu bé Harry Potter bình thường và bất hạnh, cậu khám phá ra một bí mật đã được che giấu suốt cả một thập kỉ. Cha mẹ cậu chính là phù thủy và cả hai đã bị lời nguyền của Chúa tể Hắc ám giết hại khi Harry mới chỉ là một đứa trẻ, và bằng cách nào đó, cậu đã giữ được mạng sống của mình. Thoát khỏi những người giám hộ Muggle không thể chịu đựng nổi để nhập học vào trường Hogwarts, một trường đào tạo phù thủy với những bóng ma và phép thuật, Harry tình cờ dấn thân vào một cuộc phiêu lưu đầy gai góc khi cậu phát hiện ra một con chó ba đầu đang canh giữ một căn phòng trên tầng ba. Rồi Harry nghe nói đến một viên đá bị mất tích sở hữu những sức mạnh lạ kì, rất quí giá, vô cùng nguy hiểm, mà cũng có thể là mang cả hai đặc điểm trên.\r\n\r\n\r\n', 161000.00, 36, 'https://cdn.tuoitre.vn/zoom/480_300/2020/5/6/harrypotterandthesorcerersstone-413143814-large-1588728259956566714678-crop-1588728354635894481094.jpg', NULL),
(17, 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh', 6, 'Nguyễn Nhật Ánh', NULL, ' Tôi thấy hoa vàng trên cỏ xanh là một tiểu thuyết dành cho thanh thiếu niên của nhà văn Nguyễn Nhật Ánh, xuất bản lần đầu tại Việt Nam vào ngày 9 tháng 12 năm 2010 bởi Nhà xuất bản Trẻ với phần tranh minh họa do Đỗ Hoàng Tường thực hiện. Đây là một trong các truyện dài của Nguyễn Nhật Ánh, ra đời sau Đảo mộng mơ và trước Lá nằm trong lá. Tác phẩm như một tập nhật ký xoay quanh cuộc sống của những đứa trẻ ở một vùng quê Việt Nam nghèo khó, nổi bật lên là thông điệp về tình anh em, tình làng nghĩa xóm và những tâm tư của tuổi mới lớn. Theo Nguyễn Nhật Ánh, đây là lần đầu tiên ông đưa vào truyện của mình những nhân vật phản diện, đặt ra vấn đề đạo đức như sự vô tâm hay cái ác', 89000.00, 38, 'https://www.netabooks.vn/Data/Sites/1/media/sach-2023/toi-thay-hoa-vang-tren-co-xanh/toi-thay-hoa-vang-tren-co-xanh.jpg', NULL),
(18, 'Vòm Rừng', 6, 'Richard Powers\r\n', NULL, '“Vòm rừng” là một cuốn tiểu thuyết hấp dẫn của tác giả Richard Powers, mô tả một hành trình kỳ diệu của sự kết nối giữa con người và thiên nhiên. Cuốn sách này khám phá một cách tài tình mối quan hệ phức tạp giữa con người và môi trường tự nhiên, đồng thời đề cao tầm quan trọng của việc bảo vệ và tôn trọng thiên nhiên.\r\n\r\n', 179000.00, 40, 'https://www.ereviewsach.com/wp-content/uploads/2024/01/Vom-rung.jpg', NULL),
(19, 'Lịch Sử Việt Nam', 7, 'Nguyễn Ngọc Mão', NULL, 'Bộ “Lịch sử Việt Nam” được kết cấu theo các thời kỳ: Thời kỳ cổ - trung đại (từ thời tiền sử đến năm 1858, khi thực dân Pháp nổ sung xâm lược Việt Nam); Thời kỳ cận đại (thời kỳ thực dân Pháp xâm lược, biến Việt Nam thành thuộc địa đến Cách mạng tháng Tám năm 1945 thành công) và Thời kỳ hiện đại (từ khi nước Việt Nam Dân chủ Cộng hòa ra đời cho đến nay). Bộ sách Lịch sử Việt Nam gồm 15 tập.\r\nTheo dòng thời gian, Việt Nam đã có một nền sử học truyền thống với những bộ quốc sử và nhiều công trình nghiên cứu, biên soạn đồ sộ như: Đại Việt sử ký; Đại Việt sử ký toàn thư; Phủ biên tạp lục; Gia Định thành thông chí; Đại Nam nhất thống chí...', 99000.00, 41, 'https://image.tienphong.vn/w890/Uploaded/2024/lkyqski001/2017_08_27/anh1b_YJEW.jpg', NULL),
(20, 'Việt Nam Sử Lược', 7, 'Trần Trọng Kim', NULL, 'Việt Nam sử lược của Trần Trọng Kim xuất bản lần đầu năm 1920, dựa trên những nghiên cứu trước đó như Nam sử tiểu học và Sơ học An Nam sử lược từ những năm 1914 -1917, là bộ thông sử viết bằng chữ quốc ngữ đầu tiên của Việt Nam được soạn theo phương pháp hiện đại.Từ lâu đã được coi là tác phẩm sách lịch sử kinh điển của sử học Việt Nam, cũng là cuốn sách để đời của học giả Trần Trọng Kim, Việt Nam sử lược hiện vẫn là bộ tín sử ngắn gọn súc tích, dễ nhớ dễ hiểu, sinh động và hấp dẫn nhất từ trước đến nay. ', 99000.00, 42, 'https://ddk.1cdn.vn/2020/12/10/image.daidoanket.vn-images-upload-binhnt-12102020-_a1.jpg', NULL),
(21, 'Bác Hồ Viết Tuyên Ngôn Độc Lập', 7, 'Kiều Mai ', NULL, 'Cuốn sách Bác Hồ Viết Tuyên Ngôn Độc Lập dựng lại thời điểm lịch sử ngắn nhưng rất quan trọng trong Cách mạng Tháng Tám 1945, thời điểm Bác Hồ viết bản Tuyên ngôn Độc lập khai sinh nước Việt Nam Dân chủ Cộng hoà. Tác giả Kiều Mai Sơn đã dày công thu thập, tìm hiểu, phân loại và đối chiếu các nguồn tài liệu để có thể có được những tư liệu chi tiết, cụ thể, xác tín về bản Tuyên ngôn Độc lập do Chủ tịch Hồ Chí Minh khởi thảo và hoàn thiện. Đó là tư liệu của những người được sống, làm việc cùng Chủ tịch Hồ Chí Minh viết lại hay kể lại như hồi kí Vũ Đình Hòe, hồi kí Trần Huy Liệu, hồi kí Võ Nguyên Giáp, hồi kí Lê Thanh Nghị…', 36000.00, 42, 'https://cdnmedia.baotintuc.vn/Upload/R5oI2WMTNtnutvmSrtEw/files/2021/09/bachoviettuyenngon.jpeg', NULL),
(22, 'Mặt Phải', 1, 'Adam J. Jackson', NULL, 'Nếu bạn muốn hiểu thế nào là tư duy tích cực và nhìn thấy ý nghĩa tốt đẹp của mọi việc, đây là quyển sách dành cho bạn.', 45000.00, 45, 'https://sachnoi.cc/wp-content/uploads/2023/01/Sach-Noi-Mat-Phai-Adam-J-Jackson-sachnoi.cc-03.jpg', NULL),
(23, 'Trên Đường Băng', 1, 'Tony Buổi Sáng', NULL, '\r\n\"Sách Trên Đường Băng\" là một trong những tác phẩm nổi tiếng của tác giả Tony Buổi Sáng. Đây là cuốn sách thuộc thể loại truyền cảm hứng và phát triển bản thân, đặc biệt phù hợp với những người trẻ đang tìm kiếm hướng đi trong cuộc sống.\r\nNội dung của sách được chia thành ba phần chính, tượng trưng cho ba giai đoạn quan trọng trong hành trình trưởng thành: Chuẩn bị hành trang, Trong phòng chờ sân bay, và Lên đường. Qua mỗi phần, tác giả chia sẻ những bài học thực tế, kinh nghiệm sống và góc nhìn độc đáo để khuyến khích độc giả bước ra khỏi vùng an toàn, trau dồi bản thân và vươn tới những chân trời mới.', 99000.00, 46, 'https://diendaniso.com/wp-content/uploads/2024/04/tren-duong-bang-tony-buoi-sang-12.jpg', NULL),
(24, 'Cà Phê Cùng Tony', 1, 'Tony Buổi Sáng', NULL, '\"Cà Phê Cùng Tony\" là một cuốn sách nổi tiếng của tác giả Tony Buổi Sáng, được viết theo phong cách tản văn nhẹ nhàng, hài hước và rất gần gũi. Đây là một trong những cuốn sách truyền cảm hứng hàng đầu dành cho giới trẻ Việt Nam, đặc biệt những ai đang trên hành trình phát triển bản thân, khởi nghiệp hoặc tìm kiếm hướng đi trong cuộc sống.\r\n\r\n', 79000.88, 47, 'https://lamsach5s.vn/wp-content/uploads/1526267834001-Slide6-768x432.jpg', NULL),
(26, 'Tư duy tích cực thay đổi cuộc sống', 1, 'Norman Vincent Peale', NULL, 'Khuyến khích bạn rèn luyện tư duy tích cực để đối mặt với khó khăn và đạt được thành công.', 78000.45, 48, 'https://phuhuynh.edu.vn/wp-content/uploads/2024/11/Tu-duy-tich-cuc-thay-doi-cuoc-song.png', NULL),
(27, 'Đừng Bao Giờ Đi Ăn Một Mình', 1, 'Keith Ferrazzi', NULL, 'Cuốn sách kỹ năng giao tiếp đáng để bạn mua đọc. Đừng Bao Giờ Đi Ăn Một Mình chỉ ra các tình huống và đưa ra những lời khuyên thực tế, giúp bạn nắm bắt được cách giao tiếp, xử lý tình huống được lòng người nhất. Nếu bạn không biết làm thế nào để bắt chuyện với một ai đó, kết nối giữa người với người, cách để chia sẻ đam mê, xây dựng bản thân, được mọi người đón nhận… thì Đừng Bao Giờ Đi Ăn Một Mình là cuốn sách giúp bạn giải quyết mọi vướng mắc này', 95000.00, 48, 'https://nhasachapollo.com/wp-content/uploads/2021/11/dung-bao-gio-di-an-mot-minh-2-1.jpeg', NULL),
(28, 'Khởi Nghiệp Bán Lẻ', 3, 'Trần Thanh Phong', NULL, 'Khởi nghiệp bán lẻ là một cuốn sách hay nên đọc về kinh doanh cho những ai đang kinh doanh online và offline, các chủ shop muốn nâng cao hiệu quả hoạt động của cửa hàng, nhà sản xuất muốn mở showroom bán sản phẩm,… hay bất kỳ ai yêu thích kinh doanh và ấp ủ giấc mơ làm giàu bền vững.', 77000.00, 45, 'https://nghenghiep.vieclam24h.vn/wp-content/uploads/2023/02/sach-hay-ve-kinh-doanh-03.jpg', NULL),
(29, 'Sát Thủ Bán Hàng', 3, 'Dany Khuong, Elavia', NULL, 'Sát Thủ Bán Hàng giúp bạn tìm kiếm những khách hàng mới. Cuốn sách đưa ra cho bạn các phương pháp xây dựng phễu bán hàng và tự động hoá công việc kinh doanh của mình.\r\n\r\n', 99000.00, 21, 'https://nghenghiep.vieclam24h.vn/wp-content/uploads/2023/02/sach-hay-ve-kinh-doanh-08-768x432.jpg', NULL),
(30, 'Kinh Doanh Giỏi Phải Kiếm Được Tiền', 3, 'Donald Miller', NULL, 'Cuốn sách Kinh doanh giỏi phải kiếm được tiền tập hợp 60 bài đọc giúp bạn trang bị những kiến thức căn bản. Từ đó, bạn phát triển những phẩm chất cần thiết cho sự phát triển nghề nghiệp cá nhân cũng như thành công trong kinh doanh.', 55000.00, 45, 'https://nghenghiep.vieclam24h.vn/wp-content/uploads/2023/02/sach-hay-ve-kinh-doanh-10-768x432.jpg', NULL),
(34, 'Bí Quyết Gây Dựng Cơ Nghiệp Bạc Tỷ', 3, 'Adam Khoo', NULL, 'Đây được đánh giá là bộ sách đầy đủ nhất về kinh doanh, khởi nghiệp và lãnh đạo đầu tiên tại Việt Nam. Mỗi cuốn sách chứa đựng những bí quyết kinh doanh thực tế của các tỷ phú Mỹ. Bởi vậy mà nó được mệnh danh là một cố vấn toàn năng, giúp bạn phát triển sự nhạy bén trong kinh doanh, quản lý và lãnh đạo.', 46000.00, 50, 'https://simg.zalopay.com.vn/zlp-website/assets/bi_quyet_gay_dung_co_nghiep_bac_ty_3656864578.jpg', NULL),
(35, 'Chí Phèo', 2, 'Nam Cao', NULL, 'Truyện kể về Chí Phèo - nhân vật được mệnh danh là con quỷ làng Vũ Đại với thói nghiện rượu và hay chửi bới. Tuy nhiên, Chí đáng trách mà cũng đáng thương đến đau lòng. Vốn là đứa trẻ bị bỏ rơi trong lò gạch, được người ta truyền tay nhau nuôi nấng, Chí chưa bao giờ nghĩ rằng mình sẽ bị người ta hãm hại. Để rồi một ngày, cậu thanh niên trai tráng bị cho vào tù một cách đầy oan ức. Khi trở ra, Chí không còn là chính mình của ngày xưa nữa.  ', 88000.00, 65, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEymlA1QthNmovJasovxb8v1C12TKRbYdqCw&s', NULL),
(36, 'Chúng Ta Sống Để Bước Tiếp', 2, 'Nguyễn Phong Việt', NULL, 'Chúng Ta Sống Để Bước Tiếp là hành trình tiếp nối Chúng ta sống để lắng nghe. Nghe để hiểu mình, hiểu người, hiểu những hữu hạn và vô định, hiểu những được và mất… Và để bước tiếp.', 71000.07, 34, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2KjwT0D42iZ2sOKOpEf3TOaVQWvNulz5bwQ&s', NULL),
(37, 'Chiếc Lá Cuối Cùng', 2, ' William Sydney Porter ', NULL, 'Tập truyện ngắn “Chiếc lá cuối cùng” do Nhà xuất bản Văn học phát hành tháng 4 năm 2020 gồm 13 truyện ngắn đặc sắc của O’ Henry. Trong đó, truyện ngắn “Chiếc lá cuối cùng”  được lấy làm tiêu đề cho tập truyện. Đây là phẩm quen thuộc với các thế hệ học sinh Việt Nam, được trích dạy trong chương trình Trung học cơ sở và để lại nhiều ấn tượng sâu sắc đáng nhớ bởi tính nhân văn trong truyện.', 59000.66, 56, 'https://www.reader.com.vn/uploads/images/chiec-la-cuoi-cung-khi-nghe-thuat-la-vi-con-nguoi-1.jpg', NULL),
(38, 'Họa Mi Và Hoa Hồng', 2, 'Tuy Oscar Wilde', NULL, 'Chín câu chuyện mà bạn đọc sẽ thưởng thức trong tập Họa mi và Hoa hồng này thực sự là chín bông hoa đẹp cả về hương lẫn sắc trong vườn hoa văn học Anh nói riêng và nhân loại nói chung.', 40000.88, 76, 'https://product.hstatic.net/200000391365/product/pts_logo_0906_417feb054e444e2f8e5b1c2b3bbc6acd_master.png', NULL),
(39, 'Sợi Tóc', 2, 'Thạch Lam', NULL, 'Sợi tóc thể hiện cái thiên tài hiếm có của Thạch Lam trong kỹ thuật mô tả tâm lý con người.\r\n\r\nNgòi bút của Thạch Lam đã dẫn chúng ta đi sâu vào tận đáy tâm hồn con người để ta chứng kiến được cái biên giới mong manh giữa thiện, ác, giữa ăn cắp hay không ăn cắp, cái địa giới chỉ mỏng manh như một sợi tóc.', 88000.00, 45, 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lmpj9vkaauhrea', NULL),
(40, 'Truyện Kiều', 2, 'Nguyễn Du', NULL, 'ây là nội dung cơ bản của “Truyện Kiều”, chứa đựng những bài học bằng xương bằng thịt cho đúc kết ở mục đầu và mục cuối, và cũng là nội dung sơ giải chính yếu thể hiện sự nỗ lực to lớn của tác giả. Đó là tình cảm và lòng tôn kính biết ơn sâu nặng của tác giả Nguyễn Vũ Trương Chiềng đối với đại thi hào dân tộc Nguyễn Du. ', 78000.00, 34, 'https://nhn.1cdn.vn/2020/11/04/nguoihanoi-com-vn-bia-sach-so-giai-truyen-kieu-nguyen-du.jpg', NULL),
(41, 'Bí Mật Tư Duy Triệu Phú', 3, 'T.Harv Eker', NULL, 'Thông qua cuốn sách, tác giả mong muốn người đọc sẽ có thêm động lực để theo đuổi mục tiêu thành công của cuộc đời mình, đồng thời thay đổi lối suy nghĩ để xác định được định hướng phù hợp nhất. Nếu bạn là một người có ý định khởi nghiệp thì đây chính là một trong những cuốn sách hay mà bạn nên đọc.', 37000.00, 41, 'https://simg.zalopay.com.vn/zlp-website/assets/bi_mat_tu_duy_trieu_phu_e326476a44.jpg', NULL),
(42, 'Chiến Lược Đại Dương Xanh', 4, 'W. Chan Kim & Renee Mauborgne', NULL, 'Trong cuốn sách quản trị kinh doanh được liệt vào hàng kinh điển này các doanh nhân, các nhà lãnh đạo doanh nghiệp sẽ được giới thiệu một một chiến lược cạnh tranh hoàn toàn mới: phát triển và mở rộng một thị trường mới - một đại dương xanh - trong đó không có cạnh tranh hoặc sự cạnh tranh là không cần thiết.', 21000.34, 22, 'https://static1.cafeland.vn/cafelandnew/hinh-anh/2020/10/17/163/chienluocdaiduongxanh-4.jpg', NULL),
(43, 'Tương Lai Của Quản Trị', 4, 'Gary Hamel Bill Breen', NULL, 'Trong cuốn sách này, tác giả Gary Hamel đã chứng minh rằng ngày nay các tổ chức đang cần đổi mới quản trị hơn bao giờ hết. Mô hình quản trị hiện tại tập trung vào kiểm soát và tính hiệu quả - không còn phù hợp trong một thế giới mà khả năng thích nghi và tính sáng tạo là không thể thiếu để vượt qua những thách thức mới, kinh doanh thành công.\r\n\r\n', 69000.33, 19, 'https://static1.cafeland.vn/cafelandnew/hinh-anh/2020/10/17/163/tuonglaicuaquantri-6.jpg', NULL),
(44, 'Tư Duy Nhanh Và Chậm', 4, 'Daniel Kahneman', NULL, 'Tư duy nhanh và chậm vì vậy một mặt giúp độc giả hiểu sâu sắc hơn về cách con người ra quyết định, các lỗi sai phổ biến và làm sao để cải thiện việc tư duy và đưa ra quyết định cho bản thân tốt hơn. Mặt khác, tất cả những người làm kinh doanh đều có thể nghiên cứu và ứng dụng hiểu biết này để phát triển công việc kinh doanh của mình.', 85000.66, 23, 'https://static1.cafeland.vn/cafelandnew/hinh-anh/2020/10/17/163/tu-duy-nhanh-va-cham-6.jpg', NULL),
(45, 'LÝ THUYẾT TRÒ CHƠI ', 4, 'Lê Hồng Nhật', NULL, 'Những chỉ dẫn chi tiết sau đó của tác giả giúp bất cứ ai cũng có thể áp dụng lý thuyết trò chơi vào quản trị kinh doanh, đám phán… để thay đổi công việc của mình, từ việc lập chiến lược cạnh tranh, đàm phán, đến marketing, quảng cáo…', 67000.11, 34, 'https://static1.cafeland.vn/cafelandnew/hinh-anh/2020/10/17/163/ly-thuyet-tro-choi-va-ung-dung-trong-quan-tri-kinh-doanh-7.jpg', NULL),
(46, 'Quốc Gia Khởi Nghiệp', 4, 'Dan Senor & Saul Singer', NULL, 'Cội nguồn, nguyên nhân của sự thành công đó chính là tinh thần Peres/ Chutzpah: sự quyết liệt, luôn hướng tới sự sáng tạo, khởi nghiệp; biến đổi những hoàn cảnh nguy nan trở thành các cơ hội hiếm có và hành động tức thì để có thể hiện thực hóa mọi ước mơ, suy nghĩ.', 77000.00, 33, 'https://static1.cafeland.vn/cafelandnew/hinh-anh/2020/10/17/163/quoc-gia-khoi-nghiep2.jpg', NULL),
(47, 'Kỹ năng Làm Việc Thông Minh', 5, 'Tony Schwartz', NULL, 'Có người làm cật lực, chăm chỉ suốt cả ngày cũng không bằng người khác làm trong 1 tiếng nên việc lấy thời gian để đo lường hiệu quả công việc là một sai lầm. Bởi hiệu quả công việc nằm ở chỗ cách bạn làm và hoàn thành chúng như thế nào, chính vì vậy mà kỹ năng làm việc thông minh sẽ được trọng dụng hơn thay vì làm việc chăm chỉ mà không năng suất. Và cuốn sách kỹ năng “Đừng Làm Việc Chăm Chỉ Hãy Làm Việc Thông Minh” sẽ giúp bạn rèn luyện những bí kíp để hoàn thành tốt nhất công việc của mình trong thời gian ngắn hạn nhất.', 81000.00, 45, 'https://bizbooks.vn/uploads/images/products/dung-lam-viec-cham-chi-hay-lam-viec-thong-minh(1).jpg', NULL),
(48, 'Thấu Hiểu Con Người', 5, 'Nate Regier Ph.D', NULL, 'Cuốn sách này được viết một cách rất sống động và dễ hiểu. Chảy dọc theo đó là câu chuyện về cuộc sống, việc làm và các mối quan hệ thân thiết của các nhân vật trong chuyện. Bạn đọc sẽ dễ dàng nắm bắt các lý thuyết, khái niệm qua những ví dụ mà các nhân vật áp dụng MHQTGT cho cuộc sống của họ', 78000.00, 24, 'https://bizweb.dktcdn.net/100/180/408/files/3-thauhieuconnguoi-700x650-mockup-c0910781-573b-4da9-bfd6-78d509004c17.png?v=1661916008229', NULL),
(49, 'Kỹ năng Lập Kế Hoạch ', 5, 'Quế Chi', NULL, 'Quản lý thời gian thông minh, làm việc với hiệu suất cao nhất đều là điều cần có ở mọi người thành công. Và với cuốn sách kỹ năng lập kế hoạch Tối Đa Hóa Hiệu Suất Công Việc – Việc 12 Tháng Làm Trong 12 Tuần sẽ giúp học được cách kiểm soát và làm việc tối ưu nhất tạo ra những kết quả phi thường.', 70000.22, 27, 'https://bizbooks.vn/uploads/images/products/toi-da-hieu-suat.jpg', NULL),
(50, 'Kỹ năng Quản Lý Thời Gian', 5, 'A.Bennett', NULL, 'Cuốn sách kỹ năng “Sống 24h mỗi ngày” sẽ giúp bạn tận dụng triệt để quỹ thời gian trong ngày thông qua 12 chương. Thông qua 12 chương đó, bạn đọc sẽ kiểm soát được thời gian mỗi ngày của mình bằng các phương pháp đơn giản mà ai cũng có thể thực hiện được.', 56000.00, 35, 'https://bizbooks.vn/uploads/images/products/song-24-gio-moi-ngay(1).jpg', NULL),
(51, 'Kỹ năng Quản trị thói quen ', 5, 'Rich Habits Poor Habits', NULL, 'Nếu bạn muốn hình thành những thói quen để đi đến thành công, bước trên con đường mình lựa chọn, tạo ra những điều phi thường xảy ra trong cuộc sống thì hãy lựa chọn cuốn sách kỹ năng tuyệt vời này.', 63000.00, 35, 'https://bizbooks.vn/uploads/images/products/rich-habits-poor-habits.jpg', NULL),
(52, 'Ngày Xưa Có Một Chuyện Tình', 6, 'Nguyễn Nhật Ánh', NULL, 'Đúng như tên gọi, đây là cuốn sách tiểu thuyết tình cảm lãng mạn về tình yêu, được viết theo một phong cách hoàn toàn khác lạ với nhà văn Nguyễn Nhật Ánh từ trước đến nay.\r\n', 99000.00, 24, 'https://newshop.vn/public/uploads/content/tieu-thuyet-viet-nam-ngay-xua-co-mot-chuyen-tinh-min.jpg', NULL),
(53, 'Không Gia Đình', 6, 'Hector Malot', NULL, '“KHÔNG GIA ĐÌNH kể chuyện về cuộc đời của cậu bé Rémi. Từ nhỏ, Rémi đã bị bắt cóc, rồi bị bố nuôi bán cho một đoàn xiếc thú. Em đã theo đoàn xiếc ấy đi lưu lạc khắp nước Pháp.\r\nRémi đã lớn lên trong gian khổ và lao động để sống. Lúc đầu em được sự dạy bảo của cụ Vitalis, về sau thì tự lập. Không những lo cho mình, em còn lo việc biểu diễn và kiếm sống cho cả một gánh hát rong… Nhưng dù ở đâu, trong cảnh ngộ nào, em vẫn noi theo nếp rèn dạy của cụ Vitalis giữ phẩm chất làm người. Đó là lòng yêu lao động, tự trọng, ngay thẳng, biết nhớ ơn nghĩa và luôn luôn muốn làm người có ích.', 67000.00, 22, 'https://tiki.vn/blog/wp-content/uploads/2023/09/tieu-thuyet-hay-khong-gia-dinh-1024x683.jpg', NULL),
(55, 'Ông Già Và Biển Cả', 6, 'Ernest Hemingway', NULL, 'Ông Già Và Biển Cả hay còn có tên tiếng Anh là The Old Man and the Sea, đây là một cuốn tiểu thuyết hay và vô cùng nổi tiếng được viết dưới ngòi bút của nhà văn người Mỹ - Ernest Hemingway. Tác phẩm được nhà văn sáng tác vào năm 1951 tại Cuba, đã mang về giải thưởng giá trị Pulitzer. Cuốn tiểu thuyết này được xem là tác phẩm thành công nhất trong sự nghiệp văn chương của nhà văn.\r\n\r\n', 45000.00, 66, 'https://simg.zalopay.com.vn/zlp-website/assets/Ong_Gia_Va_Bien_Ca_Ernest_Hemingway_835dd9296a.jpg', NULL),
(56, 'Đồi Gió Hú', 6, 'Ellis Bell', NULL, 'Đồi Gió Hú của nữ nhà văn Ellis Bell lại miêu tả tình yêu dưới góc nhìn của sự chân thật, hận thù và đầy rẫy những ám ảnh. Đó là một thứ tình yêu rất riêng và khác biệt, nó vượt qua những giá trị chuẩn mực về ý niệm đạo đức và bỏ qua những lề thói định kiến. Tác phẩm như bức tranh đầy sắc màu về sự tăm tối của lòng người, nỗi đau khổ, u sầu hay niềm vui sướng, hạnh phúc,...tất cả được vẽ ra vô cùng ảo diệu.', 52000.00, 20, 'https://simg.zalopay.com.vn/zlp-website/assets/deo_gio_hu_bdd3bd7b38.jpg', NULL),
(57, 'Nhà tiểu họa', 6, 'Jessie Burton', NULL, 'Nhà tiểu họa kể về cô gái trẻ Petronella (Nella) Oortman từ khi bắt đầu cuộc sống làm vợ thương gia giàu có Johannes Brandt đã luôn cảm thấy xa cách với gia đình chồng.\r\n\r\nCuộc sống của cô chỉ thay đổi khi Johannes tặng cho cô một ngôi nhà thu nhỏ, và nhiệm vụ của cô là phải trang trí cho ngôi nhà đó thông qua một nhà tiểu họa trên phố. Chính món quà này đã giúp cô nhìn sâu hơn vào thế giới và xã hội của giới thượng lưu tại Amsterdam, cũng như những nguy hiểm đang treo lơ lửng trên đầu họ', 78000.00, 46, 'https://cdn.baohatinh.vn/images/5e835c9b479a7bcee1a7d1b8eb0cea4c0c6a338d7487ba55f4de07be0c6f485c2b4301fe8a5ec11e6f05effa7744e5b0/77d4144024t6461l0.jpg', NULL),
(58, 'Thiếu Nữ Đeo Hoa Tai Ngọc Trai', 6, 'Tracy Chevalier', NULL, 'Cuốn sách được lấy cảm hứng từ bức tranh sơn dầu Thiếu nữ đeo hoa tai ngọc trai của họa sĩ người Hà Lan Johannes Vermeer. Ông là cây bút chuyên vẽ về cuộc sống của giới trung lưu trong xã hội thế kỷ 17. Bức tranh hiện được trưng bày tại bảo tàng Mauritshuis ở Den Haag, Hà Lan.', 46000.00, 35, 'https://cdn.baohatinh.vn/images/5e835c9b479a7bcee1a7d1b8eb0cea4c9398142a53be7efed03c2c97be6c4148ee44ad1d00846959b455c7c6fba4a964/77d4144024t6876l1.jpg', NULL),
(59, 'cr7', 5, 'cr7', NULL, NULL, 7000.00, 70, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_categories`
--

CREATE TABLE `book_categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_categories`
--

INSERT INTO `book_categories` (`category_id`, `category_name`, `description`) VALUES
(1, 'Phát triển bản thân', 'Sách phát triển bản thân'),
(2, 'Văn học', 'Sách văn học'),
(3, 'Kinh doanh', 'Sách kinh doanh'),
(4, 'Sách kinh tế', 'Sách kinh tế'),
(5, 'Sách kỹ năng', 'Sách kỹ năng'),
(6, 'Sách truyện,tiểu thuyết', 'Sách truyện,tiểu thuyết'),
(7, 'Sách lịch sử và chính trị', 'Sách lịch sử và chính trị');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_reviews`
--

CREATE TABLE `book_reviews` (
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_14_152758_create_book_categories_table', 2),
(5, '2024_12_14_152822_create_users_table', 2),
(6, '2024_12_14_152838_create_books_table', 2),
(7, '2024_12_14_152931_create_book_reviews_table', 2),
(8, '2024_12_14_153022_create_cart_items_table', 2),
(9, '2024_12_14_153049_create_orders_table', 2),
(10, '2024_12_14_153147_create_order_items_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `order_notes` text DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `customer_name`, `email`, `phone`, `address`, `payment_method`, `order_notes`, `total_amount`, `status`, `created_at`) VALUES
(2, 2, 'Nguyen Thanh Tam', 'customer1@bookstore.com.vn', '0868713558', '16 TL03', '1', NULL, 340000.00, 'completed', '2024-12-22 06:46:32'),
(3, 7, 'Nguyen Thanh Tam', 'thanhtam106@gmail.com', '0868713558', '16 TL03', '1', 'giao nhanh giúp tôi nha!!', 347000.00, 'cancelled', '2024-12-29 22:42:00'),
(4, 7, 'Nguyen Thanh Tam', 'thanhtam106@gmail.com', '0868713558', '16 TL03', '1', NULL, 137000.00, 'completed', '2024-12-29 22:43:22'),
(5, 7, 'Nguyễn Thành Tâm', '2200000922@nttu.edu.vn', '0868713558', '16 TL03', '1', 'giao nhanh giúp tôi  nha ^^', 164000.00, 'processing', '2024-12-30 22:24:40'),
(6, 2, 'Nguyen Thanh Tam', 'customer1@bookstore.com.vn', '0868713558', '16 TL03', '1', NULL, 80000.00, 'cancelled', '2024-12-31 20:29:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `book_id`, `quantity`, `price`, `subtotal`) VALUES
(3, 2, 16, 1, 161000.00, 161000.00),
(4, 2, 18, 1, 179000.00, 179000.00),
(5, 3, 2, 1, 80000.00, 80000.00),
(6, 3, 5, 3, 89000.00, 267000.00),
(7, 4, 8, 1, 49000.00, 49000.00),
(8, 4, 35, 1, 88000.00, 88000.00),
(9, 5, 9, 1, 69000.00, 69000.00),
(10, 5, 14, 1, 95000.00, 95000.00),
(11, 6, 2, 1, 80000.00, 80000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1LVlVU2e7aVafGLUVxT7fQufJYxZ7JzUwgR3Eex7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 CCleaner/130.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRGlmeHEyUEExN2FSOE8zM21LeWR6cWpOQWRTdnc0bTlEUTZLbnQxeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735728639),
('qzLPxYkkXD5P5ewjl3XBMJdsQhMIJW4Ll62m8OjL', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 CCleaner/130.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQUNtdG9qeEl4UlBEb244Tld2cXVqczdUYmRBNkxjTEJ3c3pLN3ViUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9vcmRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6ImNhcnQiO2E6MTp7aToxOTthOjI6e3M6ODoicXVhbnRpdHkiO3M6MToiMSI7czo4OiJzZWxlY3RlZCI7czo0OiJ0cnVlIjt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1735718684);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL DEFAULT 'Male',
  `birth_date` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','customer','staff') NOT NULL DEFAULT 'customer',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `full_name`, `gender`, `birth_date`, `phone`, `address`, `role`, `is_active`, `created_at`) VALUES
(1, 'admin', 'adminthanhtam@bookstore.com.vn', '123456', 'Admin Thành Tâm', 'Male', NULL, NULL, NULL, 'admin', 1, '2024-11-30 20:54:00'),
(2, 'customer1', 'customer1@bookstore.com.vn', '123456', 'Customer', 'Male', NULL, NULL, NULL, 'customer', 1, '2024-11-30 20:54:00'),
(5, 'ThanhTam', '2200000922@nttu.edu.vn', '123456', 'Nguyễn Thành Tâm', 'Male', NULL, NULL, NULL, 'admin', 1, '2024-12-15 07:48:36'),
(6, 'thanhtam16', 'thanhtam@booksstore.com', '$2y$12$Bh/jZQKLVzIj04IfIah.bOJ8OZkCcNevqrTMrR6S8mDTDk50kUPSu', 'Thành Tâm', 'Male', NULL, NULL, NULL, 'customer', 1, '2024-12-19 12:46:14'),
(7, 'thanhtam106', 'thanhtam106@gmail.com', '12345678', 'Nguyễn Thành Tâm', 'Male', NULL, NULL, NULL, 'admin', 1, '2024-12-30 05:41:14');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `book_reviews_book_id_foreign` (`book_id`),
  ADD KEY `book_reviews_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `cart_items_book_id_foreign` (`book_id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_book_id_foreign` (`book_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `book_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `book_reviews`
--
ALTER TABLE `book_reviews`
  MODIFY `review_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `book_categories` (`category_id`);

--
-- Các ràng buộc cho bảng `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD CONSTRAINT `book_reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `book_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
