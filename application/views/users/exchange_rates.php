<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	td, th {
		border: 1px solid #ddd;
		padding: 8px;
		}
	</style>
</head>
<body>

<div id="container">
    <div style="padding:10px;">
        <div style="padding:10px;"><b>3.8. The exchange rates for USD and RON based on Euro using https://exchangeratesapi.io/.</b></div>
        <?php
        if(array_key_exists('success', $response)) {
            if($response->success == true) {
                ?>
                <table width="100%">
                    <thead>
                        <tr>
                            <th colspan="3">EXCHANGE RATES</th>
                        </tr>
                        <tr>
                            <th colspan="2">Date : <?=$response->date .' '. date('H:i:s', $response->timestamp)?></th>
                            <th>Base : <?=$response->base?></th>
                        </tr>
                        <tr>
                            <th colspan="3">Rates</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(count($response->rates)>0) {
                            $counter = 1;
                            $exist_array = array('USD','RON');
                            foreach($response->rates as $ratekey => $ratesval) {
                                if(in_array($ratekey, $exist_array)) {
                                ?>
                                <tr>
                                    <td><?=$counter?></td>
                                    <td><?=$ratekey?></td>
                                    <td><?=$ratesval?></td>
                                </tr>
                                <?php
                                }
                                $counter++;
                            }
                        }
                            
                        ?>
                    </tbody>
                </table>
                <?php
            }
        } else {
            ?>
            <div style="padding: 16px;background: #e37878;color: white;width: 38%;text-align: center;font-size: 17px;font-weight: bold;">
                <?=$response->message?>
            </div>
            <?php
        }
        ?>
    </div>
</div>

</body>
</html>