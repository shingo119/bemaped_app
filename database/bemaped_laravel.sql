-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 3 月 19 日 14:51
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `bemaped_laravel`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'カフェ/レストラン'),
(2, '観光'),
(3, '公園'),
(4, 'アウトドア'),
(5, 'ファッション'),
(6, '泊まる');

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `spot_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite_spots`
--

CREATE TABLE `favorite_spots` (
  `spot_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite_words`
--

CREATE TABLE `favorite_words` (
  `word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `follows`
--

CREATE TABLE `follows` (
  `follow_user_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `goods`
--

CREATE TABLE `goods` (
  `spot_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_02_23_150446_create_categories_table', 1),
(5, '2022_02_24_145422_create_spots_table', 1),
(6, '2022_02_24_145648_create_comments_table', 1),
(7, '2022_02_24_145747_create_favorite_spots_table', 1),
(8, '2022_02_24_150412_create_goods_table', 1),
(9, '2022_02_24_150513_create_follows_table', 1),
(10, '2022_02_24_150551_create_favorite_words_table', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `spots`
--

CREATE TABLE `spots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` longtext COLLATE utf8mb4_unicode_ci,
  `start_seconds` bigint(20) UNSIGNED DEFAULT NULL,
  `lat` double(17,14) NOT NULL,
  `lon` double(17,14) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `spots`
--

INSERT INTO `spots` (`id`, `movie_title`, `youtube_id`, `tag`, `start_seconds`, `lat`, `lon`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `category_id`) VALUES
(1, '〔富山グルメ〕魚津の人気ラーメン店の神トッピングは多分コレ', 'LXqUuF7sbuM', '#魚津の人気ラーメン店 #神トッピングは #これだ', NULL, 36.83277130126953, 137.41815185546875, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 5, 1),
(3, '〔富山グルメ〕ミシュラン獲得のお寿司屋さん！感動の嵐が巻き起こった', '5ejYjl63AfU', '', NULL, 36.67717742919922, 137.20721435546875, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 5, 1),
(4, '〔射水グルメ〕パキスタンカレーを堪能！', 'y2tb9ALdmM8', '#富山グルメ #富山カレー #アルバラカ', NULL, 36.75175476074219, 137.08551025390625, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 5, 1),
(5, '絶景露天風呂と贅沢バイキング、トドメの高級日本酒飲み放題！', 'EwLr8YoyqvM', '#ミシュラン三つ星 #黒部宇奈月温泉 #贅沢三昧', NULL, 36.81706237792969, 137.58427429199220, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 5, 1),
(6, '【めちゃうま】麺線整いすぎて見とれてしまう、パーフェクトな一杯をすする 麺笑 巧真【飯テロ】SUSURU TV.第2199回', 'cVWxy9DpGTk', '#麺笑巧真 #八王子 #ラーメン', NULL, 35.65976715087891, 139.34184265136720, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 7, 1),
(8, '【絶対王者】日本一のつけ麺！これをすすらないと今年終われない、とみ田のつけ麺をすする 中華蕎麦 とみ田【飯テロ】', 'OZklX7rxlrM', '#中華蕎麦とみ田 #千葉 #ラーメン', NULL, 35.78176256864247, 139.90094882761085, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 7, 1),
(10, '【じもん】高円寺のソウルフード激辛ラーメンを晋平太とすする じもん【飯テロ】SUSURU TV.第2198回', 'NyZXG-cz3lc', '#じもん #晋平太 #ラーメン', NULL, 35.70336864469922, 139.64918174514906, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 7, 1),
(11, '【おかわり無料家系】完飲必至の東京代表家系で食べ過ぎてしまいました をすする　武蔵家 中野本店', 'jbwM80czi0k', '#武蔵家 #中野 #ラーメン', NULL, 35.69766948666345, 139.66902270420900, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 7, 1),
(12, '【無茶した】カロリー爆弾！超絶ジャンクな二郎系をすする 用心棒本号 東大前【飯テロ】', 'dFfMBp6maz8', '#毎日ラーメン生活 #SUSURU_TV #ラーメン', NULL, 35.71748467726623, 139.75764575108394, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 7, 1),
(13, '初日から行列の二郎系ラーメンをすする 蒲田 ラーメン 宮郎【飯テロ】', '4dpTHMDUiiE', '#毎日ラーメン生活 #SUSURU_TV', NULL, 35.56187660208226, 139.71250118647970, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 7, 1),
(14, '【超絶濃厚】濃厚すぎてレンゲが立ってしまうほどのドロドロスープの衝撃。をすする 超絶濃厚鶏そば きりすて御麺【飯テロ】', 'NUWLwl8g2xo', '#超絶濃厚鶏そばきりすて御麺 #不動前 #ラーメン', NULL, 35.62430304739695, 139.71021052627805, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 7, 1),
(15, '【ラーメン好き必食】恐ろしいほどの老舗町中華で激安ラーメン&半チャーハンをすする 平和軒【飯テロ】', 'f9i2Z5CRzFU', '#平和軒 #大崎 #ラーメン', NULL, 35.62093467007313, 139.72429891870120, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 7, 1),
(16, '【つけ麺】一粒で二度美味しい。2種類の麺が合い盛りのつけ麺と超極太麺をすする 麺や 麦ゑ紋【飯テロ】', 'hQutZTR9EXI', '#麺や麦ゑ紋 #新宿 #ラーメン', NULL, 35.69612507605375, 139.69836970596550, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 7, 1),
(17, '【神楽坂】絶品グルメ食べ歩き！黒毛和牛贅沢重「翔山亭」&メロン専門店「果房メロンとロマン」&メレンゲ菓子「メルベイユ」&フルーツサンド「ハピマルフルーツ神楽坂」', 'cVlkit8NCrs', '#東京グルメ #神楽坂グルメ #神楽坂カフェ', NULL, 35.70189684966379, 139.74104778857426, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 8, 1),
(18, '【恵比寿】お出汁とネギが激うま！鴨すき鍋「とりなご 恵比寿店」', '4mT4gF9HoPo', '#東京グルメ #恵比寿グルメ #鴨すき', NULL, 35.64504137556677, 139.71692892358402, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 8, 1),
(19, '【中野】予約困難！超人気のマグロ専門店「マグロマート」', '2U1qks82eT4', '#中野グルメ #マグロ #マグロマート', NULL, 35.70957461636522, 139.66652461319208, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 8, 1),
(20, '【代官山】羽釜で炊いた”おひつめし”が絶品「ごはんや一芯」＆さつまいも天ぷらの塩アイス「Tempura Motoyoshi いも」', 'ckpnxsbyRgI', '#東京グルメ #代官山ランチ #ご飯が美味しいお店', NULL, 35.64718591948328, 139.70175640673835, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 8, 1),
(21, '【代々木上原】ロンドン伝統の絶品ミートパイ「dish（ディッシュ）」', 'rJVqhSgK2QU', '#東京グルメ #代々木上原カフェ #アップルパイ', NULL, 35.66934590120415, 139.68107696783923, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 8, 1),
(22, '絶対リピートしちゃう最高の秘島リゾートに週末トリップ｜タイ・クート島', 'Gf0R6iX-Nfg', '#タイ旅行 #海外旅行 #Vlog', NULL, 11.65194159053314, 102.56874884336600, '2022-03-10 07:37:53', '2022-03-18 06:08:39', NULL, 9, 2),
(23, 'まだ誰も知らない…都心近くの森林リゾートを8000円で独り占め！チャリで行くバーンガジャオの旅【タイ・バンコク】บางกะเจ้า Bang krachao', 'qWZzkMjNf-o', '#タイ旅行 #バンコク #vlog', NULL, 13.66943852466792, 100.56809710646388, '2022-03-10 07:37:53', '2022-03-18 03:25:38', NULL, 9, 2),
(24, 'タイの超穴場リゾート・マーク島　カヤックでしか辿り着けない奇跡の浜辺が美しすぎた ｜เกาะหมาก Koh Mak', 'FVlTOZMPj-s', '#タイ旅行 #マーク島 #KohMak', NULL, 11.81925452391637, 102.47903914974842, '2022-03-10 07:37:53', '2022-03-18 03:25:53', NULL, 9, 2),
(25, 'バンコク・スクンビットに森の結界ホテル　これは別世界…｜AriyasomVilla（アリヤソムヴィラ）', '5V1noy4WXZI', '#タイ旅行  #バンコク #タイ', NULL, 13.74789033257170, 100.55165677614453, '2022-03-10 07:37:53', '2022-03-18 03:25:56', NULL, 9, 2),
(26, '本当は秘密にしたい…1泊1700円の最強ゲストハウス｜タイ・クート島｜เกาะกูด', 'tN7hO9iqu54', '#タイ旅行  #เกาะกูด', NULL, 11.59469818411189, 102.56536203319720, '2022-03-10 07:37:53', '2022-03-18 03:26:01', NULL, 9, 2),
(27, '【富山グルメ】一口餃子がウリ！新店のランチがコスパ◎だった', 'a5HLZKBJ8L8', '#新店 #餃子とラーメン #大盛りにすればヨカタ', NULL, 36.68761259984785, 137.21318120710026, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 5, 1),
(28, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介:1.THE KNOT TOKYO Shinjuku', 'ljyx2OPIsKE', '', NULL, 35.68860140847194, 139.68846163626503, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(29, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介: 2.vito coffee', 'ljyx2OPIsKE', '', NULL, 35.69597045725897, 139.69685430280342, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(30, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介: 3.新宿御苑', 'ljyx2OPIsKE', '', NULL, 35.68668943834047, 139.70815084173412, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(31, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介: 4.Brooklyn Parlor ', 'ljyx2OPIsKE', '', NULL, 35.69010223056910, 139.70594167220142, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(32, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介: 5.BOOK AND BED TOKYO', 'ljyx2OPIsKE', '', NULL, 35.69542100412398, 139.70058583724045, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(33, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:１IDOL', 'cy8HgxntI7k', '', NULL, 35.66190615404709, 139.71249674655067, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(34, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:２ A to Z cafe', 'cy8HgxntI7k', '', NULL, 35.66251923296611, 139.71225260592567, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(35, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:３ GOKU BURGER ゴク バーガー', 'cy8HgxntI7k', '', NULL, 35.66691485211211, 139.70822428561320, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(36, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:４　café Madu　カフェ・マディ', 'cy8HgxntI7k', '', NULL, 35.66267018097813, 139.71212600869245, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(37, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:５　YPSILON　イプシロン ', 'cy8HgxntI7k', '', NULL, 35.66112795571868, 139.71413564192795, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(38, '【原宿オシャレカフェ５選】 デートにもオススメ:1. dotcom space tokyo', 'jg5c5BoS2Fc', '#原宿 ＃原宿カフェ #原宿vlog', NULL, 35.67180473904188, 139.70343923079517, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(39, '【原宿オシャレカフェ５選】 デートにもオススメ: 2.rag & bone coffee', 'jg5c5BoS2Fc', '', NULL, 35.66664236779875, 139.70711659895923, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(40, '【原宿オシャレカフェ５選】 デートにもオススメ:番外編.MUUN seoul', 'jg5c5BoS2Fc', '', NULL, 35.67152409334646, 139.70870351302170, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(41, '【原宿オシャレカフェ５選】 デートにもオススメ:3.natural stance', 'jg5c5BoS2Fc', '', NULL, 35.66990284700583, 139.70774673623154, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(42, '【原宿オシャレカフェ５選】 デートにもオススメ:4.EATALY HARAJUKU', 'jg5c5BoS2Fc', '', NULL, 35.67053458160733, 139.70296905840053, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(43, '【原宿オシャレカフェ５選】 デートにもオススメ:5.Cafe Luigi', 'jg5c5BoS2Fc', '', NULL, 35.66898350496331, 139.70661758584083, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 14, 1),
(44, '【原宿グルメ】超モチモチ！たらこスパゲティ専門店「東京たらこスパゲティ 原宿表参道店」', 'uIvNRdpuGJQ', '#2020年7月オープン #たらこパスタ #炙りたらこのお出汁スパゲティ', NULL, 35.66734699983360, 139.70579361123150, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 8, 1),
(45, '【渋谷グルメ】旨味あふれる「生ハンバーグ」を初体験！「極味や（きわみや）渋谷パルコ店」', 'BHKGceBgvJE', '#東京グルメ #生ハンバーグ #極味や', NULL, 35.66226595950544, 139.69917582487160, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 8, 1),
(46, '【吉祥寺】コスパ最強の炭火焼ハンバーグ「挽肉と米」', 'EERJdhLTOUI', '#吉祥寺グルメ #炭火焼ハンバーグ #炊き立てご飯', NULL, 35.70582585121649, 139.57775711220805, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 8, 1),
(47, '【中野】予約困難！超人気のマグロ専門店「マグロマート」', '2U1qks82eT4', '#中野グルメ #マグロ #マグロマート', NULL, 35.70958332802943, 139.66654968378967, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 8, 1),
(48, '【渋谷】絶品！フレンチトースト&あんバターサンド「ビストロ ロジウラ(Bistro Rojiura)」', 'LoDakRbVqMA', '#渋谷グルメ #渋谷カフェ #東京グルメ', NULL, 35.66241637255629, 139.69732951139500, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 8, 1),
(49, 'カレーうどんと言えば吉宗！高岡の人気店', 'Nr10-DUx4Rw', '#富山グルメ #高岡グルメ #吉宗', NULL, 36.75643461723699, 137.02694768659248, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 5, 1),
(57, '【最強富士丸系】この一杯中毒！受け継がれた名店の魂に感動', '646ln0zCB4g', '#ラーメン #No11', NULL, 35.74497348987640, 139.70789916408458, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 15, 1),
(58, '【利きりんご】信州産のりんごを当てることはできるのか！？', 'ZJRlIrvuzEg', '#りんご #長野 #利き', NULL, 36.33894458881326, 138.44495609646765, '2022-03-10 07:37:53', '2022-03-18 03:27:09', NULL, 11, 2),
(59, '塩尻謎解き散歩！', 'KZYLOj6TtE0', '#長野 #塩尻 #散歩#エンパーク', NULL, 36.11205969375948, 137.95280531419448, '2022-03-10 07:37:53', '2022-03-18 03:27:06', NULL, 11, 2),
(60, '塩尻謎解き散歩！', 'KZYLOj6TtE0', '#長野 #塩尻 #散歩#平井出遺跡', NULL, 36.10293875152903, 137.94552973030330, '2022-03-10 07:37:53', '2022-03-18 03:27:12', NULL, 11, 2),
(61, '塩尻謎解き散歩！', 'KZYLOj6TtE0', '#長野 #塩尻 #散歩#平井出博物館', NULL, 36.09914867772358, 137.93930414436580, '2022-03-10 07:37:53', '2022-03-18 03:27:18', NULL, 11, 2),
(62, '塩尻謎解き散歩！', 'KZYLOj6TtE0', '#長野 #塩尻 #散歩#平井出の泉', NULL, 36.10084313665556, 137.93990398779098, '2022-03-10 07:37:53', '2022-03-18 03:27:20', NULL, 11, 2),
(63, '塩尻謎解き散歩！', 'KZYLOj6TtE0', '#長野 #塩尻 #散歩#塩尻駅', NULL, 36.11434486637947, 137.94785383714378, '2022-03-10 07:37:53', '2022-03-18 03:27:22', NULL, 11, 2),
(64, '阿智村のあの旅館は今！？', '-kcg1-RyNAM', '#長野 #サウナ #リフォーム', NULL, 35.44619068301989, 137.73391178494420, '2022-03-10 07:37:53', '2022-03-18 03:27:27', NULL, 11, 2),
(65, 'ワインプロジェクト3「収穫の秋」', 'rHBZ6FjqOsQ', '#信州 #収穫 #酒#ワイン', NULL, 36.09875957847106, 138.00067213548363, '2022-03-10 07:37:53', '2022-03-18 03:27:30', NULL, 11, 2),
(69, '【DIY】初のグランピング！テント作りに挑戦してみた！', 'mg3NEt9M39c', '#グランピング #DIY #みどり湖', NULL, 36.09025620986645, 137.99457471505485, '2022-03-10 07:37:53', '2022-03-18 03:27:59', NULL, 11, 4),
(70, 'デジタルサイネージで奥蓼科秘湯めぐり', '0cuVDOQNNbc', '#蓼科 #秘湯 #デジタルサイネージ#明治温泉#温泉', NULL, 36.03753026211560, 138.29615997085753, '2022-03-10 07:37:53', '2022-03-18 03:28:04', NULL, 11, 2),
(71, 'デジタルサイネージで奥蓼科秘湯めぐり', '0cuVDOQNNbc', '#蓼科 #秘湯 #デジタルサイネージ#渋御殿湯#温泉', NULL, 36.03612334463495, 138.32701855674620, '2022-03-10 07:37:53', '2022-03-18 03:28:06', NULL, 11, 2),
(72, 'デジタルサイネージで奥蓼科秘湯めぐり', '0cuVDOQNNbc', '#蓼科 #秘湯 #デジタルサイネージ#渋辰野館#温泉', NULL, 36.03341984061269, 138.30965031949654, '2022-03-10 07:37:53', '2022-03-18 03:28:10', NULL, 11, 2),
(73, '世界最大最古のピラミッドでUFOを呼ぶ!!', '5qzEs9w7UGE', '#長野 #信州#山', NULL, 36.55388143735181, 138.22174041189447, '2022-03-10 07:37:53', '2022-03-18 03:28:39', NULL, 11, 3),
(74, '絶景一本　大外刈り「下諏訪 諏訪湖畔」', 'WyPRerOTuw4', '#柔道 #大外刈り #下諏訪', NULL, 36.06501432992169, 138.09104836457254, '2022-03-10 07:37:53', '2022-03-18 03:28:45', NULL, 11, 2),
(75, 'あのオバステの絶景で投げたい', 'd7iw4NqJw5E', '#長野 #信州 #姨捨', NULL, 36.50427044044724, 138.09546637417057, '2022-03-10 07:37:53', '2022-03-18 03:28:51', NULL, 11, 2),
(76, '地域を守った不思議な地蔵', 'YLGd3sQlP98', '#東日本大震災 #六地蔵 #奇跡', NULL, 36.97791037152336, 138.47868902734737, '2022-03-10 07:37:53', '2022-03-18 03:28:54', NULL, 11, 2),
(77, 'エンジョイゴルフ「ハーフラウンド38の奇跡」', 'Fl6kr5BON6I', '#ゴルフ #奇跡 #ハーフラウンド#塩嶺カントリークラブ', NULL, 36.06965774310220, 138.00854567063988, '2022-03-10 07:37:53', '2022-03-18 03:29:05', NULL, 11, 4),
(78, 'FM長野「346 GROOVE FRIDAY!」に密着', 'auCgFjpDsLo', '#エフエム #長野 #ラジオ', NULL, 36.22702845217920, 137.96919740858542, '2022-03-10 07:37:53', '2022-03-18 03:29:14', NULL, 11, 2),
(79, 'FM長野「346 GROOVE FRIDAY!」に密着', 'auCgFjpDsLo', '#エフエム #長野 #ラジオ#寸八総本店#ラーメン', NULL, 36.22591074594033, 137.98439969181180, '2022-03-10 07:37:53', '2022-03-18 03:29:22', NULL, 11, 2),
(80, '絶景一本「諏訪 立石公園」', 'KwJ2qvv0ubU', '#柔道 #巴投げ #諏訪湖＃公園', NULL, 36.05342938201698, 138.12266649117737, '2022-03-10 07:37:53', '2022-03-18 03:29:26', NULL, 11, 2),
(81, '絶景一本　〜おしどり隠しの滝〜', '8WTrAlxXmxs', '#柔道 #一本背負い #奥蓼科', NULL, 36.03752161789182, 138.29582482900906, '2022-03-10 07:37:53', '2022-03-18 03:29:28', NULL, 11, 2),
(82, 'サウナ対決 どっちが強い？', 'ylboQHT9DGk', '#信州 #サウナ #GoPro#川中島温泉テルメDOME', NULL, 36.59632403123057, 138.15661429447590, '2022-03-10 07:37:53', '2022-03-18 03:29:32', NULL, 11, 2),
(83, 'ご長寿の街！佐久市に行ってきました！', 'DCesJZRijXg', '#長野 #佐久 #ぴんころ#ぴんころ地蔵', NULL, 36.22565655302097, 138.47056563759747, '2022-03-10 07:37:53', '2022-03-18 03:29:35', NULL, 11, 2),
(84, '「人気ラーメン店の無謀な挑戦」前編', 'HISrSg4RAkY', '#ラーメン #カップラーメン #チャレンジ＃らぁ麺しろがね', NULL, 36.20156297133401, 137.94900475289265, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 11, 1),
(85, '「人気ラーメン店の無謀な挑戦」後編', 'fJ6rRNxSJhU', '#ラーメン #カップラーメン #チャレンジ＃らぁ麺しろがね', NULL, 36.20156297133401, 137.94906000000000, '2022-03-10 07:37:53', '2022-03-10 07:37:53', NULL, 11, 1),
(86, '信州ディープツアー「日本のど真ん中」はドコ？', 'ZZwGDCa30sw', '#日本の中心 #日本のヘソ #日本のど真ん中#日本中心展望台', NULL, 36.01614352556098, 137.98946681992632, '2022-03-10 07:37:53', '2022-03-18 03:29:41', NULL, 11, 2),
(87, '信州ディープツアー「太平洋？日本海？この水はどっちへ行くの？」', 'PB4HusxlDaA', '#清少納言 #善知鳥峠 #分水嶺#蔵造川水路橋#日本唯一#レンガ造り#水路橋', NULL, 36.07032674915681, 137.97742750219277, '2022-03-10 07:37:53', '2022-03-18 03:29:43', NULL, 11, 2),
(88, '信州ディープツアー「太平洋？日本海？この水はどっちへ行くの？」', 'PB4HusxlDaA', '#清少納言 #善知鳥峠 #分水嶺', NULL, 36.07606225594507, 137.98004578216660, '2022-03-10 07:37:53', '2022-03-18 03:29:46', NULL, 11, 2),
(89, '信州ディープツアー「上杉謙信 物見の岩」', 'tup3TipE8jE', '#長野 #信州 #上杉謙信', NULL, 36.67160648269294, 138.18321461241678, '2022-03-10 07:37:53', '2022-03-18 03:29:52', NULL, 11, 2),
(90, '川中島の合戦 武田VS上杉 〜キツツキ戦法〜', 'a-31MKdqM_E', '#信州 #上杉謙信 #武田信玄', NULL, 36.56149734546621, 138.17145484699510, '2022-03-10 07:37:53', '2022-03-18 03:29:54', NULL, 11, 2),
(91, '【長野1泊2日】特急あずさで木曽・松本の旅　奈良井宿を訪ねる【長野の旅その１】　かなめや', 'MtEOdv09NTs', '#かなめや', NULL, 35.96469972559991, 137.81065289967586, '2022-03-10 07:37:53', '2022-03-18 03:29:59', NULL, 12, 2),
(92, '奈良井宿の散策 : Walking Around Narai-Juku Post Town （Nagano, Japan）', 'O1LHWs0qlm4', '#下町#八幡宮##二百地蔵#専念寺#法然寺#中町#大宝寺#マリア地蔵#神明宮#伊勢屋', NULL, 35.96907570114323, 137.81527882220797, '2022-03-10 07:37:53', '2022-03-18 03:30:01', NULL, 12, 2),
(93, '【旅行Vlog】長野で歴史と自然を感じる〈奈良井宿・木曽〉お食事処いなかや', '-XIOQc8h18o', '#あしはらみゅう #長野旅行 #vlog', NULL, 35.96734931495044, 137.81338956952848, '2022-03-10 07:37:53', '2022-03-18 03:30:03', NULL, 12, 2),
(94, '【ひとり旅】中山道・奈良井宿　ソースカツ丼、宿場町のカフェ、おやきとだんごなど宿場町の名物グルメ・龍の大天井絵・奈良井宿の歴史的景観を散策', '8KZ0Jy1ASlY', '#ひとり旅 #長野 #奈良井#お食事処#松波', NULL, 35.96523250595670, 137.81092205792837, '2022-03-10 07:37:53', '2022-03-18 03:30:10', NULL, 12, 2),
(95, '【ひとり旅#14】長野木曽路　奈良井宿　松本城　おっさん　ひとり呑み', 'VcVDFZeoIno', '＃ひとり旅 ＃松本 ＃奈良井宿#越後谷食堂', NULL, 35.96660373202184, 137.81219893724145, '2022-03-10 07:37:53', '2022-03-18 03:30:12', NULL, 12, 2),
(96, '奈良井宿 江戸時代の歴史と風景を残す中山道 木曽路十一宿の街並み Narai-juku Walk the Histric Post town in Nagano Japan', 'RI0l9E71DjE', '#jvtravel #japanvideography #travel', NULL, 35.96628364280153, 137.81397167786193, '2022-03-10 07:37:53', '2022-03-18 03:30:17', NULL, 12, 2),
(97, '奈良井宿　江戸時代にタイムスリップ！！築約２００年の宿に泊まる', 'J_3IrviPKE4', '＃奈良井宿 ＃奈良井木曽の大橋 ＃伊勢屋', NULL, 35.96494907781779, 137.81058024101085, '2022-03-10 07:37:53', '2022-03-18 03:30:19', NULL, 12, 2),
(98, '(6)【中山道の旅】自転車で行く 東京→京都 12日間《下諏訪宿→奈良井宿》　木曽路編その１', 'LFGmw-PekHE', '＃奈良井宿 ＃奈良井木曽の大橋 ＃伊勢屋#上問屋資料館', NULL, 35.96482369417062, 137.81028861451020, '2022-03-10 07:37:53', '2022-03-18 03:30:21', NULL, 12, 2),
(99, '[ 長野県 1泊2日の旅 ]　#1 中山道の真ん中、三十四番目の宿場町『 奈良井宿 』へ　～ 浦島太郎の伝説に迫る ～', 'BUMl3u6NT2Y', '#1では #旅するPorco #奈良井宿#甘味処#こころ音', NULL, 35.96462994248854, 137.81018171517340, '2022-03-10 07:37:53', '2022-03-18 03:30:25', NULL, 12, 2),
(100, 'ノスタルジックな宿場町で食べ歩き / 江戸時代の風情が残る「奈良井宿」 / 長野県観光スポット / vlog', 'IBvIKXYcgm8', '#長野 #奈良井宿 #食べ歩き#おやき#てずから', NULL, 35.96573763036265, 137.81140026638036, '2022-03-10 07:37:53', '2022-03-18 03:30:27', NULL, 12, 2),
(101, '大門商店街～イルミネーション～', 'vwJwu0p1vO4', '#長野県塩尻市 #大門商店街 #イルミネーション', NULL, 36.11186677796886, 137.95300464720447, '2022-03-10 07:37:53', '2022-03-18 03:30:29', NULL, 13, 2),
(102, '広報制作映像「高ボッチ高原」', '9SSgQLvio1E', '#高ボッチ高原 #八ヶ岳中信高原国定公園 #360度の眺望', NULL, 36.13222032735614, 138.03460337936045, '2022-03-10 07:37:53', '2022-03-18 03:30:33', NULL, 13, 2),
(103, '【第２弾】今年の高ボッチ高原はおもしろい！', 'F4r1J4kmIus', '#長野県塩尻市 #高ボッチ高原 #ドローン', NULL, 36.13076455440925, 138.03021837953510, '2022-03-10 07:37:53', '2022-03-18 03:30:35', NULL, 13, 2),
(104, 'テレビ広報しおじり「YOUMEX ARENA始まります」', '_HWyBG4ncmI', '#塩尻市新体育館 #塩尻市総合体育館 #ユメックスアリーナ', NULL, 36.12425443247277, 137.94475827362120, '2022-03-10 07:37:53', '2022-03-18 03:30:37', NULL, 13, 2),
(105, 'しおじり特集「みどり湖へら鮒釣り大会」', 'F5NYnC7xI4s', '#塩尻市　#釣り　#湖', NULL, 36.09202164249553, 137.99916148391029, '2022-03-10 07:37:53', '2022-03-18 03:30:39', NULL, 13, 2),
(106, 'しおじり特集「塩尻ワイナリーフェスタ2018」', 'ZxGkMIbUQME', '#塩尻市#ワイン#塩尻駅', NULL, 36.11447390505647, 137.94811761385674, '2022-03-10 07:37:53', '2022-03-18 03:30:42', NULL, 13, 2),
(107, 'しおじり特集「第51回木曽漆器祭・奈良井宿場祭」', 'wRO6l4HrivA', '#塩尻市#奈良井宿#祭り', NULL, 35.96832077413649, 137.81451776445580, '2022-03-10 07:37:53', '2022-03-18 03:30:44', NULL, 13, 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci,
  `icon_img` longtext COLLATE utf8mb4_unicode_ci,
  `background_img` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `summary`, `icon_img`, `background_img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'horagarasu', 'test@test.test', NULL, '$2y$10$7cH7lix18Eyy5mzDUZ5JEetmRUdWVGcsUiUs9AK2HYbRF6OhBqOlu', NULL, 'TESTでホラガラスのアカウント作ってみました', NULL, NULL, '2022-03-10 06:44:57', '2022-03-10 06:44:57', NULL),
(3, 'yano', 'test@test.te', NULL, '$2y$10$pKRK0iDh8W.Vwz3oP8zznuV8O6VLZnJqLIYxB8vH/LCjzd1xcEAlS', NULL, '裏垢です。', NULL, NULL, '2022-03-10 06:44:57', '2022-03-10 06:44:57', NULL),
(4, '矢野慎吾', 'test@test', NULL, '$2y$10$NW9/NMzJkhLyMwGL.4JJtuMzJ37igVDhmK0hBOsZQoDIMWkSSnu82', NULL, 'どうも、矢野慎吾です！bemapedというサービスを作ったのは私です！', NULL, NULL, '2022-03-10 06:44:57', '2022-03-10 06:44:57', NULL),
(5, 'みーもぐ', 'mi-mogu@test.test', NULL, '$2y$10$Gju0K8opplwweFbNweLhKOrl5fMq1EE9A5/sKrrhbawJy7Y8NFSMq', NULL, '富山のグルメやスポットを紹介している【みーもぐ】と申します。\r\nインスタフォロワー2.8万人突破！\r\n富山の飲食店に行きまくっております。\r\n\r\n生まれ育った富山の美味しい・楽しいを一人でも多くの方に届けられるよう\r\n動画を配信していきたいと思っています♪\r\n\r\nチャンネル登録やコメント、大変励みになります…\r\nぜひよろしくお願いします＾＾', NULL, NULL, '2022-03-10 06:44:57', '2022-03-10 06:44:57', NULL),
(6, 'ヒカキン', 'hikakin@test.test', NULL, '$2y$10$A4H8IXeyqJJOD.xIWRA17OkzzYIn2uXcdvjIFXDG61YpkyWI.28BG', NULL, 'HikakinTVはヒカキンが日常の面白いものを紹介するチャンネルです。\r\n◆プロフィール◆\r\nYouTubeにてHIKAKIN、HikakinTV、HikakinGames、HikakinBlogと\r\n４つのチャンネルを運営し、動画の総アクセス数は100億回を突破、\r\nチャンネル登録者数は計1800万人以上、YouTubeタレント事務所uuum株式会社ファウンダー兼最高顧問。', NULL, NULL, '2022-03-10 06:44:57', '2022-03-10 06:44:57', NULL),
(7, 'susuruTV', 'susuru@test.test', NULL, '$2y$10$IxHHRG5hwNYFogHnqpthVuyyFkuVdleeF9jVxThOnb5.NumdsZ16e', NULL, 'ずるずる、どうもSUSURUです！「毎日ラーメン健康生活」をテーマに、ラーメンをすする動画を毎日18:30に配信しています。日々ラーメンをすすり続け、現在2000日以上連続配信中です！全国の美味しいラーメンをすすりたい、紹介したいという気持ちで毎日続けておりますので宜しければチャンネル登録よろしくお願いします！生粋のラーメンYouTuber、SUSURUによる「毎日ラーメン健康生活」を追うチャンネル。「毎日ラーメン健康生活」とはラーメン大好きSUSURUが毎日ラーメンを食べても健康でいれることを証明していく生活。現在2000日以上、毎日ラーメンをすすり続けている。日本全国のラーメンをすする為、ラーメン図鑑としてもお使いいただけます。都道府県別再生リストや、二郎系ラーメン、家系ラーメン、といったジャンル別再生リストもございますのでご活用ください！世界のRamenも追っていきたい！！', NULL, NULL, '2022-03-10 06:44:57', '2022-03-10 06:44:57', NULL),
(8, 'marumeshi', 'marumeshi@test.test', NULL, '$2y$10$QxCYynOI.UlnSA81W4NZSO5di3RIobT3hnMNOdx0qP4XrDfCqNd36', NULL, '食べることが大好きな\r\n2人組がお送りします٩( \'ω\' )و٩( \'ω\' )و \r\n\r\nまるめしでは、\r\n日本全国の美味しいご飯を紹介して行きます。\r\n（旅行も大好きなので、いつかは海外のご飯も紹介できたら良いなぁ…と思っています）\r\n\r\nチャンネル登録よろしくお願いします。', NULL, NULL, '2022-03-10 06:44:57', '2022-03-10 06:44:57', NULL),
(9, 'MAIBARU', 'maibaru@test.test', NULL, '$2y$10$k09BDmNb/V8Q8xKwkgxOIuQMCuuhRKvGvt9D4u97ZCUcEiltvh7O2', NULL, 'こんにちは、MAIBARUです\r\n\r\nこのチャンネルは私MAIBARUと撮影担当YUUが\r\n気ままに運営するタイ旅行チャンネルです。\r\n人気の観光地から地方の秘境まで、ゆるっと発信中\r\n週末に不定期更新しています\r\n\r\nかなりゆるめのテイストですが、お気に召せば幸いです\r\nチャンネル登録や動画にコメントを頂けるととてもよろこびます', NULL, NULL, '2022-03-10 06:44:57', '2022-03-10 06:44:57', NULL),
(10, 'kato', 'katonyonko@yahoo.co.jp', NULL, '$2y$10$0eq3IOsepV2eGzIashxR1u29brhmTtaBcCZE2C8fCBvhCQrCxwUmq', NULL, '', NULL, NULL, '2022-03-10 06:44:57', '2022-03-10 06:44:57', NULL),
(11, '松山三四六の三四六道', 'sanshirou@test.test', NULL, '$2y$10$QSHrNHGhRTQ1hJF9/8bsdusmboy/5Jl8yhbIJF/nK5xeCGZWHnVqm', NULL, '松山三四六の公式YouTubeチャンネル【三四六道（サンシロード）】です。\r\n三四六が知る魅力溢れる信州、そして信州人。長野県を元気にしたいという熱い思いを込めた動画を配信していきたいと思います。', NULL, NULL, '2022-03-10 06:44:57', '2022-03-10 06:44:57', NULL),
(12, '奈良井宿 ~naraijuku~', 'naraijuku@test.test', NULL, '$2y$10$lxfOTIsZ06QSWSb2YgtxiOe5TVMCWFjIXVjs/CJP47YtBLBnEKY9e', NULL, '奈良井宿の紹介動画コンテンツをマッピング', NULL, NULL, '2022-03-10 06:44:57', '2022-03-10 06:44:57', NULL),
(13, '塩尻市', 'shiojiri@test.test', NULL, '$2y$10$7GSQVmTlhkRhZPHpl9Y3UO8PC8DwXwlxQPpyTkxyM32G0TyPf/NMm', NULL, '塩尻市の魅力を動画でマッピング', NULL, NULL, '2022-03-10 06:44:57', '2022-03-10 06:44:57', NULL),
(14, 'ヤノシンゴ', 'testtest@test.test', NULL, '$2y$10$z7Z5ujOqW6X2itfjPMU6DucPeaSmyJWvKnnhqntEK2pK.BYewkHV2', NULL, NULL, NULL, NULL, '2022-03-17 15:56:36', '2022-03-17 15:56:36', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- テーブルのインデックス `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_spot_id_foreign` (`spot_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `favorite_spots`
--
ALTER TABLE `favorite_spots`
  ADD KEY `favorite_spots_spot_id_foreign` (`spot_id`),
  ADD KEY `favorite_spots_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `favorite_words`
--
ALTER TABLE `favorite_words`
  ADD KEY `favorite_words_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `follows`
--
ALTER TABLE `follows`
  ADD KEY `follows_user_id_foreign` (`user_id`),
  ADD KEY `follows_follow_user_id_foreign` (`follow_user_id`);

--
-- テーブルのインデックス `goods`
--
ALTER TABLE `goods`
  ADD KEY `goods_spot_id_foreign` (`spot_id`),
  ADD KEY `goods_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `spots`
--
ALTER TABLE `spots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spots_user_id_foreign` (`user_id`),
  ADD KEY `spots_category_id_foreign` (`category_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `spots`
--
ALTER TABLE `spots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_spot_id_foreign` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `favorite_spots`
--
ALTER TABLE `favorite_spots`
  ADD CONSTRAINT `favorite_spots_spot_id_foreign` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`id`),
  ADD CONSTRAINT `favorite_spots_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `favorite_words`
--
ALTER TABLE `favorite_words`
  ADD CONSTRAINT `favorite_words_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_follow_user_id_foreign` FOREIGN KEY (`follow_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `follows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_spot_id_foreign` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`id`),
  ADD CONSTRAINT `goods_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `spots`
--
ALTER TABLE `spots`
  ADD CONSTRAINT `spots_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `spots_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
