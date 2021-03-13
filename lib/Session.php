<?php 

class Session{

  public static function init(){
    session_start();
  }

  public static function set($key, $val){
    $_SESSION[$key] = $val ;
    }

    public static function get($key){
      if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
      }else{
        return false;
      }
    }

    public static function checkSession(){
      if (self::get("Login") == false) {
      self::destroy();
       header("location: index.php");
      }
    }

      public static function checkLogin(){
      if (self::get("Login") == true) {
       header("location: exam.php");
      }
    }

    public static function checkAdminSession(){
      self::init(); 
      if (self::get("userLogin") == false) {
      self::destroy();
       header("location: login.php");
      }
    }

    public static function checkAdminLogin(){
      self::init(); 
      if (self::get("userLogin") == true) {
      self::destroy();
       header("location: index.php");
      }
    }

    public static function destroy(){
      session_destroy();
      session_unset();
    }


}
