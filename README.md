# Constants  

Constants is a helper package for validating and retrieving application-level global constants.  

[![Build Status](https://travis-ci.org/koomai/constants.svg?branch=master)](https://travis-ci.org/koomai/constants) 
[![StyleCI](https://styleci.io/repos/113857749/shield?branch=master)](https://styleci.io/repos/113857749)

## Contents

- [Installation](#installation)
- [Usage](#usage)
- [Changelog](#changelog)
- [Testing](#testing)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation

`composer require koomai/constants:1.0^`

## Usage

1. Simply extend your class from `Koomai\Constants\Constants` and define your constants. E.g.,

```
<?php

namespace App\Constants;

use Koomai\Constants\Constants as AbstractConstants;

class LeadStatus extends AbstractConstants
{
	const ATTEMPTED = 'attempted';
	const CONTACTED = 'contacted';
	const OPPORTUNITY = 'opportunity';
	const DISQUALIFIED = 'disqualified';
}

``` 

2. For internal use in your code, you just reference the constant name directly as usual:

`LeadStatus::CONTACTED`

3. When doing look-ups, e.g. via user input or as a parameter in a method, use the static `get()` method:  

`LeadStatus::get($status)`  

It will return `$status` if it's a valid constant value or throw an `InvalidConstantException`.

4. To retrieve an array of all the constants in a class:  

`LeadStatus::all()`

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits
- [laravel-notification-channels/skeleton](https://github.com/laravel-notification-channels/skeleton)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
