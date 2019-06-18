GravitonJsonCommandBundle
=====================

Symfony bundle to the [graviton/json-command](https://github.com/libgraviton/json-command).

Installation
============

Step 1: Download the Bundle
---------------------------

Run

```bash
composer require graviton/json-command-bundle
```

or add to your `composer.json`

```json
"graviton/json-command-bundle": "*",
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
            new \Graviton\JsonCommandBundle\JsonCommandBundle(),
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
<service id="my.node.executor" class="%graviton.json_command.jsonexecutor.class%">
    <factory service="graviton.json_command.jsonexecutor.factory" method="createJsonExecutor"/>
    <argument>node</argument>
    <argument>array</argument>
    <argument type="collection">
        <argument>-type=general</argument>
    </argument>
</service>
```
