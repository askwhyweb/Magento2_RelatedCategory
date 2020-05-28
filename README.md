# Mage2 Module OrviSoft RelatedCategory

    `orvisoft/module-relatedcategory`

 - [Main Functionalities](#header-main-functionalities)
 - [Installation](#header-installation)
 - [Attributes](#header-attributes)


## Main Functionalities
Add attribute to Magento category

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/OrviSoft`
 - Enable the module by running `php bin/magento module:enable OrviSoft_RelatedCategory`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require orvisoft/module-relatedcategory`
 - enable the module by running `php bin/magento module:enable OrviSoft_RelatedCategory`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

## Attributes

 - Category - Related Category ID (related_category)

