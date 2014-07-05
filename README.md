kujira-phpunit-printer
======================

A PhpUnit result printer

## Requirements

 * PHP 5.3.0 or later.

## How it looks

![Alt text](/kujira-phpunit-result-printer.jpg?raw=true "Kujira phpunit result printer")

## Installation

composer global require "kujira/phpunit-printer:1.0.1"

## Configuration

* Add to your phpunit.xml

```xml
    <phpunit
        bootstrap="bootstrap.php"
        colors="true"
        printerFile="/home/biotope/.composer/vendor/kujira/phpunit-printer/src/Printer.php"
        printerClass="Kujira\PHPUnit\Printer"
    >
```

* Configure your php.ini default_charset to UTF-8
* Configure your terminal to display UTF-8 charset and use a UTF-8 compatible font like DejaVu Sans Mono

## License

The Kujira result printer for PHPUnit is licensed under the [MIT license](LICENSE).
