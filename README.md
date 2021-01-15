# <u>COM528_AE1</u>
repository for my submission for AE1



# <u>installation</u>

You will have to run the .sql in the parent directory, in your chosen handler. This will create and populate the parent tables.

the given database is a MySQL database. If you are using linux, mariaDB can be used to host the database itself. If on windows, any MySQL server will suffice.

The webpage itself is all written in PHP. I used apache to host it, although any web-server that can run php will work also.

The main set up involved is with directing the PDO to access the database, to ensure this works without needing to edit any code, leave the database in the parent directory, with all of the page files. Since the locations are relative, this won't cause issues.



# <u>report</u>



## <u>**Introduction**</u>



for this project, I decided upon making something to help myself and my friends, a compendium of sorts for everything related for Dungeons and Dragons 3.5 edition. To comply with the CRUD capability, I added users, characters, and all the necessary tables to accommodate saving a character’s set of abilities and their inventory. The database which everything is tied to is a MySQL database, which I mainly interacted with through phpmyadmin. The website uses PHP to interact with the website, and also allow the easy use of session variables, to make logins possible; and to improve usability. 
 With national lock down, tiered restrictions, and social distancing – playing a pen and paper RPG in person is out of the question. Whilst there are existing tools online to aid in playing such games remotely, they are often either overly expensive, poorly made, feature poor; or all of the above. To combat this, I decided to make a web-application that solves all the issues I have found with playing remotely. 
 To start with, any character in any tabletop RPG will have a lot of data related to it, spell books, feats, abilities, inventory and equipment are all things that are essential for a character to be used. The sets of information regarding each character, and how that could be stored, lead me to use SQL as my storage solution. My reasoning was that each individual item that could fit in a table related to a character usually has a handful of categories attached to it, within which it fits. This kind of relational information is what SQL excels with; as integrity in relationships between tables is a key feature. 


 









## 	<u>**System Overview**</u>


 The database I am using is taken from https://www.andargor.com/. The version I selected for my use is made with MySQL.  

To interact with this database, I used MariaDB and PHPMyAdmin.
 The website itself is built using PHP, and interacts with the database using PDO.

To elaborate, the database itself is hosted through mariaDB, and is interacted with through a PDO object, which manipulates the database through SQL queries, produced through scripts via the web pages.

Users are created via SQL queries, and the information regarding a logged in user is retained across the pages using session variables; as user ID and user name are key parameters in most of the queries.

​	
 	

The main functions boil down to two sections: user collections, and look up functionality. 
 What this means, is a user can search through the tables (I.e spells, feats, abilities) and also save them to their characters corresponding table. The user can then view these tables, and remove/modify the entries in their own tables. Users can only modify tables related to their own user ID and character IDs, and cannot add or edit the main tables.

## 	<u>**Key Design Decisions**</u>

