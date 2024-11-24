<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Test</title>
</head>
<body>
    <h1>Testar Tabelas</h1>

    <div style="display: flex; justify-content: space-between;">

        {{-- Formulário de Clients --}}
        <div style="width: 45%;">
            <h2>Clientes (Clients)</h2>

            {{-- Formulário de Criação --}}
            <form action="{{ route('client.store') }}" method="POST">
                @csrf
                @method('POST')

                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" required>
                <br>
                <label for="cellphone">Celular:</label>
                <input type="text" name="cellphone" id="cellphone">
                <br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
                <br>
                <label for="date_birth">Data de Nascimento:</label>
                <input type="date" name="date_birth" id="date_birth">
                <br>
                <button type="submit">Criar Cliente</button>
            </form>
            <hr>

            {{-- Formulário de Atualização --}}
            <form action="{{ route('client.update', ['id' => 1]) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="name">Novo Nome:</label>
                <input type="text" name="name" id="name" required>
                <br>
                <label for="cellphone">Novo Celular:</label>
                <input type="text" name="cellphone" id="cellphone">
                <br>
                <button type="submit">Atualizar Cliente (ID: 1)</button>
            </form>
            <hr>

            {{-- Formulário de Exclusão --}}
            <form action="{{ route('client.destroy', ['id' => 1]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir Cliente (ID: 1)</button>
            </form>
        </div>

        {{-- Formulário de Enrollments --}}
        <div style="width: 45%;">
            <h2>Matrículas (Client Enrollment)</h2>

            {{-- Formulário de Criação --}}
            <form action="{{ route('enrollment.store') }}" method="POST">
                @csrf
                <label for="student_id">ID do Estudante:</label>
                <input type="number" name="student_id" id="student_id" required>
                <br>
                <label for="professor_id">ID do Professor:</label>
                <input type="number" name="professor_id" id="professor_id" required>
                <br>
                <label for="client_id">ID do Cliente:</label>
                <input type="number" name="client_id" id="client_id" required>
                <br>
                <label for="familiar_historic">Histórico Familiar:</label>
                <textarea name="familiar_historic" id="familiar_historic"></textarea>
                <br>
                <label for="social_historic">Histórico Social:</label>
                <textarea name="social_historic" id="social_historic"></textarea>
                <br>
                <button type="submit">Criar Matrícula</button>
            </form>
            <hr>

            {{-- Formulário de Atualização --}}
            <form action="{{ route('enrollment.update', ['id' => 1]) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="familiar_historic">Novo Histórico Familiar:</label>
                <textarea name="familiar_historic" id="familiar_historic"></textarea>
                <br>
                <label for="social_historic">Novo Histórico Social:</label>
                <textarea name="social_historic" id="social_historic"></textarea>
                <br>
                <button type="submit">Atualizar Matrícula (ID: 1)</button>
            </form>
            <hr>

            {{-- Formulário de Exclusão --}}
            <form action="{{ route('enrollment.destroy', ['id' => 1]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir Matrícula (ID: 1)</button>
            </form>
        </div>

    </div>

</body>
</html>
