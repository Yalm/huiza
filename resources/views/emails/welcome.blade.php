@extends('emails.layout.app')
@section('content')
<td valign="top" class="em_aside">
  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
			<td height="36" class="em_height">&nbsp;</td>
		</tr>
		<tr>
			<td valign="middle" align="center"><img src="{{ url('images/about-01.jpg') }}" width="333" height="303" alt="WELCOME" style="display:block; font-family:Arial, sans-serif; font-size:25px; line-height:303px; color:#c27cbb;max-width:333px;" class="em_full_img" border="0" /></td>
		</tr>
		<tr>
			<td height="41" class="em_height">&nbsp;</td>
		</tr>
		<tr>
			<td height="1" bgcolor="#d8e4f0" style="font-size:0px;line-height:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" alt="" style="display:block;" border="0" /></td>
		</tr>

		<tr>
			<td height="35" class="em_height">&nbsp;</td>
		</tr>
		<tr>
			<td align="center" style="font-family:'Open Sans', Arial, sans-serif; font-size:15px; font-weight:bold; line-height:18px; color:#fff;text-transform: capitalize;">Bienvenido {{ $customer->name }}</td>
		</tr>
		<tr>
			<td height="22" style="font-size:1px; line-height:1px;">&nbsp;</td>
		</tr>
		<tr>
			<td align="center" style="font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight:bold; line-height:20px; color:#BED001;">Estamos encatados de que se haya unido a nosotros!</td>
		</tr>
		<tr>
			<td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
		</tr>

			<td height="12" style="font-size:1px; line-height:1px;">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" align="center">
				<table width="210" border="0" cellspacing="0" cellpadding="0" align="center">
					<tr>
						<td valign="middle" align="center" height="45" bgcolor="#BED001">
							<a href="{{url('customer/verify', $customer->verifyCustomer->token)}}" style=" text-decoration:none; font-family:'Open Sans', Arial, sans-serif; font-size:17px; font-weight:bold; color:#ffffff; text-transform:uppercase;">CONFIRMAR CORREO</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="34" class="em_height">&nbsp;</td>
		</tr>
		<tr>
			<td align="center" style="font-family:'Open Sans', Arial, sans-serif; font-size:15px; line-height:22px; color:#999999;">Tendras que hacer click en el boton de confirmar correo que aparece en este mensaje para activar su cuenta.
			</td>
		</tr>
		<tr>
			<td height="31" class="em_height">&nbsp;</td>
		</tr>
  	</table>
</td>
@endsection