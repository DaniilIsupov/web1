SERVER API
============
Working with users table

###### Users have this fields:
  ````
    +id
    +first_name
    +second_name
    +age
    +date_of_birth
  ````
  #### You can update, create, delete and retrieve all records from the user table.

API contains methods:
  -----------------------------------

  ### <li>Method GET /api.php
  Returns table of users in JSON.
  
  ##### For Example:
  
  ````
    main GET /api.php?action=get
  ````
  ##### Request have this fields
  ````
    +action (action for the server)
  ````
  ##### Returns:
  ````
    Data array containing all records from the table users
  ````

### <li>Method POST /api.php
Contains methods to create, update and delete records in table of users.

#### 1. create
  Creating new record in table of users.

  ````
  main POST /api.php
  ````
  ###### Request have this fields
  ````
    +action (action for the server)
    +first_name (First name of user)
    +second_name (Second name of user)
    +age (age of the user)
    +date_of_birth (Date of birth user)
  ````
  ##### For example:
  ````
  main POST /api.php
  {
    action:"create",
    first_name:"Maks"
    second_name:"Elsukov"
    age:"21"
    date_of_birth:"1996-02-21"
  }
  ````
  ##### Returns:
  ````
    The data array containing the operation status and the created record
  ````

#### 2.update
  Updating the selected entry from the user table

  ````
  main POST /api.php
  ````
  ###### Request have this fields
  ````
    +action (action for the server)
    +id (unique user indentifier)
    +first_name (First name of user)
    +second_name (Second name of user)
    +age (age of the user)
    +date_of_birth (Date of birth user)
  ````
  ##### For example:
  ````
  main POST /api.php
  {
    action:"update",
    id:"1"
    first_name:"Kiril"
    second_name:"Zubarev"
    age:"24"
    date_of_birth:"1993-10-13"
  }
  ````
##### Returns:
  ````
    The data array containing the operation status 
  ````

#### 3.delete
  Delete the selected record from the user table

  ````
    main POST /api.php
  ````
  ###### Request have this fields
  ````
    +action (action for the server)
    +id (unique user indentifier)
  ````
   ##### For example:
  ````
    main POST /api.php
    {
      action:"delete",
      id:"1""
    }
  ````
##### Returns:
  ````
    The data array containing the operation status 
  ````
  
  
