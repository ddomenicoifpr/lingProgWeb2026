<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>
</head>
<body>

    <h1>Cadastro de produtos</h1>

    <form action="produto_exec.php" method="POST">

        <div>
            <label for="inpDesc">Descrição</label>
            <input type="text" id="inpDesc" name="descricao"
                placeholder="Informe a descrição">
        </div>

        <div>
            <label for="selTipo">Tipo</label>
            <select id="selTipo" name="tipo">
                <option value="">---Selecione o tipo---</option>
                <option value="VE">Vestuário</option>
                <option value="LI">Limpeza</option>
                <option value="FE">Ferramenta</option>
                <option value="EL">Eletrônico</option>
                <option value="ED">Eletrodoméstico</option>
            </select>
        </div>

        <div>
            <label for="inpMarca">Marca</label>
            <input type="text" id="inpMarca" name="marca"
                placeholder="Informe a marca">
        </div>

        <div>
            <label for="inpValor">Valor</label>
            <input type="number" id="inpValor" name="valor"
                placeholder="Informe o valor" value="0">
        </div>

        <div>
            <label for="inpLink">Link para imagem</label>
            <input type="text" id="inpDesc" name="linkImg"
                placeholder="Informe o link">
        </div>

        <div>
            <label for="txtDescDet">Descrição detalhada</label>
            <textarea name="descricaDet" id="txtDescDet" rows="5"></textarea>
        </div>

        <div>
            <button>Enviar</button>
        </div>

    </form>

    
</body>
</html>