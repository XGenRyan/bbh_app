# Introduction
Essentially, this is a single page application (SPA) which serves as a user-generated archive for Boxhead Bounty Hunter players. The players and their account statistics are displayed dynamically in a sortable table.

The project primarily utilized PHP and KnockoutJS. It more or less follows a model-view-controller (MVC) architecture and it was tested on a basic LAMP server (Linux Apache MySQL PHP).

This application was requested by MudkipLieker (AngryNinny), read more about it at: http://forums.xgenstudios.com/showthread.php?260197-Anybody-familiar-with-SQL

# Required
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

As of now, only kills, deaths and bounty points are logged. It's very simple to log additional statistics, but I got lazy so I'm going to leave that up to whomever - just by looking at my code and using a bit of intuition (copy/paste) I reckon it wouldn't take an absolute beginner longer than half an hour to accomplish.

Also, an additional php script is required. It will have to loop through all of the players in the database and update their statistics. This script will live in the root directory and it should be run at least once per day. To run the script automatically look into "cron jobs". It should not be that hard to make, but if people run into trouble I might consider making it myself and adding it to this repo. 

# Optional
The application is rather dull looking by default, so feel free to create stylesheets within the assets/css/ folder and link them to views/layout.php. If you aren't much of a designer, I recommend looking into [Bootstrap](http://getbootstrap.com) or [Foundation](http://foundation.zurb.com) for some basic styling.

# Note
Unless you know what you are doing, I recommend only editing things inside of the views and assets/css/ folders; only standard HTML and CSS reside there, so you don't have to worry about completely breaking the application.
