-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2024 at 12:26 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mizan`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desp` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Jackets', 'jackets', '2024-10-15 22:53:05', '2024-10-15 22:53:05'),
(10, 'T-shirt', 't-shirt', '2024-10-27 22:37:24', '2024-10-27 22:37:24'),
(11, 'Pant', 'pant', '2024-10-27 22:37:39', '2024-10-27 22:37:39'),
(12, 'Cap', 'cap', '2024-10-27 22:37:48', '2024-10-27 22:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `client_messages`
--

CREATE TABLE `client_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desp` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` longtext COLLATE utf8mb4_unicode_ci,
  `sts` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `password`, `created_at`, `updated_at`) VALUES
(1, '123456', '2024-11-01 09:35:09', '2024-11-22 09:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2024_10_14_034847_create_categories_table', 2),
(17, '2024_10_15_025821_create_products_table', 3),
(18, '2024_10_15_042311_create_product_galleries_table', 3),
(23, '2024_10_16_051922_create_blogs_table', 4),
(24, '2024_10_16_052006_create_s_e_o_s_table', 4),
(25, '2024_10_16_070616_create_messages_table', 5),
(29, '2024_10_16_081150_create_pages_table', 6),
(30, '2024_10_25_000903_create_customers_table', 6),
(31, '2024_10_26_083009_create_client_messages_table', 6),
(32, '2024_11_08_104324_create_permission_tables', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 14),
(6, 'App\\Models\\User', 15);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desp` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `desp` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `short_desp`, `desp`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam officia, mollitia quam veritatis natus, itaque consequuntur quis sequi animi voluptates ullam temporibus cum adipisci amet molestiae possimus voluptatibus exercitationem, laborum cumque facere ipsam? Impedit, tempore iusto dolorum, distinctio illum saepe quos, veritatis enim odio nihil modi nobis rem. Consectetur, velit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita \r\nrepellat suscipit, rerum cupiditate doloremque assumenda atque, labore \r\noptio aspernatur fugit voluptates accusantium voluptatem minima! \r\nDelectus tenetur enim commodi ipsa eos magnam sapiente molestiae \r\nperferendis nisi eligendi impedit alias praesentium amet distinctio \r\nfacilis, atque accusamus a quidem. Error corrupti mollitia quaerat \r\ndeserunt hic ipsa odit laudantium harum maxime magni ut amet dolores \r\nsunt cupiditate maiores enim molestiae quas libero, unde iste quia \r\npraesentium! Consectetur impedit porro aut! Incidunt repudiandae magni \r\ncumque eos molestias, quidem totam numquam porro magnam, cum rerum optio\r\n labore dicta esse voluptatum laborum saepe, sed hic tempore! Debitis \r\ndistinctio tenetur aliquam deleniti odit nobis alias, totam voluptatum \r\nrecusandae quo quae in labore quasi animi maxime cumque inventore \r\nvoluptate atque eaque magnam. Culpa consequuntur cupiditate tempore \r\nexpedita! Omnis repudiandae laboriosam corrupti nulla voluptatum. \r\nReiciendis iusto optio quia culpa quasi reprehenderit eum natus eius \r\nvoluptas quo nobis doloremque eligendi, asperiores incidunt deleniti \r\nnulla exercitationem quidem sunt molestiae at. Suscipit molestias animi \r\ndignissimos in, aspernatur consequatur quis officiis quam officia sit \r\nrepudiandae quasi! Praesentium maiores earum ipsum reiciendis velit \r\nmolestias rem assumenda! Suscipit, necessitatibus. Deleniti, error ullam\r\n recusandae voluptates a eos animi ea expedita soluta repudiandae quis \r\naccusantium dicta quam. Dignissimos!</p>', '2024-11-08 06:17:37', '2024-11-08 06:17:37'),
(2, 'Privacy Policy', 'privacy-policy', 'Our privacy policy outlines how we collect, use, and protect your data. We prioritize transparency, detailing cookies, data sharing, and your rights to ensure your personal information stays secure.', '<p>At [Your Company Name], we are committed to safeguarding your personal \r\ninformation and maintaining your trust. Our **Privacy Policy** outlines \r\nhow we collect, use, store, and protect your data while ensuring \r\ncomplete transparency. This policy is designed to provide you with a \r\nclear understanding of what information we gather, how we use it, and \r\nthe steps we take to keep your data secure. <br><br>#### 1. Information We Collect<br><br>To provide you with the best possible service, we may collect the following types of information:<br><br>-\r\n **Personal Information**: This includes your name, email address, phone\r\n number, billing and shipping addresses, and any other information you \r\nvoluntarily provide when interacting with our services, such as during \r\naccount creation or product purchases.<br>&nbsp; <br>- **Usage Data**: We \r\ngather data about how you interact with our website or app, including \r\npages viewed, links clicked, and the duration of your visit. This helps \r\nus improve our services and enhance your experience.<br><br>- **Device \r\nInformation**: We may collect details about the device you use to access\r\n our platform, such as the IP address, browser type, operating system, \r\nand other technical information.<br><br>- **Cookies and Tracking \r\nTechnologies**: To personalize your experience, we use cookies and \r\nsimilar tracking technologies to store information about your \r\npreferences, login sessions, and user behavior.<br><br>#### 2. How We Use Your Information<br><br>We use the information we collect for various purposes, including but not limited to:<br><br>-\r\n **Service Provision**: Your data is essential for providing, \r\nmaintaining, and improving the services you request from us. This \r\nincludes processing transactions, managing your account, and ensuring \r\nproper customer support.<br>&nbsp; <br>- **Personalization**: We use your \r\npreferences and usage data to personalize content, product \r\nrecommendations, and services to meet your specific needs and enhance \r\nyour overall experience.<br><br>- **Communication**: Your contact \r\ninformation allows us to send updates, notifications, and marketing \r\nmaterials (with your consent) regarding our products, promotions, or \r\nchanges to our policies.<br><br>- **Legal Compliance**: We may need to \r\nuse or disclose your information as required by law, for example, in \r\nresponse to a valid court order or to comply with regulations.<br><br>#### 3. Data Sharing and Disclosure<br><br>We\r\n respect your privacy, and as such, we do not sell or share your \r\npersonal information with third parties for direct marketing purposes. \r\nHowever, we may share your data with trusted partners and service \r\nproviders for the following reasons:<br><br>- **Service Providers**: \r\nThird-party vendors may assist us with specific services like payment \r\nprocessing, data analytics, website hosting, or customer support. These \r\npartners are obligated to use your data solely for the services they \r\nperform on our behalf and are required to comply with strict \r\nconfidentiality terms.<br><br>- **Legal Requirements**: In cases where \r\nwe are legally obliged to disclose information, such as in compliance \r\nwith a subpoena or other legal processes, we will do so only to the \r\nextent necessary.<br><br>- **Business Transfers**: If our company \r\nundergoes a merger, acquisition, or asset sale, your data may be \r\ntransferred as part of that transaction. You will be notified of any \r\nchange in data handling through a prominent notice on our website.<br><br>#### 4. Data Security<br><br>We\r\n take the security of your data seriously and implement a variety of \r\ntechnical and organizational measures to protect your information from \r\nunauthorized access, disclosure, alteration, or destruction. These \r\ninclude:<br><br>- **Encryption**: We use encryption protocols to secure \r\nsensitive information, especially during transmission (e.g., when you \r\nenter your credit card details).<br><br>- **Access Controls**: Access to\r\n your personal information is restricted to authorized personnel who \r\nrequire it for legitimate business purposes. <br><br>- **Regular \r\nSecurity Audits**: Our systems undergo regular security audits and \r\nupdates to protect against potential vulnerabilities.<br><br>While we \r\nstrive to protect your data, it\'s important to remember that no system \r\nis 100% secure. We encourage you to use strong passwords and be cautious\r\n with sharing sensitive information online.<br><br>#### 5. Your Rights and Choices<br><br>You\r\n have the right to access, update, or delete your personal information \r\nat any time. Depending on your location, you may also have additional \r\nrights under applicable privacy laws, such as:<br><br>- **Accessing Your Data**: You can request a copy of the personal information we hold about you.<br><br>- **Data Correction**: If your information is inaccurate or incomplete, you can request that we update it.<br><br>-\r\n **Data Deletion**: In certain circumstances, you can ask us to delete \r\nyour personal data, except for data we are required to retain for legal \r\nor business reasons.<br><br>- **Marketing Preferences**: You can opt out\r\n of receiving promotional emails from us by following the unsubscribe \r\nlink in the emails we send or by adjusting your preferences in your \r\naccount settings.<br><br>#### 6. Children’s Privacy<br><br>Our services \r\nare not intended for individuals under the age of 13, and we do not \r\nknowingly collect personal information from children. If we become aware\r\n that we have inadvertently gathered information from a child, we will \r\ntake steps to delete it promptly.<br><br>#### 7. Changes to This Privacy Policy<br><br>We\r\n may update this Privacy Policy from time to time to reflect changes in \r\nour practices, technologies, or legal requirements. When we make \r\nchanges, we will notify you by updating the</p>', '2024-11-08 06:19:10', '2024-11-08 06:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'customer_password', 'web', '2024-11-21 10:57:28', '2024-11-07 10:57:28'),
(2, 'web_content', 'web', '2024-11-06 10:58:02', '2024-11-08 10:58:02'),
(3, 'user_list', 'web', '2024-11-20 10:55:49', '2024-11-15 10:55:49'),
(4, 'category_list', 'web', '2024-11-08 10:59:32', '2024-11-08 10:59:32'),
(5, 'product_list', 'web', '2024-11-08 11:00:03', '2024-11-08 11:00:03'),
(6, 'blog_list', 'web', '2024-11-08 11:00:24', '2024-11-08 11:00:24'),
(7, 'dynamic_page', 'web', '2024-11-08 11:00:50', '2024-11-08 11:00:50'),
(8, 'seo_page', 'web', '2024-11-08 11:01:09', '2024-11-08 11:01:09'),
(9, 'message_list', 'web', '2024-11-08 11:01:37', '2024-11-08 11:01:37'),
(10, 'role_management', 'web', '2024-11-08 11:02:13', '2024-11-08 11:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `desp` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `preview` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_link`, `product_name`, `slug`, `sku`, `category_id`, `desp`, `preview`, `created_at`, `updated_at`) VALUES
(14, 'Asperiores molestias', 'Cap', 'CAP_44331', 'CA_2338', 12, '', 'cap_2338.jpg', '2024-10-27 22:38:29', '2024-10-27 22:38:29'),
(15, 'Ex et rerum ipsam so', 'Jents pant', 'JENTS_PANT_44399', 'JE_6824', 11, '', 'jents_pant_6824.jpg', '2024-10-27 22:39:21', '2024-10-27 22:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'Super Admin', 'web', '2024-11-08 05:17:51', '2024-11-08 05:17:51'),
(4, 'Admin', 'web', '2024-11-08 05:18:48', '2024-11-08 05:18:48'),
(6, 'Seller', 'web', '2024-11-08 05:45:59', '2024-11-08 05:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(4, 6),
(5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `s_e_o_s`
--

CREATE TABLE `s_e_o_s` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Mizan Ahmed', 'mizan@gmail.com', NULL, '$2y$12$TloBBxzLyiy3WjpBw65hxO/jOftSHuntjEt8qgDrR6.n9ZKP3d33q', NULL, '2024-10-26 01:22:20', '2024-10-26 07:29:39'),
(14, 'Rama Cameron', 'sopegyho@mailinator.com', NULL, '$2y$12$w/AYCaKPZngM7FjAbW9nI.wqNulgb0LVTySx5iSLQ.Pluof0Nye/C', NULL, '2024-11-08 04:10:21', '2024-11-08 04:10:21'),
(15, 'Miranda Snow', 'bisyf@mailinator.com', NULL, '$2y$12$5pndO7ycYTJ92JiMGwcqluh2UoTk6CliJaM/Xg7k8ONNQc3XOprhm', NULL, '2024-11-08 04:10:28', '2024-11-08 04:10:28'),
(16, 'Piper Cain', 'fovus@mailinator.com', NULL, '$2y$12$w3elg.0wqO0tiLVCU4bKwO779oOl/cLdqDaehwhfAkvrYDEllhagG', NULL, '2024-11-08 04:10:34', '2024-11-08 04:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `web_contents`
--

CREATE TABLE `web_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `footer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_title` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_desp` longtext COLLATE utf8mb4_unicode_ci,
  `whatsapp` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_contents`
--

INSERT INTO `web_contents` (`id`, `footer`, `number`, `email`, `facebook`, `twitter`, `linkedin`, `instagram`, `address`, `contact_title`, `contact_desp`, `whatsapp`, `telegram`, `slide`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'we specialize in delivering innovative tech solutions tailored to your business needs. From software development to IT consulting, we drive digital transformation with cutting-edge technology and expertise. Connect with us for personalized support and stay ahead in the fast-evolving tech landscape.', '0187786823', 'ami@mailinator.com', 'facebook.com', 'tw', 'li', 'in', '123 Demo St, Lakeland, FL 45678, United States.', 'Contact Us For More Information', 'Your questions, feedback, and suggestions are always welcome . Please don\'t hesitate to contact us at your convenience. Your valuable insights are crucial in our continuous effort to improve our services.', 'whatsapp', 'telegram', 'To Get Payment links simply click here', 'footerlogo.png', '2024-09-30 00:08:00', '2024-11-08 04:20:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `client_messages`
--
ALTER TABLE `client_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `s_e_o_s`
--
ALTER TABLE `s_e_o_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `web_contents`
--
ALTER TABLE `web_contents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `client_messages`
--
ALTER TABLE `client_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `s_e_o_s`
--
ALTER TABLE `s_e_o_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `web_contents`
--
ALTER TABLE `web_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
