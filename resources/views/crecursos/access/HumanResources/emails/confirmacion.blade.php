<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" bgcolor="#f3efef" style="background-color:#f3efef;"><br>
    <br>
    <table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><img src="http://nousystem.com/top.png" width="600" height="191" style="display:block;"></td>
      </tr> <!-- para agregar imagen de la firma al enviar correo -->
      <tr>
        <td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000000; padding:0px 5px 0px 15px;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="top" style="font-size:13px; font-family:Arial, Helvetica, sans-serif; color:#000000;">
              <div style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:52px; color:#ff6904;" align="center"><i>Nueva Vacante</i></div>
              <div style="font-size:24px; color:#7bab00;">
              <p><stron>Creada el  </stron>{!!$date!!}</p>
              <p><stron>Por </stron>{{ $applicant_name}}</p>
               </div>
              <div style="font-size:24px; color:#7bab00;">
              <stron>Datos de la Vacante:</stron> {{ $vacant_name}}
                </div>
              <div><br>
                <p><stron>Correo: </stron>{!!$email!!}</p>
                <p><stron>Cantidad:</stron>{{ $quantity }}</p>
                <p><stron>Departamento:</stron> {{$department}}</p>
                <p><stron>Nombre del gerente:</stron> {{ $manager}}</p>
                <p><stron>Motivo de la vacante: </stron> <br> {{ $reason}} </p>
                <br>
                <br>
                <p><i><b>Nota: El siguiente correo es Informativo!</b></i></p>
              </div></td>
              </tr>
          </table></td>
          <tr>
        <td align="left" valign="top"><img src="http://nousystem.com/bot.png" width="600" height="127" style="display:block;"></td>
      </tr>
      </tr>
  </table>
    <br>
    <br></td>
  </tr>
</table>
</body>
</html>
