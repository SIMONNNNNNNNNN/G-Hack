# G-Hack
Web project built for GovHack in course DECO7381 by team G-Hack


## This [site](http://ec2-13-211-239-163.ap-southeast-2.compute.amazonaws.com/g_hack/) is currently set up in AWS server.

The programming language for this project is PHP, and we used PHP framework CodeIgniter (version: 3.1.9) which allows us to use MVC design pattern. 

## To deploy this repository in AWS, follow below steps:

1. Create AWS EC2 instance and RDS database according to the [user guide](https://docs.aws.amazon.com/zh_cn/AmazonRDS/latest/UserGuide/TUT_WebAppWithRDS.html) provided by Amazon. 
2. Note that instead of MySQL, PostgreSQL is adopted for this project. So please choose PostgreSQL when creating RDS.
3. [pgAdmin](https://www.pgadmin.org/) can be used to visualise PostgreSQL database. (Optional) 
4. Download the CodeIgniter 3.1.9, and deploy all files into path /var/www/html
5. Specify database related information in application/config/database.php, details could be found [here](https://www.codeigniter.com/user_guide/database/configuration.html). Note that database driver should be PDO.
6. Execute sql scripts under directory **database_script** in PostgreSQL, which creates database schemas.
7. There are two **.htaccess** files, just place them in the same directory. Otherwise, it may cause file permission errors.
<<<<<<< HEAD
8. For those files in this repo that exist in CodeIgniter, just overwrite them.
9. Composer was used to install third party libraries (contents of application/vendor folder). Third party libraries are: 
- Google/API Client for Google sign-in and registration. 
- Cebe/Markdown for parsing competitors' project information that was styled using Markdown. 
To install and update the libraries, Composer should be installed either globally on the server or locally in the Application folder. Composer installation instructions can be found at [Composer]()
For simplicity, just run the following commands (for global installation) in the command line interface on the server:
`sudo curl -sS https://getcomposer.org/installer | sudo php`
`sudo mv composer.phar /usr/local/bin/composer`
`sudo ln -s /usr/local/bin/composer /usr/bin/composer` 
To then install the third party libraries run the following command when inside the application folder where composer.json file is present:
`composer install`

## Competitor's Guide

## Organiser's Guide 
>>>>>>> 7fa602d5eae81b8163a6c6c9a49e7badc8bb248c

## Database

### The database schema specifies the relationships among primary components for GovHack, including account, team, event, competition, challenge, project and dataset. A typical scenario to traverse the relationship network in the database is shown as follows:
1. Given an account, it is available to find the team this account has joined and the projects the team have submitted.
2. Given the project, it is allowed to get the challenges the project aims for.
3.  Given the challenge, it is possible to reach the dataset provided by the challenge.
4.  Given an event, it is accessible to fetch the accounts which have enrolled in this event.

Tables:
1. account: Stores basic information of user accounts, including email, password, full name, privilege, personal preference, team, etc..
2. challenge: Stores basic information of challenges, such as challenge name, region, description, image URL, video URL, dataset URL, etc..
3. challenge_judge: Shows the judges of each challenge.
4. challenge_sponsor: Shows the sponsors of each challenge.
5. criteria: Records the name and description of criteria.
6. dataset: Contains main attributes of datasets, including dataset name, dataset URL, description, etc..
7. event_support: Shows the support stuff for each event.
8. event_location: Stores basic information of event locations, including name, address, email address, capacity, region, etc..
9. state_event: Stores basic information of the state events, including event location, event type, event date, etc.. 
10. national_event: Stores basic information of the national events. Except for exclusive attribute flight option, it has the same attributes as state event.
11. state_event_register: Indicates which accounts have registered given state event.
12. national_event_register: Indicates which accounts have registered given national event.
13. project: Contains the title, thumbnail image, description, user story and URLs of projects.
14. project_challenge: Shows the challenge each project aims for.
15. project_dataset: Shows the datasets used in each project.
16. region: Contains the primary information of regions, including name, parent region, time zone, etc..
17. region_support: Shows support stuff for each region.
18. sponsor: Contains the basic information of sponsors.
19. sponsor_contact: Shows contacts for each sponsor.
20. team: Stores basic information of teams, including team name and captain.
21. update_project: Log used for updating project.
22. volunteering_account: Indicates which accounts apply for given volunteering position and stores  application information. 
23. volunteering_account: Stores the roles required for volunteering, the region of volunteering positions and the number of volunteers needed.




## Front-end & Back-end.

### Application/controllers
The files in the controllers folder determine how HTTP requests should be handled. The requests call functions in each PHP file, and they will implement tasks in the back-end according to the requests such as loading pages of front-end and handling AJAX requests.
1. Account.php: handles the login, logout, register, and reset password requests, and loads the each front-end page
2. Challenges.php: handles requests of the challenges page such as displaying challenge detail page and challenge registration
3. Dashborad.php: handles requests of the user dashboard
4. Datasets.php: handles loading the datasets page
5. Events.php: handles loading the events page, its detail pages and event registration functions
6. Privilege.php: handles loading privilege pages for admin users and updating privilege request
7. Projects.php: handles loading the projects page and project creation
8. Volunteering.php: handles loading volunteering positions and volunteering applications respectively for admin users and casual users, and updating
9. Welcome.php: loads the homepage



### Application/models
This folder contains the PHP classes which function may useful for the controllers. Models are optionally available for those who want to keep Model-View-Controller (MVC) approach.

1. Account_model.php: is related to account includes functions for registration, login, sending email, updating profile and etc.
2. Challenge_model.php: is used for interacting with database for challenges controller
3. Dashboard_model.php: is connected to the dashboard controller
4. Dataset_model.php: is linked to the datasets controller
5. Event_model.php: is related to the events controller which contains functions retrieve information from the database
6. Event_update_model: handles event updating requests to database.
7. Privilege_model: is used for handling operations regarding to accounts’ privilege 
8. Project_model.php: is connected to create, read, update and delete (CRUD) functions with respect to projects
9. Region_model.php: returns region information for filtering functions.
10. Team_model.php: contians functions for database CRUD operations related to teams
11. Volunteering_model.php: handles database requests regarding to volunteering system

### Application/config
The config folder includes default configuration across the Hackerspace website. In CodeIgniter, default values
have been set up in this folder, and there are only four files need to be changed for our website as follows:
1. routes.php: This file lets us re-map URI requests to specific controller functions. Also, we can simply pass a specific request value as a parameter to a controller function in this file.
2. config.php: There are quite a few default values declared here, including base URL of website which can be called directly in each PHP file of the website, index page, URI protocol, URL suffix, to name but a few.
3. autoload.php: specifies that systems should be loaded by default, including libraries, models, languages. They are load here once and being used throughout the website.
4. database.php: contains the setting needed to access the database, including our DSN, hostname, username, password, database driver and etc.

### Application/vendor
This folder contains third-party libraries needed to implement Google sign-in. It is installed using a program named Composer. Google sign-in allows users to register and log into the site using their existing Google account.

### Application/views
The files in the views folder are loaded by controller and sent to client side to be interpreted by browser. In addition, there are several sub-folders such as account, challenges, dashboard, datasets, events, projects, templates. Each of them contains pages that represent the corresponding meaning. In particular, the template
folder which is one of sub-folders covers the PHP code that will appear across all of the pages of the website (or main content pages), such as the navigation bar and the footer. The structure of the code in these files will not change across the site, and the will be added onto each page using the controller functions for each page. The rest of the directories contain the code to be rendered on the website such as the event and project pages.

### JavaScript
There are two javaScript files for building dynamic front-end pages, and details for each file are as below:
1. challenge.js: is used to handle search functions in challenge page
2. event.js: contains the filter function in the events page
3. dataset.js: contains the search function in the datasets page
4. moment.js: provide functions related to time picker.
5. privilege.js: contains responsive functions to update privilege in Ajax and without updating the page
6. volunteer.js: includes Ajax functions that handle volunteering system requests without refreshing the page.

### CSS
The CSS folder contains a single CSS file for the styling. This file has been created on a production build to ensure that its file size is as small as possible for fast loading. The CSS has been created as per its component pages, by adding class declarations to ensure that the CSS only applies to the main bodies that contain said classes.
