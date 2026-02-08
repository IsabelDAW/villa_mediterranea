<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Playfair Display', serif; color: #333; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; border: 1px solid #e0d6c3; padding: 40px; }
        .header { text-align: center; border-bottom: 2px solid #c5a059; padding-bottom: 20px; }
        .logo { font-size: 28px; letter-spacing: 4px; color: #1a1a1a; text-transform: uppercase; }
        .content { padding: 30px 0; }
        h2 { color: #c5a059; font-weight: 300; text-align: center; }
        .details { background-color: #f9f7f2; padding: 20px; border-radius: 4px; margin: 20px 0; }
        .footer { text-align: center; font-size: 12px; color: #999; margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px; }
        .gold { color: #c5a059; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Villa Mediterránea</div>
            <p style="font-style: italic; color: #888;">Exclusive Real Estate Experience</p>
        </div>

        <div class="content">
            <h2>Estimado/a <span class="gold">{{ $datos['nombre'] }}</span>,</h2>
            <p>Es un placer saludarle. Hemos recibido su interés en nuestra propiedad exclusiva y le agradecemos la confianza depositada en nuestra firma.</p>
            
            <p>Uno de nuestros consultores especializados está revisando su solicitud con la máxima prioridad. 
                A continuación, le mostramos los datos que nos ha proporcionado:</p>

            <div class="details">

                <p><strong>Nombre:</strong> {{ $datos['nombre'] }}</p>
                <p><strong>Apellidos:</strong> {{ $datos['apellidos'] }}</p>
                <p><strong>Teléfono de contacto:</strong> {{ $datos['telefono'] }}</p>
                <p><strong>Correo electrónico:</strong> {{ $datos['email'] }}</p>
                <p><strong>Ciudad:</strong> {{ $datos['ciudad'] }}</p>
                <p><strong>País:</strong> {{ $datos['pais'] }}</p>


            </div>

            <p>En un plazo máximo de 24 horas, nos pondremos en contacto con usted para ofrecerle una atención personalizada y a la medida de sus expectativas.</p>
        </div>

        <div class="footer">
            <p>&copy; 2026 Villa Mediterránea | Costa Blanca | Spain</p>
            <p>Este es un mensaje automático. Por favor, no responda a este correo.</p>
        </div>
    </div>
</body>
</html>