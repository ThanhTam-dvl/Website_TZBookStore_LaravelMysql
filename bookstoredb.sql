-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2024 lúc 04:17 PM
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
-- Cơ sở dữ liệu: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `image_url` varchar(255) DEFAULT NULL,
  `published_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`book_id`, `title`, `category_id`, `author`, `publisher`, `description`, `price`, `stock_quantity`, `image_url`, `published_date`) VALUES
(1, 'Đắc Nhân Tâm', 1, 'Dale Carnegie', NULL, 'Quyển sách đưa ra các lời khuyên về cách thức cư xử, ứng xử và giao tiếp với mọi người để đạt được thành công trong cuộc sống', 99.00, 20, 'https://cungdocsach.vn/wp-content/uploads/2020/10/%C4%90%E1%BA%AFc-nh%C3%A2n-t%C3%A2m-3.jpg', NULL),
(2, 'Nhà Giả Kim', 1, 'Paulo Coelho', NULL, 'Những triết lý sâu sắc trong \"Nhà Giả Kim\" nhấn mạnh vào ý tưởng rằng mỗi người đều có khả năng biến giấc mơ của mình thành hiện thực, miêu tả sự quan trọng của việc khám phá và theo đuổi ước mơ của mình, dù cho có gặp phải những khó khăn và thử thách như thế nào.', 80.00, 20, 'https://doanducdong.com/wp-content/uploads/2021/10/nha-gia-kim-1.jpg', NULL),
(3, '7 Thói Quen Hiệu Quả', 3, 'Stephen Covey', NULL, '\"7 Thói Quen Hiệu Quả\" của Stephen R. Covey là một cuốn sách về phát triển cá nhân và quản lý cuộc sống. Cuốn sách giới thiệu bảy thói quen giúp con người trở nên hiệu quả hơn trong cuộc sống và công việc...', 99.00, 20, 'https://sachnoi.cc/wp-content/uploads/2021/09/Sach-Noi-7-thoi-quen-de-thanh-dat-Stephen-R-Covey-audio-book-sachnoi.cc-5.jpg', NULL),
(4, 'Messi vs Ronaldo', 6, 'M10 vs CR7', NULL, 'Cuộc chiến giữa GOAT bóng đá và GOAT Youtube', 17.00, 17, 'https://cdn.bongdaplus.vn/Assets/Media/2019/04/03/62/messi-anh-chu.jpg', NULL),
(5, 'Tư duy ngược', 1, 'Nguyễn Anh Dũng', NULL, 'Cuốn sách này khám phá và khuyến khích người đọc áp dụng phương pháp tư duy ngược để giải quyết vấn đề và đạt được thành công trong cuộc sống.', 89.00, 20, 'https://sbooks.vn/wp-content/uploads/2024/06/Sach-Tu-Duy-Nguoc.jpeg', NULL),
(6, 'Rèn luyện tư duy phản biện', 1, 'Albert Rutheford', NULL, 'Một cuốn sách cung cấp các phương pháp và công cụ để phát triển khả năng tư duy phản biện. Sách giúp người đọc nhận diện và đánh giá các lập luận, phân biệt giữa các lý lẽ hợp lý và không hợp lý, cũng như cách tránh các sai lầm trong lập luận...', 79.00, 20, 'https://phamvanquy.com/wp-content/uploads/2023/04/06a7831bd25ac833631eb5744907f373.jpg', NULL),
(7, 'Hoàng tử bé', 2, 'Antoine de Saint-Exupéry', NULL, 'Thông qua hành trình khám phá các hành tinh khác nhau của Hoàng Tử Bé, câu chuyện đưa ra những bài học sâu sắc về tình yêu, tình bạn, sự trưởng thành và cách nhìn nhận thế giới một cách trong sáng, chân thành. Với lối viết giàu hình ảnh và ẩn dụ, \"Hoàng Tử Bé\" không chỉ dành cho trẻ em mà còn mang ý nghĩa sâu sắc đối với người lớn.', 50.00, 21, 'https://img.tripi.vn/cdn-cgi/image/width=700,height=700/https://gcs.tripi.vn/public-tripi/tripi-feed/img/473670otI/hoang-tu-be-1054177.jpg', NULL),
(8, 'Sổ đỏ', 2, 'Vũ Trọng Phụng', NULL, 'Tác phẩm là một bức tranh châm biếm sâu sắc về xã hội Việt Nam thời kỳ thuộc địa, nơi sự suy đồi đạo đức, thói hư danh và lối sống trụy lạc được phơi bày một cách trần trụi.\r\n\r\nNhân vật chính, Xuân Tóc Đỏ, là một kẻ vô học nhưng nhờ vận may và sự láu cá, đã leo lên những vị trí cao trong xã hội. Qua hành trình của Xuân, tác phẩm chế nhạo các giá trị giả tạo của tầng lớp thượng lưu và sự tha hóa của văn hóa thời bấy giờ.\r\n\r\n\"Số Đỏ\" không chỉ là một câu chuyện hài hước mà còn mang ý nghĩa phê phán xã hội sâu sắc, khẳng định tài năng và tầm nhìn của Vũ Trọng Phụng trong văn học hiện thực phê phán.', 49.00, 21, 'https://cdn.tgdd.vn/Files/2023/03/10/1516432/10-cuon-sach-van-hoc-hay-tieu-thuyet-van-hoc-kinh-dien-202303110854161072.jpg', NULL),
(9, 'Đạo kinh doanh', 3, 'Nguyễn Anh Dũng', NULL, 'Tập trung vào việc khai thác triết lý kinh doanh từ góc nhìn sâu sắc về đạo đức, nhân văn và văn hóa Á Đông. Cuốn sách không chỉ đưa ra những bài học về cách làm giàu bền vững mà còn nhấn mạnh sự cân bằng giữa lợi ích kinh tế và giá trị đạo đức.\r\n\r\nTác giả Nguyễn Anh Dũng kết hợp giữa kinh nghiệm thực tiễn và tư duy triết học để trình bày những nguyên tắc kinh doanh có ý nghĩa vượt thời gian. Nội dung phù hợp với doanh nhân, nhà quản lý và cả những người đang tìm kiếm sự phát triển toàn diện trong cuộc sống và sự nghiệp.', 69.00, 22, 'https://static-images.vnncdn.net/files/publish/2023/10/11/dao-kinh-doanh-lot-top-10-cuon-sach-dang-doc-545.jpeg?width=0&s=qEYJLCJxaZvJNH4-qBaL1g', NULL),
(10, 'Sự Giàu Và Nghèo Của Các Dân ', 4, 'David S.Landes', NULL, 'Sự Giàu và Nghèo của Các Dân Tộc\" (tên gốc: The Wealth and Poverty of Nations) là một cuốn sách nổi tiếng của nhà sử học kinh tế David S. Landes, xuất bản lần đầu năm 1998. Cuốn sách là một nghiên cứu toàn diện về lý do tại sao một số quốc gia trở nên giàu có, trong khi những quốc gia khác vẫn nghèo đói qua nhiều thế kỷ.', 78.00, 31, 'https://img.lazcdn.com/g/p/f1ad3e9d8eb9093315528b22ec767d53.jpg_960x960q80.jpg_.webp', NULL),
(11, 'Biến Mọi Thứ Thành Tiền ', 4, 'Nguyễn Anh Dũng', NULL, 'Bí quyết giúp bạn thoát nghèo để đạt được thành công và giàu có thực sự “Biến mọi thứ thành tiền” là cuốn sách xoay quanh chủ đề tài chính cá nhân. Đây là vấn đề đang được nhiều người, trong đó có các bạn trẻ đặc biệt quan tâm.\r\nTác giả chia sẻ: “Tiền được tạo ra bởi trí tuệ, sức lao động, thời gian của con người nên những gì tạo ra trí tuệ, sức khỏe, tiết kiệm thời gian đều sẽ tạo ra tiền.”', 79.00, 32, 'https://vn-test-11.slatic.net/p/b9de58071dd5dd135984bd9ebaf21521.png', NULL),
(12, 'Tư Duy Kinh Tế', 4, 'Lượng Thúc', NULL, 'Cuốn sách “Tư duy kinh tế - 50 bài giảng để hiểu quy luật làm giàu” tập trung truyền đạt các nguyên lý kinh tế học của trường phái Áo dưới dạng tiểu luận tổng hợp, đồng thời sử dụng các nguyên lý này để giải thích và phân tích nhiều trường hợp trong kinh doanh, giai thoại trong thế giới thực, cổ đại và hiện đại, trên toàn thế giới liên quan đến nhiều nội dung: Từ giá trị, quyền sở hữu, cạnh tranh cho đến vấn đề mang tính nhận thức như bản chất con người, đạo đức, nhận thức… bằng một văn phong mộc mạc và giản dị.', 99.00, 33, 'https://bizbooks.vn/uploads/images/2023/thang-9/sach-tu-duy-kinh-te.jpg', NULL),
(13, 'Tôi Tài Giỏi Bạn Cũng Thế', 5, 'Adam khoo', NULL, 'Cuốn sách cung cấp những phương pháp học thông minh như: phát triển trí não để ghi nhớ các sự kiện, con số một cách dễ dàng, sơ đồ tư duy, thành thạo quản lý thời gian, xác định mục tiêu một cách khoa học. Tài giỏi mang lại sự tự tin, hướng dẫn bạn cách thức trở thành người tài giỏi qua sẽ lập được kế hoạch cho cuộc đời của chính mình.', 67.00, 34, 'https://file.hstatic.net/200000504927/article/toi_tai_gioi_ban_cung_the_2_01b44b5ea7b54cc9b43788751ef421a0.jpg', NULL),
(14, 'Kĩ Năng Giao Tiếp Đỉnh Cao', 5, 'Lý Tử Quyên', NULL, 'Ngạn ngữ xưa có câu “Học ăn, học nói, học gói, học mở” đã chỉ ra sự quan trọng của việc ăn nói.\r\nTừ xưa đến nay, con người giao tiếp không đơn thuần chỉ để truyền đạt những điều trong tâm tư mà nó còn là phương thức để người thấu hiểu người trong tình cảm, để thăng tiến trong sự nghiệp và để tỏ rõ sự hiểu biết của mình với thế giới bên ngoài.\r\nBiết im lặng đúng lúc cũng là một cách giao tiếp thông minh, biết nói đúng đủ để đem lại hiệu quả mà người nói muốn là điều ai cũng mong đạt được. Tất cả những kỹ năng được gói gọn trong “Giao tiếp đỉnh cao”- cuốn sách giúp bạn trở thành người làm chủ được khả năng giao tiếp, mở rộng mối quan hệ và đạt được thành công.', 95.00, 35, 'https://bizweb.dktcdn.net/thumb/grande/100/490/462/products/298c75df6aded2cc81fba3aa18db2c8a-jpg-jpeg.jpg?v=1699093799380', NULL),
(15, 'Kỹ năng hoạt động nhóm', 5, 'Lam Hạnh', NULL, 'Sách minh họa cách các nhóm bạn làm việc cùng nhau để giải quyết vấn đề hoặc hoàn thành dự án. Tập trung vào việc giúp trẻ nhận ra tầm quan trọng của mỗi thành viên trong nhóm.', 56.00, 36, 'https://bizweb.dktcdn.net/100/222/758/products/kns-hoat-dong-nhom.jpg?v=1603871571077', NULL),
(16, 'Harry Potter Và Hòn Đá Phù Thuỷ ', 6, 'J.K.Rowling, Lý Lan', NULL, 'Khi một lá thư được gởi đến cho cậu bé Harry Potter bình thường và bất hạnh, cậu khám phá ra một bí mật đã được che giấu suốt cả một thập kỉ. Cha mẹ cậu chính là phù thủy và cả hai đã bị lời nguyền của Chúa tể Hắc ám giết hại khi Harry mới chỉ là một đứa trẻ, và bằng cách nào đó, cậu đã giữ được mạng sống của mình. Thoát khỏi những người giám hộ Muggle không thể chịu đựng nổi để nhập học vào trường Hogwarts, một trường đào tạo phù thủy với những bóng ma và phép thuật, Harry tình cờ dấn thân vào một cuộc phiêu lưu đầy gai góc khi cậu phát hiện ra một con chó ba đầu đang canh giữ một căn phòng trên tầng ba. Rồi Harry nghe nói đến một viên đá bị mất tích sở hữu những sức mạnh lạ kì, rất quí giá, vô cùng nguy hiểm, mà cũng có thể là mang cả hai đặc điểm trên.\r\n\r\n\r\n', 161.00, 36, 'https://cdn.tuoitre.vn/zoom/480_300/2020/5/6/harrypotterandthesorcerersstone-413143814-large-1588728259956566714678-crop-1588728354635894481094.jpg', NULL),
(17, 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh', 6, 'Nguyễn Nhật Ánh', NULL, ' Tôi thấy hoa vàng trên cỏ xanh là một tiểu thuyết dành cho thanh thiếu niên của nhà văn Nguyễn Nhật Ánh, xuất bản lần đầu tại Việt Nam vào ngày 9 tháng 12 năm 2010 bởi Nhà xuất bản Trẻ với phần tranh minh họa do Đỗ Hoàng Tường thực hiện. Đây là một trong các truyện dài của Nguyễn Nhật Ánh, ra đời sau Đảo mộng mơ và trước Lá nằm trong lá. Tác phẩm như một tập nhật ký xoay quanh cuộc sống của những đứa trẻ ở một vùng quê Việt Nam nghèo khó, nổi bật lên là thông điệp về tình anh em, tình làng nghĩa xóm và những tâm tư của tuổi mới lớn. Theo Nguyễn Nhật Ánh, đây là lần đầu tiên ông đưa vào truyện của mình những nhân vật phản diện, đặt ra vấn đề đạo đức như sự vô tâm hay cái ác', 89.00, 38, 'https://www.netabooks.vn/Data/Sites/1/media/sach-2023/toi-thay-hoa-vang-tren-co-xanh/toi-thay-hoa-vang-tren-co-xanh.jpg', NULL),
(18, 'Vòm Rừng', 6, 'Richard Powers\r\n', NULL, '“Vòm rừng” là một cuốn tiểu thuyết hấp dẫn của tác giả Richard Powers, mô tả một hành trình kỳ diệu của sự kết nối giữa con người và thiên nhiên. Cuốn sách này khám phá một cách tài tình mối quan hệ phức tạp giữa con người và môi trường tự nhiên, đồng thời đề cao tầm quan trọng của việc bảo vệ và tôn trọng thiên nhiên.\r\n\r\n', 179.00, 40, 'https://www.ereviewsach.com/wp-content/uploads/2024/01/Vom-rung.jpg', NULL),
(19, 'Lịch Sử Việt Nam', 7, 'Nguyễn Ngọc Mão', NULL, 'Bộ “Lịch sử Việt Nam” được kết cấu theo các thời kỳ: Thời kỳ cổ - trung đại (từ thời tiền sử đến năm 1858, khi thực dân Pháp nổ sung xâm lược Việt Nam); Thời kỳ cận đại (thời kỳ thực dân Pháp xâm lược, biến Việt Nam thành thuộc địa đến Cách mạng tháng Tám năm 1945 thành công) và Thời kỳ hiện đại (từ khi nước Việt Nam Dân chủ Cộng hòa ra đời cho đến nay). Bộ sách Lịch sử Việt Nam gồm 15 tập.\r\nTheo dòng thời gian, Việt Nam đã có một nền sử học truyền thống với những bộ quốc sử và nhiều công trình nghiên cứu, biên soạn đồ sộ như: Đại Việt sử ký; Đại Việt sử ký toàn thư; Phủ biên tạp lục; Gia Định thành thông chí; Đại Nam nhất thống chí...', 99.00, 41, 'https://image.tienphong.vn/w890/Uploaded/2024/lkyqski001/2017_08_27/anh1b_YJEW.jpg', NULL),
(20, 'Việt Nam Sử Lược', 7, 'Trần Trọng Kim', NULL, 'Việt Nam sử lược của Trần Trọng Kim xuất bản lần đầu năm 1920, dựa trên những nghiên cứu trước đó như Nam sử tiểu học và Sơ học An Nam sử lược từ những năm 1914 -1917, là bộ thông sử viết bằng chữ quốc ngữ đầu tiên của Việt Nam được soạn theo phương pháp hiện đại.Từ lâu đã được coi là tác phẩm sách lịch sử kinh điển của sử học Việt Nam, cũng là cuốn sách để đời của học giả Trần Trọng Kim, Việt Nam sử lược hiện vẫn là bộ tín sử ngắn gọn súc tích, dễ nhớ dễ hiểu, sinh động và hấp dẫn nhất từ trước đến nay. ', 99.00, 42, 'https://ddk.1cdn.vn/2020/12/10/image.daidoanket.vn-images-upload-binhnt-12102020-_a1.jpg', NULL),
(21, 'Bác Hồ Viết Tuyên Ngôn Độc Lập', 7, 'Kiều Mai ', NULL, 'Cuốn sách Bác Hồ Viết Tuyên Ngôn Độc Lập dựng lại thời điểm lịch sử ngắn nhưng rất quan trọng trong Cách mạng Tháng Tám 1945, thời điểm Bác Hồ viết bản Tuyên ngôn Độc lập khai sinh nước Việt Nam Dân chủ Cộng hoà. Tác giả Kiều Mai Sơn đã dày công thu thập, tìm hiểu, phân loại và đối chiếu các nguồn tài liệu để có thể có được những tư liệu chi tiết, cụ thể, xác tín về bản Tuyên ngôn Độc lập do Chủ tịch Hồ Chí Minh khởi thảo và hoàn thiện. Đó là tư liệu của những người được sống, làm việc cùng Chủ tịch Hồ Chí Minh viết lại hay kể lại như hồi kí Vũ Đình Hòe, hồi kí Trần Huy Liệu, hồi kí Võ Nguyên Giáp, hồi kí Lê Thanh Nghị…', 36.00, 42, 'https://cdnmedia.baotintuc.vn/Upload/R5oI2WMTNtnutvmSrtEw/files/2021/09/bachoviettuyenngon.jpeg', NULL),
(22, 'Mặt Phải', 1, 'Adam J. Jackson', NULL, 'Nếu bạn muốn hiểu thế nào là tư duy tích cực và nhìn thấy ý nghĩa tốt đẹp của mọi việc, đây là quyển sách dành cho bạn.', 45.00, 45, 'https://sachnoi.cc/wp-content/uploads/2023/01/Sach-Noi-Mat-Phai-Adam-J-Jackson-sachnoi.cc-03.jpg', NULL),
(23, 'Trên Đường Băng', 1, 'Tony Buổi Sáng', NULL, '\r\n\"Sách Trên Đường Băng\" là một trong những tác phẩm nổi tiếng của tác giả Tony Buổi Sáng. Đây là cuốn sách thuộc thể loại truyền cảm hứng và phát triển bản thân, đặc biệt phù hợp với những người trẻ đang tìm kiếm hướng đi trong cuộc sống.\r\nNội dung của sách được chia thành ba phần chính, tượng trưng cho ba giai đoạn quan trọng trong hành trình trưởng thành: Chuẩn bị hành trang, Trong phòng chờ sân bay, và Lên đường. Qua mỗi phần, tác giả chia sẻ những bài học thực tế, kinh nghiệm sống và góc nhìn độc đáo để khuyến khích độc giả bước ra khỏi vùng an toàn, trau dồi bản thân và vươn tới những chân trời mới.', 99.00, 46, 'https://diendaniso.com/wp-content/uploads/2024/04/tren-duong-bang-tony-buoi-sang-12.jpg', NULL),
(24, 'Cà Phê Cùng Tony', 1, 'Tony Buổi Sáng', NULL, '\"Cà Phê Cùng Tony\" là một cuốn sách nổi tiếng của tác giả Tony Buổi Sáng, được viết theo phong cách tản văn nhẹ nhàng, hài hước và rất gần gũi. Đây là một trong những cuốn sách truyền cảm hứng hàng đầu dành cho giới trẻ Việt Nam, đặc biệt những ai đang trên hành trình phát triển bản thân, khởi nghiệp hoặc tìm kiếm hướng đi trong cuộc sống.\r\n\r\n', 79.88, 47, 'https://lamsach5s.vn/wp-content/uploads/1526267834001-Slide6-768x432.jpg', NULL),
(26, 'Tư duy tích cực thay đổi cuộc sống', 1, 'Norman Vincent Peale', NULL, 'Khuyến khích bạn rèn luyện tư duy tích cực để đối mặt với khó khăn và đạt được thành công.', 78.45, 48, 'https://phuhuynh.edu.vn/wp-content/uploads/2024/11/Tu-duy-tich-cuc-thay-doi-cuoc-song.png', NULL),
(28, 'Kinh doanh theo mạng', 3, 'Nguyễn Tiến Dũng', NULL, 'Sách Nói Cẩm Nang Thủ Lĩnh Kinh Doanh Theo Mạng', 45.00, 21, 'https://doanducdong.com/wp-content/uploads/2022/03/cam-nang-thu-linh-kinh-doanh-theo-mang.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_categories`
--

