# Internationalization Data
Badges go here

Store internationalization data, and make it available via Laravel 10 Models.

## Installation

## Usage

### Customizations

### Testing

### Changelog

## Contributing

## Credits

## License

This software is protected by the [GPLv3 License](./LICENSE).

# Package Skeleton for JuiceCRM
This is simply an empty skeleton with everything a package could ever need:

1. Database migrations
1. Database seeders
1. ServiceProvider
1. Configuration file
1. Test classes

Just clone this repository and copy the contents into a new package directory, and you can start developing your package immediately, and in a JuiceCRM approved manner.

## Using the Skeleton-derived Package locally
In order to use this package locally, you need to do a few things in composer:
- Add a repository in the "repositories" array in composer.json
- Inside that array, create an object with a "type" set to "path" and a "url" set to the relative path, e.g. "../skeleton"
- Save the new composer.json
- Run `composer require juicecrm/package-skeleton`

This will create a symbolic link in your project to the package you are developing. Any changes made to the package are immediately visible in the project as well.

## Publishing the Skeleton-derived Package to Packagist.org

*You will need to notify Guus that you have a package ready to be published on packagist.org.*

Make sure your package is automatically tested using ChipperCI and that StyleCI is integrated and enabled for your package.

### StyleCI

Within the StyleCI settings, please make sure that StyleCI is allowed to "Automatically send and squash merge fix pull requests".

### README.md

Update this README.md file to have the following contents structure:
- It should have a title
- It should have a line under the title with all kinds of badges (from [Shields.io](https://shields.io/))
- That should be followed by a brief description (with a screen if that makes sense)
- A section on Installation
- A section on Usage (including Customizations, Testing and Changlog subsections)
- A section on Contributing (including a Security subsection)
- A section on Credits
- A section on License

You can use [makeareadme.com](https://makeareadme.com) if you need any help setting up a README.md

### Changelog.md

The package should have a Changelog, which should be updated upon every public release made. The structure to follow is documented in the Changelog.md in this package.

The latest change should always be at the top. When you have multiple contributors, they should basically send a pull request with the Changelog details in the description field. This makes building a Changelog across contributions really easy and avoids painful merge conflicts.

### Issues

Make sure you set up an appropriate Issue Template on GitHub when the project is published and the first release (1.0.0) has been tagged.

### Tests

The Test suite is certainly not completely setup, especially with regards to having intergrated database-enabled testing, and / or using Pest as a test driver instead of phpunit.
