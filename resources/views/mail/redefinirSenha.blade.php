<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sua Nova Senha</title>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/redefinirSenha.css') }}">
    @endpush
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