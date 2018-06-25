<?php
/**
 * Created by PhpStorm.
 * User: andrei.vupt
 * Date: 23/06/2018
 * Time: 17:12
 */

require_once ("config.php");

/*
UTILIZANDO A METODO SELECT DA SQL
$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM tb_usuarios");
echo json_encode($usuarios);
*/

/*
 * UTILIZANDO METODO SELECT PELO ID DE USUARIO
 *
 * $user = new Usuario();
   $user->loadById(2);
   echo $user;
 * */


/*
 * RETORNA LISTA DE TODOS USUARIOS
 *
 * $lista = Usuario::getList();
 * echo json_encode($lista);
 *
 * */

/*
 * RETORNA LISTA BUSCANDO POR NOME
 *
 * $search = Usuario::search("e");
 * echo json_encode($search);
 * */


/*
 * RETORNA LISTA VALIDANDO LOGIN
 *
 * $login = new Usuario();
 * $login->getLogin("root","1234");
 * echo $login;
 * */


/*
 * INSERINDO USUARIO NA TABELA

$aluno = new Usuario();
$aluno->setDeslogin("aluno");
$aluno->setDesenha("@alun0");
$aluno->insert();
echo $aluno;
*/

/*
 * ALTERANDO USUARIO
 * $USUARIO = new Usuario();
 * $usuario->loadBYId(1);
 * $usuario->update("professor", "!@#$");
 *
 * echo $usuario;
 */

/*
 * DELETANDO USUARIO
 *
 * $usuario = new Usuario();
 * $usuario->loadById(2);
 * $usuario->delete();
 *
 * echo $usuario;
 */


