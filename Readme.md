# Project_1 of Sophomore's Level 2, Phase 4  

To see the XAMPP version of this app, go back to commit 374b2c25af6483fb38aeee12dffa5b5c9293e2f8.
To see the CS50 appliance version of this app (that runs when pasted in the
cs50 appliance's vhosts/localhost/public/ folder) go to commit e433bcef3ce4ef9d201db656ec66c33333535371.

The current version of the app is optimized for the online CS50 IDE.

It consists of three folders (I've highlighted the more important files only):

* includes:
    - config.php -> Sets up mysqli
    - helpers.php -> Has helper functions

* public:
    - index.php -> Simply renders the home page
    - scrape.php -> The actual nitty-gritty of the scraping process, 
      works by downloading just one page of a city at a time and then
      utilizing AJAX to call itself if there are more pages to be scraped
    - js/scripts.js -> Opens scrape.php once per page, and handles other
      Javascript actions such as loading and building the output table

* views:
    - header.php -> Header file, has all the formalities of an HTML document
    - landing.php -> The home (and only) page
    - footer.php -> Simply terminates the above HTML

All that is required to be done to run this app right now is:

1. Stop the apache server if already running by typing "apache50 stop" (without quotes)
   in a CS50 IDE terminal.
2. Type "apache50 start ~/Project_1/public" (without quotes).
3. Type "mysql50 start".
4. I've already set up the phpmyadmin requirements, but if someone wanted to do 
   the work themselves, they could do so by going to https://ide50-nickfury95.cs50.io/phpmyadmin/
   and signing in with the username and password "nickfury95" and "v1kCjsvLYytrBTGV" respectively, and adding a user
   with credentials "jharvard" and "crimson" for localhost respectively. The SQL required before the
   app is fully functional is given in the file "sql_required.sql". Run that in phpmyadmin and you're
   good to go.
5. Go to https://ide50-nickfury95.cs50.io/ to run the app.
