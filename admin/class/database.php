<?php
class Database
{
    public $pdo='';
    protected $sql='';
    protected $stateMent='';
    public function Database()
    {
        try
        {
			$this->pdo=new PDO('mysql:host='.HOST.'; dbname='.DBNAME,USERNAME,PASSWORD);
			$this->pdo->query('set names utf8');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
			//sua lai throw            
			exit($e->getMessage());
        }
    }
    public function setQuery($sql)
    {
        $this->sql=$sql;
    }
    //thuc hien truy van hanh dong: insert, update, delete
    public function execute($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option);
        return $this->stateMent;
    }
    //truy liet ke lay danh sach
    public function loadAllRow($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option);
        return $this->stateMent->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function loadAllRow_mang($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option);
        return $this->stateMent->fetchAll(PDO::FETCH_ASSOC);
    }
    //thuc hien truy van liet ke lay 1 mot tin
    public function loadRow($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option);
        return $this->stateMent->fetch(PDO::FETCH_OBJ);
    }
   
    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
    public function CountAll($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option=array());
        return $this->stateMent->rowCount();
    }
    public function xu_ly_chuoi_ngay($ngay)
    {
        $mang_ngay = explode("/",$ngay);
        $ngay = $mang_ngay[2]."-".$mang_ngay[1]."-".$mang_ngay[0];
        return $ngay;
    }
    public function xu_ly_chuoi_ngay_gio($ngay_gio)
    {
        $mang_ngay_gio = explode(" ",$ngay_gio);
        $mang_ngay = explode("/",$mang_ngay_gio[0]);
        $ngay_gio = $mang_ngay[2]."-".$mang_ngay[1]."-".$mang_ngay[0]." ".$mang_ngay_gio[1];
        return $ngay_gio;
    }
    public function chuyen_mang_sang_chuoi($mang)
    {
        $tao_chuoi_sql = "";
        foreach($mang as $item)
        {
            $tao_chuoi_sql .= ",$item";
        }
        $tao_chuoi_sql = substr($tao_chuoi_sql,1);
        return $tao_chuoi_sql;
    }
    public function disconnect()
    {
        $this->pdo = null;
    }
}
?>