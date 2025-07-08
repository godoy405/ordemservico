<?php echo $this->extend('Layout/principal') ?>

<?php echo $this->section('titulo'); ?>
    <?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
    <!-- Aqui coloco os estilos da view -->
<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="block">
              <div class="block-body">
               <!-- Exibirá os retornos do backend -->
                <div id="response">
                   

                </div>

              <?php echo form_open('/', ['id' => 'form'], ['id' => "$usuario->id"]) ?>

              <div class="form-group mt-5 mb-4">
                <input id="btn-salvar" type="submit" value="salvar" class="btn btn-danger mr-2">
                <a href="<?php echo site_url("usuarios/exibir/$usuario->id") ?>" class="btn btn-secondary ml-2">Voltar</a>
              </div>  
              
              <?php echo form_close();?>

              </div>
                
            </div> <!-- ./block -->
        </div>
    </div>
<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
    <!-- Aqui coloco os scripts da view -->
<?php echo $this->endSection(); ?>