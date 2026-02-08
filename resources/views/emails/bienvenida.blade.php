<html>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2 style="color: #d4af37;">¡Hola, {{ $user->nombre }}!</h2>
    <p>Estamos encantados de que te hayas unido a <strong>Villa Mediterránea</strong>.</p>
    <p>A partir de ahora, podrás reservar nuestros servicios exclusivos y experiencias personalizadas directamente desde tu perfil.</p>
    <br>
    <a href="{{ url('/') }}" style="background: #000; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
        Visitar la Web
    </a>
    <p>Saludos,<br>El equipo de la Villa.</p>
</body>
</html>