Execute the following SQL commands to setup your database:

```sql
CREATE DATABASE app_name_here;
```

```sql
USE app_name_here;
```

```sql
CREATE TABLE players (id INT(99) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(32) NOT NULL UNIQUE, kills INT(255), deaths INT(255), bountyPoints INT(255));
```

In order for this application to work you must then edit the connection.php file (located in the root directory) with your appropriate database information.

The application is rather dull looking right now, so you can create stylesheets within the assets/css/ folder and link them to views/layout.php.

Unless you know what you are doing, I recommend only editing things inside of the views and assets/css/ folders.
