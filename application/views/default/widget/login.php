LOGIN
<?= $url_atual ?>
<?php 
if($this->session->userdata('is_logged_in')){
	echo 'USUARIO LOGADO';
	echo anchor('login/deslogar', 'Deslogar');
} else {
	echo form_open('login/validate_credentials');
	echo form_label('Username');
	echo form_input('username', set_value('username'));
	echo form_label('Password');
	echo form_input('password');
	echo form_submit('submit', 'Logar');
	echo anchor('login/create_account', 'Criar uma conta');
	echo form_hidden('url_atual', $url_atual);
	echo form_close();
}

 ?>