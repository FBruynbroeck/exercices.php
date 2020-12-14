<?php

abstract class Model {
    private $host = "localhost";
    private $db_name = "cours";
    private $db_user = "root";
    private $db_pass = "password";

    protected $_pdo;
    protected $table;
    protected $pk = 'toto';
    public $id;

    public function __construct() {
        $this->table = strtolower(get_class($this));
        $this->_pdo = $this->getConnection();
    }

    protected function getConnection(){
        try{
            return new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }

    public function getAll(){
        $query = $this->_pdo->prepare("select * from ".$this->table);
        $query->execute();
        return $query->fetchAll();
    }

    public function getOne(){
        $query = $this->_pdo->prepare("select * from ".$this->table." where ".$this->pk." = :id");
        $query->execute([':id' => $this->id]);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, get_class($this));
        return $query->fetch();
    }
    public static function getByPk($pk){
        $instance = new static();
        $query = $instance->_pdo->prepare("select * from ".$instance->table." where ".$instance->pk." = :pk");
        $query->execute([':pk' => $pk]);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, get_class($instance));
        return $query->fetch();
    }

}

class User extends Model {
    protected $pk = 'login';
    private $login;
    private $password;

    public function __construct($login=null, $password=null) {
        parent::__construct();
        $this->login = $login;
        $this->setPassword($password);
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword($password) {
        return password_verify($password, $this->password);
    }

    public static function getById($id){
        $instance = new static();
        $query = $instance->_pdo->prepare("select * from ".$instance->table." where ".$instance->pk." = :pk");
        $query->execute([':pk' => $pk]);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, get_class($instance));
        return $query->fetch();
    }

}

$data = ['login' => 'toto', 'password' => 'pass'];

$user = new User("1", "2");
//print_r($user);
echo '<br>';
$user->id = 'test1';
$user = $user->getOne();
//print_r($user);
//echo $user->login;

$toto = new User($data['login'], $data['password']);
//print_r($toto);

//$user = new User();
//$user->id = 'admin';
//$user = $user->getOne();
$user = User::getByPk('admin');
var_dump($user);

var_dump($user->verifyPassword('password'));
