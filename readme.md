
Laravel Contracts - Cheat Sheet
========

Build your own custom cheat sheet for the Laravel 5 Contracts. The generator utilizes the Reflection API and composer to stay current with the [contracts repository](https://github.com/illuminate/contracts).

Demo
------

You can view a sample of the cheet sheet here [http://ryantbrown.io/laravel-contracts](http://ryantbrown.io/laravel-contracts)

Download and Run
------

Clone the repo and install the dependencies
* ```git clone https://github.com/ryantbrown/laravel-contracts-cheat-sheet.git laravel-contracts```
* ```cd laravel-contracts && composer install```

Generate the static documents (will be placed in the ```dist``` folder)
* ```php commands/generate.php generate```

Navigate to the ```dist``` folder and start a server
* ```cd dist && php -S localhost:8000```

If you want to view it without a webserver you'll need to start chrome like so:
* ```open -a Google\ Chrome --args -–disable-web-security``` and then browse to ```dist/index.html```

Customize Example Template
------

* Install the node modules with ```sudo npm install```
* Edit the ```twig```, ```less``` and ```js``` files in the ```assets``` directory
* You may need to modify the ```gulpfile.js``` and run ```gulp``` to rebuild the assets
* Re-generate the static html files with ```php commands/generate.php generate```
* Start the server ```cd dist && php -S localhost:8000```v


Build your own custom Cheat Sheet
------

There is a Helper class ```LC\Helper``` that makes it super easy to create your own layout anyway you see fit. Below is a quick and dirty script to generate the basic data used in the cheat sheet.  Take a look at the ```src``` directory for all the classes and methods available.

```php
<?php
// include the autoload file
require 'vendor/autoload.php'

// Get an array of all the contracts, grouped by top-level directory
$contracts = LC\Helper::getContracts();

foreach($contracts as $group => $files)
{
    echo $group;

    foreach($files as $file)
    {
        echo $file;

        $reflector = LC\Helper::getReflector($group, $file);

        $constants = $reflector->getConstants();

        // $key => $val array of constants
        echo "<pre>"; print_r($constants); echo "</pre>";

        // array of all methods and their information
        $methods = $reflector->getMethodData();

        foreach($methods as $method)
        {
            // method name
            echo $method['name'];

            // method doc comment
            echo $method['doc'];

            // number of params
            echo $method['param_info']['total'];

            foreach($method['param_info']['params'] as $param)
            {
                // param name
                echo $param['name'];

                // param details
                $param['position']
                $param['allows_null']
                $param['is_array']
                $param['is_callable']
                $param['is_optional']
            }
        }
    }
}
```

With the above script you can pretty much generate any UI you want. If you want to generate a static build like the [example](http://ryantbrown.io/laravel-contracts) then take a look at the ```LC\Presenters``` and the ```LC\Commands\GenerateCommand``` classes.  In a nutshell the command uses the presenters as a data source and generates ```html``` files from the twig templates.

That's it, this was a christmas/weekend project so I hope you find it useful.