# 5000

Online version of the dice game _5000_ in which the goal is to gain 5000 points. Game rules can be read [here](https://fr.wikipedia.org/wiki/5000) [FR]

## Prerequisites
Just a functionnal webserver with PHP and MySQL properly configured.

## Installing
In your server configuration, create a virtualhost _the5000.com_ pointing to the project's main directory, may it be _www_ or _www/my/sub/directories_

Add the following line to your hosts file (/etc/hosts on Linux/Mac, C:\Windows\System32\drivers\etc\hosts on Windows) 
`127.0.0.1 the5000.com`

Add a config.ini file in _src/conf/_ with the following content completed with your configuration
```
driver=mysql
host=localhost
database=db_name
username=db_user
password=db_password
charset=utf8
collation=utf8_general_ci
prefix=
```

## Run
In your browser, access to _the5000.com_. If it works, run the server by opening a new tab _the5000.com/bin/game-server.php_. It won't stop loading as the game server is listening to new connections.

Back to the main tab, you can click "Connexion au serveur", leaving the host input blank. A green message should tell you the connection was done successfully and the commands input is now available.

To send commands, type anything then _Enter_. Acknowledgement is done through the JS console.

### Stopping the server
Even if the tab is closed, the server still runs. You can stop the server by sending the command "stop" and each client will see its connection closed.
