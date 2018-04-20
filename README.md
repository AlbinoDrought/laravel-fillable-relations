# Laravel Fillable Relations


[![Build Status](https://travis-ci.org/AlbinoDrought/laravel-fillable-relations.svg?branch=master)](https://travis-ci.org/AlbinoDrought/laravel-fillable-relations)

This library provides a trait for mixing in to an Eloquent Model. Doing so will enable support for fillable relations.

This is a stricter, versioned, and opinionated fork of https://github.com/troelskn/laravel-fillable-relations

## Installation

```
composer require albinodrought/laravel-fillable-relations
```

## Usage

First, in your model:

```php
<?php
namespace MyApp\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelFillableRelations\Eloquent\Concerns\HasFillableRelations;

class Foo extends Model
{
    use HasFillableRelations;
    protected $fillableRelations = ['bar'];

    function bar()
    {
        return $this->hasOne(Bar::class);
    }
}

class Bar extends Model
{
    use HasFillableRelations;
    protected $fillableRelations = ['foos'];

    function foos()
    {
        return $this->hasMany(Foo::class);
    }
}
```

And you can now fill relations, like so:

```php
<?php
$foo = new Foo(
    [
        'cuux' => 42,
        'bar' => [
            'id' => 42
        ]
    ]
);
```

Or perhaps:

```php
<?php
$foo = new Foo(
    [
        'cuux' => 42,
        'bar' => [
            'name' => "Ye Olde Pubbe"
        ]
    ]
);
```

And also:

```php
<?php
$bar = new Bar(
    [
        'name' => "Ye Olde Pubbe",
        'foos' => [
            [
                'cuux' => 42
            ],
            [
                'cuux' => 1337
            ]
        ]
    ]
);
```

## Testing

`composer test`
