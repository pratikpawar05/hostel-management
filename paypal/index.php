<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PayPal Integration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #container{
            width: 100%;
            max-width: 500px;
            display: table;
            margin: 150px auto 0;
        }
        .productBlock{
            width: 100%;
            max-width: 200px;
            display: table;
            margin: 0 auto;
            border: 3px solid #666;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div id="container">
        <div class="productBlock">
            <p>Size: 10 MB</p>
            <p>Date: 12/12/2020</p>
            <p>Author: Mayur</p>
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" id="buyCredits" name="buyCredits">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="sb-3uip95874763@business.example.com">
            <input type="hidden" name="lc" value="IN">
            <input type="hidden" name="item_name" value="Virtual product">
            <input type="hidden" name="item_number" value="virtualproduct">
            <input type="hidden" name="amount" value="10.00">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="button_subtype" value="services">
            <input type="hidden" name="no_note" value="1">
            <input type="hidden" name="no_shipping" value="1">
            <input type="hidden" name="rm" value="1">
            <input type="hidden" name="return" value="http://localhost/hotel-mangement/paypal/success.php">
            <input type="hidden" name="cancel_return" value="http://localhost/hotel-mangement/paypal/thankyou.php">
            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
            <input type="hidden" name="notify_url" value="https://http://localhost/hotel-mangement/paypal/handler.php">
            <input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
            </form>

            <!-- Your PayPal Button here -->
        </div>
    </div>
</body>
</html>