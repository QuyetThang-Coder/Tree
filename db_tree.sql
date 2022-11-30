-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2022 lúc 12:29 PM
-- Phiên bản máy phục vụ: 8.0.19
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_tree`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int NOT NULL,
  `image_banner` varchar(550) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `image_banner`) VALUES
(1, 'banner.jpg'),
(2, 'Green_main_201608.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int NOT NULL,
  `id_product` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `id_product`, `quantity`, `user`) VALUES
(97, 16, 2, 1),
(98, 15, 4, 1),
(99, 16, 2, 25),
(120, 30, 1, 27),
(124, 12, 2, 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int NOT NULL,
  `name_category` varchar(550) NOT NULL,
  `deleted` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name_category`, `deleted`) VALUES
(1, 'Cây cảnh thủy sinh', 0),
(2, 'Cây cảnh văn phòng', 0),
(3, 'Cây cảnh để bàn', 0),
(4, 'Cây cảnh ban công', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int NOT NULL,
  `id_product` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `comment` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `id_product`, `id_user`, `comment`, `created_at`, `deleted_at`, `deleted`) VALUES
(1, 1, 27, 'Cây rất đẹp', '2022-11-19 08:36:34', '2022-11-19 08:36:34', 0),
(2, 1, 26, 'Cây rất đẹp', '2022-11-19 08:57:35', '2022-11-19 08:57:35', 0),
(3, 18, 27, 'Cây rất đẹp', '2022-11-19 09:30:20', '2022-11-19 09:30:20', 0),
(4, 18, 26, 'Cây rất đẹp', '2022-11-19 09:31:02', '2022-11-19 09:31:02', 0),
(5, 18, 26, 'Cây rất đẹp', '2022-11-19 09:31:02', '2022-11-19 09:31:02', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int NOT NULL,
  `name` varchar(550) DEFAULT NULL,
  `email` varchar(550) DEFAULT NULL,
  `number_phone` varchar(10) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `desc_contact` longtext,
  `deleted` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `number_phone`, `address`, `desc_contact`, `deleted`) VALUES
