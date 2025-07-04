<?php
require_once("../config/conexion.php");
require_once("../fpdf/fpdf.php");

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->Image('../public/img/ESPOCH.png', 10, 8, 20);
        $this->Image('../public/img/fie.png', 180, 8, 20);
        $this->SetFont('Arial','B',14);
        $this->Cell(0,10,'Reporte general de libros',0,1,'C');
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Jefferson Jordan',0,0,'L');
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'R');
    }

    // Método CellFit para ajustar texto en celdas
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $str_width = $this->GetStringWidth($txt);
        if ($str_width > ($w - 1)) {
            // Reducir tamaño de fuente proporcionalmente
            $fit = ($w - 1) / $str_width;
            $this->SetFontSize($this->FontSizePt * $fit);
        }
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
        $this->SetFontSize(9); // Restaurar
    }
}

$conexion = new Conexion();
$db = $conexion->getConexion();

// Consultar todos los libros
$sql = "SELECT * FROM libros";
$stmt = $db->prepare($sql);
$stmt->execute();
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

// Ancho total de la tabla
$anchoTabla = 30 + 20 + 20 + 20 + 30 + 20 + 30; // = 170
$startX = (210 - $anchoTabla) / 2;

// Encabezados de la tabla
$pdf->SetX($startX);
$pdf->Cell(30,10,'Titulo',1,0,'C');
$pdf->Cell(20,10,'Precio',1,0,'C');
$pdf->Cell(20,10,'Paginas',1,0,'C');
$pdf->Cell(20,10,'Anio',1,0,'C');
$pdf->Cell(30,10,'Genero',1,0,'C');
$pdf->Cell(20,10,'Autor',1,0,'C');
$pdf->Cell(30,10,'Editorial',1,1,'C');

$pdf->SetFont('Arial','',9);

foreach ($libros as $libro) {
    $pdf->SetX($startX);
    $pdf->CellFit(30,10,utf8_decode($libro['titulo']),1,0,'C');
    $pdf->CellFit(20,10,$libro['precio'],1,0,'C');
    $pdf->CellFit(20,10,$libro['paginas'],1,0,'C');
    $pdf->CellFit(20,10,$libro['anio_publicacion'],1,0,'C');
    $pdf->CellFit(30,10,utf8_decode($libro['genero']),1,0,'C');
    $pdf->CellFit(20,10,$libro['id_autor'],1,0,'C');
    $pdf->CellFit(30,10,$libro['id_editorial'],1,1,'C');
}

// Guardar el PDF en carpeta reportes
$pdf->Output('../reportes/reporte_libros.pdf', 'F');

echo "✅ Reporte generado correctamente. <a href='../reportes/reporte_libros.pdf' target='_blank'>Ver PDF</a>";
?>
