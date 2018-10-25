# This [site](http://ec2-13-211-239-163.ap-southeast-2.compute.amazonaws.com/g_hack/) is currently set up in AWS server.

The programming language for this project is PHP, and we used PHP framework CodeIgniter(version: 3.1.9) which allows us to use MVC design pattern. 

## To deploy this repository in AWS, follow below steps:

1. Create AWS EC2 instance and RDS database according to the [user guide](https://docs.aws.amazon.com/zh_cn/AmazonRDS/latest/UserGuide/TUT_WebAppWithRDS.html) provided by Amazon. 
2. Note that instead of MySQL, PostgreSQL is adopted for this project. So please choose PostgreSQL when creating RDS.
3. [pgAdmin](https://www.pgadmin.org/) can be used to visualise PostgreSQL database. (Optional) 
4. Download the CodeIgniter 3.1.9, and deploy all files into path /var/www/html
5. Specify database related information in application/config/database.php, details could be found [here](https://www.codeigniter.com/user_guide/database/configuration.html). Note that database driver should be PDO.
6. Execute sql scripts under directory **database_script** in PostgreSQL, which creates database schemas.
7. There are two **.htaccess** files, just place them in the same directory. Otherwise, it may cause file permission errors.
8. For those files in this repo that existing in CodeIgniter, just overwrite them.


