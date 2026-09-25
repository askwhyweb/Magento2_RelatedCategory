# Magento 2 Related Category Attribute

> Historical project, last updated in 2020. The commit history describes the initial module structure as incomplete. It is not actively maintained; review compatibility and security before use.

This module adds a `related_category` ID attribute to Magento categories. The original package and module names are `orvisoft/module-relatedcategory` and `OrviSoft_RelatedCategory`.

## Installation

For a local module copy, place the files in `app/code/OrviSoft/RelatedCategory`, then enable and register it:

```bash
php bin/magento module:enable OrviSoft_RelatedCategory
php bin/magento setup:upgrade
```

For Composer, make the package available in your configured repository, then run:

```bash
composer require orvisoft/module-relatedcategory
php bin/magento module:enable OrviSoft_RelatedCategory
php bin/magento setup:upgrade
```

The module includes a helper and a block/template integration documented in the source tree. No Magento version compatibility is asserted here.
