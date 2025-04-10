# CZ Name

Tooling for normalizing names

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist aval24/czname "*"
```

or add

```json
"aval24/czname": "*"
```

to the `require` section of your composer.json.

## Usage

```php
use aval24\czname\Czname;

$name = "Mgr. JANA TALÁKOVÁ";

$test1 = Czname::purge($name);

echo "Source: $name\n"; 
echo "Result: $test1\n";

```
