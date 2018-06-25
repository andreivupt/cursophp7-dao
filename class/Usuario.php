<?php
/**
 * Created by PhpStorm.
 * User: andrei.vupt
 * Date: 23/06/2018
 * Time: 17:20
 */

class Usuario
{
    private $idusuario;
    private $deslogin;
    private $desenha;
    private $dtcadastro;

    /**
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @param mixed $idusuario
     */
    public function setIdusuario($idusuario): void
    {
        $this->idusuario = $idusuario;
    }

    /**
     * @return mixed
     */
    public function getDeslogin()
    {
        return $this->deslogin;
    }

    /**
     * @param mixed $deslogin
     */
    public function setDeslogin($deslogin): void
    {
        $this->deslogin = $deslogin;
    }

    /**
     * @return mixed
     */
    public function getDesenha()
    {
        return $this->desenha;
    }

    /**
     * @param mixed $desenha
     */
    public function setDesenha($desenha): void
    {
        $this->desenha = $desenha;
    }

    /**
     * @return mixed
     */
    public function getDtcadastro()
    {
        return $this->dtcadastro;
    }

    /**
     * @param mixed $dtcadastro
     */
    public function setDtcadastro($dtcadastro): void
    {
        $this->dtcadastro = $dtcadastro;
    }

    public function loadById($id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));

        setData($results);

    }

    public static function getList(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

    }

    public static function search($login){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ':SEARCH'=>"%".$login."%"
        ));

    }

    public function setData($data){

        $this->setIdusuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDesenha($data['desenha']);
        $this->setDtcadastro(new DateTime($data['dtcadastro']));
    }

    public function getLogin($login,$password){

        $sql= new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND desenha = :PASSWORD", array(
           ':LOGIN'=>$login,
           ':PASSWORD'=>$password
        ));

        if (count($result) > 0){
            $this->setData($result[0]);
        }else{
            throw new Exception("USARIO OU SENHA INVALIDOS");
        }
    }

    public function insert(){
        $sql = new Sql();

        $result = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
            ':LOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDesenha()
        ));

        if (count($result) > 0) {
            $this->setData($result[0]);
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "desenha"=>$this->getDesenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
        ));
    }

}