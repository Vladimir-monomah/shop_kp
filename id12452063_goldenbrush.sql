-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 21 2020 г., 09:16
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `id12452063_goldenbrush`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buy_products`
--

CREATE TABLE `buy_products` (
  `buy_id` int(11) NOT NULL,
  `buy_id_order` int(11) NOT NULL,
  `buy_id_product` int(11) NOT NULL,
  `buy_count_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `buy_products`
--

INSERT INTO `buy_products` (`buy_id`, `buy_id_order`, `buy_id_product`, `buy_count_product`) VALUES
(1, 1, 19, 3),
(2, 2, 19, 1),
(3, 3, 19, 1),
(4, 4, 19, 1),
(5, 5, 17, 1),
(6, 6, 9, 1),
(7, 7, 17, 1),
(8, 8, 19, 3),
(9, 9, 19, 3),
(10, 10, 8, 1),
(11, 11, 17, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_id_products` int(11) NOT NULL,
  `cart_price` int(11) NOT NULL,
  `cart_count` int(11) NOT NULL DEFAULT 1,
  `cart_datetime` datetime NOT NULL,
  `cart_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `type`, `brand`) VALUES
(53, 'paper', 'Снегурочка'),
(54, 'paper', 'Svetocopy'),
(56, 'paper', 'Гознак'),
(57, 'paper', 'Ассоль'),
(58, 'paper', 'Brauberg'),
(59, 'paints', 'Белые ночи'),
(60, 'paints', 'Сонет'),
(61, 'paints', 'Daniel Smith'),
(62, 'paints', 'De luxe'),
(63, 'graphics', 'Koh-i-nor'),
(64, 'graphics', 'Vista-Artista'),
(65, 'graphics', 'Faber Castell'),
(67, 'other', 'Vista-Artista');

-- --------------------------------------------------------

--
-- Структура таблицы `localization`
--

