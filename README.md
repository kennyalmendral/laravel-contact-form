# Laravel Contact Form

Just another contact form for Laravel.

## Env file configuration

```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=johndoe@gmail.com
MAIL_PASSWORD=123456789abc
MAIL_ENCRYPTION=tls
```

Don't forget to change the value of `MAIL_USERNAME` to your gmail account and `MAIL_PASSWORD` to your gmail account password.

Afterwards, go to your gmail account and turn on the [Less secure app access](https://myaccount.google.com/lesssecureapps).

## Migration

Run `php artisan migrate --path=/vendor/kennyalmendral/contactform/src/database/migrations/2019_07_13_141531_create_contacts_table.php` to migrate the `contacts` table.

## Contact page

To access the contact page, add `/contact` to the URL, i.e, `https://sample.com/contact`
