# Yammer OAuth2 for PHP 

[![CI Build and Test](https://github.com/stephenyeargin/yammer-oauth2-php/actions/workflows/ci.yml/badge.svg)](https://github.com/stephenyeargin/yammer-oauth2-php/actions/workflows/ci.yml)

PHP wrapper for Yammer's API.

## Install

Install with Composer:

```bash
$ composer require stephenyeargin/yammer-oauth2-php
```

## Usage

Example configuration array passed to constructor:

```
$config['consumer_key'] = '1ABCdefhiJKLmnop';
$config['consumer_secret'] = 'ABCdefhi_JKLmnop';
$config['callbackUrl'] = 'http://' . $_SERVER['SERVER_NAME'] . '/yammer/callback/';

$yammer = new YammerPHP\YammerPHP($config);
```

Starting the callback process:

```php
// Redirect the user to the OAuth page for your application
header('Location: ' . $yammer->getAuthorizationUrl());
```

Upgrading the callback code to an authorization token:

```php
$code = $_GET['code'];
$token = $yammer->getAccessToken($code);
```

Using the token (either from a fresh process or saved in the database)

```php
$yammer->setOAuthToken($token);
```

Making a call with the `$yammer` instance:

```php
if (!$yammer->testAuth()) {
    // Handle this.
}

// Retrieve feed for authenticated user
try {
    $feed = $yammer->get('messages/my_feed.json');
    print_r($feed);
} catch (YammerPHPException $e) {
    print 'Error: ';
    print $e->getMessage();
}
```
