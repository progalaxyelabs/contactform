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
