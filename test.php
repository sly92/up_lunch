<script type="text/javascript">
import OAuth2Session from "requests_oauthlib" ;
import facebook_compliance_fix from "requests_oauthlib.compliance_fixes" ;
</script>
<?php include("header.html"); ?>

<script type="text/javascript">



// # Credentials you get from registering a new application
var client_id = '<the id you get from facebook>';
var client_secret = '<the secret you get from facebook>';

// # OAuth endpoints given in the Facebook API documentation
var authorization_base_url = 'https://www.facebook.com/dialog/oauth';
var token_url = 'https://graph.facebook.com/oauth/access_token';
var redirect_uri = 'https://localhost/';    


var facebook = OAuth2Session(client_id, redirect_uri=redirect_uri);
var facebook = facebook_compliance_fix(facebook);

 // # Redirect user to Facebook for authorization
 var  authorization_url, state = facebook.authorization_url(authorization_base_url);
 console.log('Please go here and authorize,', authorization_url);

 // # Get the authorization verifier code from the callback url
 var redirect_response = raw_input('Paste the full redirect URL here:');

 // # Fetch the access token
 facebook.fetch_token(token_url, client_secret=client_secret,authorization_response=redirect_response);

 // # Fetch a protected resource, i.e. user profile
 r = facebook.get('https://graph.facebook.com/me?');
 console.log(r.content);

</script>