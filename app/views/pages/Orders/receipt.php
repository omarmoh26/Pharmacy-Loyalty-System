<head>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/receipt.css">
</head>

<?php
class receipt extends View
{
    public function output()
    {

        require APPROOT . '/views/inc/header.php';
        $action = URLROOT . 'pages/Admin';

        $text = <<<EOT
    <form action="$action" method="post">
    EOT
?>
        <div class="frame1">
            <div class="frame2">

                <div id="pharmacy-text-frame">
                    <div id="pharmacy-text">
                        <h>SARAYA CARE</h>
                    </div>
                </div>

                <div id="receipt-text-frame">
                    <div id="receipt-text">
                        <h>Reciept</h>
                    </div>
                </div>

                <div id="data-text">
                    <h>date-time: 21/4/2022</h>
                    <br>
                    <h>order id: 324</h>
                    <br>
                    <h>cashier name: ahmed</h>
                    <br>
                    <h>cashier id: 12</h>
                    <table>
                        <tr>
                            <th>name</th>
                            <th>quantity</th>
                            <th>price</th>
                            <th>total price</th>

                        </tr>
                        <tr>
                            <td>Peter</td>
                            <td>Griffin</td>
                            <td>$100</td>
                            <td>$500</td>

                        </tr>
                        <tr>
                            <td>Lois</td>
                            <td>Griffin</td>
                            <td>$150</td>
                            <td>$600</td>

                        </tr>
                        <tr>
                            <td>Joe</td>
                            <td>Swanson</td>
                            <td>$300</td>
                            <td>$600</td>

                        </tr>

                    </table>
                    <br>
                    <h>total:</h>
                    <br>
                    <h>disscount:</h>
                    <br>
                    <h>toal after disscount:</h>
                    <br>
                    <h>paid:</h>
                    <br>
                    <h>change:</h>
                    <hr>

                    <h>customer name:</h>
                    <br>
                    <h>customer id:</h>
                    <hr>

                    <h>added points:</h>
                    <br>
                    <h>used points:</h>
                    <br>
                    <h>total points:</h>
                    <hr>
                    <div id="note-frame">
                        <t id="note">please keep your invoice in case of any product replacements or retrieval within 14 days from the date of purchase</t>
                    </div>
                </div>
            </div>

            <div class="done-frame">
                <a class="done" href="<?php echo URLROOT . 'customers/oldCust'; ?>">done</a>
            </div>

            <div class="print-frame">

                <button id="cmd">Print pdf</button>

            </div>

        </div>


<?php
        <<<EOT
    </form>
  
    EOT;
        echo $text;
        require APPROOT . '/views/inc/footer.php';
    }
}
?>