The most important design decision I made, was choosing a solution for the database. I considered using a no-SQL solution; but ran into issues. The main issues I found In non-relational solutions, was the lack of integrity. Due to the quantity, and highly relational nature of the data, a solution that did not provide integrity and native support for joining those tables simply was not an option. Due to this, I decided upon SQL. This was a clear choice, as a character can require information to be pulled from 6 or more separate tables, and have that collated into one uniform result. This can be easily done using joins in SQL, as a unique ID can be given to each character, which can in turn be used as a foreign key for each corresponding table; meaning only one table is required per category, for every character created across all users. 
 Another reason I chose SQL over a no-SQL solution, is that due to the fact that a lot of characters could have the same entries, without SQL there would be an excess of duplicate entries, and redundant information. SQL reduces this issue, as the data required can just be linked to multiple times with joins, as opposed to being duplicated as required for each new entry.


 My reasons for using PHP were fairly simple. To implement SQL without it, could require multiple languages, and adding unnecessary weight and complexity to the project. In a single PHP file, I can write the web page and requisite queries without having to import any new libraries or third party functionality, as PHP has natively supported SQL for several major versions. 

 The user interface, or rather, the web page styling itself, is done using bootstrap. My reasoning for using bootstrap(https://getbootstrap.com/), is it gives a clean, presentable and consistent interface without too much time having to be spent on it. This allowed me to concentrate more on the functionality of the site, as opposed to it’s appearance. I also implemented bootgrid (http://www.jquery-bootgrid.com/documentation). I used bootgrid as it is an incredibly simple system for presenting tables clearly, which is paramount when the entire site is in effect a collection of different tables. Bootgrid is also designed to be compatible with bootstrap, which was important as I was already using bootstrap for the styling.

​	
 	





























## 	<u>**Database Design**</u>

There are two main categories of tables within the database.
 Those that the user can read from, and those that the user can manipulate.
 The former, contain all of the descriptions for every item, spell, ability and what have you; and can only joined to a user-related table, and never modified.
 The latter, consists of the characters, and users; including all of the relevant data.

The user table consists of two columns: id and user name. The id, is the primary key and is used in the character tables to determine which character belongs to which user; the user_name column is just to display a name and give the user the ability to log in, without remembering their id number.

 user_characters, consists of: name, class_id, domain_id, id, name and users_id. The id is the primary key, whilst each other column barring the name is a foreign key. Class_id and domain_id differ from the other character info. This is because a character will only possess one of each; so an additional table for each would be pointless, since it can just be included with the name and id. The users_id is a foreign key to the id in the users table, ensuring characters are related to the user that created them.

 All of the “character_[*category*]” tables consist of  the character_id, and the item/ability’s id. This is where each character’s information is stored.


 If you refer to figure 1 below, you will find the ERD for this database. Immediately, you will notice there are unused tables. In the case of “monsters”, this table is called to by the web application, but is not manipulated; as users or “characters” have no use for a character related table regarding monsters.

Users is the first table to be interacted with by a user. When a user is created, a row is added to the table, including a username, and then an auto incremented ID. This ID is used by User_characters.

This foreign key is used, in conjunction with it’s own primary key and a character name to populate User_characters, upon a user creating one. This foreign key is what allows a user to have multiple characters, even with the same name; as the ID is what differentiates them- not the name.

 The characters individual ID, is then what is used in each of the subsequent tables labelled “character_[collection]” where [collection] is the corresponding parent table. In these tables, The character ID, and item ID are used as foreign keys to the user_characters and parent tables respectively.  

The aforementioned parent tables, are at the far right end of figure 1. These are the un-modifiable tables, that a user can only read from; not edit. This ensures integrity within the database, as users can only modify their own entries, related to their user ID and corresponding character ID(s).

 I have added the PDF ERD break down in the git repository.

https://github.com/4dunsj71/COM528_AE1/blob/main/dnd35.pdf 
 	











## 	<u>**Security and Scalability**</u>

​	As is probably evident, I focused primarily on integrity, and less on security and scalability. This is mainly due to the use case of the application; as it is never really intended to be used outside of a personal scenario. However, If it were to be used in a more commercial setting, A few additions and modifications would have to be made.
 First and foremost, the addition of a password for each user, and email verification at least would be paramount, since as it stands currently, anyone can access anything; provided they know the username.

​	Secondly, there is very little In the way of active efforts to minimise SQL injection attacks; this is partly because PDO (the data access object used) has functions In place by default to defend against this, and because again, the use case does not strictly require it. That being said, I did minimise this by binding parameters to only be inputted as strings- meaning any injection should be inert; although I did not test this.

​	The scalability of this application is dubious at best. Within reason, the parent tables and un-modifiable databases should not need updating, unless further content was released and needed to be added. If that were the case, the structure of the database would allow this with relative ease, as with everything indexed and possessing corresponding ID’s, new information would just have to be inserted according to that format.
 The web page itself however, is poorly optimised and would indefinitely cause issues under higher loads. When each page is accessed, the SQL query is ran to produce the information. Without the use of caching or pre-loading information, this is a very timely process and no doubt taxing on resources. 
 The issue with users and passwords is once again a prevalent issue in scalability. With users currently existing In a readily accessible table, it leaves them vulnerable to attack; something which would be more likely if scaled up.

 	







## 	<u>**Conclusion**</u>

​	To summarise, the project does function as intended, although the initial scope was far wider than that of the end result; illustrated by the numerous underutilised tables present in the ERD. The user can read, write, and wholly manipulate the database; save for updating and modifying existing rows. If given the opportunity to do it again, I would no doubt use a more lightweight storage solution – like Sqlite3 – as the load times are sub par under the load of a single user, and this will only be compounded with more traffic. 
 Overall, the application met most of it’s requirements, but is lacking in regards to security and scalability. It’s biggest downfall being the inability to add a password to an account, and the lack of adding bespoke entries to a character’s table; as opposed to being limited to only the data provided.



















## <u>**Figures**</u>



**fig.1:  ERD without keys**

![img](file:///tmp/lu40281ycqglp.tmp/lu40281ycqgml_tmp_32d110d045d0ec8a.png) 

