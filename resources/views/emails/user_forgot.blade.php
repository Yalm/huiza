@extends('emails.layout.app')
@section('content')
<td valign="top" class="em_aside">
  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td height="35" class="em_height">&nbsp;</td>
		</tr>
		<tr>
			<td align="left" style="padding-left:15px; font-family:'Open Sans', Arial, sans-serif; font-size:25px; font-weight:bold; line-height:18px; color:#fff;text-transform: capitalize;">Hola!</td>
		</tr>
		<tr>
			<td height="22" style="font-size:1px; line-height:1px;">&nbsp;</td>
		</tr>
		<tr>
			<td align="center" style="font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight:bold; line-height:20px; color:#BED001;">Usted está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.</td>
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
						<td valign="middle" align="center" height="58" bgcolor="#BED001">
							<a href="{{ url($token) }}" style=" text-decoration:none; font-family:'Open Sans', Arial, sans-serif; font-size:17px; font-weight:bold; color:#ffffff; text-transform:uppercase;">RESTABLECER CONTRASEÑA</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="34" class="em_height">&nbsp;</td>
		</tr>
		<tr>
			<td align="center" style="font-family:'Open Sans', Arial, sans-serif; font-size:15px; line-height:22px; color:#999999;">Si no solicitó restablecer la contraseña, no se requieren más acciones.
			</td>
		</tr>
		<tr>
			<td height="31" class="em_height">&nbsp;</td>
		</tr>
  	</table>
</td>
@endsection