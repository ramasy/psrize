PsrizeBundle
=============

This bundle helps you to improve your code design,style and structure on a symfony project
Features include:

- Automatically corrects code inside php file to follow psr-2 standard
- show code size 
- show naming recommandation
- show unused variable


Documentation
-------------

The source of the documentation is stored in the `Resources/doc/` folder
in this bundle, and available on symfony.com:

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

**2** Register the bundle in ``app/AppKernel.php``

``` php
    $bundles = array(
        // ...
        new Ramasy\PsrizeBundle\RamasyPsrizeBundle(),
    );
```

License
-------

This bundle is under the MIT license. See the complete license [in the bundle](LICENSE)


Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [Github issue tracker](https://github.com/ramasy/psrize/issues).
