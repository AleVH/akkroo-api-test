# Akkroo Test - API
The test hast 2 main components. One is the API and the other one is an environment (just in case for whatever reason it doesn't work locally because of missing modules, incompatible versions or any other). 
If it was necessary, the image can be downloaded with the following command:
```docker pull alevh/akkroo-test```
The project is separated in 3 folders, 'public', 'src' and 'vendor' with a '.env' file to do some settings.
The public folder contains the index file which is in charge of doing some checks on the incoming calls to then (if everything is ok) pass it to the router controller to carry on with the rest.
the client file is just that, a mimic of a client making some calls to the api (there are some instructions/comments in the file to explain how it works or how to use it).
The src folder contain the rest of the API files. Right now there's only 1 entity (Lead) but more can be added by adding the new entity and the other components (interface if necessary and gateways).

## Using the docker image
If the docker image is required for a faster and easier testing, once the image has been dowloaded, run the command:
```docker run --rm -p 8080:80 -e LOG_STDOUT=true -e LOG_STDERR=true -e LOG_LEVEL=debug -v <full path to where the api is located, the base folder NOT the public>:/var/www/html akkroo-test```
If it is going to be tested locally without any virtual environment, the remember the root directory has to follow the same principle as the docker image (where the index.php file is located, NOT the public folder)*.

## Testing the API
To use/test the api it can be done with Postman or using the test case prepared for that end.
 
### Command line
To test with the command line, go to the folder called "Test-case" and execute the client file from the command line with:
```php client.php```
however, this will require to comment and uncomment some lines in that file, otherwise, you might try to get all the leads before getting the access token. The lines to uncomment are marked as "STEP 1", "STEP 2" and so on and there are instructions on each line

### Postman
To use postman, the flow is the same, but i'll explain all the steps. First just like with the command line, 'seeds' needs to be planted so we have some sample data to work with. In order to do so, make a GET call to:
```http://127.0.0.1:8080/public/seeds```
and hit "Send".
Then the access token is needed. Make a POST call to
```http://127.0.0.1:8080/public/token```
In the authorization tab (right below where you enter the url) select 'Basic Auth' and complete the username and password with one of the following:
|user|password|
|--|--|
|AleVH | SuperSecret!
|Akkroo|giveMeTheJob!
|Random1|123#
|Random2|anotherPw

This call should return the access token that you will need in all the other calls. The token lasts for 30 minutes but that can be changed in the Token Controller.

### Get Leads
To get all the leads you just need to make a GET call to:
```http://127.0.0.1:8080/public/leads```
In the authorization tab, select the type "Bearer Token" and paste the 'access_token' you received in the previous call and then just hit "Send". You should get back something like this:
```
[
		{
			"lead_index":  0,
			"first_name":  "Odessa",
			"last_name":  "Potter",
			"email":  "at.auctor.ullamcorper@ultrices.ca",
			"accept_terms":  true,
			"company":  "Elit Pretium Ltd",
			"post_code":  "3579",
			"date_created":  {
				"date":  "2019-09-17 20:49:30.000000",
				"timezone_type":  3,
				"timezone":  "UTC"
			}
		},
		{
			"lead_index":  1,
			"first_name":  "Cameron",
			"last_name":  "Barr",
			"email":  "ac@egetmetuseu.co.uk",
			"accept_terms":  true,
			"company":  "Varius Orci In Inc.",
			"post_code":  "A9G 9G8",
			"date_created":  {
				"date":  "2019-09-17 20:49:30.000000",
				"timezone_type":  3,
				"timezone":  "UTC"
			}
		},
		...
]
```
In order to get a specific lead, you need to know the 'lead_index'. This can be done by getting all of them and then looking one by one, or if it is a lead added recently, the response you will get after adding it is the lead index number.  With this number make a GET call to:
```http://127.0.0.1:8080/public/leads/<lead_index>```
and you will get back that specific lead.
 ### Save a Lead
 In order to save a lead you have to make a POST call to:
 ```http://127.0.0.1:8080/public/leads```
 Again, below the url, in the authorization tab select "Bearer Token" and paste the one you got earlier (unless it has expired, in which case you will have to get a new one). Then select the Body tab, select the "raw" option and on the same line and the right end there is a dropdown that should have "Text" selected by default, change it to "JSON (application/json)". Not all the fields are compulsory (you can check this in the Lead entity class), but the ones in this example are all the ones that can be in the call, 'date_created' for example is generated on the fly by the api and so some others. So paste the information in the body of the call with this format:
 ```
{
	"first_name":"Ale",
	"last_name":"VH",
	"email":"alevh@gmail.com",
	"accept_terms":true,
	"company":"Emporio VH",
	"post_code":"SE19 2AJ"
}
```
and hit "Send". You should get back and answer from the api like this:
```
{
	"lead_id":  100
}
```


#### Notes
(*) I was not able to change the document root in the docker container, for some reason the editor didn't let me do it, that's why the base url includes 'public'. I'll keep trying to find a way.