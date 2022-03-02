<h1> Requirements </h1>
Docker, WSL2 (if on Windows), Node version 14, PHP 8, Composer.
<h1> Setup </h1>
- Clone the repository. <a href="https://nova.laravel.com">Laravel Nova</a> will need to be installed. Sign in to the website with a valid license and download the latest version (3.31.0). Extract the directory to a temporary location and rename the folder to "nova". Then move the nova directory to the root of the habbo project. <br><br>
- Run composer install. This will generate the vendor folder. Install npm and compile the assets with "npm run dev" & "npm run prod". <br><br>
- Create a .env file at the root of your project and copy the contents of the .env-example file. Change any variables if needed. <br><br>
- Start-up the project with docker by using the command "sail up -d". You will need to generate an application key before any page can be loaded. Use the command "sail artisan key:generate". Compile Laravel Nova's assets by running the command "sail artisan nova:install". <br><br>
- Go to localhost in the browser to view the web pages. You can also go to "/nova" for any administration purposes.

<h2> Local database </h2>
If using a local database for the first time, you will need to run the migrations using the following command "sail artisan migrate". <br> 
A user can also be generated with the command "sail artisan nova:user". <br>
Keep the .env default values. <br>
<h2> Testing </h2>
Run tests by using the command "sail artisan test". <br>
Currently, some tests will display warnings. This is normal and shows up because of disabled features.
