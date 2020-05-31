<?

if ($_POST['enter'])
{
    //API
    
    //KNtH2pvwQDrZUoxv
    
    require_once('cpayeer.php');
    $accountNumber = 'P1027105662'
    $apiId = '1043881646'
    $apiKey = 'KNtH2pvwQDrZUoxv'
    $payeer = new CPayeer($accountNumber, $apiId, $apiKey);
    
    if($payeer ->isAuth())
    {
        $arTransfer = $payeer->transfer(array(
            'curIn' => 'RUB',
            'sum' => $_POST['sum'],
            'curOut' => 'RUB',
            'to' => 'P1000000',
            'comment' => 'php.youtube',
            ));
        if(empty($arTransfer['errors']))
        {
            echo .": Перевод средств успешно выполнен, сумма: $_POST[sum], транзакция: $arTransfer[historyId]";
        }
            else
            {
                echo '<pre>'.print_r($arTransfer["errors"],true).'</pre';
            }
        }
        else 
        {
            echo '<pre>'.print_r($payeer->getErrors(),true).'</pre>';
        }
    exit ("Summa: $_POST[sum]");
}

?>