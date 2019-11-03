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
    <?php if(!empty($listProduct) &&  is_array($listProduct)):?>
        <?php  foreach($listProduct as $produtos_item): ?>
            <tr>
                <td><?php echo $produtos_item['name']?></a></td>
                <td><?php echo $produtos_item['qtd']?></a></td>
                <td><?php echo $produtos_item['cod']?></a></td>

                <td>
                    <a href="<?php echo "/pedidos/create/".$produtos_item['id']."/".$idPessoa?>" class="btn btn-success">Gerar Pedido</a>
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


