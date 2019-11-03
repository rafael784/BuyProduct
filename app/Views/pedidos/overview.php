<script>
    function confirma(){
        if(!confirm("Deseja Excluir?")){
            return false;
        }
        return true;
    }
</script>

<h3> Lista de Pedidos cadastrado<h3>

<table class = "table">
    <tr>
        <th>Cliente</th>
        <th>Tipo de Pedido</th>
        <th>Produto</th>
    <tr>    
    <?php if(!empty($pedidos) &&  is_array($pedidos)):?>
        <?php  foreach($pedidos as $pedidos_item): ?>
            <tr>
                <td><?php echo $pedidos_item['clientName']?></a></td>
                <td><?php echo $pedidos_item['description']?></a></td>
                <td><?php echo $pedidos_item['productName']?></a></td>
            </tr>
        <?php endforeach;?>
<?php else : ?>
    <tr>
            <td colspan = "2"> Nenhum registro encontrado </td>
    </tr>
<?php endif; ?>

</table>

