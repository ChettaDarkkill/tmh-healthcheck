<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(-1);

?>
<?php include("config/config.php"); ?>
<?php
include("helpers.php");
$error = array();

?>
<?php try { ?>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=TIS-620">
            <title>:: Health Check ::</title>
        </head>
        <body>
            <style>
                .text-header{
                    font-family: Tahoma;
                    font-size: 14px;
                    color: #000000;
                    font-weight: bold;
                    text-align: center;
                    height: 20px;
                }
                .text-content{
                    font-family: Tahoma;
                    font-size: 14px;
                    color: #000000;
                    text-align:center;
                }
                .hl-row1{
                    background-color: #FFF;
                }
                .hl-row2{
                    background-color: #eff3fc;
                }


            </style>
            <table cellspacing='1' bgcolor="#CCCCCC">
                <tr>
                    <td  class='text-header' width='100'>No.</td>
                    <td  class='text-header' width='200'>Type</td>
                    <td  class='text-header' width='350'>Service</td>
                    <td  class='text-header' width='350'>URL</td>
                    <td  class='text-header' width='100'>Time(s)</td>
                    <td  class='text-header' width='100'>Status</td>
                </tr>
                <?php if (count($config) > 0): ?>
                    <?php
                    $j = 0;
                    foreach ($config as $key => $value):
                        $j++;
                        $result = '';
                        # Check
                        $start_time = slog_time();
                        switch ($value['type']) {
                            case 'database':
                                $result = connectMysql($value['config']);
                                break;
                            case 'api_curl_get':
                                $result = curlTruemoveHStandardGet($value['config']);
                                break;
                            case 'redis':
                                $result = connectRedis($value['config']);
                                break;
                            case 'test_wsdl':
                                $result = getWsdl($value['config']);
                                break;
                        }
                        $time = elog_time($start_time);
                        if ($result != 'success') {
                            $error[] = $result;
                        }
                        $class = "hl-row1";
                        if (($j % 2) == 0)
                            $class = "hl-row2";

                        ?>
                        <tr class="<?php echo $class ?>">
                            <td  class='text-header' width='100'><?php echo $j; ?></td>
                            <td  class='text-header' width='200'><?php echo ucfirst($value['type']); ?></td>
                            <td  class='text-header' width='350'><?php echo $value['name']; ?></td>
                            <td  class='text-header' width='350'><?php
                                if (isset($value['config']['url'])) {
                                    echo $value['config']['url'];
                                } else if (isset($value['config']['host'])) {
                                    echo $value['config']['host'];
                                    if (isset($value['config']['port'])) {
                                        echo ':' . $value['config']['port'];
                                    }
                                }

                                ?></td>
                            <td  class='text-header' width='100'><?php echo number_format($time, 4); ?> sec</td>
                            <td  class='text-header' width='100'><?php echo ucfirst($result); ?></td>
                        </tr>                
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td  class='text-header' width='200' colspan="5"> Config not found.</td>
                    </tr>
                <?php endif; ?>
        </body>
    </html>
    <?php
} catch (Exception $ex) {
    echo $ex->getMessage() . '-' . $ex->getLine() . '-' . $ex->getFile();
    echo '<br/>';
    echo "<br>THIS_PAGE_IS_COMPLETELY_LOADED";
}
if (count($error) > 0) {
    echo "<br>THIS_PAGE_IS_COMPLETELY_LOADED";
}

?>