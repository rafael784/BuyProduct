<script>
    function confirma(){
        if(!confirm("Deseja Excluir?")){
            return false;
        }
        return true;
    }
</script>

<h3> Lista de produtos cadastrados <h3>

<table class = "table">
    <tr>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Código</th>
        <th>Action</th>
    <tr>    
    <?php if(!empty($produtos) &&  is_array($produtos)):?>
        <?php  foreach($produtos as $produtos_item): ?>
            <tr>
                <td><?php echo $produtos_item['name']?></a></td>
                <td><?php echo $produtos_item['qtd']?></a></td>
                <td><?php echo $produtos_item['cod']?></a></td>

                <td>
                <a href = "/produtos/delete/<?php echo $produtos_item['id']?>" onclick = "return confirma()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                <a href = "/produtos/edit/<?php echo $produtos_item['id']?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
                </td>
                
            </tr>
        <?php endforeach;?>
<?php else : ?>
    <tr>
            <td colspan = "2"> Nenhum registro encontrado </td>
    </tr>
<?php endif; ?>

</table>

<a href= "/produtos/create" class = "btn btn-primary"> Cadastrar novo </a>
