<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
//
//// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->AddPage();
$cabecera='<table>
                <tr>
                    <td style="width:300px; "><img src="public/images/images2.JPEG" alt="test alt attribute" border="0" width="150px" height="150px" /></td>
                    <td>
                    <table>
                        <tr>
                            <td style="font-weight: bold; width:65px">Numero:</td>
                            <td>'.$this->factura['nro_control'].'</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Fecha:</td>
                            <td>'.$this->factura['fecha_emision'].'</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Cliente:</td>
                            <td>'.$this->factura['nombre_apellido'].'</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Cedula:</td>
                            <td>'.$this->factura['nacionalidad'].'-'.$this->factura['cedula'].'</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Direccion:</td>
                            <td>'.$this->factura['direccion'].'</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Parroquia:</td>
                            <td>'.$this->factura['parroquia'].'</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Municipio:</td>
                            <td>'.$this->factura['municipio'].'</td>
                        </tr>
                    </table>
                        
                    </td>
                </tr>
           </table>';
$pdf->writeHTML($cabecera);
$html='<div style="text-align:center"><h2>Factura</h2><br /></div>
    <table style="border: 1px solid #DDDDDD;line-height: normal;" cellpadding="0">
        <tr style="border: 1px solid #DDDDDD;line-height: normal;">
            <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold">
                Cantidad
            </th>
            <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold">
                Descripcion
            </th>
            <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold">
                Precio
            </th>
            <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold">
                Precio Total
            </th>
        </tr>';
foreach ($this->productos as $value) {
    $html.='<tr style="border: 1px solid #DDDDDD;line-height: normal;">
                <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['cantidad_producto'].'</td>
                <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['nombre'].'</td>
                <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['precio_venta'].'</td>
                <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['total_producto'].'</td>
            </tr>';
}
$html.='<tr style="border: 1px solid #DDDDDD;line-height: normal;"><td colspan="4" style="height:300px;">&nbsp;</td></tr>';
$html.='<tr style="border: 1px solid #DDDDDD;line-height: normal;">
    <td  colspan="2"style="border: 1px solid #DDDDDD;line-height: normal;">&nbsp;</td>
    <td style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold">Total</td>
    <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$this->factura['total_sin_iva'].'</td>
     </tr>
     <tr style="border: 1px solid #DDDDDD;line-height: normal;">
     <td colspan="2">&nbsp;</td>
    <td style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold">Iva</td>
    <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$this->factura['total_iva'].'</td>
     </tr>
     <tr style="border: 1px solid #DDDDDD;line-height: normal;">
     <td colspan="2">&nbsp;</td>
    <td style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold">Total Neto</td>
    <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$this->factura['total_neto'].'</td>
     </tr>';
$html.='</table>';
$pdf->writeHTML($html);
$pdf->Output('Factura-'.$this->factura['nro_control'].'.pdf', 'I');

?>
