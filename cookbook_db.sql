-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 10:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookbook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `recipe_id`, `user_id`, `comment_text`, `comment_date`) VALUES
(6, 81, 8, 'Seems tasty!', '2024-05-24 15:20:27'),
(7, 79, 8, 'Such a simple but great salad', '2024-05-24 15:20:39'),
(8, 83, 2, 'Sweet!', '2024-05-24 15:21:54'),
(9, 82, 2, 'i like cakes', '2024-05-24 15:22:14'),
(19, 84, 2, '', '2024-05-27 01:12:03'),
(20, 84, 2, 'Incredible', '2024-06-01 20:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `rname` varchar(255) NOT NULL,
  `rdescription` varchar(9999) NOT NULL,
  `rimage` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rlikes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `rname`, `rdescription`, `rimage`, `user_id`, `rlikes`) VALUES
(79, 'Light Tomato Salad', 'Ingredients\r\n1 tablespoon water\r\n\r\n2 teaspoons good-quality olive oil\r\n\r\n2 teaspoons white balsamic vinegar\r\n\r\n1 teaspoon sugar substitute (such as Splenda®)\r\n\r\n2 cloves garlic, crushed\r\n\r\nsalt and freshly ground black pepper to taste\r\n\r\n4 ripe tomatoes, sliced\r\n\r\n3 tablespoons thinly-sliced green onions\r\n\r\nDirections\r\nAdd water, olive oil, vinegar, Splenda®, garlic, salt, and pepper to a small bowl, and whisk until well combined.\r\n\r\nPlace tomato slices on a plate, and sprinkle green onions over the top. Drizzle dressing over tomatoes, and serve.', 'salad.png', 2, 1),
(81, 'Creamy Garlic Chicken', 'Ingredients\r\n1 teaspoon Italian herb seasoning, or seasoning blend of choice\r\n\r\n1/2 teaspoon salt, or to taste\r\n\r\n1/4 teaspoon freshly ground black pepper, or to taste\r\n\r\n1/4 teaspoon granulated garlic\r\n\r\n1/4 cup all-purpose flour\r\n\r\n2 pounds skinless, boneless chicken thighs\r\n\r\n2 tablespoons unsalted butter\r\n\r\n2 tablespoons olive oil\r\n\r\n8 garlic cloves, or more as needed, peeled and smashed, about 1/4 cup lightly packed\r\n\r\n1 cup heavy cream\r\n\r\n1 cup chicken broth\r\n\r\n1 tablespoon chopped fresh parsley, or as needed (optional)\r\n\r\nDirections\r\nCombine herb seasoning, salt, pepper, granulated garlic, and flour in a 1-gallon resealable plastic bag and mix well.\r\n\r\nCombine butter and olive oil in a large, nonstick skillet over medium heat. Pat chicken thighs dry with paper towels, place in the bag of seasoned flour, seal, and toss chicken thighs in the flour mixture until evenly coated.\r\n\r\nWhen butter stops sizzling, add chicken pieces and cook until nicely browned, no longer pink at the center and juices run clear, 4 to 5 minutes per side. An instant-read thermometer inserted near the center should read 165 degrees F (74 degrees C). Remove to a plate and keep warm.\r\n\r\nAdd smashed garlic to the same skillet. Reduce heat to medium-low and cook garlic, stirring frequently, just until fragrant, no longer than 1 minute.\r\n\r\nAdd cream to the skillet, and stir up any browned bits in the bottom of the pan. Stir in chicken broth. Increase heat to medium, and bring the sauce to a boil, stirring occasionally. Cook until the sauce is reduced by half, about 10 minutes.\r\n\r\nSample garlic cream sauce and adjust seasoning, if necessary. Return chicken to the skillet and stir in any accumulated juices. Allow chicken to heat through. Garnish with fresh parsley and serve.', 'chicken.png', 2, 1),
(82, 'Espresso Cake', 'Ingredients\r\n2 cups white sugar\r\n\r\n1 3/4 cups all-purpose flour\r\n\r\n3/4 cups cocoa powder\r\n\r\n2 tablespoons instant espresso powder\r\n\r\n1 1/2 teaspoons baking powder\r\n\r\n1 1/2 teaspoons baking soda\r\n\r\n1 teaspoon salt\r\n\r\n2 large eggs, at room temperature\r\n\r\n1 cup whole milk\r\n\r\n1/2 cup oil\r\n\r\n2 teaspoons vanilla extract\r\n\r\n1 cup boiling water\r\n\r\nDirections\r\nPreheat the oven to 350 degrees F (175 degrees C). Spray 2 9-inch pans with nonstick cooking spray. Set aside.\r\n\r\nSift sugar, flour, cocoa, espresso powder, baking powder, baking soda, and salt into a large bowl. Stir to combine. Add eggs, milk, oil and vanilla. Stir in boiling water. Divide batter evenly into prepared pans.\r\n\r\nBake until a toothpick inserted in the center comes out clean, for 30 to 37 minutes. Remove to cool on a wire rack.', 'cake.png', 8, 1),
(83, 'Espresso Brownies', 'Ingredients\r\n1/2 cup all-purpose flour\r\n\r\n2 tablespoons espresso powder\r\n\r\n1/8 teaspoon baking powder\r\n\r\n1/8 teaspoon salt\r\n\r\n1 cup white sugar\r\n\r\n1/2 cup butter, softened\r\n\r\n2 large eggs\r\n\r\n2 ounces unsweetened baking chocolate, melted\r\n\r\n1/2 teaspoon vanilla extract\r\n\r\n1 cup chopped walnuts (optional)\r\n\r\nDirections\r\nPreheat the oven to 325 degrees F (165 degrees C). Grease an 11x7-inch baking pan. Sift flour, espresso powder, baking powder, and salt together in a bowl.\r\n\r\nBeat sugar and butter together in a large bowl with an electric mixer until light and fluffy. Beat in eggs until smooth batter forms; beat in chocolate and vanilla extract. Stir flour mixture in just until incorporated; fold in walnuts. Spread batter into prepared pan.\r\n\r\nBake in the preheated oven until top is dry and edges have started to pull away from the sides of the pan, 35 to 40 minutes. Cool completely before cutting.\r\n\r\n', 'brownies.png', 8, 1),
(84, 'Classic Ice Cream Sandwiches', 'Ingredients\r\n1 cup (130g) all-purpose flour\r\n1/4 teaspoon baking powder\r\n1 stick (1/2 cup) unsalted butter\r\n4 ounces semisweet chocolate, chopped\r\n1 1/2 teaspoons vanilla extract\r\n1/2 teaspoon salt\r\n1 cup (200g) firmly packed brown sugar\r\n1/4 cup (50g) granulated sugar\r\n2 large eggs\r\n1/2 gallon ice cream, any flavor', 'icecream.png', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_likes`
--

CREATE TABLE `recipe_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_likes`
--

INSERT INTO `recipe_likes` (`id`, `user_id`, `recipe_id`) VALUES
(31, 2, 82),
(39, 2, 83),
(38, 2, 84),
(27, 8, 79),
(26, 8, 81);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `avatar`) VALUES
(2, 'George', 'Karountzos', 'user1@email.com', '1234', 'rdr.jpg'),
(7, 'Admin', 'admin', 'admin@email.com', 'admin', NULL),
(8, 'Fanis', 'Intzis', 'user2@email.com', '123', 'profileImages/default_avatar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `recipe_likes`
--
ALTER TABLE `recipe_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`recipe_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `recipe_likes`
--
ALTER TABLE `recipe_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipe_likes`
--
ALTER TABLE `recipe_likes`
  ADD CONSTRAINT `recipe_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `recipe_likes_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