(1, 'Lê Thúy Uyên', 'uyenle@gmail.com', '0911495923', '106 Doãn Kế Thiện', 'Cây rất đẹp', 0),
(2, 'Lại Quyết Thắng', 'thang24@gmail.com', '0946312559', '105 Doãn Kế Thiện', 'Cây rất đẹp', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_introduce`
--

CREATE TABLE `tbl_introduce` (
  `id` int NOT NULL,
  `introduce_txt` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_introduce`
--

INSERT INTO `tbl_introduce` (`id`, `introduce_txt`) VALUES
(1, '<h2>C&acirc;y cảnh Store - đơn vị cung cấp c&acirc;y cảnh uy t&iacute;n tại H&agrave; Nội</h2><p>Xuất ph&aacute;t từ nhu cầu của cuộc sống hiện đại, với mong muốn đưa thi&ecirc;n nhi&ecirc;n đến gần hơn với cuộc sống. C&acirc;y cảnh Minh An đ&atilde; kh&ocirc;ng ngừng ho&agrave;n thiện v&agrave; ph&aacute;t triển c&aacute;c dịch vụ nhằm x&acirc;y dựng một kh&ocirc;ng gian xanh hiện đại v&agrave; chuy&ecirc;n nghiệp, gần gũi với thi&ecirc;n nhi&ecirc;n gi&uacute;p mang đến cho Qu&yacute; kh&aacute;ch h&agrave;ng sự thư th&aacute;i v&agrave; thoải m&aacute;i để s&aacute;ng tạo trong c&ocirc;ng việc v&agrave; tận hưởng cuộc sống.</p><h2><strong>C&acirc;y cảnh Store</strong>&nbsp;hoạt động với c&aacute;c lĩnh vực kinh doanh ch&iacute;nh:</h2><h4><em>Dịch vụ b&aacute;n c&acirc;y cảnh của C&acirc;y cảnh Store:</em></h4><ul><li>B&aacute;n bu&ocirc;n, b&aacute;n lẻ c&acirc;y cảnh nội ngoại thất, c&acirc;y cảnh văn ph&ograve;ng, c&acirc;y để b&agrave;n, c&acirc;y phong thuỷ, c&acirc;y s&acirc;n vườn&hellip;Ch&uacute;ng t&ocirc;i cam kết b&aacute;n với gi&aacute; rẻ nhất v&agrave; dịch vụ tốt nhất đến với Qu&yacute; kh&aacute;ch h&agrave;ng.</li><li>Miễn ph&iacute; vận chuyển tận nơi, cung cấp trọn g&oacute;i đất trồng, chậu trồng, sỏi trang tr&iacute;, đĩa l&oacute;t,&hellip;</li><li>Tư vấn, hướng dẫn cẩm nang chăm s&oacute;c c&acirc;y xanh cho kh&aacute;ch h&agrave;ng trong suốt thời gian trồng v&agrave; chơi c&acirc;y.</li><li>Bảo h&agrave;nh, đổi mới sản phẩm trong v&ograve;ng 30 ng&agrave;y nếu c&acirc;y bị xấu, hỏng do lỗi của ch&uacute;ng t&ocirc;i.</li><li>Chương tr&igrave;nh kh&aacute;ch h&agrave;ng th&acirc;n thiết: Giảm 5% tr&ecirc;n tổng hoa đơn cho mỗi lần mua h&agrave;ng tiếp theo</li><li>Chiết khấu cao cho doanh nghiệp. Qu&yacute; doanh nghiệp muốn mua c&acirc;y vui l&ograve;ng li&ecirc;n hệ qua&nbsp;<a href=\"tel:0946312559\">hotline: 0946.312.559</a>&nbsp;để được tư vấn gi&aacute; tốt nhất.</li></ul><div><img src=\"http://localhost:8080/tree/Public/frontend/img/cay-xanh-van-phong.jpg\" alt=\"\"></div><h4><em>Phương ch&acirc;m của ch&uacute;ng t&ocirc;i l&agrave;:</em></h4><ul><li>Giá cả hợp l&iacute;, phù hợp với t&acirc;́t cả khách hàng</li><li>Sản phẩm độc đ&aacute;o, sang trọng với Ch&acirc;́t lượng dịch vụ tốt nh&acirc;́t</li><li>Sự hài lòng của khách hàng là mục ti&ecirc;u duy nh&acirc;́t đ&ecirc;̉ tồn tại và phát tri&ecirc;̉n</li></ul><h6><em>C&acirc;y cảnh Store - sự lựa chọn ho&agrave;n hảo cho kh&ocirc;ng gian xanh của bạn!</em></h6><div><img src=\"http://localhost:8080/tree/Public/frontend/img/van-phong-xanh.jpg\" alt=\"\"></div>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int NOT NULL,
  `title_news` varchar(550) DEFAULT NULL,
  `image_news` varchar(255) DEFAULT NULL,
  `description_news` text,
  `content_news` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `title_news`, `image_news`, `description_news`, `content_news`, `created_at`, `updated_at_at`, `deleted_at`, `deleted`) VALUES
(1, 'Cây cảnh văn phòng và những lưu ý khi mua cây cảnh văn phòng', 'cay-canh-trong-van-phong1.jpg', 'Cây cảnh trong văn phòng là một trong những tiêu chí quan trọng để đánh giá tính chuyên nghiệp và sang trọng của một văn phòng làm việc. Sự có mặt của các loại cây xanh đã trở thành một xu thế tất yếu trong thiết kế nội thất của văn phòng hiện đại. Không ai có thể phủ nhận những tác dụng tuyệt vời mà cây xanh mang lại cho chúng ta nói chung và môi trường công sở nói riêng. Hiện nay, nhu cầu tìm mua cây cảnh văn phòng là rất lớn. Tuy vậy, để cây cảnh văn phòng thực sự phát huy được tối đa vai trò và năng lực của nó. Thì bạn cũng cần “note” lại một vài lưu ý khi tìm mua nhé.', '<h2><span id=\"Nhung_dieu_can_tranh_khi_lua_chon_cay_canh_trong_van_phong\">Những điều cần tr&aacute;nh khi lựa chọn c&acirc;y cảnh trong văn ph&ograve;ng</span></h2><p>C&aacute;c loại c&acirc;y cảnh hiện nay rất phong ph&uacute; v&agrave; đa dạng. Tuy nhi&ecirc;n, khi mua c&acirc;y cho văn ph&ograve;ng bạn cũng n&ecirc;n tr&aacute;nh những yếu tố sau.</p><h3><span id=\"Nen_tranh_nhung_cay_khong_hop_phong_thuy_voi_nguoi_dung_dau\">N&ecirc;n tr&aacute;nh những c&acirc;y kh&ocirc;ng hợp phong thuỷ với người đứng đầu</span></h3><p>Điều n&agrave;y rất quan trọng. Bởi c&acirc;y phong thuỷ hợp mệnh sẽ gia tăng thuận lợi v&agrave; may mắn trong c&ocirc;ng việc v&agrave; cuộc sống. Nhưng nếu những c&acirc;y tương khắc với bản mệnh th&igrave; hiệu quả đ&ocirc;i khi c&oacute; thể ngược lại.</p><p>V&iacute; dụ như sếp của bạn mệnh thuỷ th&igrave; bạn kh&ocirc;ng n&ecirc;n đặt những c&acirc;y c&oacute; m&agrave;u đỏ (vốn thuộc h&agrave;nh hoả) trong ph&ograve;ng của sếp. Hoặc sếp mệnh hoả th&igrave; tuyệt đối kh&ocirc;ng n&ecirc;n trồng c&acirc;y thuỷ sinh trong ph&ograve;ng sếp nh&eacute;.</p><h3><span id=\"Khong_chon_mua_nhung_cay_khong_phu_hop_voi_moi_truong_song_trong_van_phong\">Kh&ocirc;ng chọn mua những c&acirc;y kh&ocirc;ng ph&ugrave; hợp với m&ocirc;i trường sống trong văn ph&ograve;ng</span></h3><p>Sự đa dạng của thế giới c&acirc;y cảnh đ&ocirc;i khi khiến bạn bối rối trong việc chọn mua. Tuy nhi&ecirc;n, h&atilde;y nhớ l&agrave; chỉ n&ecirc;n chọn những c&acirc;y th&iacute;ch nghi tốt với m&ocirc;i trường điều ho&agrave; v&agrave; ph&ograve;ng k&iacute;n th&ocirc;i nh&eacute;. Một số c&acirc;y trồng ưa nắng, ưa s&aacute;ng như thi&ecirc;n điểu, chuối rẻ quạt, thường xu&acirc;n, dạ yến thảo,&hellip;chỉ ph&aacute;t triển tốt ở những nơi c&oacute; đủ nắng gi&oacute; tự nhi&ecirc;n. Ch&uacute;ng kh&ocirc;ng ph&ugrave; hợp l&agrave;m c&acirc;y văn ph&ograve;ng&nbsp; m&agrave; chỉ n&ecirc;n&nbsp;<a href=\"https://caycanhminhan.vn/san-pham/cay-trong-ban-cong/\">trồng ngo&agrave;i ban c&ocirc;ng</a>.</p><h3><span id=\"Khong_mua_cay_troi_noi_khong_dam_bao_chat_luong\">Kh&ocirc;ng mua c&acirc;y tr&ocirc;i nổi, kh&ocirc;ng đảm bảo chất lượng.</span></h3><p>C&acirc;y cảnh l&agrave; một loại h&agrave;ng ho&aacute; đặc th&ugrave;. Chất lượng c&acirc;y cảnh hiện nay dường như kh&ocirc;ng chịu sự kiểm duyệt của bất cứ cơ quan chức năng n&agrave;o. M&agrave; ho&agrave;n to&agrave;n phụ thuộc v&agrave;o sự &ldquo;c&oacute; t&acirc;m&rdquo; của nh&agrave; vườn v&agrave; người b&aacute;n. Rất nhiều nh&agrave; vườn v&igrave; lợi nhuận m&agrave; lạm dụng c&aacute;c loại thuốc k&iacute;ch th&iacute;ch. Điều n&agrave;y khiến cho c&acirc;y ph&aacute;t triển một c&aacute;ch nhanh ch&oacute;ng. C&acirc;y chỉ đẹp, b&oacute;ng bẩy được một thời gian ngắn sau đ&oacute; xấu đi một c&aacute;ch nhanh ch&oacute;ng.</p><p>Vậy n&ecirc;n, trước khi quyết định mua c&acirc;y, bạn h&atilde;y lựa chọn cho m&igrave;nh nh&agrave; cung cấp uy t&iacute;n nh&eacute;. Bởi chỉ khi lựa chọn đơn vị b&aacute;n c&acirc;y uy t&iacute;n bạn mới được bảo vệ quyền lợi đầy đủ khi mua h&agrave;ng.</p><h2><span id=\"Nhung_luu_y_khi_cham_soc_cay_canh_trong_van_phong\">Những lưu &yacute; khi chăm s&oacute;c c&acirc;y cảnh trong văn ph&ograve;ng</span></h2><p>Phần lớn c&aacute;c c&acirc;y cảnh trong văn ph&ograve;ng đều dễ sống v&agrave; để chăm s&oacute;c. Tuy nhi&ecirc;n, để c&acirc;y lu&ocirc;n đẹp v&agrave; tr&agrave;n đầy sức sống th&igrave; bạn cũng cần biết đ&ocirc;i ch&uacute;t về kỹ thuật chăm s&oacute;c c&acirc;y. Trong đ&oacute;, bạn n&ecirc;n lưu t&acirc;m đến những vấn đề sau</p><h3><span id=\"Luong_nuoc_tuoi_phu_hop_voi_nhu_cau_cua_cay\">Lượng nước tưới ph&ugrave; hợp với nhu cầu của c&acirc;y</span></h3><p>Nhu cầu nước tưới của mỗi loại c&acirc;y l&agrave; kh&aacute;c nhau. Kh&ocirc;ng c&oacute; một c&ocirc;ng thức chung n&agrave;o về nước tưới cho tất cả c&aacute;c loại c&acirc;y cả. Khi mua c&acirc;y, bạn h&atilde;y hỏi kỹ người b&aacute;n về tần suất v&agrave; lượng nước tưới cho từng loại c&acirc;y nh&eacute;. V&iacute; dụ như c&acirc;y kim tiền, bạn c&oacute; thể nửa th&aacute;ng hoặc một th&aacute;ng mới tưới c&acirc;y một lần. Nhưng đối với&nbsp;<a href=\"https://caycanhminhan.vn/cay-hanh-phuc-to/\">c&acirc;y hạnh ph&uacute;c</a>&nbsp;th&igrave; kh&ocirc;ng như thế. Bởi nhu cầu nước của hạnh ph&uacute;c l&agrave; rất lớn. Vậy n&ecirc;n bạn c&oacute; thể tưới phun h&agrave;ng ng&agrave;y hoặc tưới đẫm gốc 2 lần/tuần. Nếu thiếu nước c&acirc;y sẽ bị rụng l&aacute;.</p><h3><span id=\"Dap_ung_du_nhu_cau_ve_anh_sang_cho_cay\">Đ&aacute;p ứng đủ nhu cầu về &aacute;nh s&aacute;ng cho c&acirc;y</span></h3><p>Hầu hết c&aacute;c loại c&acirc;y cảnh văn ph&ograve;ng đều ưa r&acirc;m m&aacute;t v&agrave; chịu b&oacute;ng tốt. Tuy vậy, nếu để c&acirc;y trong ph&ograve;ng k&iacute;n v&agrave; thiếu s&aacute;ng trong thời gian d&agrave;i th&igrave; sẽ ảnh hưởng đến qu&aacute; tr&igrave;nh quang hợp của c&acirc;y. Vị tr&iacute; đặt c&acirc;y tốt nhất l&agrave; ở những nơi c&acirc;y c&oacute; thể tiếp x&uacute;c được với &aacute;nh s&aacute;ng nhẹ. Những vị tr&iacute; gần cửa sổ, cửa k&iacute;nh, ban c&ocirc;ng hay trước cửa ra v&agrave;o rất ph&ugrave; hợp để đặt c&acirc;y. Bởi kh&ocirc;ng chỉ đ&aacute;p ứng về mặt &aacute;nh s&aacute;ng cho c&acirc;y m&agrave; c&ograve;n đ&oacute;n được nhiều t&agrave;i lộc nữa.</p><h3><span id=\"Bo_sung_dinh_duong_hop_ly\">Bổ sung dinh dưỡng hợp l&yacute;</span></h3><p>Ngo&agrave;i nước tưới th&igrave; nhu cầu về dinh dưỡng cũng rất cần thiết cho c&acirc;y. Khi thiếu dinh dưỡng c&acirc;y sẽ trở n&ecirc;n xơ x&aacute;c nh&igrave;n rất mất thẫm mĩ. C&acirc;y mới mua về trong th&aacute;ng đầu kh&ocirc;ng cần phải bổ sung g&igrave;. Từ th&aacute;ng thứ 2 trở đi bạn n&ecirc;n định kỳ b&oacute;n ph&acirc;n cho c&acirc;y 1, 2 lần mỗi th&aacute;ng. Loại ph&acirc;n ph&ugrave; hợp l&agrave; ph&acirc;n xanh b&oacute;n l&aacute; hoặc NPK tổng hợp. Nếu muốn c&acirc;y hấp thu được dưỡng chất một c&aacute;ch nhanh ch&oacute;ng th&igrave; ho&agrave; pha ph&acirc;n với nước v&agrave; tưới cho c&acirc;y. Tuy nhi&ecirc;n, bạn phải định lượng được tỷ lệ. Nếu l&agrave;m dụng ban c&oacute; thể khiến c&acirc;y chết v&igrave; hỏng rễ.</p><p>C&aacute;ch đơn giản hơn l&agrave; rắc ph&acirc;n dạng nguy&ecirc;n hạt quanh gốc c&acirc;y rồi duy tr&igrave; độ ẩm quanh gốc. Ph&acirc;n sẽ tan dần v&agrave; thẩm thấu dinh dưỡng v&agrave;o đất một c&aacute;ch từ từ.</p><h3><span id=\"Thay_dat_trong_chau_dinh_ky\">Thay đất trong chậu định kỳ</span></h3><p>Đất trồng rất quan trọng đối với c&acirc;y. C&acirc;y cảnh văn ph&ograve;ng bị hạn chế bởi kh&ocirc;ng gian chật hẹp trong chậu. Bộ rễ bị giới hạn n&ecirc;n chỉ c&oacute; thể tr&ocirc;ng chờ v&agrave;o chất dinh dưỡng từ đất trong chậu trồng. Sau khi trồng khoảng 6 &ndash; 8 th&aacute;ng, đất trong chậu sẽ bị bạc m&agrave;u v&agrave; mất hết chất dinh dưỡng. L&uacute; n&agrave;y bạn n&ecirc;n sang chậu, thay đất mới cho c&acirc;y. Đất mới tơi xốp. nhiều m&ugrave;n v&agrave; gi&agrave;u dinh dưỡng l&agrave; m&ocirc;i trường l&yacute; tưởng k&iacute;ch th&iacute;ch bộ rễ ph&aacute;t triển. Bạn c&oacute; thể giữ lại 1/3 đất cũ trộn c&ugrave;ng với 2/3 đất mới để c&acirc;y th&iacute;ch nghi dần dần m&agrave; kh&ocirc;ng bị &ldquo;chột&rdquo; rễ.</p><h2><span id=\"Cay_canh_Minh_An_don_vi_cung_cap_cay_canh_trong_van_phong_uy_tin_chat_luong_hang_dau\">C&acirc;y cảnh H&agrave; Nội &ndash; đơn vị cung cấp c&acirc;y cảnh trong văn ph&ograve;ng uy t&iacute;n, chất lượng h&agrave;ng đầu</span></h2><p>Hơn 10 năm hoạt động trong lĩnh vực c&acirc;y cảnh nội thất. Ch&uacute;ng t&ocirc;i lu&ocirc;n nỗ lực hết m&igrave;nh để mang đến cho qu&yacute; kh&aacute;ch h&agrave;ng những c&acirc;y cảnh chất lượng tốt nhất với gi&aacute; rẻ nhất v&agrave; dịch vụ tốt nhất. Hơn 2000 m2 diện t&iacute;ch ươm trồng. Đủ để Minh An tự m&igrave;nh nh&acirc;n giống v&agrave; b&aacute;n ra c&aacute;c sản phẩm c&acirc;y cảnh do ch&iacute;nh m&igrave;nh tạo ra. Vậy n&ecirc;n bạn y&ecirc;n t&acirc;m về chất lượng v&agrave; ho&agrave;n to&agrave;n c&oacute; thể cạnh tranh về gi&aacute; với c&aacute;c đơn vị kh&aacute;c.</p><p>Ch&iacute;nh s&aacute;ch b&aacute;n h&agrave;ng v&agrave; hậu m&atilde;i của ch&uacute;ng t&ocirc;i chắc chắn sẽ l&agrave;m h&agrave;i l&ograve;ng những kh&aacute;ch h&agrave;ng kh&oacute; t&iacute;nh nhất.</p><p><a href=\"https://caycanhminhan.vn/wp-content/uploads/2022/06/cay-canh-trong-van-phong1.jpg\"><img class=\"aligncenter size-full wp-image-3921\" src=\"https://caycanhminhan.vn/wp-content/uploads/2022/06/cay-canh-trong-van-phong1.jpg\" sizes=\"(max-width: 800px) 100vw, 800px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2022/06/cay-canh-trong-van-phong1.jpg 800w, https://caycanhminhan.vn/wp-content/uploads/2022/06/cay-canh-trong-van-phong1-768x384.jpg 768w, https://caycanhminhan.vn/wp-content/uploads/2022/06/cay-canh-trong-van-phong1-600x300.jpg 600w\" alt=\"c&acirc;y cảnh trong văn ph&ograve;ng\" width=\"800\" height=\"400\" loading=\"lazy\"></a></p><h3><span id=\"Minh_An_la_don_vi_cung_ung_chuyen_nghiep_cac_dong_cay_canh_trong_van_phong\">C&acirc;y cảnh H&agrave; Nội l&agrave; đơn vị cung ứng chuy&ecirc;n nghiệp c&aacute;c d&ograve;ng c&acirc;y cảnh trong văn ph&ograve;ng</span></h3><ul><li>Cam kết chất lượng h&agrave;ng đầu. Tất cả c&aacute;c sản phẩm c&acirc;y cảnh đều được ươm trồng ổn định, th&iacute;ch nghi tốt với m&ocirc;i trường. Đảm bảo chất lượng c&acirc;y tốt nhất khi giao đến kh&aacute;ch h&agrave;ng.</li><li>Bảo h&agrave;nh 1 c&acirc;y đổi 1 c&acirc;y trong 30 ng&agrave;y nếu qu&yacute; kh&aacute;ch đ&atilde; thực hiện đ&uacute;ng hướng dẫn chăm s&oacute;c của ch&uacute;ng t&ocirc;i m&agrave; c&acirc;y vẫn c&oacute; dấu hiệu xấu, hỏng.</li><li>Cung cấp ho&aacute; đơn VAT, chứng từ đầy đủ.</li><li>Cam kết gi&aacute; lu&ocirc;n rẻ. Ch&uacute;ng t&ocirc;i cam kết với kh&aacute;ch h&agrave;ng gi&aacute; b&aacute;n lu&ocirc;n rẻ hơn c&aacute;c đơn vị cung cấp c&ugrave;ng ph&acirc;n kh&uacute;c thị trường.</li><li>Giao h&agrave;ng nhanh ch&oacute;ng. Miễn ph&iacute; vận chuyển với đơn từ 500.000 (đối với c&acirc;y để b&agrave;n) v&agrave; b&aacute;n k&iacute;nh 5km t&iacute;nh từ cửa h&agrave;ng (đối với c&aacute;c d&ograve;ng c&acirc;y to)</li><li>Đối với kh&aacute;ch h&agrave;ng mua online. Ch&uacute;ng t&ocirc;i lu&ocirc;n cung cấp ảnh thật của sản phẩm trước khi giao. Cam kết giao c&acirc;y đ&uacute;ng như ảnh đ&atilde; chốt.</li><li>Tặng k&egrave;m ph&acirc;n b&oacute;n chăm s&oacute;c c&acirc;y. Minh An lu&ocirc;n tặng k&egrave;m ph&acirc;n b&oacute;n chăm s&oacute;c c&acirc;y đối với tất cả c&aacute;c đơn h&agrave;ng. Đủ lượng ph&acirc;n b&oacute;n chăm c&acirc;y trong v&agrave;i th&aacute;ng.</li><li>Giảm gi&aacute; cho kh&aacute;ch h&agrave;ng th&acirc;n thiết, chiết khấu cao cho những đơn h&agrave;ng lớn. Giảm ngay &iacute;t nhất 5% đối với kh&aacute;ch mua c&acirc;y từ lần thứ 2. Giảm 5 -10% tr&ecirc;n tổng đơn h&agrave;ng đối với những đơn h&agrave;ng lớn.</li></ul><p>C&acirc;y cảnh H&agrave; Nội lu&ocirc;n mong muốn mang đến cho kh&aacute;ch h&agrave;ng những trải nghiệm tốt nhất khi sử dụng c&aacute;c sản phẩm c&acirc;y cảnh trong văn ph&ograve;ng.&nbsp;Nếu văn ph&ograve;ng bạn cần nhiều c&acirc;y v&agrave; kh&ocirc;ng c&oacute; kinh nghiệm chăm s&oacute;c th&igrave; h&atilde;y giao lại việc đ&oacute; cho ch&uacute;ng t&ocirc;i nh&eacute;. H&atilde;y gọi ngay tới số hotline/zalo:&nbsp;<strong><em>0946 312 559</em></strong>&nbsp;để nhận được sự tư vấn v&agrave; hỗ trợ tốt nhất nh&eacute;. Ch&uacute;c bạn sớm sở hữu những c&acirc;y cảnh văn ph&ograve;ng như &yacute;.</p>', '2022-10-30 09:35:00', '2022-10-30 09:35:00', NULL, 0),
(2, 'Top 15 cây cảnh lọc không khí tốt cho sức khỏe', 'cay-luoi-ho-minh-an-600x484.jpg', '“Cây cảnh văn phòng lọc không khí” là “key word” được rất nhiều dân công sở quan tâm. Ai cũng biết môi trường công sở luôn gắn liền với các thiết bị máy văn phòng, làm việc liên tục trong môi trường điều hoà và gần như gắn liền với các toà nhà nhiều vách kính. Những yếu tố này hoàn toàn không tốt cho sức khoẻ. Rất nhiều người đã phải chung sống với các bệnh về hô hấp, mắt và các chứng bệnh liên quan đến não bộ.', '<h2><span id=\"Cay_canh_van_phong_loc_khong_khi_va_nhung_tac_dung_tuyet_voi\">C&acirc;y cảnh văn ph&ograve;ng lọc kh&ocirc;ng kh&iacute; v&agrave; những t&aacute;c dụng tuyệt vời.</span></h2><p>C&acirc;y xanh ch&iacute;nh l&agrave; giải ph&aacute;p tốt nhất để giải quyết c&aacute;c vấn đề n&oacute;i tr&ecirc;n. Rất nhiều loại&nbsp;<a href=\"https://caycanhminhan.vn/cay-canh-van-phong/\">c&acirc;y cảnh văn ph&ograve;ng</a>&nbsp;c&oacute; khả năng hấp thu c&aacute;c tia bức xạ điện tử, loại bỏ bụi mịn v&agrave; c&aacute;c chất độc bay hơi trong kh&ocirc;ng kh&iacute;. Ch&uacute;ng c&ograve;n cung cấp nguồn oxy dồi d&agrave;o, tốt cho hệ h&ocirc; hấp v&agrave; cải thiện c&aacute;c chứng bệnh về mắt.</p><p>C&aacute;c nghi&ecirc;n cứu về c&acirc;y xanh đ&atilde; chỉ ra rằng: m&agrave;u xanh l&aacute; c&acirc;y sẽ gi&uacute;p ch&uacute;ng ta tăng th&ecirc;m 20% tr&iacute; nhớ, 12% hiệu suất l&agrave;m việc v&agrave; 15% sự tập trung. Ch&uacute;ng c&ograve;n l&agrave;m giảm c&aacute;c t&aacute;c động của hiệu ứng nh&agrave; k&iacute;nh v&agrave; hội chứng SBS (Sick Building Syndrome) . Hội chứng n&agrave;y sẽ g&acirc;y cảm gi&aacute;c mệt mỏi, đau đầu, thậm ch&iacute; l&agrave; kh&oacute; thở khi ch&uacute;ng ta ở trong những ng&ocirc;i nh&agrave; k&iacute;n, sử dụng điều ho&agrave; nhiệt độ v&agrave; &aacute;nh s&aacute;ng đ&egrave;n huỳnh quang. Tuy nhi&ecirc;n, nếu trong ph&ograve;ng c&oacute; nhiều c&acirc;y xanh thi c&aacute;c triệu chứng tr&ecirc;n sẽ được cải thiện đ&aacute;ng kể.</p><p>Dưới đ&acirc;y l&agrave; gợi 15 loại c&acirc;y cảnh m&agrave; bạn kh&ocirc;ng trồng trong văn ph&ograve;ng. Ch&uacute;ng sẽ gi&uacute;p bạn cảm thấy &ldquo;dễ thở&rdquo; hơn, suy nghĩ t&iacute;ch cực v&agrave; c&oacute; nhiều năng lượng hơn để l&agrave;m việc v&agrave; tận hưởng cuộc sống.</p><h2><span id=\"Goi_y_15_loai_cay_canh_van_phong_loc_khong_khi_tot_cho_suc_khoe\">Gợi &yacute; 15 loại c&acirc;y cảnh văn ph&ograve;ng lọc kh&ocirc;ng kh&iacute; tốt cho sức khoẻ</span></h2><h3><span id=\"1_Cay_Trau_Ba\">1. C&acirc;y Trầu B&agrave;</span></h3><p style=\"text-align: justify;\">Đ&acirc;y l&agrave; c&acirc;y xanh lu&ocirc;n giữ vị tr&iacute; &ldquo;Top Ten&rdquo; trong list những c&acirc;y cảnh văn ph&ograve;ng được ưa chuộng nhất hiện nay. Trầu b&agrave; hi&ecirc;n nay rất đa dạng về chủng loại v&agrave; k&iacute;ch thước. C&oacute;&nbsp;<a href=\"https://caycanhminhan.vn/ban-cay-trau-ba-xanh-gia-re-uy-tin-tai-ha-noi/\">Trầu B&agrave; Xanh</a>&nbsp;để b&agrave;n,&nbsp;<a href=\"https://caycanhminhan.vn/van-nien-thanh-treo-ben-dep-gia-re-co-bao-hanh/\">Trầu B&agrave; rủ dạng giỏ treo</a>,&nbsp;<a href=\"https://caycanhminhan.vn/trau-ba-cam-thach-de-ban-y-nghia-cach-trong-va-cham-soc/\">Trầu B&agrave; Cẩm Thạch</a>,&hellip;Đặc biệt Trầu B&agrave; leo cột (hay c&ograve;n c&oacute; t&ecirc;n gọi kh&aacute;c l&agrave; c&acirc;y Vạn Ni&ecirc;n Thanh) l&agrave; c&oacute; k&iacute;ch thước lớn hơn cả. C&acirc;y c&oacute; thể cao tới 1,6m, đường k&iacute;nh l&aacute; c&oacute; thể l&ecirc;n tới 25- 30 cm. V&agrave; tất nhi&ecirc;n l&agrave; khả năng thanh lọc kh&ocirc;ng kh&iacute; của c&acirc;y cũng vượt trội hơn cả.</p><p style=\"text-align: center;\"><a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/08/trau-ba-leo-cot-minhan.png\"><img class=\"aligncenter size-full wp-image-2754\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/08/trau-ba-leo-cot-minhan.png\" sizes=\"(max-width: 500px) 100vw, 500px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/08/trau-ba-leo-cot-minhan.png 500w, https://caycanhminhan.vn/wp-content/uploads/2021/08/trau-ba-leo-cot-minhan-300x400.png 300w\" alt=\"c&acirc;y trầu b&agrave; leo cột\" width=\"500\" height=\"667\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Cay_Trau_Ba_leo_cot\"><em>C&acirc;y Trầu B&agrave; leo cột</em></span></h3><p>Ch&uacute;ng được xem l&agrave; những chiếc &ldquo;m&aacute;y lọc kh&ocirc;ng kh&iacute; mini&rdquo; trong văn ph&ograve;ng. V&igrave; loại c&acirc;y n&agrave;y c&oacute; khả năng hấp thu rất nhiều c&aacute;c loại chất độc bay hơi m&agrave; bằng mắt thường ch&uacute;ng ta kh&ocirc;ng thể nh&igrave;n thấy được. C&aacute;c loại chất độc n&agrave;y tồn tại trong kh&ocirc;ng kh&iacute;. Ch&uacute;ng c&oacute; nhiều trong kh&oacute;i thuốc, mực in, đồ da, đồ gỗ,&hellip;Rất may mắn l&agrave; ch&uacute;ng ta c&oacute; thể loại bỏ mối nguy cơ n&agrave;y nhờ v&agrave;o việc đặt những chậu c&acirc;y Trầu B&agrave; trong ph&ograve;ng l&agrave;m việc.</p><p>Trầu B&agrave; c&ograve;n c&oacute; khả năng hấp thụ v&agrave; loại bỏ c&aacute;c tia bức xạ điện tử ph&aacute;t ra từ c&aacute;c thiết bị điện tử v&agrave; m&aacute;y văn ph&ograve;ng. Ch&iacute;nh v&igrave; thế m&agrave; Trầu B&agrave; lu&ocirc;n l&agrave; c&acirc;y xanh văn ph&ograve;ng được tin d&ugrave;ng nhiều nhất.</p><h3><span id=\"2_Cay_Luoi_Ho\">2. C&acirc;y Lưỡi Hổ</span></h3><p>Quan niệm phong thuỷ xếp c&acirc;y Lưỡi Hổ v&agrave;o h&agrave;ng những loại c&acirc;y cảnh c&oacute; khản năng ti&ecirc;u trừ t&agrave; kh&iacute;. Tuy nhi&ecirc;n, ch&uacute;ng c&ograve;n c&oacute; khả năng lọc kh&ocirc;ng kh&iacute; vượt trội so với c&aacute;c loại kh&aacute;c. Theo nghi&ecirc;n cứu của NASA th&igrave; c&acirc;y Lưỡi Hổ c&oacute; khả năng hấp thu 107 loại kh&iacute; độc bay hơi kh&aacute;c nhau. Năng lực lọc kh&ocirc;ng kh&iacute; của c&acirc;y thực sựu đ&aacute;ng nể. C&acirc;y c&ograve;n cung cấp nguồn oxy dồi d&agrave;o nhờ v&agrave;o cơ chế CAM &ndash; Một loại cơ chế đặc biệt chỉ c&oacute; ở một số lo&agrave;i thực vật. Nhờ c&oacute; cơ chế n&agrave;y m&agrave; ngay cả về ban đ&ecirc;m, c&acirc;y vẫn nhả oxy ra m&ocirc;i trường b&igrave;nh thường.</p><p style=\"text-align: center;\"><a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-luoi-ho-phong-thuy-1.jpg\"><img class=\"aligncenter size-large wp-image-2801\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-luoi-ho-phong-thuy-1-533x800.jpg\" sizes=\"(max-width: 533px) 100vw, 533px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-luoi-ho-phong-thuy-1-533x800.jpg 533w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-luoi-ho-phong-thuy-1-267x400.jpg 267w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-luoi-ho-phong-thuy-1.jpg 564w\" alt=\"c&acirc;y lưỡi hổ phong thuỷ\" width=\"533\" height=\"800\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Cay_Luoi_Ho_cung_cap_nguon_oxy_doi_dao_va_loc_khong_khi_hieu_qua\"><em>C&acirc;y Lưỡi Hổ cung cấp nguồn oxy dồi d&agrave;o v&agrave; lọc kh&ocirc;ng kh&iacute; hiệu quả</em></span></h3><h3><span id=\"3_Cay_Lan_Y\">3. C&acirc;y Lan &Yacute;</span></h3><p>Lan &Yacute; thu h&uacute;t mọi người với những b&ocirc;ng hoa trắng muốt tr&ecirc;n nền l&aacute; xanh. Sở hữu vẻ đẹp thanh tao, qu&yacute; ph&aacute;i. C&acirc;y được nhiều người y&ecirc;u th&iacute;ch v&agrave; trồng ở khắp mọi nơi. Lan &Yacute; c&ograve;n c&oacute; khả năng lọc kh&ocirc;ng kh&iacute; rất tốt. C&acirc;y c&oacute; thể loại bỏ rất nhiều loại kh&iacute; độc c&oacute; hại cho sức khoẻ. Như: benzen, xylene, toluene,&hellip;Gi&uacute;p m&ocirc;i trường sống trong l&agrave;nh hơn. C&acirc;y cũng được đ&aacute;nh gi&aacute; l&agrave; c&oacute; thể hấp thu tốt c&aacute;c loại bức xạ điện tử thải ra trong qu&aacute; tr&igrave;nh sử dụng c&aacute;c thiết bị v&agrave; m&aacute;y văn ph&ograve;ng.<a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-lan-y-thuy-sinh-1.jpg\"><img class=\"aligncenter size-full wp-image-2833\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-lan-y-thuy-sinh-1.jpg\" sizes=\"(max-width: 800px) 100vw, 800px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-lan-y-thuy-sinh-1.jpg 800w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-lan-y-thuy-sinh-1-400x400.jpg 400w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-lan-y-thuy-sinh-1-280x280.jpg 280w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-lan-y-thuy-sinh-1-768x768.jpg 768w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-lan-y-thuy-sinh-1-600x600.jpg 600w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-lan-y-thuy-sinh-1-100x100.jpg 100w\" alt=\"c&acirc;y lan &yacute; thuỷ sinh lọc kh&ocirc;ng kh&iacute; rất tốt\" width=\"800\" height=\"800\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Cay_Lan_Y_thuy_sinh_loc_khong_khi_va_giu_am_rat_tot\">C&acirc;y Lan &Yacute; thuỷ sinh lọc kh&ocirc;ng kh&iacute; v&agrave; giữ ẩm rất tốt</span></h3><p>Lan &Yacute; ngo&agrave;i t&aacute;c dụng lọc kh&ocirc;ng kh&iacute; c&ograve;n c&oacute; thể l&agrave;m giảm nguy cơ mắc c&aacute;c bệnh tim mạch. Đ&acirc;y thực sự l&agrave; loại c&acirc;y cảnh xinh đẹp v&agrave; v&ocirc; c&ugrave;ng hữu &iacute;ch</p><h3><span id=\"4_Cay_Co_Lan_Chi_8211_cay_canh_co_kha_nang_loc_khong_khi_vuot_troi\">4. C&acirc;y Cỏ Lan Chi &ndash; c&acirc;y cảnh c&oacute; khả năng lọc kh&ocirc;ng kh&iacute; vượt trội.</span></h3><p>Mặc d&ugrave; c&oacute; k&iacute;ch thước r&acirc;t khi&ecirc;m tốn nhưng cỏ Lan Chi (c&acirc;y D&acirc;y Nhện) được đ&aacute;nh gi&aacute; cao về khả năng lọc bụi bẩn v&agrave; kh&iacute; độc. C&aacute;ch chuy&ecirc;n gia m&ocirc;i trường gọi đ&acirc;y l&agrave; &ldquo;chiếc m&aacute;y h&uacute;t bụi thần kỳ của cuộc sống&rdquo;. C&acirc;y c&oacute; thể lọc c&aacute;c hạt bụi mịn v&agrave; c&aacute;c chất độc bay hơi kh&aacute;c. Gi&uacute;p bạn giải toả căng thẳng, mệt mỏi v&agrave; l&agrave;m dịu mắt rất hiệu quả. Ph&ugrave; hợp trang tr&iacute; b&agrave;n l&agrave;m việc, g&oacute;c sofa, kệ s&aacute;ch,&hellip;</p><p style=\"text-align: center;\"><a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-day-nhen-1.jpg\"><img class=\"aligncenter wp-image-2836 size-full\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-day-nhen-1.jpg\" sizes=\"(max-width: 593px) 100vw, 593px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-day-nhen-1.jpg 593w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-day-nhen-1-356x400.jpg 356w\" alt=\"c&acirc;y cỏ lan chi (c&acirc;y d&acirc;y nhện) - c&acirc;y cảnh văn ph&ograve;ng lọc kh&ocirc;ng kh&iacute;\" width=\"593\" height=\"667\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Cay_Co_Lan_Chi_cay_Day_Nhen_8211_chiec_may_hut_bui_than_ky_cua_cuoc_song\">C&acirc;y Cỏ Lan Chi (c&acirc;y D&acirc;y Nhện) &ndash; chiếc m&aacute;y h&uacute;t bụi thần kỳ của cuộc sống</span></h3><h3><span id=\"5_Cay_Bang_Singapore_8211_Cay_canh_van_phong_loc_khong_khi_hieu_qua\">5. C&acirc;y B&agrave;ng Singapore &ndash; C&acirc;y cảnh văn ph&ograve;ng lọc kh&ocirc;ng kh&iacute; hiệu quả</span></h3><p style=\"text-align: center;\">B&agrave;ng Singapore l&agrave; c&acirc;y cảnh văn ph&ograve;ng mới xuất hiện trong v&agrave;i năm trở lại đ&acirc;y. Nhưng c&acirc;y được những người chơi c&acirc;y v&agrave; giới văn ph&ograve;ng rất ưu &aacute;i. Kh&ocirc;ng chỉ bởi kh&iacute; chất sang trọng, vẻ đẹp khoẻ khoắn m&agrave; c&ograve;n c&oacute; khả năng lọc kh&ocirc;ng kh&iacute; rất tốt.<a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-bang-singapore-minh-an.jpg\"><img class=\"aligncenter size-full wp-image-2811\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-bang-singapore-minh-an.jpg\" sizes=\"(max-width: 512px) 100vw, 512px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-bang-singapore-minh-an.jpg 512w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-bang-singapore-minh-an-419x400.jpg 419w\" alt=\"c&acirc;y b&agrave;ng singapore - c&acirc;y cảnh văn ph&ograve;ng lọc kh&ocirc;ng kh&iacute; tốt cho sức khoẻ\" width=\"512\" height=\"489\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Cay_bang_singapore_8211_cay_canh_van_phong_loc_khong_khi_tot_cho_suc_khoe\">C&acirc;y b&agrave;ng singapore &ndash; c&acirc;y cảnh văn ph&ograve;ng lọc kh&ocirc;ng kh&iacute; tốt cho sức khoẻ</span></h3><p>Những chiếc l&aacute; xanh, to, d&agrave;y v&agrave; cứng gi&uacute;p l&aacute; c&acirc;y loại bỏ được nhiều loại bụi bẩn v&agrave; cung cấp nguồn oxy dồi d&agrave;o ra m&ocirc;i trường. C&acirc;y c&ograve;n c&oacute; thể hấp thu c&aacute;c tia bức xạ điện từ n&ecirc;n rất th&iacute;ch hợp trồng trong c&aacute;c văn ph&ograve;ng l&agrave;m việc c&oacute; nhiều thiết bị m&aacute;y văn ph&ograve;ng. M&agrave;u xanh l&aacute; c&acirc;y cũng gi&uacute;p bạn cải thiện t&acirc;m trạng v&agrave; tốt cho đ&ocirc;i mắt.</p><h3><span id=\"6_Cay_Hanh_Phuc\">6. C&acirc;y Hạnh Ph&uacute;c</span></h3><p>C&aacute;c loại c&acirc;y Hạnh Ph&uacute;c hiện nay c&oacute; rất nhiều k&iacute;ch cỡ kh&aacute;c nhau. C&oacute;&nbsp;<a href=\"https://caycanhminhan.vn/cay-hanh-phuc-de-ban/\">Hạnh Ph&uacute;c nhỏ d&ugrave;ng để b&agrave;n,</a>&nbsp;Hạnh Ph&uacute;c to đặt s&agrave;n. Hạnh Ph&uacute;c to cũng c&oacute; nhiều loại kh&aacute;c nhau: loại 1 tầng, 2 tầng v&agrave; 3 tầng. Một số c&acirc;y l&acirc;u năm c&ograve;n c&oacute; gốc to v&agrave; kiểu d&aacute;ng cũng kh&aacute; độc đ&aacute;o.</p><p><a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-hanh-phuc-dep.jpg\"><img class=\"aligncenter size-full wp-image-2776\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-hanh-phuc-dep.jpg\" sizes=\"(max-width: 500px) 100vw, 500px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-hanh-phuc-dep.jpg 500w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-hanh-phuc-dep-300x400.jpg 300w\" alt=\"c&acirc;y hạnh ph&uacute;c\" width=\"500\" height=\"667\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Cay_Hanh_Phuc_giup_lam_diu_mat_va_cung_cap_nguon_oxy_doi_dao\">C&acirc;y Hạnh Ph&uacute;c gi&uacute;p l&agrave;m dịu mắt v&agrave; cung cấp nguồn oxy dồi d&agrave;o</span></h3><p>Cũng như nhiều loại c&acirc;y xanh văn ph&ograve;ng kh&aacute;c, Hạnh Ph&uacute;c c&oacute; khả năng hấp thụ c&aacute;c tia điện từ v&agrave; cung cấp nguồn oxy dồi d&agrave;o ra m&ocirc;i trường xung quanh. M&agrave;u xanh mướt m&aacute;t của c&acirc;y đem lại sức sống v&agrave; nguồn năng lượng t&iacute;ch cực. Đ&uacute;ng như c&aacute;i t&ecirc;n của m&igrave;nh : Hạnh Ph&uacute;c, c&acirc;y lu&ocirc;n mang đến niềm vui, sự ấm &aacute;p v&agrave; giữ g&igrave;n ho&agrave; kh&iacute; trong c&aacute;c mối quan hệ. Đ&acirc;y l&agrave; loại c&acirc;y đ&aacute;ng để c&oacute; mặt trong văn ph&ograve;ng của bạn.</p><h3><span id=\"7_Cay_Ngu_Gia_Bi\">7. C&acirc;y Ngũ Gia B&igrave;</span></h3><p>Ngũ Gia B&igrave; l&agrave; loại c&acirc;y c&oacute; rất nhiều t&aacute;c dụng với đời sống v&agrave; m&ocirc;i trường. C&acirc;y hấp thụ v&agrave; loại bỏ được phần lớn c&aacute;c chất g&acirc;y &ocirc; nhiễm v&agrave; bụi bẩn. Ngo&agrave;i ra, hương thơm từ tinh dầu của c&acirc;y c&ograve;n xua đuổi muỗi v&agrave; c&ocirc;n tr&ugrave;ng. M&ugrave;i hương dễ chịu của c&acirc;y cũng gi&uacute;p cho ch&uacute;ng ta c&oacute; được tinh thần thư th&aacute;i, thoải m&aacute;i.</p><p><a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-ngu-gia-bi-minhan.jpg\"><img class=\"aligncenter size-full wp-image-2837\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-ngu-gia-bi-minhan.jpg\" alt=\"c&acirc;y ngũ gia b&igrave; tốt cho sức khoẻ\" width=\"317\" height=\"384\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Cay_Ngu_Gia_Bi_loc_khong_khi_va_rat_tot_cho_suc_khoe\">C&acirc;y Ngũ Gia B&igrave; lọc kh&ocirc;ng kh&iacute; v&agrave; rất tốt cho sức khoẻ</span></h3><p>Quan niệm phong thuỷ cũng xem Ngũ Gia B&igrave; l&agrave; l&agrave;i c&acirc;y mang đến giữ được t&agrave;i vận, ti&ecirc;u trừ t&agrave; kh&iacute;. Gi&uacute;p cho người trồng gặp nhiều may mắn v&agrave; b&igrave;nh an hơn trong cuộc sống.</p><h3><span id=\"8_Cay_Cau_Tieu_Tram_8211_Cay_xanh_van_phong_loc_khong_khi_cuc_ky_hieu_qua\">8. C&acirc;y Cau Tiểu Tr&acirc;m &ndash; C&acirc;y xanh văn ph&ograve;ng lọc kh&ocirc;ng kh&iacute; cực kỳ hiệu quả</span></h3><p>D&ugrave; nhỏ b&eacute; nhưng đ&acirc;y l&agrave; loại c&acirc;y n&agrave;y&nbsp; &ldquo;nhỏ m&agrave; c&oacute; v&otilde;&rsquo;. C&acirc;y c&oacute; thể hấp thu c&aacute;c tia bức xạ điện tử v&agrave; loại bỏ ch&uacute;ng khỏi m&ocirc;i trường xung quanh. Ngo&agrave;i ra, c&acirc;y c&ograve;n c&oacute; thể lọc c&aacute;c loại kh&iacute; độc bay hơi từ kh&oacute;i thuốc l&aacute;, xe cộ, đồ da, đồ gỗ,&hellip;Mang đến cho ch&uacute;ng ta bầu kh&ocirc;ng kh&iacute; trong l&agrave;nh, an to&agrave;n cho sức khoẻ.<a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cau-tieu-tram-de-ban-4.jpg\"><img class=\"aligncenter size-full wp-image-2838\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cau-tieu-tram-de-ban-4.jpg\" sizes=\"(max-width: 600px) 100vw, 600px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cau-tieu-tram-de-ban-4.jpg 600w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cau-tieu-tram-de-ban-4-400x400.jpg 400w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cau-tieu-tram-de-ban-4-280x280.jpg 280w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cau-tieu-tram-de-ban-4-100x100.jpg 100w\" alt=\"c&acirc;y cau tiểu tr&acirc;m lọc kh&ocirc;ng kh&iacute; rất tốt\" width=\"600\" height=\"600\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Cay_cau_tieu_tram_loc_khong_khi_rat_tot\">C&acirc;y cau tiểu tr&acirc;m lọc kh&ocirc;ng kh&iacute; rất tốt</span></h3><p>M&agrave;u xanh l&aacute; c&acirc;y cũng gi&uacute;p ch&uacute;ng ta cải thiện tinh thần, tăng sự tập trung v&agrave; giảm c&aacute;c k&iacute;ch th&iacute;ch cho mắt. Mang lại nguồn năng lượng t&iacute;ch cực, tốt cho sức khoẻ v&agrave; tinh thần của con người</p><h3><span id=\"9_Cay_Thuong_Xuan\">9. C&acirc;y Thường Xu&acirc;n</span></h3><p>Thường Xu&acirc;n l&agrave; loại c&acirc;y leo ưa nắng nhẹ v&agrave; m&ocirc;i trường n&oacute;ng ẩm. Những chậu Thường Xu&acirc;n xinh đẹp cũng rất đ&aacute;ng để c&oacute; mặt trong văn ph&ograve;ng của bạn. Khả năng lọc kh&ocirc;ng kh&iacute; của Thường Xu&acirc;n được đ&aacute;nh gi&aacute; rất cao.</p><p><a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-thuong-xuan-leo.jpg\"><img class=\"aligncenter size-full wp-image-2839\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-thuong-xuan-leo.jpg\" sizes=\"(max-width: 600px) 100vw, 600px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-thuong-xuan-leo.jpg 600w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-thuong-xuan-leo-400x400.jpg 400w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-thuong-xuan-leo-280x280.jpg 280w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-thuong-xuan-leo-100x100.jpg 100w\" alt=\"c&acirc;y thường xu&acirc;n\" width=\"600\" height=\"600\" loading=\"lazy\"></a></p><h3><span id=\"Cay_Thuong_Xuan_rat_hieu_qua_trong_viec_loai_bo_cac_loai_khi_doc_trong_khong_khi\">C&acirc;y Thường Xu&acirc;n rất hiệu quả trong việc loại bỏ c&aacute;c loại kh&iacute; độc trong kh&ocirc;ng kh&iacute;</span></h3><p>C&aacute;c nghi&ecirc;n cứu khoa học của NASA đ&atilde; chứng minh c&acirc;y c&oacute; khả năng loại bỏ được rất nhiều chất độc c&oacute; hại như: aldehyde formic, benzen, phenol,&hellip;C&acirc;y c&ograve;n c&oacute; khả năng ngăn chặn c&aacute;c t&aacute;c nh&acirc;n g&acirc;y ung thư như nicotin c&oacute; trong kh&oacute;i thuốc l&aacute;. C&aacute;c ứng dụng &yacute; học cũng đ&aacute;nh gi&aacute; c&aacute;c th&agrave;nh phần c&oacute; trong c&acirc;y Thường Xu&acirc;n c&oacute; thể ngăn ngừa l&atilde;o ho&aacute; v&agrave; sự ph&aacute;t triển của gốc tự do trong cơ thể. Đ&acirc;y thực sự l&agrave; lựa chọn s&aacute;ng gi&aacute; cho ti&ecirc;u chuẩn thanh lọc kh&ocirc;ng kh&iacute;, l&agrave;m trong sạch m&ocirc;i trường sống.</p><h3><span id=\"10_Cay_Hong_Mon\">10. C&acirc;y Hồng M&ocirc;n</span></h3><p>Loại c&acirc;y xinh đẹp n&agrave;y hiện diện phổ biến ở c&aacute;c quầy lễ t&acirc;n, b&agrave;n tiếp kh&aacute;ch, g&oacute;c sofa, kệ s&aacute;ch,&hellip;Nhờ vẻ đẹp thu h&uacute;t v&agrave; &yacute; nghĩa mang lại may mắn, thịnh vượng n&ecirc;n c&acirc;y lu&ocirc;n được nhiều người y&ecirc;u th&iacute;ch. Hồng M&ocirc;n được NASA xếp v&agrave;o h&agrave;ng những loại c&acirc;y c&oacute; khả năng lọc kh&ocirc;ng kh&iacute; tốt nhất.<a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-hong-mon-hop-menh-gi-1000x800-1.jpg\"><img class=\"aligncenter wp-image-2840 size-full\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-hong-mon-hop-menh-gi-1000x800-1.jpg\" sizes=\"(max-width: 700px) 100vw, 700px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-hong-mon-hop-menh-gi-1000x800-1.jpg 700w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-hong-mon-hop-menh-gi-1000x800-1-500x400.jpg 500w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-hong-mon-hop-menh-gi-1000x800-1-600x480.jpg 600w\" alt=\"c&acirc;y hồng m&ocirc;n\" width=\"700\" height=\"560\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Cay_Hong_Mon_loc_bui_ban_va_khi_doc\">C&acirc;y Hồng M&ocirc;n lọc bụi bẩn v&agrave; kh&iacute; độc</span></h3><p>Cũng như nhiều&nbsp;<a href=\"https://caycanhminhan.vn/cay-canh-trong-nha-gia-re/\">c&acirc;y cảnh trong nh&agrave;</a>&nbsp;kh&aacute;c, Hồng M&ocirc;n c&oacute; khả năng lọc bụi bẩn v&agrave; kh&iacute; độc, hạn chế c&aacute;c bức xạ điện tử v&agrave; hiệu ứng nh&agrave; k&iacute;nh. Một chậu&nbsp;<a href=\"https://caycanhminhan.vn/cay-hong-mon-thuy-sinh-cach-trong-va-cham-soc-cay-hong-mon-thuy-sinh/\">Hồng M&ocirc;n</a>&nbsp;kh&ocirc;ng chỉ l&agrave;m bừng l&ecirc;n sức sống cho kh&ocirc;ng gian, m&agrave; c&ograve;n l&agrave;m cho m&ocirc;i trường xung quanh n&oacute; trở n&ecirc;n trong l&agrave;nh hơn.</p><p>Hồng M&ocirc;n hiện nay c&oacute; rất nhiều m&agrave;u sắc kh&aacute;c nhau. C&acirc;y c&oacute; thể trồng được cả thuỷ sinh v&agrave; trong chậu n&ecirc;n c&oacute; rất nhiều lựa chọn cho người mua. Phổ biến v&agrave; được ưa chuộng nhiều hơn cả vẫn l&agrave; Hồng M&ocirc;n đỏ.</p><h3><span id=\"11_Cay_Bach_Ma\">11. C&acirc;y Bạch M&atilde;</span></h3><p>C&ograve;n c&oacute; t&ecirc;n gọi kh&aacute;c l&agrave; c&acirc;y Bạch M&atilde; Ho&agrave;ng Tử. Mang vẻ đẹp lịch l&atilde;m, thể hiện quyền u&yacute; v&agrave; phong độ của ph&aacute;i mạnh. C&acirc;y cũng rất hợp với những ai thuộc<a href=\"https://caycanhminhan.vn/cay-canh-phong-thuy/cay-phong-thuy-menh-kim/\">&nbsp;mệnh Kim</a>&nbsp;v&agrave;&nbsp;<a href=\"https://caycanhminhan.vn/cay-canh-phong-thuy/cay-phong-thuy-menh-thuy/\">mệnh Thuỷ</a></p><p>&nbsp;</p><p><a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/08/chau-bach-ma-de-ban-minhan.jpg\"><img class=\"size-full wp-image-2724 aligncenter\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/08/chau-bach-ma-de-ban-minhan.jpg\" sizes=\"(max-width: 450px) 100vw, 450px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/08/chau-bach-ma-de-ban-minhan.jpg 450w, https://caycanhminhan.vn/wp-content/uploads/2021/08/chau-bach-ma-de-ban-minhan-300x400.jpg 300w\" alt=\"c&acirc;y bạch m&atilde; để b&agrave;n\" width=\"450\" height=\"600\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Chau_cay_Bach_Ma_de_ban\">Chậu c&acirc;y Bạch M&atilde; để b&agrave;n</span></h3><p>Bạch M&atilde; được xếp v&agrave;o Top 10 loại c&acirc;y lọc kh&oacute;i bụi tốt nhất. C&acirc;y c&ograve;n c&oacute; khả năng tăng cường độ ẩm cho m&ocirc;i trường xung quanh. Đặc biệt l&agrave; trong m&ocirc;i trường điều ho&agrave;, kh&ocirc;ng kh&iacute; thường bị kh&ocirc; th&igrave; việc đặt những chậu Bạch M&atilde; l&agrave; điều n&ecirc;n l&agrave;m v&agrave; cần thiết. Việc n&agrave;y sẽ l&agrave;m giảm c&aacute;c chứng bệnh về đường h&ocirc; hấp như: đau r&aacute;t họng, ngạt mũi, sổ mũi,..</p><h3><span id=\"12_Cay_Dai_Phu_Gia\">12. C&acirc;y Đại Ph&uacute; Gia</span></h3><p>Những chiếc l&aacute; xanh khổ lớn gi&uacute;p cho khả năng quang hợp của c&acirc;y tốt hơn. Cung cấp nguồn oxy dồi d&agrave;o v&agrave; thanh lọc bụi bẩn được tốt hơn. C&acirc;y cũng c&oacute; khả năng hấp thu một lượng lớn c&aacute;c bức xạ điện từ c&oacute; hại cho sức khoẻ. Vẻ đẹp ri&ecirc;ng c&oacute;, độc đ&aacute;o của c&acirc;y cũng mang đến sức sống v&agrave; nguồn năng lượng t&iacute;ch cực.</p><p><a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-dai-phu-gia-1.jpg\"><img class=\"aligncenter wp-image-2841\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-dai-phu-gia-1.jpg\" sizes=\"(max-width: 600px) 100vw, 600px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-dai-phu-gia-1.jpg 600w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-dai-phu-gia-1-400x400.jpg 400w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-dai-phu-gia-1-280x280.jpg 280w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-dai-phu-gia-1-100x100.jpg 100w\" alt=\"c&acirc;y đại ph&uacute; gia\" width=\"600\" height=\"600\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Cay_Dai_Phu_Gia_trang_tri_noi_that\">C&acirc;y Đại Ph&uacute; Gia trang tr&iacute; nội thất</span></h3><h3><span id=\"13_Cay_Ngoc_Ngan\">13. C&acirc;y Ngọc Ng&acirc;n</span></h3><p>Với m&agrave;u trắng pha lẫn sắc xanh nổi bật, Ngọc Ng&acirc;n được rất nhiều d&acirc;n c&ocirc;ng sở y&ecirc;u th&iacute;ch v&agrave; trưng b&agrave;y ở nơi l&agrave;m việc. Phiến l&aacute; rộng gi&uacute;p c&acirc;y hấp thu tốt c&aacute;c chất độc hại. Thanh lọc bụi bẩn v&agrave; c&aacute;c loại vi khuẩn g&acirc;y di ứng đường h&ocirc; hấp, giảm k&iacute;ch ứng mắt.<a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-ngoc-ngan-thuy-sinh-1.jpg\"><img class=\"aligncenter wp-image-2844 size-full\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-ngoc-ngan-thuy-sinh-1.jpg\" sizes=\"(max-width: 800px) 100vw, 800px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-ngoc-ngan-thuy-sinh-1.jpg 800w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-ngoc-ngan-thuy-sinh-1-400x400.jpg 400w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-ngoc-ngan-thuy-sinh-1-280x280.jpg 280w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-ngoc-ngan-thuy-sinh-1-768x768.jpg 768w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-ngoc-ngan-thuy-sinh-1-600x600.jpg 600w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-ngoc-ngan-thuy-sinh-1-100x100.jpg 100w\" alt=\"c&acirc;y ngọc ng&acirc;n\" width=\"800\" height=\"800\" loading=\"lazy\"></a></p><h3><span id=\"Cay_Ngoc_Ngan_mang_lai_nhieu_loi_ich_ch_suc_khoe\">C&acirc;y Ngọc Ng&acirc;n mang lại nhiều lợi &iacute;ch ch sức khoẻ</span></h3><p>Ngọc Ng&acirc;n c&ograve;n c&oacute; t&ecirc;n gọi kh&aacute;c l&agrave; &ldquo;c&acirc;y valentine&rdquo;. Thường được d&ugrave;ng l&agrave;m qu&agrave; tặng của đ&ocirc;i lứa đang y&ecirc;u. Tuy nhi&ecirc;n, với những lợi &iacute;ch về mặt sức khoẻ m&agrave; n&oacute; mang lại. Ngọc Ng&acirc;n vẫn l&agrave; lựa chọn tốt cho c&acirc;y cảnh trang tr&iacute; văn ph&ograve;ng.</p><h3><span id=\"14_Cay_Thiet_Moc_Lan\">14. C&acirc;y Thiết Mộc Lan</span></h3><p>Cũng như nhiều loại c&acirc;y văn ph&ograve;ng kh&aacute;c, Thiết Mộc Lan c&oacute; t&aacute;c dụng thanh lọc kh&ocirc;ng kh&iacute;, loại bỏ c&aacute;c chất độc c&oacute; hại cho sức khoẻ. C&acirc;y cũng c&oacute; khả năng hấp thu c&aacute;c bức xạ điện tử. Tuy nhi&ecirc;n, nhiều người trồng Thiết Mộc Lan v&igrave; c&acirc;y c&oacute; &yacute; nghĩa mang lại may mắn v&agrave; tiền t&agrave;i. Đặc biệt, khi c&acirc;y ra hoa l&agrave; b&aacute;o hiệu niềm vui v&agrave; những điều tốt đẹp sắp tới với gia chủ.<a href=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-thiet-moc-lan-la-minhan.jpg\"><img class=\"aligncenter size-full wp-image-2845\" src=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-thiet-moc-lan-la-minhan.jpg\" sizes=\"(max-width: 600px) 100vw, 600px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-thiet-moc-lan-la-minhan.jpg 600w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-thiet-moc-lan-la-minhan-400x400.jpg 400w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-thiet-moc-lan-la-minhan-280x280.jpg 280w, https://caycanhminhan.vn/wp-content/uploads/2021/09/cay-thiet-moc-lan-la-minhan-100x100.jpg 100w\" alt=\"c&acirc;y thiết mộc lan - c&acirc;y cảnh văn ph&ograve;ng lọc kh&ocirc;ng kh&iacute; rất tốt\" width=\"600\" height=\"600\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Thiet_Moc_Lan_la_cay_canh_van_phong_loc_khong_khi_rat_tot\">Thiết Mộc Lan l&agrave; c&acirc;y cảnh văn ph&ograve;ng lọc kh&ocirc;ng kh&iacute; rất tốt</span></h3><h3><span id=\"15_Cay_Truong_Sinh\">15. C&acirc;y Trường Sinh</span></h3><p>Trường Sinh l&agrave;<a href=\"https://caycanhminhan.vn/san-pham/cay-canh-de-ban-gia-re-ben-dep-co-bao-hanh/\">&nbsp;c&acirc;y cảnh để b&agrave;n</a>&nbsp;c&oacute; vẻ ngo&agrave;i kh&aacute; lạ mắt. Điểm nhấn l&agrave; những chiếc l&aacute; xanh mướt, căng mọng, h&igrave;nh bầu tr&ograve;n, hơi nhọn về ph&iacute;a cuống l&aacute;.<a href=\"https://caycanhminhan.vn/wp-content/uploads/2020/08/cay-truong-sinh.jpg\"><img class=\"aligncenter wp-image-1679 size-full\" src=\"https://caycanhminhan.vn/wp-content/uploads/2020/08/cay-truong-sinh.jpg\" sizes=\"(max-width: 800px) 100vw, 800px\" srcset=\"https://caycanhminhan.vn/wp-content/uploads/2020/08/cay-truong-sinh.jpg 800w, https://caycanhminhan.vn/wp-content/uploads/2020/08/cay-truong-sinh-416x400.jpg 416w, https://caycanhminhan.vn/wp-content/uploads/2020/08/cay-truong-sinh-768x739.jpg 768w, https://caycanhminhan.vn/wp-content/uploads/2020/08/cay-truong-sinh-600x578.jpg 600w\" alt=\"c&acirc;y Trường Sinh c&oacute; khả năng lọc kh&ocirc;ng kh&iacute; rất tốt\" width=\"800\" height=\"770\" loading=\"lazy\"></a></p><h3 style=\"text-align: center;\"><span id=\"Cay_Truong_Sinh_co_tac_dung_loc_khi_doc_va_bui_ban\">C&acirc;y Trường Sinh c&oacute; t&aacute;c dụng lọc kh&iacute; độc v&agrave; bụi bẩn</span></h3><p>&nbsp;</p><p>Ngo&agrave;i t&iacute;nh thẫm mĩ cao th&igrave; đ&acirc;y cũng l&agrave; loại c&acirc;y thanh lọc kh&ocirc;ng kh&iacute; rất tốt. Khả năng l&agrave;m sạch kh&ocirc;ng kh&iacute; v&agrave; hấp thu c&aacute;c bức xạ điện từ của c&acirc;y rất đ&aacute;ng nể. M&agrave;u xanh của l&aacute; c&acirc;y cũng gi&uacute;p điều tiết mắt, giảm kh&ocirc; v&agrave; ngứa mắt. Đồng thời cũng cải thiện t&acirc;m trạng, gi&uacute;p bạn vui vẻ v&agrave; sống khoẻ mỗi ng&agrave;y.</p><div class=\"ddict_btn\" style=\"top: 79px; left: 183.788px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\"></div>', '2022-10-30 10:07:10', '2022-10-30 10:07:10', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_address` varchar(550) NOT NULL,
  `order_phone` varchar(20) NOT NULL,
  `sale_price` int NOT NULL DEFAULT '0',
  `order_price` int NOT NULL,
  `payment` varchar(10) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `id_user`, `order_name`, `order_address`, `order_phone`, `sale_price`, `order_price`, `payment`, `status`, `order_date`) VALUES
(29, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Thanh Xuân Bắc.00367-, Quận Cầu Giấy.009-, Thành Phố Hà Nội.01', '0946312559', 0, 480000, 'cod', 0, '2022-11-13 17:48:53'),
(30, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Xã Tân Triều.00643-, Quận Cầu Giấy.020-, Thành Phố Hà Nội.01', '0946312559', 0, 130000, 'cod', 0, '2022-11-13 17:49:39'),
(31, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Mai Dịch.00163-, Quận Cầu Giấy.005-, Thành Phố Hà Nội.01', '0946312559', 0, 180000, 'cod', 2, '2022-11-13 17:54:02'),
(32, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Mai Dịch.00163-, Quận Cầu Giấy.005-, Thành Phố Hà Nội.01', '0946312559', 0, 180000, 'cod', 0, '2022-11-13 17:54:02'),
(33, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Mai Dịch.00163-, Quận Cầu Giấy.005-, Thành Phố Hà Nội.01', '0946312559', 0, 880000, 'online', 0, '2022-11-14 05:52:49'),
(34, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Phú Diễn.00619-, Quận Cầu Giấy.021-, Thành Phố Hà Nội.01', '0946312559', 0, 180000, 'cod', 1, '2022-11-14 05:53:25'),
(35, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Hàng Mã.00043-, Quận Hoàn Kiếm.002-, Thành Phố Hà Nội.01', '0946312559', 0, 430000, 'online', 3, '2022-11-14 06:38:07'),
(36, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Mai Dịch.00163-, Quận Cầu Giấy.005-, Thành Phố Hà Nội.01', '0946312559', 0, 480000, 'cod', 2, '2022-11-14 06:48:14'),
(37, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Mai Dịch.00163-, Quận Cầu Giấy.005-, Thành Phố Hà Nội.01', '0946312559', 50000, 130000, 'online', 2, '2022-11-14 06:51:00'),
(38, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Mai Dịch.00163-, Quận Cầu Giấy.005-, Thành Phố Hà Nội.01', '0946312559', 50000, 280000, 'cod', 3, '2022-11-14 07:00:55'),
(39, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Mai Dịch.00163-, Quận Cầu Giấy.005-, Thành Phố Hà Nội.01', '0946312559', 50000, 280000, 'cod', 3, '2022-11-14 07:12:25'),
(40, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Cổ Nhuế 2.00617-, Quận Bắc Từ Liêm.021-, Thành Phố Hà Nội.01', '0946312559', 50000, 160000, 'online', 2, '2022-11-14 14:00:40'),
(41, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Cổ Nhuế 2.00617-, Quận Bắc Từ Liêm.021-, Thành Phố Hà Nội.01', '0946312559', 50000, 200000, 'online', 3, '2022-11-14 14:02:25'),
(42, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Cổ Nhuế 2.00617-, Quận Bắc Từ Liêm.021-, Thành Phố Hà Nội.01', '0946312559', 30000, 120000, 'cod', 3, '2022-11-15 07:49:07'),
(43, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Cổ Nhuế 2.00617-, Quận Bắc Từ Liêm.021-, Thành Phố Hà Nội.01', '0946312559', 30000, 270000, 'cod', 2, '2022-11-24 06:53:24'),
(44, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Cổ Nhuế 2.00617-, Quận Bắc Từ Liêm.021-, Thành Phố Hà Nội.01', '0946312559', 30000, 600000, 'cod', 0, '2022-11-30 09:19:19'),
(45, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Cổ Nhuế 2.00617-, Quận Bắc Từ Liêm.021-, Thành Phố Hà Nội.01', '0946312559', 30000, 80000, 'cod', 0, '2022-11-30 09:58:27'),
(46, 27, 'Lại Quyết Thắng', '12/41/105 Doãn Kế Thiện-, Phường Cổ Nhuế 2.00617-, Quận Bắc Từ Liêm.021-, Thành Phố Hà Nội.01', '0946312559', 30000, 400000, 'cod', 0, '2022-11-30 10:02:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id_order_detail` int NOT NULL,
  `id_order` int DEFAULT NULL,
  `id_product` int DEFAULT NULL,
  `name_product` varchar(255) DEFAULT NULL,
  `image_product` varchar(550) DEFAULT NULL,
  `quantity_product` int DEFAULT NULL,
  `price_product` int DEFAULT NULL,
  `order_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id_order_detail`, `id_order`, `id_product`, `name_product`, `image_product`, `quantity_product`, `price_product`, `order_created`) VALUES
(5, 29, 16, 'Cây nha đam', 'cay-nha-dam-11.jpg', 3, 450000, '2022-11-13 17:48:53'),
(6, 30, 15, 'Cây vạn tuế', 'cay-van-tue.jpg', 1, 100000, '2022-11-13 17:49:39'),
(7, 31, 16, 'Cây nha đam', 'cay-nha-dam-11.jpg', 1, 150000, '2022-11-13 17:54:02'),
(8, 33, 16, 'Cây nha đam', 'cay-nha-dam-11.jpg', 5, 750000, '2022-11-14 05:52:49'),
(9, 33, 14, 'Cây trúc quân tử', 'cay-truc-quan-tu.jpg', 1, 100000, '2022-11-14 05:52:49'),
(10, 34, 12, 'Cây dương xỉ', 'cay-duong-xi.jpg', 1, 150000, '2022-11-14 05:53:25'),
(11, 35, 11, 'Cây sen đá', 'sen-da.jpg', 4, 400000, '2022-11-14 06:38:07'),
(12, 36, 16, 'Cây nha đam', 'cay-nha-dam-11.jpg', 3, 450000, '2022-11-14 06:48:14'),
(13, 37, 16, 'Cây nha đam', 'cay-nha-dam-11.jpg', 1, 150000, '2022-11-14 06:51:00'),
(14, 38, 16, 'Cây nha đam', 'cay-nha-dam-11.jpg', 2, 300000, '2022-11-14 07:00:55'),
(15, 39, 13, 'Cây xương rồng', 'cay-xuong-rong.jpg', 3, 300000, '2022-11-14 07:12:25'),
(16, 40, 17, 'Cây hạnh phúc', 'cay-hanh-phuc.jpg', 1, 100000, '2022-11-14 14:00:40'),
(17, 41, 15, 'Cây vạn tuế', 'cay-van-tue.jpg', 1, 100000, '2022-11-14 14:02:25'),
(18, 41, 18, 'Cây bướm đêm', 'cây-bướm-đêm-300x300.jpg', 1, 150000, '2022-11-14 14:02:25'),
(19, 42, 18, 'Cây bướm đêm', 'cây-bướm-đêm-300x300.jpg', 1, 150000, '2022-11-15 07:49:07'),
(20, 43, 18, 'Cây bướm đêm', 'cây-bướm-đêm-300x300.jpg', 2, 300000, '2022-11-24 06:53:24'),
(21, 44, 5, 'Cây hồng môn', 'cay-hong-mon-1-549.jpg', 2, 600000, '2022-11-30 09:19:19'),
(22, 45, 17, 'Cây hạnh phúc', 'cay-hanh-phuc.jpg', 1, 100000, '2022-11-30 09:58:27'),
(23, 46, 10, 'Cây hoa nhài', 'cay-hoa-nhai.jpg', 2, 400000, '2022-11-30 10:02:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_policy`
--

CREATE TABLE `tbl_policy` (
  `id` int NOT NULL,
  `title_policy` varchar(550) DEFAULT NULL,
  `image_policy` varchar(550) DEFAULT NULL,
  `description_policy` text,
  `content_policy` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_policy`
--

INSERT INTO `tbl_policy` (`id`, `title_policy`, `image_policy`, `description_policy`, `content_policy`, `created_at`, `updated_at`, `deleted_at`, `deleted`) VALUES
(1, 'Chính sách bảo hành', 'chinh-sach-bao-hanh.jpg', ' Tất cả các sản phẩm được phân phối từ Cây Cảnh Store đều được bảo hành 14 ngày kể từ lúc giao hàng. Đối với các sản phẩm công trình được bảo hành đến khi cây phát triển ổn định, cây ra mầm. Hỗ trợ khách hàng trọn đời trong quá trình chăm cây, cây có hiện tượng lạ, chỉ cần chụp ảnh và gửi cho Cây cảnh Store để được tư vấn', '<p>Ch&iacute;nh s&aacute;ch bảo h&agrave;nh</p><p>1. Thời hạn bảo h&agrave;nh c&acirc;y cảnh</p><p>- Tất cả c&aacute;c sản phẩm được ph&acirc;n phối từ C&acirc;y Cảnh Store đều được bảo h&agrave;nh 14 ng&agrave;y kể từ l&uacute;c giao h&agrave;ng.</p><p>- Đối với c&aacute;c sản phẩm c&ocirc;ng tr&igrave;nh được bảo h&agrave;nh đến khi c&acirc;y ph&aacute;t triển ổn định, c&acirc;y ra mầm.</p><p>- Hỗ trợ kh&aacute;ch h&agrave;ng trọn đời trong qu&aacute; tr&igrave;nh chăm c&acirc;y, c&acirc;y c&oacute; hiện tượng lạ, chỉ cần chụp ảnh v&agrave; gửi cho&nbsp;<code>&lt;a href=\"\"&gt;C&acirc;y cảnh Store&lt;/a&gt;</code> để được tư vấn</p><p>2. Điều kiện bảo h&agrave;nh c&acirc;y cảnh</p><p>Sản phẩm sẽ được bảo h&agrave;nh nếu thỏa m&atilde;n c&aacute;c điều kiện sau:</p><p>a. Sản phẩm c&ograve;n trong hạn bảo h&agrave;nh</p><p>b. Hư hỏng do chất lượng sản phẩm</p><p>c. Sản phẩm kh&ocirc;ng nằm trong trường hợp bị từ chối bảo h&agrave;nh c&acirc;y cảnh</p><p>3. Điều kiện từ chối bảo h&agrave;nh</p><p>Sản phẩm thuộc một trong những điều kiện sau sẽ bị từ chối bảo h&agrave;nh:</p><p>a. Sản phẩm đ&atilde; qu&aacute; thời gian bảo h&agrave;nh</p><p>b. Sản phẩm bị hư do thi&ecirc;n tai, hoả hoạn</p><p>c. Sản phẩm bị hư do chăm s&oacute;c sai hướng dẫn</p><p>d. Kh&aacute;ch h&agrave;ng g&acirc;y n&ecirc;n những khuyết tật như biến dạng, rơi vỡ , trầy xước</p><p>e. Sản phẩm để sai m&ocirc;i trường khuyến c&aacute;o</p><p>f. Sản phẩm bị thay đổi, trồng lại kh&ocirc;ng phải do nh&acirc;n vi&ecirc;n của C&acirc;y Cảnh Store</p><p>g. Sản phẩm kh&ocirc;ng mua từ C&acirc;y Cảnh Store</p><p>i. Kh&ocirc;ng bảo h&agrave;nh vật dụng k&egrave;m theo nếu c&oacute;</p>', '2022-10-30 10:52:23', '2022-10-30 10:52:23', NULL, 0),
(2, 'Chính sách đổi trả hàng', 'chinh-sach-doi-tra.jpg', 'Giao hàng không đảm bảo, không đúng mong muốn quý khách yên tâm có thể trả lại cho Web Cây Cảnh để được hoàn tiền nếu đã thanh toán. Tuy nhiên nếu Quý khách hàng đặt sản phẩm nhưng không đọc kỹ kích thước, hình dáng…Dẫn đến sản phẩm không được như mong muốn Quý khách hàng vẫn có thể trả lại nhưng sẽ phải chịu hoàn toàn chi phí vận chuyển đến và trả lại. Mua nhầm, muốn đổi lại, chúng tôi nhận lại và đổi hàng khác đúng mong muốn Quý khách.', '<div id=\"pills-des\" class=\"content-news\"><p style=\"text-align: justify;\">Giao h&agrave;ng kh&ocirc;ng đảm bảo, kh&ocirc;ng đ&uacute;ng mong muốn qu&yacute; kh&aacute;ch y&ecirc;n t&acirc;m c&oacute; thể trả lại cho <strong>Web C&acirc;y Cảnh</strong> để được ho&agrave;n tiền nếu đ&atilde; thanh to&aacute;n. Tuy nhi&ecirc;n nếu Qu&yacute; kh&aacute;ch h&agrave;ng đặt sản phẩm nhưng kh&ocirc;ng đọc kỹ k&iacute;ch thước, h&igrave;nh d&aacute;ng&hellip;Dẫn đến sản phẩm kh&ocirc;ng được như mong muốn Qu&yacute; kh&aacute;ch h&agrave;ng vẫn c&oacute; thể trả lại nhưng sẽ phải chịu ho&agrave;n to&agrave;n chi ph&iacute; vận chuyển đến v&agrave; trả lại.<br>Mua nhầm, muốn đổi lại, ch&uacute;ng t&ocirc;i nhận lại v&agrave; đổi h&agrave;ng kh&aacute;c đ&uacute;ng mong muốn Qu&yacute; kh&aacute;ch.</p><p><strong>Quy định chung:</strong></p><p>H&agrave;ng đổi/trả phải c&ograve;n nguy&ecirc;n, kh&ocirc;ng bị g&atilde;y l&aacute;, g&atilde;y b&ocirc;ng, chậu v&agrave; đĩa kh&ocirc;ng bị bể, nứt. Những vật phẩm trang tr&iacute; chưa qua sử dụng, kh&ocirc;ng bị d&iacute;nh keo hoặc bị khoan lỗ.</p><p><strong>Những điều lưu &yacute;:</strong></p><p style=\"text-align: justify;\">&ndash; Ch&uacute;ng t&ocirc;i khuyến c&aacute;o Qu&yacute; Kh&aacute;ch H&agrave;ng phải<strong> kiểm tra t&igrave;nh trạng sản phẩm trước khi thanh to&aacute;n </strong>để đảm bảo rằng h&agrave;ng h&oacute;a được giao đ&uacute;ng chủng loại, số lượng, m&agrave;u sắc theo đơn đặt h&agrave;ng v&agrave; t&igrave;nh trạng b&ecirc;n ngo&agrave;i kh&ocirc;ng bị t&aacute;c động<em> (</em><em>kh&ocirc;ng bị g&atilde;y l&aacute;, g&atilde;y b&ocirc;ng, chậu v&agrave; đĩa kh&ocirc;ng bị bể, nứt</em><em>)</em><em>.</em> Nếu gặp trường hợp n&agrave;y, Qu&yacute; kh&aacute;ch vui l&ograve;ng từ chối nhận h&agrave;ng hoặc b&aacute;o ngay cho bộ phận hỗ trợ kh&aacute;ch h&agrave;ng để ch&uacute;ng t&ocirc;i c&oacute; phương &aacute;n xử l&iacute; kịp thời.</p><p style=\"text-align: justify;\">&ndash; Trong trường hợp kh&aacute;ch h&agrave;ng nhận h&agrave;ng v&agrave; thanh to&aacute;n đủ, sau đ&oacute; ph&aacute;t hiện h&agrave;ng h&oacute;a<em> bị g&atilde;y l&aacute;, g&atilde;y b&ocirc;ng, chậu v&agrave; đĩa kh&ocirc;ng bị bể, nứt, thiếu h&agrave;ng. Ch&uacute;ng t&ocirc;i kh&ocirc;ng chịu tr&aacute;ch nhiệm cho sai s&oacute;t tr&ecirc;n. </em>Tốt nhất<em> </em>trả h&agrave;ng ngay sau khi nhận được h&agrave;ng, khi nh&acirc;n vi&ecirc;n giao nhận của C&acirc;y Cảnh Store&nbsp;c&ograve;n ở đ&oacute;.</p><p style=\"text-align: justify;\">&ndash; Trong trường hợp kh&aacute;ch h&agrave;ng nhận h&agrave;ng v&agrave; thanh to&aacute;n đủ, sau khi kiểm lại ph&aacute;t hiện sai k&iacute;ch thướt hoặc m&agrave;u chậu, sai sản phẩm xin vui l&ograve;ng chụp ảnh sản phẩm gửi về hộp thư webcaycanhhot@gmail.com để được ch&uacute;ng t&ocirc;i hỗ trợ c&aacute;c bước tiếp theo như đổi- trả h&agrave;ng Qu&yacute; kh&aacute;ch.</p><p><strong><em>*Kh&ocirc;ng &aacute;p dụng trả h&agrave;ng đối với sản phẩm đ&atilde; duyệt thiết kế.</em></strong></p><ol><li><strong><strong>Đổi h&agrave;ng:</strong></strong></li></ol><p><strong><strong>Trường hợp được đổi:</strong></strong></p><ul><li style=\"text-align: justify;\">Qu&yacute; Kh&aacute;ch được quyền đổi h&agrave;ng khi sản phẩm bị hư hỏng do qu&aacute; tr&igrave;nh vận chuyển ( dập l&aacute;, g&atilde;y l&aacute;).</li><li style=\"text-align: justify;\">Kh&aacute;ch h&agrave;ng được đổi sản phẩm theo y&ecirc;u cầu, sai kiểu d&aacute;ng, sai m&agrave;u chậu, sai k&iacute;ch thước, nhầm sản phẩm do lỗi nh&agrave; cung cấp.</li><li style=\"text-align: justify;\">Trường hợp c&acirc;y cảnh của Web c&acirc;y cảnh cung cấp cho qu&yacute; kh&aacute;ch nhưng trong thời gian một tuần m&agrave; c&acirc;y c&oacute; những dấu hiệu xuống cấp, bị bệnh&hellip; th&igrave; qu&yacute; kh&aacute;ch cứ y&ecirc;n t&acirc;m, vẫn được đổi lại.</li></ul><p><strong>Y&ecirc;u cầu đối với sản phẩm đổi:</strong></p><ul><li>Đổi sản phẩm theo &yacute; muốn kh&aacute;ch h&agrave;ng. Sản phẩm đổi phải c&oacute; gi&aacute; trị tương đương hoặc cao hơn gi&aacute; trị h&agrave;ng đ&atilde; mua trước đ&oacute;.</li></ul><p><strong><em>*C&ocirc;ng ty chịu ho&agrave;n to&agrave;n chi ph&iacute; cho việc đổi h&agrave;ng n&agrave;y.</em></strong></p><ol><li value=\"2\"><strong>Trả h&agrave;ng:</strong></li></ol><p>Qu&yacute; kh&aacute;ch được quyền trả h&agrave;ng ngay khi nhận h&agrave;ng v&igrave; c&aacute;c l&yacute; do sau:</p><ul><li>H&agrave;ng kh&ocirc;ng đ&uacute;ng chất lượng cam kết</li><li>H&agrave;ng giao nhầm k&iacute;ch thước, nhầm sản phẩm hoặc hư hỏng do lỗi của C&ocirc;ng ty Web C&acirc;y Cảnh</li></ul><p><strong>C&aacute;c mặt h&agrave;ng kh&ocirc;ng được trả:</strong></p><ul><li>Ch&uacute;ng t&ocirc;i kh&ocirc;ng nhận trả c&aacute;c mặt h&agrave;ng được tặng k&egrave;m hoặc khuyến m&atilde;i</li><li>Ch&uacute;ng t&ocirc;i kh&ocirc;ng nhận trả c&aacute;c mặt h&agrave;ng bạn đ&atilde; trồng hay l&agrave;m hư bầu.</li></ul><p><strong>Ph&iacute; gửi h&agrave;ng lần 2:</strong></p><p>Nếu việc đổi h&agrave;ng xuất ph&aacute;t từ ph&iacute;a Kh&aacute;ch h&agrave;ng (đổi chủng loại c&acirc;y kh&aacute;c, đổi loại kh&aacute;c,&hellip;): &aacute;p dụng theo bảng Ph&iacute; Giao h&agrave;ng.</p><p>Nếu việc đổi h&agrave;ng với gi&aacute; sản phẩm &iacute;t hơn hoặc nhiều hơn th&igrave; Kh&aacute;ch h&agrave;ng sẽ được trả tiền lại hoặc phải b&ugrave; th&ecirc;m tiền.</p><p>Nếu việc đổi h&agrave;ng do lỗi của Web C&acirc;y Cảnh: miễn ph&iacute; gửi h&agrave;ng lần 2</p><p><strong>Lưu &yacute;:</strong></p><p style=\"text-align: justify;\">C&aacute;c trường hợp gửi trả ph&aacute;t sinh từ Qu&yacute; Kh&aacute;ch h&agrave;ng khi đặt h&agrave;ng sẽ kh&ocirc;ng được ho&agrave;n trả lại bất cứ chi ph&iacute; n&agrave;o..</p><p style=\"text-align: justify;\">Sau khi x&aacute;c nhận sản phẩm gửi trả đ&atilde; nhập kho, ch&uacute;ng t&ocirc;i sẽ tiến h&agrave;nh ho&agrave;n tiền cho Qu&yacute; Kh&aacute;ch.</p><ol><li value=\"3\"><strong>Hướng dẫn Hủy đơn đặt h&agrave;ng:</strong></li></ol><p>Qu&yacute; Kh&aacute;ch c&oacute; thể hủy đơn đặt h&agrave;ng khi h&agrave;ng vẫn c&ograve;n trong trạng th&aacute;i &ldquo;Sản phẩm đang được chuẩn bị&rdquo; hoặc li&ecirc;n hệ sớm nhất với hotline b&aacute;n h&agrave;ng <strong>09888.33.653</strong> để được hỗ trợ.</p><p>Ho&agrave;n tiền t&ugrave;y theo phương thức thanh to&aacute;n khi hủy đơn đặt h&agrave;ng:</p><p>Thanh to&aacute;n bằng c&aacute;ch chuyển khoản: tất cả đều được ho&agrave;n lại bằng h&igrave;nh thức chuyển khoản.</p></div>', '2022-10-30 10:52:23', '2022-10-30 10:52:23', NULL, 0),
(3, 'Chính sách giao hàng', 'Giao-hàng-tận-nơi.png', 'Công ty sẽ chịu trách nhiệm với hàng hóa và các rủi ro như mất mát hoặc hư hại của sản phẩm trong suốt quá trình vận chuyển hàng từ kho của chúng tôi đến quý khách. Quý khách có trách nhiệm kiểm tra hàng hóa khi nhận hàng. Khi phát hiện cây cảnh bị hư hại, gãy cảnh, vỡ chậu, hoặc sai loại cây thì ký xác nhận tình trạng này với Nhân viên giao nhận và thông báo ngay cho Bộ phận chăm sóc khách hàng theo số hotline bán hàn 09888.33.653 của Công ty. Sau khi qúy khách đã ký nhận hàng mà không ghi chú hoặc có ý kiến về hàng hóa. Công ty không có trách nhiệm với những yêu cầu đổi trả từ phía quý khách sau này. Nếu dịch vụ vận chuyển do quý khách chỉ định và lựa chọn thì quý khách sẽ chịu trách nhiệm với chuyến hàng và các rủi ro kèm theo, như mất mát hoặc hư hại hàng trong suốt quá trình vận chuyển hàng từ kho hàng của công ty đến quý khách. Khách hàng sẽ chịu trách nhiệm về cước phí và tổn thất liên quan.', '<div class=\"w100\"><h1 class=\"tit-h1 marb20 padb20 font30 UTMHelvetIns cl_xanh6\">Chính sách giao hàng</h1></div><div class=\"content-news\" id=\"pills-des\"><p style=\"text-align: justify;\"><strong>1. PHẠM VI ÁP DỤNG:</strong><br />– Tất cả các khách hàng mua sản phẩm tại Website https://webcaycanh.com hoặc khách hàng đến trực tiếp xem và mua hàng tại công ty có nhu cầu giao hàng trực tiếp tại nhà.<br /><strong>2. HÌNH THỨC ÁP DỤNG:</strong></p><p><strong>2.1. Giao hàng miễn phí :</strong></p><p style=\"text-align: justify;\">Giao hàng miễn phí trong phạm vi các quận thuộc nội thành Hà Nội và các đại lý của Web Cây Cảnh – áp dụng cho các đơn hàng có giá trị từ <strong>1.500.000 đồng</strong>. Không áp dụng với các cá nhân mua buôn.</p><p><strong>2.2 . Giao hàng tính phí:</strong></p><p style=\"text-align: justify;\">– Ngoài trường hợp giao hàng miễn phí trên, các trường hợp còn lại sẽ được tính phí giao hàng theo bảng phí vận chuyển của hãng vận chuyển thứ 3 hoặc theo bảng phí của công ty. Chi phí này sẽ được công ty thông báo và xác nhận với quý khách trước khi quý khách tiến hành thanh toán và công ty tiến hành gửi hàng.</p><p><strong>3. THỜI GIAN GIAO HÀNG:</strong></p><p style=\"text-align: justify;\">– Thời gian giao hàng sẽ giao trong ngày tùy thuộc vào khoảng cách vận chuyển và kích thước cây.</p><p style=\"text-align: justify;\">– Trong một số trường hợp khách quan Công ty có thể giao hàng chậm trễ do những điều kiện bất khả kháng như thời tiết xấu, điều kiện giao thông không thuận lợi, xe hỏng hóc trên đường, trục trặc trong quá trình xuất cây cảnh khỏi kho.</p><p style=\"text-align: justify;\">– Trong thời gian chờ đợi nhận hàng, Quý khách có bất cứ thắc mắc gì về thông tin vận chuyển xin vui lòng liên hệ hotline <strong>09888.33.653</strong> của chúng tôi để nhận trợ giúp.</p><p><strong>4. TRÁCH NHIỆM VỚI HÀNG HÓA VẬN CHUYỂN.</strong></p><p style=\"text-align: justify;\">– Công ty sẽ chịu trách nhiệm với hàng hóa và các rủi ro như mất mát hoặc hư hại của sản phẩm trong suốt quá trình vận chuyển hàng từ kho của chúng tôi đến quý khách.</p><p style=\"text-align: justify;\">– Quý khách có trách nhiệm kiểm tra hàng hóa khi nhận hàng. Khi phát hiện cây cảnh bị hư hại, gãy cảnh, vỡ chậu, hoặc sai loại cây thì ký xác nhận tình trạng này với Nhân viên giao nhận và thông báo ngay cho Bộ phận chăm sóc khách hàng theo số hotline bán hàn <strong>09888.33.653</strong> của Công ty.</p><p style=\"text-align: justify;\">– Sau khi qúy khách đã ký nhận hàng mà không ghi chú hoặc có ý kiến về hàng hóa. Công ty không có trách nhiệm với những yêu cầu đổi trả từ phía quý khách sau này.</p><p style=\"text-align: justify;\">– Nếu dịch vụ vận chuyển do quý khách chỉ định và lựa chọn thì quý khách sẽ chịu trách nhiệm với chuyến hàng và các rủi ro kèm theo, như mất mát hoặc hư hại hàng trong suốt quá trình vận chuyển hàng từ kho hàng của công ty đến quý khách. Khách hàng sẽ chịu trách nhiệm về cước phí và tổn thất liên quan.</p><p><strong>5. CÁC ĐIỀU KIỆN KHÁC</strong></p><p style=\"text-align: justify;\">– Chính sách giao hàng miễn phí không áp dụng đối với những sản phẩm được mua trong chương trình khuyến mại giờ vàng, giá sốc…..</p><p style=\"text-align: justify;\">– Chi phí cầu đường, phí vào thôn xã hoặc phí đỗ xe tại chung cư do khách hàng tự thanh toán.</p><p style=\"text-align: justify;\">– Công ty chỉ giao hàng cho đúng người nhận mà Quý khách hàng đã đăng ký khi mua hàng. Trong quá trình giao hàng nếu có sự thay đổi người nhận một cách không rõ ràng, chúng tôi có quyền từ chối giao hàng và yêu cầu quý khách hàng nhận hàng tại địa điểm của bán hàng của công ty.</p><p style=\"text-align: justify;\">– Nếu địa chỉ giao hàng không rõ ràng, nằm trong ngõ ngách, hoặc ở những nơi nguy hiểm, những vùng đồi núi hiểm trở, phương tiện giao thông đi lại khó khăn, chúng tôi có quyền từ chối vận chuyển, giao nhận hàng trực tiếp.</p><p style=\"text-align: justify;\">– Trong các trường hợp bất khả kháng, do thiên tai, lũ lụt, hỏng hóc cầu phà …, chúng tôi không chịu trách nhiệm bồi thường thiệt hại phát sinh do giao hàng không đúng thời gian hoặc không vận chuyển hàng hóa đến địa điểm như đã thỏa thuận với khách hàng.</p><p style=\"text-align: justify;\">– Trường hợp chúng tôi đã vận chuyển hàng đến địa điểm giao nhận như thỏa thuận lúc mua hàng, nhưng vì một lý do nào đó khách hàng yêu cầu trả lại hàng thì lúc đó khách hàng phải chịu chi phí vận chuyển theo quy định của công ty.</p><p style=\"text-align: justify;\">– Đối với những sản phẩm nặng và cồng kềnh cần vận chuyển lên tầng mà không có thang máy đề nghị khách hàng hỗ trợ trong việc giao nhận.</p><p style=\"text-align: justify;\">– Trong những ngày đặc biệt hoặc các ngày Lễ hội do chính sách giao thông chung bị hạn chế (cấm đường đối với một số phương tiện…) thời gian giao hàng có thể sẽ thay đổi, Chúng tôi sẽ gọi điện cho khách hàng để thống nhất thời gian giao nhận.</p></div>', '2022-10-30 10:52:23', '2022-10-30 10:52:23', NULL, 0),
(4, 'Chính sách bảo mật thông tin', 'chinh-sach-bao-mat-quatangceno-1.png', 'Nội dung “Chính sách bảo mật thông tin” này chỉ áp dụng tại https://caycanhstore.com/, không bao gồm hoặc liên quan đến các bên thứ ba đặt quảng cáo hay có links tại trang này. Chúng tôi khuyến khích bạn đọc kỹ chính sách An toàn và Bảo mật của các trang web của bên thứ ba trước khi cung cấp thông tin cá nhân cho các trang web đó. Chúng tôi không chịu trách nhiệm dưới bất kỳ hình thức nào về nội dung và tính pháp lý của trang web thuộc bên thứ ba.', '<div class=\"w100\"><h1 class=\"tit-h1 marb20 padb20 font30 UTMHelvetIns cl_xanh6\">Chính sách bảo mật thông tin</h1></div><div class=\"content-news\" id=\"pills-des\"><p style=\"text-align: justify;\">Chúng tôi cam kết sẽ bảo mật những thông tin mang tính riêng tư của khách hàng. Quý khách vui lòng đọc bản “Chính sách bảo mật thông tin” dưới đây để hiểu hơn những cam kết mà chúng tôi thực hiện, nhằm tôn trọng và bảo vệ quyền lợi của người truy cập:<br /><strong>1. Thu thập thông tin cá nhân:</strong><br />– Các thông tin thu thập thông qua website giúp chúng tôi bao gồm:<br />• Hỗ trợ khách hàng khi mua sản phẩm<br />• Giải đáp thắc mắc khách hàng<br />• Cung cấp cho bạn thông tin mới nhất trên Website của chúng tôi<br />• Xem xét và nâng cấp nội dung và giao diện của Website<br />• Thực hiện các hoạt động quảng bá liên quan đến các sản phẩm và dịch vụ của Web Cây Cảnh.<br />– Để truy cập và sử dụng một số dịch vụ tại website của chúng tôi, quý khách có thể sẽ được yêu cầu đăng ký với chúng tôi thông tin cá nhân (bao gồm họ tên, email, số điện thoại liên lạc, địa chỉ). Mọi thông tin khai báo phải đảm bảo tính chính xác và hợp pháp. Web Cây Cảnh không chịu bất cứ trách nhiệm nào liên quan đến pháp luật của thông tin khai báo.<br />– Chúng tôi cũng có thể thu thập thông tin về số lần viếng thăm, bao gồm số trang quý khách xem, số links (liên kết) bạn click và những thông tin khác liên quan đến việc kết nối đến https://webcaycanh.com/ . Chúng tôi cũng thu thập các thông tin mà trình duyệt web quý khách đang sử dụng mỗi khi truy cập vào website của chúng tôi , bao gồm: địa chỉ IP, loại trình duyệt, ngôn ngữ sử dụng, thời gian và những địa chỉ mà trình duyệt này truy xuất đến.</p><p style=\"text-align: justify;\"><strong>2. Sử dụng thông tin cá nhân:</strong><br />– https://webcaycanh.com/ thu thập và sử dụng thông tin cá nhân quý khách với mục đích phù hợp và hoàn toàn tuân thủ nội dung của “Chính sách bảo mật thông tin” này.<br />– Khi cần thiết, chúng tôi có thể sử dụng những thông tin này để liên hệ trực tiếp với bạn dưới các hình thức như: gởi thư điện tử, đơn đặt hàng, thư cảm ơn, thông tin về kỹ thuật và bảo mật, quý khách có thể nhận được thư định kỳ cung cấp thông tin sản phẩm cây cảnh, dịch vụ mới, thông tin về các sự kiện sắp tới hoặc thông tin tuyển dụng nếu quý khách đăng kí nhận email thông báo.</p><p style=\"text-align: justify;\"><strong>3. Chia sẻ thông tin cá nhân:</strong><br />– Ngoại trừ các trường hợp về Sử dụng thông tin cá nhân như đã nêu trong chính sách này, chúng tôi cam kết sẽ không tiết lộ thông tin cá nhân bạn ra ngoài.<br />– Trong một số trường hợp, chúng tôi có thể thuê một đơn vị độc lập để tiến hành các dự án nghiên cứu thị trường và khi đó thông tin của bạn sẽ được cung cấp cho đơn vị này để tiến hành dự án. Bên thứ ba này sẽ bị ràng buộc bởi một thỏa thuận về bảo mật mà theo đó họ chỉ được phép sử dụng những thông tin được cung cấp cho mục đích hoàn thành dự án.<br />– Chúng tôi có thể tiết lộ hoặc cung cấp thông tin cá nhân của bạn trong các trường hợp thật sự cần thiết như sau: (a) khi có yêu cầu của các cơ quan pháp luật; (b) trong trường hợp mà chúng tôi tin rằng điều đó sẽ giúp chúng tôi bảo vệ quyền lợi chính đáng của mình trước pháp luật; (c) tình huống khẩn cấp và cần thiết để bảo vệ quyền an toàn cá nhân của các thành viên khác của https://webcaycanh.com/.</p><p style=\"text-align: justify;\"><strong>4. Truy xuất thông tin cá nhân:</strong><br />– Bất cứ thời điểm nào quý khách cũng có thể truy cập và chỉnh sửa những thông tin cá nhân của mình theo các liên kết (links) thích hợp mà chúng tôi cung cấp.<br /><strong>5. Bảo mật thông tin cá nhân</strong>:<br />– Khi bạn gửi thông tin cá nhân của bạn cho chúng tôi, bạn đã đồng ý với các điều khoản mà chúng tôi đã nêu ở trên, https://webcaycanh.com/ cam kết bảo mật thông tin cá nhân của quý khách bằng mọi cách thức có thể. Chúng tôi sẽ sử dụng nhiều công nghệ bảo mật thông tin khác nhau nhằm bảo vệ thông tin này không bị truy lục, sử dụng hoặc tiết lộ ngoài ý muốn.<br />– Tuy nhiên do hạn chế về mặt kỹ thuật, không một dữ liệu nào có thể được truyền trên đường truyền internet mà có thể được bảo mật 100%. Do vậy, chúng tôi không thể đưa ra một cam kết chắc chắn rằng thông tin quý khách cung cấp cho chúng tôi sẽ được bảo mật một cách tuyệt đối an toàn, và chúng tôi không thể chịu trách nhiệm trong trường hợp có sự truy cập trái phép thông tin cá nhân của quý khách như các trường hợp quý khách tự ý chia sẻ thông tin với người khác…. Nếu quý khách không đồng ý với các điều khoản như đã mô tả ở trên, Chúng tôi khuyên quý khách không nên gửi thông tin đến cho chúng tôi.</p><p style=\"text-align: justify;\"><strong>8. Thay đổi về chính sách:</strong><br />– Chúng tôi hoàn toàn có thể thay đổi nội dung trong trang này mà không cần phải thông báo trước, để phù hợp với các nhu cầu của https://webcaycanh.com/ cũng như nhu cầu và sự phản hồi từ khách hàng nếu có. Khi cập nhật nội dung chính sách này, chúng tôi sẽ chỉnh sửa lại thời gian “Cập nhật lần cuối” bên dưới.<br />– Nội dung “Chính sách bảo mật thông tin” này chỉ áp dụng tại https://webcaycanh.com/, không bao gồm hoặc liên quan đến các bên thứ ba đặt quảng cáo hay có links tại trang này. Chúng tôi khuyến khích bạn đọc kỹ chính sách An toàn và Bảo mật của các trang web của bên thứ ba trước khi cung cấp thông tin cá nhân cho các trang web đó. Chúng tôi không chịu trách nhiệm dưới bất kỳ hình thức nào về nội dung và tính pháp lý của trang web thuộc bên thứ ba.<br />– Vì vậy, bạn đã đồng ý rằng, khi bạn sử dụng website của chúng tôi sau khi chỉnh sửa nghĩa là bạn đã thừa nhận, đồng ý tuân thủ cũng như tin tưởng vào sự chỉnh sửa này. Do đó, chúng tôi đề nghị bạn nên xem trước nội dung trang này trước khi truy cập các nội dung khác trên website cũng như bạn nên đọc và t ham khảo kỹ nội dung “Chính sách bảo mật” của từng website mà bạn đang truy cập.</p></div>', '2022-10-30 10:52:23', '2022-10-30 10:52:23', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_position`
--

CREATE TABLE `tbl_position` (
  `id_position` int NOT NULL,
  `name_position` varchar(255) DEFAULT NULL,
  `deleted` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_position`
--

INSERT INTO `tbl_position` (`id_position`, `name_position`, `deleted`) VALUES
(1, 'Nhân viên bán hàng', 0),
(2, 'Quản lý', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `name_product` varchar(550) DEFAULT NULL,
  `image_product` varchar(550) DEFAULT NULL,
  `price_product` int DEFAULT NULL,
  `discount_product` int DEFAULT '0',
  `amount_product` int DEFAULT NULL,
  `short_description` text,
  `description` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `category_id`, `name_product`, `image_product`, `price_product`, `discount_product`, `amount_product`, `short_description`, `description`, `created_at`, `updated_at`, `deleted_at`, `deleted`) VALUES
(1, 1, 'Cây kim tiền', 'cay-kim-tien.jpg', 150000, 0, 10, 'Cây kim tiền còn được gọi là cây kim phát tài, cây phát tài, kim tiền phát lộc có nguồn gốc từ Châu Phi. Là loài cây cảnh dễ trồng, dễ chăm sóc, ít sâu bệnh, thường phổ biến trang trí trong không gian nhà hoặc văn phòng. Người ta tin rằng trồng cây kim tiền trong nhà sẽ đem lại sư may mắn, giàu có và thuận hòa cho gia chủ, giúp họ thăng tiến trong công việc.', NULL, '2022-10-29 06:54:41', '2022-10-29 06:54:41', NULL, 1),
(2, 1, 'Cây kim ngân', 'Kim-ngan_2-300x300.jpg', 300000, 180000, 10, 'Kim Ngân được biết đến là 1 trong số những loài cây mang lại điều tốt lành, may mắn và có nhiều ý nghĩa phong thủy đối với gia chủ. Chính vì vậy mà đây là loài cây rất được ưa chuộng ở nước ta. Cùng tìm hiểu ý nghĩa phong thủy, cách trồng và chăm sóc cây Kim Ngân ngay nha.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(3, 1, 'Cây trầu bà', 'trau-ba.jpg', 150000, 0, 10, 'Cây trầu bà là một loài cây thuộc họ Araceae, tên khoa học là Epipremnum aureum. Loài cây này có nguồn gốc từ Indonesia, tuy nhiên hiện nay đã được trồng phổ biến tại nhiều nước trên thế giới, trong đó có Việt Nam. Nhờ vào khả năng sinh trưởng mạnh mẽ, dễ thích nghi với mọi điều kiện sống, cây trầu bà được xem là biểu tượng cho sự thịnh vượng, thăng tiến trong cuộc sống.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(4, 1, 'Cây trúc phú quý', 'truc-phu-quy.jpg', 150000, 0, 10, 'Trúc phú quý có nguồn gốc từ quần đảo Canary, được trồng phổ biến ở các nước châu Á. Trúc phú quý còn được gọi là trúc trường thọ, trúc may mắn, trúc vạn niên, trúc tiêu, trúc hạnh vận… Được dùng làm cây cảnh trang trí văn phòng, nhà ở nên trúc phú quý không phát triển cao như những loài trúc khác cùng họ. Cây trưởng thành thường chỉ cao khoảng 30-50cm. Loài cây này có thân mọc thẳng đứng, đốt trên thân cây, mỗi đốt trúc cách nhau 2-3cm. Thân cây rất mềm dẻo nên có thể uốn thành nhiều hình thế tùy thích. Trúc phú quý không có cành cây mà chỉ có lá mọc từ thân. Lá mọc riêng biệt, có bẹ ép sát vào thân, không mọc thành từng chùm. Lá xanh bóng, hình giáo mác, mọc dần về phía đỉnh cây. Rễ cây mọc thành dạng chùm và rất dễ phát triển, nhất là nếu được trồng trong nước.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(5, 2, 'Cây hồng môn', 'cay-hong-mon-1-549.jpg', 300000, 0, 8, 'Đại hồng môn là loài cây hoa đẹp, sang trọng và rất đa dạng về màu sắc cũng như hình dáng của hoa. Bởi vậy, cây này thường hay được trồng trong chậu và trang trí trong nhà, phòng làm việc. Đại hồng môn có hoa hình trái tìm với nhiều ý nghĩa và cảm xúc cho người ngắm nhìn.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(6, 2, 'Cau tiểu trâm', 'image-20200627090122-1.jpeg', 300000, 0, 10, 'Cây Cau Tiểu Trâm có tên khoa học Chamaedorea elegans, là loại cây thuộc họ nhà cau, có nguồn gốc từ Trung Mỹ và được du nhập về Việt Nam từ rất lâu. Cây có hình dáng giống một cây dừa mini với chiều cao trung bình từ 15 - 40 cm, lá cau mọc từ thân chính, các bẹ lá và thân cau có màu vàng kết hợp hài hòa với nhau tạo nên vẻ hài hòa, bắt mắt, đầy sức sống.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(7, 2, 'Cây cọ ta', 'cay-co-ta.jpg', 200000, 0, 10, 'Cây cọ ta hay còn được gọi là cây cọ lùn, có pháp danh khoa học là Livistona chinensis, thuộc học cau. Nguồn gốc của cây là từ miền Nam của Trung Quốc, và hiện tại thì nó được trồng ở rất nhiều nơi. Cây cọ ta sinh trưởng và phát triển tốt nhất ở vùng có khi hậu nhiệt đới.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(8, 2, 'Cây lan bình rượu', 'cay-lan-binh-ruou.jpeg', 300000, 0, 10, 'Cây lan bình rượu ngoài việc làm đẹp và thanh lọc không khí, làm cho không gian sống thêm tươi xanh, thanh nhã thì nó còn có mang ý nghĩa tốt trong phong thủy. Lan bình rượu trong phong thủy được dùng để khai vận, người ta đặt nó hướng bắc, tây bắc và hướng đông để gia tăng vận khí, vượng tài, trừ tẩy uế khí, từ đó công việc thuận lợi và thăng tiến. Vì thế, cây lan bình rượu còn được lựa chọn dùng để làm quà tặng cho những cá nhân, tổ chức, doanh nghiệp.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(9, 3, 'Cây đinh lăng lá tròn', 'cay-dinh-lang-la-tron.jpg', 150000, 0, 10, 'Vì thế, cây lan bình rượu còn được lựa chọn dùng để làm quà tặng cho những cá nhân, tổ chức, doanh nghiệp.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(10, 3, 'Cây hoa nhài', 'cay-hoa-nhai.jpg', 200000, 0, 8, 'Vì thế, cây lan bình rượu còn được lựa chọn dùng để làm quà tặng cho những cá nhân, tổ chức, doanh nghiệp.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(11, 3, 'Cây sen đá', 'sen-da.jpg', 100000, 0, 10, 'Cây sen đá là biểu tượng cho ý chí kiên cường, phấn đấu vươn lên trong cuộc sống bởi sức sống mãnh liệt của nó - thích nghi với mọi loại khí hậu, mọi địa hình và sống quanh năm và khi lá rụng có thể nảy chồi từ đó và mọc lên cây mới. Ngoài ra, sen đá cũng có ý nghĩa là mang sự bình an, điềm lành đến cho gia chủ bởi lá thường xếp thành hình như những bông hoa sen giống như đài sen mà Phật Bà Quan Âm hay ngồi.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(12, 3, 'Cây dương xỉ', 'cay-duong-xi.jpg', 150000, 0, 10, 'Cây dương xỉ là loại cây thân nhỏ, không có hoa, nhiều lá mọc dọc theo thân cây và được trồng trong chậu làm cảnh, dương xỉ có tác dụng tốt trong việc thanh lọc không khí và khử độc asen trong đất. Cách trồng và chăm sóc khá đơn giản.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(13, 4, 'Cây xương rồng', 'cay-xuong-rong.jpg', 100000, 0, 7, 'Cây xương rồng thuộc loài thực vật mọng nước, có nguồn gốc từ châu Mỹ. Tên khoa học của xương rồng là Cactaceae. Xương rồng có nhiều ở vùng đất khô cằn, nóng như ở hoang mạc, sa mạc hay vùng nhiệt đới. Hiện nay nhiều loài xương rồng đã thích nghi với nhiều môi trường khác nhau nhờ sự di chuyển của con người. Đặc biệt tại các sa mạc, xương rồng mọc thành các bụi cây cao và lớn. Xương rồng không có lá, mà thay vào đó là các gai nhọn. Thân xương rồng xanh lục, rất mọng nước. Sở dĩ xương rồng có thể sống ở vùng đất nóng và khô cằn vì các lá cây đã tiêu giảm thành những gai, gai này giúp cho cây không bị mất nước trong điều kiện khắc nghiệt.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(14, 4, 'Cây trúc quân tử', 'cay-truc-quan-tu.jpg', 100000, 0, 10, 'Cây trúc quân tử có tên khoa học là Bambusa multiplex, thuộc họ Poaceae Poaceae, tên gọi khác là tre hàng rào, thuộc họ trúc đào và có nguồn gốc từ Trung Quốc, Nepal. Chiều cao của trúc quân tử từ 1.5 đến 3 mét, tốc độ sinh trưởng trung bình và thuộc dạng mọc thưa theo bụi. Thân cây có màu xanh vàng, thân nhỏ có nhiều đốt nhỏ giống cây tre. Cây trúc quân tử rất khó để ra hoa, hoa của cây có dạng cụm và có khả năng tự thụ phấn. Lá trúc quân tử rất giống lá tre nhưng kích thước nhỏ hơn và có dạng nhọn dài. Trúc quân tử là cây ưa sáng, phù hợp trồng ở nhiều loại đất, tuổi thọ trung bình của cây từ 3 đến 5 năm.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(15, 4, 'Cây vạn tuế', 'cay-van-tue.jpg', 100000, 0, 9, 'Cây vạn tuế hay còn gọi là cây chuối lửa, có nguồn gốc từ phía Nam của Nhật Bản. Cây vạn tuế có tên khoa học là Cycas revoluta thuộc họ Cycadaceae – Thiên Tuế. Cây chịu hạn tốt và thường được trồng trong vườn nhà. Thân cây vạn tuế có hình trụ vàng, sần sùi và thường cao khoảng 2 - 4m. Lá cây mọc đối xứng. Phiến lá nhẵn có màu xanh đậm, cứng, cây vạn tuế thường sinh trưởng chậm, tuổi thọ cao. Với tên gọi và những đặc tính trên, cây vạn tuế thường được trồng với mong muốn mang đến ý nghĩa tốt cho gia đình.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(16, 4, 'Cây nha đam', 'cay-nha-dam-11.jpg', 150000, 0, 0, 'Lợi ích của nha đam đem lại cho con người là rất lớn. Không chỉ dùng để dưỡng da, nha đam còn có khả năng chữa bệnh rất hiệu quả.', NULL, '2022-10-29 07:10:03', '2022-10-29 07:10:03', NULL, 0),
(17, 3, 'Cây hạnh phúc', 'cay-hanh-phuc.jpg', 100000, 80000, 9, 'Cây Hạnh Phúc có ý nghĩa phong thủy tốt, mang niềm hạnh phúc, đầm ấm đến cho gia chủ mình. Cây Hạnh Phúc là một loại cây thân gỗ cao từ 1,5 m đến 2,5m, có những tán lá xanh tốt, màu xanh của niềm tin và hy vọng. Cây hoa hạnh phúc là loại cây thích nghi với môi trường trong nhà, nên rất thích hợp cho việc trang trí văn phòng, cơ quan. Cây Hạnh Phúc thường được trưng bày ở những không gian rộng rãi, nơi có tiền sảnh, văn phòng rộng lớn hay những vị trí thích hợp.', NULL, '2022-11-14 07:17:59', '2022-11-14 07:17:59', NULL, 0),
(18, 3, 'Cây bướm đêm', '65d6148c04.jpg', 150000, 120000, 16, 'Hiện nay, với vẻ đẹp độc đáo, khác lạ của mình, cây bướm đêm đã được nhân giống tại nhiều nơi trên toàn thế giới, trong đó có Việt Nam. Và loài cây này cũng đã trở thành một loài cây trong nhà được ưa chuộng và có độ phổ biến cao tại Việt Nam.', '', '2022-11-14 07:19:40', '2022-11-14 07:19:40', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `id_sale` int NOT NULL,
  `sale_name` varchar(255) DEFAULT NULL,
  `sale_price` int DEFAULT NULL,
  `sale_rule` int DEFAULT '0',
  `sale_quantity` int DEFAULT '999999',
  `sale_remain` int DEFAULT NULL,
  `start_day` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `end_day` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_sale`
--

INSERT INTO `tbl_sale` (`id_sale`, `sale_name`, `sale_price`, `sale_rule`, `sale_quantity`, `sale_remain`, `start_day`, `end_day`, `deleted`) VALUES
(1, 'Freeship', 30000, 70000, 100, 100, '2022-11-13 06:13:58', '2022-11-20 06:13:58', 0),
(2, 'Caycanhdep', 50000, 150000, 999999, 999999, '2022-11-13 06:13:58', '2022-11-20 06:13:58', 0),
(3, 'Freeship', 30000, 30000, 105, 100, '2022-11-28 09:13:14', '2022-12-01 09:13:14', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id_staff` int NOT NULL,
  `name_staff` varchar(255) DEFAULT NULL,
  `phone_staff` varchar(45) DEFAULT NULL,
  `email_staff` varchar(45) DEFAULT NULL,
  `sex_staff` varchar(45) DEFAULT NULL,
  `address_staff` varchar(550) DEFAULT NULL,
  `position_staff` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_staff`
--

INSERT INTO `tbl_staff` (`id_staff`, `name_staff`, `phone_staff`, `email_staff`, `sex_staff`, `address_staff`, `position_staff`, `created_at`, `updated_at`, `deleted_at`, `deleted`) VALUES
(1, 'Lại Quyết Thắng', '0946312559', 'thang24@gmail.com', 'Nam', '31 Hàng Lược, Hoàn Kiếm, Hà Nội', 2, '2022-11-25 08:39:57', '2022-11-25 08:39:57', NULL, 0),
(7, 'Lê Thúy Uyên', '0911495920', 'thuyuyen@gmail.com', 'Nữ', 'Hoàn Kiếm, Hà Nội', 1, '2022-11-26 06:25:47', '2022-11-26 06:25:47', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `number_phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(550) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `name_user`, `number_phone`, `email`, `address`, `password`, `created_at`) VALUES
(26, 'lê thúy uyên', '0911495920', 'thuyuyen@gmail.com', '10 Hàng Lược-, Phường Hàng Mã.00043-, Quận Hoàn Kiếm.002-, Thành phố Hà Nội.01', 'b3d1422376be8acea9d9e3c54885fae1', '2022-11-12 15:58:25'),
(27, 'Lại Quyết Thắng', '0946312559', 'thang24@gmail.com', '12/41/105 Doãn Kế Thiện-, Phường Cổ Nhuế 2.00617-, Quận Bắc Từ Liêm.021-, Thành Phố Hà Nội.01', 'b3d1422376be8acea9d9e3c54885fae1', '2022-11-12 15:59:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_introduce`
--
ALTER TABLE `tbl_introduce`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id_order_detail`);

--
-- Chỉ mục cho bảng `tbl_policy`
--
ALTER TABLE `tbl_policy`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`id_position`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`id_sale`);

--
-- Chỉ mục cho bảng `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_introduce`
--
ALTER TABLE `tbl_introduce`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id_order_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_policy`
--
ALTER TABLE `tbl_policy`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id_position` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `id_sale` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id_staff` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
