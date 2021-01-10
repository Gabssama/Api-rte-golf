# Api-test
An API returns a mail with pdf file attached for Php Symfony 5.2

## Description

An API make with Symphony 5.2 and the package wkhtml 0.12.

## Usage

After create database (you can use the sql file provided at the root). Create a new file .env.local at the root and paste this lines : 

    DATABASE_URL=mysql://db_user:db_pwd@127.0.0.1:3306/Rte-Golf-Api?serverVersion=5.7

    MAILER_DSN=smtp://42e4555fa0669c:92825f08d2e55f@smtp.mailtrap.io:2525?encryption=tls&auth_mode=login (this is for mailtrap.io)

    WKHTMLTOPDF_PATH=/usr/local/bin/wkhtmltopdf
    WKHTMLTOIMAGE_PATH=/usr/local/bin/wkhtmltoimag

Replace db_user and db_pwd by your ids. 

Please go to PostMan or the tool you want to make a HTTP POST request to the route /api/order with a object in parameter (I use parameters : Body, Raw and JSON in PostMan)

This object must contain an array of products id (integer), the name of customer (string) and the mail of customer (email or string).

Example : "{
    "productIds" : [8,4,5],
    "name" : "Dupont",
    "mail":"dupont@gmail.com"
}"

You'll receive a success message and a mail with pdf file attached of your products.
## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## Author
Gabssama
