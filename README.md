# taxexempt

- Tested on Magento Community Edition  `Magento 2.4.6`.

## Composer Install module

1. Run `composer config repositories.taxexempt vcs https://github.com/rajudiya/taxexempt`

2. Run `composer require igauri/taxexempt`

3. Run `bin/magento setup:db-declaration:generate-whitelist --module-name=Igauri/TaxExempt`

3. Run `php bin/magento setup:upgrade`

4. Run `php bin/magento setup:di:compile`

5. Run `php bin/magento s:s:d en_US`

6. Run `php bin/magento c:c`

## Composer Uninstall module

1. Run `composer remove igauri/taxexempt`

2. Run `php bin/magento setup:di:compile`

3. Run `php bin/magento s:s:d en_US`

4. Run `php bin/magento c:c`

## Preview Front-End

## Known issues
- Database Table not created while installing module.
`Follow Step 3,4 from Installation process`

## Developer Information
- Rohan Ajudiya
- Email `ajudiyarohan000@gmail.com`
- Mobile `+91 6353856107`
