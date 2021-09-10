# CONTACTFORM

## Built using [CodeIgniter 4 Framework](http://codeigniter.com)

The system folder is removed from the project for reusing it across multiple projects.
See CodeIgniter's guide on [Managing Apps](http://codeigniter.com/user_guide/general/managing_apps.html#running-multiple-applications-with-one-codeigniter-installation)


## A note on `index.php` ( from codeigniter readme )
>*`index.php` is no longer in the root of the project! It has been moved inside the `public` folder,
for better security and separation of components.*
>
>*This means that you should configure your web server to "point" to your project's `public` folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.*

## Repository Management

We use Github issues to track **BUGS** and **ENHANCEMENTS**.

## Contributing

We welcome contributions from the community.


## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)


## Setup
1. Clone the project into `/var/www/html/contactform`. 

2. Create a virtual host config for apache server with following config. Restart apache server after enabling this vhost.

        <VirtualHost *:80>
            ServerName contactform.local
            DocumentRoot /var/www/html/contactform/public

            <Directory /var/www/html/contactform/public>
                AllowOverride All
                Require all granted
            </Directory>	
        </VirtualHost>

3. Add an entry in `/etc/hosts` file for routing the url locally

        127.0.0.1    contactform.local

4. Create a database with name `contactform`. 

5. Create a .env file in the project root with following contents. Update the username, password, recaptcha-secret-key as necessary.

        CI_ENVIRONMENT = production

        app.baseURL = 'http://contactform.local'

        database.default.hostname = 'localhost'
        database.default.database = 'contactform'
        database.default.username = 'contactformdbusername'
        database.default.password = 'contactformdbuserpassword'

        SECRET_KEY = 'google-recaptcha-v3-secret-key'

6. Submit `POST` request to `http://contactform.local` from client app with name, email, message, recaptcha fields.