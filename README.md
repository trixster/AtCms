# AtCms

Version 0.1.0

AtCms is a [Zend Framework 2](http://framework.zend.com) module which provides a base CMS functionality.
Helps to create html pages and blocks.

**NOTE: This module is still under heavy development. Do not use it in production**

## Requirements

* [Zend Framework 2](https://github.com/zendframework/zf2)
* [AtAdmin](https://github.com/atukai/AtAdmin)


## Installation

 1. Add `"atukai/at-cms": "dev-master"` to your `composer.json` file and run `php composer.phar update`.
 2. Add `AtCms` to your `config/application.config.php` file under the `modules` key.
 3. Import the SQL schema located in ./vendor/atukai/at-cms/data/schema.sql

## Configuration