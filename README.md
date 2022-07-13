# discordTest

# 3.6. Summarized price of all active attached products

//Itemswise total
SELECT SUM(`usersproducts`.`amount` * `usersproducts`.`quantity`) as 'TotalSummarized', `products`.* FROM `products` INNER JOIN `usersproducts` ON `usersproducts`.`product_id` = `products`.`id` WHERE `products`.`status` = '0' GROUP BY product_id
//Itemswise SUM total
SELECT SUM(`usersproducts`.`amount` * `usersproducts`.`quantity`) as 'TotalSummarized', `products`.* FROM `products` INNER JOIN `usersproducts` ON `usersproducts`.`product_id` = `products`.`id` WHERE `products`.`status` = '0'
//Itemswise Multiplication
SELECT (`usersproducts`.`amount` * `usersproducts`.`quantity`) as 'TotalSummarized', `usersproducts`.*, `products`.`title`, `products`.`status` FROM `products` INNER JOIN `usersproducts` ON `usersproducts`.`product_id` = `products`.`id` WHERE `products`.`status` = '0' 


# 3.8. The exchange rates for USD and RON based on Euro using https://exchangeratesapi.io/ . 
1) Created account on https://exchangeratesapi.io/ and get access api_key.
2) Use "Exchange Rates Data API" => https://apilayer.com/marketplace/exchangerates_data-api?preview=true#documentation-tab
3) Place your access_api_key from your account to this [<access_api_key>] in Usersmanagement controller.