<?php
require_once("classes.php");
class indexCart extends view
{
    public function output()
    {
        $cart = new Cart();
        if (!empty($_POST['cart'])) {
            $cart->productsQuantity = json_decode($_POST['cart'], true);
        }
        if (!empty($_GET["action"])) {
            switch ($_GET["action"]) {
                case "add":
                    if (!empty($_POST["quantity"])) {
                        $cart->addProduct($_GET["id"], $_POST["quantity"]);
                    }
                    break;
                case "remove":
                    $cart->removeProduct($_GET["id"]);
                    break;
                case "empty":
                    $cart->emptyCart();
                    break;
            }
        }
?>
        <HTML>

        <HEAD>
            <TITLE>Shopping Cart</TITLE>
            <link href="style.css" type="text/css" rel="stylesheet" />
        </HEAD>

        <BODY>
            <div id="shopping-cart">
                <div class="txt-heading">
                    Shopping Cart <a id="btnEmpty" href="indexCart?action=empty">Empty Cart</a>
                </div>
                <?php

                if (count($cart->productsQuantity) > 0) {
                    $item_total = 0;
                ?>
                    <table cellpadding="10" cellspacing="1">
                        <tr>
                            <th><strong>Name</strong></th>
                            <th><strong>Quantity</strong></th>
                            <th><strong>Price</strong></th>
                            <th><strong>Action</strong></th>
                        </tr>
                        <?php
                        foreach ($cart->productsQuantity as $productID => $quantity) {
                            $product = new Product($productID);
                        ?>
                            <tr>
                                <td><strong><?php echo $product->name; ?></strong></td>
                                <td><?php echo $quantity; ?></td>
                                <td><?php echo "$" . $product->price; ?></td>
                                <td>
                                    <form method="post" action="indexCart?action=remove&id=<?php echo $product->id; ?>">
                                        <input type="submit" value="Remove Item" class="btnAddAction" />
                                        <input type='hidden' name='cart' value='<?php echo (json_encode($cart->productsQuantity)); ?>' />
                                    </form>
                                </td>
                            </tr>
                        <?php
                            $item_total += ($product->price * $quantity);
                        }
                        ?>
                        <tr>
                            <td colspan="4"><strong>Total:</strong>
                                <?php
                                echo "$" . $item_total; ?></td>
                        </tr>
                    </table>
                <?php
                } ?>
            </div>
            <div id="product-grid">
                <div class="txt-heading">Products</div>
                <?php
                $allProducts = Product::getAllProducts();
                foreach ($allProducts as $product) { ?>
                    <div class="product-item" width="200px">
                        <form method="post" action="indexCart?action=add&id=<?php echo $product->id; ?>">
                            <div><strong><?php echo $product->name; ?></strong></div>
                            <div class="product-price">$<?php echo $product->price; ?></div>

                            <?php
                            foreach ($product->options as $option => $value) {  //x['drug strength']=500mg
                                echo "<div>$option: $value</div>";
                            }
                            ?>
                            <div>
                                <input type="text" name="quantity" value="1" size="2" />
                                <input type="submit" value="Add to cart" class="btnAddAction" />
                            </div>
                            <input type='hidden' name='cart' value='<?php echo (json_encode($cart->productsQuantity)); ?>' />
                        </form>
                    </div>
        <?php
                }
            }
        }
        ?>
            </div>
        </BODY>

        </HTML>