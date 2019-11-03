<h2><?php echo isset($id)?"Editando Registro":"Criando Registro" ?></h2>
<?php echo \Config\Services::validation()->listErrors();?>

<form action ="/produtos/store" method="post">

<div class = "form-group">
    <label for="nome"> Nome </label>
    <input type="text" class = "form-control" name="nome" id="nome" value = "<?php echo isset($name)? $name:set_value('nome')?>" >
</div>

<div class = "form-group">
    <label for="qtd"> Quantidade </label>
    <input  type="number" name="qtd" min="1" max="500" class = "form-control" name="qtd" id="qtd" value = "<?php echo isset($qtd)? $qtd:set_value('qtd')?>">
</div>

<div class = "form-group">
    <label for="cod"> Código </label>
    <input type="number" name="cod" class = "form-control" name="cod" id="cod" value = "<?php echo isset($cod)? $cod:set_value('cod')?>" >
</div>

<div class="form-group">
    <input type="submit" value="Salvar" class="btn btn-primary">
</div>

<input type = "hidden" name = "id" value = "<?php echo isset($id) ? $id: set_value('id')?>">
</form>


