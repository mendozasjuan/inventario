<?php
$pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);

//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
//
//// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->AddPage();


$cabecera='<table>

                <tr>
                <td>
                <h2>M & R Valle Hondo</h2>
                </td>
                               
                    
                </tr>
           </table>';
$pdf->writeHTML($cabecera);

$html='<div style="text-align:center"><h2>Reporte General Productos</h2><br /></div>
    <table style="border: 1px solid #DDDDDD;line-height: normal;" cellpadding="0">
        <tr style="border: 1px solid #DDDDDD;line-height: normal;">
          <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold" bgcolor="#b4c6f5" width="40">
               Nro
            </th>
            <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold" bgcolor="#b4c6f5" >
               Serial
            </th>
            <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold" width="90" bgcolor="#b4c6f5">
                Nombre
            </th>
            <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold" bgcolor="#b4c6f5">
                Precio_C
            </th>
             <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold" bgcolor="#b4c6f5">
                Precio_V
            </th>
             <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold" bgcolor="#b4c6f5">
                Stock_M
            </th>
             <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold" width="70" bgcolor="#b4c6f5">
                Existencia
            </th>
            <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold" width="90" bgcolor="#b4c6f5">
                Categoria
            </th>
            <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold" bgcolor="#b4c6f5" width="90" >
                Marca 
            </th>
             <th style="border: 1px solid #DDDDDD;line-height: normal;font-weight: bold" width="90" bgcolor="#b4c6f5">
                Cilindrada
            </th>
             
             


                    </tr>';
foreach ($this->producto as $value) {
    $html.='<tr style="border: 1px solid #DDDDDD;line-height: normal;">
           <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['id'].'</td>
           <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['codigo'].'</td>
           <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['nombre'].'</td>
            <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['precio_compra'].'</td>
            <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['precio_venta'].'</td>    
            <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['stock_minimo'].'</td>
            <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['existencia'].'</td>
            <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['categoria'].'</td>
            <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['marca'].'</td>
            <td style="border: 1px solid #DDDDDD;line-height: normal;">'.$value['modelo'].'</td>        
            </tr>';
}

$html.='</table>';
$pdf->writeHTML($html);
$pdf->Output('producto.pdf', 'I');

?>