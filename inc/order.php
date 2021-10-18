
<?php



class order {
        
        public function __construct() {
                add_action('admin_menu', array($this, 'my_custom_menu_page')); 
        }
        public function my_custom_menu_page() {
                add_menu_page(
                        __( 'Custom Menu Title', 'textdomain' ),
                        'custom_menu',
                        'manage_options',
                        'custompage',
                        array($this, 'order_setting_page')
            
            );
        }

        

        public function order_setting_page($order_id) {

                $order_id= "62297"; 
                $order = wc_get_order( $order_id );

                $line_items = $order->get_items( apply_filters( 'woocommerce_admin_order_item_types', 'line_item') ); 
                foreach ($line_items as $item_id => $item ):


                #------------------------------------------------------------------------------------------------------------------------#
                        ### ITEM ###
                        // WC_Order_Item_Product https://woocommerce.github.io/code-reference/classes/WC-Order-Item-Product.html



                        //$item_id = $item->get_id();
                        //print_r($item);

                        $product           = $item->get_product(); 
                        $product_id        = $item->get_product_id(); 
                        $variation_id      = $item->get_variation_id(); 
                        $item_type         = $item->get_type(); 
                        $item_name         = $item->get_name(); 
                        $quantity          = $item->get_quantity();  
                        $line_subtotal     = $item->get_subtotal(); 
                        $line_subtotal_tax = $item->get_subtotal_tax(); 
                        $line_total        = $item->get_total(); 
                        $line_total_tax    = $item->get_total_tax(); 
                        $line_stats_tax    = $item->get_tax_status();

                        echo 'Item Name: '    . $item_name         . '<br>';
                        echo 'Total Tax: '    . $line_total_tax    . '<br>';
                        echo 'Total: '        . $line_total        . '<br>';
                        echo 'Subtotal Tax: ' . $line_subtotal_tax . '<br>';
                        echo 'Subtotal: '     . $line_subtotal     . '<br>';
                        echo 'Quantity: '     . $quantity          . '<br>';
                        echo 'Product id: '   . $product_id        . '<br>';
                        echo 'Tax Status: '   . $line_stats_tax    . '<br>';
                        echo 'Item Type: '    . $item_type         . '<br>';
                        echo 'Variation id: ' . $variation_id      . '<br>'; 
                #--------------------------------------------------------------------------------------------------------------------------#  
                        

                        ### PRODUCT ###
                        // WC_product https://woocommerce.github.io/code-reference/classes/WC-Product.html

                        //$product = $item->get_product(); 
                        //print_r($product);

                        $product_name   = $product->get_name();
                        $product_type   = $product->get_type();
                        $product_sku    = $product->get_sku();
                        $product_price  = $product->get_price();
                        $stock_quantity = $product->get_stock_quantity();
                        $product_slug   = $product->get_slug();


                        echo 'Product Name: '   . $product_name   . '<br>';
                        echo 'Stock Quantity: ' . $stock_quantity . '<br>';
                        echo 'Product Type: '   . $product_type   . '<br>';
                        echo 'Product Sku: '    . $product_sku    . '<br>';
                        echo 'Product Price: '  . $product_price  . '<br>';
                        echo 'Product Slug: '   . $product_slug   . '<br>';       
                #--------------------------------------------------------------------------------------------------------------------------#  


                        ### ORDER ###    
                        //$order = wc_get_order($order_id);
                        //print_r( $order);

                /*        $billing_first_name      = $order->get_billing_first_name();
                        $billing_last_name       = $order->get_billing_last_name();
                        $billing_company         = $order->get_billing_company();
                        $billing_address_1       = $order->get_billing_address_1();
                        $billing_address_2       = $order->get_billing_address_2();
                        $billing_city            = $order->get_billing_city();
                        $billing_state           = $order->get_billing_state();
                        $billing_postcode        = $order->get_billing_postcode();
                        $billing_country         = $order->get_billing_country();
                        $billing_email           = $order->get_billing_email();
                        $billing_phone           = $order->get_billing_phone();
                        $customer_id             = $order->get_customer_id(); 
                        $shipping_first_name     = $order->get_shipping_first_name();
                        $shipping_last_name      = $order->get_shipping_last_name();
                        $shipping_company        = $order->get_shipping_company();
                        $shipping_address_1      = $order->get_shipping_address_1();
                        $shipping_address_2      = $order->get_shipping_address_2();
                        $shipping_city           = $order->get_shipping_city();
                        $shipping_state          = $order->get_shipping_state();
                        $shipping_postcode       = $order->get_shipping_postcode();
                        $shipping_country        = $order->get_shipping_country();
                        $payment_method_title    = $order->get_payment_method_title();
                        $total_tax               = $order->get_total_tax();
                        

                        echo 'Billing first_name: '   . $billing_first_name   . '<br>';
                        echo 'Billing last name: '    . $billing_last_name    . '<br>';
                        echo 'billing_email: '        . $billing_email        . '<br>';
                        echo 'billing_phone: '        . $billing_phone        . '<br>';
                        echo 'billing_company: '      . $billing_company      . '<br>';
                        echo 'billing_address_1: '    . $billing_address_1    . '<br>';
                        echo 'billing_address_2: '    . $billing_address_2    . '<br>';
                        echo 'billing_city: '         . $billing_city         . '<br>';
                        echo 'billing_state: '        . $billing_state        . '<br>';
                        echo 'billing_postcode: '     . $billing_postcode     . '<br>';
                        echo 'billing_country: '      . $billing_country      . '<br>';
                        echo 'shipping_first_name: '  . $shipping_first_name  . '<br>';
                        echo 'shipping_last_name: '   . $shipping_last_name   . '<br>';
                        echo 'shipping_company: '     . $shipping_company     . '<br>';
                        echo 'shipping_address_1: '   . $shipping_address_1   . '<br>';
                        echo 'shipping_address_2: '   . $shipping_address_2   . '<br>';
                        echo 'shipping_city: '        . $shipping_city        . '<br>';
                        echo 'shipping_state: '       . $shipping_state       . '<br>';
                        echo 'shipping_postcode: '    . $shipping_postcode    . '<br>';
                        echo 'customer_id: '          . $customer_id          . '<br>';
                        echo 'shipping_address_1: '   . $shipping_address_1   . '<br>';
                        echo 'shipping_address_2: '   . $shipping_address_2   . '<br>';
                        echo 'shipping_city: '        . $shipping_city        . '<br>';
                        echo 'shipping_state: '       . $shipping_state       . '<br>';
                        echo 'shipping_postcode: '    . $shipping_postcode    . '<br>';
                        echo 'shipping_country: '     . $shipping_country     . '<br>'; 
                        echo 'payment_method_title: ' . $payment_method_title . '<br>'; 
                        echo 'Total: '                . $total_tax            . '<br>';  */

                        
                    echo '<br>';
                    endforeach;
                   

                      
                }

         }new order;


































