# cart-management

<p>The company <strong style="color: blue">X</strong> wishes to improve the management of the user cart on its ecommerce site. It also wishes to add business constraints following recent hacking incidents.</p>
<p>The rules to follow to improve the user basket are as follows:</p>

- A user's shopping cart is unique and empty by default when their account is created.
- The user basket can contain several instances of the same product, as well as different products.
- It is forbidden to add a product to the basket if the chosen quantity is less than or equal to zero.
- It must be possible to remove a product from the basket or reduce the quantity of a product in the basket.
- Example:
  - If the user adds the same product 4 times, there must be a single product in the basket with a quantity of 4.
  - If the user removes 1 quantity of this product, there should be 3 quantities of the product left in the basket.
  - If the user adds the same product 2 more times, there must be a single product in the basket with a quantity of 5.
  - Users cannot delete more products than they have in their basket. For example, if he has 5 quantities of a product in his basket, he cannot request the deletion of 6.
  - It must be possible to calculate the total price of the basket.
  
## STEPS:

- composer init
- composer require phpunit/phpunit ^10 --dev
- composer require symfony/var-dumper --dev
- Define autoload paths for namespaces and run `composer dump-autoload` to apply changes
