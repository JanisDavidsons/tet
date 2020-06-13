
# RSS data feed.

This project is a webpage, which reads XML data from an external source and compares records with the database.
If new data is found, it gets stored in a database. 

There three options to fetch RSS feed :
    
    1. In webpage, press "Get data" button
    2. From terminal (whithin project folder) type "PHP artisan currencies:fetch"
    3. Using cronjob automated data fetch.
    
 Please follow instructions below to run it on your local environment.
    

    Open terminal within a folder, were you want to download this project.
    Enter command "git clone https://github.com/JanisDavidsons/tet.git ."

   ![git demo](sampleImg/git.gif)

    Install Composer Dependencies.
    "composer install"

   ![git demo](sampleImg/1.gif)

    Install NPM Dependencies.
    "npm install"
    
   ![git demo](sampleImg/2.gif)

    Create a copy of your .env file.
    "cp .env.example .env"
    
   ![git demo](sampleImg/3.gif)

    Generate an app encryption key.
    "php artisan key:generate"
    
   ![git demo](sampleImg/4.gif)

    Create new file in databse folder with command "touch database.sqlite"
    You can use any database, but in this example I`m using sqlite.
    
   ![Image](sampleImg/5.gif)

     In the .env file, add database information to allow Laravel to connect to the database.  
     Leave only this part in database section "DB_CONNECTION=sqlite"  

   ![git demo](sampleImg/.env.png)
   ![Image](sampleImg/6.gif)

    Migrate the database
   ![git demo](sampleImg/7.gif)
   
     To set up cronjob automated data fetch, locate crontab file like so: 
   ![git demo](sampleImg/crontabSearch.gif)
   
     Add this line of code at the end of file: 
   ![git demo](sampleImg/cronJobPath.png)
   
    Run local server with command "php artisan serve"
    Open adress displayed in terminal!
   ![git demo](sampleImg/8.gif)
       
          
Sample of the project:

   ![git demo](sampleImg/sample.gif)
