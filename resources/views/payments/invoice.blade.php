<!-- adapted from https://github.com/sparksuite/simple-html-invoice-template/blob/master/invoice.html -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Faktura nr {{ $invoice->id }}</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img
										src="https://scontent.fpoz2-1.fna.fbcdn.net/v/t1.15752-9/332162443_682579373667335_645580138628812480_n.png?stp=dst-png_p100x100&_nc_cat=108&ccb=1-7&_nc_sid=61f064&_nc_ohc=xQ21iDqtiy4AX9Z6FSp&_nc_ht=scontent.fpoz2-1.fna&oh=03_AdQ6uCepfmxGoJHUFwmqLn44XcxK-yy1lTFj1KoRWBikOA&oe=65C7825F"
										style="width: 100%; max-width: 300px"
									/>
								</td>

								<td>
									Faktura nr {{ $invoice->id }}<br />
									Wystawiona: {{ $invoice->created_at }}<br />
									Termin płatności: {{ $invoice->due_at }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Wystawca:<br />
									The Coderhood<br />
									Gdzieś w Zasiedmiogórogrodzie
								</td>

								<td>
                                    Odbiorca:<br />
                                    {{ $invoice->user->name }}<br />
                                    {{ $invoice->user->email }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Metoda płatności</td>

					<td>ID transakcji</td>
				</tr>

				<tr class="details">
					<td>{{ $invoice->method->name }}</td>

					<td>{{ $invoice->transaction_id }}</td>
				</tr>

				<tr class="heading">
					<td>Nazwa</td>

					<td>Cena</td>
				</tr>

				<tr class="item last">
					<td>{{ $invoice->name }}</td>

					<td>{{ $invoice->amount }}</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>{{ $invoice->amount }}</td>
				</tr>
			</table>
		</div>
	</body>
</html>
