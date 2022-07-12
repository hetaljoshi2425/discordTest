# discordTest

# 3.6. Summarized price of all active attached products

//Itemswise total
SELECT SUM(`usersproducts`.`amount` * `usersproducts`.`quantity`) as 'TotalSummarized', `products`.* FROM `products` INNER JOIN `usersproducts` ON `usersproducts`.`product_id` = `products`.`id` WHERE `products`.`status` = '0' GROUP BY product_id
//Itemswise SUM total
SELECT SUM(`usersproducts`.`amount` * `usersproducts`.`quantity`) as 'TotalSummarized', `products`.* FROM `products` INNER JOIN `usersproducts` ON `usersproducts`.`product_id` = `products`.`id` WHERE `products`.`status` = '0'
//Itemswise Multiplication
SELECT (`usersproducts`.`amount` * `usersproducts`.`quantity`) as 'TotalSummarized', `usersproducts`.*, `products`.`title`, `products`.`status` FROM `products` INNER JOIN `usersproducts` ON `usersproducts`.`product_id` = `products`.`id` WHERE `products`.`status` = '0' 