<?php
require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user']) && isset($_SESSION['usuariosActive'])) {

    $usuarios1 = $_SESSION['id_user'];

    $conexion1 = mysqli_query($mysqli, "SELECT Empresa_id_empresa, rol, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

    if (mysqli_num_rows($conexion1) > 0) {

        $datos = mysqli_fetch_assoc($conexion1);

        $empresaUsuario = $datos['Empresa_id_empresa'];

        $nombreUsuario = $datos['nombre_user'];

        $apellidoUsuario = $datos['apellido_user'];

        $rol = $datos['rol'];

        $conexion2 = mysqli_query($mysqli, "SELECT nombre_empresa FROM empresa WHERE id_empresa = '$empresaUsuario'");

        if (mysqli_num_rows($conexion2) > 0) {

            $datos2 = mysqli_fetch_assoc($conexion2);

            $nombreEmpresa = $datos2['nombre_empresa'];

        }

        $conexion3 = mysqli_query($mysqli, "SELECT * FROM cursos WHERE Empresa_id_empresa = '$empresaUsuario'");

        if (mysqli_num_rows($conexion3) > 0) {

            while ($datos3 = mysqli_fetch_assoc($conexion3)) {
                $cursos[] = $datos3;

            }

            $usuariosActivos = mysqli_query($mysqli, "SELECT Active_online FROM usuario WHERE Empresa_id_empresa = '$empresaUsuario' AND Active_online = '1'");

            if (mysqli_num_rows($usuariosActivos) > 0) {

                $usuarioResult = mysqli_num_rows($usuariosActivos);

            }

        } else {

            $cursosCantidad = 0;

        }

    }

}
// Include the FPDF library
require '../FPDF/fpdf.php';

class PDF extends FPDF
{
    // Header
    function Header()
    {
        // Logo
        $this->Image('../../assests/img/text-1710023184778.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Mover a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,10,'Reporte de Usuarios',0,0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Footer
    function Footer()
    {
        // Posición a 1.5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Crear una instancia de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Tabla de usuarios
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,10,'Usuarios',0,1,'C');
$pdf->SetFont('Arial','',8);

// Obtener datos de la tabla `usuarios`
$usuariosQuery = "SELECT id_user, identificacion_user, nombre_user, apellido_user, correo_user, numero_user, fecha_nacimiento_user FROM usuario WHERE Empresa_id_empresa = '$empresaUsuario'";
$usuariosResult = mysqli_query($mysqli, $usuariosQuery);

// Encabezado de la tabla
$pdf->Cell(10, 7, 'ID', 1, 0, 'C');
$pdf->Cell(25, 7, 'Identificacion', 1, 0, 'C');
$pdf->Cell(30, 7, 'Nombre', 1, 0, 'C');
$pdf->Cell(30, 7, 'Apellido', 1, 0, 'C');
$pdf->Cell(50, 7, 'Correo', 1, 0, 'C');
$pdf->Cell(20, 7, 'Numero', 1, 0, 'C');
$pdf->Cell(25, 7, 'Fecha Nac.', 1, 1, 'C');  // Salto de línea al final

// Datos de la tabla
while ($row = mysqli_fetch_assoc($usuariosResult)) {
    // Formatear la fecha de nacimiento
    $fechaNacimiento = date('d/m/Y', strtotime($row['fecha_nacimiento_user']));
    
    $pdf->Cell(10, 7, $row['id_user'], 1, 0, 'C');
    $pdf->Cell(25, 7, $row['identificacion_user'], 1, 0, 'C');
    $pdf->Cell(30, 7, $row['nombre_user'], 1, 0, 'C');
    $pdf->Cell(30, 7, $row['apellido_user'], 1, 0, 'C');
    $pdf->Cell(50, 7, $row['correo_user'], 1, 0, 'C');
    $pdf->Cell(20, 7, $row['numero_user'], 1, 0, 'C');
    $pdf->Cell(25, 7, $fechaNacimiento, 1, 1, 'C');  // Salto de línea al final
}

$pdf->Output();
?>