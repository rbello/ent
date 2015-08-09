
    ___________ __________________
    \_   _____/ \      \__    ___/
     |    __)_  /   |   \|    |   
     |        \/    |    \    |   
    /_______  /\____|__  /____|   
            \/         \/       

# Beta ENT

Run the following to setup:
```
chmod +x go.sh
./go.sh install
```

Copy the configuration file, and fill in your plateforme settings:
```
cp config/config.default.php config/config.<your host name>.php
```

Then you can populate data using:
```
./go.sh install-data
```

Finally, you can access system command line interface using:
```
./go.sh cli help
```

Using API
---------

There are several possibilities to access the API of the application.
First, the code executed on the server can use the API **direct access**:
```
$session = api('GestionSessions')->getSessionById(848037);
```

The **Command-Line Interface** allows you to run methods in text mode:
```
./go.sh cli session get-id 848037
```

Third-party applications based on the ENT data can do so thanks to the **REST interface**:
```
http://your_host/api/GestionSessions/getSessionById.json?id=848037
```

Finally, external applications based on a service-oriented approach can consume the services of the ENT via a **SOAP interface**.
```
http://your_host/api/GestionSessions.wsdl
```

Clone: https://github.com/rbello/ent.git
Demo: https://ent-rbello.c9.io/