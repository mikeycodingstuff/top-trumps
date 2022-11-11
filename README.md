# Transformers Top Trumps App

### Description

A transformers top trumps app made using PHP and a relational SQL database styled with Bootstrap and CSS.

Vote on your favourite transformer and view their rankings on your leaderboard!

### Dependencies
``` 
- PHP version 7.4.32
- MySQL version 5.7.40
- Composer version 2.4.3
- PHPUnit version 9.5.25
- Bootstrap version 4.3.1
```
### Installing
Clone this repo:
```
git@github.com:mikeycodingstuff/top-trumps.git
```
Navigate into the newly created repo:
```
cd top-trumps
```
Import the database `characters.sql` into a db named `top_trumps`

Ensure your local database host, username and password details are correct in:
```
src/Utilities/Db.php
```
From the root of the project run:
```
Composer install
```
The application will now be available wherever you access it
### Author
- Mikey Ying - [@mikeycodingstuff](https://github.com/mikeycodingstuff)
