# BlogMVC / ICanBoogie 4.0 version

Greetings! This is a [ICanBoogie](https://icanboogie.org)-based [BlogMVC](https://github.com/Grafikart/BlogMVC) realization.





## Installation

1. Install vendors with `composer install` (or `make`).
2. Import the SQL dump of the project ([dump.sql](https://github.com/Grafikart/BlogMVC/blob/master/Kohana/dump.sql)) in a new database.
3. Configure your database connection with the file [app/all/config/activerecord.php](app/all/config/activerecord.php).
4. The `repository` directory must be writable by PHP. `chmod 0777 repository -R` is not ideal
but should do the trick.
5. Enjoy!





## Running

You can configure a vhost to test the application, or simply run PHP internal server:

```
$ cd /path/to/BlogMVC/ICanBoogie
$ make server
```





## Faster!

ICanBoogie is pretty fast, and believe it or not, it can be faster. Open
[app/all/config/app.php](app/all/config/app.php) and activate caches:

```php
<?php

namespace ICanBoogie;

return [

	AppConfig::CACHE_CONFIGS => true,
	AppConfig::CACHE_MODULES => true,
	AppConfig::CACHE_CATALOGS => true

];
```

On a MacBook Pro (Retina, 13-inch, Early 2015), the overhead (or boot time) of ICanBoogie is less
than 2 ms and the home page is rendered in around 14 ms with PHP 7.