CREATE TABLE `localization` (
  `id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ru` text COLLATE utf8_unicode_ci NOT NULL,
  `en` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `localization`
--

INSERT INTO `localization` (`id`, `ru`, `en`) VALUES
('01340e1c32e59182483cfaae52f5206f', 'на сумму', 'in the amount of'),
('016b22007dac3c34a6a07531d737f8c7', 'Простое оформление заказа', 'Simple checkout'),
('047f5653b183292396e67f14c8750b73', 'Главная', 'Main'),
('09bfdc2dfb6e430511ac4e99ebc40987', 'От дешевых к дорогим', 'From cheap to expensive'),
('0b93f81293f084dbfa4dbe93a8280555', 'Регистрация', 'Registration'),
('0e2e04bd2885cdc169471ea2a113a43f', 'Обратная связь', 'Feedback'),
('0ffe722bca4921a22484918551d22d36', 'Прочие', 'Other'),
('14bd376becf67a4a2fc5b058f287c97c', 'Сортировка:', 'Sorting:'),
('157298fd7045a53d1be4ea9dfe3d91dc', 'Оплата заказа', 'Order payment'),
('18b32c949a70493315f2463cfa202fd9', 'Только мы даем самые низкие цены на свою продукцию, а если вы найдете еще дешевле, то мы снизим цену еще больше.', 'Only we give the lowest prices for our products, and if you find even cheaper, we will lower the price even more.'),
('190b68456a54309567c33ac15fcaea1d', '<p>Тип: краски акварельные<br />\r\nКонсистенция: жидкая<br />\r\nУпаковка: тубы<br />\r\nОбъем: 15 мл</p>\r\n', '<p> Type: watercolor paints <br />\r\nConsistency: liquid <br />\r\nPacking: tubes <br />\r\nVolume: 15 ml </p>'),
('1bce6acfff2e082c59900f125f9e34f2', 'руб.', 'rub.'),
('1c3fea01a64e56bd70c233491dd537aa', 'Отзывы', 'Reviews'),
('1da5534a101e3ccda263c92ae6d586d8', 'руб', 'rub'),
('1e884e3078d9978e216a027ecd57fb34', 'E-mail', 'E-mail'),
('1f6536e1363ecbbf7bac45e5685e68d9', 'В магазине на кассе', 'At the store at the checkout'),
('224b67b37576d6b38a24dc5cb854ece3', 'Банковской картой:', 'By credit card:'),
('24a9d4950a938163e2112d671e9f1092', 'Наличными:', 'In cash:'),
('24b1c2e46a81e8ba2dbec4f3bdc39153', 'Акции', 'Stocks'),
('2789bb532531e1f82bfb2e6eff1675cc', '<p>Формат: А3<br />\r\nКол-во листов: 10<br />\r\nБумага тисненая &quot;хлопок&quot;<br />\r\nПлотность бумаги: 260 г.</p>\r\n', '<p>Format: A3<br />\r\nNumber of sheets: 10<br />\r\nEmbossed paper & quot; cotton & quot;<br />\r\nPaper density: 260 g.< / p>'),
('2928e19c705428df3c9f1e6d4ea8042f', 'Телефон', 'Phone'),
('2a95b6ed059d0eaefd4bfcfb05430b12', 'Правилами продажи товаров дистанционным способом', 'Rules of sale of goods remote way'),
('2b0b0225a86bb67048840d3da9b899bc', 'Назад', 'Back'),
('2c476e393848dc262a971afb868c4638', 'Текст сообщения', 'Message text'),
('2d37727e46df0942521456effc18f15b', 'Текущий пароль', 'Current Password'),
('2e940217a444152d0ca6a179b5a68734', 'Достоинства', 'Dignities'),
('30da7c7e1062a42a81ea1819119e09cc', 'Круглосуточно', 'Around the clock'),
('34e1413d659cf910494586bf9fbc727e', 'Готово', 'Done'),
('372d52230c563285cca7ed66b8dcafa7', 'Квадратные кисти', 'Square brushes'),
('37b095b696e0fb48f09ad18553f02ff6', 'товара', 'of goods'),
('38a4c5058d5fd8e286d1b07fe11d99e6', 'Недостатки', 'Disadvantages'),
('38bb0dceaeccc88640465bf53a63481f', 'Забыли пароль?', 'Forgot your password?'),
('3bf18b050771673272461c55620f70d8', 'Введите E-mail', 'Enter your email address'),
('3e34aebef29ee8cb2cef07555f9ee38e', 'Регистрация.Зарегистрируйтесь</b> и упростите оформление последующих заказов — вся основная информация<br> будет сохранена в вашем «Личном кабинете».', 'Registration.Register< / b> and simplify the processing of subsequent orders — all the basic information<br> will be saved in your \"Personal account\".'),
('3fea375f704db2711c92a6fa1ed8afb9', 'Оформление заказа по телефону.</b> Хотите получить консультацию по телефону? Позвоните по<br> бесплатному телефону 8 (986) 500-76-12, и оператор интернет-магазина поможет сделать выбор и оформить заказ.', 'Place an order by phone. </b> Want to get a phone consultation? Call toll-free number 8 (986) 500-76-12, and the operator of the online store will help you make a choice and place an order.'),
('405dcd829921dd84af4c43fc58d3d19e', 'Сервис и помощь', 'Service and help'),
('459e5b8ffe6c5d5c96bc925af39e3d76', 'О компании:', 'About company:'),
('488d37d4746eda16022d7e7934f92a77', 'Возврат', 'Возврат'),
('4b17ecbb4642426ee2753a64a4431007', 'Адрес доставки', 'Delivery address'),
('4bfb6432d7bb214319efc6d48e31988d', 'и', 'and'),
('4c0516630b17602cd69d8629700814de', 'Полное оформление заказа.</b> Отправьте выбранные товары в корзину, нажав кнопку “Купить” <br> у товара. Обратите внимание, что товары, не имеющие этой кнопки, нельзя заказать в интернет-<br>магазине, они продаются только в магазинах сети. После того, как вы закончили выбор товаров,<br> перейдите в корзину для оформления заказа. Если у нас будут вопросы по заказу, то мы оперативно<br> свяжемся с вами по телефону. А если нет, то будем извещать о судьбе заказа в письмах и sms-сообщениях.', 'Complete order processing.< / b> Send the selected products to the shopping cart by clicking the “Buy” button <br> from the product. Please note that products that do not have this button cannot be ordered in an online store, they are only sold in online stores. After you have finished selecting products, < br> go to the shopping cart to place your order. If we have any questions about the order, we will promptly<br> contact you by phone. If not, we will notify you of the order\'s fate in emails and sms messages.'),
('4c3fdc5cabeed8ffb73ba8c3cdc1596f', 'Вход', 'Entrance'),
('4c5bf49942783dade9274b8e1db08d89', '<p>Формат: А4<br />\r\nКол-во листов: 500<br />\r\nБелизна: 146%<br />\r\nПлотность бумаги: 80 г.</p>\r\n', '<p>Format: A4<br />\r\nNumber of sheets: 500<br />\r\nWhite: 146%<br />\r\nPaper density: 80 g.< / p>'),
('4d4b965543303cec8425b75a4a839242', 'О нас', 'About us'),
('4dbf0c67eed6243d0535352743ed3b46', 'Способ оплаты', 'Payment method'),
('4e21edb54aa4995d057f7b1a6dcd87f5', 'Бумага', 'Paper'),
('4ea15dbece499be8a800f71305826574', '<p>Формат: А4<br />\r\nКол-во листов: 10<br />\r\nБумага тисненая &quot;лен&quot;<br />\r\nПлотность бумаги: 260 г.</p>\r\n', '<p>Format: A4<br />\r\nNumber of sheets: 10<br />\r\nEmbossed paper & quot; linen & quot;<br />\r\nPaper density: 260 g.< / p>'),
('4f46b78db8372925aa574c07e9a782ff', 'От дорогих к дешевым', 'From expensive to cheap'),
('501b3503b7a008bd1ff1d8edf590372e', 'button-param-search', NULL),
('511ddc925824aae0789561d1483e80da', 'Защитный код', 'security code'),
('51ebfc2ff6ad41a51b45c6d44ff65b7f', 'Ваше имя', 'your name'),
('52204c6782361ee810d4ba9278a4a664', 'Акварель \"Deniel Smith\"', 'Watercolor \" Daniel Smith\"'),
('538dc63d3c6db1a1839cafbaf359799b', 'до', 'before'),
('56786d1ef87790c1fc15cada02db97ae', 'Новый пароль', 'New Password'),
('5781a644de7a7276ce1b079f9f27fafe', 'Отзывов нет', 'No reviews'),
('57af51f34d67a37027635ae36d516dbe', 'Прочее', 'Etc'),
('5c3b3200ae03e06b413b6503ef305c9a', 'Графический карандаш', 'Graphic pencil'),
('5ebe553e01799a927b1d045924bbd4fd', 'Пароль', 'Пароль'),
('5fe5313dd98f8f5c31ab39c22b629759', 'Логин', 'Логин'),
('60d051210d5f7947715c9c581a0e7558', 'При доставки курьеру', 'When delivered to the courier'),
('62899cefc8855544723baae88cbfce9c', 'Отчество', 'Patronymic'),
('64425f291098b47b020295a65b376177', 'Служба поддержки', 'Support service'),
('651436d4395f8fee24ca2b317086f365', 'Ваш E-mail', 'Your email'),
('66cc74e0be72b6e34f7e563fda882798', 'Информация по товару', 'Information on the product'),
('67a6a0695fae29bb9f484808951e6eec', 'Представленный ассортимент является самым широким и у нас есть все, что вам нужно.', 'The presented assortment is the widest and we have everything that you need.'),
('67ad26237fb5535e3ab19d23e79d06e4', '<p>Длина ручки: короткая<br />\r\nМатериал: синтетика<br />\r\nФорма ворса: квадрат</p>\r\n', '< p> handle Length: short<br />\r\nMaterial: synthetic<br />\r\n Pile shape: square< / p>'),
('68d8c8f7650bcc4a6738cd484abb79dd', 'Золотая кисть', 'Golden brush'),
('6a12a98075236d31198bd8f05133b7e1', 'Неверный Логин и(или) Пароль', 'Invalid Username and/ or Password'),
('6aad0a46eee6d1f55502f4375c584f7d', 'Ассоль', 'Assol'),
('6d16d40e6bf454daf012ede15f7b4230', '<p>Формат: А4<br />\r\nКол-во листов: 24<br />\r\nБумага чертежная (ватман)<br />\r\nПлотность бумаги: 200 г.</p>\r\n', '<p>Format: A4<br />\r\nNumber of sheets: 24<br />\r\nDrawing paper (watman)<br />\r\nPaper density: 200 g.< / p>'),
('6d50954fc28f130b10c10d2c58d4e8cd', 'Акварель', 'Watercolor'),
('6d52a3fdee9390bcaa974b78875fd6bb', 'Режим работы интернет-магазина', 'The mode of operation of the online store'),
('6df99700f6f7d5d9e0f2091067e4688f', 'Новинки', 'Novelties'),
('7151bedc74b018d53c72a11222b7c35b', 'ggffgg', NULL),
('720d388e38d07ef13c808f84fc947625', 'Возврат товара', 'Return of goods'),
('75d83ba4e325c799fec74f494ab6828e', 'Главная страница', 'Главная страница'),
('7968589d13b421eef184e739941a99a4', 'Онлайн оплата на сайте', 'Online payment on the site'),
('7a28c88e041304e7bb69c54e3875730d', 'Корзина заказов', 'The cart'),
('7f164d12155a14bdb34181b6f8c41f3f', 'от', 'from'),
('84c03b71dbe4203ab6d6a71afd8735fb', 'Категории товаров', 'Product category'),
('8a4ba9fb7464cf7a9dd3cc776d71bc11', 'Краски', 'Paints'),
('8bd511b1abd3813bceba215394341a66', 'Акварель \"Сонет\"', 'The Watercolours \"Sonnet\"'),
('8d7ae9e25c2fc07856a1406d06bfd3f4', 'Комментарий', 'Comment'),
('8df354d38389300b8dda1a0ba32c41cd', 'Рассказать о сайте', 'Tell us about the site'),
('8ef2d61ae629c63b155ae66c3d2fc9fa', 'Выход', 'Exit'),
('8f385ff54c62c38aa42e87e581af7e14', 'Выбирайте удобный для вас способ заказа!', 'Choose a convenient way to order!'),
('90e7efe268f55ab929768482c4c6bc01', 'От дорогих к дешёвым', 'From expensive to cheap'),
('978f6ae28acd9e1d2d15f598f0d3ff8c', 'Запомнить меня', 'Remember me'),
('99b515c9a371ef18a975fc6ece1011e9', 'Вывести всё', 'Output all'),
('9a1dcda9efe2bfc3963e75f98cc1ffd5', 'Графика', 'Graphics'),
('9e26d3c026ab4079d3967e7038b4d948', 'Тема', 'Theme'),
('9feb937fc24ee177d2fd3adbc7d8c9df', 'Здравствуйте, Яна!', 'Hello, Yana!'),
('a0d68b113a16b04c623cd3632668f653', 'Поиск по параметрам', 'Search by parameters'),
('a35d750dc0a7065b321072392db0c166', 'Сгенерировать', 'Generate'),
('a46c372347e02010f5ef45fe441e4349', 'Профиль', 'Profile'),
('a4cb6bd21beee6076b9d8db99740e3a9', 'Вид:', 'View:'),
('a7b7df8362d60258a7208dde0a392643', 'Фамилия', 'Surname'),
('a804ed6861036a31f77fb33137d69f2a', 'Законом РФ «О защите прав потребителей»', 'Law of the Russian Federation \" on consumer protection»'),
('aab4e2266f73461be2f72671eb874de4', 'Цветные карандаши', 'Color pencil'),
('abf74b2d483ee9a68a5d9e4bb15f7a16', 'Безопасные способы оплаты', 'Secure payment methods'),
('afe3256be2403b6c6d02b744658a79a1', 'Все товары', 'All goods'),
('b0cbf581ce61479181cd836f61b604bb', 'Стоимость', 'Cost'),
('b1834834b855c1878187b211cf6ce79d', 'Категория не доступна или не создана!', 'Category not available or not created!'),
('bb011426b108fb3c1db40f8e13fd8d40', 'Нет сортировки', 'There is no sorting'),
('bb52aaf550534e7b80904330addd212c', 'Снегурочка', 'Snow maiden'),
('bced49d01eaa7cbe91c1687060358122', 'Производители', 'Manufacturers'),
('bf65d9bdeb83401a58aeffb59a171727', 'Корзина пуста', 'Trash is empty'),
('bfc95980634bf529e8a406db2c842b31', 'Поиск', 'Search'),
('c178dee3c509a2313895157b93069bf3', 'Интернет-магазин Золотая кисть', 'Online store Golden brush'),
('c45c2dabc0a34bb37eee0e16d3e50545', 'Круглые кисти ', 'Round brush'),
('c480386ebdb89ed0912e896621876e46', 'Данного товара в списке нету или он не создан', 'This product is not listed or not created'),
('c7c46ce28bc4b2837e50fe6e1f6aeedf', 'Вы вправе отказаться от товара в любое время до его передачи, а после передачи товара — в течение семи дней, если сохранены его товарный вид, потребительские свойства, а также документ, подтверждающий факт и условия покупки указанного товара. В остальном, отношения между продавцом и покупателем регулируются', 'You have the right to refuse the goods at any time before its transfer, and after goods transfer — within seven days if its trade dress, consumer properties, as well as a document confirming the fact and conditions of purchase of this product. Otherwise, the relationship between the seller and the buyer is regulated'),
('c7ca2a887415941147a9ad5a9d385392', '<p>Тип: грифельный карандаш<br />\r\nВид: цветной графит<br />\r\nУпаковка</p>\r\n', '<p>Type: pencil lead <br />\r\nType: colored graphite<br />\r\nPackaging< / p>'),
('c7d1d9e5ec44bd6d60ba6c7f9b1663c4', 'Светокопия', 'Blueprint'),
('c9234122671c97c6460801cfb67d1e27', 'Золотая Кисть', 'Golden Brush'),
('c944d745b377880c6e3a2f851bb3510a', 'товар', 'product'),
('ca76de3164a63392f2b5d17c47a1eb97', 'Навигация', 'Navigation'),
('cda550c8ed84fba422fd316dfd73c19f', 'Популярное', 'Popular'),
('cf991a7677529c08af0dc9da79fbfa78', '<p>Длина ручки: короткая<br />\r\nМатериал: синтетика<br />\r\nФорма ворса: круглая</p>\r\n', '< p> handle Length: short<br />\r\nMaterial: synthetic<br />\r\n Pile shape: round< / p>'),
('d2fc7cb771a48b5e4eea417dbec4858c', 'Сортировка', 'Sort'),
('d38d6d925c80a2267031f3f03d0a9070', 'Имя', 'Name'),
('d41d8cd98f00b204e9800998ecf8427e', '', NULL),
('d591685abc969597edab7718fda763da', 'Наш интернет магазин вышел на рынок труда ещё не давно, но уже зарекомендовали себя <br> как надежного и уверенного поставщика товара.', 'Our online store has entered the labor market not long ago, but has already established itself as a reliable and confident supplier of goods.'),
('d68903e36dee32ea6027e2549a7bf71a', 'На почте', 'At the post'),
('d6f9a39be4b8938d8499ac3b525abea7', 'Характеристики', 'Specifications'),
('d7d4bb5290918556612a6ebbace5cd84', 'Бумага для акварели', 'Watercolour paper'),
('d8170286e41569425067d3fa41d5f7b6', 'Сервис “Купить в 2 клика”.</b> Нет ничего проще! Нажмите на ссылку “Купить в 2 клика” на странице товара, введите свое имя и контактный телефон. Наш оператор перезвонит вам для оформления заказа.', 'Buy in 2 clicks service.< / b> Nothing is easier! Click on the “Buy in 2 clicks \" link on the product page, enter your name and contact phone number. Our operator will call you back to place your order.'),
('d9847da5e3d6371b7d6ec0e4abcf1bcc', '<p>Тип: краски акварельные<br />\r\nКонсистенция: твердая<br />\r\nКоличество в упаковке: 24<br />\r\nУпаковка: коробка</p>\r\n', '<p>Type: watercolor paints<br />\r\nConsistency: solid<br />\r\nQuantity per pack: 24<br />\r\nPackaging: box< / p>'),
('d9d213379e776c3d8c832451b74c47ac', 'Бумага для черчения', 'Drawing paper'),
('dbe34816c7eab21690cc1c4d702ea644', 'Публикация отзыва производится после предварительной модерации.', 'The publication of the opinion is made after the pre-moderation.'),
('dbe5444a9a2c431188f3f130d668c274', 'Обновить', 'Update'),
('dd932437018cc48be04f6e08384c2be4', 'Как сделать заказ', 'How to place an order'),
('ddea931e147770dff2aa953db76df7dc', 'Цветные карандаши \"Faber Castell\"', 'Colored pencils \" Faber Castell\"'),
('e973cf1629f2c446657e8a7931a246ac', 'Договор', 'Договор'),
('ed4dc1c5f932cc8b6c55b15ae97dd7cb', 'Акварель \"Белые ночи\"', 'Watercolor \" White nights\"'),
('eee16ae285dca002c1b0914b122aeaf7', 'От дешёвых к дорогим', 'From cheap to expensive'),
('f090145e653626d24d3958040bd3ab88', 'Поиск более 100 000 товаров', 'Search for more than 100,000 products'),
('f3f3eb7e89a7833e6530fde9fe3df39c', 'Наш интернет магазин приветствует вас! Добро пожаловать!', 'Our online store welcomes you! Welcome!'),
('f490b86156968b0c43cbf28feefacd33', 'Восстановление пароля', 'Password recovery'),
('f5bed5e875f6d1d80220bca634f989af', 'Покупая в нашем магазине, вы будете всегда счастливы и рады вернуться к нам снова.', 'Buying in our store, you will always be happy and happy to return to us again.'),
('f67c701b34022c89172090c6dfdc7d19', 'Для оплаты товара необходимо:', 'To pay for the product, you must:'),
('f7cbdf6b05affb7097538ac0b07ed390', 'Оформление заказа по телефону.</b> Хотите получить консультацию по телефону? Позвоните по<br> бесплатному телефону 8 (800) 333-12-43, и оператор интернет-магазина поможет сделать выбор и оформить заказ.', 'The making of an order on the phone.< / b> do you Want to get advice over the phone? Call < br> toll-free number 8 (800) 333-12-43, and the online store operator will help you make a choice and place an order.'),
('f9c9fc9da0e0f5448a620c6de8b92752', 'Нравится', 'Like'),
('fc44c403ff0b52c5ac5467d34fa927af', 'После оформления заказа нажать на кнопку «Оплатить».', 'After placing an order, click on the \"Pay\"button.'),
('fd80b40109c0191aa8a88f0dd64df147', 'Изменение профиля', 'Profile Change'),
('fde185532e4be98fb9ee4436d314cb13', 'Написать отзыв о товаре', 'Write a product review'),
('fed4ee89d09b7d542e84f75bf06977b9', 'От А до Я', 'From A to Z'),
('ff525040b2a300378596affbfd06bb9b', 'Мобильный телефон', 'Mobile phone');

-- --------------------------------------------------------

--
-- Структура таблицы `ok_autodialog`
--

CREATE TABLE `ok_autodialog` (
  `ip_user` bigint(12) NOT NULL,
  `id_operator` smallint(6) NOT NULL,
  `message` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ok_blacklist`
--

CREATE TABLE `ok_blacklist` (
  `ip_user` bigint(12) NOT NULL,
  `id_operator` smallint(6) NOT NULL,
  `add_date` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ok_files`
--

CREATE TABLE `ok_files` (
  `file_id` int(12) NOT NULL,
  `file_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_size` int(12) NOT NULL,
  `file_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ok_group`
--

CREATE TABLE `ok_group` (
  `group_id` smallint(6) NOT NULL,
  `group_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ok_group`
--

INSERT INTO `ok_group` (`group_id`, `group_name`) VALUES
(1, 'ÐžÑ‚Ð´ÐµÐ» Ð¿Ñ€Ð¾Ð´Ð°Ð¶'),
(2, 'ÐžÑ‚Ð´ÐµÐ» Ð¿Ð¾ Ð²Ñ‹Ð±Ð¾Ñ€Ñƒ Ñ‚Ð¾Ð²Ð°Ñ€Ð° Ð¿Ð¾ ÐºÐ°Ñ‡ÐµÑÑ‚Ð²Ñƒ');

-- --------------------------------------------------------

--
-- Структура таблицы `ok_messages`
--

CREATE TABLE `ok_messages` (
  `id_mess` int(20) NOT NULL,
  `id_user` int(10) NOT NULL,
  `is_for` int(10) NOT NULL,
  `wr_date` int(10) NOT NULL,
  `messages` text COLLATE utf8_unicode_ci NOT NULL,
  `is_from` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ok_messages`
--

INSERT INTO `ok_messages` (`id_mess`, `id_user`, `is_for`, `wr_date`, `messages`, `is_from`) VALUES
(3, 2, 1, 1554720522, 'askfgsdigzuihilhzsuihizdsughklshgkzshvlzhlzkhilhildhvlhzdulgholhohg', '1'),
(4, 2, 1, 1554720572, 'xcbdfbdfhdfbdf', '2'),
(5, 2, 1, 1554998281, 'Ð¿Ñ€Ð¸Ð²ÐµÑ‚', '1'),
(6, 2, 1, 1554998465, 'Ð¿Ñ€Ð¸Ð²ÐµÑ‚', '1'),
(7, 2, 1, 1554998508, 'ÐµÑÑ‚ÑŒ Ð²Ð¾Ð¿Ñ€Ð¾Ñ Ð½Ð° ÑÑ‡Ñ‘Ñ‚ Ñ‚Ð¾Ð²Ð°Ñ€Ð°. ÐœÐ¾Ð¶ÐµÑ‚Ðµ Ð¿Ð¾Ð¼Ð¾Ñ‡ÑŒ?', '1'),
(8, 2, 1, 1554998645, 'Ð·Ð´Ñ€Ð°Ð²ÑÑ‚Ð²ÑƒÐ¹Ñ‚Ðµ!', '1'),
(9, 2, 1, 1554998926, 'Ð’Ñ‹ Ñ‚ÑƒÑ‚?', '1'),
(10, 2, 1, 1554999630, 'Ð”Ð°, ÐºÐ¾Ð½ÐµÑ‡Ð½Ð¾', '2'),
(11, 2, 1, 1554999713, 'Ð¾Ñ‚Ð»Ð¸Ñ‡Ð½Ð¾', '1'),
(12, 2, 2, 1555002396, 'Ð—Ð´Ñ€Ð°Ð²ÑÑ‚Ð²ÑƒÐ¹Ñ‚Ðµ! ÐœÐ¾Ð¶Ð½Ð¾ Ñƒ Ð²Ð°Ñ ÑÐ¿Ñ€Ð¾ÑÐ¸Ñ‚ÑŒ?', '1'),
(13, 2, 2, 1555002519, 'Ð—Ð´Ñ€Ð°Ð²ÑÑ‚Ð²ÑƒÐ¹Ñ‚Ðµ! Ð”Ð°, Ñ‡Ñ‚Ð¾ Ð’Ð°Ñ Ð¸Ð½Ñ‚ÐµÑ€ÐµÑÑƒÐµÑ‚?', '2'),
(14, 2, 2, 1555002611, 'Ð¡Ð¼Ð°Ñ€Ñ‚Ñ„Ð¾Ð½ ZTE Nubia Z 17 MiniS\'', '1'),
(15, 2, 2, 1555002955, 'Ð¾Ð½ Ð¸Ð¼ÐµÐµÑ‚ÑÑ Ñƒ Ð½Ð°Ñ. ÐŸÑ€Ð¾Ñ…Ð¾Ð´Ð¸Ñ‚Ðµ, Ð¿Ð¾ÑÐ¼Ð¾Ñ‚Ñ€Ð¸Ñ‚Ðµ', '2'),
(16, 3, 1, 1555003202, 'ÐŸÐ¾Ð»', '1'),
(17, 3, 1, 1555003230, 'ÐµÑ€Ð°Ñ€Ð¿Ð°', '2');

-- --------------------------------------------------------

--
-- Структура таблицы `ok_moving`
--

CREATE TABLE `ok_moving` (
  `user_ip` bigint(12) NOT NULL,
  `page` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `at_time` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ok_online`
--

CREATE TABLE `ok_online` (
  `user_ip` bigint(12) NOT NULL,
  `ctime` int(10) NOT NULL,
  `ltime` int(10) NOT NULL,
  `user_info` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `country` char(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ok_operators`
--

CREATE TABLE `ok_operators` (
  `operator_id` smallint(6) NOT NULL,
  `operator_login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `operator_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `operator_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `operator_surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `operator_limit` tinyint(100) NOT NULL DEFAULT 99,
  `operator_rating` decimal(10,0) DEFAULT 0,
  `operator_photo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `operator_otdel` smallint(6) NOT NULL,
  `operator_online` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `operator_connected` tinyint(100) NOT NULL DEFAULT 0,
  `operator_messages` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ð—Ð´Ñ€Ð°Ð²ÑÑ‚Ð²ÑƒÐ¹Ñ‚Ðµ, Ð¼Ð¾Ð³Ñƒ Ñ Ð’Ð°Ð¼ Ñ‡ÐµÐ¼ Ñ‚Ð¾ Ð¿Ð¾Ð¼Ð¾Ñ‡ÑŒ?',
  `operator_ltime` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ok_operators`
--

INSERT INTO `ok_operators` (`operator_id`, `operator_login`, `operator_password`, `operator_name`, `operator_surname`, `operator_limit`, `operator_rating`, `operator_photo`, `operator_otdel`, `operator_online`, `operator_connected`, `operator_messages`, `operator_ltime`) VALUES
(1, 'ÐÐ³ÐµÐ½Ñ‚_007', 'b57cb0b0bfdc13e892f2db13409b19c2', 'ÐœÐ°Ñ€Ð¸Ñ', 'ÐšÐ¸Ñ€ÐµÐµÐ²Ð°', 99, NULL, '1540239476.jpg', 1, '0', 0, 'Ð—Ð´Ñ€Ð°Ð²ÑÑ‚Ð²ÑƒÐ¹Ñ‚Ðµ! Ð§ÐµÐ¼ Ð¼Ð¾Ð³Ñƒ Ð²Ð°Ð¼ Ð¿Ð¾Ð¼Ð¾Ñ‡ÑŒ?', 1555239971),
(2, 'yana_burmak_my_sun', '8354985c9b5fa36cee26e6f731ff18ab', 'Ð¯Ð½Ð°', 'Ð‘ÑƒÑ€Ð¼Ð°Ðº', 99, NULL, '1540271362.jpg', 2, '0', 0, 'Ð—Ð´Ñ€Ð°Ð²ÑÑ‚Ð²ÑƒÐ¹Ñ‚Ðµ! Ð§ÐµÐ¼ Ð¼Ð¾Ð³Ñƒ Ð²Ð°Ð¼ Ð¿Ð¾Ð¼Ð¾Ñ‡ÑŒ?', 1555239994);

-- --------------------------------------------------------

--
-- Структура таблицы `ok_operators_chat`
--

CREATE TABLE `ok_operators_chat` (
  `id_mess` int(9) NOT NULL,
  `id_operator` smallint(6) NOT NULL,
  `wr_date` int(10) NOT NULL,
  `messages` varchar(4000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ok_phrases`
--

CREATE TABLE `ok_phrases` (
  `id_phrases` int(10) NOT NULL,
  `id_operator` smallint(6) NOT NULL,
  `phrases` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ok_typing`
--

CREATE TABLE `ok_typing` (
  `id_user` int(10) NOT NULL,
  `t_mess` varchar(1500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ok_url`
--

CREATE TABLE `ok_url` (
  `id_user` int(10) NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ok_users`
--

CREATE TABLE `ok_users` (
  `user_id` int(10) NOT NULL,
  `user_ip` bigint(12) NOT NULL,
  `user_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ÐšÐ»Ð¸ÐµÐ½Ñ‚',
  `user_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_online` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ok_users`
--

INSERT INTO `ok_users` (`user_id`, `user_ip`, `user_name`, `user_date`, `user_online`) VALUES
(2, 2999898205, 'Dkflbvbh', '1554998280', '0'),
(3, 2999898205, 'Ð’Ð»Ð°Ð´Ð¸Ð¼Ð¸Ñ€', '1555003202', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `ok_users_chat`
--

CREATE TABLE `ok_users_chat` (
  `id_user` int(10) NOT NULL,
  `id_operator` smallint(6) NOT NULL,
  `new_message_user` tinyint(10) NOT NULL DEFAULT 0,
  `new_message_operator` tinyint(10) NOT NULL DEFAULT 0,
  `write_user` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `write_operator` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ok_voting`
--

CREATE TABLE `ok_voting` (
  `id_operator` smallint(6) NOT NULL,
  `id_user` int(10) NOT NULL,
  `voting` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ok_voting`
--

INSERT INTO `ok_voting` (`id_operator`, `id_user`, `voting`) VALUES
(1, 2, '1'),
(1, 3, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_datetime` datetime NOT NULL,
  `order_confirmed` varchar(10) NOT NULL,
  `order_dostavka` varchar(255) NOT NULL,
  `order_pay` varchar(50) DEFAULT NULL,
  `order_type_pay` varchar(100) DEFAULT NULL,
  `order_fio` text NOT NULL,
  `order_address` text NOT NULL,
  `order_phone` varchar(50) NOT NULL,
  `order_note` text NOT NULL,
  `order_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `order_datetime`, `order_confirmed`, `order_dostavka`, `order_pay`, `order_type_pay`, `order_fio`, `order_address`, `order_phone`, `order_note`, `order_email`) VALUES
(2, '2020-04-01 18:08:56', 'yes', 'По почте', 'accepted', NULL, 'Бурмак Яна Алексеевна', 'РТ, г. Бугульма,ул Якупова д 51, кв 15', '8 986 717 80 29', 'Звонки приму в период с 8.30 до 18.00', 'yana.burmak@mail.ru'),
(4, '2020-04-04 18:24:53', 'yes', 'По почте', 'accepted', NULL, 'Бурмак Яна Алексеевна', 'г.Бугульма ул Якупова 51', '89867178039', '', 'yana@mail.ru'),
(5, '2020-04-04 19:18:53', 'yes', 'По почте', NULL, NULL, 'Бурмак Яна Алексеевна', 'г.Бугульма', '89867178039', '', 'yana@mail.ru'),
(6, '2020-04-04 19:29:01', 'yes', 'По почте', 'accepted', NULL, 'Бурмак Яна Алексеевна', 'г.Бугульма', '89867178039', '', 'yana@mail.ru'),
(7, '2020-04-09 10:55:16', 'yes', 'По почте', 'accepted', NULL, 'Бурмак Яна Алексеевна', 'г.Бугульма', '89867178039', '', 'yana@mail.ru'),
(8, '2020-04-10 09:34:28', 'yes', 'По почте', 'accepted', NULL, 'Бурмак Яна Алексеевна', 'г.Бугульма', '89867178039', '', 'yana@mail.ru'),
(9, '2020-04-10 11:25:36', 'yes', 'Самовывоз', 'accepted', NULL, 'Бурмак Яна Алексеевна', 'г.Бугульма', '89867178039', '', 'yana@mail.ru'),
(10, '2020-04-12 07:05:16', 'yes', 'Курьером', 'accepted', NULL, 'Бурмак Яна Алексеевна', 'г.Бугульма', '89867178039', '', 'yana@mail.ru'),
(11, '2020-04-17 10:30:07', 'yes', 'По почте', 'accepted', NULL, 'Бурмак Яна Алексеевна', 'г.Бугульма', '89867178039', '', 'yana@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `reg_admin`
--

CREATE TABLE `reg_admin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fio` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `view_orders` int(11) NOT NULL DEFAULT 0,
  `accept_orders` int(11) NOT NULL DEFAULT 0,
  `delete_orders` int(11) NOT NULL DEFAULT 0,
  `add_tovar` int(11) NOT NULL DEFAULT 0,
  `edit_tovar` int(11) NOT NULL DEFAULT 0,
  `delete_tovar` int(11) NOT NULL DEFAULT 0,
  `accept_reviews` int(11) NOT NULL DEFAULT 0,
  `delete_reviews` int(11) NOT NULL DEFAULT 0,
  `view_clients` int(11) NOT NULL DEFAULT 0,
  `delete_clients` int(11) NOT NULL DEFAULT 0,
  `add_news` int(11) NOT NULL DEFAULT 0,
  `delete_news` int(11) NOT NULL DEFAULT 0,
  `add_category` int(11) NOT NULL DEFAULT 0,
  `delete_category` int(11) NOT NULL DEFAULT 0,
  `view_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reg_admin`
--

INSERT INTO `reg_admin` (`id`, `login`, `pass`, `fio`, `role`, `email`, `phone`, `view_orders`, `accept_orders`, `delete_orders`, `add_tovar`, `edit_tovar`, `delete_tovar`, `accept_reviews`, `delete_reviews`, `view_clients`, `delete_clients`, `add_news`, `delete_news`, `add_category`, `delete_category`, `view_admin`) VALUES
(2, 'yana_burmak', 'mb03foo51b0d426b1f1815f588354b323497e9f52qj2jjdp9', 'Бурмак Яна Алексеевна', 'Администратор', 'yana_burmak@mail.ru', '+79867178039', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reg_user`
--

CREATE TABLE `reg_user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reg_user`
--

INSERT INTO `reg_user` (`id`, `login`, `pass`, `surname`, `name`, `patronymic`, `email`, `phone`, `address`, `datetime`, `ip`) VALUES
(8, 'yana1', '9nm2rv8q07b432d25170b469b57095ca269bc2022yo6z', 'Бурмак', 'Яна', 'Алексеевна', 'yana@mail.ru', '89867178039', 'г.Бугульма', '2020-04-04 19:41:27', '188.234.40.23');

-- --------------------------------------------------------

--
-- Структура таблицы `table_products`
--

CREATE TABLE `table_products` (
  `products_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `seo_words` text NOT NULL,
  `seo_description` text NOT NULL,
  `mini_description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `mini_features` text NOT NULL,
  `features` text NOT NULL,
  `datetime` datetime NOT NULL,
  `new` int(11) NOT NULL DEFAULT 0,
  `leader` int(11) NOT NULL DEFAULT 0,
  `sale` int(11) NOT NULL DEFAULT 0,
  `visible` int(11) NOT NULL DEFAULT 0,
  `count` int(11) NOT NULL DEFAULT 0,
  `type_tovara` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `yes_like` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `table_products`
--

INSERT INTO `table_products` (`products_id`, `title`, `price`, `brand`, `seo_words`, `seo_description`, `mini_description`, `image`, `description`, `mini_features`, `features`, `datetime`, `new`, `leader`, `sale`, `visible`, `count`, `type_tovara`, `brand_id`, `yes_like`) VALUES
(2, 'Снегурочка', 200, 'Снегурочка', 'Бумага, Снегурочка, Снег', 'Формат: А4\r\nКол-во листов: 500\r\nБелизна: 146%\r\nПлотность бумаги: 80 г.', '<p>Формат: А4<br />\r\nКол-во листов: 500<br />\r\nБелизна: 146%<br />\r\nПлотность бумаги: 80 г.</p>\r\n', 'paper-246.png', '', '', '', '2020-02-22 22:43:24', 0, 0, 0, 1, 18, 'paper', 53, 1),
(3, 'Светокопия', 250, 'Svetocopy', 'Свет, копия, светокопия', 'Формат: А4\r\nКол-во листов: 500\r\nБелизна: 146%\r\nПлотность бумаги: 80 г.', '<p>Формат: А4<br />\r\nКол-во листов: 500<br />\r\nБелизна: 146%<br />\r\nПлотность бумаги: 80 г.</p>\r\n', 'paper-366.png', '', '', '', '2020-03-21 18:31:14', 1, 0, 0, 1, 13, 'paper', 54, 1),
(4, 'Бумага для черчения', 100, 'Гознак', 'бумага, черчение', 'Формат: А4\r\nКол-во листов: 24\r\nБумага чертежная (ватман)\r\nПлотность бумаги: 200 г.', '<p>Формат: А4<br />\r\nКол-во листов: 24<br />\r\nБумага чертежная (ватман)<br />\r\nПлотность бумаги: 200 г.</p>\r\n', 'paper-491.png', '', '', '', '2020-03-21 18:46:20', 0, 0, 0, 1, 13, 'paper', 56, 1),
(5, 'Ассоль', 130, 'Ассоль', 'бумага, акварель', 'Формат: А4\r\nКол-во листов: 10\r\nБумага тисненая \"лен\"\r\nПлотность бумаги: 260 г.', '<p>Формат: А4<br />\r\nКол-во листов: 10<br />\r\nБумага тисненая &quot;лен&quot;<br />\r\nПлотность бумаги: 260 г.</p>\r\n', 'paper-571.png', '', '', '', '2020-03-21 18:51:56', 0, 0, 0, 1, 10, 'paper', 57, 1),
(6, 'Бумага для акварели', 200, 'Brauberg', 'акварель, бумага', 'Формат: А3\r\nКол-во листов: 10\r\nБумага тисненая \"хлопок\"\r\nПлотность бумаги: 260 г.', '<p>Формат: А3<br />\r\nКол-во листов: 10<br />\r\nБумага тисненая &quot;хлопок&quot;<br />\r\nПлотность бумаги: 260 г.</p>\r\n', 'paper-695.png', '', '', '', '2020-03-21 18:54:55', 0, 0, 0, 1, 12, 'paper', 58, 1),
(7, 'Акварель', 248, 'De luxe', 'краски, аква,акварель', 'Тип: краски акварельные\r\nКонсистенция: твердая\r\nКоличество в упаковке: 24\r\nУпаковка: коробка', '<p>Тип: краски акварельные<br />\r\nКонсистенция: твердая<br />\r\nКоличество в упаковке: 24<br />\r\nУпаковка: коробка</p>\r\n', 'paints-745.png', '', '', '', '2020-03-21 19:16:44', 0, 0, 0, 1, 11, 'paints', 62, 1),
(8, 'Акварель \"Deniel Smith\"', 1050, 'Daniel Smith', 'Deniel Smith, Deniel, Smith, акварель, краски', 'Тип: краски акварельные\r\nКонсистенция: жидкая\r\nУпаковка: тубы\r\nОбъем: 15 мл', '<p>Тип: краски акварельные<br />\r\nКонсистенция: жидкая<br />\r\nУпаковка: тубы<br />\r\nОбъем: 15 мл</p>\r\n', 'paints-822.png', '', '', '', '2020-03-21 19:24:16', 1, 0, 0, 1, 14, 'paints', 61, 1),
(9, 'Акварель \"Сонет\"', 620, 'Сонет', 'акварель, сонет, аква', 'Тип: краски акварельные\r\nКонсистенция: твердая\r\nКоличество в упаковке: 24\r\nУпаковка: коробка', '<p>Тип: краски акварельные<br />\r\nКонсистенция: твердая<br />\r\nКоличество в упаковке: 24<br />\r\nУпаковка: коробка</p>\r\n', 'paints-964.png', '', '', '', '2020-03-21 19:33:09', 0, 0, 0, 1, 13, 'paints', 60, 1),
(10, 'Акварель \"Белые ночи\"', 1000, 'Белые ночи', 'акварель, ночи, белые, белые ночи', 'Тип: краски акварельные\r\nКонсистенция: твердая\r\nКоличество в упаковке: 24\r\nУпаковка: коробка', '', 'paints-1069.png', '', '', '', '2020-03-21 19:36:40', 0, 0, 0, 1, 11, 'paints', 59, 1),
(14, 'Графический карандаш', 280, 'Koh-i-nor', 'карандаш, грифель, графический карандаш ', 'Тип: грифельный карандаш\r\nВид: чернографитный\r\nУпаковка', '', 'graphics-1433.png', '', '', '', '2020-03-21 20:01:43', 0, 0, 0, 1, 13, 'graphics', 63, 2),
(15, 'Цветные карандаши', 240, 'Vista-Artista', 'цветные карандаши, цвет, карандаши', 'Тип: грифельный карандаш\r\nВид: цветной графит\r\nУпаковка', '<p>Тип: грифельный карандаш<br />\r\nВид: цветной графит<br />\r\nУпаковка</p>\r\n', 'graphics-1543.png', '', '', '', '2020-03-21 20:04:42', 0, 0, 0, 1, 10, 'graphics', 64, 1),
(17, 'Круглые кисти ', 80, 'Vista-Artista', 'кисти', 'Длина ручки: короткая\r\nМатериал: синтетика\r\nФорма ворса: круглая', '<p>Длина ручки: короткая<br />\r\nМатериал: синтетика<br />\r\nФорма ворса: круглая</p>\r\n', 'other-1735.png', '', '', '', '2020-03-21 20:19:57', 0, 0, 0, 1, 14, 'other', 67, 1),
(18, 'Квадратные кисти', 80, 'Vista-Artista', 'квадрат, кисти, квадратные кисти', 'Длина ручки: короткая\r\nМатериал: синтетика\r\nФорма ворса: квадрат', '<p>Длина ручки: короткая<br />\r\nМатериал: синтетика<br />\r\nФорма ворса: квадрат</p>\r\n', 'other-1889.png', '', '', '', '2020-03-21 20:35:10', 0, 0, 0, 1, 10, 'other', 67, 1),
(19, 'Цветные карандаши \"Faber Castell\"', 1300, 'Faber Castell', 'Faber Castell', 'Тип: грифельный карандаш\r\nВид: цветной графит\r\nУпаковка', '<p>Тип: грифельный карандаш<br />\r\nВид: цветной графит<br />\r\nУпаковка</p>\r\n', 'other-1974.png', '', '', '', '2020-03-21 20:38:59', 0, 0, 0, 1, 16, 'other', 65, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `table_reviews`
--

CREATE TABLE `table_reviews` (
  `reviews_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `good_reviews` text NOT NULL,
  `bad_reviews` text NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  `moderat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `table_reviews`
--

INSERT INTO `table_reviews` (`reviews_id`, `products_id`, `name`, `good_reviews`, `bad_reviews`, `comment`, `date`, `moderat`) VALUES
(2, 19, 'Яна', 'Хорошо смешиваются друг с другом', 'нету', '', '2020-03-21', 1),
(3, 14, 'Яна', 'Мягкие', 'Быстро ломаются', '', '2020-04-04', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `uploads_images`
--

CREATE TABLE `uploads_images` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `uploads_images`
--

INSERT INTO `uploads_images` (`id`, `products_id`, `image`) VALUES
(1, 1, 'paper-303.png'),
(2, 1, 'paper-211.png'),
(3, 2, 'paper-459.png'),
(4, 2, 'paper-213.png'),
(5, 3, 'paper-461.png'),
(6, 3, 'paper-176.png'),
(7, 4, 'paper-368.png'),
(8, 5, 'paper-466.png'),
(9, 6, 'paper-456.png'),
(10, 7, 'paints-270.png'),
(11, 8, 'paints-112.png'),
(12, 8, 'paints-209.png'),
(13, 8, 'paints-182.png'),
(14, 8, 'paints-143.png'),
(15, 8, 'paints-315.png'),
(16, 8, 'paints-389.png'),
(17, 8, 'paints-473.png'),
(18, 9, 'paints-347.png'),
(19, 9, 'paints-471.png'),
(20, 10, 'paints-255.png'),
(21, 11, 'graphics-119.png'),
(22, 11, 'graphics-183.png'),
(23, 12, 'graphics-299.png'),
(24, 12, 'graphics-193.png'),
(25, 13, 'graphics-304.png'),
(26, 13, 'graphics-286.png'),
(27, 14, 'graphics-489.png'),
(28, 14, 'graphics-212.png'),
(29, 15, 'graphics-157.png'),
(30, 16, 'other-337.png'),
(31, 17, 'other-144.png'),
(32, 18, 'other-180.png'),
(33, 19, 'other-463.png'),
(34, 19, 'other-361.png'),
(35, 19, 'other-195.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `buy_products`
--
ALTER TABLE `buy_products`
  ADD PRIMARY KEY (`buy_id`),
  ADD KEY `buy_id_order` (`buy_id_order`),
  ADD KEY `buy_id_product` (`buy_id_product`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_id_products` (`cart_id_products`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `localization`
--
ALTER TABLE `localization`
  ADD PRIMARY KEY (`id`) KEY_BLOCK_SIZE=64 USING BTREE COMMENT 'MD5 хеш для строки на языке по умолчанию (русский)';

--
-- Индексы таблицы `ok_blacklist`
--
ALTER TABLE `ok_blacklist`
  ADD KEY `ip_user` (`ip_user`);

--
-- Индексы таблицы `ok_files`
--
ALTER TABLE `ok_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Индексы таблицы `ok_group`
--
ALTER TABLE `ok_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Индексы таблицы `ok_messages`
--
ALTER TABLE `ok_messages`
  ADD PRIMARY KEY (`id_mess`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `is_for` (`is_for`),
  ADD KEY `wr_date` (`wr_date`);

--
-- Индексы таблицы `ok_moving`
--
ALTER TABLE `ok_moving`
  ADD KEY `user_ip` (`user_ip`);

--
-- Индексы таблицы `ok_online`
--
ALTER TABLE `ok_online`
  ADD PRIMARY KEY (`user_ip`);

--
-- Индексы таблицы `ok_operators`
--
ALTER TABLE `ok_operators`
  ADD PRIMARY KEY (`operator_id`),
  ADD KEY `operator_otdel` (`operator_id`);

--
-- Индексы таблицы `ok_operators_chat`
--
ALTER TABLE `ok_operators_chat`
  ADD PRIMARY KEY (`id_mess`);

--
-- Индексы таблицы `ok_phrases`
--
ALTER TABLE `ok_phrases`
  ADD PRIMARY KEY (`id_phrases`);

--
-- Индексы таблицы `ok_typing`
--
ALTER TABLE `ok_typing`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `ok_url`
--
ALTER TABLE `ok_url`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `ok_users`
--
ALTER TABLE `ok_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_ip` (`user_ip`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `reg_admin`
--
ALTER TABLE `reg_admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reg_user`
--
ALTER TABLE `reg_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `table_products`
--
ALTER TABLE `table_products`
  ADD PRIMARY KEY (`products_id`);

--
-- Индексы таблицы `table_reviews`
--
ALTER TABLE `table_reviews`
  ADD PRIMARY KEY (`reviews_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Индексы таблицы `uploads_images`
--
ALTER TABLE `uploads_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `buy_products`
--
ALTER TABLE `buy_products`
  MODIFY `buy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `ok_files`
--
ALTER TABLE `ok_files`
  MODIFY `file_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ok_group`
--
ALTER TABLE `ok_group`
  MODIFY `group_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `ok_messages`
--
ALTER TABLE `ok_messages`
  MODIFY `id_mess` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `ok_operators`
--
ALTER TABLE `ok_operators`
  MODIFY `operator_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `ok_operators_chat`
--
ALTER TABLE `ok_operators_chat`
  MODIFY `id_mess` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ok_phrases`
--
ALTER TABLE `ok_phrases`
  MODIFY `id_phrases` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ok_users`
--
ALTER TABLE `ok_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `reg_admin`
--
ALTER TABLE `reg_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `reg_user`
--
ALTER TABLE `reg_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `table_products`
--
ALTER TABLE `table_products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `table_reviews`
--
ALTER TABLE `table_reviews`
  MODIFY `reviews_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `uploads_images`
--
ALTER TABLE `uploads_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
