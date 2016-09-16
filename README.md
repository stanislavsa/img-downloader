# img-downloader
Download images to local folder

## Installation

```
$ composer require stanislavsa/img-downloader
```

## Basic Usage

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use \Stanislavsa\ImgDownloader\Image as StImage;
use \Stanislavsa\ImgDownloader\Request as StRequest;

try {

    $image_urls_list = array(
        'http://images.freeimages.com/images/previews/8be/honda-s2000-mastercraft-wide-1483734.jpg',
        'http://cdn.osxdaily.com/wp-content/uploads/2013/07/dancing-banana.gif',
        'http://images.freeimages.com/images/previews/df3/car-engine-1629925.jpg',
        'http://www.freepngimg.com/download/printer/7-printer-png-image.png',
        'http://www.freepngimg.com/download/apple/42-apple-png-image.png',
    );

    $img = new StImage($image_urls_list);
    // set path to store images
    $img->setFolder( __DIR__ . '/images');
    $req = new StRequest($img);
    // download images
    $req->send();

} catch(Exception $e) {
    echo $e->getMessage();
}
```


