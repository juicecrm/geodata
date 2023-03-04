# Geographical Data for Laravel
![version](https://img.shields.io/packagist/v/juicecrm/geodata)

Store geographical data, and make it available via Laravel 10 Models.
## Installation
```sh
composer require "juicecrm/geodata" "^1.0"
```
## Usage
At first you may need to run migrations. The generated tables have no prefix by default. See the [Customizations](#customizations) section below.

The initial setup of the data is accomplished by running the following commands
```sh
php artisan migrate
php artisan geodata:retrieve
php artisan geodata:extract
php artisan geodata:store
```
You can also use `php artisan geodata:refresh`. This will run the above three geodata artisan commands in succession for you.
### Customizations

If you want to prefix the table names, so that you can make a distinction in your own data model between JuiceCRM GeoData Country models vs your own models, you change the GeoData configuration. In order to so, you will need to publish the configuration file.
```sh
php artisan vendor:publish --provider="JuiceCRM\\GeoData\\GeoDataServiceProvider" --tag=config
```
This will create a geodata.php file in the config directory of your project. In that file, you'll find a setting `table_prefix` that you can update to your liking.
## Testing
The package will have tests where it is deemed necessary.
## Changelog
There is a [Changelog.md](./Changelog.md) file that lists all the changes made since version 1.0.0.
## Contributing
Anybody can contribute anything to this software. Feel free to participate. Please be mindful to have an overall pleasant demeanor and be polite to your co-contributors. Exsessive rude or impolite behavior will not be tolerated.
## Credits
- Antonio Carlos Ribeiro, whose [countries](https://github.com/antonioribeiro/countries) package provided much of the underlying data knowledge.
- Guus Leeuw (aka [PHPGuus](https://twitter.com/PHPGuus)) as maintainer of this package.
## License
This software is protected by the [GPLv3 License](./LICENSE).
