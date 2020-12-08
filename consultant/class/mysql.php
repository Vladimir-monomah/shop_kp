<?php define('DSN', 'mysql:dbname=id1667679_vladimir;host=localhost'); define('DBUSER', 'id1667679_bykov'); define('DBPASS', '14031999KIR'); 

class Mysql{
    
    public static $_instance = null;
    
    public static function getInstance(){
	if(self::$_instance === null){
		try{
                    self::$_instance = new PDO(DSN, DBUSER, DBPASS);
                }catch(PDOException $pdoe){
                    die('Не удалось подключиться: '.$pdoe->getMessage());
                }
                
                //Установка кодировки в UTF-8
		//self::$_instance->query("SET NAMES cp1251");
	}
		
	return self::$_instance;
    }
    
    public static function filterSQL($data){
        return self::getInstance()->quote($data); // Очищаем данные
    }
    
    private function __clone(){
	trigger_error('Клонирование класса запрещено.', E_USER_ERROR);
    }
}
