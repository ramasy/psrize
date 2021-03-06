PsrizeBundle
=============

This bundle helps you to improve your code design,style and structure on a symfony project,
 Features include:

- Automatically corrects code inside php file to follow psr-2 standard
- show code size 
- show naming recommandation
- show unused variable


Documentation
-------------

[Read the Documentation](http://psrize.readthedocs.io/en/latest/)

Installation
------------

**1**  Add to your composer.json file

```json
{
    "require": {
        "ramasy/psrize": "dev-master"
    }
}
```

**2** Run composer update 

``` shell
    $ composer update ramasy/psrize
``` 

**3** Register the bundle in ``app/AppKernel.php``

``` php
    $bundles = array(
        // ...
        new Ramasy\PsrizeBundle\RamasyPsrizeBundle(),
    );
```

**4** Run  

``` shell
    $ php bin/console app:psrize path_to_a_directory 
``` 

**path_to_a_directory** represent a relative path from the directory src/ of your symfony project

Example : 

the correct relative path for the directory **youApp/src/AppBundle/Controller** is **AppBundle/Controller**

License
-------

This bundle is under the MIT license. See the complete license [in the bundle](https://github.com/ramasy/psrize/blob/master/LICENSE.md)


Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [Github issue tracker](https://github.com/ramasy/psrize/issues).

