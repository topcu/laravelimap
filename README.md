# Laravel Wrapper for [Php-Imap](https://github.com/barbushin/php-imap)

### Installation by Composer

	$ composer require php-imap/php-imap

### Configuration

If you'd like to use a single connection, add imap into `config/services.php` and define your credentials in `.env` file
```
    'imap' => [
        "imap_path" => env("IMAP_SERVER_PATH"), // "{imap.gmail.com:993/imap/ssl}INBOX", 
        "login"     => env("IMAP_SERVER_LOGIN"), // "mail@example.com", 
        "password"  => env("IMAP_SERVER_PASSWORD")
    ]
```

Otherwise, you can call `Imap::connection()` anytime with config parameters as:
```
    Imap::connection([
         "imap_path" => "{imap.gmail.com:993/imap/ssl}INBOX", 
         "login"     => "mail@example.com", 
         "password"  => "somepassword",
     ]);
```


### Usage examples
#### Using service configuration
```
    $mail_ids = Imap::searchMailbox("UNSEEN");
    $mail = Imap::getMail($mail_ids[0]);
```

### Using dynamic connection
```
    $mail_ids = Imap::connection($imap_config)->searchMailbox("UNSEEN");
    $mail = Imap::getMail($mail_ids[0]);
```





