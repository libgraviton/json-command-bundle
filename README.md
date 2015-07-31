XiagJsonCommandBundle
=====================

Symfony 2 bundle to the [xiag/json-command](https://github.com/xiag-ag/json-command).

Installation
============

Step 1: Download the Bundle
---------------------------

Run

```bash
composer require xiag/json-command-bundle
```

or add to your `composer.json`

```json
"xiag/json-command-bundle": "*",
```


Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding the following line in the `app/AppKernel.php`
file of your project:

```php
<?php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...
            new \Xiag\JsonCommandBundle\XiagJsonCommandBundle(),
        ];

        // ...
    }

    // ...
}
```

How to use
==========

Register new service:
```xml
<!-- app/config/services.xml -->
<service id="my.node.executor" class="%xiag.json_command.jsonexecutor.class%">
    <factory service="xiag.json_command.jsonexecutor.factory" method="createJsonExecutor"/>
    <argument>node</argument>
    <argument>array</argument>
    <argument type="collection">
        <argument>-type=general</argument>
    </argument>
</service>
```
