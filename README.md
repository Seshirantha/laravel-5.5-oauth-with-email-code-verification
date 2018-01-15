# laravel-5.5-oauth-with-email-code-verification

01. This is a laravel 5.5 restful api project. All laravel stuff are inside of backend folder. Frontend folder contains all frotend files. 
02. You can configure frontend to any technology if you want. Also, frontend folder has two main files, index.php and get_code.php.
03. index.php has ui for login and sigup modals.
04. The js(index_script.js) file that related to index.php is inside of \assets\js.
05. base.js file contains base url
06. get_code.php file contains ui for enter email verification code.
07. The js file(pages_script.js) realted to get_code.php is inside of \assets\js.


How to use
01. Navigate to oauth and run "composer update"
02. Create a new database and configure .env file
03. run "php artisan migrate"
04. run "php artisan passport:install"
