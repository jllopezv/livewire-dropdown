# Livewire Dropdown

Livewire customizable dropdown component

### Installation

You can install the package via composer:

```bash
composer require jllopezv/livewire-dropdown
```

### Requirements

Livewire `livewire/livewire` (https://laravel-livewire.com/).

TailwindCSS (https://tailwindcss.com/)

AlpineJS (https://alpinejs.dev/)

Fontawesome https://fontawesome.com/

### Usage

Create a livewire component that extends LivewireDropdown

``` bash
php artisan make:livewire LivewireDropdownTest
```

The new class must extends LivewireDropdown
 
``` php
<?php

namespace App\Http\Livewire;

use Jllopezv\LivewireDropdown\LivewireDropdown;

class LivewireDropdownTest extends LivewireDropdown
{
    // Properties and methods
}
```

Methods to override

Events
You can add your own listeners for component events. In this case el name of component is dropdown1, and dropdownUpdated is the method where you write your code for the event.
```php
protected function getListeners()
{
    return array_merge(parent::getListeners(), [
        'dropdown1.updated' =>  'dropdownUpdated'
    ]);
}
```

List of options to select
Override the method setOptions. setOptions must return a collection of pairs value/text.
```php
public function setOptions()
    {
        return collect([
            [
                'value'     =>  'option1',
                'text'      =>  'Option 1'
            ],
            [
                'value'     =>  'option2',
                'text'      =>  'Option 2'
            ],
            [
                'value'     =>  'option3',
                'text'      =>  'Option 3'
            ],
            [
                'value'     =>  'option4',
                'text'      =>  'Option 4'
            ],
            [
                'value'     =>  'option5',
                'text'      =>  'Option 5'
            ],
            [
                'value'     =>  'option6',
                'text'      =>  'Option 6'
            ]
        ]);
    }
```


Render the component

```blade
@livewire('livewire-dropdown', [
    'name'  =>  'dropdown1'
    // options
])
```


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information.


## Credits

- [José Luís López](https://github.com/jllopezv)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
