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
	<div style="padding:10px;"><b>3.1. Count of all active and verified users.</b></div>
	<table width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
			if($data->num_rows()>0) {
				$i= 1;
				foreach($data->result() as $data_key){
					?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $data_key->name; ?></td>
							<td><?php echo $data_key->email; ?></td>
							<td><?php if($data_key->status == 1){ echo 'Active'; }else{ echo 'Inactive'; } ; ?></td>
						</tr>
					<?php
					$i++;
				}
			}
			?>
        </tbody>
    </table>

	<div style="padding:10px;"><b>3.2. Count of active and verified users who have attached active products.</b></div>
	<div style="padding:10px;"><b>Total active and verified users count : </b><?=$activeUserItemsCount?></div>

	<div style="padding:10px;"><b>3.3. Count of all active products (just from products table).</b></div>
	<div style="padding:10px;"><b>Total active products count : </b><?=$activeItemsCount?></div>

	<div style="padding:10px;"><b>3.4. Count of active products which don't belong to any user.</b></div>
	<div style="padding:10px;"><b>Total active products count : </b><?=$activeItemsnotbelongstoUserCount?></div>

	<div style="padding:10px;"><b>3.5. Amount of all active attached products.</b></div>
	<div style="padding:10px;"><b>Total Amount : </b><?php if($activeUserItemsAmount->num_rows()>0){ echo $activeUserItemsAmount->row()->totalAmount; }?></div>
</div>

</body>
</html>