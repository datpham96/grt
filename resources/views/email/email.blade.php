<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Email</title>
	<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
		font-family: 'arial';
	}

	/* responsive */
	@media (min-width: 300px) and (max-width: 500px) {
		
		.myBody{
			padding: 0 !important;
		}
		.ul-header >li>a{
			font-size: 10px !important;
		}

		table tr td img{
			height: 40px !important;
			margin-left: 15px !important;
		}
		table tr td ul {
			font-size: 13px !important;
		}
		table#f-table .f-copy{
			font-size:  14px !important;
		}
		table#f-table img.f-img{
			width: 20px !important;
			height: 20px !important;
		}
		table#f-table .p-content{
			font-size:  14px !important;
		}
		table img.h-img{
			height: 40px !important;
			width: 120px !important;
		}
		table tr.h-tr{
			height: 60px !important;
		}
		#myTable {
			width: 100% !important;
		}
		#myTable #content{
			width: 100% !important;
		}
		#myTable #content .myContent{
			width: 100% !important;
		}
		#f-table{
			width: 100% !important;
		}

	}
	.ul-header{
		list-style: none !important;
	}
	


	/* end responsive */
</style>
</head>

<body class="myBody" style="background-color: #bdb5b5; ">

	<table id="myTable" style="width: 700px !important; margin: 0 auto !important; padding:30px !important; "  border="0" cellpadding="0" cellspacing="0" >
		<tr>
			
			<td colspan="2" >
				<div id="content">
					<table  class="myContent" style=" color: #000;background-color: #fff; width: 100%" border="0" cellpadding="0" cellspacing="30">
						<tr style="width: 100%">
							<td colspan="2" style="text-align: left;">
								<div>
									<h1>{{$title}}</h1>
									<br>
									<p style="line-height: 25px;">Họ và tên: <i><b>{{$name}}</b></i></p>
									<p style="line-height: 25px;">Email: <i><b>{{$email}}</b></i></p>
									<p style="line-height: 25px; margin-bottom: 10px;">Nội dung:<br> <i>{{$content}}</i></p>
									
									<br>

								</div>
							</td>
						</tr>
					</table>
				</div>
			</td>

		</tr>
		
		<tr  style="height: 70px; background-color: #DDDDDD; border-top: 2px solid #AAAAAA;">
						<td style="float: left;  mso-line-height: exactly; line-height: 150%; line-height: 30px" >
							<div class="f-copy" style=" margin-left: 30px; padding-top: 20px;  font-size: 18px;">
								Copyright © CMS_TEAM, 2018
							</div>
						</td>
						
					</tr>
	</table>
</body>
</html>
