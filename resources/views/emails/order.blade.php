@extends('emails.layout.app')
@section('content')

<td valign="top" class="em_aside">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="50" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="middle" align="center"><h1 style="display:block; font-family: 'Indie Flower', cursive; letter-spacing:6px; font-size:45px; line-height:42px; color:#feae39;max-width:398px;">Muchas Gracias</h1></td>
                  </tr>
                  <tr>
                    <td height="14" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight:bold; line-height:22px; color:#BED001; text-transform:uppercase;">por tu pedido!</td>
                  </tr>
                  <tr>
                    <td height="25" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#d6d7d8" style="font-size:0px;line-height:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" alt="" style="display:block;" border="0" /></td>
                  </tr>
                  <tr>
                    <td height="27" class="em_height">&nbsp;</td>
                  </tr>
                    <tr>
                    <td valign="top" align="left" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px;line-height:22px; color:#BED001;">Tu pedido esta a la espera hasta que confirmemos que el pago se ha recibido. Los detalles de tu pedido se mustran abajo como referencia</td>
                  </tr>
                    <tr>
                    <td height="23" class="em_height">&nbsp;</td>
                  </tr>
                    <tr>
                    <td valign="top" align="left" style="font-family:'Open Sans', Arial, sans-serif; font-size:20px;line-height:22px; font-weight:bold; color:#BED001;">Nuestros detalles bancarios</td>
                  </tr>
                    <tr>
                    <td height="23" class="em_height">&nbsp;</td>
                  </tr>
                    <tr>
                        <td valign="top" align="left" style="font-family:'Open Sans', Arial, sans-serif; font-size:20px;line-height:22px;  color:#BED001;">Jorge Luis Huiza Ramos :</td>
                    </tr>
                    <tr>
                        <td height="18" class="em_height">&nbsp;</td>
                    </tr>
                    <tr>
                        <td valign="top" align="left" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px;line-height:22px;  color:#BED001; padding-left:20px;">Banco:<span style="font-weight:bold;"> Interbank</span></td>
                    </tr>
                                        <tr>
                        <td valign="top" align="left" style="font-family:'Open Sans', Arial, sans-serif; font-size:15px;line-height:22px;  color:#BED001; padding-left:20px;">Numero de Cuenta: <span style="font-weight:bold;">252561651651</span></td>
                    </tr>
                    <tr>
                        <td height="23" class="em_height">&nbsp;</td>
                    </tr>
                  <tr>
                    <td valign="top">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td valign="top">
                            <table width="290" border="0" cellspacing="0" cellpadding="0" align="left" class="em_wrapper" bgcolor="#555555">
                              <tr>
                                <td align="center" valign="middle" class="em_font1" height="42" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; font-weight:bold; color:#E6E6E6; text-transform:uppercase;">
                                  <span style="color:#BED001;">Numero Pedido :</span> #{{ $order->id }}
                                </td>
                              </tr>
                            </table>
                            <table width="290" border="0" cellspacing="0" cellpadding="0" align="right" class="em_wrapper">
                              <tr>
                                <td valign="top" class="em_pad_top">
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0"  bgcolor="#555555" >
                                    <tr>
                                      <td align="center" valign="middle" class="em_font1" height="42" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; font-weight:bold; color:#E6E6E6; text-transform:uppercase;">
                                        <span style="color:#BED001;">Fecha de pedido :</span> {{ $order->created_at->format('F d \,\ Y ')  }}
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                  
                                   <tr>
                    <td valign="top">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#555555">
                        <tr>
                          <td width="25" class="em_space">&nbsp;</td>
                          <td valign="top">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="12" style="font-size:1px; line-height:1px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top"  class="em_font1" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; line-height:20px; font-weight:bold; color:#BED001; text-transform:uppercase;">MÉTODO DE PAGO : &nbsp;<span style=" color:#FFF;">TRANSFERENCIA BANCARIA DIRECTA</span></td>
                              </tr>

                              <tr>
                                <td height="12" style="font-size:1px; line-height:1px;">&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                          <td width="25" class="em_space">&nbsp;</td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <td height="25" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="top">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td valign="top">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                              <tr>
                                <td width="30" class="em_hide">&nbsp;</td>
                                <td width="255" valign="top" align="left" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; line-height:24px; color:#fff; font-weight:bold;">Producto</td>
                                <td width="5"></td>
                                <td width="35" class="em_width55" valign="top" align="left" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; line-height:24px; color:#fff; font-weight:bold;">Cantidad</td>
                                <td width="138" class="em_hide"></td>
                                <td width="5"></td>
                                <td align="right" class="em_width75" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; line-height:24px; color:#fff; font-weight:bold;">Total</td>
                                <td width="30" class="em_hide">&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td height="14" style="font-size:1px; line-height:1px;">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="1" bgcolor="#eaebeb" style="font-size:0px;line-height:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" alt="" style="display:block;" border="0" /></td>
                        </tr>
                        @foreach ($order->products as $product)
                                                    <tr>
                          <td height="14" style="font-size:1px; line-height:1px;">&nbsp;</td>
                        </tr>
                        <tr>
                          <td valign="top">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                              <tr>
                                <td width="30" class="em_hide">&nbsp;</td>
                                <td width="255" valign="top" align="left" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; line-height:24px; color:#fff;">{{ $product->name }}</td>
                                <td width="5"></td>
                                <td width="35" class="em_width55" valign="top" align="center" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; line-height:24px; color:#fff;">{{ $product->pivot->quantity}}</td>
                                 <td width="138" class="em_hide"></td>
                                <td width="5"></td>
                                <td align="right" valign="top" class="em_width75" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; line-height:24px; color:#fff;">{{ "S/. $product->price"}}</td>
                                <td width="30" class="em_hide">&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td height="8" style="font-size:1px; line-height:1px;">&nbsp;</td>
                        </tr>
                        @endforeach

                        <tr>
                          <td height="1" bgcolor="#eaebeb" style="font-size:0px;line-height:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" alt="" style="display:block;" border="0" /></td>
                        </tr>
                        <tr>
                          <td height="14" style="font-size:1px; line-height:1px;">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="11" class="em_hide" style="font-size:1px; line-height:1px;">&nbsp;</td>
                        </tr>
                        <tr>
                          <td valign="top">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                              <tr>
                                <td width="30" class="em_hide">&nbsp;</td>
                                <td valign="top" align="left" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; line-height:24px; color:#fff;">Subtotal :</td>
                                <td width="5"></td>
                                <td align="right" width="127" valign="top" class="em_width75" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; line-height:24px; color:#fff;">S/.{{ $order->getTotalPrice() }}</td>
                                <td width="30" class="em_hide">&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td height="14" style="font-size:1px; line-height:1px;">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="9" class="em_hide" style="font-size:1px; line-height:1px;">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="1" bgcolor="#BED001" style="font-size:0px;line-height:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" alt="" style="display:block;" border="0" /></td>
                        </tr>
                        <tr>
                          <td height="15" style="font-size:1px; line-height:1px;">&nbsp;</td>
                        </tr>
                        <tr>
                          <td valign="top">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                              <tr>
                                <td align="right" style="font-family:'Open Sans', Arial, sans-serif; font-size:20px; line-height:24px; color:#fff; font-weight:bold;">Total: &nbsp;&nbsp; S/.{{ $order->getTotalPrice() }}</td>
                                <td width="30" class="em_hide">&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td height="28" class="em_height">&nbsp;</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:'Open Sans', Arial, sans-serif; font-size:16px; line-height:22px; color:#fff;">Siéntase libre de revisar su pedido a continuación o haga clic en el boton ver su pedido
                    </td>
                  </tr>
                  <tr>
                    <td height="12" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="top" align="center">
                      <table width="210" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                          <td valign="middle" align="center" height="45" bgcolor="#feae39" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; font-weight:bold; color:#ffffff; text-transform:uppercase;"><a href="{{ url('profile/order',$order->getIdFormat() ) }}" target="_blank" style="line-height:45px; display:block; color:#ffffff; text-decoration:none;">Mi pedido</a></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td height="31" class="em_height">&nbsp;</td>
                  </tr>
                </table>
              </td>

@endsection