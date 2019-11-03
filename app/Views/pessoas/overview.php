<script>
    function confirma(){
        if(!confirm("Deseja Excluir?")){
            return false;
        }
        return true;
    }
</script>

<h3> Lista de Pessoas cadastradas <h3>

<table class = "table">
    <tr>
        <th>Nome</th>
        <th>Cpf</th>
        <th>Action</th>
    <tr>
    <?php if(!empty($pessoas) &&  is_array($pessoas)):?>
        <?php  foreach($pessoas as $pessoas_item): ?>
            <tr>
                <td><?php echo $pessoas_item['name']?></a></td>
                <td><?php echo $pessoas_item['cpf']?></a></td>
                <td>
                <a href = "/pessoas/delete/<?php echo $pessoas_item['id']?>" onclick = "return confirma()"><span class="glyphicon glyphicon-remove" aria-hidden="true" title="Remover Cliente"></span></a>
                <a href = "/pessoas/edit/<?php echo $pessoas_item['id']?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Editar dados do cliente!"></a>
                <a href = "<?php echo "/pessoas/view/".$pessoas_item['id']?>"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true" title="Detalhes do cliente!"></a>
                <a href = "<?php echo "/pedidos/index/".$pessoas_item['id']?>"><span class="glyphicon glyphicon-gift" aria-hidden="true" title="Gerar um pedido para o cliente!"></a>
                </td>


            </tr>
        <?php endforeach;?>
    <?php else : ?>
    <tr>
            <td colspan = "2"> Nenhum registro encontrado </td>
    </tr>
<?php endif; ?>
</table>

<a href= "/pessoas/create" class = "btn btn-primary"> Cadastrar novo </a>