CREATE TABLE `book_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `review_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `review_text` text DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_items`
--

INSERT INTO `cart_items` (`cart_item_id`, `book_id`, `user_id`, `quantity`) VALUES
(23, 1, 1, 1),
(25, 7, 8, 1),
(27, 9, 7, 2),
(37, 2, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `order_notes` text DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `customer_name`, `email`, `phone`, `address`, `payment_method`, `order_notes`, `total_amount`, `status`, `created_at`) VALUES
(1, 1, 'Nguyen Thanh Tam', 'nguyenthanhtam10062004@gmail.com', '0868713558', '16 TL03', '1', '', 198.00, 'pending', '2024-12-08 12:02:45'),
(2, 1, 'Nguyen Thanh Tam', 'nguyenthanhtam10062004@gmail.com', '0868713558', '16 TL03', '2', '', 80.00, 'pending', '2024-12-08 12:43:41'),
(3, 1, 'Nguyen Duy Nhat', 'nguyenthanhtam10062004@gmail.com', '0868713558', '16 TL03', '1', '', 160.00, 'pending', '2024-12-08 14:10:52'),
(4, 1, 'Nguyen Thanh Tam', 'nguyenthanhtam10062004@gmail.com', '0868713558', '16 TL03', '1', '', 49.00, 'pending', '2024-12-09 10:22:05'),
(5, 1, 'Nguyen Duy Nhat', '2200000922@nttu.edu.vn', '0868713558', '16 TL03', '2', '', 98.00, 'pending', '2024-12-10 14:26:41'),
(6, 1, 'Thành Tâm', 'nguyenthanhtam10062004@gmail.com', '0868713558', '16 TL03', '1', 'giao nhanh giúp tôi', 138.00, 'cancelled', '2024-12-11 02:52:03'),
(7, 2, 'Customer', 'customer1@bookstore.com.vn', '0868713558', '16 TL03', '1', '', 207.00, 'pending', '2024-12-11 05:44:15'),
(8, 2, 'Customer', 'customer1@bookstore.com.vn', '0868713558', '16 TL03', '1', '', 159.00, 'cancelled', '2024-12-11 05:48:55'),
(9, 2, 'Customer', 'customer1@bookstore.com.vn', '0868713558', '16 TL03', '1', '', 80.00, 'pending', '2024-12-11 05:49:23'),
(10, 2, 'Customer', 'customer1@bookstore.com.vn', '0868713558', '16 TL03', '1', '', 159.00, 'pending', '2024-12-11 05:51:35'),
(11, 2, 'Customer', 'customer1@bookstore.com.vn', '0868713558', '16 TL03', '1', '', 99.00, 'pending', '2024-12-11 06:01:11'),
(12, 2, 'Customer', 'customer1@bookstore.com.vn', '0868713558', '16 TL03', '1', '', 49.00, 'shipping', '2024-12-11 06:04:03'),
(13, 2, 'Customer', 'customer1@bookstore.com.vn', '0868713558', '16 TL03', '1', '', 149.00, 'processing', '2024-12-11 07:21:59'),
(14, 2, 'Customer', 'customer1@bookstore.com.vn', '0868713558', '16 TL03', '1', '', 49.00, 'completed', '2024-12-11 07:30:20'),
(15, 2, 'Customer', 'customer1@bookstore.com.vn', '1234', '16 TL03', '1', '', 237.00, 'cancelled', '2024-12-11 09:45:24'),
(16, 1, 'Nguyễn Thành Tâm', 'adminthanhtam@bookstore.com.vn', '0868713558', '16 TL03', '1', '', 100.00, 'pending', '2024-12-11 14:37:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `book_id`, `quantity`, `price`, `subtotal`) VALUES
(1, 1, NULL, 2, 99.00, 198.00),
(2, 2, NULL, 1, 80.00, 80.00),
(3, 3, NULL, 2, 80.00, 160.00),
(4, 4, NULL, 1, 49.00, 49.00),
(5, 5, NULL, 2, 49.00, 98.00),
(6, 6, NULL, 2, 69.00, 138.00),
(7, 7, 11, 2, 79.00, 158.00),
(8, 7, 8, 1, 49.00, 49.00),
(9, 8, 2, 1, 80.00, 0.00),
(10, 8, 11, 1, 79.00, 0.00),
(11, 9, 2, 1, 80.00, 0.00),
(12, 10, 2, 1, 80.00, 80.00),
(13, 10, 11, 1, 79.00, 79.00),
(14, 11, 12, 1, 99.00, 99.00),
(15, 12, 8, 1, 49.00, 49.00),
(16, 13, 2, 1, 80.00, 80.00),
(17, 13, 9, 1, 69.00, 69.00),
(18, 14, 8, 1, 49.00, 49.00),
(19, 15, 11, 3, 79.00, 237.00),
(20, 16, 7, 2, 50.00, 100.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other') DEFAULT 'Male',
  `birth_date` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','customer','staff') DEFAULT 'customer',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `full_name`, `gender`, `birth_date`, `phone`, `address`, `role`, `is_active`, `created_at`) VALUES
(1, 'Admin Thành Tâm', 'adminthanhtam@bookstore.com.vn', '123456', 'Nguyễn Thành Tâm', 'Male', NULL, '0868713558', NULL, 'admin', 1, '2024-12-01 03:54:00'),
(2, 'customer1', 'customer1@bookstore.com.vn', '123456', 'Customer', 'Male', NULL, NULL, NULL, 'customer', 1, '2024-12-01 03:54:00'),
(3, 'Khách hàng 2', 'customer2@bookstore.gmail.com', '123456', 'Customer2', 'Male', NULL, NULL, NULL, 'customer', 0, '2024-12-10 16:17:18'),
(7, 'CustomerThanhTam', 'customerthanhtam@gmail.com', '123456', 'Nguyễn Thành Tâm', 'Male', NULL, NULL, NULL, 'customer', 1, '2024-12-10 16:21:34'),
(8, 'Duy Nhật', 'duynhat@gmail.com.vn', 'duynhat', 'Nguyễn Duy Nhật', 'Male', NULL, NULL, NULL, 'customer', 1, '2024-12-10 16:54:35'),
(9, 'admin 2', 'admin2@bookstore.com', '123456', 'a đê min 2', 'Male', NULL, NULL, NULL, 'admin', 1, '2024-12-11 11:54:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category_id` (`category_id`);

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
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `book_reviews`
--
ALTER TABLE `book_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `book_categories` (`category_id`);

--
-- Các ràng buộc cho bảng `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD CONSTRAINT `book_reviews_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `book_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
