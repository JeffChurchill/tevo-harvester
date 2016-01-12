# TEvo Harvester Changelog

## 1.1.2 (January 12, 2015)
- Fix authentication by properly switching to Laravel 5.2 Auth system.
- Added `.env` variable `ALLOW_REGISTRATION` to define whether or not registration is allowed.

## 1.1.1 (January 11, 2015)
- Fixed #7 by adding migration to correct the harvests for deleted items where the `library_method`  was not using the right method. This has been broken since 1.0.0.
- Removed erroneous comment in `DashboardController`

## 1.1 (January 5, 2015)
- Upgrade to Laravel 5.2

## 1.0.4 (November 18, 2015)
- Fix validation of `pingBefore()` and `thenPing()` in Scheduler tasks.

## 1.0.3 (November 18, 2015)
- Version 1.0.3 Introduced a bug in the Scheduler and therefore should not be used.

## 1.0.2 (November 18, 2015)
- Fix #2 by correcting input type of Name field in register form

## 1.0.1 (November 10, 2015)
- Enhance documentation

## 1.0.0 (November 10, 2015)
- Initial Release
