# The Book Reviewer (Book Review Site)
This repository contains a book review site I designed and developed in my second year of college.
It uses HTML, CSS, PHP and an SQL database. All the book reviews and their relevant data (author, publisher, genre etc) are live text directly from the SQL database. The images are embedded from image links stored in the database.

To install this project you will need to:
1. Install a local Apache Web Server and a MySQL database server. <a href="https://www.apachefriends.org/index.html">XAMPP</a> is a good piece of software that installs both.   
2. Create a new database called 'book_reviewer' and import the <i>book_reviewer.sql</i> file located in this repository.
3. <b>NB:</b> Make sure the classes/Connection.php file has the correct information for your local web server and database.

I got an A grade for this module (Advanced Web Design and Development).

You can browse through all of my code above and see some screenshots of the project in action below:

<b>Overall Design</b><br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/the_book_reviewer/master/screenshots/sc1.png" alt="screenshot1" height="450">
<br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/the_book_reviewer/master/screenshots/sc2.png" alt="screenshot2" height="450">
<br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/the_book_reviewer/master/screenshots/review.png" alt="screenshot3" height="450"><br>

<b>Database Admin Tools</b><br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/the_book_reviewer/master/screenshots/add-book.png" alt="empty-form" height="450">
<br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/the_book_reviewer/master/screenshots/admin-book-details.png" alt="form-with-data" height="450">
<br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/the_book_reviewer/master/screenshots/admin-author-view.png" alt="database-injection" height="450">
<br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/the_book_reviewer/master/screenshots/edit-author.png" alt="updated-news-story" height="450"><br>

<b>Database Structure (Entity Relationship Diagram)</b><br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/the_book_reviewer/master/screenshots/erd.png" alt="empty-form" height="450">
<br>

<b>Sources</b><br>
All book reviews and images were taken from various sources on the internet. The links to the images used are in the database under cover_img, pub_logo and author_img.  
