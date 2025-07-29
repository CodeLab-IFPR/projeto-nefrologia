<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sua Nova Senha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .password-box {
            background-color: #f4f4f4;
            padding: 15px;
            border-radius: 5px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            letter-spacing: 2px;
            margin: 20px 0;
        }
        .warning {
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sua senha foi redefinida</h2>

        <p>Olá,</p>
        <p>Conforme solicitado, uma nova senha temporária foi gerada para sua conta. Sua nova senha é:</p>

        <div class="password-box">
            {{ $newPassword }}
        </div>

        <p class="warning">
            <strong>Aviso de segurança:</strong> Por favor, faça login com esta senha e altere-a para uma de sua preferência o mais rápido possível na seção de perfil do nosso site.
        </p>
        <p>Obrigado!</p>
    </div>
</body>
</html>