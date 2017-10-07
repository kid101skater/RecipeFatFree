CREATE TABLE IF NOT EXISTS `Recipes` (
  `recipeID` int(11) NOT NULL,
  `recipeTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recipeImg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recipeDetails` text COLLATE utf8_unicode_ci NOT NULL,
  `recipeBurb` varchar(255) COLLATE utf8_unicode_ci NOT NULL
)