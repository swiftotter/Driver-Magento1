# Driver: Magento 1 Transformations
### A database task-runner

For more information about how Driver works, see https://github.com/SwiftOtter/Driver.

### How to use these modules:

```bash
composer require swiftotter/driver-magento1
```

In your project's root directory (the one where `vendor` is), create a new
folder called `.driver`. Create a file inside `.driver` called `config.yaml`.

Your directory structure should now look something like:

* composer.json
* composer.lock
* .driver/
    * config.yaml
* vendor/
    * swiftotter/
        * driver
        * driver-magento1

In `config.yaml`, add the following lines:

```yaml

pipelines:
  default:
    - name: global-commands
      actions:
        - name: m1-clear-customers
          sort: 50
        - name: m1-clear-logs
          sort: 60
        - name: m1-clear-orders
          sort: 70
        - name: m1-clear-quotes
          sort: 80
        - name: m1-clear-reports
          sort: 90
        - name: m1-clear-common
          sort: 100
        - name: m1-clear-swiftotter
          sort: 110

```

Each of the actions above has a name. `m1-clear-customers` is an example of such
a name. This could have been automatic, but Driver is designed with
customization over convention. You need to decide where you want these commands
to execute. That said, the above template is a great starting place.