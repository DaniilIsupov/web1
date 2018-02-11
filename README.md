SERVER API
============
Working with users table
### <li>Method GET /api.php?act=read
  Returns table of users in JSON.
````
  index GET /api.php?act=read
````  
 ###### Users have this fields
  ````
  +id
  +first_name
  +second_name
  +age
  +date_of_birth
  ````
### <li>Method POST /api.php
  Contains methods to add, change and delete rows in table of users
  #### 1. add
  Add new user in table of users
  ````
 POST /api.php, act=create
  ````
  ###### Request have this fields
  ````
  +first_name
  +second_name
  +age
  +date_of_birth
  ````
  #### 2.update
  Update row in table of users
  ````
  POST /api.php, act=update
  ````
  ###### Request have this fields
  ````
  +id
  +first_name
  +second_name
  +age
  +date_of_birth
  ````
  #### 3.delete
  Delete row in table of users
  ````
  POST /api.php, act=delete
  ````
  ###### Request have this fields
  ````
   +id
  ````
