<!DOCTYPE html>
<html lang="en">
<head>
    <title>title</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <script src="//code.angularjs.org/1.2.16/angular-cookies.min.js"></script>
    <script src="//cdn.auth0.com/js/lock-7.5.min.js"></script>
    <script src="//cdn.rawgit.com/auth0/angular-storage/master/dist/angular-storage.js"></script>
    <script src="//cdn.rawgit.com/auth0/angular-jwt/master/dist/angular-jwt.js"></script>
    <script src="//cdn.auth0.com/w2/auth0-angular-4.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body>
<script type="text/javascript">
  
  var lock = new Auth0Lock('Hs7HmVIHg8JnxpdLsLDQ3ZIRy5TPZAO0', 'ent.eu.auth0.com', {
    assetsUrl: 'https://cdn.eu.auth0.com/'
  });

  function signin() {
    lock.show({
        callbackURL: ''
      , responseType: 'code'
      , authParams: {
        scope: 'openid profile'
      }
    });
  }
</script>
<button onclick="signin()">Login</button>
</body>
</html>