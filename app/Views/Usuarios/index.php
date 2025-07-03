<?php echo $this->extend('Layout/principal') ?>


<?php echo $this->section('titulo'); ?> <?php echo $titulo; ?> <?php echo $this->endSection(); ?>




<?php echo $this->section('estilos'); ?> 

<link href="https://cdn.datatables.net/v/bs4/dt-2.3.2/r-3.0.5/datatables.min.css" rel="stylesheet" integrity="sha384-57j+ilFSg5URotSQqwt2DpHtNkoi7sy+Qj1phKYVWmfSRDx3biVnhnx2mzJTEhu+" crossorigin="anonymous">
 

<?php echo $this->endSection(); ?>




<?php echo $this->section('conteudo'); ?> 

<div class= "row">

<div class="col-lg-12">
                <div class="block">                  
                  <div class="table-responsive"> 
                    <table id="ajaxTable" class="table table-striped table-sm" style="width:100%">
                      <thead>
                        <tr>
                          <th>Imagem</th>
                          <th>Nome</th>
                          <th>E-mail</th>
                          <th>Situação</th>
                        </tr>
                      </thead>              
                    </table>
                  </div>
                </div>
              </div>

</div>

<?php echo $this->endSection(); ?>



<?php echo $this->section('scripts'); ?> 

<script src="https://cdn.datatables.net/v/bs4/dt-2.3.2/r-3.0.5/datatables.min.js" integrity="sha384-9m1/ul4UUfv6yoZjjPpf4EtIPDGd505EmvdZmpntp4ljXDaH5wT57N/Z2jXTXg2/" crossorigin="anonymous"></script>

<script>
  new DataTable('#ajaxTable', {
    ajax: '<?php echo site_url('usuarios/recuperausuarios'); ?>',
    columns: [
        { data: 'imagem' },
        { data: 'nome' },
        { data: 'email' },
        { data: 'ativo' }        
    ]
});
</script>


<?php echo $this->endSection(); ?>