# WP Nonce 


## Usage

Setup the minimum required thigs:

```php
<?php 
// Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/autoload.php';

// use class
use Nonce\WP_Nonce;


// Instantiate the class
$nonce = new WP_Nonce();
```
### Options and Global Settup

Basic global setup for all object is `nonce_name` and `nonce_action`. You can define it once and don't use in other rendering for this session.
```php
$nonce->option([
    'nonce_name' 	=> '_wpnonce',
    'nonce_action' 	=> 'edit-post_'.$post->ID,
]);
```

Also you have session time expire if you need it:

```php
$nonce->option( 'nonce_life',(4 * HOUR_IN_SECONDS) );
```
Like you see, you can pass `array` of settings or use single setup like above.
### Examples

Adding a nonce to a URL:

```php
$url="/../wp-admin/post.php?post=48";
$complete_url = $nonce->url( $url );
```

Adding a nonce to a form:

```php
$nonce->field();
```

creating a nonce:

```php
$newnonce = $nonce->create();
```
NOTE: `$nonce->create();` passing values inside other objects and you don't need to use string to pass values but optional function return value.

Verifying a nonce:

```php
$nonce->wp_verify();
```

Verifying a nonce passed in an AJAX request:

```php
$nonce->ajax_verify( 'post-comment' );
```

Verifying a nonce passed in admin area:

```php
$nonce->admin_verify( $_REQUEST['my_nonce'] );
```

Destructing and finish

When you finish, just close this session and destruct all setups
```php
$nonce->clean();
```

