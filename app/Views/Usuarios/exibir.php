<?php echo $this->extend('Layout/principal') ?>
<?php use CodeIgniter\I18n\Time; ?>

<?php echo $this->section('titulo'); ?>
    <?php echo $titulo; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>
    <!-- Aqui coloco os estilos da view -->
<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="block">
                <div class="text-center">
                    <?php if($usuario->imagem == null): ?>
                        <img src="<?php echo site_url('recursos/img/usuario_sem_imagem.png'); ?>" class="card-img-top" style="width: 40%;" alt="Usuário sem imagem">
                    <?php else: ?>
                        <img src="<?php echo site_url("usuario/imagem/$usuario->imagem"); ?>" class="card-img-top" style="width: 40%;" alt="<?php echo esc($usuario->nome); ?>">
                    <?php endif; ?>
                    <br>
                    <a href="<?php echo site_url("usuarios/editarimagem/$usuario->id") ?>" class="btn btn-outline-primary btn-sm mt-3">Alterar Imagem</a>
                </div>
                <hr class="border-secondary">

                <h5 class="card-title mt-2"><?php echo esc($usuario->nome);?></h5>
                <p class="card-text"> <?php echo $usuario->email;?></p>
                <p class="card-text">Criado em: <?php echo Time::parse($usuario->criado_em)->humanize();?></p>
                <p class="card-text">Atualizado em: <?php echo Time::parse($usuario->atualizado_em)->humanize();?></p>
                <!-- Example single danger button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ações
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo site_url("usuarios/editar/$usuario->id"); ?>">Editar usuário</a>                    
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div> 
                <a href="<?php echo site_url("usuarios") ?>" class="btn btn-secondary ml-2">Voltar</a>
            </div> <!-- ./block -->
        </div>
    </div>
<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
    <!-- Aqui coloco os scripts da view -->
<?php echo $this->endSection(); ?>