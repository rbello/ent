app.config(function (authProvider) {
    authProvider.init({
        domain:   'ent.eu.auth0.com',
        clientID: 'BAZxb4JU6TN99UZ1bcJVepvmlMiCIxvR'
    });
})
.run(function(auth) {
    // This hooks al auth events to check everything as soon as the app starts
    auth.hookEvents();
});