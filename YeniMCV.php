<?php
  
  /*
   * 
   * //YeniMCV.php
   * 
   * Yazar   			Mustafa Akseli
   * Tarih				17.12.2009 10:32
   * Web Site			http://mustafaakseli.com
   * Web Site			http://AklimdakiSite.com/CodeIgniter
   * 
   * @Amaç				CodeIgniter de yeni bir Controller eklerken işlemleri kolaylaştırmak.
   * @CI Versiyon 1.7.2
   * 
   * Kullanım 			CodeIgniter "system" klasörünün bulunduğu dizinde çalışacak şekilde düzenlenmiştir.
   * Kullanım			  http://localhost/YeniEx.php olarak çalıştırılır.
   * 
   * Yaptığı			"/system/application/***" Dizininde Bulunan; "controllers", "models, "views" dizinlerine yeni dosyalar açıp içeriğini değiştirmek !
   * 
   */
  
  	/*@session_start();
	if(@$_SESSION['AdresYazdinmi']){
		@$_SESSION['AdresYazdinmi'] = "yazdim";
		//$_SERVER['REQUEST_URI']
			@header("Location:http://localhost/YeniMCV.php?YeniEx=");
	}*/
  
    //$SistemAnaPath				= "";
	$IslemPath						    = "system/application/";
	$YeniDosya_Uzanti				  = ".php";
	
	$Cont_YeniDosya_OnTaki			= "";
	$Cont_YeniDosya_SonTaki			= "";
	
	$Modl_YeniDosya_OnTaki			= "";
	$Modl_YeniDosya_SonTaki			= "";
	
	$View_YeniDosya_OnTaki			= "";
	$View_YeniDosya_SonTaki			= "";
	
	$Alinan_YeniDosyaIsmi			  = @$_GET['YeniEx'];
	//$Alinan_YeniDosyaIsmi			= "deneme";
	
	$trArr							= array("controllers", "models", "views");
	
	if($Alinan_YeniDosyaIsmi != ""){
		
		foreach($trArr as $Dizin){
		
			if($Dizin == "controllers"){
				$IslemDosya 		= $IslemPath . $Dizin . '/' . $Cont_YeniDosya_OnTaki . $Alinan_YeniDosyaIsmi . $Cont_YeniDosya_SonTaki . $YeniDosya_Uzanti;
				$DosyaIcerik		= '<?PHP
										
		class '.$Alinan_YeniDosyaIsmi.' extends  Controller{
		  	
			function __construct(){
			  parent::Controller();
			  $this->load->model("VT_'.$Alinan_YeniDosyaIsmi.'", "VT");
			 }
			 
			 function index(){
			 	
					
					$VIEV["islem"]			= "Liste";
					
					$Tavan["title"]			= "Örnek Başlığı bu ";
					$Tavan["desc"]			= "Örnek detay  desc";
					$Tavan["keyw"]			= "Örnek detay  keyw";
						  
					$this->load->view("_tema_x1_tavan", $Tavan);
					$this->load->view("'.$Alinan_YeniDosyaIsmi.'", $VIEV); 
					$this->load->view("_tema_x1_taban");
				
			 }
		}';
			}
			
			if($Dizin == "models"){
				$IslemDosya 		= $IslemPath . $Dizin . '/' . $Modl_YeniDosya_OnTaki . $Alinan_YeniDosyaIsmi . $Modl_YeniDosya_SonTaki . $YeniDosya_Uzanti;
				$DosyaIcerik		= '<?PHP
										  
		class '.$Alinan_YeniDosyaIsmi.' extends Model{

		    function __construct()
		    {
		        parent::Model();
		    }
		 
		 
		 /*
		  *
		  * 
				$kueri = $this->db->select("ReSource"); // Kontroller
				$kueri = $this->db->where("Kim", "FotoGaleri"); // Kontroller
				$kueri = $this->db->group_by("KimId"); // Kontroller
				$kueri = $this->db->order_by("KimId", "DESC"); // Kontroller
				$kueri = $this->db->get("_medya"); // tablo adı
				return $kueri->result_array();
		  * 
		  * 
		  * 
		  			$row = $query->row();
					return array($row->FotoGaleriId, $row->Adi, $row->Acikalama);
		  * 
		  * */
		
		}';
			}
			
			if($Dizin == "views"){
				$IslemDosya 		= $IslemPath . $Dizin . '/' . $View_YeniDosya_OnTaki . $Alinan_YeniDosyaIsmi . $View_YeniDosya_SonTaki . $YeniDosya_Uzanti;
				$DosyaIcerik		= '<?PHP

		switch($islem)
		{
			case "ekle":
			
				//
				
			break;
			
			
			
			default:
		
				//
				
			break;
			 
		}';
			}
		
				if (file_exists($IslemDosya)){
					
						echo "Böyle bir dosya zaten var.";
						
					} else {
						
						@touch($IslemDosya);
						
						@chmod($IslemDosya, 0777);
						// Burada İçerik Eklme İşleme
					    	$f = @fopen($IslemDosya, 'w');
					    	@fputs($f, $DosyaIcerik);
					    	@fclose($f);
							
						@chmod($IslemDosya, 0644);
						
						echo " <b> ".$IslemDosya." </b> yenidosya  olusturuldu. <br/>";
				}
	  
	    }
  
	}else{
		
		?>
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> YeniMCV | CodeIgniter | Yeni Controller ekleme Aracı | VeriLojistik.com, MustafaAkseli.com, AklimdakiSite.com </title>
		</head>
		<body>
		<form action="?" method="get">
			<input name="YeniEx" id="YeniEx" value="___deneme___" />
			<br/>
			<input type="submit" value="Padişahım çok yaşa !" />
		</form>
		</body>
		</html>
		<?PHP 
		
	}
  
  /*
   * 
   * İyi Çalışmalar ....
   * 
   */
  
?>
