# Changelog

All notable changes to this project will be documented in this file.

The format is based on [keep a changelog][xtlink-keep-a-changelog]
and this project adheres to [Semantic Versioning 2.0.0][xtlink-semantic-versioning].

## [0.2.0] - 2021-11-09

### Fixed

* forced the `UTF-8` e-mail charset

### Changed

* composer package dependencies
    * added
        * `codekandis/accumail-entities` [^0]
        * `codekandis/converters` [^0]
        * `codekandis/peristence` [^0]
        * `codekandis/tiphy-persistence-integration` [^0]
        * `codekandis/validators` [^0]
* updated the log messages
* `README.md`

### Added

* script execution timeout for the job creation
* implementation of the newly added composer packages

[0.2.0]: https://github.com/codekandis/accumail/compare/0.1.2..0.2.0

---
## [0.1.2] - 2021-10-14

### Added

* more log messages

[0.1.2]: https://github.com/codekandis/accumail/compare/0.1.1..0.1.2

---
## [0.1.1] - 2021-10-11

### Removed

* script execution timeout for cronjobs

[0.1.1]: https://github.com/codekandis/accumail/compare/0.1.0..0.1.1

---
## [0.1.0] - 2021-10-11

### Added

* basic API implementation
  * creating a job
  * retrieving jobs
* basic CLI implementation
  * processing jobs
* `CODE_OF_CONDUCT.md`
* `LICENSE`
* `REAMDE.md`
* `CHANGELOG.md`

[0.1.0]: https://github.com/codekandis/accumail/tree/0.1.0



[xtlink-keep-a-changelog]: http://keepachangelog.com/en/1.0.0/
[xtlink-semantic-versioning]: http://semver.org/spec/v2.0.0.html
