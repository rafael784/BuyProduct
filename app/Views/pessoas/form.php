<h2><?php echo isset($id)?"Editando Registro":"Criando Registro" ?></h2>
<?php echo \Config\Services::validation()->listErrors();?>

<form action ="/pessoas/store" method="post">

<div class = "form-group">
    <label for="nome"> Nome </label>
    <input type="text" class = "form-control" name="nome" id="nome" value = "<?php echo isset($nome)? $nome:set_value('nome')?>" >
</div>

<div class = "form-group">
    <label for="email"> Email </label>
    <input type="text" class = "form-control" name="email" id="email" value = "<?php echo isset($email)? $email:set_value('email')?>">
</div>

<div class = "form-group">
    <label for="cpf"> Cpf </label>
    <input type="text" class = "form-control" name="cpf" id="cpf" value = "<?php echo isset($cpf)? $cpf:set_value('cpf')?>" >
</div>

<div class = "form-group">
    <label for="endereco"> Endereço </label>
    <input type="text" class = "form-control" name="endereco" id="endereco" value = "<?php echo isset($endereco)? $endereco:set_value('endereco')?>" >
</div>

<div class="form-group">
    <input type="submit" value="Salvar" class="btn btn-primary">
</div>

<input type = "hidden" name = "id" value = "<?php echo isset($id) ? $id: set_value('id')?>">
</form>


