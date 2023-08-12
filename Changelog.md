# Changelog
All notable changes to this package will be documented in this file.

## [Unreleased]
### Added
- N/A
### Changed
- N/A
### Fixed
- N/A

## [1.3.1] - 12 Aug 2023
### Fixed
- Set table names in the new models
## [1.3.0] - 12 Aug 2023
### Added
- E.164 International Direct Dialing support
### Changed
- Database migrations now use clearer style of defining for foreignUilds
## [1.2.3] - 22 Jul 2023
### Fixed
- Two relationship in the `Region` model did not return a value
## [1.2.2] - 6 May 2023
### Fixed
- Fixed subdivisions data storage
## [1.2.1] - 5 May 2023
### Fixed
- Fixed subdivisions foreign constraint migration.
## [1.2.0] - 5 May 2023
### Added
- Support for country subdivisions
## [1.1.4] - 10 Mar 2023
### Changed
- Fix pivot table names for many-to-many relations
- Update Refresh to use correct functions
## [1.1.3] - 09 Mar 2023
### Changed
- Fix typo in column ID
- Fix migration file names

## [1.1.2] - 05 Mar 2023
### Changed
- Use correct table names in migrations

## [1.1.1] - 05 Mar 2023
### Changed
- Use correct table names in migrations

## [1.1.0] - 05 Mar 2023
### Added
- Add geodata.php configuration and recognize table_prefix configuration setting

## [1.0.1] - 04 Mar 2023
### Changed
- README.md updated with instructions

## [1.0.0] - 04 Mar 2023
### Added
- Countries, Languages, Demonyms, Regions and Currencies as Laravel models with their associated database tables.
