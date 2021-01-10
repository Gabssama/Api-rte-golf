# Api-test
An API returns a mail with pdf file attached for Php Symfony 5.2

## Description

An API make with Symphony 5.2 and the package wkhtml 0.12.

## Usage

After create database (you can use the sql file provided at the root) and configure your mail service in .env.local file (I used Mailtrap.io).

Please go to PostMan or the tool you want to make a HTTP POST request to the route /api/order with a object in parameter (I use parameters : Body, Raw and JSON in PostMan)

This object must contain an array of products id (integer), the name of customer (string) and the mail of customer (email or string).

Example : "{
    "productIds" : [8,4,5],
    "name" : "Dupont",
    "mail":"dupont@gmail.com"
}"

You'll receive a success message and a mail with pdf file attaches of your products.
## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## Author
Gabssama
