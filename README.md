
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

Clone: https://github.com/rbello/ent.git
Demo: https://ent-rbello.c9.io/